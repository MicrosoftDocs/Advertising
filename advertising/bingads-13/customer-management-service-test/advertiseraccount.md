---
title: AdvertiserAccount Data Object Test - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an advertiser account.(test)
---
# AdvertiserAccount Data Object Test - Customer Management
Defines an advertiser account.

# [XML](#tab/xml)

```xml
<xs:complexType name="AdvertiserAccount" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="BillToCustomerId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="CurrencyCode" nillable="true" type="tns:CurrencyCode" />
    <xs:element minOccurs="0" name="AccountFinancialStatus" nillable="true" type="tns:AccountFinancialStatus" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Language" nillable="true" type="tns:LanguageType" />
    <xs:element minOccurs="0" name="LastModifiedByUserId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="LastModifiedTime" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Number" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ParentCustomerId" type="xs:long" />
    <xs:element minOccurs="0" name="PaymentMethodId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="PaymentMethodType" nillable="true" type="tns:PaymentMethodType" />
    <xs:element minOccurs="0" name="PrimaryUserId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="AccountLifeCycleStatus" nillable="true" type="tns:AccountLifeCycleStatus" />
    <xs:element minOccurs="0" name="TimeStamp" nillable="true" type="xs:base64Binary" />
    <xs:element minOccurs="0" name="TimeZone" nillable="true" type="tns:TimeZoneType" />
    <xs:element minOccurs="0" name="PauseReason" nillable="true" type="xs:unsignedByte" />
    <xs:element xmlns:q1="http://schemas.datacontract.org/2004/07/System.Collections.Generic" minOccurs="0" name="ForwardCompatibilityMap" nillable="true" type="q1:ArrayOfKeyValuePairOfstringstring" />
    <xs:element minOccurs="0" name="LinkedAgencies" nillable="true" type="tns:ArrayOfCustomerInfo" />
    <xs:element minOccurs="0" name="SalesHouseCustomerId" nillable="true" type="xs:long" />
    <xs:element xmlns:q2="http://schemas.datacontract.org/2004/07/System.Collections.Generic" minOccurs="0" name="TaxInformation" nillable="true" type="q2:ArrayOfKeyValuePairOfstringstring" />
    <xs:element minOccurs="0" name="BackUpPaymentInstrumentId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="BillingThresholdAmount" nillable="true" type="xs:decimal" />
    <xs:element minOccurs="0" name="BusinessAddress" nillable="true" type="tns:Address" />
    <xs:element minOccurs="0" name="AutoTagType" nillable="true" type="tns:AutoTagType" />
    <xs:element minOccurs="0" name="SoldToPaymentInstrumentId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="TaxCertificate" nillable="true" type="tns:AccountTaxCertificate">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="AccountMode" nillable="true" type="xs:string">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AccountFinancialStatus": "ValueHere",
  "AccountLifeCycleStatus": "ValueHere",
  "AccountMode": "ValueHere",
  "AutoTagType": "ValueHere",
  "BackUpPaymentInstrumentId": "LongValueHere",
  "BillingThresholdAmount": DecimalValueHere,
  "BillToCustomerId": "LongValueHere",
  "BusinessAddress": {
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
  "CurrencyCode": "ValueHere",
  "ForwardCompatibilityMap": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ],
  "Id": "LongValueHere",
  "Language": "ValueHere",
  "LastModifiedByUserId": "LongValueHere",
  "LastModifiedTime": "ValueHere",
  "LinkedAgencies": [
    {
      "Id": "LongValueHere",
      "Name": "ValueHere"
    }
  ],
  "Name": "ValueHere",
  "Number": "ValueHere",
  "ParentCustomerId": "LongValueHere",
  "PauseReason": "ValueHere",
  "PaymentMethodId": "LongValueHere",
  "PaymentMethodType": "ValueHere",
  "PrimaryUserId": "LongValueHere",
  "SalesHouseCustomerId": "LongValueHere",
  "SoldToPaymentInstrumentId": "LongValueHere",
  "TaxCertificate": {
    "Status": "ValueHere",
    "TaxCertificateBlobContainerName": "ValueHere",
    "TaxCertificates": [
      {
        "key": "ValueHere",
        "value": "ValueHere"
      }
    ]
  },
  "TaxInformation": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ],
  "TimeStamp": "ValueHere",
  "TimeZone": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AdvertiserAccount](advertiseraccount.md) object has the following elements: [AccountFinancialStatus](#accountfinancialstatus), [AccountLifeCycleStatus](#accountlifecyclestatus), [AccountMode](#accountmode), [AutoTagType](#autotagtype), [BackUpPaymentInstrumentId](#backuppaymentinstrumentid), [BillingThresholdAmount](#billingthresholdamount), [BillToCustomerId](#billtocustomerid), [BusinessAddress](#businessaddress), [CurrencyCode](#currencycode), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Language](#language), [LastModifiedByUserId](#lastmodifiedbyuserid), [LastModifiedTime](#lastmodifiedtime), [LinkedAgencies](#linkedagencies), [Name](#name), [Number](#number), [ParentCustomerId](#parentcustomerid), [PauseReason](#pausereason), [PaymentMethodId](#paymentmethodid), [PaymentMethodType](#paymentmethodtype), [PrimaryUserId](#primaryuserid), [SalesHouseCustomerId](#saleshousecustomerid), [SoldToPaymentInstrumentId](#soldtopaymentinstrumentid), [TaxCertificate](#taxcertificate), [TaxInformation](#taxinformation), [TimeStamp](#timestamp), [TimeZone](#timezone).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountfinancialstatus"></a>AccountFinancialStatus|The financial status of the account. For example, the status can indicate whether the account is in good standing or is past due.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AccountFinancialStatus](accountfinancialstatus.md)|
|<a name="accountlifecyclestatus"></a>AccountLifeCycleStatus|The status of the account. You cannot set the status of the account.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AccountLifeCycleStatus](accountlifecyclestatus.md)|
|<a name="accountmode"></a>AccountMode|The account mode distinguishes between smart and expert accounts.<br/><br/>The possible values include, but are not limited to:<br/><br/>Expert - Expert Mode is the full-feature Microsoft Advertising experience. It gives you more control over campaign management, lets you add more content to your ads, and provides much more in the way of performance reporting and tracking.<br/><br/>Smart - Microsoft Advertising will use Microsoft AI to create ads and manage your advertising campaign for you.<br/><br/>UnifiedSmart - The account supports advertising across Bing, Google, and Facebook. You can also manage your social network presence on Facebook, Instagram, and LinkedIn. *Note*: As of April 25, 2023, UnifiedSmart no longer supports Twitter.<br/><br/>Most Bing Ads API operations are only supported with Expert accounts. Accounts with any account mode are returned when you request account information e.g., [FindAccountsOrCustomersInfo](findaccountsorcustomersinfo.md), [GetAccount](getaccount.md), [GetAccountsInfo](getaccountsinfo.md), [GetUser](getuser.md), and [SearchAccounts](searchaccounts.md).<br/><br/>**Add:** Read-only for most accounts. Customers in the closed Unified smart campaigns pilot can set the account mode to "UnifiedSmart".<br/>**Update:** Read-only|**string**|
|<a name="autotagtype"></a>AutoTagType|Determines whether to append or replace the supported UTM tracking codes.<br/><br/>Microsoft Advertising can automatically add UTM tags to your destination URL so you can use your website analytics tool, for example Google Analytics, to track how people got to your website. Auto-tags are applied for example to expanded text ads, keywords, Microsoft Shopping Campaigns, and Sitelink Extensions. For details about auto-tagging, please see the Microsoft Advertising help article [How do I add UTM tags to my landing page URL?](https://help.ads.microsoft.com/#apex/3/en/56762/-1).<br/><br/>**Add:** Optional. If not specified the default value is Inactive.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[AutoTagType](autotagtype.md)|
|<a name="backuppaymentinstrumentid"></a>BackUpPaymentInstrumentId|The identifier of a backup  payment instrument to use to settle the account. This element is not applicable for invoiced accounts.<br/><br/>**Add:** Read-only<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**long**|
|<a name="billingthresholdamount"></a>BillingThresholdAmount|A customer specified amount for settling against the selected payment instrument.<br/><br/>**Add:** Read-only<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**decimal**|
|<a name="billtocustomerid"></a>BillToCustomerId|The identifier of the customer that is billed for the charges that the account generates. This is either the aggregator that manages this account on behalf of the owner or the identifier of the customer that owns the account.<br/><br/>The service sets the identifier based on the owner of the payment instrument identified in the *PaymentMethodId* element.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**long**|
|<a name="businessaddress"></a>BusinessAddress|The location where your business is legally registered. If you are an agency working as an agent for your customer, this is the location where your client is legally registered. If you are an agency working as an aggregator, this is the legally registered business address of your company. The business address is used to determine your tax requirements.<br/><br/>**Add:** Required. The [Address](address.md) BusinessName, City, and Line1 elements are required for all countries or regions. For Brazil (BR) and India (IN), the PostalCode and StateOrProvince elements are also required.<br/>**Update:** Optional for accounts that are not billed by monthly invoice. Having said that, if you want to make any changes to the [Address](address.md) then you must set its BusinessName, City, CountryCode, Line1, and StateOrProvince elements (where applicable); Read-only for monthly invoice accounts. To update the *BusinessAddress* of an invoice account, contact your account manager or support.|[Address](address.md)|
|<a name="currencycode"></a>CurrencyCode|The ISO code for the currency that is used to settle the account.<br/><br/>The service uses the currency information for billing purposes.<br/><br/>**Add:** Required<br/>**Update:** Read-only|[CurrencyCode](currencycode.md)|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The system-generated identifier of the account.<br/><br/>This is the identifier that you set the *AccountId* element and *CustomerAccountId* SOAP header to in many of the campaign requests.<br/><br/>**Add:** Read-only<br/>**Update:** Required|**long**|
|<a name="language"></a>Language|The language used to render the billing documents that you receive from Microsoft Advertising (if you use an invoice as your payment method).<br/><br/>This setting is only for billing documents for this account, and doesn't apply to other Microsoft Advertising accounts you might have.<br/><br/>If you leave this empty when signing up a customer, the operation uses the language value from the [Lcid](user.md#lcid) element of the primary user. If the [Lcid](user.md#lcid) is set to a value such as *FrenchCanada*, then the account language is set to *French*.<br/><br/>**Add:** Read-only for [AddAccount](addaccount.md); Required for [SignupCustomer](signupcustomer.md) if the [UserInvitation](signupcustomer.md#userinvitation) is set, and otherwise this element is Optional.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[LanguageType](languagetype.md)|
|<a name="lastmodifiedbyuserid"></a>LastModifiedByUserId|The identifier of the last user to update the account's information.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**long**|
|<a name="lastmodifiedtime"></a>LastModifiedTime|The date and time that the account was last updated. The value is in Coordinated Universal Time (UTC).<br/><br/>The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**dateTime**|
|<a name="linkedagencies"></a>LinkedAgencies|The list of agencies linked to this account.<br/><br/>Currently only one agency customer is supported when you add the account. When you retrieve the account all linked agency customer info will be included. <br/><br/>**Add:** Optional for [AddAccount](addaccount.md); Optional for [SignupCustomer](signupcustomer.md) if the agency customer is in the Create Accounts on Behalf of Client pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 793). Aggregators cannot link as agencies in this context, and therefore cannot set this element.<br/>**Update:** Read-only|[CustomerInfo](customerinfo.md) array|
|<a name="name"></a>Name|The name of the account. The string can contain between 3 and 100 characters and must be unique among all account names within the customer.<br/><br/>**Add:** Required<br/>**Update:** Required|**string**|
|<a name="number"></a>Number|The system-generated account number that is used to identify the account in the Microsoft Advertising web application.<br/><br/>The account number has the form *xxxxxxxx*, where *xxxxxxxx* is a series of any eight alphanumeric characters.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|
|<a name="parentcustomerid"></a>ParentCustomerId|The identifier of the customer that owns the account.<br/><br/>In the campaign requests that require a customer identifier, this is the identifier that you set the *CustomerId* SOAP header to.<br/><br/>**Add:** Required for [AddAccount](addaccount.md); Required for [SignupCustomer](signupcustomer.md) if the [UserInvitation](signupcustomer.md#userinvitation) is not set, and otherwise this element is ignored.<br/>**Update:** Read-only|**long**|
|<a name="pausereason"></a>PauseReason|A flag value that indicates who paused the account. The following are the possible values:<br/><br/>1 - The user paused the account.<br/><br/>2 - The billing service paused the account.<br/><br/>4 - The user and billing service paused the account.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**unsignedByte**|
|<a name="paymentmethodid"></a>PaymentMethodId|The identifier of the payment instrument to use to settle the account.<br/><br/>**Add:** Optional for [AddAccount](addaccount.md); Read-only for [SignupCustomer](signupcustomer.md) if the [UserInvitation](signupcustomer.md#userinvitation) is not set. When you call [SignupCustomer](signupcustomer.md) set this element to NULL. The service picks up the payment method identifier associated with the aggregator customer's invoice automatically. For [SignupCustomer](signupcustomer.md) if the [UserInvitation](signupcustomer.md#userinvitation) is set, and if the new client account is being linked to an agency via [LinkedAgencies](#linkedagencies), and if the agency should be billed, set this element to the agency's payment instrument ID. Otherwise you should leave this element null.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**long**|
|<a name="paymentmethodtype"></a>PaymentMethodType|The type of payment instrument to use to settle the account. You do not have to set this value because the type is determined by the payment instrument corresponding to the *PaymentMethodId* element.<br/><br/>When you call the [GetAccount](getaccount.md) and [SearchAccounts](searchaccounts.md) to get the account data, *PaymentMethodType* is set to NULL, and you cannot determine the payment method that the account uses.<br/><br/>Reserved for internal use.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[PaymentMethodType](paymentmethodtype.md)|
|<a name="primaryuserid"></a>PrimaryUserId|The identifier of the account manager who is primarily responsible for managing this account.<br/><br/>Only Super Admin and Standard users can be set as the primary contact for an account.<br/><br/>**Add:** For [AddAccount](addaccount.md) if the new client account is being linked to an agency via [LinkedAgencies](#linkedagencies), then you can assign one of the agency users as primary user for the new account. When you call [SignupCustomer](signupcustomer.md) as an aggregator without including the [UserInvitation](signupcustomer.md#userinvitation), you should leave this element empty and the primary user will be set to the aggregator user identifier. When you call [SignupCustomer](signupcustomer.md) and the [UserInvitation](signupcustomer.md#userinvitation) is included, you can leave this element empty and the primary user will be set to the identifier of the new client user who accepts the invitation. When you call [SignupCustomer](signupcustomer.md) and if the [UserInvitation](signupcustomer.md#userinvitation) is set, and if the new client account is being linked to an agency via [LinkedAgencies](#linkedagencies), then you can assign one of the agency users as primary user for the new account.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**long**|
|<a name="saleshousecustomerid"></a>SalesHouseCustomerId|The identifier of the third party that is responsible for a sales lead.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**long**|
|<a name="soldtopaymentinstrumentid"></a>SoldToPaymentInstrumentId|The identifier of the payment instrument of your client (the sold-to customer) to use to settle the account.<br/><br/>**Add:** Required for [AddAccount](addaccount.md) if the [BillToCustomerId](#billtocustomerid) differs from the [ParentCustomerId](#parentcustomerid); Read-only and not applicable for [SignupCustomer](signupcustomer.md). <br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**long**|
|<a name="taxcertificate"></a>TaxCertificate|Reserved.|[AccountTaxCertificate](accounttaxcertificate.md)|
|<a name="taxinformation"></a>TaxInformation|For a list of valid key and value strings for this element, see [AdvertiserAccount TaxInformation](#taxinformation) in the section below.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. To remove a key and value pair, set the key and then set the value to an empty string (*""*).|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="timestamp"></a>TimeStamp|The time-stamp value that the system uses internally to reconcile updates when you call the [UpdateAccount](updateaccount.md) and [DeleteAccount](deleteaccount.md) operations.<br/><br/>**Add:** Read-only<br/>**Update:** Required|**base64Binary**|
|<a name="timezone"></a>TimeZone|The default time-zone value to use for campaigns in this account.<br/><br/>If you do not specify a value when the account is added, the time zone will be set to *PacificTimeUSCanadaTijuana* by default.<br/><br/>This time-zone value is used by the Microsoft Advertising web application to display the account time zone preference, and does not provide a default time-zone value for campaigns that are created by using the Bulk or Campaign Management API.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[TimeZoneType](timezonetype.md)|

## <a name="remarks"></a>Remarks
### <a name="taxinformation"></a>AdvertiserAccount TaxInformation
The following is the list of keys that are available for the [TaxInformation](#taxinformation) element of an *AdvertiserAccount*.  

> [!NOTE]
> Microsoft Advertising cannot provide guidance on tax or VAT. Please contact your tax advisor or local tax office if you have questions.

|TaxInformation Key|Description|Countries or Regions|
|---------|---------|---------|
|AUGSTNumber|The tax identifier for accounts in Australia. Without a tax identifier, taxes might apply based on your [BusinessAddress](#businessaddress) location.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|Australia|
|CCM|The municipal registration number, or Cadastro de contribuinte mobiliario (CCM), of the legal entity.<br/><br/>**Add:** Required for business accounts if the [BusinessAddress](#businessaddress) is within the city of Sao Paulo, Brazil. The CCM is not applicable for businesses in other locations.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|Brazil|
|CNPJ|The tax identifier for business accounts in Brazil. Without a tax identifier, taxes might apply based on your [BusinessAddress](#businessaddress) location.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|Brazil|
|CPF|The tax identifier for personal accounts in Brazil. Without a tax identifier, taxes might apply based on your [BusinessAddress](#businessaddress) location.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|Brazil|
|GSTINNumber|This ID starts with two numbers representing the state code in which the business is registered followed by a maximum of 13 numbers and letters.<br/><br/>**Add:** Optional<br/>**Update:** Optional|India|
|GSTNumber|In Singapore, billing is managed by Microsoft Ireland Operations Ltd., in Ireland. Effective January 1, 2020, Microsoft Advertising is required to charge the Singapore Goods and Services Tax (SG GST) for businesses registered in Singapore. If you provide your SG GST registration number, Microsoft Advertising will apply SG GST at 0%. If you do not provide your SG GST registration number, Microsoft Advertising is required to charge 7% SG GST. (Note: tax rate is subject to change.)<br/><br/>Possible GSTNumber formats include: two alpha-numeric characters followed by an optional dash followed by seven digits followed by an optional dash followed by one alpha-numeric character; OR eight or nine digits followed by one alpha-numeric character; OR T or S followed by two digits followed by one capitalized letter A - Z followed by one alpha-numeric character followed by four digits followed by one alpha-numeric character. GSTNumber examples: ab-1234567-a; ab1234567-a; ab1234567a; ab-1234567a; 12345678a; 123456789a; T12Aa1234a<br/><br/>**Add:** Optional<br/>**Update:** Optional|Singapore|
|IsIVAOrVATTaxPayer|The value is either *TRUE* or *FALSE*, which is used for the tax determination.<br/><br/>**Add:** Required<br/>**Update:** Required|Chile|
|IsWithholdingTaxExempted|The value is either *TRUE* or *FALSE*, which is used for the tax determination.<br/><br/>**Add:** Required<br/>**Update:** Required|Chile|
|NZGSTNumber|This is an 8 or 9 Digit long tax ID. Without the NZGSTNumber taxes might apply based on your business location.<br/><br/>**Add:** Optional<br/>**Update:** Read-only|New Zealand|
|PanNumber|The PAN number.<br/><br/>**Add:** Required<br/>**Update:** Read-only|India|
|VATNumber|The account's Value Added Tax (VAT) registration number (also known as VAT identifier). The VAT number must be valid in the country or region that you specified in the [BusinessAddress](#businessaddress) element. Without a VAT registration number or exemption certificate, taxes might apply based on your business location.<br/><br/>**Add:** Optional<br/>**Update:** Optional|Please see [VAT number format per country/region](#vat-number-format-per-country-or-region) for details.|

### VAT number format per country or region
This table lists VAT registration number formats per country or region.

|VAT number|Country/region|
|---------|---------|
|Starts with 2 letters that are specific to each country/region, followed by a maximum of 12 digits or letters.|Austria, Belgium, Bulgaria, Cyprus, Czech Republic, Germany, Denmark, Estonia, Greece, Finland, France, United Kingdom, Croatia, Hungary, Ireland, Italy, Lithuania, Luxembourg, Latvia, Malta, Monaco, The Netherlands, Poland, Portugal, Romania, Spain, Sweden, Slovenia, and Slovakia.|
|Must be in the following format: XXXXXXXX-X or XXXXXXXX-K, where X represents 8 digits followed by a trailing digit.|Chile|
|Must be in the following format: HUXXXXXXXX (where HU is followed by 8 digits).|Hungary|
|Must be in the following format: LIXXXXX or XXXXX (where both formats are supported and LI is optional, and the number of digits is 5).|Liechtenstein|
|Must be in the following format: XXXXXXXX-0001 (where 8 digits preceed -0001).|Nigeria|
|Must be in the following format: PTXXXXXXXXX (where PT is followed by 9 digits).|Portugal|
|9 or 13 digits in length, of which the first 8 or 12 digits are the actual ID number, and the last digit is a checksum digit calculated according to ISO 7064, MOD 11-10.|Serbia|
|CHE + 9 numeric digits + TVA, MWST, or IVA (ex. CHE-123.456.788 TVA). The last digit is a MOD11 checksum digit built with the weighting pattern: 5,4,3,2,7,6,5,4.|Switzerland|
|Must be in the following format: 13 digits in length.|Thailand|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[AddAccount](addaccount.md)  
[GetAccount](getaccount.md)  
[SearchAccounts](searchaccounts.md)  
[SignupCustomer](signupcustomer.md)  
[UpdateAccount](updateaccount.md)  
