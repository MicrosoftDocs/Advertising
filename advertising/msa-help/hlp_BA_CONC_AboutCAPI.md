---
title: Where Can I Find Information About the Conversions API (CAPI)?
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn about resources for the Conversions API (CAPI).
---

# Where can I find information about the Conversions API (CAPI)?

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry—it's coming soon!

> [!IMPORTANT]
> For more information, see the [CAPI guide.](https://learn.microsoft.com/advertising/guides/uet-conversion-api-integration).

The Microsoft Advertising Conversions API (CAPI) enables advertisers to send conversion and engagement events directly from their servers using Universal Event Tracking (UET). By moving conversion tracking server-side, CAPI helps ensure more reliable measurement when browser restrictions, privacy controls, or ad blockers limit client-side tracking. It supports key business actions such as purchases, subscriptions, and custom goals, improving attribution accuracy and campaign optimization across web and app environments.

UET is Microsoft Advertising's core tracking framework and powers conversion measurement, remarketing, automated bidding, and audience insights. While most advertisers use the standard UET JavaScript tag for ease of implementation and advanced features, the Conversions API provides an alternative or complementary option for scenarios where JavaScript cannot be used. With CAPI, event data is sent directly from backend systems, while a lightweight client-side ID sync pixel is used to connect customer identifiers with Microsoft IDs for remarketing and cross-context attribution.

A complete CAPI implementation consists of two data flows: server-to-server UET events and client-side ID synchronization. Page load events are sent for every page view or single-page application navigation, and optional custom events capture richer user actions such as cart views or purchases. These events can include revenue, product details, vertical-specific data (for retail or hotels), and user signals such as click IDs, hashed identifiers, and consent status. Events are delivered in real time to Microsoft's endpoint using authenticated JSON requests and can be sent individually or in batches.

To maximize measurement quality, advertisers should consistently send visitor IDs, the most recent Microsoft Click ID (msclkid), and, when available, hashed email and phone data. Proper linkage between page load and custom events, accurate consent signaling, and optional support for restating or retracting conversions help ensure clean, compliant reporting. While CAPI requires more engineering effort than UET JavaScript, it offers greater control, resilience to browser changes, and a future-ready approach to conversion tracking.
