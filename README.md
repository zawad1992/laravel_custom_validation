# Laravel Custom Validation

## About The Repository

**Laravel Custom Validation** is a dedicated repository providing custom validator extensions for Laravel applications. These validators enhance Laravel's validation capabilities, offering specific validators for national IDs, phone numbers, floating-point numbers, and MIME types. They integrate seamlessly with Laravel, enabling developers to enforce complex validation rules effortlessly.

## Key Features

- **National ID Validator**: Validates specific formats of national IDs.
- **Phone Number Validator**: Enforces defined patterns and lengths for phone numbers.
- **Floating-Point Number Validator**: Validates double or floating-point numbers with custom rules.
- **MIME Type Validators**: Includes validators for both accepting and excluding specific MIME types in file uploads.

## Getting Started

### Prerequisites

- Laravel (5.00 or higher)
- PHP (5.6 or higher)

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/laravel_custom_validation.git
   ```

### Usage

After integrating the custom validators, use them in your Laravel application as you would with any standard validation rule:
```php
$request->validate([
    'national_id' => 'required|nid', // Custom National ID validator
    'phone' => 'required|phone_number', // Custom Phone Number validator
    // ... other validation rules ...
]);
```
