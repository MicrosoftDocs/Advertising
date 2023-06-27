---
title: "Editorial Review and Appeals"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Determine whether the ad, ad extensions, or keyword passed or failed the editorial review.
---
# Editorial Review and Appeals
For an ad to be eligible to be served, it must meet the editorial guidelines of the market that it serves. The same is true for ad extensions and keywords. 

> [!TIP]
> For editorial guidelines, see the [Microsoft Advertising Policies](https://help.ads.microsoft.com/#apex/3/en/52023/1) help article.

For information about the editorial review process and how to determine whether the entity passed or failed the review, see the following sections.

To find ads or keywords that failed the editorial review process, call the respective [GetAdsByEditorialStatus](../campaign-management-service/getadsbyeditorialstatus.md) or [GetKeywordsByEditorialStatus](../campaign-management-service/getkeywordsbyeditorialstatus.md) operation. Set the *EditorialStatus* element to Disapproved.

To determine the reason why an ad or keyword failed the review and whether it is appealable, call the respective [GetEditorialReasonsByIds](../campaign-management-service/geteditorialreasonsbyids.md) operation. The operation returns an array of [EditorialReasonCollection](../campaign-management-service/editorialreasoncollection.md) objects. The editorial issue is appealable if the *AppealStatus* element of *EditorialReasonCollection* is set to Appealable. For possible status values, see [AppealStatus](../campaign-management-service/appealstatus.md).

For a list of the possible reason codes for an ad or keyword that failed editorial review, see [Microsoft Advertising Editorial Failure Reason Codes](editorial-failure-reason-codes.md). The codes can be returned in the *ReasonCode* element of the [EditorialReason](../campaign-management-service/editorialreason.md) object.

If the failure is appealable, call the [AppealEditorialRejections](../campaign-management-service/appealeditorialrejections.md) operation to appeal the editorial issue. You can request a maximum of 2,000 appeals per account per 24-hour rolling window. For example, if you request 2,000 appeals at 10:00 AM PST today, you cannot request new appeals until after 10:00 AM PST tomorrow. The maximum number of appeals that you can have pending for a single account is 10,000.

You cannot call [AppealEditorialRejections](../campaign-management-service/appealeditorialrejections.md) to appeal ad extensions that failed editorial review.

## <a name="entitydeliverystatus"></a>Entities and Delivery Status
The respective [KeywordEditorialStatus](../campaign-management-service/keywordeditorialstatus.md) and [AdEditorialStatus](../campaign-management-service/adeditorialstatus.md) values for keywords and ads may differ from the corresponding delivery status shown in the Microsoft Advertising web application.

For example after adding a new keyword or ad which must go through the offline review process, read operations such as [GetKeywordsByIds](../campaign-management-service/getkeywordsbyids.md) or [GetAdsByIds](../campaign-management-service/getadsbyids.md) will return *Disapproved*, and the delivery status in the web application will indicate that the entity is pending editorial review. The delivery status in the web application will indicate that the entity is disapproved if and when all elements of the keyword or ad are disapproved.

If you have updated a previously approved and active keyword or ad, and if any element of that entity must go through the offline review process, then read operations such as [GetKeywordsByIds](../campaign-management-service/getkeywordsbyids.md) or [GetAdsByIds](../campaign-management-service/getadsbyids.md) will return *Inactive* and the delivery status in the web application will indicate that the entity is pending editorial review.

> [!NOTE]
> For an entity undergoing offline review the editorial status may be either *Active* or *Inactive*, determined respectively by whether a reviewable term is considered to have a low or high risk of failing review.

## <a name="adeditorialreview"></a>Ad Editorial Review
Before an ad can be served, it must pass editorial review. An initial review is performed at the time you add the ad to an ad group. If the ad fails the initial review, the [AddAds](../campaign-management-service/addads.md) operation throws an editorial fault, which identifies the editorial issue. If the initial review succeeds, the ad is added to the ad group.

The ad then goes through an in-depth review in the background. To find ads that failed the more in-depth review, call the [GetAdsByEditorialStatus](../campaign-management-service/getadsbyeditorialstatus.md) operation. To determine the reason why an ad failed the review and whether it is appealable, call the [GetEditorialReasonsByIds](../campaign-management-service/geteditorialreasonsbyids.md) operation.

If an ad is updated, it is subject to the same review process as a new ad. Effectively the ad is paused unless or until the updated ad copy is immediately approved.

## <a name="adextensioneditorialreview"></a>Ad Extension Editorial Review
When you associate an ad extension with a campaign or ad group, the extension goes through an initial editorial review. The review is performed for each publisher country or region that supports the languages specified for the campaign or ad group. If the extension fails the initial review, the operation fails and returns an editorial fault. The *Details* element of the fault contains the term that failed review. If the extension passes the initial review, the extension then goes through an in-depth, offline editorial review. For more details see [Ad Extensions policies](https://go.microsoft.com/fwlink?LinkId=746651). 

> [!NOTE]
> If the *IconMediaId* or *ImageMediaId* elements of a [LocationAdExtension](../campaign-management-service/locationadextension.md) are set with custom media, the location ad extension validations are done offline. Otherwise all ad extension editorial validations occur up front when associated with an entity.

Because the editorial review is conducted in the context of the campaign or ad group, the extension is reviewed each time you associate the extension with a campaign or ad group. In addition, the extension associated with a campaign will go through a review anytime you add to the campaign an ad group which specifies a different language, or you target a different country or region at the campaign or ad group level.

To determine whether the extension passed the in-depth review with associated entities, call the [GetAdExtensionsAssociations](../campaign-management-service/getadextensionsassociations.md) operation. The response contains one or more lists of [AdExtensionAssociation](../campaign-management-service/adextensionassociation.md) objects. The extension passed editorial review if the *EditorialStatus* element is set to Active. If the status is set to ActiveLimited or Disapproved, call the [GetAdExtensionsEditorialReasons](../campaign-management-service/getadextensionseditorialreasons.md) operation to identify the countries where the extension failed review and the reason for the failure.

## <a name="keywordeditorialreview"></a>Keyword Editorial Review
When you add keywords, they go through an initial editorial review. If a keyword fails the initial review, the [AddKeywords](../campaign-management-service/addkeywords.md) operation fails and throws an editorial fault that identifies the editorial issues. If the initial review succeeds, the keywords are added to the ad group. They then go through an in-depth review in the background.

To find keywords that failed the more in-depth review, call the [GetKeywordsByEditorialStatus](../campaign-management-service/getkeywordsbyeditorialstatus.md) operation. To determine the reason why a keyword failed the review and whether it is appealable, call the [GetEditorialReasonsByIds](../campaign-management-service/geteditorialreasonsbyids.md) operation.

## See Also
[Campaign Management Service Reference](../campaign-management-service/campaign-management-service-reference.md)
[Bing Ads API Web Service Addresses](web-service-addresses.md)

