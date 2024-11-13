---
title: "Location Ad Extension Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Describes the Location Ad Extension fields in a Bulk file.
dev_langs:
  - csharp
---
# Location Ad Extension Record - Bulk
Defines a location ad extension that can be downloaded and uploaded in a bulk file.

You can associate a location ad extension with the account or with campaigns in the account. Each entity (account or campaign) can be associated with as many location ad extensions as you decide, up to the total number of location ad extensions in your account. Use the [Account Location Ad Extension](account-location-ad-extension.md) and [Campaign Location Ad Extension](campaign-location-ad-extension.md) records to manage location ad extension associations.

You can download all *Location Ad Extension* records in the account by including the [DownloadEntity](downloadentity.md) value of *LocationAdExtensions* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new Location Ad Extension to the account's shared library. 

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Start Date,End Date,Business Name,Phone Number,Device Preference,Name,Ad Schedule,Use Searcher Time Zone,Address Line 1,Address Line 2,Postal Code,City,State Or Province Code,Province Name,Latitude,Longitude,Country Code
Format Version,,,,,,,,,,,,,6.0,,,,,,,,,,,
Location Ad Extension,Active,-15,0,,,ClientIdGoesHere,,,12/31/2020,Contoso Shoes,206-555-0100,,,(Monday[09:00-21:00]),FALSE,1234 Washington Place,Suite 1210,98608,Woodinville,,WA,0,0,US
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkLocationAdExtension* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkLocationAdExtension
var bulkLocationAdExtension = new BulkLocationAdExtension
{
    // 'Parent Id' column header in the Bulk file
    AccountId = 0,
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",
                
    // Map properties in the Bulk file to the 
    // LocationAdExtension object of the Campaign Management service.
    LocationAdExtension = new LocationAdExtension
    {
        Address = new Address
        {
            // 'City' column header in the Bulk file
            CityName = "Woodinville",
            // 'Country Code' column header in the Bulk file
            CountryCode = "US",
            // 'Postal Code' column header in the Bulk file
            PostalCode = "98608",
            // 'State Or Province Code' column header in the Bulk file
            ProvinceCode = null,
            // 'Province Name' column header in the Bulk file
            ProvinceName = "WA",
            // 'Address Line 1' column header in the Bulk file
            StreetAddress = "1234 Washington Place",
            // 'Address Line 2' column header in the Bulk file
            StreetAddress2 = "Suite 1210",
        },
        // 'Business Name' column header in the Bulk file
        CompanyName = "Contoso Shoes",
        // 'Geo Code Status' column header in the Bulk file
        GeoCodeStatus = null,
        GeoPoint = new GeoPoint
        {
            // 'Latitude' column header in the Bulk file
            LatitudeInMicroDegrees = 0,
            // 'Longitude' column header in the Bulk file
            LongitudeInMicroDegrees = 0,
        },
        // 'Id' column header in the Bulk file
        Id = locationAdExtensionIdKey,
        // 'Phone Number' column header in the Bulk file
        PhoneNumber = "206-555-0100",

        // 'Ad Schedule' column header in the Bulk file
        Scheduling = new Schedule
        {
            // Each day and time range is delimited by a semicolon (;) in the Bulk file
            DayTimeRanges = new[]
            {
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
            EndDate = new Microsoft.BingAds.V13.CampaignManagement.Date
            {
                Month = 12,
                Day = 31,
                Year = DateTime.UtcNow.Year + 1
            },
            // 'Start Date' column header in the Bulk file
            StartDate = null,
            // 'Use Searcher Time Zone' column header in the Bulk file
            UseSearcherTimeZone = false,
        },

        // 'Status' column header in the Bulk file
        Status = AdExtensionStatus.Active,
    },
};

uploadEntities.Add(bulkLocationAdExtension);

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

For a *Location Ad Extension* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Ad Schedule](#adschedule)
- [Address Line 1](#addressline1)
- [Address Line 2](#addressline2)
- [Business Name](#businessname)
- [City](#city)
- [Client Id](#clientid)
- [Country Code](#countrycode)
- [Editorial Location](#editoriallocation)
- [Editorial Reason Code](#editorialreasoncode)
- [Editorial Status](#editorialstatus)
- [Editorial Term](#editorialterm)
- [End Date](#enddate)
- [Geo Code Status](#geocodestatus)
- [Id](#id)
- [Latitude](#latitude)
- [Longitude](#longitude)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Phone Number](#phonenumber)
- [Postal Code](#postalcode)
- [Province Name](#provincename)
- [Publisher Countries](#publishercountries)
- [Start Date](#startdate)
- [State Or Province Code](#stateorprovincecode)
- [Status](#status)
- [Use Searcher Time Zone](#usesearchertimezone)
- [Version](#version)

## <a name="adschedule"></a>Ad Schedule
The list of day and time ranges that you want the ad extension to be displayed with your ads. Each day and time range includes the scheduled day of week, start/end hour, and start/end minute. Each day and time range is enclosed by left and right parentheses, and separated from other day and time ranges with a semicolon (;) delimiter. Within each day and time range the format is *Day[StartHour:StartMinue-EndHour:EndMinute]*.

The possible values of *StartHour* range from 00 to 23, where *00* is equivalent to 12:00AM and *12* is 12:00PM.

The possible values of *EndHour* range from 00 to 24, where *00* is equivalent to 12:00AM and *12* is 12:00PM.

The possible values of *StartMinute* and *EndMinute* range from 00 to 60.

The following example demonstrates day and time ranges during weekdays from 9:00AM through 9:00PM: *(Monday[09:00-21:00]);(Tuesday[09:00-21:00]);(Wednesday[09:00-21:00]);(Thursday[09:00-21:00]);(Friday[09:00-21:00])*

**Add:** Optional. If you do not set this field, the ad extension will be eligible for scheduling anytime during the calendar [start](#startdate) and [end](#enddate) dates.  
**Update:** Optional. The individual day and time ranges cannot be updated. You can effectively update the day and time ranges by sending a new set that should replace the prior set. The [Ad Schedule](#adschedule), [End Date](#enddate), [Start Date](#startdate), and [Use Searcher Time Zone](#usesearchertimezone) fields depend on each other and are updated together. If you leave all of these fields empty during update, then none of them are updated. If you include values for any of these fields, then the prior values for all of these fields are removed or replaced. To remove all prior schedule settings, set each of these fields to *delete_value*.    
**Delete:** Read-only  

## <a name="addressline1"></a>Address Line 1
The first line of the address. 

The first line can contain a maximum of 80 characters.

**Add:** Required  
**Update:** Required    
**Delete:** Read-only  

## <a name="addressline2"></a>Address Line 2
The second line of the address. 

The second line can contain a maximum of 80 characters.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, the prior setting is removed.   
**Delete:** Read-only  

## <a name="businessname"></a>Business Name
The name of the business. 

The name can contain a maximum of 80 characters.

**Add:** Required  
**Update:** Required    
**Delete:** Read-only  

## <a name="city"></a>City
The name of the city where the street address is located. 

The name can contain a maximum of 80 characters.

**Add:** Required  
**Update:** Required    
**Delete:** Read-only  


## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

## <a name="countrycode"></a>Country Code
The country or region where the street address is located. 

The country code must contain a 2 character country code. The supported country code values include AR, AT, AU, BR, CA, CH, CL, CO, DE, DK, ES, FI, FR, GB, HK, ID, IE, IN, IT, MX, MY, NL, NZ, NO, PE, PH, SE, SG, TH, TW, US, VE, and VN.

**Add:** Required  
**Update:** Required    
**Delete:** Read-only  

## <a name="editoriallocation"></a>Editorial Location
The component or property of the ad extension that failed editorial review. 

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="editorialreasoncode"></a>Editorial Reason Code
A code that identifies the reason for the failure. For a list of possible reason codes, see [Editorial Reason Codes](../guides/editorial-failure-reason-codes.md). 

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="editorialstatus"></a>Editorial Status
The editorial status of the ad extension.

Possible values are described in the table below.

|Value|Description|
|-----------|---------------|
|<a name="editorialstatusactive"></a>Active|The ad extension passed editorial review.|
|<a name="editorialstatusactivelimited"></a>ActiveLimited|The ad extension passed editorial review in one or more markets, and one or more elements of the ad extension is undergoing editorial review in another market. For example the ad extension passed editorial review for Canada and is still pending review in the United States.|
|<a name="editorialstatusdisapproved"></a>Disapproved|The ad extension failed editorial review.|
|<a name="editorialstatusinactive"></a>Inactive|One or more elements of the ad extension is undergoing editorial review.|

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="editorialterm"></a>Editorial Term
The term that failed editorial review.

This field will not be set if a combination of terms caused the failure or if the failure was based on a policy violation.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="enddate"></a>End Date
The ad extension scheduled end date string formatted as *MM/DD/YYYY*.

The end date is inclusive. For example, if you set this field to 12/31/2020, the ad extensions will stop being shown at 11:59 PM on 12/31/2020.

**Add:** Optional. If you do not specify an end date, the ad extension will continue to be delivered unless you pause the associated campaigns, ad groups, or ads.  
**Update:** Optional. The end date can be shortened or extended, as long as the start date is either null or occurs before the new end date. If you set this field to the *delete_value* string, then you are effectively removing the end date. The [Ad Schedule](#adschedule), [End Date](#enddate), [Start Date](#startdate), and [Use Searcher Time Zone](#usesearchertimezone) fields depend on each other and are updated together. If you leave all of these fields empty during update, then none of them are updated. If you include values for any of these fields, then the prior values for all of these fields are removed or replaced. To remove all prior schedule settings, set each of these fields to *delete_value*.      
**Delete:** Read-only  

## <a name="geocodestatus"></a>Geo Code Status
A status value that indicates whether the business' latitude and longitude coordinates have been determined.

If you provide the coordinates, the status will be set to *Complete*; otherwise, the status will indicate the progress of determining the coordinates of the specified business' address. 

Possible values are described in the table below.

|Value|Description|
|-----------|---------------|
|<a name="geocodestatuscomplete"></a>Complete|Successfully determined the latitude and longitude of the business.|
|<a name="geocodestatusfailed"></a>Failed|Unable to determine the latitude and longitude of the business.|
|<a name="geocodestatusinvalid"></a>Invalid|Unable to determine the latitude and longitude of the business, possibly because the address did not resolve.|
|<a name="geocodestatuspending"></a>Pending|In the process of determining the latitude and longitude of the business.|

**Add:** Read-only  
**Update:** Read-only    
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the ad extension.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the ad extension can then be referenced in the *Id* field of dependent record types such as [Campaign Location Ad Extension](campaign-location-ad-extension.md). This is recommended if you are adding new ad extensions and new dependent records in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="latitude"></a>Latitude
The latitude specified in degrees. The latitude must be greater than or equal to -85 and less than or equal to +85.

> [!NOTE]
> The Campaign Management service uses micro degrees i.e., from -85000000 to 85000000. When you use the BulkLocationAdExtension via the SDKs you should use micro degrees, because the BulkLocationAdExtension implementation converts from micro degrees and writes the value as degrees in the Bulk file. 

The latitude and longitude coordinates are used to mark the business' location on Bing Maps when the user clicks the address on the ad. If the specified coordinates are not within the range of valid values, the service determines the coordinates based on the address.

If you specify the known coordinates, the service does not confirm whether the specified coordinates match the specified business address. If you do not provide the coordinates, the Bulk service uses the businesses' address to determine the coordinates.

> [!NOTE]
> When adding more than 10 location ad extensions, the service resolves coordinates offline, and otherwise resolves coordinates up front during execution of the service operation. The location will not be used in an ad until the coordinates are determined, which can take from seconds to minutes depending on the number of location ad extensions being added and the current demand.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="longitude"></a>Longitude
The longitude specified in degrees. The longitude must be greater than or equal to -180 and less than or equal to +180.

> [!NOTE]
> The Campaign Management service uses micro degrees i.e., from -180000000 to 180000000. When you use the BulkLocationAdExtension via the SDKs you should use micro degrees, because the BulkLocationAdExtension implementation converts from micro degrees and writes the value as degrees in the Bulk file. 

The latitude and longitude coordinates are used to mark the business' location on Bing Maps when the user clicks the address on the ad. If the specified coordinates are not within the range of valid values, the service determines the coordinates based on the address.

If you specify the known coordinates, the service does not confirm whether the specified coordinates match the specified business address. If you do not provide the coordinates, the Bulk service uses the businesses' address to determine the coordinates.

> [!NOTE]
> When adding more than 10 location ad extensions, the service resolves coordinates offline, and otherwise resolves coordinates up front during execution of the service operation. The location will not be used in an ad until the coordinates are determined, which can take from seconds to minutes depending on the number of location ad extensions being added and the current demand.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The system-generated identifier of the account that contains the ad extension.

This bulk field maps to the *Id* field of the [Account](account.md) record.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  
  
## <a name="phonenumber"></a>Phone Number
The business' clickable phone number to include in the ad. 

The phone number can contain a maximum of 35 characters and must be valid for the specified country or region.

If the campaign also includes a call extension, the phone number in the call extension will override the location ad extension's phone number.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed.     
**Delete:** Read-only  

## <a name="postalcode"></a>Postal Code
The postal or zip code.

The postal code can contain a maximum of 80 characters.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, the prior setting is removed.     
**Delete:** Read-only  

## <a name="provincename"></a>Province Name
The name of the state or province where the street address is located, for example *Washington*. 

The name can contain a maximum of 50 characters.

You must specify either [Province Name](#provincename) or [State Or Province Code](#stateorprovincecode).

> [!NOTE]
> The [State Or Province Code](#stateorprovincecode) and [Province Name](#provincename) are not required if the [Country Code](#countrycode) field is set to either FR, IE, or SG.

**Add:** Required  
**Update:** Required   
**Delete:** Read-only  

## <a name="publishercountries"></a>Publisher Countries
The list of publisher countries or regions whose editorial guidelines do not allow the specified [term](#editorialterm).

In a bulk file, the list of publisher countries or regions are delimited with a semicolon (;).

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="startdate"></a>Start Date
The ad extension scheduled start date string formatted as *MM/DD/YYYY*.

The start date is inclusive. For example, if you set *StartDate* to 5/5/2020, the ad extensions will start being shown at 12:00 AM on 5/5/2020.

**Add:** Optional. If you do not specify a start date, the ad extension is immediately eligible to be [scheduled](#adschedule).  
**Update:** Optional. The start date can be shortened or extended, as long as the end date is either null or occurs after the new start date. If you set this field to the *delete_value* string, then you are effectively removing the start date and the ad extension is immediately eligible to be [scheduled](#adschedule). The [Ad Schedule](#adschedule), [End Date](#enddate), [Start Date](#startdate), and [Use Searcher Time Zone](#usesearchertimezone) fields depend on each other and are updated together. If you leave all of these fields empty during update, then none of them are updated. If you include values for any of these fields, then the prior values for all of these fields are removed or replaced. To remove all prior schedule settings, set each of these fields to *delete_value*.  
**Delete:** Read-only  

## <a name="stateorprovincecode"></a>State or Province Code
A code that identifies the state or province where the street address is located, for example *WA*.  

The code can contain a maximum of 50 characters.

You must specify either [Province Name](#provincename) or [State Or Province Code](#stateorprovincecode).

> [!NOTE]
> The [State Or Province Code](#stateorprovincecode) and [Province Name](#provincename) are not required if the [Country Code](#countrycode) field is set to either FR, IE, or SG.

**Add:** Required  
**Update:** Required   
**Delete:** Read-only  

## <a name="status"></a>Status
The status of the ad extension.

Possible values are *Active* or *Deleted*. 

**Add:** Optional. The default value is *Active*.  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Required. The Status must be set to *Deleted*.

## <a name="usesearchertimezone"></a>Use Searcher Time Zone
Determines whether to use the account time zone or the time zone of the search user where the ads could be delivered.

Set this property to *TRUE* if you want the ad extensions to be shown in the search user's time zone, and otherwise set it to *FALSE*.

**Add:** Optional. If you do not specify this field or leave it empty, the default value of *FALSE* will be set and the account time zone will be used.  
**Update:** Optional. If you set this field to the *delete_value* string, then you are effectively resetting to the default value of *FALSE*. The [Ad Schedule](#adschedule), [End Date](#enddate), [Start Date](#startdate), and [Use Searcher Time Zone](#usesearchertimezone) fields depend on each other and are updated together. If you leave all of these fields empty during update, then none of them are updated. If you include values for any of these fields, then the prior values for all of these fields are removed or replaced. To remove all prior schedule settings, set each of these fields to *delete_value*.  
**Delete:** Read-only  
## <a name="version"></a>Version
The number of times the contents of the ad extension has been updated. The version is set to 1 when you add the extension and is incremented each time it's revised.

**Add:** Read-only  
**Update:** Read-only    
**Delete:** Read-only  
