---
title: "Request and method limits"
description: "Provides limits for HTTP requests and batch method calls"
author: eric-urban
ms.service: "bing-ads-shopping-content"
ms.topic: "article"
ms.author: eur
---

# Request and method call limits

The following are the recommended limits that you should follow when implementing your Content API solution to ensure maximum API efficiency. 

|Limit|Description
|-|-
|Queries per second (QPS)|Limit the number of HTTP requests you send per second to 40.
|Method calls per minute|Limit the number of method calls you make per minute to 60,000.
|Method calls per day|Limit the number of method calls you make per day to 20,000,000.

Every method call is a single HTTP request except for batch requests, which may contain up to 300 method calls. 

### How do batch requests count against the limits?

Using [batch requests](manage-products.md#batch) to process multiple product offers does reduce the number of requests that count against the QPS limit. For example, if you update 10 offers using a batch request, it counts as one request against the QPS limit instead of 10.

But, using batch requests doesn't help you reduce the number of method calls. Each item in the batch request counts as one method call. For example, a batch request with 100 items counts as 100 method calls against the method call limits.  


### Do dry-run requests count against the limits?

Although using the [dry-run](products-resource.md#dryrun) query parameter lets you test your code without affecting your offers, the requests and method calls count against the QPS and method call limits. 

### Can I maximize batch requests?

A batch request may contain up to 300 method calls. If you maximize batch requests, you'll probably exceed the calls per minute and calls per day limits. For example, 40 QPS * 60 seconds * 300 methods = 720,000 methods per minute.

Whether you maximize for method calls or QPS, be mindful of how each option affects the other and make adjustments accordingly.
