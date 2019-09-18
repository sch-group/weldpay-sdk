<?php


namespace WeldPaySdk\Tests;


use WeldPaySdk\Tests\InitTest;

class CheckStatusTest extends InitTest
{
    public function testCheckStatus()
    {

        $requestId = "137789-MQZp1BxOAvoElBzv6lwc2bNJ0gzOQM38WpH4LDFPa8w%3D";

        $checkStatusResponse = $this->client->checkTransactionStatusByRequestId($requestId);

        $this->assertNotEmpty($checkStatusResponse->getTotalAmount());
    }
}