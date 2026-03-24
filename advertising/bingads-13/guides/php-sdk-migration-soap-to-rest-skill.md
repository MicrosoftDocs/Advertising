---
title: Migration Skill - SOAP to REST for PHP SDK
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 3/23/2026
description: This skill guides AI assistants through migrating Bing Ads PHP SDK code from the legacy SOAP-based implementation (`microsoft/bingads`) to the new REST API-based implementation (`microsoft/msads`).
dev_langs:
  - php
---
# Migration Skill - SOAP to REST for PHP SDK

This skill guides AI assistants through migrating Bing Ads PHP SDK code from the legacy SOAP-based implementation (`microsoft/bingads`) to the new REST API-based implementation (`microsoft/msads`).

## Overview

When users ask to migrate Bing Ads PHP code from SOAP to REST, or when you encounter code using the SOAP SDK patterns, use this guide to perform the transformation.

## Quick Reference

| SDK Version | Package Name |
| ------------- | -------------- |
| SOAP SDK (Legacy) | `microsoft/bingads` |
| REST SDK (New) | `microsoft/msads` |

## Detection Patterns

Identify PHP SOAP SDK code by these characteristics:

- Namespace starts with `Microsoft\BingAds\`
- Uses `ServiceClient` class with `ServiceClientType::` constants
- Uses `SoapVar` for polymorphic types (ads, ad extensions, audiences)
- Imports from `Microsoft\BingAds\V13\*`
- Environment constant: `ApiEnvironment::Production` (PascalCase)
- Direct property access (`$campaign->Name`)
- PascalCase method names (`AddCampaigns`, `GetCampaignsByAccountId`)
- Space-separated flag enum strings (`'Audience Search Shopping'`)

## Transformation Rules

### 1. Package Installation

```bash
# SOAP SDK (Legacy)
composer require microsoft/bingads

# REST SDK (New)
composer require microsoft/msads
```

### 2. Namespace Transformations

| Component | SOAP SDK | REST SDK |
| ----------- | ---------- | ---------- |
| Base namespace | `Microsoft\BingAds\` | `Microsoft\MsAds\Rest\` |
| Authentication | `Microsoft\BingAds\Auth\` | `Microsoft\MsAds\Rest\Auth\` |
| Campaign Models | `Microsoft\BingAds\V13\CampaignManagement\` | `Microsoft\MsAds\Rest\Model\CampaignManagementService\` |
| Customer Models | `Microsoft\BingAds\V13\CustomerManagement\` | `Microsoft\MsAds\Rest\Model\CustomerManagementService\` |
| Bulk Models | `Microsoft\BingAds\V13\Bulk\` | `Microsoft\MsAds\Rest\Model\BulkService\` |
| Reporting Models | `Microsoft\BingAds\V13\Reporting\` | `Microsoft\MsAds\Rest\Model\ReportingService\` |
| Service APIs | N/A (uses ServiceClient) | `Microsoft\MsAds\Rest\Api\*` |

### 3. Import Transformations

```php
// SOAP SDK
use Microsoft\BingAds\Auth\AuthorizationData;
use Microsoft\BingAds\Auth\OAuthDesktopMobileAuthCodeGrant;
use Microsoft\BingAds\Auth\ServiceClient;
use Microsoft\BingAds\Auth\ServiceClientType;
use Microsoft\BingAds\Auth\ApiEnvironment;
use Microsoft\BingAds\V13\CampaignManagement\Campaign;
use Microsoft\BingAds\V13\CampaignManagement\AddCampaignsRequest;
use SoapFault;

// REST SDK
use Microsoft\MsAds\Rest\Auth\AuthorizationData;
use Microsoft\MsAds\Rest\Auth\OAuthDesktopMobileAuthCodeGrant;
use Microsoft\MsAds\Rest\Auth\ApiEnvironment;
use Microsoft\MsAds\Rest\Configuration;
use Microsoft\MsAds\Rest\Api\CampaignManagementServiceApi;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Campaign;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddCampaignsRequest;
use Microsoft\MsAds\Rest\ApiException;
```

### 4. Authentication Changes

```php
// SOAP SDK
$authorizationData = (new AuthorizationData())
    ->withAuthentication($authentication)
    ->withDeveloperToken('YOUR_DEVELOPER_TOKEN');

