<?php

declare(strict_types=1);

namespace Nordic\EmailAddress;

/**
 * Interface EmailAddressInterface
 */
interface EmailAddressInterface
{
    /**
     * Return true if current instance equals to $emailAddress instance
     */
    public function equals(EmailAddressInterface $emailAddress): bool;

    /**
     * Returns a string representation of the object.
     */
    public function __toString(): string;
}
