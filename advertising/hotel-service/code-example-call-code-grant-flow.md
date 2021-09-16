---
title: "Call CodeGrantFlow Code Example"
description: Shows how to call the CodeGrantFlow code example to authenticate the user.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: eric-urban
ms.author: eur
dev_langs:
  - csharp
---

# Call CodeGrantFlow code example

The following shows how to call the [CodeGrantFlow](../hotel-service/code-example-code-grant-flow.md) DLL to get your access and refresh token. You can use the code found here to enable OAuth in the other examples found in this documention.

```csharp
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net;
using Content.OAuth;      // Reference to CodeGrantFlow DLL
using Newtonsoft.Json;    // NuGet Json.NET


namespace Content
{
    class Program
    {
        // The client ID that you were given when you
        // registered your application. This is for a 
        // desktop app so there's not client secret.

        private static string _clientId = "<clientidgoeshere>";   

        // If _storedRefreshToken is null, CodeGrantFlow goes
        // through the entire process of getting the user credentials
        // and permissions. If _storedRefreshToken contains the refresh
        // token, CodeGrantFlow returns the new access and refresh tokens.

        private static string _storedRefreshToken = null;
        private static CodeGrantOauth _tokens = null;
        private static DateTime _tokenExpiration;


        static void Main(string[] args)
        {
            try
            {
                // TODO: Add logic to get the logged on user's refresh token 
                // from secured storage. 
                
                _tokens = GetOauthTokens(_storedRefreshToken);


                Console.WriteLine("access token:" + _tokens.AccessToken.Substring(0, 15) + "...");
                Console.WriteLine("refresh token: " + _tokens.RefreshToken.Substring(0, 15) + "...");
                Console.WriteLine("token expires: " + _tokens.Expiration);
            }
            catch (Exception e)
            {
                Console.WriteLine("\n" + e.Message);
            }
        }


        // Gets the OAuth tokens. If the refresh token doesn't exist, get 
        // the user's consent and a new access and refresh token.

        private static CodeGrantOauth GetOauthTokens(string refreshToken)
        {
            CodeGrantOauth auth = new CodeGrantOauth(_clientId); 

            if (string.IsNullOrEmpty(refreshToken))
            {
                auth.GetAccessToken();
            }
            else
            {
                auth.RefreshAccessToken(refreshToken);

                // Refresh tokens can become invalid for several reasons
                // such as the user's password changed.

                if (!string.IsNullOrEmpty(auth.Error))
                {
                    auth = GetOauthTokens(null);
                }
            }

            // TODO: Store the new refresh token in secured storage
            // for the logged on user.

            _storedRefreshToken = auth.RefreshToken;
            _tokenExpiration = DateTime.Now.AddSeconds(auth.Expiration);

            return auth;
        }
    }
}

```
