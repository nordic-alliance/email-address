<?php

declare(strict_types=1);

namespace Nordic\EmailAddress;

/**
 * Assertion class
 */
final class Assertion
{
    public static function email(string $email, string $message = ''): string
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailAddressException($email, $message ?: sprintf('Expected valid email address string. Got: `%s`', $email));
        }

        return $email;
    }

    public static function notNull(EmailAddressInterface $emailAddress, string $message = ''): EmailAddressInterface
    {
        if ($emailAddress instanceof NullEmailAddress) {
            throw new InvalidEmailAddressException((string)$emailAddress, $message ?: 'Null email address is not allowed');
        }

        return $emailAddress;
    }
}
