---
title: Set up UET Tags Using WordPress.com
description: If you built your website on WordPress.com, read this article to learn how to set up UET tags on it.
ms.date: 05-30-2026
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Set up UET tags using WordPress.com

If you created and manage your website with WordPress.com, you can add and manage your UET tag there.

<!-- include: CONC_WordPressHelpReference (not found) -->

## Implementing UET using WordPress.com

Before completing the following steps at WordPress.com copy your Microsoft Advertising Universal Event Tracking (UET) tag ID. Select **Conversion Tracking** > **UET tags** and copy the tag ID.

1. Download the official Microsoft Advertising [UET plugin from WordPress.com](https://go.microsoft.com/fwlink/?linkid=2158781) as a zip file and upload it to your website within WordPress. Otherwise you can install the plugin directly from the WordPress plugins store.
1. Add a new plugin in your WordPress account.

   1. From the left menu, select **Dasboard** to go to your **Dashboard**.
   1. From the left menu, select **Plugins** > **Add New**.

      :::image type="content" source="media/BA_Conc_UET_Wordpress_AddPlugin.png" alt-text="Add the UET plugin in Wordpress.":::
1. Install the plugin.

   1. Select **Upload Plugin**.
   1. Select **Choose file** and select **Microsft-Advertising-UET-TagID.zip**
   1. Select **Install Now**.

      :::image type="content" source="media/BA_Conc_UET_Wordpress_InstallPlugin.png" alt-text="Install the UET plugin in Wordpress.":::
1. Activate the UET plugin in Wordpress

   1. Once the plugin is installed, select **Activate plugin** and follow the configuration instructions.

      :::image type="content" source="media/BA_Conc_UET_Wordpress_ActivatePlugin.png" alt-text="Activate the UET plugin in Wordpress.":::
1. Paste your UET Tag ID in the Microsoft Advertising UET Tag settings page in WordPress and select **Save**.

> [!NOTE]
> To validate that your Microsoft Advertising Universal Event Tracking (UET) tag is working in WordPress.com, download and install [UET Tag Helper](hlp_BA_CONC_UET_TagHelper.md). Go to your WordPress.com website and verify that a UET event is received and that the **Tag ID** matches the tag ID that you copied from Microsoft Advertising.

## Consent Mode support for WordPress sites

Microsoft Advertising supports Consent Mode through the WordPress Consent API. This lets your site adjust tracking behavior based on a visitor's consent choices. To get started, install the [WP Consent API plugin on your WordPress site](https://wordpress.org/plugins/wp-consent-api/).

> [!NOTE]
> Consent is required for traffic coming from the European Economic Area (EEA). [Learn more about consent requirements and supported scenarios](hlp_BA_CONC_UET_Consent.md).
