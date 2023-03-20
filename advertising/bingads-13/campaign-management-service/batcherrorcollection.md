---
title: BatchErrorCollection Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an error object that contains batch error details for the top level list index and a list of batch errors corresponding to the  nested list index.
---
# BatchErrorCollection Data Object - Campaign Management
Defines an error object that contains batch error details for the top level list index and a list of batch errors corresponding to the  nested list index.

For example in the *NestedPartialErrors* response element for [AddNegativeKeywordsToEntities](addnegativekeywordstoentities.md), the top level error details correspond to the campaign or ad group in the service request. The nested list of batch errors would include any errors specific to the negative keywords that you attempted to add to the campaign or ad group.

## Syntax
```xml
<xs:complexType name="BatchErrorCollection" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="BatchErrors" nillable="true" type="tns:ArrayOfBatchError" />
    <xs:element minOccurs="0" name="Code" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="Details" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ErrorCode" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="FieldPath" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ForwardCompatibilityMap" nillable="true" type="q67:ArrayOfKeyValuePairOfstringstring" xmlns:q67="http://schemas.datacontract.org/2004/07/System.Collections.Generic" />
    <xs:element minOccurs="0" name="Index" type="xs:int" />
    <xs:element minOccurs="0" name="Message" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Type" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [BatchErrorCollection](batcherrorcollection.md) object has the following elements: [BatchErrors](#batcherrors), [Code](#code), [Details](#details), [ErrorCode](#errorcode), [FieldPath](#fieldpath), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Index](#index), [Message](#message), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="batcherrors"></a>BatchErrors|A list of batch errors corresponding to the nested list index.|[BatchError](batcherror.md) array|
|<a name="code"></a>Code|A numeric error code that identifies the error for the top level list index.|**int**|
|<a name="details"></a>Details|A message that provides additional details about the batch error for the top level list index. This string can be empty.|**string**|
|<a name="errorcode"></a>ErrorCode|A symbolic string constant that identifies the error for the top level list index.|**string**|
|<a name="fieldpath"></a>FieldPath|The name of the data object's element where the error occurred.<br/><br/>This value is subject to change, so you should not take a dependency on the current string format.<br/><br/>This element is not supported for all errors.|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="index"></a>Index|The zero-based top level list index in the request message that failed.|**int**|
|<a name="message"></a>Message|A message that describes the error for the top level list index.|**string**|
|<a name="type"></a>Type|Reserved for internal use.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddAdExtensions](addadextensions.md)  
[AddAdGroupCriterions](addadgroupcriterions.md)  
[AddCampaignCriterions](addcampaigncriterions.md)  
[AddNegativeKeywordsToEntities](addnegativekeywordstoentities.md)  
[DeleteNegativeKeywordsFromEntities](deletenegativekeywordsfromentities.md)  
[UpdateAdExtensions](updateadextensions.md)  
[UpdateAdGroupCriterions](updateadgroupcriterions.md)  
[UpdateCampaignCriterions](updatecampaigncriterions.md)  
