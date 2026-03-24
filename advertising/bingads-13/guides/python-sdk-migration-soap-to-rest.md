---
title: Migration Guide - SOAP to REST for Python SDK
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 3/23/2026
description: This guide provides comprehensive instructions for migrating from the legacy SOAP-based Bing Ads Python SDK (`bingads`) to the new REST API-based Python SDK (`msads`).
dev_langs:
  - python
---
# Migration Guide - SOAP to REST for Python SDK

This guide provides comprehensive instructions for migrating from the legacy SOAP-based Bing Ads Python SDK (`bingads`) to the new REST API-based Python SDK (`msads`). The REST SDK offers better performance, simpler architecture, and modern Python language features.

## Overview

### Why Migrate to REST?

| Aspect | SOAP SDK | REST SDK |
| -------- | ---------- | ---------- |
| **Protocol** | XML/SOAP over HTTP | JSON/REST over HTTP |
| **Performance** | Higher overhead due to XML parsing | Lighter payloads, faster serialization |
| **Dependencies** | `suds-jurko` (SOAP library) | `urllib3`, `pydantic` (OpenAPI-generated) |
| **Type Safety** | Dynamic SOAP objects | Pydantic models with type hints |
| **IDE Support** | Limited (dynamic factory objects) | Full autocomplete and type checking |
| **Error Handling** | SOAP faults | HTTP status codes with structured errors |
| **Maintenance** | Legacy, limited updates | Actively maintained |

### Key Differences at a Glance

More examples for Rest SDK can be found in the `/examples` folder of the SDK.

```python
# SOAP SDK - Creating a campaign
campaign = campaign_service.factory.create('Campaign')
campaign.Name = "My Campaign"
campaign.BudgetType = campaign_service.factory.create('BudgetLimitType').DailyBudgetStandard
campaign.DailyBudget = 50

# REST SDK - Creating a campaign
from openapi_client.models.campaign.campaign import Campaign
from openapi_client.models.campaign.budget_limit_type import BudgetLimitType

campaign = Campaign()
campaign.Name = "My Campaign"
campaign.BudgetType = BudgetLimitType.DAILYBUDGETSTANDARD
campaign.DailyBudget = 50
```

## Installation and Setup

### Package Changes

| SDK Version | Package Name |
| ----------- | ------------ |
| SOAP SDK (Legacy) | `bingads` |
| REST SDK (New) | `msads` |

### SOAP SDK Installation (Old)

```bash
pip install bingads
```

### REST SDK Installation (New)

```bash
pip install msads
```

### Dependencies Comparison

| SOAP SDK | REST SDK |
| ---------- | ---------- |
| `suds-jurko>=0.6` | `urllib3>=2.1` |
| `requests>=2.2` | `pydantic>=2.0` |
| `future>=0.14` | `typing_extensions>=4.0` |
| `pythonnet` (for CLR entities) | N/A |

## Import Statement Migration

One of the most significant changes is how you import modules and models. The REST SDK uses OpenAPI-generated models organized by service.

### Import Mapping Table

| Category | SOAP SDK Import | REST SDK Import |
| -------- | --------------- | --------------- |
| **Service Client** | `from bingads.service_client import ServiceClient` | `from bingads.service_client import ServiceClient` |
| **Authorization** | `from bingads.authorization import *` | `from bingads.authorization import *` |
| **Campaign Models** | `from bingads.v13 import *` | `from openapi_client.models.campaign import *` |
| **Customer Models** | `from bingads.v13 import *` | `from openapi_client.models.customer import *` |
| **Bulk Models** | `from bingads.v13.bulk import *` | `from openapi_client.models.bulk import *` |
| **Reporting Models** | `from bingads.v13.reporting import *` | `from openapi_client.models.reporting import *` |
| **Exceptions (SOAP)** | `from suds import WebFault` | N/A (not needed) |
| **Exceptions (REST)** | N/A | `from openapi_client.exceptions import ApiException` |

### Example: Auth Helper Imports

```python
# SOAP SDK - auth_helper.py
from suds import WebFault
from bingads.service_client import ServiceClient
from bingads.authorization import *
from bingads.v13 import *

# REST SDK - auth_helper.py
from typing import Optional, List, Dict
from openapi_client.models.campaign import *
from openapi_client.models.customer import *
from bingads.authorization import *
from bingads.service_client import ServiceClient
```

### Example: Campaign Management Imports

```python
# SOAP SDK
from auth_helper import *
from campaignmanagement_example_helper import *

# REST SDK
from auth_helper import *
from openapi_client.models.campaign import *
```

## Authentication Migration

### OAuth Authorization Classes

Both SDKs use similar OAuth classes, but with different internal implementations.

### Header Format Differences

The primary authentication difference is in how headers are set:

| Header | SOAP SDK | REST SDK |
| -------- | ---------- | ---------- |
| Authentication | `AuthenticationToken: {token}` | `Authorization: Bearer {token}` |

**SOAP SDK `enrich_headers()` method:**

```python
def enrich_headers(self, headers):
    headers.update({'AuthenticationToken': self.oauth_tokens.access_token})
```

**REST SDK `enrich_headers()` method:**

```python
def enrich_headers(self, headers):
    headers.update({'Authorization': 'Bearer ' + self.oauth_tokens.access_token})
```

## Service Client Migration

### Creating Service Clients

