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
}
