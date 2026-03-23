---
title: Python SDK SOAP to REST Migration Skill
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 3/23/2026
description: This skill guides AI assistants through migrating Bing Ads Python SDK code from the legacy SOAP-based implementation (`bingads`) to the new REST API-based implementation (`msads`).
dev_langs:
  - python
---
# Bing Ads Python SDK SOAP to REST Migration Skill

This skill guides AI assistants through migrating Bing Ads Python SDK code from the legacy SOAP-based implementation (`bingads`) to the new REST API-based implementation (`msads`).

## Overview

When users ask to migrate Bing Ads Python code from SOAP to REST, or when you encounter code using the SOAP SDK patterns, use this guide to perform the transformation.

## Detection Patterns

Identify SOAP SDK code by these characteristics:

- Imports from `suds` or `from suds import WebFault`
- Uses `factory.create()` pattern for object creation
- Uses `set_elements_to_none()` helper function
- Response access patterns like `response.CampaignIds['long']`
- Namespace prefixes like `ns3:ArrayOfstring`
- Exception handling with `WebFault`

## Transformation Rules

### 1. Package Installation

```bash
# SOAP SDK (Legacy)
pip install bingads

# REST SDK (New)
pip install msads
```

### 2. Import Transformations

```text
SOAP → REST

from suds import WebFault                         → (remove - not needed)
from bingads.v13 import *                         → from openapi_client.models.campaign import *
from bingads.v13.bulk import *                    → from openapi_client.models.bulk import *
from bingads.v13.reporting import *               → from openapi_client.models.reporting import *
(add for REST)                                    → from openapi_client.exceptions import ApiException
from time import gmtime, strftime                 → from datetime import datetime
                                                  → import uuid
```

### 3. Object Creation Transformations

```python
# SOAP SDK
campaign = set_elements_to_none(campaign_service.factory.create('Campaign'))
campaign.Name = "My Campaign"
campaign.BudgetType = campaign_service.factory.create('BudgetLimitType').DailyBudgetStandard

# REST SDK
from openapi_client.models.campaign import Campaign, BudgetLimitType
campaign = Campaign(
    name="My Campaign",
    budget_type=BudgetLimitType.DAILYBUDGETSTANDARD
)
```

### 4. Remove `set_elements_to_none()` Pattern

The `set_elements_to_none()` helper function is no longer needed. Remove:

- The function definition itself
- All calls to the function

```python
# SOAP SDK (remove entire function)
def set_elements_to_none(suds_object):
    for (element) in suds_object:
        suds_object.__setitem__(element[0], None)
    return suds_object

# SOAP: campaign = set_elements_to_none(campaign_service.factory.create('Campaign'))
# REST: campaign = Campaign()
```

### 5. Array/List Transformations

```python
# SOAP SDK - ArrayOf types
campaigns = campaign_service.factory.create('ArrayOfCampaign')
campaigns.Campaign.append(campaign)

languages = campaign_service.factory.create('ns3:ArrayOfstring')
languages.string.append('All')

# REST SDK - Python lists directly
campaigns = [campaign]
languages = ['All']
```

### 6. API Call Transformations

```python
# SOAP SDK - Direct method call with kwargs
response = campaign_service.AddCampaigns(
    AccountId=account_id,
    Campaigns=campaigns
)

# REST SDK - Request object with keyword argument
from openapi_client.models.campaign import AddCampaignsRequest
request = AddCampaignsRequest(
    account_id=account_id,
    campaigns=campaigns
)
response = campaign_service.add_campaigns(add_campaigns_request=request)
```

### 7. Response Access Transformations

```python
# SOAP SDK - Dictionary access
campaign_ids = response.CampaignIds['long']
campaigns = response.Campaigns['Campaign']
accounts = response['AdvertiserAccount']

# REST SDK - Direct access
campaign_ids = response.CampaignIds
campaigns = response.Campaigns  # or response.campaigns
accounts = response.accounts
```

### 8. Enum Transformations

```python
# SOAP SDK
campaign.BudgetType = campaign_service.factory.create('BudgetLimitType').DailyBudgetStandard

# REST SDK - Import enum class, use UPPERCASE value
from openapi_client.models.campaign import BudgetLimitType
campaign.BudgetType = BudgetLimitType.DAILYBUDGETSTANDARD
```

### 9. Flag Enum Combinations

```python
# SOAP SDK - Space-separated string
conversion_goal_types = 'AppInstall Duration Event PagesViewedPerVisit Url'

# REST SDK - Bitwise OR
from openapi_client.models.campaign import ConversionGoalType
conversion_goal_types = (
    ConversionGoalType.APPINSTALL |
    ConversionGoalType.DURATION |
    ConversionGoalType.EVENT |
    ConversionGoalType.PAGESVIEWEDPERVISIT |
    ConversionGoalType.URL
)
```

### 10. Exception Handling Transformations

