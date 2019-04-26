<?php

declare(strict_types=1);

namespace Nordic\EmailAddress;

/**
 * InvalidEmailAddressException class
 */
class InvalidEmailAddressException extends \InvalidArgumentException
{
    /**
     * Email address value
     *
     * @var string
     */
    private $emailAddress;

    /**
     * @inheritDoc
     */
    public function __construct(string $emailAddress, string $message = '', int $code = 0, \Throwable $previous = null)
    {
        $this->emailAddress = $emailAddress;
        parent::__construct($message, $code, $previous);
    }

    /**
     * Get email address value
     */
    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }
}
