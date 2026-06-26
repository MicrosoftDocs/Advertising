---
title: Import your Google Merchant Center product offers to Microsoft Merchant Center
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how to easily import your Google Merchant Center offers to Microsoft Merchant Center.
---

# Import your Google Merchant Center product offers to Microsoft Merchant Center

> [!NOTE]
> Learn more about where [Microsoft Shopping campaigns and Product ads are available](hlp_BA_CONC_Countries.md).

If you have Product ads in your Google Merchant Center, you can easily import them into your Microsoft Merchant Center with the Google Import tool. See the item details that will determine which product offers get imported from Google Merchant Center.

## Why use the Google Merchant Center import tool?

- **Save time**. Spend less time maintaining two separate feed files for Google Ads and Microsoft Advertising.
- **Import products easily**. The Google Merchant Center import tool makes it easy to import product offers into Microsoft Merchant Center.
- **Keep your product feeds fresh**. Sync your Google Merchant Center product offers with Microsoft Merchant Center to keep them up-to-date. You can do this manually or automatically through scheduled imports.

Check out the item details that will determine which product offers get imported from Google Merchant Center.

## FAQ

- **How do I import a single Google Merchant Center store's offers?**

  Follow these steps to start a new import.

  > [!NOTE]
  > If you've created feeds previously or have existing feeds in your store, you can associate these feeds into your import to help save you time and effort.

  1. From the navigation menu on the left, select **Tools** > **Merchant Center**.
  1. Select the Microsoft Merchant Center store you want to import to.
  1. Select the **Import** tab.
  1. Select **New import**.
  1. Sign in to your Google account. If you have already signed in to your Google account previously, your sign in will still be valid and you can select **Continue**
  1. You have options on **When** to run your import. You can opt to run a one-time import immediately by choosing **Now** from the list, or you can schedule a daily, weekly, or monthly recurring import that starts at a specific time.
  1. Use **Find and replace string in URL** to replace tracking metadata that you use in Google Merchant Center. For example, you will want to **Find** instances of "Google" and **Replace** it with "Bing" so that you can correctly attribute clicks.
  1. **Notification settings**: If you create a schedule recurring import, you can opt to receive an email every time there's an import, an email only when there are issues with the import, or no emails at all. You'll also need to add a **Schedule name** for a recurring import.

     > [!TIP]
     > Notifications will be sent to the contact details on file in the store's settings. There, you'll be able to update email addresses as needed.
  1. Select **Next**.
  1. Take a moment to review a summary of the import. Select **Start Import** if you're running a one-time import, or select **Save** if you're scheduling an import.

  All products imported from the Google Merchant Center are placed in their own Google Import catalog. To view specific details about your imported products, select the **Feed name** for your Google Import feed from the table in the **Feeds** tab or go to the **Import** tab.

