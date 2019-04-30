# Email Address immutable value object

![PHP version][ico-php-version]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
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
 * Include null email address value object (see [Null object pattern](link-null-object-pattern))
 * Include assertion class
 * Include factory class

## Basic classes

`EmailAddressInterface` - is the base interface for email address value objects.

`EmailAddress` - immutable email address value object that will be used most of the time.

`NullEmailAddress` - null email address value object (null object design pattern).

## Usage

```php
use Nordic\EmailAddress\EmailAddress;
use Nordic\EmailAddress\NullEmailAddress;

$emailAddress = new EmailAddress('email@example.com');
$nullEmailAddress = new NullEmailAddress;
```

For comparing two email address value objects we can use `equals` method:

```php
use Nordic\EmailAddress\EmailAddress;

$emailAddress = new EmailAddress('email@example.com');
$emailAddressSame = new EmailAddress('email@example.com');
$emailAddressAnother = new EmailAddress('another@example.com');

var_dump($emailAddress->equals($emailAddressSame)); // boolean true
var_dump($emailAddress->equals($emailAddressAnother)); // boolean false
```

### Exceptions

`InvalidEmailAddressException` - is a basic exception that you can use. The first argument is a string value.

```php
use Nordic\EmailAddress\InvalidEmailAddressException;

$email = 'wrong_email';
$e = new InvalidEmailAddressException($email, sprintf('Wrong email address value `%s`', $email));

var_dump($e->getMessage()); // string(45) "Wrong email address value `wrong_email`"
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

### Assertion class

The class `Assertion` can be used for checking some email and email address value object specific assertions. All methods will throw `InvalidEmailAddressException` if assertion will fails. You can always set a custom exception message as the second method argument.

#### `Assertion::email`

The method `Assertion::email` will fail in case if string value is not a valid email address.

```php
use Nordic\EmailAddress\Assertion;
use Nordic\EmailAddress\InvalidEmailAddressException;

$email = Assertion::email('email@example.com');
$email = Assertion::email('wrong_email'); // will throw InvalidEmailAddressException
```

#### `Assertion::notNull`

The method `Assertion::notNull` will fail in case if email address value object is null email address object.

```php
use Nordic\EmailAddress\Assertion;

$emailAddress = Assertion::notNull($emailAddress);
```

### Additional utility classes

#### Provider

Use interface `EmailAddressProviderInterface` and trait `EmailAddressProviderTrait` when the object should only provide email address value object (see [EmailAddressProviderTest.php](tests/EmailAddressProviderTest.php) for examples).

#### Aware

Use interface `EmailAddressAwareInterface` and trait `EmailAddressAwareTrait` when the object should aware about email address value object (see [EmailAddressAwareTest.php](tests/EmailAddressAwareTest.php) for examples).

## Examples

```php
use Nordic\EmailAddress\Assertion;
use Nordic\EmailAddress\EmailAddress;
use Nordic\EmailAddress\EmailAddressInterface;
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

try {
    $myClass = new MyClass(new EmailAddress('email@example.com'));
    $emailAddress = $myClass->getEmailAddress();
} catch (InvalidEmailAddressException $e) {
    // do something
}
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
[link-author]: https://github.com/DyaGa
[link-contributors]: ../../contributors

[link-null-object-pattern]: https://en.wikipedia.org/wiki/Null_object_pattern
