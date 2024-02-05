---
title: "Hotel Ads"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Setup Hotel ads with the Bing Ads API.
---
# Hotel Ads
A Microsoft Lodging campaign enables you to advertise hotels and properties from your Microsoft Hotel Center properties feed. Hotel ads from a Microsoft Lodging campaign include details about the rental property, an image optional for Hotel Price ads and required for Property Promotion Ads, and pricing.

> [!NOTE]
> Microsoft Lodging Campaigns including Hotel Price Ads and Property Promotion Ads  are available in Albania, Algeria, American Samoa, Andorra, Anguilla, Antigua and Barbuda, Argentina, Armenia, Aruba, Australia, Austria, Azerbaijan, Bahamas, Bahrain, Bangladesh, Barbados, Belgium, Belize, Benin, Bermuda, Bolivarian Republic of Venezuela, Bolivia, Bosnia and Herzegovina, Botswana, Brazil, British Virgin, Islands, Brunei Darussalam, Bulgaria, Burkina Faso, Cameroon, Canada, Cayman Islands, Central African Republic, Chile, Christmas Island, Città del Vaticano, Cocos (Keeling) Islands, Colombia, Comoros, Congo, Congo (DRC), Cook Islands, Costa Rica, Côte d’Ivoire, Croatia, Cyprus, Czech Republic, Denmark, Djibouti, Dominica, Dominican Republic, Ecuador, Egypt, El Salvador, Eritrea, Estonia, Ethiopia, Faroe Islands, Fiji, Finland, France, French Guiana, French Polynesia, Gabon, Gambia, Georgia, Germany, Gibraltar, Greece, Greenland, Grenada, Guadeloupe, Guam, Guatemala, Guernsey, Guinea, Guinea-Bissau, Guyana, Haiti, Honduras, Hong Kong S.A.R., Hungary, Iceland, India, Indonesia, Iraq, Ireland, Islamic Republic of Pakistan, Israel, Italy, Jamaica, Japan (currently Property Promotion ads are unsupported), Jersey, Korea (currently Property Promotion ads are unsupported), Kyrgyzstan, Latvia, Lesotho, Libya, Liechtenstein, Lithuania, Luxembourg, Macao S.A.R., Madagascar, Malawi, Malaysia, Maldives, Malta, Marshall, Islands, Martinique, Mauritania, Mauritius, Mayotte, Mexico, Moldova, Mongolia, Montenegro, Montserrat, Namibia, Nauru, Nepal, Netherlands, New Caledonia, New Zealand, Nicaragua, Niger, Nigeria, Niue, Norfolk Island, Northern Mariana Islands, North Macedonia, Norway, Oman, Palau, Panama, Papua New Guinea, Paraguay, Peru, Philippines, Pitcairn Islands, Poland, Portugal, Principality of Monaco, Puerto Rico, Qatar, Réunion, Romania, Rwanda, Saint Kitts and Nevis, Saint Lucia, Saint Pierre and Miquelon, Saint Vincent and the Grenadines, Samoa, San Marino, Saudi Arabia, Senegal, Serbia, Seychelles, Sierra Leone, Singapore, Slovakia, Slovenia, Somalia, South Africa, Spain, Sri Lanka, Suriname, Sweden, Switzerland, Taiwan, Tajikistan, Tanzania, Thailand, Togo, Tokelau, Tonga, Trinidad and Tobago, Tunisia, Türkiye, Turks and, Caicos Islands, Tuvalu, U.A.E., U.S. Virgin Islands, Uganda, United Kingdom, United States, Uruguay, Vanuatu, Vietnam, Wallis and Futuna, Yemen, Zambia, Zimbabwe.

You can manage Bing Lodging settings with either the [Bulk Service](../bulk-service/bulk-service-reference.md) or [Campaign Management Service](../campaign-management-service/campaign-management-service-reference.md). You should use the [Bulk Service](../bulk-service/bulk-service-reference.md) if you need to upload or download a high volume of entity settings. For example you can update all ad groups for your entire account in a single upload. In comparison, with the [Campaign Management Service](../campaign-management-service/campaign-management-service-reference.md) you can only update 100 ad groups per call and those ad groups must be in the same campaign. For details see the following sections.

