---
title: Migrate to REST API
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 3/23/2026
description: Various ways to migrate to the REST API.
---

# Migrate to REST API

> [!IMPORTANT]
> Microsoft Advertising is transitioning from the legacy SOAP API to the REST API.  
>
> Starting **October 1, 2026**, all new Microsoft Advertising API features and enhancements will be available **only** through the REST API. Existing SOAP integrations will continue to run during a **6‑month migration window**. The SOAP API is scheduled for **full deprecation on January 31, 2027**.  
>
> To avoid any impact to your API access, we recommend migrating to the REST API before October 1, 2026. SDK and non‑SDK migration guides are available. If you need additional time due to integration complexity or scale, contact Microsoft Advertising support to discuss an extended migration plan.  

## .NET SDK

If you are using a version of BingAds .NET SDK lower than 13.0.22, please [Upgrade to latest Bing Ads .NET SDK](upgrade-csharp-sdk.md).

## Java SDK

If you are using a version of BingAds Java SDK lower than 13.0.22, please [Upgrade to latest Bing Ads Java SDK](upgrade-java-sdk.md).

## Python SDK

If you are using any version of the `bingads` package, please [Upgrade to new msads package](python-sdk-migration-soap-to-rest.md).

## PHP SDK

If you are using any version of the `bingads` package, please [Upgrade to new msads package](php-sdk-migration-soap-to-rest.md).

## No SDK

If you are accessing SOAP API directly without using an SDK, please update your code to call the API using REST API URLs and request format. Please use the API reference documentation to find REST API URLs and request examples for each API method used by your code.

---

## Microsoft Advertising API transition: SOAP to REST

Microsoft Advertising is transitioning its API platform from **SOAP** to **REST** to provide a more modern and efficient integration experience.

### What’s changing

- REST APIs are becoming the standard foundation for all future Microsoft Advertising API development.
- Existing SOAP integrations will continue to work during the transition period with no immediate impact.
- New API feature enhancements will be available **only through REST** starting **October 1, 2026**.
- The SOAP API is scheduled for **full deprecation on January 31, 2027**.
- Customers have **6 months from this announcement** to begin migrating from SOAP to REST.
- Customers with complex or large‑scale integrations can request an extended migration timeline through Microsoft Advertising support or their account team.

### Why move to the REST API

- Ongoing access to new API features and capabilities
- Strong SDK support
- Modern HTTP/JSON architecture
- Simplified integration and debugging
- Broad programming language support
- Smaller payloads with HTTP compression, reducing latency and traffic

### How to get started

- **SDK users**: Follow the SDK migration guides above to transition from SOAP to REST.
- **Non‑SDK users**: Update integrations to use REST endpoints and request formats in the API reference documentation.
- If you’re not currently using an SDK, migrating is a good opportunity to adopt one to simplify future updates.
