---
title: Customer Data Object Test - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a customer object that contains one or more Microsoft Advertising accounts.(test)
---
# Customer Data Object Test - Customer Management
Defines a customer object that contains one or more Microsoft Advertising accounts.

# [XML](#tab/xml)

```xml
<xs:complexType name="Customer" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CustomerFinancialStatus" nillable="true" type="tns:CustomerFinancialStatus" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Industry" nillable="true" type="tns:Industry" />
    <xs:element minOccurs="0" name="LastModifiedByUserId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="LastModifiedTime" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="MarketCountry" nillable="true" type="xs:string" />
    <xs:element xmlns:q4="http://schemas.datacontract.org/2004/07/System.Collections.Generic" minOccurs="0" name="ForwardCompatibilityMap" nillable="true" type="q4:ArrayOfKeyValuePairOfstringstring" />
    <xs:element minOccurs="0" name="MarketLanguage" nillable="true" type="tns:LanguageType" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ServiceLevel" nillable="true" type="tns:ServiceLevel" />
    <xs:element minOccurs="0" name="CustomerLifeCycleStatus" nillable="true" type="tns:CustomerLifeCycleStatus" />
    <xs:element minOccurs="0" name="TimeStamp" nillable="true" type="xs:base64Binary" />
    <xs:element minOccurs="0" name="Number" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="CustomerAddress" nillable="true" type="tns:Address" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "CustomerAddress": {
    "BusinessName": "ValueHere",
    "City": "ValueHere",
    "CountryCode": "ValueHere",
    "Id": "LongValueHere",
    "Line1": "ValueHere",
    "Line2": "ValueHere",
    "Line3": "ValueHere",
    "Line4": "ValueHere",
    "PostalCode": "ValueHere",
    "StateOrProvince": "ValueHere",
    "TimeStamp": "ValueHere"
  },
  "CustomerFinancialStatus": "ValueHere",
  "CustomerLifeCycleStatus": "ValueHere",
  "ForwardCompatibilityMap": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ],
  "Id": "LongValueHere",
  "Industry": "ValueHere",
  "LastModifiedByUserId": "LongValueHere",
  "LastModifiedTime": "ValueHere",
  "MarketCountry": "ValueHere",
  "MarketLanguage": "ValueHere",
  "Name": "ValueHere",
  "Number": "ValueHere",
  "ServiceLevel": "ValueHere",
  "TimeStamp": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [Customer](customer.md) object has the following elements: [CustomerAddress](#customeraddress), [CustomerFinancialStatus](#customerfinancialstatus), [CustomerLifeCycleStatus](#customerlifecyclestatus), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Industry](#industry), [LastModifiedByUserId](#lastmodifiedbyuserid), [LastModifiedTime](#lastmodifiedtime), [MarketCountry](#marketcountry), [MarketLanguage](#marketlanguage), [Name](#name), [Number](#number), [ServiceLevel](#servicelevel), [TimeStamp](#timestamp).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="customeraddress"></a>CustomerAddress|The customer's business address.<br/><br/>This property is not used by Microsoft Advertising, and you must set the account business address instead.<br/><br/>**Add:** Optional<br/>**Update:** Optional|[Address](address.md)|
|<a name="customerfinancialstatus"></a>CustomerFinancialStatus|The financial status of the customer. For example, the status indicates whether the customer is in good standing or one or more of the accounts are past due.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[CustomerFinancialStatus](customerfinancialstatus.md)|
|<a name="customerlifecyclestatus"></a>CustomerLifeCycleStatus|The status of the customer. When you create the customer, the status is set to *Active*. You cannot change the status.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[CustomerLifeCycleStatus](customerlifecyclestatus.md)|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The system-generated customer identifier.<br/><br/>Use this identifier with operation requests that require a *CustomerId* SOAP header element.<br/><br/>**Add:** Read-only<br/>**Update:** Required|**long**|
|<a name="industry"></a>Industry|The primary business segment of the customer, for example, automotive, food, or entertainment.<br/><br/>**Add:** Required<br/>**Update:** Required|[Industry](industry.md)|
|<a name="lastmodifiedbyuserid"></a>LastModifiedByUserId|The identifier of the last user to update the customer's information.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**long**|
|<a name="lastmodifiedtime"></a>LastModifiedTime|The date and time that the customer information was last updated. The value is in Coordinated Universal Time (UTC).<br/><br/>The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the **dateTime** entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**dateTime**|
|<a name="marketcountry"></a>MarketCountry|The primary country where the customer operates. For a list of customer market country code values, see [Product Language](../guides/ad-languages.md#productlanguage).<br/><br/>**Add:** Required<br/>**Update:** Read-only|**string**|
|<a name="marketlanguage"></a>MarketLanguage|The primary language that the customer uses. Your customer market language determines the language of the Microsoft Advertising interface. For a list of customer market language code values, see [Product Language](../guides/ad-languages.md#productlanguage).<br/><br/>**Add:** Required<br/>**Update:** Read-only|[LanguageType](languagetype.md)|
|<a name="name"></a>Name|The name of the customer.<br/><br/>The name can contain a maximum of 90 characters.<br/><br/>**Add:** Required<br/>**Update:** Required|**string**|
|<a name="number"></a>Number|A system-generated customer number that is used in the Microsoft Advertising web application.<br/><br/>The customer number has the form *xxxxxxxxxx*, where *xxxxxxxxxx* is a series of any ten alphanumeric characters.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|
|<a name="servicelevel"></a>ServiceLevel|For internal use only. If this element is set when calling [SignupCustomer](signupcustomer.md) an error will be returned. If this element is set when calling [UpdateCustomer](updatecustomer.md) the element will be ignored.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[ServiceLevel](servicelevel.md)|
|<a name="timestamp"></a>TimeStamp|A time-stamp value that the system uses internally to reconcile updates when you call the [UpdateCustomer](updatecustomer.md) and [DeleteCustomer](deletecustomer.md) operations.<br/><br/>**Add:** Read-only<br/>**Update:** Required|**base64Binary**|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[GetCustomer](getcustomer.md)  
[SearchCustomers](searchcustomers.md)  
[SignupCustomer](signupcustomer.md)  
[UpdateCustomer](updatecustomer.md)  
