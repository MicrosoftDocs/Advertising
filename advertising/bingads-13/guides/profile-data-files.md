---
title: "Profile Data"
ms.service: "bing-ads"
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Find out about audience profile data supported with the Bing Ads API.
---
# Profile Data
You can target customers by company, industry, or job function profiles (according to LinkedIn), so that your ads are displayed more frequently to people who will be interested in them. Each profile criterion defines a company, industry, or job function for the accompanying criterion bid adjustment. This guide serves as an overview of how to get profile data e.g., identifiers that are required to target by audience profile. For more details on how to setup profile target criteria, see [Show Ads to Your Target Audience](show-ads-target-audience.md#profilecriterion). 

You can use the [SearchCompanies](../campaign-management-service/searchcompanies.md) operation to search for profile data by [company name](#companyname), and otherwise for [industry](#industry) and [job function](#jobfunction) profile data use the [GetProfileDataFileUrl](../campaign-management-service/getprofiledatafileurl.md) operation. 

> [!IMPORTANT]
> Please note the following with respect to industry and job function data returned via the [GetProfileDataFileUrl](../campaign-management-service/getprofiledatafileurl.md) operation. 
> - New columns may be added at any time, so your implementation must ignore unknown columns.
> - The order of profile data is not guaranteed, so you should not take dependencies on any perceived column sort order or hierarchy.  
> - As a best practice you should download the file instead of opening it directly through an application such as Microsoft Excel. If you view the profile data in a text editor, be sure to use UTF-8 encoding instead of ANSI, otherwise some characters will not be displayed accurately.

## <a name="companyname"></a>Company Name Profile
You can use the [SearchCompanies](../campaign-management-service/searchcompanies.md) operation to search for profile data by company name. The operation requires a company name filter with a minimum of 3 characters, and returns a list of [Company](../campaign-management-service/company.md) objects. 

## <a name="industry"></a>Industry Profile
If you set the [ProfileType](../campaign-management-service/getprofiledatafileurl.md#profiletype) to *Industry* when calling the [GetProfileDataFileUrl](../campaign-management-service/getprofiledatafileurl.md) operation, the following industry data is available in the downloaded *industries.csv* file. 

Each comma separated value (CSV) file contains data organized in the following non-localized column headings. Only the Display Name and Descriptor columns are localized depending on the file URL used above.

|Column Name|Description|
|---------------|---------------|
|Profile Id|The unique Microsoft Advertising identifier for the profile.<br/><br/>In *industries.csv* this is the unique identifier of the industry.|
|Industry Display Name|The display name for the industry for example, "Food Production".|
|Industry Group Display Name|The display name of the group that this industry belongs to for example, "Manufacturing".|
|Replaces|Reserved for future use to indicate which profile or profiles are replaced by the profile in this row.|
|Status|Reserved for future use to indicate whether the profile in this row is active or deprecated. Currently there are no deprecated profiles provided in the CSV file.|

## <a name="jobfunction"></a>Job Function Profile
If you set the [ProfileType](../campaign-management-service/getprofiledatafileurl.md#profiletype) to *JobFunction* when calling the [GetProfileDataFileUrl](../campaign-management-service/getprofiledatafileurl.md) operation, the following job function data is available in the downloaded *companies.csv* file. 

Each comma separated value (CSV) file contains data organized in the following non-localized column headings. Only the Display Name and Descriptor columns are localized depending on the file URL used above.

|Column Name|Description|
|---------------|---------------|
|Profile Id|The unique Microsoft Advertising identifier for the profile.<br/><br/>In *jobfunctions.csv* this is the unique identifier of the job function.|
|Job Function Display Name|The display name of this job function for example, "Accounting".|
|Replaces|Reserved for future use to indicate which profile or profiles are replaced by the profile in this row.|
|Status|Reserved for future use to indicate whether the profile in this row is active or deprecated. Currently there are no deprecated profiles provided in the CSV file.|

## See Also
[Show Ads to Your Target Audience](show-ads-target-audience.md) 
