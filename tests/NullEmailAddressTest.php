<?php

declare(strict_types=1);

namespace NordicTest\EmailAddress;

use Nordic\EmailAddress\NullEmailAddress;

final class NullEmailAddressTest extends TestCase
{
    public function testNullEmailAddress()
    {
        $emailAddress = $this->createNullEmailAddress();

        $this->assertSame('', (string)$emailAddress);
    }

    public function testNullEmailAddressEquals()
    {
        $emailAddress = $this->createNullEmailAddress();
        $emailAddressAnother = $this->createNullEmailAddress();

        $this->assertTrue($emailAddress->equals($emailAddressAnother));
    }

    public function testNullEmailAddressNotEquals()
    {
        $emailAddress = $this->createNullEmailAddress();
        $emailAddressAnother = $this->createValidEmailAddress();

        $this->assertFalse($emailAddress->equals($emailAddressAnother));
    }
}
