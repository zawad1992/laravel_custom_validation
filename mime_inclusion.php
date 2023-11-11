<?php
/**
 * Service Provider Boot Method Example - Custom Validator for MIME Type Acceptance
 *
 * This code is intended for use in a Laravel application's service provider within the `boot` method.
 * It establishes a custom validator named 'mimes_accept', which is designed to accept only specific MIME types.
 * The validator:
 * - Permits the file if its MIME type and extension are in the specified acceptance list.
 * - Rejects the file if its MIME type or extension do not match any in the acceptance list.
 *
 * The acceptance list is defined within the validator, including file types like JPG, PNG, PDF, etc.
 * You can alter this list to fit your application's needs by including or excluding file types.
 *
 * Instructions for Use:
 * - Place this code in the `boot` method of a service provider, typically located in the 'app/Providers' directory.
 * - Customize the MIME type list according to the file types your application needs to accept.
 *
 * Important: Ensure your Laravel application includes an appropriate service provider to implement this custom validation logic.
 */
public function boot()
{
    // ... existing code ...

    /* Custom Validator for Mime Accept Check */
    Validator::extend('mimes_accept', function($attribute, $value, $parameters)
    {
        // Proceed if the value is not empty
        if (empty($value)) {
            return true;
        }

        // Define the list of acceptable MIME types
        $mimeList = [
            'jpg' => 'image/jpg',
            // ... other MIME types ...
        ];

        // Retrieve the MIME type and original extension of the file
        $fileMimeType = $value->getClientMimeType();
        $fileOriginalExtension = $value->getClientOriginalExtension();

        // Validate against the acceptance list
        if (!empty($parameters)) {
            $flag = 0;
            foreach ($parameters as $parameter) {
                if (!empty($mimeList[$parameter]) && 
                    $mimeList[$parameter] == $fileMimeType && 
                    $fileOriginalExtension == $parameter) {
                        $flag = 1;
                        break;
                }
            }
            return $flag === 1;
        }

        return true; // Allow if no specific parameters are set
    });

    // ... any additional code ...
}
