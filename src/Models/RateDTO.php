<?php

declare(strict_types=1);



namespace PapsAPILib\Models;

use stdClass;

class RateDTO implements \JsonSerializable
{
    /**
     * @var string
     */
    private $destination;

    /**
     * @var string
     */
    private $origin;

    /**
     * @var float
     */
    private $weight;

    /**
     * @param string $destination
     * @param string $origin
     * @param float $weight
     */
    public function __construct(string $destination, string $origin, float $weight)
    {
        $this->destination = $destination;
        $this->origin = $origin;
        $this->weight = $weight;
    }

    /**
     * Returns Destination.
     *
     * The address destination
     */
    public function getDestination(): string
    {
        return $this->destination;
    }

    /**
     * Sets Destination.
     *
     * The address destination
     *
     * @required
     * @maps destination
     */
    public function setDestination(string $destination): void
    {
        $this->destination = $destination;
    }

    /**
     * Returns Origin.
     *
     * The address of the shop.
     */
    public function getOrigin(): string
    {
        return $this->origin;
    }

    /**
     * Sets Origin.
     *
     * The address of the shop.
     *
     * @required
     * @maps origin
     */
    public function setOrigin(string $origin): void
    {
        $this->origin = $origin;
    }

    /**
     * Returns Weight.
     *
     * The weight of article(s).
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * Sets Weight.
     *
     * The weight of article(s).
     *
     * @required
     * @maps weight
     */
    public function setWeight(float $weight): void
    {
        $this->weight = $weight;
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
        $json['destination'] = $this->destination;
        $json['origin']      = $this->origin;
        $json['weight']      = $this->weight;

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
