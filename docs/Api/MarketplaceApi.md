# Swagger\Client\MarketplaceApi

All URIs are relative to */*

Method | HTTP request | Description
------------- | ------------- | -------------
[**marketplaceControllerGetRate**](MarketplaceApi.md#marketplacecontrollergetrate) | **POST** /marketplace | Get rate of the carrier

# **marketplaceControllerGetRate**
> \Swagger\Client\Model\InlineResponse2002 marketplaceControllerGetRate($body)

Get rate of the carrier

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\MarketplaceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \Swagger\Client\Model\RateDTO(); // \Swagger\Client\Model\RateDTO | 

try {
    $result = $apiInstance->marketplaceControllerGetRate($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MarketplaceApi->marketplaceControllerGetRate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\RateDTO**](../Model/RateDTO.md)|  |

### Return type

[**\Swagger\Client\Model\InlineResponse2002**](../Model/InlineResponse2002.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

