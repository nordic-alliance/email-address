<?php

declare(strict_types=1);

namespace NordicTest\EmailAddress;

use Nordic\EmailAddress\InvalidEmailAddressException;

final class InvalidEmailAddressExceptionTest extends TestCase
{
    public function testDefaultMessage()
    {
        $e = new InvalidEmailAddressException(self::INVALID_EMAIL);

        $this->assertSame('', $e->getMessage());
    }

    public function testCustomMessage()
    {
        $message = 'Custom formatted message `%s`';
        $e = new InvalidEmailAddressException(self::INVALID_EMAIL, sprintf($message, self::INVALID_EMAIL));

        $this->assertSame(
            sprintf($message, self::INVALID_EMAIL),
            $e->getMessage()
        );
    }

    public function testGetEmailAddress()
    {
        $e = new InvalidEmailAddressException(self::INVALID_EMAIL);

        $this->assertSame(self::INVALID_EMAIL, $e->getEmailAddress());
    }
}
