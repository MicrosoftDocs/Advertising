---
title: Get Started Using PHP (REST) with Bing Ads API
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Install the Bing Ads PHP REST SDK and discover code examples.
---
# Get Started Using PHP with Bing Ads API

To get started developing Bing Ads API applications with PHP, you can start with the [provided examples](code-examples.md) or follow one of the application walkthroughs for a [Web](walkthrough-web-application-php.md) or [Desktop](walkthrough-desktop-application-php.md) application. The examples have been developed with the Bing Ads PHP [SDK](client-libraries.md) and require [PHP](https://php.net/) 7.4 or higher.

You will need user credentials with access to Microsoft Advertising either in [production](https://ads.microsoft.com/) or [sandbox](https://secure.sandbox.bingads.microsoft.com/Auth?EnvContext=Sandbox). For the production environment you will need a [production developer token](get-started.md#get-developer-token). All sandbox clients can use the universal sandbox developer token i.e., **BBD37VB98**. For more information, please see [Get Started With the Bing Ads API](get-started.md) and [Sandbox](sandbox.md#access).

To authenticate via OAuth, you must also register an application and get the corresponding client identifier. You also need to take note of the client secret and redirect URI if you are developing a web application. For more details about registering an application in production and the authorization code grant flow, see [Authentication with OAuth](authentication-oauth.md) and [Authentication With the SDKs](sdk-authentication.md#oauth). Although in production you must use your own application ID (a.k.a. client ID), all Microsoft Advertising customers can use the public "Tutorial Sample App" client ID in sandbox i.e., **00001111-aaaa-2222-bbbb-3333cccc4444**. For more information, please see [Sandbox](sandbox.md#access).

## <a name="installation"></a>Install the SDK

You can install the Bing Ads PHP [SDK](client-libraries.md) using the [Composer](https://getcomposer.org/doc/00-intro.md#introduction) package manager to fetch from [Packagist](https://packagist.org/packages/microsoft/msads), or you can clone the source from [GitHub](https://github.com/BingAds/BingAds-PHP-REST-SDK/). This guide describes how you can use Composer to get the latest version of the Bing Ads PHP SDK.

1. Download and install [Composer](https://getcomposer.org/doc/00-intro.md#introduction). Microsoft Windows users should also add composer.phar to your *PATH* variable.

2. Open a command prompt and type `composer require microsoft/msads`.

    > [!NOTE]
    > Windows users who did not add *composer.phar* to the *PATH* will need to type `php composer.phar require microsoft/msads` instead.

3. To get updates going forward, type `composer update`. If any updates are available at packagist, composer will install the latest version.

The REST SDK requires the `ext-curl`, `ext-json`, and `ext-mbstring` PHP extensions. The [Guzzle](https://docs.guzzlephp.org/) HTTP client is installed automatically as a dependency.

## <a name="walkthrough"></a>Walkthroughs

Once you have the Bing Ads PHP [SDK](client-libraries.md) installed you can either browse the [Bing Ads API Code Examples](code-examples.md), download the examples at [GitHub](https://github.com/BingAds/BingAds-PHP-REST-SDK/), or follow one of the application walkthroughs for a [Web](walkthrough-web-application-php.md) or [Desktop](walkthrough-desktop-application-php.md) application.

## <a name="rest-sdk"></a>Using the REST SDK

The Bing Ads PHP SDK communicates with the Microsoft Advertising REST API using OpenAPI-generated client and model classes. Service calls are made through typed API client objects, and all request and response data is represented as strongly-typed model classes with fluent setter methods.

### Setting up a service API client

Configure authentication once using the `Configuration` class, then construct a typed API client per service.

```php
use Microsoft\MsAds\Rest\Api\CampaignManagementServiceApi;
use Microsoft\MsAds\Rest\Auth\ApiEnvironment;
use Microsoft\MsAds\Rest\Auth\AuthorizationData;
use Microsoft\MsAds\Rest\Auth\OAuthDesktopMobileAuthCodeGrant;
use Microsoft\MsAds\Rest\Auth\OAuthScope;
use Microsoft\MsAds\Rest\Configuration;
use GuzzleHttp\Client;

$configuration = Configuration::getDefaultConfiguration();

$authentication = (new OAuthDesktopMobileAuthCodeGrant())
    ->withEnvironment(ApiEnvironment::SANDBOX)
    ->withClientId('YOUR_CLIENT_ID')
    ->withOAuthScope(OAuthScope::MSADS_MANAGE);

$configuration->setAuthorizationData(
    (new AuthorizationData())
        ->withAuthentication($authentication)
        ->withDeveloperToken('BBD37VB98')
        ->withCustomerId('YOUR_CUSTOMER_ID')
        ->withAccountId('YOUR_ACCOUNT_ID')
);

$configuration->getAuthorizationData()->Authentication->RequestOAuthTokensByRefreshToken($refreshToken);

$campaignManagementServiceApi = new CampaignManagementServiceApi(
    new Client(),
    $configuration,
    null,
    ApiEnvironment::SANDBOX
);
```

The following API client classes are available: `CampaignManagementServiceApi`, `BulkServiceApi`, `ReportingServiceApi`, `CustomerManagementServiceApi`, `CustomerBillingServiceApi`, and `AdInsightServiceApi`.

### Creating objects

Import model classes from `Microsoft\MsAds\Rest\Model\<ServiceName>` and instantiate them using fluent setter methods or by passing an associative array to the constructor.

```php
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Campaign;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BudgetLimitType;

// Fluent setter style
$campaign = (new Campaign())
    ->setName("Women's Shoes")
    ->setDailyBudget(50.0)
    ->setBudgetType(BudgetLimitType::DAILY_BUDGET_STANDARD)
    ->setTimeZone('PacificTimeUSCanadaTijuana')
    ->setLanguages(['All']);

// Alternatively, pass an associative array to the constructor
$campaign = new Campaign([
    'Name' => "Women's Shoes",
    'DailyBudget' => 50.0,
    'BudgetType' => BudgetLimitType::DAILY_BUDGET_STANDARD,
    'TimeZone' => 'PacificTimeUSCanadaTijuana',
    'Languages' => ['All'],
]);
```

### Calling service operations

Build a typed request object and pass it to the corresponding method on the API client. Response properties are accessed via getter methods.

```php
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddCampaignsRequest;

$request = new AddCampaignsRequest([
    'AccountId' => $accountId,
    'Campaigns' => [$campaign],
]);

$response = $campaignManagementServiceApi->addCampaigns($request);
$campaignIds = $response->getCampaignIds();
$partialErrors = $response->getPartialErrors();
```

### Derived types — no SoapVar required

In the SOAP SDK, sending a complex type that inherits from a base class requires wrapping the object in a `SoapVar` to explicitly declare its concrete type. The REST SDK does not require this — instantiate the concrete subclass directly and assign it to the parent-typed field.

The following example is the REST equivalent of the `SoapVar` pattern shown in the SOAP guide. [BiddableCampaignCriterion](../campaign-management-service/biddablecampaigncriterion.md) derives from `CampaignCriterion`, [LocationCriterion](../campaign-management-service/locationcriterion.md) derives from `Criterion`, and [BidMultiplier](../campaign-management-service/bidmultiplier.md) derives from `CriterionBid` — no encoding is needed for any of them.

```php
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddCampaignCriterionsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BiddableCampaignCriterion;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BidMultiplier;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\CampaignCriterionType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\LocationCriterion;

$locationCriterion = (new LocationCriterion())->setLocationId(190); // United States
$bidMultiplier = (new BidMultiplier())->setMultiplier(0);

$campaignCriterion = (new BiddableCampaignCriterion())
    ->setCampaignId($campaignId)
    ->setCriterion($locationCriterion)
    ->setCriterionBid($bidMultiplier);

$request = new AddCampaignCriterionsRequest([
    'CampaignCriterions' => [$campaignCriterion],
    'CriterionType' => CampaignCriterionType::TARGETS,
]);

$response = $campaignManagementServiceApi->addCampaignCriterions($request);
```

Reference documentation for each data object specifies whether the complex type is derived from a base type — see [BiddableCampaignCriterion](../campaign-management-service/biddablecampaigncriterion.md), [LocationCriterion](../campaign-management-service/locationcriterion.md), and [BidMultiplier](../campaign-management-service/bidmultiplier.md).

### Error handling

Service errors are raised as `ApiException`. The exception exposes the HTTP status code, response headers, and the deserialized response body.

```php
use Microsoft\MsAds\Rest\ApiException;

try {
    $response = $campaignManagementServiceApi->addCampaigns($request);
    $campaignIds = $response->getCampaignIds();
}
catch (ApiException $e) {
    printf("Error (%d): %s\n", $e->getCode(), $e->getMessage());
    printf("Response body: %s\n", $e->getResponseBody());
}
```

For information on handling batch errors returned in the response body, see [Handling Service Errors and Exceptions](handle-service-errors-exceptions.md).

## See Also

[Bing Ads API Client Libraries](client-libraries.md)  
[Bing Ads API Code Examples](code-examples.md)  
[Bing Ads API Web Service Addresses](web-service-addresses.md)  
[Handling Service Errors and Exceptions](handle-service-errors-exceptions.md)  
[Sandbox](sandbox.md)  
