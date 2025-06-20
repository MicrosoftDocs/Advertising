---
title: Campaign Management Service Operations
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
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
|[AddAssetGroups](addassetgroups.md)|Adds array of asset groups to a specified campaign.|N/A.|
|[AddAudienceGroups](addaudiencegroups.md)|Adds array of audience groups to the account.|N/A.|
|[AddAudiences](addaudiences.md)|Adds one or more audiences.|100 *Audiences*|
|[AddBidStrategies](addbidstrategies.md)|Adds bid strategies to an account's portfolio bid strategy library.|100 *BidStrategies*|
|[AddBrandKits](addbrandkits.md)|Create new brand kit.|N/A.|
|[AddBudgets](addbudgets.md)|Adds new budgets to the account's shared budget library.|100 *Budgets*|
|[AddCampaignConversionGoals](addcampaignconversiongoals.md)|Adds new campaign conversion goals to the account's shared campaign conversion goal library.|N/A.|
|[AddCampaignCriterions](addcampaigncriterions.md)|Adds one or more campaign criterions that help determine whether ads in each campaign get served.|100 *CampaignCriterions*|
|[AddCampaigns](addcampaigns.md)|Adds one or more campaigns to the specified account.|1 *AccountId*<br/><br/>100 *Campaigns*|
|[AddConversionGoals](addconversiongoals.md)|Adds new conversion goals to the account's shared conversion goal library.|100 *ConversionGoals*|
|[AddConversionValueRules](addconversionvaluerules.md)|Create new conversion value rules.|N/A.|
|[AddDataExclusions](adddataexclusions.md)|Add a data exclusion to the specified account.|N/A.|
|[AddExperiments](addexperiments.md)|Adds experiments and creates experiment campaigns based on existing campaigns in an account.|100 *Experiments*|
|[AddImportJobs](addimportjobs.md)|Creates a new import job.|1 *ImportJobs*|
|[AddKeywords](addkeywords.md)|Adds one or more keywords to an ad group.|1 *AdGroupId*<br/><br/>1,000 *Keywords*|
|[AddLabels](addlabels.md)|Adds one or more labels to an account.|100 *Labels*|
|[AddListItemsToSharedList](addlistitemstosharedlist.md)|Adds negative keywords to a negative keyword list, or negative sites to a website exclusion list.|1 *SharedList*<br/><br/>5,000 *ListItems*|
|[AddMedia](addmedia.md)|Adds the specified media to an account's asset library.|1 *AccountId*<br/><br/>10 *Media*|
|[AddNegativeKeywordsToEntities](addnegativekeywordstoentities.md)|Adds negative keywords to the specified campaign or ad group.|1 *EntityNegativeKeywords*<br/><br/>Each *EntityNegativeKeyword* element can contain up to 20,000 negative keywords.|
|[AddNewCustomerAcquisitionGoals](addnewcustomeracquisitiongoals.md)|Adds new customer acquisition goals to the account's shared conversion goal library.|N/A.|
|[AddSeasonalityAdjustments](addseasonalityadjustments.md)|Add seasonality adjustments to the specified account.|N/A.|
|[AddSharedEntity](addsharedentity.md)|Adds a negative keyword list to the ad account library, or adds a website exclusion list to the manager account (customer) library.|1 *SharedEntity*<br/><br/>5,000 *ListItems*|
|[AddUetTags](adduettags.md)|Adds new Universal Event Tracking (UET) tags that you can add to your website to allow Microsoft Advertising to collect actions people take on your website.|100 *UetTags*|
|[AddVideos](addvideos.md)|Adds one or more videos to an account.|100 *Videos*|
|[AppealEditorialRejections](appealeditorialrejections.md)|Appeals ads or keywords that failed editorial review.|1,000 *EntityIdToParentIdAssociations*|
|[ApplyAssetGroupListingGroupActions](applyassetgrouplistinggroupactions.md)|Applies an action to an asset group listing group.|N/A.|
|[ApplyCustomerListItems](applycustomerlistitems.md)|Defines the ApplyCustomerListItems service operation.|N/A.|
|[ApplyCustomerListUserData](applycustomerlistuserdata.md)|Defines the ApplyCustomerListUserData service operation.|N/A.|
|[ApplyHotelGroupActions](applyhotelgroupactions.md)|Applies an add, update, or delete action to each of the specified [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md), which each contain a [HotelGroup](hotelgroup.md).|N/A.|
|[ApplyOfflineConversionAdjustments](applyofflineconversionadjustments.md)|Applies offline conversion adjustments.|1,000 *OfflineConversionAdjustments*|
|[ApplyOfflineConversions](applyofflineconversions.md)|Applies offline conversions for the account with Microsoft Click Id among other offline conversion data.|1,000 *OfflineConversions*|
|[ApplyOnlineConversionAdjustments](applyonlineconversionadjustments.md)|Applies online conversion adjustments.|N/A.|
|[ApplyProductPartitionActions](applyproductpartitionactions.md)|Applies an add, update, or delete action to each of the specified [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md), which each contain a [ProductPartition](productpartition.md).|5,000 *CriterionActions*|
|[CreateAssetGroupRecommendation](createassetgrouprecommendation.md)|Create an asset group recommendation.|N/A.|
|[CreateBrandKitRecommendation](createbrandkitrecommendation.md)|Creates a brand kit recommendation.|N/A.|
|[CreateResponsiveAdRecommendation](createresponsiveadrecommendation.md)|Create a responsive ad recommendation.|N/A.|
|[CreateResponsiveSearchAdRecommendation](createresponsivesearchadrecommendation.md)|Create a responsive search ad recommendation.|N/A.|
|[DeleteAdExtensions](deleteadextensions.md)|Deletes one or more ad extensions from the account's ad extension library.|1 *AccountId*<br/><br/>100 *AdExtensionIds*|
|[DeleteAdExtensionsAssociations](deleteadextensionsassociations.md)|Removes the specified association from the respective campaigns or ad groups.|1 *AccountId*<br/><br/>100 *AdExtensionIdToEntityIdAssociations*|
|[DeleteAdGroupCriterions](deleteadgroupcriterions.md)|Deletes the specified ad group criterions.|1 *AccountId*<br/><br/>1,000 *AdGroupCriterionIds*|
|[DeleteAdGroups](deleteadgroups.md)|Deletes one or more ad groups from the specified campaign.|1,000 *AdGroupIds*<br/><br/>1 *CampaignId*|
|[DeleteAds](deleteads.md)|Deletes one or more ads from the specified ad group.|1 *AdGroupId*<br/><br/>50 *AdIds*|
|[DeleteAssetGroups](deleteassetgroups.md)|Deletes one or more AssetGroups.|N/A.|
|[DeleteAudienceGroupAssetGroupAssociations](deleteaudiencegroupassetgroupassociations.md)|Deletes one or more AudienceGroupAssetGroupAssociations.|N/A.|
|[DeleteAudienceGroups](deleteaudiencegroups.md)|Deletes one or more AudienceGroups.|N/A.|
|[DeleteAudiences](deleteaudiences.md)|Deletes the specified audiences.|100 *AudienceIds*|
|[DeleteBidStrategies](deletebidstrategies.md)|Deletes bid strategies from an account's portfolio bid strategy library.|100 *BidStrategyIds*|
|[DeleteBrandKits](deletebrandkits.md)|Deletes BrandKits from the account.|N/A.|
|[DeleteBudgets](deletebudgets.md)|Deletes budgets from the account's shared budget library.|100 *BudgetIds*|
|[DeleteCampaignConversionGoals](deletecampaignconversiongoals.md)|Deletes a campaign conversion goal.|N/A.|
|[DeleteCampaignCriterions](deletecampaigncriterions.md)|Deletes one or more campaign criterions.|100 *CampaignCriterionIds*|
|[DeleteCampaigns](deletecampaigns.md)|Deletes one or more campaigns in a specified account.|1 *AccountId*<br/><br/>100 *CampaignIds*|
|[DeleteDataExclusions](deletedataexclusions.md)|Deletes the specified data exclusions from the specified account.|N/A.|
|[DeleteExperiments](deleteexperiments.md)|Deletes one or more experiments.|100 *ExperimentIds*|
|[DeleteImportJobs](deleteimportjobs.md)|Deletes the import jobs.|1 *ImportJobs*|
|[DeleteKeywords](deletekeywords.md)|Deletes one or more keywords in a specified ad group.|1 *AdGroupId*<br/><br/>1,000 *KeywordIds*|
|[DeleteLabelAssociations](deletelabelassociations.md)|Deletes label associations.|100 *LabelAssociations*|
|[DeleteLabels](deletelabels.md)|Deletes one or more labels from the account.|100 *LabelIds*|
|[DeleteListItemsFromSharedList](deletelistitemsfromsharedlist.md)|Deletes negative keywords from a negative keyword list, or negative sites from a website exclusion list.|1 *SharedList*<br/><br/>5,000 *ListItemIds*|
|[DeleteMedia](deletemedia.md)|Deletes the specified media from an account's media library.|1 *AccountId*<br/><br/>100*MediaIds*|
|[DeleteNegativeKeywordsFromEntities](deletenegativekeywordsfromentities.md)|Deletes negative keywords from the specified campaign or ad group.|1 *EntityNegativeKeywords*<br/><br/>Each *EntityNegativeKeyword* element can contain up to 20,000 negative keywords.|
|[DeleteSeasonalityAdjustments](deleteseasonalityadjustments.md)|Deletes the specified seasonality adjustments from the specified account.|N/A.|
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
|[GetAnnotationOptOut](getannotationoptout.md)|Returns the current annotation opt-out configuration.|N/A.|
|[GetAssetGroupListingGroupsByIds](getassetgrouplistinggroupsbyids.md)|Retrieves the specified AssetGroupListingGroups.|N/A.|
|[GetAssetGroupsByCampaignId](getassetgroupsbycampaignid.md)|Retrieves the specified AssetGroups.|N/A.|
|[GetAssetGroupsByIds](getassetgroupsbyids.md)|Retrieves specified AssetGroups.|N/A.|
|[GetAssetGroupsEditorialReasons](getassetgroupseditorialreasons.md)|Gets reasons for asset group editorial issues.|N/A.|
|[GetAudienceGroupAssetGroupAssociationsByAssetGroupIds](getaudiencegroupassetgroupassociationsbyassetgroupids.md)|Retrieves the specified AudienceGroupAssetGroupAssociations by asset group IDs.|N/A.|
|[GetAudienceGroupAssetGroupAssociationsByAudienceGroupIds](getaudiencegroupassetgroupassociationsbyaudiencegroupids.md)|Retrieves the specified AudienceGroupAssetGroupAssociations by audience group IDs.|N/A.|
|[GetAudienceGroupsByIds](getaudiencegroupsbyids.md)|Retrieves specified AudienceGroups.|N/A.|
|[GetAudiencesByIds](getaudiencesbyids.md)|Retrieves the specified audiences from the specified account.|100 *AudienceIds*|
|[GetBidStrategiesByIds](getbidstrategiesbyids.md)|Gets bid strategies in an account's portfolio bid strategy library.|100 *BidStrategyIds*|
|[GetBMCStoresByCustomerId](getbmcstoresbycustomerid.md)|Gets the Microsoft Merchant Center stores for the specified customer.|Not applicable.|
|[GetBrandKitsByAccountId](getbrandkitsbyaccountid.md)|Retrieves all of the BrandKits associated with the specified account.|N/A.|
|[GetBrandKitsByIds](getbrandkitsbyids.md)|Retrieves the specified BrandKits from the specified account.|N/A.|
|[GetBSCCountries](getbsccountries.md)|Gets the list of supported sales country codes for Microsoft Shopping Campaigns.|Not applicable.|
|[GetBudgetsByIds](getbudgetsbyids.md)|Gets the specified budgets from the account's shared budget library.|100 *BudgetIds*|
|[GetCampaignCriterionsByIds](getcampaigncriterionsbyids.md)|Gets the specified campaign criterions.|100 *CampaignCriterionIds*<br/><br/>1 *CampaignId*|
|[GetCampaignIdsByBidStrategyIds](getcampaignidsbybidstrategyids.md)|Gets the campaign identifiers that are associated with the specified portfolio bid strategies.|100 *BidStrategyIds*|
|[GetCampaignIdsByBudgetIds](getcampaignidsbybudgetids.md)|Gets the campaign identifiers that share each specified budget.|100 *BudgetIds*|
|[GetCampaignsByAccountId](getcampaignsbyaccountid.md)|Gets the campaigns within an account.|1 *AccountId*|
|[GetCampaignsByIds](getcampaignsbyids.md)|Gets the specified campaigns within an account.|1 *AccountId*<br/><br/>100 *CampaignIds*|
|[GetClipchampTemplates](getclipchamptemplates.md)|Gets the specified clip champ templates.|N/A.|
|[GetConversionGoalsByIds](getconversiongoalsbyids.md)|Gets the specified conversion goals.|100 *ConversionGoalIds*|
|[GetConversionGoalsByTagIds](getconversiongoalsbytagids.md)|Gets the conversion goals that use the specified UET tags.|100 *TagIds*|
|[GetConversionValueRulesByAccountId](getconversionvaluerulesbyaccountid.md)|Gets conversion value rules by the account ID.|N/A.|
|[GetConversionValueRulesByIds](getconversionvaluerulesbyids.md)|Gets conversion value rules by their IDs.|N/A.|
|[GetDataExclusionsByAccountId](getdataexclusionsbyaccountid.md)|Gets the data exclusions associated with an account.|N/A.|
|[GetDataExclusionsByIds](getdataexclusionsbyids.md)|Gets the specified data exclusions associated with an account.|N/A.|
|[GetDiagnostics](getdiagnostics.md)|Defines the get diagnostics service operation.|N/A.|
|[GetEditorialReasonsByIds](geteditorialreasonsbyids.md)|Gets the reasons why the specified entities failed editorial review and whether the issue is appealable.|1 *AccountId*<br/><br/>1,000 *EntityIdToParentIdAssociations*|
|[GetExperimentsByIds](getexperimentsbyids.md)|Gets experiments by experiment identifiers.|5,000 *ExperimentIds*|
|[GetFileImportUploadUrl](getfileimportuploadurl.md)|GetFileImportUploadUrl is reserved for future use.|N/A.|
|[GetGeoLocationsFileUrl](getgeolocationsfileurl.md)|Gets a temporary URL that you can use to download a file that contains identifiers for the geographical locations that you can target or exclude.|Not applicable.|
|[GetHealthCheck](gethealthcheck.md)|Retrieves health check entities and types.|N/A.|
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
|[GetNewCustomerAcquisitionGoalsByAccountId](getnewcustomeracquisitiongoalsbyaccountid.md)|Gets the specified new customer acquisition goals.|N/A.|
|[GetOfflineConversionReports](getofflineconversionreports.md)|Gets the offline conversion reports in the requested date range.|N/A.|
|[GetProfileDataFileUrl](getprofiledatafileurl.md)|Gets a temporary URL that you can use to download industry or job function profile data.|1 *ProfileType*|
|[GetResponsiveAdRecommendationJob](getresponsiveadrecommendationjob.md)|Retrieves a responsive ad recommentation job.|N/A.|
|[GetSeasonalityAdjustmentsByAccountId](getseasonalityadjustmentsbyaccountid.md)|Gets the seasonality adjustments associated with an account.|N/A.|
|[GetSeasonalityAdjustmentsByIds](getseasonalityadjustmentsbyids.md)|Gets the specified seasonality adjustments associated with an account.|N/A.|
|[GetSharedEntities](getsharedentities.md)|Gets negative keyword lists or website exclusion lists.|Not applicable.|
|[GetSharedEntitiesByAccountId](getsharedentitiesbyaccountid.md)|Gets negative keyword lists.|Not applicable.|
|[GetSharedEntityAssociationsByEntityIds](getsharedentityassociationsbyentityids.md)|Gets the negative keyword list to campaign associations by campaign IDs, or website exclusion list to ad account associations by ad account IDs.|100 *EntityIds*|
|[GetSharedEntityAssociationsBySharedEntityIds](getsharedentityassociationsbysharedentityids.md)|Gets the negative keyword list to campaign associations by negative keyword list IDs, or website exclusion list to ad account associations by website exclusion list IDs.|1 *SharedEntityIds*|
|[GetSupportedClipchampAudio](getsupportedclipchampaudio.md)|Gets the specified supported clip champ audio.|N/A.|
|[GetSupportedFonts](getsupportedfonts.md)|Gets the specified supported fonts.|N/A.|
|[GetUetTagsByIds](getuettagsbyids.md)|Gets the specified Universal Event Tracking (UET) tags.|100 *TagIds*|
|[GetVideosByIds](getvideosbyids.md)|Gets videos by video identifiers.|1,000 *VideoIds*|
|[RefineAssetGroupRecommendation](refineassetgrouprecommendation.md)|Refine an asset group recommendation.|N/A.|
|[RefineResponsiveAdRecommendation](refineresponsiveadrecommendation.md)|Refine a responsive ad recommendation.|N/A.|
|[RefineResponsiveSearchAdRecommendation](refineresponsivesearchadrecommendation.md)|Refine a responsive search ad recommendation.|N/A.|
|[SearchCompanies](searchcompanies.md)|Search for profile data by company name.|1 *CompanyNameFilter*|
|[SetAccountProperties](setaccountproperties.md)|Sets account level properties by name.|Not applicable|
|[SetAdExtensionsAssociations](setadextensionsassociations.md)|Associates the specified ad extensions with the respective campaigns or ad groups.|1 *AccountId*<br/><br/>100 *AdExtensionIdToEntityIdAssociations*|
|[SetAudienceGroupAssetGroupAssociations](setaudiencegroupassetgroupassociations.md)|Sets AudienceGroupAssetGroupAssociations.|N/A.|
|[SetLabelAssociations](setlabelassociations.md)|Sets label associations.|100 *LabelAssociations*|
|[SetNegativeSitesToAdGroups](setnegativesitestoadgroups.md)|Sets the negative site URLs directly to ad groups.|5,000 *AdGroupNegativeSites*<br/><br/>1 *CampaignId*|
|[SetNegativeSitesToCampaigns](setnegativesitestocampaigns.md)|Sets the negative site URLs directly to campaigns.|1 *AccountId*<br/><br/>5,000 *CampaignNegativeSites*|
|[SetSharedEntityAssociations](setsharedentityassociations.md)|Sets the negative keyword list to campaign associations, or website exclusion list to ad account associations.|10,000 *Associations*|
|[UpdateAdExtensions](updateadextensions.md)|Updates one or more ad extensions within an account's ad extension library.|1 *AccountId*<br/><br/>100 *AdExtensions*|
|[UpdateAdGroupCriterions](updateadgroupcriterions.md)|Updates one or more ad group criterions.|1 *AccountId*<br/><br/>1,000 *AdGroupCriterions*|
|[UpdateAdGroups](updateadgroups.md)|Updates the specified ad groups in a campaign.|1,000 *AdGroups*<br/><br/>1 *CampaignId*|
|[UpdateAds](updateads.md)|Updates the specified ads within an ad group.|1 *AdGroupId*<br/><br/>50 *Ads*|
|[UpdateAnnotationOptOut](updateannotationoptout.md)|Updates the annotation opt-out settings for an account.|N/A.|
|[UpdateAssetGroups](updateassetgroups.md)|Updates the specified asset groups.|N/A.|
|[UpdateAudienceGroups](updateaudiencegroups.md)|Updates the specified audience groups.|N/A.|
|[UpdateAudiences](updateaudiences.md)|Updates the specified audiences.|100 *Audiences*|
|[UpdateBidStrategies](updatebidstrategies.md)|Updates bid strategies in an account's portfolio bid strategy library.|100 *BidStrategies*|
|[UpdateBrandKits](updatebrandkits.md)|Updates the specified BrandKits in the account.|N/A.|
|[UpdateBudgets](updatebudgets.md)|Updates the specified budgets in the account's shared budget library.|100 *Budgets*|
|[UpdateCampaignCriterions](updatecampaigncriterions.md)|Updates one or more campaign criterions.|100 *CampaignCriterions*|
|[UpdateCampaigns](updatecampaigns.md)|Updates specified campaigns in a specified account.|1 *AccountId*<br/><br/>100 *Campaigns*|
|[UpdateConversionGoals](updateconversiongoals.md)|Updates conversion goals within the account's shared conversion goal library.|100 *ConversionGoals*|
|[UpdateConversionValueRules](updateconversionvaluerules.md)|Update existing conversion value rules.|N/A.|
|[UpdateConversionValueRulesStatus](updateconversionvaluerulesstatus.md)|Update the status of the specified conversion value rules.|N/A.|
|[UpdateDataExclusions](updatedataexclusions.md)|Make updates to the specified data exclusions.|N/A.|
|[UpdateExperiments](updateexperiments.md)|Updates the specified experiments.|100 *Experiments*|
|[UpdateImportJobs](updateimportjobs.md)|Replaces the specified import jobs with new import jobs.|1 *ImportJobs*|
|[UpdateKeywords](updatekeywords.md)|Updates the keywords within a specified ad group.|1 *AdGroupId*<br/><br/>1,000 *Keywords*|
|[UpdateLabels](updatelabels.md)|Updates the labels within the account.|100 *Labels*|
|[UpdateNewCustomerAcquisitionGoals](updatenewcustomeracquisitiongoals.md)|Update the specificed new customer acquisition goals.|N/A.|
|[UpdateSeasonalityAdjustments](updateseasonalityadjustments.md)|Make updates to the specified seasonality adjustments.|N/A.|
|[UpdateSharedEntities](updatesharedentities.md)|Updates the negative keyword lists or website exclusion lists.|20 *SharedEntities*|
|[UpdateUetTags](updateuettags.md)|Updates the specified Universal Event Tracking (UET) tags.|100 *UetTags*|
|[UpdateVideos](updatevideos.md)|Updates the videos within the account.|100 *Videos*|
