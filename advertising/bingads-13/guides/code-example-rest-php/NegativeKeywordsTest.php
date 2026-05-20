<?php

use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddNegativeKeywordsToEntitiesRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddSharedEntityRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BudgetLimitType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Campaign;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\DeleteNegativeKeywordsFromEntitiesRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\DeleteSharedEntitiesRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\EntityNegativeKeyword;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\EntityType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\MatchType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\NegativeKeyword;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\NegativeKeywordList;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\SetSharedEntityAssociationsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\SharedEntityAssociation;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class NegativeKeywordsTest extends RestApiTestBase
{

    /**
     * @throws Exception
     */
    public function testAddCampaigns()
    {
        print("-----\r\nAdding Campaigns:\r\n");

        $campaign = (new Campaign())
            ->setName("Women's Shoes ".self::generateRandomAlphaNumeric())
            ->setBudgetType(BudgetLimitType::DAILY_BUDGET_STANDARD)
            ->setDailyBudget(50.00)
            ->setLanguages(['All'])
            ->setTimeZone('PacificTimeUSCanadaTijuana');

        return self::addCampaignsRequest([$campaign]);
    }

    /**
     * @depends testAddCampaigns
     * @throws Exception
     */
    public function testAddNegativeKeywordsToEntities($campaignIds)
    {
        // You may choose to associate an exclusive set of negative keywords to an individual campaign
        // or ad group. An exclusive set of negative keywords cannot be shared with other campaigns
        // or ad groups. This sample only associates negative keywords with a campaign.
        print("-----\r\nAdding Negative Keywords to Campaign:\r\n");

        $negativeKeyword = (new NegativeKeyword())
            ->setMatchType(MatchType::PHRASE)
            ->setText("auto");

        $entityNegativeKeyword = (new EntityNegativeKeyword())
            ->setEntityId($campaignIds[0])
            ->setEntityType(EntityType::CAMPAIGN)
            ->setNegativeKeywords([$negativeKeyword]);

        $request = new AddNegativeKeywordsToEntitiesRequest([
            'EntityNegativeKeywords' => [$entityNegativeKeyword]
        ]);

        $response = self::$campaignManagementServiceApi->addNegativeKeywordsToEntities($request);
        print("EntityNegativeKeywords:\r\n");
        print_r($response->getNegativeKeywordIds());
        self::assertEmpty($response->getNestedPartialErrors());

        // If you attempt to delete a negative keyword without an identifier the operation will return
        // partial errors corresponding to the index of the negative keyword that was not deleted.
        $request = new DeleteNegativeKeywordsFromEntitiesRequest([
            'EntityNegativeKeywords' => [$entityNegativeKeyword]
        ]);
        $response = self::$campaignManagementServiceApi->deleteNegativeKeywordsFromEntities($request);
        self::assertNotEmpty($response->getNestedPartialErrors());
    }

    /**
     * @depends testAddNegativeKeywordsToEntities
     * @throws Exception
     */
    public function testAddSharedNegativeKeywordList()
    {
        // Negative keywords can also be added and deleted from a shared negative keyword list.
        // The negative keyword list can be shared or associated with multiple campaigns.
        // NegativeKeywordList inherits from SharedList which inherits from SharedEntity.
        print("-----\r\nAdding Shared Negative Keyword List:\r\n");

        $negativeKeywordList = (new NegativeKeywordList())
            ->setName("My Negative Keyword List ".self::generateRandomAlphaNumeric())
            ->setType("NegativeKeywordList");

        $negativeKeywords = [
            (new NegativeKeyword())
                ->setText("car")
                ->setType("NegativeKeyword")
                ->setMatchType(MatchType::EXACT),
            (new NegativeKeyword())
                ->setText("car")
                ->setType("NegativeKeyword")
                ->setMatchType(MatchType::PHRASE)
        ];

        $request = new AddSharedEntityRequest(
            [
                'SharedEntity' => $negativeKeywordList,
                'NegativeKeywords' => $negativeKeywords
            ]
        );

        $response = self::$campaignManagementServiceApi->addSharedEntity($request);

        $sharedEntityId = $response->getSharedEntityId();
        print("Shared Entity ID: ".$sharedEntityId."\r\n");
        self::assertNotEmpty($sharedEntityId);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());

        return $sharedEntityId;
    }

    /**
     * @depends testAddCampaigns
     * @depends testAddSharedNegativeKeywordList
     * @throws Exception
     */
    public function testAssociateSharedNegativeKeywordList($campaignIds, $sharedEntityId)
    {
        // Negative keywords were added to the negative keyword list above. You can associate the
        // shared list of negative keywords with a campaign with or without negative keywords.
        // Shared negative keyword lists cannot be associated with an ad group. An ad group can only
        // be assigned an exclusive set of negative keywords.
        print("-----\r\nAssociating Shared Negative Keyword List with Campaign:\r\n");

        $association = (new SharedEntityAssociation())
            ->setEntityId($campaignIds[0])
            ->setEntityType(EntityType::CAMPAIGN)
            ->setSharedEntityId($sharedEntityId)
            ->setSharedEntityType("NegativeKeywordList");

        $request = new SetSharedEntityAssociationsRequest([
            'Associations' => [$association]
        ]);

        $response = self::$campaignManagementServiceApi->setSharedEntityAssociations($request);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());

        return $campaignIds;
    }

    /**
     * @depends testAssociateSharedNegativeKeywordList
     * @throws Exception
     */
    public function testDeleteCampaigns($campaignIds)
    {
        self::deleteCampaignsRequest($campaignIds);
    }

    /**
     * @depends testAddSharedNegativeKeywordList
     * @depends testDeleteCampaigns
     * @throws Exception
     */
    public function testDeleteSharedNegativeKeywordList($sharedEntityId)
    {
        // DeleteCampaigns does not delete the negative keyword list from the account's library.
        // Call the DeleteSharedEntities operation to delete the shared entities.
        print("-----\r\nDeleting Shared Negative Keyword List:\r\n");

        $negativeKeywordList = (new NegativeKeywordList())
            ->setId($sharedEntityId)
            ->setType("NegativeKeywordList");

        $request = new DeleteSharedEntitiesRequest([
            'SharedEntities' => [$negativeKeywordList]
        ]);

        $response = self::$campaignManagementServiceApi->deleteSharedEntities($request);
        print("Deleted Shared Entity ID: ".$sharedEntityId."\r\n");
        self::assertNotEmpty($sharedEntityId);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());
    }
}