<?php

declare(strict_types=1);

namespace NordicTest\EmailAddress;

use Nordic\EmailAddress\EmailAddressFactory;
use Nordic\EmailAddress\EmailAddressFactoryInterface;
use Nordic\EmailAddress\InvalidEmailAddressException;

final class EmailAddressFactoryTest extends TestCase
{
    private $factory;

    private function getFactory(): EmailAddressFactoryInterface
    {
        return $this->factory ?: ($this->factory = new EmailAddressFactory);
    }

    public function testEmailAddressFactoryValid()
    {
        $emailAddress = $this->getFactory()->createEmailAddress(self::VALID_EMAIL);

        $this->assertSame(self::VALID_EMAIL, (string)$emailAddress);
    }

    public function testEmailAddressFactoryInvalid()
    {
        $this->expectException(InvalidEmailAddressException::class);

        $emailAddress = $this->getFactory()->createEmailAddress(self::INVALID_EMAIL);
    }

    public function testEmailAddressFactoryNull()
    {
        $emailAddress = $this->getFactory()->createEmailAddress();

        $this->assertInstanceOfNullEmailAddress($emailAddress);
    }
}
