<?php

namespace SecurePasswordGenerator;

use Exception;

/**
 * Class to generate secure passwords.
 *
 * This class allows you to generate random passwords using different character sets.
 *
 * @package SecurePasswordGenerator
 */
class SecurePasswordGenerator
{
    private const LOWERCASE = 'abcdefghijklmnopqrstuvwxyz';
    private const UPPERCASE = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    private const NUMBERS = '0123456789';
    private const SPECIAL_CHARACTERS = '!@#$%^&*()-_+=<>?';

    private bool $useLowercase = true;
    private bool $useUppercase = true;
    private bool $useNumbers = true;
    private bool $useSpecialCharacters = true;

    /**
     * Allows the use of lowercase characters in the generated password.
     *
     * @param bool $allow If true, lowercase characters will be used.
     */
    public function allowLowercase(bool $allow): void
    {
        $this->useLowercase = $allow;
    }

    /**
     * Allows the use of uppercase characters in the generated password.
     *
     * @param bool $allow If true, uppercase characters will be used.
     */
    public function allowUppercase(bool $allow): void
    {
        $this->useUppercase = $allow;
    }

    /**
     * Allows the use of numbers in the generated password.
     *
     * @param bool $allow If true, numbers will be used.
     */
    public function allowNumbers(bool $allow): void
    {
        $this->useNumbers = $allow;
    }

    /**
     * Allows the use of special characters in the generated password.
     *
     * @param bool $allow If true, special characters will be used.
     */
    public function allowSpecialCharacters(bool $allow): void
    {
        $this->useSpecialCharacters = $allow;
    }

    /**
     * Generates a random password based on the allowed character sets.
     *
     * @param int $length The length of the generated password (default: 12).
     * @return string The generated password.
     * @throws Exception If no character set is selected to generate the password.
     */
    public function generatePassword(int $length = 12): string
    {
        $characters = '';
        if ($this->useLowercase) {
            $characters .= self::LOWERCASE;
        }
        if ($this->useUppercase) {
            $characters .= self::UPPERCASE;
        }
        if ($this->useNumbers) {
            $characters .= self::NUMBERS;
        }
        if ($this->useSpecialCharacters) {
            $characters .= self::SPECIAL_CHARACTERS;
        }

        if (empty($characters)) {
            throw new Exception("No character set was specified to generate the password. Please enable at least one character set (lowercase, uppercase, numbers or special characters) before trying to generate the password.");
        }

        $password = '';
        $characterSetLength = strlen($characters);

        for ($i = 0; $i < $length; $i++) {
            $randomChar = $characters[random_int(0, $characterSetLength - 1)];
            $password .= $randomChar;
        }

        return $password;
    }
}