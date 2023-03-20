---
title: "Walkthrough: Bing Ads API Web Application in PHP"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Create a web application using the Bing Ads PHP SDK.
dev_langs:
  - php
---
# Walkthrough: Bing Ads API Web Application in PHP
This example PHP web application prompts for user consent via the credentials that you provide, and then gets the accounts that the authenticated user can access. 

You must first register an application and take note of the client ID (registered application ID), client secret (registered password), and redirection URI. For more details about registering an application and the authorization code grant flow, see [Authentication with OAuth](authentication-oauth.md).  

You'll also need your production [developer token](get-started.md#get-developer-token). You can create the example step by step as described below or download more examples from [GitHub](https://github.com/BingAds/BingAds-dotNet-SDK/tree/main/examples/BingAdsExamples). 

## <a name="webapp"></a>Web Application Authentication Example Walk-Through

1. Create a new file named *Index.php*, and add the code as shown in the following example.

    ```php
    <?php
    namespace Microsoft\BingAds\Samples;

    require_once "./vendor/autoload.php";

    include "WebAuthHelper.php";

    // Specify the Microsoft\BingAds\Samples classes that will be used.
    use Microsoft\BingAds\Samples\WebAuthHelper;

    ?>

    <!-- 
    Display a small form with a login button. In your application, you would implement code to allow
    the user to either log into your service or create a new account. 
    -->
    <h2>Microsoft Advertising OAuth Demo</h2>

    <p>This application would like to manage your Microsoft Advertising data. Click below to login and authorize this application.</p>

    <p>When you click OK below, you'll be redirected to the following URI:</p>
    <p><?php echo WebAuthHelper::RedirectUri ?></p>

    <!-- 
    When the user presses this button, they will be redirected to fully formed URL to request an authorization token. 
    From here, the user will be redirected to the RedirectUri where the authorization token can be extracted. 
    -->
    <input type="button" onClick="return window.location='<?php echo WebAuthHelper::RedirectUri;?>';" value="OK" />
    ```

2. Create a new file named *OAuth2Callback.php*, and add the code as shown in the following example. 

    ```php
    <?php
    namespace Microsoft\BingAds\Samples;

    require_once "./vendor/autoload.php";

    include "WebAuthHelper.php";

    // Specify the Microsoft\BingAds\Auth classes that will be used.
    use Microsoft\BingAds\Auth\AuthorizationData;
    use Microsoft\BingAds\Auth\OAuthTokenRequestException;
    use Microsoft\BingAds\Auth\OAuthWebAuthCodeGrant;

    // Specify the Microsoft\BingAds\Samples classes that will be used.
    use Microsoft\BingAds\Samples\WebAuthHelper;

    use Exception;

    try 
    {
        session_start();

        if(!isset($_SESSION['AuthorizationData']) || !isset($_SESSION['AuthorizationData']->Authentication))
        {
            // Prepare the OAuth object for use with the authorization code grant flow. 
            // It is recommended that you specify a non guessable 'state' request parameter to help prevent
            // cross site request forgery (CSRF). 
            $authentication = (new OAuthWebAuthCodeGrant())
                ->withClientId(WebAuthHelper::ClientId)
                ->withClientSecret(WebAuthHelper::ClientSecret)
                ->withRedirectUri('https://' . $_SERVER['HTTP_HOST'] . WebAuthHelper::RedirectUri)
                ->withState(rand(0,999999999)); 

            // Assign this authentication instance to the global authorization_data. 

            $_SESSION['AuthorizationData'] = (new AuthorizationData())
                ->withAuthentication($authentication)
                ->withDeveloperToken(WebAuthHelper::DeveloperToken);

            $_SESSION['state'] = $_SESSION['AuthorizationData']->Authentication->State;
            
            // The user needs to provide consent for the application to access their Microsoft Advertising accounts.
            header('Location: '. $_SESSION['AuthorizationData']->Authentication->GetAuthorizationEndpoint());
        }
        
        // If the current HTTP request is a callback from the Microsoft Account authorization server,
        // use the current request url containing authorization code to request new access and refresh tokens
        if(isset($_GET['code']))
        {   
            // Verify whether the 'state' value is the same random value we created
            // when the authorization request was initiated.
            if ($_GET['state'] != $_SESSION['state'])
            {
                throw new Exception(sprintf(
                    "The OAuth response state (%s) does not match the client request state (%s)", 
                    $_GET['state'], 
                    $_SESSION['state']));
            }   
            
            $_SESSION['AuthorizationData']->Authentication->RequestOAuthTokensByResponseUri(
                $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
                    
            header('Location: '. '/CallBingAdsServices.php');
        }
    }
    catch(OAuthTokenRequestException $e)
    {
        // The user could not be authenticated or the grant is expired. 
        // The user must first sign in and if needed grant the client application access to the requested scope.
        print $e;
    }
    catch(Exception $e)
    {
        print $e;
    }    
    ```
