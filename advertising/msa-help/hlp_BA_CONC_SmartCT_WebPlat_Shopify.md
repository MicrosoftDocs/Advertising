---
title: Smart campaigns - Set up tracking tags using Shopify
ms.service: msa-help
ms.subservice: msa-ads-extensions
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: If you built your website on Shopify, read this article to learn how to set up tracking tags on it.
---

# Smart campaigns - Set up tracking tags using Shopify

> [!NOTE]
> - This article shows how to set up tracking tags for Smart campaigns using Shopify. Please refer to the [Shopify Help Center](https://go.microsoft.com/fwlink/?linkid=2010843) for more information.
> - Microsoft Advertising is not responsible for Shopify's processes or documentation, nor for changes made to Shopify's processes or documentation.
> - By installing the Microsoft Advertising app for Shopify, tracking tags are automatically created and added to every page of your website. Go to the [Install an app](https://go.microsoft.com/fwlink/?linkid=2109447) page and follow the prompts to get your Microsoft Advertising app for Shopify set up.

If you created and manage your website with Shopify, you can add and manage your tracking tag there.

## Implementing tracking tags using Shopify

1. From the navigation menu on the left, hover over **Campaigns** and select **Campaigns** > **Campaign details** for the campaign you want to edit.
1. Select **Customer action tracking** > **View tracking tag** and copy your tracking tag.
1. Sign in to your Shopify account.

   1. Select **Online Store** > **Themes**.
   1. Under Current theme, select **Actions** > **Edit code**.

      :::image type="content" source="media/BA_Conc_UET_Shopify_EditCode.png" alt-text="Edit code in the themes section of Shopify.":::
1. Install the tracking tag.

   1. Under **Layout**, select **theme.liquid**. <br>

      :::image type="content" source="media/BA_Conc_UET_Shopify_ThemeLiquid.png" alt-text="Select theme.liquid.":::
   1. Scroll down the page until you are at the *<head>* tag.

      :::image type="content" source="media/BA_Conc_UET_Shopify_HeadTag.png" alt-text="Scroll to the head tag.":::
   1. Paste the tracking tag directly above **{{ content_for_header }}**.
   1. Select **Save**.

      :::image type="content" source="media/BA_Conc_UET_Shopify_ContentForHeader.png" alt-text="Paste tracking tag above content for header.":::
1. Customize your online checkout process.

   1. From the bottom of the left menu, select **Settings**.
   1. Select **Checkout**.

      :::image type="content" source="media/BA_Conc_UET_Shopify_Checkout.png" alt-text="Select Settings > Checkout.":::
   1. Scroll down to the **Additional scripts** field. Paste the tracking tag in **Additional scripts**.

      :::image type="content" source="media/BA_Conc_UET_Shopify_AdditionalScripts.png" alt-text="Paste the tracking tag in Additional scripts.":::
   1. Select **Save**.