// REST SDK - Must include AccountId and CustomerId
$authorizationData = (new AuthorizationData())
    ->withAuthentication($authentication)
    ->withDeveloperToken('YOUR_DEVELOPER_TOKEN')
    ->withAccountId('YOUR_ACCOUNT_ID')
    ->withCustomerId('YOUR_CUSTOMER_ID');

// Create and configure the API
$config = Configuration::getDefaultConfiguration();
$config->setAuthorizationData($authorizationData);
```

### 5. Service Client Transformations

```php
// SOAP SDK - ServiceClient with Proxy
$campaignManagementProxy = new ServiceClient(
    ServiceClientType::CampaignManagementVersion13,
    $authorizationData,
    ApiEnvironment::Production
);
$service = $campaignManagementProxy->GetService();

// REST SDK - Direct API Classes
$config = new Configuration();
$config->setAuthorizationData($authorizationData);

$campaignManagementApi = new CampaignManagementServiceApi(
    null,                        // GuzzleHttp\ClientInterface (optional)
    $config,                     // Configuration
    null,                        // HeaderSelector (optional)
    ApiEnvironment::PRODUCTION   // Host environment (UPPERCASE)
);
```

#### Available Service APIs

| Service | SOAP SDK ServiceClientType | REST SDK API Class |
| --------- | --------------------------- | ------------------- |
| Campaign Management | `CampaignManagementVersion13` | `CampaignManagementServiceApi` |
| Customer Management | `CustomerManagementVersion13` | `CustomerManagementServiceApi` |
| Customer Billing | `CustomerBillingVersion13` | `CustomerBillingServiceApi` |
| Bulk | `BulkVersion13` | `BulkServiceApi` |
| Reporting | `ReportingVersion13` | `ReportingServiceApi` |
| Ad Insight | `AdInsightVersion13` | `AdInsightServiceApi` |

### 6. Method Naming Convention

Methods use camelCase instead of PascalCase:

| SOAP SDK Method | REST SDK Method |
| ----------------- | ----------------- |
| `AddCampaigns` | `addCampaigns` |
| `GetCampaignsByAccountId` | `getCampaignsByAccountId` |
| `UpdateAdGroups` | `updateAdGroups` |
| `DeleteAds` | `deleteAds` |
| `GetAdExtensionsByIds` | `getAdExtensionsByIds` |

### 7. Object Creation Transformations

```php
// SOAP SDK - Direct property access
$campaign = new Campaign();
$campaign->Name = "My Campaign";
$campaign->DailyBudget = 50.00;
$campaign->BudgetType = BudgetLimitType::DailyBudgetStandard;
$campaign->TimeZone = "PacificTimeUSCanadaTijuana";

// REST SDK - Option 1: Constructor with array
$campaign = new Campaign([
    'Name' => 'My Campaign',
    'DailyBudget' => 50.00,
    'BudgetType' => BudgetLimitType::DAILY_BUDGET_STANDARD,
    'TimeZone' => 'PacificTimeUSCanadaTijuana'
]);

// REST SDK - Option 2: Setter methods
$campaign = new Campaign();
$campaign->setName("My Campaign");
$campaign->setDailyBudget(50.00);
$campaign->setBudgetType(BudgetLimitType::DAILY_BUDGET_STANDARD);
$campaign->setTimeZone("PacificTimeUSCanadaTijuana");
```

### 8. Property Access Transformations

```php
// SOAP SDK - Direct property access
$name = $campaign->Name;
$budget = $campaign->DailyBudget;
$campaign->Name = "New Name";

// REST SDK - Getter/Setter methods
$name = $campaign->getName();
$budget = $campaign->getDailyBudget();
$campaign->setName("New Name");
```

### 9. API Call Transformations

```php
// SOAP SDK
$request = new AddCampaignsRequest();
$request->AccountId = $accountId;
$request->Campaigns = [$campaign];

