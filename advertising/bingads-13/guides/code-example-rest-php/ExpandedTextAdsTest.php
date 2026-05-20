<?php

use Microsoft\MsAds\Rest\ApiException;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddKeywordsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AdGroup;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Bid;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BudgetLimitType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Campaign;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Date;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ExpandedTextAd;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Keyword;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\MatchType;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class ExpandedTextAdsTest extends RestApiTestBase
{
    /**
     * Add a new search campaign.
     * @throws ApiException
     */
    public function testAddCampaigns()
    {
        print("-----\r\nAdding Campaigns:\r\n");

        $campaign = new Campaign();
        $campaign->setName("Women's Shoes ".self::generateRandomAlphaNumeric());
        $campaign->setBudgetType(BudgetLimitType::DAILY_BUDGET_STANDARD);
        $campaign->setDailyBudget(50.00);
        $campaign->setLanguages(['All']);
        $campaign->setTimeZone('PacificTimeUSCanadaTijuana');

        return self::addCampaignsRequest([$campaign]);
    }

    /**
     * Add an ad group within the campaign.
     * @depends testAddCampaigns
     * @throws ApiException
     */
    public function testAddAdGroups($campaignIds)
    {
        print("-----\r\nAdding Ad Groups:\r\n");

        $adGroup = new AdGroup();
        $adGroup->setName("Women's Red Shoe Sale".self::generateRandomAlphaNumeric());
        $adGroup->setCpcBid((new Bid())->setAmount(0.09));
        $adGroup->setEndDate((new Date())
            ->setDay(31)
            ->setMonth(12)
            ->setYear(date("Y")));

        return self::addAdGroupsRequest($campaignIds[0], [$adGroup]);
    }

    /**
     * Add keywords to the ad group.
     * @depends testAddAdGroups
     * @throws ApiException
     */
    public function testAddKeywords($adGroupIds)
    {
        print("-----\r\nAdding Keywords:\r\n");

        $keyword = new Keyword();
        $keyword->setText("Brand-A Shoes".self::generateRandomAlpha());
        $keyword->setMatchType(MatchType::BROAD);
        $keyword->setBid((new Bid())->setAmount(0.47));
        $keyword->setParam2("10% Off");

        $request = new AddKeywordsRequest([
            'AdGroupId' => $adGroupIds[0],
            'Keywords' => [$keyword]
        ]);

        $response = self::$campaignManagementServiceApi->addKeywords($request);
        $keywordIds = $response->getKeywordIds();
        print("KeywordIds:\r\n");
        print_r($keywordIds);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());
        self::assertNotEmpty($keywordIds);

        return $adGroupIds;
    }

    /**
     * Add an expanded text ad to the ad group.
     * @depends testAddKeywords
     * @throws ApiException
     */
    public function testAddExpandedTextAd($adGroupIds)
    {
        print("-----\r\nAdding Ads:\r\n");

        $ad = new ExpandedTextAd();
        $ad->setTitlePart1("Contoso");
        $ad->setTitlePart2("Quick & Easy Setup");
        $ad->setTitlePart3("Seamless Integration");
        $ad->setText("Find New Customers & Increase Sales!");
        $ad->setTextPart2("Start Advertising on Contoso Today.");
        $ad->setPath1("seattle");
        $ad->setPath2("shoe sale");
        $ad->setFinalUrls(["http://www.contoso.com/womenshoesale"]);

        return self::addAdsRequest($adGroupIds[0], [$ad]);
    }

    /**
     * Delete the campaign and everything it contains.
     * @depends testAddCampaigns
     * @depends testAddExpandedTextAd
     * @throws ApiException
     */
    public function testDeleteCampaigns($campaignIds)
    {
        self::deleteCampaignsRequest($campaignIds);
    }
}