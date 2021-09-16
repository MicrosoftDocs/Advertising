---
title: "Walkthrough: Bing Ads API Desktop Application in C#"
ms.service: "bing-ads"
ms.topic: "article"
author: eric-urban
ms.author: eur
description: Create a desktop application using the Bing Ads .NET SDK.
dev_langs:
  - csharp
---
# Walkthrough: Bing Ads API Desktop Application in C#
This example C# console application prompts for user consent via the credentials that you provide, and then gets the accounts that the authenticated user can access. 

You must first register an application and take note of the client ID (registered application ID). For more details about registering an application and the authorization code grant flow, see [Authentication with OAuth](authentication-oauth.md).  

You'll also need your production [developer token](get-started.md#get-developer-token). You can create the example step by step as described below or download more examples from [GitHub](https://github.com/BingAds/BingAds-dotNet-SDK/tree/main/examples/BingAdsExamples). 

## <a name="code"></a>Code Walkthrough

1. Open the [Visual Studio Community 2017](https://www.visualstudio.com/vs/community/) development environment.

2. Create a new project through **File** -&gt; **New** -&gt; **Project**

3. In the **New Project** window choose **.NET Framework 4.7.1** in the drop down, and then click on the **Console App (.NET Framework)** template. Name the project *BingAdsConsoleApp* and click **OK**.

4. Install the SDK through NuGet for the BingAdsConsoleApp. For more information about dependencies, see [Install the SDK](get-started-csharp.md#installation). Click on **Tools** -&gt; **NuGet Package Manager** -&gt; **Package Manager Console**. At the prompt, type these commands to install the packages one at a time: `Install-Package Microsoft.BingAds.SDK`, `Install-Package System.ServiceModel.Primitives -Version 4.4.1`, `Install-Package System.ServiceModel.Http -Version 4.4.1`, and `Install-Package System.Configuration.ConfigurationManager -Version 4.4.1`.

5. Open the App.config file and replace its contents with the following code block. Edit the *BingAdsEnvironment* to move from sandbox to production. If you are targeting the production environment, then you must replace *4c0b021c-00c3-4508-838f-d3127e8167ff* with the *Application Id* that was provisioned when you registered your production application and replace *BBD37VB98* with your production [developer token](get-started.md#get-developer-token). 

    ```xml
    <?xml version="1.0" encoding="utf-8" ?>
    <configuration>
        <configSections>
            <sectionGroup name="userSettings" type="System.Configuration.UserSettingsGroup, System, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089" >
                <section name="BingAdsConsoleApp.Properties.Settings" type="System.Configuration.ClientSettingsSection, System, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089" allowExeDefinition="MachineToLocalUser" requirePermission="false" />
            </sectionGroup>
        </configSections>
        <startup> 
            <supportedRuntime version="v4.0" sku=".NETFramework,Version=v4.7.1" />
        </startup>
        <appSettings>
          <!-- To use the production environment, set this value to "Production". -->
          <add key="BingAdsEnvironment" value="Sandbox"/>
          <add key="ClientSettingsProvider.ServiceUri" value=""/>
        </appSettings>
        <userSettings>
            <BingAdsConsoleApp.Properties.Settings>
                <setting name="DeveloperToken" serializeAs="String">
                    <value>BBD37VB98</value>
                </setting>
                <setting name="ClientId" serializeAs="String">
                    <value>4c0b021c-00c3-4508-838f-d3127e8167ff</value>
                </setting>
            </BingAdsConsoleApp.Properties.Settings>
        </userSettings>
    </configuration>
    ```

6. Create a settings file. In project view for the BingAdsConsoleApp right click **Properties** and click **Open**. Click on **Settings**, and then click the text *The project does not contain a default settings file. Click here to create one*. New values from app.config will be automatically added. 
7. Open the Program.cs file and replace its contents with the following code block. 

    ```csharp
    using System;
    using System.Linq;
    using System.Configuration;
    using System.Net.Http;
    using System.ServiceModel;
    using System.Collections.Generic;
    using System.Threading.Tasks;
    using Microsoft.BingAds;
    using Microsoft.BingAds.V13.CustomerManagement;
    using BingAdsConsoleApp.Properties;
    using System.IO;
    
    namespace BingAdsConsoleApp
    {
        class Program
        {
            private static AuthorizationData _authorizationData;
            private static ServiceClient<ICustomerManagementService> _customerManagementService;
            private static string ClientState = "ClientStateGoesHere";
    
            static void Main(string[] args)
            {
                try
                {
                    Authentication authentication = AuthenticateWithOAuth();
    
                    // Most Bing Ads API service operations require account and customer ID. 
                    // This utiltiy operation sets the global authorization data instance 
                    // to the first account that the current authenticated user can access. 
                    SetAuthorizationDataAsync(authentication).Wait();
    
                    // You can extend the console app with the examples library at:
                    // https://github.com/BingAds/BingAds-dotNet-SDK/tree/main/examples/BingAdsExamples
                }
                // Catch authentication exceptions
                catch (OAuthTokenRequestException ex)
                {
                    OutputStatusMessage(string.Format("OAuthTokenRequestException Message:\n{0}", ex.Message));
                    if (ex.Details != null)
                    {
                        OutputStatusMessage(string.Format("OAuthTokenRequestException Details:\nError: {0}\nDescription: {1}",
                        ex.Details.Error, ex.Details.Description));
                    }
                }
                // Catch Customer Management service exceptions
                catch (FaultException<AdApiFaultDetail> ex)
                {
                    OutputStatusMessage(string.Join("; ", ex.Detail.Errors.Select(error =>
                    {
                        if ((error.Code == 105) || (error.Code == 106))
                        {
                            return "Authorization data is missing or incomplete for the specified environment.\n" +
                                   "To run the examples switch users or contact support for help with the following error.\n";
                        }
                        return string.Format("{0}: {1}", error.Code, error.Message);
                    })));
                    OutputStatusMessage(string.Join("; ",
                        ex.Detail.Errors.Select(error => string.Format("{0}: {1}", error.Code, error.Message))));
                }
                catch (FaultException<Microsoft.BingAds.V13.CustomerManagement.ApiFault> ex)
                {
                    OutputStatusMessage(string.Join("; ",
                        ex.Detail.OperationErrors.Select(error => string.Format("{0}: {1}", error.Code, error.Message))));
                }
                catch (HttpRequestException ex)
                {
                    OutputStatusMessage(ex.Message);
                }
            }
            
            /// <summary>
            /// Utility method for setting the customer and account identifiers within the global 
            /// <see cref="_authorizationData"/> instance. 
            /// </summary>
            /// <param name="authentication">The OAuth authentication credentials.</param>
            /// <returns></returns>
            private static async Task SetAuthorizationDataAsync(Authentication authentication)
            {
                _authorizationData = new AuthorizationData
                {
                    Authentication = authentication,
                    DeveloperToken = Settings.Default["DeveloperToken"].ToString()
                };
                
                var apiEnvironment = 
                    ConfigurationManager.AppSettings["BingAdsEnvironment"] == ApiEnvironment.Sandbox.ToString() ?
                    ApiEnvironment.Sandbox : ApiEnvironment.Production;
                
                _customerManagementService = new ServiceClient<ICustomerManagementService>(
                    _authorizationData, 
                    apiEnvironment
                );
    
                var getUserRequest = new GetUserRequest
                {
                    UserId = null
                };
    
                var getUserResponse = (await _customerManagementService.CallAsync((s, r) => s.GetUserAsync(r), getUserRequest));
                var user = getUserResponse.User;
    
                var predicate = new Predicate
                {
                    Field = "UserId",
                    Operator = PredicateOperator.Equals,
                    Value = user.Id.ToString()
                };
    
                var paging = new Paging
                {
                    Index = 0,
                    Size = 10
                };
    
                var searchAccountsRequest = new SearchAccountsRequest
                {
                    Ordering = null,
                    PageInfo = paging,
                    Predicates = new[] { predicate }
                };
    
                var searchAccountsResponse =
                    (await _customerManagementService.CallAsync((s, r) => s.SearchAccountsAsync(r), searchAccountsRequest));
    
                var accounts = searchAccountsResponse.Accounts.ToArray();
                if (accounts.Length <= 0) return;
    
                _authorizationData.AccountId = (long)accounts[0].Id;
                _authorizationData.CustomerId = (int)accounts[0].ParentCustomerId;
    
                OutputArrayOfAdvertiserAccount(accounts);
                
                return;
            }
    
            /// <summary>
            /// Authenticates the current user via OAuth.
            /// </summary>
            /// <returns>The OAuth authentication instance for a user.</returns>
            private static Authentication AuthenticateWithOAuth()
            {
                var apiEnvironment = 
                    ConfigurationManager.AppSettings["BingAdsEnvironment"] == ApiEnvironment.Sandbox.ToString() ?
                    ApiEnvironment.Sandbox : ApiEnvironment.Production;
                var oAuthDesktopMobileAuthCodeGrant = new OAuthDesktopMobileAuthCodeGrant(
                    Settings.Default["ClientId"].ToString(),
                    apiEnvironment
                );
    
                // It is recommended that you specify a non guessable 'state' request parameter to help prevent
                // cross site request forgery (CSRF). 
                oAuthDesktopMobileAuthCodeGrant.State = ClientState;
    
                string refreshToken;
    
                // If you have previously securely stored a refresh token, try to use it.
                if (GetRefreshToken(out refreshToken))
                {
                    AuthorizeWithRefreshTokenAsync(oAuthDesktopMobileAuthCodeGrant, refreshToken).Wait();
                }
                else
                {
                    // You must request user consent at least once through a web browser control. 
                    Console.WriteLine(string.Format(
                        "Open a new web browser and navigate to {0}\n\n" +
                        "Grant consent in the web browser for the application to access " +
                        "your advertising accounts, and then enter the response URI that includes " +
                        "the authorization 'code' parameter: \n", oAuthDesktopMobileAuthCodeGrant.GetAuthorizationEndpoint())
                    );
    
                    // Request access and refresh tokens using the URI that you provided manually during program execution.
                    var responseUri = new Uri(Console.ReadLine());
    
                    if (oAuthDesktopMobileAuthCodeGrant.State != ClientState)
                        throw new HttpRequestException("The OAuth response state does not match the client request state.");
    
                    oAuthDesktopMobileAuthCodeGrant.RequestAccessAndRefreshTokensAsync(responseUri).Wait();
                    SaveRefreshToken(oAuthDesktopMobileAuthCodeGrant.OAuthTokens.RefreshToken);
                }
    
                // It is important to save the most recent refresh token whenever new OAuth tokens are received. 
                // You will want to subscribe to the NewOAuthTokensReceived event handler. 
                // When calling Bing Ads API service operations with ServiceClient<TService>, BulkServiceManager, or ReportingServiceManager, 
                // each instance will refresh your access token automatically if they detect the AuthenticationTokenExpired (109) error code. 
                oAuthDesktopMobileAuthCodeGrant.NewOAuthTokensReceived +=
                    (sender, tokens) => SaveRefreshToken(tokens.NewRefreshToken);
    
                return oAuthDesktopMobileAuthCodeGrant;
            }
                    
            /// <summary>
            /// Requests new access and refresh tokens given an existing refresh token.
            /// </summary>
            /// <param name="authentication">The OAuth authentication instance for a user.</param>
            /// <param name="refreshToken">The previous refresh token.</param>
            /// <returns></returns>
            private static Task<OAuthTokens> AuthorizeWithRefreshTokenAsync(
                OAuthDesktopMobileAuthCodeGrant authentication, 
                string refreshToken)
            {
                return authentication.RequestAccessAndRefreshTokensAsync(refreshToken);
            }
    
            /// <summary>
            /// You should modify the example, and store the refresh token securely.
            /// </summary>
            /// <param name="newRefreshtoken">The refresh token to save.</param>
            private static void SaveRefreshToken(string newRefreshtoken)
            {
                if (newRefreshtoken != null)
                {
                    using (StreamWriter outputFile = new StreamWriter(
                    Environment.CurrentDirectory + @"\refreshtoken.txt",
                    false))
                    {
                        outputFile.WriteLine(newRefreshtoken);
                    }
                }
            }
    
            /// <summary>
            /// Returns the prior refresh token if available.
            /// </summary>
            /// <param name="refreshToken"></param>
            /// <returns>The latest stored refresh token.</returns>
            private static bool GetRefreshToken(out string refreshToken)
            {
                var filePath = Environment.CurrentDirectory + @"\refreshtoken.txt";
                if (!File.Exists(filePath))
                {
                    refreshToken = null;
                    return false;
                }
    
                String fileContents;
                using (StreamReader sr = new StreamReader(filePath))
                {
                    fileContents = sr.ReadToEnd();
                }
    
                if (string.IsNullOrEmpty(fileContents))
                {
                    refreshToken = null;
                    return false;
                }
    
                try
                {
                    refreshToken = fileContents;
                    return true;
                }
                catch (FormatException)
                {
                    refreshToken = null;
                    return false;
                }
            }
    
            #region OutputHelpers
    
            /**
             * You can extend the console app with the example helpers at:
             * https://github.com/BingAds/BingAds-dotNet-SDK/tree/main/examples/BingAdsExamples
             **/
            
            private static void OutputArrayOfAdvertiserAccount(IList<AdvertiserAccount> dataObjects)
            {
                if (null != dataObjects)
                {
                    foreach (var dataObject in dataObjects)
                    {
                        OutputAdvertiserAccount(dataObject);
                        OutputStatusMessage("\n");
                    }
                }
            }
    
            private static void OutputAdvertiserAccount(AdvertiserAccount dataObject)
            {
                if (null != dataObject)
                {
                    OutputStatusMessage(string.Format("BillToCustomerId: {0}", dataObject.BillToCustomerId));
                    OutputStatusMessage(string.Format("CurrencyCode: {0}", dataObject.CurrencyCode));
                    OutputStatusMessage(string.Format("AccountFinancialStatus: {0}", dataObject.AccountFinancialStatus));
                    OutputStatusMessage(string.Format("Id: {0}", dataObject.Id));
                    OutputStatusMessage(string.Format("Language: {0}", dataObject.Language));
                    OutputStatusMessage(string.Format("LastModifiedByUserId: {0}", dataObject.LastModifiedByUserId));
                    OutputStatusMessage(string.Format("LastModifiedTime: {0}", dataObject.LastModifiedTime));
                    OutputStatusMessage(string.Format("Name: {0}", dataObject.Name));
                    OutputStatusMessage(string.Format("Number: {0}", dataObject.Number));
                    OutputStatusMessage(string.Format("ParentCustomerId: {0}", dataObject.ParentCustomerId));
                    OutputStatusMessage(string.Format("PaymentMethodId: {0}", dataObject.PaymentMethodId));
                    OutputStatusMessage(string.Format("PaymentMethodType: {0}", dataObject.PaymentMethodType));
                    OutputStatusMessage(string.Format("PrimaryUserId: {0}", dataObject.PrimaryUserId));
                    OutputStatusMessage(string.Format("AccountLifeCycleStatus: {0}", dataObject.AccountLifeCycleStatus));
                    OutputStatusMessage(string.Format("TimeStamp: {0}", dataObject.TimeStamp));
                    OutputStatusMessage(string.Format("TimeZone: {0}", dataObject.TimeZone));
                    OutputStatusMessage(string.Format("PauseReason: {0}", dataObject.PauseReason));
                    OutputArrayOfKeyValuePairOfstringstring(dataObject.ForwardCompatibilityMap);
                    OutputArrayOfCustomerInfo(dataObject.LinkedAgencies);
                    OutputStatusMessage(string.Format("SalesHouseCustomerId: {0}", dataObject.SalesHouseCustomerId));
                    OutputArrayOfKeyValuePairOfstringstring(dataObject.TaxInformation);
                    OutputStatusMessage(string.Format("BackUpPaymentInstrumentId: {0}", dataObject.BackUpPaymentInstrumentId));
                    OutputStatusMessage(string.Format("BillingThresholdAmount: {0}", dataObject.BillingThresholdAmount));
                    OutputAddress(dataObject.BusinessAddress);
                    OutputStatusMessage(string.Format("AutoTagType: {0}", dataObject.AutoTagType));
                    OutputStatusMessage(string.Format("SoldToPaymentInstrumentId: {0}", dataObject.SoldToPaymentInstrumentId));
                }
            }
            
            private static void OutputAddress(Address dataObject)
            {
                if (null != dataObject)
                {
                    OutputStatusMessage(string.Format("City: {0}", dataObject.City));
                    OutputStatusMessage(string.Format("CountryCode: {0}", dataObject.CountryCode));
                    OutputStatusMessage(string.Format("Id: {0}", dataObject.Id));
                    OutputStatusMessage(string.Format("Line1: {0}", dataObject.Line1));
                    OutputStatusMessage(string.Format("Line2: {0}", dataObject.Line2));
                    OutputStatusMessage(string.Format("Line3: {0}", dataObject.Line3));
                    OutputStatusMessage(string.Format("Line4: {0}", dataObject.Line4));
                    OutputStatusMessage(string.Format("PostalCode: {0}", dataObject.PostalCode));
                    OutputStatusMessage(string.Format("StateOrProvince: {0}", dataObject.StateOrProvince));
                    OutputStatusMessage(string.Format("TimeStamp: {0}", dataObject.TimeStamp));
                    OutputStatusMessage(string.Format("BusinessName: {0}", dataObject.BusinessName));
                }
            }
            
            private static void OutputArrayOfKeyValuePairOfstringstring(IList<KeyValuePair<string, string>> dataObjects)
            {
                if (null != dataObjects)
                {
                    foreach (var dataObject in dataObjects)
                    {
                        OutputKeyValuePairOfstringstring(dataObject);
                    }
                }
            }
    
            private static void OutputKeyValuePairOfstringstring(KeyValuePair<string, string> dataObject)
            {
                if (null != dataObject.Key)
                {
                    OutputStatusMessage(string.Format("key: {0}", dataObject.Key));
                    OutputStatusMessage(string.Format("value: {0}", dataObject.Value));
                }
            }
    
            private static void OutputCustomerInfo(CustomerInfo dataObject)
            {
                if (null != dataObject)
                {
                    OutputStatusMessage(string.Format("Id: {0}", dataObject.Id));
                    OutputStatusMessage(string.Format("Name: {0}", dataObject.Name));
                }
            }
    
            private static void OutputArrayOfCustomerInfo(IList<CustomerInfo> dataObjects)
            {
                if (null != dataObjects)
                {
                    foreach (var dataObject in dataObjects)
                    {
                        OutputCustomerInfo(dataObject);
                        OutputStatusMessage("\n");
                    }
                }
            }
            
            private static void OutputStatusMessage(String msg)
            {
                Console.WriteLine(msg);
            }
    
            #endregion OutputHelpers
        }
    }
    ```

8. Click **Build** -&gt; **Build BingAdsConsoleApp**, and then run the application. When you start the application you will be prompted by default for Microsoft account credentials to authenticate in production.

## <a name="sandbox"></a>Configuring Sandbox
To use sandbox, set the *BingAdsEnvironment* key to Sandbox within the *&lt;appSettings&gt;* node of your project root's *App.config* file.

```xml
<add key="BingAdsEnvironment" value ="Sandbox"/>
```

You can also set the environment for each ServiceClient individually as follows.

```csharp
_customerManagementService = new ServiceClient<ICustomerManagementService>(
    _authorizationData, 
    ApiEnvironment.Sandbox
);
```

Whether you set the ServiceClient environment globally or individually, separately you'll also need to set the OAuth environment to sandbox.

```csharp
var oAuthDesktopMobileAuthCodeGrant = new OAuthDesktopMobileAuthCodeGrant(
    ClientId, 
    ApiEnvironment.Sandbox
);
```

## See Also
[Sandbox](sandbox.md)  
[Bing Ads API Code Examples](code-examples.md)  
[Bing Ads API Web Service Addresses](web-service-addresses.md)  