#### SOAP SDK

```python
from bingads.service_client import ServiceClient

# SOAP SDK - ServiceClient wraps suds.client.Client
campaign_service = ServiceClient(
    service='CampaignManagementService',
    version=13,
    authorization_data=authorization_data,
    environment='production',
    timeout=60,  # suds options
    cache=None   # suds options
)

# Access the SOAP factory for object creation
factory = campaign_service.factory

# Access the underlying SOAP client
soap_client = campaign_service.soap_client
```

#### REST SDK

```python
from bingads.service_client import ServiceClient

# REST SDK - ServiceClient wraps OpenAPI-generated API classes
campaign_service = ServiceClient(
    service='CampaignManagementService',
    version=13,
    authorization_data=authorization_data,
    environment='production'  # or 'sandbox'
)

# Access the factory for object creation (compatibility layer)
factory = campaign_service.factory

# Access the underlying REST API client
rest_api = campaign_service._api  # CampaignManagementServiceApi instance
```

### Service Client Constructor Comparison

| Parameter | SOAP SDK | REST SDK |
| ----------- | ---------- | ---------- |
| `service` | Service name | Service name |
| `version` | API version (13) | API version (13) |
| `authorization_data` | Auth data object | Auth data object |
| `environment` | 'production' or 'sandbox' | 'production' or 'sandbox' |
| `location` | Custom endpoint URL | Custom endpoint URL |
| `**suds_options` | SUDS client options | N/A (not used) |

### Environment Endpoints

```python
# REST SDK endpoints defined in ServiceClient
endpoints = {
    'sandbox': {
        'adinsight': 'https://adinsight.api.sandbox.bingads.microsoft.com',
        'campaignmanagement': 'https://campaign.api.sandbox.bingads.microsoft.com',
        'bulk': 'https://bulk.api.sandbox.bingads.microsoft.com',
        'customerbilling': 'https://clientcenter.api.sandbox.bingads.microsoft.com',
        'customermanagement': 'https://clientcenter.api.sandbox.bingads.microsoft.com',
        'reporting': 'https://reporting.api.sandbox.bingads.microsoft.com'
    },
    'production': {
        'adinsight': 'https://adinsight.api.bingads.microsoft.com',
        'campaignmanagement': 'https://campaign.api.bingads.microsoft.com',
        'bulk': 'https://bulk.api.bingads.microsoft.com',
        'customerbilling': 'https://clientcenter.api.bingads.microsoft.com',
        'customermanagement': 'https://clientcenter.api.bingads.microsoft.com',
        'reporting': 'https://reporting.api.bingads.microsoft.com'
    }
}
```

### Calling Service Methods

#### SOAP SDK - PascalCase Method Names

```python
# SOAP SDK - methods are PascalCase
response = campaign_service.GetCampaignsByAccountId(
    AccountId=account_id,
    CampaignType=['Search', 'Shopping']
)
```

#### REST SDK - Both PascalCase and snake_case Supported

```python
# REST SDK - supports both naming conventions
# PascalCase (for backwards compatibility)
response = campaign_service.GetCampaignsByAccountId(request)

# snake_case (Python convention)
response = campaign_service.get_campaigns_by_account_id(request)
```

### Creating Request Objects

#### SOAP SDK - Factory Method

```python
# SOAP SDK - use factory to create request
request = campaign_service.factory.create('GetCampaignsByAccountIdRequest')
request.AccountId = account_id
request.CampaignType = campaign_service.factory.create('ArrayOfCampaignType')
request.CampaignType.CampaignType.append('Search')

response = campaign_service.GetCampaignsByAccountId(request)
```

#### REST SDK - Direct Model Instantiation

```python
from openapi_client.models.campaign.get_campaigns_by_account_id_request import GetCampaignsByAccountIdRequest

# REST SDK - direct instantiation
request = GetCampaignsByAccountIdRequest(
    AccountId=account_id,
    CampaignType=['Search', 'Shopping']
)

response = campaign_service.get_campaigns_by_account_id(request)
```

## Object Creation Patterns

### SOAP SDK Factory Pattern

The SOAP SDK uses a factory pattern where objects are created dynamically from WSDL definitions:

```python
# Creating complex objects with factory
campaign = campaign_service.factory.create('Campaign')
campaign.Name = "My Campaign"
campaign.Description = "Campaign description"
campaign.BudgetType = campaign_service.factory.create('BudgetLimitType').DailyBudgetStandard
campaign.DailyBudget = 50

# Creating arrays with factory
campaigns = campaign_service.factory.create('ArrayOfCampaign')
campaigns.Campaign.append(campaign)

# Creating key-value pairs
kv_pair = campaign_service.factory.create('KeyValuePairOfstringstring')
kv_pair.key = 'MyKey'
kv_pair.value = 'MyValue'
```

### REST SDK Direct Instantiation

The REST SDK uses Pydantic models that can be instantiated directly:

```python
from openapi_client.models.campaign.campaign import Campaign
from openapi_client.models.campaign.budget_limit_type import BudgetLimitType

# Direct instantiation with constructor
campaign = Campaign(
    Name="My Campaign",
    Description="Campaign description",
    BudgetType=BudgetLimitType.DAILYBUDGETSTANDARD,
    DailyBudget=50
)

# Or set properties after construction
campaign = Campaign()
campaign.Name = "My Campaign"
campaign.BudgetType = BudgetLimitType.DAILYBUDGETSTANDARD

# Arrays are simple Python lists
campaigns = [campaign]

# Key-value pairs use the model class
from openapi_client.models.campaign.key_value_pair_ofstring_andstring import KeyValuePairOfstringAndstring
kv_pair = KeyValuePairOfstringAndstring(Key='MyKey', Value='MyValue')
```

