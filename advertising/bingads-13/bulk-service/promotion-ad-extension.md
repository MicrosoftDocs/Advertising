---
title: "Promotion Ad Extension Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Promotion Ad Extension fields in a Bulk file.
dev_langs:
  - csharp
---
# Promotion Ad Extension Record - Bulk
Defines a promotion ad extension that can be downloaded and uploaded in a bulk file.

> [!NOTE]
> Promotion Extensions are available for customers in AU, CA, DE, FR, US and UK.   

You can associate a promotion ad extension with the account or with campaigns and ad groups in the account. Each entity (account, campaign, or ad group) can be associated with up to 20 promotion ad extensions. Use the [Account Promotion Ad Extension](account-promotion-ad-extension.md), [Ad Group Promotion Ad Extension](ad-group-promotion-ad-extension.md), and [Campaign Promotion Ad Extension](campaign-promotion-ad-extension.md) records to manage promotion ad extension associations.

You can download all *Promotion Ad Extension* records in the account by including the [DownloadEntity](downloadentity.md) value of *PromotionAdExtensions* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new Promotion Ad Extension to the account's shared library. 

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Language,Start Date,End Date,Name,Version,Ad Schedule,Use Searcher Time Zone,Final Url,Mobile Final Url,Tracking Template,Custom Parameter,Promotion Target,Discount Modifier,Percent Off,Money Amount Off,Promotion Code,Orders Over Amount,Occasion,Promotion Start,Promotion End,Currency Code
Format Version,,,,,,,,,,,6,,,,,,,,,,,,,,,,,
Promotion Ad Extension,Active,-25,0,,,ClientIdGoesHere,,English,,12/31/2021,,,(Monday[09:00-21:00]),FALSE,https://www.contoso.com/womenshoesale,https://mobile.contoso.com/womenshoesale,,{_promoCode}=PROMO1; {_season}=summer,shoes,None,20000000,,SAVE20,,WomensDay,,12/31/2021,USD
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkPromotionAdExtension* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkPromotionAdExtension
var bulkPromotionAdExtension = new BulkPromotionAdExtension
{
    // 'Parent Id' column header in the Bulk file
    AccountId = 0,
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",

    // Map properties in the Bulk file to the 
    // PromotionAdExtension object of the Campaign Management service.
    PromotionAdExtension = new PromotionAdExtension
    {
        // 'Id' column header in the Bulk file
        Id = promotionAdExtensionIdKey,
        // 'Currency Code' column header in the Bulk file
        CurrencyCode = "USD",
        // 'Discount Modifier' column header in the Bulk file
        DiscountModifier = PromotionDiscountModifier.None,
        // 'Language' column header in the Bulk file
        Language = "English",
        // 'Money Amount Off' column header in the Bulk file
        MoneyAmountOff = null,
        // 'Orders Over Amount' column header in the Bulk file
        OrdersOverAmount = null,
        // 'Percent Off' column header in the Bulk file
        PercentOff = 20000000,
        // 'Promotion Code' column header in the Bulk file
        PromotionCode = "SAVE20",
        // 'Promotion Target' column header in the Bulk file
        PromotionItem = "shoes",
        // 'Occasion' column header in the Bulk file
        PromotionOccasion = PromotionOccasion.WomensDay,
        // 'Promotion End' column header in the Bulk file
        PromotionEndDate = new Microsoft.BingAds.V13.CampaignManagement.Date
        {
            Month = 12,
            Day = 31,
            Year = DateTime.UtcNow.Year + 1
        },
        // 'Promotion Start' column header in the Bulk file
        PromotionStartDate = null,
        // 'Final Url' column header in the Bulk file
        FinalUrls = new[] {
            // Each Url is delimited by a semicolon (;) in the Bulk file
            "https://www.contoso.com/womenshoesale"
        },
        // 'Mobile Final Url' column header in the Bulk file
        FinalMobileUrls = new[] {
            // Each Url is delimited by a semicolon (;) in the Bulk file
            "https://mobile.contoso.com/womenshoesale"
        },
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

uploadEntities.Add(bulkPromotionAdExtension);

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

For a *Promotion Ad Extension* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Ad Schedule](#adschedule)
- [Client Id](#clientid)
- [Currency Code](#currencycode)
- [Custom Parameter](#customparameter)
- [Discount Modifier](#discountmodifier)
- [Editorial Location](#editoriallocation)
- [Editorial Reason Code](#editorialreasoncode)
- [Editorial Status](#editorialstatus)
- [Editorial Term](#editorialterm)
- [End Date](#enddate)
- [Final Url](#finalurl)
- [Final Url Suffix](#finalurlsuffix)
- [Id](#id)
- [Language](#language)
- [Mobile Final Url](#mobilefinalurl)
- [Modified Time](#modifiedtime)
- [Money Amount Off](#moneyamountoff)
- [Occasion](#occasion)
- [Orders Over Amount](#ordersoveramount)
- [Parent Id](#parentid)
- [Publisher Countries](#publishercountries)
- [Promotion Code](#promotioncode)
- [Promotion End](#promotionend)
- [Promotion Start](#promotionstart)
- [Promotion Target](#promotiontarget)
- [Start Date](#startdate)
- [Status](#status)
- [Tracking Template](#trackingtemplate)
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

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

## <a name="currencycode"></a>Currency Code
The currency code for the promotion price or discount. 

This field is only applicable if you set [Money Amount Off](#moneyamountoff) or [Orders Over Amount](#ordersoveramount). 

The supported currency codes are ARS, AUD, BRL, CAD, CHF, CLP, CNY, COP, DKK, EUR, GBP, HKD, INR, MXN, NZD, PEN, PHP, PLN, SEK, SGD, USD, TWD, and VEF. 

**Add:** Required if [Money Amount Off](#moneyamountoff) or [Orders Over Amount](#ordersoveramount) are set.     
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set either [Percent Off](#percentoff) or [Promotion Code](#promotioncode), this setting is no longer applicable and will be deleted.    
**Delete:** Read-only  

## <a name="customparameter"></a>Custom Parameter
Your custom collection of key and value parameters for URL tracking.

In a bulk file, the list of custom parameters are formatted as follows.

- Format each custom parameter pair as Key=Value, for example {_promoCode}=PROMO1.

- Microsoft Advertising will accept the first 3 custom parameter key and value pairs that you include, and any additional custom parameters will be ignored. For customers in the Custom Parameters Limit Increase Phase 3 pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 635), Microsoft Advertising will accept the first 8 custom parameter key and value pairs that you include, and if you include more than 8 custom parameters an error will be returned.  

- Each key and value pair are delimited by a semicolon and space ("; "), for example {_promoCode}=PROMO1; {_season}=summer.  

- A Key cannot contain a semicolon. If a Value contains a semicolon it must be escaped as '\\;'. Additionally if the Value contains a backslash it must also be escaped as '\\'.

- The Key cannot exceed 16 UTF-8 bytes, and the Value cannot exceed 200 UTF-8 bytes. For customers in the Custom Parameters Limit Increase Phase 3 pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 635), the Value limit increases to 250 UTF-8 bytes. The Key is required and the Value is optional. The maximum size of the Key does not include the braces and underscore i.e., '{', '_', and '}'. 

    > [!NOTE] 
    > With the Bulk service the Key must be formatted with surrounding braces and a leading underscore, for example if the Key is promoCode, it must be formatted as {_promoCode}. With the Campaign Management service you cannot specify the surrounding braces and underscore.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. To remove all custom parameters, set this field to *delete_value*. The *delete_value* keyword removes the previous setting. To remove a subset of custom parameters, specify the custom parameters that you want to keep and omit any that you do not want to keep. The new set of custom parameters will replace any previous custom parameter set.    
**Delete:** Read-only  

## <a name="discountmodifier"></a>Discount Modifier
The promotion discount modifier.

The possible values for this field are *None* and *UpTo*. 

- None: The promotion discount is not modified.
- UpTo: The promotion discount is modified with the "Up to" string prefix. For example, if the unmodified promotion discount would be "$20 off shoes", the modified promotion is "Up to $20 off shoes".

**Add:** Optional. If you do not specify this field or leave it empty, the default value of *None* will be set.  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
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
|<a name="editorialstatusactivelimited"></a>ActiveLimited|The ad extension passed editorial review in one or more markets, and one or more fields of the ad extension is undergoing editorial review in another market. For example the ad extension passed editorial review for Canada and is still pending review in the United States.|
|<a name="editorialstatusdisapproved"></a>Disapproved|The ad extension failed editorial review.|
|<a name="editorialstatusinactive"></a>Inactive|One or more fields of the ad extension is undergoing editorial review.|

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

## <a name="finalurl"></a>Final Url
The landing page URL.

The following validation rules apply to Final URLs and Final Mobile URLs.  
- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.
- You may specify up to 10 list items for both [Final Url](#finalurl) and [Mobile Final Url](#mobilefinalurl); however, only the first item in each list is used for delivery. The service allows up to 10 list items for potential forward compatibility.  
- Each URL is delimited by a semicolon and space ("; ").  
- Usage of '{' and '}' is only allowed to delineate tags, for example *{lpurl}*.  
- Final URLs must each be a well-formed URL starting with either http:// or https://.  
- If you specify [Mobile Final Url](#mobilefinalurl), you must also specify [Final Url](#finalurl).  

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.   
**Delete:** Read-only  

## <a name="finalurlsuffix"></a>Final Url Suffix
The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. For more details and validation rules see [Final URL Suffix](../guides/url-tracking-upgraded-urls.md#finalurlsuffixvalidation) in the technical guides. 

> [!NOTE]
> This feature is only available for customers in the Final URL Suffix Phase 3 pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 636). If you are not in the pilot this property will be ignored and no error will be returned.  

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.  
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the ad extension.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the ad extension can then be referenced in the *Id* field of dependent record types such as [Ad Group Promotion Ad Extension](ad-group-promotion-ad-extension.md) and [Campaign Promotion Ad Extension](campaign-promotion-ad-extension.md). This is recommended if you are adding new ad extensions and new dependent records in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="language"></a>Language
The language that the ad extension will be served in.  

The extension will always be served in this language, regardless of the campaign or ad group's language settings.  

The supported language strings are: Danish, Dutch, English, Finnish, French, German, Italian, Norwegian, Portuguese, Spanish, Swedish, and TraditionalChinese.  

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

## <a name="mobilefinalurl"></a>Mobile Final Url
The landing page URL for mobile devices.

The following validation rules apply to Final URLs and Final Mobile URLs.  
- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.  
- You may specify up to 10 list items for both [Final Url](#finalurl) and [Mobile Final Url](#mobilefinalurl); however, only the first item in each list is used for delivery. The service allows up to 10 list items for potential forward compatibility.  
- Each URL is delimited by a semicolon and space ("; ").  
- Usage of '{' and '}' is only allowed to delineate tags, for example *{lpurl}*.  
- Final URLs must each be a well-formed URL starting with either http:// or https://.  
- If you specify [Mobile Final Url](#mobilefinalurl), you must also specify [Final Url](#finalurl).  

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.    
**Delete:** Read-only  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="moneyamountoff"></a>Money Amount Off
The money off promotion value.

For example, to promote "$20 off shoes - On orders over $100", set the [Promotion Target](#promotiontarget) to "shoes", set [Currency Code](#currencycode) to "USD", set [Money Amount Off](#moneyamountoff) to 20, and set [Orders Over Amount](#ordersoveramount) to 100. 

**Add:** Required. You must set either [Money Amount Off](#moneyamountoff) or [Percent Off](#percentoff), but you cannot set both.  
**Update:** Optional. You can set either [Money Amount Off](#moneyamountoff) or [Percent Off](#percentoff), but you cannot set both.  
**Delete:** Read-only  

## <a name="occasion"></a>Occasion
The promotion occasion.

Both the promotion [Occasion](#occasion) and Scheduling ([Ad Schedule](#adschedule), [End Date](#enddate), [Start Date](#startdate), and [Use Searcher Time Zone](#usesearchertimezone) fields) fields determine when the promotion is eligible to be shown in ads.  

The promotion [Occasion](#occasion) determines the time period or seasonality e.g., [WomensDay](#womensday) from February 15 through March 31 each year. The promotion will only run within the dates corresponding to the occasion that you set. See the table below for details about the defined date range for each occasion.  

The Scheduling can limit the promotion to a shorter timeframe within the occasion's date range e.g., limit the promotion to run from February 20 through March 8. The Scheduling can also be used to run the same promotion multiple years e.g., run the [WomensDay](#womensday) promotion every year from February 15 through March 31.  

|Occasion Value|Description|
|-----------|---------------|
|<a name="backtoschool"></a>BackToSchool|The "Back to School" promotion can run anytime according to your ad extension scheduling.|
|<a name="blackfriday"></a>BlackFriday|The "Black Friday" promotion can run from October 15 through December 15.|
|<a name="boxingday"></a>BoxingDay|The "Boxing Day" promotion can run from December 15 through January 15.|
|<a name="carnival"></a>Carnival|The "Carnival" promotion can run from February 1 through March 31.|
|<a name="chinesenewyear"></a>ChineseNewYear|The "Chinese New Year" promotion can run from January 15 through March 1.|
|<a name="christmas"></a>Christmas|The "Christmas" promotion can run from November 1 through January 15.|
|<a name="cybermonday"></a>CyberMonday|The "Cyber Monday" promotion can run from October 15 through December 15.|
|<a name="diwali"></a>Diwali|The "Diwali" promotion can run from September 1 through December 1.|
|<a name="easter"></a>Easter|The "Easter" promotion can run from March 1 through April 30.|
|<a name="eidaladha"></a>EidAlAdha|The "Eid al-Adha" promotion can run anytime according to your ad extension scheduling.|
|<a name="eidalfitr"></a>EidAlFitr|The "Eid al-Fitr" promotion can run anytime according to your ad extension scheduling.|
|<a name="endofseason"></a>EndOfSeason|The "End of Season" promotion can run anytime according to your ad extension scheduling.|
|<a name="epiphany"></a>Epiphany|The "Epiphany" promotion can run from December 15 through January 31.|
|<a name="fallsale"></a>FallSale|The "Fall Sale" promotion can run anytime according to your ad extension scheduling.|
|<a name="fathersday"></a>FathersDay|The "Father's Day" promotion can run anytime according to your ad extension scheduling.|
|<a name="halloween"></a>Halloween|The "Halloween" promotion can run from October 1 through November 15.|
|<a name="hanukkah"></a>Hanukkah|The "Hanukkah" promotion can run from November 15 through January 31.|
|<a name="holi"></a>Holi|The "Holi" promotion can run from February 1 through March 31.|
|<a name="independenceday"></a>IndependenceDay|The "Independence Day" promotion can run anytime according to your ad extension scheduling.|
|<a name="laborday"></a>LaborDay|The "Labor Day" promotion can run from April 15 through September 15.|
|<a name="mothersday"></a>MothersDay|The "Mother's Day" promotion can run anytime according to your ad extension scheduling.|
|<a name="nationalday"></a>NationalDay|The "National Day" promotion can run anytime according to your ad extension scheduling.|
|<a name="navratri"></a>Navratri|The "Navratri" promotion can run from September 15 through October 31.|
|<a name="newyears"></a>NewYears|The "New Year's" promotion can run from December 1 through February 28.|
|<a name="none"></a>None|The promotion can run anytime according to your ad extension scheduling.|
|<a name="parentsday"></a>ParentsDay|The "Parent's Day" promotion can run from April 15 through August 1.|
|<a name="passover"></a>Passover|The "Passover" promotion can run from February 15 through May 1.|
|<a name="ramadan"></a>Ramadan|The "Ramadan" promotion can run anytime according to your ad extension scheduling.|
|<a name="roshhashanah"></a>RoshHashanah|The "Rosh Hashanah" promotion can run from August 15 through November 1.|
|<a name="singlesday"></a>SinglesDay|The "Single's Day" promotion can run from October 15 through November 30.|
|<a name="songkran"></a>Songkran|The "Songkran" promotion can run anytime according to your ad extension scheduling.|
|<a name="springsale"></a>SpringSale|The "Spring Sale" promotion can run anytime according to your ad extension scheduling.|
|<a name="stnicholasday"></a>StNicholasDay|The "St. Nicholas Day" promotion can run from November 1 through December 31.|
|<a name="summersale"></a>SummerSale|The "Summer Sale" promotion can run anytime according to your ad extension scheduling.|
|<a name="unknown"></a>Unknown|Reserved for future use.|
|<a name="valentinesday"></a>ValentinesDay|The "Valentine's Day" promotion can run from January 15 through February 28.|
|<a name="wintersale"></a>WinterSale|The "Winter Sale" promotion can run anytime according to your ad extension scheduling.|
|<a name="womensday"></a>WomensDay|The "Women's Day" promotion can run from February 15 through March 31.|
|<a name="yearendgift"></a>YearEndGift|The "Year-End Gift" promotion can run anytime according to your ad extension scheduling.|

**Add:** Optional. If you do not specify this field or leave it empty, the default value of [None](#none) will be set.  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field, then [Promotion Start](#promotionstart) and [Promotion End](#promotionend) must also be set to retain or update the previous settings.  
**Delete:** Read-only  

## <a name="ordersoveramount"></a>Orders Over Amount
The orders over amount value appended to the promotion target.

For example, to promote "$20 off shoes - On orders over $100", set the [Promotion Target](#promotiontarget) to "shoes", set [Currency Code](#currencycode) to "USD", set [Money Amount Off](#moneyamountoff) to 20, and set [Orders Over Amount](#ordersoveramount) to 100.

**Add:** Optional. You cannot set both [Orders Over Amount](#ordersoveramount) and [Promotion Code](#promotioncode).  
**Update:** Optional. You cannot set both [Orders Over Amount](#ordersoveramount) and [Promotion Code](#promotioncode). If no value is set for the update, this setting is not changed. If you set this field to '0' (zero), the previous setting will be deleted.  
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The system-generated identifier of the account that contains the ad extension.

This bulk field maps to the *Id* field of the [Account](account.md) record.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  
  
## <a name="publishercountries"></a>Publisher Countries
The list of publisher countries whose editorial guidelines do not allow the specified [term](#editorialterm).

In a bulk file, the list of publisher countries are delimited with a semicolon (;).

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="percentoff"></a>Percent Off
The percent off promotion value as a double value.

For example, 10.0 represents a 10% discount.

**Add:** Required. You must set either [Money Amount Off](#moneyamountoff) or [Percent Off](#percentoff), but you cannot set both.  
**Update:** Optional. You can set either [Money Amount Off](#moneyamountoff) or [Percent Off](#percentoff), but you cannot set both. If you set this field, then the [Currency Code](#currencycode) setting is no longer applicable and will be deleted if it was previously set.  
**Delete:** Read-only  

## <a name="promotioncode"></a>Promotion Code
The promotion code appended to the promotion target.

For example, to promote "$20 off shoes - Promocode SAVE20", set the [Promotion Target](#promotiontarget) to "shoes", set [Currency Code](#currencycode) to "USD", set [Money Amount Off](#moneyamountoff) to 20, and set [Promotion Code](#promotioncode) to "SAVE20".

The string can contain a maximum of 15 characters. 

**Add:** Optional. You cannot set both [Orders Over Amount](#ordersoveramount) and [Promotion Code](#promotioncode).  
**Update:** Optional. You cannot set both [Orders Over Amount](#ordersoveramount) and [Promotion Code](#promotioncode). If no value is set for the update, this setting is not changed. If you set this field to to the *delete_value* string, the previous setting will be deleted. If you set this field, then the [Currency Code](#currencycode) setting is no longer applicable and will be deleted if it was previously set. 
**Delete:** Read-only  

## <a name="promotionend"></a>Promotion End
The end date helps to inform the promotion date or dates that will be displayed in the ad. 

For example if the [Promotion Start](#promotionstart) and [Promotion End](#promotionend) dates are both set to February 14th, the text "Valid Feb 14" could be included in the displayed promotion. 

The [Promotion Start](#promotionstart) date must be earlier than, or equal to, the [Promotion End](#promotionend) date. 

This property does not override the inherent delivery range for a promotion. Both the promotion [Occasion](#occasion) and Scheduling ([Ad Schedule](#adschedule), [End Date](#enddate), [Start Date](#startdate), and [Use Searcher Time Zone](#usesearchertimezone)) fields determine when the promotion is eligible to be shown in ads.  

If the end date has already passed for the current year, then each start and end date must be set for dates during the following year.  

**Add:** Optional   
**Update:** Optional. If no value is set for the update, this setting is not changed. To delete the current end date and effectively set no end date, set this field to the *delete_value* string. When you retrieve the promotion ad extension next time, this field will not be set.    
**Delete:** Read-only  

## <a name="promotionstart"></a>Promotion Start
The start date helps to inform the promotion date or dates that will be displayed in the ad. 

For example if the [Promotion Start](#promotionstart) and [Promotion End](#promotionend) dates are both set to February 14th, the text "Valid Feb 14" could be included in the displayed promotion. 

The [Promotion Start](#promotionstart) date must be earlier than, or equal to, the [Promotion End](#promotionend) date. 

This property does not override the inherent delivery range for a promotion. Both the promotion [Occasion](#occasion) and Scheduling ([Ad Schedule](#adschedule), [End Date](#enddate), [Start Date](#startdate), and [Use Searcher Time Zone](#usesearchertimezone)) fields determine when the promotion is eligible to be shown in ads.  

If the end date has already passed for the current year, then each start and end date must be set for dates during the following year.  

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. To delete the current end date and effectively set no end date, set this field to the *delete_value* string. When you retrieve the promotion ad extension next time, this field will not be set.   
**Delete:** Read-only  

## <a name="promotiontarget"></a>Promotion Target
The promotion target or item.

For example, you might run a promotion for "shoes" at either $20 or 20% discount. To run a promotion for "Up to $20 off shoes", set the [Promotion Target](#promotiontarget) to "shoes", set the [Discount Modifier](#discountmodifier) to "UpTo", set [Currency Code](#currencycode) to "USD", and set [Money Amount Off](#moneyamountoff) to 20. 

The string can contain a maximum of 20 characters. 

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

## <a name="startdate"></a>Start Date
The ad extension scheduled start date string formatted as *MM/DD/YYYY*.

The start date is inclusive. For example, if you set *StartDate* to 5/5/2020, the ad extensions will start being shown at 12:00 AM on 5/5/2020.

**Add:** Optional. If you do not specify a start date, the ad extension is immediately eligible to be [scheduled](#adschedule).  
**Update:** Optional. The start date can be shortened or extended, as long as the end date is either null or occurs after the new start date. If you set this field to the *delete_value* string, then you are effectively removing the start date and the ad extension is immediately eligible to be [scheduled](#adschedule). The [Ad Schedule](#adschedule), [End Date](#enddate), [Start Date](#startdate), and [Use Searcher Time Zone](#usesearchertimezone) fields depend on each other and are updated together. If you leave all of these fields empty during update, then none of them are updated. If you include values for any of these fields, then the prior values for all of these fields are removed or replaced. To remove all prior schedule settings, set each of these fields to *delete_value*.  
**Delete:** Read-only  

## <a name="status"></a>Status
The status of the ad extension.

Possible values are *Active* or *Deleted*. 

**Add:** Optional. The default value is *Active*.  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Required. The Status must be set to *Deleted*.

## <a name="trackingtemplate"></a>Tracking Template
The tracking template to use for your promotion URLs.

The following validation rules apply to tracking templates. For more details about supported templates and parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2)

- Tracking templates defined for lower level entities e.g. ads override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](../guides/entity-hierarchy-limits.md).

- The length of the tracking template is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.

- The tracking template must be a well-formed URL beginning with one of the following: *http://*, *https://*, *{lpurl}*, or *{unescapedlpurl}*. 

- Microsoft Advertising does not validate whether custom parameters exist. If you use custom parameters in your tracking template and they do not exist, then the landing page URL will include the key and value placeholders of your custom parameters without substitution. For example, if your tracking template is *`https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}`*, and neither *{_season}* or *{_promocode}* are defined at the campaign, ad group, criterion, keyword, or ad level, then the landing page URL will be the same.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.    
**Delete:** Read-only  

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
