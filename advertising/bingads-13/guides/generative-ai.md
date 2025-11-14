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

To create an asset group for a Performance Max campaign with AI-generated text and recommended images use [CreateAssetGroupRecommendation](../campaign-management-service/createassetgrouprecommendation).

- A list of Final URLs (string array)
- Optional: [AdRecommendationTextTone](../campaign-management-service/adrecommendationtexttone) = _Cute, Friendly, Inspiring,_ or _Persuasive_
- Optional: Prompt = Description of campaign theme, used for generating ad copy, and get image recommendations (string)

Copilot will return:

- An asset group ([AssetGroup](../campaign-management-service/assetgroup))  
- A list of images ([AdRecommendationImageSuggestion](../campaign-management-service/adrecommendationimagesuggestion) array)

Then, use [AddMedia](../campaign-management-service/addmedia) to add image assets to an account:

- Account ID (long)
- An array of _Media_ to add to the account's asset library. ([Media](../campaign-management-service/media) array)
    You can add a maximum of 10 media in a single call.

Lastly, use [AddAssetGroups](../campaign-management-service/addassetgroups) to add a new one to a specified campaign or [UpdateAssetGroups](../campaign-management-service/updateassetgroups) to update an existing asset group:

- Campaign ID (long)
- Array of asset groups to update for the specified campaign. ([AssetGroup](../campaign-management-service/assetgroup) array) A maximum of 100 asset groups can be specified in a single call.

### Responsive Search ads

To create a Responsive Search ad with AI-generated text, use [CreateResponsiveSearchAdRecommendation](../campaign-management-service/createresponsivesearchadrecommendation).

- A list of Final URLs (string array)
- Optional: [AdRecommendationTextTone](../campaign-management-service/adrecommendationtexttone) = _Cute, Friendly, Inspiring,_ or _Persuasive_
- Optional: Prompt = Description of campaign theme, used for generating ad copy (string)

Copilot will return:

- A Responsive Search ad ([ResponsiveSearchAd](../campaign-management-service/responsivesearchad))  

Lastly, use [AddAds](../campaign-management-service/addads) to add ads to an ad group:

- Ad Group ID (long)
- A list of ads to update. ([Ad](../campaign-management-service/ad) array) You may update or add a maximum of 50 ads.

### Native ads

To create a native ad with AI-generated text and recommended images use [CreateResponsiveAdRecommendation](../campaign-management-service/createresponsiveadrecommendation)  

- A list of Final URLs (string array)
- Optional: Brand kit ID (long)
- Optional: [AdRecommendationTextTone](../campaign-management-service/adrecommendationtexttone) = _Cute, Friendly, Inspiring,_ or _Persuasive_
- Optional: Prompt = Description of campaign theme, used for generating ad copy, and get image recommendations (string)

Copilot will return:

- A native ad ([ResponsiveAd](../campaign-management-service/responsivead))  
- A list of images ([AdRecommendationImageSuggestion](../campaign-management-service/adrecommendationimagesuggestion) array)

Then, use [AddMedia](../campaign-management-service/addmedia) to add image assets to an account:

- Account ID (long)
- An array of _Media_ to add to the account's asset library. ([Media](../campaign-management-service/media) array)
    You can add a maximum of 10 media in a single call.

Lastly, use [AddAds](../campaign-management-service/addads) to add ads to an ad group or [UpdateAds](../campaign-management-service/updateads) to change existing ads:

- Ad Group ID (long)
- A list of ads to update. ([Ad](../campaign-management-service/ad) array) You may update or add a maximum of 50 ads.

### Display ads

To create a display ad with AI-generated text and recommended images use [CreateResponsiveAdRecommendation](../campaign-management-service/createresponsiveadrecommendation)  

- A list of Final URLs (string array)
- [AdSubType](../campaign-management-service/adsubtype) = _Display_  
- Optional: Brand kit ID (long)
- Optional: [AdRecommendationTextTone](../campaign-management-service/adrecommendationtexttone) = _Cute, Friendly, Inspiring,_ or _Persuasive_
- Optional: Prompt = Description of campaign theme, used for generating banner assets containing ad copy and images from final URL or stock (string)

Copilot will return:

- A display ad ([ResponsiveAd](../campaign-management-service/responsivead))  
- A list of images ([AdRecommendationImageSuggestion](../campaign-management-service/adrecommendationimagesuggestion) array)

Then, use [AddMedia](../campaign-management-service/addmedia) to add image assets to an account:

