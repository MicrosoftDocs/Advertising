<?php

use Microsoft\MsAds\Rest\ApiException;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ActionAdExtension;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ActionAdExtensionActionType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddAdExtensionsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddMediaRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Address;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AdExtensionIdToEntityIdAssociation;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AdExtensionStatus;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AdExtensionsTypeFilter;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AppAdExtension;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AssociationType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BudgetLimitType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\CallAdExtension;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\CalloutAdExtension;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Campaign;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\CampaignType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Date;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Day;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\DayTime;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\DeleteAdExtensionsAssociationsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\DeleteAdExtensionsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\DeleteMediaRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\GetAdExtensionsByIdsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\GetAdExtensionsEditorialReasonsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\GetCampaignsByIdsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\LocationAdExtension;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Minute;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\PriceAdExtension;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\PriceTableRow;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ReviewAdExtension;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Schedule;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\SetAdExtensionsAssociationsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\SitelinkAdExtension;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\StructuredSnippetAdExtension;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\UpdateAdExtensionsRequest;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class AdExtensionsTest extends RestApiTestBase
{

    // To run this example you'll need to provide your own image.
    // For required aspect ratios and recommended dimensions please see
    // Image remarks at https://go.microsoft.com/fwlink/?linkid=872754.
    protected string $mediaFilePath = "c:\\dev\\media\\";
    protected string $imageAdExtensionMediaFileName = "imageadextension300x200.png";

    // Add a new search campaign.

    /**
     * @throws ApiException
     */
    public function testAddCampaigns()
    {
        $budgetLimitType = BudgetLimitType::DAILY_BUDGET_STANDARD;
        $campaignType = CampaignType::SEARCH;
        $campaign = new Campaign();
        $campaign->setName("Women's Shoes ".self::generateRandomAlphaNumeric());
        $campaign->setBudgetType($budgetLimitType);
        $campaign->setDailyBudget(50.00);
        $campaign->setLanguages(array("All"));
        $campaign->setTimeZone("PacificTimeUSCanadaTijuana");
        $campaign->setCampaignType($campaignType);

        print("-----\r\nGetAdExtensionsByIds:\r\n");
        $request = new GetAdExtensionsByIdsRequest(
            [
                'AccountId' => self::CUSTOMER_ACCOUNT_ID,
                'AdExtensionIds' => [1, 2, 3],
                'AdExtensionType' => [
                    AdExtensionsTypeFilter::LOCATION_AD_EXTENSION,
                    AdExtensionsTypeFilter::CALL_AD_EXTENSION
                ],
                'ReturnAdditionalFields' => null
            ]
        );
        $response = self::$campaignManagementServiceApi->getAdExtensionsByIds($request);

        return self::addCampaignsRequest([$campaign]);
    }

    /**
     * @depends testAddCampaigns
     * @throws ApiException
     */
    public function testGetCampaigns($campaignIds)
    {
        $budgetLimitType = BudgetLimitType::DAILY_BUDGET_STANDARD;
        $campaignType = CampaignType::SEARCH;
        $request = new GetCampaignsByIdsRequest(
            [
                'AccountId' => self::CUSTOMER_ACCOUNT_ID,
                'CampaignIds' => $campaignIds
            ]
        );
        $getCampaignsResponse = self::$campaignManagementServiceApi->getCampaignsByIds($request);
        print("GetCampaignsByIds:\r\n");
        print_r($getCampaignsResponse->getCampaigns());
        print("PartialErrors:\r\n");
        print_r($getCampaignsResponse->getPartialErrors());
        self::assertEmpty($getCampaignsResponse->getPartialErrors());
        self::assertEquals($budgetLimitType, $getCampaignsResponse->getCampaigns()[0]->getBudgetType());
        self::assertEquals($campaignType, $getCampaignsResponse->getCampaigns()[0]->getCampaignType());

        return $campaignIds;
    }

    /**
     * @depends testGetCampaigns
     * @throws ApiException
     */
    public function testAdExtensions($campaignIds)
    {
        $imageAdExtensionMedia = $this->GetImageMedia(
            "Image15x10",
            $this->mediaFilePath.$this->imageAdExtensionMediaFileName
        );

        $addMedia = array();
        $addMedia[] = $imageAdExtensionMedia;

        print("-----\r\nAddMedia:\r\n");
        $request = new AddMediaRequest(
            [
                'AccountId' => self::CUSTOMER_ACCOUNT_ID,
                'Media' => $addMedia
            ]
        );
        $response = self::$campaignManagementServiceApi->addMedia($request);
        $mediaIds = $response->getMediaIds();
        print("MediaIds:\r\n");
        print_r($mediaIds);

        // Add the extensions to the account's library.

        $adExtensions = array();

        $extension = new ActionAdExtension();
        $extension->setActionType(ActionAdExtensionActionType::ACT_NOW);
        $extension->setFinalUrls(array("http://www.contoso.com/womenshoesale"));
        $extension->setLanguage("English");
        $extension->setStatus(AdExtensionStatus::ACTIVE);

        $adExtensions[] = $extension;

        $extension = new AppAdExtension();
        $extension->setAppPlatform("Windows");
        $extension->setAppStoreId("AppStoreIdGoesHere");
        $extension->setDisplayText("Contoso");
        $extension->setDestinationUrl("DestinationUrlGoesHere");
        // If you supply the AppAdExtension properties above, then you can add this line.
        //$adExtensions[] = $encodedExtension;

        $extension = new CallAdExtension();
        $extension->setCountryCode("US");
        $extension->setPhoneNumber("2065550100");
        $extension->setIsCallOnly(false);

        // Include the call extension Monday - Friday from 9am - 9pm
        // in the account's time zone.
        $callScheduling = new Schedule();
        $callDayTimeRanges = array();
        for ($index = 0; $index < 5; $index++) {
            $dayTime = new DayTime();
            $dayTime->setStartHour(9);
            $dayTime->setStartMinute(Minute::ZERO);
            $dayTime->setEndHour(21);
            $dayTime->setEndMinute(Minute::ZERO);
            $callDayTimeRanges[] = $dayTime;
        }
        $callDayTimeRanges[0]->setDay(Day::MONDAY);
        $callDayTimeRanges[1]->setDay(Day::TUESDAY);
        $callDayTimeRanges[2]->setDay(Day::WEDNESDAY);
        $callDayTimeRanges[3]->setDay(Day::THURSDAY);
        $callDayTimeRanges[4]->setDay(Day::FRIDAY);
        $callScheduling->setDayTimeRanges($callDayTimeRanges);
        $callScheduling->setUseSearcherTimeZone(false);
        $callScheduling->setStartDate(null);

        $callSchedulingEndDate = new Date();
        $callSchedulingEndDate->setDay(31);
        $callSchedulingEndDate->setMonth(12);
        $callSchedulingEndDate->setYear(date("Y"));
        $callScheduling->setEndDate($callSchedulingEndDate);

        $extension->setScheduling($callScheduling);
        $adExtensions[] = $extension;

        $extension = new CalloutAdExtension();
        $extension->setText("Callout Text");
        $adExtensions[] = $extension;

        $extension = new LocationAdExtension();
        $extension->setPhoneNumber("206-555-0100");
        $extension->setCompanyName("Alpine Ski House");

        $address = new Address();
        $address->setStreetAddress("1234 Washington Place");
        $address->setStreetAddress2("Suite 1210");
        $address->setCityName("Woodinville");
        $address->setProvinceName("WA");
        $address->setCountryCode("US");
        $address->setPostalCode("98608");
        $extension->setAddress($address);

        // Include the location extension every Saturday morning
        // in the search user's time zone.
        $locationScheduling = new Schedule();
        $locationDayTimeRanges = array();

        $locationDayTime = new DayTime();
        $locationDayTime->setDay(Day::SATURDAY);
        $locationDayTime->setStartHour(9);
        $locationDayTime->setStartMinute(Minute::ZERO);
        $locationDayTime->setEndHour(12);
        $locationDayTime->setEndMinute(Minute::ZERO);
        $locationDayTimeRanges[] = $locationDayTime;

        $locationScheduling->setDayTimeRanges($locationDayTimeRanges);
        $locationScheduling->setUseSearcherTimeZone(false);
        $locationScheduling->setStartDate(null);

        $locationSchedulingEndDate = new Date();
        $locationSchedulingEndDate->setDay(31);
        $locationSchedulingEndDate->setMonth(12);
        $locationSchedulingEndDate->setYear(date("Y"));
        $locationScheduling->setEndDate($locationSchedulingEndDate);

        $extension->setScheduling($locationScheduling);
        $adExtensions[] = $extension;

        $extension = new PriceAdExtension();
        $extension->setLanguage("English");
        $extension->setPriceExtensionType('Events');

        $tableRows = array();

        $tableRowA = new PriceTableRow();
        $tableRowA->setCurrencyCode("USD");
        $tableRowA->setDescription("Come to the event");
        $tableRowA->setFinalUrls(array("http://www.contoso.com/womenshoesale"));
        $tableRowA->setHeader("New Event");
        $tableRowA->setPrice(9.99);
        $tableRowA->setPriceQualifier('From');
        $tableRowA->setPriceUnit('PerDay');
        $tableRows[] = $tableRowA;

        $tableRowB = new PriceTableRow();
        $tableRowB->setCurrencyCode("USD");
        $tableRowB->setDescription("Come to the next event");
        $tableRowB->setFinalUrls(array("http://www.contoso.com/womenshoesale"));
        $tableRowB->setHeader("Next Event");
        $tableRowB->setPrice(9.99);
        $tableRowB->setPriceQualifier('From');
        $tableRowB->setPriceUnit('PerDay');
        $tableRows[] = $tableRowB;

        $tableRowC = new PriceTableRow();
        $tableRowC->setCurrencyCode("USD");
        $tableRowC->setDescription("Come to the final event");
        $tableRowC->setFinalUrls(array("http://www.contoso.com/womenshoesale"));
        $tableRowC->setHeader("Final Event");
        $tableRowC->setPrice(9.99);
        $tableRowC->setPriceQualifier('From');
        $tableRowC->setPriceUnit('PerDay');
        $tableRows[] = $tableRowC;

        $extension->setTableRows($tableRows);
        $adExtensions[] = $extension;

        $extension = new ReviewAdExtension();
        $extension->setIsExact(true);
        $extension->setSource("Review Source Name");
        $extension->setText("Review Text");
        // The Url of the third-party review. This is not your business Url.
        $extension->setUrl("http://review.contoso.com");
        $adExtensions[] = $extension;

        $extension = new SitelinkAdExtension();
        $extension->setDescription1("Simple & Transparent.");
        $extension->setDescription2("No Upfront Cost.");
        $extension->setDisplayText("Women's Shoe Sale");
        $extension->setFinalUrls(array("http://www.contoso.com/womenshoesale"));
        $adExtensions[] = $extension;

        $extension = new StructuredSnippetAdExtension();
        $extension->setHeader("Brands");
        $extension->setValues(array("Windows", "Xbox", "Skype"));
        $adExtensions[] = $extension;

        // Add all extensions to the account's ad extension library

        print("-----\r\nAddAdExtensions:\r\n");
        $request = new AddAdExtensionsRequest(
            [
                'AccountId' => self::CUSTOMER_ACCOUNT_ID,
                'AdExtensions' => $adExtensions
            ]
        );
        $response = self::$campaignManagementServiceApi->addAdExtensions($request);
        $adExtensionIdentities = $response->getAdExtensionIdentities();
        print("AdExtensionIdentities:\r\n");
        print_r($adExtensionIdentities);
        print("NestedPartialErrors:\r\n");
        print_r($response->getNestedPartialErrors());

        // DeleteAdExtensionsAssociations, SetAdExtensionsAssociations, and GetAdExtensionsEditorialReasons
        // operations each require a list of type AdExtensionIdToEntityIdAssociation.

        $adExtensionIdToEntityIdAssociations = array();

        // GetAdExtensionsByIds requires a list of type long.

        $adExtensionIds = array();

        // Loop through the list of extension IDs and build any required data structures
        // for subsequent operations.

        for ($index = 0; $index < count($adExtensionIdentities); $index++) {
            if (!empty($adExtensionIdentities[$index]) && $adExtensionIdentities[$index]->getId() !== null) {
                $adExtensionIdToEntityIdAssociations[$index] = new AdExtensionIdToEntityIdAssociation();
                $adExtensionIdToEntityIdAssociations[$index]->setAdExtensionId($adExtensionIdentities[$index]->getId());
                $adExtensionIdToEntityIdAssociations[$index]->setEntityId($campaignIds[0]);

                $adExtensionIds[$index] = $adExtensionIdentities[$index]->getId();
            }
        };

        // Associate the ad extensions with the campaign.

        print("-----\r\nSetAdExtensionsAssociations:\r\n");
        $request = new SetAdExtensionsAssociationsRequest(
            [
                'AccountId' => self::CUSTOMER_ACCOUNT_ID,
                'AdExtensionIdToEntityIdAssociations' => $adExtensionIdToEntityIdAssociations,
                'AssociationType' => AssociationType::CAMPAIGN
            ]
        );
        $response = self::$campaignManagementServiceApi->setAdExtensionsAssociations($request);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());

        // Get editorial rejection reasons for the respective ad extension and entity associations.

        print("-----\r\nGetAdExtensionsEditorialReasons:\r\n");
        $request = new GetAdExtensionsEditorialReasonsRequest(
            [
                'AccountId' => self::CUSTOMER_ACCOUNT_ID,
                'AdExtensionIdToEntityIdAssociations' => $adExtensionIdToEntityIdAssociations,
                'AssociationType' => AssociationType::CAMPAIGN
            ]
        );
        $response = self::$campaignManagementServiceApi->getAdExtensionsEditorialReasons($request);
        $adExtensionEditorialReasonCollection = $response->getEditorialReasons();
        print("EditorialReasons:\r\n");
        print_r($adExtensionEditorialReasonCollection);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());

        // Get only the location extensions and remove scheduling.

        $adExtensionsTypeFilter = array(
            AdExtensionsTypeFilter::LOCATION_AD_EXTENSION,
            AdExtensionsTypeFilter::CALL_AD_EXTENSION
        );

        // In this example partial errors will be returned for indices where the ad extensions
        // are not location ad extensions.
        // This is an example, and ideally you would only send the required ad extension IDs.

        print("-----\r\nGetAdExtensionsByIds:\r\n");
        $request = new GetAdExtensionsByIdsRequest(
            [
                'AccountId' => self::CUSTOMER_ACCOUNT_ID,
                'AdExtensionIds' => $adExtensionIds,
                'AdExtensionType' => $adExtensionsTypeFilter,
                'ReturnAdditionalFields' => null
            ]
        );
        $response = self::$campaignManagementServiceApi->getAdExtensionsByIds($request);
        $adExtensions = $response->getAdExtensions();
        print("AdExtensions:\r\n");
        print_r($adExtensions);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertNotEmpty($response->getPartialErrors());

        $updateExtensions = array();

        foreach ($adExtensions as $extension) {
            // GetAdExtensionsByIds will return a nil element if the request filters / conditions were not met.
            if (!empty($extension) && $extension->getId() !== null) {
                // Remove read-only elements that would otherwise cause the update operation to fail.
                $updateExtension = $extension;
                $updateExtension->offsetUnset('Version');
                $updateExtension->offsetUnset('GeoCodeStatus');

                // If you set the Scheduling element null, any existing scheduling set for the ad extension will remain unchanged.
                // If you set this to any non-null Schedule object, you are effectively replacing existing scheduling
                // for the ad extension. In this example, we will remove any existing scheduling by setting this element
                // to an empty Schedule object.
                $updateExtension->setScheduling(new Schedule());

                $updateExtensions[] = $updateExtension;
            }
        }

        print("-----\r\nUpdateAdExtensions:\r\n");
        $request = new UpdateAdExtensionsRequest(
            [
                'AccountId' => self::CUSTOMER_ACCOUNT_ID,
                'AdExtensions' => $updateExtensions
            ]
        );
        $response = self::$campaignManagementServiceApi->updateAdExtensions($request);
        print_r($request);
        print("NestedPartialErrors:\r\n");
        print_r($response->getNestedPartialErrors());
        self::assertEmpty($response->getNestedPartialErrors());
        print("Removed scheduling from the location ad extensions.\r\n");

        // Get only the location extension to output the result.

        print("-----\r\nGetAdExtensionsByIds:\r\n");
        $request = new GetAdExtensionsByIdsRequest(
            [
                'AccountId' => self::CUSTOMER_ACCOUNT_ID,
                'AdExtensionIds' => $adExtensionIds,
                'AdExtensionType' => $adExtensionsTypeFilter,
                'ReturnAdditionalFields' => null
            ]
        );
        $response = self::$campaignManagementServiceApi->getAdExtensionsByIds($request);
        print("AdExtensions:\r\n");
        print_r($response->getAdExtensions());
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertNotEmpty($response->getPartialErrors());
        self::assertNotEmpty($response->getAdExtensions());
        foreach ($response->getAdExtensions() as $adExtension) {
            if (!empty($adExtension) && $adExtension->getId() !== null) {
                self::assertNull($adExtension->getScheduling());
            }
        }

        // Delete the ad extension associations, ad extensions, and campaign, that were previously added.
        // At this point the ad extensions are still available in the account's ad extensions library.

        print("-----\r\nDeleteAdExtensionsAssociations:\r\n");
        $request = new DeleteAdExtensionsAssociationsRequest(
            [
                'AccountId' => self::CUSTOMER_ACCOUNT_ID,
                'AdExtensionIdToEntityIdAssociations' => $adExtensionIdToEntityIdAssociations,
                'AssociationType' => AssociationType::CAMPAIGN
            ]
        );
        $response = self::$campaignManagementServiceApi->deleteAdExtensionsAssociations($request);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());

        // Deletes the ad extensions from the account's ad extension library.

        print("-----\r\nDeleteAdExtensions:\r\n");
        $request = new DeleteAdExtensionsRequest(
            [
                'AccountId' => self::CUSTOMER_ACCOUNT_ID,
                'AdExtensionIds' => $adExtensionIds
            ]
        );
        $response = self::$campaignManagementServiceApi->deleteAdExtensions($request);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());

        print("Deleted ad extensions.\r\n");

        // Delete the account's media that was used for the image ad extension.

        print("-----\r\nDeleteMedia:\r\n");
        $request = new DeleteMediaRequest(
            [
                'AccountId' => self::CUSTOMER_ACCOUNT_ID,
                'MediaIds' => $mediaIds
            ]
        );
        $response = self::$campaignManagementServiceApi->deleteMedia($request);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());

        foreach ($mediaIds as $id) {
            printf("Deleted Media Id %s\r\n", $id);
        }

        // Delete the campaign and everything it contains e.g., ad groups and ads.

        self::deleteCampaignsRequest($campaignIds);
    }
}
