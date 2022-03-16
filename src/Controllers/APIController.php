<?php

declare(strict_types=1);



namespace PapsAPILib\Controllers;

use PapsAPILib\Exceptions\ApiException;
use PapsAPILib\ApiHelper;
use PapsAPILib\ConfigurationInterface;
use PapsAPILib\Http\HttpRequest;
use PapsAPILib\Http\HttpResponse;
use PapsAPILib\Http\HttpMethod;
use PapsAPILib\Http\HttpContext;
use PapsAPILib\Http\HttpCallBack;
use Unirest\Request;

class APIController extends BaseController
{
    public function __construct(ConfigurationInterface $config, array $authManagers, ?HttpCallBack $httpCallBack)
    {
        parent::__construct($config, $authManagers, $httpCallBack);
    }

    /**
     * @return void Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function appControllerHealthCheck(): void
    {
        //prepare query string for API call
        $_queryBuilder = '/healthcheck';

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => self::$userAgent
        ];

        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::get($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders());
        } catch (\Unirest\Exception $ex) {
            throw new ApiException($ex->getMessage(), $_httpRequest);
        }


        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpRequest);
    }
}
