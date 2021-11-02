---
title: User Data Object - Customer Management
ms.service: bing-ads-customer-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines personal and business contact information about a Microsoft Advertising user.
---
# User Data Object - Customer Management
Defines personal and business contact information about a Microsoft Advertising user.

Multiple user objects can be assigned to the same person i.e., one user per person per customer. The Name, Lcid, JobTitle, and ContactInfo user settings for the same person will be automatically synchronized with any updates that occur after user consolidation. The LastModifiedByUserId and LastModifiedTime are also in sync across each returned [User](user.md) object, unless you had an old username merged and have not updated any user settings since the consolidation. 

> [!TIP]
> With Microsoft Advertising multi-user credentials you can accept an invitation to manage a separate customer with your existing Microsoft Advertising credentials. For more information, see the [Multi-User Credentials](../guides/account-hierarchy-permissions.md#multi-user-credentials) technical guide.

## Syntax
```xml
<xs:complexType name="User" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="ContactInfo" nillable="true" type="tns:ContactInfo" />
    <xs:element minOccurs="0" name="CustomerId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="JobTitle" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="LastModifiedByUserId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="LastModifiedTime" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="Lcid" nillable="true" type="tns:LCID" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="tns:PersonName" />
    <xs:element minOccurs="0" name="Password" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="SecretAnswer" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="SecretQuestion" type="tns:SecretQuestion" />
    <xs:element minOccurs="0" name="UserLifeCycleStatus" nillable="true" type="tns:UserLifeCycleStatus" />
    <xs:element minOccurs="0" name="TimeStamp" nillable="true" type="xs:base64Binary" />
    <xs:element minOccurs="0" name="UserName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ForwardCompatibilityMap" nillable="true" type="q6:ArrayOfKeyValuePairOfstringstring" xmlns:q6="http://schemas.datacontract.org/2004/07/System.Collections.Generic" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [User](user.md) object has the following elements: [ContactInfo](#contactinfo), [CustomerId](#customerid), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [JobTitle](#jobtitle), [LastModifiedByUserId](#lastmodifiedbyuserid), [LastModifiedTime](#lastmodifiedtime), [Lcid](#lcid), [Name](#name), [Password](#password), [SecretAnswer](#secretanswer), [SecretQuestion](#secretquestion), [TimeStamp](#timestamp), [UserLifeCycleStatus](#userlifecyclestatus), [UserName](#username).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="contactinfo"></a>ContactInfo|The user's contact information.<br/><br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[ContactInfo](contactinfo.md)|
|<a name="customerid"></a>CustomerId|The identifier of the customer for this user to access.<br/><br/>**Update:** Read-only|**long**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The Microsoft Advertising identifier of the user.<br/><br/>**Update:** Required|**long**|
|<a name="jobtitle"></a>JobTitle|The user's job title. The title can contain a maximum of 50 characters.<br/><br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="lastmodifiedbyuserid"></a>LastModifiedByUserId|The identifier of the last user to update the user's information.<br/><br/>**Update:** Read-only|**long**|
|<a name="lastmodifiedtime"></a>LastModifiedTime|The date and time that that the user information was last updated. The value is in Coordinated Universal Time (UTC).<br/><br/>The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).<br/><br/>**Update:** Read-only|**dateTime**|
|<a name="lcid"></a>Lcid|The locale to use when sending correspondence to the user by email or postal mail. The default is EnglishUS.<br/><br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[LCID](lcid.md)|
|<a name="name"></a>Name|The name of the user.<br/><br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[PersonName](personname.md)|
|<a name="password"></a>Password|This element is reserved for internal use and will be removed from a future version of the API.<br/><br/>The [GetUser](getuser.md) operation does not return the password.<br/><br/>**Update:** Read-only|**string**|
|<a name="secretanswer"></a>SecretAnswer|This element is reserved for internal use and will be removed from a future version of the API.<br/><br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="secretquestion"></a>SecretQuestion|This element is reserved for internal use and will be removed from a future version of the API.<br/><br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[SecretQuestion](secretquestion.md)|
|<a name="timestamp"></a>TimeStamp|A time-stamp value that the system uses internally to reconcile updates when you call [UpdateUser](updateuser.md) or [DeleteUser](deleteuser.md).<br/><br/>**Update:** Required|**base64Binary**|
|<a name="userlifecyclestatus"></a>UserLifeCycleStatus|The status of the user.<br/><br/>**Update:** Read-only|[UserLifeCycleStatus](userlifecyclestatus.md)|
|<a name="username"></a>UserName|The logon user name of the user.<br/><br/>The email address of the Microsoft Account may differ from the Email element of the [ContactInfo](contactinfo.md) object.<br/><br/>**Update:** Read-only|**string**|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[GetUser](getuser.md)  
[UpdateUser](updateuser.md)  
