<?php

use Microsoft\MsAds\Rest\ApiException;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddExperimentsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\CampaignType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Date;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Experiment;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\GetCampaignsByAccountIdRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\GetExperimentsByIdsRequest;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class ExperimentsTest extends RestApiTestBase
{
    /**
     * Get eligible campaigns for experiments.
     * @throws ApiException
     */
    public function testGetEligibleCampaigns()
    {
        print("-----\r\nGetting Eligible Campaigns:\r\n");

        $request = new GetCampaignsByAccountIdRequest([
            'AccountId' => self::CUSTOMER_ACCOUNT_ID,
            'CampaignType' => CampaignType::SEARCH,
        ]);

        $response = self::$campaignManagementServiceApi->getCampaignsByAccountId($request);
        $campaigns = $response->getCampaigns();
        $eligibleCampaigns = array_filter($campaigns, function ($campaign) {
            return (empty($campaign->getExperimentId()) && empty($campaign->getBudgetId()));
        });
        print("eligibleCampaigns:\r\n");
        print_r($eligibleCampaigns);
        self::assertNotEmpty($eligibleCampaigns);

        return $eligibleCampaigns;
    }

    /**
     * Add an experiment for a base campaign.
     * @depends testGetEligibleCampaigns
     * @throws ApiException
     */
    public function testAddExperiment($eligibleCampaigns)
    {
        print("-----\r\nAdding Experiment:\r\n");

        $baseCampaign = reset($eligibleCampaigns);

        $experiment = new Experiment();
        $experiment->setBaseCampaignId($baseCampaign->getId());
        $experiment->setName($baseCampaign->getName()."-Experiment".self::generateRandomAlphaNumeric());
        $experiment->setTrafficSplitPercent(50);
        //Required. You must set the status to Active; however, the status will be set automatically by Microsoft Advertising to Creating,
        // and the next time you retrieve the experiment its status will be either Active, Creating, CreationFailed, Paused, or Scheduled.
        $experiment->setExperimentStatus('Active');

        $startDate = new Date();
        $startDate->setDay(date("d"));
        $startDate->setMonth(date("m"));
        $startDate->setYear(date("Y"));
        $experiment->setStartDate($startDate);

        $endDate = new Date();
        $endDate->setDay(31);
        $endDate->setMonth(12);
        $endDate->setYear(date("Y"));
        $experiment->setEndDate($endDate);

        $request = new AddExperimentsRequest([
            'Experiments' => [$experiment],
        ]);

        $response = self::$campaignManagementServiceApi->addExperiments($request);

        $experimentIds = $response->getExperimentIds();
        print_r($experimentIds);
        self::assertNotEmpty($experimentIds);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());

        return $experimentIds;
    }

    /**
     * Get experiments by IDs.
     * @depends testAddExperiment
     * @throws ApiException
     */
    public function testGetExperimentsByIds($experimentIds)
    {
        print("-----\r\nGetting Experiments by IDs:\r\n");

        $request = new GetExperimentsByIdsRequest([
            'ExperimentIds' => $experimentIds,
        ]);

        $response = self::$campaignManagementServiceApi->getExperimentsByIds($request);

        $experiments = $response->getExperiments();
        print_r($experiments);
        self::assertNotEmpty($experiments);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());

        return $experiments;
    }

    /**
     * Delete the experiment and its campaign.
     * @depends testGetExperimentsByIds
     * @throws ApiException
     */
    public function testDeleteExperiment($experiments)
    {
        print("-----\r\nDeleting Experiment:\r\n");

        $experiment = reset($experiments);

        if ($experiment->getExperimentStatus() === "Graduated") {
            $experimentCampaignId = $experiment->getExperimentCampaignId();
            self::deleteCampaignsRequest([$experimentCampaignId]);
        }

        $request = new \Microsoft\MsAds\Rest\Model\CampaignManagementService\DeleteExperimentsRequest([
            'ExperimentIds' => [$experiment->getId()],
        ]);
        $response = self::$campaignManagementServiceApi->deleteExperiments($request);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());
        printf("Deleted Experiment Id: %s\r\n", $experiment->getId());
    }
}