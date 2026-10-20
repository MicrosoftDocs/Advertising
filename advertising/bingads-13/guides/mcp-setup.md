---
title: MCP Server Setup Guide
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 10/20/2026
description: Register an OAuth client and connect Microsoft Advertising MCP Server to supported AI clients, including Copilot Studio, GitHub Copilot in VS Code, ChatGPT, and Claude.
---
# Microsoft Advertising MCP Server Setup Guide

Register an OAuth client and connect Microsoft Advertising MCP Server to supported AI clients, including Copilot Studio, GitHub Copilot in VS Code, ChatGPT, and Claude. No prior experience with MCP servers or developer tools is required.

## Overview

Microsoft Advertising MCP uses Microsoft Entra ID (formerly Azure Active Directory, or AAD) OAuth authentication to securely connect AI assistants to Microsoft Advertising data. Connect through Copilot Studio, GitHub Copilot in VS Code, ChatGPT, or Claude.

Both Microsoft Entra ID (AAD) work or school accounts and personal Microsoft accounts (MSA) are supported for Microsoft Advertising authorization. Use an account with access to the Microsoft Advertising customers and accounts you want to query, and follow the client-specific OAuth settings in this guide.

**Copilot Studio distinction:** Use a work or school (AAD) account to access Copilot Studio itself. You can then authorize its Microsoft Advertising connector with either AAD or MSA. For the other clients, use the account required by that client or its organization; authorize Microsoft Advertising separately with AAD or MSA.

## Prerequisites

