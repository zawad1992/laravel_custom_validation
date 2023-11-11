<?php

/**
 * Service Provider Boot Method Example
 *
 * This code snippet should be placed in a service provider, typically within the `boot` method.
 * It demonstrates the registration of a custom validator for National IDs (NID) in a Laravel application.
 * The validator checks if the provided value matches the specified format for a National ID.
 * To use this, ensure you have a service provider where this code can reside.
 *
 * Place this snippet in the `boot` method of your chosen service provider, 
 * which is located in the 'app/Providers' directory of your Laravel application.
 * 
 * Note: Modify the regular expression as needed to match the format of the National IDs used in your context.
 */
public function boot()
{
    // ... existing code ...

    /* Custom Validator for National ID */
    Validator::extend('nid', function($attribute, $value, $parameters)
    {
        // if (!preg_match("/(01)[0-9]{9}/",$value)) {
        if ((!preg_match("/^[0-9]\d{9}$|^[0-9]\d{16}$/",$value))) {
            return false;
        }
        return true;
    });

    // ... any additional code ...
}


?>