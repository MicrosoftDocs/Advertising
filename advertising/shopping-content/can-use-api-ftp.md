---
title: "Can I Use the API and FTP/SFTP?"
description: "Describes the use of FTP/SFTP with the Content API."
author: rgaritta
ms.service: "bing-ads-shopping-content"
ms.topic: "article"
ms.author: v-rgaritta
---
# Can I Use the API and FTP/SFTP?
Yes, in the following, very limited cases you may use the API and FTP/SFTP together without conflicts occurring.

- You use FTP/SFTP and the API to update different catalogs. For example, you use the API to update catalog A and FTP/SFTP to update catalog B. 

- You use the API to only get products or determine the status of a product. For example, if you use FTP/SFTP to update catalog A, you may use the API only to get products from catalog A.


You are strongly discouraged from updating the same catalog using FTP/SFTP and the API. If you use FTP/SFTP and the API to update the same catalog, you must wait until the FTP/SFTP process completes before using the API to update the catalog. The FTP/SFTP process can take several hours to complete. To determine whether the FTP/SFTP process is complete, you'd use the verification report in the UI; there is no programmatic way to determine whether it's complete. 

If you don't wait for the FTP/SFTP update to complete before using the API to update the catalog, the FTP/SFTP and API updates may overwrite one another, and it's undetermined which will win. 

The only exception to using FTP/SFTP and the API to update the same catalog at the same time is if you use the API to update only the `price`, `salePrice`, and `salePriceEffectiveDate` fields of the catalog. For example, if you use FTP/SFTP to update products in catalog A, you may use the API to update only the price fields of products in catalog A without worry about whether the FTP/SFTP update is complete.
