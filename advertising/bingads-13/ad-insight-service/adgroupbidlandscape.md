---
title: AdGroupBidLandscape Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object that contains a list of estimated clicks, cost, and impressions from 1 to 7 days for the ad group identifier given the suggested bid.
---
# AdGroupBidLandscape Data Object - Ad Insight
Defines an object that contains a list of estimated clicks, cost, and impressions from 1 to 7 days for the ad group identifier given the suggested bid.

> [!NOTE]
> The estimates are not a prediction or guarantee of future performance.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AdGroupBidLandscape" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AdGroupId" type="xs:long" />
    <xs:element minOccurs="0" name="AdGroupBidLandscapeType" type="tns:AdGroupBidLandscapeType" />
    <xs:element minOccurs="0" name="StartDate" nillable="true" type="tns:DayMonthAndYear" />
    <xs:element minOccurs="0" name="EndDate" nillable="true" type="tns:DayMonthAndYear" />
    <xs:element minOccurs="0" name="BidLandscapePoints" nillable="true" type="tns:ArrayOfBidLandscapePoint" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AdGroupBidLandscapeType": "ValueHere",
  "AdGroupId": "LongValueHere",
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
  "StartDate": {
    "Day": IntValueHere,
    "Month": IntValueHere,
    "Year": IntValueHere
  }
}
```

-----

## <a name="elements"></a>Elements

The [AdGroupBidLandscape](adgroupbidlandscape.md) object has the following elements: [AdGroupBidLandscapeType](#adgroupbidlandscapetype), [AdGroupId](#adgroupid), [BidLandscapePoints](#bidlandscapepoints), [EndDate](#enddate), [StartDate](#startdate).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adgroupbidlandscapetype"></a>AdGroupBidLandscapeType|Indicates whether all or a subset of an ad group's existing keywords were used to determine the bid landscape.|[AdGroupBidLandscapeType](adgroupbidlandscapetype.md)|
|<a name="adgroupid"></a>AdGroupId|The ad group identifier.|**long**|
|<a name="bidlandscapepoints"></a>BidLandscapePoints|The list of the total estimated clicks, cost, and impressions from *StartDate* to *EndDate* given the suggested bid.|[BidLandscapePoint](bidlandscapepoint.md) array|
|<a name="enddate"></a>EndDate|The most recent date used to calculate the bid landscape. The end date should be approximately 2 days prior to today's date when the service is called.|[DayMonthAndYear](daymonthandyear.md)|
|<a name="startdate"></a>StartDate|The first date used to calculate the bid landscape. The start date is usually seven days prior to the end date.<br/><br/>The difference between the start and end dates could be less than seven if performance data is not available, for example with a new ad group.|[DayMonthAndYear](daymonthandyear.md)|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetBidLandscapeByAdGroupIds](getbidlandscapebyadgroupids.md)  
