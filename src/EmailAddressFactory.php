<?php

namespace Nordic\EmailAddress;

/**
 * Email address factory class
 */
final class EmailAddressFactory implements EmailAddressFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createEmailAddress(string $email = ''): EmailAddressInterface
    {
        return $email ? new EmailAddress($email) : new NullEmailAddress;
    }
}
