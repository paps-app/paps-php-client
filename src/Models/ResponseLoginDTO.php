<?php

declare(strict_types=1);



namespace PapsAPILib\Models;

use stdClass;

class ResponseLoginDTO implements \JsonSerializable
{
    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $expiration;

    /**
     * @param string $token
     * @param string $expiration
     */
    public function __construct(string $token, string $expiration)
    {
        $this->token = $token;
        $this->expiration = $expiration;
    }

    /**
     * Returns Token.
     *
     * The token of the user
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * Sets Token.
     *
     * The token of the user
     *
     * @required
     * @maps token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     * Returns Expiration.
     *
     * The expiration of the token
     */
    public function getExpiration(): string
    {
        return $this->expiration;
    }

    /**
     * Sets Expiration.
     *
     * The expiration of the token
     *
     * @required
     * @maps expiration
     */
    public function setExpiration(string $expiration): void
    {
        $this->expiration = $expiration;
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
        $json['token']      = $this->token;
        $json['expiration'] = $this->expiration;

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
