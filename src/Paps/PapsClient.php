<?php

namespace Paps;

use GuzzleHttp\Client;

class PapsClient
{
    /**
     * API Base URL
     */
    const API_BASE_PATH = 'https://api.papslogistics.com/';

    /**
     * API Version
     */
    const API_VERSION = 'v1';

    /**
     * HTTP Client
     *
     * @var
     */
    private $http;

    /**
     * Config
     *
     * @var array
     */
    private $config;

    /**
     * Paps_Client constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = array_merge(
            [
                'accessToken' => '',
                'paps_version' => '',
                'mode' => 'production',
                'base_path' => self::API_BASE_PATH,
            ],
            $config
        );
    }

    /**
     * Get ClientId
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set ClientId
     *
     * @param string $clientId
     *
     * @return Client
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * Get Client Secret
     *
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * Set Client Secret
     *
     * @param string $clientSecret
     *
     * @return Client
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;
        return $this;
    }

    public function getAccessToken($code = '')
    {
        if (!empty($code)) {
            $options = ['exceptions' => false];
            $options['base_url'] =
                $this->config['base_path'] . '/';
                $options['auth'] = [
                'clientId' => $this->getClientId(),
                'clientSecret' => $this->getClientSecret()
            ];

            $response = new Client($options);
            $this->setAccessToken(
                AccessToken::fromResponse($response)
            );
        }
        return $this->accessToken;
    }

    /**
     * Initiating HTTP Client
     *
     * @return Client
     */
    public function getHttpClient( $authentificate = false)
    {
        if (is_null($this->http)) {
            $options = ['exceptions' => false];
            $options['base_url'] =
                $this->config['base_path'] . '/';

            if($authentificate){

             $options['auth'] = 'Bearer ' . $this->config['accessToken'];
            //  $options['bearer'] = [
            //     "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7ImlzX2RlbGV0ZWQiOmZhbHNlLCJpc0FjdGl2ZSI6dHJ1ZSwiX2lkIjoiNjEwN2I2M2QzYzQ5OWMwMDIyODJhYzAzIiwiZmlyc3RfbmFtZSI6IlBhcGEgT3VzbWFuZSIsImxhc3RfbmFtZSI6Ik5ESUFZRSIsImVtYWlsIjoicGFwYW91c212bmUubmRpYXllQGdtYWlsLmNvbSIsInBob25lX251bWJlciI6IisyMjE3NzYwNjcxNzEiLCJjb3VudHJpZXMiOlt7Il9pZCI6IjYxMDdiNjNkM2M0OTljMDAyMjgyYWMwMiIsIm5hbWUiOiJTZW5lZ2FsIiwiY29kZSI6IlNOIn1dLCJyb2xlIjoiQURNSU4iLCJ1c2VyX2luZm9zIjp7ImNvbXBhbnlfdXNlcl9wcm9maWwiOiJBRE1JTiIsImNvbXBhbnlfdXNlcl9pc19kZWxldGVkIjpmYWxzZSwiX2lkIjoiNjEwN2I2M2QzYzQ5OWMwMDIyODJhYzAxIiwiY29tcGFueV91c2VyX2ZpcnN0bmFtZSI6IlBhcGEgT3VzbWFuZSIsImNvbXBhbnlfdXNlcl9sYXN0bmFtZSI6Ik5ESUFZRSIsImNvbXBhbnlfdXNlcl9lbWFpbCI6InBhcGFvdXNtdm5lLm5kaWF5ZUBnbWFpbC5jb20iLCJjb21wYW55X3VzZXJfam9iIjoiTUFOQUdFUiIsImNvbXBhbnlfdXNlcl9waG9uZV9udW1iZXIiOiIrMjIxNzc2MDY3MTcxIiwiY29tcGFueV91c2VyX2NyZWF0ZWRfYnkiOnsidXNlcl9pZCI6IjYwNDBlOTQxZjc2MmE1MDAyMjZlODIzZSIsInNvdXJjZSI6IlNUQUZGIn0sImNvdW50cmllcyI6W3siX2lkIjoiNjEwN2I2M2QzYzQ5OWMwMDIyODJhYzAyIiwibmFtZSI6IlNlbmVnYWwiLCJjb2RlIjoiU04ifV0sImNvbXBhbnlfdXNlcl9jbGllbnRJZCI6IjYxMDdiNjNkM2M0OTljMDAyMjgyYWJmZCIsImNvbXBhbnlfdXNlcl9jcmVhdGVkX2F0IjoiMjAyMS0wOC0wMlQwOTowOToxNy4wOTVaIiwiY29tcGFueV91c2VyX3VwZGF0ZWRfYXQiOiIyMDIxLTA4LTAyVDA5OjA5OjE3LjA5NloiLCJfX3YiOjAsImNvbXBhbnlfdXNlcl9sYXN0X2FjdGl2ZSI6IjIwMjItMDItMTdUMTA6MTY6MzUuMzg5WiJ9LCJ2ZXJpZmljYXRpb25Ub2tlbiI6bnVsbCwiY3JlYXRlZF9hdCI6IjIwMjEtMDgtMDJUMDk6MDk6MTcuMTA5WiIsImxhc3RfZWRpdGVkX2F0IjoiMjAyMS0wOC0wMlQwOTowOToxNy4xMDlaIiwiX192IjowLCJyZXNldFRva2VuIjpudWxsLCJ2ZXJpZmllZCI6IjIwMjEtMDgtMDJUMDk6MDk6MzMuOTMxWiIsInBhc3N3b3JkUmVzZXQiOiIyMDIxLTA5LTE2VDE2OjIyOjMyLjAyNFoifSwic291cmNlIjoiQ0xJRU5UIiwiY2xpZW50SUQiOiI2MTA3YjYzZDNjNDk5YzAwMjI4MmFiZmQiLCJpYXQiOjE2NDUwOTcwMjB9.saD_23vYKCS-mTz9InF5R8VzuchZ1oLBzYpYiFWEOSY
            //     ",
            //  ];

            }

            $this->http = new Client($options);
        }

        return $this->http;
    }

    /**
     * Get current config
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }
}
