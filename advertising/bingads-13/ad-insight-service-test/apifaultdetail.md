---
title: ApiFaultDetail Data Object Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an Ad Insight API fault detail object that operations return when web service-specific errors occur, such as when the request message contains incomplete or invalid data.(test)
---
# ApiFaultDetail Data Object Test - Ad Insight
Defines an Ad Insight API fault detail object that operations return when web service-specific errors occur, such as when the request message contains incomplete or invalid data.

# [XML](#tab/xml)

```xml
<xs:complexType name="ApiFaultDetail" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension xmlns:q1="https://adapi.microsoft.com" base="q1:ApplicationFault">
      <xs:sequence>
        <xs:element minOccurs="0" name="BatchErrors" nillable="true" type="tns:ArrayOfBatchError" />
        <xs:element minOccurs="0" name="OperationErrors" nillable="true" type="tns:ArrayOfOperationError" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "TrackingId": "ValueHere",
  "Type": "ApiFaultDetail",
  "BatchErrors": [
    {
      "Code": IntValueHere,
      "Details": "ValueHere",
      "ErrorCode": "ValueHere",
      "Index": IntValueHere,
      "Message": "ValueHere"
    }
  ],
  "OperationErrors": [
    {
      "Code": IntValueHere,
      "Details": "ValueHere",
      "ErrorCode": "ValueHere",
      "Message": "ValueHere"
    }
  ]
}
```

-----

## <a name="elements"></a>Elements

The [ApiFaultDetail](apifaultdetail.md) object has the following elements: [BatchErrors](#batcherrors), [OperationErrors](#operationerrors).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="batcherrors"></a>BatchErrors|An array of batch errors that identifies the items in the batch of items in the request message that caused the operation to fail. Each object contains the details that explain why the item caused the failure.|[BatchError](batcherror.md) array|
|<a name="operationerrors"></a>OperationErrors|An array of operation errors that contains the reasons that explain why the service operation failed when the error is not related to a specific item in the batch of items.|[OperationError](operationerror.md) array|

The [ApiFaultDetail](apifaultdetail.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsapplicationfault"></a>Inherited Elements from ApplicationFault
The [ApiFaultDetail](apifaultdetail.md) object derives from the [ApplicationFault](applicationfault.md) object, and inherits the following elements: [TrackingId](#trackingid). The descriptions below are specific to [ApiFaultDetail](apifaultdetail.md), and might not apply to other objects that inherit the same elements from the [ApplicationFault](applicationfault.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="trackingid"></a>TrackingId|The identifier of the log entry that contains the details of the API call.|**string**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

