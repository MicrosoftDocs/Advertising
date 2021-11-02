---
title: Validate a hint message
description: Shows how to validate a hint message before sending it to Microsoft Advertising.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
---

# Validate a hint message

Microsoft provides the [QueryControl XSD](https://bhacstatic.blob.core.windows.net/schemas/hint.xsd) that you use to validate your Hint message before sending it to Microsoft. This saves time and round trips by catching document syntax errors. You should always validate your messages before sending them to Microsoft.

The following example shows using xmllint to validate the message contained in SampleHint.xml.

```
xmllint.exe --schema hint.xsd SampleHint.xml
```
