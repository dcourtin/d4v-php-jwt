# Firebase/php-jwt for Laravel

This package provides a convenient way to use the lib firebase/php-jwt https://packagist.org/packages/firebase/php-jwt in Laravel.
- Call it via a facade
- Set up your configuration in a config file for convenience


## Installation
```
composer req d4v/php-jwt
php artisan vendor:publish --tag=config
```

## Config file
```
return [
    'issuer' => env('APP_URL', 'who-sent-the-token'),
    'secret' => env('JWT_SECRET', 'your-key-here'),
    'algo' => 'HS256',
    'ttl' => 3600, // Expiration en secondes
];
```

### This command can generate a key for you depending of your needs
```
php artisan key:generate --show
```

## How to use
### Simple way
In its simpler form, the lib can helps you generate a JWT this fast :
```
use D4v\JWT\Facades\JWT;
```
```
$token = JWT::encode(['sub'=> 1]);
```
But you can set your parameters entirely at the runtime if you want :
```
payload = [
    'iss' => 'https://mydomain.tld',
    'sub' => 1,
    'iat' => time(),
    'exp' => time() + 60 * 10
];
JWT::encode($payload);
```
Call the decode methode to restore the data :
```
JWT::decode($token);
```
More info about firebase/php-jwt can be found here :
https://packagist.org/packages/firebase/php-jwt