### Compatibility Layer: Using Factory in REST SDK

The REST SDK provides a `factory` property for backwards compatibility:

```python
# REST SDK - using factory for compatibility
campaign = campaign_service.factory.create('Campaign')
campaign.Name = "My Campaign"

# Enums are accessed via accessor class
budget_type = campaign_service.factory.create('BudgetLimitType')
campaign.BudgetType = budget_type.DailyBudgetStandard

# Arrays work with array holder class
campaigns_array = campaign_service.factory.create('ArrayOfCampaign')
campaigns_array.append(campaign)
```

### Model Property Access

Both SDKs support PascalCase and snake_case property names:

```python
# PascalCase (traditional)
campaign.Name = "My Campaign"
campaign.DailyBudget = 50

# snake_case (Python convention - REST SDK)
campaign.name = "My Campaign"
campaign.daily_budget = 50
```

### Enum Handling

#### SOAP SDK Enum Handling

```python
# SOAP SDK - create enum via factory
budget_type = campaign_service.factory.create('BudgetLimitType')
campaign.BudgetType = budget_type.DailyBudgetStandard

# Or access directly from instance
campaign.BudgetType = campaign_service.factory.create('BudgetLimitType').DailyBudgetStandard
```

#### REST SDK Enum Handling

```python
from openapi_client.models.campaign.budget_limit_type import BudgetLimitType

# REST SDK - use enum class directly
campaign.BudgetType = BudgetLimitType.DAILYBUDGETSTANDARD

# Or using string value
campaign.BudgetType = "DailyBudgetStandard"

# Or using factory for compatibility
budget_type = campaign_service.factory.create('BudgetLimitType')
campaign.BudgetType = budget_type.DailyBudgetStandard
```

### Flag Enums (Bitwise OR Operations)

The REST SDK supports combining multiple enum values using Python's bitwise OR operator (`|`). This is commonly used for filtering by multiple types.

```python
# REST SDK - Combining enum flags with bitwise OR

# Get campaigns of multiple types
from openapi_client.models.campaign import CampaignType, GetCampaignsByIdsRequest

get_request = GetCampaignsByIdsRequest(
    account_id=authorization_data.account_id,
    campaign_ids=[campaign_id],
    campaign_type=CampaignType.SEARCH | CampaignType.AUDIENCE  # Combine types
)

# Filter ad extensions by multiple types
from openapi_client.models.campaign import AdExtensionsTypeFilter

get_extensions_request = GetAdExtensionsByIdsRequest(
    account_id=authorization_data.account_id,
    ad_extension_ids=ad_extension_ids,
    ad_extension_type=AdExtensionsTypeFilter.LOCATIONADEXTENSION | AdExtensionsTypeFilter.CALLADEXTENSION
)

# Combine conversion goal types
from openapi_client.models.campaign import ConversionGoalType

conversion_goal_types = (
    ConversionGoalType.APPINSTALL |
    ConversionGoalType.DURATION |
    ConversionGoalType.EVENT |
    ConversionGoalType.PAGESVIEWEDPERVISIT |
    ConversionGoalType.URL
)
```

> **Note**: In SOAP SDK, multiple types were typically passed as space-separated strings like `'AppInstall Duration Event'`. The REST SDK uses proper enum flag combinations.

### Removed Patterns: set_elements_to_none()

The SOAP SDK required a helper function `set_elements_to_none()` to properly initialize SUDS objects before use. This pattern is **no longer needed** in the REST SDK.

#### SOAP SDK - Required Pattern

```python
# SOAP SDK - Helper function required for proper initialization
def set_elements_to_none(suds_object):
    """
    Bing Ads Campaign Management service operations require that if you specify
    a non-primitive, it must be one of the values defined by the service.
    Since SUDS requires non-primitives and Bing Ads won't accept nil elements
    in place of an enum value, you must either set the non-primitives or
    they must be set to None.
    """
    for (element) in suds_object:
        suds_object.__setitem__(element[0], None)
    return suds_object

# Usage in SOAP SDK
campaign = set_elements_to_none(campaign_service.factory.create('Campaign'))
campaign.Name = "My Campaign"
ad_group = set_elements_to_none(campaign_service.factory.create('AdGroup'))
```

#### REST SDK - No Helper Needed

```python
# REST SDK - Direct instantiation, no helper needed
from openapi_client.models.campaign import Campaign, AdGroup

campaign = Campaign(name="My Campaign")
# Or
campaign = Campaign()
campaign.Name = "My Campaign"

ad_group = AdGroup(name="My Ad Group")
```

> **Migration Action**: Remove all `set_elements_to_none()` calls and the helper function itself when migrating to REST SDK.

### Response Object Access Patterns

The REST SDK simplifies response object access by removing the wrapper objects for arrays.

#### SOAP SDK - Nested Array Access

