---
title: ApplicationFault Data Object - Customer Billing
ms.service: bing-ads-customer-billing-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines the base object from which all Customer Billing fault detail objects derive.
---
# ApplicationFault Data Object - Customer Billing
Defines the base object from which all Customer Billing fault detail objects derive.

## Syntax
```xml
<xs:complexType name="ApplicationFault" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="TrackingId" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ApplicationFault](applicationfault.md) object has the following elements: [TrackingId](#trackingid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="trackingid"></a>TrackingId|The identifier of the log entry that contains the details of the API call.|**string**|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://adapi.microsoft.com  

