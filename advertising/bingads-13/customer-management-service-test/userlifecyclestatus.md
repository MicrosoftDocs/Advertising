---
title: UserLifeCycleStatus Value Set Test - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the possible status values of a user.(test)
---
# UserLifeCycleStatus Value Set Test - Customer Management
Defines the possible status values of a user.

## Syntax
```xml
<xs:simpleType name="UserLifeCycleStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Pending" />
    <xs:enumeration value="Active" />
    <xs:enumeration value="Inactive" />
    <xs:enumeration value="Deleted" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [UserLifeCycleStatus](userlifecyclestatus.md) value set has the following values: [Active](#active), [Deleted](#deleted), [Inactive](#inactive), [Pending](#pending).

|Value|Description|
|-----------|---------------|
|<a name="active"></a>Active|The user is active.|
|<a name="deleted"></a>Deleted|Reserved for internal use. The user was deleted.|
|<a name="inactive"></a>Inactive|Reserved for internal use. The user was disabled by the system.|
|<a name="pending"></a>Pending|The user is a new user who has not been activated. The user is sent notification about how to activate the account. After the user activates the account, the status changes to Active.<br/><br/>This status is deprecated and is only applicable for managed user credentials, and not for Microsoft account (MSA) users. |

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

## Used By
[GetUsersInfo](getusersinfo.md)  
[User](user.md)  
