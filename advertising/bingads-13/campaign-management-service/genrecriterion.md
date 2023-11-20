---
title: GenreCriterion Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a criterion that can be used to show ads from a specific genre.
---
# GenreCriterion Data Object - Campaign Management
Defines a criterion that can be used to show ads from a specific genre.

## Syntax
```xml
<xs:complexType name="GenreCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="GenreId" type="xs:long" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [GenreCriterion](genrecriterion.md) object has the following elements: [GenreId](#genreid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="genreid"></a>GenreId|The Microsoft Advertising identifier of the Genre.<br/><br/>[View this table](#genreid-values) to see possible values for *GenreId*.|**long**|

The [GenreCriterion](genrecriterion.md) object has [Inherited Elements](#inheritedelements).

**Genre ID Values**

These are the possible values for *GenreId*:

|Name|ID number|
|----|---|
|Horror|1|
|Crime|2|
|Game-show|3|
|Documentary|4|
|Romance|5|
|Sports - Other|6|
|Talk|7|
|Drama|8|
|Fantasy|9|
|Music|10|
|Shopping|11|
|Other|12|
|Action|13|
|Thriller|14|
|News|15|
|Reality|17|
|Comedy|18|
|Business & Finance|19|
|Cooking|20|
|Sitcom|21|
|Adventure|22|
|Sci-fi|23|
|Football|25|
|Animation|26|
|Baseball|27|
|Basketball|28|
|Biography|29|
|History|30|
|Musical|31|
|Mystery|32|
|Soccer|33|
|War|34|
|Western|35|
|Animals|36|
|Automotive|37|
|Science & Technology|38|
|Travel|39|
|Golf|40|
|Ice Hockey|41|
|Motor Sports|42|
|Beauty & Fashion|43|
|Home & Garden|44|
|Health|45|
|Fitness|46|
|Weather|48|
|Education|49|
|Cycling|50|
|Gaming|51|
|Rugby League|52|
|Rugby Union|53|
|Australian Rules Football|54|
|Tennis|55|
|Olympics|56|
|Softball|57|
|Cricket|58|
|MMA|59|
|Boxing|60|
|Horse Racing|61|
|Nature|64|
|Outdoors|65|
|Arts|66|
|Pop Culture|67|
|Fishing|68|
|Surfing|69|
|Paranormal|70|
|Awards|71|
|Martial Arts|72|
|Hobbies|73|
|Dance|74|
|Law|75|
|Comic Book|76|
|Holidays|77|
|Wrestling|78|
|Anime|80|
|Soap-Opera|81|

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [GenreCriterion](genrecriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [GenreCriterion](genrecriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *Genre* when you retrieve a genre criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