- **How do I import a Google Merchant Center store from a Google account that has multiple stores?**

  This feature is coming soon. In the meantime, please [contact Support](https://go.microsoft.com/fwlink/?linkid=398371).

  To view specific details about your feeds, select the **Feed name** from the table in the **Feeds** tab. Here, you can view the **Feed summary** and **Feed settings**.

- **How do I manage scheduled imports from Google Merchant Center?**

  Go to the Import tab in Microsoft Merchant Center. There, you'll see your list of scheduled imports, and you can:

  - Edit the schedule used to import your products from Google Merchant Center.
  - Change the account used to import products from Google.
  - Pause or delete a scheduled import
  - To change the import schedule for all feeds that use the default schedule. You can change the time and frequency of your scheduled import:
      -  From the navigation menu on the left, select **Tools** > **Merchant Center**.
      -  Select the **Import** tab.
      - Select the ![pencil icon](media/BA_icon_edit.png) to the right of the schedule name.
  - You'll see a form where you can change the frequency of the import (**When**), the **Day of the week**, the **Time**, and the **Time zone**.
  - Select **Save** when you're finished.
  - To pause a scheduled import
      - From the navigation menu on the left, select **Tools** > **Merchant Center**.
      - Select the **Import** tab.
      - Slide the switch to the left to pause the scheduled import. (To resume the import, just slide the same switch to the right.)
      
  - To delete a scheduled import
      - Keep in mind that deleting a scheduled import does not delete the offers from that feed. It only deletes the scheduled import.
          - From the navigation menu on the left, select **Tools** > **Merchant Center**.
          - Select the **Import** tab.
          - Find the import you want to delete.
          - Select the pencil icon ![pencil icon](media/BA_icon_edit.png) to the right of the schedule.
          - Select **Delete** at the bottom of the **Edit Import** panel.

- **Troubleshooting import errors**

  If you encounter errors as you import from Google Merchant Center, we'll guide you on how to fix the error from Microsoft Merchant Center. This list of [fixes to common issues in Microsoft Merchant Center](#import-errors) may also be useful for you.

- **Shipping information for Germany**

  - If there is no shipping information associated with the offers when importing offers targeting the German market, the shipping data for that market based on the Google Merchant Center store's shipping settings will also be imported.
  - If there are multiple shipping options for a product, the lowest shipping value will be applied.
  - To import the Google Merchant Center store shipping information, you must log in using a Google Merchant Center account that has admin-level access.

- **What you need to know**

  - You must create your Microsoft Merchant Center store prior to using the Google Merchant Center Import tool.
  - The Google Merchant Center Import tool imports all product offers from Google Merchant Center including pending and disapproved offers.
    - Product offers will be imported with the feed label specified in their respective Google Merchant Center feed.
    - With the legacy import experience, you were required to create feeds to mirror the setup in Google. Only offers in those feeds' markets would be imported, while all other offers would be ignored.
    - If you migrate from the legacy experience to the new import experience, you may see some offer count fluctuations as we start importing all products to the new Google import feed.
  - Only Google Merchant Center offers that target Microsoft Shopping campaigns markets supported by Microsoft Advertising will be imported. The following languages and markets supported are: 
      - **Albanian:** Albania 
      - **Bosnian:** Bosnia and Herzegovina 
      - **Bulgarian:** Bulgaria 
      - **Croatian:** Croatia 
      - **Czech:** Czech Republic 
      - **Danish:** Denmark 
      - **Dutch:** Netherlands 
      - **English:** Aruba, Australia, Bahamas, Bangladesh, Brunei, Canada, Cayman Islands, Cyprus, Dominica, Fiji, Greece, Guam, Guyana, Hungary, India, Indonesia, Ireland, Malaysia, Maldives, Mongolia, Montenegro, Montserrat, Netherlands, Nepal, New Zealand, Papua New Guinea, Philippines, San Marino, Serbia, Singapore, Slovakia, South Africa, Sri Lanka, Thailand, Trinidad and Tobago, United Kingdom, United States, Vietnam 
      - **Estonian:** Estonia 
      - **Finnish:** Finland 
      - **French:** Andorra, Belgium, France, French Guiana, French Polynesia, Haiti, Luxembourg, Martinique, Monaco, New Caledonia 
      - **German:** Austria, Germany, Liechtenstein, Luxembourg, Switzerland 
      - **Greek:** Cyprus, Greece 
      - **Hungarian:** Hungary 
      - **Icelandic:** Iceland 
      - **Italian:** Italy, San Marino, Vatican City 
      - **Latvian:** Latvia 
      - **Lithuanian:** Lithuania 
      - **Macedonian:** North Macedonia 
      - **Maltese:** Malta 
      - **Polish:** Poland 
      - **Portuguese:** Brazil, Portugal 
      - **Norwegian:** Norway 
      - **Romanian:** Romania 
      - **Serbian:** Montenegro, Serbia 
      - **Slovak:** Slovakia 
      - **Slovenian:** Slovenia 
      - **Spanish:** Argentina, Bolivia, Chile, Colombia, Costa Rica, Dominican Republic, Ecuador, El Salvador, Guatemala, Honduras, Mexico, Panama, Paraguay, Peru, Puerto Rico, Spain, Uruguay, Venezuela 
      - **Swedish:** Sweden 
      - **Turkish:** Turkey

  > [!NOTE]
  > For the Norwegian market, we only support the Bokmål dialect (nb-NO), not Nynorsk (no-NO).

  - Import offers will expire after 30 days. Your offers need to be imported at least every 30 days to stay up-to-date in the system.

Check out the item details that will determine which product offers get imported from Google Merchant Center.

| Item | What product offers get imported | What you need to know |
| --- | --- | --- |
| **Market** | The supported import markets and languages are:<br>- Albanian: Albania<br>- Bosnian: Bosnia and Herzegovina<br>- Bulgarian: Bulgaria<br>- Croatian: Croatia<br>- Czech: Czech Republic<br>- Danish: Denmark<br>- Dutch: Belgium, Netherlands<br>- English: Aruba, Australia, Bahamas, Bangladesh, Brunei, Canada, Cayman Islands, Cyprus, Dominica, Fiji, France, Germany, Greece, Guam, Guyana, Hungary, India, Indonesia, Ireland, Italy, Malaysia, Maldives, Mongolia, Montenegro, Montserrat, Nepal, Netherlands, New Zealand, Papua New Guinea, Philippines, San Marino, Serbia, Singapore, Slovakia, South Africa, Spain, Sri Lanka, Sweden, Switzerland, Thailand, Trinidad and Tobago, United Kingdom, United States, Vietnam<br>- Estonian: Estonia<br>- Finnish: Finland<br>- French: Andorra, Belgium, Canada, France, French Guiana, French Polynesia, Haiti, Luxembourg, Martinique, Monaco, New Caledonia, Switzerland<br>- German: Austria, Germany, Liechtenstein, Luxembourg, Switzerland<br>- Greek: Cyprus, Greece<br>- Hungarian: Hungary<br>- Icelandic: Iceland<br>- Italian: Italy, San Marino, Vatican City<br>- Japanese: Japan<br>- Latvian: Latvia<br>- Lithuanian: Lithuania<br>- Macedonian: North Macedonia<br>- Maltese: Malta<br>- Norwegian: Norway<br>- Polish: Poland<br>- Portuguese: Brazil, Portugal<br>- Romanian: Romania<br>- Serbian: Montenegro, Serbia<br>- Slovak: Slovakia<br>- Slovenian: Slovenia<br>- Spanish: Argentina, Bolivia, Chile, Colombia, Costa Rica, Dominican Republic, Ecuador, El Salvador, Guatemala, Honduras, Mexico, Panama, Paraguay, Peru, Puerto Rico, Spain, United States, Uruguay, Venezuela<br>- Swedish: Sweden<br>- Traditional Chinese: Hong Kong, Taiwan<br>- Turkish: Turkey | Offers from markets that aren't supported will not get imported. |
| **Channel** | Online offers from Google Merchant Center | Any offers from the local channels (products that are available only in-store) will be skipped. |
| **Destination** | Shopping destinations from Google Merchant Center | Any other destinations will be skipped. |
| **Offer attributes** | All Google feed file attributes that are used by Bing | See the [list of Google feed file attributes you can use](hlp_BA_CONC_BMCGoogleAttributes.md). |

<a id="import-errors"></a>

## Google Merchant Center import errors

Now that you’ve imported your Google Merchant Center offers, are you seeing that there are some errors or offers that got skipped? When there is an import error, you can see the error details in the **Choose import options** step of the import process.

Take a look at the different types of errors or skipped offers you may encounter with your Google Merchant Center import below:

| Error/Skipped Offers | Description | Solution |
| --- | --- | --- |
| **No matching products in Google Merchant Center** | Matching offers couldn’t be found in Google Merchant Center because they did match some or all of the following:<br>- Market. There were no offers for the user-specified markets.<br>- No online offers.<br>- Product destination was not set to Shopping. | Check the offers in Google Merchant Center to ensure they are approved shopping offers and also check the import options in Microsoft Merchant Center to ensure that the markets associated with the approved shopping Google Merchant Center offers are specified. Try to import again. If you still encounter issues, please [contact Support.](https://go.microsoft.com/fwlink/?linkid=398371) |
| **Internal error** | An internal import error occurred. | Please [contact Support.](https://go.microsoft.com/fwlink/?linkid=398371) |
| **Import size limit** | Offers are skipped if the maximum 10 million offers per market limit is exceeded. | Please [contact Support.](https://go.microsoft.com/fwlink/?linkid=398371) |
| **Target countries invalid** | Shopping destination countries of the offer are not supported or are from different regions. | Please [contact Support.](https://go.microsoft.com/fwlink/?linkid=398371) |
| **AuthorizationError** | Google token is invalid. This is caused by changing the password of Google account or an access change in Google. | Please select **Change account** and sign in with the same Google account to refresh token. |
| **Fluctuations in offer count** | If you migrate from the legacy experience to the new import experience, you may see some offer count fluctuations. This may happen as we start importing all products to the new Google import feed instead of only importing select markets. | Offer count changes are expected during migration. Please [contact Support](https://go.microsoft.com/fwlink/?linkid=398371) if you see impacts to performance. |
| **Store domain mismatch** | The error message indicates that the domain of the store and product URLs in Google Merchant Center don't match the domain of the store in Microsoft Merchant Center. | To resolve this issue, ensure that the domain of the store in Google Merchant Center matches the domain of the store in Microsoft Merchant Center. If the domains don't match, select a different Google Merchant Center account that has the matching domain. |
