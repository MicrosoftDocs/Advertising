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

[!INCLUDE[request-header](./includes/mfa-required.md)]

> [!NOTE]
> Microsoft Advertising APIs use Azure Entra ID (formerly Azure AD) for authentication. If you encounter issues related to app registration, tenant access, admin consent, or OAuth token acquisition, please [contact Azure Support](https://azure.microsoft.com/support) or your tenant administrator.
>
> [!IMPORTANT]
> Microsoft Advertising APIs now support **Google OAuth 2.0** as an additional authentication option, alongside **Microsoft identity (Azure Entra ID)**.
>
> - Google OAuth is added as an **alternative identity provider**, not a replacement.
> - **Microsoft identity OAuth** continues to be supported with no behavior changes.
> - **Google OAuth 2.0** is a newly supported authentication option.
> - A new request header, `IdentityProvider`, is introduced.
> - The **Developer Token requirement remains unchanged**.

Consider the user that you want to sign in e.g., example@contoso.com. The Bing Ads API will not accept that email address and password. Instead you need to set the AuthenticationToken header element that contains a user access token. You can think of an access token as representing a user name and password.

How can you get an access token for a user? As an application developer you'll use a Microsoft authorization URL to prompt the Microsoft Advertising user for consent. Once a user provides consent, you can get an access token and act on behalf of the user.  

Microsoft Advertising leverages the [Microsoft identity platform endpoint for developers](/azure/active-directory/develop/v2-oauth2-auth-code-flow) and the [OAuth 2.0](https://tools.ietf.org/html/rfc6749) protocol to authenticate work or school accounts from Azure Active Directory (AAD) and personal Microsoft accounts (MSA), such as hotmail.com, outlook.com, and msn.com.

1. [Register an application](authentication-oauth-register.md)

1. [Request user consent](authentication-oauth-consent.md) for your application to manage their Microsoft Advertising accounts

1. [Get access and refresh tokens](authentication-oauth-get-tokens.md)  

1. [Make your first API call](authentication-oauth-quick-start.md)  

> [!TIP]
> For details about how to get access and refresh tokens using the Bing Ads SDKs, see [Authentication With the SDKs](sdk-authentication.md#oauth).  

## Register your application with Google OAuth

To authenticate users using Google OAuth 2.0, you must register your application in the Google Cloud Console and create OAuth 2.0 credentials (a Client ID and Client Secret).

1. Open the [Google Cloud Console OAuth credentials page](https://console.cloud.google.com/apis/credentials/oauthclient).

2. Select an existing project or create a new one.

3. Configure the **OAuth consent screen**, if it hasn't already been set up.

4. In the **Credentials** section, select **Create Credentials** and select **OAuth client ID**.

5. Choose the appropriate **Application type** (e.g., **Web application**) and configure your **Authorized redirect URIs**.

6. After the credentials are created, copy the **Client ID** and **Client Secret**. These values are required for the OAuth flow.

If you encounter issues, refer to the official Google documentation, [Get started with the Google Auth Platform (Google Cloud Platform Console Help)](https://support.google.com/cloud/answer/15544987?hl=en&ref_topic=15540269&sjid=4811528590365052532-NC).

## Next steps

> [!div class="nextstepaction"]
> [Register an application](authentication-oauth-register.md)


## See Also
[Get started](get-started.md)
