---
title: Bulk import preference
ms.service: msa-help
ms.subservice: msa-bulk-import
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn about the bulk import preference feature.
---

# Bulk import preference

> [!NOTE]
> If you don't have this feature and are interested in gaining access, please [contact Support](https://go.microsoft.com/fwlink/?linkid=398371) or reach out to your account manager.

If you've set up multiple imports and want to make changes to some or all of them, even if they're from different accounts, you can do so in bulk. You'll need to upload a file containing all of your preferences. We provide a template that you can make changes to and then upload to Microsoft Advertising.

## Get started

> [!NOTE]
> - The bulk import preference process will change any smart import to an advanced import.
> - Bulk import preference is available for Google import.

Before you get started, you need to identify the account and import tasks you'd like to modify, as well as the corresponding account ID and import IDs.

- You can find the account ID by navigating to **Tools** > **Preferences** > **Account settings**.

  Or, if you're using [the new Microsoft Advertising navigation](hlp_BA_CONC_NavigationRefresh.md), from the navigation menu on the left, select **Tools** > **Preferences** > **Account settings**.
- There are two ways to find import IDs:

  - Select **View schedule** under the **Import schedule** column in the **Upload an import preference file** grid. (See steps 1-2 below on how to get here.) Copy all relevant IDs from the ID column in the **Scheduled import** card.
  - From the navigation menu on the left, hover over **Import** and select **Import schedule & history**. You'll see the IDs under the **ID** column.

> [!NOTE]
> All import IDs included on the same file must be on the same customer ID (CID) level, though they can come from different accounts.

### Set bulk import preferences

1. From the navigation menu on the left, select **Tools** > **All accounts** > **Accounts summary**.
1. Select the **Import** tab > **Upload import preference**.
1. Select **Sample file** to download the sample CSV file.

   > [!NOTE]
   > We recommend using Notepad, as using Microsoft Excel may change the formatting and render the file unacceptable.
