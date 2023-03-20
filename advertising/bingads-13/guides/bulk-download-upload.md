---
title: "Bulk Download and Upload"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Download and upload high volume campaign settings asynchronously in the background.
---
# Bulk Download and Upload
With the [bulk service](../bulk-service/bulk-service-reference.md) you can download and upload campaign settings asynchronously in the background. The Bulk service is recommended for managing large scale data, especially if you need to add or update ads and keywords across multiple ad groups or campaigns in an account. For some entities you may also download bid suggestions and quality score data. Each record can be uploaded successfully whether or not other records in the same file contain errors. For information about the schema used for the download and upload file, including details about which entities, bid suggestions, and quality score data are available, see [Bulk File Schema](../bulk-service/bulk-file-schema.md).

> [!IMPORTANT]
> New record types (rows) and fields (columns) may be added anytime, and you should not depend on record or field order in the bulk download or bulk upload results file. Likewise, unless otherwise noted in the reference documentation you should not depend on a fixed set of values returned in each field.  

If you are using a .NET language, Java, or Python, you should use the [Bing Ads API Client Libraries](client-libraries.md). The .NET, Java, and Python SDKs abstract the low level details described below. For example instead of calling [DownloadCampaignsByAccountIds](../bulk-service/downloadcampaignsbyaccountids.md) and [GetBulkDownloadStatus](../bulk-service/getbulkdownloadstatus.md) to download a file, you can use one method with the *BulkServiceManager* class. For more information about using Bulk download and upload with the SDKs, see [Bulk Service Manager](sdk-bulk-service-manager.md).

## <a name="bulkdownload"></a>Bulk Download
To download an account's campaign data, call the [DownloadCampaignsByAccountIds](../bulk-service/downloadcampaignsbyaccountids.md) operation. To download the data of specific campaigns, call the [DownloadCampaignsByCampaignIds](../bulk-service/downloadcampaignsbycampaignids.md) operation.

### Downloading a Bulk File
You may request all of the campaign's data or only the data that has changed since the last time you downloaded the campaign's data. For either download operation, the following is an overview of the request settings and download workflow.

> [!IMPORTANT]
> You must use the same user credentials for the download request operation (either [DownloadCampaignsByAccountIds](../bulk-service/downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](../bulk-service/downloadcampaignsbycampaignids.md)) and the [GetBulkDownloadStatus](../bulk-service/getbulkdownloadstatus.md) polling operation.
   
1. Set the *DataScope* element of the request and specify whether to include bid suggestions or quality score data in addition to entity data. For a list of possible values, see the [DataScope](../bulk-service/datascope.md) value set.

2. Set the *DownloadFileType* element of the request to select either **Csv** or **Tsv** for the format of the download file.

   > [!NOTE]
   > The downloaded **Csv** or **Tsv** file will be either ZIP or GZIP compressed depending on the *CompressionType* that you specified. ZIP is the default if you did not specify *CompressionType*.

3. Set the *Entities* element of the request to include your campaign, ad group, ad, and keyword entities. You may optionally include additional entities such as negative keywords and targets in the download. For a list of entities that you may request, see the [DownloadEntity](../bulk-service/downloadentity.md) value set.

4. Set the *LastSyncTimeInUTC* element of the request to the time stamp of the previous download to request only those entities that have been updated or deleted since the last download.

   > [!NOTE]
   > If this is the first time that you are requesting a download for the specified entities, set the *LastSyncTimeInUTC* element of the request to NULL to download all available entities.

5. Submit the download request with either the [DownloadCampaignsByAccountIds](../bulk-service/downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](../bulk-service/downloadcampaignsbycampaignids.md) operation.

6. The download request returns an identifier that you pass to the [GetBulkDownloadStatus](../bulk-service/getbulkdownloadstatus.md) operation. You call the [GetBulkDownloadStatus](../bulk-service/getbulkdownloadstatus.md) operation in a loop until the download completes or fails. The length of time that it takes the download to complete depends on a number of variables, such as the number of campaigns that you requested and the number of requests that are already in the queue. Because of these variables, the polling interval that you use may vary. You have two days to download the file from the time you submit the download request. If you have not successfully downloaded the file within this period, it is removed from the download site and you will need to call one of the download operations again.

7. When the [GetBulkDownloadStatus](../bulk-service/getbulkdownloadstatus.md) operation completes successfully, it returns the URL of the download file. Use the URL to copy the download file locally. The URL must be used within five minutes of the time that the [GetBulkDownloadStatus](../bulk-service/getbulkdownloadstatus.md) operation returns a *Success* status code. If you do not start the download within this period of time, you will need to call [GetBulkDownloadStatus](../bulk-service/getbulkdownloadstatus.md) again to get a new URL.

8. The download file is compressed in zip format, so you must unzip the file to access the data. For information about the schema used for the download file, see [Bulk File Schema](../bulk-service/bulk-file-schema.md).

### <a name="downloadbestpractices"></a>Download Best Practices
Please adhere to the best practices to ensure fair usage for yourself and all Microsoft Advertising clients.

