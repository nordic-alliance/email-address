<?php

declare(strict_types=1);

namespace Nordic\EmailAddress;

/**
 * Immutable email address value object
 */
class EmailAddress implements EmailAddressInterface
{
    /** @var string */
    private $emailAddress;

    /**
     * Constructor
     *
     * @throws \Nordic\EmailAddress\InvalidEmailAddressException
     */
    public function __construct(string $emailAddress)
    {
        $this->emailAddress = Assertion::email($emailAddress);
    }

    /**
     * @inheritDoc
     */
    public function equals(EmailAddressInterface $emailAddress): bool
    {
        return $this->emailAddress === $emailAddress->emailAddress;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->emailAddress;
    }
}
