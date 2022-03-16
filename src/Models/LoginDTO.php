<?php

declare(strict_types=1);



namespace PapsAPILib\Models;

use stdClass;

class LoginDTO implements \JsonSerializable
{
    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $clientSecret;

    /**
     * @param string $clientId
     * @param string $clientSecret
     */
    public function __construct(string $clientId, string $clientSecret)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * Returns Client Id.
     *
     * The clientId of the user
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * Sets Client Id.
     *
     * The clientId of the user
     *
     * @required
     * @maps clientId
     */
    public function setClientId(string $clientId): void
    {
        $this->clientId = $clientId;
    }

    /**
     * Returns Client Secret.
     *
     * The clientSecret of the user
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    /**
     * Sets Client Secret.
     *
     * The clientSecret of the user
     *
     * @required
     * @maps clientSecret
     */
    public function setClientSecret(string $clientSecret): void
    {
        $this->clientSecret = $clientSecret;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        $json['clientId']     = $this->clientId;
        $json['clientSecret'] = $this->clientSecret;

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
