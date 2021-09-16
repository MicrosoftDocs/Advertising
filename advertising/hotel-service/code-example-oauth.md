---
title: "OAuth Code Example"
description: Lists the code examples that show how call the identity service to get an access and refresh token.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: eric-urban
ms.author: eur
dev_langs:
  - csharp
---

# OAuth code example

The following examples show a simple desktop implementation used to get an access and refresh token. The example does not support the recommended state query parameter.

If you use the Bing Ads .NET SDK, you should use it to get your OAuth access and refresh tokens. For information, see [Getting Started](../hotel-service/get-started.md).

|Example|Description
|-|-
|[CodeGrantFlow](../hotel-service/code-example-code-grant-flow.md)|A browser control that gets the user's credentials, requests permissions for your application to access their resources, and returns the access and refresh tokens.
|[Call CodeGrantFlow](../hotel-service/code-example-call-code-grant-flow.md)|A test app that shows how to call the CodeGrantFlow DLL to get an access and refresh token.
