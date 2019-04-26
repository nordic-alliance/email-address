<?php

declare(strict_types=1);

namespace NordicTest\EmailAddress;

use Nordic\EmailAddress\EmailAddress;
use PHPUnit\Framework\TestCase as PHPUnitFrameworkTestCase;

abstract class TestCase extends PHPUnitFrameworkTestCase
{
    const VALID_EMAIL = 'email@example.com';
    const INVALID_EMAIL = 'email.example.com';
    const CUSTOM_EXCEPTION_MESSAGE = 'Custom exception message';

    public function createEmailAddress(string $email)
    {
        return new EmailAddress($email);
    }

    public function createValidEmailAddress()
    {
        return $this->createEmailAddress(self::VALID_EMAIL);
    }

    public function createInvalidEmailAddress()
    {
        return $this->createEmailAddress(self::INVALID_EMAIL);
    }
}
