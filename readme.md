# PHP API Client for Paps

<!-- [![Build Status](https://travis-ci.org/aglipanci/Paps-api.svg?branch=master)](https://travis-ci.org/aglipanci/Paps-api) -->

A PHP client for consuming the [Paps API](https://developers.papslogistics.com/).

_This client is targeting the API version v2_.

## Install

Via Composer

```bash
$ composer require paps-app/paps-php-client
```

> The minimum required version of PHP is 5.6

## Usage

All the method listed below are the same documented on the RESTful API, so this guide won't be covering any params required for each method. Please, yout can however refer to the Examples sections.

### Create the client

First you'll need to initialize the client by providing your API. To get an API, visit [the documentation](https://developers.paps.sn/) and click on "Get a Key" button.

```php
$client = new Paps\PapsClient([
  'api_key' => '<Your API Key>'
]);
```

### Enter Test Mode

Please consider entering test mode when starting to experiment with this API. Note that under test mode, you have full control over your tasks. You can create, cancel, change your task statues or even delete them. But remember to hack responsibly 😉.

```php
$client = new Paps\PapsClient([
  'api_key' => '<Your API Key>',
  'mode' => 'test'
]);
```

### Create a delivery request linked to your main account on [Monespace](https://monespace.paps.sn/)

- Method : [`$delivery->createTaskForAPIUser($email = string, array $delivery_params = [], array $pickup_params = [])`](https://developers.paps.sn/create#cr%C3%A9ation-de-t%C3%A2ches-avec-suivi-sur-monespace)

You can use this method if you also want to track your orders on the Monespace web client application. Note that you must specify the email address of the account that has access to the application. Again, make sure to read the documentation for params expected by this method

- Example :

```php
$delivery = new Paps\Resources\Delivery($client);

// Email registered on your Monespace account
$email = "kiamet@example.com"

// Prepare your pickups params
$pickups = [
    [
        "address" => "Almadies, Dakar, Senegal",
        "name" => "Saliou Samb",
        "time" => date('Y-m-d H:i:s', time()),
        "phone" => "+221700000000",
        "job_description" => "Test Saliou"
    ]
];

// Prepare your delivery params
$deliveries = [
    [
        "address" => "Medina, Dakar, Senegal",
        "name" => "Modou Diakahté",
        "time" => date('Y-m-d H:i:s', time()),
        "phone" => "+221700000000",
        "job_description" => "Test Saliou"
    ]
];

// Pass your request
$response = $delivery->createTaskForAPIUser($email, $pickups, $deliveries);

// Read your response, hopefully successful.
echo json_encode($response);
```


### Create a standard [Delivery Request with a pickup](https://developers.paps.sn/create)

- Method : [`$delivery->create(array $delivery_params = []);`](https://developers.paps.sn/create#cr%C3%A9er-une-t%C3%A2che-de-pickup-et-delivery-li%C3%A9s)

Make sure to read the documentation before sending any requests.

- Example :

```php
$delivery = new Paps\Resources\Delivery($client);

// Prepare your params
$delivery_params = [
  'jobDescription' => 'Commande venant du site de Test',
  'jobPickupPhone' => '778888888',
  'jobPickupName' => 'Test Pickup Name',
  'jobPickupAddress' => 'Medina, Dakar, Sénégal',
  'jobPickupDatetime' => '2019-01-12 12:00:00',
  'jobDeliveryDatetime' => '2019-01-14 12:00:00',
  'customerUsername' => 'Test Delivery Name',
  'customerAddress' => 'Urbam, Dakar, Sénégal',
  'customerPhone' => '779999999'
];

// Pass your request
$response = $delivery->create($delivery_params);

// Read your response, hopefully successful.
echo json_encode($response);
```

### Make a delivery [quote request](https://developers.paps.sn/get-quotes)

- Method : [`$delivery->submitQuotesRequest(array $quotes_params = [])`](https://developers.paps.sn/get-quotes#requ%C3%AAte-pour-obtenir-un-tarif)

You can get delivery quotes directly from the API. Usually, the rates are already communicated to you through the contract that you have approved or signed to start using Paps.

- Example :

```php
$delivery = new Paps\Resources\Delivery($client);

// Prepare your request params
$quotes_params = [
  "origin" => "Medina, Dakar, Senegal",
  "destination" => "Almadies, Dakar, Senegal",
  "packageSize" => "small"
];

// Pass your request
$response = $delivery->submitQuotesRequest($quotes_params);

// Read your response, hopefully successful.
echo json_encode($response);
```

### Read a delivery [task's information](https://developers.paps.sn/handle)

- Method : [`$delivery->get($task_id = string)`](https://developers.paps.sn/handle#visualiser-les-infos-sur-une-t%C3%A2che)

You can view a task that has been created using this method.

- Example :

```php
$delivery = new Paps\Resources\Delivery($client);

// Prepare your request params
$task_id = "7233112";

// Pass your request
$response = $delivery->get($task_id);

// Read your response, hopefully successful.
echo json_encode($response);
```

### Get a [list of delivery](https://developers.paps.sn/handle#visualiser-les-t%C3%A2ches-cr%C3%A9%C3%A9es-avec-votre-cl%C3%A9-api)

- Method : [`$delivery->listDeliveries($date = string, $start_date = string, $end_date = string, $select_by = string)`](https://developers.paps.sn/handle#visualiser-les-t%C3%A2ches-cr%C3%A9%C3%A9es-avec-votre-cl%C3%A9-api)

You can view a task that has been created using this method.

- Example :

```php
$delivery = new Paps\Resources\Delivery($client);

// Prepare your request params
$start_date = date('Y-m-d H:i:s'),
$end_date = date('Y-m-d H:i:s'),
$select_by = "intervalle"

// Pass your request
$response = $delivery->listDeliveries(null, $start_date, $end_date, $select_by);

// Read your response, hopefully successful.
echo json_encode($response);
```

### [Cancel a delivery](https://developers.paps.sn/handle#annuler-une-t%C3%A2che)

- Method : [`$delivery->cancel($task_id = string)`](https://developers.paps.sn/handle#annuler-une-t%C3%A2che)

You can cancel a task by providing it's ID. Remember you can't cancel a task that has the following status : IN_PROGRESS and STARTED.

- Example :

```php
$delivery = new Paps\Resources\Delivery($client);

// Prepare your request params
$task_id = "7233112";

// Pass your request
$response = $delivery->cancel($task_id);

// Read your response, hopefully successful.
echo json_encode($response);
```

## WooCommerce Integration

[WooCommerce Paps Integration Plugin](https://wordpress.org/plugins/woocommerce-paps/)

## License

The [MIT License](https://opensource.org/licenses/MIT) (MIT).
