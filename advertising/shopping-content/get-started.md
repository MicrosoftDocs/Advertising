---
title: "Get Started with the Content API"
description: "Learn how to get started using the Content API."
author: jonmeyers
ms.service: "bing-ads-shopping-content"
ms.topic: "article"
ms.author: jonmeyers
---

# Get Started with the Content API

<a name="credentials"></a>
To use the Content API, you'll need a couple of things:

1. A Microsoft account
1. A Microsoft Advertising account
1. A developer token

To get a Microsoft Advertising account, go to [https://ads.microsoft.com](https://ads.microsoft.com). If you're not signed in to your Microsoft account, you're redirected to sign in to your account or to sign up for one. After signing in, you'll have the option to **Sign up for a new Microsoft Advertising account**. Select the sign up option and click **Continue**.

Next, if you don't already have a Microsoft Advertising developer token for the production environment, go to the [Developer Portal](https://developers.ads.microsoft.com/account). Click **Request Token** and provide the requested information. If you use the API to manage your own account, you'll receive your token immediately; however, if you're managing accounts for others, it may take up to five business days to get a token.

## <a name="authentication"></a> Authenticating your credentials

[!INCLUDE[request-header](./includes/mfa-required.md)]

Content API uses the same authentication schemes as Bing Ads API. For details about authenticating Microsoft account credentials with OAuth, see [Authentication with the Microsoft identity platform](/advertising/guides/authentication-oauth-identity-platform). 

You *can* use the [Bing Ads SDK](/advertising/guides/client-libraries) for .NET, Java, or Python to authenticate Microsoft account credentials. For details about using the SDK to get the access token, see [C#](/advertising/guides/get-started-csharp) | [Java](/advertising/guides/get-started-java) | [Python](/advertising/guides/get-started-python). For a Content API example that uses the SDK for authentication, see [Managing products example](code-example-manage-products.md).

(Note that the Bing Ads SDK does not provide interfaces for Content API. You should only use the SDK to get the access token if you're using the SDK for Microsoft Advertising campaigns, too. Otherwise, it may not be worth the overhead of installing the SDK.)

If you don't use the Bing Ads SDK for authentication, see [Authenticating Microsoft Account Credentials in C#](../shopping-content/code-example-authentication-oauth.md) for an example that shows how to use OAuth to authenticate Microsoft account credentials.

## Where to use your credentials and developer tokens?

To use credentisls and developer tokens you'll need a couple of things:

- The DeveloperToken header that's set to your developer token.
- The AuthenticationToken header that's set to your access token.

If you manage catalogs on behalf of other customers, you must also set the following headers:

- The CustomerId header that's set to the customer ID of the customer whose store you're managing
- The CustomerAccountId header that's set to the account ID of any of the customer's accounts that you manage (it doesn't matter which managed account). 

For information about these and other headers that the request and response may contain, see [Headers](../shopping-content/products-resource.md#headers). 

## <a name="configurebmc"></a> Configuring Microsoft Merchant Center to use the API

For an overview of Microsoft Merchant Center (MMC), see [What is Microsoft Merchant Center?](https://help.ads.microsoft.com/#apex/3/en/51083/1) The topic includes links to all the Merchant Center topics and related videos.

You must complete the following steps if you haven't already done so.

1. [Verify and claim your Website's URL](https://help.ads.microsoft.com/#apex/3/en/50888/1)
  To get the webmaster tools mentioned in Verify and claim your Website's URL, see [Bing Webmaster Tools](https://www.bing.com/toolbox/webmaster). Sign in with the same Microsoft account that you use for Microsoft Advertising. For more information about using the tool, see [Verify Ownership of Your Website](https://www.bing.com/webmasters/help/add-and-verify-site-12184f8b). 
2. [Create a Microsoft Merchant Center store](https://help.ads.microsoft.com/#apex/3/en/51085/1)
3. [Add a catalog](https://help.ads.microsoft.com/#apex/3/en/51105/1)

When you create a MMC store, the process creates a default catalog for you. The store and all catalogs that you create are automatically enabled for API management. The store contains a default catalog that all product operations (add, update, delete, and get) apply to by default. To specify a different catalog, use the [bmc-catalog-id](../shopping-content/products-resource.md#bmccatalogid) query parameter in the resource URL. 

To add and enable catalogs, use the [Catalogs](../shopping-content/catalogs-resource.md) resource. For more information, see [Managing your Catalogs](../shopping-content/manage-catalogs.md).

> [!NOTE] 
> In certain circumstances, you can use the API and FTP/SFTP to update a catalog feed. For information about using the API with FTP/SFTP, see [Can I Use the API and FTP/SFTP?](../shopping-content/can-use-api-ftp.md) 


## Next Steps
Now that you're ready to start using the API, see the following sections.

- [Testing your Code in sandbox](../shopping-content/test-code-sandbox.md)
- [Managing your Catalogs](../shopping-content/manage-catalogs.md)
- [Managing your Products](../shopping-content/manage-products.md) 
