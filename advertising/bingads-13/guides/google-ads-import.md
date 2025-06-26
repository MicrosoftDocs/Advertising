---
title: Google Ads Import
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Import Google Ads campaigns.
---
# Google Ads Import
If you already are using Google Ads to advertise on Google, you can import these campaigns into Microsoft Advertising and run the same ads on Bing. This is an easy way to expand your online advertising reach. 

To import campaigns from Google Ads, [get a credential ID](#get-credentialid) to represent your Google Ads credentials, [choose the Google Ads account and campaigns](#choose-google-campaigns) that you want to import, [choose import options](#import-options) e.g., the entities that you want to import, and then [schedule the import](#import-schedule). 

You can get all of your ad account's scheduled import results via API, whether an import was scheduled via API or the Microsoft Advertising UI. 

> [!NOTE]
> The API supports import from one Google Ads account to one Microsoft Advertising account. When you schedule an import job via [AddImportJobs](../campaign-management-service/addimportjobs.md) operation, then in the Microsoft Advertising UI you'll see it in the context of an ad account, and it will not be included under your manager account's scheduled imports. If you follow the [Import multiple accounts from Google Ads](https://help.ads.microsoft.com/#apex/3/en/51050/0) workflow in the context of a manager account, the import jobs and results will be returned via the [GetImportJobsByIds](../campaign-management-service/getimportjobsbyids.md) and [GetImportResults](../campaign-management-service/getimportresults.md) operations.    

## <a name="get-credentialid"></a>Get an Import credential ID

The import credential ID links your Google Ads and Microsoft Advertising user credentials. Each import credential ID is only valid for importing into ad accounts under one manager account (customer).  

1. Sign in to Microsoft Advertising and navigate to the ad account where you want to import Google Ads campaigns. You must sign in and get an import credential ID with the same user credentials that will be used later when you [schedule the import](#import-schedule) via the [AddImportJobs](../campaign-management-service/addimportjobs.md) operation.  

1. From the search box in the top menu, search for **Import credential ID**. Select **Import credential ID** from the **Pages** result set.

1. Sign in with your Google account credentials. Be sure the Google user has access to the Google Ads account that you want to import from. 

    > [!IMPORTANT]
    > To test in the Microsoft Advertising [sandbox](sandbox.md) environment, you'll first need a Google Ads [test account](https://developers.google.com/google-ads/api/docs/first-call/overview#test_account). Otherwise you can import your production Google Ads account to production Microsoft Advertising. 

1. Copy or securely store the import credential ID. You'll need it later when you [choose Google Ads campaigns](#choose-google-campaigns) and [schedule the import](#import-schedule) via the [AddImportJobs](../campaign-management-service/addimportjobs.md) operation.  

    > [!NOTE]
    > Each import credential ID is provisioned for one Microsoft Advertising user and can be used for importing into ad accounts that the user can access. You can import any Google Ads account permitted via the Google account credentials. 
    > 
    > If either the [Microsoft Advertising User Credentials](#microsoft-credentials) or [Google Ads User Credentials](#google-credentials) varies or changes, then you'll need to use a different import credential ID. For details please see [Credential ID Scope](#credential-scope). 
    > 
    > For more information about the accounts that you can access with Microsoft Advertising credentials, see [Get Your Account and Customer IDs](get-started.md#get-ids). 

1. Use your import credential ID in the [CredentialId](../campaign-management-service/googleimportjob.md#credentialid) element of a [GoogleImportJob](../campaign-management-service/googleimportjob.md) instance, [choose the Google Ads account and campaigns](#choose-google-campaigns) that you want to import, [choose import options](#import-options) e.g., the entities that you want to import, and then call the [AddImportJobs](../campaign-management-service/addimportjobs.md) operation to [schedule the import](#import-schedule). See the sections below for more details. 

Changing your Google account password does not invalidate the import credential ID. Revoking **BingAdsImport App** permissions via your Google account settings will invalidate any previously provisioned import credential IDs. 

## <a name="choose-google-campaigns"></a>Choose Google Ads Campaigns

You'll use the import credential ID and choose Google Ads campaigns via the [GoogleImportJob](../campaign-management-service/googleimportjob.md) object. 
- Set the [CredentialId](../campaign-management-service/googleimportjob.md#credentialid) element to the import credential ID that was [provisioned](#get-credentialid) in the Microsoft Advertising UI. 
- Set the [GoogleAccountId](../campaign-management-service/googleimportjob.md#googleaccountid) element to the account ID of the Google ad account that you want to import from. 
- Optionally you can set the [CampaignAdGroupIds](../campaign-management-service/googleimportjob.md#campaignadgroupids) element if you want to limit the import to specific Google Ads campaigns. 

Later when you [schedule the import](#import-schedule) you'll set the destination Microsoft Advertising ad account via the CustomerAccountId header element of the [AddImportJobs](../campaign-management-service/addimportjobs.md) operation. 

## <a name="import-options"></a>Choose Import Options

Microsoft Advertising will import most supported campaigns, ads, targets, ad extensions, and other settings by default. As needed you can exclude an entity or otherwise customize the import via the [GoogleImportOption](../campaign-management-service/googleimportoption.md) object. 

Here are some example customizations. 
- If you want the import service to delete items that have been removed from your Google Ads account, then set [DeleteRemovedEntities](../campaign-management-service/googleimportoption.md#deleteremovedentities) to true. 
- If you want to increase the Microsoft Advertising campaign budgets 25 percent higher than your Google Ads campaign budgets, then set [AdjustmentForCampaignBudgets](../campaign-management-service/googleimportoption.md#adjustmentforcampaignbudgets) to 25. 
- If you do not want to update existing campaign budgets that are already in Microsoft Advertising, set [UpdateCampaignBudgets](../campaign-management-service/googleimportoption.md#updatecampaignbudgets) to false.

> [!NOTE]
> Please note that the [GoogleImportOption](../campaign-management-service/googleimportoption.md) object does not include a comprehensive list of imported items. Microsoft Advertising imports all the data needed to manage your campaigns and aims to provide the best experience for you. 
> 
> There is no option to exclude future supported entities from scheduled imports. For example, you cannot choose to only import "these specific ad extension types, but no other current or future ad extension types". Let's say promotion ad extensions is not yet available in the [GoogleImportOption](../campaign-management-service/googleimportoption.md) object. Once Microsoft Advertising supports it generally e.g., via the UI, all current and future scheduled imports will include promotion ad extensions until users opt out. After **PromotionAdExtensions** is added to the list of [import options](../campaign-management-service/googleimportoption.md), then you could explicitly set it false as needed.  

For more details about what does and doesn't get imported from Google Ads, see [What gets imported](https://help.ads.microsoft.com/#apex/3/en/50851/0). 

## <a name="import-schedule"></a>Choose the Import Schedule and Frequency

You can schedule a recurring import e.g., "Every Sunday at 4:00 PM" or you can run the import now. 

The scheduling options are:

- Auto: Microsoft Advertising will run imports on a varying schedule that will best optimize your campaigns.  
- Now: Import once as soon as you call the [AddImportJobs](../campaign-management-service/addimportjobs.md) operation. 
- Once: Import once at the date and time you specify.
- Daily: Import once per day at the time you specify.
- Weekly: Import once per week at the time you specify.
- Monthly: Import once per month at the time you specify.

To run the import "now", you can leave the Google import job [Frequency](../campaign-management-service/googleimportjob.md#frequency) element nil or empty. For all other scheduling options, set the frequency [Type](../campaign-management-service/frequency.md#type) and [Cron](../campaign-management-service/frequency.md#cron) values. For details about supported frequency values, see the [Frequency Remarks](../campaign-management-service/frequency.md#remarks).

## <a name="import-start"></a>Start the Import

You can schedule an import or run now via the [AddImportJobs](../campaign-management-service/addimportjobs.md) operation. Be sure to set the destination Microsoft Advertising ad account via the CustomerAccountId [header](../campaign-management-service/addimportjobs.md#request-header) element.  

You can get previously scheduled imports via the [GetImportJobsByIds](../campaign-management-service/getimportjobsbyids.md) operation. 

## <a name="import-start"></a>Review the Import Results

Now that you've imported your campaigns from Google Ads, you can check the status of your import and review error logs. Keep in mind that not all information will be imported, but that doesn't mean it's not supported within Microsoft Advertising. So, after you import, be sure to review your campaigns to make sure everything is good to go and add the missing information back to your campaigns. 

You can get import results via the [GetImportResults](../campaign-management-service/getimportresults.md) operation. Be sure to set the [ImportType](../campaign-management-service/getimportresults.md#importtype) element to "GoogleImportJob". The operation can return multiple results for the same import job e.g., if the scheduled import already ran every week for the last 8 weeks you'll get 8 results. If an import is scheduled for a future date, then no import results will be returned for that import job. 

You can get mappings of your source entity IDs to Microsoft Advertising entity IDs via the [GetImportEntityIdsMapping](../campaign-management-service/getimportentityidsmapping.md) operation.

For more details about what does and doesn't get imported from Google Ads, see [What gets imported](https://help.ads.microsoft.com/#apex/3/en/50851/0). 

## <a name="credential-scope"></a>Credential ID Scope

Each import credential ID is provisioned for one Microsoft Advertising user and can be used for importing into ad accounts that the user can access. You can import any Google Ads account permitted via the Google account credentials. 

If either the [Microsoft Advertising User Credentials](#microsoft-credentials) or [Google Ads User Credentials](#google-credentials) varies or changes, then you'll need to use a different import credential ID.  

### <a name="microsoft-credentials"></a>Microsoft Advertising User Credentials

When you [get an Import credential ID](#get-credentialid) you will sign in to Microsoft Advertising and navigate to the ad account where you want to import Google Ads campaigns. You must sign in and get an import credential ID with the same user credentials that will be used later when you [schedule the import](#import-schedule) via the [AddImportJobs](../campaign-management-service/addimportjobs.md) operation. 

The import credential ID would be invalid if you attempt to call [AddImportJobs](../campaign-management-service/addimportjobs.md) with the access token of any other user. 

### <a name="google-credentials"></a>Google Ads User Credentials

When you [get an Import credential ID](#get-credentialid) you will sign in with your Google account credentials. Be sure the Google user has access to the Google Ads account that you want to import from. 

The import credential ID would be invalid if you make any of the following changes. 
- Access to the Google Ads account is removed in Google Ads. 
- You remove Microsoft Advertising's access for the Google user credentials e.g., via Google's [Third-party apps with account access](https://myaccount.google.com/permissions) settings. Even if you grant access again via Microsoft Advertising, a new credential ID will be required to add new import jobs. 

Changing your Google account password does not invalidate the import credential ID. Revoking **BingAdsImport App** permissions via your Google account settings will invalidate any previously provisioned import credential IDs. 

## See Also
[Bing Ads API Web Service Addresses](web-service-addresses.md)  