> [!IMPORTANT]
> Whereas exact concurrent download and upload limits are subject to change, the number of pending requests that you have submitted is limited. If you observe the 4204 BulkServiceNoMoreCallsPermittedForTheTimePeriod error, you can resubmit your request after waiting up to 15 minutes depending on the frequency and size of the requests that you submitted. For more information see [Bulk API Throttling](services-protocol.md#throttling-bulk).

- Request only those bulk download entities that you require. New record types (rows) and fields (columns) may be added anytime, and you should not depend on record or field order in the bulk download or bulk upload results file.

- Perform a full download one time only. Thereafter, perform delta downloads. Set the *LastSyncTimeInUTC* to the time stamp of the last download. The download file contains the time stamp of the download in the *SyncTime* column of the *Account* record. There is no advantage to performing a full download every time and it decreases everyone's performance including yours.

- Poll for downloads at reasonable intervals. You know your data better than anyone. If you download an account that is well less than one million keywords, consider polling at 15 to 20 second intervals. If the account contains about one million keywords, consider polling at one minute intervals after waiting five minutes. For accounts with about four million keywords, consider polling at one minute intervals after waiting 10 minutes.

- Call the [DownloadCampaignsByCampaignIds](../bulk-service/downloadcampaignsbycampaignids.md) operation if the account contains more than four million keywords. Calling the [DownloadCampaignsByAccountIds](../bulk-service/downloadcampaignsbyaccountids.md) operation with an account that contains more than four million keywords will fail.

- You may want to include fewer campaigns in your [DownloadCampaignsByCampaignIds](../bulk-service/downloadcampaignsbycampaignids.md) request. Calling the [DownloadCampaignsByCampaignIds](../bulk-service/downloadcampaignsbycampaignids.md) operation with an account that contains more than eight million keywords will fail. Requests that specify fewer campaigns per call typically complete sooner than calls that specify the maximum number allowed.

## <a name="bulkupload"></a>Bulk Upload
You can submit your bulk upload file with HTTP POST to a Url provided by the bulk service.

> [!NOTE]
> The file size limit for upload in production is 100MB and up to 4 million rows. For [Sandbox](sandbox.md) the limit is 20K rows.

For information about the schema you should use for the upload file, see [Bulk File Schema](../bulk-service/bulk-file-schema.md).

### <a name="uploading"></a>Uploading a Bulk File
The following is an overview of the request settings and upload workflow.
  > [!IMPORTANT]
  > You must use the same user credentials throughout the [GetBulkUploadUrl](../bulk-service/getbulkuploadurl.md), HTTP POST, and [GetBulkUploadStatus](../bulk-service/getbulkuploadstatus.md) workflow. 

1. Set the *AccountId* element of the [GetBulkUploadUrl](../bulk-service/getbulkuploadurl.md) request to the account identifier corresponding to the data that will be uploaded.

2. Set the *ResponseMode* element of the [GetBulkUploadUrl](../bulk-service/getbulkuploadurl.md) request to specify whether the service should return errors and their corresponding data, or only the errors in the results file. For more information, see [ResponseMode](../bulk-service/responsemode.md).

3. Use the *UploadUrl* returned with the [GetBulkUploadUrl](../bulk-service/getbulkuploadurl.md) response to submit your bulk upload file with HTTP POST. The content type must be *multipart/form-data*. UTF-8 files must include the byte order mark (BOM). The ZIP-compressed upload should contain one file formatted as either **Csv** or **Tsv**. The ZIP file must be properly structured, including an end of central directory record.

   > [!NOTE]
   > The HTTP standard Authorization header is not used. To authenticate you must add and set the Microsoft Advertising custom header elements of your HTTP client, including the *DeveloperToken*, *CustomerId*, and *CustomerAccountId* headers. You must also set the user credentials via the *AuthenticationToken* header element. For more information, see [Authentication with OAuth](authentication-oauth.md) and [Where to Use the API Credentials](get-started.md#where-to-use).
   >
   > You must use the same user credentials throughout the [GetBulkUploadUrl](../bulk-service/getbulkuploadurl.md), HTTP POST, and [GetBulkUploadStatus](../bulk-service/getbulkuploadstatus.md) workflow. 

   Here is an example.

   ```http
   POST <UploadUrl> HTTP/1.1
   AuthenticationToken: <AuthenticationToken>
   DeveloperToken: <DeveloperToken>
   CustomerId: <CustomerId>
   AccountId: <AccountId>
   Content-Type: multipart/form-data;
   ```

4. Check the HTTP response status code. If the HTTP response status code is 200, then the file was received successfully by Microsoft Advertising. If the HTTP response status code is 401, then authentication failed e.g. *AuthenticationToken* or *DeveloperToken* was invalid. If the HTTP response status code is 400, then you should also check the response stream for [Bing Ads API Operation Error Codes](operation-error-codes.md) for example, in the range of 3220 - 3227. 

   Here is an example error response message that the URL had already been used to upload a bulk file.
   ```http
   HTTP/1.1 400 Bad Request
   Cache-Control: private
   Content-Type: application/json; charset=utf-8
   Server: Microsoft-IIS/8.0
   X-AspNetMvc-Version: 3.0
   X-AspNet-Version: 4.0.30319
   X-Powered-By: ASP.NET
   Date: Tue, 12 Jan 2016 17:07:23 GMT
   Content-Length: 224

   {"TrackingId":"16bd93cc-22fb-4d3c-94be-25adefd06fae","RequestId":"26c3fbf6-3e24-4569-ada3-d4e8b3d0aecc","Code":3224,"ErrorCode":"BulkServiceUrlAlreadyUsedForUpload","Message":"The URL has already been used for file upload."}
   ```

5. The [GetBulkUploadUrl](../bulk-service/getbulkuploadurl.md) response also includes a *RequestId* that you pass to the [GetBulkUploadStatus](../bulk-service/getbulkuploadstatus.md) operation. While the upload is pending, you may call the [GetBulkUploadStatus](../bulk-service/getbulkuploadstatus.md) operation in a loop until the upload completes or fails. You have fifteen minutes to download the upload results file from the time you submit the upload request. If you have not successfully downloaded the file within this period, it is removed from the download site and it may not be retrieved. If you miss this window of opportunity, you could call one of the download operations to get the latest entity data. 

6. When the [GetBulkUploadStatus](../bulk-service/getbulkuploadstatus.md) operation completes successfully, it returns the URL of the upload results file. Use the URL to copy the results file locally. The URL must be used within fifteen minutes of the time that the [GetBulkUploadStatus](../bulk-service/getbulkuploadstatus.md) operation returns the *Completed* status response string. If you do not start the download within this period of time, you will need to call [GetBulkUploadStatus](../bulk-service/getbulkuploadstatus.md) again to get a new URL.

   > [!NOTE]
   > The format of the upload result file will be either **Csv** or **Tsv**, and will match the format of the file that you submitted for upload.

### <a name="uploadbestpractices"></a>Upload Best Practices
Please adhere to the best practices to ensure fair usage for yourself and all Microsoft Advertising clients.

> [!IMPORTANT]
> Whereas exact concurrent download and upload limits are subject to change, the number of pending requests that you have submitted is limited. If you observe the 4204 BulkServiceNoMoreCallsPermittedForTheTimePeriod error, you can resubmit your request after waiting up to 15 minutes depending on the frequency and size of the requests that you submitted. For more information see [Bulk API Throttling](services-protocol.md#throttling-bulk).

- Large files can degrade the upload performance. It is optional and recommended that the file be compressed for upload. If compressed it must be formatted as ZIP with the corresponding extension. The file size limit for upload in production is 100MB and up to 4 million rows. For [Sandbox](sandbox.md) the limit is 20K rows. If you can limit concurrent uploads per customer below 5 or 6, then consider splitting the file rather than approaching the file size limit.

- Limit concurrent uploads to 5 or 6 per customer to upload files in parallel. Wait on each thread until the previous file was processed, and then you can reuse the thread to upload another file. For example, one thread can upload a file and after the upload status is either *Completed*, *CompletedWithErrors*, or *Failed* that thread can upload another file. 

- Upload only the entities and fields that you are adding or updating. If supplied, read-only fields such as bid suggestions and quality score data will be ignored. 

- Upload one entity type per file to maximize performance. There are some exceptions e.g., when creating new campaigns, ads, and keywords it can be more efficient to upload them together with [reference keys](../bulk-service/bulk-file-schema.md#referencekeys). As another example, if you are only updating 10 campaigns, 500 ads, and 800 keywords, then you can include them in one upload rather than splitting uploads per type. 

- Consider whether you need to request errors and results (*ResponseMode = ErrorsAndResults*) in the upload results file, or whether errors only (*ResponseMode = ErrorsOnly*) will suffice. Consider whether or not you should synchronize the results with your local data. For example if you are updating entities you might only need to know whether any errors occurred, and in that case you can specify *ResponseMode = ErrorsOnly* in the [GetBulkUploadUrl](../bulk-service/getbulkuploadurl.md) request. If you are adding new entities then you can specify *ResponseMode = ErrorsAndResults* in the [GetBulkUploadUrl](../bulk-service/getbulkuploadurl.md) request to receive the resulting entity identifiers.

- For partial retry attempts, do not upload the entire file if only a subset of the records resulted in errors. Only upload the records that you want to retry. 

- Do not retry until the upload status is either *Completed*, *CompletedWithErrors*, or *Failed*. If by chance performance does not meet expectations, please wait for the result anyways. 

- Poll for upload results at reasonable intervals. Initially you should wait one minute for every 10K rows uploaded. After the initial wait time, consider polling in one minute intervals.

## See Also
[Bulk Service Reference](../bulk-service/bulk-service-reference.md)  
[Bing Ads API Web Service Addresses](web-service-addresses.md)

