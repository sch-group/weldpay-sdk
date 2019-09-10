<?php

namespace WeldPaySdk\WeldPay;

class WeldPayConfig
{
    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $clientSecret;

    /**
     * WeldPayConfig constructor.
     * @param string $host
     * @param string $clientId
     * @param string $clientSecret
     */
    public function __construct(string $host, string $clientId, string $clientSecret)
    {
        $this->host = $host;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }
    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

}