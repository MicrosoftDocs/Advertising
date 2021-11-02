---
title: "Microsoft Ads Scripts multi-account access"
description: "Provides an overview of how to use AccountsApp to access the accounts you can manage on behalf of others."
author: rgaritta
ms.author: v-rgaritta
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# Multi-account access

If you have multiple accounts or manage accounts for others, everything starts with the [AccountsApp](../reference/AccountsApp.md) object. AccountsApp is the top-level object that you use to get the list of accounts you have access to, and to select the account to manage. After getting and selecting the account, you switch to using the [AdsApp](../reference/AdsApp.md) object to access the account's entities.

> [!NOTE]
> For multi-account scripts, use the Scripts editor accessed from **Accounts Summary** in the Microsoft Advertising web application. If you don't see **Accounts Summary** in the UI, you won't use the multi-accounts Scripts editor.
>
> To access the Scripts editor from **Accounts Summary**, click **Bulk Operations** in the left pane. Then, under **Scripts** click **Create and manage scripts**.


## Listing the accounts you have access to

To list all the accounts that you have access to, call the [accounts](../reference/AccountsApp.md#accounts) method. The method returns a [BingAdsAccountSelector](../reference/BingAdsAccountSelector.md) object that you can use to filter the list of accounts. For information about using selectors to filter lists, see [Using selectors](../concepts/selectors.md).

The following example returns all the accounts you have access to.

```javascript
function main() {
    var accounts = AccountsApp.accounts()
        .get();

    while (accounts.hasNext()) {
        var account = accounts.next();

        Logger.log(`Account ID: ${account.getAccountId()}
            Account name: ${account.getName()}
            Account number: ${account.getAccountNumber()}
            Customer ID: ${account.getCustomerId()}
            Currency code: ${account.getCurrencyCode()}
            Time zone: ${account.getTimeZone()}\n\n`);
    }
}
```

## Executing a function for each account in parallel

To perform work on multiple accounts in parallel, you call the [selector's](../reference/BingAdsAccountSelector.md) `executeInParallel()` method. The following are the `executeInParallel()` methods you can call.

- [executeInParallel(string functionName, string optionalCallbackFunctionName)](../reference/BingAdsAccountSelector.md#executeinparallel-string-functionname-string-optionalcallbackfunctionname-)  
  
  Specify the name of the function that Scripts calls for each account that the selector returns. The function may return a value as a string. To return a complex object, use the JSON.stringify method to convert the object to a string. You can then use the JSON.parse method to convert the string back into an object. 
  
  If your function returns a value, you must specify a callback function to capture the return values. After the function is executed for all selected accounts, Scripts calls the optional callback function. The return values are passed as an array of [ExecutionResult](../reference/ExecutionResult.md) objects.   
  
- [executeInParallel(string functionName, string optionalCallbackFunctionName, string optionalInput)](../reference/BingAdsAccountSelector.md#executeinparallel-string-functionname-string-optionalcallbackfunctionname-string-optionalinput-)
  
  Specify the name of the function that Scripts calls for each account that the selector returns. You may specify an optional input string that Scripts passes to the function. To pass a complex object, use the JSON.stringify method to convert the object to a string. You can then use the JSON.parse method inside the function to convert the string back into an object.
  
  The function may return a value as a string. To return a complex object, use the JSON.stringify method to convert the object to a string. You can then use the JSON.parse method to convert the string back into an object. 
  
  If your function returns a value, you must specify a callback function to capture the return values. After the function is executed for all selected accounts, Scripts calls the optional callback function. The return values are passed as an array of [ExecutionResult](../reference/ExecutionResult.md) objects.   
  

You must limit the number of accounts to 50, otherwise, the call fails if the selector returns more than 50. To limit the number of accounts, you can use the `withLimit()`, `withIds()`, and `withAccountNumbers()` methods.

The following example shows a simple example that executes a function for each account that had a click-through rate less that 5% last week. The example uses the `withLimit()` method to ensure the call doesn't exceed the 50 accounts limit.

```javascript
function main() {
    // Select the accounts to process.
    var accounts = AccountsApp.accounts()
        .withLimit(50) 
        .withCondition('Ctr < 0.05')
        .forDateRange('LAST_WEEK')
        .executeInParallel('bump', 'resultsHandler');
}

function bump() {
    var account = AdsApp.currentAccount();

    // Do something with the entities in the account.

    Logger.log(`Processing account: ${account.getAccountId()} (${account.getName()})`);

    // Return a value that's processed by resultsHandler(). If 
    // the function returns a value, it must be a string. To return
    // a complex object, use JSON.stringify(object) to return the 
    // object as a string.

    return account.getAccountId();
}

// Handles all return values from the bump() function after the 
// function completes for all accounts.

function resultsHandler(results) {
    
    for (var result of results) {
        if (result.getStatus() === 'OK') {
            value = result.getReturnValue();
        }
    }
}
```

## Changing the account that Scripts processes

Until you select an account to process, you cannot call any of the [AdsApp](../reference/AdsApp.md) methods to get the account's entity data. To select an account, use the [select](../reference/AccountsApp.md#select-bingadsaccount-account-) method of AccountsApp. 

But first you need to call the [accounts](../reference/AccountsApp.md#accounts) method to select the accounts you want to process. For information about using `accounts()` to filter the list of accounts, see [Listing the accounts you have access to](#listing-the-accounts-you-have-access-to).

After getting an account, call the `select()` method to make the account the current account. The following example shows this process.

```javascript
function main() {
    // This call logs null. Before using any
    // of the AdsApp methods, you must first
    // select an account to process.

    Logger.log(AdsApp.currentAccount());

    // Select the accounts to process

    var accounts = AccountsApp.accounts()
        .withIds(['123', '456', '789'])
        .get();

    while (accounts.hasNext()) {
        AccountsApp.select(accounts.next());

        // AdsApp is now set to the current account.
        // Do something with the account's entities.
    }
}
```

