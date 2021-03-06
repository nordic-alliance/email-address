# Email Address immutable value object

![PHP version][ico-php-version]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]

This package represents an immutable email address value object and additional utility classes.

## Install

Via Composer

```bash
$ composer require nordic/email-address
```

## Features

 * Immutable value object
 * No dependencies
 * Include null email address value object (see [Null object pattern][link-null-object-pattern])
 * Include assertion class
 * Include factory class

## Basic classes and interfaces

`EmailAddressInterface` - is the base interface for email address value objects.

`EmailAddress` - immutable email address value object that will be used most of the time.

`NullEmailAddress` - null email address value object (null object design pattern).

## Usage

```php
use Nordic\EmailAddress\EmailAddress;
use Nordic\EmailAddress\NullEmailAddress;

$emailAddress = new EmailAddress('email@example.com');
$nullEmailAddress = new NullEmailAddress;

// Compare two email addresses
$emailAddressSame = new EmailAddress('email@example.com');
$emailAddressAnother = new EmailAddress('another@example.com');

var_dump($emailAddress->equals($emailAddressSame)); // boolean(true)
var_dump($emailAddress->equals($emailAddressAnother)); // boolean(false)
```

### Exceptions

`InvalidEmailAddressException` - is a basic exception that you can use. The first argument is a string value.

```php
use Nordic\EmailAddress\InvalidEmailAddressException;

$e = new InvalidEmailAddressException('wrong_email', 'Wrong email address');
var_dump($e->getEmailAddress()); // string(17) "wrong_email"
```

### Factory pattern

`EmailAddressFactoryInterface` - is the base interface for email address factory.

`EmailAddressFactory` - is the factory class that creates `EmailAddress` value objects.

```php
use Nordic\EmailAddress\EmailAddressFactory;

$factory = new EmailAddressFactory;
$emailAddress = $factory->createEmailAddress('email@example.com');
$nullEmailAddress = $factory->createEmailAddress();
$emailAddress = $factory->createEmailAddress('wrong_email'); // will throw InvalidEmailAddressException
```

### Assertion

The class `Assertion` can be used for checking if string value is an email address string or check if email address value object is not null object. All methods will throw `InvalidEmailAddressException` if assertion will fails. You can always set a custom exception message as the second method argument.

Available methods:

 * `Assertion::email` - will fail in case if string value is not a valid email address.
 * `Assertion::notNull` - will fail in case if email address value object is null email address object.

```php
use Nordic\EmailAddress\Assertion;

$email = Assertion::email('email@example.com');
$email = Assertion::email('wrong_email'); // will throw InvalidEmailAddressException

$emailAddress = Assertion::notNull($emailAddress);
// will throw InvalidEmailAddressException if $emailAddress is instance of NullEmailAddress
```

### Additional helpers

#### Provider interface and trait

Use interface `EmailAddressProviderInterface` and trait `EmailAddressProviderTrait` when the object should only provide email address value object (see [EmailAddressProviderTest.php](tests/EmailAddressProviderTest.php) for examples).

#### Aware intrerface and trait

Use interface `EmailAddressAwareInterface` and trait `EmailAddressAwareTrait` when the object should aware about email address value object (see [EmailAddressAwareTest.php](tests/EmailAddressAwareTest.php) for examples).

## Example

```php
use Nordic\EmailAddress\Assertion;
use Nordic\EmailAddress\EmailAddress;
use Nordic\EmailAddress\EmailAddressInterface;
use Nordic\EmailAddress\EmailAddressFactory;
use Nordic\EmailAddress\InvalidEmailAddressException;
use Nordic\EmailAddress\EmailAddressProviderInterface;
use Nordic\EmailAddress\EmailAddressProviderTrait;

class MyClass implements EmailAddressProviderInterface
{
    use EmailAddressProviderTrait;

    public function __construct(EmailAddressInterface $emailAddress)
    {
        $this->emailAddress = Assertion::notNull($emailAddress);
    }
}

$factory = new EmailAddressFactory;

try {
    $myClass = new MyClass($factory->createEmailAddress('email@example.com'));
} catch (InvalidEmailAddressException $e) {
    // do something
}

$emailAddress = $myClass->getEmailAddress();
```

## Testing

```bash
$ composer test
```

## Credits

- [Serhii Diahovchenko][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-php-version]: https://img.shields.io/travis/php-v/nordic-alliance/email-address.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/nordic-alliance/email-address/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/nordic-alliance/email-address.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/nordic-alliance/email-address.svg?style=flat-square

[link-travis]: https://travis-ci.org/nordic-alliance/email-address
[link-code-quality]: https://scrutinizer-ci.com/g/nordic-alliance/email-address
[link-scrutinizer]: https://scrutinizer-ci.com/g/nordic-alliance/email-address/code-structure
[link-author]: https://github.com/DyaGa
[link-contributors]: ../../contributors

[link-null-object-pattern]: https://en.wikipedia.org/wiki/Null_object_pattern
