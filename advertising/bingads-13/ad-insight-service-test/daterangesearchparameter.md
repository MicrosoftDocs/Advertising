---
title: DateRangeSearchParameter Data Object Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: The date range search parameter that you can include when requesting keyword ideas.(test)
---
# DateRangeSearchParameter Data Object Test - Ad Insight
The date range search parameter that you can include when requesting keyword ideas.

For more information about the significance of the date range search parameter, see *MonthlySearchCounts* with the [KeywordIdea](keywordidea.md) object.

# [XML](#tab/xml)

```xml
<xs:complexType name="DateRangeSearchParameter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:SearchParameter">
      <xs:sequence>
        <xs:element minOccurs="0" name="EndDate" nillable="true" type="tns:DayMonthAndYear" />
        <xs:element minOccurs="0" name="StartDate" nillable="true" type="tns:DayMonthAndYear" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
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

The [DateRangeSearchParameter](daterangesearchparameter.md) object has the following elements: [EndDate](#enddate), [StartDate](#startdate).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="enddate"></a>EndDate|The end date range of monthly search counts for the returned keyword ideas.|[DayMonthAndYear](daymonthandyear.md)|
|<a name="startdate"></a>StartDate|The start date range of monthly search counts for the returned keyword ideas.|[DayMonthAndYear](daymonthandyear.md)|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

