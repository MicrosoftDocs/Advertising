---
title: "Bulk Service Manager"
ms.service: "bing-ads"
ms.topic: "article"
author: eric-urban
ms.author: eur
description: Learn about using Bulk Service Manager with the Bing Ads SDKs.
dev_langs:
  - csharp
  - java
  - python
---
# Bulk Service Manager
Take advantage of the [Bulk service](../bulk-service/bulk-service-reference.md) to efficiently manage ad groups and ads for all campaigns in an account. The Bing Ads .NET, Java, and Python SDKs provide classes to accelerate productivity for downloading and uploading bulk records. For example the *BulkServiceManager* will submit your download request to the [Bulk service](../bulk-service/bulk-service-reference.md), poll the service until completed, and download the file to your local directory. The *BulkServiceManager* also handles common request header fields for you, allowing to specify the *Authentication*, *CustomerId*, *AccountId*, and *DeveloperToken* properties in the *AuthorizationData* object once for each service. For more information, see [Using AuthorizationData](sdk-authentication.md#authorization-data) and the [Bulk Requests](code-example-bulk-requests.md) code example. 

> [!NOTE]
> The *BulkServiceManager* is only available with the Bing Ads .NET, Java, and Python SDKs. Whether or not you use an SDK, you can use the [Bulk service](../bulk-service/bulk-service-reference.md) directly. For more information, see [Bulk Download and Upload](bulk-download-upload.md). 

## <a name="bulk-reader-writer"></a>Bulk File Reader and Writer
You do not need to implement your own file parser to read and write the Bulk file. You can use *BulkFileReader* and *BulkFileWriter* objects to read and write *BulkEntity* derived classes.

> [!NOTE] 
> The *BulkServiceManager* uses a *BulkFileReader* and *BulkFileWriter* in the background when you upload and download entities instead of files. Temporary files are used in the background. For more details, see [Working Directory and BulkServiceManager](#workingdirectory).  

For example, let's say that you want to write the following [Expanded Text Ad](../bulk-service/expanded-text-ad.md) record to a bulk file.   

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Title,Text,Text Part 2,Display Url,Destination Url,Promotion,Device Preference,Ad Format Preference,Name,App Platform,App Id,Final Url,Mobile Final Url,Tracking Template,Custom Parameter,Title Part 1,Title Part 2,Title Part 3,Path 1,Path 2
Format Version,,,,,,,,,,,,,,,6.0,,,,,,,,,,,
Expanded Text Ad,Active,,-1111,ParentCampaignNameGoesHere,AdGroupNameGoesHere,ClientIdGoesHere,,,Find New Customers & Increase Sales!,Start Advertising on Contoso Today.,,,,,False,,,,https://www.contoso.com/womenshoesale,https://mobile.contoso.com/womenshoesale,,{_promoCode}=PROMO1; {_season}=summer,Contoso,Quick & Easy Setup,Seemless Integration,seattle,shoe sale
```

First, create the BulkExpandedTextAd object as shown below in [Bulk and Campaign Management Entity Map](#bulk-campaign-map). Then you can write the BulkExpandedTextAd to a file with BulkFileWriter as shown here. 

```csharp
var bulkFileWriter = new BulkFileWriter(
    filePath: FileDirectory + UploadFileName
);
bulkFileWriter.WriteEntity(bulkExpandedTextAd);
bulkFileWriter.Dispose();
```
```java
BulkFileWriter bulkFileWriter = new BulkFileWriter(
    new File(FileDirectory + UploadFileName)
);
bulkFileWriter.writeEntity(bulkExpandedTextAd);
bulkFileWriter.close();
```
```python
bulk_file_writer=BulkFileWriter(
    file_path=FILE_DIRECTORY+UPLOAD_FILE_NAME
)
bulk_file_writer.write_entity(bulk_expanded_text_ad)
bulk_file_writer.close()
```

Here is an example of reading the Bulk upload results file from a local directory with BulkFileReader. You can read a bulk file with the BulkFileReader, whether full download, partial download, or upload results.  

```csharp
var bulkFileReader = new BulkFileReader(
    filePath: bulkFilePath, // Path to the Bulk file
    resultFileType: ResultFileType.Upload, // FullDownload, PartialDownload, or Upload
    fileFormat: DownloadFileType.Csv // Csv or Tsv
);
var resultEntities = bulkFileReader.ReadEntities().ToList();
var expandedTextAdResults = resultEntities.OfType<BulkExpandedTextAd>().ToList();
OutputBulkExpandedTextAds(expandedTextAdResults);
bulkFileReader.Dispose();
```
```java
BulkFileReader bulkFileReader = new BulkFileReader(
    bulkFilePath, // Path to the Bulk file
    ResultFileType.UPLOAD, // FULL_DOWNLOAD, PARTIAL_DOWNLOAD, or UPLOAD
    DownloadFileType.CSV  // Csv or Tsv
);
BulkEntityIterable resultEntities = bulkFileReader.getEntities();
for (BulkEntity entity : resultEntities) {
    if (entity instanceof BulkExpandedTextAd) {
        outputBulkBulkExpandedTextAds(Arrays.asList((BulkExpandedTextAd) entity));
    }
}
resultEntities.close();
bulkFileReader.close();
```
```python
def read_entities_from_bulk_file(file_path, result_file_type, file_type):
    with BulkFileReader(file_path=file_path, result_file_type=result_file_type, file_type=file_type) as reader:
        for entity in reader:
            yield entity

def main():
    result_entities=[]
    entities_generator=read_entities_from_bulk_file(
        file_path=bulk_file_path, # Path to the Bulk file
        result_file_type=ResultFileType.upload, # full_download, partial_download, or upload
        file_type='Csv'  # Csv or Tsv
    )
    for entity in entities_generator:
        result_entities.append(entity)
    for entity in download_entities:
        if isinstance(entity, BulkExpandedTextAd):
            output_bulk_expanded_text_ads([entity])
```

## <a name="bulk-campaign-map"></a>Bulk and Campaign Management Entity Map
All objects read from and written to Bulk files via BulkServiceManager, BulkFileReader, BulkFileWriter derive from the BulkEntity base class e.g., BulkCampaign, BulkAdGroup, and BulkExpandedTextAd. Wherever possible the bulk objects leverage Campaign Management objects and value sets e.g., the following BulkExpandedTextAd contains the Campaign Management API [ExpandedTextAd](../campaign-management-service/expandedtextad.md) object. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkExpandedTextAd
var bulkExpandedTextAd = new BulkExpandedTextAd
{
    // 'Parent Id' column header in the Bulk file
    AdGroupId = adGroupIdKey,
    // 'Ad Group' column header in the Bulk file
    AdGroupName = "AdGroupNameGoesHere",
    // 'Campaign' column header in the Bulk file
    CampaignName = "ParentCampaignNameGoesHere",
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",

    // Map properties in the Bulk file to the 
    // ExpandedTextAd object of the Campaign Management service.
    ExpandedTextAd = new ExpandedTextAd
    {
        // 'Ad Format Preference' column header in the Bulk file
        AdFormatPreference = "All",
        // 'Mobile Final Url' column header in the Bulk file
        FinalMobileUrls = new[] {
            // Each Url is delimited by a semicolon (;) in the Bulk file
            "https://mobile.contoso.com/womenshoesale"
        },
        // 'Final Url' column header in the Bulk file
        FinalUrls = new[] {
            // Each Url is delimited by a semicolon (;) in the Bulk file
            "https://www.contoso.com/womenshoesale"
        },
        // 'Id' column header in the Bulk file
        Id = null,
        // 'Path 1' column header in the Bulk file
        Path1 = "seattle",
        // 'Path 2' column header in the Bulk file
        Path2 = "shoe sale",
        // 'Status' column header in the Bulk file
        Status = AdStatus.Active,
        // 'Text' column header in the Bulk file
        Text = "Find New Customers & Increase Sales!",
        // 'Text Part 2' column header in the Bulk file
        TextPart2 = "Start Advertising on Contoso Today.",
        // 'Title Part 1' column header in the Bulk file
        TitlePart1 = "Contoso",
        // 'Title Part 2' column header in the Bulk file
        TitlePart2 = "Quick & Easy Setup",
        // 'Title Part 3' column header in the Bulk file
        TitlePart3 = "Seemless Integration",
        // 'Tracking Template' column header in the Bulk file
        TrackingUrlTemplate = null,
        // 'Custom Parameter' column header in the Bulk file
        UrlCustomParameters = new CustomParameters
        {
            // Each custom parameter is delimited by a semicolon (;) in the Bulk file
            Parameters = new[] {
                new CustomParameter(){
                    Key = "promoCode",
                    Value = "PROMO1"
                },
                new CustomParameter(){
                    Key = "season",
                    Value = "summer"
                },
            }
        },
    },
};

uploadEntities.Add(bulkExpandedTextAd);

var entityUploadParameters = new EntityUploadParameters
{
    Entities = uploadEntities,
    ResponseMode = ResponseMode.ErrorsAndResults,
    ResultFileDirectory = FileDirectory,
    ResultFileName = DownloadFileName,
    OverwriteResultFile = true,
};

var uploadResultEntities = (await bulkServiceManager.UploadEntitiesAsync(entityUploadParameters)).ToList();
```
```java
List<BulkEntity> uploadEntities = new ArrayList<BulkEntity>();

// Map properties in the Bulk file to the BulkExpandedTextAd
BulkExpandedTextAd bulkExpandedTextAd = new BulkExpandedTextAd();

// 'Parent Id' column header in the Bulk file
bulkExpandedTextAd.setAdGroupId(adGroupIdKey);
// 'Ad Group' column header in the Bulk file
bulkExpandedTextAd.setAdGroupName("AdGroupNameGoesHere");
// 'Campaign' column header in the Bulk file
bulkExpandedTextAd.setCampaignName("ParentCampaignNameGoesHere");
// 'Client Id' column header in the Bulk file
bulkExpandedTextAd.setClientId("ClientIdGoesHere");

// Map properties in the Bulk file to the 
// ExpandedTextAd object of the Campaign Management service.
ExpandedTextAd expandedTextAd = new ExpandedTextAd();
// 'Ad Format Preference' column header in the Bulk file
expandedTextAd.setAdFormatPreference("All");
// 'Mobile Final Url' column header in the Bulk file
// Each Url is delimited by a semicolon (;) in the Bulk file
ArrayOfstring mobileFinalUrls = new ArrayOfstring();            
mobileFinalUrls.getStrings().add("https://mobile.contoso.com/womenshoesale");
expandedTextAd.setFinalMobileUrls(mobileFinalUrls);
// 'Final Url' column header in the Bulk file
// Each Url is delimited by a semicolon (;) in the Bulk file
ArrayOfstring finalUrls = new ArrayOfstring();            
finalUrls.getStrings().add("https://www.contoso.com/womenshoesale");
expandedTextAd.setFinalUrls(finalUrls);
// 'Id' column header in the Bulk file
expandedTextAd.setId(null);
// 'Path 1' column header in the Bulk file
expandedTextAd.setPath1("seattle");
// 'Path 2' column header in the Bulk file
expandedTextAd.setPath2("shoe sale");
// 'Status' column header in the Bulk file
expandedTextAd.setStatus(AdStatus.ACTIVE);
// 'Text' column header in the Bulk file
expandedTextAd.setText("Find New Customers & Increase Sales!");
// 'Text Part 2' column header in the Bulk file
expandedTextAd.setTextPart2("Start Advertising on Contoso Today.");
// 'Title Part 1' column header in the Bulk file
expandedTextAd.setTitlePart1("Contoso");
// 'Title Part 2' column header in the Bulk file
expandedTextAd.setTitlePart2("Quick & Easy Setup");
// 'Title Part 3' column header in the Bulk file
expandedTextAd.setTitlePart3("Seemless Integration");
// 'Tracking Template' column header in the Bulk file
expandedTextAd.setTrackingUrlTemplate(null);
// 'Custom Parameter' column header in the Bulk file
// Each custom parameter is delimited by a semicolon (;) in the Bulk file            
CustomParameters customParameters = new CustomParameters();
ArrayOfCustomParameter arrayOfCustomParameter = new ArrayOfCustomParameter();
CustomParameter customParameterA = new CustomParameter();
customParameterA.setKey("promoCode");
customParameterA.setValue("PROMO1");
arrayOfCustomParameter.getCustomParameters().add(customParameterA);
CustomParameter customParameterB = new CustomParameter();
customParameterB.setKey("season");
customParameterB.setValue("summer");
arrayOfCustomParameter.getCustomParameters().add(customParameterB);
customParameters.setParameters(arrayOfCustomParameter);
expandedTextAd.setUrlCustomParameters(customParameters);

bulkExpandedTextAd.setExpandedTextAd(expandedTextAd);

uploadEntities.add(bulkExpandedTextAd);

EntityUploadParameters entityUploadParameters = new EntityUploadParameters();
entityUploadParameters.setEntities(uploadEntities);
entityUploadParameters.setOverwriteResultFile(true);
entityUploadParameters.setResultFileDirectory(new File(FileDirectory));
entityUploadParameters.setResultFileName(ResultFileName);
entityUploadParameters.setResponseMode(ResponseMode.ERRORS_AND_RESULTS);

BulkEntityIterable uploadResultEntities = bulkServiceManager.uploadEntitiesAsync(
    entityUploadParameters, 
    null, 
    null
).get();
```
```python
# Map properties in the Bulk file to the BulkExpandedTextAd
bulk_expanded_text_ad=BulkExpandedTextAd()

# 'Parent Id' column header in the Bulk file
bulk_expanded_text_ad.ad_group_id=AD_GROUP_ID_KEY
# 'Ad Group' column header in the Bulk file
bulk_expanded_text_ad.AdGroupName='AdGroupNameGoesHere'
# 'Campaign' column header in the Bulk file
bulk_expanded_text_ad.CampaignName='ParentCampaignNameGoesHere'
# 'Client Id' column header in the Bulk file
bulk_expanded_text_ad.ClientId='ClientIdGoesHere'

# Map properties in the Bulk file to the 
# ExpandedTextAd object of the Campaign Management service.
expanded_text_ad=set_elements_to_none(campaign_service.factory.create('ExpandedTextAd'))
# 'Ad Format Preference' column header in the Bulk file
expanded_text_ad.AdFormatPreference='All'
# 'Mobile Final Url' column header in the Bulk file
# Each Url is delimited by a semicolon (;) in the Bulk file
mobile_final_urls=campaign_service.factory.create('ns3:ArrayOfstring')
mobile_final_urls.string.append('https://mobile.contoso.com/womenshoesale')
expanded_text_ad.FinalUrls=mobile_final_urls
# 'Final Url' column header in the Bulk file
# Each Url is delimited by a semicolon (;) in the Bulk file
final_urls=campaign_service.factory.create('ns3:ArrayOfstring')
final_urls.string.append('https://www.contoso.com/womenshoesale')
expanded_text_ad.FinalUrls=final_urls
# 'Id' column header in the Bulk file
expanded_text_ad.Id=None
# 'Path 1' column header in the Bulk file
expanded_text_ad.Path1='seattle'
# 'Path 2' column header in the Bulk file
expanded_text_ad.Path2='shoe sale'
# 'Status' column header in the Bulk file
expanded_text_ad.Status='Active'
# 'Text' column header in the Bulk file
expanded_text_ad.Text='Find New Customers & Increase Sales!'
# 'Text Part 2' column header in the Bulk file
expanded_text_ad.TextPart2='Start Advertising on Contoso Today.'
# 'Title Part 1' column header in the Bulk file
expanded_text_ad.TitlePart1='Contoso'
# 'Title Part 2' column header in the Bulk file
expanded_text_ad.TitlePart2='Quick & Easy Setup'
# 'Title Part 3' column header in the Bulk file
expanded_text_ad.TitlePart3='Seemless Integration'
# 'Tracking Template' column header in the Bulk file
expanded_text_ad.TrackingUrlTemplate=None
# 'Custom Parameter' column header in the Bulk file
# Each custom parameter is delimited by a semicolon (;) in the Bulk file            
custom_parameters=set_elements_to_none(campaign_service.factory.create('CustomParameters'))
array_of_custom_parameter=campaign_service.factory.create('ArrayOfCustomParameter')
custom_parameter_a=set_elements_to_none(campaign_service.factory.create('CustomParameter'))
custom_parameter_a.Key='promoCode'
custom_parameter_a.Value='PROMO1'
array_of_custom_parameter.CustomParameter.append(custom_parameter_a)
custom_parameter_b=set_elements_to_none(campaign_service.factory.create('CustomParameter'))
custom_parameter_b.Key='season'
custom_parameter_b.Value='summer'
array_of_custom_parameter.CustomParameter.append(custom_parameter_b)
custom_parameters.Parameters=array_of_custom_parameter
expanded_text_ad.UrlCustomParameters=custom_parameters

bulk_expanded_text_ad.ad=expanded_text_ad

upload_entities.append(bulk_expanded_text_ad)

entity_upload_parameters=EntityUploadParameters(
    entities=upload_entities,
    overwrite_result_file=True,
    result_file_directory=FILE_DIRECTORY,
    result_file_name=RESULT_FILE_NAME,
    response_mode='ErrorsAndResults'
)

upload_result_entities=bulk_service_manager.upload_entities(
    entity_upload_parameters=entity_upload_parameters, 
    progress=None
)
```

## <a name="update-delete-value"></a>Update with delete_value
To remove an existing setting, you should not write an empty string ("") to the Bulk file because such strings are ignored by the Bulk service. Use the reserved "delete_value" string to delete or reset the value of an optional field. If you use the reserved "delete_value" string in an optional field, the previous setting will be deleted. For example if you set the [Custom Parameter](../bulk-service/expanded-text-ad.md#customparameter) field of the [Expanded Text Ad](../bulk-service/expanded-text-ad.md) record to "delete_value", all previous custom parameters will be deleted from the expanded text ad. Likewise if you set the [Tracking Template](../bulk-service/expanded-text-ad.md#trackingtemplate) field of the [Expanded Text Ad](../bulk-service/expanded-text-ad.md) record to "delete_value", the previous tracking template will be deleted from the expanded text ad. For more details about "delete_value" see [Bulk File Schema - Update with delete_value](../bulk-service/bulk-file-schema.md#update-delete-value).

The [BulkFileWriter](#bulk-reader-writer) automatically writes "delete_value" where applicable. Because the SDK [maps](#bulk-campaign-map) Campaign Management API objects to the contents of a Bulk file, you cannot explicitly set the "delete_value" string for properties with other data types. In those cases you can use the same syntax that you would use to update the object via the Campaign Management API. In the example below by setting UrlCustomParameters to an empty CustomParameters object, the SDK will write "delete_value" in the [Custom Parameter](../bulk-service/expanded-text-ad.md#customparameter) field of the [Expanded Text Ad](../bulk-service/expanded-text-ad.md) record. Likewise by setting TrackingUrlTemplate to an empty string, the SDK will write "delete_value" in the [Tracking Template](../bulk-service/expanded-text-ad.md#trackingtemplate) field of the [Expanded Text Ad](../bulk-service/expanded-text-ad.md) record. The example syntax within the [ExpandedTextAd](../campaign-management-service/expandedtextad.md) object is identical to how you would delete previus settings via the [UpdateAds](../campaign-management-service/updateads.md) service operation via the Campaign Management API. 

> [!IMPORTANT]
> Do not use empty strings ("") or the "delete_value" syntax when you create a Bulk entity. The reserved "delete_value" string is only applicable for updating Bulk records. Either you should not set the property, or set it to a null equivalent. 

```csharp
var bulkExpandedTextAd = new BulkExpandedTextAd
{
    AdGroupId = adGroupIdKey,
    ExpandedTextAd = new ExpandedTextAd
    {
        Id = expandedTextAdIdKey,
        TrackingUrlTemplate = "",
        UrlCustomParameters = new CustomParameters { }
    },
};
```
```java
BulkExpandedTextAd bulkExpandedTextAd = new BulkExpandedTextAd();
bulkExpandedTextAd.setAdGroupId(expandedTextAdIdKey);
ExpandedTextAd expandedTextAd = new ExpandedTextAd();
expandedTextAd.setId(adIdKey);
expandedTextAd.setTrackingUrlTemplate("");       
CustomParameters customParameters = new CustomParameters();
expandedTextAd.setUrlCustomParameters(customParameters);
bulkExpandedTextAd.setExpandedTextAd(expandedTextAd);
```
```python
bulk_expanded_text_ad=BulkExpandedTextAd()
bulk_expanded_text_ad.ad_group_id=AD_GROUP_ID_KEY
expanded_text_ad=set_elements_to_none(campaign_service.factory.create('ExpandedTextAd'))
expanded_text_ad.Id=EXPANDED_TEXT_AD_ID_KEY
expanded_text_ad.TrackingUrlTemplate=''         
custom_parameters=set_elements_to_none(campaign_service.factory.create('CustomParameters'))
expanded_text_ad.UrlCustomParameters=custom_parameters
bulk_expanded_text_ad.ad=expanded_text_ad
```

## <a name="bulk-download-upload"></a>Download and Upload
The *BulkServiceManager* supports flexible bulk download and upload workflows.

- You can create a download or upload request and the *BulkServiceManager* will submit your download request to the Bulk service, poll the service until completed, and download the file to your local directory. For example, see [Background Completion with BulkServiceManager](#backgroundcompletion). 

- You can submit a download or upload request and then poll until the result file is ready to download. For example, see [Submit and Download with BulkServiceManager](#submitdownload).

- If for any reason you have to resume from a previous application state, you can use an existing download or upload request identifier and use it to download the result file. For example, see [Download Results with BulkServiceManager](#downloadresults). 

Whether you download and upload entities in memory or read and write them in a file yourself, the BulkServiceManager reads and writes to a temporary file.  

### <a name="backgroundcompletion"></a>Background Completion with BulkServiceManager
You can create a download or upload request and the *BulkServiceManager* will submit your download request to the Bulk service, poll the service until completed, and download the file to your local directory.

```csharp
public async Task RunAsync(AuthorizationData authorizationData)
{
    var bulkServiceManager = new BulkServiceManager(authorizationData);

    var progress = new Progress<BulkOperationProgressInfo>(x =>
        Console.WriteLine(String.Format("{0} % Complete", x.PercentComplete.ToString(CultureInfo.InvariantCulture))));

    var downloadParameters = new DownloadParameters
    {
        CampaignIds = null,
        DataScope = DataScope.EntityData,
        Entities = DownloadEntity.Keywords,
        FileType = DownloadFileType.Csv,
        LastSyncTimeInUTC = null,
        ResultFileDirectory = FileDirectory,
        ResultFileName = ResultFileName,
        OverwriteResultFile = false  // Set this value true if you want to overwrite the same file.
    };

    // Sets the time interval in milliseconds between two status polling attempts. The default value is 5000 (5 seconds).
    bulkServiceManager.StatusPollIntervalInMilliseconds = 5000;
    // Sets the timeout of the HttpClient download operation. The default value is 100000 (100s).
    bulkServiceManager.DownloadHttpTimeout = new TimeSpan(0, 0, 100);

    // You may optionally cancel the DownloadFileAsync operation after a specified time interval. 
    // Pass this object to the DownloadFileAsync operation or specify CancellationToken.None. 
    var tokenSource = new CancellationTokenSource();
    tokenSource.CancelAfter(3600000);

    // The BulkServiceManager will submit your download request to the Bulk service, 
    // poll the service until completed, and download the file to your local directory.

    var resultFile = await bulkServiceManager.DownloadFileAsync(
        parameters: downloadParameters,
        progress: progress,
        cancellationToken: tokenSource.Token
    );

    Console.WriteLine(string.Format("Download result file: {0}\n", resultFile));
}
```
```java
BulkServiceManager bulkServiceManager = new BulkServiceManager(authorizationData);

Progress<BulkOperationProgressInfo> progress = new Progress<BulkOperationProgressInfo>() {
    @Override
    public void report(BulkOperationProgressInfo value) {
        System.out.println(value.getPercentComplete() + "% Complete\n");
    }
};

DownloadParameters downloadParameters = new DownloadParameters();
downloadParameters.setCampaignIds(null);
ArrayList<DataScope> dataScope = new ArrayList<DataScope>();
dataScope.add(DataScope.ENTITY_DATA);
downloadParameters.setDataScope(dataScope);
downloadParameters.setFileType(FileType);
downloadParameters.setLastSyncTimeInUTC(null);
ArrayList<DownloadEntity> bulkDownloadEntities = new ArrayList<DownloadEntity>();
bulkDownloadEntities.add(DownloadEntity.KEYWORDS);
downloadParameters.setEntities(bulkDownloadEntities);
downloadParameters.setResultFileDirectory(new File(FileDirectory));
downloadParameters.setResultFileName(ResultFileName);
downloadParameters.setOverwriteResultFile(true);    // Set this value true if you want to overwrite the same file.

// Sets the time interval in milliseconds between two status polling attempts. The default value is 5000 (5 seconds).
bulkServiceManager.setStatusPollIntervalInMilliseconds(5000);
// Sets the timeout of the HttpClient download operation. The default value is 100000 (100s).
bulkServiceManager.setDownloadHttpTimeoutInMilliseconds(100000);

// The BulkServiceManager will submit your download request to the Bulk service, 
// poll the service until completed, and download the file to your local directory. 
// You may optionally cancel the downloadFileAsync operation after a specified time interval.
File resultFile = bulkServiceManager.downloadFileAsync(
    downloadParameters, 
    progress, 
    null
).get(3600000, TimeUnit.MILLISECONDS);

System.out.printf("Download result file: %s\n", resultFile.getName());
```

```python
bulk_service_manager = BulkServiceManager(
    authorization_data=authorization_data, 
    # Sets the time interval in milliseconds between two status polling attempts. 
    # The default value is 5000 (5 seconds).
    poll_interval_in_milliseconds = 5000, 
    environment = ENVIRONMENT,
)
        
download_parameters = DownloadParameters(
    campaign_ids=None,
    data_scope=['EntityData'],
    entities=entities,
    file_type=FILE_TYPE,
    last_sync_time_in_utc=None,
    result_file_directory = FILE_DIRECTORY, 
    result_file_name = DOWNLOAD_FILE_NAME, 
    # Set this value true if you want to overwrite the same file.
    overwrite_result_file = True, 
    # You may optionally cancel the download after a specified time interval.
    timeout_in_milliseconds=3600000 
)

# The BulkServiceManager will submit your download request to the Bulk service, 
# poll the service until completed, and download the file to your local directory.
result_file_path = bulk_service_manager.download_file(
    download_parameters=download_parameters, 
    progress = None
)

print("Download result file: {0}\n".format(result_file_path))
```

### <a name="submitdownload"></a>Submit and Download with BulkServiceManager
Submit the download request and then use the BulkDownloadOperation result to track the status.

```csharp
public async Task RunAsync(AuthorizationData authorizationData)
{
    var bulkServiceManager = new BulkServiceManager(authorizationData);

    var submitDownloadParameters = new SubmitDownloadParameters
    {
        CampaignIds = null,
        DataScope = DataScope.EntityData,
        Entities = DownloadEntity.Keywords,
        FileType = DownloadFileType.Csv,
        LastSyncTimeInUTC = null
    };

    var bulkDownloadOperation = await bulkServiceManager.SubmitDownloadAsync(submitDownloadParameters);

    // You may optionally cancel the TrackAsync operation after a specified time interval. 
    var tokenSource = new CancellationTokenSource();
    tokenSource.CancelAfter(3600000);

    BulkOperationStatus<DownloadStatus> downloadStatus = await bulkDownloadOperation.TrackAsync(
        null, 
        tokenSource.Token
    );

    var resultFilePath = await bulkDownloadOperation.DownloadResultFileAsync(
        FileDirectory,
        ResultFileName,
        decompress: true,
        overwrite: true // Set this value true if you want to overwrite the same file.
    );   

    Console.WriteLine(String.Format("Download result file: {0}\n", resultFilePath));
}
```
```java
BulkServiceManager bulkServiceManager = new BulkServiceManager(authorizationData);

SubmitDownloadParameters submitDownloadParameters = new SubmitDownloadParameters();
submitDownloadParameters.setCampaignIds(null);
ArrayList<DataScope> dataScope = new ArrayList<DataScope>();
dataScope.add(DataScope.ENTITY_DATA);
submitDownloadParameters.setDataScope(dataScope);
submitDownloadParameters.setFileType(FileType);
submitDownloadParameters.setLastSyncTimeInUTC(null);
ArrayList<DownloadEntity> bulkDownloadEntities = new ArrayList<DownloadEntity>();
bulkDownloadEntities.add(DownloadEntity.KEYWORDS);
submitDownloadParameters.setEntities(bulkDownloadEntities);

// Submit the download request. You can use the BulkDownloadOperation result to track status yourself using getStatusAsync,
// or use trackAsync to indicate that the application should wait until the download status is completed.

BulkDownloadOperation bulkDownloadOperation = bulkServiceManager.submitDownloadAsync(
    submitDownloadParameters,
    null
).get();

// You may optionally cancel the trackAsync operation after a specified time interval.
BulkOperationStatus<DownloadStatus> downloadStatus = bulkDownloadOperation.trackAsync(
    null
).get(3600000, TimeUnit.MILLISECONDS);

File resultFile = bulkDownloadOperation.downloadResultFileAsync(
    new File(FileDirectory),
    ResultFileName,
    true, // Set this value to true if you want to decompress the ZIP file.
    true,  // Set this value true if you want to overwrite the named file.
    null
).get();

System.out.println(String.format("Download result file: %s\n", resultFile.getName()));
```
```python
bulk_service_manager = BulkServiceManager(
    authorization_data=authorization_data, 
    poll_interval_in_milliseconds = 5000, 
    environment = ENVIRONMENT,
)

submit_download_parameters = SubmitDownloadParameters(
    data_scope = [ 'EntityData' ],
    entities = [ 'Campaigns', 'AdGroups', 'Keywords', 'Ads' ],
    file_type = 'Csv',
    campaign_ids = None,
    last_sync_time_in_utc = None,
    performance_stats_date_range = None
)

bulk_download_operation = bulk_service_manager.submit_download(submit_download_parameters)

# You may optionally cancel the track() operation after a specified time interval.
download_status = bulk_download_operation.track(timeout_in_milliseconds=3600000)
    
result_file_path = bulk_download_operation.download_result_file(
    result_file_directory = FILE_DIRECTORY, 
    result_file_name = DOWNLOAD_FILE_NAME, 
    decompress = True, 
    overwrite = True, # Set this value true if you want to overwrite the same file.
    timeout_in_milliseconds=3600000 # You may optionally cancel the download after a specified time interval.
)
    
print("Download result file: {0}\n".format(result_file_path))
```

### <a name="downloadresults"></a>Download Results with BulkServiceManager
If for any reason you have to resume from a previous application state, you can use an existing download or upload request identifier and use it to download the result file. Track the result to ensure that the download status is completed.

```csharp
public async Task RunAsync(AuthorizationData authorizationData)
{
    var bulkServiceManager = new BulkServiceManager(authorizationData);

    var progress = new Progress<BulkOperationProgressInfo>(x =>
        Console.WriteLine(String.Format("{0} % Complete", x.PercentComplete.ToString(CultureInfo.InvariantCulture))));

    // You may optionally cancel the TrackAsync operation after a specified time interval. 
    var tokenSource = new CancellationTokenSource();
    tokenSource.CancelAfter(3600000);

    var bulkDownloadOperation = new BulkDownloadOperation(requestId, authorizationData);

    // Use TrackAsync to indicate that the application should wait to ensure that 
    // the download status is completed.
    var bulkOperationStatus = await bulkDownloadOperation.TrackAsync(null, tokenSource.Token);

    var resultFilePath = await bulkDownloadOperation.DownloadResultFileAsync(
        FileDirectory,
        ResultFileName,
        decompress: true,
        overwrite: true  // Set this value true if you want to overwrite the same file.
    );   

    Console.WriteLine(String.Format("Download result file: {0}", resultFilePath));
    Console.WriteLine(String.Format("Status: {0}", bulkOperationStatus.Status));
    Console.WriteLine(String.Format("TrackingId: {0}\n", bulkOperationStatus.TrackingId));
}
```
```java
Progress<BulkOperationProgressInfo> progress = new Progress<BulkOperationProgressInfo>() {
    @Override
    public void report(BulkOperationProgressInfo value) {
        System.out.println(value.getPercentComplete() + "% Complete\n");
    }
};

java.lang.String requestId = RequestIdGoesHere;

BulkDownloadOperation bulkDownloadOperation = new BulkDownloadOperation(requestId, authorizationData);

// You may optionally cancel the trackAsync operation after a specified time interval.
BulkOperationStatus<DownloadStatus> downloadStatus = bulkDownloadOperation.trackAsync(
    progress, 
    null
).get(3600000, TimeUnit.MILLISECONDS);

System.out.printf(
    "Download Status:\nPercentComplete: %s\nResultFileUrl: %s\nStatus: %s\n",
    downloadStatus.getPercentComplete(), downloadStatus.getResultFileUrl(), downloadStatus.getStatus()
);

File resultFile = bulkDownloadOperation.downloadResultFileAsync(
    new File(FileDirectory),
    ResultFileName,
    true,    // Set this value to true if you want to decompress the ZIP file
    true,    // Set this value true if you want to overwrite the same file.
    null
).get();

System.out.println(String.format("Download result file: %s", resultFile.getName()));
System.out.println(String.format("Status: %s", downloadStatus.getStatus()));
System.out.println(String.format("TrackingId: %s\n", downloadStatus.getTrackingId()));
```
```python
request_id = RequestIdGoesHere

bulk_download_operation = BulkDownloadOperation(
    request_id = request_id, 
    authorization_data = authorization_data, 
    poll_interval_in_milliseconds = 5000,
    environment = ENVIRONMENT
)

# Use track() to indicate that the application should wait to ensure that the download status is completed.
# You may optionally cancel the track() operation after a specified time interval.
bulk_operation_status = bulk_download_operation.track(timeout_in_milliseconds=3600000)

result_file_path = bulk_download_operation.download_result_file(
    result_file_directory = FILE_DIRECTORY, 
    result_file_name = DOWNLOAD_FILE_NAME, 
    decompress = True, 
    overwrite = True, # Set this value true if you want to overwrite the same file.
    timeout_in_milliseconds=3600000 # You may optionally cancel the download after a specified time interval.
) 

print("Download result file: {0}\n".format(result_file))
print("Status: {0}\n".format(bulk_operation_status.status))
```

## <a name="poll-retry"></a>Poll and Retry
Poll for download and upload results at reasonable intervals. You know your data better than anyone. For example if you download an account that is well less than one million keywords, consider polling at 5 to 20 second intervals. If the account contains about one million keywords, consider polling at one minute intervals after waiting five minutes. For accounts with about four million keywords, consider polling at one minute intervals after waiting 10 minutes. 

The *BulkServiceManager* automatically polls for the result file in 1000 millisecond intervals for the first five attempts, and that behavior is not configurable. The *StatusPollIntervalInMilliseconds* property determines the time interval between each polling attempt after the initial five attempts. For an example please see [Background Completion](#backgroundcompletion) above. The default value is 5000, so if you do not set this value the *BulkServiceManager* will poll in the following sequence of minutes: 1, 2, 3, 4, 5, 10, 15, 20, and so on. If you set this value to 10000, the *BulkServiceManager* will poll in the following sequence: 1, 2, 3, 4, 5, 15, 25, 35, and so on. The minimum poll interval is 1000, and if you specify a value less than 1000 an exception will be thrown.

The *BulkServiceManager* will automatically retry upload, download, and polling operations up to the maximum timeout duration that you set. You can set the maximum retry timeout duration. If no timeout is specified, the *BulkServiceManager* will continue to retry until the server returns a timeout or internal error. Separately, if you are uploading or downloading large files, you should consider setting the *UploadHttpTimeout* or *DownloadHttpTimeout* properties. 

## <a name="workingdirectory"></a>Working Directory and BulkServiceManager
With the Bing Ads .NET and Java SDKs, you can set the working directory where *BulkServiceManager* should store temporary bulk files. For example, when you download entities with the Bing Ads .NET SDK, although you will only directly work with *BulkEntity* objects a bulk file is downloaded to the working directory. Likewise when you upload entities, a temporary file is written to the working directory, and then uploaded to the Bulk service. The system temporary directory will be used if another working directory is not specified. 

If you are using a hosted service such as Microsoft Azure you'll want to ensure you do not exceed the temp directory limits. There may be other reasons to use a custom working directory. You can specify a different working directory for each *BulkServiceManager* instance by setting the *WorkingDirectory* property. You are also responsible for creating and removing any directories. After you have iterated over the bulk entities you can clean up the files from the working directory.

> [!IMPORTANT] 
> The *CleanupTempFiles* method removes all files (but not any sub-directories) within the working directory, whether or not the files were created by the current *BulkServiceManager* instance. 

```csharp
public async Task RunAsync(AuthorizationData authorizationData)
{
    var bulkServiceManager = new BulkServiceManager(authorizationData);

    var progress = new Progress<BulkOperationProgressInfo>(x =>
        Console.WriteLine(String.Format("{0} % Complete", x.PercentComplete.ToString(CultureInfo.InvariantCulture)))
    );

    var downloadParameters = new DownloadParameters
    {
        CampaignIds = null,
        DataScope = DataScope.EntityData,
        Entities = DownloadEntity.Keywords,
        FileType = DownloadFileType.Csv,
        LastSyncTimeInUTC = null,
        ResultFileDirectory = FileDirectory,
        ResultFileName = ResultFileName,
        OverwriteResultFile = false    // Set this value true if you want to overwrite the same file.
    };

    // The system temp directory will be used if another working directory is not specified. If you are 
    // using a hosted service such as Microsoft Azure you'll want to ensure you do not exceed the file or directory limits. 
    // You can specify a different working directory for each BulkServiceManager instance.

    bulkServiceManager.WorkingDirectory = FileDirectory;

    // The DownloadEntitiesAsync method returns IEnumerable<BulkEntity>, so the download file will not
    // be accessible e.g. for CleanupTempFiles until you iterate over the result e.g. via ToList().

    var resultEntities = (await bulkServiceManager.DownloadEntitiesAsync(
        downloadParameters
    )).ToList();

    // The CleanupTempFiles method removes all files (but not sub-directories) within the working directory, 
    // whether or not the files were created by this BulkServiceManager instance. 

    bulkServiceManager.CleanupTempFiles();
}
```
```java
BulkServiceManager bulkServiceManager = new BulkServiceManager(authorizationData);

Progress<BulkOperationProgressInfo> progress = new Progress<BulkOperationProgressInfo>() {
    @Override
    public void report(BulkOperationProgressInfo value) {
        System.out.println(value.getPercentComplete() + "% Complete\n");
    }
};

DownloadParameters downloadParameters = new DownloadParameters();
downloadParameters.setCampaignIds(null);
ArrayList<DataScope> dataScope = new ArrayList<DataScope>();
dataScope.add(DataScope.ENTITY_DATA);
downloadParameters.setDataScope(dataScope);
downloadParameters.setFileType(FileType);
downloadParameters.setLastSyncTimeInUTC(null);
ArrayList<DownloadEntity> bulkDownloadEntities = new ArrayList<DownloadEntity>();
bulkDownloadEntities.add(DownloadEntity.KEYWORDS);
downloadParameters.setEntities(bulkDownloadEntities);
downloadParameters.setResultFileDirectory(new File(FileDirectory));
downloadParameters.setResultFileName(ResultFileName);
downloadParameters.setOverwriteResultFile(true);    // Set this value true if you want to overwrite the same file.

// The system temp directory will be used if another working directory is not specified. If you are 
// using a cloud service such as Microsoft Azure you'll want to ensure you do not exceed the file or directory limits. 
// You can specify a different working directory for each BulkServiceManager instance.

bulkServiceManager.setWorkingDirectory(new File(FileDirectory));

// The downloadEntitiesAsync method returns BulkEntityIterable, so the download file will not
// be accessible e.g. for cleanupTempFiles until you iterate over the result and close the BulkEntityIterable instance.

BulkEntityIterable tempEntities = bulkServiceManager.downloadEntitiesAsync(
    downloadParameters,
    null,
    null
).get();

ArrayList<BulkEntity> resultEntities = new ArrayList<BulkEntity>();
for (BulkEntity entity : tempEntities) {
    resultEntities.add(entity);
}

tempEntities.close();

// The cleanupTempFiles method removes all files (not sub-directories) within the working directory, 
// whether or not the files were created by this BulkServiceManager instance. 

bulkServiceManager.cleanupTempFiles();
```

## See Also
[Sandbox](sandbox.md)  
[Bing Ads API Code Examples](code-examples.md)    
[Bing Ads API Web Service Addresses](web-service-addresses.md)  

