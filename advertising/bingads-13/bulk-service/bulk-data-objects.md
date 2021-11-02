---
title: Bulk Data Objects
ms.service: bing-ads-bulk-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Data objects reference for the Bulk service.
---
# Bulk Data Objects
The Bulk service defines the following data objects.

|Data Object|Description|
|---|---|
|[AdApiError](adapierror.md)|Defines a Bulk Ad API error object that contains the details that explain why the service operation failed.|
|[AdApiFaultDetail](adapifaultdetail.md)|Defines a Bulk Ad API fault detail object that operations return when generic errors occur, such as an authentication error.|
|[ApiFaultDetail](apifaultdetail.md)|Defines a Bulk API fault detail object that operations return when web service-specific errors occur, such as when the request message contains incomplete or invalid data.|
|[ApplicationFault](applicationfault.md)|Defines the base object from which all Bulk fault detail objects derive.|
|[BatchError](batcherror.md)|Defines a Bulk batch error object that identifies the item within the batch of items in the request message that caused the operation to fail, and describes the reason for the failure.|
|[CampaignScope](campaignscope.md)|Defines an object that identifies a campaign to download.|
|[EditorialError](editorialerror.md)|Defines an error object that identifies the entity with the batch of entities that failed editorial review.|
|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md)|The key and value pair of string and string values defined by the Bulk service.|
|[OperationError](operationerror.md)|Defines a Bulk operation error object that contains the details that explain why the service operation failed.|
