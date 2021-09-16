---
title: ApiBatchFault Data Object - Customer Billing
ms.service: bing-ads-customer-billing-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines a Customer Billing API batch fault object that operations return when web service-specific errors occur, such as when the request message contains incomplete or invalid data.
---
# ApiBatchFault Data Object - Customer Billing
Defines a Customer Billing API batch fault object that operations return when web service-specific errors occur, such as when the request message contains incomplete or invalid data.

## Syntax
```xml
<xs:complexType name="ApiBatchFault" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:ApiFault">
      <xs:sequence>
        <xs:element minOccurs="0" name="BatchErrors" nillable="true" type="tns:ArrayOfBatchError" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ApiBatchFault](apibatchfault.md) object has the following elements: [BatchErrors](#batcherrors).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="batcherrors"></a>BatchErrors|An array of *BatchError* objects that identifies the items in the batch of items in the request message that caused the operation to fail. Each object contains the details that explain why the item caused the failure.|[BatchError](batcherror.md) array|

The [ApiBatchFault](apibatchfault.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsapifault"></a>Inherited Elements from ApiFault
The [ApiBatchFault](apibatchfault.md) object derives from the [ApiFault](apifault.md) object, and inherits the following elements: [OperationErrors](#operationerrors). The descriptions below are specific to [ApiBatchFault](apibatchfault.md), and might not apply to other objects that inherit the same elements from the [ApiFault](apifault.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="operationerrors"></a>OperationErrors|An array of OperationError objects that contains the reasons that explain why the service operation failed when the error is not related to a specific item in the batch of items.|[OperationError](operationerror.md) array|

### <a name="inheritedelementsapplicationfault"></a>Inherited Elements from ApplicationFault
The [ApiBatchFault](apibatchfault.md) object derives from the [ApplicationFault](applicationfault.md) object, and inherits the following elements: [TrackingId](#trackingid). The descriptions below are specific to [ApiBatchFault](apibatchfault.md), and might not apply to other objects that inherit the same elements from the [ApplicationFault](applicationfault.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="trackingid"></a>TrackingId|The identifier of the log entry that contains the details of the API call.|**string**|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Exception  

