---
title: UetTagIndustry Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the industry of the website associated with your UET tag.
---
# UetTagIndustry Value Set - Campaign Management
Defines the industry of the website associated with your UET tag.

## Syntax
```xml
<xs:simpleType name="UetTagIndustry" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="AdultGambling" />
    <xs:enumeration value="Autos" />
    <xs:enumeration value="B2BServices" />
    <xs:enumeration value="B2CServices" />
    <xs:enumeration value="CPG" />
    <xs:enumeration value="CareersEducation" />
    <xs:enumeration value="CommunitySocialCharitableGroups" />
    <xs:enumeration value="Entertainment" />
    <xs:enumeration value="FinancialServicesInsurance" />
    <xs:enumeration value="Government" />
    <xs:enumeration value="HealthWellness" />
    <xs:enumeration value="RealEstate" />
    <xs:enumeration value="RestaurantsFood" />
    <xs:enumeration value="Retail" />
    <xs:enumeration value="ScienceSocialScienceOthers" />
    <xs:enumeration value="TechnologyTelecommunications" />
    <xs:enumeration value="TravelTransportation" />
    <xs:enumeration value="Other" />
    <xs:enumeration value="Unknown" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [UetTagIndustry](uettagindustry.md) value set has the following values: [AdultGambling](#adultgambling), [Autos](#autos), [B2BServices](#b2bservices), [B2CServices](#b2cservices), [CareersEducation](#careerseducation), [CommunitySocialCharitableGroups](#communitysocialcharitablegroups), [CPG](#cpg), [Entertainment](#entertainment), [FinancialServicesInsurance](#financialservicesinsurance), [Government](#government), [HealthWellness](#healthwellness), [Other](#other), [RealEstate](#realestate), [RestaurantsFood](#restaurantsfood), [Retail](#retail), [ScienceSocialScienceOthers](#sciencesocialscienceothers), [TechnologyTelecommunications](#technologytelecommunications), [TravelTransportation](#traveltransportation), [Unknown](#unknown).

|Value|Description|
|-----------|---------------|
|<a name="adultgambling"></a>AdultGambling|The industry is AdultGambling.|
|<a name="autos"></a>Autos|The industry is Autos.|
|<a name="b2bservices"></a>B2BServices|The industry is B2BServices.|
|<a name="b2cservices"></a>B2CServices|The industry is B2CServices.|
|<a name="careerseducation"></a>CareersEducation|The industry is Careers/Education.|
|<a name="communitysocialcharitablegroups"></a>CommunitySocialCharitableGroups|The industry is CommunitySocialCharitableGroups.|
|<a name="cpg"></a>CPG|The industry is CPG (consumer packaged goods).|
|<a name="entertainment"></a>Entertainment|The industry is Entertainment.|
|<a name="financialservicesinsurance"></a>FinancialServicesInsurance|The industry is FinancialServicesInsurance.|
|<a name="government"></a>Government|The industry is Government.|
|<a name="healthwellness"></a>HealthWellness|The industry is HealthWellness.|
|<a name="other"></a>Other|The industry is Other.|
|<a name="realestate"></a>RealEstate|The industry is RealEstate.|
|<a name="restaurantsfood"></a>RestaurantsFood|The industry is RestaurantsFood.|
|<a name="retail"></a>Retail|The industry is Retail.|
|<a name="sciencesocialscienceothers"></a>ScienceSocialScienceOthers|The industry is ScienceSocialScienceOthers.|
|<a name="technologytelecommunications"></a>TechnologyTelecommunications|The industry is TechnologyTelecommunications.|
|<a name="traveltransportation"></a>TravelTransportation|The industry is TravelTransportation.|
|<a name="unknown"></a>Unknown|The industry is Unknown.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[UetTag](uettag.md)  
