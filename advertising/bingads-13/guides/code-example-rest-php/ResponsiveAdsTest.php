<?php

namespace Microsoft\MsAds\Rest\Test\Services;

use Exception;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddMediaRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AdGroup;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Bid;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BudgetLimitType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Campaign;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\CampaignType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Date;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\DeleteMediaRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\LanguageName;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ResponsiveAd;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\CallToAction;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AssetLink;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ImageAsset;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class ResponsiveAdsTest extends RestApiTestBase
{
    protected string $mediaFilePath = "c:\\dev\\media\\";
    protected string $responsiveAdMediaFileName = "imageresponsivead703x368.png";

    /**
     * Add an image to your media library.
     * The image asset is needed later to create the responsive ad.
     * @throws Exception
     */
    public function testAddMedia()
    {
        print("-----\r\nAdding Media:\r\n");

        $responsiveAdImageMedia = $this->getImageMedia(
            "Image191x100",
            $this->mediaFilePath.$this->responsiveAdMediaFileName
        );

        $request = new AddMediaRequest([
            'AccountId' => self::CUSTOMER_ACCOUNT_ID,
            'Media' => [$responsiveAdImageMedia],
        ]);

        $response = self::$campaignManagementServiceApi->addMedia($request);
        $mediaIds = $response->getMediaIds();
        print("MediaIds:\r\n");
        print_r($mediaIds);
        self::assertNotEmpty($mediaIds);

        return $mediaIds;
    }

    /**
     * @depends testAddMedia
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
            ->setEndDate((new Date())->setDay(31)->setMonth(12)->setYear(date("Y")));
        return self::addAdGroupsRequest($campaignIds[0], [$adGroup]);
    }

    /**
     * @depends testAddAdGroup
     * @depends testAddMedia
     * @throws Exception
     */
    public function testAddResponsiveAd(array $adGroupIds, array $mediaIds)
    {
        print("-----\r\nAdding Responsive Ad:\r\n");

        $responsiveAd = (new ResponsiveAd())
            ->setBusinessName("Contoso")
            ->setCallToAction(CallToAction::ACT_NOW)
            ->setCallToActionLanguage(LanguageName::ENGLISH)
            ->setFinalUrls(["http://www.contoso.com/womenshoesale"])
            ->setHeadline("Fast & Easy Setup")
            ->setLongHeadlineString("Find New Customers & Increase Sales!")
            ->setText("Find New Customers & Increase Sales! Start Advertising on Contoso Today.")
            ->setImages([
                (new AssetLink())->setAsset(
                    (new ImageAsset())
                        ->setId($mediaIds[0]) // Replace with actual media ID
                        ->setName("My LandscapeImageMedia".self::generateRandomAlphaNumeric())
                        ->setSubType("LandscapeImageMedia")
                )
            ]);
        self::addAdsRequest($adGroupIds[0], [$responsiveAd]);
    }

    /**
     * @depends testAddCampaign
     * @throws Exception
     */
    public function testDeleteCampaign(array $campaignIds)
    {
        self::deleteCampaignsRequest($campaignIds);
    }

    /**
     * @depends testAddMedia
     * @throws Exception
     */
    public function testDeleteMedia(array $mediaIds)
    {
        // Can only delete media that is not in use.
        print("-----\r\nDeleteMedia:\r\n");
        $request = new DeleteMediaRequest([
            'AccountId' => self::CUSTOMER_ACCOUNT_ID,
            'MediaIds' => $mediaIds
        ]);
        $response = self::$campaignManagementServiceApi->deleteMedia($request);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());
        print("Deleted Media ids: ".implode(", ", $mediaIds)."\r\n");
    }
}