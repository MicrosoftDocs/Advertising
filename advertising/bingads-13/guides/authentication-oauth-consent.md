---
title: "Request user consent"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Request user consent for authentication.
---
# Request user consent

[!INCLUDE[request-header](./includes/mfa-required.md)]

Once you have registered an application you need to get user consent for you to manage their Microsoft Advertising account.  

> [!TIP]
> For troubleshooting help, see the [Common OAuth errors](handle-service-errors-exceptions.md#common-oauth-errors) guide.

> [!IMPORTANT]
> Each user must be prompted and provide consent through a web browser control at least once for your application to manage their Microsoft Advertising accounts. This is a standard OAuth 2.0 flow and is defined in detail in the [Authorization Code Grant section of the OAuth 2.0 spec](https://tools.ietf.org/html/rfc6749#section-4.1). 

The authorization code flow begins with the client directing the user to the `/authorize` endpoint. In this request, the client indicates the permissions it needs to acquire from the user:

> [!NOTE]
> Replace *your_client_id* below with the application (client) ID that the [Azure portal - App registrations](https://go.microsoft.com/fwlink/?linkid=2083908) portal assigned your app.

```https
// Line breaks for legibility only

https://login.microsoftonline.com/{tenant}/oauth2/v2.0/authorize?
client_id=your_client_id
&response_type=code
&redirect_uri=http%3A%2F%2Flocalhost%2Fmyapp%2F
&response_mode=query
&scope=openid%20offline_access%20https%3A%2F%2Fads.microsoft.com%2Fmsads.manage
&state=12345
```

1. Copy the URL below and paste it into your browser to execute this example request for user consent.

> [!NOTE]
> Replace *your_client_id* in the URL below with the application (client) ID that the [Azure portal - App registrations](https://go.microsoft.com/fwlink/?linkid=2083908) portal assigned your app.

```
<https://login.microsoftonline.com/common/oauth2/v2.0/authorize?client_id=your_client_id&response_type=code&redirect_uri=http%3A%2F%2Flocalhost%2Fmyapp%2F&response_mode=query&scope=openid%20offline_access%20https%3A%2F%2Fads.microsoft.com%2Fmsads.manage&state=12345>
```

1. Sign in with your Microsoft account credentials and grant [your app](/entra/identity-platform/quickstart-register-app) consent to manage your Microsoft Advertising accounts.
1. After signing in, your browser should be redirected to `https://localhost/myapp/` with a `code` in the address bar. You can ignore the error message on the page.
1. Next you'll use the code to [get access and refresh tokens](authentication-oauth-get-tokens.md).

The Microsoft identity platform endpoint will also ensure that the user has consented to the permissions indicated in the `scope` query parameter. If the user has not consented to any of those permissions, it will ask the user to consent to the required permissions. Although this guide is primarily focused on managing Microsoft Advertising accounts via `scope=https://ads.microsoft.com/msads.manage`, more details about [permissions and consent in the Microsoft identity platform are provided here](/azure/active-directory/develop/v2-permissions-and-consent).

Once the user authenticates and grants consent, the Microsoft identity platform endpoint will return a response to your app at the indicated `redirect_uri`, using the method specified in the `response_mode` parameter. For example the callback URI includes an authorization code as follows if the user granted permissions for your application to manage their Microsoft Advertising accounts: *http://localhost/myapp/?code=CodeGoesHere&state=12345*.

If the user granted your application permissions to manage their Microsoft Advertising accounts, you should use the code right away in the next step. The short duration of the authorization code, approximately 5 minutes, is subject to change. If the user denied your application permissions to manage their Microsoft Advertising accounts, the callback URI includes an error and error description field as follows: *http://localhost/myapp/?error=access_denied&error_description=ERROR_DESCRIPTION&state=ClientStateGoesHere*. For more details about OAuth errors, please see [Common OAuth Errors](handle-service-errors-exceptions.md#common-oauth-errors) and [Authentication and authorization error codes](/azure/active-directory/develop/reference-aadsts-error-codes).

The following table includes parameters that Bing Ads API clients can include in the consent request. For additional details about optional parameters see the Microsoft identity platform [OAuth 2.0 authorization code flow](/azure/active-directory/develop/v2-oauth2-auth-code-flow) documentation.

|Parameter|Required/Optional|Description|
|--------------|-------------|--------------|
|`client_id`|required|The application (client) ID that the [Azure portal - App registrations](https://go.microsoft.com/fwlink/?linkid=2083908) portal assigned your app.|
|`code_challenge`|recommended|Used to secure authorization code grants via Proof Key for Code Exchange (PKCE). Required if `code_challenge_method` is included. For more information, see the [PKCE RFC](https://tools.ietf.org/html/rfc7636). This is now recommended for all application types - native apps, SPAs, and confidential clients like web apps.|
|`code_challenge_method`|recommended|The method used to encode the `code_verifier` for the `code_challenge` parameter. Can be one of the following values:<br/><br/>- `plain` <br/>- `S256`<br/><br/>If excluded, `code_challenge` is assumed to be plaintext if `code_challenge` is included. Microsoft identity platform supports both `plain` and `S256`. For more information, see the [PKCE RFC](https://tools.ietf.org/html/rfc7636).|
|`prompt`|optional|Indicates the type of user interaction that your application requires. Supported values include the following:<br/>- `prompt=login` will force the user to enter their credentials on that request, negating single-sign on.<br/>- `prompt=none` is the opposite of "login" i.e., it will ensure that the user is not presented with any interactive prompt whatsoever. If the request can't be completed silently via single-sign on, the Microsoft identity platform endpoint will return an interaction_required error.<br/>- `prompt=consent` will trigger the OAuth consent dialog after the user signs in, asking the user to grant permissions to the app.<br/>- `prompt=select_account` will interrupt single sign-on and provide the account selection experience, listing all the accounts in session or any remembered account or an option to choose to use a different account altogether.|
|`redirect_uri`|required|The redirect_uri of your app, where authentication responses can be sent and received by your app. It must exactly match one of the redirect_uris you registered in the portal, except it must be url encoded. For native & mobile apps, you should use the default value of `https://login.microsoftonline.com/common/oauth2/nativeclient`.|
|`response_mode`|recommended|Specifies the method that should be used to send the resulting token back to your app. Can be one of the following:<br/><br/>- `query`<br/>- `fragment`<br/>- `form_post`<br/><br/>`query` provides the code as a query string parameter on your redirect URI. If you're requesting an ID token using the implicit flow, you cannot use `query` as specified in the [OpenID spec](https://openid.net/specs/oauth-v2-multiple-response-types-1_0.html#Combinations). If you're requesting just the code, you can use `query`, `fragment`, or `form_post`. `form_post` executes a POST containing the code to your redirect URI. For more info, see [OpenID Connect protocol](/azure/active-directory/develop/active-directory-protocols-openid-connect-code).|
|`response_type`|required|Must include `code` for the authorization code flow.|
|`scope`|required|A space-separated list of [scopes](/azure/active-directory/develop/v2-permissions-and-consent) that you want the user to consent to. Be sure to include `https://ads.microsoft.com/msads.manage` to prompt the user for Microsoft Advertising access. Include `offline_access` to ensure that a refresh token is included in the response.|
|`state`|recommended|A value included in the request that will also be returned in the token response. It can be a string of any content that you wish. A randomly generated unique value is typically used for [preventing cross-site request forgery attacks](https://tools.ietf.org/html/rfc6749#section-10.12). The value can also encode information about the user's state in the app before the authentication request occurred, such as the page or view they were on.|
|`tenant`|required|The `{tenant}` value in the path of the request can be used to control who can sign into the application. To ensure that your application supports both MSA personal accounts and Azure AD work or school accounts, we suggest that you use `common` as the tenant for Bing Ads API authentication.<br/><br/>In case your application requires another tenant, see [Microsoft identity platform endpoints](/azure/active-directory/develop/active-directory-v2-protocols#endpoints) for more information.|


## Next steps

> [!div class="nextstepaction"]
> [Get access and refresh tokens](authentication-oauth-get-tokens.md)

## See Also
[Get started](get-started.md)
