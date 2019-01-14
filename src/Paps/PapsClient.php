<?php

namespace Paps;

use GuzzleHttp\Client;

class PapsClient
{
  /**
   * API Base URL
   */
  const API_BASE_PATH = 'https://api.paps.sn/api/';

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
        'api_key' => '',
        'paps_version' => '',
        'mode' => 'production',
        'base_path' => self::API_BASE_PATH,
        'api_version' => self::API_VERSION
      ],
      $config
    );
  }

  /**
   * Initiating HTTP Client
   *
   * @return Client
   */
  public function getHttpClient()
  {
    if (is_null($this->http)) {
      $options = ['exceptions' => false];
      $options['base_uri'] =
        $this->config['base_path'] . $this->config['api_version'] . '/';

      if (!empty($this->config['paps_version'])) {
        $options['headers'] = [
          'X-Paps-Version' => $this->config['paps_version']
        ];
      }

      $options['auth'] = [$this->config['api_key'], ''];

      $this->http = new Client($options);
    }

    return $this->http;
  }

  /**
   * Get current config
   *
   * @return array
   */
  public function getConfig()
  {
    return $this->config;
  }
}