```python
# SOAP SDK - Responses have nested structures
response = campaign_service.AddCampaigns(
    AccountId=account_id,
    Campaigns=campaigns
)

# Access campaign IDs through wrapper
campaign_ids = response.CampaignIds['long']  # Access 'long' key
for campaign_id in campaign_ids:
    print(campaign_id)

# Access campaigns from GetCampaigns response
campaigns = response.Campaigns['Campaign']  # Access 'Campaign' key
for campaign in campaigns:
    print(campaign.Name)

# Access accounts from SearchAccounts
accounts = response['AdvertiserAccount']
```

#### REST SDK - Direct Array Access

```python
# REST SDK - Direct list access
response = campaign_service.add_campaigns(request)

# Direct access to campaign IDs
campaign_ids = response.CampaignIds  # Already a list
for campaign_id in campaign_ids:
    print(campaign_id)

# Access campaigns directly
campaigns = response.Campaigns   # Already a list (PascalCase)
# Or
campaigns = response.campaigns   # snake_case also works
for campaign in campaigns:
    print(campaign.Name)

# Access accounts directly
accounts = response.accounts  # Already a list
```

#### Key Differences

| Operation | SOAP SDK | REST SDK |
| --------- | -------- | -------- |
| Get campaign IDs | `response.CampaignIds['long']` | `response.CampaignIds` |
| Get campaigns | `response.Campaigns['Campaign']` | `response.Campaigns` or `response.campaigns` |
| Get accounts | `accounts['AdvertiserAccount'][0]` | `accounts[0]` |
| Check for content | `if response.CampaignIds['long']` | `if response.CampaignIds` |

### Request Parameter Naming

The REST SDK uses keyword arguments for request parameters. Always use the full parameter name with `_request` suffix.

#### SOAP SDK - Positional and Keyword Arguments

```python
# SOAP SDK - Can use positional or keyword arguments directly
response = campaign_service.AddCampaigns(
    AccountId=account_id,
    Campaigns=campaigns
)

response = campaign_service.GetCampaignsByAccountId(
    AccountId=account_id,
    CampaignType=['Search']
)
```

#### REST SDK - Request Object with Keyword Argument

```python
# REST SDK - Create request object, pass with keyword argument
from openapi_client.models.campaign import AddCampaignsRequest, GetCampaignsByAccountIdRequest

# Create request object
add_request = AddCampaignsRequest(
    account_id=authorization_data.account_id,  # snake_case in constructor
    campaigns=[campaign]
)

# Pass request with keyword argument (note the suffix pattern)
response = campaign_service.add_campaigns(
    add_campaigns_request=add_request  # Method name + "_request"
)

# Another example
get_request = GetCampaignsByAccountIdRequest(
    account_id=authorization_data.account_id,
    campaign_type=CampaignType.SEARCH
)
response = campaign_service.get_campaigns_by_account_id(
    get_campaigns_by_account_id_request=get_request
)
```

#### Request Naming Convention

The REST SDK follows a consistent pattern for method calls:

| Method Name | Request Parameter Name |
| ----------- | ---------------------- |
| `add_campaigns()` | `add_campaigns_request=` |
| `get_campaigns_by_ids()` | `get_campaigns_by_ids_request=` |
| `delete_ad_extensions()` | `delete_ad_extensions_request=` |
| `submit_generate_report()` | `submit_generate_report_request=` |

### Namespace Prefixes Removed

The SOAP SDK required namespace prefixes for certain types. These are no longer needed in the REST SDK.

#### SOAP SDK - With Namespace Prefixes

```python
# SOAP SDK - Some types required namespace prefixes
languages = campaign_service.factory.create('ns3:ArrayOfstring')
languages.string.append('All')

paging = customer_service.factory.create('ns5:Paging')
paging.Index = 0
paging.Size = 100
```

#### REST SDK - No Prefixes

```python
# REST SDK - Direct types, no namespace prefixes
# For arrays of strings, use Python lists directly
languages = ['All']

# For paging, import and instantiate directly
from openapi_client.models.customer import Paging
paging = Paging(index=0, size=100)
```

## Exception Handling Migration

### Exception Class Comparison

| SOAP SDK Exception | REST SDK Exception | HTTP Status |
| ------------------- | ------------------- | ------------- |
| `SdkException` | `OpenApiException` | N/A (base) |
| `OAuthTokenRequestException` | `ApiException` | Varies |
| `FileUploadException` | `ApiException` | Varies |
| `FileDownloadException` | `ApiException` | Varies |
| `TimeoutException` | `ApiException` | 408/504 |
| N/A | `BadRequestException` | 400 |
| N/A | `UnauthorizedException` | 401 |
| N/A | `ForbiddenException` | 403 |
| N/A | `NotFoundException` | 404 |
| N/A | `ConflictException` | 409 |
| N/A | `UnprocessableEntityException` | 422 |
| N/A | `ServiceException` | 5xx |

### SOAP SDK Exception Handling

```python
from bingads.exceptions import (
    SdkException,
    OAuthTokenRequestException,
    FileUploadException,
    FileDownloadException,
    TimeoutException
)
from suds.client import WebFault

try:
    response = campaign_service.GetCampaignsByAccountId(request)
except WebFault as fault:
    # SOAP fault - API error
    print(f"SOAP Fault: {fault.fault.faultstring}")
    if hasattr(fault.fault.detail, 'ApiFaultDetail'):
        for error in fault.fault.detail.ApiFaultDetail.OperationErrors.OperationError:
            print(f"Code: {error.Code}, Message: {error.Message}")
except OAuthTokenRequestException as ex:
    print(f"OAuth error: {ex.description}")
except TimeoutException as ex:
    print(f"Timeout: {ex}")
except SdkException as ex:
    print(f"SDK error: {ex}")
```

