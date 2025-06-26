---
title: Get Started Using Python with Bing Ads API
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Install the Bing Ads Python SDK and discover code examples.
dev_langs:
  - python
---
# Get Started Using Python with Bing Ads API
To get started developing Bing Ads API applications with Python, you can start with the [provided examples](code-examples.md) or follow one of the application walkthroughs for a [Web](walkthrough-web-application-python.md) or [Desktop](walkthrough-desktop-application-python.md) application. 

You will need user credentials with access to Microsoft Advertising either in [production](https://ads.microsoft.com/) or [sandbox](https://secure.sandbox.bingads.microsoft.com/Auth?EnvContext=Sandbox). For the production environment you will need a [production developer token](get-started.md#get-developer-token). All sandbox clients can use the universal sandbox developer token i.e., **BBD37VB98**. For more information, please see [Get Started With the Bing Ads API](get-started.md) and [Sandbox](sandbox.md#access).  

To authenticate via OAuth, you must also register an application and get the corresponding client identifier. You also need to take note of the client secret and redirect URI if you are developing a web application. For more details about registering an application in production and the authorization code grant flow, see [Authentication with OAuth](authentication-oauth.md) and [Authentication With the SDKs](sdk-authentication.md#oauth). Although in production you must use your own application ID (a.k.a. client ID), all Microsoft Advertising customers can use the public "Tutorial Sample App" client ID in sandbox i.e., **00001111-aaaa-2222-bbbb-3333cccc4444**. For more information, please see [Sandbox](sandbox.md#access). 

## <a name="dependencies"></a> Dependencies
The Bing Ads Python SDK uses the [suds-jurko-0.6](https://pypi.org/project/suds-jurko/) library as a proxy for all Bing Ads API programming elements. For more information about using Suds with Microsoft Advertising, see [Using Suds](#suds).

The Bing Ads Python [SDK](client-libraries.md) supports Python 3.3 or higher. You should install and run one of the supported versions. 

## <a name="installation"></a>Install the SDK
To install the Bing Ads Python [SDK](client-libraries.md) for the first time, run the following either from your IDE or command line prompt.

```powershell
pip.exe install bingads
```
To confirm that the Bing Ads Python SDK is installed, run the following. You should see *bingads (&lt;version&gt;)* in the output list.

```powershell
pip.exe list
```
If you already have the Bing Ads Python SDK installed, you can run this command to get the latest bits.

```powershell
pip.exe install --upgrade bingads
```

## <a name="walkthrough"></a>Walkthroughs
Once you have the Bing Ads Python [SDK](client-libraries.md) installed, you can either download the examples from [GitHub](https://github.com/BingAds/BingAds-Python-SDK) or follow one of the application walkthroughs for a [Walkthrough: Bing Ads API Web Application in Python](walkthrough-web-application-python.md) or [Walkthrough: Bing Ads API Desktop Application in Python](walkthrough-desktop-application-python.md) application.

## <a name="suds"></a>Using Suds
The Bing Ads Python SDK uses the [suds-community](https://pypi.org/project/suds-community/) SOAP SDK to instantiate programming elements for the Bing Ads API i.e., service operations, data objects, and value sets. You will pass Suds factory objects via either a *ServiceClient*, *BulkServiceManager*, or *ReportingServiceManager* class. Since Suds is included as an SDK dependency, you can use Suds directly to call any of the Bing Ads API service operations.

Please keep in mind the following rules, suggestions, and tips related to Suds in the Bing Ads Python SDK.

- One of the most common exceptions we hear about is *ERROR:suds.resolver:(ClassGoesHere) not-found*. Usually this can be resolved by using the namespace prefix for the Suds object e.g. `ns3:ArrayOfstring`. 
    > [!TIP]
    > To discover all SOAP objects with namespace prefix that are available for each service, you can print the soap client. For example, the following statements will return Campaign, AdGroup, ExpandedTextAd, and Keyword, among others.
    
    ```python
    campaign_service = ServiceClient(
        service='CampaignManagementService', 
        version = 13,
        authorization_data=authorization_data, 
        environment = ENVIRONMENT,
    )
    print campaign_service.soap_client
    ```

- For many objects passed to the campaign management service via Suds you can create dictionary objects. From a performance perspective, the dictionary approach is faster than the alternative *service.factory.create* method.

    ```python
    ad_groups = {
        'AdGroup':
            [
                {
                    'Name': "Women's Shoe Sale",
                    'AdDistribution': 'Search',
                    'EndDate': {
                        'Day': '31',
                        'Month': '12',
                        'Year': strftime("%Y", gmtime())
                    },
                    'CpcBid': {
                        'Amount': 0.09
                    },
                    'Language': 'English'
                },
            ]
        }
    ```

- For derived types such as [ExpandedTextAd](../campaign-management-service/expandedtextad.md), [NegativeKeyword](../campaign-management-service/negativekeyword.md), and [NegativeKeywordList](../campaign-management-service/negativekeywordlist.md), the Suds library requires that you use factory.create.

    ```python
    ads = campaign_service.factory.create('ArrayOfAd')
    expanded_text_ad=campaign_service.factory.create('ExpandedTextAd')
    expanded_text_ad.TitlePart1='Contoso'
    expanded_text_ad.TitlePart2='Quick & Easy Setup'
    expanded_text_ad.TitlePart3='Seemless Integration'
    expanded_text_ad.Text='Find New Customers & Increase Sales!'
    expanded_text_ad.TextPart2='Start Advertising on Contoso Today.'
    expanded_text_ad.Path1='seattle'
    expanded_text_ad.Path2='shoe sale'
    expanded_text_ad.Type='ExpandedText'
    expanded_text_ad.Status=None
    expanded_text_ad.EditorialStatus=None

    # With FinalUrls you can separate the tracking template, custom parameters, and 
    # landing page URLs.
    final_urls=campaign_service.factory.create('ns3:ArrayOfstring')
    final_urls.string.append('https://www.contoso.com/womenshoesale')
    expanded_text_ad.FinalUrls=final_urls

    # Final Mobile URLs can also be used if you want to direct the user to a different page 
    # for mobile devices.
    final_mobile_urls=campaign_service.factory.create('ns3:ArrayOfstring')
    final_mobile_urls.string.append('https://mobile.contoso.com/womenshoesale')
    expanded_text_ad.FinalMobileUrls=final_mobile_urls

    # Set custom parameters that are specific to this ad.
    url_custom_parameters=campaign_service.factory.create('CustomParameters')
    parameters=campaign_service.factory.create('ArrayOfCustomParameter')
    custom_parameter1=campaign_service.factory.create('CustomParameter')
    custom_parameter1.Key='promoCode'
    custom_parameter1.Value='PROMO' + str(index)
    parameters.CustomParameter.append(custom_parameter1)
    custom_parameter2=campaign_service.factory.create('CustomParameter')
    custom_parameter2.Key='season'
    custom_parameter2.Value='summer'
    parameters.CustomParameter.append(custom_parameter2)
    url_custom_parameters.Parameters=parameters
    expanded_text_ad.UrlCustomParameters=url_custom_parameters

    ads.Ad.append(expanded_text_ad)
    ```

- Any non-primitive elements must be specified for the Suds client e.g. *EditorialStatus* of type [AdEditorialStatus](../campaign-management-service/adeditorialstatus.md), even though the Bing Ads API does not require such elements.

- Campaign Management API operations require that if you specify a non-primitives, it must be one of the values defined by the service i.e. it cannot be a nil element. Since Suds requires non-primitives and Microsoft Advertising won't accept nil elements in place of an enum value, you must either set the non-primitives or they must be set to None. Also note that if the element is ready only you must set it to *None*. For example set `expanded_text_ad.EditorialStatus=None`. 

To call the corresponding methods of a Bing Ads API service operation, you can use an instance of the *ServiceClient* class and pass the Suds factory object. For more information, see [Authentication With the SDKs](sdk-authentication.md#oauth).

## See Also
[Bing Ads API Client Libraries](client-libraries.md)    
[Bing Ads API Code Examples](code-examples.md)    
[Bing Ads API Web Service Addresses](web-service-addresses.md)  
[Handling Service Errors and Exceptions](handle-service-errors-exceptions.md)  
[Sandbox](sandbox.md)  
