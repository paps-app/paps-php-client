# CreateTaskDTO

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | The type of job you want to create | 
**date_pickup** | **string** | Day to pickup the article | [default to '2022-03-18']
**time_pickup** | **string** | Time to pickup the article | 
**vehicle_type** | **string** | The type of vehicle used for the pickup | 
**address** | **string** | The address where the package is to be picked up | 
**receiver** | [**AllOfCreateTaskDTOReceiver**](AllOfCreateTaskDTOReceiver.md) | Receiver information | 
**parcels** | [**\Swagger\Client\Model\ParcelDTO[]**](ParcelDTO.md) | Add Parcels | 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

