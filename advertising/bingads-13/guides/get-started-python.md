---
title: Get Started Using Python (REST) with Bing Ads API
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Install the Bing Ads Python SDK and get started with the REST API.
dev_langs:
  - python
---
# Get Started Using Python with Bing Ads API

To get started developing Bing Ads API applications with Python, you can start with the [provided examples](code-examples.md) or follow one of the application walkthroughs for a [Web](walkthrough-web-application-python.md) or [Desktop](walkthrough-desktop-application-python.md) application.

You will need user credentials with access to Microsoft Advertising either in [production](https://ads.microsoft.com/) or [sandbox](https://secure.sandbox.bingads.microsoft.com/Auth?EnvContext=Sandbox). For the production environment you will need a [production developer token](get-started.md#get-developer-token). All sandbox clients can use the universal sandbox developer token i.e., **BBD37VB98**. For more information, please see [Get Started With the Bing Ads API](get-started.md) and [Sandbox](sandbox.md#access).

To authenticate via OAuth, you must also register an application and get the corresponding client identifier. You also need to take note of the client secret and redirect URI if you are developing a web application. For more details about registering an application in production and the authorization code grant flow, see [Authentication with OAuth](authentication-oauth.md) and [Authentication With the SDKs](sdk-authentication.md#oauth). Although in production you must use your own application ID (a.k.a. client ID), all Microsoft Advertising customers can use the public "Tutorial Sample App" client ID in sandbox i.e., **00001111-aaaa-2222-bbbb-3333cccc4444**. For more information, please see [Sandbox](sandbox.md#access).

## <a name="dependencies"></a> Dependencies

The Bing Ads Python SDK supports Python 3.8 or higher. You should install and run one of the supported versions.

The REST-based SDK depends on the following packages, which are installed automatically:

- [pydantic](https://pypi.org/project/pydantic/) (>=2.0.0) — typed data models for all API objects
- [requests](https://pypi.org/project/requests/) — HTTP transport
- [typing-extensions](https://pypi.org/project/typing-extensions/) (>=4.0.0)

## <a name="installation"></a>Install the SDK

To install the Bing Ads Python [SDK](client-libraries.md) for the first time, run the following either from your IDE or command line prompt.

```powershell
pip.exe install msads
```

To confirm that the Bing Ads Python SDK is installed, run the following. You should see *msads (&lt;version&gt;)* in the output list.

```powershell
pip.exe list
```

If you already have the Bing Ads Python SDK installed, you can run this command to get the latest bits.

```powershell
pip.exe install --upgrade msads
```

## <a name="walkthrough"></a>Walkthroughs

Once you have the Bing Ads Python [SDK](client-libraries.md) installed, you can either download the examples from [GitHub](https://github.com/BingAds/BingAds-Python-SDK) or follow one of the application walkthroughs for a [Walkthrough: Bing Ads API Web Application in Python](walkthrough-web-application-python.md) or [Walkthrough: Bing Ads API Desktop Application in Python](walkthrough-desktop-application-python.md) application.

## <a name="rest-sdk"></a>Using the REST SDK

The Bing Ads Python SDK communicates with the Microsoft Advertising REST API using OpenAPI-generated client classes backed by [Pydantic](https://docs.pydantic.dev/) models. You interact with the API through a *ServiceClient* instance, which handles authentication headers, endpoint routing, and method dispatch automatically.

### Setting up a ServiceClient

Create a *ServiceClient* by passing the service name, API version, authorization data, and target environment.

```python
from bingads.service_client import ServiceClient

campaign_service = ServiceClient(
    service='CampaignManagementService',
    version=13,
    authorization_data=authorization_data,
    environment=ENVIRONMENT,  # 'production' or 'sandbox'
)
```

The following service names are supported: `CampaignManagementService`, `BulkService`, `ReportingService`, `CustomerManagementService`, `CustomerBillingService`, and `AdInsightService`.

### Creating objects

Import model classes directly from `openapi_client.models.campaign` and instantiate them with keyword arguments. There are no `ArrayOf*` wrapper types — use plain Python lists wherever a field accepts multiple items.

```python
from openapi_client.models.campaign import *

campaign = Campaign(
    name="Women's Shoes",
    daily_budget=50.0,
    budget_type=BudgetLimitType.DAILYBUDGETSTANDARD,
    time_zone='PacificTimeUSCanadaTijuana',
    languages=['All'],
)
```

For derived types such as [ExpandedTextAd](../campaign-management-service/expandedtextad.md), instantiate the concrete subclass directly — no factory calls or special encoding are required. Custom parameters and other nested objects can be set inline via the constructor.

```python
expanded_text_ad = ExpandedTextAd(
    title_part1='Contoso',
    title_part2='Quick & Easy Setup',
    title_part3='Seamless Integration',
    text='Find New Customers & Increase Sales!',
    text_part2='Start Advertising on Contoso Today.',
    path1='seattle',
    path2='shoe sale',
    # With FinalUrls you can separate the tracking template, custom parameters,
    # and landing page URLs.
    final_urls=['https://www.contoso.com/womenshoesale'],
    # Final Mobile URLs can also be used if you want to direct the user to a
    # different page for mobile devices.
    final_mobile_urls=['https://mobile.contoso.com/womenshoesale'],
    # Set custom parameters that are specific to this ad.
    url_custom_parameters=CustomParameters(
        parameters=[
            CustomParameter(key='promoCode', value='PROMO' + str(index)),
            CustomParameter(key='season', value='summer'),
        ]
    ),
)

ads = [expanded_text_ad]
```

### Calling service operations

Build a request object and pass it to the corresponding method on the *ServiceClient*. Methods use snake_case naming.

```python
add_request = AddCampaignsRequest(
    account_id=authorization_data.account_id,
    campaigns=[campaign],
)
response = campaign_service.add_campaigns(add_campaigns_request=add_request)
campaign_id = response.campaign_ids[0]
```

### Authentication

The REST SDK uses the standard `Authorization: Bearer <token>` HTTP header. The OAuth flow — authorization code grant, refresh token handling, and token storage — is identical to the SOAP SDK. For details, see [Authentication With the SDKs](sdk-authentication.md#oauth).

### Error handling

Service errors are raised as `ApiException` from the `openapi_client` package. The exception exposes the HTTP status code and the error response body.

```python
from openapi_client.exceptions import ApiException

try:
    response = campaign_service.GetCampaignsByAccountId(
        AccountId=authorization_data.account_id,
        CampaignType='Search'
    )
except ApiException as ex:
    print(f"HTTP status {ex.status}: {ex.body}")
```

For information on parsing batch errors returned in the response body, see [Handling Service Errors and Exceptions](handle-service-errors-exceptions.md).

## See Also

[Bing Ads API Client Libraries](client-libraries.md)  
[Bing Ads API Code Examples](code-examples.md)  
[Bing Ads API Web Service Addresses](web-service-addresses.md)  
[Handling Service Errors and Exceptions](handle-service-errors-exceptions.md)  
[Sandbox](sandbox.md)  
