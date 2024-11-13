---
title: "Duration Goal Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an duration conversion goal. Use this type of goal to track every time someone installs your app as a conversion.
dev_langs:
  - csharp
---
# Duration Goal Record - Bulk
Defines a duration conversion goal that can be uploaded and downloaded in a bulk file.  

Use this type of goal to count every time someone stays on a website for longer than a certain amount of time as a conversion. For example, you can count a conversion if someone spent 10 minutes or longer on a blog or playing a game on the webpage.

You can download all *Duration Goal* records in the account by including the [DownloadEntity](downloadentity.md) value of *DurationGoals* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new duration goal.

```csv
Type,Id,Attribution Model Type,Count Type,Exclude From Bidding,Goal Category,Is Enhanced Conversions Enabled,Name,Conversion Currency Code,Revenue Value,Revenue Type,Scope,UET Tag Id,Status,View Through Conversion Window In Minutes,Conversion Window In Minutes,Category Expression,Category Operator,Action Expression,Action Operator,Label Expression,Label Operator,Event Value,Event Value Operator,URL Expression,URL Operator,Minimum Duration In Second,App Platform,App Id,Minimum Pages Viewed  
Format Version,,,,,,,6.0,,,,,,,,,,,,,,,,,,,,,,  
Duration Goal,,LastTouch,Unique,False,Other,False,GoalF,USD,1,FixedValue,Account,123431,Active,150,367,,,,,,,,,,,15,,,
```

For a *Duration Goal* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md).

