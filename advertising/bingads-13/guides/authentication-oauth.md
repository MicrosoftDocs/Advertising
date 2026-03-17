---
title: Authentication with OAuth
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Authenticate for Bing Ads API using OAuth.
---
# Authentication with OAuth

## Authentication with Entra ID

[!INCLUDE[request-header](./includes/mfa-required.md)]

> [!NOTE]
> Microsoft Advertising APIs use Azure Entra ID (formerly Azure AD) for authentication. If you encounter issues related to app registration, tenant access, admin consent, or OAuth token acquisition, please [contact Azure Support](https://azure.microsoft.com/support) or your tenant administrator.
>

Consider the user that you want to sign in e.g., example@contoso.com. The Bing Ads API will not accept that email address and password. Instead you need to set the AuthenticationToken header element that contains a user access token. You can think of an access token as representing a user name and password.

How can you get an access token for a user? As an application developer you'll use a Microsoft authorization URL to prompt the Microsoft Advertising user for consent. Once a user provides consent, you can get an access token and act on behalf of the user.  

Microsoft Advertising leverages the [Microsoft identity platform endpoint for developers](/azure/active-directory/develop/v2-oauth2-auth-code-flow) and the [OAuth 2.0](https://tools.ietf.org/html/rfc6749) protocol to authenticate work or school accounts from Azure Active Directory (AAD) and personal Microsoft accounts (MSA), such as hotmail.com, outlook.com, and msn.com.

1. [Register an application](authentication-oauth-register.md)

2. [Request user consent](authentication-oauth-consent.md) for your application to manage their Microsoft Advertising accounts

3. [Get access and refresh tokens](authentication-oauth-get-tokens.md)  

4. [Make your first API call](authentication-oauth-quick-start.md)  

> [!TIP]
> For details about how to get access and refresh tokens using the Bing Ads SDKs, see [Authentication With the SDKs](sdk-authentication.md#oauth).  

### Next steps (Entra ID)

> [!div class="nextstepaction"]
> [Register an application](authentication-oauth-register.md#)

## Authentication with Google OAuth

Microsoft Advertising APIs support **Google OAuth 2.0** as an additional authentication option, alongside **Microsoft identity (Azure Entra ID)**.

- Google OAuth is added as an **alternative identity provider**, not a replacement.
- **Microsoft identity OAuth** continues to be supported with no behavior changes.
- **Google OAuth 2.0** is a newly supported authentication option.
- A new request header, `IdentityProvider`, is introduced.
- The **Developer Token requirement remains unchanged**.

1. [Register an application](authentication-oauth-register.md#register-your-application-with-google-oauth)

2. [Request user consent](authentication-oauth-consent.md#request-user-consent-with-google-oauth) for your application to manage their Google accounts.

3. [Get access and refresh tokens](authentication-oauth-get-tokens.md#get-access-and-refresh-tokens-with-google-oauth)  

4. [Make your first API call](authentication-oauth-quick-start.md)  

### Next steps (Google OAuth)

> [!div class="nextstepaction"]
> [Register an application](authentication-oauth-register.md#register-your-application-with-google-oauth)

## See Also

[Get started](get-started.md)
