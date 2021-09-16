---
title: LocationCriterion Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines a criterion that can be used to show ads to users in a specific location.
---
# LocationCriterion Data Object - Campaign Management
Defines a criterion that can be used to show ads to users in a specific location.

With location criterions, you can choose to show ads to potential customers in, searching for, or viewing pages about:

* All available countries/regions
* Selected cities, postal codes, metro areas Nielsen DMA® in the United States), counties, states/provinces, and countries/regions

Each location criterion defines a location code for the accompanying criterion bid adjustment. 

The maximum number of combined location and negative location criterions that you can specify per campaign or ad group is 10,000.  

> [!NOTE]
> You can only have one [LocationIntentCriterion](locationintentcriterion.md) per campaign or ad group to determine the location intent option that applies for all of the campaign or ad group's geographical criterions (location, negative location, and radius criterions). When you create the campaign or ad group's first criterion, a [LocationIntentCriterion](locationintentcriterion.md) will also be added automatically with the default *IntentOption* set to *PeopleInOrSearchingForOrViewingPages*. You can add or update a campaign or ad group's [LocationIntentCriterion](locationintentcriterion.md), whether or not the campaign or ad group has any other criterions. You cannot delete a [LocationIntentCriterion](locationintentcriterion.md), although it has no purpose without location or radius criterions. 

The *LocationCriterion* can be included within [BiddableAdGroupCriterion](biddableadgroupcriterion.md), [NegativeAdGroupCriterion](negativeadgroupcriterion.md), [BiddableCampaignCriterion](biddablecampaigncriterion.md), and [NegativeCampaignCriterion](negativecampaigncriterion.md) objects. If ad group level location criterions are specified (positive or negative), the campaign level location criterions are ignored for that ad group. In other words the ad group location criterions override the campaign location criterions, and are not applied as a union.  

Also note that you must consider the location, negative location, and radius criterions as a set of *geo criterions*. If the ad group has any geo criterions, then none of the campaign's geo criterions are inherited. If the ad group doesn't have any geo criterions, then all of the campaign's geo criterions are inherited. The geo criterions can be inherited from the campaign even if the ad group has a location intent criterion. If the ad group's geo criterions are used, then the ad group's location intent criterion is used; if the campaign's geo criterions are inherited, then the campaign's location intent criterion is used and the ad group's location intent criterion is ignored. You cannot delete a campaign or ad group's location intent criterion, although it has no purpose without location or radius criterions. 

## Syntax
```xml
<xs:complexType name="LocationCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="DisplayName" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="EnclosedLocationIds" nillable="true" type="q77:ArrayOflong" xmlns:q77="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
        <xs:element minOccurs="0" name="LocationId" nillable="true" type="xs:long" />
        <xs:element minOccurs="0" name="LocationType" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [LocationCriterion](locationcriterion.md) object has the following elements: [DisplayName](#displayname), [EnclosedLocationIds](#enclosedlocationids), [LocationId](#locationid), [LocationType](#locationtype).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="displayname"></a>DisplayName|The location display name.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|
|<a name="enclosedlocationids"></a>EnclosedLocationIds|Reserved for internal use.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**long** array|
|<a name="locationid"></a>LocationId|The unique Microsoft Advertising identifier for the location where you want to show your ads.<br/><br/>For possible values, see the *Location Id* field of the [geographical locations file](../guides/geographical-location-codes.md). You can call the [GetGeoLocationsFileUrl](../campaign-management-service/getgeolocationsfileurl.md) operation to download the file.<br/><br/>**IMPORTANT:** Please check the *Status* field in the [geographical locations file](../guides/geographical-location-codes.md) before adding or updating a location criterion. If the status is *PendingDeprecation*, the location criterion is no longer used for targeting or exclusions. Deprecated location criteria can still be retrieved, but you cannot add or update deprecated location criteria.<br/><br/>**Add:** Required<br/>**Update:** Not allowed. If you specify this element it must match the existing setting.|**long**|
|<a name="locationtype"></a>LocationType|The location type.<br/><br/>Possible values include, but are not limited to *City*, *Country*, *MetroArea*, *PostalCode*, and *State*.<br/><br/>Neighborhood locations are coming soon. The sub type will be *Neighborhood*.<br/><br/>New location sub types can be added anytime. Rarely will the location type change for a given location ID.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only |**string**|

The [LocationCriterion](locationcriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [LocationCriterion](locationcriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [LocationCriterion](locationcriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *Location* when you retrieve a location criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

