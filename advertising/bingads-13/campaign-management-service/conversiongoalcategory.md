---
title: ConversionGoalCategory Value Set - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines categories used to segment conversion goals.
---
# ConversionGoalCategory Value Set - Campaign Management
Defines categories used to segment conversion goals.

Categorize your conversion goals however makes sense for your business. Goal categories don't affect performance - they are here to help you segment your goals and their performance metrics. 

The supported category values vary by conversion goal type. Please refer to the corresponding reference page for details. 
- [AppInstallGoal](appinstallgoal.md#goalcategory)
- [DurationGoal](durationgoal.md#goalcategory)
- [EventGoal](eventgoal.md#goalcategory) 
- [InStoreTransactionGoal](instoretransactiongoal.md#goalcategory) 
- [OfflineConversionGoal](offlineconversiongoal.md#goalcategory) 
- [PagesViewedPerVisitGoal](pagesviewedpervisitgoal.md#goalcategory)
- [UrlGoal](urlgoal.md#goalcategory)

For more information, see the [Use goal categories to segment your conversion goals](https://help.ads.microsoft.com/#apex/3/en/56952/2-500) help article. 

## Syntax
```xml
<xs:simpleType name="ConversionGoalCategory" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Unknown" />
    <xs:enumeration value="None" />
    <xs:enumeration value="Purchase" />
    <xs:enumeration value="AddToCart" />
    <xs:enumeration value="BeginCheckout" />
    <xs:enumeration value="Subscribe" />
    <xs:enumeration value="SubmitLeadForm" />
    <xs:enumeration value="BookAppointment" />
    <xs:enumeration value="Signup" />
    <xs:enumeration value="RequestQuote" />
    <xs:enumeration value="GetDirections" />
    <xs:enumeration value="OutboundClick" />
    <xs:enumeration value="Contact" />
    <xs:enumeration value="PageView" />
    <xs:enumeration value="Download" />
    <xs:enumeration value="Other" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ConversionGoalCategory](conversiongoalcategory.md) value set has the following values: [AddToCart](#addtocart), [BeginCheckout](#begincheckout), [BookAppointment](#bookappointment), [Contact](#contact), [Download](#download), [GetDirections](#getdirections), [None](#none), [Other](#other), [OutboundClick](#outboundclick), [PageView](#pageview), [Purchase](#purchase), [RequestQuote](#requestquote), [Signup](#signup), [SubmitLeadForm](#submitleadform), [Subscribe](#subscribe), [Unknown](#unknown).

|Value|Description|
|-----------|---------------|
|<a name="addtocart"></a>AddToCart|Segment by the "Add to cart" sales category.|
|<a name="begincheckout"></a>BeginCheckout|Segment by the "Begin checkout" sales category.|
|<a name="bookappointment"></a>BookAppointment|Segment by the "Book appointment" leads category.|
|<a name="contact"></a>Contact|Segment by the "Contact" category.|
|<a name="download"></a>Download|Segment by the "Download" sales category.|
|<a name="getdirections"></a>GetDirections|Segment by the "Get directions" leads category.|
|<a name="none"></a>None|The category has not yet been set.<br/><br/>Beginning in March 2021 this value will no longer be accepted when you add or update conversion goals.|
|<a name="other"></a>Other|Segment by the "Other" category.|
|<a name="outboundclick"></a>OutboundClick|Segment by the "Outbound click" leads category.|
|<a name="pageview"></a>PageView|Segment by the "Page view" category.|
|<a name="purchase"></a>Purchase|Segment by the "Purchase" sales category.|
|<a name="requestquote"></a>RequestQuote|Segment by the "Request quote" leads category.|
|<a name="signup"></a>Signup|Segment by the "Sign-up" leads category.|
|<a name="submitleadform"></a>SubmitLeadForm|Segment by the "Submit lead form" leads category.|
|<a name="subscribe"></a>Subscribe|Segment by the "Subscribe" sales category.|
|<a name="unknown"></a>Unknown|Reserved for future use.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ConversionGoal](conversiongoal.md)  
