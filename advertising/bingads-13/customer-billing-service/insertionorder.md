---
title: InsertionOrder Data Object - Customer Billing
ms.service: bing-ads
ms.subservice: customer-billing-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: An insertion order is a contract that establishes the maximum amount you will spend on your account over a specified period of time.
---
# InsertionOrder Data Object - Customer Billing
An insertion order is a contract that establishes the maximum amount you will spend on your account over a specified period of time. If you have monthly invoice billing set up for your account, you need to have an active insertion order for your ads to be eligible for delivery. You still control your spend using your campaign budget, and you will only be charged for what you accrue. For example, if you had a month-long insertion order for $5,000 and accrued only $4,500 in charges over the billing period, then we will only deduct $4,500 from your insertion order budget.

> [!WARNING]
> The insertion order budget only applies to ad spend, which is an important distinction if your business is in a country/region where online services are taxed. If you have a strict budget limit, you may need to account for taxes in your insertion order budget. To learn more about tax requirements in your business location, see the [Tax or VAT information](https://help.ads.microsoft.com/#apex/3/en/52032/3) help article.

Most elements of this object can only be set before the insertion order becomes approved i.e., if the [Status](#status) is set to PendingUserReview. In that case you can either make new changes or approve or decline the insertion order via elements of this object. Once the insertion order [Status](#status) is Active, Exhausted, Expired, or NotStarted, then you can either make new changes or approve or decline the current pending changes via the [PendingChanges](#pendingchanges) element. If the insertion order [Status](#status) is Canceled or Declined then you cannot update the insertion order. 

> [!NOTE]
> The [SearchInsertionOrders](searchinsertionorders.md) operation will return up to 24 insertion orders per recurring series. 
> 
> You can retrieve but with very few exceptions cannot add or update an insertion order series via the Bing Ads API. Use the [IsInSeries](#isinseries) element to determine whether the insertion order is in a recurring series. 
> - If you attempt to update the [StartDate](#startdate) or [EndDate](#enddate) of an insertion order that is part of a recurring series the API will return an error. 
> - If you update the [Status](#status) of an insertion order that is part of a recurring series, the status update will be applied to all insertion orders in the series. 
> 
> To manage recurring insertion orders in the Microsoft Advertising web application, see the [How do I create and edit an insertion order?](https://help.ads.microsoft.com/#apex/3/en/52094/0) help article.  

## Syntax
```xml
<xs:complexType name="InsertionOrder" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AccountId" type="xs:long" />
    <xs:element minOccurs="0" name="BookingCountryCode" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Comment" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="EndDate" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="LastModifiedByUserId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="LastModifiedTime" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="NotificationThreshold" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="ReferenceId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="SpendCapAmount" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="StartDate" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="tns:InsertionOrderStatus" />
    <xs:element minOccurs="0" name="PurchaseOrder" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="PendingChanges" nillable="true" type="tns:InsertionOrderPendingChanges" />
    <xs:element minOccurs="0" name="AccountNumber" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="BudgetRemaining" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="BudgetSpent" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="BudgetRemainingPercent" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="BudgetSpentPercent" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="SeriesName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="IsInSeries" nillable="true" type="xs:boolean" />
    <xs:element minOccurs="0" name="SeriesFrequencyType" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [InsertionOrder](insertionorder.md) object has the following elements: [AccountId](#accountid), [AccountNumber](#accountnumber), [BookingCountryCode](#bookingcountrycode), [BudgetRemaining](#budgetremaining), [BudgetRemainingPercent](#budgetremainingpercent), [BudgetSpent](#budgetspent), [BudgetSpentPercent](#budgetspentpercent), [Comment](#comment), [EndDate](#enddate), [Id](#id), [IsInSeries](#isinseries), [LastModifiedByUserId](#lastmodifiedbyuserid), [LastModifiedTime](#lastmodifiedtime), [Name](#name), [NotificationThreshold](#notificationthreshold), [PendingChanges](#pendingchanges), [PurchaseOrder](#purchaseorder), [ReferenceId](#referenceid), [SeriesFrequencyType](#seriesfrequencytype), [SeriesName](#seriesname), [SpendCapAmount](#spendcapamount), [StartDate](#startdate), [Status](#status).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|The identifier of the account to which the insertion order applies.<br/><br/>You cannot update the account identifier after you create the insertion order.<br/><br/>**Add:** Required<br/>**Update:** Read-only|**long**|
|<a name="accountnumber"></a>AccountNumber|The system-generated account number that is used to identify the account in the Microsoft Advertising web application. The account number has the form *xxxxxxxx*, where *xxxxxxxx* is a series of any eight alphanumeric characters.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|
|<a name="bookingcountrycode"></a>BookingCountryCode|Reserved for internal use.<br/><br/>**Add:** Required for some accounts; Optional for some accounts.<br/>**Update:** Read-only|**string**|
|<a name="budgetremaining"></a>BudgetRemaining|The running balance of the insertion order.<br/><br/>The running balance value is initially the same as the [SpendCapAmount](#spendcapamount), and then decreases each time an ad in the account is served.<br/><br/>This element is empty if the insertion order has unlimited budget.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**double**|
|<a name="budgetremainingpercent"></a>BudgetRemainingPercent|The percent of budget remaining for the insertion order.<br/><br/>This value is calculated as [BudgetRemaining](#budgetremaining) / [SpendCapAmount](#spendcapamount).<br/><br/>This element is empty if the insertion order has unlimited budget.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**double**|
|<a name="budgetspent"></a>BudgetSpent|The remaining balance of the insertion order.<br/><br/>The remaining balance is initially 0 (zero), and then increases towards the [SpendCapAmount](#spendcapamount) each time an ad in the account is served.<br/><br/>This element is empty if the insertion order has unlimited budget.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**double**|
|<a name="budgetspentpercent"></a>BudgetSpentPercent|The percent of budget spent for the insertion order.<br/><br/>This value is calculated as [BudgetSpent](#budgetspent) / [SpendCapAmount](#spendcapamount).<br/><br/>This element is empty if the insertion order has unlimited budget.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**double**|
|<a name="comment"></a>Comment|A description of the insertion order. The description is limited to 100 characters.<br/><br/>**Add:** Optional<br/>**Update:** Optional|**string**|
|<a name="enddate"></a>EndDate|The date that the insertion order expires. The end date must be later than the start date.<br/><br/>The date is stored in Coordinated Universal Time (UTC). Only the month, day, and year of the specified string are used. If you specify the hour, minutes, and seconds of a date they will be ignored.<br/><br/>For information about the format of the date and time, see the **dateTime** entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).<br/><br/>This element is empty if the insertion order has no end date.<br/><br/>**Add:** Required<br/>**Update:** Optional. If you attempt to update the [StartDate](#startdate) or [EndDate](#enddate) of an insertion order that [is part of a recurring series](#isinseries) the API will return an error.|**dateTime**|
|<a name="id"></a>Id|A system-generated identifier that identifies the insertion order.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only and Required|**long**|
|<a name="isinseries"></a>IsInSeries|Determines whether the insertion order is in a recurring series.<br/><br/>If the value is True, the insertion order is part of a recurring series. If you attempt to update the [StartDate](#startdate) or [EndDate](#enddate) of an insertion order that is part of a recurring series the API will return an error. If you update the [Status](#status) of an insertion order that is part of a recurring series, the status update will be applied to all insertion orders in the series.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**boolean**|
|<a name="lastmodifiedbyuserid"></a>LastModifiedByUserId|An identifier of the last user to update the insertion order.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**long**|
|<a name="lastmodifiedtime"></a>LastModifiedTime|The date and time that the insertion order was last updated.<br/><br/>The date is stored in Coordinated Universal Time (UTC).<br/><br/>For information about the format of the date and time, see the **dateTime** entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**dateTime**|
|<a name="name"></a>Name|The friendly name that can be used to reference this insertion order.<br/><br/>The name can contain a maximum of 100 characters.<br/><br/>The name does not need to be unique compared to other insertion orders for the customer.<br/><br/>**Add:** Optional<br/>**Update:** Optional|**string**|
|<a name="notificationthreshold"></a>NotificationThreshold|A percentage of the budget that has been spent. Specify the percentage as a value from 0 to 100. Notification is sent when the threshold is reached. For example, if you set the threshold to 70, the Billing service sends notification when you have spent 70 percent of the budget.<br/><br/>If you do not want to receive notification, set to NULL.<br/><br/>Reserved for internal use.<br/><br/>**Add:** Optional<br/>**Update:** Optional|**double**|
|<a name="pendingchanges"></a>PendingChanges|Can be used to manage changes for an approved insertion order with status set to either Active, Exhausted, Expired, or NotStarted.<br/><br/>**Add:** Read-only<br/>**Update:** Optional|[InsertionOrderPendingChanges](insertionorderpendingchanges.md)|
|<a name="purchaseorder"></a>PurchaseOrder|A purchase order value that can be used to reference this insertion order in monthly invoices. This value will be printed as the purchase order in the monthly invoices.<br/><br/>The purchase order can contain a maximum of 50 characters.<br/><br/>**Add:** Optional<br/>**Update:** Optional|**string**|
|<a name="referenceid"></a>ReferenceId|Reserved for internal use only.<br/><br/>**Add:** Optional<br/>**Update:** Optional|**long**|
|<a name="seriesfrequencytype"></a>SeriesFrequencyType|Determines how an order recurs in the series.<br/><br/>The possible values are Monthly, BiMonthly, Quarterly, and Yearly.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|
|<a name="seriesname"></a>SeriesName|The name of the recurring insertion order series.<br/><br/>The name can contain a maximum of 100 characters.<br/><br/>Even if the insertion order is later removed from the recurring series, this element will continue to reflect the name of the series it was created in.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|
|<a name="spendcapamount"></a>SpendCapAmount|The budget for this insertion order. The budget is a hard limit. When the account reaches this limit and there is not another insertion order available, the account's lifecycle status value is set to [Pause](../customer-management-service/accountlifecyclestatus.md#pause).<br/><br/>This element is empty if the insertion order has unlimited budget. The budget is the maximum amount of money you want to spend for an insertion order. For insertion orders with unlimited budget, your budget is bounded by your credit limit. In that case each campaign's daily budget determines the maximum spend.<br/><br/>**Add:** Required<br/>**Update:** Optional|**double**|
|<a name="startdate"></a>StartDate|The date that the insertion order can begin accruing charges. The start date must be later than the current date.<br/><br/>The date is stored in Coordinated Universal Time (UTC). Only the month, day, and year of the specified string are used. If you specify the hour, minutes, and seconds of a date they will be ignored.<br/><br/>For information about the format of the date and time, see the **dateTime** entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).<br/><br/>**Add:** Required<br/>**Update:** Optional. You can only update the start date via this element if the [Status](#status) is PendingUserReview. If the start date has already passed, then you cannot change it.<br/><br/>If you attempt to update the [StartDate](#startdate) or [EndDate](#enddate) of an insertion order that [is part of a recurring series](#isinseries) the API will return an error.|**dateTime**|
|<a name="status"></a>Status|The status of the insertion order.<br/><br/>**Add:** Read-only. Insertion orders that you create are immediately set to Active, NotStarted, or Declined.<br/>**Update:** Required to approve or decline an insertion order that is not yet approved, or cancel an insertion order that has already be approved. You can only approve or decline via this element if the current status is set to PendingUserReview. You can only cancel via this element if the current status is set to Active, Exhausted, or NotStarted. Once the insertion order status is Active, Exhausted, Expired, or NotStarted, then you can either make new changes or approve or decline the current pending changes via the [PendingChanges](#pendingchanges) element.<br/><br/>When you call [UpdateInsertionOrder](updateinsertionorder.md) you can either set this Status element or modify other elements of this object, but you cannot change the status in parallel with other property updates.<br/><br/>If you update the [Status](#status) of an insertion order that [is part of a recurring series](#isinseries), the status update will be applied to all insertion orders in the series. |[InsertionOrderStatus](insertionorderstatus.md)|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[AddInsertionOrder](addinsertionorder.md)  
[SearchInsertionOrders](searchinsertionorders.md)  
[UpdateInsertionOrder](updateinsertionorder.md)  
