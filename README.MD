# Secure Password Generator PHP Package

This PHP package allows you to generate secure passwords with configurable options, including uppercase letters, lowercase letters, numbers and special characters.
## Installation

You can install this package using Composer. Run the following command in the terminal:

```bash
composer require natanael-oliveira/secure-password-generator
```

## Use

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

- `allowLowercase(bool $allow): void` - Enables or disables lowercase letters in the password.
- `allowUppercase(bool $allow): void` - Enables or disables uppercase letters in the password.
- `allowNumbers(bool $allow): void` - Enables or disables numbers in the password.
- `allowSpecialCharacters(bool $allow): void` - Enables or disables special characters in the password.
- `generatePassword(int $length = 12): string` - Generates a secure password with the specified length.

## Contribution

Contributions are welcome! Please open an issue or send a pull request if you want to contribute.