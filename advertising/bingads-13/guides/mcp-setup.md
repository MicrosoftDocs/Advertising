---
title: MCP Server Setup Guide
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 7/22/2026
description: Register an OAuth client and connect Microsoft Advertising MCP Server to supported AI clients, including Copilot Studio, GitHub Copilot in VS Code, ChatGPT, and Claude.
---
# Microsoft Advertising MCP Server Setup Guide

Register an OAuth client and connect Microsoft Advertising MCP Server to supported AI clients, including Copilot Studio, GitHub Copilot in VS Code, ChatGPT, and Claude. No prior experience with MCP servers or developer tools is required.

## Overview

Microsoft Advertising MCP uses Azure Active Directory (AAD) OAuth authentication to securely connect AI assistants to Microsoft Advertising data. Before connecting an AI client, you must create an AAD application registration and configure the required authentication settings.

## Prerequisites

Complete the following requirements before configuring any supported AI client.

### Install Azure CLI

1. Install Azure CLI.
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

Create an application that supports both organizational and personal Microsoft accounts:

```bash
az ad app create --display-name "Ads MCP App" --sign-in-audience AzureADandPersonalMicrosoftAccount
```

### Find the Client ID

Retrieve the application client ID:

```bash
az ad app list --display-name "Ads MCP App" --query "[].appId" --output tsv
```

> **Tip:** The create command also returns the `appId`. Save it when creating the application to avoid running a separate lookup command.

## Set Up Your AI Client

Complete only the section for the AI client you intend to use. The same AAD application can be used to configure additional clients later.

---

## Copilot Studio

### Create the MCP Connector

1. In Copilot Studio, go to **Tools > New tool > Model Context Protocol**.
2. Enter a server name and description.
3. Set the Server URL:

```text
https://partner.api.bingads.microsoft.com/ext/mcp/vnext?toolSetNames=OpenBeta
```

4. Set Authentication to **OAuth 2.0** and Type to **Manual**.
5. Enter the client ID from your AAD application.

### Create a Client Secret

```powershell
$clientId = '<client-id>'
az ad app credential reset --append --id $clientId --query password --output tsv
```

> **Important:** Use the returned password as the Client Secret and store it securely. Do not share or expose this value.

### OAuth Settings

| Setting | Value |
|----------|--------|
| Authorization URL | `https://login.microsoftonline.com/common/oauth2/v2.0/authorize` |
| Token URL | `https://login.microsoftonline.com/common/oauth2/v2.0/token` |
| Refresh URL | `https://login.microsoftonline.com/common/oauth2/v2.0/token` |
| Scopes | `https://ads.microsoft.com/msads.manage offline_access` |

### Add the Connector to an Agent

1. Create a new agent.
2. Add the MCP connector as a tool.
3. Create a connection and sign in with your Microsoft Advertising account.
4. Save the configuration.
5. Test the connection with a Microsoft Advertising prompt.

If prompted, refresh the connection and sign in again.

---

## GitHub Copilot in VS Code

### Open MCP User Configuration

1. Open VS Code.
2. Open the Command Palette.
3. Select **MCP: Open User Configuration**.

### Configure the Server

Replace `<client-id>` with your application client ID:

```json
{
  "servers": {
    "microsoft-ads-mcp": {
      "url": "https://partner.api.bingads.microsoft.com/ext/mcp/vnext?toolSetNames=OpenBeta",
      "type": "http",
      "oauth": {
        "clientId": "<client-id>"
      }
    }
  }
}
```

### Verify the Connection

1. Save `mcp.json`.
2. Start the MCP server.
3. Complete sign-in.
4. Open GitHub Copilot Chat in Agent mode.
5. Confirm the server is running.

Example prompts:

- What customers do I have access to in Microsoft Advertising?
- Show my Microsoft Advertising user information.

---

## ChatGPT

### Enable Developer Mode

1. Navigate to **Workspace Settings > Plugins > Developer mode**.
2. Enable Developer Mode.

Business, Enterprise, and Education workspaces require an administrator to enable Developer Mode.

### Create a Connector

1. Create a new plugin or connector.
2. Enter a connector name.
3. Set the server URL:

```text
https://partner.api.bingads.microsoft.com/ext/mcp/vnext
```

4. Select **OAuth** authentication.
5. Configure OAuth settings using your client ID.

### OAuth Settings

| Setting | Value |
|----------|--------|
| Authorization URL | `https://login.microsoftonline.com/common/oauth2/v2.0/authorize` |
| Token URL | `https://login.microsoftonline.com/common/oauth2/v2.0/token` |
| Authorization Server Base | `https://login.microsoftonline.com/common/oauth2/v2.0` |
| Resource | Leave empty |
| Scope | `https://ads.microsoft.com/msads.manage` |

### Complete Setup

1. Copy the generated Callback URL.
2. Add it as a public client redirect URI in your AAD application.
3. Create the connector.
4. Sign in and grant consent.
5. Test the connection.

Select **"I understand and want to continue"** when prompted.

---

## Claude

### Configure Redirect URI

Add Claude's OAuth callback URL as a public client redirect URI in the AAD application.

### Add the Connector

1. Go to **Settings > Customize > Connectors**.
2. Select **Add custom connector**.
3. Enter a name.
4. Set the MCP Server URL:

```text
https://partner.api.bingads.microsoft.com/ext/mcp/vnext?toolSetNames=OpenBeta
```

5. Open Advanced Settings.
6. Enter the OAuth client ID.
7. Add the connector.
8. Sign in and grant consent.
9. Enable the connector in the conversation.

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
