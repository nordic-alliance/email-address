<?php

declare(strict_types=1);

namespace Nordic\EmailAddress;

/**
 * Class NullEmailAddress
 */
final class NullEmailAddress implements EmailAddressInterface
{
    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return '';
    }
}
