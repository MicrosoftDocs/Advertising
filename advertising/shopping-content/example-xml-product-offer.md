---
title: "Example XML Product Offer"
description: "Shows example xml representing a product offer returned by the Content API."
author: rgaritta
ms.service: "bing-ads-shopping-content"
ms.topic: "article"
ms.author: v-rgaritta
---
# Example XML Product Offer
The following shows an example of a product offer in XML that a GET request returns. 

```xml
<?xml version="1.0" encoding="utf-8"?>
<product>
  <additional_image_link>http://www.tailspintoys.com/images?id=123def</additional_image_link>
  <additional_image_link>http://www.tailspintoys.com/images?id=567def</additional_image_link>
  <adult>False</adult>
  <adwords_redirect>http://contoso.com/hury</adwords_redirect>
  <age_group>kids</age_group>
  <availability>in stock</availability>
  <brand>Tailspin</brand>
  <channel>online</channel>
  <color>Blue</color>
  <condition>new</condition>
  <content_language>en</content_language>
  <description>Charming sundress perfect for lunch out on the town.</description>
  <expiration_date>2016-07-14T07:27:06-08:00</expiration_date>
  <gender>female</gender>
  <id>online:en:US:sku5678</id>
  <identifier_exists>True</identifier_exists>
  <image_link>http://www.tailspintoys.com/images?id=123abc</image_link>
  <item_group_id>abc123def456</item_group_id>
  <link>http://www.tailspintoys.com/girls/apparel?id=9d0s-a934</link>
  <material>cotton</material>
  <offer_id>sku5678</offer_id>
  <online_only>False</online_only>
  <price currency="USD">38.0</price>
  <product_type>Apparel &amp; Accessories &gt; Clothing &gt; Dresses</product_type>
  <sale_price currency="USD">25.0</sale_price>
  <sale_price_effective_date>2016-06-14T08:00:00-08:00/2016-06-21T17:00:00-08:00</sale_price_effective_date>
  <shipping>
    <country>US</country>
    <price currency="USD">3.0</price>
    <region>CA</region>
    <service>Ground</service>
  </shipping>
  <shipping_weight unit="oz">1.3</shipping_weight>
  <shipping_label>promotion</shipping_label>
  <size>2T</size>
  <size>3T</size>
  <size_system>US</size_system>
  <size_type>regular</size_type>
  <target_country>US</target_country>
  <tax>
    <country>US</country>
    <rate>9.9</rate>
    <region>CA</region>
    <ship>True</ship>
  </tax>
  <title>Cute Toddler Sundress</title>
</product>
```
