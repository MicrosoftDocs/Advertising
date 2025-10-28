---
title: "Example JSON Product Offer"
description: "Shows example json representing a product offer returned by the Content API."
author: jonmeyers
ms.service: "bing-ads"
ms.subservice: "shopping-content"
ms.topic: "article"
ms.author: jonmeyers
ms.date: 11/13/2024
---
# Example JSON Product Offer
The following shows an example of a product offer in JSON that a GET request returns. 

```json
{
  "additionalImageLinks": [
    "http://www.tailspintoys.com/images?id=123def",
    "http://www.tailspintoys.com/images?id=567def"
  ],
  "adult": "False",
  "adwordsRedirect": "http://contoso.com/hury",
  "ageGroup": "kids",
  "availability": "in stock",
  "brand": "Tailspin",
  "channel": "online",
  "color": "Blue",
  "condition": "new",
  "contentLanguage": "en",
  "description": "Charming sundress perfect for lunch out on the town.",
  "expirationDate": "2016-07-14T07:27:06-08:00",
  "gender": "female",
  "id": "Online:en:US:sku1234",
  "identifierExists": "True",
  "imageLink": "http://www.tailspintoys.com/images?id=123abc",
  "itemGroupId": "abc123def456",
  "kind": "content#product",
  "link": "http://www.tailspintoys.com/girls/apparel?id=9d0s-a934",
  "material": "cotton",
  "offerId": "sku1234",
  "onlineOnly": "False",
  "price": {
    "currency": "USD",
    "value": 38.0000000
  },
  "productType": "Apparel & Accessories > Clothing > Dresses",
  "salePrice": {
    "currency": "USD",
    "value": 25.0000000
  },
  "salePriceEffectiveDate": "2016-06-14T08:00:00-08:00/2016-06-21T17:00:00-08:00",
  "shipping": [
    {
      "country": "US",
      "price": {
        "currency": "USD",
        "value": 3.00
      },
      "region": "CA",
      "service": "Ground"
    }
  ],
  "shippingWeight": {
    "unit": "oz",
    "value": 1.3
  },
  "shippingLabel": "promotion",
  "sizes": [
    "2T",
    "3T"
  ],
  "sizeSystem": "US",
  "sizeType": "regular",
  "targetCountry": "US",
  "taxes": [
    {
      "country": "US",
      "rate": "9.9",
      "region": "CA",
      "taxShip": "True"
    }
  ],
  "title": "Cute Toddler Sundress"
}
```
