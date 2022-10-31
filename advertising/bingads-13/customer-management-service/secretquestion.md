---
title: SecretQuestion Value Set - Customer Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the possible secret questions that users can choose from to help them recall their password.
ms.subservice: customer-management-api
---
# SecretQuestion Value Set - Customer Management
Defines the possible secret questions that users can choose from to help them recall their password.

## Syntax
```xml
<xs:simpleType name="SecretQuestion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="None" />
    <xs:enumeration value="FavoritePetsName" />
    <xs:enumeration value="FavoriteMovie" />
    <xs:enumeration value="Anniversary" />
    <xs:enumeration value="FatherMiddleName" />
    <xs:enumeration value="SpouseMiddleName" />
    <xs:enumeration value="FirstChildMiddleName" />
    <xs:enumeration value="HighSchoolName" />
    <xs:enumeration value="FavoriteTeacherName" />
    <xs:enumeration value="FavoriteSportsTeam" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [SecretQuestion](secretquestion.md) value set has the following values: [Anniversary](#anniversary), [FatherMiddleName](#fathermiddlename), [FavoriteMovie](#favoritemovie), [FavoritePetsName](#favoritepetsname), [FavoriteSportsTeam](#favoritesportsteam), [FavoriteTeacherName](#favoriteteachername), [FirstChildMiddleName](#firstchildmiddlename), [HighSchoolName](#highschoolname), [None](#none), [SpouseMiddleName](#spousemiddlename).

|Value|Description|
|-----------|---------------|
|<a name="anniversary"></a>Anniversary|An anniversary date.|
|<a name="fathermiddlename"></a>FatherMiddleName|The middle name of your father.|
|<a name="favoritemovie"></a>FavoriteMovie|The title of your favorite movie.|
|<a name="favoritepetsname"></a>FavoritePetsName|The name of your favorite pet.|
|<a name="favoritesportsteam"></a>FavoriteSportsTeam|The name of your favorite sports team.|
|<a name="favoriteteachername"></a>FavoriteTeacherName|The name of your favorite teacher.|
|<a name="firstchildmiddlename"></a>FirstChildMiddleName|The middle name of your first child.|
|<a name="highschoolname"></a>HighSchoolName|The name of the high school that you attended.|
|<a name="none"></a>None|Do not specify this value. If you specify this value, adding or updating the user will fail.|
|<a name="spousemiddlename"></a>SpouseMiddleName|The middle name of your spouse.|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

## Used By
[User](user.md)  
