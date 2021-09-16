---
title: "Get product statuses"
description: "Learn how to the status of your product offers using Content API."
author: eric-urban
ms.service: "bing-ads-shopping-content"
ms.topic: "article"
ms.author: eur
---

# Getting the status of your product offers

> [!NOTE]
> The ProductStatuses resource is available to closed-beta participants only. For information about participating in the closed-beta or open-beta program, please contact your account manager.
>
> All Store programming elements and documentation are subject to change during the beta.

To get a list of product offers in your store that have their status set to Disapproved or Warning, use the [get product statuses template](productstatus-resource.md#storesmerchantidproductstatuses). 


```curl
curl -H "AuthenticationToken: <access token goes here>" -H "DeveloperToken: <developer token goes here>"  https://content.api.ads.microsoft.com/v9.1/bmc/stores/12345/productstatuses
```

The response body is a [ProductStatuses](productstatus-resource.md#productstatuses) object. If the store doesn't contain products with Disapproved or Warning statuses, the `resources` field contains an empty array.

```json
{
  "resources": []
}
```

Here's what the response looks like when products have their status set to Warning and Disapproved. The `itemLevelIssues` field contains the list of issues that you should address.


```json
{
  "resources": [
    {
      "productId": "online:en:CA:9",
      "title": "Slip Resistant - Shoes For Crews...",
      "status": "Warning",
      "creationDate": "2018-10-08T07:38:00Z",
      "lastUpdateDate": "2020-09-29T14:35:54Z",
      "expirationDate": "2020-10-29T14:35:54Z",
      "itemLevelIssues": [
        {
          "code": "GtinPlusBrandRequiredWarn",
          "description": "Missing one or more identifiers - The Brand and GTIN or Brand and MPN are required.",
          "servability": "Unaffected"
        }
      ]
    },

    . . .

    {
      "productId": "online:en:CA:7",
      "title": "No Slip - Shoes For Crews...",
      "status": "Disapproved",
      "creationDate": "2018-10-08T07:38:00Z",
      "lastUpdateDate": "2020-09-29T14:35:54Z",
      "expirationDate": "2020-10-29T14:35:54Z",
      "itemLevelIssues": [
        {
          "code": "EVRejectedErr",
          "description": "The offer was rejected by the external validation component: EV.",
          "servability": "Disapproved"
        },
        {
          "code": "EV_39",
          "description": "Trademark content",
          "servability": "Disapproved"
        }
      ]
    }
  ]
}
```

By default, the request returns a maximum of 25 offers. To return a different number of offers, include the [max-results](productstatus-resource.md#maxresults) query parameter.

```curl
curl -H "AuthenticationToken: <access token goes here>" -H "DeveloperToken: <developer token goes here>"  "https://content.api.ads.microsoft.com/v9.1/bmc/stores/12345/productstatuses?max-results=5"
```

If the number of offers with their status set to Disapproved or Warning is greater than *max-results*, the response contains the `nextPageToken` field. 

```json
{
  "nextPageToken": "W3sidG9rZW4iOm51bGwsInJhbmdlIjp7Im1pbiI6IjA1QzFFNTNEMUYwRjg2IiwibWF4IjoiMDVDMUU1NUIyRDk3NEEifX1d",
  "resources": [...]
}
```

To get the next page of offers, include the [continuation-token](productstatus-resource.md#continuationtoken) query parameter in your next call and set it to the token.


```curl
curl -H "AuthenticationToken: <access token goes here>" -H "DeveloperToken: <developer token goes here>"  "https://content.api.ads.microsoft.com/v9.1/bmc/stores/12345/productstatuses?max-results=5&continuation-token=W3sidG9rZW4iOm..."
```

The typically calling pattern is to call this template in a loop until the response doesn't include the `nextPageToken` field.


## Getting summary status counts of product offers

The ProductStatuses resource offers a summary view of the status of product offers in a store. The view reports approved and disapproved offers along with offers that are pending review or are about to expire.

To request a summary view, use the [summary view template](productstatus-resource.md#storesmerchantidproductstatusessummary). Set `{merchantId}` to the ID of the store that you want the view from.

```curl
curl -H "AuthenticationToken: <access token goes here>" -H "DeveloperToken: <developer token goes here"  https://content.api.ads.microsoft.com/v9.1/bmc/stores/12345/productstatusessummary
```

The response is a [ProductStatusesSummary](productstatus-resource.md#productstatusessummary) object.

```json
{
  "merchantId":12345,
  "approved":189,
  "expiring":14,
  "disapproved":3,
  "pending":10
}
```

When an offer's status changes, it may take up to two hours for the summary view to reflect the change.
