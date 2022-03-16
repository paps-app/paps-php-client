<?php

declare(strict_types=1);



namespace PapsAPILib\Models;

use stdClass;

class ReceiverDTO implements \JsonSerializable
{
    /**
     * @var string
     */
    private $receiverFirstname;

    /**
     * @var string
     */
    private $receiverLastname;

    /**
     * @var string
     */
    private $receiverPhoneNumber;

    /**
     * @var AddressDTO[]
     */
    private $receiverAddress;

    /**
     * @var string
     */
    private $receiverEmail;

    /**
     * @var string
     */
    private $receiverEntreprise;

    /**
     * @var string
     */
    private $receiverSpecificationAddress;

    /**
     * @param string $receiverFirstname
     * @param string $receiverLastname
     * @param string $receiverPhoneNumber
     * @param AddressDTO[] $receiverAddress
     * @param string $receiverEmail
     * @param string $receiverEntreprise
     * @param string $receiverSpecificationAddress
     */
    public function __construct(
        string $receiverFirstname,
        string $receiverLastname,
        string $receiverPhoneNumber,
        array $receiverAddress,
        string $receiverEmail,
        string $receiverEntreprise,
        string $receiverSpecificationAddress
    ) {
        $this->receiverFirstname = $receiverFirstname;
        $this->receiverLastname = $receiverLastname;
        $this->receiverPhoneNumber = $receiverPhoneNumber;
        $this->receiverAddress = $receiverAddress;
        $this->receiverEmail = $receiverEmail;
        $this->receiverEntreprise = $receiverEntreprise;
        $this->receiverSpecificationAddress = $receiverSpecificationAddress;
    }

    /**
     * Returns Receiver Firstname.
     *
     * The firstname of the Client
     */
    public function getReceiverFirstname(): string
    {
        return $this->receiverFirstname;
    }

    /**
     * Sets Receiver Firstname.
     *
     * The firstname of the Client
     *
     * @required
     * @maps receiver_firstname
     */
    public function setReceiverFirstname(string $receiverFirstname): void
    {
        $this->receiverFirstname = $receiverFirstname;
    }

    /**
     * Returns Receiver Lastname.
     *
     * The lastname of the Client
     */
    public function getReceiverLastname(): string
    {
        return $this->receiverLastname;
    }

    /**
     * Sets Receiver Lastname.
     *
     * The lastname of the Client
     *
     * @required
     * @maps receiver_lastname
     */
    public function setReceiverLastname(string $receiverLastname): void
    {
        $this->receiverLastname = $receiverLastname;
    }

    /**
     * Returns Receiver Phone Number.
     *
     * The phone number of the Client
     */
    public function getReceiverPhoneNumber(): string
    {
        return $this->receiverPhoneNumber;
    }

    /**
     * Sets Receiver Phone Number.
     *
     * The phone number of the Client
     *
     * @required
     * @maps receiver_phone_number
     */
    public function setReceiverPhoneNumber(string $receiverPhoneNumber): void
    {
        $this->receiverPhoneNumber = $receiverPhoneNumber;
    }

    /**
     * Returns Receiver Address.
     *
     * The client's address
     *
     * @return AddressDTO[]
     */
    public function getReceiverAddress(): array
    {
        return $this->receiverAddress;
    }

    /**
     * Sets Receiver Address.
     *
     * The client's address
     *
     * @required
     * @maps receiver_address
     *
     * @param AddressDTO[] $receiverAddress
     */
    public function setReceiverAddress(array $receiverAddress): void
    {
        $this->receiverAddress = $receiverAddress;
    }

    /**
     * Returns Receiver Email.
     *
     * The email of the Client
     */
    public function getReceiverEmail(): string
    {
        return $this->receiverEmail;
    }

    /**
     * Sets Receiver Email.
     *
     * The email of the Client
     *
     * @required
     * @maps receiver_email
     */
    public function setReceiverEmail(string $receiverEmail): void
    {
        $this->receiverEmail = $receiverEmail;
    }

    /**
     * Returns Receiver Entreprise.
     *
     * The name entreprise of the Client
     */
    public function getReceiverEntreprise(): string
    {
        return $this->receiverEntreprise;
    }

    /**
     * Sets Receiver Entreprise.
     *
     * The name entreprise of the Client
     *
     * @required
     * @maps receiver_entreprise
     */
    public function setReceiverEntreprise(string $receiverEntreprise): void
    {
        $this->receiverEntreprise = $receiverEntreprise;
    }

    /**
     * Returns Receiver Specification Address.
     *
     * The specification address of the Client
     */
    public function getReceiverSpecificationAddress(): string
    {
        return $this->receiverSpecificationAddress;
    }

    /**
     * Sets Receiver Specification Address.
     *
     * The specification address of the Client
     *
     * @required
     * @maps receiver_specification_address
     */
    public function setReceiverSpecificationAddress(string $receiverSpecificationAddress): void
    {
        $this->receiverSpecificationAddress = $receiverSpecificationAddress;
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
        $json['receiver_firstname']             = $this->receiverFirstname;
        $json['receiver_lastname']              = $this->receiverLastname;
        $json['receiver_phone_number']          = $this->receiverPhoneNumber;
        $json['receiver_address']               = $this->receiverAddress;
        $json['receiver_email']                 = $this->receiverEmail;
        $json['receiver_entreprise']            = $this->receiverEntreprise;
        $json['receiver_specification_address'] = $this->receiverSpecificationAddress;

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
