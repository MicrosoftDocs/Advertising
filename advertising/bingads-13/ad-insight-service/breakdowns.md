---
title: Breakdowns Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object for the audience breakdown categories.
---
# Breakdowns Data Object - Ad Insight
Defines an object for the audience breakdown categories.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="Breakdowns" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Age" nillable="true" type="tns:Breakdown" />
    <xs:element minOccurs="0" name="Device" nillable="true" type="tns:Breakdown" />
    <xs:element minOccurs="0" name="Gender" nillable="true" type="tns:Breakdown" />
    <xs:element minOccurs="0" name="InMarket" nillable="true" type="tns:Breakdown" />
    <xs:element minOccurs="0" name="Industry" nillable="true" type="tns:Breakdown" />
    <xs:element minOccurs="0" name="JobFunction" nillable="true" type="tns:Breakdown" />
    <xs:element minOccurs="0" name="LocationCountry" nillable="true" type="tns:LocationBreakdown" />
    <xs:element minOccurs="0" name="Location" nillable="true" type="tns:LocationBreakdown" />
    <xs:element minOccurs="0" name="LocationSubGeography" nillable="true" type="tns:LocationBreakdown" />
    <xs:element minOccurs="0" name="LocationMetroArea" nillable="true" type="tns:LocationBreakdown" />
    <xs:element minOccurs="0" name="LocationCity" nillable="true" type="tns:LocationBreakdown" />
    <xs:element minOccurs="0" name="LocationPostalCode" nillable="true" type="tns:LocationBreakdown" />
    <xs:element minOccurs="0" name="LocationCounty" nillable="true" type="tns:LocationBreakdown" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Age": {
    "GlobalValues": [
      IntValueHere
    ],
    "Keys": [
      "ValueHere"
    ],
    "Values": [
      IntValueHere
    ],
    "Type": "LocationBreakdown",
    "Info": [
      {
        "Name": "ValueHere"
      }
    ]
  },
  "Device": {
    "GlobalValues": [
      IntValueHere
    ],
    "Keys": [
      "ValueHere"
    ],
    "Values": [
      IntValueHere
    ],
    "Type": "LocationBreakdown",
    "Info": [
      {
        "Name": "ValueHere"
      }
    ]
  },
  "Gender": {
    "GlobalValues": [
      IntValueHere
    ],
    "Keys": [
      "ValueHere"
    ],
    "Values": [
      IntValueHere
    ],
    "Type": "LocationBreakdown",
    "Info": [
      {
        "Name": "ValueHere"
      }
    ]
  },
  "Industry": {
    "GlobalValues": [
      IntValueHere
    ],
    "Keys": [
      "ValueHere"
    ],
    "Values": [
      IntValueHere
    ],
    "Type": "LocationBreakdown",
    "Info": [
      {
        "Name": "ValueHere"
      }
    ]
  },
  "InMarket": {
    "GlobalValues": [
      IntValueHere
    ],
    "Keys": [
      "ValueHere"
    ],
    "Values": [
      IntValueHere
    ],
    "Type": "LocationBreakdown",
    "Info": [
      {
        "Name": "ValueHere"
      }
    ]
  },
  "JobFunction": {
    "GlobalValues": [
      IntValueHere
    ],
    "Keys": [
      "ValueHere"
    ],
    "Values": [
      IntValueHere
    ],
    "Type": "LocationBreakdown",
    "Info": [
      {
        "Name": "ValueHere"
      }
    ]
  },
  "Location": {
    "Info": [
      {
        "Name": "ValueHere"
      }
    ]
  },
  "LocationCity": {
    "Info": [
      {
        "Name": "ValueHere"
      }
    ]
  },
  "LocationCountry": {
    "Info": [
      {
        "Name": "ValueHere"
      }
    ]
  },
  "LocationCounty": {
    "Info": [
      {
        "Name": "ValueHere"
      }
    ]
  },
  "LocationMetroArea": {
    "Info": [
      {
        "Name": "ValueHere"
      }
    ]
  },
  "LocationPostalCode": {
    "Info": [
      {
        "Name": "ValueHere"
      }
    ]
  },
  "LocationSubGeography": {
    "Info": [
      {
        "Name": "ValueHere"
      }
    ]
  }
}
```

-----

## <a name="elements"></a>Elements

The [Breakdowns](breakdowns.md) object has the following elements: [Age](#age), [Device](#device), [Gender](#gender), [Industry](#industry), [InMarket](#inmarket), [JobFunction](#jobfunction), [Location](#location), [LocationCity](#locationcity), [LocationCountry](#locationcountry), [LocationCounty](#locationcounty), [LocationMetroArea](#locationmetroarea), [LocationPostalCode](#locationpostalcode), [LocationSubGeography](#locationsubgeography).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="age"></a>Age|The audience breakdown category is *Age*.|[Breakdown](breakdown.md)|
|<a name="device"></a>Device|The audience breakdown category is *Device*.|[Breakdown](breakdown.md)|
|<a name="gender"></a>Gender|The audience breakdown category is *Gender*.|[Breakdown](breakdown.md)|
|<a name="industry"></a>Industry|The audience breakdown category is *Industry*.|[Breakdown](breakdown.md)|
|<a name="inmarket"></a>InMarket|The audience breakdown category is *InMarket*.|[Breakdown](breakdown.md)|
|<a name="jobfunction"></a>JobFunction|The audience breakdown category is *JobFunction*.|[Breakdown](breakdown.md)|
|<a name="location"></a>Location|The audience breakdown category is *Location*.|[LocationBreakdown](locationbreakdown.md)|
|<a name="locationcity"></a>LocationCity|The audience breakdown category is *LocationCity*.|[LocationBreakdown](locationbreakdown.md)|
|<a name="locationcountry"></a>LocationCountry|The audience breakdown category is *LocationCountry*.|[LocationBreakdown](locationbreakdown.md)|
|<a name="locationcounty"></a>LocationCounty|The audience breakdown category is *LocationCounty*.|[LocationBreakdown](locationbreakdown.md)|
|<a name="locationmetroarea"></a>LocationMetroArea|The audience breakdown category is *LocationMetroArea*.|[LocationBreakdown](locationbreakdown.md)|
|<a name="locationpostalcode"></a>LocationPostalCode|The audience breakdown category is *LocationPostalCode*.|[LocationBreakdown](locationbreakdown.md)|
|<a name="locationsubgeography"></a>LocationSubGeography|The audience breakdown category is *LocationSubGeography*.|[LocationBreakdown](locationbreakdown.md)|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetAudienceBreakdown](getaudiencebreakdown.md)  
