---
title: Migration Guide - SOAP to REST for PHP SDK
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 3/23/2026
description: This guide helps you migrate from the Bing Ads PHP SOAP SDK (`microsoft/bingads`) to the new Bing Ads PHP REST SDK (`microsoft/msads`). The new REST SDK offers improved performance, modern architecture, and native async support.
dev_langs:
  - php
---
# Migration Guide - SOAP to REST for PHP SDK

This guide helps you migrate from the Bing Ads PHP SOAP SDK (`microsoft/bingads`) to the new Bing Ads PHP REST SDK (`microsoft/msads`). The new REST SDK offers improved performance, modern architecture, and native async support.

## Overview

The Microsoft Advertising REST SDK for PHP replaces the legacy SOAP-based SDK. Key benefits include:

- **No SOAP dependency**: Uses GuzzleHttp for REST API calls, eliminating the need for the `ext-soap` PHP extension
- **Modern PHP support**: Requires PHP 7.4 or higher with full PHP 8.x compatibility
- **Async support**: Built-in async methods for non-blocking API calls
- **OpenAPI-generated models**: Consistent, type-safe model classes with full documentation
- **Simpler installation**: No complex SOAP configuration required

## Package Changes

### Composer Package Name

| SDK Version | Package Name |
| ------------- | -------------- |
| SOAP SDK (Legacy) | `microsoft/bingads` |
| REST SDK (New) | `microsoft/msads` |

### Installation

**Old SDK (SOAP):**

```bash
composer require microsoft/bingads
```

**New SDK (REST):**

```bash
composer require microsoft/msads
```

### Dependencies

**Old SDK Requirements:**

- PHP >= 7.1
- ext-curl
- ext-openssl
- ext-soap

**New SDK Requirements:**

- PHP ^7.4 || ^8.0
- ext-curl
- ext-json
- ext-mbstring
- guzzlehttp/guzzle ^7.3
- guzzlehttp/psr7 ^1.7 || ^2.0

## Namespace Changes

All namespaces have changed from `Microsoft\BingAds\` to `Microsoft\MsAds\Rest\`.

| Component | SOAP SDK | REST SDK |
| ----------- | ---------- | ---------- |
| Base namespace | `Microsoft\BingAds\` | `Microsoft\MsAds\Rest\` |
| Authentication | `Microsoft\BingAds\Auth\` | `Microsoft\MsAds\Rest\Auth\` |
| Campaign Management Models | `Microsoft\BingAds\V13\CampaignManagement\` | `Microsoft\MsAds\Rest\Model\CampaignManagementService\` |
| Customer Management Models | `Microsoft\BingAds\V13\CustomerManagement\` | `Microsoft\MsAds\Rest\Model\CustomerManagementService\` |
| Bulk Models | `Microsoft\BingAds\V13\Bulk\` | `Microsoft\MsAds\Rest\Model\BulkService\` |
| Reporting Models | `Microsoft\BingAds\V13\Reporting\` | `Microsoft\MsAds\Rest\Model\ReportingService\` |
| Service APIs | N/A (uses ServiceClient) | `Microsoft\MsAds\Rest\Api\*` |

### Example Namespace Migration

**Old SDK:**

```php
use Microsoft\BingAds\Auth\AuthorizationData;
use Microsoft\BingAds\Auth\OAuthDesktopMobileAuthCodeGrant;
use Microsoft\BingAds\Auth\ServiceClient;
use Microsoft\BingAds\Auth\ServiceClientType;
use Microsoft\BingAds\V13\CampaignManagement\Campaign;
use Microsoft\BingAds\V13\CampaignManagement\AddCampaignsRequest;
```

**New SDK:**

```php
use Microsoft\MsAds\Rest\Auth\AuthorizationData;
use Microsoft\MsAds\Rest\Auth\OAuthDesktopMobileAuthCodeGrant;
use Microsoft\MsAds\Rest\Configuration;
use Microsoft\MsAds\Rest\Api\CampaignManagementServiceApi;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Campaign;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddCampaignsRequest;
```

## Authentication Changes

The authentication pattern remains similar but with some structural differences.

### OAuth Authentication Setup

**Old SDK:**

```php
use Microsoft\BingAds\Auth\AuthorizationData;
use Microsoft\BingAds\Auth\OAuthDesktopMobileAuthCodeGrant;
use Microsoft\BingAds\Auth\ApiEnvironment;
use Microsoft\BingAds\Auth\OAuthScope;

