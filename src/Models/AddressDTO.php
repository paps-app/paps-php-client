<?php

declare(strict_types=1);



namespace PapsAPILib\Models;

use stdClass;

class AddressDTO implements \JsonSerializable
{
    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $region;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $additionalAddress;

    /**
     * @var LocationDTO
     */
    private $location;

    /**
     * @var string
     */
    private $placeId;

    /**
     * @param string $country
     * @param string $countryCode
     * @param string $city
     * @param string $region
     * @param string $address
     * @param string $additionalAddress
     * @param LocationDTO $location
     * @param string $placeId
     */
    public function __construct(
        string $country,
        string $countryCode,
        string $city,
        string $region,
        string $address,
        string $additionalAddress,
        LocationDTO $location,
        string $placeId
    ) {
        $this->country = $country;
        $this->countryCode = $countryCode;
        $this->city = $city;
        $this->region = $region;
        $this->address = $address;
        $this->additionalAddress = $additionalAddress;
        $this->location = $location;
        $this->placeId = $placeId;
    }

    /**
     * Returns Country.
     *
     * The country of the Address
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * Sets Country.
     *
     * The country of the Address
     *
     * @required
     * @maps country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * Returns Country Code.
     *
     * The country code of the Address
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * Sets Country Code.
     *
     * The country code of the Address
     *
     * @required
     * @maps countryCode
     */
    public function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * Returns City.
     *
     * The city of the Address
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * Sets City.
     *
     * The city of the Address
     *
     * @required
     * @maps city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * Returns Region.
     *
     * The region of the Address
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * Sets Region.
     *
     * The region of the Address
     *
     * @required
     * @maps region
     */
    public function setRegion(string $region): void
    {
        $this->region = $region;
    }

    /**
     * Returns Address.
     *
     * The address of the Address
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * Sets Address.
     *
     * The address of the Address
     *
     * @required
     * @maps address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * Returns Additional Address.
     *
     * The additional address of the Address
     */
    public function getAdditionalAddress(): string
    {
        return $this->additionalAddress;
    }

    /**
     * Sets Additional Address.
     *
     * The additional address of the Address
     *
     * @required
     * @maps additional_address
     */
    public function setAdditionalAddress(string $additionalAddress): void
    {
        $this->additionalAddress = $additionalAddress;
    }

    /**
     * Returns Location.
     *
     * The details location of the Address
     */
    public function getLocation(): LocationDTO
    {
        return $this->location;
    }

    /**
     * Sets Location.
     *
     * The details location of the Address
     *
     * @required
     * @maps location
     */
    public function setLocation(LocationDTO $location): void
    {
        $this->location = $location;
    }

    /**
     * Returns Place Id.
     *
     * The placeId of the Address
     */
    public function getPlaceId(): string
    {
        return $this->placeId;
    }

    /**
     * Sets Place Id.
     *
     * The placeId of the Address
     *
     * @required
     * @maps place_id
     */
    public function setPlaceId(string $placeId): void
    {
        $this->placeId = $placeId;
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
        $json['country']            = $this->country;
        $json['countryCode']        = $this->countryCode;
        $json['city']               = $this->city;
        $json['region']             = $this->region;
        $json['address']            = $this->address;
        $json['additional_address'] = $this->additionalAddress;
        $json['location']           = $this->location;
        $json['place_id']           = $this->placeId;

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
