---
title: Making Bulk Changes to Your Properties
description: Learn how to make bulk changes in Property Center.
ms.date: 5/30/2026
ms.service: msa-help
ms.subservice: msa-audience-display-video
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Making bulk changes to your properties

You can update your bids, bid multipliers, and property group associations in bulk via CSV upload. You can also make bulk changes to your property group bids in the **Property groups** page. See [Make bulk changes to property group bids](#make-bulk-changes-to-property-group-bids) for more information.

## Make bulk changes using a CSV upload

1. From the navigation menu on the left, select **Tools** > **Bulk actions** > **Bulk uploads**.
1. Download and edit a CSV list of your campaigns, ad group, and/or property groups.
1. Prepare your spreadsheet.
1. Select **Tools** > **Bulk actions** > **Bulk uploads** > **Uploads**.
1. Select **Browse** to locate your updated spreadsheet.
1. Select **Upload and preview** > **Apply changes**.

> [!NOTE]
> When preparing your spreadsheet, the **FormatVersion** row and **Name** column should not be altered.

| I want to bulk edit... | Columns required |
| --- | --- |
| **Campaign bid strategy** | Type, Account ID, ID, Bid strategy type<br>Supported Bid strategy type values are: **PercentCpc** or **ManualCpc**.<br>Use PercentCpc to pay a percentage of the room price, per click (in this case, you must use the **Bid strategy PercentMaxCpc** column to set an upper limit to your bid) or ManualCpc if you want to set a fixed bid per night, per click. |
| **Ad group bid multipliers** | Type, Account ID, ID, Parent ID, Bid adjustment; also required are one or more bid multiplier columns documented below<br>Use a negative ID to add a new criterion.<br>Parent IC is the Ad group ID.<br>Set type to: **Ad group advance booking window criterion**. Add the following columns: **Min target value** (e.g., 30), **Max target value** (e.g., 60).<br>Set type to: **Ad group check in date criterion**. Add the following columns: **Min target value** (e.g., 07/01/2024 00:00:00), **Max target value** (e.g., 07/31/2024 00:00:00).<br>Set type to: **Ad group check in day criterion**. Add the following columns: **Target** (Monday … Sunday).<br>Set type to: **Ad group deviceOS criterion**. Add the following columns: **Target** (Computers, Smartphones, Tablets).<br>Set type to: **Ad group hotel date selection type criterion**. Add the following columns: **Target** (DefaultSelection, UserSelection).<br>Set type to: **Ad group length of stay criterion**. Add the following columns: **Min target value** (e.g., 3), **Max target value** (e.g., 14). |
| **Property group bids** | Type, Account ID, ID, Parent ID, Sub type, Parent criterion ID, Is excluded, Bid or Percent bid, Hotel attribute, Hotel attribute value<br>**Parent ID** is the **Ad Group ID**.<br>**Sub type** accepts values **Subdivision** ("All properties" node) or **Unit** (the individual node, depending on the filter in use; for example, an individual property identified by its ID).<br>Set **Is excluded** to FALSE or TRUE, whether the Property group is enabled to excluded.<br>Use **Bid** to set a value for fixed bids or **Percent bid** to set a value for percentage (of room price) bids.<br>**Hotel attribute** identified the filter in use (e.g., HotelID).<br>Leave **Hotel attribute value** empty for the "Everything else" node. |

| Column(s) | Description |
| --- | --- |
| **Type** | Defines the type of update being made.<br>Possible values include: Campaign, Campaign deviceOS criterion, Ad group, Ad group hotel listing group. |
| **Name** | Used by the FormatVersion row only, do not edit. |
| **Account ID** | Your Microsoft Advertising account ID. |
| **ID** | The ID of the entity being updated.<br>Use a negative ID to add new entity. |
| **Parent ID** | The ID of the direct parent entity. For Ad group bid multipliers updates, this is the Ad group ID. |
| **Percent bid** | Use this field to set a value for percentage bids at Hotel listing (property) group level.<br>Up to two decimal points of precision are supported; for example, 8.25 represents 8.25% if your bid type is percentage. |
| **Bid** | Use this field to set a value for fixed bids at Hotel listing (property) group level. up to two decimal points of precision are supported.<br>Up to two decimal points of precision are supported; for example, 8.25 if your bid type is fixed. |
| **Type: **Ad group deviceOS criterion**. Add the following columns: **Target** (supported values: **Computers**, **Smartphones**, **Tablets**)** | Adjust your bids based on the device the searcher is using.<br>- To increase a device's bid by 6%, you would enter 6 in the Bid adjustment column.<br>- To decrease a device's bid by 8%, you would enter -8 in the Bid adjustment column. |
| **Type: **Ad group check in day criterion**. Add the following columns: **Target** (supported values: **Monday** … **Sunday**)** | Adjust your bids based on the day of check in at the property.<br>- To increase a day's bid by 20%, you would enter 20 in the Bid adjustment column.<br>- To decrease a day's bid by 15%, you would enter -15 in the Bid adjustment column. |
| **Type: **Ad group length of stay criterion**. Add the following columns: **Min target value** (e.g., 3), **Max target value** (e.g., 14)** | Adjust your bids based on how many nights are included in the reservation. This multiplier applies to all lengths of stay greater than or equal to the one currently being specified (up to a maximum of 14).<br>For example, to increase bids by 10% for lengths of stay between 3 and 14 nights, you would set the Min target value to 3 and the Max target value to 14, and set the Bid adjustment to 10. |
| **Type: **Ad group advance booking window criterion**. Add the following columns: **Min target value** (e.g., 30), **Max target value** (e.g., 60)** | Adjust your bids based on how many days in advance the reservation is being made, also known as advanced booking window (ABW). The min days column specifies the minimum number of days in the ABW range to apply the multiplier to. The corresponding Bid adjustment column defines the multiplier factor.<br>For example, to increase bids by 7% for stays between 30 and 60 days in the future, you would set the Min target value to 30 and the Max target value to 60, and set the Bid Adjustment to 7.<br>The maximum ABW allowed is 180 days. |
| **Type: **Ad group hotel date selection type criterion**. Add the following columns: **Target** (supported values: **DefaultSelection**, **UserSelection**)** | Adjust your bids based on the type of date of check in at the property.<br>- To increase bid for default check in date by 10%, you would enter 10 in the Bid adjustment column and set the Target to "DefaultSelection".<br>- To decrease bid for user check in selected date by 5%, you would enter -5 in the Bid adjustment column and set the Target to "UserSelection". |
| **Type: **Ad group check in date criterion**. Add the following columns: **Min target value** (e.g., 07/01/2024  00:00:00), **Max target value** (e.g., 07/31/2024 00:00:00)** | Adjust your bids based on the check in and check out dates at the property.<br>- To increase bid for the selected period by 5%, you would enter 5 in the Bid adjustment column and set the Min target value to the earliest check-in date (e.g., 07/01/2024 00:00:00) and Max target value to the latest check-out date (e.g., 07/31/2024 00:00:00) for which you want to apply the multiplier. |

> [!NOTE]
> To delete a bid multiplier, use "delete_value" where you normally specify the multiplier's value.

<a id="BulkBids"></a>

## Make bulk changes to property group bids

You can update your property group bids in bulk in the **Property groups** page at the account, campaign, or ad group levels:

1. From the navigation menu on the left, hover over **Campaigns** and select **Property groups**.

   > [!NOTE]
   > From the table, you can view property groups across your entire account, campaign, or ad group.
1. Select the checkbox next to property groups you want to update.
1. Select **Edit**.
1. Select **Change bids** or **Change bids by percent**.
1. If you selected **Change bids**, enter the new bid amount. If you selected **Change bids by percent**, choose whether you want to increase or decrease your current bids from the **Action** dropdown menu.
1. If you selected **Change bids by percent**, enter a percent.
1. Select **Save**.
