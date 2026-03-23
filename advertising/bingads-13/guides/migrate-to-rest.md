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

## .NET SDK

If you are using a version of BingAds .NET SDK lower than 13.0.22, please [Upgrade to latest Bing Ads .NET SDK](upgrade-csharp-sdk.md).

## Java SDK

If you are using a version of BingAds Java SDK lower than 13.0.22, please [Upgrade to latest Bing Ads Java SDK](upgrade-java-sdk.md).

## Python SDK

If you are using any version of the `bingads` package, please [Upgrade to new msads package](python-sdk-migration-soap-to-rest.md)

## PHP SDK

If you are using any version of the `bingads` package, please [Upgrade to new msads package](php-sdk-migration-soap-to-rest.md)

## No SDK

If you are accessing SOAP API directly without using an SDK, please update your code to call the API using REST API URLs and request format. Please use the API reference documentation to find REST API URLs and request examples for each API method used by your code.
