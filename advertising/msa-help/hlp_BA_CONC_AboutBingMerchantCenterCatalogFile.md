---
title: Product attributes
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn the details of each field that can be in your Microsoft Merchant Center feed file.
---

# Product attributes

This article covers all required and optional fields for your feed file:

- [Required fields](#required-fields)
- [Required (if value is assigned by the manufacturer) — Item identification](#required-if-value-is-assigned-by-the-manufacturer-item-identification)
- [Optional fields — Apparel products](#optional-fields-apparel-products)
- [Optional fields — Product variants](#optional-fields-product-variants)
- [Optional fields — Other](#optional-fields-other)
- [Optional fields — Bing attributes](#optional-fields-attributes)
- [Optional fields — Sales and promotions](#optional-fields-sales-and-promotions)
- [Optional fields — UCP readiness](#optional-fields-ucp-readiness)

Then, you'll find [installment attributes](#installment-attributes) and further information on [unique identifiers](#which-unique-product-identifiers-are-needed-and-theyll-be-enforced).

<a id="required-fields"></a>

- **Required fields**

  | Field name | Description | What you need to know |
  | --- | --- | --- |
  | **description** | Item description<br>**Example:**<br>Bright yellow 100% cotton dress shirt<br>**Requirements:**<br>Alphanumeric<br>10000 character limit<br>No HTML code and no promotional text<br>Do not enclose in quotes | - The description from the landing page of your offer must be the same description as indicated in the feed.<br>- We recommend that you include size, color, and pattern when applicable.<br>- User relevant description with the most important data at the front.<br>- Uploading an item for the first time will be pending review until the description has been successfully reviewed. Updating the description of an existing item will be reverted to the pending review status until it has been successfully reviewed. The review process can take up to 3 business days.<br>- The description of the item can be slightly different, but it must be for the same item. |
  | **id** | A unique identifier for the item.<br>**Example:**<br>ISI1<br>**Requirements:**<br>50 Unicode character limit<br>**Recommended:** ASCII only: alphanumeric, underscores (_), and dashes (-) | - ID must be unique for each item in your feed per market.<br>- If you have multiple feeds, IDs of items across different feeds still need to be unique.<br>- Special ASCII characters (e.g., asterisk (*), comma (,), backslash (\), ampersand (&), etc. are allowed.<br>- The ID is the same as the merchant product ID (MPID). |
  | **image_link** | URL of an image of the item<br>**Example:**<br>http://www.contoso.com/<br>images/ISI1.jpg<br>**Requirements:**<br>Alphanumeric<br>2000 character limit<br>Link must be HTTP or HTTPs only<br>Image must be: bmp, gif, exif, jpg, png, tiff<br>The recommended minimum size is 220px by 220px for all product categories, with the exception of Apparel & Accessories > Shoes and Apparel & Accessories > Clothing, for which the minimum acceptable size is 250px by 250px<br>The image size cannot exceed 16 MB<br>No watermarks or free shipping text<br>Only one image per item | - Do not include any text within your images, including promotional messaging.<br>- Use images with a white background for a “pop” effect.<br>- Update robots.txt file to allow Microsoft Advertising to crawl your site. Your ad cannot be served if the crawling is incomplete. [Learn more](https://go.microsoft.com/fwlink/?linkid=690094).<br>- The image link URL is case-sensitive. Changing the casing on the URL will cause the URL to be re-crawled.<br>- Uploading an item for the first time will be pending review until the image URL has been successfully crawled.<br>- Updating the image URL of an existing item will be reverted to the pending review status until it has been successfully re-crawled. The review process can take up to 3 business days.<br>- If you have updated the image, be sure to update the image URL for the new image to be reflected in the ad.<br>- If the images aren't displaying because the URL is missing an image or the image size is too large or small, update the URL for the offer so it can be reviewed in the next crawl.<br>- Please note that we may automatically crop your image to make sure the product is centered and fully visible. Product ads might vary in dimension, so we crop the image to best fit the dimension of the ad format. |
  | **link** | Direct URL of the item's page on your website<br>**Example:**<br>http://www.contoso.com/<br>product.asp?pn=ISI1<br>**Requirements:**<br>0-2000 characters<br>HTTP or HTTPs only and no redirects. For redirect URLs, use the ads_redirect field. | - Link should point to the specific product instead of your store’s home page or pages with multiple products.<br>- The Product URL domain must match the Store URL domain.<br>- Must be a path under your store's destination URL. For aggregators, this must be a direct link to the seller's product page. Aggregators are third party sites that consolidate items to Bing on behalf of individual merchants. In the feed that an aggregator submits, the link attribute must be a direct link to the seller's product page and the seller-name attribute is required. Adding items submitted on behalf of the merchant must comply with our policies and [Terms of Service](hlp_BA_CONC_EditorialGuidelines.md).<br>- Uploading an item for the first time will be pending review until the product URL has been successfully reviewed. Updating the product URL of an existing item will be reverted to the pending review status until it has been successfully reviewed again. The review process can take up to 3 business days.<br>- Use as few redirects as possible and be sure that the redirects go to the same verified store domains to avoid offer rejections.<br>- Do not require customers to register, sign in, or take other actions to view information about your product. Make sure customers see your final landing page immediately after clicking your ad. |
  | **price** | Base price, excluding tax and shipping, submitted in local currency.<br>**Example:**<br>23.99 USD<br>**Requirements:**<br>Number plus currency (per ISO 4217)<br>0.00 to 10000000.00 (10 million)<br>Use two decimal places and no symbols (e.g.. $) | - The price from the landing page of your offer must be the same price as indicated in the feed. This information is verified and it is recommended to keep the landing page updated with the latest product information using [structured data markup](hlp_BA_CONC_BMC_StructuredDataMarkup.md).<br>- For the United States, exclude tax in the price. For the United Kingdom, include any value added tax (VAT) in the price. See [Microsoft Merchant Center feed tax policy](hlp_BA_CONC_BMCTax.md) for more details.<br>- Uploading an item for the first time will be pending review until the price has been successfully reviewed. Updating the price of an existing item will be reverted to the pending review status until it has been processed again. The update can take up to 24 hours to process. If it doesn't pass the initial review, it'll undergo an additional review that may take up to three business days.<br>- For mobile devices or tablets, the price can be 0 when payment options with multiple installments are provided. For such items, you must include the product_category value of "Electronics > Communications > Telephony > Mobile Phones" (267) for mobile devices or "Electronics > Computers > Tablet Computers" (4745) for tablets.<br>- Auction price is not allowed. The price must be a fixed price for the product. |
  | **shipping** | Cost of shipping, submitted in local currency. This is a required field for Austria and Germany only.Shipping has multiple subfields and can have the following headers: shipping(price) shipping(country:price) shipping(country:service:price) shipping **Example:**<br>12.99<br>**Requirements:**<br>Numeric<br>0.01 to 10000000.00 (10 million)<br>Use two decimal places and no symbols (e.g., €)<br>Use a period for decimal places, regardless of currency (e.g., "€12.99" instead of "€12,99")<br>For free shipping, use 0 | - The shipping field is required for Austria and Germany only.<br>- Multiple shipping prices for any item is accepted. For example, DE:Standard:10, DE:Express:20, and DE:Same Day:30 can be used for the same item.<br>- The format depends on the attribute name in the header row of the feed file and the order of the values must match the order in the attribute name. For example, shipping(country:price) must be DE:6.49 or shipping(country:service:price) must be DE:Standard:12.99<br>- Each sub-attribute needs to be separate with a colon and each delivery attribute group needs to be separated with a comma.<br>- If a country is not included, the shipping price will apply to the target country of the item by default.<br>- Uploading an item's shipping for the first time will be pending review until the shipping has been successfully reviewed. This can take up to 30 hours to process. Updating the shipping of an existing item will be reverted to the pending review status until it has been processed again. The shipping update can take up to 8 hours to process. |
  | **title** | Title of the item<br>**Example:**<br>Women's shoes<br>**Requirements:**<br>Alphanumeric<br>150 character limit<br>Don't enclose in quotes | - Use relevant titles that match with what users are searching for with key information first in the title (e.g., Women’s over the knee boots).<br>- When applicable, we recommend you include gender, size, color, material, and pattern details in title (e.g., Women’s small red wool sweater).<br>- Include characteristics like color to differentiate from other products.<br>- Do not include promotional text (e.g., Free shipping) or use all caps (e.g., WOMEN’S SHOES).<br>- Uploading an item for the first time will be pending review until the offer title has been successfully reviewed. Updating the offer title of an existing item will be reverted to the pending review status until it has been successfully reviewed again. The review process can take up to 3 business days.<br>- The title of the item can be slightly different, but it must be for the same item.<br>- For mobile devices or tablets, the price can be 0 when payment options with multiple installments are provided. For such items, you must include the product_category value of "Electronics > Communications > Telephony > Mobile Phones" (267) for mobile devices or "Electronics > Computers > Tablet Computers" (4745) for tablets. |

  <a id="required-if-value-is-assigned-by-the-manufacturer-item-identification"></a>

- **Required (if value is assigned by the manufacturer) — Item identification**

  | Field name | Description | What you need to know |
  | --- | --- | --- |
  | **brand** | The item’s manufacturer, brand, or publisher<br>**Example:**<br>Contoso<br>**Requirements:**<br>Alphanumeric<br>70-character limit<br>10-word limit | - Do not add your store name as the brand unless you manufacture the product.<br>- We recommend to keep the brand character limit to 70, but it can be up to 1000 characters.<br>- The maximum word limit is 10.<br>- Uploading an item for the first time will be pending review until the brand has been successfully crawled. Updating the brand of an existing item will be reverted to the pending review status until it has been successfully re-crawled. The review process can take up to 3 business days. |
  | **gtin** | Global Trade Item Number: A unique numerical value for commercial products usually appearing under the barcode printed on retail products.<br>Up to 10 GTIN values can be provided, with a maximum of 14 digits per value. For multiple GTIN values, separate by a comma and space.<br>**Example:**<br>00012345600012<br>**Requirements:**<br>Numeric<br>14 digits max per value<br>Multi-value | The various types are:- **Universal Product Code (UPC)**, sometimes called GTIN-12 and UPC-A; primarily used in North America and comprised of 12 numeric digits.<br>- **European Article Number (EAN)**, sometimes called GTIN-13; primarily used outside of North America and comprised of 13 numeric digits but can be either eight or 14 numeric digits<br>- **Japanese Article Number (JAN)**, sometimes called called GTIN-13; only used in Japan and comprised of eight or 13 numeric digits.<br>- **International Standard Book Number (ISBN)**, used globally on barcodes of books published after 1970; ISBN-10 is comprised of 10 numeric digits and ISBN-13 (recommended) is comprised of 13 numeric digists, typically starting with 978 or 979. |
  | **identifier_exists (required for new products only when gtin and brand, or mpn and brand isn't available)** | Used to indicate that unique product identifiers (gtin, brand, and mpn) aren't available for a product.<br>**Example:**<br>FALSE<br><br>**Requirements:**<br>Boolean: TRUE or FALSE | - Products that may not have an identifier_exists attribute include custom goods, like homemade products, or products that were made before gtins were created, like antiques. |
  | **mpn** | Manufacturer Part Number: The unique number that identifies the product to its manufacturer.<br>**Example:**<br>ADNK-5020<br>**Requirements:**<br>Alphanumeric<br>70 character limit | - MPN should be specific to one unique product.<br>- MPNs are assigned by the manufacturer. |

  <a id="optional-fields-apparel-products"></a>

- **Optional fields — Apparel products**

  | Field name | Description | What you need to know |
  | --- | --- | --- |
  | **age_group** | Age group targeted by the item<br>**Example:**<br>newborn<br>**Requirements:**<br>Valid Options: newborn, infant, toddler, kids, adult | - Required for all Apparel & Accessories products when targeting these countries: France, Germany, United Kingdom, and United States.<br>- Optional for products in the following Apparel & Accessories sub-categories: Pinback Buttons, Tie Clips, Cufflinks, Wristbands, Shoe Covers, Shoelaces, Spurs, Watch Bands, Keychains, Wallet Chains, Lanyards, Checkbook Covers, Badge & Pass Holder, Watch Winders, Watch Stickers & Decals, Handkerchiefs, and Decorative Fans. |
  | **color** | The dominant color of the item<br>**Example:**<br>red/black/white<br>**Requirements:**<br>Text: Character limit 100<br>Supports up to 3 values separated by a slash [/] with most dominant color first<br>Color attributes, like "stainless steel" or "mahogany" are also accepted | - Required for all Apparel & Accessories products when targeting these countries: France, Germany, United Kingdom, and United States.<br>- We recommend adding the dominant color in the title. |
  | **gender** | Gender targeted by the item<br>**Example:**<br>male<br>**Requirements:**<br>Valid options: male, female, unisex. No other option will be accepted. | - Required for all Apparel & Accessories products when targeting these countries: France, Germany, United Kingdom, and United States<br>- Optional for products in the following Apparel & Accessories sub-categories: Pinback Buttons, Tie Clips, Cufflinks, Wristbands, Shoe Covers, Shoelaces, Spurs, Watch Bands, Keychains, Wallet Chains, Lanyards, Checkbook Covers, Badge & Pass Holder, Watch Winders, Watch Stickers & Decals, Handkerchiefs, and Decorative Fans.<br>- We recommend including gender in the title for products where it's a distinguishing attribute. |
  | **size** | Size of the item<br>**Example:**<br>small, medium, large<br>**Requirements:**<br>Alphanumeric<br>Max 100 characters<br>String/Unicode characters | - Required for all Apparel & Accessories products when targeting these countries: France, Germany, United Kingdom, and United States<br>- Indicate size values based on your target country.<br>- Use consistent size values for the same items. (e.g., “small”, “medium”, and “large” and not “small,” “M,” and “Lg”). |
  | **size_system** | Size system of the item<br>**Requirements:** Single value<br>Supported values: DE, FR, AU, US, and UK | - If size_system is not provided, the item will default to the size system of the target country.<br>- size_system is recommended when the size attribute is provided. |
  | **size_type** | Size type of the item<br>**Example:**<br>regular, petite<br>**Requirements:**<br>Supported values: regular, petite, plus, big and tall, or maternity | size_type is recommended when the size attribute is provided. |

  <a id="optional-fields-product-variants"></a>

- **Optional fields — Product variants**

  | Field name | Description | What you need to know |
  | --- | --- | --- |
  | **additional_image_link** | The URLs of additional images<br>**Example:**<br>http://www.contoso.com/<br>images/ISI1.jpg<br>**Requirements:**<br>Alphanumeric<br>2000 character limit<br>Link must be HTTP or HTTPs only<br>Image must be: bmp, gif, exif, jpg, png, or tiff<br>The recommended minimum size is 220px by 220px for all product categories, with the exception of Apparel & Accessories > Shoes and Apparel & Accessories > Clothing, for which the minimum acceptable size is 250px by 250px<br>The image size cannot exceed 16 MB<br>No watermarks or free shipping text | - Additional images may appear in ads, where applicable, and are commonly used to show products from different angles.<br>- Additional images are not guaranteed to display.<br>- Can have up to 10 images, separated by a comma (,) delimiter.<br>- "%2C" value in the image URL should be considered as (,) and part of the image URL link (e.g., 2 image URLs that contain commas will look like: http://www.contoso.com/image2%2C3.jpg,http://<br>contoso.com/image2%2C4.jpg). |
  | **item_group_id** | Used to group items that may vary by color, material, pattern, size, age_group, or gender<br>**Example:**<br>XYZ123<br>**Requirements:**<br>Alphanumeric<br>Max 50 Unicode characters<br>**Recommended:**<br>ASCII only: alphanumeric, underscores (_), and dashes (-) | - This ID is different from the "ID" attribute.<br>- Values must be different for items, unless items are variants of the same item.<br>- At least one of the variant attributes (size, color, material, pattern, age_group, or gender) must be provided and the same variant attribute must be provided for all items within the group. |
  | **material** | The material of the item<br>**Example:**<br>leather/suede/silk<br>**Requirements:**<br>Alphanumeric: Max 200 characters<br>Supports up to 3 values separated by a slash [/] with most dominant material first | Values may be displayed, so we recommend you use values that users can understand. |
  | **pattern** | The pattern or graphic print of the item<br>**Example:**<br>checkered<br>**Requirements:**<br>Alphanumeric: Max 100 characters | Values may be displayed, so we recommend you use values that users can understand. |

  <a id="optional-fields-other"></a>

- **Optional fields — Other**

  | Field name | Description | What you need to know |
  | --- | --- | --- |
  | **adult** | Microsoft Advertising does not support adult products.<br>**Example:**<br>FALSE<br>**Requirements:**<br>Boolean:TRUE or FALSE | Any adult products submitted in the feed will be rejected. |
  | **availability** | Availability of item<br>**Example:**<br>in stock<br>out of stock<br>preorder<br>**Requirements:**<br>Valid options: in stock, out of stock, preorder.<br>Default is "in stock." | - If no values are provided, the availability will be set to "in stock" by default.<br>- Uploading an item for the first time will be pending review until the availability has been successfully reviewed. Updating the availability of an existing item will be reverted to the pending review status until it has been processed again. The update can take up to 24 hours to process. If it doesn't pass the initial review, it'll undergo an additional review that may take up to three business days.<br>- “in stock” products are available for sale and the advertiser is accepting and fulfilling orders.<br>- “out of stock” products are either unavailable or the advertiser wants to exclude these products from being served temporarily.<br>- “preorder” products haven’t been released yet but advertiser will accept orders and ship at the availability date.<br>- Mapping details:<br>in stock: InStock, LimitedAvailability<br>out of stock: Discontinued, OutOfStock, SoldOut<br>preorder: PreOrder, PreSale<br>- It can take up to 12 hours to process a product deletion. We recommend setting product availability to "out of stock" prior to deleting it. |
  | **condition** | Condition of item<br>**Example:**<br>new<br>**Requirements:**<br>Valid options: new; used; refurbished<br>Default is "new." | - If no values are provided, the condition will be set to "new" by default.<br>- 'New' products are brand new and have never been used, with the original packaging never opened.<br>- 'Refurbished' products have been professionally restored, is free of defects, and comes with a warranty. It may or may not have the original packaging.<br>- 'Used' products are anything other than 'new' or 'refurbished,' where the products have been used previously, with the original packaging opened or missing. |
  | **energy_efficiency_class<br>max_energy_efficiency_class<br>min_energy_efficiency_class<br>(EU and CH only. May be required by local laws or regulations.)** | The product's energy label<br>**Example:**<br>A+<br>**Requirements:**<br>Only the values below are supported: G F E D C B A A+ A++ A+++ | - For water heaters, include the energy efficiency class for:<br>Conventional water heaters<br>Solar water heaters<br>Heat pump water heaters<br>Water heater packages<br>- For reversible air conditioners, include the energy efficiency class for heating during an average season. |
  | **excluded_destination** | The destination where you don't want your products to appear.<br>**Example:**<br>Shopping_ads<br>Local_inventory_ads<br>**Requirements:**<br>Must use either destination used in above example. | This is how you control where each individual product in your primary feed appears:- **Shopping_ads**: This excludes your products from serving across the Microsoft Advertising Network using Shopping or Performance Max campaigns.<br>- **Local_inventory_ads**: This excludes your campaign from showing Local inventory ads.<br>- Your products must target at least one destination. |
  | **expiration_date** | The date the item will expire<br>**Example:**<br>2015-01-25<br>**Requirements:**<br>ISO 8601 standard format: YYYY-MM-DD<br>Maximum supported is 30 days from date of upload.<br>The default is 30 days. | If the expiration date isn't provided, items will expire after 30 days. |
  | **included_destination** | The destination where you want your products to appear.<br>**Example:**<br>Shopping_ads<br>Local_inventory_ads<br>**Requirements:**<br>Must use either or both destinations used in above example. | This is how you control where each individual product in your primary feed appears:- **Shopping_ads**: This enables your products to serve across the Microsoft Advertising Network using Shopping or Performance Max campaigns.<br>- **Local_inventory_ads**: This allows you to showcase your products and store information to nearby shoppers searching with Bing. |
  | **installment** | The monthly installment plan for a product, displayed by the number of months<br>**Example:**<br>12:15 USD<br>**Requirements:**<br>months: The number of installments, displayed as an integer with a range from 1 to 1000.<br>amount: The amount paid per month, displayed as a number greater than 0 with two decimals in the local currency, with no symbols (for example, $). | - The price attribute is the up-front payment and the installment attribute is the monthly installments.<br>- The currency used in the installment attribute must match the currency used for the price attribute.<br>- The installment amount must be greater than 0.00 USD.<br>- The installment attribute is available only for mobile and tablet cateogry of products. For any other categories, the installment attribute will be ignored.<br>- If you have a single product with both full price and installment price, add two rows for the same product in the feed. One row will be for the full price to be submitted in the price field. The other row will be for the installment price, with the upfront cost in the price field and the installment months and price in the installment field. |
  | **multipack** | Used when bundling multiple identical items into a single unit<br>**Example:**<br>10<br>**Requirements:**<br>Integer, greater than 1 | When setting the price, it must be the **total** price of the multipack. |
  | **product_category** | Predefined product category (equivalent to google_product_category)<br>**Example:**<br>Software > Computer Software<br>**Requirements:**<br>Alphanumeric<br>255 character limit<br>Delimiters: greater than symbol [>].<br>Only the greater than symbol > is a valid delimiter. Any other value is treated as invalid.<br>**Full list of taxonomy values**: [All languages](https://advertiseonbingstatic-gadkdmcyhjcqgbbg.b02.azurefd.net/blob/bingads/media/library/docs/o/taxonomyfiles.zip) | - IDs, instead of string values, are now supported. View the updated taxonomy categories: Taxonomy and Taxonomy with IDs.<br>- For mobile devices or tablets, the price can be 0 when payment options with multiple installments are provided. For such items, you must include the product_category value of "Electronics > Communications > Telephony > Mobile Phones" (267) for mobile devices or "Electronics > Computers > Tablet Computers" (4745) for tablets. |
  | **product_type** | Your category of the item<br>**Example:**<br>Home > Electronics > DVD Player<br>**Requirements:**<br>Alphanumeric<br>750 character limit<br>Delimiters: greater than [>] | You can have more than one product type if your item applies to more than one category. |
  | **shopping_ads_excluded_country** | String, 2 characters. Must be an [ISO-3166-1 Alpha 2](https://go.microsoft.com/fwlink/?linkid=2168598) country code.<br>Multiple, comma separated values. Can have up to 100 country codes. | Use this when you want to exclude countries you don't want to serve your products in. This should be used in conjunction with the additional country feed setting. |
  | **unit_pricing_base_measure** | The product’s base measure for pricing (e.g., 100ml means the price is calculated based on a 100ml unit).<br>**Example:**<br>100 g<br>**Requirements:**<br>Numeric, plus unit<br>**Supported units:** Weight: oz, lb, mg, g, kg Volume (US imperial): floz, pt, qt, gal Volume: ml, cl, l, cbm Length: in, ft, yd, cm, m Area: sqft, sqm Per unit: ct | - This attribute is optional when you submit unit_pricing_measure.<br>- Use the same unit of measure for both unit_pricing_measure and unit_pricing_base_measure attributes.<br>- The price is used to calculate the unit price of the product. For example, if the price is 3 USD, unit_pricing_measure is 150ml, and unit_pricing_base_measure is 100ml, the unit price is 2 USD per 100ml. |
  | **unit_pricing_measure** | The measure and dimension of product as it is sold.<br>**Example:**<br>1.5 kg<br>**Requirements:**<br>Numeric, plus unit<br>**Supported units:** Weight: oz, lb, mg, g, kg Volume (US imperial): floz, pt, qt, gal Volume: ml, cl, l, cbm Length: in, ft, yd, cm, m Area: sqft, sqm Per unit: ct | - Use the measure or dimension of the product without the packaging.<br>- Use positive numbers only. |

  <a id="optional-fields-attributes"></a>

- **Optional fields — Bing attributes**

  | Field name | Description | What you need to know |
  | --- | --- | --- |
  | **ads_redirect** | Redirect URL that overrides the URL given in the "link" attribute. Ensure that this URL will redirect to the same URL as given in the "link" attribute.<br>**Example:**<br>http://www.contoso.com/shoe/<br>**Requirements:**<br>Max 2000 characters<br>HTTP, HTTPs, or Google-formatted XML only<br>Must redirect to a landing page<br>See [accepted symbols](hlp_BA_CONC_BMCWhatIsCatalog.md) in feed files | - Uploading an item for the first time will be pending review until the ads redirect URL has been successfully crawled. Updating the ads redirect URL of an existing item will be reverted to the pending review status until it has been successfully re-crawled. The review process can take up to 3 business days.<br>- Use as few redirects as possible and be sure that the redirects go to the same verified store domains to avoid offer rejections.<br>- Use a value that will resolve into a valid URL after any parameters or tracking templates are replaced with their final values.<br>- seller_name and ads_redirect attributes are accepted via Google-formatted XML feed files.<br>- "bingads_redirect" is an accepted header. |
  | **custom_label_0<br>custom_label_1<br>custom_label_2<br>custom_label_3<br>custom_label_4** | Use to identify products for ad campaign filters<br>**Example:**<br>Best sellers, High ROAS, Winter<br>**Requirements:**<br>Alphanumeric<br>Max 100 characters<br>Single-value<br>Up to 1000 unique values for each custom label attribute (up to 5000 labels total) | Use custom labels to add a value to the label, such as seasonal or sale items. |
  | **link_template** | Direct URL of the item's page on your merchant-hosted local shop front<br>**Example:**<br>http://www.contoso.com/1234?store={store_code}<br>**Requirements:**<br>0-2000 characters<br>HTTP or HTTPs only and no redirects. For redirect URLs, use the ads_redirect field.<br>Include the shop code {store_code} parameter. | - When customers click your local listing, they'll be sent to the product's landing page on your website. The URL for landing page on the merchant-hosted local shop front should be set with the link template attribute.<br>- The link template should point to the specific product, rather than your store's home page or pages with multiple products.<br>- The link template domain must match the Store URL domain.<br>- It must be a path under your store's destination URL. For aggregators, this must be a direct link to the seller's product page. (Aggregators are third party sites that consolidate items to Bing on behalf of individual merchants.) In the feed that an aggregator submits, the link attribute must be a direct link to the seller's product page and the seller-name attribute is required. Adding items submitted on behalf of the merchant must comply with our policies and [Terms of Service](hlp_BA_CONC_EditorialGuidelines.md).<br>- Uploading an item for the first time will show pending review until the product URL has been successfully reviewed. Updating the product URL of an existing item will be reverted to the pending review status until it has been successfully reviewed again. The review process can take up to three business days.<br>- Use as few redirects as possible and be sure that the redirects go to the same verified store domains to avoid offer rejections.<br>- Don't require customers to register, sign in, or take other actions to view information about your product. Make sure customers see your final landing page immediately after clicking your ad. |
  | **seller_name** | Merchant/Store that provides this item<br>**Example:**<br>Contoso Shoes<br>**Requirements:**<br>Alphanumeric<br>255 character limit<br>Only required for aggregators - not applicable for direct merchants | - For aggregators, the direct merchant name as SellerName must be sent per Microsoft policy. For direct merchants, this attribute is optional. Aggregators are third party sites that consolidate items to Bing on behalf of individual merchants. In the feed that an aggregator submits, the link attribute must be a direct link to the seller's product page and the seller-name attribute is required. Adding items submitted on behaf of the merchant must comply with our policies and [Terms of Service](hlp_BA_CONC_EditorialGuidelines.md).<br>- seller_name and ads_redirect attributes are accepted via Google-formatted XML feed files. |

  <a id="optional-fields-sales-and-promotions"></a>

- **Optional fields — Sales and promotions**

  | Field name | Description | What you need to know |
  | --- | --- | --- |
  | **promotion_ID** | Used to group items by promotion<br>**Requirements:**<br>Alphanumeric<br>Only underscore (_) and dash (-) symbols allowed<br>Max 60 character limit per promotion, with a total of 10 promotions accepted<br>Up to 10 promotion IDs can be mapped to an item and must be separated by commas | - If the promotion doesn't apply to a product, you can leave this field blank.<br>- If the promotion doesn't apply to all products, be sure to map the promotion ID to the correct set of products in the master feed.<br>- The promotion's date and time is based on your local time zone. Keep this in mind if you want to have the promotion in any other time zone. |
  | **sale_price** | Items’s sale price, excluding tax and shipping<br>**Example:**<br>20.99<br>**Requirements:**<br>Numeric<br>Range is 0.00 to 10000000.00 (10 million)<br>No symbols (e.g., $) | - For the United States, exclude tax in the price. For the United Kingdom, include any value added tax (VAT) in the price. See [Microsoft Merchant Center feed tax policy](hlp_BA_CONC_BMCTax.md) for more details.<br>- Uploading an item for the first time will be pending review until the price has been successfully reviewed. Updating the price of an existing item will be reverted to the pending review status until it has been processed again. The update can take up to 24 hours to process. If it doesn't pass the initial review, it'll undergo an additional review that may take up to three business days.<br>- For mobile devices or tablets, the price can be 0 when payment options with multiple installments are provided. For such items, you must include the product_category value of "Electronics > Communications > Telephony > Mobile Phones" (267) for mobile devices or "Electronics > Computers > Tablet Computers" (4745) for tablets. |
  | **sale_price_effective_date** | Sale’s start and end date and time<br>**Example:**<br>2013-11-05T08:15-05:00/2013-11-10T09:30-05:00<br>**Requirements:**<br>Alphanumeric<br>Start date must be earlier than end date.<br>Date and time format: YYYY-MM-DD followed by the letter 'T', the time of day followed by an expression for the time zone as defined by the ISO 8601 standard. | - The end date needs to be in the same format.<br>- For items on sale, submit both the sale price and sale effective date attributes. If you update the sale price attribute but not the sale price effective date, the sale price will continue to be used for your item. |

  <a id="optional-fields-ucp-readiness"></a>

- **Optional fields — UCP readiness**

  | Field name | Description | What you need to know |
  | --- | --- | --- |
  | **Exception policy** | If some products follow different return rules, you can define one exception policy.<br>**Requirements:**<br>Maximum 50 characters per string | - This is a store-level return policy that's is required for UCP.<br>- This information may be shown to customers during checkout.<br>*Note:* Make sure the field name is precisely "return_policy_labels". |
  | **consumer_message_type** | This is the category of warning (for example, safety, legal, health, or environmental)<br>**Requirements:**<br>Enum (e.g., legal_disclaimer, safety_warning, prop_65) | - Some products require legal disclosures or safety notices. These warnings are shown to customers before purchase. |
  | **consumer_message_content** | This is warning text shown to customers.<br>**Requirements:** Max of 1,000 characters per string Accepted HTML tags: <b>,<br>, <i>, and <a href> | - Some products require legal disclosures or safety notices. These warnings are shown to customers before purchase. |

  <a id="installment-attributes"></a>

## Installment attributes

The installment attribute for Product ads is the monthly installment plan for a product, displayed by the number of months. You can include the installment pricing with or without a down payment for relevant offers, to display the most accurate pricing options for your products.

### Why use installment pricing?

- **Increased traffic volume**. Displaying your most accurate pricing in your ads help to grow ad engagement boost your potential click-through rate.
- **More informed shoppers**. Providing installment pricing and any down payment costs to potential customers provides them with more information before purchasing.
- **Improved market share**. Displaying a more accurate pricing option can encourage customers to click your ad instead of your competitors’ ads.

## FAQ

- **Installment attribute requirements**

  - This attribute can only be applied to mobile and tablet product categories. The installment field will be ignored for all other categories.
  - The price attribute will be treated as the down payment and the installment amount will account for the remaining monthly installments.
  - For mobile devices or tablets, the price can be 0 when payment options with multiple installments are provided. For such items, you must include the product_category values:

    - 4745 - Electronics > Computers > Tablet Computers
    - 267 - Electronics > Communications > Telephony > Mobile Phones
    - Electronics > Communications > Telephony > Mobile Phones > Feature Phones
    - Electronics > Communications > Telephony > Mobile Phones > Smartphones
    - Electronics > Communications > Telephony > Mobile Phones > Watch Phones

- **Installment attribute format**

  - *Months*: The number of installments, displayed as an integer with a range from 1 to 1000.
  - *Amount*: The amount paid per month, displayed as a number greater than 0 with two decimals in the local currency, with no symbols (for example, $).

  If you have a single product with both full price and installment price, add two rows for the same product in the feed.

  - One row will be for the full price to be submitted in the price field.
  - The other row will be for the installment price, with the upfront cost in the price field and the installment months and price in the installment field.

  For example, let’s say the full price for the product is $900 and the installment cost is $0. For installment pricing, the upfront cost is $0 and the installment price is $30 for 30 months.

- **What file formats support the installment attribute?**

  - Text feeds
  - XML feeds
  - Google import
  - CAPI: XML, JSON

- **Why was my offer containing the installment attribute rejected?**

  Here are some possible reasons why the installment attribute was rejected:

  - The installment doesn’t contain the *months* attribute.
  - *Months* is not an integer.
  - *Amount* is the same format as the price attribute.
  - *Installment* is provided but *months* is 0.
  - *Price* is 0 but the *installment* is not provided.
  - *Price* is 0 but the *amount* is not present or is 0.
  - *Months* is less than 1 or greater than 100.
  - The account currency is different from the price currency.

- **What I need to know**

  - The price attribute is the up-front payment and the installment attribute is the monthly installments.
  - The currency used in the installment attribute must match the currency used for the price attribute.
  - The installment amount must be greater than 0.00 USD.
  - The installment attribute is available only for mobile and tablet category of products. For any other categories, the installment attribute will be ignored.

<a id="which-unique-product-identifiers-are-needed-and-theyll-be-enforced"></a>

## Which unique product identifiers are needed and they'll be enforced

We recommend that you tag all three attributes for all your items, as they help to define your products in a global marketplace. Take a look at the policies for using product identifiers in the feed below.

- **New products:** Submit all three attributes for new products that have GTINs: <br>

  1. *gtin* assigned by manufacturer
  1. *brand*
  1. *mpn* assigned by manufacturer
- **Products without GTINs:** For products that don't have a GTIN, submit *brand* and *mpn*. Examples of products without GTINs include store brand products, antique products, replacement parts, custom-made products, etc.
- **Products without a brand:** Submit the *brand* attribute only if the product has a clear brand or manufacturer associated.
- **Products without a GTIN, brand, or mpn:** For products that don't have all three identifiers, submit *identifier_exists* with the value set to *FALSE*. Examples of products without unique identifiers include custom handmade products, vintage products, etc.

### Troubleshooting GTIN issues

- **Where can I find the unique product identifiers?**

  Each product has a specific GTIN assigned by the manufacturer, so make sure you always use the exact values. To find unique product identifiers, you can:

  - Check the packaging of the product. GTINs appear below the barcode on the product's packaging.
  - Contact the manufacturer.
  - Check on ISBNdb.com.

- **How do I know if my GTIN is correct?**

  Here are some ways you can check to see if your GTIN is correct:

  - **Check the number of digits**. Each GTIN has a specific number of digits (refer to the table above), so make sure you have the correct number of digits.
  - **Use only numbers**.
  - **Check the check digit or letter for ISBN-10**. The last digit in the GTIN is a computer check digit to ensure that the unique identifier is correct. Use the [GS1 Check Digit Calculator](https://www.gs1.org/check-digit-calculator) to calculate the check digit.
  - **Check the restricted range numbers**. Restricted ranges (prefixes of 2, 02, and 04) and coupon ranges (05, 981, 982, and 983) should not be included in GTINs.
