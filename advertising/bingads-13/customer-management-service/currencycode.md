---
title: CurrencyCode Value Set - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a selection of currency values.
---
# CurrencyCode Value Set - Customer Management
Defines a selection of currency values.

> [!NOTE]
> The value set defines a broad selection of currency types; however, not all currencies are supported. For a list of supported currencies, see [Currencies](../guides/currencies.md).

## Syntax
```xml
<xs:simpleType name="CurrencyCode" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="AED" />
    <xs:enumeration value="ALL" />
    <xs:enumeration value="AMD" />
    <xs:enumeration value="ARS" />
    <xs:enumeration value="AUD" />
    <xs:enumeration value="AZM" />
    <xs:enumeration value="BGL" />
    <xs:enumeration value="BHD" />
    <xs:enumeration value="BND" />
    <xs:enumeration value="BOB" />
    <xs:enumeration value="BRL" />
    <xs:enumeration value="BYB" />
    <xs:enumeration value="BZD" />
    <xs:enumeration value="CAD" />
    <xs:enumeration value="CHF" />
    <xs:enumeration value="CLP" />
    <xs:enumeration value="CNY" />
    <xs:enumeration value="COP" />
    <xs:enumeration value="CRC" />
    <xs:enumeration value="CZK" />
    <xs:enumeration value="DOP" />
    <xs:enumeration value="DKK" />
    <xs:enumeration value="DZD" />
    <xs:enumeration value="EEK" />
    <xs:enumeration value="EGP" />
    <xs:enumeration value="EUR" />
    <xs:enumeration value="GBP" />
    <xs:enumeration value="GEL" />
    <xs:enumeration value="GTQ" />
    <xs:enumeration value="HKD" />
    <xs:enumeration value="HNL" />
    <xs:enumeration value="HRK" />
    <xs:enumeration value="HUF" />
    <xs:enumeration value="IDR" />
    <xs:enumeration value="ILS" />
    <xs:enumeration value="INR" />
    <xs:enumeration value="IQD" />
    <xs:enumeration value="IRR" />
    <xs:enumeration value="ISK" />
    <xs:enumeration value="JMD" />
    <xs:enumeration value="JOD" />
    <xs:enumeration value="JPY" />
    <xs:enumeration value="KES" />
    <xs:enumeration value="KGS" />
    <xs:enumeration value="KRW" />
    <xs:enumeration value="KWD" />
    <xs:enumeration value="KZT" />
    <xs:enumeration value="LBP" />
    <xs:enumeration value="LTL" />
    <xs:enumeration value="LVL" />
    <xs:enumeration value="LYD" />
    <xs:enumeration value="MAD" />
    <xs:enumeration value="MKD" />
    <xs:enumeration value="MOP" />
    <xs:enumeration value="MNT" />
    <xs:enumeration value="MVR" />
    <xs:enumeration value="MXN" />
    <xs:enumeration value="MYR" />
    <xs:enumeration value="NIO" />
    <xs:enumeration value="NOK" />
    <xs:enumeration value="NZD" />
    <xs:enumeration value="OMR" />
    <xs:enumeration value="PAB" />
    <xs:enumeration value="PEN" />
    <xs:enumeration value="PHP" />
    <xs:enumeration value="PKR" />
    <xs:enumeration value="PLN" />
    <xs:enumeration value="PYG" />
    <xs:enumeration value="QAR" />
    <xs:enumeration value="ROL" />
    <xs:enumeration value="RUR" />
    <xs:enumeration value="SAR" />
    <xs:enumeration value="SEK" />
    <xs:enumeration value="SGD" />
    <xs:enumeration value="SIT" />
    <xs:enumeration value="SKK" />
    <xs:enumeration value="SYP" />
    <xs:enumeration value="THB" />
    <xs:enumeration value="TND" />
    <xs:enumeration value="TRY" />
    <xs:enumeration value="TTD" />
    <xs:enumeration value="TWD" />
    <xs:enumeration value="UAH" />
    <xs:enumeration value="USD" />
    <xs:enumeration value="UYU" />
    <xs:enumeration value="UZS" />
    <xs:enumeration value="VEF" />
    <xs:enumeration value="YER" />
    <xs:enumeration value="VND" />
    <xs:enumeration value="YUN" />
    <xs:enumeration value="ZAR" />
    <xs:enumeration value="ZWD" />
    <xs:enumeration value="NGN" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [CurrencyCode](currencycode.md) value set has the following values: [AED](#aed), [ALL](#all), [AMD](#amd), [ARS](#ars), [AUD](#aud), [AZM](#azm), [BGL](#bgl), [BHD](#bhd), [BND](#bnd), [BOB](#bob), [BRL](#brl), [BYB](#byb), [BZD](#bzd), [CAD](#cad), [CHF](#chf), [CLP](#clp), [CNY](#cny), [COP](#cop), [CRC](#crc), [CZK](#czk), [DKK](#dkk), [DOP](#dop), [DZD](#dzd), [EEK](#eek), [EGP](#egp), [EUR](#eur), [GBP](#gbp), [GEL](#gel), [GTQ](#gtq), [HKD](#hkd), [HNL](#hnl), [HRK](#hrk), [HUF](#huf), [IDR](#idr), [ILS](#ils), [INR](#inr), [IQD](#iqd), [IRR](#irr), [ISK](#isk), [JMD](#jmd), [JOD](#jod), [JPY](#jpy), [KES](#kes), [KGS](#kgs), [KRW](#krw), [KWD](#kwd), [KZT](#kzt), [LBP](#lbp), [LTL](#ltl), [LVL](#lvl), [LYD](#lyd), [MAD](#mad), [MKD](#mkd), [MNT](#mnt), [MOP](#mop), [MVR](#mvr), [MXN](#mxn), [MYR](#myr), [NGN](#ngn), [NIO](#nio), [NOK](#nok), [NZD](#nzd), [OMR](#omr), [PAB](#pab), [PEN](#pen), [PHP](#php), [PKR](#pkr), [PLN](#pln), [PYG](#pyg), [QAR](#qar), [ROL](#rol), [RUR](#rur), [SAR](#sar), [SEK](#sek), [SGD](#sgd), [SIT](#sit), [SKK](#skk), [SYP](#syp), [THB](#thb), [TND](#tnd), [TRY](#try), [TTD](#ttd), [TWD](#twd), [UAH](#uah), [USD](#usd), [UYU](#uyu), [UZS](#uzs), [VEF](#vef), [VND](#vnd), [YER](#yer), [YUN](#yun), [ZAR](#zar), [ZWD](#zwd).

|Value|Description|
|-----------|---------------|
|<a name="aed"></a>AED|The corresponding currency type.|
|<a name="all"></a>ALL|The corresponding currency type.|
|<a name="amd"></a>AMD|The corresponding currency type.|
|<a name="ars"></a>ARS|The corresponding currency type.|
|<a name="aud"></a>AUD|The corresponding currency type.|
|<a name="azm"></a>AZM|The corresponding currency type.|
|<a name="bgl"></a>BGL|The corresponding currency type.|
|<a name="bhd"></a>BHD|The corresponding currency type.|
|<a name="bnd"></a>BND|The corresponding currency type.|
|<a name="bob"></a>BOB|The corresponding currency type.|
|<a name="brl"></a>BRL|The corresponding currency type.|
|<a name="byb"></a>BYB|The corresponding currency type.|
|<a name="bzd"></a>BZD|The corresponding currency type.|
|<a name="cad"></a>CAD|The corresponding currency type.|
|<a name="chf"></a>CHF|The corresponding currency type.|
|<a name="clp"></a>CLP|The corresponding currency type.|
|<a name="cny"></a>CNY|The corresponding currency type.|
|<a name="cop"></a>COP|The corresponding currency type.|
|<a name="crc"></a>CRC|The corresponding currency type.|
|<a name="czk"></a>CZK|The corresponding currency type.|
|<a name="dkk"></a>DKK|The corresponding currency type.|
|<a name="dop"></a>DOP|The corresponding currency type.|
|<a name="dzd"></a>DZD|The corresponding currency type.|
|<a name="eek"></a>EEK|The corresponding currency type.|
|<a name="egp"></a>EGP|The corresponding currency type.|
|<a name="eur"></a>EUR|The corresponding currency type.|
|<a name="gbp"></a>GBP|The corresponding currency type.|
|<a name="gel"></a>GEL|The corresponding currency type.|
|<a name="gtq"></a>GTQ|The corresponding currency type.|
|<a name="hkd"></a>HKD|The corresponding currency type.|
|<a name="hnl"></a>HNL|The corresponding currency type.|
|<a name="hrk"></a>HRK|The corresponding currency type.|
|<a name="huf"></a>HUF|The corresponding currency type.|
|<a name="idr"></a>IDR|The corresponding currency type.|
|<a name="ils"></a>ILS|The corresponding currency type.|
|<a name="inr"></a>INR|The corresponding currency type.|
|<a name="iqd"></a>IQD|The corresponding currency type.|
|<a name="irr"></a>IRR|The corresponding currency type.|
|<a name="isk"></a>ISK|The corresponding currency type.|
|<a name="jmd"></a>JMD|The corresponding currency type.|
|<a name="jod"></a>JOD|The corresponding currency type.|
|<a name="jpy"></a>JPY|The corresponding currency type.|
|<a name="kes"></a>KES|The corresponding currency type.|
|<a name="kgs"></a>KGS|The corresponding currency type.|
|<a name="krw"></a>KRW|The corresponding currency type.|
|<a name="kwd"></a>KWD|The corresponding currency type.|
|<a name="kzt"></a>KZT|The corresponding currency type.|
|<a name="lbp"></a>LBP|The corresponding currency type.|
|<a name="ltl"></a>LTL|The corresponding currency type.|
|<a name="lvl"></a>LVL|The corresponding currency type.|
|<a name="lyd"></a>LYD|The corresponding currency type.|
|<a name="mad"></a>MAD|The corresponding currency type.|
|<a name="mkd"></a>MKD|The corresponding currency type.|
|<a name="mnt"></a>MNT|The corresponding currency type.|
|<a name="mop"></a>MOP|The corresponding currency type.|
|<a name="mvr"></a>MVR|The corresponding currency type.|
|<a name="mxn"></a>MXN|The corresponding currency type.|
|<a name="myr"></a>MYR|The corresponding currency type.|
|<a name="ngn"></a>NGN|Reserved.|
|<a name="nio"></a>NIO|The corresponding currency type.|
|<a name="nok"></a>NOK|The corresponding currency type.|
|<a name="nzd"></a>NZD|The corresponding currency type.|
|<a name="omr"></a>OMR|The corresponding currency type.|
|<a name="pab"></a>PAB|The corresponding currency type.|
|<a name="pen"></a>PEN|The corresponding currency type.|
|<a name="php"></a>PHP|The corresponding currency type.|
|<a name="pkr"></a>PKR|The corresponding currency type.|
|<a name="pln"></a>PLN|The corresponding currency type.|
|<a name="pyg"></a>PYG|The corresponding currency type.|
|<a name="qar"></a>QAR|The corresponding currency type.|
|<a name="rol"></a>ROL|The corresponding currency type.|
|<a name="rur"></a>RUR|The corresponding currency type.|
|<a name="sar"></a>SAR|The corresponding currency type.|
|<a name="sek"></a>SEK|The corresponding currency type.|
|<a name="sgd"></a>SGD|The corresponding currency type.|
|<a name="sit"></a>SIT|The corresponding currency type.|
|<a name="skk"></a>SKK|The corresponding currency type.|
|<a name="syp"></a>SYP|The corresponding currency type.|
|<a name="thb"></a>THB|The corresponding currency type.|
|<a name="tnd"></a>TND|The corresponding currency type.|
|<a name="try"></a>TRY|The corresponding currency type.|
|<a name="ttd"></a>TTD|The corresponding currency type.|
|<a name="twd"></a>TWD|The corresponding currency type.|
|<a name="uah"></a>UAH|The corresponding currency type.|
|<a name="usd"></a>USD|The corresponding currency type.|
|<a name="uyu"></a>UYU|The corresponding currency type.|
|<a name="uzs"></a>UZS|The corresponding currency type.|
|<a name="vef"></a>VEF|The corresponding currency type.|
|<a name="vnd"></a>VND|The corresponding currency type.|
|<a name="yer"></a>YER|The corresponding currency type.|
|<a name="yun"></a>YUN|The corresponding currency type.|
|<a name="zar"></a>ZAR|The corresponding currency type.|
|<a name="zwd"></a>ZWD|The corresponding currency type.|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

## Used By
[AdvertiserAccount](advertiseraccount.md)  
