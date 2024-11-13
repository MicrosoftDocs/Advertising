---
title: "Walkthrough: Bing Ads API Desktop Application in PHP"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Create a desktop application using the Bing Ads PHP SDK.
dev_langs:
  - php
---
# Walkthrough: Bing Ads API Desktop Application in PHP
This guide describes how you can download PHP samples for Bing Ads API from the [GitHub source](https://github.com/BingAds/BingAds-PHP-SDK), edit with your credentials, and run in a local console. 

By default the samples are ready to run in the sandbox environment. If you are targeting the production environment, then you'll also need your production [developer token](get-started.md#get-developer-token). You'll also need to register an application and take note of the Application Id that will be used as the *ClientId* in the walkthrough below. For more details about registering an application and the authorization code grant flow, see [Authentication with OAuth](authentication-oauth.md).  

## <a name="code"></a>Code Walkthrough

1. Navigate to an empty local directory e.g. *c:\dev\BingAdsPHP* and [install](get-started-php.md#installation) the Bing Ads PHP SDK e.g., type `composer require microsoft/bingads`. You should now see the vendor directory which contains both the SDK source and samples. 
2. Copy the *V13* directory (with included samples) to your local project directory e.g. copy from *c:\dev\BingAdsPHP\vendor\microsoft\bingads\samples* to *c:\dev\BingAdsPHP*.      
3. By default the samples are ready to run in the sandbox environment. To use production, within *c:\dev\BingAdsPHP\V13\AuthHelper.php*, set the *ApiEnvironment* to ```ApiEnvironment::Production``` and edit the *ClientId* with the Application Id that was provisioned when you registered your application. You'll also need to edit the *DeveloperToken* value with your production [developer token](get-started.md#get-developer-token). 
4. At the console command prompt run the sample e.g. type `php .\V13\SearchUserAccounts.php`.
5. You should be prompted to copy and paste the authorization URL into a web browser. The one time user consent is required, and thereafter you will be able to use the refresh token to request new access and refresh tokens.
6. After authorizing your application to manage your Microsoft Advertising accounts, copy the resulting URL (with *code* parameter) and paste it into the console window. Then press the *Enter* (return) key to continue execution.
7. The refresh token will be written to *refresh.txt*. Subsequent calls to the *Authenticate* helper function will attempt to read the refresh token from the same location. You can change the location by editing the *OAuthRefreshTokenPath* setting within *AuthHelper.php*.

   > [!IMPORTANT] 
   > This quick start example is not recommended as-is in production. You should only store the refresh token in a secure location.

## See Also
[Bing Ads API Code Examples](code-examples.md)  
[Bing Ads API Web Service Addresses](web-service-addresses.md)  

