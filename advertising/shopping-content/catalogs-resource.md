---
title: "Catalogs Resource"
description: "Provides information about the catalogs resource and related elements of the Content API."
author: rgaritta
ms.service: "bing-ads-shopping-content"
ms.topic: "article"
ms.author: v-rgaritta
---
# Catalogs Resource
The Catalogs resource lets you manage catalogs in your Microsoft Merchant Center store (MMC). For information about using the Catalogs resources, see [Managing your Catalogs](../shopping-content/manage-catalogs.md). For examples that show how to add, delete, and get catalogs, see [Code Examples](../shopping-content/code-examples.md#catalog).

## Base URI

The following is the base URI that you append the templates to.  

`https://content.api.bingads.microsoft.com/shopping/v9.1/bmc/`


## <a name="templates"></a>Templates

To create the endpoints that you use to manage your catalogs, append the appropriate template to the base URI.

|Template|HTTP Verb|Description|Resource
|--------|---------|-----------|--------
|{mmcMerchantId}/catalogs|POST|Use to add a catalog to the store. To add a catalog, its name must be unique. You may add a maximum of 100 catalogs to a store.<br/><br/>Set `{mmcMerchantId}` to the MMC store ID.|Request: [Catalog](#catalog)<br>Response: [Catalog](#catalog) 
|{mmcMerchantId}/catalogs/{catalogId}|PUT|Use to update a catalog in the store. The only fields you may update are the `name` and `isPublishingEnabled` fields, and you must specify both.<br/><br/>Set `{mmcMerchantId}` to the MMC store ID.|Request: [Catalog](#catalog)<br>Response: [Catalog](#catalog) 
|{mmcMerchantId}/catalogs/{catalogId}|DELETE|Use to delete a catalog from the store.<br/><br/>Set `{mmcMerchantId}` to the MMC store ID.<br/><br/>Set `{catalogId}` to the catalog's ID.|Request: N/A<br>Response: N/A
|{mmcMerchantId}/catalogs/{catalogId}|GET|Use to get a catalog from the store.<br/><br/>Set `{mmcMerchantId}` to the MMC store ID.<br/><br/>Set `{catalogId}` to the catalog's ID.|Request: N/A<br>Response: [Catalog](#catalog) 
|{mmcMerchantId}/catalogs|GET|Use to get a list of catalogs from the store.<br/><br/>Set `{mmcMerchantId}` to the MMC store ID.|Request: N/A<br>Response: [Catalogs](#catalogs)


## <a name="queryparameters"></a> Query parameters

The endpoints may include the following query parameters.

|Parameter|Description|
|---------|-----------|
|<a name="alt"></a>alt|Optional. Use to specify the type of content that's used in the request and response. The possible values are `json` and `xml`. The default is `json`.


## <a name="headers"></a> Headers

The following are the request and response headers.
 
|Header|Description|
|---------|---------------|
|<a name="authtoken"></a>AuthenticationToken|Request header.<br/><br/>Set this header to an OAuth authentication token. For information about getting a token, see [Authenticating your credentials](../shopping-content/get-started.md#authentication).
|Content-Location|Response header.<br/><br/>A URL that identifies the store that the catalog was inserted into. This header is included in the response of an Insert request. 
|<a name="customeraccountid"></a> CustomerAccountId|Request header.<br/><br/>The account ID of any of the accounts that you manage on behalf of the customer specified in the `CustomerId` header. It doesn't matter which account you specify. Specify this header only if you manage an account on behalf of the customer.
|<a name="customerid"></a> CustomerId|Request header.<br/><br/>The customer ID of the customer whose store you manage. Specify this header only if you manage the store on behalf of the customer. If you set this header, you must also set the `CustomerAccountId` header.  
|<a name="devtoken"></a> DeveloperToken|Request header.<br/><br/>The client application's developer access token. Each request must include this header. For information about getting a token, see [Do you have your Microsoft Advertising credentials and developer token?](../shopping-content/get-started.md#credentials)
|Location|Response header.<br/><br/>A URL that identifies the store that the catalog was inserted into. This header is included in the response of an Insert request. 
|WebRequestActivityId|Response header.<br/><br/>The ID of the log entry that contains details about the request. You should always capture this ID if an error occurs. If you are not able to determine and resolve the issue, include this ID along with the other information that you provide the Support team.


## <a name="objects"></a> Request and response objects

The following are the request and response objects used by the API.
 
Each object defines the JSON key name and XML element name that you use depending on the content type that you specify for the request. 

|Object|Description
|------|-----------
|[Catalog](#catalog)|Defines a catalog.
|[Catalogs](#catalogs)|Defines the list of catalogs.

 
### <a name="catalog"></a>Catalog

Defines a catalog.

|Name|Value|Type|XML element name
|----|-----|----|--------
|<a name="id"></a>id|An ID that uniquely identifies the catalog in the store.<br/><br/>This field is read-only; do not set this field.|Unsigned Long|\<id\> 
|<a name="isdefault"></a>isDefault|A Boolean value that determines whether the catalog is the store's default catalog. Is **true** if the catalog is the store's default catalog; otherwise, **false**.<br/><br/>When you create a store, you get a default catalog that products are written to if you do not specify another catalog.<br/><br/>This field is read-only; do not set this field.|Boolean|\<is_default\> 
|<a name="ispublishingenabled"></a>isPublishingEnabled|A Boolean value that determines whether Microsoft may publish products from the catalog. Set to **true** if Microsoft may publish products from the catalog; otherwise, set it to **false**.<br/><br/>You may update this field.<br/><br/>You can also use this field to test your application before deploying it to production. By setting this field to **false**, you may make [Products Resource](../shopping-content/products-resource.md) calls without changing or publishing your production data.|Boolean|\<is_publishing_enabled\>
|<a name="market"></a>market|The market where products in the catalog are published to. The following are the possible markets that you may specify.<ul><li>Albania, Albanian (sq-AL)</li><li>Andorra, French (fr-AD)</li><li>Austria, German (de-AT)</li><li>Aruba, English(en-AW)</li><li>Australia, English (en-AU)</li><li>Argentina, Spanish (es-AR)</li><li>Bahamas, English(en-BS)</li><li>Bangladesh, English(en-BD)</li><li>Belgium, French (fr-BE)</li><li>Bosnia and Herzegovina, Bosnian (bs-BA)</li><li>Brazil, Portuguese (pt-BR)</li><li>Bolivia, Spanish(es-BO)</li><li>Bulgaria, Bulgarian (bg-BG)</li><li>Brunei, English(en-BN)</li><li>Canada, English (en-CA)</li><li>Canada, French (fr-CA)</li><li>Cayman Islands, English(en-KY)</li><li>Chile, Spanish (es-CL)</li><li>Colombia, Spanish (es-CO)</li><li>Costa Rica, Spanish(es-CR)</li><li>Croatia, Croatian (hr-HR)</li><li>Cyprus, English (en-CY)</li><li>Cyprus, Greek (el-CY)</li><li>Czech Republic, Czech (cs-CZ)</li><li>Denmark, Danish (da-DK)</li><li>Dominica, English(en-DM)</li><li>Dominican Republic, Spanish(es-DO)</li><li>Ecuador, Spanish(es-EC)</li><li>El Salvador, Spanish(es-SV)</li><li>Estonia, Estonian (et-EE)</li><li>Fiji, English(en-FJ)</li><li>Finland, Finnish (fi-FI)</li><li>France, French (fr-FR)</li><li>French Guiana, French(fr-GF)</li><li>French Polynesia, French(fr-PF)</li><li>Germany, German (de-DE)</li><li>Greece, English (en-GR)</li><li>Greece, Greek (el-GR)</li><li>Guam, English(en-GU)</li><li>Guatemala, Spanish(es-GT)</li><li>Guyana, English(en-GY)</li><li>Haiti, French(fr-HT)</li><li>Honduras, Spanish(es-HN)</li><li>Hungary, English (en-HU)</li><li>Hungary, Hungarian (hu-HU)</li><li>Iceland, Icelandic (is-IS)</li><li>Ireland, English (en-IE)</li><li>India, English (en-IN)</li><li>Italy, Italian (it-IT)</li><li>Latvia, Latvian (lv-LV)</li><li>Liechtenstein, German (de-LI)</li><li>Lithuania, Lithuanian (lt-LT)</li><li>Luxembourg, French (fr-LU)</li><li>Luxembourg, German (de-LU)</li><li>Malta, Maltese (mt-MT)</li><li>Martinique, French(fr-MQ)</li><li>Mexico (es-MX)</li><li>Mongolia, English(en-MN)</li><li>Montserrat, English(en-MS)</li><li>Maldives, English(en-MV)</li><li>Monaco, French (fr-MC)</li><li>Montenegro, English (en-ME)</li><li>Montenegro, Serbian (sr-ME)</li><li>Nepal, English(en-NP)</li><li>Netherlands, Dutch (nl-NL)</li><li>New Caledonia, French(fr-NC)</li><li>North Macedonia, Macedonian (mk-MK)</li><li>Norway, Norwegian (nb-NO)</li><li>Panama, Spanish(es-PA)</li><li>Papua New Guinea, English(en-PG)</li><li>Paraguay, Spanish(es-PY)</li><li>Peru, Spanish (es-PE)</li><li>Poland, Polish (pl-PL)</li><li>Portugal, Portuguese (pt-PT)</li><li>Puerto Rico, Spanish(es-PR)</li><li>Romania (ro-RO)</li><li>San Marino, English (en-SM)</li><li>San Marino, Italian (it-SM)</li><li>Serbia, English (en-RS)</li><li>Serbia, Serbian (sr-RS)</li><li>Sri Lanka, English(en-LK)</li><li>Slovakia, English (en-SK)</li><li>Slovakia, Slovak (sk-SK)</li><li>Slovenia, Slovenian (sl-SI)</li><li>South African, English (en-ZA)</li><li>Spain, Spanish (es-ES)</li><li>Sweden, Swedish (sv-SE)</li><li>Switzerland, German (de-CH)</li><li>Trinidad and Tobago, English(en-TT)</li><li>Turkey, Turkish (tr-TR)</li><li>United Kingdom, English (en-GB)</li><li>United States, English (en-US)</li><li>Uruguay, Spanish(es-UY)</li><li>Vatican City, Italian (it-VA)</li>Venezuela (es-VE)</li></ul>All products that you add to the catalog must specify the same market (see [contentLanguage](../shopping-content/products-resource.md#contentlanguage) and [targetCountry](../shopping-content/products-resource.md#targetcountry)).<br/><br/>You may not update this field after adding the catalog to the store.<br/><br/>In the above list, de-DE is the market value that you specify; do not include (German-Germany) in your market string.|String|\<market\>
|<a name="name"></a>name|The name of the catalog. The name may contain a maximum of 70 characters.<br/><br/>You may update this field.|String|\<name\> 


### <a name="catalogs"></a>Catalogs

Defines a list of catalogs.

|Name|Value|Type|XML element name
|----|-----|----|--------
|catalogs|A list of catalogs in the store.|[Catalog](#catalog)[]|\<catalogs\> 



## HTTP status codes

The requests may return the following HTTP status codes.

|Status code|Description
|-----------|-----------
|200|Success.
|201|Successfully added the catalog.
|204|Successfully deleted the catalog.
|400|Bad request. Either a query parameter value is not valid or something in the request body is not valid.
|401|Unauthorized. The user's credentials are not valid. 
|404|Not found. 
|500|Server error.

