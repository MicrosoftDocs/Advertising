---
title: LCID Value Set - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a selection of locale values.
---
# LCID Value Set - Customer Management
Defines a selection of locale values.

> [!NOTE]
> The value set defines a broad selection of locales; however, not all languages are supported in each market. For a list of supported languages by market country, see [Ad Languages](../guides/ad-languages.md).

## Syntax
```xml
<xs:simpleType name="LCID" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="ArabicSaudiArabia">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1025</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ArabicAlgeria">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">5121</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ArabicBahrain">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">15361</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ArabicEgypt">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3073</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ArabicIraq">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2049</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ArabicJordan">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">11265</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ArabicKuwait">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">13313</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ArabicLebanon">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">12289</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ArabicLibya">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4097</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ArabicMorocco">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">6145</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ArabicOman">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">8193</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ArabicQatar">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">16385</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ArabicTunisia">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">7169</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ArabicUnitedArabEmirates">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">14337</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ArabicYemen">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">9217</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ChineseTaiwan">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1028</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="DanishDenmark">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1030</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="GermanGermany">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1031</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="EnglishUS">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1033</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="SpanishSpain">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1034</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FinnishFinland">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1035</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FrenchFrance">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1036</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="HebrewIsrael">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1037</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ItalianItaly">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1040</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="JapaneseJapan">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1041</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="KoreanKorea">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1042</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="DutchNetherlands">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1043</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="NorwegianNorway">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1044</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="PortugueseBrazil">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1046</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RussianRussia">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1049</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="SwedishSweden">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1053</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="EnglishThailand">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1054</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="EnglishIndonesia">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1057</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="EnglishVietnam">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1066</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="GermanSwitzerland">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2055</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="EnglishUK">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2057</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="SpanishMexico">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2058</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ChineseHongKong">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3076</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="GermanAustria">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3079</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="EnglishAustralia">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3081</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FrenchCanada">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3084</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="EnglishCanada">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4105</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="EnglishNewZealand">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">5129</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="EnglishIreland">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">6153</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="SpanishVenezuela">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">8202</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="SpanishColombia">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">9226</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="SpanishPeru">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">10250</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="SpanishArgentina">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">11274</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="EnglishPhilippines">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">13321</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="SpanishChile">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">13322</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="EnglishIndia">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">16393</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="EnglishMalaysia">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">17417</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="EnglishSingapore">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">18441</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [LCID](lcid.md) value set has the following values: [ArabicAlgeria](#arabicalgeria), [ArabicBahrain](#arabicbahrain), [ArabicEgypt](#arabicegypt), [ArabicIraq](#arabiciraq), [ArabicJordan](#arabicjordan), [ArabicKuwait](#arabickuwait), [ArabicLebanon](#arabiclebanon), [ArabicLibya](#arabiclibya), [ArabicMorocco](#arabicmorocco), [ArabicOman](#arabicoman), [ArabicQatar](#arabicqatar), [ArabicSaudiArabia](#arabicsaudiarabia), [ArabicTunisia](#arabictunisia), [ArabicUnitedArabEmirates](#arabicunitedarabemirates), [ArabicYemen](#arabicyemen), [ChineseHongKong](#chinesehongkong), [ChineseTaiwan](#chinesetaiwan), [DanishDenmark](#danishdenmark), [DutchNetherlands](#dutchnetherlands), [EnglishAustralia](#englishaustralia), [EnglishCanada](#englishcanada), [EnglishIndia](#englishindia), [EnglishIndonesia](#englishindonesia), [EnglishIreland](#englishireland), [EnglishMalaysia](#englishmalaysia), [EnglishNewZealand](#englishnewzealand), [EnglishPhilippines](#englishphilippines), [EnglishSingapore](#englishsingapore), [EnglishThailand](#englishthailand), [EnglishUK](#englishuk), [EnglishUS](#englishus), [EnglishVietnam](#englishvietnam), [FinnishFinland](#finnishfinland), [FrenchCanada](#frenchcanada), [FrenchFrance](#frenchfrance), [GermanAustria](#germanaustria), [GermanGermany](#germangermany), [GermanSwitzerland](#germanswitzerland), [HebrewIsrael](#hebrewisrael), [ItalianItaly](#italianitaly), [JapaneseJapan](#japanesejapan), [KoreanKorea](#koreankorea), [NorwegianNorway](#norwegiannorway), [PortugueseBrazil](#portuguesebrazil), [RussianRussia](#russianrussia), [SpanishArgentina](#spanishargentina), [SpanishChile](#spanishchile), [SpanishColombia](#spanishcolombia), [SpanishMexico](#spanishmexico), [SpanishPeru](#spanishperu), [SpanishSpain](#spanishspain), [SpanishVenezuela](#spanishvenezuela), [SwedishSweden](#swedishsweden).

|Value|Description|
|-----------|---------------|
|<a name="arabicalgeria"></a>ArabicAlgeria|The corresponding LCID type.|
|<a name="arabicbahrain"></a>ArabicBahrain|The corresponding LCID type.|
|<a name="arabicegypt"></a>ArabicEgypt|The corresponding LCID type.|
|<a name="arabiciraq"></a>ArabicIraq|The corresponding LCID type.|
|<a name="arabicjordan"></a>ArabicJordan|The corresponding LCID type.|
|<a name="arabickuwait"></a>ArabicKuwait|The corresponding LCID type.|
|<a name="arabiclebanon"></a>ArabicLebanon|The corresponding LCID type.|
|<a name="arabiclibya"></a>ArabicLibya|The corresponding LCID type.|
|<a name="arabicmorocco"></a>ArabicMorocco|The corresponding LCID type.|
|<a name="arabicoman"></a>ArabicOman|The corresponding LCID type.|
|<a name="arabicqatar"></a>ArabicQatar|The corresponding LCID type.|
|<a name="arabicsaudiarabia"></a>ArabicSaudiArabia|Arabic (Saudi Arabia)|
|<a name="arabictunisia"></a>ArabicTunisia|The corresponding LCID type.|
|<a name="arabicunitedarabemirates"></a>ArabicUnitedArabEmirates|The corresponding LCID type.|
|<a name="arabicyemen"></a>ArabicYemen|The corresponding LCID type.|
|<a name="chinesehongkong"></a>ChineseHongKong|Chinese (Hong Kong)|
|<a name="chinesetaiwan"></a>ChineseTaiwan|Chinese (Taiwan)|
|<a name="danishdenmark"></a>DanishDenmark|Danish (Denmark)|
|<a name="dutchnetherlands"></a>DutchNetherlands|Dutch (Netherlands)|
|<a name="englishaustralia"></a>EnglishAustralia|English (Australia)|
|<a name="englishcanada"></a>EnglishCanada|English (Canada)|
|<a name="englishindia"></a>EnglishIndia|English (India)|
|<a name="englishindonesia"></a>EnglishIndonesia|English (Indonesia)|
|<a name="englishireland"></a>EnglishIreland|The corresponding LCID type.|
|<a name="englishmalaysia"></a>EnglishMalaysia|English (Malaysia)|
|<a name="englishnewzealand"></a>EnglishNewZealand|English (New Zealand)|
|<a name="englishphilippines"></a>EnglishPhilippines|English (Philippines)|
|<a name="englishsingapore"></a>EnglishSingapore|English (Singapore)|
|<a name="englishthailand"></a>EnglishThailand|English (Thailand)|
|<a name="englishuk"></a>EnglishUK|English (United Kingdom)|
|<a name="englishus"></a>EnglishUS|English (United States)|
|<a name="englishvietnam"></a>EnglishVietnam|English (Vietnam)|
|<a name="finnishfinland"></a>FinnishFinland|Finnish (Finland)|
|<a name="frenchcanada"></a>FrenchCanada|French (Canada)|
|<a name="frenchfrance"></a>FrenchFrance|French (France)|
|<a name="germanaustria"></a>GermanAustria|German (Austria)|
|<a name="germangermany"></a>GermanGermany|German (Germany)|
|<a name="germanswitzerland"></a>GermanSwitzerland|German (Switzerland)|
|<a name="hebrewisrael"></a>HebrewIsrael|Hebrew (Israel)|
|<a name="italianitaly"></a>ItalianItaly|Italian (Italy)|
|<a name="japanesejapan"></a>JapaneseJapan|Japanese (Japan)|
|<a name="koreankorea"></a>KoreanKorea|Korean (Korea)|
|<a name="norwegiannorway"></a>NorwegianNorway|Norwegian (Norway)|
|<a name="portuguesebrazil"></a>PortugueseBrazil|The corresponding LCID type.|
|<a name="russianrussia"></a>RussianRussia|Russian (Russia)|
|<a name="spanishargentina"></a>SpanishArgentina|Spanish (Argentina)|
|<a name="spanishchile"></a>SpanishChile|Spanish (Chile)|
|<a name="spanishcolombia"></a>SpanishColombia|Spanish (Colombia)|
|<a name="spanishmexico"></a>SpanishMexico|Spanish (Mexico)|
|<a name="spanishperu"></a>SpanishPeru|Spanish (Peru)|
|<a name="spanishspain"></a>SpanishSpain|Spanish (Spain)|
|<a name="spanishvenezuela"></a>SpanishVenezuela|Spanish (Venezuela)|
|<a name="swedishsweden"></a>SwedishSweden|Swedish (Sweden)|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

## Used By
[User](user.md)  
[UserInvitation](userinvitation.md)  
