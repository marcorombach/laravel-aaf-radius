# laravel-aaf-radius

Simple Radius Authentication for 2FA Radius Servers like NetIQ AAF.
To use this package, the Laravel User Model needs at least a field named username.
It's recommended to define a post login route and a error route.
The error route is called with a flashed session variable (session('error')) containing information to display.

To configure this package with NetIQ Advanced Authentication, the NAS (RADIUS Client) has to be registered on the RADIUS Policy page. 
## Installation

Install the package via composer:

```bash
composer require marcorombach/laravel-aaf-radius
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="aaf-radius-config"
```

This is the contents of the published config file:

```php
return [
    'server' => '', //IP of the Radius Server
    'secret' => '', //Radius secret
    'nasip' => '', //IP of the webserver (Radius Client)
    'post-login-route' => '', //Route to redirect to after login - if not set you will be redirected to the base URL
    'error-route' => '', //Route to redirect to on login error - redirects with $error variable set
];
```
The first 3 options are required.


## Usage

```php
$radius = new LaravelAafRadius();
return $radius->authenticate($request->username, $request->password);
```

## Requirements

- PHP 7.4 or greater
- Laravel 8.0 or greater

## Credits
- [dapphp - RADIUS](https://github.com/dapphp/radius)
- [Marco Rombach](https://github.com/marcorombach)

