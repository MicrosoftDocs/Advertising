<?php

namespace Microsoft\MsAds\Rest\Test\Services;

use Exception;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AdGroup;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Bid;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BudgetLimitType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Campaign;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\CampaignType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Date;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ProductAd;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ShoppingSetting;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class ProductAdsTest extends RestApiTestBase
{
    /**
     * @throws Exception
     */
    public function testAddCampaign()
    {
        $campaign = (new Campaign())
            ->setCampaignType(CampaignType::SHOPPING)
            ->setBudgetType(BudgetLimitType::DAILY_BUDGET_STANDARD)
            ->setDailyBudget(50.00)
            ->setLanguages(["All"])
            ->setName("Women's Shoes ".self::generateRandomAlphaNumeric())
            ->setSettings([
                (new ShoppingSetting())
                    ->setPriority(0)
                    ->setSalesCountryCode("US")
                    ->setStoreId(1) // Replace with actual StoreId
            ])
            ->setTimeZone("PacificTimeUSCanadaTijuana");

        return self::addCampaignsRequest([$campaign]);
    }

    /**
     * @depends testAddCampaign
     * @throws Exception
     */
    public function testAddAdGroup(array $campaignIds)
    {
        $adGroup = (new AdGroup())
            ->setName("Women's Red Shoe Sale".self::generateRandomAlphaNumeric())
            ->setCpcBid((new Bid())->setAmount(0.09))
            ->setStartDate(null)
            ->setEndDate((new Date())
                ->setDay(31)
                ->setMonth(12)
                ->setYear(date("Y")));

        return self::addAdGroupsRequest($campaignIds[0], [$adGroup]);
    }

    /**
     * @depends testAddAdGroup
     * @throws Exception
     */
    public function testAddProductAd(array $adGroupIds)
    {
        $productAd = (new ProductAd());
        self::addAdsRequest($adGroupIds[0], [$productAd]);
    }

    /**
     * @depends testAddCampaign
     * @depends testAddAdGroup
     * @throws Exception
     */
    public function testDeleteCampaign(array $campaignIds)
    {
        self::deleteCampaignsRequest($campaignIds);
    }
}