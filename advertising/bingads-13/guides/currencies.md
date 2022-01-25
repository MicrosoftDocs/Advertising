---
title: "Microsoft Advertising Currencies"
ms.service: "bing-ads"
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Find out about currencies supported with the Bing Ads API. 
---
# Microsoft Advertising Currencies
The following currency values are supported for Microsoft Advertising advertising accounts.

* [Bid and Budget Currencies](#bidandbudget)
* [Conversion Goal Revenue Currencies](#conversiongoalrevenue)
 
## <a name="bidandbudget"></a>Bid and Budget Currencies

You must first set up an [AdvertiserAccount](../customer-management-service/advertiseraccount.md) with one of the supported currency values listed below.

### <a name="keywordcpc"></a>Keyword and Cpc
The minimum and maximum bid and budget for each currency below are subject to change.

> [!NOTE]
> The PolishZloty, SouthAfricanRand, and TurkishLira are not yet available for everyone. 

|Currency Value|Description|Minimum Bid|Maximum Bid|Minimum Daily Budget|Minimum Monthly Budget|Maximum Monthly Budget|
|-----|-----|-----|-----|-----|-------|-------|
|ArgentinePeso|The Argentine Peso (ARS).|0.05|5,000.00|0.05|2.00|152,500,000.00|
|AustralianDollar|The Australian Dollar (AUD).|0.05|1,000.00|0.05|5.00|30,000,000.00|
|Baht|The Thai Baht (THB).|0.14|31,000.00|2.00|150.00|927,000,000.00|
|Bolivar|The Venezuelan Bolivar Fuerte (VEF).|0.05|5,000.00|0.05|2.00|152,500,000.00|
|BrazilianReal|The Brazilian Real (BRL).|0.01|2,000.00|0.10|10.00|60,000,000.00|
|CanadianDollar|The Canadian Dollar (CAD).|0.05|1,000.00|0.05|5.00|7,500,000.00|
|ChileanPeso|The Chilean Peso (CLP).|5.10|510,000.00|5.10|156.00|15,555,000,000.00|
|ColombianPeso|The Colombian Peso (COP).|18.05|1,805,000.00|18.05|551.00|55,052,500,000.00|
|DanishKrone|The Danish Krone (DKK).|0.06|6,000.00|0.06|2.00|183,000,000.00|
|Euro|The European Union Euro (EUR).|0.05|1,000.00|0.05|5.00|5,850,000.00|
|HongKongDollar|The Hong Kong Dollar (HKD).|1.00|8,000.00|1.00|40.00|230,000,000.00|
|IndianRupee|The Indian Rupee (INR).|0.50|60,000.00|0.82|25.00|1,000,000,000.00|
|MalaysianRinggit|The Malaysian Ringgit (MYR).|0.01|3,074.00|0.15|15.00|92,000,000.00|
|MexicanPeso|The Mexican Peso (MXN).|0.14|14,000.00|0.14|4.00|427,000,000.00|
|NewTaiwanDollar|The New Taiwan Dollar (TWD).|3.00|1,500.00|100.00|3,000.00|31,000,000.00|
|NewZealandDollar|The New Zealand Dollar (NZD).|0.01|1,000.00|0.05|6.00|30,000,000.00|
|NorwegianKrone|The Norwegian Krone (NOK).|0.06|6,000.00|0.06|2.00|183,000,000.00|
|NuevoSol|The Peruvian Nuevo Sol (PEN).|0.03|3,000.00|0.03|1.00|91,500,000.00|
|PhilippinePeso|The Philippine Peso (PHP).|0.20|42,000.00|2.00|210.00|1,259,000,000.00|
|PolishZloty|The Polish New Zloty (PLN).|0.01|1,000.00|0.05|1.00|30,000,000.00|
|Rupiah|The Indonesian Rupiah (IDR).|35.00|9,607,994.00|480.00|48,000.00|288,000,000,000.00|
|SingaporeDollar|The Singapore Dollar (SGD).|0.01|1,500.00|0.11|5.00|12,360,900.00|
|SouthAfricanRand|The South African Rand (ZAR).|0.01|1,000.00|0.10|1.00|30,000,000.00|
|SwedishKrona|The Swedish Krona (SEK).|0.07|7,000.00|0.07|2.00|213,500,000.00|
|SwissFranc|The Swiss Franc (CHF).|0.05|1,500.00|0.05|5.00|8,931,900.00|
|TurkishLira|The New Turkish Lira (TRY).|0.01|100,000.00|0.05|100.00|3,000,000,000.00|
|UKPound|The Pound Sterling (GBP).|0.05|1,000.00|0.05|5.00|3,938,700.00|
|USDollar|The U.S. Dollar (USD).|0.05|1,000.00|0.05|5.00|30,000,000.00|

### <a name="shopping-fixedbid"></a>Microsoft Shopping Campaigns Fixed Bid
The Microsoft Shopping Campaigns Fixed Bid minimum and recommended bids below are subject to change. 

> [!NOTE]
> The PolishZloty, SouthAfricanRand, and TurkishLira are not yet available for everyone. 

|Currency Value|Campaign Country of Sale|Minimum Bid|Recommended Minimum Bid|
|-----|-----|-----|-----|-----|-------|-------|
|AustralianDollar|Australia|0.01|0.05|
|CanadianDollar|Canada|0.01|0.05|
|Euro|Austria, Belgium, France, Germany, Italy, Netherlands, Spain, Switzerland, and Sweden.|0.01|0.05|
|IndianRupee|India|0.01|0.50|
|PolishZloty|Poland|0.01|0.05|
|SouthAfricanRand|South Africa|0.01|0.05|
|TurkishLira|Turkey|0.01|1.00|
|UKPound|United Kingdom|0.01|0.05|
|USDollar|United States of America|0.01|0.05|

## <a name="conversiongoalrevenue"></a>Conversion Goal Revenue Currencies

The following currency codes are supported for conversion goals by setting the *CurrencyCode* element of the [ConversionGoalRevenue](../campaign-management-service/conversiongoalrevenue.md) object.

|Currency Code|Currency Name|
|-----|-----|
|AED|United Arab Emirates Dirham|
|ALL|Albanian Lek|
|AMD|Armenian Dram|
|ARS|Argentine Peso|
|AUD|Australian Dollar|
|AZN|Azerbaijani Manat|
|BDT|Bangladeshi Taka|
|BGN|Bulgarian Lev|
|BHD|Bahraini Dinar|
|BND|Brunei Dollar|
|BOB|Bolivian Boliviano|
|BRL|Brazilian Real|
|BWP|Botswanan Pula|
|BZD|Belize Dollar|
|CAD|Canadian Dollar|
|CHF|Swiss Franc|
|CLP|Chilean Peso|
|CNY|Chinese Yuan|
|COP|Colombian Peso|
|CRC|Costa Rican Colon|
|CZK|Czech Republic Koruna|
|DKK|Danish Krone|
|DOP|Dominican Peso|
|DZD|Algerian Dinar|
|EGP|Egyptian Pound|
|ETB|Ethiopian Birr|
|EUR|Euro|
|FJD|Fijian Dollar|
|GBP|British Pound|
|GEL|Georgian Lari|
|GHS|Ghanaian Cedi|
|GTQ|Guatemalan Quetzal|
|HKD|Hong Kong Dollar|
|HNL|Honduran Lempira|
|HRK|Croatian Kuna|
|HUF|Hungarian Forint|
|IDR|Indonesian Rupiah|
|ILS|Israeli New Shekel|
|INR|Indian Rupee|
|IQD|Iraqi Dinar|
|ISK|Icelandic Krona|
|JMD|Jamaican Dollar|
|JOD|Jordanian Dinar|
|JPY|Japanese Yen|
|KES|Kenyan Shilling|
|KGS|Kyrgystani Som|
|KRW|South Korean Won|
|KWD|Kuwaiti Dinar|
|KZT|Kazakhstani Tenge|
|LBP|Lebanese Pound|
|LKR|Sri Lankan Rupee|
|LYD|Libyan Dinar|
|MAD|Moroccan Dirham|
|MKD|Macedonian Denar|
|MNT|Mongolian Tugrik|
|MOP|Macanese Pataca|
|MUR|Mauritian Rupee|
|MVR|Maldivian Rufiyaa|
|MWK|Malawian Kwacha|
|MXN|Mexican Peso|
|MYR|Malaysian Ringgit|
|NGN|Nigerian Naira|
|NIO|Nicaraguan Cordoba|
|NOK|Norwegian Krone|
|NZD|New Zealand Dollar|
|OMR|Omani Rial|
|PAB|Panamanian Balboa|
|PEN|Peruvian Nuevo Sol|
|PHP|Philippine Peso|
|PKR|Pakistani Rupee|
|PLN|Polish Zloty|
|PYG|Paraguayan Guarani|
|QAR|Qatari Rial|
|RON|Romanian Leu|
|RSD|Serbian Dinar|
|RUB|Russian Ruble|
|RWF|Rwandan Franc|
|SAR|Saudi Riyal|
|SEK|Swedish Krona|
|SGD|Singapore Dollar|
|THB|Thai Baht|
|TND|Tunisian Dinar|
|TOP|Tongan Pa'anga|
|TRL|New Turkish Lira|
|TTD|Trinidad and Tobago Dollar|
|TWD|New Taiwan Dollar|
|TZS|Tanzanian Shilling|
|UAH|Ukrainian Hryvnia|
|UGX|Ugandan Shilling|
|USD|US Dollar|
|UYU|Uruguayan Peso|
|UZS|Uzbekistani Som|
|VEF|Venezuelan Bol'var|
|VND|Vietnamese Dong|
|XAF|Central African CFA Franc|
|XCD|Eastern Caribbean Dollar|
|XOF|West African CFA Franc|
|YER|Yemeni Rial|
|ZAR|South African Rand|
|ZMW|Zambian Kwacha|
