---
title: "Managing your stores"
description: "Learn how to manage stores using Content API."
author: jonmeyers
ms.service: "bing-ads-shopping-content"
ms.topic: "article"
ms.author: jonmeyers
ms.date: 11/13/2024
---

# Managing your stores

> [!NOTE]
> The Store resource is available to closed-beta participants only. For information about participating in the closed-beta or open-beta program, please contact your account manager.
>
> All Store programming elements and documentation are subject to change during the beta.

To create a store, use the [POST stores template](store-resource.md#stores-template). The body of the POST is a [StoreCreate](store-resource.md#storecreate) object. You must specify the `storeName`, `storeDestinationUrl`, and `notificationEmail` fields. The other fields are optional. You must have previously <a href="https://help.ads.microsoft.com/#apex/3/en/50888/1" target="_blank">verified and claimed your website's URL</a>.

The following shows an example request that specifies only the required fields.

```curl
curl -X POST -H "AuthenticationToken: <access token goes here>" -H "DeveloperToken: <developer token goes here>" -H "Content-Type: application/json" --data "{\"storeName\": \"Contoso Sports\",\"storeUrl\": \"https://contoso.com\",\"notificationEmail\": [\"someone@example.com\"]}"  https://content.api.ads.microsoft.com/v9.1/bmc/stores
```

If the request succeeds, the body of the response contains a [Store](store-resource.md#store) object. The object contains the fields that you specified in the request plus all optional fields that provide default values. The `merchantId` field contains the new store's ID and the `storeStatus` field indicates whether the store is approved. 

```json
{
  "merchantId": 123456,
  "storeName": "Contoso Sports",
  "storeUrl": "https://contoso.com/",
  "notificationEmail": [
    "someone@example.com"
  ],
  "notificationLanguage": "en-US",
  "isSslCheckout": true,
  "isBlockAggregator": false,
  "storeStatus": {
    "status": "Approved"
  }
}
```

If the status is Disapproved, the [StoreStatus](store-resource.md#storestatus) object includes the `message` field, which indicates why the store wasn't approved. In the following example, the store was disapproved because `isSslCheckout` is **false**.

```json
  "storeStatus": {
    "status": "Disapproved",
    "message": "UnSecuredCheckOut"
  }
```

If the POST request fails validation, the body of the response is an [ErrorResponse](store-resource.md#errorresponse) object. For a list of possible error codes, see [Error codes](store-resource.md#error-codes).

```json
{
  "errors": [
    {
      "code": "DuplicateStoreNameErr",
      "message": "Another store with the specified store name exists; store names must be unique with Microsoft Merchant Center."
    },
    {
      "code": "NotificationLanguageNotSupportedErr",
      "message": "The market that you specified in the notificationLanguage field is not valid."
    }
  ]
}
```


## Getting a list of stores

To get a list of stores that the user has access to, use the [GET stores template](store-resource.md#stores-template). If you're an agency, include the `CustomerId` and `CustomerAccountId` [headers](store-resource.md#headers).

```curl
curl -H "AuthenticationToken: <access token goes here>" -H "DeveloperToken: <developer token goes here>"  https://content.api.ads.microsoft.com/v9.1/bmc/stores
```

The response is a [StoreCollection](store-resource.md#storecollection) object. The `stores` field contains an array of [Store](store-resource.md#store) objects.

```json
{
  "stores": [
    {
      "merchantId": 12345,
      "storeName": "Alpine Ski House",
      "storeUrl": "https://alpineskihouse.com/",
      "notificationEmail": [
        "someone@alpineskihouse.com"],
      "notificationLanguage": "de-De",
      "isSslCheckout": true,
      "isBlockAggregator": false,
      "storeStatus": {
        "status": "Approved"
      }
    },

    . . .

    {
      "merchantId": 67890,
      "storeName": "Fabrikam",
      "storeUrl": "https://fabrikam.com/",
      "notificationEmail": [
        "someone@fabrikam.com"],
      "notificationLanguage": "en-us",
      "isSslCheckout": true,
      "isBlockAggregator": false,
      "storeStatus": {
        "status": "Approved"
      }
    }
  ]
}
```


## Getting a specific store

To get a specific store that the user has access to, use the [GET store template](store-resource.md#storesmerchantid-template). If you're an agency, include the `CustomerId` and `CustomerAccountId` [headers](store-resource.md#headers).

```curl
curl -H "AuthenticationToken: <access token goes here>" -H "DeveloperToken: <developer token goes here>"  https://content.api.ads.microsoft.com/v9.1/bmc/stores/12345
```

The response is a [Store](store-resource.md#store) object.

```json
{
  "merchantId": 12345,
  "storeName": "Alpine Ski House",
  "storeUrl": "http://www.alpineskihouse.com",
  "notificationEmail": [
    "someone@alpineskihouse.com"],
  "notificationLanguage": "de-DE",
  "isSslCheckout": true,
  "isBlockAggregator": false,
  "storeStatus": {
    "status": "Approved"
  }
}
```
