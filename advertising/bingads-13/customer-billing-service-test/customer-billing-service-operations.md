---
title: Customer Billing Test Service Operations
ms.service: bing-ads
ms.subservice: customer-billing-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Service operations reference for the CustomerBilling service.(test)
---
# Customer Billing Test Service Operations
The Customer Billing service defines the following service operations.

|Service Operation|Description|Request Limits|
|---|---|---|
|[AddInsertionOrder](addinsertionorder.md)|Adds an insertion order to the specified account.|N/A.|
|[CheckFeatureAdoptionCouponEligibility](checkfeatureadoptioncouponeligibility.md)|Check the FAC eligibility of an account.|100 *AccountIds*|
|[ClaimFeatureAdoptionCoupons](claimfeatureadoptioncoupons.md)|Claim feature adoption coupons.|100 *AccountCouponPairs*|
|[DispatchCoupons](dispatchcoupons.md)|Dispatch coupons of the specified coupon class name owned by the specified customer.|1 *CouponClassName*|
|[GetAccountMonthlySpend](getaccountmonthlyspend.md)|Gets the amount spent by the account in the specified month.|1 *AccountId*|
|[GetBillingDocuments](getbillingdocuments.md)|Gets the specified billing documents.|25 *BillingDocumentInfo*|
|[GetBillingDocumentsInfo](getbillingdocumentsinfo.md)|Gets a list of objects that contains billing document identification information, for example the billing document identifier, amount, and account identifier.|Not applicable.|
|[RedeemCoupon](redeemcoupon.md)|Redeems a coupon to the specified account.|1 *CouponCode*|
|[SearchCoupons](searchcoupons.md)|Searches for coupons that match a specified criteria.|4 *Predicates*|
|[SearchInsertionOrders](searchinsertionorders.md)|Searches for insertion orders that match a specified criteria.|6 *Predicates*|
|[UpdateInsertionOrder](updateinsertionorder.md)|Updates an insertion order within the specified account.|1 *AccountId*<br/>1 *InsertionOrder*|
