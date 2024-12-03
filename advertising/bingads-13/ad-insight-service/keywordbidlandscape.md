---
title: KeywordBidLandscape Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object that contains a list of estimated clicks, cost, and impressions from 1 to 7 days for the keyword identifier given the suggested bid.
---
# KeywordBidLandscape Data Object - Ad Insight
Defines an object that contains a list of estimated clicks, cost, and impressions from 1 to 7 days for the keyword identifier given the suggested bid.

> [!NOTE]
> The estimates are not a prediction or guarantee of future performance.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="KeywordBidLandscape" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="KeywordId" type="xs:long" />
    <xs:element minOccurs="0" name="StartDate" nillable="true" type="tns:DayMonthAndYear" />
    <xs:element minOccurs="0" name="EndDate" nillable="true" type="tns:DayMonthAndYear" />
    <xs:element minOccurs="0" name="BidLandscapePoints" nillable="true" type="tns:ArrayOfBidLandscapePoint" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "BidLandscapePoints": [
    {
      "Bid": DoubleValueHere,
      "Clicks": DoubleValueHere,
      "Cost": DoubleValueHere,
      "CurrencyCode": "ValueHere",
      "Impressions": "LongValueHere",
      "MarginalCPC": DoubleValueHere,
      "TopImpressions": "LongValueHere"
    }
  ],
  "EndDate": {
    "Day": IntValueHere,
    "Month": IntValueHere,
    "Year": IntValueHere
  },
  "KeywordId": "LongValueHere",
  "StartDate": {
    "Day": IntValueHere,
    "Month": IntValueHere,
    "Year": IntValueHere
  }
}
```

-----

## <a name="elements"></a>Elements

The [KeywordBidLandscape](keywordbidlandscape.md) object has the following elements: [BidLandscapePoints](#bidlandscapepoints), [EndDate](#enddate), [KeywordId](#keywordid), [StartDate](#startdate).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="bidlandscapepoints"></a>BidLandscapePoints|The list of the total estimated clicks, cost, and impressions from *StartDate* to *EndDate* given the suggested bid.|[BidLandscapePoint](bidlandscapepoint.md) array|
|<a name="enddate"></a>EndDate|The most recent date used to calculate the bid landscape. The end date should be approximately 2 days prior to today's date when the service is called.|[DayMonthAndYear](daymonthandyear.md)|
|<a name="keywordid"></a>KeywordId|The keyword identifier.|**long**|
|<a name="startdate"></a>StartDate|The first date used to calculate the bid landscape. The start date is usually seven days prior to the end date.<br/><br/>The difference between the start and end dates could be less than seven if performance data is not available, for example with a new keyword.|[DayMonthAndYear](daymonthandyear.md)|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetBidLandscapeByKeywordIds](getbidlandscapebykeywordids.md)  