### REST SDK Exception Handling

```python
from openapi_client.exceptions import (
    OpenApiException,
    ApiException,
    BadRequestException,
    UnauthorizedException,
    ForbiddenException,
    NotFoundException,
    ConflictException,
    UnprocessableEntityException,
    ServiceException
)

try:
    response = campaign_service.get_campaigns_by_account_id(request)
except BadRequestException as ex:
    # HTTP 400 - Bad Request
    print(f"Bad Request: {ex.reason}")
    print(f"Body: {ex.body}")
except UnauthorizedException as ex:
    # HTTP 401 - Unauthorized
    print(f"Unauthorized: {ex.reason}")
    print(f"Need to refresh token")
except ForbiddenException as ex:
    # HTTP 403 - Forbidden
    print(f"Forbidden: {ex.reason}")
except NotFoundException as ex:
    # HTTP 404 - Not Found
    print(f"Not Found: {ex.reason}")
except ConflictException as ex:
    # HTTP 409 - Conflict
    print(f"Conflict: {ex.reason}")
except UnprocessableEntityException as ex:
    # HTTP 422 - Unprocessable Entity (validation error)
    print(f"Validation Error: {ex.reason}")
    print(f"Details: {ex.body}")
except ServiceException as ex:
    # HTTP 5xx - Server Error
    print(f"Server Error: {ex.status} - {ex.reason}")
except ApiException as ex:
    # Generic API error
    print(f"API Error: {ex.status} - {ex.reason}")
    print(f"Body: {ex.body}")
except OpenApiException as ex:
    # Base exception
    print(f"OpenAPI Error: {ex}")
```

### Exception Properties

#### REST SDK ApiException Properties

```python
try:
    response = campaign_service.get_campaigns_by_account_id(request)
except ApiException as ex:
    # Status code (int)
    print(f"Status: {ex.status}")
    
    # Reason phrase (str)
    print(f"Reason: {ex.reason}")
    
    # Response body (str or dict)
    print(f"Body: {ex.body}")
    
    # Parsed data (dict, if JSON response)
    print(f"Data: {ex.data}")
    
    # Full HTTP response object
    print(f"Response: {ex.http_resp}")
```

### Migration Pattern: Generic Handler

```python
# Before (SOAP SDK)
from suds.client import WebFault
from bingads.exceptions import SdkException

try:
    response = campaign_service.GetCampaignsByAccountId(request)
except WebFault as fault:
    handle_api_error(fault.fault)
except SdkException as ex:
    handle_sdk_error(ex)

# After (REST SDK)
from openapi_client.exceptions import ApiException, OpenApiException

try:
    response = campaign_service.get_campaigns_by_account_id(request)
except ApiException as ex:
    handle_api_error(ex.status, ex.body)
except OpenApiException as ex:
    handle_sdk_error(ex)
```

## Bulk Service Migration

### BulkServiceManager Overview

Both SDKs provide `BulkServiceManager` for high-level bulk operations. The migration primarily involves the underlying service client changes.

> **Important**: The REST SDK supports two approaches for bulk operations:
>
> 1. **BulkServiceManager** - High-level manager (same interface as SOAP SDK)
> 2. **Direct API calls** - Lower-level control with ServiceClient

### SOAP SDK Bulk Manager

```python
from bingads.v13.bulk import BulkServiceManager, DownloadParameters
from bingads.service_client import ServiceClient

# Create bulk service manager
bulk_service_manager = BulkServiceManager(
    authorization_data=authorization_data,
    poll_interval_in_milliseconds=5000,
    environment='production',
    working_directory='/tmp/bulk_files',
    timeout=60,  # suds options
    cache=None   # suds options
)

# Download entities
download_parameters = DownloadParameters(
    campaign_ids=[campaign_id],
    data_scope=['EntityData'],
    download_entities=['Campaigns', 'AdGroups'],
    file_type='Csv',
    result_file_directory='/tmp/results',
    result_file_name='download_results.csv',
    overwrite_result_file=True
)

result_file_path = bulk_service_manager.download_file(download_parameters)
```

### REST SDK Bulk Manager

```python
from bingads.v13.bulk import BulkServiceManager, DownloadParameters

# Create bulk service manager - no suds_options
bulk_service_manager = BulkServiceManager(
    authorization_data=authorization_data,
    poll_interval_in_milliseconds=5000,
    environment='production',
    working_directory='/tmp/bulk_files'
)

# Download entities - same interface
download_parameters = DownloadParameters(
    campaign_ids=[campaign_id],
    data_scope=['EntityData'],
    download_entities=['Campaigns', 'AdGroups'],
    file_type='Csv',
    result_file_directory='/tmp/results',
    result_file_name='download_results.csv',
    overwrite_result_file=True
)

result_file_path = bulk_service_manager.download_file(download_parameters)
```

### Bulk Upload

