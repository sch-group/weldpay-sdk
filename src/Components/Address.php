<?php


namespace WeldPaySdk\Components;


class Address
{
    /**
     * @var string
     */
    private $zipCode;

    /**
     * @var string
     */
    private $cityName;

    /**
     * @var string
     */
    private $province;

    /**
     * @var string
     */
    private $street;

    /**
     * Address constructor.
     * @param string $zipCode
     * @param string $cityName
     * @param string $province
     * @param string $street
     */
    public function __construct(string $zipCode = null, string $cityName = null, string $province = null, string $street = null)
    {
        $this->zipCode = $zipCode;
        $this->cityName = $cityName;
        $this->province = $province;
        $this->street = $street;
    }
    /**
     * @return string
     */
    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    /**
     * @return string
     */
    public function getCityName(): ?string
    {
        return $this->cityName;
    }

    /**
     * @return string
     */
    public function getProvince(): ?string
    {
        return $this->province;
    }

    /**
     * @return string
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }
}