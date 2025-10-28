---
title: "Error Response Example"
description: "Shows example json representing an error response returned by the Content API."
author: jonmeyers
ms.service: "bing-ads"
ms.subservice: "shopping-content"
ms.topic: "article"
ms.author: jonmeyers
ms.date: 11/13/2024
---
# Error Response Example
The error response varies depending on the URI being called. See the following responses for JSON examples.

The following shows a JSON error response when trying to insert a single offer.

```json
{
  "error": {
    "errors": [
      {
        "reason": "invalid",
        "message": "Invalid value for...",
        "domain": "global"
      }
    ],
    "warnings": [ 
      { 
        "reason": "validation", 
        "message": "The GTIN is required.", 
        "domain": "content.ContentErrorDomain" 
      } 
    ], 
    "code": "400", 
    "message": "Invalid..." 
  } 
}```

The following shows a JSON error response when trying to get a single offer.

```json
{
  "error": {
    "errors": [
      {
        "reason": "Product with providedId = Online:en:US:sku5678 does not exist.",
        "message": "Product with providedId = Online:en:US:sku5678 does not exist.",
        "domain": "sc"
      }
    ]
  }
}
```

The following shows a JSON error response when trying to insert an offer in a batch request. **Note** that the `errors` field is plural whereas when you insert a single offer (see above) the `error` field is singular.

```json
{
  "kind": "content#productsCustomBatchResponse",
  "entries": [
    {
      "kind": "content#productsCustomBatchResponseEntry",
      "batchId": "1",
      "method": "insert",
      "merchantId": "123456",
      "errors": {
        "errors": [
          {
            "reason": "invalid",
            "message": "Invalid value for...",
            "domain": "global"
          }
        ],
        "code": "400",
        "message": "Invalid value for..."
      }
    }
  ]
}
```