$response = $campaignManagementProxy->GetService()->AddCampaigns($request);
$campaignIds = $response->CampaignIds;
$partialErrors = $response->PartialErrors;

// REST SDK
$request = new AddCampaignsRequest([
    'AccountId' => $accountId,
    'Campaigns' => [$campaign]
]);

$response = $campaignManagementApi->addCampaigns($request);
$campaignIds = $response->getCampaignIds();
$partialErrors = $response->getPartialErrors();
```

### 10. Enum Transformations

Use UPPERCASE with underscores:

| SOAP SDK | REST SDK |
| ---------- | ---------- |
| `CampaignStatus::Active` | `CampaignStatus::ACTIVE` |
| `CampaignStatus::Paused` | `CampaignStatus::PAUSED` |
| `BudgetLimitType::DailyBudgetStandard` | `BudgetLimitType::DAILY_BUDGET_STANDARD` |
| `AdGroupStatus::Active` | `AdGroupStatus::ACTIVE` |
| `ApiEnvironment::Production` | `ApiEnvironment::PRODUCTION` |

### 11. Flag Enum Transformations

```php
// SOAP SDK - Space-separated strings
$campaignTypes = CampaignType::Audience . ' ' . CampaignType::Search . ' ' . CampaignType::Shopping;
$criterionTypes = AdGroupCriterionType::Age . ' ' . AdGroupCriterionType::Gender;

// REST SDK - Option 1: Array of constants
$filter = [
    AdExtensionsTypeFilter::ACTION_AD_EXTENSION,
    AdExtensionsTypeFilter::APP_AD_EXTENSION,
    AdExtensionsTypeFilter::SITELINK_AD_EXTENSION
];

// REST SDK - Option 2: Comma-separated string
$filter = 'ActionAdExtension,AppAdExtension,SitelinkAdExtension';

// REST SDK - Option 3: Constant concatenation with commas
$filter = AdExtensionsTypeFilter::ACTION_AD_EXTENSION . ',' .
          AdExtensionsTypeFilter::APP_AD_EXTENSION;
```

### 12. Remove SoapVar Wrapper (CRITICAL)

**This is one of the most important transformations.** The REST SDK removes the need for `SoapVar` wrappers on polymorphic types.

```php
// SOAP SDK - Required SoapVar wrapper for polymorphic types
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

// REST SDK - No SoapVar needed! Use objects directly
$expandedTextAd = new ExpandedTextAd([
    'TitlePart1' => 'Contoso',
    'TitlePart2' => 'Quick & Easy Setup',
    'Text' => 'Find New Customers & Increase Sales!',
    'FinalUrls' => ['http://www.contoso.com']
]);

$responsiveSearchAd = new ResponsiveSearchAd([
    'Headlines' => [...],
    'Descriptions' => [...],
    'FinalUrls' => ['http://www.contoso.com']
]);

// Simply add to array - no SoapVar wrapper required
$ads = [$expandedTextAd, $responsiveSearchAd];

