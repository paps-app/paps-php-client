# PHP API Client for Paps

<!-- [![Build Status](https://travis-ci.org/aglipanci/Paps-api.svg?branch=master)](https://travis-ci.org/aglipanci/Paps-api) -->

A PHP client for consuming the Paps API.

## Install

Via Composer

```bash
$ composer require paps-app/paps-php-client
```

> Note that the minimum required version of PHP is 5.6

## Usage

### Create client

```php
$client = new Paps\PapsClient([
    'api_key' => 'production_or_test_api_key'
]);
```

_To retrieve an API Key, visit [here](https://developers.paps.sn) and hit the "get a key" button._

## WooCommerce Integration

[WooCommerce Paps Integration Plugin](https://wordpress.org/plugins/woocommerce-paps/)

## License

The [MIT License](https://opensource.org/licenses/MIT) (MIT).
