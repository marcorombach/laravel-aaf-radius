# laravel-aaf-radius

Simple Radius Authentication for 2FA Radius Servers like NetIQ AAF

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


## Credits

- [Marco Rombach](https://github.com/marcorombach)
- Uses parts of https://github.com/dapphp/radius
