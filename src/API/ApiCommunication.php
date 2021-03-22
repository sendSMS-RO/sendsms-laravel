<?php

namespace SendSMS\SendsmsLaravel\API;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log as Logger;

class ApiCommunication
{
    var $url = "https://api.sendsms.ro/json";
    var $error = null;
    var $username;
    var $password;
    var $performActionsImmediately = true;
    var $queuedActions = array();

    function call_api($url)
    {
        $response = Http::withHeaders([
            "Connection" => "keep-alive"
        ])->get($url);

        if ($response->successful()) {
            if ($this->ok($response->json())) {
                return $response->json();
            }
        } else {
            Logger::error("SendSMS: Unable to make the request");
        }
    }

    function call_api_action($method, $params, $authenticate = true)
    {
        $this->username = env("SENDSMS_USERNAME", null);
        $this->password = env("SENDSMS_PASSWORD", null);
        if ($this->performActionsImmediately) {
            $url = $this->url . "?action=" . urlencode($method->getName());
            if ($authenticate) {
                if (!is_null($this->password) && !is_null($this->username)) {
                    $url .= "&username=" . urlencode($this->username);
                    $url .= "&password=" . urlencode($this->password);
                } else {
                    Logger::error("SendSMS: You need to specify your username and password in your .env file (SENDSMS_USERNAME and SENDSMS_PASSWORD)");
                    return false;
                }
            }
            $parameters = $method->getParameters();
            for ($i = 0; $i < count($params); $i++) {
                if (!is_bool($params[$i]) && !is_null($params[$i])) {
                    $url .= "&" . urlencode($parameters[$i]->getName()) . "=" . urlencode($params[$i]);
                } elseif (is_bool($params[$i]) && !is_null($params[$i])) {
                    $url .= "&" . urlencode($parameters[$i]->getName()) . "=" . urlencode($params[$i] ? "true" : "false");
                }
            }

            return $this->call_api($url);
        } else {
            if (!is_null($this->username) && !is_null($this->password)) {
                Logger::error("SendSMS: You need to specify your username and password in your .env file (SENDSMS_USERNAME and SENDSMS_PASSWORD) to perform bulk actions");
                return false;
            }
            $action = array(
                'command' => $method->getName(),
                'params' => array()
            );

            $parameters = $method->getParameters();
            for ($i = 0; $i < count($params); $i++) {
                $action['params'][$parameters[$i]->getName()] = $params[$i];
            }
            $this->queuedActions[] = $action;
            return TRUE;
        }
    }

    function ok($result)
    {
        if (is_array($result)) {
            if (array_key_exists('status', $result)) {
                if ($result['status'] >= 0) {
                    return TRUE;
                }
                Logger::error("SendSMS: " . $result['message'] . " - " . $result['details']['ErrorMessages']);
            }
        } else {
            Logger::error("SendSMS: Error communicating with API");
        }
        return FALSE;
    }
}
