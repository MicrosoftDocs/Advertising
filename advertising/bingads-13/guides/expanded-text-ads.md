---
title: "Expanded Text Ads"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Setup Expanded Text ads with the Bing Ads API.
---
# Expanded Text Ads
The expanded text ad format works seamlessly on mobile, tablet and desktop devices so you can focus more on crafting your longer ad copy and optimizing your ad text to better engage your customers before they click your ad.

[!INCLUDE[exta-to-rsa-migration](../../scripts/includes/exta-rsa-migration.md)]

![expandedtextad](media/expanded-text-ad.png)

> [!NOTE]
> Expanded text ads can only be created in Search campaigns where the [AdGroupType](../campaign-management-service/adgroup.md#adgrouptype) is set to "SearchStandard". If the [AdGroupType](../campaign-management-service/adgroup.md#adgrouptype) is set to "SearchDynamic", then the ad group does not support expanded text ads.  

## <a name="bulk"></a>Bulk API for Expanded Text Ads
The [Expanded Text Ad](../bulk-service/expanded-text-ad.md) Bulk record is available for managing expanded text ads i.e., you can upload or download data in this format.

## <a name="campaign"></a>Campaign Management API for Expanded Text Ads
The [ExpandedTextAd](../campaign-management-service/expandedtextad.md) object is derived from the [Ad](../campaign-management-service/ad.md) base class and can be managed with any of the existing ad operations e.g. [AddAds](../campaign-management-service/addads.md), [DeleteAds](../campaign-management-service/deleteads.md), [GetAdsByAdGroupId](../campaign-management-service/getadsbyadgroupid.md), and [UpdateAds](../campaign-management-service/updateads.md). 

## See Also
[Countdown Customizers](countdown-customizers.md)  