```python
# SOAP SDK
from bingads.v13.bulk import FileUploadParameters

upload_params = FileUploadParameters(
    upload_file_path='/tmp/upload.csv',
    result_file_directory='/tmp/results',
    result_file_name='upload_results.csv'
)

result_file = bulk_service_manager.upload_file(upload_params)

# REST SDK - same interface
from bingads.v13.bulk import FileUploadParameters

upload_params = FileUploadParameters(
    upload_file_path='/tmp/upload.csv',
    result_file_directory='/tmp/results',
    result_file_name='upload_results.csv'
)

result_file = bulk_service_manager.upload_file(upload_params)
```

### Constructor Parameter Changes

| Parameter | SOAP SDK | REST SDK |
| ----------- | ---------- | ---------- |
| `authorization_data` | Required | Required |
| `poll_interval_in_milliseconds` | Optional (default 5000) | Optional (default 5000) |
| `environment` | Optional ('production') | Optional ('production') |
| `working_directory` | Optional | Optional |
| `**suds_options` | Optional (suds config) | Not used |

### Alternative: Direct REST API Calls for Bulk

For more control over the bulk download/upload process, you can use the ServiceClient directly instead of BulkServiceManager. This approach gives you direct access to the API methods and manual polling.

```python
from bingads.service_client import ServiceClient
from openapi_client.models.bulk import *
import time

# Create bulk service client
bulk_service = ServiceClient(
    service='BulkService',
    version=13,
    authorization_data=authorization_data,
    environment=ENVIRONMENT
)

# Submit download request
download_request = DownloadCampaignsByAccountIdsRequest(
    account_ids=[authorization_data.account_id],
    data_scope=DataScope.ENTITYDATA,
    download_entities=[DownloadEntity.ADGROUPS, DownloadEntity.CAMPAIGNS],
    download_file_type=DownloadFileType.CSV,
    format_version='6.0',
    last_sync_time_in_utc=None
)

download_response = bulk_service.download_campaigns_by_account_ids(
    download_campaigns_by_account_ids_request=download_request
)

download_request_id = download_response.DownloadRequestId

# Poll for download status
wait_time = 5
for i in range(10):
    time.sleep(wait_time)
    
    status_request = GetBulkDownloadStatusRequest(request_id=download_request_id)
    status_response = bulk_service.get_bulk_download_status(
        get_bulk_download_status_request=status_request
    )
    
    if status_response.RequestStatus == "Completed":
        result_file_url = status_response.ResultFileUrl
        # Download file from result_file_url
        break

# For upload, get upload URL first
get_upload_url_request = GetBulkUploadUrlRequest(
    response_mode=ResponseMode.ERRORSANDRESULTS,
    account_id=authorization_data.account_id
)

upload_url_response = bulk_service.get_bulk_upload_url(
    get_bulk_upload_url_request=get_upload_url_request
)

upload_request_id = upload_url_response.RequestId
upload_url = upload_url_response.UploadUrl
# Upload file to upload_url, then poll for status
```

> **When to use direct API calls**: Use this approach when you need fine-grained control over polling intervals, custom error handling, or integration with async frameworks.

## Reporting Service Migration

### ReportingServiceManager Overview

Similar to Bulk, the `ReportingServiceManager` interface remains consistent.

### SOAP SDK Reporting Manager

```python
from bingads.v13.reporting import ReportingServiceManager, ReportingDownloadParameters

# Create reporting service manager
reporting_service_manager = ReportingServiceManager(
    authorization_data=authorization_data,
    poll_interval_in_milliseconds=5000,
    environment='production',
    working_directory='/tmp/reports',
    timeout=60  # suds options
)

# Create report request using factory
report_request = reporting_service_manager.service_client.factory.create('AccountPerformanceReportRequest')
report_request.Format = 'Csv'
report_request.ReportName = 'My Account Report'
report_request.Time = reporting_service_manager.service_client.factory.create('ReportTime')
report_request.Time.PredefinedTime = 'LastSevenDays'

# Download report
download_params = ReportingDownloadParameters(
    report_request=report_request,
    result_file_directory='/tmp/results',
    result_file_name='account_report.csv'
)

report_file_path = reporting_service_manager.download_file(download_params)
```

### REST SDK Reporting Manager

```python
from bingads.v13.reporting import ReportingServiceManager, ReportingDownloadParameters
from openapi_client.models.reporting.account_performance_report_request import AccountPerformanceReportRequest
from openapi_client.models.reporting.report_time import ReportTime
from openapi_client.models.reporting.report_time_period import ReportTimePeriod

# Create reporting service manager - no suds_options
reporting_service_manager = ReportingServiceManager(
    authorization_data=authorization_data,
    poll_interval_in_milliseconds=5000,
    environment='production',
    working_directory='/tmp/reports'
)

# Create report request using model classes
report_request = AccountPerformanceReportRequest(
    Format='Csv',
    ReportName='My Account Report',
    Time=ReportTime(
        PredefinedTime=ReportTimePeriod.LASTSEVENDAYS
    )
)

# Download report - same interface
download_params = ReportingDownloadParameters(
    report_request=report_request,
    result_file_directory='/tmp/results',
    result_file_name='account_report.csv'
)

report_file_path = reporting_service_manager.download_file(download_params)
```

### Using Factory for Compatibility