3. Create a new file named *CallBingAdsServices.php*, and add the code as shown in the following example.

    ```php
    <?php
    namespace Microsoft\BingAds\Samples;

    require_once "./vendor/autoload.php";

    include "WebAuthHelper.php";

    // Specify the Microsoft\BingAds\Auth classes that will be used.
    use Microsoft\BingAds\Auth\AuthorizationData;
    use Microsoft\BingAds\Auth\ServiceClient;
    use Microsoft\BingAds\Auth\ServiceClientType;

    // Specify the Microsoft\BingAds\V13\CustomerManagement classes that will be used.
    use Microsoft\BingAds\V13\CustomerManagement\GetUserRequest;
    use Microsoft\BingAds\V13\CustomerManagement\SearchAccountsRequest;
    use Microsoft\BingAds\V13\CustomerManagement\Paging;
    use Microsoft\BingAds\V13\CustomerManagement\Predicate;
    use Microsoft\BingAds\V13\CustomerManagement\PredicateOperator;

    // Specify the Microsoft\BingAds\Samples classes that will be used.
    use Microsoft\BingAds\Samples\WebAuthHelper;

    use Exception;

    session_start();

    // If there is no user authenticated, go back to the site index.

    if(!isset($_SESSION['AuthorizationData']) || 
    !isset($_SESSION['AuthorizationData']->Authentication) || 
    !isset($_SESSION['AuthorizationData']->Authentication->OAuthTokens)
    )
    {
        header('Location: '. 'https://' . $_SERVER['HTTP_HOST']);
    }
    else {
        // If a refresh token is already present, use it to request new access and refresh tokens.
        // You should store refresh tokens securely i.e. not in session as shown in this demo.

        $refreshToken = $_SESSION['AuthorizationData']->Authentication->OAuthTokens->RefreshToken;
        if($refreshToken != null)
        {
            $_SESSION['AuthorizationData']->Authentication->RequestOAuthTokensByRefreshToken($refreshToken);
        }

        printf("Access token: %s<br/>", $_SESSION['AuthorizationData']->Authentication->OAuthTokens->AccessToken);
        printf("Refresh token: %s<br/>", $_SESSION['AuthorizationData']->Authentication->OAuthTokens->RefreshToken);

        $GLOBALS['CustomerManagementProxy'] = new ServiceClient(
            ServiceClientType::CustomerManagementVersion13, 
            $_SESSION['AuthorizationData'], 
            WebAuthHelper::GetApiEnvironment());

        // Set the GetUser request parameter to an empty user identifier to get the current 
        // authenticated Microsoft Advertising user, and then search for all accounts the user may access.

        $getUserRequest = new GetUserRequest();
        $getUserRequest->UserId = null;

        $user = $GLOBALS['CustomerManagementProxy']->GetService()->GetUser($getUserRequest)->User;

        // Search for the Microsoft Advertising accounts that the user can access.

        $pageInfo = new Paging();
        $pageInfo->Index = 0;    // The first page
        $pageInfo->Size = 1000;   // The first 1,000 accounts for this page of results    
        $predicate = new Predicate();
        $predicate->Field = "UserId";
        $predicate->Operator = PredicateOperator::Equals;
        $predicate->Value = $user->Id; 

        $searchAccountsRequest = new SearchAccountsRequest();
        $searchAccountsRequest->Predicates = array($predicate);
        $searchAccountsRequest->Ordering = null;
        $searchAccountsRequest->PageInfo = $pageInfo;

        $accounts = $GLOBALS['CustomerManagementProxy']->GetService()->SearchAccounts($searchAccountsRequest)->Accounts;

        print "-----<br/>Accounts the user can access:<br/>";
        foreach ($accounts->AdvertiserAccount as $account)
        {
            printf("Account Name: %s<br/>", $account->Name);
        }
    }

    session_unset();

    ?>
    ```

4. Create a new file named *WebAuthHelper.php*, and add the code as shown in the following example. You must edit the sample below with the ClientId, ClientSecret, and RedirectionUri that were provisioned when you registered your application. You'll also need to edit the example with your production [developer token](get-started.md#get-developer-token). 

    ```php
    <?php

    namespace Microsoft\BingAds\Samples;

    require_once "./vendor/autoload.php";

    // Specify the Microsoft\BingAds\Auth classes that will be used.
    use Microsoft\BingAds\Auth\ApiEnvironment;

    /** 
    * Defines global settings that you can use for testing your application.
    * Your production implementation may vary, and you should always store sensitive information securely.
    */
    final class WebAuthHelper {

        const DeveloperToken = 'DeveloperTokenGoesHere';
        const ApiEnvironment = ApiEnvironment::Production;
        const ClientId = 'ClientIdGoesHere'; 
        const ClientSecret = 'ClientSecretGoesHere'; 
        const RedirectUri = '/OAuth2Callback.php'; 

        static function GetApiEnvironment() 
        {
            return WebAuthHelper::ApiEnvironment;
        }
    }
    ```

5. The application is ready to be deployed to a server with the [installed](get-started-php.md#installation) PHP client libraries. For example you can publish a [Web App](https://azure.microsoft.com/services/app-service/web/) using the [Azure App Service](https://azure.microsoft.com/services/app-service/). For more details see [Configure PHP in Azure App Service Web Apps](/azure/app-service/configure-language-php). 

## See Also
[Bing Ads API Code Examples](code-examples.md)  
[Bing Ads API Web Service Addresses](web-service-addresses.md)  
