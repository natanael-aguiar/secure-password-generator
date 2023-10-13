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
        $this->assertMatchesRegularExpression('/[!@#$%^&*()-_+=<>?]/', $password);
    }
}
