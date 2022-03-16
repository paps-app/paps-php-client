<?php

declare(strict_types=1);



namespace PapsAPILib\Models;

use stdClass;

class ParcelDTO implements \JsonSerializable
{
    /**
     * @var string
     */
    private $packageSize;

    /**
     * @var string
     */
    private $description;

    /**
     * @var float
     */
    private $price;

    /**
     * @var float
     */
    private $amountCollect;

    /**
     * @param string $packageSize
     * @param string $description
     * @param float $price
     * @param float $amountCollect
     */
    public function __construct(string $packageSize, string $description, float $price, float $amountCollect)
    {
        $this->packageSize = $packageSize;
        $this->description = $description;
        $this->price = $price;
        $this->amountCollect = $amountCollect;
    }

    /**
     * Returns Package Size.
     *
     * The packageSize of the Parcel
     */
    public function getPackageSize(): string
    {
        return $this->packageSize;
    }

    /**
     * Sets Package Size.
     *
     * The packageSize of the Parcel
     *
     * @required
     * @maps packageSize
     */
    public function setPackageSize(string $packageSize): void
    {
        $this->packageSize = $packageSize;
    }

    /**
     * Returns Description.
     *
     * The description of the Parcel
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Sets Description.
     *
     * The description of the Parcel
     *
     * @required
     * @maps description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Returns Price.
     *
     * The price of the Parcel
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * Sets Price.
     *
     * The price of the Parcel
     *
     * @required
     * @maps price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * Returns Amount Collect.
     *
     * The amountCollect of the Parcel
     */
    public function getAmountCollect(): float
    {
        return $this->amountCollect;
    }

    /**
     * Sets Amount Collect.
     *
     * The amountCollect of the Parcel
     *
     * @required
     * @maps amountCollect
     */
    public function setAmountCollect(float $amountCollect): void
    {
        $this->amountCollect = $amountCollect;
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
        $json['packageSize']   = $this->packageSize;
        $json['description']   = $this->description;
        $json['price']         = $this->price;
        $json['amountCollect'] = $this->amountCollect;

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
