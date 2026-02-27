---
title: "App Install Goal Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an app install conversion goal. Use this type of goal to track every time someone installs your app as a conversion.
dev_langs:
  - csharp
---
# App Install Goal Record - Bulk
Defines an app install conversion goal. Use this type of goal to track every time someone installs your app as a conversion.list that can be downloaded and uploaded in a bulk file.

You can download all *App Install Goal* records in the account by including the [DownloadEntity](downloadentity.md) value of *AppInstallGoals* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new app install goal.

```csv
Type,Id,Attribution Model Type,Count Type,Exclude From Bidding,Goal Category,Is Enhanced Conversions Enabled,Name,Conversion Currency Code,Revenue Value,Revenue Type,Scope,UET Tag Id,Status,View Through Conversion Window In Minutes,Conversion Window In Minutes,Category Expression,Category Operator,Action Expression,Action Operator,Label Expression,Label Operator,Event Value,Event Value Operator,URL Expression,URL Operator,Minimum Duration In Second,App Platform,App Id,Minimum Pages Viewed  
Format Version,,,,,,,6.0,,,,,,,,,,,,,,,,,,,,,,  
AppInstall Goal,,,,False,Download,False,GoalE,USD,1,FixedValue,Account,,Active,150,367,,,,,,,,,,,,Android,qazwsx,
```

For a *App Install Goal* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md).

- [App Platform](#appplatform)
- [App Store ID](#appstoreid)
- [Conversion Window In Minutes](#conversionwindowinminutes)
- [Exclude From Bidding](#excludefrombidding)
- [Goal Category](#goalcategory)
- [Id](#id)
- [Is Enhanced Conversions Enabled](#isenhancedconversionsenabled)
- [Name](#name)
- [Revenue Type](#revenuetype)
- [Scope](#scope)
- [Status](#status)
- [Tracking Status](#trackingstatus)
- [Type](#type)

## <a name="appplatform"></a>App Platform
The application platform.

Possible values include *Android*, *iOS*, *Windows* and *WindowsPhone*.

**Add**: Required  
**Update**: Optional  

## <a name="appstoreid"></a>App Store ID
The application identifier provided by the app store.

**Add**: Required  
**Update**: Optional  

## <a name="conversionwindowinminutes"></a>Conversion Window In Minutes
The conversion window is the length of time in minutes after a click that you want to track conversions. If you set this value to 43200 minutes (30 days), then conversions that happen within 30 days after a click are tracked. Past conversions aren't affected. The minimum value supported is 1 minute, although keep in mind that a shorter conversion window will reduce the number of conversions your account records. The maximum value supported is 129600 minutes (90 days).

**Add**: Optional  
**Update**: Optional  

## <a name="excludefrombidding"></a>Count Type
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

The supported category values vary by conversion goal type. App install goals only support the [Download](../campaign-management-service/conversiongoalcategory.md#download) category.

**Add**: Optional. If you leave this element nil or empty, the default category will be set to [Download](../campaign-management-service/conversiongoalcategory.md#download).  
**Update**: Optional. If no value is set for the update, this setting is not changed.  

## <a name="id"></a>Id
The unique Microsoft Advertising identifier for the conversion goal.

**Add:** Read-only  
**Update:** Read-only and Required  

## <a name="isenhancedconversionsenabled"></a>Is Enhanced Conversions Enabled
Determines whether enhanced conversions are enabled for a conversion goal.

**Add**: Optional  
**Update**: Optional  

## <a name="name"></a>Name
The conversion goal name.

The maximum length of the name is 100, and the name must be unique among all conversion goals belonging to the same customer.

**Add**: Required  
**Update**: Optional  

## <a name="revenuetype"></a>Revenue Type
Determines how much each conversion is worth to your business.

When updating a conversion goal, if the Revenue element is nil or empty then none of the nested properties will be updated. However, if this element is not nil or empty then you are effectively replacing any existing revenue properties.

The *VariableValue* option is not available for app install conversion goals.

**Add**: Optional  
**Update**: Optional  

## <a name="scope"></a>Scope
Determines if the goal applies to all accounts or only the account specified in the required *CustomerAccountId* header element. If you have multiple Microsoft Advertising accounts, you can track conversions across all of those accounts. If you associate a goal with one account, conversions will be tracked for that account only.

For app install goals the Account level scope is not supported. You can set this element to Customer or leave it nil. If not specified, the scope will be set to Customer by default.

**Add**: Optional  
**Update**: Optional  

## <a name="status"></a>Status
Defines the possible user-determined status values of a conversion goal. These are the status values that a user can decide to set, for example a goal can be set to *Paused* if you no longer wish to track conversions for that goal.

For status values that can be set by the system, see the *TrackingStatus* element.

**Add**: Optional  
**Update**: Optional  

## <a name="trackingstatus"></a>Tracking Status
Defines the possible system-determined status values of a conversion goal. These are the status values that can be set by the system, for example the system sets the status to *RecordingConversions* if we have recorded conversions within the last 7 days.

Only the *NoRecentConversions* and *RecordingConversions* statuses are applicable for app install conversion goals.

For status values that a user can decide to set, for example setting the status to *Paused* if you no longer wish to track conversions for that goal, see the Status element.

**Add**: Read-only  
**Update**: Read-only  

## <a name="type"></a>Type
The type of the conversion goal. This value is *AppInstall* when you retrieve an app install goal. For more information about conversion goal types, see the [ConversionGoal Data Object Remarks](../campaign-management-service/conversiongoal.md#remarks).

**Add**: Read-only  
**Update**: Read-only  