## <a name="setup"></a>Set up Microsoft Lodging Campaigns
You can run Microsoft Lodging Campaigns by enrolling into the [Hotel Ads](../../../advertising/hotel-ads/index.md) and providing all of the required information.

## <a name="lodging-bulkservice"></a>Create a Microsoft Lodging campaign with the Bulk Service
The [Bulk Service](../bulk-service/bulk-service-reference.md) create, update, and delete operations can be completed using Bulk upload. You can use Bulk download to read back your data. For more information see [Bulk File Schema](../bulk-service/bulk-file-schema.md) and [Bulk Download and Upload](bulk-download-upload.md).

These are the Bing Lodging entities that can be accessed using the [Bulk Service](../bulk-service/bulk-service-reference.md).

- [Campaign](../bulk-service/campaign.md)
- [Ad Group](../bulk-service/ad-group.md)
- [Ad Group Hotel Listing Group](../bulk-service/ad-group-hotel-listing-group.md)
- [Hotel Ad](../bulk-service/hotel-ad.md)

To create a Microsoft Lodging campaign, follow these steps.

1. Create one or more Microsoft Lodging Campaigns.

    - Set the *Campaign Type* field of the [Campaign](../bulk-service/campaign.md) to *Hotel*.

    - Set the Bid Strategy Type field of [Campaign](../bulk-service/campaign.md) either ManualCPC, PercentCPC, or Commission.
        - The PercentCPC bid strategy requires populating the *Bid Strategy PercentMaxCPC* field.
        - The Commission bid strategy requires populating the *Bid Strategy CommissionRate* field.

2. Upload an [Ad Group](../bulk-service/ad-group.md) and set its *Parent Id* field to the *Id* of the campaign added above.

3. Optionally, you can add Bid Modifier criterions if you wish to change your bid for various properties. These criterions will be a separate row *per criterion*, *per Ad Group* for each criterion that you wish to use. Lodging campaigns support the following criterions:
    - [Campaign Location Criterion](../bulk-service/campaign-location-criterion.md)
        - This is built on Campaign level, not Ad group level
    - [Ad Group Advance Booking Window Criterion](../bulk-service/ad-group-advance-booking-window-criterion.md)
    - [Ad Group Check In Date Criterion](../bulk-service/ad-group-check-in-date-criterion.md)
    - [Ad Group Check In Day Criterion](../bulk-service/ad-group-check-in-day-criterion.md)
    - [Ad Group DeviceOS Criterion](../bulk-service/ad-group-deviceos-criterion.md)
    - [Ad Group Hotel Date Selection Type Criterion](../bulk-service/ad-group-hotel-date-selection-type-criterion.md)
    - [Ad Group Length Of Stay Criterion](../bulk-service/ad-group-length-of-stay-criterion.md)

4. Upload one or more [Ad Group Hotel Listing Group](../bulk-service/ad-group-hotel-listing-group.md) records which represent listing group nodes in a tree structure that will be used to further refine the lodging property offers. Duplicate or conflicting lodging property filters attempted within an ad group's hotel listing group will fail during the upload operation.  

    > [!NOTE]
    > There is a 1 to 1 relationship between ad groups and hotel listing groups. In other words, each ad group has one hotel listing group and vice versa. In the Microsoft Advertising web application, for each ad group you would add one hotel listing group with multiple levels of division or multiple partitions. This is the equivalent of adding ad group level hotel listing groups using the Bing Ads API.

    Please also consider the validation rules described in the [Ad Group Hotel Listing Group](../bulk-service/ad-group-hotel-listing-group.md) documentation.

5. Upload a hotel ad. You must add at least one [Hotel Ad](../bulk-service/product-ad.md) to the corresponding ad group. A hotel ad is not used directly for delivered ad copy. Instead, the delivery engine generates hotel ads from the product details that it finds in your Hotel Center feeds. The hotel ad identifier can be used for reporting analytics.

After you complete these steps, the delivery engine can begin serving hotel ads for the properties that it finds in the customer's Hotel Center feeds. If the user's search query has property intent, the delivery engine searches the customer's Hotel Center feed for properties that match the query. If it finds a property, and the property meets the conditions of the property filters specified in the property scope and hotel listing groups, the delivery engine generates a hotel ad using the property details from the store.

