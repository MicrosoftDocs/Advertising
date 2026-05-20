<?php

namespace Microsoft\MsAds\Rest\Test\Services;

use Exception;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AdGroup;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddAdGroupCriterionsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddCampaignCriterionsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Bid;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BidMultiplier;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BiddableCampaignCriterion;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BudgetLimitType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Campaign;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\CampaignCriterionType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Date;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\LocationCriterion;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\NegativeAdGroupCriterion;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AdGroupCriterionType;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class TargetCriteriaTest extends RestApiTestBase
{
    /**
     * @throws Exception
     */
    public function testAddCampaign()
    {
        $campaign = (new Campaign())
            ->setName("Women's Shoes ".self::generateRandomAlphaNumeric())
            ->setBudgetType(BudgetLimitType::DAILY_BUDGET_STANDARD)
            ->setDailyBudget(50.00)
            ->setLanguages(["All"])
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
            ->setEndDate((new Date())->setDay(31)->setMonth(12)->setYear(date("Y")));
        return self::addAdGroupsRequest($campaignIds[0], [$adGroup]);
    }

    /**
     * @depends testAddCampaign
     * @throws Exception
     */
    public function testAddCampaignCriterion(array $campaignIds)
    {
        // When you first create a campaign or ad group using the Bing Ads API, it will not have any
        // target criteria. Effectively, the brand new campaign and ad group target all ages, days, hours,
        // devices, genders, and locations. As a best practice, you should consider at a minimum
        // adding a campaign location criterion corresponding to the customer market country.
        $locationCriterion = (new LocationCriterion())->setLocationId(190); // United States
        $bidMultiplier = (new BidMultiplier())->setMultiplier(0);

        $campaignCriterion = (new BiddableCampaignCriterion())
            ->setCampaignId($campaignIds[0])
            ->setCriterion($locationCriterion)
            ->setCriterionBid($bidMultiplier);

        $request = new AddCampaignCriterionsRequest([
            'CampaignCriterions' => [$campaignCriterion],
            'CriterionType' => CampaignCriterionType::TARGETS
        ]);

        $response = self::$campaignManagementServiceApi->addCampaignCriterions($request);
        print("CampaignCriterionIds:\r\n");
        print_r($response->getCampaignCriterionIds());
        print("NestedPartialErrors:\r\n");
        print_r($response->getNestedPartialErrors());

        self::assertNotEmpty($response->getCampaignCriterionIds());
        self::assertEmpty($response->getNestedPartialErrors());
    }

    /**
     * @depends testAddAdGroup
     * @throws Exception
     */
    public function testAddAdGroupCriterion(array $adGroupIds)
    {
        // A negative location criterion is an excluded location.
        // Ads in this ad group will not be shown to people in Redmond, WA.
        $locationCriterion = (new LocationCriterion())->setLocationId(67555); // Redmond, WA

        $adGroupCriterion = (new NegativeAdGroupCriterion())
            ->setAdGroupId($adGroupIds[0])
            ->setCriterion($locationCriterion);

        $request = new AddAdGroupCriterionsRequest([
            'AdGroupCriterions' => [$adGroupCriterion],
            'CriterionType' => AdGroupCriterionType::TARGETS
        ]);

        $response = self::$campaignManagementServiceApi->addAdGroupCriterions($request);
        print("AdGroupCriterionIds:\r\n");
        print_r($response->getAdGroupCriterionIds());
        print("NestedPartialErrors:\r\n");
        print_r($response->getNestedPartialErrors());

        self::assertNotEmpty($response->getAdGroupCriterionIds());
        self::assertEmpty($response->getNestedPartialErrors());
    }

    /**
     * @depends testAddCampaign
     * @throws Exception
     */
    public function testDeleteCampaign(array $campaignIds)
    {
        self::deleteCampaignsRequest($campaignIds);
    }
}