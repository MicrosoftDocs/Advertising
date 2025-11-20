---
title: CampaignBidLandscape Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the CampaignBidLandscape data object, which suggests bids or targets, and contains estimated performance statistics.
---
# CampaignBidLandscape Data Object - Ad Insight
Defines the *CampaignBidLandscape* data object, which suggests bids or targets, and contains estimated performance statistics.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="CampaignBidLandscape" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CampaignId" type="xs:long" />
    <xs:element minOccurs="0" name="CampaignBidLandscapeType" type="tns:CampaignBidLandscapeType" />
    <xs:element minOccurs="0" name="StartDate" nillable="true" type="tns:DayMonthAndYear" />
    <xs:element minOccurs="0" name="EndDate" nillable="true" type="tns:DayMonthAndYear" />
    <xs:element minOccurs="0" name="CampaignBidLandscapePoints" nillable="true" type="tns:ArrayOfCampaignBidLandscapePoint" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "CampaignBidLandscapePoints": [
    {
      "Bid": DoubleValueHere,
      "Clicks": DoubleValueHere,
      "Conversions": DoubleValueHere,
      "ConversionValues": DoubleValueHere,
      "Cost": DoubleValueHere,
      "CurrencyCode": "ValueHere",
      "Impressions": "LongValueHere",
      "MarginalCPC": DoubleValueHere,
      "TargetCpa": DoubleValueHere,
      "TargetRoas": DoubleValueHere,
      "TopImpressions": "LongValueHere"
    }
  ],
  "CampaignBidLandscapeType": "ValueHere",
  "CampaignId": "LongValueHere",
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

The [CampaignBidLandscape](campaignbidlandscape.md) object has the following elements: [CampaignBidLandscapePoints](#campaignbidlandscapepoints), [CampaignBidLandscapeType](#campaignbidlandscapetype), [CampaignId](#campaignid), [EndDate](#enddate), [StartDate](#startdate).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="campaignbidlandscapepoints"></a>CampaignBidLandscapePoints|A list of *CampaignBidLandscapePoint* objects with the total estimated performance from *StartDate* to *EndDate* by the bid or target.|[CampaignBidLandscapePoint](campaignbidlandscapepoint.md) array|
|<a name="campaignbidlandscapetype"></a>CampaignBidLandscapeType|Indicates the campaign bid strategy and landscape type.|[CampaignBidLandscapeType](campaignbidlandscapetype.md)|
|<a name="campaignid"></a>CampaignId|The campaign identifier.|**long**|
|<a name="enddate"></a>EndDate|The most recent date used to calculate the bid landscape. The end date should be set to approximately two days before the current date when *CampaignBidLandscape* is called.|[DayMonthAndYear](daymonthandyear.md)|
|<a name="startdate"></a>StartDate|The first date used to calculate the bid landscape. The start date is usually seven days prior to the end date. The difference between the start and end dates might be less than seven if performance data is not available, e.g., the campaign is new.|[DayMonthAndYear](daymonthandyear.md)|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetBidLandscapeByCampaignIds](getbidlandscapebycampaignids.md)  
