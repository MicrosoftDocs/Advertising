<?php

namespace Microsoft\MsAds\Rest\Test\Services;

use Exception;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddAudiencesRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddAdGroupCriterionsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddUetTagsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AdGroup;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AdGroupCriterionStatus;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AdGroupCriterionType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AudienceCriterion;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AudienceType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Bid;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BiddableAdGroupCriterion;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BidMultiplier;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BudgetLimitType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Campaign;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\CriterionTypeGroup;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\CustomEventsRule;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Date;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\EntityScope;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\GetUetTagsByIdsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\PageVisitorsRule;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\PageVisitorsWhoDidNotVisitAnotherPageRule;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\PageVisitorsWhoVisitedAnotherPageRule;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\RemarketingList;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\RuleItemGroup;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\StringOperator;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\StringRuleItem;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\TargetSetting;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\TargetSettingDetail;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\UetTag;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class RemarketingListsTest extends RestApiTestBase
{

    /**
     * @throws Exception
     */
    public function testAddUetTags()
    {
        // Before you can track conversions or target audiences using a remarketing list
        // you need to create a UET tag, and then add the UET tag tracking code to every page of your website.
        // For more information, please see Universal Event Tracking at https://go.microsoft.com/fwlink/?linkid=829965.

        // First you should call the GetUetTagsByIds operation to check whether a tag has already been created.
        // You can leave the TagIds element null or empty to request all UET tags available for the customer.
        print("-----\r\nGetUetTagsByIds:\r\n");
        $request = new GetUetTagsByIdsRequest([
            'TagIds' => null
        ]);
        $response = self::$campaignManagementServiceApi->getUetTagsByIds($request);
        $uetTags = $response->getUetTags() ?? [];
        print("UetTags:\r\n");
        print_r($uetTags);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());

        // If you do not already have a UET tag that can be used, or if you need another UET tag,
        // call the AddUetTags service operation to create a new UET tag. If the call is successful,
        // the tracking script that you should add to your website is included in a corresponding
        // UetTag within the response message.

        if (count($uetTags) == 0) {
            print("-----\r\nAdding UET Tags:\r\n");

            $uetTag = new UetTag();
            $uetTag->setName("New UET Tag".self::generateRandomAlphaNumeric());
            $uetTag->setDescription("My First UET Tag".self::generateRandomAlphaNumeric());

            $request = new AddUetTagsRequest([
                'UetTags' => [$uetTag]
            ]);

            $response = self::$campaignManagementServiceApi->addUetTags($request);
            $uetTags = $response->getUetTags() ?? [];
            print("UetTags:\r\n");
            print_r($uetTags);
            print("PartialErrors:\r\n");
            print_r($response->getPartialErrors());
            self::assertEmpty($response->getPartialErrors());
        } else {
            print("-----\r\nUET Tag already exists\r\n");
        }
        self::assertNotEmpty($uetTags);

        return $uetTags[0]->getId();
    }

    /**
     * @depends testAddUetTags
     * @throws Exception
     */
    public function testAddRemarketingLists($tagId)
    {
        // Add remarketing lists that depend on the UET Tag Id retrieved above.
        print("-----\r\nAdding Remarketing Lists:\r\n");
        $audiences = [];

        // Custom Events Rule
        $customEventsList = (new RemarketingList())
            ->setDescription("New list with CustomEventsRule")
            ->setMembershipDuration(30)
            ->setName("Remarketing List with CustomEventsRule ".self::generateRandomAlphaNumeric())
            ->setParentId(self::CUSTOMER_ACCOUNT_ID)
            ->setScope(EntityScope::ACCOUNT)
            ->setTagId($tagId);

        // The rule definition is translated to the following logical expression:
        // (Category Equals video) and (Action Equals play) and (Label Equals trailer)
        // and (Value Equals 5)
        $customEventsRule = (new CustomEventsRule())
            ->setAction("play")
            ->setActionOperator(StringOperator::EQUALS)
            ->setCategory("video")
            ->setCategoryOperator(StringOperator::EQUALS)
            ->setLabel("trailer")
            ->setLabelOperator(StringOperator::EQUALS)
            ->setValue(5.00)
            ->setValueOperator(StringOperator::EQUALS);

        $customEventsList->setRule($customEventsRule);
        $audiences[] = $customEventsList;

        // Page Visitors Rule
        $pageVisitorsList = (new RemarketingList())
            ->setDescription("New list with PageVisitorsRule")
            ->setMembershipDuration(30)
            ->setName("Remarketing List with PageVisitorsRule ".self::generateRandomAlphaNumeric())
            ->setParentId(self::CUSTOMER_ACCOUNT_ID)
            ->setScope(EntityScope::ACCOUNT)
            ->setTagId($tagId);

        $pageVisitorsRule = (new PageVisitorsRule())
            ->setRuleItemGroups([
                (new RuleItemGroup())->setItems([
                    (new StringRuleItem())
                        ->setOperand("Url")
                        ->setOperator(StringOperator::CONTAINS)
                        ->setValue("X"),
                    (new StringRuleItem())
                        ->setOperand("ReferrerUrl")
                        ->setOperator(StringOperator::DOES_NOT_CONTAIN)
                        ->setValue("Z")
                ]),
                (new RuleItemGroup())->setItems([
                    (new StringRuleItem())
                        ->setOperand("Url")
                        ->setOperator(StringOperator::DOES_NOT_BEGIN_WITH)
                        ->setValue("Y")
                ]),
                (new RuleItemGroup())->setItems([
                    (new StringRuleItem())
                        ->setOperand("ReferrerUrl")
                        ->setOperator(StringOperator::EQUALS)
                        ->setValue("Z")
                ])
            ]);

        $pageVisitorsList->setRule($pageVisitorsRule);
        $audiences[] = $pageVisitorsList;

        // Page Visitors Who Did Not Visit Another Page Rule
        $pageVisitorsWhoDidNotVisitAnotherPageList = (new RemarketingList())
            ->setDescription("New list with PageVisitorsWhoDidNotVisitAnotherPageRule")
            ->setMembershipDuration(30)
            ->setName("Remarketing List with PageVisitorsWhoDidNotVisitAnotherPageRule ".self::generateRandomAlphaNumeric())
            ->setParentId(self::CUSTOMER_ACCOUNT_ID)
            ->setScope(EntityScope::ACCOUNT)
            ->setTagId($tagId);

        $pageVisitorsWhoDidNotVisitAnotherPageRule = (new PageVisitorsWhoDidNotVisitAnotherPageRule())
            ->setIncludeRuleItemGroups([
                (new RuleItemGroup())->setItems([
                    (new StringRuleItem())
                        ->setOperand("Url")
                        ->setOperator(StringOperator::CONTAINS)
                        ->setValue("X"),
                    (new StringRuleItem())
                        ->setOperand("ReferrerUrl")
                        ->setOperator(StringOperator::DOES_NOT_CONTAIN)
                        ->setValue("Z")
                ]),
                (new RuleItemGroup())->setItems([
                    (new StringRuleItem())
                        ->setOperand("ReferrerUrl")
                        ->setOperator(StringOperator::EQUALS)
                        ->setValue("Z")
                ]),
            ])
            ->setExcludeRuleItemGroups([
                (new RuleItemGroup())->setItems([
                    (new StringRuleItem())
                        ->setOperand("Url")
                        ->setOperator(StringOperator::BEGINS_WITH)
                        ->setValue("A"),
                    (new StringRuleItem())
                        ->setOperand("ReferrerUrl")
                        ->setOperator(StringOperator::BEGINS_WITH)
                        ->setValue("B")
                ]),
                (new RuleItemGroup())->setItems([
                    (new StringRuleItem())
                        ->setOperand("Url")
                        ->setOperator(StringOperator::CONTAINS)
                        ->setValue("C")
                ]),
            ]);

        $pageVisitorsWhoDidNotVisitAnotherPageList->setRule($pageVisitorsWhoDidNotVisitAnotherPageRule);
        $audiences[] = $pageVisitorsWhoDidNotVisitAnotherPageList;

        // Page Visitors Who Visited Another Page Rule
        $pageVisitorsWhoVisitedAnotherPageList = (new RemarketingList())
            ->setDescription("New list with PageVisitorsWhoVisitedAnotherPageRule")
            ->setMembershipDuration(30)
            ->setName("Remarketing List with PageVisitorsWhoVisitedAnotherPageRule ".self::generateRandomAlphaNumeric())
            ->setParentId(self::CUSTOMER_ACCOUNT_ID)
            ->setScope(EntityScope::ACCOUNT)
            ->setTagId($tagId);

        $pageVisitorsWhoVisitedAnotherPageRule = (new PageVisitorsWhoVisitedAnotherPageRule())
            ->setRuleItemGroups([
                (new RuleItemGroup())->setItems([
                    (new StringRuleItem())
                        ->setOperand("Url")
                        ->setOperator(StringOperator::CONTAINS)
                        ->setValue("X"),
                    (new StringRuleItem())
                        ->setOperand("ReferrerUrl")
                        ->setOperator(StringOperator::DOES_NOT_CONTAIN)
                        ->setValue("Z")
                ]),
                (new RuleItemGroup())->setItems([
                    (new StringRuleItem())
                        ->setOperand("ReferrerUrl")
                        ->setOperator(StringOperator::EQUALS)
                        ->setValue("Z"),
                    (new StringRuleItem())
                        ->setOperand("Url")
                        ->setOperator(StringOperator::DOES_NOT_BEGIN_WITH)
                        ->setValue("Y")
                ]),
            ])
            ->setAnotherRuleItemGroups([
                (new RuleItemGroup())->setItems([
                    (new StringRuleItem())
                        ->setOperand("Url")
                        ->setOperator(StringOperator::BEGINS_WITH)
                        ->setValue("A"),
                    (new StringRuleItem())
                        ->setOperand("ReferrerUrl")
                        ->setOperator(StringOperator::BEGINS_WITH)
                        ->setValue("B")
                ]),
                (new RuleItemGroup())->setItems([
                    (new StringRuleItem())
                        ->setOperand("Url")
                        ->setOperator(StringOperator::CONTAINS)
                        ->setValue("C")
                ])
            ]);

        $pageVisitorsWhoVisitedAnotherPageList->setRule($pageVisitorsWhoVisitedAnotherPageRule);
        $audiences[] = $pageVisitorsWhoVisitedAnotherPageList;

        $request = (new AddAudiencesRequest())->setAudiences($audiences);
        $response = self::$campaignManagementServiceApi->addAudiences($request);
        print("AudienceIds:\r\n");
        print_r($response->getAudienceIds());
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());
        self::assertNotEmpty($response->getAudienceIds());

        return $response->getAudienceIds();
    }

    /**
     * @depends testAddRemarketingLists
     * @throws Exception
     */
    public function testAddCampaign()
    {
        $campaign = (new Campaign())
            ->setName("Remarketing Campaign ".self::generateRandomAlphaNumeric())
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
            ->setName("Remarketing Ad Group".self::generateRandomAlphaNumeric())
            ->setCpcBid((new Bid())->setAmount(0.09))
            ->setStartDate(null)
            ->setEndDate((new Date())->setMonth(12)->setDay(31)->setYear(date("Y")))
            ->setSettings([
                (new TargetSetting())
                    ->setDetails([
                        (new TargetSettingDetail())
                            ->setCriterionTypeGroup(CriterionTypeGroup::AUDIENCE)
                            ->setTargetAndBid(true)
                    ])
            ]);
        return self::addAdGroupsRequest($campaignIds[0], [$adGroup]);
    }

    /**
     * @depends testAddRemarketingLists
     * @depends testAddAdGroup
     * @throws Exception
     */
    public function testAddAdGroupCriterions(array $audienceIds, $adGroupIds)
    {
        // Associate all of the remarketing lists created above with the new ad group.
        print("-----\r\nAdding Ad Group Criterions:\r\n");

        $adGroupCriterions = array();

        foreach ($audienceIds as $audienceId) {
            $adGroupCriterions[] = (new BiddableAdGroupCriterion())
                ->setCriterion(
                    (new AudienceCriterion())
                        ->setAudienceId($audienceId)
                        ->setAudienceType(AudienceType::REMARKETING_LIST)
                )
                ->setCriterionBid((new BidMultiplier())->setMultiplier(20.00))
                ->setAdGroupId($adGroupIds[0])
                ->setStatus(AdGroupCriterionStatus::ACTIVE);
        }
        $request = new AddAdGroupCriterionsRequest([
            'AdGroupCriterions' => $adGroupCriterions,
            'CriterionType' => AdGroupCriterionType::AUDIENCE,
        ]);
        $response = self::$campaignManagementServiceApi->addAdGroupCriterions($request);
        print("AdGroupCriterions:\r\n");
        print_r($response->getAdGroupCriterionIds());
        print("NestedPartialErrors:\r\n");
        print_r($response->getNestedPartialErrors());
        self::assertEmpty($response->getNestedPartialErrors());
        self::assertNotEmpty($response->getAdGroupCriterionIds());
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