// Create OAuth authentication
$authentication = (new OAuthDesktopMobileAuthCodeGrant())
    ->withEnvironment(ApiEnvironment::Production)
    ->withClientId('YOUR_CLIENT_ID')
    ->withOAuthScope(OAuthScope::MSADS_MANAGE);

// Create authorization data
$authorizationData = (new AuthorizationData())
    ->withAuthentication($authentication)
    ->withDeveloperToken('YOUR_DEVELOPER_TOKEN');

// Store tokens and refresh when needed
if (isset($refreshToken)) {
    $authentication->RequestOAuthTokensByRefreshToken($refreshToken);
}
```

**New SDK:**

```php
use Microsoft\MsAds\Rest\Auth\AuthorizationData;
use Microsoft\MsAds\Rest\Auth\OAuthDesktopMobileAuthCodeGrant;
use Microsoft\MsAds\Rest\Auth\ApiEnvironment;
use Microsoft\MsAds\Rest\Auth\OAuthScope;
use Microsoft\MsAds\Rest\Configuration;

// Create OAuth authentication
$authentication = (new OAuthDesktopMobileAuthCodeGrant())
    ->withEnvironment(ApiEnvironment::PRODUCTION)
    ->withClientId('YOUR_CLIENT_ID')
    ->withOAuthScope(OAuthScope::MSADS_MANAGE);

// Create authorization data (now includes AccountId and CustomerId)
$authorizationData = (new AuthorizationData())
    ->withAuthentication($authentication)
    ->withDeveloperToken('YOUR_DEVELOPER_TOKEN')
    ->withAccountId('YOUR_ACCOUNT_ID')
    ->withCustomerId('YOUR_CUSTOMER_ID');

// Configure the API client
$config = Configuration::getDefaultConfiguration();
$config->setAuthorizationData($authorizationData);

// Store tokens and refresh when needed
if (isset($refreshToken)) {
    $authentication->RequestOAuthTokensByRefreshToken($refreshToken);
    // Refresh the configuration after token update
    $config->refreshAuthorizationData();
}
```

### Key Authentication Differences

| Aspect | SOAP SDK | REST SDK |
| -------- | ---------- | ---------- |
| AuthorizationData properties | Uses setter/getter methods | Uses public properties |
| AccountId/CustomerId | Set per request | Set in AuthorizationData |
| Configuration | Part of ServiceClient | Separate Configuration class |
| Token refresh | Implicit in ServiceClient | Requires `Configuration::refreshAuthorizationData()` |
| Environment constants | `ApiEnvironment::Production` | `ApiEnvironment::PRODUCTION` |

## Service Client Changes

The most significant change is how you interact with the API services.

### Creating Service Clients

**Old SDK (ServiceClient with Proxy):**

```php
use Microsoft\BingAds\Auth\ServiceClient;
use Microsoft\BingAds\Auth\ServiceClientType;

// Create service client
$campaignManagementProxy = new ServiceClient(
    ServiceClientType::CampaignManagementVersion13,
    $authorizationData,
    ApiEnvironment::Production
);

// Access the service
$service = $campaignManagementProxy->GetService();
```

**New SDK (Direct API Classes):**

```php
use Microsoft\MsAds\Rest\Api\CampaignManagementServiceApi;
use Microsoft\MsAds\Rest\Configuration;

// Create configuration with auth
$config = new Configuration();
$config->setAuthorizationData($authorizationData);

