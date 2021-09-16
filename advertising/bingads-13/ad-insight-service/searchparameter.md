---
title: SearchParameter Data Object - Ad Insight
ms.service: bing-ads-ad-insight-service
ms.topic: article
author: eric-urban
ms.author: eur
description: This is the base class from which keyword idea search parameter objects derive.
---
# SearchParameter Data Object - Ad Insight
This is the base class from which keyword idea search parameter objects derive. 

Do not try to instantiate a [SearchParameter](searchparameter.md). You can create one or more following objects that derive from it.
- [AuctionSegmentSearchParameter](auctionsegmentsearchparameter.md)
- [CategorySearchParameter](categorysearchparameter.md)  
- [CompetitionSearchParameter](competitionsearchparameter.md)  
- [DateRangeSearchParameter](daterangesearchparameter.md)  
- [DeviceSearchParameter](devicesearchparameter.md)  
- [ExcludeAccountKeywordsSearchParameter](excludeaccountkeywordssearchparameter.md)  
- [IdeaTextSearchParameter](ideatextsearchparameter.md)  
- [ImpressionShareSearchParameter](impressionsharesearchparameter.md)  
- [LanguageSearchParameter](languagesearchparameter.md)  
- [LocationSearchParameter](locationsearchparameter.md)  
- [NetworkSearchParameter](networksearchparameter.md)  
- [QuerySearchParameter](querysearchparameter.md)  
- [SearchVolumeSearchParameter](searchvolumesearchparameter.md)  
- [SuggestedBidSearchParameter](suggestedbidsearchparameter.md)  
- [UrlSearchParameter](urlsearchparameter.md)  

## Syntax
```xml
<xs:complexType name="SearchParameter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence />
</xs:complexType>
```

## <a name="elements"></a>Elements

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetAuctionInsightData](getauctioninsightdata.md)  
[GetKeywordIdeas](getkeywordideas.md)  
