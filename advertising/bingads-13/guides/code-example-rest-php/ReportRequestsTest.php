<?php

use GuzzleHttp\Exception\GuzzleException;
use Microsoft\MsAds\Rest\Model\ReportingService\PollGenerateReportResponse;
use Microsoft\MsAds\Rest\Model\ReportingService\ReportRequestStatusType;
use Microsoft\MsAds\Rest\Model\ReportingService\SubmitGenerateReportRequest;
use Microsoft\MsAds\Rest\Model\ReportingService\PollGenerateReportRequest;
use Microsoft\MsAds\Rest\Model\ReportingService\AccountPerformanceReportRequest;
use Microsoft\MsAds\Rest\Model\ReportingService\AccountReportScope;
use Microsoft\MsAds\Rest\Model\ReportingService\ReportTime;
use Microsoft\MsAds\Rest\Model\ReportingService\ReportTimePeriod;
use Microsoft\MsAds\Rest\Model\ReportingService\ReportFormat;
use Microsoft\MsAds\Rest\Model\ReportingService\ReportAggregation;
use Microsoft\MsAds\Rest\Model\ReportingService\AccountPerformanceReportColumn;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class ReportRequestsTest extends RestApiTestBase
{
    private static string $DownloadPath = "c:\\dev\\reports\\MyReport.zip";

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        $length = strrpos(self::$DownloadPath, '\\');
        $folder = substr(self::$DownloadPath, 0, $length);
        if (!is_dir($folder)) {
            printf("The output folder, %s, does not exist.\r\nEnsure that the folder exists and try again.", $folder);
            exit(1);
        }
    }

    /**
     * @throws Exception|GuzzleException
     */
    public function testSubmitAndDownloadAccountPerformanceReport(): void
    {
        // Build the report request
        $reportRequest = new AccountPerformanceReportRequest();
        $reportRequest->setFormat(new ReportFormat(ReportFormat::TSV));
        $reportRequest->setReportName('My Account Performance Report');
        $reportRequest->setReturnOnlyCompleteData(false);
        $reportRequest->setAggregation(new ReportAggregation(ReportAggregation::WEEKLY));
        $scope = new AccountReportScope();
        $scope->setAccountIds([self::CUSTOMER_ACCOUNT_ID]);
        $reportRequest->setScope($scope);
        $time = new ReportTime();
        $time->setPredefinedTime(new ReportTimePeriod(ReportTimePeriod::YESTERDAY));
        $reportRequest->setTime($time);
        $reportRequest->setColumns([
            new AccountPerformanceReportColumn(AccountPerformanceReportColumn::TIME_PERIOD),
            new AccountPerformanceReportColumn(AccountPerformanceReportColumn::ACCOUNT_ID),
            new AccountPerformanceReportColumn(AccountPerformanceReportColumn::ACCOUNT_NAME),
            new AccountPerformanceReportColumn(AccountPerformanceReportColumn::CLICKS),
            new AccountPerformanceReportColumn(AccountPerformanceReportColumn::IMPRESSIONS),
            new AccountPerformanceReportColumn(AccountPerformanceReportColumn::CTR),
            new AccountPerformanceReportColumn(AccountPerformanceReportColumn::AVERAGE_CPC),
            new AccountPerformanceReportColumn(AccountPerformanceReportColumn::SPEND),
            new AccountPerformanceReportColumn(AccountPerformanceReportColumn::DEVICE_OS)
        ]);

        $submitRequest = new SubmitGenerateReportRequest();
        $submitRequest->setReportRequest($reportRequest);

        $submitResponse = self::$reportingServiceApi->submitGenerateReport($submitRequest);
        $reportRequestId = $submitResponse->getReportRequestId();
        $this->assertNotNull($reportRequestId, 'ReportRequestId should not be null');

        $waitTime = 10;
        $requestStatus = null;
        for ($i = 0; $i < 30; $i++) {
            sleep($waitTime);
            $pollRequest = new PollGenerateReportRequest();
            $pollRequest->setReportRequestId($reportRequestId);
            $pollResponse = self::$reportingServiceApi->pollGenerateReport($pollRequest);
            if (!$pollResponse instanceof PollGenerateReportResponse) {
                printf("PollGenerateReportResponse: %s\r\n", $pollResponse);
                $this->fail('PollGenerateReportResponse should be an instance of PollGenerateReportResponse');
            }
            $status = $pollResponse->getReportRequestStatus()->getStatus();
            $resultFileUrl = $pollResponse->getReportRequestStatus()->getReportDownloadUrl();
            printf("RequestStatus: %s\r\n", $status);
            printf("ReportDownloadUrl: %s\r\n", $resultFileUrl);
            if ($status ===  ReportRequestStatusType::SUCCESS || $status === ReportRequestStatusType::ERROR) {
                $requestStatus = $status;
                break;
            }
        }
        $this->assertNotNull($requestStatus, 'RequestStatus should not be null');
        if ($requestStatus === ReportRequestStatusType::SUCCESS) {
            $this->assertNotNull($resultFileUrl, 'ResultFileUrl should not be null');
            self::DownloadFile($resultFileUrl, self::$DownloadPath);
            $this->assertFileExists(self::$DownloadPath);
        } elseif ($requestStatus === ReportRequestStatusType::ERROR) {
            $this->fail('The report request failed.');
        } else {
            $this->fail('The report request is taking longer than expected.');
        }
    }
}
