<?php

namespace SecurePasswordGenerator;

use InvalidArgumentException;
use Exception;

/**
 * Classe para geração de senhas seguras.
 *
 * Permite gerar senhas aleatórias utilizando diferentes conjuntos de caracteres.
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
     * Permite o uso de caracteres minúsculos na senha gerada.
     *
     * @param bool $allow Se true, caracteres minúsculos serão usados.
     * @return $this
     */
    public function allowLowercase(bool $allow): self
    {
        $this->useLowercase = $allow;
        return $this;
    }

    /**
     * Permite o uso de caracteres maiúsculos na senha gerada.
     *
     * @param bool $allow Se true, caracteres maiúsculos serão usados.
     * @return $this
     */
    public function allowUppercase(bool $allow): self
    {
        $this->useUppercase = $allow;
        return $this;
    }

    /**
     * Permite o uso de números na senha gerada.
     *
     * @param bool $allow Se true, números serão usados.
     * @return $this
     */
    public function allowNumbers(bool $allow): self
    {
        $this->useNumbers = $allow;
        return $this;
    }

    /**
     * Permite o uso de caracteres especiais na senha gerada.
     *
     * @param bool $allow Se true, caracteres especiais serão usados.
     * @return $this
     */
    public function allowSpecialCharacters(bool $allow): self
    {
        $this->useSpecialCharacters = $allow;
        return $this;
    }

    /**
     * Gera uma senha aleatória baseada nos conjuntos de caracteres permitidos.
     *
     * @param int $length Comprimento da senha (mínimo: 4, padrão: 12).
     * @return string Senha gerada.
     * @throws InvalidArgumentException Se o comprimento for inválido.
     * @throws Exception Se nenhum conjunto de caracteres estiver habilitado.
     */
    public function generatePassword(int $length = 12): string
    {
        if ($length < 4) {
            throw new InvalidArgumentException('O comprimento mínimo da senha é 4.');
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
            throw new Exception("Nenhum conjunto de caracteres foi especificado para gerar a senha. Habilite ao menos um conjunto (minúsculas, maiúsculas, números ou especiais).");
        }

        $password = '';
        $characterSetLength = strlen($characters);

        // Garante pelo menos um caractere de cada conjunto habilitado
        foreach ($charSets as $set) {
            $password .= $set[random_int(0, strlen($set) - 1)];
        }

        // Preenche o restante da senha
        for ($i = strlen($password); $i < $length; $i++) {
            $password .= $characters[random_int(0, $characterSetLength - 1)];
        }

        // Embaralha para não deixar os primeiros caracteres previsíveis
        $password = str_shuffle($password);

        return $password;
    }
}
