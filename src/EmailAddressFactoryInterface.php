<?php

namespace Nordic\EmailAddress;

/**
 * Interface EmailAddressFactoryInterface
 */
interface EmailAddressFactoryInterface
{
    /**
     * Create a new email address.
     *
     * @throws InvalidEmailAddressException If the given email is not email address.
     */
    public function createEmailAddress(string $email = ''): EmailAddressInterface;
}
