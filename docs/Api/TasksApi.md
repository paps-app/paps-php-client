# Swagger\Client\TasksApi

All URIs are relative to */*

Method | HTTP request | Description
------------- | ------------- | -------------
[**tasksControllerCreateTask**](TasksApi.md#taskscontrollercreatetask) | **POST** /tasks | Create Task 🐻

# **tasksControllerCreateTask**
> \Swagger\Client\Model\InlineResponse2001 tasksControllerCreateTask($body)

Create Task 🐻

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Swagger\Client\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Swagger\Client\Api\TasksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\CreateTaskDTO(); // \Swagger\Client\Model\CreateTaskDTO | 

try {
    $result = $apiInstance->tasksControllerCreateTask($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TasksApi->tasksControllerCreateTask: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\CreateTaskDTO**](../Model/CreateTaskDTO.md)|  |

### Return type

[**\Swagger\Client\Model\InlineResponse2001**](../Model/InlineResponse2001.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

