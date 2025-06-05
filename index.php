<?php
require 'vendor/autoload.php'; // Loads Composer classes

use SecurePasswordGenerator\SecurePasswordGenerator;

$generator = (new SecurePasswordGenerator())
    ->allowLowercase(true)
    ->allowUppercase(true)
    ->allowNumbers(true)
    ->allowSpecialCharacters(true);

// Generate a secure password of length 8
try {
    $password = $generator->generatePassword(8);
    echo $password . PHP_EOL;
} catch (Throwable $e) {
    fwrite(STDERR, 'Error: ' . $e->getMessage() . PHP_EOL);
    exit(1);
}
