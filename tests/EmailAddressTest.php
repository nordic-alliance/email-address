<?php

declare(strict_types=1);

namespace NordicTest\EmailAddress;

use Nordic\EmailAddress\InvalidEmailAddressException;

final class EmailAddressTest extends TestCase
{
    public function testEmailAddress()
    {
        $emailAddress = $this->createValidEmailAddress();

        $this->assertSame(self::VALID_EMAIL, (string)$emailAddress);
    }

    public function testEmailAddressInvalid()
    {
        $this->expectException(InvalidEmailAddressException::class);

        $emailAddress = $this->createEmailAddress(self::INVALID_EMAIL);
    }

    public function testEmailAddressEquals()
    {
        $emailAddress = $this->createValidEmailAddress();
        $emailAddressAnother = $this->createValidEmailAddress();

        $this->assertTrue($emailAddress->equals($emailAddressAnother));
    }

    public function testEmailAddressNotEquals()
    {
        $emailAddress = $this->createValidEmailAddress();
        $emailAddressAnother = $this->createEmailAddress('another@example.com');

        $this->assertFalse($emailAddress->equals($emailAddressAnother));
    }
}
