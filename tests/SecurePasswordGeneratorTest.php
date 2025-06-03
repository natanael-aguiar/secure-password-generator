<?php

use PHPUnit\Framework\TestCase;
use SecurePasswordGenerator\SecurePasswordGenerator;

class SecurePasswordGeneratorTest extends TestCase
{
    public function testGeneratedPasswordLength(): void
    {
        $generator = new SecurePasswordGenerator();
        $password = $generator->generatePassword(12);
        $this->assertEquals(12, strlen($password));
    }

    public function testGeneratedPasswordCharacterSet(): void
    {
        $generator = new SecurePasswordGenerator();
        $password = $generator->generatePassword(16);

        $this->assertMatchesRegularExpression('/[a-z]/', $password);
        $this->assertMatchesRegularExpression('/[A-Z]/', $password);
        $this->assertMatchesRegularExpression('/[0-9]/', $password);
        $this->assertMatchesRegularExpression('/[!@#$%^&*()\-_+=<>?]/', $password);
    }

    public function testMinimumPasswordLength(): void
    {
        $generator = new SecurePasswordGenerator();
        $this->expectException(InvalidArgumentException::class);
        $generator->generatePassword(3);
    }

    public function testNoCharacterSetThrowsException(): void
    {
        $generator = new SecurePasswordGenerator();
        $generator->allowLowercase(false)
            ->allowUppercase(false)
            ->allowNumbers(false)
            ->allowSpecialCharacters(false);
        $this->expectException(Exception::class);
        $generator->generatePassword(8);
    }

    public function testEachCharSetAlone(): void
    {
        $generator = new SecurePasswordGenerator();
        $generator->allowLowercase(true)
            ->allowUppercase(false)
            ->allowNumbers(false)
            ->allowSpecialCharacters(false);
        $password = $generator->generatePassword(8);
        $this->assertMatchesRegularExpression('/^[a-z]+$/', $password);

        $generator->allowLowercase(false)->allowUppercase(true);
        $password = $generator->generatePassword(8);
        $this->assertMatchesRegularExpression('/^[A-Z]+$/', $password);

        $generator->allowUppercase(false)->allowNumbers(true);
        $password = $generator->generatePassword(8);
        $this->assertMatchesRegularExpression('/^[0-9]+$/', $password);

        $generator->allowNumbers(false)->allowSpecialCharacters(true);
        $password = $generator->generatePassword(8);
        $this->assertMatchesRegularExpression('/^[!@#$%^&*()\-_+=<>?]+$/', $password);
    }
}
