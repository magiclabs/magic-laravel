# Magic Admin Laravel SDK

This package provides direct Laravel integration for [Magic Admin PHP SDK](https://github.com/magiclabs/magic-admin-php).

## Requirements

Laravel 5.3 or newer.

## Installation

Run this command to install via composer.

```
composer require magiclabs/magic-laravel
```

## Older Laravel Installations

If you are using Laravel 5.5 or newer then skip this part. Otherwise you will need to manually register the service provider and facade alias by going to `config/app.php`.

Add to the `providers` array:

```
MagicLaravel\ServiceProvider::class
```

Add to the `aliases` array:

```
'Magic' => MagicLaravel\Facade::class,
```

## Setup

Publish config file.

```
php artisan vendor:publish --provider="MagicLaravel\ServiceProvider"
```

Add `MAGIC_SECRET_API_KEY` to your **.env** file by going to the [Magic Dashboard](https://dashboard.magic.link).

```
MAGIC_SECRET_API_KEY=sk_XXXX_XXXXXXXXXXXXXXXX
```

## Usage

For complete documenation see [Magic Admin PHP SDK](https://github.com/magiclabs/magic-admin-php) and the [Magic docs](https://docs.magic.link/admin-sdk/php/get-started).

Get instance using the app helper:

```
$magic = app('MagicLaravel\Magic');

$magic->token->validate('<DID_Token>');

$magic->user->get_metadata_by_token('<DID_Token>');
```

Or get instance using the facade:

```
use Magic;

Magic::token()->validate('<DID_Token>');

Magic::user()->get_metadata_by_token('<DID_Token>');
```





