<?php

namespace WeldPaySdk\WeldPay;

use GuzzleHttp\Client;
use WeldPaySdk\Components\Transaction;
use WeldPaySdk\Components\CheckStatusResponse;
use WeldPaySdk\Exceptions\WeldPayMethodCallException;

class WeldPayConnector
{
    const CACHE_SESSION_KEY = 'weldpay_session_id';

    const CACHE_SESSION_LIFE_TIME = 60;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var WeldPayConfig
     */
    private $weldPayConfig;


    public function __construct(
        WeldPayConfig $weldPayConfig
    )
    {
        $this->client = new Client();
        $this->weldPayConfig = $weldPayConfig;
    }

    /**
     * @param Transaction $transaction
     * @return mixed
     * @throws WeldPayMethodCallException
     */
    public function generateTransactionUrl(Transaction $transaction)
    {
        $generateTransactionUrl = $this->weldPayConfig->getHost() . '/gateway/generate-transaction';

        try {
            $body = [
                'Lang' => $transaction->getLang(),
                'Buyer' => [
                    "FirstName" => $transaction->getBuyer()->getFirstName(),
                    "Lastname" => $transaction->getBuyer()->getLastName(),
                    "TaxCode" => $transaction->getBuyer()->getTaxCode(),
                    "Email" => $transaction->getBuyer()->getEmail(),
                    "Address" => [
                        "ZipCode" => $transaction->getBuyer()->getAddress()->getZipCode(),
                        "City" => $transaction->getBuyer()->getAddress()->getCityName(),
                        "Province" => $transaction->getBuyer()->getAddress()->getProvince(),
                        "Street" => $transaction->getBuyer()->getAddress()->getStreet()
                    ],
                    "ShippingAddress" => [
                        "ZipCode" => $transaction->getBuyer()->getShippingAddress()->getZipCode(),
                        "City" => $transaction->getBuyer()->getShippingAddress()->getCityName(),
                        "Province" => $transaction->getBuyer()->getShippingAddress()->getProvince(),
                        "Street" => $transaction->getBuyer()->getShippingAddress()->getStreet()
                    ],
                ],
                "OrderId" => $transaction->getOrderNumber(),
                "OrderDescription" => $transaction->getOrderDescription(),
                "OrderPackages" => $transaction->getNumberOfPackages(),
                "Items" => $transaction->getItems(),
                "ShippingItems" => $transaction->getShippingItems(),
                "SuccessUrl" => $transaction->getSuccessUrl(),
                "CancelUrl" => $transaction->getCancelUrl(),
                "ServerNotificationUrl" => $transaction->getServerNotificationUrl()

            ];
            $request = $this->client->post($generateTransactionUrl, [
                'headers' => [
                    'Authorization' => $this->generateCredentials()
                ],
                'json' => $body
            ]);

            $response = $request->getBody()->getContents();

            return $response;

        } catch (\Exception $exception) {
            throw new WeldPayMethodCallException($generateTransactionUrl, $exception->getMessage());
        }

    }

    /**
     * @return string
     */
    private function generateCredentials(): string
    {
        return 'Basic ' . base64_encode(
                $this->weldPayConfig->getClientId() . ":" .
                $this->weldPayConfig->getClientSecret()
            );
    }

    /**
     * @param string $transactionId
     * @return CheckStatusResponse
     * @throws WeldPayMethodCallException
     */
    public function checkTransactionStatusByTransactionId(string $transactionId): CheckStatusResponse
    {
        $checkTransactionStatusUrl = $this->weldPayConfig->getHost() . '/gateway/transaction-status/' . $transactionId;
        try {
            $request = $this->client->post($checkTransactionStatusUrl, [
                'headers' => [
                    'Authorization' => $this->generateCredentials()
                ],
            ]);
            $response = json_decode($request->getBody()->getContents(), true);

            return new CheckStatusResponse(
                $response['tokenizedRequestId'],
                $response['weldpayTransactionId'],
                $response['State'],
                $response['StateCode'],
                $response['isPaymentSuccessful'],
                $response['orderAmount'],
                $response['shippingAmount'],
                $response["totalAmount"],
                new \DateTime($response['lastUpdate'])
            );

        } catch (\Exception $exception) {
            throw new WeldPayMethodCallException($checkTransactionStatusUrl, $exception->getMessage());
        }
    }

    /**
     * @param string $requestId
     * @return CheckStatusResponse
     * @throws WeldPayMethodCallException
     */
    public function checkTransactionStatusByRequestId(string $requestId): CheckStatusResponse
    {
        $checkTransactionStatusUrl = $this->weldPayConfig->getHost() . '/gateway/transaction-status?r_id=' . $requestId;
        try {
            $request = $this->client->post($checkTransactionStatusUrl, [
                'headers' => [
                    'Authorization' => $this->generateCredentials()
                ],
            ]);

            $response = json_decode($request->getBody()->getContents(), true);

            return new CheckStatusResponse(
                $requestId,
                $response['weldpayTransactionId'],
                $response['State'],
                $response['StateCode'],
                $response['isPaymentSuccessful'],
                $response['orderAmount'],
                $response['shippingAmount'],
                $response["totalAmount"],
                new \DateTime($response['lastUpdate'])
            );

        } catch (\Exception $exception) {
            throw new WeldPayMethodCallException($checkTransactionStatusUrl, $exception->getMessage());
        }
    }

}