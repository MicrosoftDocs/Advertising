---
title: UET technical safeguards for sensitive data
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how Universal Event Tracking (UET) uses multiple layers of filtering, scrubbing, and governance to help prevent sensitive data from entering personalization or targeting workflows.
---

# UET technical safeguards for sensitive data

UET uses multiple layers of filtering, scrubbing, and governance to help prevent sensitive data from entering personalization or targeting workflows.

## Sensitive domain and compliance controls

UET combines curated lists, machine-learning classifiers, and compliance safeguards to block health-related or personally identifiable information (PII/PHI) from being processed.

- **Domain and URL classification**

  - A machine-learning classifier identifies healthcare and pharmaceutical domains. Events from these domains are excluded from personalization.
  - If an advertiser selects the Healthcare/Pharma vertical during setup, remarketing and audience features are automatically turned off.

- **Compliance enforcement**

  - A dedicated HIPAA filter flags and removes events connected to health-related content.
  - A domain blacklist provides an additional layer of protection to ensure events from sensitive sites don't enter personalization workflows.

## Sensitive data filters

The UET pipeline applies advanced scrubbing methods, including regex-based and machine-learning models, to remove sensitive data such as:

- Email addresses
- Credit card numbers
- Social Security numbers
- Dates of birth
- Usernames
- Home addresses

These scrubbers run at scale and are continuously updated to cover new patterns and edge cases.

## Data governance and retention

- Health-related UET events are kept only for a short compliance window before they're removed.
- UET integrates with Microsoft privacy tools to support GDPR, CCPA, and other data rights processes.
- When a deletion request is submitted, relevant historical data is scrubbed within a defined timeframe.
- All scrubbing logic is version-controlled and reviewed regularly to maintain compliance.

## Advertiser responsibilities

Advertisers play a key role in maintaining compliance and protecting user privacy.

- **Avoid PHI/PII in custom parameters**

  Do not include any personally identifiable information (PII) or protected health information (PHI) in custom parameters.

- **Restrict UET on HIPAA-covered pages**

  Do not place UET tags on pages subject to HIPAA regulations.

- **Implement consent management**

  - Use consent management solutions where required, including support for the Transparency and Consent Framework (TCF).
  - Proper integration with consent management platforms is essential for compliance.

- **Validate tags**

  Use available validation tools to confirm that tags are implemented correctly and meet compliance requirements.

## Exception: enhanced conversions

- For attribution, advertisers may send hashed email addresses (HEM) and hashed phone numbers with UET events.
- These identifiers are used only for estimated conversion modeling and attribution, not for personalization.

## Microsoft HIPAA disclaimer

> [!NOTE]
> - Microsoft does not intend to receive or process private communications or Protected Health Information (PHI) through UET.
> - UET includes safeguards to prevent PHI ingestion, but advertisers are responsible for ensuring they don't send PHI or PII.
> - Microsoft does not offer Business Associate Agreements (BAAs) for UET and does not represent that UET meets HIPAA requirements.
> - Advertisers subject to HIPAA must not use UET in ways that could expose Microsoft to PHI.
