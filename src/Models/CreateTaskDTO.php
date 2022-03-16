<?php

declare(strict_types=1);



namespace PapsAPILib\Models;

use stdClass;

class CreateTaskDTO implements \JsonSerializable
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $datePickup;

    /**
     * @var string
     */
    private $timePickup;

    /**
     * @var string
     */
    private $vehicleType;

    /**
     * @var string
     */
    private $address;

    /**
     * @var CreateReceiverDTO
     */
    private $receiver;

    /**
     * @var ParcelDTO[]
     */
    private $parcels;

    /**
     * @param string $type
     * @param string $datePickup
     * @param string $timePickup
     * @param string $vehicleType
     * @param string $address
     * @param CreateReceiverDTO $receiver
     * @param ParcelDTO[] $parcels
     */
    public function __construct(
        string $type,
        string $datePickup,
        string $timePickup,
        string $vehicleType,
        string $address,
        CreateReceiverDTO $receiver,
        array $parcels
    ) {
        $this->type = $type;
        $this->datePickup = $datePickup;
        $this->timePickup = $timePickup;
        $this->vehicleType = $vehicleType;
        $this->address = $address;
        $this->receiver = $receiver;
        $this->parcels = $parcels;
    }

    /**
     * Returns Type.
     *
     * The type of job you want to create
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * The type of job you want to create
     *
     * @required
     * @maps type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * Returns Date Pickup.
     *
     * Day to pickup the article
     */
    public function getDatePickup(): string
    {
        return $this->datePickup;
    }

    /**
     * Sets Date Pickup.
     *
     * Day to pickup the article
     *
     * @required
     * @maps datePickup
     */
    public function setDatePickup(string $datePickup): void
    {
        $this->datePickup = $datePickup;
    }

    /**
     * Returns Time Pickup.
     *
     * Time to pickup the article
     */
    public function getTimePickup(): string
    {
        return $this->timePickup;
    }

    /**
     * Sets Time Pickup.
     *
     * Time to pickup the article
     *
     * @required
     * @maps timePickup
     */
    public function setTimePickup(string $timePickup): void
    {
        $this->timePickup = $timePickup;
    }

    /**
     * Returns Vehicle Type.
     *
     * The type of vehicle used for the pickup
     */
    public function getVehicleType(): string
    {
        return $this->vehicleType;
    }

    /**
     * Sets Vehicle Type.
     *
     * The type of vehicle used for the pickup
     *
     * @required
     * @maps vehicleType
     */
    public function setVehicleType(string $vehicleType): void
    {
        $this->vehicleType = $vehicleType;
    }

    /**
     * Returns Address.
     *
     * The address where the package is to be picked up
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * Sets Address.
     *
     * The address where the package is to be picked up
     *
     * @required
     * @maps address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * Returns Receiver.
     *
     * Receiver information
     */
    public function getReceiver(): CreateReceiverDTO
    {
        return $this->receiver;
    }

    /**
     * Sets Receiver.
     *
     * Receiver information
     *
     * @required
     * @maps receiver
     */
    public function setReceiver(CreateReceiverDTO $receiver): void
    {
        $this->receiver = $receiver;
    }

    /**
     * Returns Parcels.
     *
     * Add Parcels
     *
     * @return ParcelDTO[]
     */
    public function getParcels(): array
    {
        return $this->parcels;
    }

    /**
     * Sets Parcels.
     *
     * Add Parcels
     *
     * @required
     * @maps parcels
     *
     * @param ParcelDTO[] $parcels
     */
    public function setParcels(array $parcels): void
    {
        $this->parcels = $parcels;
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
        $json['type']        = $this->type;
        $json['datePickup']  = $this->datePickup;
        $json['timePickup']  = $this->timePickup;
        $json['vehicleType'] = $this->vehicleType;
        $json['address']     = $this->address;
        $json['receiver']    = $this->receiver;
        $json['parcels']     = $this->parcels;

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
