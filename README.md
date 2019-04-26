# Email Address immutable value object

![PHP version][ico-php-version]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]

## Install

Via Composer

```bash
$ composer require nordic/email-address
```

## Usage

```php
use Nordic\EmailAddress\EmailAddress;

$emailAddress = new EmailAddress('email@example.com');
```

## Package content

### EmailAddress value object

Immutable email address value object that will be used most of the time.

```php
use Nordic\EmailAddress\EmailAddress;
use Nordic\EmailAddress\InvalidEmailAddressException;

try {
    $emailAddress = new EmailAddress('email@example.com');
} catch (InvalidEmailAddressException $e) {
    // invalid email value detected
}
```

### NullEmailAddress value object

Null email address value object (null object design pattern).

```php
use Nordic\EmailAddress\NullEmailAddress;

$emailAddress = new NullEmailAddress;
```

### Assertion class

The class `Assertion` can be used for checking some email and email address value object specific assertions. All methods will throw `InvalidEmailAddressException` if assertion will fails. You can always set a custom exception message as the second method argument.

Available methods:

#### Assertion::email

This method will fail in case if string value is not a valid email address.

```php
use Nordic\EmailAddress\Assertion;
use Nordic\EmailAddress\InvalidEmailAddressException;

try {
    Assertion::email('email@example.com');
} catch (InvalidEmailAddressException $e) {
    // invalid email value detected
}
```

#### Assertion::notNull

This method will fail in case if email address value object is null email address object.

```php
use Nordic\EmailAddress\Assertion;
use Nordic\EmailAddress\InvalidEmailAddressException;

try {
    Assertion::notNull($emailAddress);
} catch (InvalidEmailAddressException $e) {
    // $emailAddress is nullable
}
```

### InvalidEmailAddressException

This is a basic exception that you can use. The first argument is a string email address value.

```php
use Nordic\EmailAddress\InvalidEmailAddressException;

try {
    $email = 'email_example.com';
    throw new InvalidEmailAddressException($email, sprintf('Wrong email address value `%s`', $email));
} catch (InvalidEmailAddressException $e) {
    var_dump($e->getMessage());
    // string(45) "Wrong email address value `email_example.com`"
    var_dump($e->getEmailAddress());
    // string(17) "email_example.com"
}
```

### EmailAddressInterface

The basic interface for email address value objects.

### EmailAddressProviderInterface / EmailAddressProviderTrait

Use this interface and trait when the object should only provide email address value object (see [EmailAddressProviderTest.php](tests/EmailAddressProviderTest.php) for examples).

### EmailAddressAwareInterface / EmailAddressAwareTrait

Use this interface when the object should aware about email address value object (see [EmailAddressAwareTest.php](tests/EmailAddressAwareTest.php) for examples).

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
[link-scrutinizer]: https://scrutinizer-ci.com/g/nordic-alliance/email-address/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/nordic-alliance/email-address
[link-author]: https://github.com/DyaGa
[link-contributors]: ../../contributors
