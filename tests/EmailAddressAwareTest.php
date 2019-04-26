<?php

declare(strict_types=1);

namespace NordicTest\EmailAddress;

use Nordic\EmailAddress\EmailAddressAwareInterface;
use Nordic\EmailAddress\EmailAddressAwareTrait;
use Nordic\EmailAddress\NullEmailAddress;

final class EmailAddressAwareTest extends TestCase
{
    public function testEmailAddressAwareEmpty()
    {
        $class = new class implements EmailAddressAwareInterface {
            use EmailAddressAwareTrait;
        };

        $this->assertFalse($class->hasEmailAddress());
        $this->assertInstanceOf(NullEmailAddress::class, $class->getEmailAddress());
    }

    public function testEmailAddressAwareWithEmail()
    {
        $class = new class implements EmailAddressAwareInterface {
            use EmailAddressAwareTrait;
        };

        $class->setEmailAddress($this->createValidEmailAddress());

        $this->assertTrue($class->hasEmailAddress());
        $this->assertSame(self::VALID_EMAIL, (string)$class->getEmailAddress());

        $class->setEmailAddress($this->createNullEmailAddress());

        $this->assertFalse($class->hasEmailAddress());
        $this->assertInstanceOf(NullEmailAddress::class, $class->getEmailAddress());
    }
}
