---
title: RadiusCriterion Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines a criterion that can be used to show ads to users within the radius of a specific geographical location.
---
# RadiusCriterion Data Object - Campaign Management
Defines a criterion that can be used to show ads to users within the radius of a specific geographical location.

With radius criterions, you can choose to show ads to potential customers in, searching for, or viewing pages about a specified radius around a zip code, coordinates, landmark, or area.

Each radius criterion defines a radius, latitude, and longitude for the accompanying criterion bid adjustment. 

The maximum number of radius criterions that you can specify per campaign or ad group is 2,000.

> [!NOTE]
> You can only have one [LocationIntentCriterion](locationintentcriterion.md) per campaign or ad group to determine the location intent option that applies for all of the campaign or ad group's geographical criterions (location, negative location, and radius criterions). When you create the campaign or ad group's first criterion, a [LocationIntentCriterion](locationintentcriterion.md) will also be added automatically with the default *IntentOption* set to *PeopleInOrSearchingForOrViewingPages*. You can add or update a campaign or ad group's [LocationIntentCriterion](locationintentcriterion.md), whether or not the campaign or ad group has any other criterions. You cannot delete a [LocationIntentCriterion](locationintentcriterion.md), although it has no purpose without location or radius criterions. 

The *RadiusCriterion* criterion can be included within [BiddableAdGroupCriterion](biddableadgroupcriterion.md) and [BiddableCampaignCriterion](biddablecampaigncriterion.md) objects. If ad group level radius criterions are specified, the campaign level radius criterions are ignored for that ad group. In other words the ad group radius criterions override the campaign radius criterions, and are not applied as a union.  

Also note that you must consider the location, negative location, and radius criterions as a set of *geo criterions*. If the ad group has any geo criterions, then none of the campaign's geo criterions are inherited. If the ad group doesn't have any geo criterions, then all of the campaign's geo criterions are inherited. The geo criterions can be inherited from the campaign even if the ad group has a location intent criterion. If the ad group's geo criterions are used, then the ad group's location intent criterion is used; if the campaign's geo criterions are inherited, then the campaign's location intent criterion is used and the ad group's location intent criterion is ignored. You cannot delete a campaign or ad group's location intent criterion, although it has no purpose without location or radius criterions. 

## Syntax
```xml
<xs:complexType name="RadiusCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="LatitudeDegrees" nillable="true" type="xs:double" />
        <xs:element minOccurs="0" name="LongitudeDegrees" nillable="true" type="xs:double" />
        <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="Radius" nillable="true" type="xs:long" />
        <xs:element minOccurs="0" name="RadiusUnit" nillable="true" type="tns:DistanceUnit" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [RadiusCriterion](radiuscriterion.md) object has the following elements: [LatitudeDegrees](#latitudedegrees), [LongitudeDegrees](#longitudedegrees), [Name](#name), [Radius](#radius), [RadiusUnit](#radiusunit).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="latitudedegrees"></a>LatitudeDegrees|The latitude, in degrees, of the target location.<br/><br/>The latitude must be greater than or equal to -85.0 and less than or equal to +85.0.<br/><br/>**Add:** Required<br/>**Update:** Not allowed. If you specify this element it must match the existing setting.|**double**|
|<a name="longitudedegrees"></a>LongitudeDegrees|The longitude, in degrees, of the target location.<br/><br/>The longitude must be greater than or equal to -180.0 and less than or equal to +180.0.<br/><br/>**Add:** Required<br/>**Update:** Not allowed. If you specify this element it must match the existing setting.|**double**|
|<a name="name"></a>Name|The name of the geographical location being targeted. The name can contain a maximum of 50 characters.<br/><br/>**Add:** Optional<br/>**Update:** Read-only|**string**|
|<a name="radius"></a>Radius|The radius that specifies the area surrounding the geographical location to target.<br/><br/>If the *RadiusUnit* is set to Miles, then positive integer values from 1 to 500 are accepted.<br/><br/>If the *RadiusUnit* is set to Kilometers, then positive integer values from 1 to 800 are accepted.<br/><br/>The data type is double and may be supported in a future release. Currently the service only accepts and returns integer values.<br/><br/>**Add:** Required<br/>**Update:** Not allowed. If you specify this element it must match the existing setting.|**long**|
|<a name="radiusunit"></a>RadiusUnit|The unit of measurement for the specified radius, for example kilometers or miles.<br/><br/>**Add:** Required<br/>**Update:** Not allowed. If you specify this element it must match the existing setting.|[DistanceUnit](distanceunit.md)|

The [RadiusCriterion](radiuscriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [RadiusCriterion](radiuscriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [RadiusCriterion](radiuscriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *Radius* when you retrieve a radius criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

