<?php

declare(strict_types=1);



namespace PapsAPILib\Models;

use stdClass;

class LocationDTO implements \JsonSerializable
{
    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    /**
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct(float $latitude, float $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * Returns Latitude.
     *
     * The latitude of the Location
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * Sets Latitude.
     *
     * The latitude of the Location
     *
     * @required
     * @maps latitude
     */
    public function setLatitude(float $latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * Returns Longitude.
     *
     * The longitude of the Location
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * Sets Longitude.
     *
     * The longitude of the Location
     *
     * @required
     * @maps longitude
     */
    public function setLongitude(float $longitude): void
    {
        $this->longitude = $longitude;
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
        $json['latitude']  = $this->latitude;
        $json['longitude'] = $this->longitude;

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
