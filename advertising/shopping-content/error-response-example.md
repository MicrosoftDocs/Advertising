---
title: "Error Response Example"
description: "Shows example json representing an error response returned by the Content API."
author: eric-urban
ms.service: "bing-ads-shopping-content"
ms.topic: "article"
ms.author: eur
---
# Error Response Example
The error response varies depending on the URI being called. See the following responses for JSON and XML examples.

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

The following shows an XML error response when trying to insert a single offer.

```xml
<?xml version="1.0" encoding="utf-8"?>
<errors xmlns="http://schemas.google.com/g/2005">
  <error>
    <reason>validation/internal</reason>
    <internalReason>Internal error occurred. Please retry...</internalReason>
    <domain>sc</domain>
  </error>
  <warning> 
    <reason>validation</reason> 
    <internalReason>The GTIN is required.</internalReason> 
    <domain>content.ContentErrorDomain</domain> 
  </warning> 
  <code>400</code> 
</errors>
```


The following shows an XML error response when trying to insert an offer in a batch request. 

```xml
<?xml version="1.0" encoding="utf-8"?>
<batch>
  <entry batch_id="1" method="insert">
    <merchant_id>37724</merchant_id>
    <errors xmlns="http://schemas.google.com/g/2005">
      <error>
        <internalReason>Invalid value for...</internalReason>
        <domain>GData</domain>
        <code>invalid</code>
      </error>
    </errors>
  </entry>
</batch>
```
