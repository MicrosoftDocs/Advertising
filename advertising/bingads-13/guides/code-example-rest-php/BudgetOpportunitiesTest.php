<?php

use Microsoft\MsAds\Rest\ApiException;
use Microsoft\MsAds\Rest\Model\AdInsightService\GetBudgetOpportunitiesRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\GetCampaignsByAccountIdRequest;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class BudgetOpportunitiesTest extends RestApiTestBase
{
    /**
     * @throws ApiException
     */
    public function testGetBudgetOpportunitiesForAllCampaigns()
    {
        // Get all campaigns for the account
        $request = new GetCampaignsByAccountIdRequest([
            'AccountId' => self::CUSTOMER_ACCOUNT_ID
        ]);
        $campaignsResponse = self::$campaignManagementServiceApi->getCampaignsByAccountId($request);
        $campaigns = $campaignsResponse->getCampaigns();
        $this->assertIsArray($campaigns);
        if (empty($campaigns)) {
            $this->markTestSkipped('No campaigns found for the account.');
        }
        foreach ($campaigns as $campaign) {
            $request = new GetBudgetOpportunitiesRequest([
                'CampaignId' => $campaign->getId()
            ]);
            $response = self::$adInsightServiceApi->getBudgetOpportunities($request);
            $opportunities = $response->getOpportunities();
            print_r($opportunities);
        }
    }
}

