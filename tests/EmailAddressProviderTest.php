<?php

declare(strict_types=1);

namespace NordicTest\EmailAddress;

use Nordic\EmailAddress\EmailAddressProviderInterface;
use Nordic\EmailAddress\EmailAddressProviderTrait;
use Nordic\EmailAddress\EmailAddress;
use Nordic\EmailAddress\NullEmailAddress;

final class EmailAddressProviderTest extends TestCase
{
    public function testEmailAddressProviderEmpty()
    {
        $class = new class implements EmailAddressProviderInterface {
            use EmailAddressProviderTrait;
        };

        $this->assertFalse($class->hasEmailAddress());
        $this->assertInstanceOf(NullEmailAddress::class, $class->getEmailAddress());
    }

    public function testEmailAddressProviderWithEmail()
    {
        $class = new class implements EmailAddressProviderInterface {
            use EmailAddressProviderTrait;

            public function __construct()
            {
                $this->emailAddress = new EmailAddress(TestCase::VALID_EMAIL);
            }
        };

        $this->assertTrue($class->hasEmailAddress());
        $this->assertSame(TestCase::VALID_EMAIL, (string)$class->getEmailAddress());
    }
}
