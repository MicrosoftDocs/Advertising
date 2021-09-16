---
title: "Walkthrough: Bing Ads API Web Application in C#"
ms.service: "bing-ads"
ms.topic: "article"
author: eric-urban
ms.author: eur
description: Create a web application using the Bing Ads .NET SDK.
dev_langs:
  - csharp
---
# Walkthrough: Bing Ads API Web Application in C#
This example C# web application prompts for user consent via the credentials that you provide, and then gets the accounts that the authenticated user can access. 

You must first register an application and take note of the client ID (registered application ID), client secret (registered password), and redirection URI. For more details about registering an application and the authorization code grant flow, see [Authentication with OAuth](authentication-oauth.md).  

You'll also need your production [developer token](get-started.md#get-developer-token). You can create the example step by step as described below or download more examples from [GitHub](https://github.com/BingAds/BingAds-dotNet-SDK/tree/main/examples/BingAdsExamples). 

> [!TIP]
> This example references steps from [Create an ASP.NET Framework web app in Azure](https://docs.microsoft.com/azure/app-service/app-service-web-get-started-dotnet-framework). For more details about deploying web apps to Azure, you can refer to the Azure documentation. 

## <a name="code"></a>Code Walkthrough
1. Open the [Visual Studio Community 2017](https://www.visualstudio.com/vs/community/) development environment. If you've installed Visual Studio already, add the **ASP.NET and web development** and **Azure development** workloads in Visual Studio by clicking **Tools** > **Get Tools and Features**.

2. Create a new project by selecting **File > New > Project**. In the **New Project** window choose **.NET Framework 4.7.1** in the drop down, and then select **Visual C# > Web > ASP.NET Web Application (.NET Framework)**. Name the project *BingAdsWebApp* and click **OK**.

3. You can deploy any type of ASP.NET web app to Azure. For this quickstart, select the **MVC** template, make sure authentication is set to **No Authentication**, and click **OK**. 

4. Install the SDK through NuGet for the BingAdsWebApp. For more information about dependencies, see [Install the SDK](get-started-csharp.md#installation). Click on **Tools** -&gt; **NuGet Package Manager** -&gt; **Package Manager Console**. At the prompt, type these commands to install the packages one at a time: `Install-Package Microsoft.BingAds.SDK`, `Install-Package System.ServiceModel.Primitives -Version 4.4.1`, `Install-Package System.ServiceModel.Http -Version 4.4.1`, and `Install-Package System.Configuration.ConfigurationManager -Version 4.4.1`. 

5. Open the Web.config file and replace its contents with the following code block. Edit the *BingAdsEnvironment* to move from sandbox to production and set the production [developer token](get-started.md#get-developer-token) as needed. You must edit the *ClientId*, *ClientSecret*, and *RedirectionUri* with the corresponding *Application Id*, *Application Secret*, and *Redirect URL* values that were provisioned when you registered your application. 
  
  > [!NOTE]
  > If you intend to deploy on localhost prior to going live, then be sure to also register the the local SSL URL and port e.g., https://localhost:44383/. In that case you must also set **SSL Enabled** to *True* in the BingAdsWebApp project properties window, and then you can copy the localhost port from the same properties window.

  ```xml
    <?xml version="1.0" encoding="utf-8"?>
    <!--
        For more information on how to configure your ASP.NET application, please visit
        https://go.microsoft.com/fwlink/?LinkId=301880
        -->
    <configuration>
        <configSections>
        <sectionGroup name="applicationSettings" type="System.Configuration.ApplicationSettingsGroup, System, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089">
            <section name="BingAdsWebApp.Properties.Settings" type="System.Configuration.ClientSettingsSection, System, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089" requirePermission="false" />
        </sectionGroup>
        </configSections>
        <appSettings>
        <!-- To use the production environment, set this value to "Production". -->
        <add key="BingAdsEnvironment" value="Sandbox"/>
        <add key="webpages:Version" value="3.0.0.0" />
        <add key="webpages:Enabled" value="false" />
        <add key="ClientValidationEnabled" value="true" />
        <add key="UnobtrusiveJavaScriptEnabled" value="true" />
        </appSettings>
        <system.web>
        <compilation debug="true" targetFramework="4.7.1" />
        <httpRuntime targetFramework="4.7.1" />
        <httpModules>
            <add name="ApplicationInsightsWebTracking" type="Microsoft.ApplicationInsights.Web.ApplicationInsightsHttpModule, Microsoft.AI.Web" />
        </httpModules>
        </system.web>
        <runtime>
        <assemblyBinding xmlns="urn:schemas-microsoft-com:asm.v1">
            <dependentAssembly>
            <assemblyIdentity name="Newtonsoft.Json" culture="neutral" publicKeyToken="30ad4fe6b2a6aeed" />
            <bindingRedirect oldVersion="0.0.0.0-6.0.0.0" newVersion="6.0.0.0" />
            </dependentAssembly>
            <dependentAssembly>
            <assemblyIdentity name="System.Web.Optimization" publicKeyToken="31bf3856ad364e35" />
            <bindingRedirect oldVersion="1.0.0.0-1.1.0.0" newVersion="1.1.0.0" />
            </dependentAssembly>
            <dependentAssembly>
            <assemblyIdentity name="WebGrease" publicKeyToken="31bf3856ad364e35" />
            <bindingRedirect oldVersion="0.0.0.0-1.5.2.14234" newVersion="1.5.2.14234" />
            </dependentAssembly>
            <dependentAssembly>
            <assemblyIdentity name="System.Web.Helpers" publicKeyToken="31bf3856ad364e35" />
            <bindingRedirect oldVersion="1.0.0.0-3.0.0.0" newVersion="3.0.0.0" />
            </dependentAssembly>
            <dependentAssembly>
            <assemblyIdentity name="System.Web.WebPages" publicKeyToken="31bf3856ad364e35" />
            <bindingRedirect oldVersion="1.0.0.0-3.0.0.0" newVersion="3.0.0.0" />
            </dependentAssembly>
            <dependentAssembly>
            <assemblyIdentity name="System.Web.Mvc" publicKeyToken="31bf3856ad364e35" />
            <bindingRedirect oldVersion="1.0.0.0-5.2.3.0" newVersion="5.2.3.0" />
            </dependentAssembly>
        </assemblyBinding>
        </runtime>
        <system.webServer>
        <validation validateIntegratedModeConfiguration="false" />
        <modules>
            <remove name="ApplicationInsightsWebTracking" />
            <add name="ApplicationInsightsWebTracking" type="Microsoft.ApplicationInsights.Web.ApplicationInsightsHttpModule, Microsoft.AI.Web" preCondition="managedHandler" />
        </modules>
        </system.webServer>
        <system.codedom>
        <compilers>
            <compiler language="c#;cs;csharp" extension=".cs" type="Microsoft.CodeDom.Providers.DotNetCompilerPlatform.CSharpCodeProvider, Microsoft.CodeDom.Providers.DotNetCompilerPlatform, Version=1.0.7.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35" warningLevel="4" compilerOptions="/langversion:default /nowarn:1659;1699;1701" />
            <compiler language="vb;vbs;visualbasic;vbscript" extension=".vb" type="Microsoft.CodeDom.Providers.DotNetCompilerPlatform.VBCodeProvider, Microsoft.CodeDom.Providers.DotNetCompilerPlatform, Version=1.0.7.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35" warningLevel="4" compilerOptions="/langversion:default /nowarn:41008 /define:_MYTYPE=\&quot;Web\&quot; /optionInfer+" />
        </compilers>
        </system.codedom>
        <applicationSettings>
        <BingAdsWebApp.Properties.Settings>
            <setting name="RefreshToken" serializeAs="String">
            <value />
            </setting>
            <setting name="ClientId" serializeAs="String">
            <value>ClientIdGoesHere</value>
            </setting>
            <setting name="ClientSecret" serializeAs="String">
            <value>ClientSecretGoesHere</value>
            </setting>
            <setting name="RedirectionUri" serializeAs="String">
            <value>RedirectionUriGoesHere</value>
            </setting>
            <setting name="DeveloperToken" serializeAs="String">
            <value>DeveloperTokenGoesHere</value>
            </setting>
        </BingAdsWebApp.Properties.Settings>
        </applicationSettings>
    </configuration>
  ```

6. Create a settings file. In project view for the BingAdsWebApp right click **Properties** and click **Open**. Click on **Settings**, and then click the text *The project does not contain a default settings file. Click here to create one*. New values from Web.config will be automatically added. 

7. Within the **Views** -&gt; **Home** folder of the BingAdsWebApp project, open the Index.cshtml file and replace its contents with the following code block. This defines the web page view that displays results of the service calls that will be written further below.

    ```no-highlight
    @{
        ViewBag.Title = "Index";
    }
    
    <h2>Index</h2>
    
    <h4>Accounts</h4>
    <p>@Html.Raw(@ViewBag.Accounts)</p>
    
    <p><b style="color: red">@ViewBag.Errors</b></p>
    ```

8. Within the **Controllers** folder of the BingAdsWebApp project, open the HomeController.cs file and replace its contents with the following code block. This defines the service calls that will determine which results are displayed in the view that was defined above. 

    ```csharp
    using System;
    using System.Collections.Generic;
    using System.Configuration;
    using System.Linq;
    using System.Net.Http;
    using System.ServiceModel;
    using System.Threading.Tasks;
    using System.Web.Mvc;
    using BingAdsWebApp.Properties;
    using Microsoft.BingAds;
    using Microsoft.BingAds.V13.CustomerManagement;
    
    namespace BingAdsWebApp.Controllers
    {
        public class HomeController : Controller
        {
            private static AuthorizationData _authorizationData;
            private static ServiceClient<ICustomerManagementService> _customerManagementService;
            private static string ClientState = "ClientStateGoesHere";
            private static string _output = "";
    
            /// <summary>
            /// Controls the contents displayed at Index.cshtml.
            /// </summary>
            public async Task<ActionResult> Index()
            {
                try
                {
                    // If there is already an authenticated Microsoft account during this HTTP session, 
                    // go ahead and call Bing Ads API service operations.
    
                    if (Session["auth"] != null)
                    {
                        return await SetAuthorizationDataAsync((OAuthWebAuthCodeGrant)Session["auth"]);
                    }
    
                    // Prepare the OAuth object for use with the authorization code grant flow. 
    
                    var apiEnvironment =
                        ConfigurationManager.AppSettings["BingAdsEnvironment"] == ApiEnvironment.Sandbox.ToString() ?
                        ApiEnvironment.Sandbox : ApiEnvironment.Production;
                    var oAuthWebAuthCodeGrant = new OAuthWebAuthCodeGrant(
                        Settings.Default["ClientId"].ToString(),
                        Settings.Default["ClientSecret"].ToString(), 
                        new Uri(Settings.Default["RedirectionUri"].ToString()),
                        apiEnvironment);
    
                    // It is recommended that you specify a non guessable 'state' request parameter to help prevent
                    // cross site request forgery (CSRF). 
                    oAuthWebAuthCodeGrant.State = ClientState;
    
                    // When calling Bing Ads API service operations with ServiceClient or BulkServiceManager, each will refresh your access token 
                    // automatically if they detect the AuthenticationTokenExpired (109) error code. 
                    // As a best practice you should always use the most recent provided refresh token.
                    // Save the refresh token whenever new OAuth tokens are received by subscribing to the NewOAuthTokensReceived event handler. 
    
                    oAuthWebAuthCodeGrant.NewOAuthTokensReceived +=
                        (sender, args) => SaveRefreshToken(args.NewRefreshToken);
    
                    // If a refresh token is already present, use it to request new access and refresh tokens.
    
                    if (RefreshTokenExists())
                    {
                        await oAuthWebAuthCodeGrant.RequestAccessAndRefreshTokensAsync(GetRefreshToken());
    
                        // Save the authentication object in a session for future requests.
                        Session["auth"] = oAuthWebAuthCodeGrant;
    
                        return await SetAuthorizationDataAsync((OAuthWebAuthCodeGrant)Session["auth"]);
                    }
    
                    // If the current HTTP request is a callback from the Microsoft Account authorization server,
                    // use the current request url containing authorization code to request new access and refresh tokens
                    if (Request["code"] != null)
                    {
                        if (oAuthWebAuthCodeGrant.State != ClientState)
                            throw new HttpRequestException("The OAuth response state does not match the client request state.");
    
                        await oAuthWebAuthCodeGrant.RequestAccessAndRefreshTokensAsync(Request.Url);
    
                        // Save the authentication object in a session for future requests. 
                        Session["auth"] = oAuthWebAuthCodeGrant;
    
                        return await SetAuthorizationDataAsync((OAuthWebAuthCodeGrant)Session["auth"]);
                    }
    
                    SaveRefreshToken(oAuthWebAuthCodeGrant.OAuthTokens?.RefreshToken);
    
                    // If there is no refresh token saved and no callback from the authorization server, 
                    // then connect to the authorization server and request user consent. 
                    return Redirect(oAuthWebAuthCodeGrant.GetAuthorizationEndpoint().ToString());
                }
                // Catch authentication exceptions
                catch (OAuthTokenRequestException ex)
                {
                    ViewBag.Errors = (string.Format("Couldn't get OAuth tokens. Error: {0}. Description: {1}", 
                        ex.Details.Error, ex.Details.Description));
                    return View();
                }
                // Catch Customer Management service exceptions
                catch (FaultException<Microsoft.BingAds.V13.CustomerManagement.AdApiFaultDetail> ex)
                {
                    ViewBag.Errors = (string.Join("; ", ex.Detail.Errors.Select(
                        error => string.Format("{0}: {1}", error.Code, error.Message))));
                    return View();
                }
                catch (FaultException<Microsoft.BingAds.V13.CustomerManagement.ApiFault> ex)
                {
                    ViewBag.Errors = (string.Join("; ", ex.Detail.OperationErrors.Select(
                        error => string.Format("{0}: {1}", error.Code, error.Message))));
                    return View();
                }            
                catch (Exception ex)
                {
                    ViewBag.Errors = ex.Message;
                    return View();
                }
            }
    
            /// <summary>
            /// Adds a campaign to an account of the current authenticated user. 
            /// </summary>
            private async Task<ActionResult> SetAuthorizationDataAsync(Authentication authentication)
            {
                _authorizationData = new AuthorizationData
                {
                    Authentication = authentication,
                    DeveloperToken = Settings.Default["DeveloperToken"].ToString()
                };
    
                _customerManagementService = new ServiceClient<ICustomerManagementService>(_authorizationData);
    
                var getUserRequest = new GetUserRequest
                {
                    UserId = null
                };
    
                var getUserResponse = 
                    (await _customerManagementService.CallAsync((s, r) => s.GetUserAsync(r), getUserRequest));
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
                if (accounts.Length <= 0) return View();
    
                _authorizationData.AccountId = (long)accounts[0].Id;
                _authorizationData.CustomerId = (int)accounts[0].ParentCustomerId;
    
                OutputArrayOfAdvertiserAccount(accounts);
    
                ViewBag.Accounts = _output;
                _output = null;
    
                return View();
            }
            
            /// <summary>
            /// Saves the refresh token
            /// </summary>
            /// <param name="refreshToken">The refresh token to save</param>
            private static void SaveRefreshToken(string refreshToken)
            {
                Settings.Default["RefreshToken"] = refreshToken;
                Settings.Default.Save();
            }
    
            /// <summary>
            /// Deletes the contents in the refresh token file
            /// </summary>
            private static void DeleteRefreshToken()
            {
                Settings.Default["RefreshToken"] = "";
                Settings.Default.Save();
            }
    
            /// <summary>
            /// Determines whether the global refresh token exists.
            /// </summary>
            /// <returns>Returns true if the global refresh token exists.</returns>
            private bool RefreshTokenExists()
            {
                return Settings.Default["RefreshToken"] != null 
                    && Settings.Default["RefreshToken"].ToString().Length > 0;
            }
    
            /// <summary>
            /// Gets the global refresh token.
            /// </summary>
            /// <returns>The global refresh token.</returns>
            private string GetRefreshToken()
            {
                return Settings.Default["RefreshToken"].ToString();
            }
    
            #region OutputHelpers
    
            /**
             * You can extend the app with example output helpers at:
             * https://github.com/BingAds/BingAds-dotNet-SDK/tree/main/examples/BingAdsExamples/BingAdsExamplesLibrary/v13
             * 
             * AdInsightExampleHelper.cs
             * BulkExampleHelper.cs
             * CampaignManagementExampleHelper.cs
             * CustomerBillingExampleHelper.cs
             * CustomerManagementExampleHelper.cs
             * ReportingExampleHelper.cs
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
                _output += (msg + "<br/>");
            }
    
            #endregion OutputHelpers
        }
    }
    ```

9. To deploy the web app on the local machine first you must set **SSL Enabled** to *True* in the BingAdsWebApp project properties window. If you have not already done so, your registered application redirect URL must include the SSL URL and port e.g., https://localhost:44383/. From the menu, select **Debug > Start without Debugging** to run the web app locally.

10. To deploy your web app live using the [Azure App Service](https://azure.microsoft.com/services/app-service/) see the subscription and deployment instructions within the Azure documentation e.g., [Create an ASP.NET Framework web app in Azure](https://docs.microsoft.com/azure/app-service/app-service-web-get-started-dotnet-framework).

## <a name="sandbox"></a>Configuring Sandbox
To use sandbox, set the *BingAdsEnvironment* key to Sandbox within the *&lt;appSettings&gt;* node of your project root's *Web.config* file.

```xml
<add key="BingAdsEnvironment" value ="Sandbox"/>
```

You can also set the environment for each ServiceClient individually as follows.

```csharp
_customerService = new ServiceClient<ICustomerManagementService>(_authorizationData, ApiEnvironment.Sandbox);
```

Whether you set the ServiceClient environment globally or individually, separately you'll also need to set the OAuth environment to sandbox.

```csharp
var oAuthWebAuthCodeGrant = new OAuthWebAuthCodeGrant(ClientId, ClientSecret, new Uri(RedirectionUri), ApiEnvironment.Sandbox);
```

## See Also
[Sandbox](sandbox.md)  
[Bing Ads API Code Examples](code-examples.md)  
[Bing Ads API Web Service Addresses](web-service-addresses.md)  

