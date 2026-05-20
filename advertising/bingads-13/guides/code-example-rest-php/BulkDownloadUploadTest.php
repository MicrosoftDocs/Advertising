<?php

use GuzzleHttp\Exception\GuzzleException;
use Microsoft\MsAds\Rest\ApiException;
use Microsoft\MsAds\Rest\Model\BulkService\DataScope;
use Microsoft\MsAds\Rest\Model\BulkService\DownloadCampaignsByAccountIdsRequest;
use Microsoft\MsAds\Rest\Model\BulkService\DownloadEntity;
use Microsoft\MsAds\Rest\Model\BulkService\DownloadFileType;
use Microsoft\MsAds\Rest\Model\BulkService\GetBulkDownloadStatusRequest;
use Microsoft\MsAds\Rest\Model\BulkService\GetBulkUploadStatusRequest;
use Microsoft\MsAds\Rest\Model\BulkService\GetBulkUploadUrlRequest;
use Microsoft\MsAds\Rest\Model\BulkService\ResponseMode;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class BulkDownloadUploadTest extends RestApiTestBase
{
    // The full path to the bulk file.
    private static string $BulkFilePath = "c:\\dev\\bulk\\campaigns.zip";
    private static string $uploadFilePath = "c:\\dev\\bulk\\campaigns_upload.zip";

    // Confirm that the download folder exist; otherwise, exit.

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        $length = strrpos(self::$BulkFilePath, '\\');
        $folder = substr(self::$BulkFilePath, 0, $length);

        if (!is_dir($folder))
        {
            printf("The output folder, %s, does not exist.\r\nEnsure that the " .
                "folder exists and try again.", $folder);
            exit(1);
        }
    }

    /**
     * @throws ApiException
     */
    public function testDownloadCampaignsByAccountIds(): string
    {
        $request = new DownloadCampaignsByAccountIdsRequest();
        $request->setAccountIds([self::CUSTOMER_ACCOUNT_ID]);
        $request->setDataScope(DataScope::ENTITY_DATA);
        $request->setDownloadEntities([DownloadEntity::AD_GROUPS, DownloadEntity::CAMPAIGNS]);
        $request->setDownloadFileType(DownloadFileType::CSV);
        $request->setFormatVersion('6.0');
        $request->setLastSyncTimeInUTC(null);

        $response = self::$bulkServiceApi->downloadCampaignsByAccountIds($request);
        // The request ID will be used to poll for status before downloading the bulk file.

        $this->assertNotNull($response->getDownloadRequestId(), 'DownloadRequestId should not be null');
        return $response->getDownloadRequestId();
    }

    /**
     * @depends testDownloadCampaignsByAccountIds
     * @throws ApiException
     * @throws GuzzleException
     */
    public function testGetBulkDownloadStatus(string $downloadRequestId): string
    {
        // This sample polls every 30 seconds up to 5 minutes.
        // In production you may poll the status every 1 to 2 minutes for up to one hour.
        // If the call succeeds, stop polling. If the call or
        // download fails, the call throws a fault.
        $downloadSuccess = false;
        $waitTime = 5;

        for ($i = 0; $i < 10; $i++)
        {
            sleep($waitTime);

            // GetDownloadRequestStatus helper method calls the corresponding Bing Ads service operation
            // to get the download status.

            $request = new GetBulkDownloadStatusRequest();
            $request->setRequestId($downloadRequestId);

            $response = self::$bulkServiceApi->getBulkDownloadStatus($request);
            print("-----\r\nGetBulkDownloadStatus:\r\n");
            $requestStatus = $response->getRequestStatus();
            $resultFileUrl = $response->getResultFileUrl();
            printf("PercentComplete: %s\r\n", $response->getPercentComplete());
            printf("RequestStatus: %s\r\n", $requestStatus);
            printf("ResultFileUrl: %s\r\n", $resultFileUrl);

            if (($requestStatus != null) && ($requestStatus == "Completed"))
            {
                $downloadSuccess = true;
                break;
            }
        }

        if ($downloadSuccess)
        {
            // Download the file.
            printf("-----\r\nDownloading from %s...\r\n", $resultFileUrl);
            self::DownloadFile($resultFileUrl, self::$BulkFilePath);
        }
        else // Pending
        {
            self::fail("Download request failed, request ID: " . $downloadRequestId);
        }

        return $response->getResultFileUrl();
    }

    /**
     * @throws ApiException
     */
    public function testBulkUpload(): array
    {
        print("-----\r\nGetBulkUploadUrl:\r\n");
        $request = new GetBulkUploadUrlRequest();
        $request->setResponseMode(ResponseMode::ERRORS_AND_RESULTS);
        $request->setAccountId(self::CUSTOMER_ACCOUNT_ID); // Replace with actual account ID

        $response = self::$bulkServiceApi->getBulkUploadUrl($request);
        $uploadRequestId = $response->getRequestId();
        $uploadUrl = $response->getUploadUrl();
        printf("RequestId: %s\r\n", $uploadRequestId);
        printf("UploadUrl: %s\r\n", $uploadUrl);
        $this->assertNotNull($uploadRequestId, 'UploadRequestId should not be null');
        $this->assertNotNull($uploadUrl, 'UploadUrl should not be null');

        return [$uploadRequestId, $uploadUrl];
    }

    /**
     * @depends testBulkUpload
     * @throws GuzzleException
     */
    public function testUploadFile(array $uploadDetails): string
    {
        // You may unzip and update the downloaded bulk file or prepare a new file elsewhere.
        // Changes to the bulk file are not shown here.
        $uploadRequestId = $uploadDetails[0];
        $uploadUrl = $uploadDetails[1];
        printf("-----\r\nUploading file [%s] to %s...\r\n", self::$uploadFilePath, $uploadUrl);
        self::UploadFile(
            $uploadUrl,
            self::$uploadFilePath
        );

        return $uploadRequestId;
    }

    /**
     * @depends testUploadFile
     * @throws ApiException
     * @throws GuzzleException
     */
    public function testGetBulkUploadStatus(string $uploadRequestId): void
    {
        // This sample polls every 30 seconds up to 5 minutes.
        // In production you may poll the status every 1 to 2 minutes for up to one hour.
        // If the call succeeds, stop polling. If the call or
        // download fails, the call throws a fault.

        $uploadSuccess = false;
        $waitTime = 5;

        for ($i = 0; $i < 10; $i++) {
            sleep($waitTime);
            $request = new GetBulkUploadStatusRequest();
            $request->setRequestId($uploadRequestId);

            $response = self::$bulkServiceApi->getBulkUploadStatus($request);
            print("-----\r\nGetBulkUploadStatus:\r\n");
            $requestStatus = $response->getRequestStatus();
            $resultFileUrl = $response->getResultFileUrl();
            printf("PercentComplete: %s\r\n", $response->getPercentComplete());
            printf("RequestStatus: %s\r\n", $requestStatus);
            printf("ResultFileUrl: %s\r\n", $resultFileUrl);

            if (($requestStatus != null) && (($requestStatus == "Completed")
                    || ($requestStatus == "CompletedWithErrors")))
            {
                $uploadSuccess = true;
                break;
            }
        }

        if ($uploadSuccess)
        {
            // Download the file.
            printf("-----\r\nDownloading from %s...\r\n", $resultFileUrl);
            self::DownloadFile($resultFileUrl, self::$BulkFilePath);
        }
        else // Pending
        {
            self::fail("Upload request failed, request ID: " . $uploadRequestId);
        }

    }
}