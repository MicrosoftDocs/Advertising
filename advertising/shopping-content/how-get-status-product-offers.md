---
title: "How Do I Get the Status of Product Offers?"
description: "Learn how to get the status of product offers with the Content API."
author: rgaritta
ms.service: "bing-ads-shopping-content"
ms.topic: "article"
ms.author: v-rgaritta
---

# How Do I Get the Status of Product Offers?

When you add or update a product offer in a catalog or store, the offer goes through an initial validation before going through editorial review. That process can take up to 36 hours. To see whether the offer passed the review process, use the [Status](../shopping-content/status-resource.md) resource. 

> [!NOTE]
> To get a list of products that have their status set to Disapproved or Warning, see [Getting the status of your product offers](product-offer-statuses.md).

The following is the base URI that you use to get the `Status` resource.

`https://content.api.bingads.microsoft.com/shopping/v9.1/bmc/`

To get the status of product offers, append the following template to the base URI.

`{bmcMerchantId}/catalogs/{catalogId}/status`

Set `{bmcMerchantId}` to your BMC store ID and set `{catalogId}` to the ID of the catalog that contains the product offers that you want to get the status of. 

Each HTTP request must include the user's OAuth access token and your developer token. To specify the user's access token, set the [AuthenticationToken](../shopping-content/status-resource.md#authtoken) header. To specify your developer token, set the [DeveloperToken](../shopping-content/status-resource.md#devtoken) header.

If you manage catalogs on behalf of other customers, you must set:

- The [CustomerId](../shopping-content/status-resource.md#customerid) header to the customer ID of the customer whose store you're managing.
- The [CustomerAccountId](../shopping-content/status-resource.md#customeraccountid) header to the account ID of any of the customer's accounts that you manage (it doesn't matter which managed account).

You do not need to specify the access token or developer token to download the report; you only need to specify them to get the status.

By default, the Content API uses JSON objects to represent the status. To use XML, set the [alt](../shopping-content/status-resource.md#alt) query parameter to XML.

Send an HTTP GET request to the resulting URL. The response contains a [Status](../shopping-content/status-resource.md#status) object that contains the number of offers that passed or failed the review process in the last 30 days. If an offer failed the review, the `Status` resource includes a URL that you can use to download a report that describes why the offer failed.

The following shows an example `Status` object.

```json
{
  "catalogId": 12345,
  "publishedCount": 80,
  "rejectedCount": 6,
  "rejectionReportUrl": "https://merchantcenter.bingads.microsoft.com/api/Public/DownloadFeedReport?token=..."
}
```

The report identifies the offer that failed but does not provide the timestamp or version control information that you can use to identify which of the updates the report is referring to. For example, if you uploaded an offer 2 days ago and then updated it yesterday, you won't know whether the issue is related to the version uploaded 2 days ago or the one uploaded yesterday. However, you may be able to use the item's attributes in the Offer Snippet column of the report to infer which version of the item is being reported.

Because the report file is ZIP compressed, you must unzip the file to read the report. There is no limit to the number of reports that the system can store; however, the length of time that the reports are stored is undefined. For information about the contents of the report, see [Report Format](../shopping-content/status-resource.md#reportformat).

Depending on the activity associated with the catalog, the report can be large. You should not request the report anymore frequently than is necessary. The recommended interval is no more than once per hour.

For a code example that shows how to get the catalog's status and download the report, see [Downloading the Catalog Status Report](../shopping-content/code-examples.md#status).

<a name="examplereport"></a>
The following shows an example report.  

```csv
"Catalog Name","Catalog Id","Store Id","Upload Time"
"Default Catalog","1234","5678","04/21/2016 01:59:06"

"Item Id","Message","Type","Values","Offer Snippet"
"SKU1234","The product URL should be a sub-path of the store's domain. ","Error","",";eBay Motors>Parts & Accessories>Car & Truck Parts>Brakes>Brake Hoses>;http://contentapis.cloudapp.net/sku123;http://i.ebayimg.com/00/s/NzY4WDI5Mg==/z/irkAAOxyB9RS14Rj/$_1.JPG?set_id=880000500F;24.25;-1;;"
"SKU5678","The product URL should be a sub-path of the store's domain. ","Error","",";;http://www.contoso.com/;https://tse3.mm.bing.net/th?id=Ma8674a23cc755995efecf822b3836f07o0&pid=Api;1205;-1;;"
"SKU0987","The product URL should be a sub-path of the store's domain. ","Error","",";Apparel & Accessories > Clothing > Outerwear;http://v-vagancclaimedapi.cloudapp.net/;http://google.com/;1;-1;;"
"SKU6543","The price field is required.","Error","","Mens T-shirt;N/A;http://www.contoso.com/;https://tse3.mm.bing.net/th?id=OIP.Ma8674a23cc755995efecf822b3836f07o0&pid=Api;N/A"
"SKU2435","The offer expiration date is in the past.","Error","","full product title;Apparel & Accessories > Clothing > Outerwear;http://v-vagancclaimedapi.cloudapp.net/;http://google.com/;1.00"
"SKU8675","The price field is required.","Error","","Mens T-shirt;N/A;http://www.contoso.com/;https://tse3.mm.bing.net/th?id=OIP.Ma8674a23cc755995efecf822b3836f07o0&pid=Api;N/A"
```