// Same for ad extensions
$imageAdExtension = new ImageAdExtension([
    'ImageMediaIds' => [12345]
]);
$adExtensions = [$imageAdExtension];
```

#### Types That Previously Required SoapVar

| Category | Examples |
| ---------- | ---------- |
| Ad Types | `ExpandedTextAd`, `ResponsiveSearchAd`, `ResponsiveAd`, `DynamicSearchAd`, `ProductAd` |
| Ad Extensions | `ImageAdExtension`, `SitelinkAdExtension`, `CallAdExtension`, `LocationAdExtension`, `ActionAdExtension`, `PriceAdExtension` |
| Audiences | `RemarketingList`, `CustomAudience`, `InMarketAudience`, `SimilarRemarketingList` |
| Bid Strategies | `MaxClicksBiddingScheme`, `TargetCpaBiddingScheme`, `MaxConversionsBiddingScheme` |
| Criterions | `BiddableAdGroupCriterion`, `NegativeAdGroupCriterion`, `BiddableCampaignCriterion` |

**Migration tip:** Search your SOAP SDK code for `new SoapVar(` - each instance needs to be simplified to direct object usage.

### 13. Exception Handling Transformations

```php
// SOAP SDK
use SoapFault;

try {
    $response = $service->AddCampaigns($request);
} catch (SoapFault $e) {
    echo "SOAP Fault: " . $e->getMessage();
    // Access fault details via $e->detail
}

// REST SDK
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

### 14. Async Support (REST SDK Only)

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

### 15. WithHttpInfo Variants (REST SDK)

```php
// Returns: [response, statusCode, headers]
list($response, $statusCode, $headers) = $campaignManagementApi->addCampaignsWithHttpInfo($request);

echo "Status Code: " . $statusCode;
echo "Request ID: " . ($headers['X-Request-Id'][0] ?? 'N/A');
```

### 16. Model Serialization (REST SDK)

```php
// Convert to array
$campaignArray = $campaign->jsonSerialize();

// Access like array
$name = $campaign['Name'];

// Convert to JSON
$json = json_encode($campaign);
```

---

## Complete Migration Checklist

When migrating PHP code, ensure you:

- [ ] **Update composer.json**: Replace `microsoft/bingads` with `microsoft/msads`
- [ ] **Run `composer update`**
- [ ] **Update use statements**: Change namespace from `Microsoft\BingAds\` to `Microsoft\MsAds\Rest\`
- [ ] **Update service model imports**: `V13\CampaignManagement\` → `Model\CampaignManagementService\`
- [ ] **Update authentication code**:
  - Add `AccountId` and `CustomerId` to `AuthorizationData`
  - Create `Configuration` object and set authorization data
  - Update environment constants (`Production` → `PRODUCTION`)
- [ ] **Replace ServiceClient with API classes**:
  - Replace `ServiceClient` instantiation with specific `*ServiceApi` classes
  - Pass `Configuration` to API constructors
- [ ] **Update API method calls**:
  - Change method names from PascalCase to camelCase
  - Replace direct calls through `GetService()` with direct API object calls
- [ ] **Update model usage**:
  - Replace direct property access with getter/setter methods
  - Use constructor arrays for object initialization
- [ ] **Update enum constants**: Change to UPPERCASE format with underscores
- [ ] **Update flag enums**: Change from space-separated to array/comma format
- [ ] **Remove all SoapVar wrappers**: Search for `new SoapVar(` and simplify
- [ ] **Update error handling**:
  - Replace `SoapFault` catch blocks with `ApiException`
  - Update error parsing for JSON response bodies
  - Handle HTTP status codes appropriately
- [ ] **Test thoroughly**:
  - Test all API operations
  - Verify authentication flow
  - Test error scenarios
  - Validate async operations if used

---

## Example Full File Migration

### Before (SOAP SDK)

```php
<?php
use Microsoft\BingAds\Auth\ServiceClient;
use Microsoft\BingAds\Auth\ServiceClientType;
use Microsoft\BingAds\Auth\ApiEnvironment;
use Microsoft\BingAds\V13\CampaignManagement\Campaign;
use Microsoft\BingAds\V13\CampaignManagement\BudgetLimitType;
use Microsoft\BingAds\V13\CampaignManagement\AddCampaignsRequest;
use Microsoft\BingAds\V13\CampaignManagement\ExpandedTextAd;
use SoapFault;
use SoapVar;

// Create service client
$campaignProxy = new ServiceClient(
    ServiceClientType::CampaignManagementVersion13,
    $authorizationData,
    ApiEnvironment::Production
);

try {
    // Create campaign
    $campaign = new Campaign();
    $campaign->Name = "My Campaign " . date('Y-m-d H:i:s');
    $campaign->DailyBudget = 50.00;
    $campaign->BudgetType = BudgetLimitType::DailyBudgetStandard;
    $campaign->TimeZone = "PacificTimeUSCanadaTijuana";

    $request = new AddCampaignsRequest();
    $request->AccountId = $accountId;
    $request->Campaigns = [$campaign];

    $response = $campaignProxy->GetService()->AddCampaigns($request);
    $campaignIds = $response->CampaignIds;
    
    // Create ad with SoapVar wrapper
    $expandedTextAd = new ExpandedTextAd();
    $expandedTextAd->TitlePart1 = "Contoso";
    $expandedTextAd->Text = "Find New Customers!";
    $expandedTextAd->FinalUrls = ["http://www.contoso.com"];
    
    $ads[] = new SoapVar(
        $expandedTextAd,
        SOAP_ENC_OBJECT,
        'ExpandedTextAd',
        $campaignProxy->GetNamespace()
    );
    
} catch (SoapFault $e) {
    echo "Error: " . $e->getMessage();
}
```

### After (REST SDK)

```php
<?php
use Microsoft\MsAds\Rest\Auth\AuthorizationData;
use Microsoft\MsAds\Rest\Auth\ApiEnvironment;
use Microsoft\MsAds\Rest\Configuration;
use Microsoft\MsAds\Rest\Api\CampaignManagementServiceApi;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\Campaign;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\BudgetLimitType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddCampaignsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ExpandedTextAd;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddAdsRequest;
use Microsoft\MsAds\Rest\ApiException;

// Create configuration
$config = new Configuration();
$config->setAuthorizationData($authorizationData);

// Create API client
$campaignApi = new CampaignManagementServiceApi(
    null,
    $config,
    null,
    ApiEnvironment::PRODUCTION
);

try {
    // Create campaign using constructor array
    $campaign = new Campaign([
        'Name' => 'My Campaign ' . date('Y-m-d H:i:s'),
        'DailyBudget' => 50.00,
        'BudgetType' => BudgetLimitType::DAILY_BUDGET_STANDARD,
        'TimeZone' => 'PacificTimeUSCanadaTijuana'
    ]);

    $request = new AddCampaignsRequest([
        'AccountId' => $accountId,
        'Campaigns' => [$campaign]
    ]);

    $response = $campaignApi->addCampaigns($request);
    $campaignIds = $response->getCampaignIds();
    
    // Create ad - NO SoapVar needed!
    $expandedTextAd = new ExpandedTextAd([
        'TitlePart1' => 'Contoso',
        'Text' => 'Find New Customers!',
        'FinalUrls' => ['http://www.contoso.com']
    ]);
    
    // Direct array usage
    $ads = [$expandedTextAd];
    
    $addAdsRequest = new AddAdsRequest([
        'AdGroupId' => $adGroupId,
        'Ads' => $ads
    ]);
    $addAdsResponse = $campaignApi->addAds($addAdsRequest);
    
} catch (ApiException $e) {
    echo "Error: " . $e->getMessage();
    echo "HTTP Code: " . $e->getCode();
    $body = $e->getResponseBody();
    if ($body) {
        $error = json_decode($body);
        print_r($error);
    }
}
```

---

## Troubleshooting

| Issue | Solution |
| ------- | ---------- |
| `SoapVar` related errors | Remove all `SoapVar` wrappers, use objects directly |
| Method not found | Change from PascalCase to camelCase (`AddCampaigns` → `addCampaigns`) |
| Property access errors | Use getter/setter methods (`getName()`, `setName()`) instead of direct access |
| Enum value errors | Use UPPERCASE with underscores (`DAILY_BUDGET_STANDARD`) |
| Environment constant errors | Use `ApiEnvironment::PRODUCTION` not `ApiEnvironment::Production` |
| Missing AccountId/CustomerId | Add these to `AuthorizationData` in REST SDK |
| `ServiceClient` errors | Replace with specific `*ServiceApi` classes |
| Flag enum errors | Use array or comma-separated format instead of space-separated |

---

## Reference Documentation

For complete migration guide with more examples, see:

- [PHP SDK SOAP to REST Migration Guide](php-sdk-migration-soap-to-rest.md)
