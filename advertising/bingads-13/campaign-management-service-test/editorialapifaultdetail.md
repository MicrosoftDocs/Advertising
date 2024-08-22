---
title: EditorialApiFaultDetail Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a fault object that operations such as AddAdGroupCriterions, UpdateAdGroupCriterions, SetAdExtensionsAssociations, and UpdateAdExtensions return when one or more criterion or ad extensions in your request message fail editorial review.(test)
---
# EditorialApiFaultDetail Data Object Test - Campaign Management
Defines a fault object that operations such as [AddAdGroupCriterions](addadgroupcriterions.md), [UpdateAdGroupCriterions](updateadgroupcriterions.md), [SetAdExtensionsAssociations](setadextensionsassociations.md), and [UpdateAdExtensions](updateadextensions.md) return when one or more criterion or ad extensions in your request message fail editorial review.

# [XML](#tab/xml)

```xml
<xs:complexType name="EditorialApiFaultDetail" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension xmlns:q29="https://adapi.microsoft.com" base="q29:ApplicationFault">
      <xs:sequence>
        <xs:element minOccurs="0" name="BatchErrors" nillable="true" type="tns:ArrayOfBatchError" />
        <xs:element minOccurs="0" name="EditorialErrors" nillable="true" type="tns:ArrayOfEditorialError" />
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
  "Type": "EditorialApiFaultDetail",
  "BatchErrors": [
    {
      "Code": IntValueHere,
      "Details": "ValueHere",
      "ErrorCode": "ValueHere",
      "FieldPath": "ValueHere",
      "ForwardCompatibilityMap": [
        {
          "key": "ValueHere",
          "value": "ValueHere"
        }
      ],
      "Index": IntValueHere,
      "Message": "ValueHere",
      "Type": "EditorialError",
      "Appealable": "ValueHere",
      "DisapprovedText": "ValueHere",
      "Location": "ValueHere",
      "PublisherCountry": "ValueHere",
      "ReasonCode": IntValueHere
    }
  ],
  "EditorialErrors": [
    {
      "Appealable": "ValueHere",
      "DisapprovedText": "ValueHere",
      "Location": "ValueHere",
      "PublisherCountry": "ValueHere",
      "ReasonCode": IntValueHere
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

The [EditorialApiFaultDetail](editorialapifaultdetail.md) object has the following elements: [BatchErrors](#batcherrors), [EditorialErrors](#editorialerrors), [OperationErrors](#operationerrors).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="batcherrors"></a>BatchErrors|An array of batch errors that identifies the items in the batch of items in the request message that caused the operation to fail. Each object contains the details that explain why the item caused the failure.|[BatchError](batcherror.md) array|
|<a name="editorialerrors"></a>EditorialErrors|An array of editorial errors that contains the details that explain why the criterion or ad extension was disapproved.|[EditorialError](editorialerror.md) array|
|<a name="operationerrors"></a>OperationErrors|An array of operation errors that contains the details that explain why the service operation failed when the error is not related to a specific item in the batch of items.|[OperationError](operationerror.md) array|

The [EditorialApiFaultDetail](editorialapifaultdetail.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsapplicationfault"></a>Inherited Elements from ApplicationFault
The [EditorialApiFaultDetail](editorialapifaultdetail.md) object derives from the [ApplicationFault](applicationfault.md) object, and inherits the following elements: [TrackingId](#trackingid). The descriptions below are specific to [EditorialApiFaultDetail](editorialapifaultdetail.md), and might not apply to other objects that inherit the same elements from the [ApplicationFault](applicationfault.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="trackingid"></a>TrackingId|The identifier of the log entry that contains the details of the API call.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

