---
title: Set up UET Tags Using Wix
description: If you built your website on Wix, read this article to learn how to set up UET tags on it.
ms.date: 05-30-2026
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Set up UET tags using Wix

> [!NOTE]
> - This article shows how to do a basic setup of UET tags using Wix. Please refer to the [Wix Help Center](https://go.microsoft.com/fwlink/?linkid=2010845) for more information.
> - Microsoft Advertising is not responsible for Wix's processes or documentation, nor for changes made to Wix's processes or documentation.

If you created and manage your website with Wix, you can add and manage your UET tag there.

## Implementing UET using Wix

1. From the navigation menu on the left, hover over **Conversions** and select **UET tag**.
1. Copy your JavaScript UET tag tracking code.<br>*Note*: You can also find your UET tag by selecting the **More options** icon on your campaign's **Customer action tracking** pane and selecting **View tracking tag**.
1. Log into your Wix dashboard and select **Settings** from the left menu.

   :::image type="content" source="media/BA_Conc_UET_Wix_Settings.png" alt-text="Go to the settings page in Wix.":::
1. Scroll to the **Advanced bar** at the bottom of the page and select **Custom code**.

   :::image type="content" source="media/BA_Conc_UET_Wix_CustomCode.png" alt-text="Go to the Custom Code section in Wix.":::
1. Select **+ Add Custom Code** from the upper-right corner of the page.

   :::image type="content" source="media/BA_Conc_UET_Wix_AddCustomCode.png" alt-text="Add Custom Code in Wix.":::
1. In text box under **Paste code snippet here**, paste the UET code that you copied in Step 1.

   :::image type="content" source="media/BA_Conc_UET_Wix_PasteCode.png" alt-text="Paste your code snippet in Wix.":::
1. Enter a name for your code in the **Name** box that you can easily identify later.

   :::image type="content" source="media/BA_Conc_UET_Wix_Name.png" alt-text="Enter a name in Wix.":::
1. Under **Add Code to Pages**, select an option.

   - **All pages** adds the code to every page of your website, including any new pages that you create in the future.

     - Select **Load code once** if you want the code to load once per visit to your website.
     - (Recommended) Select **Load code on each new page** if you want the code to load each time a page is visited.
   - **Choose specific pages** adds the code to only the pages you choose. Use the dropdown menu to select the specific pages you want to add the code to.

   :::image type="content" source="media/BA_Conc_UET_Wix_AddCodeToPages.png" alt-text="Add code to pages in Wix.":::
1. Under **Place Code in**, select the area of your website where you want to place the code (Head, Body - start, or Body - end).

   :::image type="content" source="media/BA_Conc_UET_Wix_PlaceCodeIn.png" alt-text="Place code in your website.":::
1. Select **Apply**. <br>

   :::image type="content" source="media/BA_Conc_UET_Wix_Apply.png" alt-text="Select Apply in Wix.":::

> [!NOTE]
> To validate that your Wix UET tag is working, download and install [UET Tag Helper](hlp_BA_CONC_UET_TagHelper.md). Go to your Wix website and verify that a UET event is received and that the **Tag ID** matches the tag you selected in Step 1.
