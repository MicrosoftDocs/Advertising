---
title: WebpageCondition Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a condition or criterion that helps determine whether you want to show dynamic search ads.
---
# WebpageCondition Data Object - Campaign Management
Defines a condition or criterion that helps determine whether you want to show dynamic search ads.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="WebpageCondition" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Argument" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Operand" type="tns:WebpageConditionOperand" />
    <xs:element minOccurs="0" name="Operator" nillable="true" type="tns:WebpageConditionOperator">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Argument": "ValueHere",
  "Operand": "ValueHere",
  "Operator": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [WebpageCondition](webpagecondition.md) object has the following elements: [Argument](#argument), [Operand](#operand), [Operator](#operator).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="argument"></a>Argument|The webpage condition or criterion. The condition is met if the webpage property that is referenced by the operand contains or equals the argument's value.<br/><br/>For example you can set this string to the URL, category, page title, or page content for your site.<br/><br/>*Note:* For Performance Max campaigns, you can only set argument to the URL.<br/><br/>**Add:** Required<br/>**Update:** Not applicable. You cannot update the webpage conditions. To update the conditions you must delete the criterion and add a new criterion.|**string**|
|<a name="operand"></a>Operand|The webpage condition operand.<br/><br/>**Add:** Required<br/>**Update:** Not applicable. You cannot update the webpage conditions. To update the conditions you must delete the criterion and add a new criterion.|[WebpageConditionOperand](webpageconditionoperand.md)|
|<a name="operator"></a>Operator|The webpage condition operator.<br/><br/>**Add:** Optional. Default operator is used when it is not defined. Operator is required only when you use *Operand=URL* and *Operator = Equals*<br/>**Update:** Not applicable. You cannot update the webpage conditions. To update the conditions you must delete the criterion and add a new criterion.<br/><br/>**Default values** <br/><br/> URL/PageTitle/PageContent - **Contains**, Category/CustomLabel - **Equals.**<br/><br/>**Supported  values** <br/><br/>URL - **Contains/Equals**, PageTitle/PageContent - **Contains**, CustomLabel/Category - **Equals**|[WebpageConditionOperator](webpageconditionoperator.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[WebpageParameter](webpageparameter.md)  