// Create service API directly
$campaignManagementApi = new CampaignManagementServiceApi(
    null,           // GuzzleHttp\ClientInterface (optional)
    $config,        // Configuration
    null,           // HeaderSelector (optional)
    ApiEnvironment::PRODUCTION  // Host environment
);
```

### Available Service APIs

| Service | SOAP SDK ServiceClientType | REST SDK API Class |
| --------- | --------------------------- | ------------------- |
| Campaign Management | `CampaignManagementVersion13` | `CampaignManagementServiceApi` |
| Customer Management | `CustomerManagementVersion13` | `CustomerManagementServiceApi` |
| Customer Billing | `CustomerBillingVersion13` | `CustomerBillingServiceApi` |
| Bulk | `BulkVersion13` | `BulkServiceApi` |
| Reporting | `ReportingVersion13` | `ReportingServiceApi` |
| Ad Insight | `AdInsightVersion13` | `AdInsightServiceApi` |

## API Calling Pattern Changes

### Method Naming Convention

Methods in the REST SDK use camelCase instead of PascalCase:

| SOAP SDK Method | REST SDK Method |
| ----------------- | ----------------- |
| `AddCampaigns` | `addCampaigns` |
| `GetCampaignsByAccountId` | `getCampaignsByAccountId` |
| `UpdateAdGroups` | `updateAdGroups` |
| `DeleteAds` | `deleteAds` |

### Making API Calls

**Old SDK:**

```php
use Microsoft\BingAds\V13\CampaignManagement\Campaign;
use Microsoft\BingAds\V13\CampaignManagement\CampaignType;
use Microsoft\BingAds\V13\CampaignManagement\BudgetLimitType;
use Microsoft\BingAds\V13\CampaignManagement\AddCampaignsRequest;
use Microsoft\BingAds\V13\CampaignManagement\GetCampaignsByAccountIdRequest;

// Create a campaign
$campaign = new Campaign();
$campaign->Name = "My Campaign";
$campaign->DailyBudget = 50.00;
$campaign->BudgetType = BudgetLimitType::DailyBudgetStandard;
$campaign->TimeZone = "PacificTimeUSCanadaTijuana";

// Create the request
$request = new AddCampaignsRequest();
$request->AccountId = $accountId;
$request->Campaigns = [$campaign];

// Make the call
$response = $campaignManagementProxy->GetService()->AddCampaigns($request);

// Access results
$campaignIds = $response->CampaignIds;
$partialErrors = $response->PartialErrors;
```

**New SDK:**

```php
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Campaign;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\CampaignType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BudgetLimitType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddCampaignsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\GetCampaignsByAccountIdRequest;

// Create a campaign (using setter methods or constructor)
$campaign = new Campaign([
    'Name' => 'My Campaign',
    'DailyBudget' => 50.00,
    'BudgetType' => BudgetLimitType::DAILY_BUDGET_STANDARD,
    'TimeZone' => 'PacificTimeUSCanadaTijuana'
]);

// Or using setter methods
$campaign = new Campaign();
$campaign->setName("My Campaign");
$campaign->setDailyBudget(50.00);
$campaign->setBudgetType(BudgetLimitType::DAILY_BUDGET_STANDARD);
$campaign->setTimeZone("PacificTimeUSCanadaTijuana");

// Create the request
$request = new AddCampaignsRequest([
    'AccountId' => $accountId,
    'Campaigns' => [$campaign]
]);

// Make the call
$response = $campaignManagementApi->addCampaigns($request);

// Access results (using getter methods)
$campaignIds = $response->getCampaignIds();
$partialErrors = $response->getPartialErrors();
```

### Async API Calls

The REST SDK provides built-in async support:

```php
use GuzzleHttp\Promise\Utils;

// Async call
$promise = $campaignManagementApi->addCampaignsAsync($request);

// Execute and get result
$response = $promise->wait();

// Or handle with callbacks
$promise->then(
    function ($response) {
        $campaignIds = $response->getCampaignIds();
        // Handle success
    },
    function ($exception) {
        // Handle error
    }
);

// Execute multiple async calls in parallel
$promises = [
    'campaigns' => $campaignManagementApi->getCampaignsByAccountIdAsync($getCampaignsRequest),
    'adGroups' => $campaignManagementApi->getAdGroupsByCampaignIdAsync($getAdGroupsRequest),
];

$results = Utils::unwrap($promises);
```

### WithHttpInfo Variants

The REST SDK also provides `*WithHttpInfo` methods that return additional HTTP response details:

```php
// Returns: [response, statusCode, headers]
list($response, $statusCode, $headers) = $campaignManagementApi->addCampaignsWithHttpInfo($request);

echo "Status Code: " . $statusCode;
echo "Request ID: " . ($headers['X-Request-Id'][0] ?? 'N/A');
```

## Model Changes

### Property Access

**Old SDK (Direct property access):**

```php
$campaign = new Campaign();
$campaign->Name = "My Campaign";
$campaign->DailyBudget = 50.00;