1. Modify the CSV file, while making sure you:

   - Separate **Task Id** (import ID), **Account Id**, **Preference**, and **Import type** into their own columns.
   - Separate each import ID into a different row.
   - The preferences must be in JSON formatted string. [See below for a list of accepted preferences.](#preferences)
   - Wrap each preference in double quotation marks.
   - In the Import type column, enter Google.
1. Select **Browse** to find the edited CSV file.
1. Select **Upload and review**.
1. Review the uploaded information.
1. Select **Apply**.

<a id="preferences"></a>

## Preferences

Below are the preference options—[Boolean](#boolean-import-preferences), [double](#double-import-preferences), [long](#long-import-preferences), [string](#string-import-preferences), and [search and replace strings](#search-and-replace-strings-import-preferences)—with sample values.

Copy and paste these into the **Preference** column of your CSV file. Each preference should be followed with a colon and their respective value (see the second column for sample values). Wrap each preference in double quotes. The entire set of preferences should be wrapped in braces ( { } ). For example:
```
"{ 
""NewEntities"" : true, 
""AdjustmentForCampaignBudgets"" : -1.0, 
""AssociatedUetTagId"" : 12345, 
""SuffixForUrls"" : ""abcdef"", 
""SearchAndReplaceForUrls"" : { 
    ""SearchString"" : ""newsearchstring"", 
    ""ReplaceString"" : ""newreplacestring"" 
    } 
}"
```

<a id="boolean-import-preferences"></a>

## Boolean import preferences

| Import preference name | Import preference sample value |
| --- | --- |
| **"AccountUrlOptions"** | true |
| **"AdScheduleUseSearcherTimezone"** | false |
| **"AutoDeviceBidOptimization"** |  |
| **"DeleteRemovedEntities"** |  |
| **"EnableAutoCurrencyConversion"** |  |
| **"EnableParentLocationMapping"** |  |
| **"NewActiveAdsForExistingAdGroups"** |  |
| **"NewActiveCampaignsAndChildEntities"** |  |
| **"NewAdCustomizerFeeds"** |  |
| **"NewAdGroupsAndChildEntitiesForExistingCampaigns"** |  |
| **"NewAdSchedules"** |  |
| **"NewAppAdExtensions"** |  |
| **"NewAudienceTargets"** |  |
| **"NewCallAdExtensions"** |  |
| **"NewCalloutAdExtensions"** |  |
| **"NewDemographicTargets"** |  |
| **"NewDeviceTargets"** |  |
| **"NewEntities"** |  |
| **"NewImageAdExtensions"** |  |
| **"NewKeywordsForExistingAdGroups"** |  |
| **"NewKeywordUrls"** |  |
| **"NewLabels"** |  |
| **"NewLocationAdExtensions"** |  |
| **"NewLocationTargets"** |  |
| **"NewNegativeKeywordsForExistingParents"** |  |
| **"NewNegativeKeywordLists"** |  |
| **"NewNegativeSites"** |  |
| **"NewPageFeeds"** |  |
| **"NewPausedAdsForExistingAdGroups"** |  |
| **"NewPausedCampaignsAndChildEntities"** |  |
| **"NewPriceAdExtensions"** |  |
| **"NewProductFilters"** |  |
| **"NewPromotionAdExtensions"** |  |
| **"NewReviewAdExtensions"** |  |
| **"NewSitelinkAdExtensions"** |  |
| **"NewStructuredSnippetAdExtensions"** |  |
| **"NewUrlOptions"** |  |
| **"PauseAIMAdGroupIfAllAudienceCriterionNotImported"** |  |
| **"PauseCampaignsWithoutSupportedLocations"** |  |
| **"PauseNewCampaigns"** |  |
| **"RaiseBidsToMinimum"** |  |
| **"RaiseCampaignBudgetsToMinimum"** |  |
| **"RaiseProductGroupBidsToMinimum"** |  |
| **"SearchAndDsaMixedCampaignAsSearchCampaign"** |  |
| **"UpdateAdCustomizerFeeds"** |  |
| **"UpdateAdGroupNetwork"** |  |
| **"UpdateAdSchedules"** |  |
| **"UpdateAppAdExtensions"** |  |
| **"UpdateAudienceTargets"** |  |
| **"UpdateBiddingStrategies"** |  |
| **"UpdateBids"** |  |
| **"UpdateCallAdExtensions"** |  |
| **"UpdateCalloutAdExtensions"** |  |
| **"UpdateCampaignAdGroupLanguages"** |  |
| **"UpdateCampaignBudgets"** |  |
| **"UpdateCampaignNames"** |  |
| **"UpdateDemographicTargets"** |  |
| **"UpdateDeviceTargets"** |  |
| **"UpdateEntities"** |  |
| **"UpdateImageAdExtensions"** |  |
| **"UpdateKeywordUrls"** |  |
| **"UpdateLabels"** |  |
| **"UpdateLocationAdExtensions"** |  |
| **"UpdateLocationTargets"** |  |
| **"UpdateNegativeKeywordLists"** |  |
| **"UpdateNegativeSites"** |  |
| **"UpdatePageFeeds"** |  |
| **"UpdatePriceAdExtensions"** |  |
| **"UpdateProductFilters"** |  |
| **"UpdatePromotionAdExtensions"** |  |
| **"UpdateReviewAdExtensions"** |  |
| **"UpdateSitelinkAdExtensions"** |  |
| **"UpdateStatusForAdGroups"** |  |
| **"UpdateStatusForAds"** |  |
| **"UpdateStatusForCampaigns"** |  |
| **"UpdateStatusForKeywords"** |  |
| **"UpdateStructuredSnippetAdExtensions"** |  |
| **"UpdateUrlOptions"** |  |

<a id="double-import-preferences"></a>

## Double import preferences

| Import preference name | Import preference sample placeholder value |
| --- | --- |
| **"AdjustmentForBids"** | 1.0 |
| **"AdjustmentForCampaignBudgets"** |  |

<a id="long-import-preferences"></a>

## Long import preferences

| Import preference name | Import preference sample placeholder value |
| --- | --- |
| **"AssociatedStoreId"** | 12345 |
| **"AssociatedUetTagId"** |  |

<a id="string-import-preferences"></a>

## String import preferences

| Import preference name | Import preference sample placeholder value |
| --- | --- |
| **"SuffixForCampaignNames"** | abcdef |
| **"SuffixForTrackingTemplates"** |  |
| **"SuffixForUrls"** |  |

<a id="search-and-replace-strings-import-preferences"></a>

## Search and replace strings import preferences

| Import preference name | Import preference sample placeholder value |
| --- | --- |
| **"SearchAndReplaceForCampaignNames"** | { "SearchString" : "abc", "ReplaceString" : "def" } |
| **"SearchAndReplaceForCustomParameters"** |  |
| **"SearchAndReplaceForFinalURLSuffix"** |  |
| **"SearchAndReplaceForTrackingTemplates"** |  |
| **"SearchAndReplaceForUrls"** |  |
