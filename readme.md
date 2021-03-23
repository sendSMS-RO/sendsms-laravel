# SendsmsLaravel
[![Total Downloads][ico-downloads]][link-downloads]

## Installation

Via Composer

``` bash
$ composer require sendsms/sendsms-laravel
```

## Usage

In your .env file, add this variables: 
```
SENDSMS_USERNAME 
SENDSMS_PASSWORD
```

If you do not have an account, you can register [here](https://hub.sendsms.ro/register)
If you need to see a full list of examples of our package, please go to our [API Documentation](https://www.sendsms.ro/api/?php--laravel).

| Namespace |
| --------- |
[SendSMS\SendsmsLaravel\API\AddressBook](https://www.sendsms.ro/api/?php--laravel#address-book) 
[SendSMS\SendsmsLaravel\API\Batch](https://www.sendsms.ro/api/?php--laravel#batch) 
[SendSMS\SendsmsLaravel\API\Blocklist](https://www.sendsms.ro/api/?php--laravel#blocklist) 
[SendSMS\SendsmsLaravel\API\HLR](https://www.sendsms.ro/api/?php--laravel#hlr) 
[SendSMS\SendsmsLaravel\API\Message](https://www.sendsms.ro/api/?php--laravel#message) 
[SendSMS\SendsmsLaravel\API\MNP](https://www.sendsms.ro/api/?php--laravel#mnp) 
[SendSMS\SendsmsLaravel\API\User](https://www.sendsms.ro/api/?php--laravel#user) 
[SendSMS\SendsmsLaravel\API\Other](https://www.sendsms.ro/api/?php--laravel#other) 

### How to send a message

Include the Message namespace at the beggining of your php file

``` php
use SendSMS\SendsmsLaravel\API\Message;
```

to call the function, run:

``` php
$api = new Message();
$api->message_send('40727363767', 'This is a message', '1898');
```

## Security

If you discover any security related issues, please email catalin@sendsms.ro instead of using the issue tracker.

## Credits

- Radu Vasile Catalin

[ico-downloads]: https://img.shields.io/packagist/dt/sendsms/sendsms-laravel.svg?style=flat-square

[link-downloads]: https://packagist.org/packages/sendsms/sendsms-laravel
