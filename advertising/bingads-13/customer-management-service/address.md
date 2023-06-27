---
title: Address Data Object - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a postal address for accounts and user contact information.
---
# Address Data Object - Customer Management
Defines a postal address for accounts and user contact information.

## Syntax
```xml
<xs:complexType name="Address" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="City" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="CountryCode" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Line1" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Line2" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Line3" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Line4" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="PostalCode" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="StateOrProvince" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="TimeStamp" nillable="true" type="xs:base64Binary" />
    <xs:element minOccurs="0" name="BusinessName" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [Address](address.md) object has the following elements: [BusinessName](#businessname), [City](#city), [CountryCode](#countrycode), [Id](#id), [Line1](#line1), [Line2](#line2), [Line3](#line3), [Line4](#line4), [PostalCode](#postalcode), [StateOrProvince](#stateorprovince), [TimeStamp](#timestamp).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="businessname"></a>BusinessName|The legal business name, which can contain a maximum of 100 characters.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="city"></a>City|The city, which can contain a maximum of 35 characters.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="countrycode"></a>CountryCode|The country/region code.<br/><br/>For possible values e.g., "US", see [Geographical Location Codes](../guides/geographical-location-codes.md#countrycodes).<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="id"></a>Id|The system-generated identifier of the address object.<br/><br/>**Add:** Read-only<br/>**Update:** Required|**long**|
|<a name="line1"></a>Line1|The first line of the address, which can contain a maximum of 35 characters.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="line2"></a>Line2|The second line of the address, which can contain a maximum of 35 characters.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="line3"></a>Line3|The third line of the address, which can contain a maximum of 35 characters.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="line4"></a>Line4|The fourth line of the address, which can contain a maximum of 35 characters.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="postalcode"></a>PostalCode|The Postal or ZIP Code, which can contain a maximum of 10 characters.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="stateorprovince"></a>StateOrProvince|The state or province.<br/><br/>You must use the state or province code without country/region prefix. For example given US-WA, you should use only the WA suffix for Washington state.<br/><br/>**Add:** Required for countries or regions that define sub geographies, but should be set to null for countries or regions that do not define sub geographies, such as Singapore.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="timestamp"></a>TimeStamp|The date and time that the address was last updated. The value is in Coordinated Universal Time (UTC).<br/><br/>The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**base64Binary**|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[AdvertiserAccount](advertiseraccount.md)  
[ContactInfo](contactinfo.md)  
[Customer](customer.md)  
[ValidateAddress](validateaddress.md)  
