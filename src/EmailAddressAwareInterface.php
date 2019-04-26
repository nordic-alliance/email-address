<?php

declare(strict_types=1);

namespace Nordic\EmailAddress;

/**
 * Email address aware interface
 */
interface EmailAddressAwareInterface extends EmailAddressProviderInterface
{
    /**
     * Set email address value object
     */
    public function setEmailAddress(EmailAddressInterface $emailAddress);
}
