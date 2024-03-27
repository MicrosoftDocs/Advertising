---
title: Currency Value Set - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a value set of currencies.
---
# Currency Value Set - Ad Insight
Defines a value set of currencies.

## Syntax
```xml
<xs:simpleType name="Currency" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:annotation>
    <xs:appinfo>
      <ActualType Name="short" Namespace="http://www.w3.org/2001/XMLSchema" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
    </xs:appinfo>
  </xs:annotation>
  <xs:restriction base="xs:string">
    <xs:enumeration value="UnSpecify" />
    <xs:enumeration value="AlgerianDinar">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">23</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ArgentinePeso">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">15</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="AustralianDollar">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Baht">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">78</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Bolivar">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">87</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="BrazilianReal">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="CanadianDollar">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ChileanPeso">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">16</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ColombianPeso">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">18</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="CzechKoruna">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">20</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="DanishKrone">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">5</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Dong">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">88</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="EgyptianPound">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">25</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="EURO">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">6</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Forint">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">33</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="HongKongDollar">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">30</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="IndianRupee">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">36</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="JapaneseYen">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">8</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="LebanesePound">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">48</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="MalaysianRinggit">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">58</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="MexicanPeso">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">57</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="MoroccanDirham">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">52</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="NewTaiwanDollar">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">82</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="NewZealandDollar">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">10</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="NorwegianKrone">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">9</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="NuevoSol">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">64</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="PhilippinePeso">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">65</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="QatariRial">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">69</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Rupiah">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">34</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="SaudiRiyal">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">72</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="SingaporeDollar">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">74</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="SouthAfricanRand">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">13</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="SwedishKrona">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">11</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="SwissFranc">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="TurkishLira">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">93</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="UKPound">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">7</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="USDollar">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">12</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Won">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">45</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="YuanRenminbi">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">17</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="PolishZloty">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">67</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="UAEDirham">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">21</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="IsraeliSheqel">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">35</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="NigerianNaira">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">99</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [Currency](currency.md) value set has the following values: [AlgerianDinar](#algeriandinar), [ArgentinePeso](#argentinepeso), [AustralianDollar](#australiandollar), [Baht](#baht), [Bolivar](#bolivar), [BrazilianReal](#brazilianreal), [CanadianDollar](#canadiandollar), [ChileanPeso](#chileanpeso), [ColombianPeso](#colombianpeso), [CzechKoruna](#czechkoruna), [DanishKrone](#danishkrone), [Dong](#dong), [EgyptianPound](#egyptianpound), [EURO](#euro), [Forint](#forint), [HongKongDollar](#hongkongdollar), [IndianRupee](#indianrupee), [IsraeliSheqel](#israelisheqel), [JapaneseYen](#japaneseyen), [LebanesePound](#lebanesepound), [MalaysianRinggit](#malaysianringgit), [MexicanPeso](#mexicanpeso), [MoroccanDirham](#moroccandirham), [NewTaiwanDollar](#newtaiwandollar), [NewZealandDollar](#newzealanddollar), [NigerianNaira](#nigeriannaira), [NorwegianKrone](#norwegiankrone), [NuevoSol](#nuevosol), [PhilippinePeso](#philippinepeso), [PolishZloty](#polishzloty), [QatariRial](#qataririal), [Rupiah](#rupiah), [SaudiRiyal](#saudiriyal), [SingaporeDollar](#singaporedollar), [SouthAfricanRand](#southafricanrand), [SwedishKrona](#swedishkrona), [SwissFranc](#swissfranc), [TurkishLira](#turkishlira), [UAEDirham](#uaedirham), [UKPound](#ukpound), [UnSpecify](#unspecify), [USDollar](#usdollar), [Won](#won), [YuanRenminbi](#yuanrenminbi).

|Value|Description|
|-----------|---------------|
|<a name="algeriandinar"></a>AlgerianDinar|The Algerian Dinar (DZD).|
|<a name="argentinepeso"></a>ArgentinePeso|The Argentine Peso (ARS).|
|<a name="australiandollar"></a>AustralianDollar|The Australian Dollar (AUD).|
|<a name="baht"></a>Baht|The Thai Baht (THB).|
|<a name="bolivar"></a>Bolivar|The Venezuelan Bolivar Fuerte (VEF).|
|<a name="brazilianreal"></a>BrazilianReal|The Brazilian Real (BRL).|
|<a name="canadiandollar"></a>CanadianDollar|The Canadian Dollar (CAD).|
|<a name="chileanpeso"></a>ChileanPeso|The Chilean Peso (CLP).|
|<a name="colombianpeso"></a>ColombianPeso|The Colombian Peso (COP).|
|<a name="czechkoruna"></a>CzechKoruna|The Czech Koruna (CZK).|
|<a name="danishkrone"></a>DanishKrone|The Danish Krone (DKK).|
|<a name="dong"></a>Dong|The Vietnamese Dong (VND).|
|<a name="egyptianpound"></a>EgyptianPound|The Egyptian Pound (EGP).|
|<a name="euro"></a>EURO|The Euro (EUR).|
|<a name="forint"></a>Forint|The Hungarian Forint (HUF).|
|<a name="hongkongdollar"></a>HongKongDollar|The Hong Kong Dollar (HKD).|
|<a name="indianrupee"></a>IndianRupee|The Indian Rupee (INR).|
|<a name="israelisheqel"></a>IsraeliSheqel|The Israeli Sheqel (ILS).|
|<a name="japaneseyen"></a>JapaneseYen|The Japanese Yen (JPY).|
|<a name="lebanesepound"></a>LebanesePound|The Lebanese Pound (LBP).|
|<a name="malaysianringgit"></a>MalaysianRinggit|The Malaysian Ringgit (MYR).|
|<a name="mexicanpeso"></a>MexicanPeso|The Mexican Peso (MXN).|
|<a name="moroccandirham"></a>MoroccanDirham|The Moroccan Dirham (MAD).|
|<a name="newtaiwandollar"></a>NewTaiwanDollar|The New Taiwan Dollar (TWD).|
|<a name="newzealanddollar"></a>NewZealandDollar|The New Zealand Dollar (NZD).|
|<a name="nigeriannaira"></a>NigerianNaira|The Nigerian Naira (NGN).|
|<a name="norwegiankrone"></a>NorwegianKrone|The Norwegian Krone (NOK).|
|<a name="nuevosol"></a>NuevoSol|The Peruvian Nuevo Sol (NOK).|
|<a name="philippinepeso"></a>PhilippinePeso|The Philippine Peso (PHP).|
|<a name="polishzloty"></a>PolishZloty|The Polish Zloty (PLN).|
|<a name="qataririal"></a>QatariRial|The Qatari Rial (QAR).|
|<a name="rupiah"></a>Rupiah|The Indonesian Rupiah (IDR).|
|<a name="saudiriyal"></a>SaudiRiyal|The Saudi Riyal (SAR).|
|<a name="singaporedollar"></a>SingaporeDollar|The Singapore Dollar (SGD).|
|<a name="southafricanrand"></a>SouthAfricanRand|The South African Rand (ZAR).|
|<a name="swedishkrona"></a>SwedishKrona|The Swedish Krona (SEK).|
|<a name="swissfranc"></a>SwissFranc|The Swiss Franc (CHF).|
|<a name="turkishlira"></a>TurkishLira|The Turkish Lira (TRY).|
|<a name="uaedirham"></a>UAEDirham|The UAE Dirham (AED).|
|<a name="ukpound"></a>UKPound|The UK Pound (GBP).|
|<a name="unspecify"></a>UnSpecify|Unspecified currency.|
|<a name="usdollar"></a>USDollar|The US Dollar USD|
|<a name="won"></a>Won|The South Korean Won (KRW).|
|<a name="yuanrenminbi"></a>YuanRenminbi|The Chinese Yuan (CNY).|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetAudienceFullEstimation](getaudiencefullestimation.md)  
