<?php
/**
 * Service Provider Boot Method Example - Custom Validator for MIME Type Exclusion
 *
 * This code snippet should be placed in the `boot` method of a Laravel service provider.
 * It creates a custom validator called 'mimes_except', which is used to exclude specific MIME types from being accepted.
 * The validator:
 * - Allows the file if its MIME type is not in the specified exclusion list.
 * - Disallows the file if its MIME type matches any in the exclusion list.
 *
 * The exclusion list is defined within the validator and includes common executable file types.
 * You can modify this list based on your application's requirements to restrict other MIME types.
 *
 * Usage Instructions:
 * - Insert this snippet into the `boot` method of your service provider, typically found in the 'app/Providers' directory.
 * - Adjust the MIME type list as necessary for your application's needs.
 *
 * Note: Ensure your Laravel application has a suitable service provider for incorporating this custom validation logic.
 */
public function boot()
{
    // ... existing code ...

    /* Custom Validator for Mime Except Check */
    Validator::extend('mimes_except', function($attribute, $value, $parameters)
    {
        // Allow empty values
        if (empty($value)) {
            return true;
        }

        // Define a list of MIME types to be excluded
        $mimeList = [
            'exe' => 'application/x-msdownload',
            // ... other MIME types ...
        ];

        // Get the MIME type of the file being validated
        $fileMimeType = $value->getClientMimeType();

        // Check against the exclusion list
        if (!empty($parameters)) {
            foreach ($parameters as $param) {
                if (!empty($mimeList[$param]) && $mimeList[$param] == $fileMimeType) {
                    return false; // Disallow if MIME type is in the exclusion list
                }
            }
        }

        return true; // Allow if MIME type is not in the exclusion list
    });

    // ... any additional code ...
}
