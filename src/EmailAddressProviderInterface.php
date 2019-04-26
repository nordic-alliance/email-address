<?php

declare(strict_types=1);

namespace Nordic\EmailAddress;

/**
 * Email address provider interface
 */
interface EmailAddressProviderInterface
{
    /**
     * Get email address value object
     */
    public function getEmailAddress(): EmailAddressInterface;

    /**
     * Return true if object has email address (not NullEmailAddress)
     */
    public function hasEmailAddress(): bool;
}
