---
title: AdApiFaultDetail Data Object Test - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a Reporting Ad API fault detail object that operations return when generic errors occur, such as an authentication error.(test)
---
# AdApiFaultDetail Data Object Test - Reporting
Defines a Reporting Ad API fault detail object that operations return when generic errors occur, such as an authentication error.

# [XML](#tab/xml)

```xml
<xs:complexType name="AdApiFaultDetail" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:ApplicationFault">
      <xs:sequence>
        <xs:element minOccurs="0" name="Errors" nillable="true" type="tns:ArrayOfAdApiError" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "TrackingId": "ValueHere",
  "Type": "AdApiFaultDetail",
  "Errors": [
    {
      "Code": "IntValueHere",
      "Detail": "ValueHere",
      "ErrorCode": "ValueHere",
      "Message": "ValueHere"
    }
  ]
}
```

-----

## <a name="elements"></a>Elements

The [AdApiFaultDetail](adapifaultdetail.md) object has the following elements: [Errors](#errors).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="errors"></a>Errors|An array of [AdApiError](adapierror.md) objects that contains the details that explain why the service operation failed.|[AdApiError](adapierror.md) array|

The [AdApiFaultDetail](adapifaultdetail.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsapplicationfault"></a>Inherited Elements from ApplicationFault
The [AdApiFaultDetail](adapifaultdetail.md) object derives from the [ApplicationFault](applicationfault.md) object, and inherits the following elements: [TrackingId](#trackingid). The descriptions below are specific to [AdApiFaultDetail](adapifaultdetail.md), and might not apply to other objects that inherit the same elements from the [ApplicationFault](applicationfault.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="trackingid"></a>TrackingId|The identifier of the log entry that contains the details of the API call.|**string**|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://adapi.microsoft.com  

