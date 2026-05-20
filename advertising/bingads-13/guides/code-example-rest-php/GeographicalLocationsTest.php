<?php

use GuzzleHttp\Exception\GuzzleException;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\GetGeoLocationsFileUrlRequest;
use Microsoft\MsAds\Rest\ApiException;

class GeographicalLocationsTest extends RestApiTestBase
{
    protected string $localFile = "\\Downloads\\geolocations.csv";
    protected string $tempFile = "\\Downloads\\temp.csv";
    protected string $version = "2.0";
    protected string $languageLocale = "en";

    /**
     * Get the geographical locations file URL.
     * @throws ApiException
     */
    public function testGetGeoLocationsFileUrl()
    {
        print("-----\r\nGetting Geo Locations File URL:\r\n");

        $request = new GetGeoLocationsFileUrlRequest([
            'Version' => $this->version,
            'LanguageLocale' => $this->languageLocale,
        ]);

        $response = self::$campaignManagementServiceApi->getGeoLocationsFileUrl($request);

        $fileUrl = $response->getFileUrl();
        $fileUrlExpiryTimeUtc = $response->getFileUrlExpiryTimeUtc()->format('Y-m-d\TH:i:se');
        $lastModifiedTimeUtc = $response->getLastModifiedTimeUtc()->format('Y-m-d\TH:i:se');

        printf("FileUrl: %s\r\n", $fileUrl);
        printf("FileUrlExpiryTimeUtc: %s\r\n", $fileUrlExpiryTimeUtc);
        printf("LastModifiedTimeUtc: %s\r\n", $lastModifiedTimeUtc);

        self::assertNotEmpty($fileUrl);

        return [
            'fileUrl' => $fileUrl,
            'lastModifiedTimeUtc' => $lastModifiedTimeUtc,
        ];
    }

    /**
     * Download the geographical locations file.
     * @depends testGetGeoLocationsFileUrl
     * @throws Exception
     * @throws GuzzleException
     */
    public function testDownloadGeoLocationsFile($fileData)
    {
        print("-----\r\nDownloading Geo Locations File:\r\n");

        $fileUrl = $fileData['fileUrl'];
        $lastModifiedTimeUtc = $fileData['lastModifiedTimeUtc'];
        $previousSyncTimeUtc = new DateTime('2017-08-10T00:00:00-00:00');

        if ($previousSyncTimeUtc < new DateTime($lastModifiedTimeUtc)) {
            self::DownloadFile(
                $fileUrl,
                getenv('USERPROFILE').$this->localFile
            );
        } else {
            printf("The file has not been modified since your previous sync time (%s).\r\n",
                $previousSyncTimeUtc->format('Y-m-d\TH:i:se')
            );
        }
    }
}