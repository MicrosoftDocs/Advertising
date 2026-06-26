---
title: Make your store Universal Commerce Protocol (UCP) ready
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how to configure your store for UCP readiness.
---

# Make your store Universal Commerce Protocol (UCP) ready

This article explains store settings and product attributes in Microsoft Merchant Center that support UCP readiness for agentic commerce.

## Return policy

Your return policy explains how customers can return items purchased from your store. To configure this setting, you must include a return policy URL, a return window (number of days, lifetime, or no returns), and any applicable restocking fee.

If some products follow different return terms, such as clearance or final-sale items, you can create one exception policy. Assign it an exception label, and then update your product feed with the matching "return_policy_label" so the exception applies only to those products.

- **Where to set it**

  Go to **Store settings** > **UCP settings** > **Return policy**, then enable the policy.

- **Required information**

  - Return policy URL
  - Return window (no returns, number of days, or lifetime)
  - Restocking fee (no fee, fixed amount or percentage)

- **Optional: Exception policy**

  If some products follow different return rules, you can define one exception policy. Update the attribute in your product feed with this exception label—return_policy_labels—so the different return policy applies to those products.

  > [!NOTE]
  > There is a maximum of 50 characters per string.

## Customer support

Provide customer support information so customers know who to contact about orders or issues. At a minimum, include a customer service URL that links to your contact page or help center.

You can also optionally add a support email address, phone number, and indicate whether live chat or chatbot support is available.

- **Where to set it**

  Go to **Store settings** > **UCP settings** > **Customer support**, then enable it.

- **Required**

  Customer service URL (for example, a contact form or help center)

- **Optional**

  - Support email address
  - Phone number
  - Live chat availability
  - Chatbot availability
  - Preferred method of contact

## Product warnings

Product warnings are required for products with regulatory disclosure requirements. These warnings inform customers about safety, legal, health, or environmental considerations before purchase.

For each warning, specify a message type (such as safety or legal) and message content (the text shown to customers).

Add the following fields to your product feed:

| Field | Purpose | Requirements |
| --- | --- | --- |
| **consumer_message_type** | Category of warning (for example, safety, legal, health, or environmental) | Enum (e.g., legal_disclaimer, safety_warning, prop_65) |
| **consumer_message_content** | Warning text shown to customers | - Max of 1,000 characters per string<br>- Accepted HTML tags: `<b>,<br>, <i>, and <a href>` |
