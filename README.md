# Laravel Steam Auth

This package adds Steam OpenID to Laravel and utalises the Laravel Authentication service for creating users.

##Installing via Composer
Run `composer require cullenio/laravel-steam-auth`.

Add the service provider to `app/config/app.php` in the `providers` array.
```php
'providers' => [
  // ...
  Cullenio\SteamAuth\Providers\SteamAuthServiceProvider::class,
]
```

Finally, publish the config file.
```
php artisan vendor:publish
```

##Routes
Login: `/login`

Login Done: `/login/done`

##User
After login, the `$user->name` is checked against the Steam ID. If it exists, the user is then logged in. If not, a user will be created and then logged in.

##Config
```php
return [
    "domain" => env('STEAMAUTH_DOMAIN'),    // The domain shown on Steam Login
    "realm" => env('STEAMAUTH_REALM'),      // The domain of the site that the authentication is happening on
    "redirect" => env('STEAMAUTH_REDIRECT') // The path after a successful login
];
```
