---
title: "Reporting Service Manager"
ms.service: "bing-ads"
ms.topic: "article"
author: eric-urban
ms.author: eur
description: Learn about using Reporting Service Manager with the Bing Ads SDKs.
dev_langs:
  - csharp
  - java
  - python
---
# Reporting Service Manager
The Bing Ads .NET, Java, and Python SDKs provide classes to accelerate productivity for downloading performance report records. For example the *ReportingServiceManager* will submit your download request to the [Reporting service](../reporting-service/reporting-service-reference.md), poll the service until completed, and download the file to your local directory. The *ReportingServiceManager* also handles common request header fields for you, allowing to specify the *Authentication*, *CustomerId*, *AccountId*, and *DeveloperToken* properties in the *AuthorizationData* object once for each service. For more information, see [Using AuthorizationData](sdk-authentication.md#authorization-data) and the [Report Requests](code-example-report-requests.md) code example.

> [!NOTE]
> The *ReportingServiceManager* is only available with the Bing Ads .NET, Java, and Python SDKs. Whether or not you use an SDK, you can use the [Reporting service](../reporting-service/reporting-service-reference.md) directly. For more information, see [Request and Download a Report](request-download-report.md). 

## <a name="report-reader"></a>Report File Reader
You do not need to implement your own file parser to read the Report file. You can use *ReportFileReader* object to read a CSV file into a *Report* container. 

> [!NOTE] 
> The *ReportingServiceManager* uses a *ReportFileReader* in the background when you download entities instead of files. Temporary files are used in the background. For more details, see [Working Directory and ReportingServiceManager](#workingdirectory). 

Let's use the following CSV file as an example. For example, let's say that you want to read the following report from a file. 

```csv
"Report Name: My Keyword Performance Report"
"Report Time: 2/7/2020"
"Time Zone: (GMT-08:00) Pacific Time (US & Canada); Tijuana"
"Last Completed Available Day: 2/8/2020 10:15:00 PM (GMT)"
"Last Completed Available Hour: 2/8/2020 10:15:00 PM (GMT)"
"Report Aggregation: Summary"
"Report Filter: "
"Potential Incomplete Data: true"
"Rows: 5"

"AccountId","CampaignId","Keyword","KeywordId","DeviceType","Clicks"
"YourAccountId","YourCampaignId","red shoes","123","Computer","35"
"YourAccountId","YourCampaignId","red shoes","123","Smartphone","50"
"YourAccountId","YourCampaignId","shoes delivered","234","Computer","1"
"YourAccountId","YourCampaignId","shoe sale","345","Computer","80"
"YourAccountId","YourCampaignId","shoe sale","345","Smartphone","5"

"@2020 Microsoft Corporation. All rights reserved. "
```

Just provide the ReportFileReader with the file path and file name. Then close the file when you are finished reading.  

```csharp
ReportFileReader reportFileReader = new ReportFileReader(
    ResultFileName,
    ReportFormat.Csv
);
Report report = reportFileReader.GetReport();
IEnumerable<IReportRecord> reportRecordIterable = reportContainer.GetReportRecords();
report.Dispose();
```
```java
ReportFileReader reportFileReader = new ReportFileReader(
    ResultFileName,
    ReportFormat.CSV
);
Report report = reportFileReader.getReport();
Iterable<ReportRecord> reportRecords = report.getReportRecords();
report.close();
```
```python
report_file_reader = ReportFileReader(
    file_path=result_file_name, 
    format='Csv'
)
report_container=report_file_reader.get_report()
report_record_iterable=report_container.report_records
report_container.close()
```

## <a name="reportcontainer"></a>In-Memory Report Container
The *Report* is an in-memory container that abstracts the contents of a downloaded report file, including header metadata, column names, and report records. With these updates you are free to focus more on the business requirements of your application instead of parsing the report file.

You can access the Report container in-memory via the *ReportingServiceManager* by submitting a new download request, or by using the *ReportFileReader* to read from a report file that you already downloaded. 

For example you can get a Report object by submitting a new download request via ReportingServiceManager. Although in this case you won't work directly with the file, under the covers a request is submitted to the Reporting service and the report file is downloaded to a local directory. The reporting download parameters include the requested report type, scope, time period, and the local download file path. 

```csharp
// The ReportRequest is a ReportRequest object defined by the Reporting API.
var reportingDownloadParameters = new ReportingDownloadParameters
{
    ReportRequest = reportRequest,
    ResultFileDirectory = FileDirectory,
    ResultFileName = ResultFileName,
    OverwriteResultFile = true,
};

Report reportContainer = await ReportingServiceManager.DownloadReportAsync(
    reportingDownloadParameters,
    CancellationToken.None
);
```
```java
// The ReportRequest is a ReportRequest object defined by the Reporting API.
ReportingDownloadParameters reportingDownloadParameters = new ReportingDownloadParameters();
reportingDownloadParameters.setReportRequest(reportRequest);
reportingDownloadParameters.setResultFileDirectory(new File(FileDirectory));
reportingDownloadParameters.setResultFileName(ResultFileName);
reportingDownloadParameters.setOverwriteResultFile(true);

Report reportContainer = ReportingServiceManager.downloadReportAsync(
    reportingDownloadParameters, 
    null
).get(); 
```
```python
# The report_request is a ReportRequest object defined by the Reporting API.
reporting_download_parameters = ReportingDownloadParameters(
    report_request=report_request,
    result_file_directory = FILE_DIRECTORY, 
    result_file_name = DOWNLOAD_FILE_NAME, 
    overwrite_result_file = True
)

report_container = reporting_service_manager.download_report(
    reporting_download_parameters=reporting_download_parameters
)
```

Otherwise if you already have a report file that was downloaded via the API, you can get a Report object via the ReportFileReader. 

```csharp
ReportFileReader reader = new ReportFileReader(
    "c:\\reports\\result.csv",
    ReportFormat.Csv
);
Report reportContainer = reader.GetReport();
```
```java
ReportFileReader reader = new ReportFileReader(
    reportingDownloadParameters.getResultFileDirectory() + "\\" + reportingDownloadParameters.getResultFileName(), 
    reportingDownloadParameters.getReportRequest().getFormat()
);
Report reportContainer = reader.getReport();
```
```python
report_file_reader = ReportFileReader(
    file_path=reporting_download_parameters.result_file_directory + reporting_download_parameters.result_file_name, 
    format=reporting_download_parameters.report_request.Format
)
report_container = report_file_reader.get_report()
```

Once you have a Report object via either workflow above, you can access the metadata and report records. If there was no report data for the campaigns and dates that you submitted, then the download result will be null or empty. 

```csharp
// Output the report metadata

long recordCount = reportContainer.ReportRecordCount;
Console.WriteLine(string.Format("ReportName: {0}", reportContainer.ReportName));
Console.WriteLine(string.Format("ReportTimeStart: {0}", reportContainer.ReportTimeStart));
Console.WriteLine(string.Format("ReportTimeEnd: {0}", reportContainer.ReportTimeEnd));
Console.WriteLine(string.Format("LastCompletedAvailableDate: {0}", reportContainer.LastCompletedAvailableDate.ToString()));
Console.WriteLine(string.Format("ReportAggregation: {0}", reportContainer.ReportAggregation.ToString()));
Console.WriteLine(string.Format("ReportColumns: {0}", string.Join("; ", reportContainer.ReportColumns)));
Console.WriteLine(string.Format("ReportRecordCount: {0}", recordCount));

// Analyze and output performance statistics

IEnumerable<IReportRecord> reportRecordIterable = reportContainer.GetReportRecords();
            
int totalImpressions = 0;
int totalClicks = 0;
HashSet<string> distinctDevices = new HashSet<string>();
HashSet<string> distinctNetworks = new HashSet<string>();
foreach (IReportRecord record in reportContainer.GetReportRecords())
{
    totalImpressions += record.GetIntegerValue("Impressions");
    totalClicks += record.GetIntegerValue("Clicks");
    distinctDevices.Add(record.GetStringValue("DeviceType"));
    distinctNetworks.Add(record.GetStringValue("Network"));
}

Console.WriteLine(string.Format("Total Impressions: {0}", totalImpressions));
Console.WriteLine(string.Format("Total Clicks: {0}", totalClicks));
Console.WriteLine(string.Format("Average Impressions: {0}", totalImpressions * 1.0 / recordCount));
Console.WriteLine(string.Format("Average Clicks: {0}", totalClicks * 1.0 / recordCount));
Console.WriteLine(string.Format("Distinct Devices: {0}", string.Join("; ", distinctDevices)));
Console.WriteLine(string.Format("Distinct Networks: {0}", string.Join("; ", distinctNetworks)));

// Be sure to close the report before you attempt to clean up files within the working directory.

reportContainer.Dispose();
```
```java
// Output the reportRequest metadata

java.lang.Long recordCount = reportContainer.getReportRecordCount();
outputStatusMessage(String.format("ReportName: %s", reportContainer.getReportName()));
outputStatusMessage(String.format("ReportTimeStart: %s", reportContainer.getReportTimeStart()));
outputStatusMessage(String.format("ReportTimeEnd: %s", reportContainer.getReportTimeEnd()));
outputStatusMessage(String.format("LastCompletedAvailableDate: %s", reportContainer.getLastCompletedAvailableDate().toString()));
outputStatusMessage(String.format("ReportAggregation: %s", enumCaseToPascalCase(reportContainer.getReportAggregation().toString())));
outputStatusMessage(String.format("ReportColumns: %s", String.join("; ", reportContainer.getReportColumns())));
outputStatusMessage(String.format("ReportRecordCount: %s", recordCount));

// Analyze and output performance statistics

if(Arrays.asList(reportContainer.getReportColumns()).contains("Impressions")){
    Iterable<ReportRecord> reportRecordIterable = reportContainer.getReportRecords();

    int totalImpressions = 0;
    int totalClicks = 0;
    HashSet<String> distinctDevices = new HashSet<>();
    HashSet<String> distinctNetworks = new HashSet<>();
    for (ReportRecord record : reportRecordIterable)
    {
        totalImpressions += record.getIntegerValue("Impressions");
        totalClicks += record.getIntegerValue("Clicks");
        distinctDevices.add(record.getStringValue("DeviceType"));
        distinctNetworks.add(record.getStringValue("Network"));
    }

    outputStatusMessage(String.format("Total Impressions: %s", totalImpressions));
    outputStatusMessage(String.format("Total Clicks: %s", totalClicks));
    outputStatusMessage(String.format("Average Impressions: %s", totalImpressions * 1.0 / recordCount));
    outputStatusMessage(String.format("Average Clicks: %s", totalClicks * 1.0 / recordCount));
    outputStatusMessage(String.format("Distinct Devices: %s", String.join("; ", distinctDevices)));
    outputStatusMessage(String.format("Distinct Networks: %s", String.join("; ", distinctNetworks)));
}       

// Be sure to close the reportRequest before you attempt to clean up files within the working directory.

reportContainer.close();
```
```python
# Output the reportRequest metadata
record_count = report_container.record_count
output_status_message("ReportName: {0}".format(report_container.report_name))
output_status_message("ReportTimeStart: {0}".format(report_container.report_time_start))
output_status_message("ReportTimeEnd: {0}".format(report_container.report_time_end))
output_status_message("LastCompletedAvailableDate: {0}".format(report_container.last_completed_available_date))
output_status_message("ReportAggregation: {0}".format(report_container.report_aggregation))
output_status_message("ReportColumns: {0}".format("; ".join(str(column) for column in report_container.report_columns)))
output_status_message("ReportRecordCount: {0}".format(record_count))

#Analyze and output performance statistics

if "Impressions" in report_container.report_columns and \
    "Clicks" in report_container.report_columns and \
    "DeviceType" in report_container.report_columns and \
    "Network" in report_container.report_columns:

    report_record_iterable = report_container.report_records

    total_impressions = 0
    total_clicks = 0
    distinct_devices = set()
    distinct_networks = set()
    for record in report_record_iterable:
        total_impressions += record.int_value("Impressions")
        total_clicks += record.int_value("Clicks")
        distinct_devices.add(record.value("DeviceType"))
        distinct_networks.add(record.value("Network"))

    output_status_message("Total Impressions: {0}".format(total_impressions))
    output_status_message("Total Clicks: {0}".format(total_clicks))
    output_status_message("Average Impressions: {0}".format(total_impressions * 1.0 / record_count))
    output_status_message("Average Clicks: {0}".format(total_clicks * 1.0 / record_count))
    output_status_message("Distinct Devices: {0}".format("; ".join(str(device) for device in distinct_devices)))
    output_status_message("Distinct Networks: {0}".format("; ".join(str(network) for network in distinct_networks)))

#Be sure to close the report.

report_container.close()
```

## <a name="report-download"></a>Download
The *ReportingServiceManager* supports flexible report download workflows.

- You can create a download request and the *ReportingServiceManager* will submit your download request to the Reporting service, poll the service until completed, and download the file to your local directory. For example, see [Background Completion with ReportingServiceManager](#backgroundcompletion). 

- You can submit a download request and then poll until the result file is ready to download. For example, see [Submit and Download with ReportingServiceManager](#submitdownload).

- If for any reason you have to resume from a previous application state, you can use an existing download request identifier and use it to download the result file. For example, see [Download Results with ReportingServiceManager](#downloadresults). 

### <a name="backgroundcompletion"></a>Background Completion with ReportingServiceManager
You can create a download request and the *ReportingServiceManager* will submit your download request to the Reporting service, poll the service until completed, and download the file to your local directory.

```csharp
public async Task RunAsync(AuthorizationData authorizationData)
{
    ReportingServiceManager reportingServiceManager = new ReportingServiceManager(authorizationData);

    var reportRequest = GetCampaignPerformanceReportRequest(authorizationData.AccountId);

    var reportingDownloadParameters = new ReportingDownloadParameters
    {
        ReportRequest = reportRequest,
        ResultFileDirectory = FileDirectory,
        ResultFileName = ResultFileName,
        OverwriteResultFile = true,
    };

    // Sets the time interval in milliseconds between two status polling attempts. The default value is 5000 (5 seconds).
    reportingServiceManager.StatusPollIntervalInMilliseconds = 5000;
    // Sets the timeout of the HttpClient download operation. The default value is 100000 (100s).
    reportingServiceManager.DownloadHttpTimeout = new TimeSpan(0, 0, 100);

    // You may optionally cancel the DownloadFileAsync operation after a specified time interval. 
    // Pass this object to the DownloadFileAsync operation or specify CancellationToken.None. 
    var tokenSource = new CancellationTokenSource();
    tokenSource.CancelAfter(3600000);

    // The ReportingServiceManager will submit your download request to the Reporting service, 
    // poll the service until completed, and download the file to your local directory.

    var resultFilePath = await reportingServiceManager.DownloadFileAsync(
        parameters: reportingDownloadParameters, 
        cancellationToken: tokenSource.Token
    );
    Console.WriteLine(string.Format("Download result file: {0}\n", resultFilePath));
}
```
```java
ReportingServiceManager reportingServiceManager = new ReportingServiceManager(authorizationData);

ReportRequest reportRequest = getCampaignPerformanceReportRequest();

ReportingDownloadParameters reportingDownloadParameters = new ReportingDownloadParameters();
reportingDownloadParameters.setReportRequest(reportRequest);
reportingDownloadParameters.setResultFileDirectory(new File(FileDirectory));
reportingDownloadParameters.setResultFileName(ResultFileName);
reportingDownloadParameters.setOverwriteResultFile(true);

// Sets the time interval in milliseconds between two status polling attempts. The default value is 5000 (5 seconds).
reportingServiceManager.setStatusPollIntervalInMilliseconds(5000);
// Sets the timeout of the HttpClient download operation. The default value is 100000 (100s).
reportingServiceManager.setDownloadHttpTimeoutInMilliseconds(100000);

// The ReportingServiceManager will submit your download request to the Reporting service, 
// poll the service until completed, and download the file to your local directory. 
// You may optionally cancel the downloadFileAsync operation after a specified time interval.
File resultFile = reportingServiceManager.downloadFileAsync(
    reportingDownloadParameters, 
    null
).get(3600000, TimeUnit.MILLISECONDS);

System.out.println(String.format("Download result file: %s\n", resultFile.getName()));
```
```python
reporting_service_manager=ReportingServiceManager(
    authorization_data=authorization_data, 
    # Sets the time interval in milliseconds between two status polling attempts. 
    # The default value is 5000 (5 seconds).
    poll_interval_in_milliseconds=5000, 
    environment=ENVIRONMENT,
)

report_request=get_keyword_report_request()

reporting_download_parameters = ReportingDownloadParameters(
    report_request=report_request,
    result_file_directory = FILE_DIRECTORY, 
    result_file_name = DOWNLOAD_FILE_NAME, 
    overwrite_result_file = True, # Set this value true if you want to overwrite the same file.
    timeout_in_milliseconds=3600000 # You may optionally cancel the download after a specified time interval.
)

# The ReportingServiceManager will submit your download request to the Reporting service, 
# poll the service until completed, and download the file to your local directory.
result_file_path = reporting_service_manager.download_file(
    reporting_download_parameters=reporting_download_parameters
)
print("Download result file: {0}\n".format(result_file_path))
```

### <a name="submitdownload"></a>Submit and Download with ReportingServiceManager
Submit the download request and then use the ReportingDownloadOperation result to track status yourself using GetStatusAsync.

```csharp
public async Task RunAsync(AuthorizationData authorizationData)
{
    ReportingService = new ReportingServiceManager(authorizationData);

    var reportRequest = GetCampaignPerformanceReportRequest(authorizationData.AccountId);

    var reportingDownloadOperation = await ReportingService.SubmitDownloadAsync(reportRequest);

    // You may optionally cancel the TrackAsync operation after a specified time interval. 
    var tokenSource = new CancellationTokenSource();
    tokenSource.CancelAfter(3600000);

    var reportingDownloadOperation = await ReportingService.SubmitDownloadAsync(reportRequest);

    ReportingOperationStatus reportingOperationStatus = await reportingDownloadOperation.TrackAsync(tokenSource.Token);

    var resultFilePath = await reportingDownloadOperation.DownloadResultFileAsync(
        FileDirectory,
        ResultFileName,
        decompress: true,
        overwrite: true  // Set this value true if you want to overwrite the same file.
    );   

    Console.WriteLine(string.Format("Download result file: {0}\n", resultFilePath));
}
```
```java
ReportingServiceManager = new ReportingServiceManager(authorizationData);

ReportRequest reportRequest = getCampaignPerformanceReportRequest();

ReportingDownloadOperation reportingDownloadOperation = ReportingServiceManager.submitDownloadAsync(
    reportRequest,
    null
).get();

// You may optionally cancel the trackAsync operation after a specified time interval.
ReportingOperationStatus reportingOperationStatus = reportingDownloadOperation.trackAsync(
    null
).get(3600000, TimeUnit.MILLISECONDS);

File resultFile = reportingDownloadOperation.downloadResultFileAsync(
    new File(FileDirectory),
    ResultFileName,
    true, // Set this value to true if you want to decompress the ZIP file.
    true,  // Set this value true if you want to overwrite the named file.
    null
).get();

System.out.println(String.format("Download result file: %s\n", resultFile.getName()));
```
```python
reporting_service_manager=ReportingServiceManager(
    authorization_data=authorization_data, 
    poll_interval_in_milliseconds=5000, 
    environment=ENVIRONMENT,
)

# In addition to ReportingServiceManager, you will need a reporting ServiceClient 
# to build the ReportRequest.

reporting_service=ServiceClient(
    'ReportingService', 
    version=13,
    authorization_data=authorization_data, 
    environment=ENVIRONMENT,
)

report_request=get_keyword_report_request()

reporting_download_operation = reporting_service_manager.submit_download(report_request)

# You may optionally cancel the track() operation after a specified time interval.
reporting_operation_status = reporting_download_operation.track(timeout_in_milliseconds=3600000)
    
result_file_path = reporting_download_operation.download_result_file(
    result_file_directory = FILE_DIRECTORY, 
    result_file_name = DOWNLOAD_FILE_NAME, 
    decompress = True, 
    overwrite = True,  # Set this value true if you want to overwrite the same file.
    timeout_in_milliseconds=3600000 # You may optionally cancel the download after a specified time interval.
)
    
print("Download result file: {0}\n".format(result_file_path))
```

### <a name="downloadresults"></a>Download Results with ReportingServiceManager
If for any reason you have to resume from a previous application state, you can use an existing download request identifier and use it to download the result file. Use TrackAsync to indicate that the application should wait to ensure that the download status is completed.

```csharp
public async Task RunAsync(AuthorizationData authorizationData)
{
    ReportingService = new ReportingServiceManager(authorizationData);

    // You may optionally cancel the TrackAsync operation after a specified time interval. 
    var tokenSource = new CancellationTokenSource();
    tokenSource.CancelAfter(3600000);

    var reportingDownloadOperation = new ReportingDownloadOperation(RequestIdGoesHere, authorizationData);

    // Use TrackAsync to indicate that the application should wait to ensure that 
    // the download status is completed.
    var reportingOperationStatus = await reportingDownloadOperation.TrackAsync(tokenSource.Token);

    var resultFilePath = await reportingDownloadOperation.DownloadResultFileAsync(
        FileDirectory,
        ResultFileName,
        decompress: true,
        overwrite: true   // Set this value true if you want to overwrite the same file.
    );   

    Console.WriteLine(string.Format("Download result file: {0}", resultFilePath));
    Console.WriteLine(string.Format("Status: {0}", reportingOperationStatus.Status));
    Console.WriteLine(string.Format("TrackingId: {0}\n", reportingOperationStatus.TrackingId));
}
```
```java
java.lang.String requestId = RequestIdGoesHere;

ReportingDownloadOperation reportingDownloadOperation = new ReportingDownloadOperation(
    requestId, 
    authorizationData
);

reportingDownloadOperation.setStatusPollIntervalInMilliseconds(5000);

// You can use trackAsync to poll until complete as shown here, 
// or use custom polling logic with getStatusAsync.

// You may optionally cancel the trackAsync operation after a specified time interval.
ReportingOperationStatus reportingOperationStatus = reportingDownloadOperation.trackAsync(
    null
).get(3600000, TimeUnit.MILLISECONDS);

File resultFile = reportingDownloadOperation.downloadResultFileAsync(
    new File(FileDirectory),
    ResultFileName,
    true, // Set this value to true if you want to decompress the ZIP file
    true,  // Set this value true if you want to overwrite the named file.
    null
).get();

System.out.println(String.format("Download result file: %s", resultFile.getName()));
System.out.println(String.format("Status: %s", reportingOperationStatus.getStatus()));
System.out.println(String.format("TrackingId: %s\n", reportingOperationStatus.getTrackingId()));
```
```python
reporting_download_operation = ReportingDownloadOperation(
    request_id = RequestIdGoesHere, 
    authorization_data=authorization_data, 
    poll_interval_in_milliseconds=5000, 
    environment=ENVIRONMENT,
)

# Use track() to indicate that the application should wait to ensure that 
# the download status is completed.
# You may optionally cancel the track() operation after a specified time interval.
reporting_operation_status = reporting_download_operation.track(timeout_in_milliseconds=3600000)
    
result_file_path = reporting_download_operation.download_result_file(
    result_file_directory = FILE_DIRECTORY, 
    result_file_name = DOWNLOAD_FILE_NAME, 
    decompress = True, 
    overwrite = True,  # Set this value true if you want to overwrite the same file.
    timeout_in_milliseconds=3600000 # You may optionally cancel the download after a specified time interval.
) 

print("Download result file: {0}".format(result_file_path))
print("Status: {0}\n".format(reporting_operation_status.status))
```

## <a name="poll-retry"></a>Poll and Retry
The *ReportingServiceManager* automatically polls in 1000 millisecond intervals for the first five attempts, and that behavior is not configurable. The *StatusPollIntervalInMilliseconds* property determines the time interval between each polling attempt after the initial five attempts. For an example please see [Background Completion](#backgroundcompletion) above. The default value is 5000, so if you do not set this value the *ReportingServiceManager* will poll in the following sequence: 1, 2, 3, 4, 5, 10, 15, 20, and so on. If you set this value to 10000, the *ReportingServiceManager* will poll in the following sequence: 1, 2, 3, 4, 5, 15, 25, 35, and so on. The minimum poll interval is 1000, and if you specify a value less than 1000 an exception will be thrown.

The *ReportingServiceManager* will automatically retry download and polling operations up to the maximum timeout duration that you specify. You can set the maximum retry timeout duration. If no timeout is specified, the *ReportingServiceManager* will continue to retry until the server returns a timeout or internal error. Separately, if you are downloading large files, you should consider setting the *DownloadHttpTimeout* property.

## <a name="workingdirectory"></a>Working Directory and ReportingServiceManager
With the Bing Ads .NET and Java SDKs, you can set the working directory where *ReportingServiceManager* should store temporary report files. For example when you download a Report container, although you will only work with a Report object a report file is downloaded to the working directory. The system temporary directory will be used if another working directory is not specified. 

If you are using a hosted service such as Microsoft Azure you'll want to ensure you do not exceed the temp directory limits. There may be other reasons to use a custom working directory. You can specify a different working directory for each *ReportingServiceManager* instance by setting the *WorkingDirectory* property. You are also responsible for creating and removing any directories. 

> [!IMPORTANT] 
> After you have iterated over the report records you can clean up the files from the working directory. The *CleanupTempFiles* method removes all files (but not any sub-directories) within the working directory, whether or not the files were created by the current *ReportingServiceManager* instance.  

```csharp
ReportingServiceManager reportingServiceManager = new ReportingServiceManager(
    authorizationData: authorizationData, 
    apiEnvironment: environment
);

var reportRequest = GetReportRequest(authorizationData.AccountId);

var reportingDownloadParameters = new ReportingDownloadParameters
{
    ReportRequest = reportRequest,
    ResultFileDirectory = FileDirectory,
    ResultFileName = ResultFileName,
    OverwriteResultFile = true,
};

// The system temp directory will be used if another working directory is not specified. If you are 
// using a hosted service such as Microsoft Azure you'll want to ensure you do not exceed the file or directory limits. 
// You can specify a different working directory for each ReportingServiceManager instance.

reportingServiceManager.WorkingDirectory = FileDirectory;

// You can get a Report object by submitting a new download request via ReportingServiceManager. 
// Although in this case you won't work directly with the file, under the covers a request is 
// submitted to the Reporting service and the report file is downloaded to a local directory. 

Report reportContainer = await reportingServiceManager.DownloadReportAsync(
    parameters: reportingDownloadParameters,
    cancellationToken: CancellationToken.None
);

IEnumerable<IReportRecord> reportRecordIterable = reportContainer.GetReportRecords();

// Be sure to close the report before you attempt to clean up files within the working directory.

reportContainer.Dispose();

// The CleanupTempFiles method removes all files (but not sub-directories) within the working directory, 
// whether or not the files were created by this ReportingServiceManager instance. 

reportingServiceManager.CleanupTempFiles();
```
```java
ReportingServiceManager reportingServiceManager = new ReportingServiceManager(authorizationData, API_ENVIRONMENT);
reportingServiceManager.setStatusPollIntervalInMilliseconds(5000);

ReportRequest reportRequest = getReportRequest(authorizationData.getAccountId());

ReportingDownloadParameters reportingDownloadParameters = new ReportingDownloadParameters();
reportingDownloadParameters.setReportRequest(reportRequest);
reportingDownloadParameters.setResultFileDirectory(new File(FileDirectory));
reportingDownloadParameters.setResultFileName(ResultFileName);
reportingDownloadParameters.setOverwriteResultFile(true);

// The system temp directory will be used if another working directory is not specified. If you are 
// using a hosted service such as Microsoft Azure you'll want to ensure you do not exceed the file or directory limits. 
// You can specify a different working directory for each ReportingServiceManager instance.

reportingServiceManager.setWorkingDirectory(new File(FileDirectory));

// You can get a Report object by submitting a new download request via ReportingServiceManager. 
// Although in this case you won't work directly with the file, under the covers a request is 
// submitted to the Reporting service and the report file is downloaded to a local directory. 

Report reportContainer = reportingServiceManager.downloadReportAsync(
    reportingDownloadParameters, 
    null
).get(); 

java.lang.Long recordCount = reportContainer.getReportRecordCount();

// Be sure to close the reportRequest before you attempt to clean up files within the working directory.

reportContainer.close();

// The cleanupTempFiles method removes all files (but not sub-directories) within the working directory, 
// whether or not the files were created by this ReportingServiceManager instance. 

reportingServiceManager.cleanupTempFiles();
```

## See Also
[Sandbox](sandbox.md)  
[Bing Ads API Code Examples](code-examples.md)    
[Bing Ads API Web Service Addresses](web-service-addresses.md)  

