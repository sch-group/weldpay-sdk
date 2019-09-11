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

}