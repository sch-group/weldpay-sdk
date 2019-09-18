<?php


namespace WeldPaySdk\Components;


class CheckStatusResponse
{
    /**
     * @var string
     */
    private $requestId;

    /**
     * @var string
     */
    private $weldPayTransactionId;

    /**
     * @var string
     */
    private $state;

    /**
     * @var int
     */
    private $stateCode;
    /**
     * @var bool
     */
    private $isPaymentSuccessful;

    /**
     * @var float
     */
    private $orderAmount;

    /**
     * @var float
     */
    private $shippingAmount;

    /**
     * @var float
     */
    private $totalAmount;

    /**
     * @var \DateTime
     */
    private $lastUpdate;

    /**
     * @var string
     */
    private $error;

    /**
     * CheckStatusResponse constructor.
     * @param string $requestId
     * @param string $weldPayTransactionId
     * @param string $state
     * @param int $stateCode
     * @param bool $isPaymentSuccessful
     * @param float $orderAmount
     * @param float $shippingAmount
     * @param float $totalAmount
     * @param \DateTime $lastUpdate
     * @param string $error
     */
    public function __construct(string $requestId, string $weldPayTransactionId, string $state, int $stateCode, bool $isPaymentSuccessful, float $orderAmount, float $shippingAmount, float $totalAmount, \DateTime $lastUpdate, string $error = null)
    {
        $this->requestId = $requestId;
        $this->weldPayTransactionId = $weldPayTransactionId;
        $this->state = $state;
        $this->stateCode = $stateCode;
        $this->isPaymentSuccessful = $isPaymentSuccessful;
        $this->orderAmount = $orderAmount;
        $this->shippingAmount = $shippingAmount;
        $this->totalAmount = $totalAmount;
        $this->lastUpdate = $lastUpdate;
        $this->error = $error;
    }

    /**
     * @return string
     */
    public function getRequestId(): string
    {
        return $this->requestId;
    }

    /**
     * @return string
     */
    public function getWeldPayTransactionId(): string
    {
        return $this->weldPayTransactionId;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @return int
     */
    public function getStateCode(): int
    {
        return $this->stateCode;
    }

    /**
     * @return bool
     */
    public function isPaymentSuccessful(): bool
    {
        return $this->isPaymentSuccessful;
    }

    /**
     * @return float
     */
    public function getOrderAmount(): float
    {
        return $this->orderAmount;
    }

    /**
     * @return float
     */
    public function getShippingAmount(): float
    {
        return $this->shippingAmount;
    }

    /**
     * @return float
     */
    public function getTotalAmount(): float
    {
        return $this->totalAmount;
    }

    /**
     * @return \DateTime
     */
    public function getLastUpdate(): \DateTime
    {
        return $this->lastUpdate;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }

}