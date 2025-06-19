---
title: Geographical Location Codes
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Find out about geographical location codes supported with the Bing Ads API.
---
# Geographical Location Codes
Geographical locations data can be used to for [Location Targeting](show-ads-target-audience.md#locationcriterion) e.g. show ads to people in a specific country/region, state/province, county, metro area (Microsoft Market Area in the United States), postal code, or city. You can call the [GetGeoLocationsFileUrl](../campaign-management-service/getgeolocationsfileurl.md) operation to get a temporary file URL that can be used to download the latest geographical locations data.  

> [!NOTE]
> Starting May 31, 2025, the Developer Portal page will be deprecated and replaced with a new version [here](https://ads.microsoft.com/cc/Settings/DevSettings). Please update your bookmarks and begin using the new page to avoid any disruptions. For questions or help, please contact [Support](https://about.ads.microsoft.com/en/support).

You can also get the locations data from the [Microsoft Advertising Developer Portal](https://developers.ads.microsoft.com/Account). You must be signed in to the developer portal with a Microsoft account user who has Microsoft Advertising credentials.  

> [!NOTE]
> As a best practice you should download the file instead of opening it directly through an application such as Microsoft Excel. If you view the locations data in a text editor, be sure to use UTF-8 encoding instead of ANSI, otherwise some characters will not be displayed accurately.

For code examples that demonstrate how to download the geographical locations codes, see [Geographical Locations Code Example](code-example-geographical-locations.md).

## <a name="fileformat"></a>Location Codes File Format
The comma separated value (CSV) file contains data organized in the following non-localized column headings. Only the Bing Display Name is localized depending on the file URL used above.

> [!IMPORTANT]
> New columns may be added at any time, so your implementation must ignore unknown columns.
> 
> The order of locations is not guaranteed, so you should not take dependencies on any perceived column sort order or hierarchy.

### <a name="version2"></a>File Format Version 2.0
If you specified *Version* as 2.0 when calling the [GetGeoLocationsFileUrl](../campaign-management-service/getgeolocationsfileurl.md) operation, the following data is available in the downloaded file. Bing Ads API currently only supports file format version 2.0.

|Column Name|Description|
|---------------|---------------|
|Location Id|The unique Microsoft Advertising system identifier for the location. You must use this value to set the location criterion.|
|Bing Display Name|The optional name that you can use to display the locations data, for example to users of your application. Vertical bars are used to separate the location components from most to least specific. For example given Seattle&#124;Washington&#124;United States the most specific component is the city of Seattle within the state of Washington of the United States.<br/><br/>Multiple location IDs can have the same display name. You must not use the display name for anything other than presentation, for example do not assume any hierarchy or take any dependencies on the display name.|
|Location Type|Determines the location sub type (e.g., City, County, Country, MetroArea, PostalCode, or State) that corresponds to the Location Id column.<br/><br/>Neighborhood locations are coming soon.<br/><br/>New location sub types can be added anytime. Rarely will the location type change for a given location ID. |
|Replaces|Reserved for future use to indicate which location or locations are replaced by the location in this row.|
|Status|Indicates whether the location in this row is active, pending deprecation, or deprecated.<br/><br/>- Active: You can target or exclude the location.<br/>- Pending Deprecation: The location is still used by the delivery engine for targeting or exclusions; however, the location will be deprecated within the next 30 days.<br/>- Deprecated: the location criterion is no longer used for targeting or exclusions. Deprecated location criteria can still be retrieved via the Bing Ads API e.g., [GetCampaignCriterionsByIds](../campaign-management-service/getcampaigncriterionsbyids.md), but you cannot add or update deprecated location criteria. Please consider calling the [GetGeoLocationsFileUrl](../campaign-management-service/getgeolocationsfileurl.md) operation once or twice each month to determine if the contents of the file have changed e.g., status. You should not need to download the entire file unless the returned [LastModifiedTimeUtc](../campaign-management-service/getgeolocationsfileurl.md#lastmodifiedtimeutc) value has changed since the last time you synced the locations data.|
|AdWords Location Id|The Google Ads location ID that matches closest to the Microsoft Advertising geographical location ID. You can use this for mapping Microsoft Advertising locations to the estimated Google Ads locations.<br/><br/>This value is a heuristic estimate that can be used for mapping Google Ads and Microsoft Advertising geographical locations. The field is empty if the location was not mapped.|

## <a name="countrycodes"></a>Country Codes
In some contexts the API requires a country code string e.g., for the business address of an [AdvertiserAccount](../customer-management-service/advertiseraccount.md) object. The following country codes are supported by Microsoft Advertising. 

|Country Code|Country/Region Name|
|-----|-----|
|AF|Afghanistan|
|AL|Albania|
|DZ|Algeria|
|AS|American Samoa|
|AD|Andorra|
|AO|Angola|
|AI|Anguilla|
|AQ|Antarctica|
|AG|Antigua and Barbuda|
|AR|Argentina|
|AM|Armenia|
|AW|Aruba|
|AU|Australia|
|AT|Austria|
|AZ|Azerbaijan|
|BS|Bahamas, The|
|BH|Bahrain|
|BD|Bangladesh|
|BB|Barbados|
|BY|Belarus|
|BE|Belgium|
|BZ|Belize|
|BJ|Benin|
|BM|Bermuda|
|BT|Bhutan|
|BO|Bolivia|
|AN|Bonaire, Curaçao, Saba, Sint Eustatius, Sint Maarten|
|BA|Bosnia and Herzegovina|
|BW|Botswana|
|BR|Brazil|
|BN|Brunei|
|BG|Bulgaria|
|BF|Burkina Faso|
|BI|Burundi|
|CV|Cabo Verde|
|KH|Cambodia|
|CM|Cameroon|
|CA|Canada|
|KY|Cayman Islands|
|CF|Central African Republic|
|TD|Chad|
|CL|Chile|
|CN|China|
|CX|Christmas Island|
|CC|Cocos (Keeling) Islands|
|CO|Colombia|
|KM|Comoros|
|CG|Congo|
|CD|Congo (DRC)|
|CK|Cook Islands|
|CR|Costa Rica|
|CI|Côte d'Ivoire|
|HR|Croatia|
|CY|Cyprus|
|CZ|Czech Republic|
|DK|Denmark|
|DJ|Djibouti|
|DM|Dominica|
|DO|Dominican Republic|
|EC|Ecuador|
|EG|Egypt|
|SV|El Salvador|
|GQ|Equatorial Guinea|
|ER|Eritrea|
|EE|Estonia|
|ET|Ethiopia|
|FK|Falkland Islands|
|FO|Faroe Islands|
|FJ|Fiji Islands|
|FI|Finland|
|FR|France|
|GF|French Guiana|
|PF|French Polynesia|
|GA|Gabon|
|GM|Gambia, The|
|GE|Georgia|
|DE|Germany|
|GH|Ghana|
|GI|Gibraltar|
|GR|Greece|
|GL|Greenland|
|GD|Grenada|
|GP|Guadeloupe|
|GU|Guam|
|GT|Guatemala|
|GN|Guinea|
|GW|Guinea-Bissau|
|GY|Guyana|
|HT|Haiti|
|HN|Honduras|
|HK|Hong Kong SAR|
|HU|Hungary|
|IS|Iceland|
|IN|India|
|ID|Indonesia|
|IQ|Iraq|
|IE|Ireland|
|IL|Israel|
|IT|Italy|
|JM|Jamaica|
|JP|Japan|
|JO|Jordan|
|KZ|Kazakhstan|
|KE|Kenya|
|KI|Kiribati|
|KR|Korea|
|KW|Kuwait|
|KG|Kyrgyzstan|
|LA|Laos|
|LV|Latvia|
|LB|Lebanon|
|LS|Lesotho|
|LR|Liberia|
|LY|Libya|
|LI|Liechtenstein|
|LT|Lithuania|
|LU|Luxembourg|
|MO|Macao SAR|
|MK|North Macedonia, Former Yugoslav Republic of|
|MG|Madagascar|
|MW|Malawi|
|MY|Malaysia|
|MV|Maldives|
|ML|Mali|
|MT|Malta|
|MH|Marshall Islands|
|MQ|Martinique|
|MR|Mauritania|
|MU|Mauritius|
|YT|Mayotte|
|MX|Mexico|
|FM|Micronesia|
|MD|Moldova|
|MC|Monaco|
|MN|Mongolia|
|ME|Montenegro|
|MS|Montserrat|
|MA|Morocco|
|MZ|Mozambique|
|MM|Myanmar|
|NA|Namibia|
|NR|Nauru|
|NP|Nepal|
|NL|Netherlands|
|NC|New Caledonia|
|NZ|New Zealand|
|NI|Nicaragua|
|NE|Niger|
|NG|Nigeria|
|NU|Niue|
|NF|Norfolk Island|
|MP|Northern Mariana Islands|
|NO|Norway|
|OM|Oman|
|PK|Pakistan|
|PW|Palau|
|PS|Palestinian Authority|
|PA|Panama|
|PG|Papua New Guinea|
|PY|Paraguay|
|PE|Peru|
|PH|Philippines|
|PN|Pitcairn Islands|
|PL|Poland|
|PT|Portugal|
|PR|Puerto Rico|
|QA|Qatar|
|RE|Reunion|
|RO|Romania|
|RU|Russia|
|RW|Rwanda|
|SH|Saint Helena|
|KN|Saint Kitts and Nevis|
|LC|Saint Lucia|
|PM|Saint Pierre and Miquelon|
|VC|Saint Vincent and the Grenadines|
|WS|Samoa|
|SM|San Marino|
|ST|Sao Tomé and Príncipe|
|SA|Saudi Arabia|
|SN|Senegal|
|RS|Serbia|
|SC|Seychelles|
|SL|Sierra Leone|
|SG|Singapore|
|SK|Slovakia|
|SI|Slovenia|
|SB|Solomon Islands|
|SO|Somalia|
|ZA|South Africa|
|ES|Spain|
|LK|Sri Lanka|
|SR|Suriname|
|SZ|Swaziland|
|SE|Sweden|
|CH|Switzerland|
|TW|Taiwan|
|TJ|Tajikistan|
|TZ|Tanzania|
|TH|Thailand|
|TL|Timor-Leste|
|TG|Togo|
|TK|Tokelau|
|TO|Tonga|
|TT|Trinidad and Tobago|
|TN|Tunisia|
|TR|Türkiye|
|TM|Turkmenistan|
|TC|Turks and Caicos Islands|
|TV|Tuvalu|
|UG|Uganda|
|UA|Ukraine|
|AE|United Arab Emirates|
|GB|United Kingdom|
|US|United States|
|UY|Uruguay|
|UZ|Uzbekistan|
|VU|Vanuatu|
|VA|Vatican City|
|VE|Venezuela|
|VN|Vietnam|
|VG|Virgin Islands, British|
|VI|Virgin Islands, U.S.|
|WF|Wallis and Futuna|
|YE|Yemen|
|ZM|Zambia|
|ZW|Zimbabwe|

## See Also
[Show Ads to Your Target Audience](show-ads-target-audience.md)  
