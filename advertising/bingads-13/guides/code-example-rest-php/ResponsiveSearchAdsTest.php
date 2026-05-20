<?php

namespace Microsoft\MsAds\Rest\Test\Services;

use Exception;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddKeywordsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AdGroup;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AssetLink;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Bid;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BudgetLimitType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Campaign;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\CampaignType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Date;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Keyword;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\MatchType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ResponsiveSearchAd;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\TextAsset;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class ResponsiveSearchAdsTest extends RestApiTestBase
{
    /**
     * @throws Exception
     */
    public function testAddCampaign()
    {
        $campaign = (new Campaign())
            ->setName("Women's Shoes ".self::generateRandomAlphaNumeric())
            ->setCampaignType(CampaignType::SEARCH)
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
     * @depends testAddAdGroup
     * @throws Exception
     */
    public function testAddKeywords(array $adGroupIds)
    {
        print("-----\r\nAdding Keywords:\r\n");

        $keyword = (new Keyword())
            ->setMatchType(MatchType::BROAD)
            ->setBid((new Bid())->setAmount(0.47))
            ->setParam2("10% Off")
            ->setText("Brand-A Shoes");
        $request = new AddKeywordsRequest([
            'AdGroupId' => $adGroupIds[0],
            'Keywords' => [$keyword]
        ]);
        $response = self::$campaignManagementServiceApi->addKeywords($request);
        print("KeywordIds:\r\n");
        print_r($response->getKeywordIds());
        self::assertNotEmpty($response->getKeywordIds());
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());
    }

    /**
     * @depends testAddAdGroup
     * @throws Exception
     */
    public function testAddResponsiveSearchAd(array $adGroupIds)
    {
        print("-----\r\nAdding Responsive Search Ad:\r\n");

        $responsiveSearchAd = (new ResponsiveSearchAd())
            ->setFinalUrls(["http://www.contoso.com/womenshoesale"])
            ->setPath1("seattle")
            ->setPath2("shoe sale")
            ->setHeadlines([
                (new AssetLink())->setAsset(
                    (new TextAsset())->setText("Contoso")
                )->setPinnedField("Headline1"),
                (new AssetLink())->setAsset(
                    (new TextAsset())->setText("Quick & Easy Setup")
                ),
                (new AssetLink())->setAsset(
                    (new TextAsset())->setText("Seamless Integration")
                )
            ])
            ->setDescriptions([
                (new AssetLink())->setAsset(
                    (new TextAsset())->setText("Find New Customers & Increase Sales!")
                )->setPinnedField("Description1"),
                (new AssetLink())->setAsset(
                    (new TextAsset())->setText("Start Advertising on Contoso Today.")
                )->setPinnedField("Description2")
            ]);

        return self::addAdsRequest($adGroupIds[0], [$responsiveSearchAd]);
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