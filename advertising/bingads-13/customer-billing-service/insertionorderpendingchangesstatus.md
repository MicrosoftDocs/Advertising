---
title: InsertionOrderPendingChangesStatus Value Set - Customer Billing
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the possible status values of InsertionOrderPendingChanges that can be used to manage changes for an approved insertion order.
ms.subservice: customer-billing-api
---
# InsertionOrderPendingChangesStatus Value Set - Customer Billing
Defines the possible status values of [InsertionOrderPendingChanges](insertionorderpendingchanges.md) that can be used to manage changes for an approved insertion order. 

If the [Status](insertionorder.md#status) element of the [InsertionOrder](insertionorder.md) is set to PendingUserReview then you cannot update the insertion order via the [InsertionOrderPendingChanges](insertionorderpendingchanges.md) object. You must initially approve, decline, or cancel via the [Status](insertionorder.md#status) element of the [InsertionOrder](insertionorder.md). Once the insertion order [Status](insertionorder.md#status) is Active, Exhausted, Expired, or NotStarted, then you can either make new changes or approve, decline, or cancel the current pending changes via the [InsertionOrderPendingChanges](insertionorderpendingchanges.md) object. 

## Syntax
```xml
<xs:simpleType name="InsertionOrderPendingChangesStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="PendingUserReview">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ApproveChanges">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="DeclineChanges">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="CancelChanges">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [InsertionOrderPendingChangesStatus](insertionorderpendingchangesstatus.md) value set has the following values: [ApproveChanges](#approvechanges), [CancelChanges](#cancelchanges), [DeclineChanges](#declinechanges), [PendingUserReview](#pendinguserreview).

|Value|Description|
|-----------|---------------|
|<a name="approvechanges"></a>ApproveChanges|Approve the pending changes.|
|<a name="cancelchanges"></a>CancelChanges|Cancel the pending changes.<br/><br/>This status is read-only and only the system can set the status to CancelChanges.|
|<a name="declinechanges"></a>DeclineChanges|Decline the pending changes.<br/><br/>You can only use this value on update if the [ChangeStatus](insertionorderpendingchanges.md#changestatus) element of the [InsertionOrderPendingChanges](insertionorderpendingchanges.md) object is currently set to PendingUserReview.|
|<a name="pendinguserreview"></a>PendingUserReview|The changes are pending user review.<br/><br/>|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Billing/v13  

## Used By
[InsertionOrderPendingChanges](insertionorderpendingchanges.md)  
