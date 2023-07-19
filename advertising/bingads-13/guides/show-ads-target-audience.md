---
title: "Show Ads to Your Target Audience"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Get your ads in front of the right people.
---
# Show Ads to Your Target Audience
Getting your ad in front of the right people; that's what targeting is all about. With targeting, Microsoft Advertising can help you focus a campaign or ad group on potential customers who meet specific criteria, so you can increase the chance that they see your ads. You may target your ads to display to users of a certain age group, display at a certain day and time of the week, or display to users in a particular geographical location.

> [!NOTE] 
> Microsoft Advertising supports other criterion types e.g. product partition and webpage. This guide covers criteria that you can use to target your ads by age, day and time, device, gender, location, and profile. Where necessary to distinguish from other criterion types the documentation may refer to these entities as *target criteria*. 

Here are a few tips to keep in mind before you begin:
- When you first create a campaign or ad group using the Bing Ads API, it will not have any criteria. Effectively the brand new campaign and ad group target all ages, days, hours, devices, genders, and locations. You should specify your minimum target criteria at the campaign level and then use ad group level criteria to narrow or refine your targeting requirements. As a best practice you should consider at minimum adding a campaign location criterion corresponding to the customer market country/region. Its worth noting that when creating campaigns via the Microsoft Advertising web application, the recommended [default criteria](#defaultcriterions) are added. 
- If you specify the same [criterion types](#criteriontypes) at the ad group and campaign level, the ad group-level criteria will override the campaign-level criteria. For example, if the campaign location criterion is *US* and the ad group location criterion is *California*, the ads will display only to users in California. Or, if the campaign criteria are *Monday* and *Wednesday* and the ad group criteria are *Tuesday* and *Thursday*, the ads will display only on Tuesdays and Thursdays.
- When a criterion type is not specified at the ad group level, that type is effectively inherited from the campaign if it exists in the campaign. For example, you can set location criteria at the campaign level and day and time criteria at the ad group level. If the location criterion is set to U.S. and the day and time criterion is set to Monday from 11am - 3pm, then the ads will display to users in the U.S. on Mondays from 11am - 3pm. 
- You must consider the location, negative location, and radius criteria as a set of *geo criteria*. If the ad group has any geo criteria, then none of the campaign's geo criteria are inherited. If the ad group doesn't have any geo criteria, then all of the campaign's geo criteria are inherited. The geo criteria can be inherited from the campaign even if the ad group has a location intent criterion. If the ad group's geo criteria are used, then the ad group's location intent criterion is used; if the campaign's geo criteria are inherited, then the campaign's location intent criterion is used and the ad group's location intent criterion is ignored. You cannot delete a campaign or ad group's location intent criterion, although it has no purpose without location or radius criteria. 
- By default without any criteria you are effectively targeting *PeopleInOrSearchingForOrViewingPages*. When you create the campaign or ad group's first criterion, a location intent criterion set to *PeopleInOrSearchingForOrViewingPages* with a criterion identifier will be added automatically for the corresponding campaign or ad group. The default location intent criterion will be added whenever the first criterion was successfully added, whether or not you tried to explicitly set a location intent criterion in the same operation.
- Partial update is supported, so you can update each criterion individually. For example if you only want to update the bid adjustment for 1 location, only send that location criterion. There is no need to send all locations. 
- Partial success is supported, such that if you add or update multiple criteria each can fail or succeed independently. 
- If you delete the campaign or ad group, all of the criteria for the same campaign or ad group are also deleted. 
- If you upload multiple records with the same criterion identifier, then the first record will succeed and the subsequent duplicates will fail. 
- Individual criteria are validated first, and then system limits are enforced if the number of valid criteria would exceed the allowed limit of criteria per campaign or ad group. Partial success of criteria is allowed up to the system limit.

## <a name="criteriontypes"></a>Target Criterion Types
The following criterion types are supported for targeting.
- [Age Criterion](#agecriterion)
- [DayTime Criterion](#daytimecriterion)
- [DeviceOS Criterion](#deviceoscriterion)
- [Gender Criterion](#gendercriterion)
- [Location Criterion](#locationcriterion)
- [Location Intent Criterion](#locationintentcriterion)
- [Profile Criterion](#profilecriterion)
- [Radius Criterion](#radiuscriterion)

You can apply the criteria at the ad group or campaign level. 

The maximum number of target criteria that you can set across all ad groups and campaigns per customer (manager account) is 50,000,000. 

Use a biddable criterion to target a criterion with or without a bid adjustment. When you use the Bulk service the record type of an age criterion applied to an ad group is [Ad Group Age Criterion](../bulk-service/ad-group-age-criterion.md), whereas with the Campaign Management service you would use a [BiddableAdGroupCriterion](../campaign-management-service/biddableadgroupcriterion.md) and set its [Criterion](../campaign-management-service/biddableadgroupcriterion.md#criterion) element to an instance of [AgeCriterion](../campaign-management-service/agecriterion.md). 

Use a "Negative" criterion to exclude a target criterion. When you use the Bulk service the record type of a negative age criterion applied to an ad group is [Ad Group Negative Age Criterion](../bulk-service/ad-group-negative-age-criterion.md), whereas with the Campaign Management service you would use a [NegativeAdGroupCriterion](../campaign-management-service/negativeadgroupcriterion.md) and set its [Criterion](../campaign-management-service/negativeadgroupcriterion.md#criterion) element to an instance of [AgeCriterion](../campaign-management-service/agecriterion.md). 

### <a name="agecriterion"></a>Age Criterion
You can target customers by age so that your ads are displayed more frequently to people who will be interested in them. 

Each age criterion defines an age range for the accompanying criterion bid adjustment. 

With campaigns for [Audience Ads](audience-ads.md) you can set age groups that you want to exclude from seeing your ads. Excluded ages are also known as negative age criteria. Each negative age criterion defines an age group you do not want to see your ads. 

The supported criteria varies by campaign type. 

|Criterion Association|Supported Campaign Types|
|----------|---------------|
|Campaign Age Criterion|DynamicSearchAds<br/>Search<br/>Shopping|
|Ad Group Age Criterion|Audience<br/>DynamicSearchAds<br/>Search<br/>Shopping|
|Ad Group Negative Age Criterion|Audience|

In DynamicSearchAds, Search, and Shopping campaigns, the maximum number of age criteria that you can set per campaign or ad group is five, i.e. one each for *EighteenToTwentyFour*, *TwentyFiveToThirtyFour*, *ThirtyFiveToFortyNine*, *FiftyToSixtyFour*, and *SixtyFiveAndAbove*. In Audience campaigns, the maximum number of age criteria that you can set per campaign or ad group is six, i.e. one each for *EighteenToTwentyFour*, *TwentyFiveToThirtyFour*, *ThirtyFiveToFortyNine*, *FiftyToSixtyFour*, and *SixtyFiveAndAbove*, and *Unknown*. 

### <a name="daytimecriterion"></a>DayTime Criterion
As your campaign progresses, you may find that your click-through rate and conversion rate are highest during certain times, for example, weeknights. This might be a perfect opportunity to use bid adjustments to improve your chances of displaying your ad Monday through Friday from 6:00 P.M. to 11:00 P.M.. When targeting by time, you are targeting the searcher's local time zone. For example, if you increase your bid by 10% for 6:00 P.M. to 11:00 P.M., that bid adjustment will be effective from 6:00 P.M. to 11:00 P.M. Eastern Time for searchers in New York, then be effective 6:00 P.M. to 11:00 P.M. Pacific Time for searchers in Seattle. Now you are showing your ads when your potential customers are online!

Each day and time criterion defines the day, from hour, from minute, to hour, and to minute requirements for the accompanying criterion bid adjustment. 

The maximum number of day and time criteria that you can set per campaign or ad group is 49. You may not specify any overlapping day and time ranges, for example Monday from 3:00AM to 5:00AM and Monday 4:00AM to 6:00AM are not allowed for the same campaign or ad group. Also for a given campaign or ad group, the maximum number of day and time criteria per day that you can set is seven. For example you can set up to 7 day and time criteria where the *Day* is set to Monday. 

### <a name="deviceoscriterion"></a>DeviceOS Criterion
When you target by device, you choose to show ads to potential customers when they're using desktops and tablets or smartphones. 

Each device criterion defines a device name for the accompanying criterion bid adjustment. 

The maximum number of device criteria that you can set per campaign or ad group is three. You must either have three separate criteria for *Computers*, *Smartphones*, and *Tablets*, otherwise no device criteria can exist for the campaign or ad group.

> [!NOTE]
> This criterion type is not supported with smart shopping campaigns i.e., campaigns with Type set to *Shopping* and SubType set to *ShoppingSmartAds*.  

### <a name="gendercriterion"></a>Gender Criterion
You can target customers by gender so that your ads are displayed more frequently to people who will be interested in them. 

Each gender criterion defines a gender for the accompanying criterion bid adjustment. 

With campaigns for [Audience Ads](audience-ads.md) you can set a gender that you want to exclude from seeing your ads. Excluded genders are also known as negative gender criteria. Each negative gender criterion defines a gender you do not want to see your ads. 

The supported criteria varies by campaign type. 

|Criterion Association|Supported Campaign Types|
|----------|---------------|
|Campaign Gender Criterion|DynamicSearchAds<br/>Search<br/>Shopping|
|Ad Group Gender Criterion|Audience<br/>DynamicSearchAds<br/>Search<br/>Shopping|
|Ad Group Negative Gender Criterion|Audience|

In DynamicSearchAds, Search, and Shopping campaigns, the maximum number of gender criteria that you can set per campaign or ad group is two i.e. one each for *Male* and *Female*. In Audience campaigns, the maximum number of gender criteria that you can set per campaign or ad group is three i.e. one each for *Male*, *Female*, and *Unknown*. 

### <a name="locationcriterion"></a>Location Criterion
With location criteria, you can choose to show ads to potential customers in, searching for, or viewing pages about:
- All available countries/regions
- Selected cities, zip codes, metro areas (Nielsen DMA&reg; in the United States), states/provinces, and countries/regions

> [!NOTE]
> For a list of geographical location codes, see [Geographical Location Codes](geographical-location-codes.md). 

Each location criterion defines a location code for the accompanying criterion bid adjustment. 

Although location criteria are most often used to designate the specific locations where you want to show your ads, Microsoft Advertising also lets you specify locations you want to exclude from seeing your ads. Excluded locations are also known as negative location criteria.

Each negative location criterion defines a location code where you do not want your ads to show. 

The maximum number of combined location and negative location criteria that you can set per campaign or ad group is 10,000. 

### <a name="locationintentcriterion"></a>Location Intent Criterion
Set the location intent criterion to *PeopleInOrSearchingForOrViewingPages* if you want to show ads to people in, searching for, or viewing pages about your targeted location. For example if the [Location Criterion](#locationcriterion) includes London and the location intent criterion is *PeopleInOrSearchingForOrViewingPages*, then someone physically located in Florida searching for London hotels will see the ad.

> [!NOTE]
> By default without any criteria you are effectively targeting *PeopleInOrSearchingForOrViewingPages*. When you create the campaign or ad group's first criterion, a location intent criterion set to *PeopleInOrSearchingForOrViewingPages* with a criterion identifier will be added automatically for the corresponding campaign or ad group. The default location intent criterion will be added whenever the first criterion was successfully added, whether or not you tried to explicitly set a location intent criterion in the same operation.

Set the location intent criterion to *PeopleIn* if you only want to show ads to people in your targeted location. For example if the [Location Criterion](#locationcriterion) is set to London and the location intent criterion is *PeopleIn*, then someone physically located in Florida searching for London hotels will not see the ad.

Set the location intent criterion to *PeopleSearchingForOrViewingPages* if you want to show ads to people searching for or viewing pages about your targeted location. For example if the [Location Criterion](#locationcriterion) includes London and the location intent criterion is *PeopleSearchingForOrViewingPages*, then someone physically located in Florida searching for London hotels will see the ad. Someone located in London who searches for your keywords, but does not search for or about the targeted location will not see the ads.

Each location intent criterion defines the intent option for all location and radius criteria of the campaign or ad group. There isn't any accompanying criterion bid adjustment. 

The maximum number of location intent criteria that you can set per campaign or ad group is one.

For more information and examples, please see [How can I get my ads in front of my customers?](https://help.ads.microsoft.com/#apex/3/en/51029/0).

### <a name="profilecriterion"></a>Profile Criterion
You can target customers by company, industry, or job function profiles (according to LinkedIn), so that your ads are displayed more frequently to people who will be interested in them. Each profile criterion defines a company, industry, or job function for the accompanying criterion bid adjustment. 
- Company, such as Microsoft, Alibaba.com, or KLM Royal Dutch Air Lines.
- Industry, such as finance, broadcast media, or law enforcement.
- Job function, such as sales, accounting, or purchasing.

You can also exclude people from seeing your ads based on LinkedIn profiles. Excluded profiles are also known as negative profile criteria. Each negative profile criterion defines the company, industry, or job function of people who you do not want to see your ads. 

The supported criteria varies by campaign type. 

|Criterion Association|Supported Campaign Types|
|----------|---------------|
|Campaign Biddable Criterion|DynamicSearchAds<br/>Search<br/>Shopping|
|Ad Group Biddable Criterion|Audience<br/>DynamicSearchAds<br/>Search<br/>Shopping*|
|Ad Group Negative Criterion|Audience| 

The maximum number of company name profile criteria that you can apply to each campaign or ad group is 1,000.

### <a name="radiuscriterion"></a>Radius Criterion
With radius criteria, you can choose to show ads to potential customers in, searching for, or viewing pages about a specified radius around a zip code, coordinates, landmark, or area.

Each radius criterion defines a radius, latitude, and longitude for the accompanying criterion bid adjustment. 

The maximum number of radius criteria that you can set per campaign or ad group is 2,000.  

## <a name="bidadjust"></a>Criterion Bid Adjustments
The ad group or keyword bid is used as the default or base bid. When you define a criterion, you can choose to adjust the base bid by a specified percentage. This is known as a bid adjustment or bid multiplier. For example, if your business sells pet supplies on the Internet, and you also have a storefront in Seattle, you can set your base bid for the "pet supplies" keyword to $1, and create a location criterion for your campaign that adjusts the bid by 50% for users in the Seattle metropolitan area. If a user in Los Angeles searches for "pet supplies", your bid for that keyword will be the base bid of $1.00. If a user in Seattle searches for "pet supplies", your bid is adjusted by 50% to $1.50. Placing a bid adjustment increases the likelihood that your ad is displayed in a better position for customers who meet your targeting criteria.

The base bid is adjusted by multipliers of the bid adjustment percentage values that you specify for each criterion type that applies to the search user. For example, say you specify a day criterion for Saturday with a 20% bid adjustment, and a Seattle metropolitan area criterion with a 30% bid adjustment. If the user resides in Seattle and searches on a Saturday, the service increases the base bid by 56%. The example is calculated as follows.

`1.00` (base bid default) `* 1.20` (day bid adjustment) `* 1.30` (location bid adjustment)`= 1.56` (56 percent adjustment)

> [!NOTE]
> After calculation, bid adjustments are rounded to two decimals of precision. For example, 1.1749 is rounded to 1.17 (17%), or 1.175 is rounded to 1.18 (18%). 
> 
> Multiple bid adjustments across location criteria are not combined. If you specify geographically-related combinations of country/region, state/province, metropolitan area, or city criteria, the bid adjustment of the most refined criterion would apply.
> 
> For example, if the search user is located in Redmond and country/region is set to *US* with a 10% bid adjustment, state is set to *US-WA* with a 20% bid adjustment, metro area (Nielsen DMA&reg; in the United States) is set to *Seattle-Tacoma, WA, WA US* with a 30% bid adjustment, and city is set to *Redmond, Seattle-Tacoma, WA WA US* with a 40% bid adjustment, then the bid would be adjusted by 40%. If the user is located elsewhere within the Seattle-Tacoma metropolitan area, for example in Bellevue, the bid would be increased by 30%.
>
> Device bid adjustments will be considered and combined with automated bidding to make informed decisions at the auction level.

## <a name="defaultcriterions"></a>Default Criterion Settings
When you first create a campaign or ad group using the Bing Ads API, it will not have any criteria. Effectively the brand new campaign and ad group target all ages, days, hours, devices, genders, and locations. You should specify your minimum target criteria at the campaign level and then use ad group level criteria to narrow or refine your targeting requirements. As a best practice you should consider at minimum adding a campaign location criterion corresponding to the customer market country or region. 

Its worth noting that when creating campaigns via the Microsoft Advertising web application, the recommended default criteria are added. For example if you keep the default setting in the web application e.g. *United States, Canada*, the download will include the following campaign location and campaign location intent criteria. 

```csv
Type,Status,Id,Parent Id,Sub Type,Campaign,Client Id,Modified Time,Target,Physical Intent,Bid Adjustment,Radius Target Id,Name,Radius,Unit,From Hour,From Minute,To Hour,To Minute,Latitude,Longitude
Format Version,,,,,,,,,,,,6,,,,,,,,
Account,,AcccountIdHere,CustomerIdHere,,,,,,,,,,,,,,,,,
Campaign Location Criterion,Active,101,CampaignIdHere,Country,CampaignNameHere,,41:34.8,32,,0,,Canada,,,,,,,,
Campaign Location Criterion,Active,102,CampaignIdHere,Country,CampaignNameHere,,41:34.8,190,,0,,United States,,,,,,,,
Campaign Location Intent Criterion,Active,CampaignIdHere,CampaignIdHere,,CampaignNameHere,,41:34.8,PeopleInOrSearchingForOrViewingPages,,,,,,,,,,,,
```

If you choose *All available countries/regions* in the Microsoft Advertising web application, the download will only include the following campaign location intent criterion. This is the effective equivalent of targeting all ages, days, genders, hours, and locations worldwide.

```csv
Type,Status,Id,Parent Id,Sub Type,Campaign,Client Id,Modified Time,Target,Physical Intent,Bid Adjustment,Radius Target Id,Name,Radius,Unit,From Hour,From Minute,To Hour,To Minute,Latitude,Longitude
Format Version,,,,,,,,,,,,6,,,,,,,,
Account,,AcccountIdHere,CustomerIdHere,,,,,,,,,,,,,,,,,
Campaign Location Intent Criterion,Active,CampaignIdHere,CampaignIdHere,,CampaignNameHere,,41:34.8,PeopleInOrSearchingForOrViewingPages,,,,,,,,,,,,
```

> [!NOTE]
> The above examples assume that you did not change any other defaults such as demographic or device settings. 

## <a name="usingcriterions"></a>Using Target Criteria
Microsoft Advertising supports other criterion types e.g. product partition and webpage. This guide covers criteria that you can use to target your ads by age, day and time, device, gender, location, and profile. Where necessary to distinguish from other criterion types the documentation may refer to these entities as *target criteria*. 

### <a name="synccriterions"></a>Sync Criteria
Sync the new criteria with campaigns and ad groups. For example you can use the Bulk service to download all criteria in the account and discover the mapping between criteria and campaigns and ad groups. Let's download the target criteria using Bing Ads API version 13, Bulk file format 6.0, and we can see that each criterion has its own identifier e.g. 101, 102, 103, and so on. 

```csv
Type,Status,Id,Parent Id,Sub Type,Campaign,Client Id,Modified Time,Target,Physical Intent,Bid Adjustment,Radius Target Id,Name,Radius,Unit,From Hour,From Minute,To Hour,To Minute,Latitude,Longitude
Format Version,,,,,,,,,,,,6,,,,,,,,
Account,,AcccountIdHere,CustomerIdHere,,,,,,,,,,,,,,,,,
Campaign Age Criterion,Active,101,CampaignIdHere,,CampaignNameHere,,41:34.8,EighteenToTwentyFour,,20,,,,,,,,,,
Campaign Gender Criterion,Active,102,CampaignIdHere,,CampaignNameHere,,41:34.8,Female,,20,,,,,,,,,,
Campaign DeviceOS Criterion,Active,103,CampaignIdHere,,CampaignNameHere,,41:34.8,Computers,,20,,,,,,,,,,
Campaign DeviceOS Criterion,Active,104,CampaignIdHere,,CampaignNameHere,,41:34.8,Smartphones,,0,,,,,,,,,,
Campaign DeviceOS Criterion,Active,105,CampaignIdHere,,CampaignNameHere,,41:34.8,Tablets,,0,,,,,,,,,,
Campaign Location Criterion,Active,106,CampaignIdHere,Country,CampaignNameHere,,41:34.8,190,,20,,,,,,,,,,
Campaign Negative Location Criterion,Active,107,CampaignIdHere,PostalCode,CampaignNameHere,,41:34.8,79381,,,,,,,,,,,,
Campaign Location Intent Criterion,Active,CampaignIdHere,CampaignIdHere,,CampaignNameHere,,41:34.8,PeopleIn,,,,,,,,,,,,
Campaign Radius Criterion,Active,108,CampaignIdHere,,CampaignNameHere,,41:34.8,,,20,,RadiusName,10,Kilometers,,,,,10.5,40.5
Campaign DayTime Criterion,Active,109,CampaignIdHere,,CampaignNameHere,,41:34.8,Monday,,20,,,,,0,0,4,0,,
Ad Group Age Criterion,Active,201,AdGroupIdHere,,CampaignNameHere,,41:35.7,EighteenToTwentyFour,,20,,,,,,,,,,
Ad Group Gender Criterion,Active,202,AdGroupIdHere,,CampaignNameHere,,41:35.7,Female,,20,,,,,,,,,,
Ad Group DeviceOS Criterion,Active,203,AdGroupIdHere,,CampaignNameHere,,41:35.7,Computers,,20,,,,,,,,,,
Ad Group DeviceOS Criterion,Active,204,AdGroupIdHere,,CampaignNameHere,,41:35.7,Smartphones,,0,,,,,,,,,,
Ad Group DeviceOS Criterion,Active,205,AdGroupIdHere,,CampaignNameHere,,41:35.7,Tablets,,0,,,,,,,,,,
Ad Group Location Criterion,Active,206,AdGroupIdHere,Country,CampaignNameHere,,41:35.7,190,,20,,,,,,,,,,
Ad Group Negative Location Criterion,Active,207,AdGroupIdHere,PostalCode,CampaignNameHere,,41:35.7,79381,,,,,,,,,,,,
Ad Group Location Intent Criterion,Active,AdGroupIdHere,AdGroupIdHere,,CampaignNameHere,,41:35.7,PeopleIn,,,,,,,,,,,,
Ad Group Radius Criterion,Active,208,AdGroupIdHere,,CampaignNameHere,,41:35.7,,,20,,RadiusName,10,Kilometers,,,,,10.5,40.5
Ad Group DayTime Criterion,Active,209,AdGroupIdHere,,CampaignNameHere,,41:35.7,Monday,,20,,,,,0,0,4,0,,
```

### <a name="addcriterion"></a>Add or Update Criteria
Add new criteria directly to the campaign or ad group, or use the synced criterion identifiers to update or delete existing criteria. Let's assume we have already retrieved the criterion identifiers as described in [Sync Criteria](#synccriterions), and we attempt to upload the following criteria. 

```csv
Type,Status,Id,Parent Id,Sub Type,Campaign,Client Id,Modified Time,Target,Physical Intent,Bid Adjustment,Radius Target Id,Name,Radius,Unit,From Hour,From Minute,To Hour,To Minute,Latitude,Longitude
Format Version,,,,,,,,,,,,6,,,,,,,,
Account,,AcccountIdHere,CustomerIdHere,,,,,,,,,,,,,,,,,
Campaign Location Criterion,Active,,CampaignIdHere,Country,,,,190,,20,,,,,,,,,,
Campaign Location Intent Criterion,Deleted,CampaignIdHere,CampaignIdHere,,,,,,,,,,,,,,,,,
Ad Group Age Criterion,Active,,AdGroupIdHere,,,,,EighteenToTwentyFour,,20,,,,,,,,,,
Ad Group DeviceOS Criterion,Deleted,203,AdGroupIdHere,,,,,Computers,,20,,,,,,,,,,
Ad Group DeviceOS Criterion,Deleted,204,AdGroupIdHere,,,,,Smartphones,,0,,,,,,,,,,
Ad Group DeviceOS Criterion,Deleted,205,AdGroupIdHere,,,,,Tablets,,0,,,,,,,,,,
```

As observed in the example upload results file below:
- We successfully targeted Canada (LocationId = 32) by adding a new campaign location criterion.
- Location intent criteria can never be deleted. The attempt to delete the location intent criterion from the campaign failed but did not cause other criterion updates to fail.
- Without the assigned identifier for an existing age criterion, the upload attempt failed with code 1043 i.e. CampaignServiceEntityAlreadyExists. If the *EighteenToTwentyFour* age criterion had not existed already or if we had specified an age range that is not yet set for the campaign, then the upload would have succeeded and created a new criterion with unique identifier. 

```csv
Type,Status,Id,Parent Id,Sub Type,Campaign,Client Id,Modified Time,Target,Physical Intent,Bid Adjustment,Radius Target Id,Name,Radius,Unit,From Hour,From Minute,To Hour,To Minute,Latitude,Longitude,Error,Error Number
Format Version,,,,,,,,,,,,6,,,,,,,,,,
Account,,AcccountIdHere,CustomerIdHere,,,,,,,,,,,,,,,,,,,
Campaign Location Criterion,Active,110,CampaignIdHere,Country,,,,190,,20,,,,,,,,,,,,
Campaign Location Intent Criterion,Deleted,CampaignIdHere,CampaignIdHere,,,,,,,,,,,,,,,,,,,
Campaign Location Intent Criterion Error,Deleted,CampaignIdHere,CampaignIdHere,,,,,,,,,,,,,,,,,,LocationIntentCriterionCannotBeDeleted,2965
Ad Group Age Criterion,Active,,AdGroupIdHere,,,,,EighteenToTwentyFour,,20,,,,,,,,,,,,
Ad Group Age Criterion Error,Active,,AdGroupIdHere,,,,,EighteenToTwentyFour,,20,,,,,,,,,,,CampaignServiceEntityAlreadyExists,1043
Ad Group DeviceOS Criterion,Deleted,203,AdGroupIdHere,,,,,Computers,,20,,,,,,,,,,,,
Ad Group DeviceOS Criterion,Deleted,204,AdGroupIdHere,,,,,Smartphones,,0,,,,,,,,,,,,
Ad Group DeviceOS Criterion,Deleted,205,AdGroupIdHere,,,,,Tablets,,0,,,,,,,,,,,,
```

