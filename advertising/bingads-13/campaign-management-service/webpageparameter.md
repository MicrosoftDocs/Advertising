---
title: WebpageParameter Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines the conditions or criteria that determine whether you want to show dynamic search ads.
---
# WebpageParameter Data Object - Campaign Management
Defines the conditions or criteria that determine whether you want to show dynamic search ads.

## Syntax
```xml
<xs:complexType name="WebpageParameter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Conditions" nillable="true" type="tns:ArrayOfWebpageCondition" />
    <xs:element minOccurs="0" name="CriterionName" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [WebpageParameter](webpageparameter.md) object has the following elements: [Conditions](#conditions), [CriterionName](#criterionname).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="conditions"></a>Conditions|The webpage conditions or criteria.<br/><br/>You may include up to 3 individual [WebpageCondition](webpagecondition.md) objects in the list. Each [WebpageCondition](webpagecondition.md) contains an *Argument* and *Operand* element.<br/><br/>**Add:** Optional for biddable criterion; Required for negative criterion. If no conditions are specified, then you are effectively targeting all webpages.<br/>**Update:** Not allowed. You cannot update the webpage conditions. To update the conditions you must delete the criterion and add a new criterion.|[WebpageCondition](webpagecondition.md) array|
|<a name="criterionname"></a>CriterionName|The criterion name that you can use to identify the criteria, for example you can filter or sort alphabetically.<br/><br/>The criterion name length must be between 1 to 2048, inclusive.<br/><br/>**Add:** Optional. If you do not specify any name, by default the name will be set to a concatenated list of conditions. Each condition will be delimited by the *and* keyword. For example if the conditions are a) *Url contains flower*, b) *Url contains book*, and c) *PageContent contains seattle*, then the default criterion name will be *Url contains flower and Url contains book and PageContent contains seattle*. If you do not specify any name, and if no conditions are specified, then you are effectively targeting all webpages and the name will be set to *All Webpages*. <br/>**Update:** Optional. If you leave this element null or empty the criterion name will not be updated. If you specify an empty string i.e. "", then the criterion name will be updated to the default value i.e. either *All Webpages* or a concatenated list of criterions.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[Webpage](webpage.md)  
