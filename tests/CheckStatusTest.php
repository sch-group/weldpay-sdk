<?php


namespace WeldPaySdk\Tests;


use WeldPaySdk\Tests\InitTest;

class CheckStatusTest extends InitTest
{
    public function testCheckStatus()
    {
        $link = $this->createInvoice();

        preg_match_all('!\d+!', $link, $matches);

        $requestId = $matches[0][0];

        $checkStatusResponse = $this->client->checkTransactionStatusByRequestId($requestId);
    }
}