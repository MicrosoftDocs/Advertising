---
title: UrlGoal Data Object - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines a URL conversion goal.
ms.subservice: campaign-management-api
---
# UrlGoal Data Object - Campaign Management
Defines a URL conversion goal. Use this type of goal to count every time someone visits a web page as a conversion. For example you can count a conversion if someone visits the purchase confirmation page.  

> [!TIP]
> For an implementation overview, see the [Universal Event Tracking](../guides/universal-event-tracking.md) technical guide.

> [!IMPORTANT]
> Every time you add or update a new [DurationGoal](durationgoal.md), [EventGoal](eventgoal.md), [OfflineConversionGoal](offlineconversiongoal.md), [PagesViewedPerVisitGoal](pagesviewedpervisitgoal.md) or [UrlGoal](urlgoal.md) via either the Microsoft Advertising web application or Campaign Management API, the *MSCLKIDAutoTaggingEnabled* value of the corresponding [AccountProperty](accountproperty.md) is set to *True* automatically. If the Scope of the goal is set to *Customer* level, then the [AccountProperty](accountproperty.md) for all accounts under the Customer will be set. 

## Syntax
```xml
<xs:complexType name="UrlGoal" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:ConversionGoal">
      <xs:sequence>
        <xs:element minOccurs="0" name="UrlExpression" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="UrlOperator" nillable="true" type="tns:ExpressionOperator" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [UrlGoal](urlgoal.md) object has the following elements: [UrlExpression](#urlexpression), [UrlOperator](#urloperator).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="urlexpression"></a>UrlExpression|The expression used to determine the page or pages the user has to visit in order to count as a conversion. <br/><br/>**Add:** Required<br/>**Update:** Optional|**string**|
|<a name="urloperator"></a>UrlOperator|The operator that can be applied to the value of the *Url* element.<br/><br/>**Add:** Optional; If not specified, the default operator is *Equals*.<br/>**Update:** Optional; If not specified during update, the previous setting is retained.|[ExpressionOperator](expressionoperator.md)|

The [UrlGoal](urlgoal.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsconversiongoal"></a>Inherited Elements from ConversionGoal
The [UrlGoal](urlgoal.md) object derives from the [ConversionGoal](conversiongoal.md) object, and inherits the following elements: [AttributionModelType](#attributionmodeltype), [ConversionWindowInMinutes](#conversionwindowinminutes), [CountType](#counttype), [ExcludeFromBidding](#excludefrombidding), [GoalCategory](#goalcategory), [Id](#id), [Name](#name), [Revenue](#revenue), [Scope](#scope), [Status](#status), [TagId](#tagid), [TrackingStatus](#trackingstatus), [Type](#type), [ViewThroughConversionWindowInMinutes](#viewthroughconversionwindowinminutes). The descriptions below are specific to [UrlGoal](urlgoal.md), and might not apply to other objects that inherit the same elements from the [ConversionGoal](conversiongoal.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="attributionmodeltype"></a>AttributionModelType|Determines which attribution model, _LastTouch_ or _LastClick_, is used with a conversion goal.|[AttributionModelType](attributionmodeltype.md)|
|<a name="conversionwindowinminutes"></a>ConversionWindowInMinutes|The conversion window is the length of time in minutes after a click that you want to track conversions. If you set this value to 43200 minutes (30 days), then conversions that happen within 30 days after a click are tracked. Past conversions aren't affected. The minimum value supported is 1 minute, although keep in mind that a shorter conversion window will reduce the number of conversions your account records. The maximum value supported is 129600 minutes (90 days).<br/><br/>**Add:** Optional<br/>**Update:** Optional|**int**|
|<a name="counttype"></a>CountType|This determines how your conversions are recorded within your chosen conversion window.<br/><br/>There are two choices, and if you do not set a value the default is *All*:<br/><br/>- *All*:  All conversions that happen after an ad click will be counted. This is a common choice for sales. <br/><br/>-  *Unique*:  Only one conversion that happens after an ad click will be counted. This is a common choice for leads.<br/><br/>For example:  You track two conversions: leads and sales. You pick *Unique* for leads and *All* for sales. When one ad click turns into two leads and two sales, it's counted as three conversions: one for the unique lead, and two for all the sales.<br/><br/>**Add:** Optional<br/>**Update:** Optional|[ConversionGoalCountType](conversiongoalcounttype.md)|
|<a name="excludefrombidding"></a>ExcludeFromBidding|Determines whether or not to exclude data otherwise related to this conversion goal from a subset of performance report columns.<br/><br/>This element is only available for customers who are enabled for the Include in Conversions feature ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 574).<br/><br/>If this element is set to true, data otherwise related to this conversion goal will be excluded from the `Conversions`, `ConversionRate`, `CostPerConversion`, `ReturnOnAdSpend`, `RevenuePerConversion`, and `Revenue` report columns. Also, if you use an automated bidding bid strategy, setting this property true will result in the goal's conversions no longer factoring into automated bidding calculations. Setting this property "true" is effectively the same as unchecking "Include in Conversions" in the Microsoft Advertising web application.<br/><br/>Regardless of this element value, the `AllConversions`, `AllConversionRate`, `AllCostPerConversion`, `AllReturnOnAdSpend`, `AllRevenuePerConversion`, and `AllRevenue` report columns will include data for all conversion goals. By default this element is false, and data related to this conversion goal are included in all report columns.<br/><br/>For more information, see [Report Attributes and Performance Statistics](../guides/report-attributes-performance-statistics.md) and the help article [Conversion goals: "Conversions" versus "All conversions"](https://help.ads.microsoft.com/#apex/3/en/56920/-1/en/#ext:reporting).<br/><br/>**Add:** Optional<br/>**Update:** Optional|**boolean**|
|<a name="goalcategory"></a>GoalCategory|The category used to segment the conversion goal.<br/><br/>Categorize your conversion goals however makes sense for your business. Goal categories don't affect performance - they are here to help you segment your goals and their performance metrics.<br/><br/>The supported category values vary by conversion goal type. Url goals support the [AddToCart](conversiongoalcategory.md#addtocart), [BeginCheckout](conversiongoalcategory.md#begincheckout), [BookAppointment](conversiongoalcategory.md#bookappointment), [Contact](conversiongoalcategory.md#contact), [GetDirections](conversiongoalcategory.md#getdirections), [Other](conversiongoalcategory.md#other), [OutboundClick](conversiongoalcategory.md#outboundclick), [PageView](conversiongoalcategory.md#pageview), [Purchase](conversiongoalcategory.md#purchase), [RequestQuote](conversiongoalcategory.md#requestquote), [Signup](conversiongoalcategory.md#signup), [SubmitLeadForm](conversiongoalcategory.md#submitleadform), and [Subscribe](conversiongoalcategory.md#subscribe) categories.<br/><br/>**Add:** Required as of June 2021. Previously if you left this element nil or empty, the default category was set to [None](conversiongoalcategory.md#none).<br/>**Update:** Optional if the conversion goal already has a category set other than [None](conversiongoalcategory.md#none). If no value is set for the update, this setting is not changed.|[ConversionGoalCategory](conversiongoalcategory.md)|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier for the conversion goal.<br/><br/>**Add:** Read-only<br/>**Update:** Required and Read-Only|**long**|
|<a name="name"></a>Name|The conversion goal name.<br/><br/>The maximum length of the name is 100, and the name must be unique among all conversion goals belonging to the same customer.<br/><br/>**Add:** Required<br/>**Update:** Optional|**string**|
|<a name="revenue"></a>Revenue|Determines how much each conversion is worth to your business.<br/><br/>When adding a conversion goal if you do not specify any revenue tracking preferences, then each [ConversionGoalRevenue](conversiongoalrevenue.md) will be set to their respective default values.<br/><br/>When updating a conversion goal, if the *Revenue* element is nil or empty then none of the nested properties will be updated. However, if this element is not nil or empty then you are effectively replacing any existing revenue properties.<br/><br/>**Add:** Optional<br/>**Update:** Optional|[ConversionGoalRevenue](conversiongoalrevenue.md)|
|<a name="scope"></a>Scope|Determines if the goal applies to all accounts or only the account specified in the required *CustomerAccountId* header element. If you have multiple Microsoft Advertising accounts, you can track conversions across all of those accounts. If you associate a goal with one account, conversions will be tracked for that account only.<br/><br/>Possible values are *Account* and *Customer*. If not specified, the scope will be set to *Customer* by default. <br/><br/>Once you set scope, you can't change it. If you want to change the scope, you need to create a new conversion goal and pause the old one.<br/><br/>**Add:** Optional<br/>**Update:** Optional|[EntityScope](entityscope.md)|
|<a name="status"></a>Status|Defines the possible user-determined status values of a conversion goal. These are the status values that a user can decide to set, for example a goal can be set to *Paused* if you no longer wish to track conversions for that goal.<br/><br/>For status values that can be set by the system, for example whether or not the UET tag is verified, see the *TrackingStatus* element.<br/><br/>**Add:** Optional<br/>**Update:** Optional|[ConversionGoalStatus](conversiongoalstatus.md)|
|<a name="tagid"></a>TagId|The unique Microsoft Advertising identifier of the UET tag that you added to your website to allow Microsoft Advertising to collect actions people take on your website.<br/><br/>Before you take a dependency on the tag ID, please note that the UET tag can be shared with or from another customer. Shared UET tags and audiences are only available for pilot customers. For an overview of sharing audiences and UET tags in a customer hierarchy, see the [Share Audiences and UET Tags](../guides/universal-event-tracking.md#hierarchy-share) technical guide.<br/><br/>**Add:** Required<br/>**Update:** Optional|**long**|
|<a name="trackingstatus"></a>TrackingStatus|Defines the possible system-determined status values of a conversion goal. These are the status values that can be set by the system, for example the system sets the status to *TagUnverified* if the UET tag has not yet been verified.<br/><br/>For status values that a user can decide to set, for example setting the status to *Paused* if you no longer wish to track conversions for that goal, see the *Status* element.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[ConversionGoalTrackingStatus](conversiongoaltrackingstatus.md)|
|<a name="type"></a>Type|The type of the conversion goal. This value is *Url* when you retrieve a Url goal. For more information about conversion goal types, see the [ConversionGoal Data Object Remarks](conversiongoal.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[ConversionGoalType](conversiongoaltype.md)|
|<a name="viewthroughconversionwindowinminutes"></a>ViewThroughConversionWindowInMinutes|The view-through conversion window is the length of time in minutes after a click that you want to track view-through conversions. If you set this value to 43200 minutes (30 days), then view-through conversions that happen within 30 days after a click are tracked. Past conversions aren't affected. The minimum value supported is 1 minute, although keep in mind that a shorter conversion window will reduce the number of conversions your account records. The maximum value supported is 43200 minutes (30 days).<br/><br/>The [IncludeViewThroughConversions](accountpropertyname.md#includeviewthroughconversions) account property must also be set to true for view-through conversions to be tracked.<br/><br/>This element is not returned by default. To get this element, include the ViewThroughConversionWindowInMinutes value in the ReturnAdditionalFields element when you call the [GetConversionGoalsByIds](getconversiongoalsbyids.md#returnadditionalfields) and [GetConversionGoalsByTagIds](getconversiongoalsbytagids.md#returnadditionalfields) service operations.<br/><br/>**Add:** Optional<br/>**Update:** Optional|**int**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

