---
title: Data Clean Room
ms.service: bing-ads
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Data clean room integration is a cutting-edge initiative by Microsoft Advertising, designed to empower enterprise customers with secure, privacy-compliant data collaboration capabilities.
---
# Data Clean Room

Data clean room integration is a cutting-edge initiative by Microsoft Advertising, designed to empower enterprise customers with secure, privacy-compliant data collaboration capabilities. Developed in partnership with LiveRamp (formerly Habu Clean Room), this solution enables advertisers to seamlessly combine their first-party data with Microsoft’s proprietary signals, including Search and Audience impressions from MSAP, within a protected data clean room environment.  

By leveraging Spark SQL queries, advertisers and agencies can generate advanced cross-platform measurement reports and build custom audiences for activation via the MSAP Customer Match API. The data clean room ensures that all data processing occurs in a privacy-safe context, with outputs delivered in aggregate to safeguard user-level information.  

This integration supports a wide range of use cases, including audience insights, measurement, and audience activation.  

| Interface                       | Description                                                        |
|---------------------------------|--------------------------------------------------------------------|
| [Exposure feed](./exposure-feed.md)| This dataset provides granular, pseudonymized event-level data to support ad measurement and analysis in a privacy-compliant data clean room environment.|
| [Audience segments](./audience-segments.md)| This dataset identifies and categorizes users into Microsoft Advertising's audience segments, using hashed identifiers to preserve privacy while enabling audience targeting and analytics.|
| [Metadata](./metadata.md)|This dataset captures the structural elements of advertising campaigns within Microsoft Advertising, which is useful for mapping campaign strategy and performance over time.|
