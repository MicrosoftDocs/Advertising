---
title: OperationError Data Object - Customer Billing
ms.service: bing-ads-customer-billing-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines a Customer Billing operation error object that contains the details that explain why the service operation failed.
---
# OperationError Data Object - Customer Billing
Defines a Customer Billing operation error object that contains the details that explain why the service operation failed.

## Syntax
```xml
<xs:complexType name="OperationError" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Code" type="xs:int" />
    <xs:element minOccurs="0" name="Details" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Message" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [OperationError](operationerror.md) object has the following elements: [Code](#code), [Details](#details), [Message](#message).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="code"></a>Code|A numeric error code that identifies the error.|**int**|
|<a name="details"></a>Details|A message that provides additional details about the error. This string can be empty.|**string**|
|<a name="message"></a>Message|A message that describes the error.<br/><br/>For more information about troubleshooting and error handling, see [Handling Service Errors and Exceptions](../guides/handle-service-errors-exceptions.md) and [Operation Error Codes](../guides/operation-error-codes.md).|**string**|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Exception  

## Used By
[ApiFault](apifault.md)  
