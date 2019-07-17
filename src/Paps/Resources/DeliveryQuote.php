<?php

namespace Paps\Resources;


class DeliveryQuote extends AbstractResource
{
    /**
     * Base endpoint for Delivery Quote
     *
     * @var string
     */
    protected $endpoint = '/getQuotes/[customer_id]/';

    /**
     * Get quote for the given pickup and dropoff addresses
     *
     * https://developers.paps.sn/quotes#get-a-quote
     *
     * @param $origin
     * @param $destination
     * @param $packageSize
     * @return mixed
     */
    public function getQuote($pickup_address, $dropoff_address)
    {

    return $this->setEndpoint($this->getEndpoint() . 'getQuotes')
      ->setParams($quotes_params)
      ->setMethod('GET')
      ->send();
    }

}