- Account ID (long)
- An array of _Media_ to add to the account's asset library. ([Media](../campaign-management-service/media) array)
    You can add a maximum of 10 media in a single call.

Lastly, use [AddAds](../campaign-management-service/addads) to add ads to an ad group or [UpdateAds](../campaign-management-service/updateads) to change existing ads:

- Ad Group ID (long)
- A list of ads to update. ([Ad](../campaign-management-service/ad) array) You may update or add a maximum of 50 ads.

### Video ads

To create a video ad with AI-generated text and recommended videos use [CreateResponsiveAdRecommendation](../campaign-management-service/createresponsiveadrecommendation)  

- A list of Final URLs (string array)
- [AdSubType](../campaign-management-service/adsubtype) = _Video_
- [AdRecommendationVideoType](../campaign-management-service/adrecommendationvideotype) _\= CTV_ or _OLV_  
- Optional: Brand kit ID (long)
- Optional: [AdRecommendationTextTone](../campaign-management-service/adrecommendationtexttone) = _Cute, Friendly, Inspiring,_ or _Persuasive_
- Optional: Prompt = Description of campaign theme, used for generating videos from containing ad copy and images from final URL or stock (string)

Then, use [AddVideos](../campaign-management-service/addvideos) to add video assets to an account:

- Account ID (long)
- The list of videos to add to the account. ([Video](../campaign-management-service/video) array)
    The maximum size of the list is 100 items per service request.

Lastly, use [AddAds](../campaign-management-service/addads) to add ads to an ad group or [UpdateAds](../campaign-management-service/updateads) to change existing ads:

- Ad Group ID (long)
- A list of ads to update. ([Ad](../campaign-management-service/ad) array) You may update or add a maximum of 50 ads.

## Asset Generation

Copilot enables you to generate and refine assets at scale.

### Text generation

To **generate new ad copy** for your Performance Max asset group, Responsive Search ad, and Native ad, use one of these service operations:

- [CreateResponsiveAdRecommendation](../campaign-management-service/createresponsiveadrecommendation)
- [CreateResponsiveSearchAdRecommendation](../campaign-management-service/createresponsivesearchadrecommendation)
- [CreateAssetGroupRecommendation](../campaign-management-service/createassetgrouprecommendation)