echo $campaign->Name;
echo $campaign->DailyBudget;
```

**New SDK (Getter/Setter methods):**

```php
$campaign = new Campaign();
$campaign->setName("My Campaign");
$campaign->setDailyBudget(50.00);

echo $campaign->getName();
echo $campaign->getDailyBudget();

// Or use constructor with array
$campaign = new Campaign([
    'Name' => 'My Campaign',
    'DailyBudget' => 50.00
]);
```

### Enum Changes

Enum values use uppercase constants with underscores:

| SOAP SDK | REST SDK |
| ---------- | ---------- |
| `CampaignStatus::Active` | `CampaignStatus::ACTIVE` |
| `CampaignStatus::Paused` | `CampaignStatus::PAUSED` |
| `BudgetLimitType::DailyBudgetStandard` | `BudgetLimitType::DAILY_BUDGET_STANDARD` |
| `AdGroupStatus::Active` | `AdGroupStatus::ACTIVE` |

### Flag Enums

The REST SDK introduces **Flag Enums** - enums that allow combining multiple values. This is a significant change from the SOAP SDK's space-separated string approach.

**Identifying Flag Enums:**

In the REST SDK, you can check if an enum is a Flag Enum by looking at the `$isFlags` property in the class definition. If `isFlags()` returns `true`, you can combine multiple values.

**Old SDK (Space-separated strings):**

```php
// In the SOAP SDK, multiple enum values were combined with spaces
use Microsoft\BingAds\V13\CampaignManagement\CampaignType;
use Microsoft\BingAds\V13\CampaignManagement\AdGroupCriterionType;

$campaignTypes = CampaignType::Audience . ' ' . CampaignType::Search . ' ' . CampaignType::Shopping;

$criterionTypes = AdGroupCriterionType::Age . ' ' . AdGroupCriterionType::Gender . ' ' . AdGroupCriterionType::Device;
```

**New SDK (Comma-separated or Array):**

```php
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AdExtensionsTypeFilter;
use Microsoft\MsAds\Rest\Model\BulkService\DataScope;

// Option 1: Use an array of enum constants
$filter = [
    AdExtensionsTypeFilter::ACTION_AD_EXTENSION,
    AdExtensionsTypeFilter::APP_AD_EXTENSION,
    AdExtensionsTypeFilter::SITELINK_AD_EXTENSION
];

// Option 2: Use a comma-separated string
$filter = 'ActionAdExtension,AppAdExtension,SitelinkAdExtension';

// Option 3: Concatenate constants with commas
$filter = AdExtensionsTypeFilter::ACTION_AD_EXTENSION . ',' .
          AdExtensionsTypeFilter::APP_AD_EXTENSION;

// Option 4: Create a new enum instance with the value
$filter = new AdExtensionsTypeFilter([
    AdExtensionsTypeFilter::ACTION_AD_EXTENSION,
    AdExtensionsTypeFilter::APP_AD_EXTENSION
]);

// For DataScope (another flag enum)
$dataScope = DataScope::ENTITY_DATA;  // Single value
$dataScope = [DataScope::ENTITY_DATA, DataScope::QUALITY_SCORE_DATA];  // Multiple values
```

**Common Flag Enums to migrate:**

| Purpose | SOAP SDK | REST SDK |
| ------- | -------- | -------- |
| Ad Extension Types | Space-separated | `AdExtensionsTypeFilter` (array/comma) |
| Campaign Types | Space-separated | `CampaignType` (array/comma) |
| Download Data Scope | Space-separated | `DataScope` (array/comma) |
| Criterion Types | Space-separated | Various `*CriterionType` (array/comma) |
| Report Filters | Space-separated | `*ReportFilter` classes (array/comma) |

### Polymorphic Types (SoapVar Migration)

One of the most significant simplifications in the REST SDK is the removal of `SoapVar` wrappers for polymorphic types. In the SOAP SDK, you had to wrap derived types (like specific ad types or ad extensions) in `SoapVar` objects. The REST SDK handles this automatically through JSON serialization.

**Old SDK (Required SoapVar wrapper):**

```php
use SoapVar;
use Microsoft\BingAds\V13\CampaignManagement\ExpandedTextAd;
use Microsoft\BingAds\V13\CampaignManagement\ResponsiveSearchAd;
use Microsoft\BingAds\V13\CampaignManagement\ImageAdExtension;