```python
# REST SDK - using factory for backwards compatibility
report_request = reporting_service_manager.service_client.factory.create('AccountPerformanceReportRequest')
report_request.Format = 'Csv'
report_request.ReportName = 'My Account Report'
report_request.Time = reporting_service_manager.service_client.factory.create('ReportTime')
report_request.Time.PredefinedTime = 'LastSevenDays'
```

### Alternative: Direct REST API Calls for Reporting

Similar to Bulk, you can use the ServiceClient directly for reporting operations with manual polling:

```python
from bingads.service_client import ServiceClient
from openapi_client.models.reporting import *
import time

# Create reporting service client
reporting_service = ServiceClient(
    service='ReportingService',
    version=13,
    authorization_data=authorization_data,
    environment=ENVIRONMENT
)

# Create report request
report_request = AccountPerformanceReportRequest(
    format=ReportFormat.TSV,
    report_name='My Account Performance Report',
    return_only_complete_data=False,
    aggregation=ReportAggregation.WEEKLY,
    scope=AccountReportScope(account_ids=[authorization_data.account_id]),
    time=ReportTime(predefined_time=ReportTimePeriod.YESTERDAY),
    columns=[
        AccountPerformanceReportColumn.TIMEPERIOD,
        AccountPerformanceReportColumn.ACCOUNTID,
        AccountPerformanceReportColumn.ACCOUNTNAME,
        AccountPerformanceReportColumn.CLICKS,
        AccountPerformanceReportColumn.IMPRESSIONS,
        AccountPerformanceReportColumn.CTR,
        AccountPerformanceReportColumn.AVERAGECPC,
        AccountPerformanceReportColumn.SPEND
    ]
)

# Submit report request
submit_request = SubmitGenerateReportRequest(report_request=report_request)
submit_response = reporting_service.submit_generate_report(
    submit_generate_report_request=submit_request
)

report_request_id = submit_response.report_request_id

# Poll for report status
wait_time = 10
for i in range(30):
    time.sleep(wait_time)
    
    poll_request = PollGenerateReportRequest(report_request_id=report_request_id)
    poll_response = reporting_service.poll_generate_report(
        poll_generate_report_request=poll_request
    )
    
    status = poll_response.report_request_status.status
    
    if status == ReportRequestStatusType.SUCCESS:
        result_file_url = poll_response.report_request_status.report_download_url
        # Download report from result_file_url
        break
    elif status == ReportRequestStatusType.ERROR:
        raise Exception("Report request failed")
```

> **When to use direct API calls**: Use this approach for async workflows, custom polling logic, or when you need access to intermediate status information.

## Common Migration Patterns

### Pattern 1: Service Client Creation

```python
# Before (SOAP)
from bingads.service_client import ServiceClient

campaign_service = ServiceClient(
    'CampaignManagementService',
    13,
    authorization_data,
    'production',
    timeout=30
)

# After (REST)
from bingads.service_client import ServiceClient

campaign_service = ServiceClient(
    'CampaignManagementService',
    13,
    authorization_data,
    'production'
)
```

### Pattern 2: Object Creation

```python
# Before (SOAP) - factory.create
campaign = campaign_service.factory.create('Campaign')
campaign.Name = "My Campaign"

# After (REST) - direct import and instantiation
from openapi_client.models.campaign.campaign import Campaign
campaign = Campaign(Name="My Campaign")

# Or using factory for compatibility
campaign = campaign_service.factory.create('Campaign')
campaign.Name = "My Campaign"
```

### Pattern 3: API Calls

```python
# Before (SOAP)
response = campaign_service.AddCampaigns(
    AccountId=account_id,
    Campaigns={'Campaign': [campaign]}
)

# After (REST) - create request object
from openapi_client.models.campaign.add_campaigns_request import AddCampaignsRequest

request = AddCampaignsRequest(
    AccountId=account_id,
    Campaigns=[campaign]
)
response = campaign_service.add_campaigns(request)
```

### Pattern 4: Response Handling

```python
# Before (SOAP)
campaigns = response.Campaigns.Campaign
for campaign in campaigns:
    print(f"Campaign ID: {campaign.Id}")

# After (REST)
campaigns = response.Campaigns
for campaign in campaigns:
    print(f"Campaign ID: {campaign.Id}")
```

### Pattern 5: Error Handling

```python
# Before (SOAP)
from suds.client import WebFault
try:
    response = campaign_service.AddCampaigns(request)
except WebFault as fault:
    print(fault.fault.faultstring)

# After (REST)
from openapi_client.exceptions import ApiException
try:
    response = campaign_service.add_campaigns(request)
except ApiException as ex:
    print(f"{ex.status}: {ex.reason}")
```

### Pattern 6: Enum Values

```python
# Before (SOAP)
campaign.BudgetType = campaign_service.factory.create('BudgetLimitType').DailyBudgetStandard

# After (REST)
from openapi_client.models.campaign.budget_limit_type import BudgetLimitType
campaign.BudgetType = BudgetLimitType.DAILYBUDGETSTANDARD
```

### Pattern 7: Arrays/Lists

```python
# Before (SOAP) - ArrayOf types
campaigns = campaign_service.factory.create('ArrayOfCampaign')
campaigns.Campaign.append(campaign)

# After (REST) - Python lists
campaigns = [campaign]
```

### Pattern 8: Nullable Fields

```python
# Before (SOAP) - explicitly set None
campaign.BudgetId = None

# After (REST) - Pydantic handles Optional fields
campaign.BudgetId = None  # Same, but type-checked
```

