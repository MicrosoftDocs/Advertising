---
title: "Feed Record - Bulk"
ms.service: bing-ads-bulk-service
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Feed fields in a Bulk file.
dev_langs:
  - csharp
---
# Feed Record - Bulk
Defines a feed that can be downloaded and uploaded in a bulk file.

> [!TIP]
> For an overview of how to use feeds and feed items, see the [Ad Customizer Feeds](../guides/ad-customizer-feeds.md),  [Auto Inventory Feeds](../guides/auto-inventory-feeds.md) and [Page Feeds](../guides/page-feeds.md) technical guides.

> [!NOTE]
>
> * **Attention**: As of August 29, 2022, you can no longer create new or edit existing expanded text ads. **Please create at least one responsive search ad in each ad group**. For more information, see [Best practices for upgrading expanded text ads to responsive search ads](https://help.ads.microsoft.com/#apex/ads/en/60037).
> * Your scheduled feeds will continue to run and existing expanded text ads using ad customizer feeds will continue to serve. You can still view reports on their performance.
> * You can still pause, run, or remove your existing ad customizer feeds. Otherwise, attempts to create or edit existing ad customizers for expanded text ads will result in a `CustomerNotEligibleForAdCustomizersFeed` error. 
> * [Learn more about this change](https://about.ads.microsoft.com/blog/post/april-2022/deadline-for-migration-to-responsive-search-ads-extended-to-august-29-2022).

If you are creating new parent and child entities in the same Bulk file, the dependent records must be included after dependencies according to hierarchy:  

1. [Feed](feed.md)
1. [Campaign](campaign.md)
1. [Ad Group](ad-group.md)
1. [Feed Item](feed-item.md)

You can have 100 feeds per account (this maximum number includes all feed types) and the maximum number of feed items (rows) per account is 5 million.

You can download all *Feed* records in the account by including the [DownloadEntity](downloadentity.md) value of *Feeds* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new page feed, auto inventory and ad customizer feed with one [Feed Item](feed-item.md) for each.

```csv
Type,Status,Id,Parent Id,Sub Type,Campaign,Ad Group,Client Id,Modified Time,Start Date,End Date,Device Preference,Keyword,Match Type,Target,Physical Intent,Name,Ad Schedule,Audience Id,Feed Name,Custom Attributes
Format Version,,,,,,,,,,,,,,,,6,,,,
Feed,Active,-20,,PageFeed,,,PageFeedClientIdGoesHere,,,,,,,,,,,,MyPageFeedName,"[{""name"":""Page Url"",""feedAttributeType"":""Url"",""isPartOfKey"":true},{""name"":""Custom Label"",""feedAttributeType"":""StringList""},{""name"":""Ad Title"",""feedAttributeType"":""String""}]"
Feed,Active,-21,,AdCustomizerFeed,,,AdCustomizerFeedClientIdGoesHere,,,,,,,,,,,,MyAdCustomizerFeedName,"[{""name"":""DateTimeName"",""feedAttributeType"":""DateTime""},{""name"":""Int64Name"",""feedAttributeType"":""Int64""},{""name"":""PriceName"",""feedAttributeType"":""Price""},{""name"":""StringName"",""feedAttributeType"":""String"",""isPartOfKey"":true}]"
Feed,Active,123456789,DynamicDataAutoListingFeedNew,CampaignName,AUTO ad group,-21,,DynamicDataAutosListingFeed,,"[{""name"":""Vehicle ID""},{""name"":""Final URL""},{""name"":""Image URL""},{""name"":""Make""},{""name"":""Model""},{""name"":""Price""},{""name"":""Title""},{""name"":""Target campaign""},{""name"":""Target ad group""},{""name"":""Latitude""},{""name"":""Longitude""},{""name"":""Mileage value""},{""name"":""Mileage unit""},{""name"":""Year""},{""name"":""Fuel type""},{""name"":""Transmission""},{""name"":""City""},{""name"":""VIN""},{""name"":""State of vehicle""}]"
Feed Item,Active,123456789,DynamicDataAutoListingFeedNew,CampaignName,AUTO ad group,,-21,,,"{""Vehicle Id"":""2g161290-1d13"",""""Final Url"""":""https:\/\/www.contoso.com\/used-Redmond1"",""Image Urls"":""https:\/\/www.contoso.com\/inventoryphotos\/01.jpg;https:\/\/www.contoso.com\/inventoryphotos\/02.jpg"",""Make"":""Contoso"",""Model"":""SUV"",""Price"":""65495.00 USD"",""Title"":""2020 SUV"",""Target campaign"":""CampaignName"",""Target ad group"":"""",""Latitude"":"""",""Logitude"":"""",""Mileage Value"":""13000"",""Mileage Unit"":""MI"",""Year"":""2020"",""Fuel Type"":"""",""Transmission"":"""",""City"":""Redmond"",""Vin"":""SALLJGML8HA004044"",""State of Vehicle"":""USED"",""Trim"":""HSE""}"
Feed Item,Active,-200,-20,,,,20;200,,2020/06/22 00:00:00,2020/06/30 00:00:00,,,,,,,,,,"{""Page Url"":""https://contoso.com/3001"",""Custom Label"":[""Label_1_3001"",""Label_2_3001""],""Ad Title"":""An ad title""}"
Feed Item,Active,-210,-21,,,,21;210,,2020/06/22 00:00:00,2020/06/30 00:00:00,,value,Broad,,PeopleIn,,(Sunday[09:00-17:00]),,,"{""DateTimeName"":""2020/06/22 00:00:00"",""Int64Name"":237601,""PriceName"":""$601"",""StringName"":""s237601""}"
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkFeed* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkFeed
var bulkAdCustomizerFeed = new BulkFeed
{
    // 'Parent Id' column header in the Bulk file
	AccountId = 0,

	// 'Custom Attributes' column header in the Bulk file
	CustomAttributes = new[]
	{
		// Each FeedCustomAttributeContract is represented as a JSON list item in the Bulk file.
		new FeedCustomAttributeContract
		{
			FeedAttributeType = "DateTime",
			Name = "DateTimeName"
		},
		new FeedCustomAttributeContract
		{
			FeedAttributeType = "Int64",
			Name = "Int64Name"
		},
		new FeedCustomAttributeContract
		{
			FeedAttributeType = "Price",
			Name = "PriceName"
		},
		new FeedCustomAttributeContract
		{
			FeedAttributeType = "String",
			Name = "StringName",
			IsPartOfKey = true
		}
	},

	// 'Id' column header in the Bulk file
	Id = adCustomizerFeedIdKey,
	// 'Feed Name' column header in the Bulk file
	Name = "My AdCustomizerFeed " + DateTime.UtcNow,
	// 'Sub Type' column header in the Bulk file
	SubType = "AdCustomizerFeed",
	// 'Client Id' column header in the Bulk file
	ClientId = "ClientIdGoesHere",
	// 'Status' column header in the Bulk file
	Status = Status.Active
};

uploadEntities.Add(bulkAdCustomizerFeed);

// Map properties in the Bulk file to the BulkFeed
var bulkPageFeed = new BulkFeed
{
	// 'Parent Id' column header in the Bulk file
	AccountId = 0,

	// 'Custom Attributes' column header in the Bulk file
	CustomAttributes = new []
	{
		// Each FeedCustomAttributeContract is represented as a JSON list item in the Bulk file.
		new FeedCustomAttributeContract
		{
			FeedAttributeType = "Url",
			Name = "Page Url"
		},
		new FeedCustomAttributeContract
		{
			FeedAttributeType = "StringList",
			Name = "Custom Label"
		}
	},
	
	// 'Id' column header in the Bulk file
	Id = pageFeedIdKey,                    
	// 'Feed Name' column header in the Bulk file
	Name = "My PageFeed " + DateTime.UtcNow,
	// 'Sub Type' column header in the Bulk file
	SubType = "PageFeed",
	// 'Client Id' column header in the Bulk file
	ClientId = "ClientIdGoesHere",
	// 'Status' column header in the Bulk file
	Status = Status.Active
};

uploadEntities.Add(bulkPageFeed);

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

For a *Feed* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Client Id](#clientid)
- [Custom Attributes](#customattributes)
- [Feed Name](#feedname)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Status](#status)
- [Sub Type](#subtype)

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

## <a name="customattributes"></a>Custom Attributes
The attributes are customized for each feed [Sub Type](#subtype), and define what information about your products or services you want to insert into your ads.

For the *AdCustomizerFeed* sub type, you can include up to 100 custom attributes per feed item where each custom attribute [name](#customattributes-name) is unique.  

For the *DynamicDataAutosListingFeed* sub type, you can include up to 100 custom attributes per feed item where each custom attribute [name](#customattributes-name) is unique.  

For the *PageFeed* sub type, you can include one or two custom attributes per feed item where each custom attribute [name](#customattributes-name) is unique.  

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

**Add:** Required. For an ad customizer and DynamicDataAutosListing feed you must set at least one attribute with [name](#customattributes-name) and [feedAttributeType](#customattributes-feedattributetype) keys. For a page feed you must set at least one attribute with [name](#customattributes-name) set to "Page Url". Only the [name](#customattributes-name), [feedAttributeType](#customattributes-feedattributetype) and [isPartOfKey](#customattributes-ispartofkey) keys are honored.   
**Update:** Optional. You cannot remove custom attributes after the feed has been created. You can add new custom attributes by only uploading the new attributes i.e., do not include existing attributes with the new attributes. If you include existing attributes with new attributes, then an error will be returned. If you either leave this field empty or upload an exact copy of existing attributes with no modifications, then no changes will be made.  
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

Then we can map each feed [name](#customattributes-name) i.e., "DateTimeName", "Int64Name", "PriceName", and "StringName" in the [Feed Item](feed-item.md#customattributes) upload: 

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
The `isPartOfKey` determines whether or not the values for a custom attribute must be unique across all [Feed Item](feed-item.md) records that roll up to the feed. If the `isPartOfKey` is set to "true" the values must be unique, and otherwise you can upload duplicate values for the same custom attribute. 

For ad customizer feeds and feed items, a String named "Custom Id" is always treated as a unique key i.e., the `isPartOfKey` is always "true". The "Custom Id" attribute is currently the only way to set a unique key for ad customizer feeds via the Microsoft Advertising web application. With the Bulk API you have more flexibility to use any attribute name as a unique key.  

For page feeds and feed items the "Page Url" is always treated as a unique key i.e., the `isPartOfKey` is always "true".  

For DynamicDataAutosListing feeds and feed items the "VehicleId" is always treated as a unique key i.e., the `isPartOfKey` is always "true".  

### <a name="customattributes-name"></a>name
The `name` attribute is used to map a distinct custom attribute across both the feed and [Feed Item](feed-item.md#customattributes-name). Effectively this is how you ensure that a specific feed item rolls up to the same "column" in the feed. In the ad customizer example above, the "DateTimeName", "Int64Name", "PriceName", and "StringName" names are used in both the feed and feed item. 

## <a name="feedname"></a>Feed Name
The name of the feed. 

The name must be unique (case-insensitive) among all feeds within the account. The name can contain a maximum of 128 characters. 

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the feed.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the feed can then be referenced in the *Id* field of dependent record types such as [Feed Item](feed-item.md). This is recommended if you are adding new feeds and feed items in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The system-generated identifier of the account that contains the feed.

This bulk field maps to the *Id* field of the [Account](account.md) record.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="status"></a>Status
The status of the feed.

Possible values are *Active* or *Deleted*. 

**Add:** Optional. The default value is *Active*.  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Required. The Status must be set to *Deleted*.  

## <a name="subtype"></a>Sub Type
The feed sub type is included in the Bulk download file for readability.

The possible values are: 

- *PageFeed*
- *AdCustomizerFeed*
- *DynamicDataToursAndActivitiesFeed*
- *DynamicDataCreditCardsFeed*
- *DynamicDataCruisesFeed*
- *DynamicDataHealthInsuranceFeed*
- *DynamicDataProfessionalServiceFeed*
- *DynamicDataMortgageLendersFeed*
- *DynamicDataEventsFeed*
- *DynamicDataHotelsAndVacationRentalsFeed*
- *DynamicDataCustomFeed*
- *DynamicDataAutosListingFeed*

New values may be supported in the future, so you must not take a dependency on a fixed set of values.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  
