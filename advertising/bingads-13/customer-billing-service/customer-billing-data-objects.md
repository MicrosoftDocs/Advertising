---
title: Customer Billing Data Objects
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Data objects reference for the CustomerBilling service.
ms.subservice: customer-billing-api
---
# Customer Billing Data Objects
The Customer Billing service defines the following data objects.

|Data Object|Description|
|---|---|
|[AdApiError](adapierror.md)|Defines a Customer Billing Ad API error object that contains the details that explain why the service operation failed.|
|[AdApiFaultDetail](adapifaultdetail.md)|Defines a Customer Billing Ad API fault detail object that operations return when generic errors occur, such as an authentication error.|
|[ApiBatchFault](apibatchfault.md)|Defines a Customer Billing API batch fault object that operations return when web service-specific errors occur, such as when the request message contains incomplete or invalid data.|
|[ApiFault](apifault.md)|Defines a Customer Billing API fault object that operations return when web service-specific errors occur, such as when the request message contains incomplete or invalid data.|
|[ApplicationFault](applicationfault.md)|Defines the base object from which all Customer Billing fault detail objects derive.|
|[BatchError](batcherror.md)|Defines a Customer Billing batch error object that identifies the item within the batch of items in the request message that caused the operation to fail, and describes the reason for the failure.|
|[BillingDocument](billingdocument.md)|Defines a billing document.|
|[BillingDocumentInfo](billingdocumentinfo.md)|Defines a billing document identification object that contains information about a billing document, such as the billing document identifier, billing document amount, and account identifier.|
|[Coupon](coupon.md)|Defines a coupon.|
|[CouponRedemption](couponredemption.md)|Contains redemption and consuming details.|
|[InsertionOrder](insertionorder.md)|An insertion order is a contract that establishes the maximum amount you will spend on your account over a specified period of time.|
|[InsertionOrderPendingChanges](insertionorderpendingchanges.md)|Defines an object that can be used to manage changes for an approved insertion order.|
|[OperationError](operationerror.md)|Defines a Customer Billing operation error object that contains the details that explain why the service operation failed.|
|[OrderBy](orderby.md)|Defines an order for the list of insertion orders returned using one of the search operations, for example [SearchCoupons](searchcoupons.md) or [SearchInsertionOrders](searchinsertionorders.md).|
|[Paging](paging.md)|Defines a paging object to request Customer Billing objects in batches.|
|[Predicate](predicate.md)|Defines a predicate for the list of insertion orders returned using one of the search operations, for example [SearchCoupons](searchcoupons.md) or [SearchInsertionOrders](searchinsertionorders.md).|
