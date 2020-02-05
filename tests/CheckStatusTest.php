<?php


namespace WeldPaySdk\Tests;


use WeldPaySdk\Tests\InitTest;

class CheckStatusTest extends InitTest
{
    public function testCheckStatus()
    {

        $requestId = "147003-bAPDK4ZLzjXuZdwUo4pKhCQdSEXMSzCs6lBhibaFFSM=";

        $checkStatusResponse = $this->client->checkTransactionStatusByRequestId($requestId);
        print_r($checkStatusResponse);
        $this->assertNotEmpty($checkStatusResponse->getTotalAmount());
    }
}