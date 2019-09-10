<?php


namespace WeldPaySdk\Components;


class Item
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var float
     */
    private $amount;

    /**
     * Item constructor.
     * @param string $name
     * @param string $notes
     * @param float $amount
     */
    public function __construct(string $name, float $amount, string $notes = null)
    {
        $this->name = $name;
        $this->notes = $notes;
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @return float
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }
}