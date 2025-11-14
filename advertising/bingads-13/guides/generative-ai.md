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

To create an asset group for a Performance Max campaign with AI-generated text and recommended images use [CreateAssetGroupRecommendation](../campaign-management-service/createassetgrouprecommendation.md).

- A list of Final URLs (string array)
- Optional: [AdRecommendationTextTone](../campaign-management-service/adrecommendationtexttone.md) = _Cute, Friendly, Inspiring,_ or _Persuasive_
- Optional: Prompt = Description of campaign theme, used for generating ad copy, and get image recommendations (string)

Copilot will return:

- An asset group ([AssetGroup](../campaign-management-service/assetgroup.md))  
- A list of images ([AdRecommendationImageSuggestion](../campaign-management-service/adrecommendationimagesuggestion.md) array)

Then, use [AddMedia](../campaign-management-service/addmedia.md) to add image assets to an account:

- Account ID (long)
- An array of _Media_ to add to the account's asset library. ([Media](../campaign-management-service/media.md) array)
    You can add a maximum of 10 media in a single call.

Lastly, use [AddAssetGroups](../campaign-management-service/addassetgroups.md) to add a new one to a specified campaign or [UpdateAssetGroups](../campaign-management-service/updateassetgroups.md) to update an existing asset group:

- Campaign ID (long)
- Array of asset groups to update for the specified campaign. ([AssetGroup](../campaign-management-service/assetgroup.md) array) A maximum of 100 asset groups can be specified in a single call.

### Responsive Search ads

To create a Responsive Search ad with AI-generated text, use [CreateResponsiveSearchAdRecommendation](../campaign-management-service/createresponsivesearchadrecommendation.md).

- A list of Final URLs (string array)
- Optional: [AdRecommendationTextTone](../campaign-management-service/adrecommendationtexttone.md) = _Cute, Friendly, Inspiring,_ or _Persuasive_
- Optional: Prompt = Description of campaign theme, used for generating ad copy (string)

Copilot will return:

- A Responsive Search ad ([ResponsiveSearchAd](../campaign-management-service/responsivesearchad.md))  

Lastly, use [AddAds](../campaign-management-service/addads.md) to add ads to an ad group:

- Ad Group ID (long)
- A list of ads to update. ([Ad](../campaign-management-service/ad.md) array) You may update or add a maximum of 50 ads.

### Native ads

To create a native ad with AI-generated text and recommended images use [CreateResponsiveAdRecommendation](../campaign-management-service/createresponsiveadrecommendation.md)  

- A list of Final URLs (string array)
- Optional: Brand kit ID (long)
- Optional: [AdRecommendationTextTone](../campaign-management-service/adrecommendationtexttone.md) = _Cute, Friendly, Inspiring,_ or _Persuasive_
- Optional: Prompt = Description of campaign theme, used for generating ad copy, and get image recommendations (string)

Copilot will return:

- A native ad ([ResponsiveAd](../campaign-management-service/responsivead.md))  
- A list of images ([AdRecommendationImageSuggestion](../campaign-management-service/adrecommendationimagesuggestion.md) array)

Then, use [AddMedia](../campaign-management-service/addmedia.md) to add image assets to an account:

- Account ID (long)
- An array of _Media_ to add to the account's asset library. ([Media](../campaign-management-service/media.md) array)
    You can add a maximum of 10 media in a single call.

Lastly, use [AddAds](../campaign-management-service/addads.md) to add ads to an ad group or [UpdateAds](../campaign-management-service/updateads.md) to change existing ads:

- Ad Group ID (long)
- A list of ads to update. ([Ad](../campaign-management-service/ad.md) array) You may update or add a maximum of 50 ads.

### Display ads

To create a display ad with AI-generated text and recommended images use [CreateResponsiveAdRecommendation](../campaign-management-service/createresponsiveadrecommendation.md)  

- A list of Final URLs (string array)
- [AdSubType](../campaign-management-service/adsubtype.md) = _Display_  
- Optional: Brand kit ID (long)
- Optional: [AdRecommendationTextTone](../campaign-management-service/adrecommendationtexttone.md) = _Cute, Friendly, Inspiring,_ or _Persuasive_
- Optional: Prompt = Description of campaign theme, used for generating banner assets containing ad copy and images from final URL or stock (string)

Copilot will return:

- A display ad ([ResponsiveAd](../campaign-management-service/responsivead.md))  
- A list of images ([AdRecommendationImageSuggestion](../campaign-management-service/adrecommendationimagesuggestion.md) array)

Then, use [AddMedia](../campaign-management-service/addmedia.md) to add image assets to an account:

