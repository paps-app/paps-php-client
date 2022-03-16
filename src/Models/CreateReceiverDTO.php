<?php

declare(strict_types=1);



namespace PapsAPILib\Models;

use stdClass;

class CreateReceiverDTO implements \JsonSerializable
{
    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $entreprise;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $specificationAddress;

    /**
     * @param string $firstname
     * @param string $lastname
     * @param string $phoneNumber
     * @param string $email
     * @param string $entreprise
     * @param string $address
     * @param string $specificationAddress
     */
    public function __construct(
        string $firstname,
        string $lastname,
        string $phoneNumber,
        string $email,
        string $entreprise,
        string $address,
        string $specificationAddress
    ) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
        $this->entreprise = $entreprise;
        $this->address = $address;
        $this->specificationAddress = $specificationAddress;
    }

    /**
     * Returns Firstname.
     *
     * The firstname of the Client
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * Sets Firstname.
     *
     * The firstname of the Client
     *
     * @required
     * @maps firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * Returns Lastname.
     *
     * The lastname of the Client
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * Sets Lastname.
     *
     * The lastname of the Client
     *
     * @required
     * @maps lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * Returns Phone Number.
     *
     * The phone number of the Client
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * Sets Phone Number.
     *
     * The phone number of the Client
     *
     * @required
     * @maps phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Returns Email.
     *
     * The email of the Client
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Sets Email.
     *
     * The email of the Client
     *
     * @required
     * @maps email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Returns Entreprise.
     *
     * The name entreprise of the Client
     */
    public function getEntreprise(): string
    {
        return $this->entreprise;
    }

    /**
     * Sets Entreprise.
     *
     * The name entreprise of the Client
     *
     * @required
     * @maps entreprise
     */
    public function setEntreprise(string $entreprise): void
    {
        $this->entreprise = $entreprise;
    }

    /**
     * Returns Address.
     *
     * The client's address
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * Sets Address.
     *
     * The client's address
     *
     * @required
     * @maps address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * Returns Specification Address.
     *
     * The specification address of the Client
     */
    public function getSpecificationAddress(): string
    {
        return $this->specificationAddress;
    }

    /**
     * Sets Specification Address.
     *
     * The specification address of the Client
     *
     * @required
     * @maps specificationAddress
     */
    public function setSpecificationAddress(string $specificationAddress): void
    {
        $this->specificationAddress = $specificationAddress;
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
        $json['firstname']            = $this->firstname;
        $json['lastname']             = $this->lastname;
        $json['phoneNumber']          = $this->phoneNumber;
        $json['email']                = $this->email;
        $json['entreprise']           = $this->entreprise;
        $json['address']              = $this->address;
        $json['specificationAddress'] = $this->specificationAddress;

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