// Creating an Expanded Text Ad required SoapVar wrapping
$expandedTextAd = new ExpandedTextAd();
$expandedTextAd->TitlePart1 = "Contoso";
$expandedTextAd->TitlePart2 = "Quick & Easy Setup";
$expandedTextAd->Text = "Find New Customers & Increase Sales!";
$expandedTextAd->FinalUrls = ["http://www.contoso.com"];

// Must wrap in SoapVar for SOAP serialization
$ads[] = new SoapVar(
    $expandedTextAd,
    SOAP_ENC_OBJECT,
    'ExpandedTextAd',
    $GLOBALS['CampaignManagementProxy']->GetNamespace()
);

// Same for ad extensions
$imageAdExtension = new ImageAdExtension();
$imageAdExtension->ImageMediaIds = [12345];

$adExtensions[] = new SoapVar(
    $imageAdExtension,
    SOAP_ENC_OBJECT,
    'ImageAdExtension',
    $GLOBALS['CampaignManagementProxy']->GetNamespace()
);

// Pass the SoapVar-wrapped arrays to the API
$response = $service->AddAds($request);
```

**New SDK (Direct object usage):**

```php
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ExpandedTextAd;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ResponsiveSearchAd;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ImageAdExtension;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddAdsRequest;

// Create an Expanded Text Ad - no SoapVar needed!
$expandedTextAd = new ExpandedTextAd();
$expandedTextAd->setTitlePart1("Contoso");
$expandedTextAd->setTitlePart2("Quick & Easy Setup");
$expandedTextAd->setText("Find New Customers & Increase Sales!");
$expandedTextAd->setFinalUrls(["http://www.contoso.com"]);

// Or use constructor with array
$responsiveSearchAd = new ResponsiveSearchAd([
    'Headlines' => [...],
    'Descriptions' => [...],
    'FinalUrls' => ["http://www.contoso.com"]
]);

// Simply add to array - no SoapVar wrapper required
$ads = [$expandedTextAd, $responsiveSearchAd];

// Same for ad extensions - just create and use directly
$imageAdExtension = new ImageAdExtension([
    'ImageMediaIds' => [12345]
]);

$adExtensions = [$imageAdExtension];

