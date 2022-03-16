<?php

declare(strict_types=1);



namespace PapsAPILib;

use PapsAPILib\Controllers;

/**
 * PapsAPILib client class
 */
class PapsAPIClient implements ConfigurationInterface
{
    private $client;
    private $auth;
    private $tasks;
    private $marketplace;

    private $timeout = ConfigurationDefaults::TIMEOUT;
    private $enableRetries = ConfigurationDefaults::ENABLE_RETRIES;
    private $numberOfRetries = ConfigurationDefaults::NUMBER_OF_RETRIES;
    private $retryInterval = ConfigurationDefaults::RETRY_INTERVAL;
    private $backOffFactor = ConfigurationDefaults::BACK_OFF_FACTOR;
    private $maximumRetryWaitTime = ConfigurationDefaults::MAXIMUM_RETRY_WAIT_TIME;
    private $retryOnTimeout = ConfigurationDefaults::RETRY_ON_TIMEOUT;
    private $httpStatusCodesToRetry = ConfigurationDefaults::HTTP_STATUS_CODES_TO_RETRY;
    private $httpMethodsToRetry = ConfigurationDefaults::HTTP_METHODS_TO_RETRY;
    private $environment = ConfigurationDefaults::ENVIRONMENT;
    private $defaultHost = ConfigurationDefaults::DEFAULT_HOST;
    private $accessToken = ConfigurationDefaults::ACCESS_TOKEN;
    private $bearerAuthManager;
    private $authManagers = [];
    private $httpCallback;

    public function __construct(array $configOptions = null)
    {
        if (isset($configOptions['timeout'])) {
            $this->timeout = $configOptions['timeout'];
        }
        if (isset($configOptions['enableRetries'])) {
            $this->enableRetries = $configOptions['enableRetries'];
        }
        if (isset($configOptions['numberOfRetries'])) {
            $this->numberOfRetries = $configOptions['numberOfRetries'];
        }
        if (isset($configOptions['retryInterval'])) {
            $this->retryInterval = $configOptions['retryInterval'];
        }
        if (isset($configOptions['backOffFactor'])) {
            $this->backOffFactor = $configOptions['backOffFactor'];
        }
        if (isset($configOptions['maximumRetryWaitTime'])) {
            $this->maximumRetryWaitTime = $configOptions['maximumRetryWaitTime'];
        }
        if (isset($configOptions['retryOnTimeout'])) {
            $this->retryOnTimeout = $configOptions['retryOnTimeout'];
        }
        if (isset($configOptions['httpStatusCodesToRetry'])) {
            $this->httpStatusCodesToRetry = $configOptions['httpStatusCodesToRetry'];
        }
        if (isset($configOptions['httpMethodsToRetry'])) {
            $this->httpMethodsToRetry = $configOptions['httpMethodsToRetry'];
        }
        if (isset($configOptions['environment'])) {
            $this->environment = $configOptions['environment'];
        }
        if (isset($configOptions['defaultHost'])) {
            $this->defaultHost = $configOptions['defaultHost'];
        }
        if (isset($configOptions['accessToken'])) {
            $this->accessToken = $configOptions['accessToken'];
        }
        if (isset($configOptions['httpCallback'])) {
            $this->httpCallback = $configOptions['httpCallback'];
        }

        $this->bearerAuthManager = new BearerAuthManager($this->accessToken);
        $this->authManagers['global'] = $this->bearerAuthManager;
    }

