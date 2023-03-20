---
title: EditorialError Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines an error object that identifies one of potentially many reasons why an entity failed editorial review.
---
# EditorialError Data Object - Campaign Management
Defines an error object that identifies one of potentially many reasons why an entity failed editorial review.

## Syntax
```xml
<xs:complexType name="EditorialError" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:BatchError">
      <xs:sequence>
        <xs:element minOccurs="0" name="Appealable" nillable="true" type="xs:boolean" />
        <xs:element minOccurs="0" name="DisapprovedText" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="Location" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="PublisherCountry" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="ReasonCode" type="xs:int" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [EditorialError](editorialerror.md) object has the following elements: [Appealable](#appealable), [DisapprovedText](#disapprovedtext), [Location](#location), [PublisherCountry](#publishercountry), [ReasonCode](#reasoncode).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="appealable"></a>Appealable|Reserved for future use.|**boolean**|
|<a name="disapprovedtext"></a>DisapprovedText|The text that caused the entity to be disapproved.<br/><br/>For text length violations, this element specifies the number of characters by which the specified text exceeds the maximum.|**string**|
|<a name="location"></a>Location|The element or property of the entity that caused the entity to be disapproved.|**string**|
|<a name="publishercountry"></a>PublisherCountry|The corresponding country or region for the flagged editorial issue.|**string**|
|<a name="reasoncode"></a>ReasonCode|A numeric code that identifies the error. For more information, see [Editorial Reason Codes](../guides/editorial-failure-reason-codes.md).|**int**|

The [EditorialError](editorialerror.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsbatcherror"></a>Inherited Elements from BatchError
The [EditorialError](editorialerror.md) object derives from the [BatchError](batcherror.md) object, and inherits the following elements: [Code](#code), [Details](#details), [ErrorCode](#errorcode), [FieldPath](#fieldpath), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Index](#index), [Message](#message), [Type](#type). The descriptions below are specific to [EditorialError](editorialerror.md), and might not apply to other objects that inherit the same elements from the [BatchError](batcherror.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="code"></a>Code|A numeric error code that identifies the error.|**int**|
|<a name="details"></a>Details|A message that provides additional details about the batch error. This string can be empty.|**string**|
|<a name="errorcode"></a>ErrorCode|A symbolic string constant that identifies the error. For example, UserIsNotAuthorized.|**string**|
|<a name="fieldpath"></a>FieldPath|The name of the data object's element where the error occurred. For example if the *TrackingUrlTemplate* of a [Campaign](campaign.md) contains invalid text, the value of this *FieldPath* element is TrackingUrlTemplate.<br/><br/>This value is subject to change, so you should not take a dependency on the current string format.<br/><br/>This element is not supported for all errors. The field path is supported for errors related to *FinalMobileUrls*, *FinalUrls*, *TrackingUrlTemplate*, and *UrlCustomParameters* elements of the respective [Campaign](campaign.md), [AdGroup](adgroup.md), [TextAd](textad.md), [ProductAd](productad.md), [BiddableAdGroupCriterion](biddableadgroupcriterion.md), and [Keyword](keyword.md) objects. It is also supported for errors related to all fields of the [CalloutAdExtension](calloutadextension.md) and [ReviewAdExtension](reviewadextension.md) objects.|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this data object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="index"></a>Index|The zero-based index of the item in the batch of items in the request message that failed.|**int**|
|<a name="message"></a>Message|A message that describes the error.<br/><br/>For more information about troubleshooting and error handling, see [Handling Service Errors and Exceptions](../guides/handle-service-errors-exceptions.md) and [Operation Error Codes](../guides/operation-error-codes.md).|**string**|
|<a name="type"></a>Type|Reserved for internal use.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[EditorialApiFaultDetail](editorialapifaultdetail.md)  
