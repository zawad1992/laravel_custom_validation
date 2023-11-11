<?php
/**
 * Service Provider Boot Method Example - Custom Validator for Double Numbers
 *
 * This snippet is designed to be used in a Laravel application's service provider, specifically within the `boot` method.
 * It introduces a custom validator named 'float', which validates double or floating-point numbers.
 * The validator ensures that the input:
 * - Contains only digits and at most one decimal point ('.').
 * - Is not just a single decimal point without any digits.
 * - Does not have more than one decimal point.
 *
 * Placement Instructions:
 * 1. Place this code in the `boot` method of a service provider in your Laravel application.
 *    Service providers are usually located in the 'app/Providers' directory.
 * 2. You may need to adjust the regular expression if you have specific format requirements for the float values.
 *
 * Note: Ensure your application has a service provider that can accommodate this custom validation logic.
 * If not, you may need to create a new service provider.
 */
public function boot()
{
    // ... existing code ...

    /* Custom Validator for Double Number */
    Validator::extend('float', function($attribute, $value, $parameters)
    {
        // Validation logic: only digits and a single decimal point are allowed
        if ((!preg_match("/^[0-9.]*$/",$value)) || ($value == ".") || (substr_count($value,".") > 1)) {
            return false;
        }
        return true;
    });

    // ... any additional code ...
}
