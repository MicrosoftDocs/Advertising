---
title: Generative AI
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: With Copilot asset creation via Campaign Management API, advertisers, agencies, and partners who access Microsoft Advertising via API can use generative AI capabilities to create campaigns with ease and save time.
---

# Generative AI API

Advertisers, agencies, and partners who access Microsoft Advertising via API can use Copilot in Microsoft Advertising Platform's generative AI capabilities to create and optimize campaign creatives at scale.

Ad generation quickly build ads and asset groups by leveraging generative AI to generate ad copy, recommend images, and assemble video and display banner assets based on a website URL and a text prompt.  

Asset generation leverages generative AI to scale production and refinement of text, image, background image, and banner assets. With Brand Kit, your assets can look and read like your brand.

[See market and language availability for Generative AI tools](https://help.ads.microsoft.com/#apex/ads/en/50873/0).  

## Ad Generation

Copilot makes it easy to generate high volumes of custom ads and asset groups.

### Performance Max

To create an asset group for a Performance Max campaign with AI-generated text and recommended images use [CreateAssetGroupRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/createassetgrouprecommendation?view=bingads-13).

- A list of Final URLs (string array)
- Optional: [AdRecommendationTextTone](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationtexttone?view=bingads-13) = _Cute, Friendly, Inspiring,_ or _Persuasive_
- Optional: Prompt = Description of campaign theme, used for generating ad copy, and get image recommendations (string)

Copilot will return:

- An asset group ([AssetGroup](https://learn.microsoft.com/en-us/advertising/campaign-management-service/assetgroup?view=bingads-13))  
- A list of images ([AdRecommendationImageSuggestion](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationimagesuggestion?view=bingads-13) array)

Then, use [AddMedia](https://learn.microsoft.com/en-us/advertising/campaign-management-service/addmedia?view=bingads-13) to add image assets to an account:

- Account ID (long)
- An array of _Media_ to add to the account's asset library. ([Media](https://learn.microsoft.com/en-us/advertising/campaign-management-service/media?view=bingads-13) array)
    You can add a maximum of 10 media in a single call.

Lastly, use [AddAssetGroups](https://learn.microsoft.com/en-us/advertising/campaign-management-service/addassetgroups?view=bingads-13) to add a new one to a specified campaign or [UpdateAssetGroups](https://learn.microsoft.com/en-us/advertising/campaign-management-service/updateassetgroups?view=bingads-13) to update an existing asset group:

- Campaign ID (long)
- Array of asset groups to update for the specified campaign. ([AssetGroup](https://learn.microsoft.com/en-us/advertising/campaign-management-service/assetgroup?view=bingads-13) array) A maximum of 100 asset groups can be specified in a single call.

### Responsive Search ads

To create a Responsive Search ad with AI-generated text, use [CreateResponsiveSearchAdRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/createresponsivesearchadrecommendation?view=bingads-13).

- A list of Final URLs (string array)
- Optional: [AdRecommendationTextTone](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationtexttone?view=bingads-13) = _Cute, Friendly, Inspiring,_ or _Persuasive_
- Optional: Prompt = Description of campaign theme, used for generating ad copy (string)

Copilot will return:

- A Responsive Search ad ([ResponsiveSearchAd](https://learn.microsoft.com/en-us/advertising/campaign-management-service/responsivesearchad?view=bingads-13))  

Lastly, use [AddAds](https://learn.microsoft.com/en-us/advertising/campaign-management-service/addads?view=bingads-13) to add ads to an ad group:

- Ad Group ID (long)
- A list of ads to update. ([Ad](https://learn.microsoft.com/en-us/advertising/campaign-management-service/ad?view=bingads-13) array) You may update or add a maximum of 50 ads.

### Native ads

To create a native ad with AI-generated text and recommended images use [CreateResponsiveAdRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/createresponsiveadrecommendation?view=bingads-13)  

- A list of Final URLs (string array)
- Optional: Brand kit ID (long)
- Optional: [AdRecommendationTextTone](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationtexttone?view=bingads-13) = _Cute, Friendly, Inspiring,_ or _Persuasive_
- Optional: Prompt = Description of campaign theme, used for generating ad copy, and get image recommendations (string)

Copilot will return:

- A native ad ([ResponsiveAd](https://learn.microsoft.com/en-us/advertising/campaign-management-service/responsivead?view=bingads-13))  
- A list of images ([AdRecommendationImageSuggestion](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationimagesuggestion?view=bingads-13) array)

Then, use [AddMedia](https://learn.microsoft.com/en-us/advertising/campaign-management-service/addmedia?view=bingads-13) to add image assets to an account:

- Account ID (long)
- An array of _Media_ to add to the account's asset library. ([Media](https://learn.microsoft.com/en-us/advertising/campaign-management-service/media?view=bingads-13) array)
    You can add a maximum of 10 media in a single call.

Lastly, use [AddAds](https://learn.microsoft.com/en-us/advertising/campaign-management-service/addads?view=bingads-13) to add ads to an ad group or [UpdateAds](https://learn.microsoft.com/en-us/advertising/campaign-management-service/updateads?view=bingads-13) to change existing ads:

- Ad Group ID (long)
- A list of ads to update. ([Ad](https://learn.microsoft.com/en-us/advertising/campaign-management-service/ad?view=bingads-13) array) You may update or add a maximum of 50 ads.

### Display ads

To create a display ad with AI-generated text and recommended images use [CreateResponsiveAdRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/createresponsiveadrecommendation?view=bingads-13)  

- A list of Final URLs (string array)
- [AdSubType](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adsubtype?view=bingads-13) = _Display_  
- Optional: Brand kit ID (long)
- Optional: [AdRecommendationTextTone](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationtexttone?view=bingads-13) = _Cute, Friendly, Inspiring,_ or _Persuasive_
- Optional: Prompt = Description of campaign theme, used for generating banner assets containing ad copy and images from final URL or stock (string)

Copilot will return:

- A display ad ([ResponsiveAd](https://learn.microsoft.com/en-us/advertising/campaign-management-service/responsivead?view=bingads-13))  
- A list of images ([AdRecommendationImageSuggestion](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationimagesuggestion?view=bingads-13) array)

Then, use [AddMedia](https://learn.microsoft.com/en-us/advertising/campaign-management-service/addmedia?view=bingads-13) to add image assets to an account:

- Account ID (long)
- An array of _Media_ to add to the account's asset library. ([Media](https://learn.microsoft.com/en-us/advertising/campaign-management-service/media?view=bingads-13) array)
    You can add a maximum of 10 media in a single call.

Lastly, use [AddAds](https://learn.microsoft.com/en-us/advertising/campaign-management-service/addads?view=bingads-13) to add ads to an ad group or [UpdateAds](https://learn.microsoft.com/en-us/advertising/campaign-management-service/updateads?view=bingads-13) to change existing ads:

- Ad Group ID (long)
- A list of ads to update. ([Ad](https://learn.microsoft.com/en-us/advertising/campaign-management-service/ad?view=bingads-13) array) You may update or add a maximum of 50 ads.

### Video ads

To create a video ad with AI-generated text and recommended videos use [CreateResponsiveAdRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/createresponsiveadrecommendation?view=bingads-13)  

- A list of Final URLs (string array)
- [AdSubType](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adsubtype?view=bingads-13) = _Video_
- [AdRecommendationVideoType](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationvideotype?view=bingads-13) _\= CTV_ or _OLV_  
- Optional: Brand kit ID (long)
- Optional: [AdRecommendationTextTone](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationtexttone?view=bingads-13) = _Cute, Friendly, Inspiring,_ or _Persuasive_
- Optional: Prompt = Description of campaign theme, used for generating videos from containing ad copy and images from final URL or stock (string)

Then, use [AddVideos](https://learn.microsoft.com/en-us/advertising/campaign-management-service/addvideos?view=bingads-13) to add video assets to an account:

- Account ID (long)
- The list of videos to add to the account. ([Video](https://learn.microsoft.com/en-us/advertising/campaign-management-service/video?view=bingads-13) array)
    The maximum size of the list is 100 items per service request.

Lastly, use [AddAds](https://learn.microsoft.com/en-us/advertising/campaign-management-service/addads?view=bingads-13) to add ads to an ad group or [UpdateAds](https://learn.microsoft.com/en-us/advertising/campaign-management-service/updateads?view=bingads-13) to change existing ads:

- Ad Group ID (long)
- A list of ads to update. ([Ad](https://learn.microsoft.com/en-us/advertising/campaign-management-service/ad?view=bingads-13) array) You may update or add a maximum of 50 ads.

## Asset Generation

Copilot enables you to generate and refine assets at scale.

### Text generation

To **generate new ad copy** for your Performance Max asset group, Responsive Search ad, and Native ad, use one of these service operations:

- [CreateResponsiveAdRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/createresponsiveadrecommendation?view=bingads-13)
- [CreateResponsiveSearchAdRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/createresponsivesearchadrecommendation?view=bingads-13)
- [CreateAssetGroupRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/createassetgrouprecommendation?view=bingads-13)

Copilot uses your landing page URL, tone of voice (optional), and prompt (optional) to generate custom ad copy. Instructions above in [Ad Generation](bookmark://_Ad_Generation) section of this guide.

To **refine your existing ad copy** for your asset group or ad, use one of these service operations:

- [RefineAssetGroupRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/refineassetgrouprecommendation?view=bingads-13)
- [RefineResponsiveAdRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/refineresponsiveadrecommendation?view=bingads-13)
- [RefineResponsiveSearchAdRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/refineresponsivesearchadrecommendation?view=bingads-13)

Each method, takes in:

- An ad ([ResponsiveAd](https://learn.microsoft.com/en-us/advertising/campaign-management-service/responsivead?view=bingads-13) or [ResponsiveSearchAd](https://learn.microsoft.com/en-us/advertising/campaign-management-service/responsivesearchad?view=bingads-13)) or asset group ([AssetGroup](https://learn.microsoft.com/en-us/advertising/campaign-management-service/assetgroup?view=bingads-13))  
- A list of ad copy ([AdRecommendationTextRefineOperation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationtextrefineoperation?view=bingads-13) array)
- Text field index number (int)
- [AdRecommendationTextField](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationtextfield?view=bingads-13) = _Headline, LongHeadline, Description,_ or _CallToAction_  
- Optional: [AdRecommendationTextTone](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationtexttone?view=bingads-13) = _Cute, Friendly, Inspiring,_ or _Persuasive_

Copilot will return:

- A list of text assets ([AdRecommendationTextRefineResult](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationtextrefineresult?view=bingads-13))

Lastly, apply changes with one of these service operations:

- [AddAssetGroups](https://learn.microsoft.com/en-us/advertising/campaign-management-service/addassetgroups?view=bingads-13) to add new asset groups
- [UpdateAssetGroups](https://learn.microsoft.com/en-us/advertising/campaign-management-service/updateassetgroups?view=bingads-13) to adjust existing asset groups
- [AddAds](https://learn.microsoft.com/en-us/advertising/campaign-management-service/addads?view=bingads-13) to add new ads
- [UpdateAds](https://learn.microsoft.com/en-us/advertising/campaign-management-service/updateads?view=bingads-13) to adjust existing ads

### Background generation

**Generate a new background for your existing image**, using one of these service operations, to refine it within its asset group or ad:

- [RefineAssetGroupRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/refineassetgrouprecommendation?view=bingads-13)
- [RefineResponsiveAdRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/refineresponsiveadrecommendation?view=bingads-13)

Each method, takes in:

- An ad ([ResponsiveAd](https://learn.microsoft.com/en-us/advertising/campaign-management-service/responsivead?view=bingads-13)) or asset group ([AssetGroup](https://learn.microsoft.com/en-us/advertising/campaign-management-service/assetgroup?view=bingads-13))  
- A list of images ([AdRecommendationImageSuggestion](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationimagesuggestion?view=bingads-13) array)
- A list of background descriptions
    ([AdRecommendationImageRefineOperation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationimagerefineoperation?view=bingads-13) array)
- Image index number (int)
- [AdRecommendationImageRefineType](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationimagerefinetype?view=bingads-13) _\= BackgroundChange_
- Description of image background (string)

Copilot will return:

- A list of refined images ([AdRecommendationMediaRefineResult](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationmediarefineresult?view=bingads-13))

Then, use [AddMedia](https://learn.microsoft.com/en-us/advertising/campaign-management-service/addmedia?view=bingads-13) to add image assets to an account:

- Account ID (long)
- An array of _Media_ to add to the account's asset library. ([Media](https://learn.microsoft.com/en-us/advertising/campaign-management-service/media?view=bingads-13) array)
    You can add a maximum of 10 media in a single call.

Lastly, apply changes to ads and asset groups with one of these service operations:

- [AddAssetGroups](https://learn.microsoft.com/en-us/advertising/campaign-management-service/addassetgroups?view=bingads-13) to add new asset groups
- [UpdateAssetGroups](https://learn.microsoft.com/en-us/advertising/campaign-management-service/updateassetgroups?view=bingads-13) to adjust existing asset groups
- [AddAds](https://learn.microsoft.com/en-us/advertising/campaign-management-service/addads?view=bingads-13) to add new ads
- [UpdateAds](https://learn.microsoft.com/en-us/advertising/campaign-management-service/updateads?view=bingads-13) to adjust existing ads

### Banner generation

**Build a new display banner asset** for your display ad, use [CreateResponsiveAdRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/createresponsiveadrecommendation?view=bingads-13).  

Copilot uses your landing page URL, tone of voice (optional), and prompt (optional) to generate banner assets as you create a display ad. Instructions above in [Ad Generation](bookmark://_Display_ads) section of this guide.

### Video generation

**Build a new video asset** for your Video ad, use [CreateResponsiveAdRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/createresponsiveadrecommendation?view=bingads-13).  

Copilot uses your landing page URL, tone of voice (optional), and prompt (optional) to generate video assets as you create an online video and premium streaming ad. Instructions above in [Ad Generation](bookmark://_Video_ads) section of this guide.

### Brand Kit

Brand Kit allows users to specify a brand's fonts, logos, color palettes, and voice to be used by Copilot in ad and asset generation. There are three ways to set up a brand kit: create with a URL, manually, or with a bulk file.

To **create a Brand Kit with a URL**, use [CreateBrandKitRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/createbrandkitrecommendation?view=bingads-13)

- Account ID (long)
- URL (string)

Copilot will return:

- Brand Kit ([BrandKit](https://learn.microsoft.com/en-us/advertising/campaign-management-service/brandkit?view=bingads-13))
- Brand Kit Id (long)
- Brand Kit Name (string)
- BrandVoice ([BrandVoice](https://learn.microsoft.com/en-us/advertising/campaign-management-service/brandvoice?view=bingads-13))
- BusinessName (string)
- Fonts ([BrandKitFont](https://learn.microsoft.com/en-us/advertising/campaign-management-service/brandkitfont?view=bingads-13) array)
- Images ([BrandKitImage](https://learn.microsoft.com/en-us/advertising/campaign-management-service/brandkitimage?view=bingads-13) array)
- LandscapeLogos ([BrandKitImage](https://learn.microsoft.com/en-us/advertising/campaign-management-service/brandkitimage?view=bingads-13) array)
- SquareLogos ([BrandKitImage](https://learn.microsoft.com/en-us/advertising/campaign-management-service/brandkitimage?view=bingads-13) array)
- Palettes ([BrandKitPalette](https://learn.microsoft.com/en-us/advertising/campaign-management-service/brandkitpalette?view=bingads-13) array)

Lastly, use **[AddBrandKits](https://learn.microsoft.com/en-us/advertising/campaign-management-service/addbrandkits?view=bingads-13)** to save a Brand Kit to an account.

To **create a Brand Kit manually**, use [AddBrandKits](https://learn.microsoft.com/en-us/advertising/campaign-management-service/addbrandkits?view=bingads-13):

- Account ID (long)
- Brand Kit ([BrandKit](https://learn.microsoft.com/en-us/advertising/campaign-management-service/brandkit?view=bingads-13))
- Brand Kit Id (long)
- Brand Kit Name (string)
- BrandVoice ([BrandVoice](https://learn.microsoft.com/en-us/advertising/campaign-management-service/brandvoice?view=bingads-13))
- BusinessName (string)
- Fonts ([BrandKitFont](https://learn.microsoft.com/en-us/advertising/campaign-management-service/brandkitfont?view=bingads-13) array)
- Images ([BrandKitImage](https://learn.microsoft.com/en-us/advertising/campaign-management-service/brandkitimage?view=bingads-13) array)
- LandscapeLogos ([BrandKitImage](https://learn.microsoft.com/en-us/advertising/campaign-management-service/brandkitimage?view=bingads-13) array)
- SquareLogos ([BrandKitImage](https://learn.microsoft.com/en-us/advertising/campaign-management-service/brandkitimage?view=bingads-13) array)
- Palettes ([BrandKitPalette](https://learn.microsoft.com/en-us/advertising/campaign-management-service/brandkitpalette?view=bingads-13) array)

To **create with a bulk file** via Bulk API, use [Brand Kit](https://learn.microsoft.com/en-us/advertising/bulk-service/brand-kit?view=bingads-13) with the following attribute fields are available in the [Bulk File Schema](https://learn.microsoft.com/en-us/advertising/bulk-service/bulk-file-schema?view=bingads-13):

- [Brand Voice](https://learn.microsoft.com/en-us/advertising/bulk-service/brand-kit?view=bingads-13#brandvoice)
- [Business Name](https://learn.microsoft.com/en-us/advertising/bulk-service/brand-kit?view=bingads-13#businessname)
- [Fonts](https://learn.microsoft.com/en-us/advertising/bulk-service/brand-kit?view=bingads-13#fonts)
- [Id](https://learn.microsoft.com/en-us/advertising/bulk-service/brand-kit?view=bingads-13#id)
- [Images](https://learn.microsoft.com/en-us/advertising/bulk-service/brand-kit?view=bingads-13#images)
- [Landscape Logos](https://learn.microsoft.com/en-us/advertising/bulk-service/brand-kit?view=bingads-13#landscapelogos)
- [Name](https://learn.microsoft.com/en-us/advertising/bulk-service/brand-kit?view=bingads-13#name)
- [Palettes](https://learn.microsoft.com/en-us/advertising/bulk-service/brand-kit?view=bingads-13#palettes)
- [Status](https://learn.microsoft.com/en-us/advertising/bulk-service/brand-kit?view=bingads-13#status)
- [SquareLogos](https://learn.microsoft.com/en-us/advertising/bulk-service/brand-kit?view=bingads-13#squarelogos)

Additionally, service operations related to Brand Kits:

- [GetBrandKitsByAccount ID](https://learn.microsoft.com/en-us/advertising/campaign-management-service/getbrandkitsbyaccountid?view=bingads-13)
- [GetBrandKitsByIds](https://learn.microsoft.com/en-us/advertising/campaign-management-service/getbrandkitsbyids?view=bingads-13)
- [UpdateBrandKits](https://learn.microsoft.com/en-us/advertising/campaign-management-service/updatebrandkits?view=bingads-13)

## All Service Operations, Data Objects, Value Sets  

### Campaign Management API

#### Service Operations

- [CreateResponsiveAdRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/createresponsiveadrecommendation?view=bingads-13)
- [CreateResponsiveSearchAdRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/createresponsivesearchadrecommendation?view=bingads-13)
- [CreateAssetGroupRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/createassetgrouprecommendation?view=bingads-13)
- [GetResponsiveAdRecommendationJob](https://learn.microsoft.com/en-us/advertising/campaign-management-service/getresponsiveadrecommendationjob?view=bingads-13)
- [RefineAssetGroupRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/refineassetgrouprecommendation?view=bingads-13)
- [RefineResponsiveAdRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/refineresponsiveadrecommendation?view=bingads-13)
- [RefineResponsiveSearchAdRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/refineresponsivesearchadrecommendation?view=bingads-13)
- [CreateBrandKitRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/createbrandkitrecommendation?view=bingads-13)
- [AddBrandKits](https://learn.microsoft.com/en-us/advertising/campaign-management-service/addbrandkits?view=bingads-13)
- [CreateBrandKitRecommendation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/createbrandkitrecommendation?view=bingads-13)
- [GetBrandKitsByAccount ID](https://learn.microsoft.com/en-us/advertising/campaign-management-service/getbrandkitsbyaccountid?view=bingads-13)
- [GetBrandKitsByIds](https://learn.microsoft.com/en-us/advertising/campaign-management-service/getbrandkitsbyids?view=bingads-13)
- [UpdateBrandKits](https://learn.microsoft.com/en-us/advertising/campaign-management-service/updatebrandkits?view=bingads-13)

#### Data Objects

- [AdRecommendationImageRefineOperation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationimagerefineoperation?view=bingads-13)
- [AdRecommendationImageSuggestion](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationimagesuggestion?view=bingads-13)
- [AdRecommendationImageSuggestionMetadata](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationimagesuggestionmetadata?view=bingads-13)
- [AdRecommendationTextAssetProperty](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationtextassetproperty?view=bingads-13)
- [AdRecommendationImageAssetProperty](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationimageassetproperty?view=bingads-13)
- [AdRecommendationCustomizedProperty](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationcustomizedproperty?view=bingads-13)
- [AdRecommendationJobInfo](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationjobinfo?view=bingads-13)
- [AdRecommendationMediaRefineResult](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationmediarefineresult?view=bingads-13)
- [AdRecommendationRefinedMedia](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationrefinedmedia?view=bingads-13)
- [AdRecommendationTextRefineOperation](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationtextrefineoperation?view=bingads-13)
- [AdRecommendationTextRefineResult](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationtextrefineresult?view=bingads-13)
- [AdRecommendationVideoSuggestion](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationvideosuggestion?view=bingads-13)
- [BrandKit](https://learn.microsoft.com/en-us/advertising/campaign-management-service/brandkit?view=bingads-13)
- [BrandKitFont](https://learn.microsoft.com/en-us/advertising/campaign-management-service/brandkitfont?view=bingads-13)
- [BrandKitImage](https://learn.microsoft.com/en-us/advertising/campaign-management-service/brandkitimage?view=bingads-13)
- [BrandVoice](https://learn.microsoft.com/en-us/advertising/campaign-management-service/brandvoice?view=bingads-13)
- [BrandKitPalette](https://learn.microsoft.com/en-us/advertising/campaign-management-service/brandkitpalette?view=bingads-13)
- [BrandKitColor](https://learn.microsoft.com/en-us/advertising/campaign-management-service/brandkitcolor?view=bingads-13)

#### Value Sets

- [AdRecommendationAdditionalField](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationadditionalfield?view=bingads-13)
- [AdRecommendationImageField](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationimagefield?view=bingads-13)
- [AdRecommendationImageRefineType](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationimagerefinetype?view=bingads-13)
- [AdRecommendationTextField](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationtextfield?view=bingads-13)
- [AdRecommendationVideoType](https://learn.microsoft.com/en-us/advertising/campaign-management-service/adrecommendationvideotype?view=bingads-13)

### Bulk API

#### Bulk File Schema

- [Brand Kit](https://learn.microsoft.com/en-us/advertising/bulk-service/brand-kit?view=bingads-13)