- Account ID (long)
- An array of _Media_ to add to the account's asset library. ([Media](../campaign-management-service/media.md) array)
    You can add a maximum of 10 media in a single call.

Lastly, use [AddAds](../campaign-management-service/addads.md) to add ads to an ad group or [UpdateAds](../campaign-management-service/updateads.md) to change existing ads:

- Ad Group ID (long)
- A list of ads to update. ([Ad](../campaign-management-service/ad.md) array) You may update or add a maximum of 50 ads.

### Video ads

To create a video ad with AI-generated text and recommended videos use [CreateResponsiveAdRecommendation](../campaign-management-service/createresponsiveadrecommendation.md)  

- A list of Final URLs (string array)
- [AdSubType](../campaign-management-service/adsubtype.md) = _Video_
- [AdRecommendationVideoType](../campaign-management-service/adrecommendationvideotype.md) _\= CTV_ or _OLV_  
- Optional: Brand kit ID (long)
- Optional: [AdRecommendationTextTone](../campaign-management-service/adrecommendationtexttone.md) = _Cute, Friendly, Inspiring,_ or _Persuasive_
- Optional: Prompt = Description of campaign theme, used for generating videos from containing ad copy and images from final URL or stock (string)

Then, use [AddVideos](../campaign-management-service/addvideos.md) to add video assets to an account:

- Account ID (long)
- The list of videos to add to the account. ([Video](../campaign-management-service/video.md) array)
    The maximum size of the list is 100 items per service request.

Lastly, use [AddAds](../campaign-management-service/addads.md) to add ads to an ad group or [UpdateAds](../campaign-management-service/updateads.md) to change existing ads:

- Ad Group ID (long)
- A list of ads to update. ([Ad](../campaign-management-service/ad.md) array) You may update or add a maximum of 50 ads.

## Asset Generation

Copilot enables you to generate and refine assets at scale.

### Text generation

To **generate new ad copy** for your Performance Max asset group, Responsive Search ad, and Native ad, use one of these service operations:

- [CreateResponsiveAdRecommendation](../campaign-management-service/createresponsiveadrecommendation.md)
- [CreateResponsiveSearchAdRecommendation](../campaign-management-service/createresponsivesearchadrecommendation.md)
- [CreateAssetGroupRecommendation](../campaign-management-service/createassetgrouprecommendation.md)

