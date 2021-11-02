---
title: Campaign Management Service Operations
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Service operations reference for the CampaignManagement service.
---
# Campaign Management Service Operations
The Campaign Management service defines the following service operations.

|Service Operation|Description|Request Limits|
|---|---|---|
|[AddAdExtensions](addadextensions.md)|Adds one or more ad extensions to an account's ad extension library.|1 *AccountId*<br/><br/>100 *AdExtensions*|
|[AddAdGroupCriterions](addadgroupcriterions.md)|Adds one or more ad group criterions.|1 *AccountId*<br/><br/>1,000 *AdGroupCriterions*|
|[AddAdGroups](addadgroups.md)|Adds new ad groups to a specified campaign.|1,000 *AdGroups*<br/><br/>1 *CampaignId*|
|[AddAds](addads.md)|Adds one or more ads to an ad group.|1 *AdGroupId*<br/><br/>50 *Ads*|
|[AddAudiences](addaudiences.md)|Adds one or more audiences.|100 *Audiences*|
|[AddBidStrategies](addbidstrategies.md)|Adds bid strategies to an account's portfolio bid strategy library.|100 *BidStrategies*|
|[AddBudgets](addbudgets.md)|Adds new budgets to the account's shared budget library.|100 *Budgets*|
|[AddCampaignCriterions](addcampaigncriterions.md)|Adds one or more campaign criterions that help determine whether ads in each campaign get served.|100 *CampaignCriterions*|
|[AddCampaigns](addcampaigns.md)|Adds one or more campaigns to the specified account.|1 *AccountId*<br/><br/>100 *Campaigns*|
|[AddConversionGoals](addconversiongoals.md)|Adds new conversion goals to the account's shared conversion goal library.|100 *ConversionGoals*|
|[AddExperiments](addexperiments.md)|Adds experiments and creates experiment campaigns based on existing campaigns in an account.|100 *Experiments*|
|[AddImportJobs](addimportjobs.md)|Creates a new import job.|1 *ImportJobs*|
|[AddKeywords](addkeywords.md)|Adds one or more keywords to an ad group.|1 *AdGroupId*<br/><br/>1,000 *Keywords*|
|[AddLabels](addlabels.md)|Adds one or more labels to an account.|100 *Labels*|
|[AddListItemsToSharedList](addlistitemstosharedlist.md)|Adds negative keywords to a negative keyword list, or negative sites to a website exclusion list.|1 *SharedList*<br/><br/>5,000 *ListItems*|
|[AddMedia](addmedia.md)|Adds the specified media to an account's media library.|1 *AccountId*<br/><br/>10 *Media*|
|[AddNegativeKeywordsToEntities](addnegativekeywordstoentities.md)|Adds negative keywords to the specified campaign or ad group.|1 *EntityNegativeKeywords*<br/><br/>Each *EntityNegativeKeyword* element can contain up to 20,000 negative keywords.|
|[AddSharedEntity](addsharedentity.md)|Adds a negative keyword list to the ad account library, or adds a website exclusion list to the manager account (customer) library.|1 *SharedEntity*<br/><br/>5,000 *ListItems*|
|[AddUetTags](adduettags.md)|Adds new Universal Event Tracking (UET) tags that you can add to your website to allow Microsoft Advertising to collect actions people take on your website.|100 *UetTags*|
|[AddVideos](addvideos.md)|Adds one or more videos to an account.|100 *Videos*|
|[AppealEditorialRejections](appealeditorialrejections.md)|Appeals ads or keywords that failed editorial review.|1,000 *EntityIdToParentIdAssociations*|
|[ApplyOfflineConversionAdjustments](applyofflineconversionadjustments.md)|Applies offline conversion adjustments.|1,000 *OfflineConversionAdjustments*|
|[ApplyOfflineConversions](applyofflineconversions.md)|Applies offline conversions for the account with Microsoft Click Id among other offline conversion data.|1,000 *OfflineConversions*|
|[ApplyProductPartitionActions](applyproductpartitionactions.md)|Applies an add, update, or delete action to each of the specified [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md), which each contain a [ProductPartition](productpartition.md).|5,000 *CriterionActions*|
|[DeleteAdExtensions](deleteadextensions.md)|Deletes one or more ad extensions from the account's ad extension library.|1 *AccountId*<br/><br/>100 *AdExtensionIds*|
|[DeleteAdExtensionsAssociations](deleteadextensionsassociations.md)|Removes the specified association from the respective campaigns or ad groups.|1 *AccountId*<br/><br/>100 *AdExtensionIdToEntityIdAssociations*|
|[DeleteAdGroupCriterions](deleteadgroupcriterions.md)|Deletes the specified ad group criterions.|1 *AccountId*<br/><br/>1,000 *AdGroupCriterionIds*|
|[DeleteAdGroups](deleteadgroups.md)|Deletes one or more ad groups from the specified campaign.|1,000 *AdGroupIds*<br/><br/>1 *CampaignId*|
|[DeleteAds](deleteads.md)|Deletes one or more ads from the specified ad group.|1 *AdGroupId*<br/><br/>50 *AdIds*|
|[DeleteAudiences](deleteaudiences.md)|Deletes the specified audiences.|100 *AudienceIds*|
|[DeleteBidStrategies](deletebidstrategies.md)|Deletes bid strategies from an account's portfolio bid strategy library.|100 *BidStrategyIds*|
|[DeleteBudgets](deletebudgets.md)|Deletes budgets from the account's shared budget library.|100 *BudgetIds*|
|[DeleteCampaignCriterions](deletecampaigncriterions.md)|Deletes one or more campaign criterions.|100 *CampaignCriterionIds*|
|[DeleteCampaigns](deletecampaigns.md)|Deletes one or more campaigns in a specified account.|1 *AccountId*<br/><br/>100 *CampaignIds*|
|[DeleteExperiments](deleteexperiments.md)|Deletes one or more experiments.|100 *ExperimentIds*|
|[DeleteImportJobs](deleteimportjobs.md)|Deletes the import jobs.|1 *ImportJobs*|
|[DeleteKeywords](deletekeywords.md)|Deletes one or more keywords in a specified ad group.|1 *AdGroupId*<br/><br/>1,000 *KeywordIds*|
|[DeleteLabelAssociations](deletelabelassociations.md)|Deletes label associations.|100 *LabelAssociations*|
|[DeleteLabels](deletelabels.md)|Deletes one or more labels from the account.|100 *LabelIds*|
|[DeleteListItemsFromSharedList](deletelistitemsfromsharedlist.md)|Deletes negative keywords from a negative keyword list, or negative sites from a website exclusion list.|1 *SharedList*<br/><br/>5,000 *ListItemIds*|
|[DeleteMedia](deletemedia.md)|Deletes the specified media from an account's media library.|1 *AccountId*<br/><br/>100*MediaIds*|
|[DeleteNegativeKeywordsFromEntities](deletenegativekeywordsfromentities.md)|Deletes negative keywords from the specified campaign or ad group.|1 *EntityNegativeKeywords*<br/><br/>Each *EntityNegativeKeyword* element can contain up to 20,000 negative keywords.|
|[DeleteSharedEntities](deletesharedentities.md)|Deletes negative keyword lists from the ad account library, or deletes website exclusion lists from the manager account (customer) library.|20 *SharedEntities*|
|[DeleteSharedEntityAssociations](deletesharedentityassociations.md)|Deletes the negative keyword list to campaign associations, or website exclusion list to ad account associations.|10,000 *Associations*|
|[DeleteVideos](deletevideos.md)|Deletes one or more videos from the account.|100 *VideoIds*|
|[GetAccountMigrationStatuses](getaccountmigrationstatuses.md)|Gets the migration status info for the specified accounts.|1,000 *AccountIds*|
|[GetAccountProperties](getaccountproperties.md)|Gets account level properties by name.|Not applicable|
|[GetAdExtensionIdsByAccountId](getadextensionidsbyaccountid.md)|Gets the ad extensions from the account's ad extension library.|1 *AccountId*|
|[GetAdExtensionsAssociations](getadextensionsassociations.md)|Gets the respective ad extension associations by the specified campaign and ad group identifiers.|1 *AccountId*<br/><br/>100 *EntityIds*|
|[GetAdExtensionsByIds](getadextensionsbyids.md)|Gets the specified ad extensions from the account's ad extension library.|1 *AccountId*<br/><br/>100 *AdExtensionIds*|
|[GetAdExtensionsEditorialReasons](getadextensionseditorialreasons.md)|Gets reasons for ad extension editorial issues.|1 *AccountId*<br/><br/>100 *AdExtensionIdToEntityIdAssociations*|
|[GetAdGroupCriterionsByIds](getadgroupcriterionsbyids.md)|Gets ad group criterions by identifiers and types.|1 *AccountId*<br/><br/>1,000 *AdGroupCriterionIds*|
|[GetAdGroupsByCampaignId](getadgroupsbycampaignid.md)|Gets the ad groups within the specified campaign.|1 *CampaignId*|
|[GetAdGroupsByIds](getadgroupsbyids.md)|Gets the specified ad groups within the specified campaign.|1,000 *AdGroupIds*<br/><br/>1 *CampaignId*|
|[GetAdsByAdGroupId](getadsbyadgroupid.md)|Retrieves the ads within an ad group.|1 *AdGroupId*|
|[GetAdsByEditorialStatus](getadsbyeditorialstatus.md)|Retrieves the ads that belong to the specified ad group and have the specified editorial review status.|1 *AdGroupId*|
|[GetAdsByIds](getadsbyids.md)|Retrieves the specified ads from the specified ad group.|1 *AdGroupId*<br/><br/>20 *AdIds*|
|[GetAudiencesByIds](getaudiencesbyids.md)|Retrieves the specified audiences from the specified account.|100 *AudienceIds*|
|[GetBidStrategiesByIds](getbidstrategiesbyids.md)|Gets bid strategies in an account's portfolio bid strategy library.|100 *BidStrategyIds*|
|[GetBMCStoresByCustomerId](getbmcstoresbycustomerid.md)|Gets the Microsoft Merchant Center stores for the specified customer.|Not applicable.|
|[GetBSCCountries](getbsccountries.md)|Gets the list of supported sales country codes for Microsoft Shopping Campaigns.|Not applicable.|
|[GetBudgetsByIds](getbudgetsbyids.md)|Gets the specified budgets from the account's shared budget library.|100 *BudgetIds*|
|[GetCampaignCriterionsByIds](getcampaigncriterionsbyids.md)|Gets the specified campaign criterions.|100 *CampaignCriterionIds*<br/><br/>1 *CampaignId*|
|[GetCampaignIdsByBidStrategyIds](getcampaignidsbybidstrategyids.md)|Gets the campaign identifiers that are associated with the specified portfolio bid strategies.|100 *BidStrategyIds*|
|[GetCampaignIdsByBudgetIds](getcampaignidsbybudgetids.md)|Gets the campaign identifiers that share each specified budget.|100 *BudgetIds*|
|[GetCampaignsByAccountId](getcampaignsbyaccountid.md)|Gets the campaigns within an account.|1 *AccountId*|
|[GetCampaignsByIds](getcampaignsbyids.md)|Gets the specified campaigns within an account.|1 *AccountId*<br/><br/>100 *CampaignIds*|
|[GetConversionGoalsByIds](getconversiongoalsbyids.md)|Gets the specified conversion goals.|100 *ConversionGoalIds*|
|[GetConversionGoalsByTagIds](getconversiongoalsbytagids.md)|Gets the conversion goals that use the specified UET tags.|100 *TagIds*|
|[GetEditorialReasonsByIds](geteditorialreasonsbyids.md)|Gets the reasons why the specified entities failed editorial review and whether the issue is appealable.|1 *AccountId*<br/><br/>1,000 *EntityIdToParentIdAssociations*|
|[GetExperimentsByIds](getexperimentsbyids.md)|Gets experiments by experiment identifiers.|5,000 *ExperimentIds*|
|[GetFileImportUploadUrl](getfileimportuploadurl.md)|GetFileImportUploadUrl is reserved for future use.|N/A.|
|[GetGeoLocationsFileUrl](getgeolocationsfileurl.md)|Gets a temporary URL that you can use to download a file that contains identifiers for the geographical locations that you can target or exclude.|Not applicable.|
|[GetImportEntityIdsMapping](getimportentityidsmapping.md)|Gets mappings of your source entity IDs to Microsoft Advertising entity IDs.|100 *SourceEntityIds*|
|[GetImportJobsByIds](getimportjobsbyids.md)|Gets import jobs by their type and identifiers.|100 *ImportJobIds*|
|[GetImportResults](getimportresults.md)|Gets results for import jobs completed within the last 90 days.|100 *ImportJobIds*|
|[GetKeywordsByAdGroupId](getkeywordsbyadgroupid.md)|Gets the keywords within an ad group.|1 *AdGroupId*|
|[GetKeywordsByEditorialStatus](getkeywordsbyeditorialstatus.md)|Retrieves the keywords with the specified editorial review status.|1 *AdGroupId*|
|[GetKeywordsByIds](getkeywordsbyids.md)|Retrieves the specified keywords.|1 *AdGroupId*<br/><br/>1,000 *KeywordIds*|
|[GetLabelAssociationsByEntityIds](getlabelassociationsbyentityids.md)|Gets label associations by entity identifiers.|100 *EntityIds*|
|[GetLabelAssociationsByLabelIds](getlabelassociationsbylabelids.md)|Gets label associations by label identifiers.|1 *LabelIds*|
|[GetLabelsByIds](getlabelsbyids.md)|Gets labels by label identifiers.|1,000 *LabelIds*|
|[GetListItemsBySharedList](getlistitemsbysharedlist.md)|Gets the negative keywords of a negative keyword list, or negative sites of a website exclusion list.|1 *SharedList*|
|[GetMediaAssociations](getmediaassociations.md)|Gets the media associations of the specified entity type from an account's media library.|1 *AccountId*<br/><br/>100 *MediaIds*|
|[GetMediaMetaDataByAccountId](getmediametadatabyaccountid.md)|Gets the media meta data of the specified entity type from an account's media library.|Not applicable.|
|[GetMediaMetaDataByIds](getmediametadatabyids.md)|Gets the specified media meta data from an account's media library.|100 *MediaIds*|
|[GetNegativeKeywordsByEntityIds](getnegativekeywordsbyentityids.md)|Gets the negative keywords that are assigned directly to campaigns or ad groups.|1 *ParentEntityId*<br/><br/>1 *EntityIds*|
|[GetNegativeSitesByAdGroupIds](getnegativesitesbyadgroupids.md)|Gets the negative sites URLs that are assigned directly to ad groups.|15 *AdGroupIds*<br/><br/>1 *CampaignId*|
|[GetNegativeSitesByCampaignIds](getnegativesitesbycampaignids.md)|Gets the negative site URLs that are assigned directly to campaigns.|1 *AccountId*<br/><br/>15 *CampaignIds*|
|[GetProfileDataFileUrl](getprofiledatafileurl.md)|Gets a temporary URL that you can use to download industry or job function profile data.|1 *ProfileType*|
|[GetSharedEntities](getsharedentities.md)|Gets negative keyword lists or website exclusion lists.|Not applicable.|
|[GetSharedEntitiesByAccountId](getsharedentitiesbyaccountid.md)|Gets negative keyword lists.|Not applicable.|
|[GetSharedEntityAssociationsByEntityIds](getsharedentityassociationsbyentityids.md)|Gets the negative keyword list to campaign associations by campaign IDs, or website exclusion list to ad account associations by ad account IDs.|100 *EntityIds*|
|[GetSharedEntityAssociationsBySharedEntityIds](getsharedentityassociationsbysharedentityids.md)|Gets the negative keyword list to campaign associations by negative keyword list IDs, or website exclusion list to ad account associations by website exclusion list IDs.|1 *SharedEntityIds*|
|[GetUetTagsByIds](getuettagsbyids.md)|Gets the specified Universal Event Tracking (UET) tags.|100 *TagIds*|
|[GetVideosByIds](getvideosbyids.md)|Gets videos by video identifiers.|1,000 *VideoIds*|
|[SearchCompanies](searchcompanies.md)|Search for profile data by company name.|1 *CompanyNameFilter*|
|[SetAccountProperties](setaccountproperties.md)|Sets account level properties by name.|Not applicable|
|[SetAdExtensionsAssociations](setadextensionsassociations.md)|Associates the specified ad extensions with the respective campaigns or ad groups.|1 *AccountId*<br/><br/>100 *AdExtensionIdToEntityIdAssociations*|
|[SetLabelAssociations](setlabelassociations.md)|Sets label associations.|100 *LabelAssociations*|
|[SetNegativeSitesToAdGroups](setnegativesitestoadgroups.md)|Sets the negative site URLs directly to ad groups.|5,000 *AdGroupNegativeSites*<br/><br/>1 *CampaignId*|
|[SetNegativeSitesToCampaigns](setnegativesitestocampaigns.md)|Sets the negative site URLs directly to campaigns.|1 *AccountId*<br/><br/>5,000 *CampaignNegativeSites*|
|[SetSharedEntityAssociations](setsharedentityassociations.md)|Sets the negative keyword list to campaign associations, or website exclusion list to ad account associations.|10,000 *Associations*|
|[UpdateAdExtensions](updateadextensions.md)|Updates one or more ad extensions within an account's ad extension library.|1 *AccountId*<br/><br/>100 *AdExtensions*|
|[UpdateAdGroupCriterions](updateadgroupcriterions.md)|Updates one or more ad group criterions.|1 *AccountId*<br/><br/>1,000 *AdGroupCriterions*|
|[UpdateAdGroups](updateadgroups.md)|Updates the specified ad groups in a campaign.|1,000 *AdGroups*<br/><br/>1 *CampaignId*|
|[UpdateAds](updateads.md)|Updates the specified ads within an ad group.|1 *AdGroupId*<br/><br/>50 *Ads*|
|[UpdateAudiences](updateaudiences.md)|Updates the specified audiences.|100 *Audiences*|
|[UpdateBidStrategies](updatebidstrategies.md)|Updates bid strategies in an account's portfolio bid strategy library.|100 *BidStrategies*|
|[UpdateBudgets](updatebudgets.md)|Updates the specified budgets in the account's shared budget library.|100 *Budgets*|
|[UpdateCampaignCriterions](updatecampaigncriterions.md)|Updates one or more campaign criterions.|100 *CampaignCriterions*|
|[UpdateCampaigns](updatecampaigns.md)|Updates specified campaigns in a specified account.|1 *AccountId*<br/><br/>100 *Campaigns*|
|[UpdateConversionGoals](updateconversiongoals.md)|Updates conversion goals within the account's shared conversion goal library.|100 *ConversionGoals*|
|[UpdateExperiments](updateexperiments.md)|Updates the specified experiments.|100 *Experiments*|
|[UpdateImportJobs](updateimportjobs.md)|Replaces the specified import jobs with new import jobs.|1 *ImportJobs*|
|[UpdateKeywords](updatekeywords.md)|Updates the keywords within a specified ad group.|1 *AdGroupId*<br/><br/>1,000 *Keywords*|
|[UpdateLabels](updatelabels.md)|Updates the labels within the account.|100 *Labels*|
|[UpdateSharedEntities](updatesharedentities.md)|Updates the negative keyword lists or website exclusion lists.|20 *SharedEntities*|
|[UpdateUetTags](updateuettags.md)|Updates the specified Universal Event Tracking (UET) tags.|100 *UetTags*|
|[UpdateVideos](updatevideos.md)|Updates the videos within the account.|100 *Videos*|
