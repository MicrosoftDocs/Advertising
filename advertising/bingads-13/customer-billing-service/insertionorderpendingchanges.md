---
title: InsertionOrderPendingChanges Data Object - Customer Billing
ms.service: bing-ads-customer-billing-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines an object that can be used to manage changes for an approved insertion order.
---
# InsertionOrderPendingChanges Data Object - Customer Billing
Defines an object that can be used to manage changes for an approved insertion order.

If the [Status](insertionorder.md#status) element of the [InsertionOrder](insertionorder.md) is set to PendingUserReview then you cannot update the insertion order via the *InsertionOrderPendingChanges* object. You must initially approve, decline, or cancel via the [Status](insertionorder.md#status) element of the [InsertionOrder](insertionorder.md). Once the insertion order [Status](insertionorder.md#status) is Active, Exhausted, Expired, or NotStarted, then you can either make new changes or approve or decline the current pending changes via the *InsertionOrderPendingChanges* object. 

## Syntax
```xml
<xs:complexType name="InsertionOrderPendingChanges" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Comment" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="EndDate" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="RequestedByUserId" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="ModifiedDateTime" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="NotificationThreshold" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="ReferenceId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="SpendCapAmount" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="StartDate" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="PurchaseOrder" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ChangeStatus" nillable="true" type="tns:InsertionOrderPendingChangesStatus" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [InsertionOrderPendingChanges](insertionorderpendingchanges.md) object has the following elements: [ChangeStatus](#changestatus), [Comment](#comment), [EndDate](#enddate), [ModifiedDateTime](#modifieddatetime), [Name](#name), [NotificationThreshold](#notificationthreshold), [PurchaseOrder](#purchaseorder), [ReferenceId](#referenceid), [RequestedByUserId](#requestedbyuserid), [SpendCapAmount](#spendcapamount), [StartDate](#startdate).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="changestatus"></a>ChangeStatus|Can be used to accept or decline the insertion order pending changes.<br/><br/>When you call [UpdateInsertionOrder](updateinsertionorder.md) you can either set this ChangeStatus element or modify other elements of this object, but you cannot change the status in parallel with other property updates.|[InsertionOrderPendingChangesStatus](insertionorderpendingchangesstatus.md)|
|<a name="comment"></a>Comment|A description of the insertion order. The description is limited to 100 characters.<br/><br/>**Add:** Read-only<br/>**Update:** Optional|**string**|
|<a name="enddate"></a>EndDate|The date that the insertion order expires. The end date must be later than the start date.<br/><br/>The date is stored in Coordinated Universal Time (UTC). Only the month, day, and year of the specified string are used. If you specify the hour, minutes, and seconds of a date they will be ignored.<br/><br/>For information about the format of the date and time, see the **dateTime** entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).<br/><br/>This element is empty if the insertion order has no end date.<br/><br/>**Add:** Read-only<br/>**Update:** Optional|**dateTime**|
|<a name="modifieddatetime"></a>ModifiedDateTime|The date and time that the insertion order change request was submitted.<br/><br/>The date is stored in Coordinated Universal Time (UTC).<br/><br/>For information about the format of the date and time, see the **dateTime** entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**dateTime**|
|<a name="name"></a>Name|The friendly name that can be used to reference this insertion order.<br/><br/>The name can contain a maximum of 100 characters.<br/><br/>The name does not need to be unique compared to other insertion orders for the customer.<br/><br/>**Add:** Read-only<br/>**Update:** Optional|**string**|
|<a name="notificationthreshold"></a>NotificationThreshold|A percentage of the budget that has been spent. Specify the percentage as a value from 0 to 100. Notification is sent when the threshold is reached. For example, if you set the threshold to 70, the Billing service sends notification when you have spent 70 percent of the budget.<br/><br/>If you do not want to receive notification, set to NULL.<br/><br/>Reserved for internal use.<br/><br/>**Add:** Read-only<br/>**Update:** Optional|**double**|
|<a name="purchaseorder"></a>PurchaseOrder|A purchase order value that can be used to reference this insertion order in monthly invoices. This value will be printed as the purchase order in the monthly invoices.<br/><br/>The purchase order can contain a maximum of 50 characters.<br/><br/>**Add:** Read-only<br/>**Update:** Optional|**string**|
|<a name="referenceid"></a>ReferenceId|Internal use only.<br/><br/>**Add:** Read-only<br/>**Update:** Optional|**long**|
|<a name="requestedbyuserid"></a>RequestedByUserId|An identifier of the last user to request a change to the insertion order.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**int**|
|<a name="spendcapamount"></a>SpendCapAmount|The budget for this insertion order. The budget is a hard limit. When the account reaches this limit and there is not another insertion order available, the account's lifecycle status value is set to Pause.<br/><br/>This element is empty if the insertion order has unlimited budget.<br/><br/>**Add:** Read-only<br/>**Update:** Optional|**double**|
|<a name="startdate"></a>StartDate|The date that the insertion order can begin accruing charges. The start date must be later than the current date.<br/><br/>The date is stored in Coordinated Universal Time (UTC). Only the month, day, and year of the specified string are used. If you specify the hour, minutes, and seconds of a date they will be ignored.<br/><br/>For information about the format of the date and time, see the **dateTime** entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).<br/><br/>**Add:** Read-only<br/>**Update:** Optional. You can only update the start date via this element if the [Status](insertionorder.md#status) element of the [InsertionOrder](insertionorder.md) is NotStarted. If the start date has already passed, then you cannot change it.|**dateTime**|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[InsertionOrder](insertionorder.md)  
