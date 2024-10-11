---
title: Ad Insight Data Objects
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Data objects reference for the AdInsight service.
---
# Ad Insight Data Objects
The Ad Insight service defines the following data objects.

|Data Object|Description|
|---|---|
|[AdApiError](adapierror.md)|Defines an Ad Insight Ad API error object that contains the details that explain why the service operation failed.|
|[AdApiFaultDetail](adapifaultdetail.md)|Defines an Ad Insight Ad API fault detail object that operations return when generic errors occur, such as an authentication error.|
|[AdGroupBidLandscape](adgroupbidlandscape.md)|Defines an object that contains a list of estimated clicks, cost, and impressions from 1 to 7 days for the ad group identifier given the suggested bid.|
|[AdGroupBidLandscapeInput](adgroupbidlandscapeinput.md)|Defines an object that contains the requested bid landscape type for the corresponding ad group identifier.|
|[AdGroupEstimate](adgroupestimate.md)|Contains a list of suggested keywords for the ad group with minimum and maximum traffic estimates.|
|[AdGroupEstimator](adgroupestimator.md)|Contains a list of keyword estimators with your keyword level filter criteria for traffic estimates.|
|[ApiFaultDetail](apifaultdetail.md)|Defines an Ad Insight API fault detail object that operations return when web service-specific errors occur, such as when the request message contains incomplete or invalid data.|
|[ApplicationFault](applicationfault.md)|Defines the base object from which all Ad Insight fault detail objects derive.|
|[ApplyRecommendationEntity](applyrecommendationentity.md)|Apply a recommendation.|
|[AuctionInsightEntry](auctioninsightentry.md)|Defines an auction insight entry for a domain.|
|[AuctionInsightKpi](auctioninsightkpi.md)|Defines an auction insight key performance indicator.|
|[AuctionInsightResult](auctioninsightresult.md)|Defines the auction insight results from calling the [GetAuctionInsightData](getauctioninsightdata.md) operation.|
|[AuctionSegmentSearchParameter](auctionsegmentsearchparameter.md)|Defines an auction segment search parameter.|
|[AutoApplyRecommendationsInfo](autoapplyrecommendationsinfo.md)|Defines the auto-apply opt-in status for specific recommendation type.|
|[BatchError](batcherror.md)|Defines an Ad Insight batch error object that identifies the item within the batch of items in the request message that caused the operation to fail, and describes the reason for the failure.|
|[BidLandscapePoint](bidlandscapepoint.md)|Defines an object that contains estimates of clicks, cost, and impressions  given the suggested bid.|
|[BidOpportunity](bidopportunity.md)|Defines an object that contains the suggested bid with estimated clicks and impressions opportunities.|
|[BroadMatchKeywordOpportunity](broadmatchkeywordopportunity.md)|Defines an object that contains the marketplace impact statistics of including broad match type keyword bids.|
|[BroadMatchSearchQueryKPI](broadmatchsearchquerykpi.md)|Defines an object that contains search query statistics of including broad match type keyword bids.|
|[BudgetOpportunity](budgetopportunity.md)|Defines an object that contains the suggested budget with estimated clicks and impressions opportunities.|
|[BudgetPoint](budgetpoint.md)|Defines an object that contains a budget amount and an estimate of weekly impressions, clicks, and cost for this budget amount.|
|[CampaignBudgetRecommendation](campaignbudgetrecommendation.md)|Defines the CampaignBudgetRecommendation data object.|
|[CampaignEstimate](campaignestimate.md)|Contains a nested list of suggested keywords for the campaign's ad groups with minimum and maximum traffic estimates.|
|[CampaignEstimator](campaignestimator.md)|Contains campaign filter criteria and a nested list of ad group and keyword level filter criteria for traffic estimates.|
|[CategorySearchParameter](categorysearchparameter.md)|The keyword category search parameter that you can use as a seed for new keyword ideas.|
|[CompetitionSearchParameter](competitionsearchparameter.md)|The competition search parameter filter that you can include when requesting keyword ideas.|
|[Criterion](criterion.md)|This is the base class from which keyword planner criterion objects derive.|
|[DateRangeSearchParameter](daterangesearchparameter.md)|The date range search parameter that you can include when requesting keyword ideas.|
|[DayMonthAndYear](daymonthandyear.md)|Defines an object that you use to specify the start and end dates of a date range.|
|[DecimalRoundedResult](decimalroundedresult.md)|Defines a DecimalRoundedResult data object.|
|[DeviceCriterion](devicecriterion.md)|The device criterion that you can include when requesting keyword ideas or traffic estimates.|
|[DeviceSearchParameter](devicesearchparameter.md)|The device search parameter filter that you can include when requesting keyword ideas.|
|[DismissRecommendationEntity](dismissrecommendationentity.md)|Dismiss a recommendation.|
|[DomainCategory](domaincategory.md)|Defines an object that contains a domain category with website coverage.|
|[EntityDetail](entitydetail.md)|Defines an object that provides detail information for an entity for performance insights.|
|[EntityParameter](entityparameter.md)|Defines an object that provides parameter information for an entity.|
|[EstimatedBidAndTraffic](estimatedbidandtraffic.md)|Defines an object that contains estimates of clicks, average cost per click (CPC), impressions, click-through rate (CTR), and total cost for the corresponding keyword or ad group given the suggested bid.|
|[EstimatedPositionAndTraffic](estimatedpositionandtraffic.md)|Defines an object that contains the estimated search results position and estimated keyword statistics such as clicks, average cost per click (CPC), impressions, click-through rate (CTR), and total cost for the specified keyword given the specified bid.|
|[ExcludeAccountKeywordsSearchParameter](excludeaccountkeywordssearchparameter.md)|The exclude account keywords search parameter filter that you can include when requesting keyword ideas.|
|[Feed](feed.md)|Defines a Feed data object.|
|[HistoricalSearchCountPeriodic](historicalsearchcountperiodic.md)|Defines an object that contains the number of times that the keyword was used in a search query during the specified time period.|
|[IdeaTextSearchParameter](ideatextsearchparameter.md)|The idea text search parameter filter that you can include when requesting keyword ideas.|
|[ImpressionShareSearchParameter](impressionsharesearchparameter.md)|The impression share search parameter filter that you can include when requesting keyword ideas.|
|[Keyword](keyword.md)|Defines a keyword with match type.|
|[KeywordAndConfidence](keywordandconfidence.md)|Defines an object that contains a suggested keyword and a confidence score.|
|[KeywordAndMatchType](keywordandmatchtype.md)|Defines an object that contains a keyword and corresponding match types.|
|[KeywordBidLandscape](keywordbidlandscape.md)|Defines an object that contains a list of estimated clicks, cost, and impressions from 1 to 7 days for the keyword identifier given the suggested bid.|
|[KeywordCategory](keywordcategory.md)|Defines an object that contains a keyword category and a confidence score.|
|[KeywordCategoryResult](keywordcategoryresult.md)|Defines an object that contains the keyword and a list of keyword categories that the keyword might belong to.|
|[KeywordDemographic](keyworddemographic.md)|Defines an object that contains the device, age and gender of the user who entered the search query, if known.|
|[KeywordDemographicResult](keyworddemographicresult.md)|Defines an object that contains the keyword and percentage of users by age and gender (if known) who searched for the specified keyword.|
|[KeywordEstimate](keywordestimate.md)|A suggested keyword with minimum and maximum traffic estimates.|
|[KeywordEstimatedBid](keywordestimatedbid.md)|Defines an object that contains the keyword and the estimated bid value for each match type.|
|[KeywordEstimatedPosition](keywordestimatedposition.md)|Defines an object that contains the keyword and the estimated position in the search results for each match type.|
|[KeywordEstimator](keywordestimator.md)|Contains a keyword estimators with your keyword level filter criteria for traffic estimates.|
|[KeywordHistoricalPerformance](keywordhistoricalperformance.md)|Defines an object that contains the key performance index data for the specified keyword.|
|[KeywordIdea](keywordidea.md)|Defines an object that contains a suggested keyword with historical statistics, like monthly search volume, competition, suggested minimum bid, and ad impression share.|
|[KeywordIdeaCategory](keywordideacategory.md)|Defines an object that contains a keyword idea category.|
|[KeywordIdEstimatedBid](keywordidestimatedbid.md)|Defines an object that contains the identifier of the keyword and the suggested bid value for the keyword and match type.|
|[KeywordIdEstimatedPosition](keywordidestimatedposition.md)|Defines an object that contains the identifier of a keyword and the estimated search results position for the keyword and match type.|
|[KeywordKPI](keywordkpi.md)|Defines a key performance index object for a keyword.|
|[KeywordLocation](keywordlocation.md)|Defines an object that contains the location, network, device, and the percentage of time that a user entered a search query.|
|[KeywordLocationResult](keywordlocationresult.md)|Defines an object that contains the locations where users were located when they searched for the specified keyword.|
|[KeywordOpportunity](keywordopportunity.md)|Defines an object that contains a suggested keyword and bid value.|
|[KeywordRecommendation](keywordrecommendation.md)|Defines a KeywordRecommendation data object.|
|[KeywordSearchCount](keywordsearchcount.md)|Defines an object that contains a list of search counts for each device and network where the keyword was included in a search query.|
|[KeywordSuggestion](keywordsuggestion.md)|Defines an object that contains a list of suggested keywords that may perform better than the specified keyword.|
|[LanguageCriterion](languagecriterion.md)|The language criterion that you can include when requesting keyword ideas or traffic estimates.|
|[LanguageSearchParameter](languagesearchparameter.md)|The language search parameter filter that you can include when requesting keyword ideas.|
|[LocationCriterion](locationcriterion.md)|The location criterion that you can include when requesting keyword ideas or traffic estimates.|
|[LocationSearchParameter](locationsearchparameter.md)|The location search parameter filter that you can include when requesting keyword ideas.|
|[NegativeKeyword](negativekeyword.md)|Defines a negative keyword with match type for traffic estimates.|
|[NetworkCriterion](networkcriterion.md)|The network criterion that you can include when requesting keyword ideas or traffic estimates.|
|[NetworkSearchParameter](networksearchparameter.md)|The network search parameter filter that you can include when requesting keyword ideas.|
|[OperationError](operationerror.md)|Defines an Ad Insight operation error object that contains the details that explain why the service operation failed.|
|[Opportunity](opportunity.md)|This is the base class from which opportunity objects derive.|
|[PerformanceInsightsDetail](performanceinsightsdetail.md)|Defines the details for performance insights.|
|[PerformanceInsightsMessage](performanceinsightsmessage.md)|Defines the message for performance insights.|
|[PerformanceInsightsMessageParameter](performanceinsightsmessageparameter.md)|Defines the message parameters for performance insights.|
|[QuerySearchParameter](querysearchparameter.md)|The query search parameter that you can use as a seed for new keyword ideas.|
|[RadiusTarget](radiustarget.md)|Defines a RadiusTarget data object.|
|[RangeResultOfDecimalRoundedResult](rangeresultofdecimalroundedresult.md)|Defines a RangeResultOfDecimalRoundedResult data object.|
|[RangeResultOfdouble](rangeresultofdouble.md)|Defines a RangeResultOfDouble data object.|
|[Recommendation](recommendation.md)|Defines the base object of Recommendation.|
|[RecommendationBase](recommendationbase.md)|Defines the RecommendationBase data object.|
|[RecommendationInfo](recommendationinfo.md)|Defines the base object of RecommendationInfo.|
|[RemoveConflictingNegativeKeywordRecommendation](removeconflictingnegativekeywordrecommendation.md)|Reserved.|
|[ResponsiveSearchAdAssetRecommendation](responsivesearchadassetrecommendation.md)|Reserved.|
|[ResponsiveSearchAdRecommendation](responsivesearchadrecommendation.md)|Defines a ResponsiveSearchAdRecommendation data object.|
|[ResponsiveSearchAdsRecommendation](responsivesearchadsrecommendation.md)|Defines an object that contains the responsive search ads to be suggested.|
|[RSARecommendationInfo](rsarecommendationinfo.md)|Defines an object that contains the info of responsive search ads recommendation.|
|[SearchCountsByAttributes](searchcountsbyattributes.md)|Defines an object that contains a list of keyword historical search counts for the corresponding device attribute.|
|[SearchParameter](searchparameter.md)|This is the base class from which keyword idea search parameter objects derive.|
|[SearchVolumeSearchParameter](searchvolumesearchparameter.md)|The search volume search parameter filter that you can include when requesting keyword ideas.|
|[SelectionOfAgeEnum](selectionofageenum.md)|Defines a data object for the selection of age targeting.|
|[SelectionOfGenderEnum](selectionofgenderenum.md)|Defines a data object for the selection of gender targeting.|
|[SelectionOflong](selectionoflong.md)|Defines a data object for the selection segment IDs.|
|[SuggestedBidSearchParameter](suggestedbidsearchparameter.md)|The suggested bid search parameter filter that you can include when requesting keyword ideas.|
|[SuggestedResponsiveSearchAd](suggestedresponsivesearchad.md)|Defines an object that describes the suggested responsive search ads.|
|[TextAssetSuggestions](textassetsuggestions.md)|Defines the text asset suggestions data object.|
|[TextParameter](textparameter.md)|Defines the text parameter for use with performance insights.|
|[TrafficEstimate](trafficestimate.md)|Defines an object that contains traffic estimates based on the campaign, ad group, and keyword criteria you specified when calling [GetKeywordTrafficEstimates](getkeywordtrafficestimates.md).|
|[UrlParameter](urlparameter.md)|Defines the URL parameter for use with performance insights.|
|[UrlSearchParameter](urlsearchparameter.md)|The URL search parameter that you can use as a seed for new keyword ideas.|
|[UseBroadMatchKeywordRecommendation](usebroadmatchkeywordrecommendation.md)|Reserved.|
