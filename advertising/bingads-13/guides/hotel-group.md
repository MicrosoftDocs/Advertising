---
title: "Hotel Group Record - Bulk"
ms.service: bing-ads
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Hotel Group fields in a Bulk file. 
ms.subservice: bulk-api
---
# Hotel Group Record - Bulk
Defines the Hotel Group record that can be uploaded in a Bulk file. 

> [!NOTE]
> This page references a version of Hotel Ads that is not deprecated, but replaced. We recommend that you use [AdGroupHotelListingGroup](../bulk-service/ad-group-hotel-listing-group.md) for bulk actions.

The following Bulk CSV example would update the Hotel Group bid and tablet bid multiplier. 

```csv
Type,Name,Id,Parent Id,Client Id,Modified Time,Bid,Bid Type,Device Tablet
Format Version,6,,,,,,,
Hotel Group,,HotelGroupIdGoesHere,SubAccountIdGoesHere,MyHotelGroupClientId,,13.2,Fixed,1.06
```

For a *Hotel Group* record, the following attribute fields are available via [Bulk Upload](bulk-download-upload.md#bulkupload). 

- [Advance Booking Window Min Days 1-10](#advancebookingwindowmindays)
- [Advance Booking Window Multiplier 1-10](#advancebookingwindowmultiplier)
- [Bid](#bid)
- [Bid Multiplier Source](#bidmultipliersource)
- [Bid Type](#bidtype)
- [Checkin Monday - Sunday](#checkin)
- [Client Id](#clientid)
- [Country AA-ZZ](#country)
- [DateType Default](#datetypedefault)
- [DateType Selected](#datetypeselected)
- [Device Desktop](#devicedesktop)
- [Device Mobile](#devicemobile)
- [Device Tablet](#devicetablet)
- [Id](#id)
- [Length of Stay 1-14](#lengthofstay)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Site LocalUniversal](#sitelocaluniversal)
- [Site MapResults](#sitemapresults)
- [Site PropertyPromotionAd](#sitepropertypromotionad)

> [!IMPORTANT]
> The hotel can inherit the [Bid](#bid) from its parent hotel group, while specifying its own bid multipliers, or vice versa. Bid multipliers include [Advance Booking Window Multiplier 1-10](#advancebookingwindowmultiplier), [Checkin Monday - Sunday](#checkin), [Country AA-ZZ](#country), [DateType Default](#datetypedefault), [DateType Selected](#datetypeselected), [Device Desktop](#devicedesktop), [Device Mobile](#devicemobile), [Device Tablet](#devicetablet), [Length of Stay 1-14](#lengthofstay), [Site LocalUniversal](#sitelocaluniversal), [Site MapResults](#sitemapresults), and [Site PropertyPromotionAd](#sitepropertypromotionad). 
> 
> If any bid multipliers are set for a hotel group, then the hotel group will not inherit any bid multipliers from its parent subaccount. If you only want to update the bid, be sure to leave all bid multipliers empty. If the hotel group already has bid multipliers and you want to start inheriting the parent subaccount's bid multipliers, then you can either set [Bid Multiplier Source](#bidmultipliersource) to "InheritFromParent" or delete each hotel group bid multiplier.  
> 
> Separately, to remove the hotel group's bid and inherit the subaccount bid, you only need to set the [Bid](#bid) field to "delete_value".


## <a name="advancebookingwindowmindays"></a>Advance Booking Window Min Days 1-10
Adjust your bids based on how many days in advance the reservation is being made, also known as advanced booking window (ABW). 

The bulk file includes up to 10 ABW min days columns, i.e., *Advance Booking Window Min Days 1*, *Advance Booking Window Min Days 2*, *Advance Booking Window Min Days 3*, *Advance Booking Window Min Days 4*, *Advance Booking Window Min Days 5*, *Advance Booking Window Min Days 6*, *Advance Booking Window Min Days 7*, *Advance Booking Window Min Days 8*, *Advance Booking Window Min Days 9*, and *Advance Booking Window Min Days 10*. 

The min days column specifies the minimum number of days in the ABW range between 1 - 90 to apply the multiplier to. The corresponding [Advance Booking Window Multiplier 1-10](#advancebookingwindowmultiplier) column defines the multiplier factor. 

**Update:** Optional. To remove an existing ABW min day and multiplier, set this min bid field to the min day that you want to remove and set the corresponding [Advance Booking Window Multiplier 1-10](#advancebookingwindowmultiplier) field to "delete_value".   

## <a name="advancebookingwindowmultiplier"></a>Advance Booking Window Multiplier 1-10
The percentage multiplier used to adjust the base bid for the corresponding [Advance Booking Window Min Days 1-10](#advancebookingwindowmindays) (ABW). 

The bulk file includes up to 10 ABW multiplier columns, i.e., *Advance Booking Window Multiplier 1*, *Advance Booking Window Multiplier 2*, *Advance Booking Window Multiplier 3*, *Advance Booking Window Multiplier 4*, *Advance Booking Window Multiplier 5*, *Advance Booking Window Multiplier 6*, *Advance Booking Window Multiplier 7*, *Advance Booking Window Multiplier 8*, *Advance Booking Window Multiplier 9*, and *Advance Booking Window Multiplier 10*. 

The valid range for this field is 0.00 through 11.00. Values less than 1.00 will decrease the base bid by up to 100% (0.00). Values greater than 1.00 will increase the base bid up to 1,000% (11.00). Set this field to 1.00 if you do not want to adjust the base bid. 

For example, if the fixed bid is $5 and the multiplier is 1.05, the final bid is $5.25. Using the same multiplier, if the percentage bid is 5% and the total room rate is $100, the final bid is $5.25.

**Update:** Optional. To remove an existing ABW min day and multiplier, set the corresponding [Advance Booking Window Min Days 1-10](#advancebookingwindowmindays) field to the min day that you want to remove and this multiplier field to "delete_value".      

## <a name="bid"></a>Bid
The base bid that hotels in the group inherit if they don't specify a bid. 

The valid range is 0.00 through 1000.00. 

If the [Bid Type](#bidtype) is "Fixed", this [Bid](#bid) field is the fixed per-night bid amount. For example, if the bid is 3.50 and the itinerary is for a 3-night stay, the final bid is 10.50. For details about the valid bid range for your account's currency, see the [Bid and Budget Currencies](currencies.md#bidandbudget) section in the [Currencies](currencies.md) topic. 

If the [Bid Type](#bidtype) is "Percentage", this [Bid](#bid) field is based on the percentage of the per night total room rate, including taxes and other fees. For example, to bid 3 percent of the room's total rate, set this field to 3.0. In effect if the total room rate is $99, and the itinerary is for a 3-night stay, then the final bid is $8.91. 

**Update:** Optional. To remove the hotel group's bid and inherit the subaccount bid, set this field to "delete_value".  

## <a name="bidmultipliersource"></a>Bid Multiplier Source
Determines whether to inherit the subaccount bid multipliers. 

If you set this field to "InheritFromParent", the hotel group bid multiplier fields will be ignored and the hotel group will inherit the bid multipliers from its parent subaccount. 

Bid multipliers include [Advance Booking Window Multiplier 1-10](#advancebookingwindowmultiplier), [Checkin Monday - Sunday](#checkin), [Country AA-ZZ](#country), [DateType Default](#datetypedefault), [DateType Selected](#datetypeselected), [Device Desktop](#devicedesktop), [Device Mobile](#devicemobile), [Device Tablet](#devicetablet), [Length of Stay 1-14](#lengthofstay), [Site LocalUniversal](#sitelocaluniversal), [Site MapResults](#sitemapresults), and [Site PropertyPromotionAd](#sitepropertypromotionad). 

If this field is empty and if any bid multipliers are set for a hotel group, then the hotel group will cease to inherit any bid multipliers from its parent subaccount. 

The hotel group can inherit the [Bid](#bid) from its parent subaccount, while specifying its own bid multipliers, or vice versa. To remove the hotel group's bid and inherit the subaccount bid, you only need to set the [Bid](#bid) field to "delete_value".

**Update:** Optional. To remove the hotel group's bid multipliers and inherit the subaccount bid multipliers, set this field to "InheritFromParent".  

## <a name="bidtype"></a>Bid Type
Determines whether the [Bid](#bid) is a fixed amount or percentage. 

You can set this field to "Fixed" or "Percentage". 

To pause all hotels in the group, specify a percentage bid and set its bid amount to zero (0).

**Update:** Optional. If the [Bid](#bid) is set to "delete_value", this field is ignored.   

## <a name="checkin"></a>Checkin Monday - Sunday
Adjust your bids if the user checks in on one of the specified weekdays.  

The bulk file includes up to 7 checkin columns, i.e., *Checkin Monday*, *Checkin Tuesday*, *Checkin Wednesday*, *Checkin Thursday*, *Checkin Friday*, *Checkin Saturday*, and *Checkin Sunday*. 

The valid range for this field is 0.00 through 11.00. Values less than 1.00 will decrease the base bid by up to 100% (0.00). Values greater than 1.00 will increase the base bid up to 1,000% (11.00). Set this field to 1.00 if you do not want to adjust the base bid. 

For example, if the fixed bid is $5 and the multiplier is 1.05, the final bid is $5.25. Using the same multiplier, if the percentage bid is 5% and the total room rate is $100, the final bid is $5.25.

**Update:** Optional. To remove an existing checkin bid multiplier, set the corresponding field to "delete_value". For example, if you no longer want to modify the base bid on Wednesdays, set the *Checkin Wednesday* field to "delete_value". 

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Update:** Optional    

## <a name="country"></a>Country AA-ZZ
Adjust the base bid by if the user accesses one of the Bing domains. 

The multiplier is applied if the user accesses the Bing domain with the corresponding country code. For example, if you set bid multipliers in the *Country US* and *Country DE* fields, Microsoft uses the multipliers if the user uses Bing.com with the us or de country code (for example, bing.com?cc=de).

The bulk file includes columns for each country code, e.g., *Country AD*, *Country AE*, *Country AF*, *Country AG*, *Country AI*, *Country AL*, *Country AM*, *Country AN*, *Country AO*, *Country AQ*, *Country AR*, *Country AS*, *Country AT*, *Country AU*, *Country AW*, *Country AZ*, *Country BA*, *Country BB*, *Country BD*, *Country BE*, *Country BF*, *Country BG*, *Country BH*, *Country BI*, *Country BJ*, *Country BM*, *Country BN*, *Country BO*, *Country BR*, *Country BS*, *Country BT*, *Country BW*, *Country BY*, *Country BZ*, *Country CA*, *Country CC*, *Country CD*, *Country CF*, *Country CG*, *Country CH*, *Country CI*, *Country CK*, *Country CL*, *Country CM*, *Country CN*, *Country CO*, *Country CR*, *Country CV*, *Country CX*, *Country CY*, *Country CZ*, *Country DE*, *Country DJ*, *Country DK*, *Country DM*, *Country DO*, *Country DZ*, *Country EC*, *Country EE*, *Country EG*, *Country ER*, *Country ES*, *Country ET*, *Country FI*, *Country FJ*, *Country FK*, *Country FM*, *Country FO*, *Country FR*, *Country GA*, *Country GB*, *Country GD*, *Country GE*, *Country GF*, *Country GH*, *Country GI*, *Country GL*, *Country GM*, *Country GN*, *Country GP*, *Country GQ*, *Country GR*, *Country GT*, *Country GU*, *Country GW*, *Country GY*, *Country HK*, *Country HN*, *Country HR*, *Country HT*, *Country HU*, *Country ID*, *Country IE*, *Country IL*, *Country IN*, *Country IQ*, *Country IS*, *Country IT*, *Country JM*, *Country JO*, *Country JP*, *Country KE*, *Country KG*, *Country KH*, *Country KI*, *Country KM*, *Country KN*, *Country KR*, *Country KW*, *Country KY*, *Country KZ*, *Country LA*, *Country LB*, *Country LC*, *Country LI*, *Country LK*, *Country LR*, *Country LS*, *Country LT*, *Country LU*, *Country LV*, *Country LY*, *Country MA*, *Country MC*, *Country MD*, *Country ME*, *Country MG*, *Country MH*, *Country MK*, *Country ML*, *Country MM*, *Country MN*, *Country MO*, *Country MP*, *Country MQ*, *Country MR*, *Country MS*, *Country MT*, *Country MU*, *Country MV*, *Country MW*, *Country MX*, *Country MY*, *Country MZ*, *Country NA*, *Country NC*, *Country NE*, *Country NF*, *Country NG*, *Country NI*, *Country NL*, *Country NO*, *Country NP*, *Country NR*, *Country NU*, *Country NZ*, *Country OM*, *Country PA*, *Country PE*, *Country PF*, *Country PG*, *Country PH*, *Country PK*, *Country PL*, *Country PM*, *Country PN*, *Country PR*, *Country PS*, *Country PT*, *Country PW*, *Country PY*, *Country QA*, *Country RE*, *Country RO*, *Country RS*, *Country RU*, *Country RW*, *Country SA*, *Country SB*, *Country SC*, *Country SE*, *Country SG*, *Country SH*, *Country SI*, *Country SK*, *Country SL*, *Country SM*, *Country SN*, *Country SO*, *Country SR*, *Country ST*, *Country SV*, *Country SZ*, *Country TC*, *Country TD*, *Country TG*, *Country TH*, *Country TJ*, *Country TK*, *Country TL*, *Country TM*, *Country TN*, *Country TO*, *Country TR*, *Country TT*, *Country TV*, *Country TW*, *Country TZ*, *Country UA*, *Country UG*, *Country US*, *Country UY*, *Country UZ*, *Country VA*, *Country VC*, *Country VE*, *Country VG*, *Country VI*, *Country VN*, *Country VU*, *Country WF*, *Country WS*, *Country YE*, *Country YT*, *Country ZA*, *Country ZM*, and *Country ZW*. 

The valid range for this field is 0.00 through 11.00. Values less than 1.00 will decrease the base bid by up to 100% (0.00). Values greater than 1.00 will increase the base bid up to 1,000% (11.00). Set this field to 1.00 if you do not want to adjust the base bid. 

For example, if the fixed bid is $5 and the multiplier is 1.05, the final bid is $5.25. Using the same multiplier, if the percentage bid is 5% and the total room rate is $100, the final bid is $5.25.

**Update:** Optional. To remove an existing country bid multiplier, set the corresponding field to "delete_value". For example, if you no longer want to modify the base bid for US and DE, set both the *Country US* and *Country DE* fields to "delete_value". 

## <a name="datetypedefault"></a>DateType Default
Adjust the base bid if the user didn't search for hotels using specific dates. 

The valid range for this field is 0.00 through 11.00. Values less than 1.00 will decrease the base bid by up to 100% (0.00). Values greater than 1.00 will increase the base bid up to 1,000% (11.00). Set this field to 1.00 if you do not want to adjust the base bid. 

For example, if the fixed bid is $5 and the multiplier is 1.05, the final bid is $5.25. Using the same multiplier, if the percentage bid is 5% and the total room rate is $100, the final bid is $5.25.

**Update:** Optional. To remove an existing default date bid multiplier, set this field to "delete_value". 

## <a name="datetypeselected"></a>DateType Selected
Adjust the base bid if the user searched for hotels using specific dates. 

The valid range for this field is 0.00 through 11.00. Values less than 1.00 will decrease the base bid by up to 100% (0.00). Values greater than 1.00 will increase the base bid up to 1,000% (11.00). Set this field to 1.00 if you do not want to adjust the base bid. 

For example, if the fixed bid is $5 and the multiplier is 1.05, the final bid is $5.25. Using the same multiplier, if the percentage bid is 5% and the total room rate is $100, the final bid is $5.25.

**Update:** Optional. To remove an existing selected date bid multiplier, set this field to "delete_value". 

## <a name="devicedesktop"></a>Device Desktop
Adjust the base bid if the user is using a desktop device to search for hotels. 

The valid range for this field is 0.00 through 11.00. Values less than 1.00 will decrease the base bid by up to 100% (0.00). Values greater than 1.00 will increase the base bid up to 1,000% (11.00). Set this field to 1.00 if you do not want to adjust the base bid. 

For example, if the fixed bid is $5 and the multiplier is 1.05, the final bid is $5.25. Using the same multiplier, if the percentage bid is 5% and the total room rate is $100, the final bid is $5.25.

**Update:** Optional. To remove an existing desktop bid multiplier, set this field to "delete_value". 

## <a name="devicemobile"></a>Device Mobile
Adjust the base bid if the user is using a smartphone device to search for hotels. 

The valid range for this field is 0.00 through 11.00. Values less than 1.00 will decrease the base bid by up to 100% (0.00). Values greater than 1.00 will increase the base bid up to 1,000% (11.00). Set this field to 1.00 if you do not want to adjust the base bid. 

For example, if the fixed bid is $5 and the multiplier is 1.05, the final bid is $5.25. Using the same multiplier, if the percentage bid is 5% and the total room rate is $100, the final bid is $5.25.

**Update:** Optional. To remove an existing smartphone bid multiplier, set this field to "delete_value". 

## <a name="devicetablet"></a>Device Tablet
Adjust the base bid if the user is using a tablet device to search for hotels. 

The valid range for this field is 0.00 through 11.00. Values less than 1.00 will decrease the base bid by up to 100% (0.00). Values greater than 1.00 will increase the base bid up to 1,000% (11.00). Set this field to 1.00 if you do not want to adjust the base bid. 

For example, if the fixed bid is $5 and the multiplier is 1.05, the final bid is $5.25. Using the same multiplier, if the percentage bid is 5% and the total room rate is $100, the final bid is $5.25.

**Update:** Optional. To remove an existing tablet bid multiplier, set this field to "delete_value". 

## <a name="id"></a>Id
A system-generated ID that uniquely identifies the hotel group.

**Update:** Read-only and Required  

## <a name="lengthofstay"></a>Length of Stay 1-14
Adjust your bids if the user stays the specified number of nights or longer.  

The bulk file includes up to 14 length of stay multiplier columns, i.e., *Length of Stay 1*, *Length of Stay 2*, *Length of Stay 3*, *Length of Stay 4*, *Length of Stay 5*, *Length of Stay 6*, *Length of Stay 7*, *Length of Stay 8*, *Length of Stay 9*, *Length of Stay 10*, *Length of Stay 11*, *Length of Stay 12*, *Length of Stay 13*, and *Length of Stay 14*. 

The column suffix represents the minimum number of nights required to apply the multiplier. The multiplier is applied if the user is staying the specified number of nights or longer, up to the next highest length of stay multiplier, if one is set. For example, if *Length of Stay 1* is set to 1.10 and *Length of Stay 1* is set to 1.20, the 10 percent multiplier is applied for stays from 1-7 nights, and the 20 percent multiplier is applied for stays of 8 or more nights. 

The valid range for this field is 0.00 through 11.00. Values less than 1.00 will decrease the base bid by up to 100% (0.00). Values greater than 1.00 will increase the base bid up to 1,000% (11.00). Set this field to 1.00 if you do not want to adjust the base bid. 

For example, if the fixed bid is $5 and the multiplier is 1.05, the final bid is $5.25. Using the same multiplier, if the percentage bid is 5% and the total room rate is $100, the final bid is $5.25.

**Update:** Optional. To remove an existing length of stay bid multiplier, set the corresponding field to "delete_value". For example, if you no longer want to modify the base bid for stays of 8 or more nights, set the *Length of Stay 8* field to "delete_value". 

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Update:** Read-only  

## <a name="parentid"></a>Parent Id
A system-generated ID that uniquely identifies the subaccount that contains the hotel group. 

A subaccount defines the top-level hotel price ads grouping. You can think of this logically as a hotel campaign.

**Update:** Read-only and Required  

## <a name="sitelocaluniversal"></a>Site LocalUniversal
Adjust the base bid if the user is searching for hotels on Bing.com. 

The valid range for this field is 0.00 through 11.00. Values less than 1.00 will decrease the base bid by up to 100% (0.00). Values greater than 1.00 will increase the base bid up to 1,000% (11.00). Set this field to 1.00 if you do not want to adjust the base bid. 

For example, if the fixed bid is $5 and the multiplier is 1.05, the final bid is $5.25. Using the same multiplier, if the percentage bid is 5% and the total room rate is $100, the final bid is $5.25.

**Update:** Optional. To remove an existing bid multiplier, set this field to "delete_value". 

## <a name="sitemapresults"></a>Site MapResults
Adjust the base bid if the user is searching for hotels on Bing.com/maps. 

The valid range for this field is 0.00 through 11.00. Values less than 1.00 will decrease the base bid by up to 100% (0.00). Values greater than 1.00 will increase the base bid up to 1,000% (11.00). Set this field to 1.00 if you do not want to adjust the base bid. 

For example, if the fixed bid is $5 and the multiplier is 1.05, the final bid is $5.25. Using the same multiplier, if the percentage bid is 5% and the total room rate is $100, the final bid is $5.25.

**Update:** Optional. To remove an existing bid multiplier, set this field to "delete_value". 

## <a name="sitepropertypromotionad"></a>Site PropertyPromotionAd
Adjust the base bid if the hotel ad is shown in the first results page shown in the maps search. 

> [!NOTE]
> Site PropertyPromotionAd is only available for pilot customers ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 764).  

The valid range for this field is 0.00 through 11.00. Values less than 1.00 will decrease the base bid by up to 100% (0.00). Values greater than 1.00 will increase the base bid up to 1,000% (11.00). Set this field to 1.00 if you do not want to adjust the base bid. 

For example, if the fixed bid is $5 and the multiplier is 1.05, the final bid is $5.25. Using the same multiplier, if the percentage bid is 5% and the total room rate is $100, the final bid is $5.25.

**Update:** Optional. To remove an existing bid multiplier, set this field to "delete_value". 

