# Secure Password Generator PHP Package

[![CI](https://github.com/natanael-aguiar/secure-password-generator/actions/workflows/ci.yml/badge.svg)](https://github.com/natanael-aguiar/secure-password-generator/actions/workflows/ci.yml)
[![Packagist](https://img.shields.io/packagist/v/natanael-aguiar/secure-password-generator)](https://packagist.org/packages/natanael-aguiar/secure-password-generator)
[![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](LICENSE)

This PHP package allows you to generate secure passwords with configurable options, including uppercase letters, lowercase letters, numbers and special characters.

## Instalação

Você pode instalar este pacote usando o Composer:

```bash
composer require natanael-aguiar/secure-password-generator
```

## Uso

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

## Documentação

### `SecurePasswordGenerator` (Classe Principal)

#### Métodos

-   `allowLowercase(bool $allow): void` - Habilita ou desabilita letras minúsculas na senha.
-   `allowUppercase(bool $allow): void` - Habilita ou desabilita letras maiúsculas na senha.
-   `allowNumbers(bool $allow): void` - Habilita ou desabilita números na senha.
-   `allowSpecialCharacters(bool $allow): void` - Habilita ou desabilita caracteres especiais na senha.
-   `generatePassword(int $length = 12): string` - Gera uma senha segura com o comprimento especificado.

## Como Contribuir

Veja o arquivo [CONTRIBUTING.md](CONTRIBUTING.md) para detalhes sobre o processo de contribuição.

## Código de Conduta

Este projeto adota o [Código de Conduta do Contributor Covenant](CODE_OF_CONDUCT.md).

## Execução de Testes, Lint e Análise Estática

-   **Testes:**
    ```bash
    vendor/bin/phpunit
    ```
-   **Lint (PSR-12):**
    ```bash
    vendor/bin/php-cs-fixer fix --dry-run --diff
    ```
-   **Análise Estática:**
    ```bash
    vendor/bin/phpstan analyse
    ```

## Contribuição

Contribuições são bem-vindas! Por favor, abra uma issue ou envie um pull request se você quiser contribuir.
