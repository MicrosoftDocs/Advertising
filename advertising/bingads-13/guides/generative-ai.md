---
title: "Generative AI"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: With Copilot asset creation via Campaign Management API, advertisers, agencies, and partners who access Microsoft Advertising via API can use generative AI capabilities to create campaigns with ease and save time.
---

# Generative AI

With Copilot asset creation via Campaign Management API, advertisers, agencies, and partners who access Microsoft Advertising via API can use generative AI capabilities to create campaigns with ease and save time.

Asset recommendations populate campaigns by leveraging generative AI to generate ad copy, recommend images, and assemble video and display banner assets based on a website URL and a text prompt (optional).

Asset generation, in addition to the text generation that occurs automatically when you use Asset recommendations in your campaign creation workflow, also includes ad copy tone refinement. This generates text based on the website URL and text prompt (optional) + text tone (optional). Net new video or image generation is not available at this time.

[See market and language availability for Generative AI tools](https://help.ads.microsoft.com/#apex/ads/en/50873/0).

## <a name="asset-recommendations"></a>Asset Recommendations

Use the following Copilot asset recommendations calls within Microsoft Advertising’s Campaign Management API to get text, image, and video asset recommendations to expedite creation of your Performance Max campaigns, Responsive Search ads, Display ads, Native ads, and Video ads.

### <a name="asset-recommendation-service-operations"></a>Service Operations

The following service operations are used with asset recommendations:

- [CreateAssetGroupRecommendation](../campaign-management-service/createassetgrouprecommendation.md)  
- [CreateResponsiveAdRecommendation](../campaign-management-service/createresponsiveadrecommendation.md)  
- [CreateResponsiveSearchAdRecommendation](../campaign-management-service/createresponsivesearchadrecommendation.md)  

### <a name="image-generation"></a>Image Generation  

The following service operations are used with image generation:

- [CreateAssetGroupRecommendation](../campaign-management-service/createassetgrouprecommendation.md)  
- [CreateResponsiveAdRecommendation](../campaign-management-service/createresponsiveadrecommendation.md)  
- [AddBrandKits](../campaign-management-service/addbrandkits.md)  
- [DeleteBrandKits](../campaign-management-service/deletebrandkits.md)  
- [GetBrandKitsByAccountId](../campaign-management-service/getbrandkitsbyaccountid.md)  
- [GetBrandKitsByIds](../campaign-management-service/getbrandkitsbyids.md)  
- [UpdateBrandKits](../campaign-management-service/updatebrandkits.md)  

### <a name="display-ad-recommendation-brand-kit"></a>Display Ad Recommendation with Brand Kit or metadata

The following service operations are used for display ad recommendations with Brand Kit or metadata:

- [CreateResponsiveAdRecommendation](../campaign-management-service/createresponsiveadrecommendation.md)  

### <a name="code-samples"></a>Code Samples

The following samples demonstrate building a campaign with generated assets using Bing Ads SDK:  

- [Java](https://github.com/BingAds/BingAds-Java-SDK/tree/main/examples/BingAdsDesktopApp/src/main/java/com/microsoft/bingads/examples/v13/ResponsiveAdRecommendation.java)  
- [.NET](https://github.com/BingAds/BingAds-dotNet-SDK/tree/main/examples/BingAdsExamples/BingAdsExamplesLibrary/v13/ResponsiveAdRecommendation.cs)  
- [Python](https://github.com/BingAds/BingAds-Python-SDK/blob/main/examples/v13/responsive_ad_recommendation.py)  
- [PHP](https://github.com/BingAds/BingAds-PHP-SDK/blob/main/samples/V13/ResponsiveAdRecommendation.php)  

### <a name="asset-recommendation-rest-api-request-sample"></a>Rest API Request Sample

Here is an example of REST API sample code:

```javascript
Method: POST; Uri: https://campaign.api.bingads.microsoft.com/CampaignManagement/v13/ResponsiveAdRecommendation/Create  

{"FinalUrls":["https://contoso.com"],"Prompt":null,"TextTone":null}  
```

*FinalUrls* is a required parameter (it accepts multiple URLs for future extensibility, but currently we are using just one).  

*Prompt* is an optional parameter to set a theme for the ad, for example "Holiday sale".  

*TextTone* is an optional parameter and accepts values *Friendly*, *Persuasive*, *Cute*, *Inspiring*.  

The response contains a *ResponsiveAd* object with the text fields filled out. This is the same object as the [ResponsiveAd](../campaign-management-service/responsivead.md) data object. It also has an *ImageSuggestions* field, which has URLs for generated images. The caller can inspect these images and upload the ones that should be added to the ad by calling the [AddMedia](../campaign-management-service/addmedia.md) method and using the returned image *Id* in the ad object.  

To create a recommendation for a Display Ad we need to add an *AdSubType* parameter to the request:  

```javascript
{"AdSubType":"Display","FinalUrls":["https://contoso.com"],"Prompt":null,"TextTone":null}  
```

Similarly, for a Video Ad we need to set *AdSubType* to "Video":  

```javascript
{"AdSubType":"Video","FinalUrls":["https://contoso.com"],"Prompt":null,"TextTone":null}  
```

To create a recommendation of PMax Asset Group the request is the same as for Native Ad, but the URL is different:  

```javascript
Method: POST; Uri: https://campaign.api.bingads.microsoft.com/CampaignManagement/v13/AssetGroupRecommendation/Create 
```

## <a name="asset-generation"></a>Asset Generation

Use the following Copilot asset generation calls within Microsoft Advertising’s Campaign Management API to enhance your copywriting. Refine your text assets by easily adjusting your tone of voice for short headlines, long headlines, and descriptions.  

### <a name="asset-generation-service-operations"></a>Service Operations

The following service operations are used with asset recommendations:

- [RefineAssetGroupRecommendation](../campaign-management-service/refineassetgrouprecommendation.md)  
- [RefineResponsiveAdRecommendation](../campaign-management-service/refineresponsiveadrecommendation.md)  
- [RefineResponsiveSearchAdRecommendation](../campaign-management-service/refineresponsivesearchadrecommendation.md)  

### <a name="image-background-change"></a>Image Backround Change  

The following service operations are used with image background change:

- [RefineAssetGroupRecommendation](../campaign-management-service/refineassetgrouprecommendation.md)  
- [RefineResponsiveAdRecommendation](../campaign-management-service/refineresponsiveadrecommendation.md)  

### <a name="display-ad-recommendation-metadata"></a>Display ad recommendation with metadata
The following service operations are used with display ad recommendation with metadata:

- [RefineResponsiveAdRecommendation](../campaign-management-service/refineresponsiveadrecommendation.md)  

### <a name="asset-generation-rest-api-request-sample"></a>Rest API Request Sample

To refine text in a previously created recommendation a corresponding refine method can be used. For example:  

```javascript
Method: POST; Uri: https://campaign.api.bingads.microsoft.com/CampaignManagement/v13/ResponsiveAdRecommendation/Refine  

{  
  "ResponsiveAd": {  
    "Descriptions": [  
      {  
        "Asset": {  
          "Text": "Description 0",  
          "Type": "TextAsset"  
        }  
      },  
      {  
        "Asset": {  
          "Text": "Description 1",  
          "Type": "TextAsset"  
        }  
      }  
    ],  
    "Headlines": [  
      {  
        "Asset": {  
          "Text": "Short headline 0",  
          "Type": "TextAsset"  
        }  
      }  
    ],  
    "FinalUrls": [ "https://www.nike.com" ],  
    "Type": "ResponsiveAd"  
  },  
  "TextRefineOperations": [  
    {  
      "TextField": "Description",  
      "TextFieldIndex": 1,  
      "TextTone": "Inspiring"  
    }  
  ]  
}  
```

*ResponsiveAd* should be the object returned from the create recommendation response, with the text fields populated. *TextRefineOperations* is a list of operations (specific text fields and corresponding tones) for which refined text values should be returned.  
