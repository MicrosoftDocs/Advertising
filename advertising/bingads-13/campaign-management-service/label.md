---
title: Label Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines a label object to organize campaigns, ad groups, ads, and keywords into groups.
---
# Label Data Object - Campaign Management
Defines a label object to organize campaigns, ad groups, ads, and keywords into groups. You can then filter and run reports on your labels to get the data that is most meaningful to you.

## Syntax
```xml
<xs:complexType name="Label" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="ColorCode" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Description" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [Label](label.md) object has the following elements: [ColorCode](#colorcode), [Description](#description), [Id](#id), [Name](#name).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="colorcode"></a>ColorCode|The label color as a hexadecimal code.<br/><br/>The hexadecimal value must have the '#' prefix. For example you can use the value of *#FFFFFF* for a white label.<br/><br/>The color can be viewed in the Microsoft Advertising web application. Your application can display the color or utilize the hexadecimal value to categorize a set of labels.<br/><br/>**Add:** Optional. If you do not specify any color, the value will be assigned at random for each label.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. You can update the color code but cannot remove it.|**string**|
|<a name="description"></a>Description|The label description.<br/><br/>The label description can be between 1 to 200 characters in length.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="id"></a>Id|The system-generated identifier of the label.<br/><br/>**Add:** Read-only<br/>**Update:** Required|**long**|
|<a name="name"></a>Name|The label name.<br/><br/>The case-sensitive label name can be between 1 to 80 characters in length, and must be unique across all labels in the account.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddLabels](addlabels.md)  
[GetLabelsByIds](getlabelsbyids.md)  
[UpdateLabels](updatelabels.md)  
