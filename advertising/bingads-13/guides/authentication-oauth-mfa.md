---
title: "Multi-factor authentication requirement"
ms.service: "bing-ads"
ms.topic: "article"
author: eric-urban
ms.author: eur
description: Details about the multi-factor authentication requirement for Bing Ads API.
dev_langs:
  - csharp
  - java
  - php
  - python
---
# Multi-factor authentication requirement

We already require multi-factor authentication in Microsoft Advertising online. Multi-factor authentication is a security process that requires you to verify your identity in two different ways.  

> [!IMPORTANT]
> Starting March 1st, 2022 we will require [multi-factor authentication](authentication-oauth-mfa.md) for all users who sign in through a third-party application that uses the Bing Ads API, Content API, and Hotel APIs.
>
> You must update your application to [get user consent](authentication-oauth-consent.md) using the new ```msads.manage``` scope. All application developers must take action to use the new scope.

The new ```msads.manage``` scope **requires renewed consent from all users of your application**. You must prompt users for consent using the new ```msads.manage``` scope whether or not they have turned on multi-factor authentication. This ensures that they provide a second form of identification or proof when granting consent to your application.  

## Action required

You must update your application and prompt users for consent using  ```msads.manage ``` scope via the Microsoft identity platform endpoint. All Microsoft Advertising developers must take action to use the new scope.  

With each API request we will check the access token to ensure the user granted consent via the new  ```msads.manage ``` scope. Upon enforcement of multi-factor authentication, any access token provisioned otherwise won’t be accepted.  

We recommend that you make the necessary changes as soon as possible.  

We also recommend that you inform and guide users of your application to [set up MFA](/azure/active-directory/user-help/multi-factor-authentication-end-user-first-time#who-decides-if-you-use-this-feature) so that a second proof will be required when they grant permissions for any application. For the Microsoft Advertising requirement, it isn't enough for them to turn on MFA. Either way you must get user consent by prompting with the ```msads.manage ``` scope. 

## After enforcement

Upon enforcement of MFA, we will only authenticate access tokens on behalf of a user who granted consent to your application via the ```msads.manage``` scope on the **Microsoft identity platform endpoint**.

- Prior to MFA enforcement the **Microsoft identity platform endpoint** supports the ```ads.manage``` scope. Access tokens that you acquire for users via the ads.manage scope will no longer be accepted.

- Prior to MFA enforcement the Live Connect endpoint supports the ```bingads.manage``` scope. The **Live Connect** endpoint is already deprecated and will no longer be supported. Access tokens that you acquire for users via the ```bingads.manage``` scope will no longer be accepted.

## SDK support 

Support for the new  ```msads.manage scope ``` is available starting with version 13.0.10 of  Bing Ads SDKs (.NET, Java, Python, and PHP).  

The new  ```msads.manage ``` scope is used by default. For backwards compatibility, until the enforcement date you can use the ```ads.manage ``` or  ```bingads.manage ``` scopes with a short workaround.  

```csharp
var oAuthDesktopMobileAuthCodeGrant = new OAuthDesktopMobileAuthCodeGrant(
    Settings.Default["ClientId"].ToString(),
    apiEnvironment,
    OAuthScope.ADS_MANAGE // temporary workaround; remove or use MSADS_MANAGE instead
);
```
```java
OAuthDesktopMobileAuthCodeGrant oAuthDesktopMobileAuthCodeGrant = new OAuthDesktopMobileAuthCodeGrant(
    ClientId, 
    ApiEnvironment,
    OAuthScope.ADS_MANAGE // temporary workaround; remove or use MSADS_MANAGE instead
);
```
```php
$authentication = (new OAuthDesktopMobileAuthCodeGrant())
    ->withClientId(ClientId)
    ->withEnvironment(ApiEnvironment)
    ->withOAuthScope(OAuthScope::ADS_MANAGE); // temporary workaround; remove or use MSADS_MANAGE instead
```
```python
oauth_web_auth_code_grant = OAuthDesktopMobileAuthCodeGrant(
    client_id=CLIENT_ID,
    env=ENVIRONMENT,
    oauth_scope="ads.manage" # temporary workaround; remove or use "msads.manage" instead
)
```

## Example scenarios

Here are example scenarios that might apply to your business. 

### Example: Get a new access token by refreshing with a different scope

An access token represents permissions by a user to act on their behalf with limited permissions based on scopes. When you request consent to manage their accounts you set the scope parameter to either **ads.manage** and **msads.manage**. You are really asking for a user access token that has permissions for whatever is defined by the scope.

> [!IMPORTANT]
> Upon enforcement of multi-factor authentication, an access token will only be accepted if it was provisioned or refreshed via the **msads.manage** scope. You can continue refreshing the tokens via **ads.manage**, but the Bing Ads API will not accept them. 

To confirm that an access token will be accepted upon enforcement of multi-factor authentication, you can check the response scope. If the scope includes **msads.manage** then it will be accepted.

Let’s say for example, that currently a user consents for your application to manage their accounts via both **ads.manage** and **msads.manage** scopes. They may have granted consent via **ads.manage** last month and then granted consent via **msads.manage** this month.

If you refresh the token with **ads.manage** the token refresh response will include the **ads.manage** scope. Upon enforcement of multi-factor authentication, "MyAccessToken-1" would not be accepted.

```json
{
    "token_type":"Bearer",
    "scope":"https://ads.microsoft.com/ads.manage",
    "expires_in":3600,
    "ext_expires_in":3600,
    "access_token":"MyAccessToken-1",
    "refresh_token":"MyRefreshToken-1"
}
```

If you refresh the token with **msads.manage** the token refresh response will include both **ads.manage** and **msads.manage** scopes. Upon enforcement of multi-factor authentication, "MyAccessToken-2" would be accepted.

```json
{
    "token_type":"Bearer",
    "scope":"https://ads.microsoft.com/msads.manage https://ads.microsoft.com/ads.manage",
    "expires_in":3600,
    "ext_expires_in":3600,
    "access_token":"MyAccessToken-2",
    "refresh_token":"MyRefreshToken-2"
}
```

An **invalid_grant** error will be returned if you attempt to refresh the token using any scope where the user does not currently provide consent.  

```json
{
    "error":"invalid_grant",
    "error_description":"AADSTS70000: The request was denied because one or more scopes requested are unauthorized or expired. The user must first sign in and grant the client application access to the requested scope."
}
```

## See Also

[OAuth FAQ](faq.yml)
[Request user consent](authentication-oauth-consent.md)
