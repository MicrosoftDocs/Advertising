---
title: Get Started With the Bing Ads API
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Get a developer token and learn about authentication with the Bing Ads API.
dev_langs:
  - csharp
  - java
  - php
  - python
---
# Get Started With the Bing Ads API

Any Microsoft Advertising user with a developer token can begin using the Bing Ads API. For advertisers placing a large number of ads or developers building advertising tools, the Bing Ads API provides a programmatic interface to Microsoft Advertising.  

You can develop your Bing Ads API application in any language that supports web services. To get started with a specific SDK, see Get Started in [C#](get-started-csharp.md) | [Java](get-started-java.md) | [PHP](get-started-php.md) | [Python](get-started-python.md).  

## <a name="access-token"></a>Get a user access token

Consider the user that you want to sign in e.g., example@contoso.com. The Bing Ads API will not accept that email address and password. Instead you need to set the AuthenticationToken header element that contains a user access token. You can think of an access token as representing a user name and password.

How can you get an access token for a user? As an application developer you'll use a Microsoft authorization URL to prompt the Microsoft Advertising user for consent. Once a user provides consent, you can get an access token and act on behalf of the user. The access token represents the user credentials who has access to one or more Microsoft Advertising accounts.

1. [Register an application](authentication-oauth-register.md)

1. [Request user consent](authentication-oauth-consent.md) for your application to manage their Microsoft Advertising accounts

1. [Get access and refresh tokens](authentication-oauth-get-tokens.md)  

1. [Make your first API call](authentication-oauth-quick-start.md)  

> [!TIP]
> For details about how to get access and refresh tokens using the Bing Ads SDKs, see [Authentication With the SDKs](sdk-authentication.md#oauth).  

## <a name="get-developer-token"></a>Get a Developer Token

To use Bing Ads APIs, you must have a developer token and valid user credentials. If you do not yet have a Microsoft Advertising account, you can sign up via the [Microsoft Advertising web application](https://ads.microsoft.com/).  

> [!NOTE]
> The sandbox and production environments use separate credentials. You can sign up for a [Sandbox](sandbox.md) account [here](https://secure.sandbox.bingads.microsoft.com/). Everyone can use the universal sandbox developer token i.e., **BBD37VB98**.  

You can follow these steps to get a developer token for production.

> [!NOTE]
> Starting May 31, 2025, the Developer Portal page will be deprecated and replaced with a new version [here](https://ads.microsoft.com/cc/Settings/DevSettings). Please update your bookmarks and begin using the new page to avoid any disruptions. For questions or help, please contact [Support](https://about.ads.microsoft.com/en/support).

1. Sign in with [Super Admin](account-hierarchy-permissions.md#user-roles-permissions) credentials at the [Microsoft Advertising Developer Portal](https://developers.ads.microsoft.com/Account) account tab.  
1. Choose the user that you want associated with the developer token. Typically an application only needs one universal token regardless how many users will be supported.  
1. Click on the **Request Token** button.  

The universal developer token can be used to authenticate with any Microsoft Advertising user credentials. You can use the same universal developer token whether your application will be used by one or multiple Microsoft Advertising users. As of July 2019, this is the default token type.  

The single-user developer token can only be used to authenticate one user for access to one customer. This token type has been deprecated in favor of the universal token. If you still see that a single user token is assigned to one of your users, you can select "Upgrade to Universal".  

A developer token enables programmatic access to the accounts permitted for a user. Obtaining a developer token for API access does not grant additional permissions to any Microsoft Advertising accounts. Each Microsoft Advertising user is assigned a [role](account-hierarchy-permissions.md#user-roles-permissions) e.g., Super Admin or Advertiser Campaign Manager for every customer they can access. With a developer token the same accounts available in the Microsoft Advertising web application are available to the user programmatically through the API.  

## <a name="where-to-use"></a>Where to Use the API Credentials

When you call a service operation such as [GetCampaignsByAccountId](../campaign-management-service/getcampaignsbyaccountid.md), you must specify [request header](#request-headers) elements such as DeveloperToken, CustomerId, and CustomerAccountId.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
    <Action mustUnderstand="1">GetCampaignsByAccountId</Action>
    <ApplicationToken i:nil="false">ValueHere</ApplicationToken>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <CustomerAccountId i:nil="false">ValueHere</CustomerAccountId>
    <CustomerId i:nil="false">ValueHere</CustomerId>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <GetCampaignsByAccountIdRequest xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <AccountId>ValueHere</AccountId>
      <CampaignType>ValueHere</CampaignType>
    </GetCampaignsByAccountIdRequest>
  </s:Body>
</s:Envelope>
```

If you are using one of the Microsoft Advertising [SDKs](client-libraries.md), the [request header](#request-headers) elements are set using *AuthorizationData*. For more details about the SDK authentication library see [Authentication With the SDKs](sdk-authentication.md). 

```csharp
var authorizationData = new AuthorizationData
{
    Authentication = <AuthenticationGoesHere>, 
    CustomerId = <CustomerIdGoesHere>,
    AccountId = <AccountIdGoesHere>,
    DeveloperToken = "<DeveloperTokenGoesHere>"
};
```
```java
static AuthorizationData authorizationData = new AuthorizationData();
authorizationData.setAuthentication(<AuthenticationGoesHere>);
authorizationData.setCustomerId("<CustomerIdGoesHere>");
authorizationData.setAccountId("<AccountIdGoesHere>");
authorizationData.setDeveloperToken("<DeveloperTokenGoesHere>");
```
```php
$authorizationData = (new AuthorizationData())
    ->withAuthentication($AuthenticationGoesHere)
    ->withCustomerId($CustomerIdGoesHere)
    ->withAccountId($AccountIdGoesHere)
    ->withDeveloperToken($DeveloperTokenGoesHere);
```
```python
authorization_data = AuthorizationData(
    authentication = <AuthenticationGoesHere>,
    customer_id = <CustomerIdGoesHere>,
    account_id = <AccountIdGoesHere>,
    developer_token = '<DeveloperTokenGoesHere>'
)
```

## <a name="get-ids"></a>Get Your Account and Customer IDs

To get a user's customer ID and account ID, you can sign in to the Microsoft Advertising web application and click on the **Campaigns** tab. The URL will contain a *cid* key/value pair in the query string that identifies your customer ID, and an *aid* key/value pair that identifies your account ID. For example, *https://ui.ads.microsoft.com/campaign/Campaigns.m?cid=FindCustomerIdHere&aid=FindAccountIdHere#/customer/FindCustomerIdHere/account/FindAccountIdHere/campaign*.

> [!TIP]
> Do not mistake the account number for the account identifier. The account number is the system-generated account number that is used to identify the account in the Microsoft Advertising web application. The account number has the form xxxxxxxx, where xxxxxxxx is a series of any eight alphanumeric characters. The API service requests only use the account identifier, and never use the account number.

With the Customer Management API you can get the customer and account identifiers for each authenticated user. 

Call [GetUser](../customer-management-service/getuser.md) with your Microsoft Advertising credentials and DeveloperToken. Within the Body set the UserId nil. The response will include a [User](../customer-management-service/user.md) object that contains the UserId.

```xml
<?xml version="1.0" encoding="utf-8"?>
<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header>
    <h:ApplicationToken i:nil="true" xmlns:h="https://bingads.microsoft.com/Customer/v13" xmlns:i="http://www.w3.org/2001/XMLSchema-instance" />
    <h:AuthenticationToken xmlns:h="https://bingads.microsoft.com/Customer/v13">OAuthAccessTokenGoesHere</h:AuthenticationToken>
    <h:DeveloperToken xmlns:h="https://bingads.microsoft.com/Customer/v13">DeveloperTokenGoesHere</h:DeveloperToken>
  </s:Header>
  <s:Body>
    <GetUserRequest xmlns="https://bingads.microsoft.com/Customer/v13">
      <UserId i:nil="true" xmlns:i="http://www.w3.org/2001/XMLSchema-instance" />
    </GetUserRequest>
  </s:Body>
</s:Envelope>
```

Then call [SearchAccounts](../customer-management-service/searchaccounts.md) with the UserId returned via the previous step. The returned advertiser account (or accounts) will include account and customer identifiers.

```xml
<?xml version="1.0" encoding="utf-8"?>
<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header>
    <h:ApplicationToken i:nil="true" xmlns:h="https://bingads.microsoft.com/Customer/v13" xmlns:i="http://www.w3.org/2001/XMLSchema-instance" />
    <h:AuthenticationToken xmlns:h="https://bingads.microsoft.com/Customer/v13">OAuthAccessTokenGoesHere</h:AuthenticationToken>
    <h:DeveloperToken xmlns:h="https://bingads.microsoft.com/Customer/v13">DeveloperTokenGoesHere</h:DeveloperToken>
  </s:Header>
  <s:Body>
    <SearchAccountsRequest xmlns="https://bingads.microsoft.com/Customer/v13">
      <Predicates xmlns:a="https://bingads.microsoft.com/Customer/v13/Entities" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
        <a:Predicate>
          <a:Field>UserId</a:Field>
          <a:Operator>Equals</a:Operator>
          <a:Value>UserIdGoesHere</a:Value>
        </a:Predicate>
      </Predicates>
      <Ordering i:nil="true" xmlns:a="https://bingads.microsoft.com/Customer/v13/Entities" xmlns:i="http://www.w3.org/2001/XMLSchema-instance" />
      <PageInfo xmlns:a="https://bingads.microsoft.com/Customer/v13/Entities" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
        <a:Index>0</a:Index>
        <a:Size>10</a:Size>
      </PageInfo>
    </SearchAccountsRequest>
  </s:Body>
</s:Envelope>
```

> [!TIP]
> See [Search User Accounts Code Example](code-example-search-user-accounts.md) for a code example that returns accounts for the current authenticated user.

## <a name="request-headers"></a>Header elements reference
Bing Ads API service operations use Simple Object Access Protocol (SOAP) to exchange the request and response messages with the service operation. For more information, see [Bing Ads API Services Protocol](services-protocol.md).

Each SOAP request must include the following SOAP headers, which contain the user's credentials.

> [!NOTE]
> The CustomerAccountId and CustomerId elements are not applicable for the Customer Billing and Customer Management services. 

|Element|Description|Data Type|
|-----------|---------------|-------------|
|ApplicationToken|This header element is not used and should be ignored.|**string**|
|AuthenticationToken|The OAuth access token that represents a Microsoft Account user who has permissions to Microsoft Advertising accounts. For more information, see [Authentication with OAuth](authentication-oauth.md).|**string**|
|CustomerAccountId|The identifier of the account that owns the entities in the request. This header element must have the same value as the AccountId body element when both are required. This element is required for most service operations, and as a best practice you should always set it.|**string**|
|CustomerId|The identifier of the customer that contains and owns the account. If you manage an account of another customer, you should use that customer ID instead of your own customer ID. This element is required for most service operations, and as a best practice you should always set it.|**string**|
|DeveloperToken|The developer token used to access the Bing Ads API.|**string**|
|Password|This element is reserved for internal use and will be removed from a future version of the API. You must use the AuthenticationToken element to set [user credentials](#access-token). |**string**|
|UserName|This element is reserved for internal use and will be removed from a future version of the API. You must use the AuthenticationToken element to set [user credentials](#access-token).|**string**|

## <a name="need-help"></a>Need Help?
For troubleshooting tips, see [Handling Service Errors and Exceptions](handle-service-errors-exceptions.md).

The [Microsoft Q&A](/answers/topics/advertising-api.html) forum is available for the developer community to ask and answer questions about the Bing Ads APIs and Microsoft Advertising Scripts. Microsoft monitors the forums and replies to questions that the community has not yet answered.

> [!IMPORTANT]
> To make sure that we see your question, tag it with 'advertising-api'.  

If the investigation involves sensitive account or personal details, or if you are not finding the information you need to solve your problem via [Microsoft Q&A](/answers/topics/advertising-api.html), please contact [Microsoft Advertising Support](https://about.ads.microsoft.com/en-us/microsoft-advertising-support). To resolve the issue efficiently, please provide support with the details requested in [Engaging Support](handle-service-errors-exceptions.md#contact-support). 

## See Also

[Bing Ads API Overview](index.md)  
[Bing Ads API Concepts](concepts.md)
