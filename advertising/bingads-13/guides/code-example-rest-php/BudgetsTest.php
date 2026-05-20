<?php

use Microsoft\MsAds\Rest\ApiException;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddBudgetsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Budget;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BudgetLimitType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Campaign;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\DeleteBudgetsRequest;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class BudgetsTest extends RestApiTestBase
{
    /**
     * Add a budget that can be shared by campaigns in the same account.
     * @throws ApiException
     */
    public function testAddBudgets()
    {
        print("-----\r\nAdding Budgets:\r\n");

        $budget = new Budget();
        $budget->setAmount(50);
        $budget->setBudgetType(BudgetLimitType::DAILY_BUDGET_STANDARD);
        $budget->setName("My Shared Budget ".self::generateRandomAlphaNumeric());

        $request = new AddBudgetsRequest([
            'Budgets' => [$budget]
        ]);

        $response = self::$campaignManagementServiceApi->addBudgets($request);
        $budgetIds = $response->getBudgetIds();
        print("BudgetIds:\r\n");
        print_r($budgetIds);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertNotEmpty($budgetIds);
        return $budgetIds;
    }


    /**
     * Add one or more campaigns.
     * @throws ApiException
     * @depends testAddBudgets
     */
    public function testAddCampaigns($budgetIds = null)
    {
        print("-----\r\nAdding Campaigns:\r\n");

        $campaign = new Campaign();
        $campaign->setName("Women's Shoes ".self::generateRandomAlphaNumeric());
        $campaign->setBudgetId($budgetIds[0]);
        $campaign->setLanguages(['All']);
        $campaign->setTimeZone('PacificTimeUSCanadaTijuana');

        return self::addCampaignsRequest([$campaign]);
    }

    /**
     * Delete the campaign and everything it contains e.g., ad groups and ads.
     * @throws ApiException
     * @depends testAddCampaigns
     */
    public function testDeleteCampaigns($campaignIds = null)
    {
        self::deleteCampaignsRequest($campaignIds);
    }

    /**
     * Delete the account's shared budget.
     * @depends testAddBudgets
     * @depends testDeleteCampaigns
     * @throws ApiException
     */
    public function testDeleteBudgets($budgetIds = null)
    {
        print("-----\r\nDeleting Budgets:\r\n");
        $request = new DeleteBudgetsRequest([
            'BudgetIds' => $budgetIds
        ]);
        $response = self::$campaignManagementServiceApi->deleteBudgets($request);
        print("Deleted Budgets: ".implode(', ', $budgetIds)."\r\n");
        self::assertEmpty($response->getPartialErrors());
    }
}