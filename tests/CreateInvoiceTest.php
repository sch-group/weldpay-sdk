<?php


namespace WeldPaySdk\Tests;


use WeldPaySdk\Components\Address;
use WeldPaySdk\Components\Buyer;
use WeldPaySdk\Components\Item;
use WeldPaySdk\Components\Transaction;
use WeldPaySdk\Tests\InitTest;

class CreateInvoiceTest extends InitTest
{
    /**
     *
     */
//    public function testCreateSuccess()
//    {
//        $link = $this->createInvoice();
//        $this->assertTrue(strpos($link, 'r_id') !== false);
//    }

    public function testFail()
    {
        $orderNumber = "order_number: 123456";

        $address = new Address(
            null,
            null,
            null,
            null
        );

        $shippingAddress = new Address();
        $buyer = new Buyer(
            "",
            "",
            "mario.rossi@email.it",
            $address,
            $shippingAddress
        );

        $numberOfPackages = 5;
        $item1 = new Item("Product 1", 70);
        $item2 = new Item("Product 2", 10.53);
        $items = [$item1, $item2];
        $deliveryItem = new Item("Delivery", 6.4);
        $deliveryItems = [$deliveryItem];
        $successUrl = "https://google.com?success=181024174141&token=e685801c-76cc-45d1-8a75-285dadde";
        $failUrl = "https://google.com?fail=181024174141&token=e685801c-76cc-45d1-8a75-285dadde";
        $callbackUrl = "https://google.com?paymentConfirmed=181024174141&token=e685801c-76cc-45d1-8a75-285d";

        $transaction = new Transaction(
            "es",
            $orderNumber,
            $buyer,
            $numberOfPackages,
            $items,
            $deliveryItems,
            $successUrl,
            $failUrl,
            $callbackUrl
        );

        $link = $this->client->generateTransactionUrl($transaction);
        echo "link = " . $link;
        $this->assertTrue(strpos($link, 'r_id') !== false);
    }
}