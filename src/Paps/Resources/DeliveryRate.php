<?php

namespace Paps\Resources;

class DeliveryRate extends AbstractResource
{
    /**
     * Base endpoint for Delivery Quote
     *
     * @var string
     */
    protected $endpoint = 'marketplace';

    /**
     * Get rate for the given pickup and dropoff addresses
     *
     * https://developers.paps.sn/quotes#get-a-rate
     *
     * @param $origin
     * @param $destination
     * @param $packageSize
     * @return mixed
     */
    public function marketplace($pickup_address, $dropoff_address)
    {
        return $this->setEndpoint($this->getEndpoint())
            ->setParams($quotes_params)
            ->setMethod('POST')
            ->send();
    }
}
