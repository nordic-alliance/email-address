<?php

declare(strict_types=1);

namespace Nordic\EmailAddress;

/**
 * Email address provider trait
 *
 * @implements EmailAddressProviderInterface
 */
trait EmailAddressProviderTrait
{
    /**
     * @var EmailAddressInterface
     */
    protected $emailAddress;

    /**
     * @inheritDoc
     */
    public function getEmailAddress(): EmailAddressInterface
    {
        if (!$this->hasEmailAddress()) {
            $this->emailAddress = new NullEmailAddress;
        }

        return $this->emailAddress;
    }

    /**
     * @inheritDoc
     */
    public function hasEmailAddress(): bool
    {
        return $this->emailAddress instanceof EmailAddressInterface && !$this->emailAddress instanceof NullEmailAddress;
    }
}
