<?php

namespace Microsoft\MsAds\Rest\Test\Services;

use Microsoft\MsAds\Rest\ApiException;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddLabelsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AdGroup;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Bid;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BudgetLimitType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Campaign;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Date;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\DeleteLabelsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\EntityType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\GetLabelsByIdsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Label;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\LabelAssociation;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Paging;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\SetLabelAssociationsRequest;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class LabelsTest extends RestApiTestBase
{

    private const MAX_GET_LABELS_BY_IDS = 1000;
    private const MAX_LABEL_IDS_FOR_GET_LABEL_ASSOCIATIONS = 1;
    private const MAX_ENTITY_IDS_FOR_GET_LABEL_ASSOCIATIONS = 100;
    private const MAX_PAGING_SIZE = 1000;

    /**
     * @throws ApiException
     */
    public function testAddCampaigns()
    {
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
     * @throws ApiException
     */
    public function testAddAdGroups($campaignIds)
    {
        print("-----\r\nAdding Ad Groups:\r\n");

        $adGroup = (new AdGroup())
            ->setName("Ad Group Women's Red Shoe Sale".self::generateRandomAlphaNumeric())
            ->setCpcBid((new Bid())->setAmount(0.09))
            ->setEndDate((new Date())->setDay(31)->setMonth(12)->setYear(date("Y")));

        return self::addAdGroupsRequest($campaignIds[0], [$adGroup]);
    }

    /**
     * @depends testAddCampaigns
     * @depends testAddAdGroups
     * @throws ApiException
     */
    public function testAddLabels()
    {
        print("-----\r\nAdding Labels:\r\n");

        $labels = [];
        for ($i = 0; $i < 5; $i++) {
            $color = "#".substr("000000".dechex(rand()), -6);
            $labels[] = (new Label())
                ->setColorCode($color)
                ->setDescription('Label Description')
                ->setName('Label Name '.$color.' '.self::generateRandomAlphaNumeric());
        }

        $request = (new AddLabelsRequest())
            ->setLabels($labels);

        $response = self::$campaignManagementServiceApi->addLabels($request);
        $labelIds = $response->getLabelIds();

        print_r($labelIds);
        self::assertNotEmpty($labelIds);
        self::assertEmpty($response->getPartialErrors());
        return $labelIds;
    }

    /**
     * @depends testAddCampaigns
     * @depends testAddAdGroups
     * @depends testAddLabels
     * @throws ApiException
     */
    public function testGetLabelsByIds($campaignIds, $adGroupIds, $labelIds)
    {
        print("-----\r\nGetting Labels by IDs:\r\n");

        $paging = (new Paging())
            ->setIndex(0)
            ->setSize(self::MAX_GET_LABELS_BY_IDS);

        $request = (new GetLabelsByIdsRequest())
            ->setLabelIds($labelIds)
            ->setPageInfo($paging);

        $response = self::$campaignManagementServiceApi->getLabelsByIds($request);
        $retrievedLabels = $response->getLabels();

        print_r($retrievedLabels);
        self::assertNotEmpty($retrievedLabels);
        self::assertEmpty($response->getPartialErrors());

        print("-----\nAssociating all of the labels with a campaign...\r\n");

        $campaignLabelAssociations = $this->CreateExampleLabelAssociationsByEntityId(
            $campaignIds[0],
            $labelIds
        );
        $request = (new SetLabelAssociationsRequest())
            ->setLabelAssociations($campaignLabelAssociations)
            ->setEntityType(EntityType::CAMPAIGN);
        $response = self::$campaignManagementServiceApi->setLabelAssociations($request);
        self::assertEmpty($response->getPartialErrors());

        print("-----\nAssociating all of the labels with an ad group...\r\n");
        $adGroupLabelAssociations = $this->CreateExampleLabelAssociationsByEntityId(
            $adGroupIds[0],
            $labelIds
        );
        $request = (new SetLabelAssociationsRequest())
            ->setLabelAssociations($adGroupLabelAssociations)
            ->setEntityType(EntityType::AD_GROUP);
        $response = self::$campaignManagementServiceApi->setLabelAssociations($request);
        self::assertEmpty($response->getPartialErrors());

        print("-----\nUse paging to get all campaign label associations...\r\n");
        self::GetLabelAssociationsByLabelIdsHelper(EntityType::CAMPAIGN, $labelIds);

        print("-----\nUse paging to get all ad group label associations...\r\n");
        self::GetLabelAssociationsByLabelIdsHelper(EntityType::AD_GROUP, $labelIds);


        print("-----\nGet all label associations for all specified campaigns...\r\n");
        self::GetLabelAssociationsByEntityIdsHelper(
            EntityType::CAMPAIGN,
            $campaignIds
        );

        print("-----\nGet all label associations for all specified ad groups...\r\n");
        self::GetLabelAssociationsByEntityIdsHelper(
            EntityType::AD_GROUP,
            $adGroupIds
        );

        print("-----\nDelete all label associations that we set above....\r\n");

        // Deleting the associations is not necessary if you are deleting the corresponding campaign(s), as the
        // contained ad groups, ads, and associations would also be deleted.

        self::deleteLabelAssociationsRequest(
            EntityType::CAMPAIGN,
            $campaignLabelAssociations
        );
        self::deleteLabelAssociationsRequest(
            EntityType::AD_GROUP,
            $adGroupLabelAssociations
        );
        return $labelIds;
    }

    /**
     * @depends testGetLabelsByIds
     * @throws ApiException
     */
    public function testDeleteLabels($labelIds)
    {
        print("-----\r\nDeleting Labels:\r\n");

        $request = (new DeleteLabelsRequest())
            ->setLabelIds($labelIds);

        $response = self::$campaignManagementServiceApi->deleteLabels($request);
        printf("Deleted Label ids: %s\r\n", implode(', ', $labelIds));
        self::assertEmpty($response->getPartialErrors());
    }

    /**
     * @depends testAddCampaigns
     * @depends testDeleteLabels
     * @throws ApiException
     */
    public function testDeleteCampaigns($campaignIds)
    {
        self::deleteCampaignsRequest($campaignIds);
    }

    private function CreateExampleLabelAssociationsByEntityId(
        $entityId,
        $labelIds
    ): array {
        $labelAssociations = array();
        foreach ($labelIds as $labelId) {
            $labelAssociation = new LabelAssociation();
            $labelAssociation->setEntityId($entityId);
            $labelAssociation->setLabelId($labelId);
            $labelAssociations[] = $labelAssociation;
        }
        return $labelAssociations;
    }


    /**
     * @throws ApiException
     */
    private function GetLabelAssociationsByLabelIdsHelper(
        $entityType,
        $labelIds
    ): void {
        $labelAssociations = array();
        $labelIdsPageIndex = 0;

        while ($labelIdsPageIndex * self::MAX_LABEL_IDS_FOR_GET_LABEL_ASSOCIATIONS < count($labelIds)) {
            $getLabelIds = array_slice(
                $labelIds,
                $labelIdsPageIndex++ * self::MAX_LABEL_IDS_FOR_GET_LABEL_ASSOCIATIONS,
                self::MAX_LABEL_IDS_FOR_GET_LABEL_ASSOCIATIONS
            );

            $labelAssociationsPageIndex = 0;
            $foundLastPage = false;

            while (!$foundLastPage) {
                $labelsPaging = new Paging();
                $labelsPaging->setIndex($labelAssociationsPageIndex++);
                $labelsPaging->setSize(self::MAX_PAGING_SIZE);

                $getLabelAssociations = self::getLabelAssociationsByLabelIdsRequest(
                    $entityType,
                    $getLabelIds,
                    $labelsPaging
                );

                $labelAssociations = array_merge(
                    $labelAssociations,
                    $getLabelAssociations
                );

                $foundLastPage = self::MAX_PAGING_SIZE > count($getLabelAssociations);
            }
        }
    }

    /**
     * @throws ApiException
     */
    private function GetLabelAssociationsByEntityIdsHelper(
        $entityType,
        $entityIds
    ): void {
        $labelAssociations = array();
        $entityIdsPageIndex = 0;

        while ($entityIdsPageIndex * self::MAX_ENTITY_IDS_FOR_GET_LABEL_ASSOCIATIONS < count($entityIds)) {
            $getEntityIds = array_slice(
                $entityIds,
                $entityIdsPageIndex++ * self::MAX_ENTITY_IDS_FOR_GET_LABEL_ASSOCIATIONS,
                self::MAX_ENTITY_IDS_FOR_GET_LABEL_ASSOCIATIONS
            );

            $getLabelAssociationsByEntityIds = self::getLabelAssociationsByEntityIdsRequest(
                $entityType,
                $getEntityIds
            );

            $labelAssociations = array_merge(
                $labelAssociations,
                $getLabelAssociationsByEntityIds
            );
        }
    }
}