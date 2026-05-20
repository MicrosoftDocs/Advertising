<?php

namespace Microsoft\MsAds\Rest\Test\Services;

use Exception;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddAdGroupCriterionsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AdGroup;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AdGroupCriterionType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AgeCriterion;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AgeRange;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Bid;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BidMultiplier;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BiddableAdGroupCriterion;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BudgetLimitType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Campaign;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\CampaignType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\CriterionTypeGroup;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Date;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\NegativeAdGroupCriterion;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ProfileCriterion;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ProfileType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\TargetSetting;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\TargetSettingDetail;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class ProfileCriteriaTest extends RestApiTestBase
{
    /**
     * @throws Exception
     */
    public function testAddCampaign()
    {
        $campaign = (new Campaign())
            ->setName("Women's Shoes ".self::generateRandomAlphaNumeric())
            ->setCampaignType(CampaignType::AUDIENCE)
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
            ->setEndDate((new Date())->setDay(31)->setMonth(12)->setYear(date("Y")))
            ->setSettings([
                (new TargetSetting())
                    ->setDetails([
                        (new TargetSettingDetail())
                            ->setCriterionTypeGroup(CriterionTypeGroup::COMPANY_NAME)
                            ->setTargetAndBid(true),
                        (new TargetSettingDetail())
                            ->setCriterionTypeGroup(CriterionTypeGroup::INDUSTRY)
                            ->setTargetAndBid(true),
                        (new TargetSettingDetail())
                            ->setCriterionTypeGroup(CriterionTypeGroup::JOB_FUNCTION)
                            ->setTargetAndBid(true),
                    ])
            ]);
        return self::addAdGroupsRequest($campaignIds[0], [$adGroup]);
    }

    /**
     * @depends testAddAdGroup
     * @throws Exception
     */
    public function testAddAdGroupCriterions(array $adGroupIds)
    {
        print("-----\r\nAdding Ad Group Criterions:\r\n");

        $criterions = [];

        // Add ProfileCriterion for CompanyName
        $companyNameCriterion = (new ProfileCriterion())
            ->setProfileId(808251207) // Microsoft
            ->setProfileType(ProfileType::COMPANY_NAME);

        $criterions[] = (new BiddableAdGroupCriterion())
            ->setAdGroupId($adGroupIds[0])
            ->setCriterion($companyNameCriterion)
            ->setCriterionBid((new BidMultiplier())->setMultiplier(20));

        // Add ProfileCriterion for JobFunction
        $jobFunctionCriterion = (new ProfileCriterion())
            ->setProfileId(807658477) // Engineering
            ->setProfileType(ProfileType::JOB_FUNCTION);

        $criterions[] = (new BiddableAdGroupCriterion())
            ->setAdGroupId($adGroupIds[0])
            ->setCriterion($jobFunctionCriterion)
            ->setCriterionBid((new BidMultiplier())->setMultiplier(20));

        // Add Negative Age Criterion
        $ageCriterion = (new AgeCriterion())->setAgeRange(AgeRange::TWENTY_FIVE_TO_THIRTY_FOUR);

        $criterions[] = (new NegativeAdGroupCriterion())
            ->setAdGroupId($adGroupIds[0])
            ->setCriterion($ageCriterion);

        $request = new AddAdGroupCriterionsRequest([
            'AdGroupCriterions' => $criterions,
            'CriterionType' => AdGroupCriterionType::TARGETS
        ]);

        $response = self::$campaignManagementServiceApi->addAdGroupCriterions($request);
        print("Ad Group Criterions:\r\n");
        print_r($response->getAdGroupCriterionIds());
        self::assertNotEmpty($response->getAdGroupCriterionIds());
        print("Nested Partial Errors:\r\n");
        print_r($response->getNestedPartialErrors());
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