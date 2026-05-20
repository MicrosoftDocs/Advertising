<?php

namespace Microsoft\MsAds\Rest\Test\Services;

use DateTime;
use Exception;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AccountPropertyName;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddConversionGoalsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ApplyOfflineConversionsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ConversionGoalCategory;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ConversionGoalCountType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ConversionGoalRevenue;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ConversionGoalRevenueType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ConversionGoalStatus;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ConversionGoalType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\EntityScope;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\GetAccountPropertiesRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\GetConversionGoalsByIdsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\OfflineConversion;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\OfflineConversionGoal;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class OfflineConversionsTest extends RestApiTestBase
{
    protected static string $goalName;

    /**
     * @throws Exception
     */
    public function testAddOfflineConversionGoal()
    {
        print("-----\r\nAdding Offline Conversion Goal:\r\n");

        self::$goalName = "TEST_OFFLINE_CONVERSION_GOAL".self::generateRandomAlphaNumeric();
        // A conversion goal cannot be deleted, so even if this is a test
        // please choose an appropriate name accordingly.
        $offlineConversionGoal = (new OfflineConversionGoal())
            // Determines how long after a click that you want to count offline conversions.
            ->setConversionWindowInMinutes(43200)
            // If the count type is 'Unique' then only the first offline conversion will be counted.
            // By setting the count type to 'All', then all offline conversions for the same
            // MicrosoftClickId with different conversion times will be added cumulatively.
            ->setCountType(ConversionGoalCountType::ALL)
            ->setName(self::$goalName)
            // The default conversion currency code and value. Each offline conversion can override it.
            ->setRevenue(
                (new ConversionGoalRevenue())
                    ->setType(ConversionGoalRevenueType::FIXED_VALUE)
                    ->setValue(5.00)
            )
            ->setScope(EntityScope::ACCOUNT)
            ->setStatus(ConversionGoalStatus::ACTIVE)
            ->setGoalCategory(ConversionGoalCategory::PURCHASE);

        $request = new AddConversionGoalsRequest([
            'ConversionGoals' => [$offlineConversionGoal]
        ]);

        $response = self::$campaignManagementServiceApi->addConversionGoals($request);

        $conversionGoalIds = $response->getConversionGoalIds();
        print("Conversion Goal IDs:\r\n");
        print_r($conversionGoalIds);
        print("Partial Errors:\r\n");
        print_r($response->getPartialErrors());
        self::assertNotEmpty($conversionGoalIds);
        self::assertEmpty($response->getPartialErrors());

        return $conversionGoalIds;
    }

    /**
     * @depends testAddOfflineConversionGoal
     * @throws Exception
     */
    public function testGetOfflineConversionGoal(array $conversionGoalIds)
    {
        print("-----\r\nGetting Offline Conversion Goal:\r\n");

        $request = new GetConversionGoalsByIdsRequest([
            'ConversionGoalIds' => $conversionGoalIds,
            'ConversionGoalTypes' => [ConversionGoalType::OFFLINE_CONVERSION]
        ]);

        $response = self::$campaignManagementServiceApi->getConversionGoalsByIds($request);

        $conversionGoals = $response->getConversionGoals();
        print("Conversion Goals:\r\n");
        print_r($conversionGoals);
        print("Partial Errors:\r\n");
        print_r($response->getPartialErrors());

        self::assertNotEmpty($conversionGoals);
        self::assertEmpty($response->getPartialErrors());
    }

    /**
     * @depends testAddOfflineConversionGoal
     * @throws Exception
     */
    public function testGetAccountProperties()
    {
        // Every time you create a new OfflineConversionGoal via either the Bing Ads web application or Campaign Management API,
        // the MSCLKIDAutoTaggingEnabled value of the corresponding AccountProperty is set to 'true' automatically.
        // We can confirm the setting now.
        print("-----\r\nGetting Account Properties:\r\n");

        $request = new GetAccountPropertiesRequest([
            'AccountPropertyNames' => [AccountPropertyName::MSCLKID_AUTO_TAGGING_ENABLED]
        ]);

        $response = self::$campaignManagementServiceApi->getAccountProperties($request);

        $accountProperties = $response->getAccountProperties();
        print("Account Properties:\r\n");
        print_r($accountProperties);
        print("Partial Errors:\r\n");
        print_r($response->getPartialErrors());

        self::assertNotEmpty($accountProperties);
        self::assertEmpty($response->getPartialErrors());
    }

    /**
     * @depends testAddOfflineConversionGoal
     * @throws Exception
     */
    public function testApplyOfflineConversions()
    {
        print("-----\r\nApplying Offline Conversions:\r\n");

        $offlineConversion = (new OfflineConversion())
            // If you do not specify an offline conversion currency code,
            // then the 'CurrencyCode' element of the goal's 'ConversionGoalRevenue' is used.
            ->setConversionCurrencyCode("USD")
            // The conversion name must match the 'Name' of the 'OfflineConversionGoal'.
            // If it does not match you won't observe any error, although the offline
            // conversion will not be counted.
            ->setConversionName(self::$goalName)
            // The date and time must be in UTC, should align to the date and time of the
            // recorded click (MicrosoftClickId), and cannot be in the future.
            ->setConversionTime(new DateTime())
            // If you do not specify an offline conversion value,
            // then the 'Value' element of the goal's 'ConversionGoalRevenue' is used.
            ->setConversionValue(10)
            ->setMicrosoftClickId("f894f652ea334e739002f7167ab8f8e3");


        // After the OfflineConversionGoal is set up, wait two hours before sending Bing Ads the offline conversions.
        // This example would not succeed in production because we created the goal very recently i.e.,
        // please see above call to AddConversionGoalsAsync.
        $request = new ApplyOfflineConversionsRequest([
            'OfflineConversions' => [$offlineConversion]
        ]);

        $response = self::$campaignManagementServiceApi->applyOfflineConversions($request);
        print("Partial Errors:\r\n");
        print_r($response->getPartialErrors());
        self::assertNotEmpty($response->getPartialErrors());
    }
}