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

### Create a Delivery

```php
$delivery = new Paps\Resources\Delivery($client);

$params = [
    'jobDescription'   => 'Commande venant du site de Test',
    'jobPickupPhone' => '778888888',
    'jobPickupName' => 'Test Pickup Name',
    'jobPickupAddress' => 'Medina, Dakar, Sénégal',
    'jobPickupDatetime' => '2019-01-12 12:00:00',
    'jobDeliveryDatetime' => '2019-01-14 12:00:00',
    'customerUsername' => 'Test Delivery Name',
    'customerAddress' => 'Urbam, Dakar, Sénégal',
    'customerPhone' => '779999999'
];

$delivery->create($params);
```

## WooCommerce Integration

[WooCommerce Paps Integration Plugin](https://wordpress.org/plugins/woocommerce-paps/)

## License

The [MIT License](https://opensource.org/licenses/MIT) (MIT).
