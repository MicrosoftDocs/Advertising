---
title: NewCustomerAcquisitionGoalSetting Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the new customer acquisition goal setting data object.
---
# NewCustomerAcquisitionGoalSetting Data Object - Campaign Management
Defines the new customer acquisition goal setting data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="NewCustomerAcquisitionGoalSetting" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Setting">
      <xs:sequence>
        <xs:element minOccurs="0" name="AdditionalConversionValue" nillable="true" type="xs:decimal" />
        <xs:element minOccurs="0" name="NewCustomerAcquisitionBidOnlyMode" nillable="true" type="xs:boolean" />
        <xs:element minOccurs="0" name="NewCustomerAcquisitionGoalId" nillable="true" type="xs:long" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "NewCustomerAcquisitionGoalSetting",
  "AdditionalConversionValue": DecimalValueHere,
  "NewCustomerAcquisitionBidOnlyMode": "ValueHere",
  "NewCustomerAcquisitionGoalId": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [NewCustomerAcquisitionGoalSetting](newcustomeracquisitiongoalsetting.md) object has the following elements: [AdditionalConversionValue](#additionalconversionvalue), [NewCustomerAcquisitionBidOnlyMode](#newcustomeracquisitionbidonlymode), [NewCustomerAcquisitionGoalId](#newcustomeracquisitiongoalid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="additionalconversionvalue"></a>AdditionalConversionValue|The target amount you want to pay for a new customer's purchase of your product or service.|**decimal**|
|<a name="newcustomeracquisitionbidonlymode"></a>NewCustomerAcquisitionBidOnlyMode|Enable new customer acqisition bid only mode.|**boolean**|
|<a name="newcustomeracquisitiongoalid"></a>NewCustomerAcquisitionGoalId|The identifier for the new customer acquisition goal.|**long**|

The [NewCustomerAcquisitionGoalSetting](newcustomeracquisitiongoalsetting.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssetting"></a>Inherited Elements from Setting
The [NewCustomerAcquisitionGoalSetting](newcustomeracquisitiongoalsetting.md) object derives from the [Setting](setting.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [NewCustomerAcquisitionGoalSetting](newcustomeracquisitiongoalsetting.md), and might not apply to other objects that inherit the same elements from the [Setting](setting.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of setting.<br/><br/>For more information, see [Setting Data Object Remarks](setting.md#remarks).|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

