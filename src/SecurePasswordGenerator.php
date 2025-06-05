<?php

namespace SecurePasswordGenerator;

use InvalidArgumentException;
use Exception;

/**
 * Class for generating secure passwords.
 *
 * Allows generating random passwords using different character sets.
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
     * @return $this
     */
    public function allowLowercase(bool $allow): self
    {
        $this->useLowercase = $allow;
        return $this;
    }

    /**
     * Allows the use of uppercase characters in the generated password.
     *
     * @param bool $allow If true, uppercase characters will be used.
     * @return $this
     */
    public function allowUppercase(bool $allow): self
    {
        $this->useUppercase = $allow;
        return $this;
    }

    /**
     * Allows the use of numbers in the generated password.
     *
     * @param bool $allow If true, numbers will be used.
     * @return $this
     */
    public function allowNumbers(bool $allow): self
    {
        $this->useNumbers = $allow;
        return $this;
    }

    /**
     * Allows the use of special characters in the generated password.
     *
     * @param bool $allow If true, special characters will be used.
     * @return $this
     */
    public function allowSpecialCharacters(bool $allow): self
    {
        $this->useSpecialCharacters = $allow;
        return $this;
    }

    /**
     * Generates a random password based on the allowed character sets.
     *
     * @param int $length Password length (minimum: 4, default: 12).
     * @return string Generated password.
     * @throws InvalidArgumentException If the length is invalid.
     * @throws Exception If no character set is enabled.
     */
    public function generatePassword(int $length = 12): string
    {
        if ($length < 4) {
            throw new InvalidArgumentException('The minimum password length is 4.');
        }

        $characters = '';
        $charSets = [];
        if ($this->useLowercase) {
            $characters .= self::LOWERCASE;
            $charSets[] = self::LOWERCASE;
        }
        if ($this->useUppercase) {
            $characters .= self::UPPERCASE;
            $charSets[] = self::UPPERCASE;
        }
        if ($this->useNumbers) {
            $characters .= self::NUMBERS;
            $charSets[] = self::NUMBERS;
        }
        if ($this->useSpecialCharacters) {
            $characters .= self::SPECIAL_CHARACTERS;
            $charSets[] = self::SPECIAL_CHARACTERS;
        }

        if (empty($characters)) {
            throw new Exception("No character set was specified to generate the password. Please enable at least one set (lowercase, uppercase, numbers or special characters).");
        }

        $password = '';
        $characterSetLength = strlen($characters);

        // Ensure at least one character from each enabled set
        foreach ($charSets as $set) {
            $password .= $set[random_int(0, strlen($set) - 1)];
        }

        // Fill the rest of the password
        for ($i = strlen($password); $i < $length; $i++) {
            $password .= $characters[random_int(0, $characterSetLength - 1)];
        }

        // Shuffle to avoid predictable first characters
        $password = str_shuffle($password);

        return $password;
    }
}
