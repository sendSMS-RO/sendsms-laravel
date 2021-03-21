<?php

namespace SendSMS\SendsmsLaravel\API;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log as Logger;

class ApiRequest
{
    private static $instance;
    private static $logger;

    var $url = "https://api.sendsms.ro/json";
    var $error = null;
    var $username;
    var $password;
    var $performActionsImmediately = true;
    var $queuedActions = array();

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            Logger::notice("SendSMS integration with Laravel initialized");
            self::$instance = new Client();
        }
        return self::$instance;
    }

    function call_api($url)
    {
        if (function_exists('curl_init')) {
            if ($this->curl === FALSE) {
                $this->curl = curl_init();
            } else {
                curl_close($this->curl);
                $this->curl = curl_init();
            }
            curl_setopt($this->curl, CURLOPT_HEADER, 1);
            curl_setopt($this->curl, CURLOPT_URL, $url);
            curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($this->curl, CURLINFO_HEADER_OUT, true);
            curl_setopt($this->curl, CURLOPT_HTTPHEADER, array("Connection: keep-alive"));

            $result = curl_exec($this->curl);

            $size = curl_getinfo($this->curl, CURLINFO_HEADER_SIZE);
            $request_headers = curl_getinfo($this->curl, CURLINFO_HEADER_OUT);
            $response_headers = substr($result, 0, $size);
            $result = substr($result, $size);

            // $this->debug("--- HTTP Request trace --- ");
            // $this->debug($request_headers, false);
            // $this->debug($response_headers, false);
            // $this->debug($result);

            if ($result !== FALSE) {
                return json_decode($result, true);
            }
            return false;
        } else {
            // $this->debug("You need cURL to use this API Library");
        }

        return FALSE;
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
                    // $this->debug("You need to specify your username and password using setUsername() and setPassword()");
                    return FALSE;
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
            if (is_null($this->username) || is_null($this->password)) {
                // $this->debug("You need to specify your username and password using setUsername() and setPassword() to perform bulk actions");
                return FALSE;
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
}
