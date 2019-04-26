<?php

declare(strict_types=1);

namespace Nordic\EmailAddress;

/**
 * Email address aware trait
 *
 * @implements EmailAddressAwareInterface
 */
trait EmailAddressAwareTrait
{
    use EmailAddressProviderTrait;

    /**
     * Set email address value object
     */
    public function setEmailAddress(EmailAddressInterface $emailAddress): void
    {
        $this->emailAddress = $emailAddress;
    }
}
