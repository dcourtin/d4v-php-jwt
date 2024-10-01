# php-jwt for Laravel

This package provides a convenient way to use the lib firebase/php-jwt https://packagist.org/packages/firebase/php-jwt in Laravel.
- Call methods via facade
- Set up your configuration in a config file for convenience


## Installation
```SHELL
composer req d4v/php-jwt
```

## Configuration
```shell
php artisan vendor:publish --tag=config
```
```php
return [
    'issuer' => env('APP_URL', 'who-sent-the-token'),
    'secret' => env('JWT_SECRET', 'your-key-here'),
    'algo' => 'HS256',
    'ttl' => 3600, // Expiration in seconds
];
```

### This command can generate a key for you depending of your needs
```shell
php artisan key:generate --show
```

## How to use
### Simple way
In its simplest form, the lib can help you generate a JWT this fast:
```php
use D4v\JWT\Facades\JWT;

$token = JWT::encode(['sub'=> 1]);
```
You can also set your parameters entirely at runtime if needed:
```php
payload = [
    'iss' => 'https://mydomain.tld',
    'sub' => 1,
    'iat' => time(),
    'exp' => time() + 60 * 10
];

JWT::encode($payload);
```
Call the ``decode()`` method to restore the data :
```php
$decoded = JWT::decode($token);
```
More info about firebase/php-jwt can be found here :
https://packagist.org/packages/firebase/php-jwt