Copilot uses your landing page URL, tone of voice (optional), and prompt (optional) to generate custom ad copy. Instructions above in [Ad Generation](#ad-generation) section of this guide.

To **refine your existing ad copy** for your asset group or ad, use one of these service operations:

- [RefineAssetGroupRecommendation](../campaign-management-service/refineassetgrouprecommendation.md)
- [RefineResponsiveAdRecommendation](../campaign-management-service/refineresponsiveadrecommendation.md)
- [RefineResponsiveSearchAdRecommendation](../campaign-management-service/refineresponsivesearchadrecommendation.md)

Each method takes in:

- An ad ([ResponsiveAd](../campaign-management-service/responsivead.md) or [ResponsiveSearchAd](../campaign-management-service/responsivesearchad.md)) or asset group ([AssetGroup](../campaign-management-service/assetgroup.md))  
- A list of ad copy ([AdRecommendationTextRefineOperation](../campaign-management-service/adrecommendationtextrefineoperation.md) array)
  - Text field index number (int)
  - [AdRecommendationTextField](../campaign-management-service/adrecommendationtextfield.md) = _Headline, LongHeadline, Description,_ or _CallToAction_  
  - Optional: [AdRecommendationTextTone](../campaign-management-service/adrecommendationtexttone.md) = _Cute, Friendly, Inspiring,_ or _Persuasive_

Copilot will return:

- A list of text assets ([AdRecommendationTextRefineResult](../campaign-management-service/adrecommendationtextrefineresult.md))

Lastly, apply changes with one of these service operations:

- [AddAssetGroups](../campaign-management-service/addassetgroups.md) to add new asset groups
- [UpdateAssetGroups](../campaign-management-service/updateassetgroups.md) to adjust existing asset groups
- [AddAds](../campaign-management-service/addads.md) to add new ads
- [UpdateAds](../campaign-management-service/updateads.md) to adjust existing ads

### Background generation

**Generate a new background for your existing image**, using one of these service operations, to refine it within its asset group or ad:

- [RefineAssetGroupRecommendation](../campaign-management-service/refineassetgrouprecommendation.md)
- [RefineResponsiveAdRecommendation](../campaign-management-service/refineresponsiveadrecommendation.md)

Each method takes in:

- An ad ([ResponsiveAd](../campaign-management-service/responsivead.md)) or asset group ([AssetGroup](../campaign-management-service/assetgroup.md))  
- A list of images ([AdRecommendationImageSuggestion](../campaign-management-service/adrecommendationimagesuggestion.md) array)
- A list of background descriptions
    ([AdRecommendationImageRefineOperation](../campaign-management-service/adrecommendationimagerefineoperation.md) array)
  - Image index number (int)
  - [AdRecommendationImageRefineType](../campaign-management-service/adrecommendationimagerefinetype.md) _\= BackgroundChange_
  - Description of image background (string)

Copilot will return:

- A list of refined images ([AdRecommendationMediaRefineResult](../campaign-management-service/adrecommendationmediarefineresult.md))

Then, use [AddMedia](../campaign-management-service/addmedia.md) to add image assets to an account:

- Account ID (long)
- An array of _Media_ to add to the account's asset library. ([Media](../campaign-management-service/media.md) array)
    You can add a maximum of 10 media in a single call.

Lastly, apply changes to ads and asset groups with one of these service operations:

- [AddAssetGroups](../campaign-management-service/addassetgroups.md) to add new asset groups
- [UpdateAssetGroups](../campaign-management-service/updateassetgroups.md) to adjust existing asset groups
- [AddAds](../campaign-management-service/addads.md) to add new ads
- [UpdateAds](../campaign-management-service/updateads.md) to adjust existing ads

### Banner generation

**Build a new display banner asset** for your display ad, use [CreateResponsiveAdRecommendation](../campaign-management-service/createresponsiveadrecommendation.md).  

Copilot uses your landing page URL, tone of voice (optional), and prompt (optional) to generate banner assets as you create a display ad. Instructions above in [Ad Generation](#display-ads) section of this guide.

### Video generation

**Build a new video asset** for your Video ad, use [CreateResponsiveAdRecommendation](../campaign-management-service/createresponsiveadrecommendation.md).  

Copilot uses your landing page URL, tone of voice (optional), and prompt (optional) to generate video assets as you create an online video and premium streaming ad. Instructions above in [Ad Generation](#video-ads) section of this guide.

### Brand Kit

Brand Kit allows users to specify a brand's fonts, logos, color palettes, and voice to be used by Copilot in ad and asset generation. There are three ways to set up a brand kit: create with a URL, manually, or with a bulk file.

To **create a Brand Kit with a URL**, use [CreateBrandKitRecommendation](../campaign-management-service/createbrandkitrecommendation.md)

- Account ID (long)
- URL (string)

Copilot will return:

- Brand Kit ([BrandKit](../campaign-management-service/brandkit.md))
  - Brand Kit Id (long)
  - Brand Kit Name (string)
  - BrandVoice ([BrandVoice](../campaign-management-service/brandvoice.md))
  - BusinessName (string)
  - Fonts ([BrandKitFont](../campaign-management-service/brandkitfont.md) array)
  - Images ([BrandKitImage](../campaign-management-service/brandkitimage.md) array)
  - LandscapeLogos ([BrandKitImage](../campaign-management-service/brandkitimage.md) array)
  - SquareLogos ([BrandKitImage](../campaign-management-service/brandkitimage.md) array)
  - Palettes ([BrandKitPalette](../campaign-management-service/brandkitpalette.md) array)

Lastly, use **[AddBrandKits](../campaign-management-service/addbrandkits.md)** to save a Brand Kit to an account.

To **create a Brand Kit manually**, use [AddBrandKits](../campaign-management-service/addbrandkits.md):

- Account ID (long)
- Brand Kit ([BrandKit](../campaign-management-service/brandkit.md))
  - Brand Kit Id (long)
  - Brand Kit Name (string)
  - BrandVoice ([BrandVoice](../campaign-management-service/brandvoice.md))
  - BusinessName (string)
  - Fonts ([BrandKitFont](../campaign-management-service/brandkitfont.md) array)
  - Images ([BrandKitImage](../campaign-management-service/brandkitimage.md) array)
  - LandscapeLogos ([BrandKitImage](../campaign-management-service/brandkitimage.md) array)
  - SquareLogos ([BrandKitImage](../campaign-management-service/brandkitimage.md) array)
  - Palettes ([BrandKitPalette](../campaign-management-service/brandkitpalette.md) array)

To **create with a bulk file** via Bulk API, use [Brand Kit](../bulk-service/brand-kit.md) with the following attribute fields are available in the [Bulk File Schema](../bulk-service/bulk-file-schema.md):

- [Brand Voice](../bulk-service/brand-kit.md#brandvoice)
- [Business Name](../bulk-service/brand-kit.md#businessname)
- [Fonts](../bulk-service/brand-kit.md#fonts)
- [Id](../bulk-service/brand-kit.md#id)
- [Images](../bulk-service/brand-kit.md#images)
- [Landscape Logos](../bulk-service/brand-kit.md#landscapelogos)
- [Name](../bulk-service/brand-kit.md#name)
- [Palettes](../bulk-service/brand-kit.md#palettes)
- [Status](../bulk-service/brand-kit.md#status)
- [SquareLogos](../bulk-service/brand-kit.md#squarelogos)

Additionally, service operations related to Brand Kits:

- [GetBrandKitsByAccount ID](../campaign-management-service/getbrandkitsbyaccountid.md)
- [GetBrandKitsByIds](../campaign-management-service/getbrandkitsbyids.md)
- [UpdateBrandKits](../campaign-management-service/updatebrandkits.md)

## All Service Operations, Data Objects, Value Sets  

### Campaign Management API

#### Service Operations

- [CreateResponsiveAdRecommendation](../campaign-management-service/createresponsiveadrecommendation.md)
- [CreateResponsiveSearchAdRecommendation](../campaign-management-service/createresponsivesearchadrecommendation.md)
- [CreateAssetGroupRecommendation](../campaign-management-service/createassetgrouprecommendation.md)
- [GetResponsiveAdRecommendationJob](../campaign-management-service/getresponsiveadrecommendationjob.md)
- [RefineAssetGroupRecommendation](../campaign-management-service/refineassetgrouprecommendation.md)
- [RefineResponsiveAdRecommendation](../campaign-management-service/refineresponsiveadrecommendation.md)
- [RefineResponsiveSearchAdRecommendation](../campaign-management-service/refineresponsivesearchadrecommendation.md)
- [CreateBrandKitRecommendation](../campaign-management-service/createbrandkitrecommendation.md)
- [AddBrandKits](../campaign-management-service/addbrandkits.md)
- [CreateBrandKitRecommendation](../campaign-management-service/createbrandkitrecommendation.md)
- [GetBrandKitsByAccount ID](../campaign-management-service/getbrandkitsbyaccountid.md)
- [GetBrandKitsByIds](../campaign-management-service/getbrandkitsbyids.md)
- [UpdateBrandKits](../campaign-management-service/updatebrandkits.md)

#### Data Objects

- [AdRecommendationImageRefineOperation](../campaign-management-service/adrecommendationimagerefineoperation.md)
- [AdRecommendationImageSuggestion](../campaign-management-service/adrecommendationimagesuggestion.md)
- [AdRecommendationImageSuggestionMetadata](../campaign-management-service/adrecommendationimagesuggestionmetadata.md)
- [AdRecommendationTextAssetProperty](../campaign-management-service/adrecommendationtextassetproperty.md)
- [AdRecommendationImageAssetProperty](../campaign-management-service/adrecommendationimageassetproperty.md)
- [AdRecommendationCustomizedProperty](../campaign-management-service/adrecommendationcustomizedproperty.md)
- [AdRecommendationJobInfo](../campaign-management-service/adrecommendationjobinfo.md)
- [AdRecommendationMediaRefineResult](../campaign-management-service/adrecommendationmediarefineresult.md)
- [AdRecommendationRefinedMedia](../campaign-management-service/adrecommendationrefinedmedia.md)
- [AdRecommendationTextRefineOperation](../campaign-management-service/adrecommendationtextrefineoperation.md)
- [AdRecommendationTextRefineResult](../campaign-management-service/adrecommendationtextrefineresult.md)
- [AdRecommendationVideoSuggestion](../campaign-management-service/adrecommendationvideosuggestion.md)
- [BrandKit](../campaign-management-service/brandkit.md)
- [BrandKitFont](../campaign-management-service/brandkitfont.md)
- [BrandKitImage](../campaign-management-service/brandkitimage.md)
- [BrandVoice](../campaign-management-service/brandvoice.md)
- [BrandKitPalette](../campaign-management-service/brandkitpalette.md)
- [BrandKitColor](../campaign-management-service/brandkitcolor.md)

#### Value Sets

- [AdRecommendationAdditionalField](../campaign-management-service/adrecommendationadditionalfield.md)
- [AdRecommendationImageField](../campaign-management-service/adrecommendationimagefield.md)
- [AdRecommendationImageRefineType](../campaign-management-service/adrecommendationimagerefinetype.md)
- [AdRecommendationTextField](../campaign-management-service/adrecommendationtextfield.md)
- [AdRecommendationVideoType](../campaign-management-service/adrecommendationvideotype.md)

### Bulk API

#### Bulk File Schema

- [Brand Kit](../bulk-service/brand-kit.md)
