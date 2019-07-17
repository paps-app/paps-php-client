<?php

namespace Paps\Resources;


class DeliveryZones extends AbstractResource
{
    /**
     * Base endpoint for Delivery Quote
     *
     * @var string
     */
    protected $endpoint = 'delivery_zones';

    /**
     * List all delivery zones
     *
     * https://developers.paps.sn/zones#get-all-quotes
     *
     * @return mixed
     */
    public function listZones()
    {
        return $this
            ->setMethod('GET')
            ->send();

    }
}
