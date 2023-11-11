<?php
/**
 * Service Provider Boot Method Example - Custom Phone Number Validator
 *
 * This code snippet is for adding a custom validator for phone numbers in a Laravel application.
 * It should be placed within the `boot` method of a service provider. The validator checks if the
 * provided phone number consists only of digits and does not exceed 11 characters in length.
 *
 * To integrate this validator:
 * 1. Navigate to your service provider, typically located in the 'app/Providers' directory.
 * 2. Place this snippet inside the `boot` method.
 * 
 * Adjust the regular expression as needed to match the format of phone numbers specific to your requirements.
 * For example, modify the length constraint or the pattern to allow international formats, if necessary.
 *
 * Note: Ensure you have created a service provider if one does not already exist to house this custom validation logic.
 */
public function boot()
{
    // ... existing code ...

    /* Custom Validator for PHONE Number */
    Validator::extend('phone_number', function($attribute, $value, $parameters)
    {
        // Validation for phone number: only digits allowed, maximum length of 11 characters
        if ((!preg_match("/^[0-9]*$/",$value)) || (strlen($value) > 11)) {
            return false;
        }
        return true;
    });

    // ... any additional code ...
}