```python
# SOAP SDK
from suds.client import WebFault
try:
    response = campaign_service.AddCampaigns(request)
except WebFault as fault:
    print(fault.fault.faultstring)

# REST SDK
from openapi_client.exceptions import ApiException
try:
    response = campaign_service.add_campaigns(add_campaigns_request=request)
except ApiException as ex:
    print(f"{ex.status}: {ex.reason}")
    print(f"Body: {ex.body}")
```

### 11. Predicate and Paging Objects

```python
# SOAP SDK - With namespace prefixes
paging = customer_service.factory.create('ns5:Paging')
paging.Index = 0
paging.Size = 100

predicates = {
    'Predicate': [{
        'Field': 'UserId',
        'Operator': 'Equals',
        'Value': user_id,
    }]
}

# REST SDK - Direct import, no namespace
from openapi_client.models.customer import Paging, Predicate, PredicateOperator
paging = Paging(index=0, size=100)
predicate = Predicate(
    field="UserId",
    operator=PredicateOperator.EQUALS,
    value=str(user_id)
)
```

### 12. ServiceClient Instantiation

```python
# SOAP SDK - With suds options
campaign_service = ServiceClient(
    service='CampaignManagementService',
    version=13,
    authorization_data=authorization_data,
    environment=ENVIRONMENT,
    timeout=60,   # Remove this
    cache=None    # Remove this
)

# REST SDK - No suds options
campaign_service = ServiceClient(
    service='CampaignManagementService',
    version=13,
    authorization_data=authorization_data,
    environment=ENVIRONMENT
)
```

## Complete Migration Checklist

When migrating code, ensure you:

1. [ ] Update package: Replace `bingads` with `msads` (`pip install msads`)
2. [ ] Update imports (remove suds, add openapi_client.models)
3. [ ] Remove `set_elements_to_none()` function and all calls
4. [ ] Replace `factory.create()` with direct model instantiation
5. [ ] Replace ArrayOf* types with Python lists
6. [ ] Update response access patterns (remove `['key']` access)
7. [ ] Create request objects for API calls
8. [ ] Update method calls to use keyword arguments with `_request` suffix
9. [ ] Update enum values to UPPERCASE
10. [ ] Replace space-separated enum strings with bitwise OR
11. [ ] Update exception handling from WebFault to ApiException
12. [ ] Remove suds_options from ServiceClient constructors

## Example Full File Migration

### Before (SOAP SDK)

```python
from auth_helper import *
from suds import WebFault
from bingads.service_client import ServiceClient
from bingads.v13 import *
from time import gmtime, strftime

def main(authorization_data):
    try:
        campaigns = campaign_service.factory.create('ArrayOfCampaign')
        campaign = set_elements_to_none(campaign_service.factory.create('Campaign'))
        campaign.BudgetType = 'DailyBudgetStandard'
        campaign.DailyBudget = 50
        languages = campaign_service.factory.create('ns3:ArrayOfstring')
        languages.string.append('All')
        campaign.Languages = languages
        campaign.Name = "Campaign " + strftime("%a, %d %b %Y %H:%M:%S +0000", gmtime())
        campaigns.Campaign.append(campaign)

        response = campaign_service.AddCampaigns(
            AccountId=authorization_data.account_id,
            Campaigns=campaigns
        )
        campaign_ids = response.CampaignIds['long']
        
    except WebFault as ex:
        print(ex.fault.faultstring)

if __name__ == '__main__':
    authorization_data = AuthorizationData(...)
    campaign_service = ServiceClient(
        service='CampaignManagementService',
        version=13,
        authorization_data=authorization_data,
        environment=ENVIRONMENT,
        timeout=60
    )
    authenticate(authorization_data)
    main(authorization_data)
```

### After (REST SDK)

```python
from auth_helper import *
from bingads.service_client import ServiceClient
from openapi_client.models.campaign import *
from openapi_client.exceptions import ApiException
from datetime import datetime
import uuid

def main(authorization_data):
    try:
        campaign = Campaign(
            budget_type=BudgetLimitType.DAILYBUDGETSTANDARD,
            daily_budget=50,
            languages=['All'],
            name=f"Campaign_{uuid.uuid4()}"
        )

        request = AddCampaignsRequest(
            account_id=authorization_data.account_id,
            campaigns=[campaign]
        )
        response = campaign_service.add_campaigns(add_campaigns_request=request)
        campaign_ids = response.CampaignIds
        
    except ApiException as ex:
        print(f"{ex.status}: {ex.reason}")

if __name__ == '__main__':
    authorization_data = AuthorizationData(...)
    campaign_service = ServiceClient(
        service='CampaignManagementService',
        version=13,
        authorization_data=authorization_data,
        environment=ENVIRONMENT
    )
    authenticate(authorization_data)
    main(authorization_data)
```

## Reference Documentation

For complete migration guide with more examples, see:

- [`BingAdsApiSDK/Python-Rest-MigrationGuide.md`](../BingAdsApiSDK/Python-Rest-MigrationGuide.md)
- SOAP Examples: [`BingAdsApiSDK/python/examples/v13/`](../BingAdsApiSDK/python/examples/v13/)
- REST Examples: [`BingAdsApiSDK/python_rest/examples/v13/`](../BingAdsApiSDK/python_rest/examples/v13/)
