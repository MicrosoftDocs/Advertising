<?php

use Microsoft\MsAds\Rest\ApiException;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddAdGroupCriterionsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddCampaignCriterionsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AdGroup;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AdGroupCriterionType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BiddableAdGroupCriterion;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BudgetLimitType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Campaign;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\CampaignCriterionType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\CampaignType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Date;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\DynamicSearchAd;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\DynamicSearchAdsSetting;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\FixedBid;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\NegativeAdGroupCriterion;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\NegativeCampaignCriterion;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Webpage;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\WebpageCondition;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\WebpageConditionOperand;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\WebpageParameter;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class DynamicSearchAdsTest extends RestApiTestBase
{
    /**
     * Add a new campaign with its type set to DynamicSearchAds.
     * @throws ApiException
     */
    public function testAddCampaigns()
    {
        $campaign = new Campaign();
        $campaign->setName("Women's Shoes ".self::generateRandomAlphaNumeric());
        $campaign->setBudgetType(BudgetLimitType::DAILY_BUDGET_STANDARD);
        // Dynamic search ad campaign creation is no longer allowed. Please create a search campaign with DSA settings instead.
        $campaign->setCampaignType(CampaignType::SEARCH);
        $campaign->setDailyBudget(50.00);
        $campaign->setLanguages(['All']);
        $campaign->setTimeZone('PacificTimeUSCanadaTijuana');
        $dynamicSearchSetting = new DynamicSearchAdsSetting();
        $dynamicSearchSetting->setDomainName("www.contoso.com");
        $dynamicSearchSetting->setLanguage("English");
        $campaign->setSettings([$dynamicSearchSetting]);

        return self::addCampaignsRequest([$campaign]);
    }

    /**
     * Create a new ad group within the dynamic search ads campaign.
     * @depends testAddCampaigns
     * @throws ApiException
     */
    public function testAddAdGroups($campaignIds)
    {
        print("-----\r\nAdding Ad Groups:\r\n");

        $adGroup = new AdGroup();
        $adGroup->setName("Women's Red Shoe Sale".self::generateRandomAlphaNumeric());
        $adGroup->setCpcBid((new FixedBid())->setAmount(0.09));
        $adGroup->setStartDate(null);
        $endDate = new Date();
        $endDate->setDay(31);
        $endDate->setMonth(12);
        $endDate->setYear(date("Y"));
        $adGroup->setEndDate($endDate);
        $adGroup->setAdGroupType("SearchDynamic");

        return self::addAdGroupsRequest($campaignIds[0], [$adGroup]);
    }

    /**
     * Add one or more Webpage criteria to each ad group.
     * @depends testAddAdGroups
     * @throws ApiException
     */
    public function testAddAdGroupCriterions($adGroupIds)
    {
        print("-----\r\nAdding Ad Group Criterions:\r\n");

        $criterion = new Webpage();
//        $criterion->setType("Webpage");
        $criterion->setParameter((new WebpageParameter())
            ->setConditions([
                (new WebpageCondition())
                    ->setOperand(WebpageConditionOperand::PAGE_CONTENT)
                    ->setArgument("flowers")
            ])
            ->setCriterionName("Ad Group Webpage Positive Page Content Criterion".self::generateRandomAlphaNumeric()));

        $adGroupCriterion = new BiddableAdGroupCriterion();
        $adGroupCriterion->setAdGroupId($adGroupIds[0]);
        $adGroupCriterion->setCriterion($criterion);
        $adGroupCriterion->setCriterionBid((new FixedBid())->setAmount(0.50));

        $request = new AddAdGroupCriterionsRequest([
            'AdGroupCriterions' => [$adGroupCriterion],
            'CriterionType' => AdGroupCriterionType::WEBPAGE
        ]);

        $response = self::$campaignManagementServiceApi->addAdGroupCriterions($request);
        $criterionIds = $response->getAdGroupCriterionIds();
        print("CampaignCriterionIds:\r\n");
        print_r($criterionIds);
        print("NestedPartialErrors:\r\n");
        print_r($response->getNestedPartialErrors());
        self::assertEmpty($response->getNestedPartialErrors());
        self::assertNotEmpty($criterionIds);

        return $adGroupIds;
    }

    /**
     * @depends testAddAdGroupCriterions
     * @throws ApiException
     */
    public function testAddAdGroupCriterionsWithDomainCategory($adGroupIds)
    {
        $this->markTestIncomplete("Not implemented yet.");
        // To discover the categories that you can use for Webpage criteria (positive or negative),
        // use the GetDomainCategories operation with the Ad Insight service.
        print("-----\r\nFetching Domain Categories:\r\n");

        $request = new GetDomainCategoriesRequest([
            'DomainName' => 'contoso.com',
            'Language' => 'EN'
        ]);

        $response = self::$adInsightServiceApi->getDomainCategories($request);
        $categories = $response->getCategories();
        print("Categories:\r\n");
        print_r($categories);

        if (!empty($categories)) {
            $category = $categories[0]->getCategoryName();

            $positiveCriterion = new BiddableAdGroupCriterion();
            $positiveCriterion->setAdGroupId($adGroupIds[0]);
            $positiveCriterion->setCriterion((new Webpage())
                ->setParameter((new WebpageParameter())
                    ->setConditions([
                        (new WebpageCondition())
                            ->setOperand(WebpageConditionOperand::CATEGORY)
                            ->setArgument($category)
                    ])
                    ->setCriterionName("Positive Category Criterion")));
            $positiveCriterion->setCriterionBid((new FixedBid())->setAmount(0.50));
        }
        $request = new AddAdGroupCriterionsRequest([
            'AdGroupCriterions' => [$positiveCriterion],
            'CriterionType' => AdGroupCriterionType::WEBPAGE
        ]);
        $response = self::$campaignManagementServiceApi->addAdGroupCriterions($request);
        $criterionIds = $response->getAdGroupCriterionIds();
        print("AdGroupCriterionIds:\r\n");
        print_r($criterionIds);
        print("NestedPartialErrors:\r\n");
        print_r($response->getNestedPartialErrors());
        self::assertEmpty($response->getNestedPartialErrors());
        self::assertNotEmpty($criterionIds);
    }

    /**
     * @depends testAddAdGroupCriterions
     * @throws ApiException
     */
    public function testAddNegativeAdGroupCriterion($adGroupIds)
    {
        // If you want to exclude certain portions of your website, you can add negative Webpage
        // criterion at the campaign and ad group level.
        print("-----\r\nAdding Negative Ad Group Criterion:\r\n");
        $negativeCriterion = new NegativeAdGroupCriterion();
        $negativeCriterion->setAdGroupId($adGroupIds[0]);
        $negativeCriterion->setCriterion((new Webpage())
            ->setParameter((new WebpageParameter())
                ->setConditions([
                    (new WebpageCondition())
                        ->setOperand(WebpageConditionOperand::URL)
                        ->setArgument('contoso.com')
                ])));

        $request = new AddAdGroupCriterionsRequest([
            'AdGroupCriterions' => [$negativeCriterion],
            'CriterionType' => AdGroupCriterionType::WEBPAGE
        ]);

        $response = self::$campaignManagementServiceApi->addAdGroupCriterions($request);
        print("AdGroupCriterionIds:\r\n");
        print_r($response->getAdGroupCriterionIds());
        print("NestedPartialErrors:\r\n");
        print_r($response->getNestedPartialErrors());
        self::assertEmpty($response->getNestedPartialErrors());
        self::assertNotEmpty($response->getAdGroupCriterionIds());
    }

    /**
     * Add a negative Webpage criterion at the campaign level.
     * @depends testAddCampaigns
     * @depends testAddNegativeAdGroupCriterion
     * @throws ApiException
     */
    public function testAddCampaignCriterions($campaignIds)
    {
        // The negative Webpage criterion at the campaign level applies to all ad groups
        // within the campaign; however, if you define ad group level negative Webpage criterion,
        // the campaign criterion is ignored for that ad group.
        print("-----\r\nAdding Campaign Criterions:\r\n");

        $negativeCriterion = new NegativeCampaignCriterion();
        $negativeCriterion->setCampaignId($campaignIds[0]);
        $negativeCriterion->setCriterion((new Webpage())
            ->setParameter((new WebpageParameter())
                ->setConditions([
                    (new WebpageCondition())
                        ->setOperand(WebpageConditionOperand::URL)
                        ->setArgument('contoso.com\\seattle')
                ])
                ->setCriterionName("Negative Campaign Criterion")));

        $request = new AddCampaignCriterionsRequest([
            'CampaignCriterions' => [$negativeCriterion],
            'CriterionType' => CampaignCriterionType::WEBPAGE
        ]);

        $response = self::$campaignManagementServiceApi->addCampaignCriterions($request);
        print("CampaignCriterionIds:\r\n");
        print_r($response->getCampaignCriterionIds());
        print("PartialErrors:\r\n");
        print_r($response->getNestedPartialErrors());
        self::assertEmpty($response->getNestedPartialErrors());
        self::assertNotEmpty($response->getCampaignCriterionIds());
    }

    /**
     * Add at least one DynamicSearchAd into the ad group.
     * @depends testAddAdGroups
     * @depends testAddCampaignCriterions
     * @throws ApiException
     */
    public function testAddAds($adGroupIds)
    {
        // Finally you must add at least one DynamicSearchAd into the ad group. The ad title and display URL
        // are generated automatically based on the website domain and language that you want to target.
        print("-----\r\nAdding Ads:\r\n");

        $ad = new DynamicSearchAd();
        $ad->setText("Find New Customers & Increase Sales! Start Advertising on Contoso Today.");
        $ad->setPath1("seattle");
        $ad->setPath2("shoe sale");
        // You cannot set FinalUrls for dynamic search ads.
        // The Final URL will be a dynamically selected landing page.
        // The final URL is distinct from the path that customers will see and click on in your ad.
        return self::addAdsRequest($adGroupIds[0], [$ad]);
    }

    /**
     * Delete the campaign and everything it contains e.g., ad groups and ads.
     * @depends testAddCampaigns
     * @depends testAddAds
     * @throws ApiException
     */
    public function testDeleteCampaigns($campaignIds)
    {
        self::deleteCampaignsRequest($campaignIds);
    }
}