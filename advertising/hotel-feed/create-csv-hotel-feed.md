---
title: "Create CSV Property feed"
description: Shows how to create a CSV property feed file that lists the hotel properties you want to advertise.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
---


# Create a CSV Property feed file

To provide Microsoft your hotel listings, create a CSV file that contains a listing of each hotel you want to advertise. A listing describes the hotel's name, address, telephone number, and geographical coordinates.

For information about creating a feed file using an XML document, see [Creating an XML Property feed file](create-hotel-feed.md).

> [!NOTE]
> The Property feed supports only the English language.
> 
> CSV format doesn't support images. Use XML format instead.

## Getting the data right

Because Microsoft attempts to match properties in your Property feed to businesses in Bing Maps, it is important that the data you provide about the hotel is accurate and complete.

If your hotel has missing or incorrect information, Microsoft may not be able to match it. If Microsoft cannot match the hotel, Microsoft will not advertise it. After your TAM imports your Property feed file, they'll send you a report that indicates which hotels Microsoft matched or didn't match. If Microsoft didn't match the hotel, the report includes the message, *Unable to match this hotel to a property in Bing*. For help improving your match rate, work with your TAM.



## Defining a hotel listing

The first line of the feed file is the header row, which contains the column names of the hotel data in the feed. The header must include the column names of all required data elements. Only include the names of optional columns if you provide data for them.

The following is the list of columns that you may include in the feed. The feed file may contain the columns in any order and the column names are case insensitive.

|Column name|Description|Data type|Required
|-|-|-|-
|id|An opaque, user-defined ID that uniquely identifies the hotel within the feed.<br /><br />When you create your Price feed, use this ID in the `Property` element of your Price feed to identify the hotel.|String|Yes
|name|The hotel's name. The name may contain a maximum of 200 characters.|String|Yes
|address|The street address of the hotel using free-form text. Separate each component of the address with a comma and enclose the address in quotes. For example, "1234 Billings Way, Redmond, WA, 98030".<br /><br />Use this column only if you provide the address using free-form text; otherwise, use the address component columns such as addr1, city, and province. It's preferred that you to use the address component columns instead of using free-form text.|String|Yes
|addr1|The hotel's street address. For example, 1234 Billings Way. The address must be a physical street address and not a post office box or other mailing-only address.|String|Yes
|addr2|Second street address line.|String|No
|addr3|Third street address line.|String|No
|city|The name of the city where the hotel is located.|String|Yes
|province|The name of the state, region, or province where the hotel is located.|String|Yes
|postal_code|The address' postal code.|String|Yes
|country|The country or region where the hotel is located. Specify the country or region using the two-letter ISO 3116 country code. For example, use **US** for United States.|String|Yes
|latitude|The latitude of the hotel's geographical coordinates.<br /><br />Notes:<ul><li>The latitude and longitude are required only if you don't specify `phone`. It's preferred that you specify both the phone and geographical coordinates.</li><li>The latitude must be in the range -90.0 through 90.0.</li><li>Use [Location API](https://msdn.microsoft.com/library/ff701715.aspx) or another GeoCoding tool to generate the coordinates from a street address.</li></ul>|Decimal|No
|longitude|The longitude of the hotel's geographical coordinates.<br /><br />Notes:<ul><li>The latitude and longitude are required only if you don't specify `phone`. It's preferred that you specify both the phone and geographical coordinates.</li><li>The longitude must be in the range -180.0 through 180.0.</li><li>Use [Location API](https://msdn.microsoft.com/library/ff701715.aspx) or another GeoCoding tool to generate the coordinates from a street address.</li></ul>|Decimal|No
|phone|The main voice telephone number that customers use to contact the hotel. The number should be the front desk's phone number and not a central reservations phone number.<br /><br />Notes:<ul><li>Use dashes, spaces, or parentheses in the phone number to make it easier to read. For example, use “610-222-3333” or “(610) 222-3333” rather than “6102223333”.</li><li>Specify only one telephone number; do not specify multiple numbers, such as 650-123-2222/33.</li><li>The telephone number may contain an extension of up to 7 digits. Precede extensions with one of the following abbreviations: "ext", "extn", and "x". For example, "408-555-1111x12345" or "408-555-1111 x12345".</li><li>The telephone number may not include alphabetical characters.</li><li>If the telephone number includes the country code, precede it with a "+". For example, “+65 6722-2323” for a number in Singapore where the country code is 65, or “+001 (408) 555-1111” for a number in the United States where the country code is 001.</li></ul>|String|Yes
|category|A category that identifies the type of hotel. The expected format is *vacation_rental* or *hotel* followed by the pipe character and a custom value. For example, *vacation_rental \| 'custom value'* or *hotel \| 'custom value'*<br/><br/>For a list of custom values, see [Lodging property categories](https://help.ads.microsoft.com/#apex/ads/en/60192/-1).|String|No
|hotel_brand|The hotel chain's brand. For example, Fabrikam Residences by Contoso, where Contoso is the brand.|String|No
|star_rating|The hotel's star rating. Possible values are 1 through 5.|String|No

> [!NOTE]
> The `address` column and the `addr`, `addr2`, `addr3`, `city`, `province`, and `postal_code` columns are mutually exclusive. Specify either the `address` column or the address component columns. Specifying the address component columns is preferred.
>  
> Although you may specify either geographical coordinates or a telephone number, you should specify both to ensure a better chance of matching properties in Bing Maps.
>
> To include a description, images, and reviews for a listing, use an XML feed file. See [Create an XML Property feed file](create-hotel-feed.md).

The following shows an example header in CSV format. Separate all columns with a comma. Include only columns that contain values for at least one hotel.

```
id,name,addr1,city,province,postal_code,country,phone
```

After the header row, include a row for each hotel that you advertise. The feed must include listings for all your hotels&mdash; the feed process does not support partial updates. Do not include blank rows in your feed.

If a value contains a comma, you must surround the value with quotes. The following shows the contents of an example CSV file.

```
id,name,addr1,city,province,postal_code,country,latitude,longitude,phone
abc123,Great Ambers Getaway,1234 Porter Rd,Goldendale,WA,98234,US,47.694351,-122.451782,123-456-7890
```


## What happens if the hotel's content changes?


If you change any of the hotel's property values between feed runs (for example, its name, address, phone, etc.), Microsoft Advertising may treat it as a new hotel property and create a new listing for it. If Microsoft creates a new listing, prior performance history for the old hotel remains available for up to 36 months. Note that the old hotel's bids and multipliers will not transfer to the new hotel entity. 

If you remove a hotel and add it back in a later feed with the same property values as before, Microsoft treats it as a new listing. Also, the performance report will show it as two separate listings.



## Next steps

Ask your account manager to import the feed file.

Be sure to also import your Landing pages data. For information about creating your Landing pages feed file, see [Landing pages Feed](../pos-feed/pos-feed.md).

After Microsoft successfully imports your data and is able to match your hotels with properties in Bing Maps, you may begin sending your hotel pricing and availability data. For information, see [Price feeds](../transaction-message/transaction-message.md). 

