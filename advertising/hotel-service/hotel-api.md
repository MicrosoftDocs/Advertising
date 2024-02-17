---
title: "Hotel API"
description: Overview of the Hotel API, which you use to manage your lodging campaigns (formerly hotel campaigns) in Microsoft Advertising.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
---

# Hotel API

> [!NOTE]
> This beta release of Hotel Price Ads is available to select participants only. For information about participating in the beta release program, please contact your account manager or [enroll here](https://go.microsoft.com/fwlink/?linkid=2201950).
>
> The API and documentation are subject to change.

The Hotel API lets you manage your hotel ad campaigns and bidding.

<a name="thebasics"></a>

## The basics...

When you get access to Hotel Price Ads, the service sets up a default subaccount and hotel group that contains the hotels from your hotel feed. The subaccount provides the top-level logical organization of your hotel price ads. You can think of it as a lodging campaign (formerly hotel campaigns). You may have multiple subaccounts.

A subaccount specifies the campaign's daily budget, maximum bid allowed, and default bid and bid multipliers for ads that don't specify bids or multipliers.

Hotel groups provide another level for you to logically group hotel price ads. A hotel group belongs to a single subaccount. The default hotel group that the service creates for you is named, Ungrouped. It contains all hotels from the initial hotel feed and all new hotels going forward. 
 
A hotel group specifies the default bid and bid multipliers for ads that don't specify bids or multipliers. If you don't specify bids and multipliers, the group inherits them from the subaccount.

After you have your subaccount and hotel group set up, you can begin importing your hotel feed data. For information, see [Do you have your hotel feed set up?](../hotel-service/get-started.md#feeds)

Hotels belong to a single hotel group. Hotels specify the bid and bid multipliers to use for the hotel ad. If you don't specify bids and multipliers, the hotel inherits them from the hotel group or subaccount, in that order.

For information about moving the hotel to a different hotel group, see [Associating hotels with hotel groups](../hotel-service/manage-hotel-campaigns.md#associatinghotels).


## What needs to be in place before I start?

You'll need credentials and your hotel feeds set up. For information, see [Getting Started](../hotel-service/get-started.md).

Your account manager also needs to enable your account to use Hotel Price Ads in both the production and sandbox environments.


## How do I manage my resources?

The following sections show how to manage your subaccounts, hotel groups, and hotels. For information about the endpoints, header, query parameters, and resources, see [Hotel API Reference](../hotel-service/reference.md).

|Topic|Description
|-|-
|[Working with subaccounts](../hotel-service/manage-hotel-campaigns.md#workingwithsubaccounts)|Provides information about listing your subaccounts, getting a single subaccount, and updating a subaccount.
|[Working with hotel groups](../hotel-service/manage-hotel-campaigns.md#workingwithhotelgroups)|Provides information about listing a subaccount's hotel groups, getting a single hotel group, adding a hotel group, and updating a hotel group.
|[Working with hotels](../hotel-service/manage-hotel-campaigns.md#workingwithhotels)|Provides information about listing all hotels in the subaccount, listing hotels in a hotel group, getting a single hotel from a hotel group, and updating a hotel.
|[Associating a hotel with a hotel group](../hotel-service/manage-hotel-campaigns.md#associatinghotels)|Provides information about how to associate a hotel with a hotel group.

For code examples, see [Examples](../hotel-service/code-examples.md).


