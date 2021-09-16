---
title: "Microsoft Advertising Scripts Quickstart"
description: "Shows you how to get started quickly using Microsoft Advertising Scripts."
author: eric-urban
ms.author: eur
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# Get Started With Microsoft Advertising Scripts

Accessing your Microsoft Advertising data with Scripts is easy. Just follow these instructions and you'll be accessing your data in no time.

1. Sign in to [Microsoft Advertising](https://secure.ads.microsoft.com/) or [Microsoft Advertising Sandbox](https://sandbox.bingads.microsoft.com/).
1. From the global menu at the top of the page, select **Tools** > **Scripts**.
1. Select **Create script**.
1. Replace "Untitled script" with your script's name.
1. Copy and paste the following code into the code editor. This script gets the 15 keywords that generated the least impressions over the last week. This script won't make any changes to your campaign data.

    ```javascript
    function main() {
        var iterator = AdsApp.keywords()
            .orderBy("Impressions ASC")
            .forDateRange("LAST_WEEK")
            .withLimit(15)  // up to 15
            .get();
    
        Logger.log("15 keywords with the least impressions over the last week");

        while (iterator.hasNext()) {
            var keyword = iterator.next();
            Logger.log(`${keyword.getText()}: 
                ${keyword.getStats().getImpressions()} impressions`);  //writes the number of impressions
        }
    }
    ```

1. To execute the script in [preview mode](concepts/preview-mode.md) (recommended), select **Preview**.
1. To see the output after the script or preview has run, select **Logs**.

The difference between **Preview** and **Run script now** is that preview gives you the chance to see how the script would affect your data without actually committing the changes. If the script modifies data, you should run it in preview mode first. For limitations of preview mode, see [Running scripts in Preview mode](concepts/preview-mode.md).

For multi-account scripts, access the Scripts editor from a manager account. To get an account that you manage, use the [AccountsApp](reference/AccountsApp.md) object. After getting the managed account, use the [AdsApp](reference/AdsApp.md) object to access its entities. [Read more](./guides/multi-account-access.md).


## Next steps

> [!div class="nextstepaction"]
> [Single account access](./guides/single-account-access.md)
