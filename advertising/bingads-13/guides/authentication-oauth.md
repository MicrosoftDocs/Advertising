---
title: "Authentication with OAuth"
ms.service: "bing-ads"
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Authenticate for Bing Ads API using OAuth.
---
# Authentication with OAuth

[!INCLUDE[request-header](./includes/mfa-required.md)]

Consider the user that you want to sign in e.g., example@contoso.com. The Bing Ads API will not accept that email address and password. Instead you need to set the AuthenticationToken header element that contains a user access token. You can think of an access token as representing a user name and password.

How can you get an access token for a user? As an application developer you'll use a Microsoft authorization URL to prompt the Microsoft Advertising user for consent. Once a user provides consent, you can get an access token and act on behalf of the user.  

Microsoft Advertising leverages the [Microsoft identity platform endpoint for developers](/azure/active-directory/develop/v2-oauth2-auth-code-flow) and the [OAuth 2.0](https://tools.ietf.org/html/rfc6749) protocol to authenticate work or school accounts from Azure Active Directory (AAD) and personal Microsoft accounts (MSA), such as hotmail.com, outlook.com, and msn.com.

1. [Register an application](authentication-oauth-register.md)

1. [Request user consent](authentication-oauth-consent.md) for your application to manage their Microsoft Advertising accounts

1. [Get access and refresh tokens](authentication-oauth-get-tokens.md)  

1. [Make your first API call](authentication-oauth-quick-start.md)  

> [!TIP]
> For details about how to get access and refresh tokens using the Bing Ads SDKs, see [Authentication With the SDKs](sdk-authentication.md#oauth).  

## Next steps

> [!div class="nextstepaction"]
> [Register an application](authentication-oauth-register.md)


## See Also
[Get started](get-started.md)