// Pass directly to the API
$request = new AddAdsRequest([
    'AdGroupId' => $adGroupId,
    'Ads' => $ads
]);
$response = $campaignManagementApi->addAds($request);
```

**Types that previously required SoapVar:**

| Category | Examples |
| -------- | -------- |
| Ad Types | `ExpandedTextAd`, `ResponsiveSearchAd`, `ResponsiveAd`, `DynamicSearchAd`, `ProductAd` |
| Ad Extensions | `ImageAdExtension`, `SitelinkAdExtension`, `CallAdExtension`, `LocationAdExtension`, `ActionAdExtension`, `PriceAdExtension` |
| Audiences | `RemarketingList`, `CustomAudience`, `InMarketAudience`, `SimilarRemarketingList` |
| Bid Strategies | `MaxClicksBiddingScheme`, `TargetCpaBiddingScheme`, `MaxConversionsBiddingScheme` |
| Criterions | `BiddableAdGroupCriterion`, `NegativeAdGroupCriterion`, `BiddableCampaignCriterion` |

**Migration tip:** Search your SOAP SDK code for `new SoapVar(` - each instance needs to be simplified to direct object usage in the REST SDK.

### Model Serialization

The new models implement `JsonSerializable` and `ArrayAccess`:

```php
// Convert to array
$campaignArray = $campaign->jsonSerialize();

// Access like array
$name = $campaign['Name'];

// Convert to JSON
$json = json_encode($campaign);
```

## Error Handling Changes

### Exception Types

**Old SDK (SOAP Faults):**

```php
use SoapFault;

try {
    $response = $service->AddCampaigns($request);
} catch (SoapFault $e) {
    echo "SOAP Fault: " . $e->getMessage();
    // Access fault details via $e->detail
}
```

**New SDK (ApiException):**

```php
use Microsoft\MsAds\Rest\ApiException;

try {
    $response = $campaignManagementApi->addCampaigns($request);
} catch (ApiException $e) {
    echo "API Exception: " . $e->getMessage();
    echo "HTTP Status Code: " . $e->getCode();
    
    // Access response body (may contain ApplicationFault)
    $responseBody = $e->getResponseBody();
    if ($responseBody) {
        $errorDetails = json_decode($responseBody);
        // Handle specific error codes
    }
    
    // Access response headers
    $headers = $e->getResponseHeaders();
    $requestId = $headers['X-Request-Id'][0] ?? 'N/A';
}
```

### Error Response Structure

The REST API returns errors in JSON format:

```json
{
    "ApplicationFault": {
        "Type": "ApiFaultDetail",
        "TrackingId": "abc123",
        "OperationErrors": [
            {
                "Code": 1234,
                "Message": "Error message description",
                "Details": "Additional details"
            }
        ],
        "BatchErrors": [
            {
                "Index": 0,
                "Code": 5678,
                "Message": "Batch error for first item"
            }
        ]
    }
}
```

### Comprehensive Error Handling Example

```php
use Microsoft\MsAds\Rest\ApiException;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ApplicationFault;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ApiFaultDetail;

try {
    $response = $campaignManagementApi->addCampaigns($request);
    
    // Check for partial errors in successful response
    $partialErrors = $response->getPartialErrors();
    if ($partialErrors) {
        foreach ($partialErrors as $error) {
            echo "Partial Error at index " . $error->getIndex() . ": ";
            echo $error->getMessage() . " (Code: " . $error->getCode() . ")\n";
        }
    }
    
} catch (ApiException $e) {
    $statusCode = $e->getCode();
    
    switch ($statusCode) {
        case 400:
            echo "Bad Request - Check your request parameters\n";
            break;
        case 401:
            echo "Unauthorized - Check your authentication\n";
            break;
        case 403:
            echo "Forbidden - You don't have permission\n";
            break;
        case 429:
            echo "Rate Limited - Too many requests\n";
            // Implement retry logic
            break;
        case 500:
            echo "Server Error - Try again later\n";
            break;
        default:
            echo "Unexpected error: " . $e->getMessage() . "\n";
    }
    
    // Parse error details
    $responseBody = $e->getResponseBody();
    if ($responseBody) {
        $errorData = json_decode($responseBody, true);
        
        if (isset($errorData['ApplicationFault'])) {
            $fault = $errorData['ApplicationFault'];
            echo "Tracking ID: " . ($fault['TrackingId'] ?? 'N/A') . "\n";
            
            if (isset($fault['OperationErrors'])) {
                foreach ($fault['OperationErrors'] as $opError) {
                    echo "Operation Error: " . $opError['Code'] . " - " . $opError['Message'] . "\n";
                }
            }
        }
    }
}
```

## Complete Migration Examples

There are test examples in the `test` folder of the new SDK.

The examples extend off a `RestApiTestBase` class where it holds some reusable functions during testing as well as a central auth setup. The examples also make use of PHPUnit test Framework.

## Migration Checklist

Use this checklist to ensure a complete migration:

- [ ] **Update composer.json**
  - Replace `microsoft/bingads` with `microsoft/msads`
  - Run `composer update`

- [ ] **Update use statements**
  - Change namespace from `Microsoft\BingAds\` to `Microsoft\MsAds\Rest\`
  - Update service model imports

- [ ] **Update authentication code**
  - Add `AccountId` and `CustomerId` to `AuthorizationData`
  - Create `Configuration` object and set authorization data
  - Update environment constants (e.g., `Production` → `PRODUCTION`)

- [ ] **Replace ServiceClient with API classes**
  - Replace `ServiceClient` instantiation with specific `*ServiceApi` classes
  - Pass `Configuration` to API constructors

- [ ] **Update API method calls**
  - Change method names from PascalCase to camelCase
  - Replace direct calls through `GetService()` with direct API object calls

- [ ] **Update model usage**
  - Replace direct property access with getter/setter methods
  - Update enum constants to uppercase format
  - Use constructor arrays for object initialization

- [ ] **Update error handling**
  - Replace `SoapFault` catch blocks with `ApiException`
  - Update error parsing for JSON response bodies
  - Handle HTTP status codes appropriately

- [ ] **Test thoroughly**
  - Test all API operations
  - Verify authentication flow
  - Test error scenarios
  - Validate async operations if used
