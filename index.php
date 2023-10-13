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

