<?php
require 'vendor/autoload.php'; // Carrega as classes do Composer

use SecurePasswordGenerator\SecurePasswordGenerator;

$generator = (new SecurePasswordGenerator())
    ->allowLowercase(true)
    ->allowUppercase(true)
    ->allowNumbers(true)
    ->allowSpecialCharacters(true);

// Gera uma senha segura de tamanho 8
try {
    $password = $generator->generatePassword(8);
    echo $password . PHP_EOL;
} catch (Throwable $e) {
    fwrite(STDERR, 'Erro: ' . $e->getMessage() . PHP_EOL);
    exit(1);
}
