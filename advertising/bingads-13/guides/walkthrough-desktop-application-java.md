---
title: Walkthrough - Bing Ads API Desktop Application in Java
ms.service: bing-ads
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Create a desktop application using the Bing Ads Java SDK.
dev_langs:
  - java
---
# Walkthrough: Bing Ads API Desktop Application in Java
This guide describes how you can download Java examples for Bing Ads API from the [GitHub source](https://github.com/BingAds/BingAds-Java-SDK), edit with your credentials, and run in a local console. 

By default the examples are ready to run in the sandbox environment. If you are targeting the production environment, then you'll also need your production [developer token](get-started.md#get-developer-token). You'll also need to register an application and take note of the Application Id that will be used as the *ClientId* in the walkthrough below. For more details about registering an application and the authorization code grant flow, see [Authentication with OAuth](authentication-oauth.md).  

## <a name="code"></a>Code Walkthrough

1. Install [Visual Studio Code](https://code.visualstudio.com/) and the [Debugger for Java ](https://marketplace.visualstudio.com/items?itemName=vscjava.vscode-java-debug). You can modify these steps if you are already familiar with another editor or development environment. 
1. Download and install [Git](https://git-scm.com/downloads). 
1. Navigate to an empty local directory e.g. *c:\dev\BingAdsJava* and clone the Bing Ads Java SDK e.g., type `git clone https://github.com/BingAds/BingAds-Java-SDK.git`. You should now see the SDK directory which contains both the SDK source and examples. 
1. Open Visual Studio Code and open the BingAdsDesktopApp directory (File...Open Folder...) e.g., *C:\dev\BingAdsJava\BingAds-Java-SDK\examples\BingAdsDesktopApp*.  
1. By default the examples are ready to run in the sandbox environment. To use production, within *C:\dev\BingAdsJava\BingAds-Java-SDK\examples\BingAdsDesktopApp\src\main\java\com\microsoft\bingads\examples\ExampleBase.java*, set the *API_ENVIRONMENT* to ```ApiEnvironment.PRODUCTION``` and edit the *ClientId* with the Application Id that was provisioned when you registered your application. You'll also need to edit the *DeveloperToken* value with your production [developer token](get-started.md#get-developer-token). 
1. Add Maven dependency for Microsoft.bingads to your project before making API calls.
1. Right-click SearchUserAccounts.java and then click Run. 
1. You should be prompted to copy and paste the authorization URL into a web browser. The one time user consent is required, and thereafter you will be able to use the refresh token to request new access and refresh tokens.
1. After authorizing your application to manage your Microsoft Advertising accounts, copy the resulting URL (with *code* parameter) and paste it into the console window. Then press the *Enter* (return) key to continue execution.
1. The refresh token will be written to *refresh.txt*. Subsequent calls to the *authenticateWithOAuth* helper function will attempt to read the refresh token from the same location. You can change the location by editing the *RefreshTokenPath* setting within *ExampleBase.java*.

   > [!IMPORTANT] 
   > This quick start example is not recommended as-is in production. You should only store the refresh token in a secure location.


## See Also
[Sandbox](sandbox.md)  
[Bing Ads API Code Examples](code-examples.md)  
[Bing Ads API Web Service Addresses](web-service-addresses.md)  

