---
title: PaymentMethodType Value Set - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines possible payment methods for a Microsoft Advertising account.
---
# PaymentMethodType Value Set - Customer Management
Defines possible payment methods for a Microsoft Advertising account.

> [!NOTE]
> Reserved for internal use.

> [!NOTE]
> Over the next several months, Microsoft Advertising will remove physical checks as an accepted payment method. If your existing payment method is check/bank transfer, this payment method **will not** be removed.  If you're using checks to add funds to your prepay balance or to pay your monthly invoice, we recommend you switch to the bank transfer option.  This action must be initiated with your financial institution. Learn more about [bank transfer options](https://help.ads.microsoft.com/#apex/ads/en/60015/3-500). 

## Syntax
```xml
<xs:simpleType name="PaymentMethodType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="CreditCard">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Invoice">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Check">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ElectronicFundsTransfer">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="PayPal">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">5</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ELV">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">6</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="OfflinePaymentMethod">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">7</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="VBA">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">8</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Boleto">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">9</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [PaymentMethodType](paymentmethodtype.md) value set has the following values: [Boleto](#boleto), [Check](#check), [CreditCard](#creditcard), [ElectronicFundsTransfer](#electronicfundstransfer), [ELV](#elv), [Invoice](#invoice), [OfflinePaymentMethod](#offlinepaymentmethod), [PayPal](#paypal), [VBA](#vba).

|Value|Description|
|-----------|---------------|
|<a name="boleto"></a>Boleto|Boleto is a form of payment used widely in Brazil. Microsoft Advertising allows customers to use Boleto to fund their prepay accounts by giving them the ability to print a payment slip that they can use to make payment at various locations in Brazil (e.g. Post offices and banks). This payment method is only supported in Brazil and activity must be billed in BRL currency.|
|<a name="check"></a>Check|The payments are made with a check.<br /><br />*Note*: Over the next several months, Microsoft Advertising will remove physical checks as an accepted payment method. If your existing payment method is check/bank transfer, this payment method **will not** be removed.  If you're using checks to add funds to your prepay balance or to pay your monthly invoice, we recommend you switch to the bank transfer option.  This action must be initiated with your financial institution. Learn more about [bank transfer options](https://help.ads.microsoft.com/#apex/ads/en/60015/3-500). |
|<a name="creditcard"></a>CreditCard|The payments are made with a credit card.<br/><br/>If you use a credit card, the card is charged when the account balance (the amount of accrued advertising charges) reaches an internally defined threshold.|
|<a name="electronicfundstransfer"></a>ElectronicFundsTransfer|The payments are made with an electronic funds transfer.|
|<a name="elv"></a>ELV|The ELV value represents the SEPA payment method. SEPA is a form of a direct debit in Europe. With SEPA Microsoft Advertising validates a customer's bank account by making a small deposit that needs to be verified in Microsoft Advertising. This process takes some time but helps ensure the security of a customer's SEPA account. SEPA is currently only supported in Germany and activity must be billed in EUR currency. SEPA is only allowed to be used to fund prepay accounts.|
|<a name="invoice"></a>Invoice|An invoice is sent to the customer requesting payment.<br/><br/>If you use the invoice method, the customer specified in the `BillToCustomerId` element of the [AdvertiserAccount](advertiseraccount.md) is invoiced at the end of the each month.|
|<a name="offlinepaymentmethod"></a>OfflinePaymentMethod|Meant to signal when a customer is funding a prepay account by making payment via a check or a bank transfer. When using such a payment method customers must include their Microsoft Advertising account number for us to process the payment.|
|<a name="paypal"></a>PayPal|A payment service that allows customers to pay for their Microsoft Advertising transactions online. A verified PayPal account is needed, meaning that it needs a valid payment method backing it up for it to be used within Microsoft Advertising.|
|<a name="vba"></a>VBA|Virtual Bank Account is a form of payment used widely in Taiwan. Microsoft Advertising allows customers to use VBA to fund their prepay accounts by giving them the ability to print a payment slip that they can use to make payment at various locations in Taiwan (e.g. Post offices and banks). This payment method is only supported in Taiwan and activity must be billed in TWD currency.|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

## Used By
[AdvertiserAccount](advertiseraccount.md)  
