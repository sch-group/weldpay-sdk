<?php


namespace WeldPaySdk\Components;


class Transaction
{
    const AVAILABLE_LANGUAGES = [
      'it', 'en', 'de', 'fr', 'es'
    ];
    /**
     * @var string
     */
    private $lang;

    /**
     * @var string
     */
    private $orderNumber;

    /**
     * @var string
     */
    private $orderDescription;

    /**
     * @var Buyer
     */
    private $buyer;

    /**
     * @var int
     */
    private $numberOfPackages;

    /**
     * @var array
     */
    private $items;

    /**
     * @var array
     */
    private $shippingItems;

    /**
     * @var string
     */
    private $successUrl;

    /**
     * @var string
     */
    private $cancelUrl;

    /**
     * @var string
     */
    private $serverNotificationUrl;

    /**
     * Transaction constructor.
     * @param string $lang
     * @param string $orderNumber
     * @param string $orderDescription
     * @param Buyer $buyer
     * @param int $numberOfPackages
     * @param array $items
     * @param array $shippingItems
     * @param string $successUrl
     * @param string $cancelUrl
     * @param string $serverNotificationUrl
     */
    public function __construct(
        string $lang,
        string $orderNumber,
        Buyer $buyer,
        int $numberOfPackages,
        array $items,
        array $shippingItems,
        string $successUrl,
        string $cancelUrl,
        string $serverNotificationUrl,
        string $orderDescription = null)
    {
        $this->orderNumber = $orderNumber;
        $this->orderDescription = $orderDescription;
        $this->buyer = $buyer;
        $this->numberOfPackages = $numberOfPackages;
        $this->items = $items;
        $this->shippingItems = $shippingItems;
        $this->successUrl = $successUrl;
        $this->cancelUrl = $cancelUrl;
        $this->serverNotificationUrl = $serverNotificationUrl;
        $this->lang = $lang;
    }

    /**
     * @return string
     */
    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }

    /**
     * @return string
     */
    public function getOrderDescription(): ?string
    {
        return $this->orderDescription;
    }

    /**
     * @return Buyer
     */
    public function getBuyer(): Buyer
    {
        return $this->buyer;
    }

    /**
     * @return int
     */
    public function getNumberOfPackages(): int
    {
        return $this->numberOfPackages;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        $preparedItems = [];

        foreach ($this->items as $item) {
            /** @var Item $item  */
            $preparedItems[] = [
              'Name' => $item->getName(),
              'Notes' => $item->getNotes(),
              'Amount' => $item->getAmount()
            ];
        }

        return $preparedItems;
    }

    /**
     * @return array
     */
    public function getShippingItems(): array
    {
        $preparedItems = [];

        foreach ($this->shippingItems as $item) {
            /** @var Item $item  */
            $preparedItems[] = [
                'Name' => $item->getName(),
                'Notes' => $item->getNotes(),
                'Amount' => $item->getAmount()
            ];
        }

        return $preparedItems;
    }

    /**
     * @return string
     */
    public function getSuccessUrl(): string
    {
        return $this->successUrl;
    }

    /**
     * @return string
     */
    public function getCancelUrl(): string
    {
        return $this->cancelUrl;
    }

    /**
     * @return string
     */
    public function getServerNotificationUrl(): string
    {
        return $this->serverNotificationUrl;
    }

    /**
     * @return string
     */
    public function getLang(): string
    {
        return in_array($this->lang, self::AVAILABLE_LANGUAGES) ? $this->lang : "en";
    }
}