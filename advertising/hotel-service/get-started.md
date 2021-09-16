---
title: "Get Started with the Hotel API"
description: Provides details about getting credentials and authenticating users.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: eric-urban
ms.author: eur
---

# Get started with the Hotel API

<a name="doyouhavecredentials"></a>

## Do you have your Microsoft Advertising credentials?

To use the Hotel API, you must have a Microsoft Advertising account and a Microsoft account. To get a Microsoft Advertising account, go to <a href="https://ads.microsoft.com" data-raw-source="[https://ads.microsoft.com](https://ads.microsoft.com)">https://ads.microsoft.com</a>. If you're not signed in using your Microsoft account, you're asked to sign in to your Microsoft account or sign up for a Microsoft account. After signing in, you'll have the option to **Sign up for a new Microsoft Advertising account**. Select the sign-up option and continue with the sign-up process.

Unlike the other Bing Ads APIs, the Hotel API does not use a developer token. The API ignores it if you include it.

## Enable your account for Hotel Ads

Your account manager needs to enable your account before you can use Hotel Ads or the API. Please confirm with your account manager that your account is enabled in both the production and sandbox environments.


<a name="authenticatingcredentials"></a>

## Authenticating your credentials

[!INCLUDE[request-header](./includes/mfa-required.md)]

The Hotel API uses the OAuth authentication scheme. For details about authenticating Microsoft account credentials using OAuth, see [Authentication with the Microsoft identity platform](/advertising/guides/authentication-oauth-identity-platform) (using the Microsoft identity platform is recommended). 

You *can* use the [Bing Ads SDK](/advertising/guides/client-libraries) for .NET, Java, or Python to authenticate Microsoft account credentials. For details about using the SDK to get the access token, see [C#](/advertising/guides/get-started-csharp) | [Java](/advertising/guides/get-started-java) | [Python](/advertising/guides/get-started-python). (You should only use the SDK to get the access token if you're using the SDK for Microsoft Advertising campaigns, too. Otherwise, it may not be worth the overhead of installing the SDK.)

If you choose not to use the Bing Ads SDK to get the tokens, see [OAuth C# Example](../hotel-service/code-example-oauth.md) for an example OAuth implementation.

> [!NOTE]
> If you use the API from a service, see [Using the Hotel API from a service](get-started-service.md). 

### Authenticating your credentials in sandbox

For the sandbox environment, the following are the endpoints you must use to get Microsoft accounts and your application's client ID. Wherever you see endpoints mentioned in [Authentication with OAuth](/advertising/guides/authentication-oauth), substitute them with the following sandbox endpoints.

 - partner.api.sandbox.bingads.microsoft.com&mdash;Endpoint for the Hotel API's sandbox
 - account.microsoft-int.com&mdash;Endpoint for getting a sandbox Microsoft account 
 - outlook-int.com&mdash;Endpoint for sandbox email used when getting a sandbox Microsoft account
 - **Skip the step to register an app**. Sandbox does not support app registration. Instead, use the "Sandbox Tutorial App" client ID, which is **db41b09d-6e50-4f4a-90ac-5a99caefb52f**. This client ID is for desktop apps only and may not be used for testing web apps.
 - login.windows-ppe.net&mdash;Endpoint for OAuth requests

<a name="getsicredentials"></a>

## Getting sandbox credentials

### Get a sandbox account if you don't already have one

You use the sandbox environment to test your application before putting it in production. Use the following steps to get a sandbox account.

1.	Open a browser and navigate to https:\//sandbox.bingads.microsoft.com.
2.	Click **Sign up for Microsoft Advertising** or **Sign up now**.
3.	Fill out the **Create Account** form.  
  
  - Choose the **Create a new email address** option.
  - Enter an MSA email address. The email server must be outlook<strong>-int</strong>.com (for example, someone@outlook-int.com).  
  
    > [!IMPORTANT]  
    > Sandbox supports MSAs created using an @outlook<strong>-int</strong>.com email account only. You may not use an @outlook.com email account. Also, you may not use an email account from another email service (for example, @gmail.com) even if the account is linked to an @outlook.com or @outlook<strong>-int</strong>.com email account.  
  
  - Finish the work flow by specifying the rest of your user information.  

4.	For **Import/Create Campaign**, click **Skip campaign creation**
5.	For **Go Live**, click **Skip payment information**


After creating your sandbox account and getting your MSA, let your account manager know so they can enable it for Hotel Ads. You won't be able to use Hotel Ads or the API in sandbox until it's enabled.

> [!NOTE]
> The MSA signup process returns you to the SI Microsoft Advertising user interface (ui.si.bingads.microsoft.com). After completing the MSA process, sign out of the SI interface. To access Hotel Ads using the Microsoft Advertising user interface in sandbox, go to <a href="https://ui.sandbox.bingads.microsoft.com" data-raw-source="[https://ui.sandbox.bingads.microsoft.com](https://ui.sandbox.bingads.microsoft.com)">https://ui.sandbox.bingads.microsoft.com</a> and sign in using your new MSA email address.


<a name="wheretousecredentials"></a>

## Where do you use your credentials?

After getting the user's OAuth access token, set the Authorization header to it.

```c#
var headers = new WebHeaderCollection();
headers.Add(HttpRequestHeader.Authorization, "Bearer " + tokens.AccessToken);
```

For information about the Authorization header and other headers that the request and response may contain, see [Headers](../hotel-service/reference.md#headers). 

> [!NOTE]
> The Hotel API uses the standard Authorization header. If you use the Bing Ads SDK to get the OAuth tokens, you'll use the SDK to get the tokens and then set the Authorization header.

<a name="feeds"></a>

## Do you have your hotel feed set up?

Before using the Hotel API, you should have your hotel feeds set up. For details, see:

- [Hotel Feed](../hotel-feed/hotel-feed.md)
- [Points of Sale Feed](../pos-feed/pos-feed.md) 
- [Transaction Message](../transaction-message/transaction-message.md) 