Copilot uses your landing page URL, tone of voice (optional), and prompt (optional) to generate custom ad copy. Instructions above in [Ad Generation](bookmark://_Ad_Generation) section of this guide.

To **refine your existing ad copy** for your asset group or ad, use one of these service operations:

- [RefineAssetGroupRecommendation](../campaign-management-service/refineassetgrouprecommendation)
- [RefineResponsiveAdRecommendation](../campaign-management-service/refineresponsiveadrecommendation)
- [RefineResponsiveSearchAdRecommendation](../campaign-management-service/refineresponsivesearchadrecommendation)

Each method, takes in:

- An ad ([ResponsiveAd](../campaign-management-service/responsivead) or [ResponsiveSearchAd](../campaign-management-service/responsivesearchad)) or asset group ([AssetGroup](../campaign-management-service/assetgroup))  
- A list of ad copy ([AdRecommendationTextRefineOperation](../campaign-management-service/adrecommendationtextrefineoperation) array)
- Text field index number (int)
- [AdRecommendationTextField](../campaign-management-service/adrecommendationtextfield) = _Headline, LongHeadline, Description,_ or _CallToAction_  
- Optional: [AdRecommendationTextTone](../campaign-management-service/adrecommendationtexttone) = _Cute, Friendly, Inspiring,_ or _Persuasive_

Copilot will return:

- A list of text assets ([AdRecommendationTextRefineResult](../campaign-management-service/adrecommendationtextrefineresult))

Lastly, apply changes with one of these service operations:

- [AddAssetGroups](../campaign-management-service/addassetgroups) to add new asset groups
- [UpdateAssetGroups](../campaign-management-service/updateassetgroups) to adjust existing asset groups
- [AddAds](../campaign-management-service/addads) to add new ads
- [UpdateAds](../campaign-management-service/updateads) to adjust existing ads

### Background generation

**Generate a new background for your existing image**, using one of these service operations, to refine it within its asset group or ad:

- [RefineAssetGroupRecommendation](../campaign-management-service/refineassetgrouprecommendation)
- [RefineResponsiveAdRecommendation](../campaign-management-service/refineresponsiveadrecommendation)

Each method, takes in:

- An ad ([ResponsiveAd](../campaign-management-service/responsivead)) or asset group ([AssetGroup](../campaign-management-service/assetgroup))  
- A list of images ([AdRecommendationImageSuggestion](../campaign-management-service/adrecommendationimagesuggestion) array)
- A list of background descriptions
    ([AdRecommendationImageRefineOperation](../campaign-management-service/adrecommendationimagerefineoperation) array)
- Image index number (int)
- [AdRecommendationImageRefineType](../campaign-management-service/adrecommendationimagerefinetype) _\= BackgroundChange_
- Description of image background (string)

Copilot will return:

- A list of refined images ([AdRecommendationMediaRefineResult](../campaign-management-service/adrecommendationmediarefineresult))

Then, use [AddMedia](../campaign-management-service/addmedia) to add image assets to an account:

- Account ID (long)
- An array of _Media_ to add to the account's asset library. ([Media](../campaign-management-service/media) array)
    You can add a maximum of 10 media in a single call.

Lastly, apply changes to ads and asset groups with one of these service operations:

- [AddAssetGroups](../campaign-management-service/addassetgroups) to add new asset groups
- [UpdateAssetGroups](../campaign-management-service/updateassetgroups) to adjust existing asset groups
- [AddAds](../campaign-management-service/addads) to add new ads
- [UpdateAds](../campaign-management-service/updateads) to adjust existing ads

### Banner generation

**Build a new display banner asset** for your display ad, use [CreateResponsiveAdRecommendation](../campaign-management-service/createresponsiveadrecommendation).  

Copilot uses your landing page URL, tone of voice (optional), and prompt (optional) to generate banner assets as you create a display ad. Instructions above in [Ad Generation](bookmark://_Display_ads) section of this guide.

### Video generation

**Build a new video asset** for your Video ad, use [CreateResponsiveAdRecommendation](../campaign-management-service/createresponsiveadrecommendation).  

Copilot uses your landing page URL, tone of voice (optional), and prompt (optional) to generate video assets as you create an online video and premium streaming ad. Instructions above in [Ad Generation](bookmark://_Video_ads) section of this guide.

### Brand Kit

Brand Kit allows users to specify a brand's fonts, logos, color palettes, and voice to be used by Copilot in ad and asset generation. There are three ways to set up a brand kit: create with a URL, manually, or with a bulk file.

To **create a Brand Kit with a URL**, use [CreateBrandKitRecommendation](../campaign-management-service/createbrandkitrecommendation)

- Account ID (long)
- URL (string)

Copilot will return:

- Brand Kit ([BrandKit](../campaign-management-service/brandkit))
- Brand Kit Id (long)
- Brand Kit Name (string)
- BrandVoice ([BrandVoice](../campaign-management-service/brandvoice))
- BusinessName (string)
- Fonts ([BrandKitFont](../campaign-management-service/brandkitfont) array)
- Images ([BrandKitImage](../campaign-management-service/brandkitimage) array)
- LandscapeLogos ([BrandKitImage](../campaign-management-service/brandkitimage) array)
- SquareLogos ([BrandKitImage](../campaign-management-service/brandkitimage) array)
- Palettes ([BrandKitPalette](../campaign-management-service/brandkitpalette) array)

Lastly, use **[AddBrandKits](../campaign-management-service/addbrandkits)** to save a Brand Kit to an account.

To **create a Brand Kit manually**, use [AddBrandKits](../campaign-management-service/addbrandkits):

- Account ID (long)
- Brand Kit ([BrandKit](../campaign-management-service/brandkit))
- Brand Kit Id (long)
- Brand Kit Name (string)
- BrandVoice ([BrandVoice](../campaign-management-service/brandvoice))
- BusinessName (string)
- Fonts ([BrandKitFont](../campaign-management-service/brandkitfont) array)
- Images ([BrandKitImage](../campaign-management-service/brandkitimage) array)
- LandscapeLogos ([BrandKitImage](../campaign-management-service/brandkitimage) array)
- SquareLogos ([BrandKitImage](../campaign-management-service/brandkitimage) array)
- Palettes ([BrandKitPalette](../campaign-management-service/brandkitpalette) array)

To **create with a bulk file** via Bulk API, use [Brand Kit](../bulk-service/brand-kit) with the following attribute fields are available in the [Bulk File Schema](../bulk-service/bulk-file-schema):

- [Brand Voice](../bulk-service/brand-kit#brandvoice)
- [Business Name](../bulk-service/brand-kit#businessname)
- [Fonts](../bulk-service/brand-kit#fonts)
- [Id](../bulk-service/brand-kit#id)
- [Images](../bulk-service/brand-kit#images)
- [Landscape Logos](../bulk-service/brand-kit#landscapelogos)
- [Name](../bulk-service/brand-kit#name)
- [Palettes](../bulk-service/brand-kit#palettes)
- [Status](../bulk-service/brand-kit#status)
- [SquareLogos](../bulk-service/brand-kit#squarelogos)

Additionally, service operations related to Brand Kits:

- [GetBrandKitsByAccount ID](../campaign-management-service/getbrandkitsbyaccountid)
- [GetBrandKitsByIds](../campaign-management-service/getbrandkitsbyids)
- [UpdateBrandKits](../campaign-management-service/updatebrandkits)

## All Service Operations, Data Objects, Value Sets  

### Campaign Management API

#### Service Operations

- [CreateResponsiveAdRecommendation](../campaign-management-service/createresponsiveadrecommendation)
- [CreateResponsiveSearchAdRecommendation](../campaign-management-service/createresponsivesearchadrecommendation)
- [CreateAssetGroupRecommendation](../campaign-management-service/createassetgrouprecommendation)
- [GetResponsiveAdRecommendationJob](../campaign-management-service/getresponsiveadrecommendationjob)
- [RefineAssetGroupRecommendation](../campaign-management-service/refineassetgrouprecommendation)
- [RefineResponsiveAdRecommendation](../campaign-management-service/refineresponsiveadrecommendation)
- [RefineResponsiveSearchAdRecommendation](../campaign-management-service/refineresponsivesearchadrecommendation)
- [CreateBrandKitRecommendation](../campaign-management-service/createbrandkitrecommendation)
- [AddBrandKits](../campaign-management-service/addbrandkits)
- [CreateBrandKitRecommendation](../campaign-management-service/createbrandkitrecommendation)
- [GetBrandKitsByAccount ID](../campaign-management-service/getbrandkitsbyaccountid)
- [GetBrandKitsByIds](../campaign-management-service/getbrandkitsbyids)
- [UpdateBrandKits](../campaign-management-service/updatebrandkits)

#### Data Objects

- [AdRecommendationImageRefineOperation](../campaign-management-service/adrecommendationimagerefineoperation)
- [AdRecommendationImageSuggestion](../campaign-management-service/adrecommendationimagesuggestion)
- [AdRecommendationImageSuggestionMetadata](../campaign-management-service/adrecommendationimagesuggestionmetadata)
- [AdRecommendationTextAssetProperty](../campaign-management-service/adrecommendationtextassetproperty)
- [AdRecommendationImageAssetProperty](../campaign-management-service/adrecommendationimageassetproperty)
- [AdRecommendationCustomizedProperty](../campaign-management-service/adrecommendationcustomizedproperty)
- [AdRecommendationJobInfo](../campaign-management-service/adrecommendationjobinfo)
- [AdRecommendationMediaRefineResult](../campaign-management-service/adrecommendationmediarefineresult)
- [AdRecommendationRefinedMedia](../campaign-management-service/adrecommendationrefinedmedia)
- [AdRecommendationTextRefineOperation](../campaign-management-service/adrecommendationtextrefineoperation)
- [AdRecommendationTextRefineResult](../campaign-management-service/adrecommendationtextrefineresult)
- [AdRecommendationVideoSuggestion](../campaign-management-service/adrecommendationvideosuggestion)
- [BrandKit](../campaign-management-service/brandkit)
- [BrandKitFont](../campaign-management-service/brandkitfont)
- [BrandKitImage](../campaign-management-service/brandkitimage)
- [BrandVoice](../campaign-management-service/brandvoice)
- [BrandKitPalette](../campaign-management-service/brandkitpalette)
- [BrandKitColor](../campaign-management-service/brandkitcolor)

#### Value Sets

- [AdRecommendationAdditionalField](../campaign-management-service/adrecommendationadditionalfield)
- [AdRecommendationImageField](../campaign-management-service/adrecommendationimagefield)
- [AdRecommendationImageRefineType](../campaign-management-service/adrecommendationimagerefinetype)
- [AdRecommendationTextField](../campaign-management-service/adrecommendationtextfield)
- [AdRecommendationVideoType](../campaign-management-service/adrecommendationvideotype)

### Bulk API

#### Bulk File Schema

- [Brand Kit](../bulk-service/brand-kit)