    /**
     * Get the client configuration as an associative array
     */
    public function getConfiguration(): array
    {
        $configMap = [];

        if (isset($this->timeout)) {
            $configMap['timeout'] = $this->timeout;
        }
        if (isset($this->enableRetries)) {
            $configMap['enableRetries'] = $this->enableRetries;
        }
        if (isset($this->numberOfRetries)) {
            $configMap['numberOfRetries'] = $this->numberOfRetries;
        }
        if (isset($this->retryInterval)) {
            $configMap['retryInterval'] = $this->retryInterval;
        }
        if (isset($this->backOffFactor)) {
            $configMap['backOffFactor'] = $this->backOffFactor;
        }
        if (isset($this->maximumRetryWaitTime)) {
            $configMap['maximumRetryWaitTime'] = $this->maximumRetryWaitTime;
        }
        if (isset($this->retryOnTimeout)) {
            $configMap['retryOnTimeout'] = $this->retryOnTimeout;
        }
        if (isset($this->httpStatusCodesToRetry)) {
            $configMap['httpStatusCodesToRetry'] = $this->httpStatusCodesToRetry;
        }
        if (isset($this->httpMethodsToRetry)) {
            $configMap['httpMethodsToRetry'] = $this->httpMethodsToRetry;
        }
        if (isset($this->environment)) {
            $configMap['environment'] = $this->environment;
        }
        if (isset($this->defaultHost)) {
            $configMap['defaultHost'] = $this->defaultHost;
        }
        if ($this->bearerAuthManager->getAccessToken() !== null) {
            $configMap['accessToken'] = $this->bearerAuthManager->getAccessToken();
        }
        if (isset($this->httpCallback)) {
            $configMap['httpCallback'] = $this->httpCallback;
        }

        return $configMap;
    }

    /**
     * Clone this client and override given configuration options
     */
    public function withConfiguration(array $configOptions): self
    {
        return new self(\array_merge($this->getConfiguration(), $configOptions));
    }

    public function getTimeout(): int
    {
        return $this->timeout;
    }

    public function shouldEnableRetries(): bool
    {
        return $this->enableRetries;
    }

    public function getNumberOfRetries(): int
    {
        return $this->numberOfRetries;
    }

    public function getRetryInterval(): float
    {
        return $this->retryInterval;
    }

    public function getBackOffFactor(): float
    {
        return $this->backOffFactor;
    }

    public function getMaximumRetryWaitTime(): int
    {
        return $this->maximumRetryWaitTime;
    }

    public function shouldRetryOnTimeout(): bool
    {
        return $this->retryOnTimeout;
    }

    public function getHttpStatusCodesToRetry(): array
    {
        return $this->httpStatusCodesToRetry;
    }

    public function getHttpMethodsToRetry(): array
    {
        return $this->httpMethodsToRetry;
    }

    public function getEnvironment(): string
    {
        return $this->environment;
    }

    public function getDefaultHost(): string
    {
        return $this->defaultHost;
    }

    public function getBearerAuthCredentials(): ?BearerAuthCredentials
    {
        return $this->bearerAuthManager;
    }

    /**
     * Get the base uri for a given server in the current environment
     *
     * @param  string $server Server name
     *
     * @return string         Base URI
     */
    public function getBaseUri(string $server = Server::DEFAULT_): string
    {
        return ApiHelper::appendUrlWithTemplateParameters(
            static::ENVIRONMENT_MAP[$this->environment][$server],
            [
                'defaultHost' => $this->defaultHost,
            ],
            false
        );
    }

    /**
     * Returns API Controller
     */
    public function getAPIController(): Controllers\APIController
    {
        if ($this->client == null) {
            $this->client = new Controllers\APIController($this, $this->authManagers, $this->httpCallback);
        }
        return $this->client;
    }

    /**
     * Returns Auth Controller
     */
    public function getAuthController(): Controllers\AuthController
    {
        if ($this->auth == null) {
            $this->auth = new Controllers\AuthController($this, $this->authManagers, $this->httpCallback);
        }
        return $this->auth;
    }

    /**
     * Returns Tasks Controller
     */
    public function getTasksController(): Controllers\TasksController
    {
        if ($this->tasks == null) {
            $this->tasks = new Controllers\TasksController($this, $this->authManagers, $this->httpCallback);
        }
        return $this->tasks;
    }

    /**
     * Returns Marketplace Controller
     */
    public function getMarketplaceController(): Controllers\MarketplaceController
    {
        if ($this->marketplace == null) {
            $this->marketplace = new Controllers\MarketplaceController(
                $this,
                $this->authManagers,
                $this->httpCallback
            );
        }
        return $this->marketplace;
    }

    /**
     * A map of all baseurls used in different environments and servers
     *
     * @var array
     */
    private const ENVIRONMENT_MAP = [
        Environment::PRODUCTION => [
            Server::DEFAULT_ => 'https://{defaultHost}',
        ],
    ];
}
