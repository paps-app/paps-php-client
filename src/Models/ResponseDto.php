<?php

declare(strict_types=1);



namespace PapsAPILib\Models;

use stdClass;

class ResponseDto implements \JsonSerializable
{
    /**
     * @var float
     */
    private $code;

    /**
     * @var string
     */
    private $message;

    /**
     * @var array
     */
    private $error;

    /**
     * @param float $code
     * @param string $message
     * @param array $error
     */
    public function __construct(float $code, string $message, array $error)
    {
        $this->code = $code;
        $this->message = $message;
        $this->error = $error;
    }

    /**
     * Returns Code.
     *
     * The statusCode of the SuccessResponse
     */
    public function getCode(): float
    {
        return $this->code;
    }

    /**
     * Sets Code.
     *
     * The statusCode of the SuccessResponse
     *
     * @required
     * @maps code
     */
    public function setCode(float $code): void
    {
        $this->code = $code;
    }

    /**
     * Returns Message.
     *
     * The message of the SuccessResponse
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Sets Message.
     *
     * The message of the SuccessResponse
     *
     * @required
     * @maps message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * Returns Error.
     *
     * The error of the ErrorResponse
     */
    public function getError(): array
    {
        return $this->error;
    }

    /**
     * Sets Error.
     *
     * The error of the ErrorResponse
     *
     * @required
     * @maps error
     */
    public function setError(array $error): void
    {
        $this->error = $error;
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
        $json['code']    = $this->code;
        $json['message'] = $this->message;
        $json['error']   = $this->error;

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
