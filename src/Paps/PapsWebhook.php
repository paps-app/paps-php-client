<?php

namespace Paps;

class PapsWebhook
{
    /**
     * @var string
     */
    protected $signature_secret;

    /**
     * PapsWebhook constructor.
     * @param string $signature_secret
     */
    public function __construct( $signature_secret = '' )
    {
        $this->signature_secret = $signature_secret;
    }

    /**
     * Parse and validate webhook request
     *
     * @return mixed|null
     */
    public function parseRequest()
    {

        $raw_request = file_get_contents('php://input');
        $paps_signature = $_SERVER['HTTP_X_PAPS_SIGNATURE'];

        if ($this->validateRequest($raw_request, $paps_signature)) {
            return json_decode($raw_request, true);
        }

        return null;

    }

    /**
     * Validate Paps request with te provided signature secret
     *
     * @param $payload
     * @param $key
     * @return bool
     */
    public function validateRequest($payload, $key)
    {

        return hash_hmac('sha256', $payload, $this->signature_secret) == $key;

    }

}