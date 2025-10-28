---
title: "API Best Practices"
description: "Describes best practices when using the Content API."
author: jonmeyers
ms.service: "bing-ads"
ms.subservice: "shopping-content"
ms.topic: "article"
ms.author: jonmeyers
ms.date: 11/13/2024
---

# API Best Practices

The following are the recommended best practices.

## Products Resource

### General tips

* Minimize the number of requests you send by updating only the products that have changed.

* You should provide an expiration date for your products. If you don't, the products will expire 30 days from the date that you add them.

* Be sure to update your products before they expire. If a product expires, you must add it again which will result in a delay while the product goes through editorial review. You should track products that are nearing expiration and before they expire either update their expiration date or simply update the product (you do not have to update any of the product's fields) which will automatically extend the expiration date another 30 days. If you explicitly set the expiration date, you must set a new expiration date yourself; updating the product will not automatically extend the expiration date another 30 days in this case. 

### Batch tips

* Use batch processing whenever you process more than one item. Using batch processing reduces the overhead costs associated with HTTP requests; instead of incurring the costs for each item if you were to send the requests individually, you are incurring the cost only once.

* For batch operations, use the Gzip compression scheme to compress the request and response body. If you use compression, include the `Content-Encoding` HTTP request header and set it to gzip. The Content API supports only Gzip compression.

### Volume tips

* If you plan to offer over 50 million products, reach out to your Microsoft account manager or technical support representative before building your application.

## Status Resource

* The catalog status report contains ALL previously uploaded and rejected offers in the last 30 days. Because the size of the report may be very large depending on the amount of activity, you should limit the frequency at which you request it to hourly.
