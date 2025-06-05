# Secure Password Generator PHP Package

[![CI](https://github.com/natanael-aguiar/secure-password-generator/actions/workflows/ci.yml/badge.svg)](https://github.com/natanael-aguiar/secure-password-generator/actions/workflows/ci.yml)
[![Packagist](https://img.shields.io/packagist/v/natanael-aguiar/secure-password-generator)](https://packagist.org/packages/natanael-aguiar/secure-password-generator)
[![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](LICENSE)

This PHP package allows you to generate secure passwords with configurable options, including uppercase letters, lowercase letters, numbers, and special characters.

## Installation

You can install this package using Composer:

```bash
composer require natanael-aguiar/secure-password-generator
```

## Usage

```php
<?php

require 'vendor/autoload.php'; // Loads Composer classes

use SecurePasswordGenerator\SecurePasswordGenerator;

$generator = new SecurePasswordGenerator();

$generator->allowLowercase(true);
$generator->allowUppercase(true);
$generator->allowNumbers(true);
$generator->allowSpecialCharacters(true);

// Generate a secure password of length 8
try {
    $password = $generator->generatePassword(8);
    echo($password);
} catch (Exception $e) {
    echo($e);
}
```

## Documentation

### `SecurePasswordGenerator` (Main Class)

#### Methods

-   `allowLowercase(bool $allow): void` - Enables or disables lowercase letters in the password.
-   `allowUppercase(bool $allow): void` - Enables or disables uppercase letters in the password.
-   `allowNumbers(bool $allow): void` - Enables or disables numbers in the password.
-   `allowSpecialCharacters(bool $allow): void` - Enables or disables special characters in the password.
-   `generatePassword(int $length = 12): string` - Generates a secure password with the specified length.

## Contributing

See the [CONTRIBUTING.md](CONTRIBUTING.md) file for details on the contribution process.

## Code of Conduct

This project adopts the [Contributor Covenant Code of Conduct](CODE_OF_CONDUCT.md).

## Running Tests, Lint, and Static Analysis

-   **Tests:**
    ```bash
    vendor/bin/phpunit
    ```
-   **Lint (PSR-12):**
    ```bash
    vendor/bin/php-cs-fixer fix --dry-run --diff --allow-risky=yes
    ```
-   **Static Analysis:**
    ```bash
    vendor/bin/phpstan analyse
    ```

## Contribution

Contributions are welcome! Please open an issue or submit a pull request if you want to contribute.

