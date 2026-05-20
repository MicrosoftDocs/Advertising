<?php

use Microsoft\MsAds\Rest\ApiException;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddMediaRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\DeleteMediaRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\GetMediaMetaDataByIdsRequest;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class ImageMediaTest extends RestApiTestBase
{
    protected string $mediaFilePath = "c:\\dev\\media\\";
    protected string $responsiveAdMediaFileName = "imageresponsivead703x368.png";
    protected string $imageAdExtensionMediaFileName = "imageadextension300x200.png";

    /**
     * Add image media to the account.
     * @throws ApiException
     */
    public function testAddMedia()
    {
        print("-----\r\nAdding Media:\r\n");

        $responsiveAdImageMedia = $this->getImageMedia(
            "Image191x100",
            $this->mediaFilePath.$this->responsiveAdMediaFileName
        );

        $imageAdExtensionMedia = $this->getImageMedia(
            "Image15x10",
            $this->mediaFilePath.$this->imageAdExtensionMediaFileName
        );

        $addMedia = [$responsiveAdImageMedia, $imageAdExtensionMedia];

        $request = new AddMediaRequest([
            'AccountId' => self::CUSTOMER_ACCOUNT_ID,
            'Media' => $addMedia,
        ]);

        $response = self::$campaignManagementServiceApi->addMedia($request);
        $mediaIds = $response->getMediaIds();
        print_r($mediaIds);
        self::assertNotEmpty($mediaIds);

        return $mediaIds;
    }

    /**
     * Get metadata for the added media.
     * @depends testAddMedia
     * @throws ApiException
     */
    public function testGetMediaMetaData($mediaIds)
    {
        print("-----\r\nGetting Media Metadata:\r\n");

        $request = new GetMediaMetaDataByIdsRequest([
            'MediaIds' => $mediaIds,
        ]);

        $response = self::$campaignManagementServiceApi->getMediaMetaDataByIds($request);
        $mediaMetaData = $response->getMediaMetaData();
        print_r($mediaMetaData);
        self::assertNotEmpty($mediaMetaData);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());

        return $mediaMetaData;
    }

    /**
     * Delete the added media.
     * @depends testAddMedia
     * @throws ApiException
     */
    public function testDeleteMedia($mediaIds)
    {
        print("-----\r\nDeleting Media:\r\n");

        $request = new DeleteMediaRequest([
            'AccountId' => self::CUSTOMER_ACCOUNT_ID,
            'MediaIds' => $mediaIds,
        ]);

        $response = self::$campaignManagementServiceApi->deleteMedia($request);
        print_r($response);
        self::assertEmpty($response->getPartialErrors());
    }
}