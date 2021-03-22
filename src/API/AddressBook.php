<?php

namespace SendSMS\SendsmsLaravel\API;

use ReflectionMethod;

class AddressBook extends ApiCommunication
{
    /**
     *   Gets a list of contacts for a particular group
     *
     *   @global string $username
     *   @global string $password
     *   @param int $group_id: The ID of the group
     */
    function address_book_contacts_get_list($group_id)
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }

    /**
     *   Add a contact to a group
     *
     *   @global string $username
     *   @global string $password
     *   @param int $group_id: The group ID to add the record to
     *   @param string $phone_number: Phone number of the contact
     *   @param string $first_name (optional): First name of the contact
     *   @param string $last_name (optional): Last name of the contact
     */
    function address_book_contact_add($group_id, $phone_number, $first_name = null, $last_name = null)
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }

    /**
     *   Delete a contact
     *
     *   @global string $username
     *   @global string $password
     *   @param int $contact_id
     */
    function address_book_contact_delete($contact_id)
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }

    /**
     *   Update an existing contact
     *
     *   @global string $username
     *   @global string $password
     *   @param int $contact_id: The contact ID of the record
     *   @param string $phone_number (optional): Phone number of the contact
     *   @param string $first_name (optional): First name of the contact
     *   @param string $last_name (optional): Last name of the contact
     */
    function address_book_contact_update($contact_id, $phone_number = null, $first_name = null, $last_name = null)
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }

    /**
     *   Retrieves a list of address book groups
     *
     *   @global string $username
     *   @global string $password
     */
    function address_book_groups_get_list()
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }

    /**
     *   Adds a new address book group
     *
     *   @global string $username
     *   @global string $password
     *   @param string $name: The new of the new group
     */
    function address_book_group_add($name)
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }

    /**
     *   Deletes an address book group
     *
     *   @global string $username
     *   @global string $password
     *   @param int $group_id: The ID of the group
     */
    function address_book_group_delete($group_id)
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }
}