## <a name="lodging-campaignservice"></a>Create a Microsoft Lodging campaign with the Campaign Management Service
To create a Microsoft Lodging campaign with the Campaign Management API, follow these steps.

> [!TIP]
> For code examples that show how to apply product conditions for Microsoft Lodging Campaigns using the Campaign Management service, see [Hotel Ads Code Example](code-example-hotel-ads.md).

1. Create one or more Microsoft Lodging Campaigns.

    - Set the *CampaignType* element of the [Campaign](../campaign-management-service/campaign.md) to *Hotel*.

    - Set the *BiddingScheme* element of the Campaign to either ManualCpcBiddingScheme, PercentCpcBiddingScheme, or CommissionBiddingScheme.

2. Create an [AdGroup](../campaign-management-service/adgroup.md) and add it to the campaign by calling [AddAdGroups](../campaign-management-service/addadgroups.md).
    - Optionally, you can create a [HotelSetting](../campaign-management-service/hotelsetting.md) instance and set its *HotelAdGroupType* (HotelAd, PropertyAd). Add this hotel setting to the *Settings* list of the [Ad group](../campaign-management-service/adgroup.md). If you want your Ad group to support both HPA and PPA, do not create a HotelSetting instance and leave the *Settings* for your Ad group empty.  

3. Create a list of [AdGroupCriterionAction](../campaign-management-service/adgroupcriterion.md) objects in a tree structure that will be used to further refine the properties. The AdGroupCriterions must be of the *HotelGroup* criterion type. Apply the list of actions by calling [ApplyHotelGroupActions](../campaign-management-service/applyhotelgroupactions.md). Duplicate or conflicting property conditions attempted within an ad group's hotel listing group will fail via the  ApplyHotelGroupActions operation.

    > [!NOTE]
    > To retrieve hotel listing groups after they have been applied, call [GetAdGroupCriterionsByIds](../campaign-management-service/getadgroupcriterionsbyids.md) and set the *AdGroupCriterionIds* element to *null* to get all hotel listing groups for the ad group. The hotel listing group with *ParentCriterionId* set to *null* is the root node.

    Please also consider the validation rules described in the [ApplyHotelGroupActions](../campaign-management-service/applyhotelgroupactions.md) documentation.

4. Create a hotel ad. You must add at least one [HotelAd](../campaign-management-service/hotelad.md) to the ad group via the [AddAds](../campaign-management-service/addads.md) operation. A hotel ad is not used directly for delivered ad copy. Instead, the delivery engine generates hotel ads from the property details that it finds in your Hotel Center property feeds. The hotel ad identifier can be used for reporting analytics.

After you complete these steps, the delivery engine can begin serving hotel ads for the properties that it finds in the customer's Hotel Center property feeds. If the user's search query has property intent, the delivery engine searches the customer's Hotel Center property feed for properties that match the query. If it finds a property, and the property meets the conditions of the property filters specified in the hotel listing groups, the delivery engine generates a property ad using the property details from the feed.

## <a name="reports"></a>Performance Statistics for Microsoft Lodging Campaigns
The [Hotel Ads Reports](report-types.md#hotelads) can be submitted and downloaded with the [Reporting Service](../reporting-service/reporting-service-reference.md) to get performance data for Microsoft Lodging Campaigns.

If you request a report using account level scope, then the performance reports will include aggregated data for all campaigns, whether or not the campaign type is Bing Lodging. To only get data for Microsoft Lodging Campaigns, use campaign scope or ad group scope. The following is an example SOAP request that specifies campaign level scope.

```xml
<Scope>
    <AccountIds i:nil="true" xmlns:a="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
    <AdGroups i:nil="true" />
    <Campaigns>
    <CampaignReportScope>
        <AccountId>AccountIdGoesHere</AccountId>
        <CampaignId>CampaignIdGoesHere</CampaignId>
    </CampaignReportScope>
    </Campaigns>
</Scope>
```

For more information about using the [Reporting Service](../reporting-service/reporting-service-reference.md), see [Reporting API Guides](reporting-guides.md) and [Request and Download a Report](request-download-report.md).

> [!NOTE]
> Performance statistics and the product partition tree structure returned by the Reporting service lags behind the performance statistics that you see in the Microsoft Advertising web application by up to an hour.
