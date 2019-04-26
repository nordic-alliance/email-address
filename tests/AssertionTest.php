<?php

declare(strict_types=1);

namespace NordicTest\EmailAddress;

use Nordic\EmailAddress\Assertion;
use Nordic\EmailAddress\InvalidEmailAddressException;

final class AssertionTest extends TestCase
{
    // Assertion::email

    public function testAssertionEmailValid()
    {
        $this->assertSame(Assertion::email(self::VALID_EMAIL), self::VALID_EMAIL);
    }

    public function testAssertionEmailInvalid()
    {
        $this->expectException(InvalidEmailAddressException::class);

        Assertion::email(self::INVALID_EMAIL);
    }

    public function testAssertionEmailInvalidCustomMessage()
    {
        $this->expectExceptionMessage(self::CUSTOM_EXCEPTION_MESSAGE);

        Assertion::email(self::INVALID_EMAIL, self::CUSTOM_EXCEPTION_MESSAGE);
    }

    // Assertion::notNull

    public function testAssertionNotNullValid()
    {
        $emailAddress = $this->createValidEmailAddress();
        $assertEmailAddress = Assertion::notNull($emailAddress);

        $this->assertSame($assertEmailAddress, $emailAddress);
    }

    public function testAssertionNotNullInvalid()
    {
        $this->expectException(InvalidEmailAddressException::class);

        Assertion::notNull($this->createNullEmailAddress());
    }
}
