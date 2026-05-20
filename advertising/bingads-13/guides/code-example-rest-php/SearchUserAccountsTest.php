<?php

use Microsoft\MsAds\Rest\ApiException;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\GetCustomerPilotFeaturesRequest;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\SearchAccountsRequest;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\Predicate;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\PredicateOperator;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\Paging;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\SearchAccountsResponse;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class SearchUserAccountsTest extends RestApiTestBase
{
    /**
     * @throws ApiException
     */
    public function testSearchUserAccounts()
    {
        print("-----\r\nSearchUserAccounts:\r\n");
        $predicate = new Predicate();
        $predicate->setField("UserId");
        $predicate->setOperator(PredicateOperator::EQUALS);
        $predicate->setValue("201714858"); // Or use a valid UserId

        $paging = new Paging();
        $paging->setIndex(0);
        $paging->setSize(100);

        $request = new SearchAccountsRequest([
            'Predicates' => [$predicate],
            'PageInfo' => $paging
        ]);

        $response = self::$customerManagementServiceApi->searchAccounts($request);
        self::assertNotNull($response);
        self::assertInstanceOf(SearchAccountsResponse::class, $response);
        print("UserAccounts:\r\n");
        $userAccounts = $response->getAccounts();
        print_r($userAccounts);
        self::assertNotEmpty($userAccounts);
        return $userAccounts;
    }

    /**
     * @depends testSearchUserAccounts
     * @throws ApiException
     */
    public function testGetCustomerPilotFeatures($userAccounts)
    {
        print("-----\r\nGetCustomerPilotFeatures:\r\n");
        $customerIds = [];
        foreach ($userAccounts as $userAccount){
            $customerIds[] = $userAccount->getParentCustomerId();
        }
        $distinctCustomerIds = array_unique($customerIds, SORT_REGULAR);
        self::assertNotEmpty($distinctCustomerIds);
        foreach ($distinctCustomerIds as $customerId){
            $request = new GetCustomerPilotFeaturesRequest([
                'CustomerId' => $customerId
            ]);
            $response = self::$customerManagementServiceApi->getCustomerPilotFeatures($request);
            $FeaturePilotFlags = $response->getFeaturePilotFlags();
            self::assertNotEmpty($FeaturePilotFlags);
            print("CustomerId: $customerId\r\n");
            print("FeaturePilotFlags:\r\n");
            print join('; ', $FeaturePilotFlags);
        }
    }
}

