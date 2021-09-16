---
title: "Microsoft Advertising Scripts Changes and Text Logs"
description: "Describes how logging works in Microsoft Advertising Scripts."
author: eric-urban
ms.author: eur
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# Change logs and text logs

Microsoft Advertising Scripts provides two types of logs: change logs and text logs.

## Change Log
Change logs list all changes that a script makes to Microsoft Advertising entities. Details include Changed item, Type of change, Current value, New value, and Status. To view the change log, click **Changes** below the script editor.

## Text Log
To write text to the text log, call the [Logger](../reference/Logger.md) object's `log()` method. Writing text to the text log is useful for debugging scripts or capturing script activity. Because logging is an expensive call in terms of performance, guidance is to use logging sparingly and probably not within high volume loops except to provide notification of issues. Also, instead of using multiple `Log()` calls to write multiple lines, use a single call and include newline characters ('\n').

Either of the following formats work for logging data on multiple lines.

```javascript
function main() {
    var account = AdsApp.currentAccount();

    Logger.log(`Account ID: ${account.getAccountId()}\nAccount name: ${account.getName()}\nAccount number: ${account.getAccountNumber()}\nCustomer ID: ${account.getCustomerId()}\nCurrency code: ${account.getCurrencyCode()}\nTime zone: ${account.getTimeZone()}\n\n`);
    
    Logger.log(`Account ID: ${account.getAccountId()}
        Account name: ${account.getName()}
        Account number: ${account.getAccountNumber()}
        Customer ID: ${account.getCustomerId()}
        Currency code: ${account.getCurrencyCode()}
        Time zone: ${account.getTimeZone()}\n\n`);

    // Don't use a separate call for each line!

    // Logger.log("Account ID: " + account.getAccountId());
    // Logger.log("Account name: " + account.getName());
    // Logger.log("Account number: " + account.getAccountNumber());
    // Logger.log("Customer ID: " + account.getCustomerId());
    // Logger.log("Currency code: " + account.getCurrencyCode());
    // Logger.log("Time zone: " + account.getTimeZone() + "\n\n");

}
```

In addition to output from the `log()` method, [errors and warnings](./errors-and-warnings.md) are automatically output to the text log. To view the text log, click **Logs** below the script editor.

To view the change logs and text logs for scripts that run on a schedule or were running when you logged out, click **View details** on Scripts home page.
