<?php

declare(strict_types=1);



namespace PapsAPILib\Models;

use stdClass;

class GetRateResponseDTO implements \JsonSerializable
{
    /**
     * @var float
     */
    private $distance;

    /**
     * @var float
     */
    private $price;

    /**
     * @param float $distance
     * @param float $price
     */
    public function __construct(float $distance, float $price)
    {
        $this->distance = $distance;
        $this->price = $price;
    }

    /**
     * Returns Distance.
     *
     * distance.
     */
    public function getDistance(): float
    {
        return $this->distance;
    }

    /**
     * Sets Distance.
     *
     * distance.
     *
     * @required
     * @maps distance
     */
    public function setDistance(float $distance): void
    {
        $this->distance = $distance;
    }

    /**
     * Returns Price.
     *
     * distance.
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * Sets Price.
     *
     * distance.
     *
     * @required
     * @maps price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
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
        $json['distance'] = $this->distance;
        $json['price']    = $this->price;

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
