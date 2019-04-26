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
}
