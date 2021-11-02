---
title: "Account object"
description: "Contains the methods used in single-account scripts to get account information such as name, customer ID, and account-level performance data."
author: rgaritta
ms.author: v-rgaritta
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# Account

Contains the methods used to get account information such as name, customer ID, and account-level performance data.


## Methods
|Method Name|Return Type|Description|
|-|-|-
[getAccountId](#getaccountid)|string|Gets the ID that uniquely identifies this account.
[getAccountNumber](#getaccountnumber)|string|Gets the account number used to identify the account in the Microsoft Advertising web application.
[getCurrencyCode](#getcurrencycode)|string|Gets the currency that this account uses.
[getCustomerId](#getcustomerid)|string|Gets the ID of the customer that owns this account.
[getEntityType](#getentitytype)|string|Gets this entity's type.
[getName](#getname)|string|Gets this account's name.
[getTimeZone](#gettimezone)|string|Gets the preferred time zone to use for campaigns in this account.

<!--
[getStats](#getstats)|[Stats](Stats.md)|Gets the performance data for this managed account.
-->

## <a name="getaccountid"></a>getAccountId
Gets this account's ID.

### Returns
|Type|Description|
|-|-
string|The ID that uniquely identifies this account.


## <a name="getaccountnumber"></a>getAccountNumber
Gets this account's account number.

### Returns
|Type|Description|
|-|-
string|The account number used to identify the account in the Microsoft Advertising web application.


## <a name="getcurrencycode"></a>getCurrencyCode
Gets this account's currency code.

### Returns
|Type|Description|
|-|-
string|The currency that this account uses. For example, USD for United States dollar.


## <a name="getcustomerid"></a>getCustomerId
Gets the ID of the customer that owns this account.

### Returns
|Type|Description|
|-|-
string|The ID of the customer that owns this account.


## <a name="getentitytype"></a>getEntityType
Gets this entity's type.

### Returns
|Type|Description|
|-|-
string|This entity's type, which is *Account*.


## <a name="getname"></a>getName
Gets this account's name.

### Returns
|Type|Description|
|-|-
string|The name of this account.

<!--
## <a name="getstats"></a>getStats
Gets the performance data for this account. 

### Returns:
|Type|Description|
|-|-
[Stats](Stats.md)|The performance data for this account.
-->

## <a name="gettimezone"></a>getTimeZone
Gets this account's time zone.

### Returns
|Type|Description|
|-|-
string|The preferred time zone to use for campaigns in this account. For a list of time zones, see [Account time zones](../concepts/timezone-mapping.md).

