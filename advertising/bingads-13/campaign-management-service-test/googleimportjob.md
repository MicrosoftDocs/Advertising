---
title: GoogleImportJob Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a Google import job that can be run once or scheduled on a recurring basis.(test)
---
# GoogleImportJob Data Object Test - Campaign Management
Defines a Google import job that can be run once or scheduled on a recurring basis. 

> [!NOTE]
>
> * **Starting February 1, 2023, you'll no longer be able to import expanded text ads from Google Ads**. Any expanded text ads imported before then can be re-imported and we'll continue to import status changes (e.g., pause, unpause) from Google Ads.
> * [Learn more about this change](https://about.ads.microsoft.com/en-us/blog/post/august-2022/you-have-5-additional-months-to-migrate-to-responsive-search-ads-deadline-extended-to-february-1-2023).  

An account can have up to 100 scheduled Google import jobs.  

> [!TIP]
> For an implementation overview, see the [Google Ads Import](../guides/google-ads-import.md) technical guide.

# [XML](#tab/xml)

```xml
<xs:complexType name="GoogleImportJob" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:ImportJob">
      <xs:sequence>
        <xs:element minOccurs="0" name="CampaignAdGroupIds" nillable="true" type="tns:ArrayOfCampaignAdGroupIds" />
        <xs:element name="CredentialId" nillable="true" type="xs:string" />
        <xs:element name="GoogleAccountId" nillable="true" type="xs:long" />
        <xs:element minOccurs="0" name="GoogleUserName" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "CreatedByUserId": "ValueHere",
  "CreatedByUserName": "ValueHere",
  "CreatedDateTimeInUTC": "ValueHere",
  "Frequency": {
    "Cron": "ValueHere",
    "TimeZone": "ValueHere",
    "Type": "ValueHere"
  },
  "Id": "ValueHere",
  "ImportOption": {
    "ForwardCompatibilityMap": [
      {
        "key": "ValueHere",
        "value": "ValueHere"
      }
    ],
    "Type": "GoogleImportOption",
    "AccountUrlOptions": "ValueHere",
    "AdjustmentForBids": "ValueHere",
    "AdjustmentForCampaignBudgets": "ValueHere",
    "AdScheduleUseSearcherTimezone": "ValueHere",
    "AssociatedStoreId": "ValueHere",
    "AssociatedUetTagId": "ValueHere",
    "AutoDeviceBidOptimization": "ValueHere",
    "DeleteRemovedEntities": "ValueHere",
    "EnableAutoCurrencyConversion": "ValueHere",
    "EnableParentLocationMapping": "ValueHere",
    "NewAccountNegativeKeywords": "ValueHere",
    "NewActiveAdsForExistingAdGroups": "ValueHere",
    "NewActiveCampaignsAndChildEntities": "ValueHere",
    "NewAdCustomizerFeeds": "ValueHere",
    "NewAdGroupsAndChildEntitiesForExistingCampaigns": "ValueHere",
    "NewAdSchedules": "ValueHere",
    "NewAppAdExtensions": "ValueHere",
    "NewAudienceTargets": "ValueHere",
    "NewCallAdExtensions": "ValueHere",
    "NewCalloutAdExtensions": "ValueHere",
    "NewConversionGoals": "ValueHere",
    "NewDemographicTargets": "ValueHere",
    "NewDeviceTargets": "ValueHere",
    "NewEntities": "ValueHere",
    "NewImageAdExtensions": "ValueHere",
    "NewKeywordsForExistingAdGroups": "ValueHere",
    "NewKeywordUrls": "ValueHere",
    "NewLabels": "ValueHere",
    "NewLeadFormAdExtensions": "ValueHere",
    "NewLocationAdExtensions": "ValueHere",
    "NewLocationTargets": "ValueHere",
    "NewLogoAdExtensions": "ValueHere",
    "NewNegativeKeywordLists": "ValueHere",
    "NewNegativeKeywordsForExistingParents": "ValueHere",
    "NewNegativeSites": "ValueHere",
    "NewPageFeeds": "ValueHere",
    "NewPausedAdsForExistingAdGroups": "ValueHere",
    "NewPausedCampaignsAndChildEntities": "ValueHere",
    "NewPriceAdExtensions": "ValueHere",
    "NewProductFilters": "ValueHere",
    "NewPromotionAdExtensions": "ValueHere",
    "NewReviewAdExtensions": "ValueHere",
    "NewSitelinkAdExtensions": "ValueHere",
    "NewStructuredSnippetAdExtensions": "ValueHere",
    "NewUrlOptions": "ValueHere",
    "PauseAIMAdGroupIfAllAudienceCriterionNotImported": "ValueHere",
    "PauseCampaignsWithoutSupportedLocations": "ValueHere",
    "PauseNewCampaigns": "ValueHere",
    "RaiseBidsToMinimum": "ValueHere",
    "RaiseCampaignBudgetsToMinimum": "ValueHere",
    "RaiseProductGroupBidsToMinimum": "ValueHere",
    "RenameCampaignNameWithSuffix": "ValueHere",
    "SearchAndDsaMixedCampaignAsSearchCampaign": "ValueHere",
    "SearchAndReplaceForCampaignNames": {
      "ReplaceString": "ValueHere",
      "SearchString": "ValueHere"
    },
    "SearchAndReplaceForCustomParameters": {
      "ReplaceString": "ValueHere",
      "SearchString": "ValueHere"
    },
    "SearchAndReplaceForFinalURLSuffix": {
      "ReplaceString": "ValueHere",
      "SearchString": "ValueHere"
    },
    "SearchAndReplaceForTrackingTemplates": {
      "ReplaceString": "ValueHere",
      "SearchString": "ValueHere"
    },
    "SearchAndReplaceForUrls": {
      "ReplaceString": "ValueHere",
      "SearchString": "ValueHere"
    },
    "SuffixForCampaignNames": "ValueHere",
    "SuffixForTrackingTemplates": "ValueHere",
    "SuffixForUrls": "ValueHere",
    "UpdateAccountNegativeKeywords": "ValueHere",
    "UpdateAdCustomizerAttributes": "ValueHere",
    "UpdateAdCustomizerFeeds": "ValueHere",
    "UpdateAdGroupNetwork": "ValueHere",
    "UpdateAdSchedules": "ValueHere",
    "UpdateAdUrls": "ValueHere",
    "UpdateAppAdExtensions": "ValueHere",
    "UpdateAudienceTargets": "ValueHere",
    "UpdateBiddingStrategies": "ValueHere",
    "UpdateBids": "ValueHere",
    "UpdateCallAdExtensions": "ValueHere",
    "UpdateCalloutAdExtensions": "ValueHere",
    "UpdateCampaignAdGroupLanguages": "ValueHere",
    "UpdateCampaignBudgets": "ValueHere",
    "UpdateCampaignNames": "ValueHere",
    "UpdateConversionGoals": "ValueHere",
    "UpdateDemographicTargets": "ValueHere",
    "UpdateDeviceTargets": "ValueHere",
    "UpdateEntities": "ValueHere",
    "UpdateImageAdExtensions": "ValueHere",
    "UpdateKeywordUrls": "ValueHere",
    "UpdateLabels": "ValueHere",
    "UpdateLeadFormAdExtensions": "ValueHere",
    "UpdateLocationAdExtensions": "ValueHere",
    "UpdateLocationTargets": "ValueHere",
    "UpdateLogoAdExtensions": "ValueHere",
    "UpdateNegativeKeywordLists": "ValueHere",
    "UpdateNegativeSites": "ValueHere",
    "UpdatePageFeeds": "ValueHere",
    "UpdatePriceAdExtensions": "ValueHere",
    "UpdateProductFilters": "ValueHere",
    "UpdatePromotionAdExtensions": "ValueHere",
    "UpdateReviewAdExtensions": "ValueHere",
    "UpdateSitelinkAdExtensions": "ValueHere",
    "UpdateSitelinkUrls": "ValueHere",
    "UpdateStatusForAdGroups": "ValueHere",
    "UpdateStatusForAds": "ValueHere",
    "UpdateStatusForCampaigns": "ValueHere",
    "UpdateStatusForKeywords": "ValueHere",
    "UpdateStructuredSnippetAdExtensions": "ValueHere",
    "UpdateUrlOptions": "ValueHere"
  },
  "LastRunTimeInUTC": "ValueHere",
  "Name": "ValueHere",
  "NotificationEmail": "ValueHere",
  "NotificationType": "ValueHere",
  "Status": "ValueHere",
  "Type": "GoogleImportJob",
  "CampaignAdGroupIds": [
    {
      "ActiveAdGroupsOnly": "ValueHere",
      "AdGroupIds": [
        "ValueHere"
      ],
      "CampaignId": "ValueHere"
    }
  ],
  "CredentialId": "ValueHere",
  "GoogleAccountId": "ValueHere",
  "GoogleUserName": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [GoogleImportJob](googleimportjob.md) object has the following elements: [CampaignAdGroupIds](#campaignadgroupids), [CredentialId](#credentialid), [GoogleAccountId](#googleaccountid), [GoogleUserName](#googleusername).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="campaignadgroupids"></a>CampaignAdGroupIds|The list of campaigns and their ad groups to import from Google Ads.<br/><br/>The identifiers are saved but not validated when you create an import job. If you include invalid campaign or ad group IDs, or if they become invalid e.g., the entities are deleted later from Google Ads, the invalid entities will be skipped during import.<br/><br/>**Add:** Optional. If this element is not set, then all of the campaigns and ad groups in the [Google Ads account](#googleaccountid) are eligible for import. The set of imported entities also depends on your [import options](#importoption).<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[CampaignAdGroupIds](campaignadgroupids.md) array|
|<a name="credentialid"></a>CredentialId|Authorizes a Google Ads user to import accounts to Microsoft Advertising.<br/><br/>This element is not returned when you get the [GoogleImportJob](googleimportjob.md).<br/><br/>See the [Get an Import Credential ID](../guides/google-ads-import.md#get-credentialid) guide for more details.<br/><br/>**Add:** Required<br/>**Update:** Read-only|**string**|
|<a name="googleaccountid"></a>GoogleAccountId|The Google Ads account to import.<br/><br/>**Add:** Required<br/>**Update:** Read-only|**long**|
|<a name="googleusername"></a>GoogleUserName|The Google account i.e., the Google user credentials with access to the Google Ads [account](#googleaccountid).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

The [GoogleImportJob](googleimportjob.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsimportjob"></a>Inherited Elements from ImportJob
The [GoogleImportJob](googleimportjob.md) object derives from the [ImportJob](importjob.md) object, and inherits the following elements: [CreatedByUserId](#createdbyuserid), [CreatedByUserName](#createdbyusername), [CreatedDateTimeInUTC](#createddatetimeinutc), [Frequency](#frequency), [Id](#id), [ImportOption](#importoption), [LastRunTimeInUTC](#lastruntimeinutc), [Name](#name), [NotificationEmail](#notificationemail), [NotificationType](#notificationtype), [Status](#status), [Type](#type). The descriptions below are specific to [GoogleImportJob](googleimportjob.md), and might not apply to other objects that inherit the same elements from the [ImportJob](importjob.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="createdbyuserid"></a>CreatedByUserId|The unique identifier of the Microsoft Advertising user who created the import job.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**long**|
|<a name="createdbyusername"></a>CreatedByUserName|The login user name of the Microsoft Advertising user who created the import job.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|
|<a name="createddatetimeinutc"></a>CreatedDateTimeInUTC|The date and time when the import job was created.<br/><br/>The date and time is expressed in Coordinated Universal Time (UTC).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**dateTime**|
|<a name="frequency"></a>Frequency|Determines whether the import job should be run once or scheduled on a recurring basis.<br/><br/>To run the import job now, this element must be nil or empty.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[Frequency](frequency.md)|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the import job.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**long**|
|<a name="importoption"></a>ImportOption|The Google import options that are available via API.<br/><br/>To customize Google import options, you can include a [GoogleImportOption](googleimportoption.md) object. Otherwise to use the default Google import options, you can leave this element nil or empty. For more information about default options, see [GoogleImportOption](googleimportoption.md).<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[ImportOption](importoption.md)|
|<a name="lastruntimeinutc"></a>LastRunTimeInUTC|The most recent import date and time for this job.<br/><br/>The date and time is expressed in Coordinated Universal Time (UTC).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**dateTime**|
|<a name="name"></a>Name|The name of the import job.<br/><br/>The name can be between 1 to 255 characters in length.<br/><br/>**Add:** Required<br/>**Update:** Read-only|**string**|
|<a name="notificationemail"></a>NotificationEmail|The email address where import results should be sent.<br/><br/>This element is not returned by default. To get this element, include the NotificationEmail value in the ReturnAdditionalFields element when you call the [GetImportJobsByIds](getimportjobsbyids.md#returnadditionalfields) and [GetImportResults](getimportresults.md#returnadditionalfields) service operations.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="notificationtype"></a>NotificationType|Determines whether and how often you want to receive email notifications about the import job results.<br/><br/>The supported values are "None" (No emails), "Changes" (Only if there are changes or errors), "Errors" (Only if there are errors), and "EveryTime" (Every time this import runs).<br/><br/>**Add:** Optional. If not set, the service sets this element to "None" by default.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="status"></a>Status|The status of the import job.<br/><br/>The possible values are *Active*, *Pause* and *Deleted*. Scheduled imports will have an *Active* status, whether the job is scheduled once or on a recurring basis in the future. Paused import jobs will have a *Pause* status. The status of import jobs that only run once will be set to *Deleted* after the import.<br/><br/>**Add:** Read-only<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="type"></a>Type|The type of the import job.<br/><br/>This value is *GoogleImportJob* when you retrieve a Google import job.<br/><br/>For more information about import job types, see the [ImportJob Data Object Remarks](importjob.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  
