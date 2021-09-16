---
title: "CodeGrantFlow Code Example"
description: Shows a simple implementation for calling the identity service and getting an OAuth access and refresh token.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: eric-urban
ms.author: eur
dev_langs:
  - csharp
---

# CodeGrantFlow code example

[!INCLUDE[request-header](./includes/mfa-required.md)]

The following example shows a simple browser implementation for getting an OAuth access and refresh token. For more information about the calls made in this example, see [Authentication with OAuth](/advertising/guides/authentication-oauth).

> [!NOTE]
> The example currently points to the SI environment for getting Bing Advertising access tokens. To use the example for the production environment, please remove the *Production OAuth server endpoints* from comments and place the *SI OAuth server endpoints* in comments.

```csharp
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using System.IO;
using System.Windows.Forms;  // Add reference
using System.Net;            // .Net 4.5 required for WebUtility.UrlEncode
using System.Drawing;        // Add reference
using Newtonsoft.Json;       // NuGet Json.NET


namespace Content.OAuth
{
    // This class supports the OAuth 2.0 Authorization Code Grant flow
    // for a desktop app.

    public class CodeGrantOauth : Form
    {
        private WebBrowser _browser = null;  // Used to get user consent

        private string _accessToken = null;
        private string _refreshToken = null;
        private string _authorizationCode = null;
        private int _expiration;
        private string _error = null;

        // Production OAuth server endpoints.

        //private string AuthorizationUri = "https://login.live.com/oauth20_authorize.srf";  // Authorization code endpoint
        //private string RedirectUri = "https://login.live.com/oauth20_desktop.srf";  // Callback endpoint
        //private string RefreshUri = "https://login.live.com/oauth20_token.srf";  // Get tokens endpoint

        // SI OAuth server endpoints. 
        // If you use -int domains, you must use a clientID from https://apps.dev.microsoft-int.com/#/appList.

        private string AuthorizationUri = "https://login.live-int.com/oauth20_authorize.srf";  // Authorization code endpoint
        private string RedirectUri = "https://login.live-int.com/oauth20_desktop.srf";  // Callback endpoint
        private string RefreshUri = "https://login.live-int.com/oauth20_token.srf";  // Get tokens endpoint

        private string RedirectPath = "/oauth20_desktop.srf";
        private string ErrorPath = "/err.srf";

        // Parameters to pass to requests. 
        // codeQueryString is the query string for the authorizationUri. To force user log in, include the &prompt=login parameter.
        // accessBody is the request body used with the refreshUri to get the access token using the authorization code.
        // refreshBody is the request body used with the refreshUri to get the access token using a refresh token.

        private string CodeQueryString = "?client_id={0}&scope=bingads.manage&response_type=code&redirect_uri={1}";
        private string AccessBody = "client_id={0}&code={1}&grant_type=authorization_code&redirect_uri={2}";
        private string RefreshBody = "client_id={0}&grant_type=refresh_token&redirect_uri={1}&refresh_token={2}";

        private string _clientId = null;
        private string _uri = null;

        public string AccessToken { get { return this._accessToken; } }
        public string RefreshToken { get { return this._refreshToken; } }
        public int Expiration { get { return this._expiration; } }
        public string Error { get { return this._error; } }


        // Must instantiate the class by passing the apps client ID.

        public CodeGrantOauth(string clientId) 
        {
            if (string.IsNullOrEmpty(clientId))
            {
                throw new ArgumentException("The client ID is missing.");
            }

            this._clientId = clientId;
            this._uri = string.Format(this.AuthorizationUri + this.CodeQueryString, this._clientId, RedirectUri);
        }

        // Add the browser to the form.

        private void InitializeForm()
        {
            this.FormClosing += new FormClosingEventHandler(form_FormClosing);
            this.Size = new Size(420, 580);

            this._browser = new WebBrowser();
            this._browser.Dock = DockStyle.Fill;
            this._browser.Navigated += new WebBrowserNavigatedEventHandler(browser_Navigated);

            this.Controls.AddRange(new Control[] { this._browser });
        }

        // Get the access token by using the authorization code.

        public string GetAccessToken()
        {
            Thread oauthThread = new Thread(new ThreadStart(GetToken));
            oauthThread.SetApartmentState(ApartmentState.STA);
            oauthThread.Start();
            oauthThread.Join();

            try
            {
                if (!string.IsNullOrEmpty(this._authorizationCode))
                {
                    var accessTokenRequestBody = string.Format(this.AccessBody, this._clientId, this._authorizationCode, WebUtility.UrlEncode(RedirectUri));
                    AccessTokens tokens = GetTokens(this.RefreshUri, accessTokenRequestBody);
                    this._accessToken = tokens.AccessToken;
                    this._refreshToken = tokens.RefreshToken;
                    this._expiration = tokens.Expiration;
                }
            }
            catch (WebException)
            {
                this._error = "GetAccessToken failed likely due to an invalid client ID, client secret, or authorization code";
            }

            return this._accessToken;
        }

        // Starts the browser used to get consent and blocks until
        // the user gives consent or cancels the request.

        private void GetToken()
        {
            InitializeForm();
            this._browser.Navigate(this._uri);

            Application.EnableVisualStyles();
            Application.Run(this);
        }

        // Get the access token by using the refresh token. 
        // If you get an invalid_grant error when using the refresh token, the token is no 
        // longer valid. If you get this error, you will need to get the user's consent 
        // and a new refresh token.

        public string RefreshAccessToken(string refreshToken)
        {
            if (string.IsNullOrEmpty(refreshToken))
            {
                throw new ArgumentException("The refresh token is missing.");
            }

            try
            {
                var refreshTokenRequestBody = string.Format(this.RefreshBody, this._clientId, WebUtility.UrlEncode(RedirectUri), refreshToken);
                AccessTokens tokens = GetTokens(this.RefreshUri, refreshTokenRequestBody);
                this._accessToken = tokens.AccessToken;
                this._refreshToken = tokens.RefreshToken;
                this._expiration = tokens.Expiration;
            }
            catch (WebException)
            {
                this._error = "RefreshAccessToken failed likely due to an invalid client ID or refresh token";
            }

            return this._accessToken;
        }

        // The user either provided consent or canceled the request.

        private void form_FormClosing(object sender, EventArgs e)
        {
            Application.Exit();
        }

        // Captures all consent traffic. Filter the traffic for the redirect
        // URI. The URIs query string contains either the authorization code
        // or an error.

        private void browser_Navigated(object sender, WebBrowserNavigatedEventArgs e)
        {
            Dictionary<string, string> parameters = null;

            if (!string.IsNullOrEmpty(e.Url.Query))
            {
                parameters = ParseFragment(e.Url.Query, new char[] { '&', '?' });
            }

            if (e.Url.AbsolutePath.Equals(RedirectPath))
            {
                if (parameters.ContainsKey("code"))
                {
                    this._authorizationCode = parameters["code"];
                }
                else if (parameters.ContainsKey("error_description"))
                {
                    this._error = WebUtility.UrlDecode(parameters["error_description"]);
                }

                this.Close();
            }
            else if (e.Url.AbsolutePath.Equals(ErrorPath))
            {
                if (parameters.ContainsKey("error_description"))
                {
                    this._error = WebUtility.UrlDecode(parameters["error_description"]);
                    this.Close(); ;
                }
            }
        }

        // Parses the query string.

        private Dictionary<string, string> ParseFragment(string queryString, char[] delimeters)
        {
            var parameters = new Dictionary<string, string>();

            string[] pairs = queryString.Split(delimeters, StringSplitOptions.RemoveEmptyEntries);

            foreach (string pair in pairs)
            {
                string[] nameValaue = pair.Split(new char[] { '=' });
                parameters.Add(nameValaue[0], nameValaue[1]);
            }

            return parameters;
        }

        // Called by GetAccessToken and RefreshAccessToken to get an access token.

        private static AccessTokens GetTokens(string uri, string body)
        {
            AccessTokens tokens = null;
            var request = (HttpWebRequest)WebRequest.Create(uri);
            request.Method = "POST";
            request.Accept = "application/json";
            request.ContentType = "application/x-www-form-urlencoded";

            request.ContentLength = body.Length;

            using (Stream requestStream = request.GetRequestStream())
            {
                StreamWriter writer = new StreamWriter(requestStream);
                writer.Write(body);
                writer.Close();
            }

            var response = (HttpWebResponse)request.GetResponse();

            using (Stream responseStream = response.GetResponseStream())
            {
                var reader = new StreamReader(responseStream);
                string json = reader.ReadToEnd();
                reader.Close();
                tokens = JsonConvert.DeserializeObject(json, typeof(AccessTokens)) as AccessTokens;
            }

            return tokens;
        }

    }

    // The body of the response from GetTokens is a JSON object that 
    // contains the following properties (and a couple of others
    // that we're not capturing).

    [JsonObject(MemberSerialization.OptIn)]
    class AccessTokens
    {
        [JsonProperty("expires_in")]
        public int Expiration { get; set; }

        [JsonProperty("access_token")]
        public string AccessToken { get; set; }

        [JsonProperty("refresh_token")]
        public string RefreshToken { get; set; }
    }
}

```
