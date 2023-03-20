---
title: "Request and Download a Report"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Learn about the steps to request and download a report.
dev_langs:
  - csharp
  - java
  - php
  - python
---
# Request and Download a Report
Reporting is an asynchronous process. The following is the general flow for requesting a report.

- Create a request with the report parameters
- Send a request to the reporting service
- The service queues the request until it's able to process it
- Poll the service periodically to get the status of the report job
- When the status is *Success*, use the URL that the service provides to download the report.

If you are using a .NET language, Java, or Python, you should use the [Bing Ads API Client Libraries](client-libraries.md). The .NET, Java, and Python SDKs abstract the low level details described below. For example instead of calling [SubmitGenerateReportRequest](../reporting-service/submitgeneratereport.md#request) and [PollGenerateReportRequest](../reporting-service/pollgeneratereport.md#request) to download a report, you can use one method with the [Reporting Service Manager](sdk-reporting-service-manager.md). 

For code examples that demonstrate how to download reports, see [Report Requests Code Example](code-example-report-requests.md).

## Request a Report

1. Determine the report that you want to request. For a list of reports that you can request, see [Report Types](report-types.md).

2. Create an instance of the report request object. Some of the elements of the report request are required and some are optional. Set the elements as appropriate for your application. The elements of the report request determine, among others, the scope of data to include in the report, the columns of data to include in the report, and whether to generate the report only if all the data is available.

    > [!NOTE]
    > You must create an instance of one of the objects that derives from the [ReportRequest](../reporting-service/reportrequest.md) data object; if you try to pass the *ReportRequest* object to the *SubmitGenerateReport* operation, the call will fail.

3. Create an instance of the [SubmitGenerateReportRequest](../reporting-service/submitgeneratereport.md#request) object, and set the *ReportRequest* element to the report request that you selected in the previous step.

4. Call the [SubmitGenerateReport](../reporting-service/submitgeneratereport.md) operation to submit the request. The operation is an asynchronous operation that returns before the report is created. The operation returns a *ReportRequestId* that you use in the following steps to determine when the report completes. The report request identifier is valid for two days. If you do not download the report within two days, you must request the report again.

5. Create an instance of the [PollGenerateReportRequest](../reporting-service/pollgeneratereport.md#request) object and set the report request identifier to the identifier returned in the previous step.

    > [!NOTE]
    > You must use the same user credentials for the [SubmitGenerateReport](../reporting-service/submitgeneratereport.md) and [PollGenerateReport](../reporting-service/pollgeneratereport.md) operations.

6. Call the [PollGenerateReport](../reporting-service/pollgeneratereport.md) operation in a loop while the status is *Pending*. The operation sets the status to *Success* when the request completes successfully; a status other than *Pending* or *Success* indicates that the report failed.

    The length of time that it takes a report request to complete depends on a number of variables, such as the type of report that you requested; the aggregation, scope, and time period values that you specified; the number of expected rows; and the number of requests already in the queue. Because of these variables, it is difficult to determine an appropriate polling interval for all cases. Because most reports should complete within minutes, polling at two to 15-minute intervals should be appropriate for most cases. If the overall polling period exceeds 60 minutes, consider saving the report identifier, exiting the loop, and trying again later.

7. If the request completes successfully, use the URL in the *ReportDownloadUrl* element to download the file that contains the report. After getting the download URL, you have five minutes to download the report. If you do not download the report within five minutes of getting the URL, you must poll for a new URL to use to download the report.

8. The report file is compressed; therefore, you must unzip it to read the report.

## Create a Custom Date Range
The following procedure shows how to specify a custom date range for a report request. This is optional for the report request workflow described above. If you specify a custom date range, you must not set the *ReportTime.PredefinedTime* element. Also note that the *Aggregation* element of the report request object determines how the data for the specified time period is aggregated. 

1. Create an instance of the [ReportTime](../reporting-service/reporttime.md) object. Assign the *ReportTime* object to the *Time* element of the [ReportRequest](../reporting-service/reportrequest.md) data object.

2. Create a *Date* object that specifies the start date of the custom date range. Assign the *Date* object to the *ReportTime.CustomDateRangeStart* element.

3. Create another *Date* object that specifies the end date of the custom date range. Assign the *Date* object to the *ReportTime.CustomDateRangeEnd* element.

The following code snippet shows how to initialize a report request object to request a custom date range.

```csharp
// Create an instance of the ReportTime class to hold the report date 
// information.
request.Time = new ReportTime();

// Set the start date for the report to one month before today.
DateTime startDate = DateTime.Today.AddMonths(-1);
request.Time.CustomDateRangeStart = new Date();
request.Time.CustomDateRangeStart.Day = startDate.Day;
request.Time.CustomDateRangeStart.Month = startDate.Month;
request.Time.CustomDateRangeStart.Year = startDate.Year;

// Set the end date to today.
DateTime endDate = DateTime.Today;
request.Time.CustomDateRangeEnd = new Date();
request.Time.CustomDateRangeEnd.Day = endDate.Day;
request.Time.CustomDateRangeEnd.Month = endDate.Month;
request.Time.CustomDateRangeEnd.Year = endDate.Year;
```
```java
report.setTime(new ReportTime());

Calendar calendar = Calendar.getInstance();
report.getTime().setCustomDateRangeStart(new Date());
report.getTime().getCustomDateRangeStart().setMonth(1);
report.getTime().getCustomDateRangeStart().setDay(1);
report.getTime().getCustomDateRangeStart().setYear(calendar.get(Calendar.YEAR)-1);
report.getTime().setCustomDateRangeEnd(new Date());
report.getTime().getCustomDateRangeEnd().setMonth(12);
report.getTime().getCustomDateRangeEnd().setDay(31);
report.getTime().getCustomDateRangeEnd().setYear(calendar.get(Calendar.YEAR)-1);
```
```php
$report->Time = new ReportTime();
$report->Time->PredefinedTime = null;

date_default_timezone_set('UTC');
$LastYear = date("Y") - 1;
$report->Time->CustomDateRangeStart = new Date();
$report->Time->CustomDateRangeStart->Month = 1;
$report->Time->CustomDateRangeStart->Day = 1;
$report->Time->CustomDateRangeStart->Year = $LastYear;
$report->Time->CustomDateRangeEnd = new Date();
$report->Time->CustomDateRangeEnd->Month = 12;
$report->Time->CustomDateRangeEnd->Day = 31;
$report->Time->CustomDateRangeEnd->Year = $LastYear;
```
```python
report_time=reporting_service.factory.create('ReportTime')

custom_date_range_start=reporting_service.factory.create('Date')
custom_date_range_start.Day=1
custom_date_range_start.Month=1
custom_date_range_start.Year=int(strftime("%Y", gmtime()))-1
report_time.CustomDateRangeStart=custom_date_range_start
custom_date_range_end=reporting_service.factory.create('Date')
custom_date_range_end.Day=31
custom_date_range_end.Month=12
custom_date_range_end.Year=int(strftime("%Y", gmtime()))-1
report_time.CustomDateRangeEnd=custom_date_range_end
report_time.PredefinedTime=None

report_request.Time=report_time
```

## See Also
[Reporting Service Reference](../reporting-service/reporting-service-reference.md)  