Use an AAD or MSA account with access to the Microsoft Advertising customers and accounts you want to query. The [client setup requirements](#set-up-your-ai-client) below explain when to complete the Azure CLI and app-registration steps and when to use interactive sign-in instead.

### Client availability

- **Copilot Studio:** Use a work or school (AAD) account with access to Copilot Studio and its MCP features. AAD or MSA can be used for the Microsoft Advertising connection.
- **GitHub Copilot in VS Code:** Use an account with access to GitHub Copilot and its MCP features. The Microsoft Advertising connection supports AAD or MSA separately from your GitHub sign-in.
- **ChatGPT:** Use ChatGPT on the web with Plus, Pro, Business, Enterprise, or Edu. Business, Enterprise, and Edu workspaces require an administrator or owner to enable Developer mode.
- **Claude:** Remote MCP custom connectors are available on Claude, Cowork, and Claude Desktop for Free, Pro, Max, Team, and Enterprise. Free users are limited to one custom connector. Team and Enterprise connectors must first be added by an Owner or Primary Owner.

### Install Azure CLI

These steps administer your OAuth application, rather than authorize the Microsoft Advertising connection. Sign in to an Azure account with access to the Microsoft Entra tenant where the application will be registered and permission to create app registrations. Using an MSA for Microsoft Advertising does not by itself grant app-registration permissions. See [Microsoft Entra app-registration prerequisites](/entra/identity-platform/quickstart-register-app).

1. [Install Azure CLI](/cli/azure/install-azure-cli).
2. Close and reopen all terminal windows.
3. Verify the installation:

```bash
az --version
```

4. Sign in to Azure:

```bash
az login
```

5. If you need to continue without an Azure subscription:

```bash
az login --allow-no-subscription
```

### Create an AAD Application Registration

Create an application that accepts both AAD work or school accounts and personal Microsoft accounts (MSA):

```bash
az ad app create --display-name "Ads MCP App" --sign-in-audience AzureADandPersonalMicrosoftAccount
```

`AzureADandPersonalMicrosoftAccount` is the required sign-in audience for supporting both account types. It does not grant access to Microsoft Advertising; each user must already have the necessary Microsoft Advertising account permissions.

### Find the Client ID

Retrieve the application client ID:

```bash
az ad app list --display-name "Ads MCP App" --query "[].appId" --output tsv
```

> **Tip:** The create command also returns the `appId`. Save it when creating the application to avoid running a separate lookup command.

## Set Up Your AI Client

Complete only the section for the AI client you intend to use. The Microsoft Advertising connection in each client supports AAD and MSA, with the setup described below:

- **Copilot Studio:** Complete the Azure CLI and app-registration steps, create a client secret, and register the generated Web redirect URI.
- **GitHub Copilot in VS Code:** Use the HTTP server configuration and interactive Microsoft sign-in. You do not need to create an app registration or enter your own client ID for this configuration.
- **ChatGPT:** Complete the Azure CLI and app-registration steps, select a user-defined OAuth client, and register the generated public client Callback URL.
- **Claude:** Complete the Azure CLI and app-registration steps, register Claude's public client callback URI, and select your own OAuth client.

You can reuse one app registration for the clients that require your own OAuth application by adding each client's redirect URI to the appropriate platform.

Use this MCP server URL in each client:

```text
https://partner.api.bingads.microsoft.com/ext/mcp/vnext
```

---

## Copilot Studio

**Microsoft Advertising sign-in:** AAD and MSA are both supported for the connector's OAuth connection. Access Copilot Studio itself with a work or school (AAD) account; the Microsoft Advertising connection can use either account type.

### Create the MCP Connector

1. Open [Copilot Studio](https://copilotstudio.microsoft.com/).
2. Go to **Agents > New Agent > Build using Standard orchestration > Agent**.
3. Enter an agent name and create the agent.
4. Go to **Tools > Add a tool > Model Context Protocol**.
5. Enter a server name and description.
6. Set the **Server URL** to:

```text
https://partner.api.bingads.microsoft.com/ext/mcp/vnext
```

7. Set **Authentication** to **OAuth 2.0** and **Type** to **Manual**.
8. Enter the client ID from your app registration. Create the client secret and configure OAuth as described below.

### Create a Client Secret

```powershell
$clientId = '<client-id>'
az ad app credential reset --append --id $clientId --query password --output tsv
```

> **Important:** Use the returned password as the Client Secret and store it securely. Do not share or expose this value.

### OAuth Settings

| Setting | Value |
|----------|--------|
| Authorization URL | `https://login.microsoftonline.com/client/oauth2/v2.0/authorize` |
| Token URL | `https://login.microsoftonline.com/client/oauth2/v2.0/token` |
| Refresh URL | `https://login.microsoftonline.com/client/oauth2/v2.0/token` |
| Scopes | `https://ads.microsoft.com/msads.manage offline_access` |

### Register the Copilot Studio redirect URL

1. Select **Create** to save the connector.
2. Copy the generated **Redirect URL**.
3. In PowerShell, replace `<client-id>` and `<generated-redirect-url>` with your application's client ID and the exact generated URL. Register it as a **Web** redirect URI:

```powershell
$clientId = '<client-id>'
$redirectUri = '<generated-redirect-url>'
$app = az ad app show --id $clientId | ConvertFrom-Json
$uris = @($app.web.redirectUris) + $redirectUri | Where-Object { $_ } | Select-Object -Unique
az ad app update --id $clientId --web-redirect-uris $uris
```

Use the URL generated for your connector, not an example URL ending in `/xxx`. This command preserves existing Web redirect URIs.

### Add the Connector to an Agent

1. In your agent, go to **Add tool > Connection > Create new connection**.
2. Enter a display name and select **Create**.
3. Authorize Microsoft Advertising with an AAD work or school account or an MSA personal Microsoft account that has access to the target Microsoft Advertising accounts.
4. Select **Add and Configure** to add the connector to the agent.
5. Test the connection using the prompt below. Replace the example IDs with an account and customer you can access.

```text
List my advertising campaigns for AccountId 123, CustomerId 456.
```

If prompted, refresh the tool connection and sign in again.

---

## GitHub Copilot in VS Code

**Microsoft Advertising sign-in:** AAD and MSA are both supported. Use either account type in the Microsoft sign-in prompt when starting the MCP server. This authorization is separate from the GitHub account used for GitHub Copilot.

### Open MCP User Configuration

1. Open VS Code.
2. Open the Command Palette with **Ctrl+Shift+P** on Windows or Linux, or **Cmd+Shift+P** on macOS.
3. Select **MCP: Open User Configuration**.

If the command is missing, update VS Code and the GitHub Copilot Chat extension.

### Configure the Server

Add the following server to `mcp.json`. If you already have other servers configured, keep them and add this entry to the existing `servers` object.

```json
{
  "servers": {
    "microsoft-ads-mcp": {
      "url": "https://partner.api.bingads.microsoft.com/ext/mcp/vnext",
      "type": "http"
    }
  }
}
```

This configuration does not include an `oauth.clientId` property. Complete interactive sign-in when starting the server.

### Verify the Connection

1. Save `mcp.json`.
2. Open the Command Palette and select **MCP: List Servers**.
3. Select **microsoft-ads-mcp** and start it.
4. In the Microsoft sign-in prompt, authorize Microsoft Advertising with an AAD work or school account or an MSA personal Microsoft account that has access to the target Microsoft Advertising accounts.
5. Open GitHub Copilot Chat and switch to **Agent** mode.
6. Confirm that the server is running, then test the connection:

- What customers do I have access to in Microsoft Advertising?
- Show my Microsoft Advertising user information.

---

## ChatGPT

**Microsoft Advertising sign-in:** AAD and MSA are both supported through the OAuth configuration below. The Microsoft account used in the OAuth consent flow is separate from your ChatGPT account or workspace sign-in.

### Enable Developer Mode

Custom MCP connectors in Developer mode are available on ChatGPT web for **Plus, Pro, Business, Enterprise, and Edu**.

1. Go to **Workspace Settings > Plugins > Developer mode**.
2. Enable **Developer mode**.

For Business, Enterprise, and Edu, an administrator or owner must enable the capability for the workspace first. The workspace administrative path is **Workspace Settings > Permissions & Roles > Connected Data Developer mode**; individual members cannot enable it themselves.

### Create a Connector

1. After enabling Developer mode, go to **Plugins** in the top-left panel and select **+ > Create app**. Alternatively, go to **Workspace settings > Plugins > Browse plugins**, select **+** next to the search field, then select **Create app**.
2. Enter a name, such as **Microsoft Ads MCP**.
3. Set the **Connection Server URL** to:

```text
https://partner.api.bingads.microsoft.com/ext/mcp/vnext
```

4. Select **OAuth** authentication.
5. Open **Advanced OAuth settings** and enter the values below.

### OAuth Settings

| Setting | Value |
|----------|--------|
| Client Registration | **User-Defined OAuth Client** |
| Client ID | Your application's client ID |
| Token endpoint auth method | **None** |
| Default scopes | `https://ads.microsoft.com/msads.manage` and `offline_access` |
| Authorization URL | `https://login.microsoftonline.com/client/oauth2/v2.0/authorize` |
| Token URL | `https://login.microsoftonline.com/client/oauth2/v2.0/token` |
| Authorization server base | `https://login.microsoftonline.com/client/oauth2/v2.0` |
| Resource | `https://partner.api.bingads.microsoft.com/ext/mcp/vnext` |

If scopes are entered as a single text value, separate them with a space: `https://ads.microsoft.com/msads.manage offline_access`.

### Complete Setup

1. Copy the generated **Callback URL**.
2. In PowerShell, replace the placeholders below with your application's client ID and that exact Callback URL. Register it as a **public client** redirect URI:

```powershell
$clientId = '<client-id>'
$redirectUri = '<generated-callback-url>'
$app = az ad app show --id $clientId | ConvertFrom-Json
$uris = @($app.publicClient.redirectUris) + $redirectUri | Where-Object { $_ } | Select-Object -Unique
az ad app update --id $clientId --public-client-redirect-uris $uris
```

Use the generated URL, not an example URL ending in `/xxx`. This command preserves existing public client redirect URIs.

3. Select **I understand and want to continue** when prompted.
4. Select **Create**.
5. Authorize Microsoft Advertising with an AAD work or school account or an MSA personal Microsoft account that has access to the target Microsoft Advertising accounts, then grant consent.
6. Test the connection. Replace the example IDs with an account and customer you can access:

```text
List my advertising campaigns for AccountId 123, CustomerId 456.
```

---

## Claude

**Microsoft Advertising sign-in:** AAD and MSA are both supported when you register the callback URI and use your own OAuth client as described below. This Microsoft Advertising authorization is separate from your Claude account or organization sign-in.

### Configure Redirect URI

Add Claude's OAuth callback URL as a public client redirect URI in the AAD application:

```powershell
$clientId = '<client-id>'
$app = az ad app show --id $clientId | ConvertFrom-Json
$uris = $app.publicClient.redirectUris + "https://claude.ai/api/mcp/auth_callback" | Select-Object -Unique
az ad app update --id $clientId --public-client-redirect-uris $uris
```

### Availability

Remote MCP custom connectors are available on Claude, Cowork, and Claude Desktop for Free, Pro, Max, Team, and Enterprise plans. Free users are limited to one custom connector.

### Team and Enterprise

For Team and Enterprise plans, only an Owner or Primary Owner can add a connector through **Organization Settings > Connectors > Add**. Members connect individually after the connector is added.

### Add the Connector

1. Go to **Settings > Connectors**.
2. Select **Add > Add custom connector**.
3. Enter a name, such as **Microsoft Ads MCP**.
4. Set the **MCP Server URL** to:

```text
https://partner.api.bingads.microsoft.com/ext/mcp/vnext
```

5. Under **Authentication**, select **Sign in now**.
6. Under **OAuth client**, select **Use your own OAuth client**.
7. Enter the OAuth client ID from your app registration.
8. Select **Add**, then **Connect**.
9. Authorize Microsoft Advertising with an AAD work or school account or an MSA personal Microsoft account that has access to the target Microsoft Advertising accounts, then grant consent.
10. Enable the connector in the conversation and test it. Replace the example IDs with an account and customer you can access:

```text
List my advertising campaigns for AccountId 123, CustomerId 456.
```

---

## Troubleshooting

### VS Code Broker Sign-In Error

If VS Code displays the following error:

```text
Error getting token from server metadata: ClientAuthError:
platform_broker_error: An error occurred in the native broker.
See the platformBrokerError property for details.
```

Update the authentication implementation setting:

1. Open **File > Preferences > Settings**.
2. Search for `microsoft-authentication.implementation`.
3. Change the value from:

```text
msal
```

to:

```text
msal-no-broker
```

4. Restart the MCP server.
5. Sign in again.

## Next Steps

After configuration is complete, test your MCP connection by running a Microsoft Advertising query such as retrieving campaigns, customers, or account information through your selected AI client.
