---
title: "Hotel Price Ads Bulk Update"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Update hotels, hotel groups, and hotel associations with the Bulk API.
---
# Hotel Price Ads Bulk Update

[!INCLUDE[coming-soon](../../hotel-ads/includes/property-center-coming-soon.md)]

> [!NOTE]
> Hotel Price Ads is available to select beta participants only. For more information see [Hotel Price Ads](/advertising/hotel-ads/index). 

Hotel Price Ads enables advertisers to showcase their hotels on Bing.com across devices. Travelers can see hotel price ads when they are actively looking to book a hotel.

The Bulk API supports a limited set of update operations for Hotel Price Ads customers. 
- Update [Hotel](hotel.md) bids
- Update [Hotel Group](hotel-group.md) bids
- Update [Hotel Association](hotel-association.md) e.g., add or remove hotel associations. 

Use the Bulk API if you frequently update thousands or more hotels, hotel groups, and associations. You would continue to use the [Hotel Price Ads API](/advertising/hotel-ads/index) to setup and manage most aspects of your Hotel Price Ads campaigns. 

Hotel Price Ads customers new to the Bulk API should first review the [Bulk Upload](bulk-download-upload.md#bulkupload) overview. Although Bulk download is not supported for Hotel Price Ads, you can upload [Hotel](hotel.md), [Hotel Group](hotel-group.md), and [Hotel Association](hotel-association.md) records to make updates. Please note the file format via Bulk API does vary from what is described in [Making bulk changes in Hotel Price Ads](https://help.ads.microsoft.com/#apex/3/en/56882/1) via the Microsoft Hotel Center UI.

Possible column headers include the following CSV row. 

```csv
Type,Name,Id,Parent Id,Client Id,Modified Time,Bid,Bid Type,Site MapResults,Site LocalUniversal,Site PropertyPromotionAd,Device Desktop,Device Mobile,Device Tablet,Length of Stay 1,Length of Stay 2,Length of Stay 3,Length of Stay 4,Length of Stay 5,Length of Stay 6,Length of Stay 7,Length of Stay 8,Length of Stay 9,Length of Stay 10,Length of Stay 11,Length of Stay 12,Length of Stay 13,Length of Stay 14,Country AD,Country AE,Country AF,Country AG,Country AI,Country AL,Country AM,Country AN,Country AO,Country AQ,Country AR,Country AS,Country AT,Country AU,Country AW,Country AZ,Country BA,Country BB,Country BD,Country BE,Country BF,Country BG,Country BH,Country BI,Country BJ,Country BM,Country BN,Country BO,Country BR,Country BS,Country BT,Country BW,Country BY,Country BZ,Country CA,Country CC,Country CD,Country CF,Country CG,Country CH,Country CI,Country CK,Country CL,Country CM,Country CN,Country CO,Country CR,Country CV,Country CX,Country CY,Country CZ,Country DE,Country DJ,Country DK,Country DM,Country DO,Country DZ,Country EC,Country EE,Country EG,Country ER,Country ES,Country ET,Country FI,Country FJ,Country FK,Country FM,Country FO,Country FR,Country GA,Country GB,Country GD,Country GE,Country GF,Country GH,Country GI,Country GL,Country GM,Country GN,Country GP,Country GQ,Country GR,Country GT,Country GU,Country GW,Country GY,Country HK,Country HN,Country HR,Country HT,Country HU,Country ID,Country IE,Country IL,Country IN,Country IQ,Country IS,Country IT,Country JM,Country JO,Country JP,Country KE,Country KG,Country KH,Country KI,Country KM,Country KN,Country KR,Country KW,Country KY,Country KZ,Country LA,Country LB,Country LC,Country LI,Country LK,Country LR,Country LS,Country LT,Country LU,Country LV,Country LY,Country MA,Country MC,Country MD,Country ME,Country MG,Country MH,Country MK,Country ML,Country MM,Country MN,Country MO,Country MP,Country MQ,Country MR,Country MS,Country MT,Country MU,Country MV,Country MW,Country MX,Country MY,Country MZ,Country NA,Country NC,Country NE,Country NF,Country NG,Country NI,Country NL,Country NO,Country NP,Country NR,Country NU,Country NZ,Country OM,Country PA,Country PE,Country PF,Country PG,Country PH,Country PK,Country PL,Country PM,Country PN,Country PR,Country PS,Country PT,Country PW,Country PY,Country QA,Country RE,Country RO,Country RS,Country RU,Country RW,Country SA,Country SB,Country SC,Country SE,Country SG,Country SH,Country SI,Country SK,Country SL,Country SM,Country SN,Country SO,Country SR,Country ST,Country SV,Country SZ,Country TC,Country TD,Country TG,Country TH,Country TJ,Country TK,Country TL,Country TM,Country TN,Country TO,Country TR,Country TT,Country TV,Country TW,Country TZ,Country UA,Country UG,Country US,Country UY,Country UZ,Country VA,Country VC,Country VE,Country VG,Country VI,Country VN,Country VU,Country WF,Country WS,Country YE,Country YT,Country ZA,Country ZM,Country ZW,Checkin Monday,Checkin Tuesday,Checkin Wednesday,Checkin Thursday,Checkin Friday,Checkin Saturday,Checkin Sunday,DateType Default,DateType Selected,Advance Booking Window Min Days 1,Advance Booking Window Min Days 2,Advance Booking Window Min Days 3,Advance Booking Window Min Days 4,Advance Booking Window Min Days 5,Advance Booking Window Min Days 6,Advance Booking Window Min Days 7,Advance Booking Window Min Days 8,Advance Booking Window Min Days 9,Advance Booking Window Min Days 10,Advance Booking Window Multiplier 1,Advance Booking Window Multiplier 2,Advance Booking Window Multiplier 3,Advance Booking Window Multiplier 4,Advance Booking Window Multiplier 5,Advance Booking Window Multiplier 6,Advance Booking Window Multiplier 7,Advance Booking Window Multiplier 8,Advance Booking Window Multiplier 9,Advance Booking Window Multiplier 10
```

For validation rules per record type, please see the [Hotel](hotel.md), [Hotel Group](hotel-group.md), and [Hotel Association](hotel-association.md) topics. 

## See Also
[Hotel Price Ads](/advertising/hotel-ads/index)  
[Bulk Download and Upload](bulk-download-upload.md)  