- [Attribution Model Type](#attributionmodeltype)
- [Conversion Window In Minutes](#conversionwindowinminutes)
- [Count Type](#counttype)
- [Currency Code](#currencycode)
- [Exclude From Bidding](#excludefrombidding)
- [Goal Category](#goalcategory)
- [Id](#id)
- [Is Enhanced Conversions Enabled](#isenhancedconversionsenabled)
- [Minimum Duration In Seconds](#minimumdurationinseconds)
- [Name](#name)
- [Revenue Type](#revenuetype)
- [Revenue Value](#revenuevalue)
- [Scope](#scope)
- [Status](#status)
- [Tracking Status](#trackingstatus)
- [Type](#type)
- [UET Tag ID](#uettagid)
- [View Through Conversion Window Minutes](#viewthroughconversionwindowminutes)

## <a name="attributionmodeltype"></a>Attribution Model Type
Determines which attribution model, LastTouch or LastClick, is used with a conversion goal.

**Add**: Optional  
**Update**: Optional  

## <a name="conversionwindowinminutes"></a>Conversion Window In Minutes
The conversion window is the length of time in minutes after a click that you want to track conversions. If you set this value to 43200 minutes (30 days), then conversions that happen within 30 days after a click are tracked. Past conversions aren't affected. The minimum value supported is 1 minute, although keep in mind that a shorter conversion window will reduce the number of conversions your account records. The maximum value supported is 129600 minutes (90 days).

**Add**: Optional  
**Update**: Optional  

## <a name="counttype"></a>Count Type
This determines how your conversions are recorded within your chosen conversion window.

There are two choices, and if you do not set a value the default is All:

- All: All conversions that happen after an ad click will be counted. This is a common choice for sales.

- Unique: Only one conversion that happens after an ad click will be counted. This is a common choice for leads.

For example: You track two conversions: leads and sales. You pick Unique for leads and All for sales. When one ad click turns into two leads and two sales, it's counted as three conversions: one for the unique lead, and two for all the sales.

**Add**: Optional
**Update**: Optional

## <a name="currencycode"></a>Currency Code
The currency type that you want the conversion goal revenue to be reported.  

For a list of possible string values see [Microsoft Advertising Currencies](../guides/currencies.md).  

If the *Scope* element is set to *Customer* and if the [Type](#type) is *FixedValue* or *VariableValue*, this property is required.  

**Add:** Optional unless otherwise noted above.  
**Update:**  Optional unless otherwise noted above.  

## <a name="excludefrombidding"></a>Exclude From Bidding
Determines whether or not to exclude data otherwise related to this conversion goal from a subset of performance report columns.  

This element is only available for customers who are enabled for the Include in Conversions feature ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 574).  

If this element is set to true, data otherwise related to this conversion goal will be excluded from the `Conversions`, `ConversionRate`, `CostPerConversion`, `ReturnOnAdSpend`, `RevenuePerConversion`, and `Revenue` report columns. Also, if you use an automated bidding bid strategy, setting this property true will result in the goal's conversions no longer factoring into automated bidding calculations. Setting this property "true" is effectively the same as unchecking "Include in Conversions" in the Microsoft Advertising web application.  

Regardless of this element value, the `AllConversions`, `AllConversionRate`, `AllCostPerConversion`, `AllReturnOnAdSpend`, `AllRevenuePerConversion`, and `AllRevenue` report columns will include data for all conversion goals. By default this element is false, and data related to this conversion goal are included in all report columns.  

For more information, see [Report Attributes and Performance Statistics](../guides/report-attributes-performance-statistics.md) and the help article [Conversion goals: "Conversions" versus "All conversions"](https://help.ads.microsoft.com/#apex/3/en/56920/-1/en/#ext:reporting).  

**Add**: Optional  
**Update**: Optional  

## <a name="goalcategory"></a>Goal Category
The category used to segment the conversion goal.

Categorize your conversion goals however makes sense for your business. Goal categories don't affect performance - they are here to help you segment your goals and their performance metrics.

The supported category values vary by conversion goal type. Duration goals only support the [Download](../campaign-management-service/conversiongoalcategory.md#download) category.

**Add**: Optional. If you leave this element nil or empty, the default category will be set to [Download](../campaign-management-service/conversiongoalcategory.md#download).  
**Update**: Optional. If no value is set for the update, this setting is not changed.  

## <a name="id"></a>Id
The unique Microsoft Advertising identifier for the conversion goal.

**Add:** Read-only  
**Update:** Read-only and Required  

## <a name="isenhancedconversionsenabled"></a>Is Enhanced Conversions Enabled
Determines whether enhanced conversions are enabled for a conversion goal.

Note: To create an enhanced conversion goal and set `isEnhancedConversionsEnabled=true`, you must create a conversion goal for the account via the Microsoft Advertising UI with the enhanced conversion setting selected and the associated checkbox checked.

**Add**: Optional  
**Update**: Optional  

## <a name="minimumdurationinseconds"></a>Minimum Duration In Seconds
The minimum amount of time in seconds that the user must spend on your website to track as a conversion. If you don't specify a value, the default value is 0, and the possible range is 0 through 86,399 (1 second less than a full 24 hour day).

Add: Optional
Update: Optional

## <a name="name"></a>Name
The conversion goal name.

The maximum length of the name is 100, and the name must be unique among all conversion goals belonging to the same customer.

**Add**: Required  
**Update**: Optional  

## <a name="revenuetype"></a>Revenue Type
Determines how much each conversion is worth to your business.

When updating a conversion goal, if the Revenue element is nil or empty then none of the nested properties will be updated. However, if this element is not nil or empty then you are effectively replacing any existing revenue properties.

The *VariableValue* option is not available for duration conversion goals.

**Add**: Optional  
**Update**: Optional  

## <a name="revenuevalue"></a>Revenue Value
The revenue value or amount. If you assign values to your conversions, you'll be able to see the total value driven by your advertising across different conversions, rather than simply the number of conversions that have happened.

The default value is effectively 0, and possible values range from 0 to 999,9999. Accepted values depend on the revenue type, so please see the Type element for details.

**Add**: Optional. If not specified, the default type is effectively 0.  
**Update**: Optional. If not specified, the default type is effectively 0.  

## <a name="scope"></a>Scope
Determines if the goal applies to all accounts or only the account specified in the required *CustomerAccountId* header element. If you have multiple Microsoft Advertising accounts, you can track conversions across all of those accounts. If you associate a goal with one account, conversions will be tracked for that account only.

For duration goals the Account level scope is not supported. You can set this element to Customer or leave it nil. If not specified, the scope will be set to Customer by default.

**Add**: Optional  
**Update**: Optional  

## <a name="status"></a>Status
Defines the possible user-determined status values of a conversion goal. These are the status values that a user can decide to set, for example a goal can be set to *Paused* if you no longer wish to track conversions for that goal.

For status values that can be set by the system, see the *TrackingStatus* element.

**Add**: Optional  
**Update**: Optional  

## <a name="trackingstatus"></a>Tracking Status
Defines the possible system-determined status values of a conversion goal. These are the status values that can be set by the system, for example the system sets the status to *RecordingConversions* if we have recorded conversions within the last 7 days.

For status values that a user can decide to set, for example setting the status to *Paused* if you no longer wish to track conversions for that goal, see the Status element.

**Add**: Read-only  
**Update**: Read-only  

## <a name="type"></a>Type
The type of the conversion goal. This value is *InStoreTransaction* when you retrieve an duration goal. For more information about conversion goal types, see the [ConversionGoal Data Object Remarks](../campaign-management-service/conversiongoal.md#remarks).

**Add**: Read-only  
**Update**: Read-only  

## <a name="uettagid"></a>UET Tag ID
The unique Microsoft Advertising identifier of the UET tag that you added to your website to allow Microsoft Advertising to collect actions people take on your website.

Before you take a dependency on the tag ID, please note that the UET tag can be shared with or from another customer. Shared UET tags and audiences are only available for pilot customers. For an overview of sharing audiences and UET tags in a customer hierarchy, see the [Share Audiences and UET Tags](../guides/universal-event-tracking.md#hierarchy-share) technical guide.

**Add**: Required  
**Update**: Optional  

## <a name="viewthroughconversionwindowminutes"></a>View Through Conversion Window Minutes
The view-through conversion window is the length of time in minutes after a click that you want to track view-through conversions. If you set this value to 43200 minutes (30 days), then view-through conversions that happen within 30 days after a click are tracked. Past conversions aren't affected. The minimum value supported is 1 minute, although keep in mind that a shorter conversion window will reduce the number of conversions your account records. The maximum value supported is 43200 minutes (30 days).

The *IncludeViewThroughConversions* account property must also be set to true for view-through conversions to be tracked.

**Add**: Optional
**Update**: Optional
