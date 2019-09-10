<?php


namespace WeldPaySdk\Components;


use WeldPaySdk\Components\Address;

class Buyer
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $taxCode;

    /**
     * @var string
     */
    private $email;

    /**
     * @var Address
     */
    private $address;

    /**
     * @var Address
     */
    private $shippingAddress;

    /**
     * Buyer constructor.
     * @param string $firstName
     * @param string $lastName
     * @param string $taxCode
     * @param string $email
     * @param Address $address
     * @param Address $shippingAddress
     */
    public function __construct(string $firstName, string $lastName, string $email, Address $address, Address $shippingAddress, string $taxCode = null)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->taxCode = $taxCode;
        $this->email = $email;
        $this->address = $address;
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getTaxCode(): ?string
    {
        return $this->taxCode;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @return Address
     */
    public function getShippingAddress(): Address
    {
        return $this->shippingAddress;
    }

}