---
title: Campaign Management Data Objects
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Data objects reference for the CampaignManagement service.
---
# Campaign Management Data Objects
The Campaign Management service defines the following data objects.

|Data Object|Description|
|---|---|
|[AccountMigrationStatusesInfo](accountmigrationstatusesinfo.md)|Defines an object that contains migration status for an account.|
|[AccountProperty](accountproperty.md)|Maps an account level property name to a string value.|
|[ActionAdExtension](actionadextension.md)|Defines an action ad extension with a call-to-action button.|
|[Ad](ad.md)|Defines the base object of an ad.|
|[AdApiError](adapierror.md)|Defines a Campaign Management Ad API error object that contains the details that explain why the service operation failed.|
|[AdApiFaultDetail](adapifaultdetail.md)|Defines a Campaign Management Ad API fault detail object that operations return when generic errors occur, such as an authentication error.|
|[Address](address.md)|Defines a postal address for location ad extensions.|
|[AdExtension](adextension.md)|Defines the base object of an ad extension.|
|[AdExtensionAssociation](adextensionassociation.md)|Defines the relationship and editorial status of an ad extension with an account, campaign, or ad group.|
|[AdExtensionAssociationCollection](adextensionassociationcollection.md)|Defines an array of objects that associate an ad extension and its editorial status to an account, campaign, or ad group.|
|[AdExtensionEditorialReason](adextensioneditorialreason.md)|Defines an object that you can use to determine the component of an ad extension that failed editorial review, and the reason for the failure.|
|[AdExtensionEditorialReasonCollection](adextensioneditorialreasoncollection.md)|Defines a collection of ad extensions that failed editorial review.|
|[AdExtensionIdentity](adextensionidentity.md)|Defines an object that identifies an ad extension revision.|
|[AdExtensionIdToEntityIdAssociation](adextensionidtoentityidassociation.md)|Defines an object that associates an ad extension to a supported entity, for example ad group or campaign.|
|[AdGroup](adgroup.md)|Defines an ad group in an advertising campaign.|
|[AdGroupCriterion](adgroupcriterion.md)|Defines a criterion that you want applied to the specified ad group.|
|[AdGroupCriterionAction](adgroupcriterionaction.md)|Defines the action to apply to a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md), specifically one that contains a [ProductPartition](productpartition.md).|
|[AdGroupNegativeSites](adgroupnegativesites.md)|Defines an object that contains the negative site URLs of an ad group.|
|[AdRotation](adrotation.md)|Defines an object that specifies the type of ad rotation to apply to the ad group.|
|[AgeCriterion](agecriterion.md)|Defines a criterion that can be used to show ads to users in a specific age range.|
|[AgeDimension](agedimension.md)|Data object that specifies users by their age.|
|[ApiFaultDetail](apifaultdetail.md)|Defines a Campaign Management API fault object that operations return when web service-specific errors occur, such as when the request message contains incomplete or invalid data.|
|[AppAdExtension](appadextension.md)|Defines an app ad extension that can be included in an ad.|
|[AppInstallAd](appinstallad.md)|Defines an app install ad.|
|[AppInstallGoal](appinstallgoal.md)|Defines an app install conversion goal.|
|[ApplicationFault](applicationfault.md)|Defines the base object from which all Campaign Management fault detail objects derive.|
|[AppUrl](appurl.md)|Defines the operating system platform and URL of the app store download webpage.|
|[Asset](asset.md)|Defines the base object of an asset with a unique Microsoft Advertising identifier that can be reused across multiple ads.|
|[AssetGroup](assetgroup.md)|Defines an asset group in an advertising campaign.|
|[AssetGroupEditorialReason](assetgroupeditorialreason.md)|Defines an object that you can use to determine the component of an asset group that failed editorial review, and the reason for the failure.|
|[AssetGroupEditorialReasonCollection](assetgroupeditorialreasoncollection.md)|Defines a collection of asset groups that failed editorial review.|
|[AssetGroupListingGroup](assetgrouplistinggroup.md)|A listing group that corresponds directly to the identifiers specified in the request.|
|[AssetGroupListingGroupAction](assetgrouplistinggroupaction.md)|An object that contains an Action element and a ListingGroup element.|
|[AssetLink](assetlink.md)|Defines the relationship of an asset to an ad.|
|[Audience](audience.md)|Defines the base object of an audience.|
|[AudienceCriterion](audiencecriterion.md)|Defines a criterion that can be used to show ads to a specific audience.|
|[AudienceDimension](audiencedimension.md)|An object that inherits AudienceGroupDimension.|
|[AudienceGroup](audiencegroup.md)|Defines an AudienceGroup data object.|
|[AudienceGroupAssetGroupAssociation](audiencegroupassetgroupassociation.md)|Defines an AudienceGroupAssetGroupAssociation data object.|
|[AudienceGroupDimension](audiencegroupdimension.md)|Defines an AudienceGroupDimension data object.|
|[AudienceInfo](audienceinfo.md)|An object containing and ID an type for an audience.|
|[BatchError](batcherror.md)|Defines a Campaign Management batch error object that identifies the item within the batch of items in the request message that caused the operation to fail, and describes the reason for the failure.|
|[BatchErrorCollection](batcherrorcollection.md)|Defines an error object that contains batch error details for the top level list index and a list of batch errors corresponding to the  nested list index.|
|[Bid](bid.md)|The highest price that you want to pay each time someone clicks your ad.|
|[BiddableAdGroupCriterion](biddableadgroupcriterion.md)|Defines a biddable criterion that you want applied to the specified ad group.|
|[BiddableCampaignCriterion](biddablecampaigncriterion.md)|Defines a biddable criterion that you want applied to the specified campaign.|
|[BiddingScheme](biddingscheme.md)|Defines the base object of a bidding scheme for how you want to manage your bids.|
|[BidMultiplier](bidmultiplier.md)|Defines the multiplier by which to adjust your base bid for the corresponding criterion.|
|[BidStrategy](bidstrategy.md)|A portfolio bid strategy is an automated bidding feature that manages bidding across multiple campaigns that are all working toward the same goal.|
|[BMCStore](bmcstore.md)|Defines a Microsoft Merchant Center store.|
|[Budget](budget.md)|Represents a budget that can be shared by any campaigns in an account.|
|[CallAdExtension](calladextension.md)|Defines an object that specifies a click-to-call phone number to include in a text ad.|
|[CalloutAdExtension](calloutadextension.md)|Defines an object that specifies additional text about your business, products, or services to include in a text ad.|
|[CallToActionSetting](calltoactionsetting.md)|Reserved.|
|[Campaign](campaign.md)|Defines a campaign.|
|[CampaignAdGroupIds](campaignadgroupids.md)|Identifies a campaign and the list of its ad groups to import.|
|[CampaignConversionGoal](campaignconversiongoal.md)|Defines the base object of a campaign conversion goal.|
|[CampaignCriterion](campaigncriterion.md)|Defines a criterion that you want applied to the specified campaign.|
|[CampaignNegativeSites](campaignnegativesites.md)|Defines an object that contains the negative site URLs of a campaign.|
|[CashbackAdjustment](cashbackadjustment.md)|Defines the CashbackAdjustment Data Object.|
|[CombinationRule](combinationrule.md)|A combination rule includes logical conditions used to determine who to add to your combined list.|
|[CombinedList](combinedlist.md)|A combined list is an audience created from a combination of multiple existing audiences.|
|[CommissionBiddingScheme](commissionbiddingscheme.md)|Defines an object that represents the commission bid strategy type (commission pay per stay).|
|[Company](company.md)|Defines the profile data for a company.|
|[ConversionGoal](conversiongoal.md)|Defines the base object of a conversion goal.|
|[ConversionGoalRevenue](conversiongoalrevenue.md)|Defines properties for revenue that can be tracked by a conversion goal.|
|[CoOpSetting](coopsetting.md)|Defines the ad group level settings for feed-based Microsoft Shopping Campaigns.|
|[CostPerSaleBiddingScheme](costpersalebiddingscheme.md)|Defines an object that represents the cost per sale bid strategy type.|
|[Criterion](criterion.md)|Defines the base object of a criterion.|
|[CriterionBid](criterionbid.md)|Defines a base class for criterion bids.|
|[CriterionCashback](criterioncashback.md)|Defines the CriterionCashback Data Object.|
|[CustomAudience](customaudience.md)|Defines a custom audience.|
|[CustomerAccountShare](customeraccountshare.md)|Defines a customer or account that can use the shared audience or UET tag.|
|[CustomerAccountShareAssociation](customeraccountshareassociation.md)|Contains the association count for the corresponding usage type.|
|[CustomerList](customerlist.md)|For internal use only.|
|[CustomerListItem](customerlistitem.md)|For internal use only.|
|[CustomerShare](customershare.md)|Defines a shareable audience or UET tag that a customer owns.|
|[CustomEventsRule](customeventsrule.md)|Defines a custom events remarketing rule.|
|[CustomParameter](customparameter.md)|Defines a key and value custom parameter for URL tracking.|
|[CustomParameters](customparameters.md)|Defines a collection of key and value custom parameters for URL tracking.|
|[Date](date.md)|Represents a date.|
|[DayTime](daytime.md)|Defines a day of the week and time range for ad extension scheduling.|
|[DayTimeCriterion](daytimecriterion.md)|Defines a criterion that can be used to show ads to users during a specific day and time range.|
|[DealCriterion](dealcriterion.md)|Reserved.|
|[DeviceCriterion](devicecriterion.md)|Defines a criterion that can be used to show ads on specific devices.|
|[DisclaimerAdExtension](disclaimeradextension.md)|Defines an ad extension that specifies disclaimer text to include in an expanded text ad or responsive search ad.|
|[DisclaimerSetting](disclaimersetting.md)|Defines the DisclaimerSetting Data Object.|
|[DurationGoal](durationgoal.md)|Defines a duration conversion goal.|
|[DynamicFeedSetting](dynamicfeedsetting.md)|Defines the DynamicFeedSetting Data Object.|
|[DynamicSearchAd](dynamicsearchad.md)|Defines a dynamic search ad.|
|[DynamicSearchAdsSetting](dynamicsearchadssetting.md)|Defines the Dynamic Search Ads setting for a campaign.|
|[EditorialApiFaultDetail](editorialapifaultdetail.md)|Defines a fault object that operations such as [AddAdGroupCriterions](addadgroupcriterions.md), [UpdateAdGroupCriterions](updateadgroupcriterions.md), [SetAdExtensionsAssociations](setadextensionsassociations.md), and [UpdateAdExtensions](updateadextensions.md) return when one or more criterion or ad extensions in your request message fail editorial review.|
|[EditorialError](editorialerror.md)|Defines an error object that identifies one of potentially many reasons why an entity failed editorial review.|
|[EditorialErrorCollection](editorialerrorcollection.md)|Defines a nested list of error object that identifies one of potentially many reasons why an entity failed editorial review.|
|[EditorialReason](editorialreason.md)|Defines an object that you can use to determine the component of an ad or keyword that failed editorial review, and the reason for the failure.|
|[EditorialReasonCollection](editorialreasoncollection.md)|Defines a collection of ads or keywords that failed editorial review, and the reason for the failure.|
|[EnhancedCpcBiddingScheme](enhancedcpcbiddingscheme.md)|Defines an object that represents the enhanced CPC bid strategy type.|
|[EntityIdToParentIdAssociation](entityidtoparentidassociation.md)|Defines an object that contains the unique system identifier of an entity such as ad or keyword, and the identifier of its parent.|
|[EntityNegativeKeyword](entitynegativekeyword.md)|Defines an object that contains a set of negative keywords that are only associated with the corresponding entity such as a campaign or ad group.|
|[EventGoal](eventgoal.md)|Defines a custom event conversion goal.|
|[ExpandedTextAd](expandedtextad.md)|Defines an expanded text ad.|
|[Experiment](experiment.md)|Defines an experiment where you split a campaign's budget and traffic, and then run an A/B test during a limited date range.|
|[FileImportJob](fileimportjob.md)|FileImportJob is reserved for future use.|
|[FileImportOption](fileimportoption.md)|FileImportOption is reserved for future use.|
|[FilterLinkAdExtension](filterlinkadextension.md)|Filter Link Extensions pair one header with between 3 and 10 clickable text values that tell customers more about your business.|
|[FixedBid](fixedbid.md)|Defines the fixed bid to use in the auction.|
|[FlyerAdExtension](flyeradextension.md)|Flyer Extensions enable advertisers to distribute product or store catalogues (flyers) to potential customers.|
|[Frequency](frequency.md)|Determines whether an import job should be run once or scheduled on a recurring basis.|
|[FrequencyCapSettings](frequencycapsettings.md)|Defines the FrequencyCapSettings object.|
|[GenderCriterion](gendercriterion.md)|Defines a criterion that can be used to show ads to users of a specific gender.|
|[GenderDimension](genderdimension.md)|Defines a GenderDimension data object.|
|[GeoPoint](geopoint.md)|Defines an object that contains the longitude and latitude coordinates of a geographical location.|
|[GoogleImportJob](googleimportjob.md)|Defines a Google import job that can be run once or scheduled on a recurring basis.|
|[GoogleImportOption](googleimportoption.md)|Defines the Google import options that are available via API.|
|[HotelAd](hotelad.md)|Defines a hotel ad.|
|[HotelAdvanceBookingWindowCriterion](hoteladvancebookingwindowcriterion.md)|Criterion for the number of days the booking is made prior to the hotel stay.|
|[HotelCheckInDateCriterion](hotelcheckindatecriterion.md)|Criterion for a check-in date range.|
|[HotelCheckInDayCriterion](hotelcheckindaycriterion.md)|Criterion for day of the week the booking is for.|
|[HotelDateSelectionTypeCriterion](hoteldateselectiontypecriterion.md)|Criterion for the date selection type.|
|[HotelGroup](hotelgroup.md)|Defines an object that organizes your hotel ads.|
|[HotelLengthOfStayCriterion](hotellengthofstaycriterion.md)|Criterion for length of hotel stay in nights.|
|[HotelListing](hotellisting.md)|Defines a hotel listing.|
|[HotelSetting](hotelsetting.md)|Defines whether the ad group will target Hotel Price Ads (HPA) or Property Price Ads (PPA).|
|[IdCollection](idcollection.md)|Defines an object that contains a list of entity identifiers.|
|[Image](image.md)|Defines an image that can be added to an account's media library.|
|[ImageAdExtension](imageadextension.md)|Defines an ad extension that specifies an image with alternative text to include in an expanded text ad.|
|[ImageAsset](imageasset.md)|Applies crop settings to stored image media for a specific aspect ratio.|
|[ImageMediaRepresentation](imagemediarepresentation.md)|Defines an image media representation with height and width.|
|[ImportEntityStatistics](importentitystatistics.md)|The statistical import results for an entity type.|
|[ImportJob](importjob.md)|Defines the base object of an import job.|
|[ImportOption](importoption.md)|Defines the base object of an import option.|
|[ImportResult](importresult.md)|Contains the status, run time, and statistical results for an import job that has run.|
|[ImportSearchAndReplaceForStringProperty](importsearchandreplaceforstringproperty.md)|Defines the string search and replace Google import option.|
|[InheritFromParentBiddingScheme](inheritfromparentbiddingscheme.md)|Defines an object that represents the inherit from parent bid strategy type.|
|[InMarketAudience](inmarketaudience.md)|Defines an in-market audience.|
|[InStoreTransactionGoal](instoretransactiongoal.md)|Defines an in-store transaction goal.|
|[KeyValuePairOflonglong](keyvaluepairoflonglong.md)|The key and value pair of long and long values defined by the Campaign Management service.|
|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md)|The key and value pair of string and string values defined by the Campaign Management service.|
|[Keyword](keyword.md)|Defines a keyword.|
|[Label](label.md)|Defines a label object to organize campaigns, ad groups, ads, and keywords into groups.|
|[LabelAssociation](labelassociation.md)|Defines the relationship between a label and campaign, ad group, ad, or keyword entity.|
|[LocationAdExtension](locationadextension.md)|Defines an ad extension that specifies a business address and phone number to include in a text ad.|
|[LocationCriterion](locationcriterion.md)|Defines a criterion that can be used to show ads to users in a specific location.|
|[LocationIntentCriterion](locationintentcriterion.md)|Defines a criterion that determines the intent option for all location and radius criterions of the campaign or ad group.|
|[ManualCpaBiddingScheme](manualcpabiddingscheme.md)|Defines an object that represents the manual CPA bid strategy type.|
|[ManualCpcBiddingScheme](manualcpcbiddingscheme.md)|Defines an object that represents the manual CPC bid strategy type.|
|[ManualCpmBiddingScheme](manualcpmbiddingscheme.md)|Defines an object that represents the manual CPM bid strategy type.|
|[ManualCpvBiddingScheme](manualcpvbiddingscheme.md)|Defines an object that represents the manual CPV bid strategy type.|
|[MaxClicksBiddingScheme](maxclicksbiddingscheme.md)|Defines an object that represents the maximum clicks bid strategy type.|
|[MaxConversionsBiddingScheme](maxconversionsbiddingscheme.md)|Defines an object that represents the maximum conversions bid strategy type.|
|[MaxConversionValueBiddingScheme](maxconversionvaluebiddingscheme.md)|Defines an object that represents the maximum conversion value bid strategy type.|
|[MaxRoasBiddingScheme](maxroasbiddingscheme.md)|This object is not in use and will be removed from a future version of the API.|
|[Media](media.md)|Defines the base object of media.|
|[MediaAssociation](mediaassociation.md)|Defines an object that represents the identified media and an associated entity, for example media associated with an ad group.|
|[MediaMetaData](mediametadata.md)|Defines a media meta data object.|
|[MediaRepresentation](mediarepresentation.md)|Defines a media representation base class that includes a  media download Url.|
|[MigrationStatusInfo](migrationstatusinfo.md)|Defines an object that contains the migration type and status for an account.|
|[NegativeAdGroupCriterion](negativeadgroupcriterion.md)|Defines a criterion that you want to exclude from the specified ad group.|
|[NegativeCampaignCriterion](negativecampaigncriterion.md)|Defines a criterion that you want to exclude from the specified campaign.|
|[NegativeKeyword](negativekeyword.md)|Defines a negative keyword with match type.|
|[NegativeKeywordList](negativekeywordlist.md)|Defines a negative keyword list.|
|[NegativeSite](negativesite.md)|Defines a website URL where you do not want your ads displayed.|
|[NumberRuleItem](numberruleitem.md)|Represents a number rule item.|
|[OfflineConversion](offlineconversion.md)|Defines an offline conversion that you send to Microsoft Advertising.|
|[OfflineConversionAdjustment](offlineconversionadjustment.md)|Defines an object to retract or restate an offline conversion via the [ApplyOfflineConversionAdjustments](applyofflineconversionadjustments.md) operation.|
|[OfflineConversionGoal](offlineconversiongoal.md)|Defines an offline conversion goal.|
|[OnlineConversionAdjustment](onlineconversionadjustment.md)|Defines an object to retract or restate an online conversion.|
|[OperationError](operationerror.md)|Defines a Campaign Management operation error that contains the details that explain why the service operation failed.|
|[PagesViewedPerVisitGoal](pagesviewedpervisitgoal.md)|Defines a pages viewed per visit conversion goal.|
|[PageVisitorsRule](pagevisitorsrule.md)|Defines a page visitors remarketing rule.|
|[PageVisitorsWhoDidNotVisitAnotherPageRule](pagevisitorswhodidnotvisitanotherpagerule.md)|Defines a page visitors who did not visit another page remarketing rule.|
|[PageVisitorsWhoVisitedAnotherPageRule](pagevisitorswhovisitedanotherpagerule.md)|Defines a page visitors who visited another page remarketing rule.|
|[Paging](paging.md)|Defines a paging object to request Campaign Management objects in batches.|
|[PercentCpcBiddingScheme](percentcpcbiddingscheme.md)|Defines an object that represents the percent CPC bid strategy type (total hotel price per night, including taxes and fees).|
|[PerformanceMaxSetting](performancemaxsetting.md)|Defines the PerformanceMaxSetting object.|
|[PlacementExclusionList](placementexclusionlist.md)|Defines a website exclusion list in the manager account (customer) shared library.|
|[PriceAdExtension](priceadextension.md)|Defines an ad extension that includes between 3 and 8 price table rows.|
|[PriceTableRow](pricetablerow.md)|Defines pricing information by currency and unit that you can use with price ad extensions.|
|[ProductAd](productad.md)|Defines a product ad.|
|[ProductAudience](productaudience.md)|Defines a product audience that you can use to remarket products from your Microsoft Merchant Center store.|
|[ProductCondition](productcondition.md)|Defines a condition that determines whether a product is selected from a customer's Microsoft Merchant Center catalog file.|
|[ProductPartition](productpartition.md)|Defines an ad group level product partition with one condition that helps determine whether a product from the Microsoft Merchant Center store gets served as a product ad.|
|[ProductScope](productscope.md)|Defines a campaign level product scope with list of conditions that help determine which items from your catalog to include in the campaign e.g., filter by brand or condition.|
|[ProfileCriterion](profilecriterion.md)|Defines a criterion that can be used to show ads to users in a specific company, industry, or job function.|
|[PromotionAdExtension](promotionadextension.md)|Promotion Extensions highlight special sales and offers in your text ads.|
|[RadiusCriterion](radiuscriterion.md)|Defines a criterion that can be used to show ads to users within the radius of a specific geographical location.|
|[RateAmount](rateamount.md)|Defines an object that represents the rate amount in percentage form.|
|[RateBid](ratebid.md)|Defines an object that represents the rate bid.|
|[RemarketingList](remarketinglist.md)|Defines a remarketing list.|
|[RemarketingRule](remarketingrule.md)|Defines the base object of a remarketing rule.|
|[ResponsiveAd](responsivead.md)|A responsive ad format for audience ads and multimedia ads.|
|[ResponsiveSearchAd](responsivesearchad.md)|A responsive ad format for text ads in the Search network.|
|[ResponsiveSearchAdsSetting](responsivesearchadssetting.md)|Defines the ResponsiveSearchAdsSetting object.|
|[ReviewAdExtension](reviewadextension.md)|Defines an object that specifies third-party reviews (exact or paraphrased) about your business, products, or services to include in an expanded text ad.|
|[RuleItem](ruleitem.md)|Defines the base class of a remarketing list rule item.|
|[RuleItemGroup](ruleitemgroup.md)|Defines an object that contains a list of remarketing list rule items that apply to the same visited page.|
|[Schedule](schedule.md)|Defines the start and end date ranges for ad extension scheduling.|
|[Setting](setting.md)|Defines the base class of a setting.|
|[SharedEntity](sharedentity.md)|Defines the base class of a shared entity.|
|[SharedEntityAssociation](sharedentityassociation.md)|Defines an object that associates a campaign to negative keyword list, or an ad account to a website exclusion list.|
|[SharedList](sharedlist.md)|Defines the base class of a shared list.|
|[SharedListItem](sharedlistitem.md)|Defines the base class of a shared list item.|
|[ShoppingSetting](shoppingsetting.md)|Defines the campaign level settings to leverage your Microsoft Merchant Center store.|
|[SimilarRemarketingList](similarremarketinglist.md)|Defines an audience that is similar to one of your remarketing lists.|
|[SitelinkAdExtension](sitelinkadextension.md)|Defines an object with one sitelink per ad extension.|
|[StoreCriterion](storecriterion.md)|Defines a criterion to exclude one Microsoft Merchant Center store from your [shopping campaign for brands](../guides/product-ads.md#setup-cooperative).|
|[StringRuleItem](stringruleitem.md)|Defines a rule expression that depends on the string values of the Url or Referrer Url.|
|[StructuredSnippetAdExtension](structuredsnippetadextension.md)|Defines an object that pairs one header with between 3 and 10 snippet values that tell customers more about your business.|
|[TargetCpaBiddingScheme](targetcpabiddingscheme.md)|Defines an object that represents the target CPA bid strategy type.|
|[TargetImpressionShareBiddingScheme](targetimpressionsharebiddingscheme.md)|An automated bidding strategy to get the target impression share for the ad position where you want your ads to appear.|
|[TargetRoasBiddingScheme](targetroasbiddingscheme.md)|Defines an object that represents the target ROAS bid strategy type.|
|[TargetSetting](targetsetting.md)|The target settings that determines whether the Age, Audience, CompanyName, Gender, Industry, and JobFunction criterion type groups use the "target and bid" option or the "bid only" target option.|
|[TargetSettingDetail](targetsettingdetail.md)|Determines whether you want to use the "target and bid" option or the "bid only" target option for the criterion type group.|
|[TextAd](textad.md)|Defines a text ad.|
|[TextAsset](textasset.md)|A text asset with a unique Microsoft Advertising identifier that can be reused across multiple ads.|
|[UetTag](uettag.md)|Defines a Universal Event Tracking (UET) tag that you can add to your website to allow Microsoft Advertising to collect actions people take on your website.|
|[UrlGoal](urlgoal.md)|Defines a URL conversion goal.|
|[VerifiedTrackingSetting](verifiedtrackingsetting.md)|Defines the VerifiedTrackingSetting Data Object.|
|[Video](video.md)|Defines the Video Data Object.|
|[VideoAdExtension](videoadextension.md)|Defines an ad extension with a video and call-to-action button.|
|[VideoAsset](videoasset.md)|Defines the VideoAsset Data Object.|
|[Webpage](webpage.md)|Defines a webpage parameter that contains a list of webpage conditions or criteria that help determine whether you want to show dynamic search ads.|
|[WebpageCondition](webpagecondition.md)|Defines a condition or criterion that helps determine whether you want to show dynamic search ads.|
|[WebpageParameter](webpageparameter.md)|Defines the conditions or criteria that determine whether you want to show dynamic search ads.|
