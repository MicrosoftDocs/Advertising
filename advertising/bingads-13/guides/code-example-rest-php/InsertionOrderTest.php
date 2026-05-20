<?php

use Microsoft\MsAds\Rest\ApiException;
use Microsoft\MsAds\Rest\Model\CustomerBillingService\AddInsertionOrderRequest;
use Microsoft\MsAds\Rest\Model\CustomerBillingService\AddInsertionOrderResponse;
use Microsoft\MsAds\Rest\Model\CustomerBillingService\InsertionOrder;
use Microsoft\MsAds\Rest\Model\CustomerBillingService\SearchInsertionOrdersRequest;
use Microsoft\MsAds\Rest\Model\CustomerBillingService\Predicate;
use Microsoft\MsAds\Rest\Model\CustomerBillingService\PredicateOperator;
use Microsoft\MsAds\Rest\Model\CustomerBillingService\SearchInsertionOrdersResponse;
use Microsoft\MsAds\Rest\Model\CustomerBillingService\UpdateInsertionOrderRequest;
use Microsoft\MsAds\Rest\Model\CustomerBillingService\UpdateInsertionOrderResponse;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class InsertionOrderTest extends RestApiTestBase
{
    /**
     * @throws ApiException
     * @throws Exception
     */
    public function testAddInsertionOrder()
    {
        // Add Insertion Order
        $insertionOrder = new InsertionOrder();
        $insertionOrder->setAccountId(self::CUSTOMER_ACCOUNT_ID);
        $insertionOrder->setBookingCountryCode("US");
        $insertionOrder->setName("Test IO " . self::generateRandomAlphaNumeric(8));
        $insertionOrder->setStartDate(new DateTime('now', new DateTimeZone('UTC')));
        $insertionOrder->setIsEndless(true);
        $insertionOrder->setComment("Test Insertion Order created by test");
        $insertionOrder->setSpendCapAmount(1000.00);

        $addRequest = new AddInsertionOrderRequest([
            'InsertionOrder' => $insertionOrder
        ]);
        $addResponse = self::$customerBillingServiceApi->addInsertionOrder($addRequest);
        print_r($addResponse);
        self::assertTrue($addResponse instanceof AddInsertionOrderResponse);
        $this->assertNotNull($addResponse->getInsertionOrderId());
        printf("Insertion Order ID: %s\n", $addResponse->getInsertionOrderId());
        return $addResponse->getInsertionOrderId();
    }

    /**
     * @depends testAddInsertionOrder
     * @throws ApiException
     */
    public function testSearchInsertionOrder($insertionOrderId)
    {
        // Search Insertion Order
        $predicate = new Predicate([
            'Field' => 'InsertionOrderId',
            'Operator' => PredicateOperator::EQUALS,
            'Value' => $insertionOrderId
        ]);
        $searchRequest = new SearchInsertionOrdersRequest([
            'Predicates' => [$predicate]
        ]);
        $searchResponse = self::$customerBillingServiceApi->searchInsertionOrders($searchRequest);
        self::assertTrue($searchResponse instanceof SearchInsertionOrdersResponse);
        $this->assertNotEmpty($searchResponse->getInsertionOrders());
        $foundOrder = $searchResponse->getInsertionOrders()[0];
        $this->assertNotNull($foundOrder);
        $this->assertEquals($insertionOrderId, $foundOrder->getId());
        printf("Found Insertion Order ID: %s\n", $foundOrder->getId());
        return $foundOrder;
    }

    /**
     * @depends testSearchInsertionOrder
     * @throws ApiException
     */
    public function testUpdateInsertionOrder($foundOrder)
    {
        // Update Insertion Order
        $foundOrder->setComment("Updated by test");
        $updateRequest = new UpdateInsertionOrderRequest([
            'InsertionOrder' => $foundOrder
        ]);
        $updateResponse = self::$customerBillingServiceApi->updateInsertionOrder($updateRequest);
        self::assertTrue($updateResponse instanceof UpdateInsertionOrderResponse);
        $this->assertNotNull($updateResponse->getLastModifiedTime());
        printf("Updated Insertion Order ID: %s, Last Modified Time: %s\n",
            $foundOrder->getId(),
            $updateResponse->getLastModifiedTime()->format('Y-m-d H:i:s'));

    }
}

