---
title: "Register an application"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Authenticate for Bing Ads API using the Microsoft identity platform endpoint for developers.
---
# Register an application

[!INCLUDE[request-header](./includes/mfa-required.md)]

Before your application can authenticate Microsoft Advertising users, you must [register your application in an Azure Active Directory (AAD) tenant](https://learn.microsoft.com/en-us/entra/identity-platform/quickstart-register-app#register-an-application) and get the corresponding client ID and client secret.  

1. Navigate to the Microsoft identity platform for developers in the [Azure portal - App registrations](https://go.microsoft.com/fwlink/?linkid=2083908) page. You can log in using or a Work or School Account. *Note*: You can no longer log in using a personal Microsoft account.
1. Select **New registration**. 
1. When the **Register an application page** appears, enter your application's registration information: 
    - In the **Name** section, enter a meaningful application name that will be displayed to users of the app, for example `My browserless client`. 
    - In the **Supported account types** section, select **Accounts in any organizational directory and personal Microsoft accounts**. 

    ![Supported account types](media/supported-account-types.png "Supported account types")  

    > [!IMPORTANT]
    > You must select **Accounts in any organizational directory and personal Microsoft accounts** during the initial app registration. This setting cannot be updated later in the portal unless you modify the [application manifest](/azure/active-directory/develop/reference-app-manifest) e.g., ```"signInAudience": "AzureADandPersonalMicrosoftAccount"```.  

1. Select **Register** to create the application. 
1. On the app **Overview** page, find the **Application (client) ID** value and record it for later. You will use it as the `client_id` when you [request user consent](authentication-oauth-consent.md) and [get an access token](authentication-oauth-get-tokens.md).  
1. Select the **Add a Redirect URI** link and then you should see the **Redirect URIs** page. 
   - For web applications, provide the base URL of your application. For example, http://localhost:31544 might be the URL for a web application running on your local machine. Users would use this URL to sign into a web client application.  
   - For public applications, locate the **Suggested Redirect URIs for public clients (mobile, desktop)** section. Select the **https://login.microsoftonline.com/common/oauth2/nativeclient** URI. 
   
    > [!IMPORTANT]
    > Clients running apps on services that span regions and devices such as Microsoft Azure should register a web application with client secret. You can get a refresh token on one device and refresh it on another so long as you have the same client ID and client secret. If you register a public application without a client secret, then you cannot use a refresh token across devices. A confidential token is bound to the client secret. 

1. For web applications, select **Certificates & secrets** under **Manage**. Select the **New client secret** button. Enter a value in **Description**, select any option for **Expires** and choose **Add**. Copy the client secret value before leaving the page. You will use it later as the `client_secret` to [get an access token](authentication-oauth-get-tokens.md). 

## Application behavior 
1. Registered application behavior is determined by how your Azure AAD tenant has been set up and how users can provide the consent for any app during authentication process. Your Azure AAD tenant administrator can review user consent settings here: **https://learn.microsoft.com/azure/active-directory/manage-apps/configure-user-consent?pivots=portal#configure-user-consent-settings**.
    - If you are trying to authenticate but receive error [AADSTS650052](https://learn.microsoft.com/advertising/guides/handle-service-errors-exceptions?view=bingads-13#aadsts650052), there are a few different root causes for this issue. This likely means that the Microsoft Advertising application ID (d42ffc93-c136-491d-b4fd-6f18168c68fd) doesn't exist in your tenant. This can happen if you are trying to authenticate to a tool provider and never created your own Azure App registration and added *msads.manage* to it. To fix this, you will need to contact the Active Directory administrator and have them run the following Graph API call to add the Microsoft Advertising app to your tenant.<br/>
    ~~~
    POST https://graph.microsoft.com/v1.0/servicePrincipals
    Content-type: application/json
    {
      "appId": "d42ffc93-c136-491d-b4fd-6f18168c68fd"
    }
    ~~~
    - After running the above command, you may also need to have your administrator grant consent to your tool provider by running the following URL in your browser. This URL grants consent to SA 360. Please replace "client_id=1234" with your tool provider's client ID and replace "tenantID" with your tenant ID: https<span>://login.microsoftonline</span>.com/"tenantID"/v2.0/adminconsent?client_id=340615a8-1132-4916-80c7-697a67c6c353&state=12345&scope=d42ffc93-c136-491d-b4fd-6f18168c68fd/msads.manage
    - If you are still experiencing issues after following the above steps, please [contact support](https://learn.microsoft.com/en-us/advertising/guides/handle-service-errors-exceptions?view=bingads-13#contact-support).  

## Next steps
> [!div class="nextstepaction"]
> [Request user consent](authentication-oauth-consent.md)


## See Also
[Get started](get-started.md)
