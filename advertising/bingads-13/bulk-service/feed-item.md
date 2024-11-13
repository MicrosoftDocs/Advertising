---
title: "Feed Item Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Describes the Feed Item fields in a Bulk file.
dev_langs:
  - csharp
---
# Feed Item Record - Bulk
Defines a feed item that can be downloaded and uploaded in a bulk file.

> [!TIP]
> For an overview of how to use feeds and feed items, see the [Ad Customizer Feeds](../guides/ad-customizer-feeds.md),  [Auto Inventory Feeds](../guides/auto-inventory-feeds.md) and [Page Feeds](../guides/page-feeds.md) technical guides.

> [!NOTE]
>
> * **Upgrade your expanded text ads to responsive search ads by February 1, 2023**. After this date, you will no longer be able to create new or edit existing expanded text ads. For more information, see [About responsive search ads](https://help.ads.microsoft.com/#apex/ads/en/60037/0).
> * Your scheduled feeds will continue to run and existing expanded text ads using ad customizer feeds will continue to serve. You'll be able to view reports on their performance.
> * You'll still be able to pause, run, or remove your existing ad customizer feeds. Otherwise, attempts to create or edit existing ad customizers for expanded text ads will result in a `CustomerNotEligibleForAdCustomizersFeed` error.
> * [Learn more about this change](https://about.ads.microsoft.com/en-us/blog/post/august-2022/you-have-5-additional-months-to-migrate-to-responsive-search-ads-deadline-extended-to-february-1-2023).

If you are creating new parent and child entities in the same Bulk file, the dependent records must be included after dependencies according to hierarchy:  

1. [Feed](feed.md)
1. [Campaign](campaign.md)
1. [Ad Group](ad-group.md)
1. [Feed Item](feed-item.md)

You can have 100 feeds per account (this maximum number includes all feed types) and the maximum number of feed items (rows) per account is 5 million.

You can download all *Feed Item* records in the account by including the [DownloadEntity](downloadentity.md) value of *FeedItems* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new page feed and ad customizer [Feed](feed.md) with one feed item for each. 

```csv
Type,Status,Id,Parent Id,Sub Type,Campaign,Ad Group,Target Campaign Id,Target Ad Group Id,Client Id,Modified Time,Start Date,End Date,Device Preference,Keyword,Match Type,Target,Physical Intent,Name,Ad Schedule,Audience Id,Feed Name,Custom Attributes
Format Version,,,,,,,,,,,,,,,,,,6,,,,
Feed,Active,-20,,PageFeed,,,,,PageFeedClientIdGoesHere,,,,,,,,,,,,MyPageFeedName,"[{""name"":""Page Url"",""feedAttributeType"":""Url"",""isPartOfKey"":true},{""name"":""Custom Label"",""feedAttributeType"":""StringList""},{""name"":""Ad Title"",""feedAttributeType"":""String""}]"
Feed,Active,-21,,AdCustomizerFeed,,,,,AdCustomizerFeedClientIdGoesHere,,,,,,,,,,,,MyAdCustomizerFeedName,"[{""name"":""DateTimeName"",""feedAttributeType"":""DateTime""},{""name"":""Int64Name"",""feedAttributeType"":""Int64""},{""name"":""PriceName"",""feedAttributeType"":""Price""},{""name"":""StringName"",""feedAttributeType"":""String"",""isPartOfKey"":true}]"
Feed,Active,123456789,DynamicDataAutoListingFeedNew,CampaignName,AUTO ad group,-21,,DynamicDataAutosListingFeed,,"[{""name"":""Vehicle ID""},{""name"":""Final URL""},{""name"":""Image URL""},{""name"":""Make""},{""name"":""Model""},{""name"":""Price""},{""name"":""Title""},{""name"":""Target campaign""},{""name"":""Target ad group""},{""name"":""Latitude""},{""name"":""Longitude""},{""name"":""Mileage value""},{""name"":""Mileage unit""},{""name"":""Year""},{""name"":""Fuel type""},{""name"":""Transmission""},{""name"":""City""},{""name"":""VIN""},{""name"":""State of vehicle""}]"
Feed Item,Active,123456789,DynamicDataAutoListingFeedNew,CampaignName,AUTO ad group,,-21,,,"{""Vehicle Id"":""2g161290-1d13"",""""Final Url"""":""https:\/\/www.contoso.com\/used-Redmond1"",""Image Urls"":""https:\/\/www.contoso.com\/inventoryphotos\/01.jpg;https:\/\/www.contoso.com\/inventoryphotos\/02.jpg"",""Make"":""Contoso"",""Model"":""SUV"",""Price"":""65495.00 USD"",""Title"":""2020 SUV"",""Target campaign"":""CampaignName"",""Target ad group"":"""",""Latitude"":"""",""Logitude"":"""",""Mileage Value"":""13000"",""Mileage Unit"":""MI"",""Year"":""2020"",""Fuel Type"":"""",""Transmission"":"""",""City"":""Redmond"",""Vin"":""SALLJGML8HA004044"",""State of Vehicle"":""USED"",""Trim"":""HSE""}"
Feed Item,Active,-200,-20,,,,20;200,,2020/06/22 00:00:00,2020/06/30 00:00:00,,,,,,,,,,"{""Page Url"":""https://contoso.com/3001"",""Custom Label"":[""Label_1_3001"",""Label_2_3001""],""Ad Title"":""An ad title""}"
Feed Item,Active,-210,-21,,,,21;210,,2020/06/22 00:00:00,2020/06/30 00:00:00,,value,Broad,,PeopleIn,,(Sunday[09:00-17:00]),,,"{""DateTimeName"":""2020/06/22 00:00:00"",""Int64Name"":237601,""PriceName"":""$601"",""StringName"":""s237601""}"
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkFeedItem* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkFeedItem
var bulkAdCustomizerFeedItem = new BulkFeedItem
{
	// 'Parent Id' column header in the Bulk file
	FeedId = adCustomizerFeedIdKey,
	// 'Custom Attributes' column header in the Bulk file
	CustomAttributes = adCustomizerFeedItemCustomAttributesJson,
	// 'Id' column header in the Bulk file
	Id = null,
	// 'Target Ad Group Id' column header in the Bulk file
	AdGroupId = null,
	// 'Ad Group' column header in the Bulk file
	AdGroupName = null,
	// 'Audience Id' column header in the Bulk file
	AudienceId = null,
	// 'Target Campaign Id' column header in the Bulk file
	CampaignId = null,
	// 'Campaign' column header in the Bulk file
	CampaignName = null,
	// 'Ad Schedule' column header in the Bulk file
	DayTimeRanges = new[]
	{
		// Each day and time range is delimited by a semicolon (;) in the Bulk file
		// Within each day and time range the format is Day[StartHour:StartMinue-EndHour:EndMinute].
		new DayTime
		{
			Day = Day.Monday,
			StartHour = 9,
			StartMinute = Minute.Zero,
			EndHour = 21,
			EndMinute = Minute.Zero,
		},
	},
	// 'End Date' column header in the Bulk file
	EndDate = null,
	// 'Start Date' column header in the Bulk file
	StartDate = null,
	// 'Physical Intent' column header in the Bulk file
	IntentOption = IntentOption.PeopleIn,
	// 'Keyword' column header in the Bulk file
	Keyword = "insurance",
	// 'Target' column header in the Bulk file
	LocationId = 190,
	// 'Match Type' column header in the Bulk file
	MatchType = MatchType.Exact,
	// 'Device Preference' column header in the Bulk file
	DevicePreference = null,
	// 'Client Id' column header in the Bulk file
	ClientId = "ClientIdGoesHere",
	// 'Status' column header in the Bulk file
	Status = Status.Active
};

uploadEntities.Add(bulkAdCustomizerFeedItem);

// Map properties in the Bulk file to the BulkFeedItem
var bulkPageFeedItem = new BulkFeedItem
{
    // 'Parent Id' column header in the Bulk file
    FeedId = pageFeedIdKey,
    // 'Custom Attributes' column header in the Bulk file
    CustomAttributes = pageFeedItemCustomAttributesJson,
    // 'Id' column header in the Bulk file
    Id = null,
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",
    // 'Status' column header in the Bulk file
    Status = Status.Active
};

uploadEntities.Add(bulkPageFeedItem);

var entityUploadParameters = new EntityUploadParameters
{
    Entities = uploadEntities,
    ResponseMode = ResponseMode.ErrorsAndResults,
    ResultFileDirectory = FileDirectory,
    ResultFileName = DownloadFileName,
    OverwriteResultFile = true,
};

var uploadResultEntities = (await BulkServiceManager.UploadEntitiesAsync(entityUploadParameters)).ToList();
```

For a *Feed Item* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Ad Group](#adgroup)
- [Ad Schedule](#adschedule)
- [Audience Id](#audienceid)
- [Campaign](#campaign)
- [Client Id](#clientid)
- [Custom Attributes](#customattributes)
- [Device Preference](#devicepreference)
- [End Date](#enddate)
- [Id](#id)
- [Keyword](#keyword)
- [Match Type](#matchtype)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Physical Intent](#physicalintent)
- [Start Date](#startdate)
- [Status](#status)
- [Target](#target)
- [Target Ad Group Id](#targetadgroupid)
- [Target Campaign Id](#targetcampaignid)

## <a name="adgroup"></a>Ad Group
The name of the ad group used to target the feed item. If this field is set, the feed item will only be eligible for the specified ad group.  

> [!NOTE]
> This field is only applicable for ad customizer feeds. 

**Add:** Optional. If you include this field, then the [Campaign](#campaign) field must also be set, and the ad group must exist within the specified campaign. If both the [Ad Group](#adgroup) and [Target Ad Group Id](#targetadgroupid) fields are set, an error is returned for this record in the bulk file.  
**Update:** Optional. If you include this field, then the [Campaign](#campaign) field must also be set, and the ad group must exist within the specified campaign. If both the [Ad Group](#adgroup) and [Target Ad Group Id](#targetadgroupid) fields are set, an error is returned for this record in the bulk file. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.  
**Delete:** Read-only  

## <a name="adschedule"></a>Ad Schedule
The list of day and time ranges that you want the feed item to be displayed with your ads. Each day and time range includes the scheduled day of week, start/end hour, and start/end minute. Each day and time range is enclosed by left and right parentheses, and separated from other day and time ranges with a semicolon (;) delimiter. Within each day and time range the format is *Day[StartHour:StartMinue-EndHour:EndMinute]*.

> [!NOTE]
> This field is only applicable for ad customizer feeds. 

The possible values of *StartHour* range from 00 to 23, where *00* is equivalent to 12:00AM and *12* is 12:00PM.

The possible values of *EndHour* range from 00 to 24, where *00* is equivalent to 12:00AM and *12* is 12:00PM.

The possible values of *StartMinute* and *EndMinute* range from 00 to 60.

The following example demonstrates day and time ranges during weekdays from 9:00AM through 9:00PM: *(Monday[09:00-21:00]);(Tuesday[09:00-21:00]);(Wednesday[09:00-21:00]);(Thursday[09:00-21:00]);(Friday[09:00-21:00])*

**Add:** Optional. If you do not set this field, then feed item will be eligible for scheduling anytime during the calendar start and end dates.  
**Update:** Optional. If no value is set for the update, this setting is not changed. The individual day and time ranges cannot be updated. You can effectively update the day and time ranges by sending a new set that should replace the prior set. If you do not set this field, then the existing settings will be retained. If you set this field to *delete_value*, then you are effectively removing all existing day and time ranges.    
**Delete:** Read-only  

## <a name="audienceid"></a>Audience Id
The Microsoft Advertising identifier of the audience e.g., remarketing list used to target the feed item. If this field is set, the feed item will only be eligible for the specified audience. 

> [!NOTE]
> This field is only applicable for ad customizer feeds. 

**Add:** Optional.   
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.  
**Delete:** Read-only  

## <a name="campaign"></a>Campaign
The name of the campaign used to target the feed item. If this field is set, the feed item will only be eligible for the specified campaign. 

> [!NOTE]
> This field is only applicable for ad customizer feeds. 

**Add:** Optional. If both the [Campaign](#campaign) and [Target Campaign Id](#targetcampaignid) fields are set, an error is returned for this record in the bulk file.  
**Update:** Optional. If both the [Campaign](#campaign) and [Target Campaign Id](#targetcampaignid) fields are set, an error is returned for this record in the bulk file. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.  
**Delete:** Read-only  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

## <a name="customattributes"></a>Custom Attributes
The attributes are customized for each feed [Sub Type](feed.md#subtype), and define what information about your products or services you want to insert into your ads. 

For the *AdCustomizerFeed* feed [Sub Type](feed.md#subtype), you can include up to 100 custom attributes per feed item where each custom attribute [name](#customattributes-name) is unique.  

For the *DynamicDataAutosListingFeed* sub type, you can include up to 100 custom attributes per feed item where each custom attribute [name](#customattributes-name) is unique.  

For the *PageFeed* feed [Sub Type](feed.md#subtype), you can include one or two custom attributes per feed item where each custom attribute [name](#customattributes-name) is unique.  

The custom attributes are represented in the bulk file as a JSON string. For more details see [feedAttributeType](#customattributes-feedattributetype), [isPartOfKey](#customattributes-ispartofkey), and [name](#customattributes-name) below.

Here are example custom attributes that you could upload for a page feed.

> [!NOTE]
> In the comma separated bulk file you'll need to surround the list of attributes, each attribute key, and each attribute value with an extra set of double quotes e.g., the above JSON string would be written as *"[{""name"":""Page Url"",""feedAttributeType"":""Url"",""isPartOfKey"":true},{""name"":""Custom Label"",""feedAttributeType"":""StringList""},{""name"":""Ad Title"",""feedAttributeType"":""String""}]"*.

```json
[
	{
		"name": "Page Url",
		"feedAttributeType": "Url",
		"isPartOfKey": true
	},
	{
		"name": "Custom Label",
		"feedAttributeType": "StringList"
	},
	{
		"name": "Ad Title",
		"feedAttributeType": "String"
	}
]
```

Here are example custom attributes that you could upload for an ad customizer feed.

```json
{
	"DateTimeName": "2020/06/22 00:00:00",
	"Int64Name": 237601,
	"PriceName": "$601",
	"StringName": "s237601"
}
```

**Add:** Required. For an ad customizer and DynamicDataAutosListing feed item you must set at least one attribute with a valid key and value pair. For a page feed you must set at least one attribute with [name](#customattributes-name) set to "Page Url".  
**Update:** Optional. To retain all of the existing custom attributes for the feed item, set or leave this field empty. If you set this field, any custom attributes that were previously set for this feed item will be replaced.  
**Delete:** Read-only  

### <a name="customattributes-feedattributetype"></a>feedAttributeType
The data type of each custom attribute. You define the data type in the feed record, and then set values in the feed item. So long as each custom attribute [name](#customattributes-name) is unique within the feed you can define multiple attributes with the same data type.

There are four different `feedAttributeType` data types you can set for ad customizer feeds: 

|feedAttributeType|Use cases|Accepted feed item values|
|-----|-----|-----|
|String|Product names, product categories, descriptions|Any letters, numbers, or symbols|
|Int64|Inventory count, number of colors available|Any whole number|
|Price|Product cost, sale discount|Any number (including decimals) and valid currency characters|
|DateTime|Event start time, last day of a sale|yyyy/mm/dd HH:mm:ss<br/>To default to midnight at the beginning of the day, you can omit the HH:mm:ss part.|

For example we can define the custom attributes of an ad customizer feed.   

```json
[
	{
		"name": "DateTimeName",
		"feedAttributeType": "DateTime"
	},
	{
		"name": "Int64Name",
		"feedAttributeType": "Int64"
	},
	{
		"name": "PriceName",
		"feedAttributeType": "Price"
	},
	{
		"name": "StringName",
		"feedAttributeType": "String",
		"isPartOfKey": true
	}
]
```

Then we can map each feed [name](feed.md#customattributes-name) i.e., "DateTimeName", "Int64Name", "PriceName", and "StringName" in the feed item upload: 

```json
{
	"DateTimeName": "2020/06/22 00:00:00",
	"Int64Name": 237601,
	"PriceName": "$601",
	"StringName": "s237601"
}
```

There are six different `feedAttributeType` data types you can set for DynamicDataAutosListing feeds: 

|feedAttributeType|Use cases|Accepted feed item values|
|-----|-----|-----|
|String|Vehicle name, vehicle category, description|Any letters, numbers, or symbols|
|Int64|vehicle year, engine|Any whole number|
|Price|Vehicle cost, sale discount|Any number (including decimals) and valid currency characters|
|DateTime|Event start time, last day of a sale|yyyy/mm/dd HH:mm:ss<br/>To default to midnight at the beginning of the day, you can omit the HH:mm:ss part.|
|Url|Contains the URL of your website to include in the feed.|You must include one URL per [Feed Item](feed-item.md#customattributes).|
|StringList|Labels that allow you to group the URLs within the feed.|You can include between one to ten custom labels per [Feed Item](feed-item.md#customattributes).<br/>Each custom label is represented as a list item in JSON notation. For example the custom label portion of the [Feed Item](feed-item.md#customattributes) could be written as *""Custom Label"":[""Label_1_3001"",""Label_2_3001""]*|

For example we can define the custom attributes of an DynamicDataAutosListing feed.   

```json
[
	{
		"name": "DateTimeName",
		"feedAttributeType": "DateTime"
	},
	{
		"name": "Int64Name",
		"feedAttributeType": "Int64"
	},
	{
		"name": "PriceName",
		"feedAttributeType": "Price"
	},
	{
		"name": "StringName",
		"feedAttributeType": "String",
		"isPartOfKey": true
	},
	{
		"name": "Page Url",
		"feedAttributeType": "Url",
		"isPartOfKey": true
	},
	{
		"name": "Custom Label",
		"feedAttributeType": "StringList"
	}
]
```

Then we can map each feed [name](#customattributes-name) i.e., "DateTimeName", "Int64Name", "PriceName", and "StringName" in the [Feed Item](feed-item.md#customattributes) upload: 

```json
{
	"DateTimeName": "2020/06/22 00:00:00",
	"Int64Name": 237601,
	"PriceName": "$601",
	"StringName": "s237601",
	"Page Url": "https://contoso.com/3001",
	"Custom Label": [
		"Label_1_3001",
		"Label_2_3001"
	],
}
```

These are the `feedAttributeType` data types you can set for page feeds: 

|feedAttributeType|Use cases|Accepted feed item values|
|-----|-----|-----|
|String|Static headline that is shown instead of the dynamically generated headline.|Any letters, numbers, or symbols up to 63 characters. You can include one ad title per feed item.|
|StringList|Labels that allow you to group the URLs within the feed.|You can include between one to ten custom labels per [Feed Item](feed-item.md#customattributes).<br/>Each custom label is represented as a list item in JSON notation. For example the custom label portion of the [Feed Item](feed-item.md#customattributes) could be written as *""Custom Label"":[""Label_1_3001"",""Label_2_3001""]*|
|Url|Contains the URL of your website to include in the feed.|You must include one URL per [Feed Item](feed-item.md#customattributes).|

For example we can define the custom attributes of page feed.   

> [!NOTE]
> The `feedAttributeType` is optional for page feeds. If you set the `feedAttributeType`, then it must be set to "Url" for "Page Url", "StringList" for "Custom Label", and "String" for "Ad Title" [named](#customattributes-name) attributes. 

```json
[
	{
		"name": "Page Url",
		"feedAttributeType": "Url",
		"isPartOfKey": true
	},
	{
		"name": "Custom Label",
		"feedAttributeType": "StringList"
	},
	{
		"name": "Ad Title",
		"feedAttributeType": "String"
	}
]
```

Then we can map each feed [name](#customattributes-name) i.e., "Page Url", "Custom Label", and "Ad Title" in the [Feed Item](feed-item.md#customattributes) upload: 

```json
{
	"Page Url": "https://contoso.com/3001",
	"Custom Label": [
		"Label_1_3001",
		"Label_2_3001"
	],
    "Ad Title": "Find New Customers & Increase Sales!",
}
```

### <a name="customattributes-ispartofkey"></a>isPartOfKey
The `isPartOfKey` determines whether or not the values for a custom attribute must be unique across all feed item records that roll up to the feed. If the `isPartOfKey` is set to "true" the values must be unique, and otherwise you can upload duplicate values for the same custom attribute.  

For ad customizer feeds and feed items, a String named "Custom Id" is always treated as a unique key i.e., the `isPartOfKey` is always "true". The "Custom Id" attribute is currently the only way to set a unique key for ad customizer feeds via the Microsoft Advertising web application. With the Bulk API you have more flexibility to use any attribute name as a unique key.  

For page feeds and feed items the "Page Url" is always treated as a unique key i.e., the `isPartOfKey` is always "true". 

For DynamicDataAutosListing feeds and feed items the "VehicleId" is always treated as a unique key i.e., the `isPartOfKey` is always "true".   

### <a name="customattributes-name"></a>name
The `name` attribute is used to map a distinct custom attribute across both the [Feed](feed.md#customattributes-name) and feed item. Effectively this is how you ensure that a specific feed item rolls up to the same "column" in the feed. In the ad customizer example above the "DateTimeName", "Int64Name", "PriceName", and "StringName" names are used in both the feed and feed item. 

## <a name="devicepreference"></a>Device Preference
This field determines whether the preference is for the feed item to be displayed on mobile devices or all devices.

> [!NOTE]
> This field is only applicable for ad customizer feeds. 

Possible values are *All* and *Mobile*, which differ from values used in the campaign management service. 

The default value is *All*.

In the bulk download and upload results file, this field will never be empty. If you did not specify a device preference, the default value of *All* will be returned.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed. If you set this field to *delete_value*, then you are effectively resetting to the default value of *All*.    
**Delete:** Read-only  

## <a name="enddate"></a>End Date
The feed item scheduled end date string formatted as *yyyy/mm/dd HH:mm:ss*. To default to midnight at the beginning of the day, you can omit the HH:mm:ss part.  

> [!NOTE]
> This field is only applicable for ad customizer feeds. 

The end date is inclusive. For example, if you set this field to 2020/12/31 00:00:00, the feed item will stop being eligible at 12:00 AM on 12/31/2020.  

**Add:** Optional. If you do not specify an end date, the feed item will continue to be delivered unless you pause the associated campaigns, ad groups, or ads.  
**Update:** Optional. If no value is set for the update, this setting is not changed. The end date can be shortened or extended, as long as the start date is either null or occurs before the new end date. If you do not set this field, then the existing settings will be retained. If you set this field to *delete_value*, then you are effectively removing the end date and the feed item will continue to be delivered unless you pause the associated campaigns, ad groups, or ads.    
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the feed.

**Add:** Read-only  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="keyword"></a>Keyword
The keyword text.

The text can contain a maximum of 100 characters.

You should specify the keyword in the locale of the Language of the target campaign or ad group.


**Add:** Required  
**Update:** Read-only    
**Delete:** Read-only  

## <a name="matchtype"></a>Match Type
The type of match to compare the keyword and the user's search term.

The supported match type values for a keyword are *Broad*, *Exact* and *Phrase*.

**Add:** Required  
**Update:** Read-only    
**Delete:** Read-only  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The system-generated identifier of the parent [Feed](feed.md). 

The parent feed's [Custom Attributes](feed.md#customattributes) and [Sub Type](feed.md#subtype) determine which [Custom Attributes](#customattributes) are valid for this feed item. Currently ad customizer feeds and page feeds are supported, and other feed types could be added in the future. 

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="physicalintent"></a>Physical Intent
Determines whether a person must be physically located in the target location in order for the feed item to be eligible. 

By default the feed item can be shown to people in, searching for, or viewing pages about your targeted location. Set this field to *PeopleIn* if you only want the feed item to be shown to people physically located in the target location.   

**Add:** Optional. If you set this field, the [Target](#target) location must also be set.    
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed. If you set this field to *delete_value*, then you are effectively resetting to the default value of *PeopleIn*.  
**Delete:** Read-only  

## <a name="startdate"></a>Start Date
The feed item scheduled start date string formatted as *yyyy/mm/dd HH:mm:ss*. To default to midnight at the beginning of the day, you can omit the HH:mm:ss part.  

The start date is inclusive. For example, if you set this field to 2020/06/15 00:00:00, the feed item will start being eligible at 12:00 AM on June 15th, 2020.

**Add:** Optional. If you do not specify a start date, the feed item are immediately eligible to be scheduled during the day and time ranges.  
**Update:** Optional. If no value is set for the update, this setting is not changed. The start date can be shortened or extended, as long as the end date is either null or occurs after the new start date. If you do not set this field, then the existing settings will be retained. If you set this field to *delete_value*, then you are effectively removing the start date and the feed item are immediately eligible to be scheduled during the day and time ranges.    
**Delete:** Read-only  

## <a name="status"></a>Status
The status of the feed item.

Possible values are *Active* or *Deleted*. 

**Add:** Optional. The default value is *Active*.  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Required. The Status must be set to *Deleted*.

## <a name="target"></a>Target
The identifier of the location used to target the feed item. If this field is set, the feed item will only be eligible for the specified location. 

If you want to target only people physically in a location, you will need to set the [Physical Intent](#physicalintent) field as well.

The location identifier corresponds to the *Location Id* field of the geographical locations file. For more information, see [Geographical Location Codes](../guides/geographical-location-codes.md) and [GetGeoLocationsFileUrl](../campaign-management-service/getgeolocationsfileurl.md).

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.  
**Delete:** Read-only  

## <a name="targetadgroupid"></a>Target Ad Group Id
The identifier of the ad group used to target the feed item. If this field is set, the feed item will only be eligible for the specified ad group.  

> [!NOTE]
> This field is only applicable for ad customizer feeds. 

**Add:** Optional. If you also set the [Campaign](#campaign) field (not required), then the ad group must exist within the specified campaign. If both the [Ad Group](#adgroup) and [Target Ad Group Id](#targetadgroupid) fields are set, an error is returned for this record in the bulk file.  
**Update:** Optional. If you also set the [Campaign](#campaign) field (not required), then the ad group must exist within the specified campaign. If both the [Ad Group](#adgroup) and [Target Ad Group Id](#targetadgroupid) fields are set, an error is returned for this record in the bulk file. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.  
**Delete:** Read-only  

## <a name="targetcampaignid"></a>Target Campaign Id
The identifier of the campaign used to target the feed item. If this field is set, the feed item will only be eligible for the specified campaign. 

> [!NOTE]
> This field is only applicable for ad customizer feeds. 

**Add:** Optional. If both the [Campaign](#campaign) and [Target Campaign Id](#targetcampaignid) fields are set, an error is returned for this record in the bulk file.  
**Update:** Optional. If both the [Campaign](#campaign) and [Target Campaign Id](#targetcampaignid) fields are set, an error is returned for this record in the bulk file. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.  
**Delete:** Read-only  