### Pattern 9: Model Serialization

```python
# REST SDK - Pydantic model serialization
from openapi_client.models.campaign.campaign import Campaign
import json

campaign = Campaign(Name="Test", DailyBudget=50)

# Convert to dictionary (all models have this method)
campaign_dict = campaign.to_dict()

# Create from dictionary (all models have this method)
campaign_from_dict = Campaign.from_dict(campaign_dict)

# Convert to JSON string using Pydantic's native method
campaign_json = campaign.model_dump_json(by_alias=True)

# Create from JSON string using Pydantic's native method
campaign_from_json = Campaign.model_validate_json(campaign_json)

# Alternative: Use json module with to_dict()
campaign_json_alt = json.dumps(campaign.to_dict())
campaign_from_json_alt = Campaign.from_dict(json.loads(campaign_json_alt))
```

> **Note**: Some polymorphic models (like `Ad`) have convenience methods `to_json()` and
> `from_json()`, but all models support `to_dict()`, `from_dict()`, and Pydantic's native
> `model_dump_json()` and `model_validate_json()` methods.

### Pattern 10: Response Headers

```python
# Before (SOAP)
response = campaign_service.GetCampaignsByAccountId(request)
tracking_id = campaign_service.get_response_header()['TrackingId']

# After (REST) - same interface
response = campaign_service.get_campaigns_by_account_id(request)
tracking_id = campaign_service.get_response_header()['TrackingId']
```

## Migration Checklist

Use this checklist to track your migration progress:

### Phase 1: Setup

- [ ] **Dependencies**: Update requirements.txt/setup.py to use REST SDK (`msads` instead of `bingads`)
- [ ] **Imports**: Update imports from `bingads.v13 import *` to `from openapi_client.models.campaign import *`
- [ ] **Remove SOAP imports**: Remove `from suds import WebFault` and related SOAP imports

### Phase 2: Code Changes

- [ ] **Service Clients**: Update ServiceClient instantiation (remove suds_options like `timeout`, `cache`)
- [ ] **Remove `set_elements_to_none()`**: Delete the helper function and all calls to it
- [ ] **Object Creation**: Replace `factory.create()` with direct model imports or use factory compatibility layer
- [ ] **Request Objects**: Create request model objects for API calls with `_request=` parameter pattern
- [ ] **Enum Values**: Update enum references to use REST SDK enum classes (UPPERCASE values)
- [ ] **Flag Enums**: Replace space-separated strings with bitwise OR operators (`Type1 | Type2`)
- [ ] **Array Types**: Replace `ArrayOf*` types and `['key']` access with Python lists
- [ ] **Response Access**: Update `response.Items['Item']` to `response.Items` direct access

### Phase 3: Error Handling

- [ ] **Exception Handling**: Replace `WebFault` catches with `ApiException` catches
- [ ] **Exception Imports**: Import from `openapi_client.exceptions` instead of `suds.client`

### Phase 4: Validation

- [ ] **Authentication**: Verify OAuth flows work (header format changes automatically)
- [ ] **Testing**: Run tests against sandbox environment
- [ ] **Production**: Deploy and monitor for issues

## Troubleshooting

### Common Migration Issues

#### Issue: "ModuleNotFoundError: No module named 'suds'"

**Solution**: This error indicates you're running the REST SDK. The REST SDK doesn't require suds. Update your import statements from:

```python
# Remove this
from suds import WebFault
```

#### Issue: "factory.create() returns unexpected type"

**Solution**: The REST SDK factory returns Pydantic models. Ensure you're accessing properties correctly. Both PascalCase and snake_case work.

#### Issue: "ApiException instead of WebFault"

**Solution**: Update your exception handling to catch `ApiException` and related classes from `openapi_client.exceptions`.

#### Issue: "Authorization header not working"

**Solution**: The REST SDK uses `Authorization: Bearer {token}` instead of `AuthenticationToken`. This is handled automatically by the SDK.

#### Issue: "Array of entities not serializing correctly"

**Solution**: In REST SDK, use Python lists directly instead of `ArrayOf*` types:

```python
# Wrong: campaigns.Campaign.append(campaign)
# Right: campaigns = [campaign]
```

#### Issue: "KeyError when accessing response arrays"

**Solution**: The REST SDK returns direct lists, not wrapped dictionaries:

```python
# Wrong (SOAP pattern): campaign_ids = response.CampaignIds['long']
# Right (REST pattern): campaign_ids = response.CampaignIds
```

#### Issue: "set_elements_to_none is not defined"

**Solution**: This helper function is no longer needed in REST SDK. Simply instantiate objects directly:

```python
# SOAP SDK (old)
campaign = set_elements_to_none(campaign_service.factory.create('Campaign'))

# REST SDK (new)
campaign = Campaign()
```

#### Issue: "Missing request parameter in method call"

**Solution**: REST SDK methods require keyword arguments with `_request` suffix:

```python
# Wrong: campaign_service.add_campaigns(request)
# Right: campaign_service.add_campaigns(add_campaigns_request=request)
```

#### Issue: "Enum value not found"

**Solution**: REST SDK enum values are typically UPPERCASE:

```python
# Wrong: BudgetLimitType.DailyBudgetStandard
# Right: BudgetLimitType.DAILYBUDGETSTANDARD
```
