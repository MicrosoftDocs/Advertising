Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

# Microsoft PromoteIQ

# Integration Guidelines & Documentations

##### This document is your guide to a successful integration and program launch with PromoteIQ. It

##### outlines the integration roadmap along with key business considerations for creating high-

##### performance campaigns and displaying native advertisements across your key channels, page, and

##### device types.

##### Your journey begins with this guide. It provides:

##### 1. Technical Architecture and Integration overview

##### 2. Technical Integration outline

##### 3. Technical Integration Schedule and Considerations

##### 4. Getting Started with PromoteIQ

##### 5. Technical documentations

- Environment Info
- Swagger Doc
- Integration Types
- Request & Response Sample Flow
- Event Tracking
- Conversion Tracking
- Product Feed Overview
- Sales Attribution
- Reporting Fields
- Product Feed Definitions


Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

## 1. Technical Architecture & Integration Overview

```
High Level Architecture
PromoteIQ Technical Integration Overview
```
```
Product Data Feed Conversion API
```
```
DATA IPLACEMENTNTEGRATION CAMPAUCTAIGNION INTERAADCTION CONVERSION
```
```
Ad Request API Ad Response Event API
```
```
Retailer
```
```
Brands Sponsored Ads OrderConfirmation
```

Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

## 2. Technical Integration Outline

- Implementation Planning
    - Project Plan
    - Resourcing
    - Milestones and Deliverables
- Product Feed
    - Sample Feed
    - Taxonomy Analysis
    - Feed Integration
- Infrastructure
    - Environment and Performance Planning
    - Networking / Security
- Inventory Design
    - Client Side vs. Server Side
- Integration Build
- Integration Testing
    - Unit Test
    - End-to-End System Test


Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

## 3. Technical Integration Schedule & Considerations

##### The exact implementation schedule will vary depending on several factors:

- Existence of a product feed the retailer already uses with other vendors
- Technical framework for rendering retailer e-commerce pages
- Technology for firing impression and click event calls
- Initial ad placement selection


Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

## 4. Getting Started

#### Checklist - Key planning activities for kicking off your integration project:

- Designate points of contact
- Schedule kickoff and weekly status meetings
- Define inventory plan
- Schedule architecture design meeting
- Provide sample product catalog feed to PromoteIQ

##### Your PromoteIQ technical account team will be reaching out to you to schedule your

##### Architecture Design meeting, Project Planning meeting and Project Kickoff. We look forward to

##### working with you!


Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

## 5. Technical Documentation

### i. Environment Information

##### PromoteIQ sandbox environment for our retailer client is a dedicated environment built for

##### testing purposes.

##### a) PromoteIQ API endpoints:

##### ▪ Ad Opportunity:

##### POST https://retailer-specific-url/request

##### ▪ Impression Tracker:

##### GET https://retailer-specific-url/impression

- View Tracker:

##### GET https://retailer-specific-url/view

##### ▪ Click Tracker:

##### GET https://retailer-specific-url/click


##### ▪ Conversion Tracker:

##### POST https://retailer-specific-url/conversion

##### b) PromoteIQ web portal:

##### ▪ URL: https://retailer.promoteiq.com/

##### Access: Those requiring access will receive email notifications when an admin user adds

##### them in the system

### ii. Swagger Documentation

##### PromoteIQ Integration API Swagger is a JSON-formatted documentation that lists the expected

##### patterns and parameters of our API requests and responses for client-side and server-side

##### integrations, and it can be considered as our API contracts. Speak with your Technical Account

##### Manager to receive the Swagger document.


Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

##### The file is separately provided, and you can view these documentations by going

##### to http://editor.swagger.io/ and choosing File -> Import File.

### iii. Integration Types

##### PromoteIQ supports both Server-side and Client-side integrations as well as mix of them for

##### different PromoteIQ API calls. For example, retailers can call Ad Opportunity API request on the

##### server-side and call Impression and Click Tracker API requests on the client-side as required.

##### a) Server-side integration

##### This integration type allows retailers to connect with PromoteIQ API’s in the backend.

##### b) Client-side integration

##### This integration type allows retailers to connect with PromoteIQ API’s in the front-end.

### iv. Request & Response Sample Flow

##### This sample integration flow provides retailers with a simplified discussion document for

##### architecture discussions and design sessions with PromoteIQ. Several request examples are

##### provided, to illustrate that retailers can pass a set of organic products, which will be used for

##### “look-alike matching” by the PromoteIQ ad server, or a set of category identifiers, or both.

##### Retailers can also pass attribute information, if available.

#### Step by Step Flow:

##### a) User performs a search or navigate to a retailer’s Product Listing Page

##### b) Retailer determines a set of products to be used for look-alike targeting by PromoteIQ (and/or

##### a set of categories based on the search or browse page/results.)

##### c) Retailer makes a request to PromoteIQ, passing those matched products or categories:

##### PLA:

##### Sample POST /request (unfiltered, look-alike product targeting)

###### {

##### "user": "retailer-user-id", *hashed retailer user id

##### “session”: “retailer-session-id”, *hashed retailer session id


Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

##### "slot": 20010 , *static number provided by PIQ

```
"targets": {
```
##### "match_products": [ *list of SKUs matching Product Feed

###### "14933470",

#### "18796871"

###### ]

###### },

##### "count": 5, *number of product ads requested

##### "count_fill": 3, *number of ads that will be shown

##### "internal": false *flag to identify test / do not bill traffic

###### }

##### Sample POST /request (unfiltered, category targeting)

###### {

##### "user": "retailer-user-id", *hashed retailer user id

##### “session”: “retailer-session-id”, *hashed retailer session id

##### "slot": 20010 , *static number provided by PIQ

```
"targets": {
```
##### "category": [ *list of category IDs matching Product Feed

```
"Sunglasses-129977",
"SkiGoggles-129807"
]
},
```
##### "count": 5, *number of product ads requested

##### "count_fill": 3, *number of ads that will be shown

##### "internal": false *flag to identify test / do not bill traffic

###### }

##### Sample POST /request (filtered by attribute)

###### {

##### "user": "retailer-user-id", *hashed retailer user id

##### “session”: “retailer-session-id”, *hashed retailer session id

##### "slot": 20010 , *static number provided by PIQ

```
"targets": {
```
##### "match_products": [ *list of SKUs matching Product Feed

###### "14933470",

#### "18796871"

###### ],

##### "attributes": { *attribute(s) used for filtering

```
"color": "black",
"shape": "round"
}
},
```
##### "count": 5, *number of product ads requested

##### "count_fill": 3, *number of ads that will be shown


Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

##### "internal": false *flag to identify test / do not bill traffic

###### }

##### Sample POST /request (store location filtering)

###### {

##### "user": "retailer-user-id", *hashed retailer user id

##### “session”: “retailer-session-id”, *hashed retailer session id

##### "slot": 20010 , *static number provided by PIQ

```
"targets": {
```
##### "match_products": [ *list of SKUs matching Product Feed

###### "14933470",

#### "18796871"

###### ],

##### "store_ids": [ *store id(s) used for filtering

###### " 3554 "

###### ]

###### },

##### "count": 5, *number of product ads requested

##### "count_fill": 3, *number of ads that will be shown

##### "internal": false *flag to identify test / do not bill traffic

###### }

##### Sample POST /request (audience targeting)

###### {

##### "user": "retailer-user-id", *hashed retailer user id

##### “session”: “retailer-session-id”, *hashed retailer session id

##### "slot": 20010 , *static number provided by PIQ

```
"targets": {
```
##### "match_products": [ *list of SKUs matching Product Feed

###### "14933470",

#### "18796871"

###### ]

###### },

##### “audiences”: [ *list of Audience_IDs

###### “20_1”,

###### “20_2”

###### ],

##### "count": 5, *number of product ads requested

##### "count_fill": 3, *number of ads that will be shown

##### "internal": false *flag to identify test / do not bill traffic

###### }

##### Banner:


Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

##### Sample POST /request

###### {

##### "user": "retailer-user-id", *hashed retailer user id

##### “session”: “retailer-session-id”, *hashed retailer session id

##### "slot": 20010 , *static number provided by PIQ

```
"targets": {
```
##### "category": [ *list of category IDs matching Product Feed

```
"Sunglasses-129977",
"SkiGoggles-129807"
]
},
“width”: 750,
“height”: 95,
```
##### "count": 5, *number of product ads requested

##### "count_fill": 3, *number of ads that will be shown

##### "internal": false *flag to identify test / do not bill traffic

###### }

##### d) Retailer receives a templated response, containing a set of ordered, matching product ads

##### In the sample below, the response is a structured data set containing two products. The

##### set is ordered based on the PromoteIQ auction, so in this example, the first product is the

##### winner, and the second product is the runner-up. The “sku” field is used to indicate the

##### winning products, and an “impression_id” is provided for each product, for use in the

##### impression, view, and click event API calls to PromoteIQ.

##### For the request examples above, because the value of the “count” parameter is 5,

##### PromoteIQ would return a set of up to 5 products in the response.

##### Sample response:

```
The example also contains impression, view, and click URLs, “impression_tracker”,
“view_tracker”, and “click_tracker”, these events can be fired from client side or as part of
server-side post-processing.
```
```
[
{
"product": {
"available": true,
"rating": 4 .6,
"reviewCount": 167 ,
"description": "<section class="productDescription"><div class="product-
component"><p>The sky is the limit with the Oakley&reg; Womenâ€™s Tie Breaker
Sunglasses. This ultra-feminine frame features a blend of Oakley C-5&trade; wire front
```

Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

```
and warm tones of an acetate stem.</p></div><div class="product-
component"><h3>Fit</h3><ul><li>Three-Point Fit: Comfort and performance that holds
lenses in precise optical alignment</li></ul> <h3>Technology</h3><ul> <li>Ultra-
lightweight hi-modulus C-5&trade; metal frame material with stress resistant acetate ear
stems</li><li>Unobtainium&reg; stem pads prevent glasses from slipping out of
place</li></ul><h3>Design</h3></ul></div> <a data-em="Product_PageElement_Prop65"
href="http://www.retailer.com/s/california-disclosures" target="_blank">California
Proposition 65</a></div></section>",
"brand": "Oakley",
"color": "Black",
"imageLarge": "https://retailer.scene7.com/is/image/GolfGalaxy/19OAKWTBRKRP
LBLKPSGS_Pol_Blk_Prizm_Tungsten?wid=2000&fmt=pjpeg",
"priceList": 186 ,
"priceCurrent": 186 ,
"priceFlag": "N",
"priceCurrency": "USD",
"manufacturer_model_number": "888392404640",
"imageSmall": "https://retailer.scene7.com/is/image/retailercdn/19OAKWTBRKRP
LBLKPSGS_Pol_Blk_Prizm_Tungsten_is/?$Retailer_ProductCard$",
"name": "Oakley Women's Tie Breaker Sunglasses",
"onSale": false,
"sku": "19896667",
"landingPageUrl": "https://www.retailer.com/p/oakley-womens-tie-breaker-
sunglasses-19oakwtbrkrplblkpsgs/19oakwtbrkrplblkpsgs",
},
"impression_id": "ce848523-11bc-4a65-9f9a-6c872c66ec67",
"impression_tracker": "https://ad-retailer.tagdelivery.com/impression?id= ce848523-
11bc-4a65-9f9a-6c872c66ec67",
"product_id": "123456789",
"sponsored": true,
"click_tracker": "https://ad-retailer.tagdelivery.com/click?id=ce848523-11bc-4a65-
9f9a-6c872c66ec67&redirect=",
"view_tracker": "https://ad-retailer.tagdelivery.com/view?id=ce848523-11bc-4a65-
9f9a-6c872c66ec67&redirect=",
"campaign_id": 12345
},
{
"product": {
"available": true,
"rating": 4.7,
"reviewCount": 213 ,
"description": <section class="productDescription"><div class="product-
component"><p>You'll want to stay out in the sun longer to show off the Ray-Ban&reg;
Chris Sunglasses. Featuring a rubber finish with a textured feel and a lightweight element
for easy wear, these frames will add an instantly cool vibe to any outfit.</p></div><div
class="product-component"><h3>Fit</h3><UL><LI>Frames compliment most face
shapes</LI></UL><h3>Design</h3><UL><LI>Square shape</LI><LI>Rubber frame finish
```

Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

```
for a textured feel</LI></UL><h3>Specs</h3> <UL><LI>Size lens-bridge: 54
18</LI><LI>Temple Length: 145</LI></UL></div> </section>",
"brand": "Ray-Ban",
"color": "Multi",
"imageLarge": "https://retailer.scene7.com/is/image/GolfGalaxy/19RYBACHRSRBR
BLKGSGS_Rbr_Blk_Gry_Gra_Drk_Gry?wid=2000&fmt=pjpeg",
"priceList": 143 ,
"priceCurrent": 147 ,
"priceFlag": "N",
"priceCurrency": "USD",
"manufacturer_model_number": "713132581131",
"imageSmall": "https://retailer.scene7.com/is/image/retaiercdn/19RYBACHRSRBRB
LKGSGS_Rbr_Blk_Gry_Gra_Drk_Gry_is/?$Retailer_ProductCard$",
"name": "Ray-Ban Chris Sunglasses",
"onSale": false,
"sku": "19896712",
"landingPageUrl": "https://www.retailer.com/p/ray-ban-chris-sunglasses-
19rybachrsrbrblkgsgs/19rybachrsrbrblkgsgs",
},
....]
```
##### e) Retailer renders product(s) onto the page as normal, along with tag containing the

##### “impression_id” for sponsored products

##### f) Retailer either fires the impression, view, and click trackers as pixels on the client side, or

##### post-processes an analytics stream to format and send the event calls asynchronously, passing

##### the impression_id for each rendered impression, viewed impression, or clicked product.

##### NOTE: The impression_id has a TTL of 6 hours. Impressions, viewable impressions, and clicks

##### received after 6 hours will be discarded

##### g) Separately, retailer calls PIQ’s /conversion or /collect endpoint, to send order data to

##### PromoteIQ, either synchronously or asynchronously

#### Slot Level Options:

##### For each inventory slot, there are also several options which are configurable within PromoteIQ.

##### These are often set differently, for example, for an in-grid Search request vs. a Product Detail

##### Page carousel request.

```
Name
Description
Options
```
```
Commented [X(1]: "measurable" &
"measurable_effective_date" for Viewability. Viewability
Technical Documents - Product - Confluence (atlassian.net)
```

Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

```
Exact Match This parameter indicates the
response behavior when products
are passed to PromoteIQ for
matching.
```
##### TARGET boosts the score of the content

```
if the content matches a match_product
```
##### (default)

##### FILTER removes all contents that ARE

##### NOT in the match_product list

##### EXCLUDE removes all contents

##### that ARE in the match_product list

```
Inferred
Brand
Targeting
```
```
This parameter indicates that PIQ
should assume that the experience
is branded (e.g. search for a specific
brand, brand filter) if the set of
products sent to PIQ are from the
same brand.
```
##### INFERRED BRAND FILTER ENABLED

##### (Y or N)

##### THRESHOLD indicates percent of

```
products that need to be the same for
the platform to apply filter
```
```
Attribute
Filtering
```
```
This parameter indicates how
product attributes (e.g. color)
should be used when available in
the retailer product feed.
```
##### TARGET boosts the score of the content

```
if the content matches this attribute
```
##### FILTER removes all contents that ARE

##### NOT in the matches to this attribute

```
Depth Delta This parameter controls how far up
the taxonomy hierarchy the ad
server is allowed to traverse when
matching eligible products. E.g.
Depth Delta = 0 instructs the ad
server to only show products
which match at the most granular
level, L3 for retailer. Depth Delta =
1 would still show the most
relevant L3 matched products first,
but if there were not matches at
the L3 level, the server will return
L2 products.
```
##### DEPTH_DELTA the number of

```
taxonomy levels the ad server is allowed
to traverse when ranking eligible
products
```
```
Measurable This parameter indicates if the slot
has implemented the Viewability
measurement
```
##### True / False

### v. Event Tracking

##### PromoteIQ supports impression, view, and click trackers API calls in two fashions:

##### ▪ Call the respective endpoints by constructing your own call or


Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

##### ▪ Call by using the impression_tracker, view_tracker, and click_tracker URLs in

##### the Ad Opportunity response.

##### Impression_tracker (Rendered Impression): Generally fired on page-load or on view. This metric

##### is used to calculate the number of times a user could view an Ad. PIQ recommends firing this

##### event on page-load.

##### View_tracker (Viewable Impression): This metric is used to capture viewable impressions. PIQ

##### recommends following IAB and MRC viewability guidelines to fire the view_tracker, when the

##### ad is 50% in the user’s viewable space for 1 second.

##### The view_tracker event is not meant to replace impression_tracker. PromoteIQ recommends

##### sending both View and Impression events to:

##### 1. Enrich data models for forecasting and troubleshooting

##### 2. Enables view-based Banner Monetization

##### 3. Enables view-based PLA optimization

##### 4. Extend viewability reporting to Advertisers

##### 5. Adheres to MRC viewability guidelines.

##### 1. https://www.iab.com/wp-content/uploads/2015/06/MRC-Viewable-Ad-

##### Impression-Measurement-Guideline.pdf

##### Click_tracker: Metric to capture user’s engagement with a PLA or Banner.

### vi. Conversion Tracking

##### PromoteIQ provides a mechanism for tracking and attributing campaign conversions driven by

##### PromoteIQ campaigns. PromoteIQ also supports the following:

- Conversion source: Online and In-Store
- Conversion types: One-time Purchase, Subscription (Auto ship) Purchase, Add-To-Cart,

##### Add-To-List.

- Add-To-Cart and Add-To-List, requires the retailer to send this conversion metric

##### for all Add-To-Cart / Add-To-List interactions on organic and sponsored listings.

##### Add-To-Cart interaction on a PLA will require two events to be sent to PIQ, 1)

##### click tracker event and 2) ATC conversion tracker.


Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

##### Speak with your Technical Account Manager to learn more about the supported conversion

#### types.

#### Conversion Tracking Implementation

##### This section describes the process of integrating conversion tracking with an existing "thank you"

##### page to notify PromoteIQ of a conversion.

##### Orders can be sent to PromoteIQ by using:

##### 1. /conversion endpoint directly from Server side

##### 2. /conversion endpoint directly from Client side (does not support CORS)

##### 3. JavaScript client

- Available via HTTP and HTTPS
- Javascript Minified: https://cdn.tagdelivery.com/data/client/standard.js
- Javascript Unminified: https://cdn.tagdelivery.com/data/client/standard.full.js

#### a) Conversion Endpoint (recommended)

##### PromoteIQ's analytics platform recognizes the following parameters object when calling the

##### /conversion endpoint. The tables describe the key-value pairs of this hash.

##### Sample POST /conversion for Subscription purchase

##### The following example illustrates how conversion tracking can be implemented with the

##### /conversion endpoint.

```
Typical Call
{
```
##### "pid": “retailer-specific-Id", *static number provided by PIQ

```
"txnid": "order-1234",
"user": "session-1234",
"customer": "customer-5678",
“currency”: “USD”,
“revenue”: 5.99,
"source_type": "online",
"conversion_type": "SUBSCRIPTION",
"items": [
{
"sku": "0004300004641",
"price": 6.99,
"sold_price": 5.99,
"qty": 1,
```
```
Commented [X(2]: What is CORS?
```

Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

```
"recurring_qty": 1,
"recurring_sold_price": 0
}
]
}
```
##### Sample POST /conversions for Add-To-Cart

```
Typical Call
{
```
##### "pid": “retailer-specific-Id", *static number provided by PIQ

```
"user": "session-1234",
"customer": "customer-5678",
“currency”: “USD”,
"source_type": "online",
"conversion_type": "ATC",
"items": [
{
"sku": "0004300004641",
"price": 6.99,
"qty": 1
}
]
}
```
#### b) Javascript Client

##### Loading the Javascript client adds the TagDeliveryData object to the global scope

##### (e.g. window.TagDeliveryData). There are two documented methods available on this object:

##### Method 1: TagDeliveryData.collect(event, [parameters=null])

##### This method collects data for the specified event as structured in parameters by creating a URL

##### for an image pixel that is loaded but not attached to the DOM.

```
Arguments
```
```
Parameter Type Required? Description
```
```
Event String Always one of the following event types
```

Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

```
Parameters Object Optional an object/hash containing the appropriate keys
and values for the event
```
##### Return Value

- Boolean indicating a successful parsing and transmission of the event and its data

##### Method 2: TagDeliveryData.getErrors()

##### This method provides all errors that were recorded within the TagDeliveryData module since

##### the previous call to this method, or since page load if never previously called. Most

##### useful/relevant to debugging during development and integration, but could also be used in

##### production monitoring.

##### Return Value

- Array containing error strings. Can be empty.

#### Event Types

##### PromoteIQ's analytics platform currently recognizes the following events, each of which requires

##### a different parameters when calling TagDeliveryData.collect(). The tables describe the

##### key-value pairs of this hash for each event type.

- conversion:summary

##### Captures high-level detail about a conversion or purchase. Unless items is provided, does

##### not allow for SKU- or product-level attribution.

- conversion:item

##### Captures line-item detail from a conversion or purchase. Can/should be called repeatedly

##### for each line item in a purchase.

##### Examples

##### The following examples illustrate how conversion tracking can be implemented with the

##### Javascript API. The individual calls example is most instructive and gives the best sense of how

##### the API works, and the combined call shows a more likely pattern for actual production use.

##### Sample Combined GET /collect

##### A single combined call can be made to TagDeliveryData.collect() to simultaneously provide


Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

##### both conversion:summary and conversion:item data. Keys that exist in both the parent and child

##### levels don't need to be included in the children (e.g. txnid and customer).

```
Typical Call
<script type="text/javascript" src="https://cdn.tagdelivery.com/data/client/standard.full.js"></script><scr
ipt type="text/javascript">
```
```
/* PIQ provides a deployment-specific ID for conversion tracking -- contact your account manager for
details */
var myPromoteIqId = 'SomeIdFromPIQ';
```
```
/* Submitting summary data to PIQ */
var success = TagDeliveryData.collect(
'conversion:summary',
{
pid : ‘myPromoteIqId’,
txnid : 'Order-1234',
user : 'Session-1234'
customer : 'Customer-5678',
revenue : (42 + 5 + 4.20),
shipping : 5,
tax : 4.20,
currency : 'USD',
conversion_type: 'ONETIME',
items : [
{
sku : 'Product-ABC',
qty : 2,
price : 15,
brand : 'Brand-321',
supplier: 'Vendor-987',
rfc : 10,
sfc : 7
},
{
sku : 'Product-DEF',
qty : 1,
price : 12,
brand : 'Brand-654',
supplier: 'Vendor-543',
rfc : 9,
sfc : 6
}
],
```

Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

```
tags : ['DESKTOP', 'FOO']
}
);
```
```
if(success){
console.log('Successfully submitted conversion:summary and conversion:item data');
} else {
console.error('Error(s) while submitting conversion:summary and/or conversion:item data',
TagDeliveryData.getErrors());
}
```
```
</script>
```
##### Individual GET /collect

##### Multiple calls can be made to TagDeliveryData.collect() to provide

##### both conversion:summary and conversion:item data:

```
Typical Call
<script type="text/javascript" src="https://cdn.tagdelivery.com/data/client/standard.full.js"></script><scr
ipt type="text/javascript">
```
```
/* PromoteIQ provides a deployment-specific ID for conversion tracking -- contact your account
mananager for details */
var myPromoteIqId = 'SomeIdFromPIQ';
```
```
/* Submitting summary data to PIQ */
var summarySuccess = TagDeliveryData.collect(
```
```
/* event type */
'conversion:summary',
```
```
/* parameters object with appropriate keys for event type */
{
pid : myPromoteIqId,
txnid : 'Order-1234',
user : 'Session-1234',
customer: 'Customer-5678',
revenue : (42 + 5 + 4.20),
shipping: 5,
tax : 4.20,
currency: 'USD',
conversion_type: 'SUBSCRIPTION',
}
```

Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

###### );

```
if(summarySuccess){
console.log('Successfully submitted conversion:summary data');
} else {
console.error('Error(s) while submitting conversion:summary data', TagDeliveryData.getErrors());
}
```
```
var firstProductSuccess = TagDeliveryData.collect(
'conversion:item',
{
pid : myPromoteIqId,
txnid : 'Order-1234',
sku : 'Product-ABC',
user : 'Session-1234',
customer: 'Customer-5678',
qty: 1,
price: 14,
recurring_qty: 2,
currency: 'USD',
brand : 'Brand-321',
supplier: 'Vendor-987',
rfc : 10,
sfc : 7
}
);
```
```
if(firstProductSuccess){
console.log('Successfully submitted conversion:item data for first product');
} else {
console.error('Error(s) while submitting conversion:item data for first product',
TagDeliveryData.getErrors());
}
```
```
var secondProductSuccess = TagDeliveryData.collect(
'conversion:item',
{
pid : myPromoteIqId,
txnid : 'Order-1234',
sku : 'Product-DEF',
user : 'Session-1234',
customer: 'Customer-5678',
recurring_qty: 1,
price : 12,
```

```
Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential
```
```
currency: 'USD',
brand : 'Brand-654',
supplier: 'Vendor-543',
rfc : 9,
sfc : 6
}
);
```
```
if(secondProductSuccess){
console.log('Successfully submitted conversion:item data for second product');
} else {
console.error('Error(s) while submitting conversion:item data for second product',
TagDeliveryData.getErrors());
}
```
```
</script>
```
### vii. Product Feed Overview

##### The product feed kicks off the integration with PromoteIQ and should be made accessible to

##### PromoteIQ in the beginning of the process. The sooner the feed is delivered to PromoteIQ, the

##### quicker the integration can begin.

##### A product feed, sometimes known as a product data feed, is a continuously updated data stream

##### that contains all pertinent metadata regarding products offered on your e-commerce site.

##### PromoteIQ uses product feeds to inform targeting during delivery and, in many cases, to render

##### product data on promotions for the shoppers. We also use product feed data to power the

##### campaign creation process for advertisers. As part of the campaign creation process, advertisers

##### will see a list of available products associated with their account for promotion selection.

##### The product feed includes the product taxonomy and other product metadata. The product

##### taxonomy is especially important in enabling accurate targeting of products to inventory and

##### pages on your website.

##### Maintaining data quality in your feed is critical to enabling a good end-user experience for

##### shoppers. Highly granular, updated, and complete product data enable better targeting and drive

##### higher CTRs (Clickthrough rate) and conversions.

#### Specifications

##### This section provides a brief summary of the data requirements. A more detailed overview of the

##### data required in each feed can be found in the appendix of this document.

##### Every item in the product feed should contain required information such as SKU number, price,

##### brand, image URL, landing page URL, in-stock/sold-out indicator, and taxonomy.


Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

##### We support Product feed API or any standard text-based interchange format like CSV, TSV, or

##### JSON in UTF-8 encoding.

##### Retailers typically send a full product feed to PromoteIQ at a frequency of once a day. More

##### frequent updates can be accommodated as needed, and in these cases the updates can be limited

##### to deltas.

#### Integration

##### PromoteIQ offers the Product feed API with its swagger documentation.

##### If you opt not to use the API, PromoteIQ also offers a SFTP server that can be used to deliver the

##### feed files on a regular cadence. To send product feed files via our SFTP server, key-based

##### authentication needs to be set up. The steps to do this are as follows:

##### 1. Client creates an SSH key pair and sends us the public key, as well as a list of any IP

##### addresses that will connect to the SFTP server

##### 2. PromoteIQ configures the SFTP server with the public key, whitelists the IP

##### addresses, and provide a drop off location

##### 3. Client uses the private key to authenticate when uploading to the server

```
Bash Example
```
```
echo "put local/path/to/feed.csv" | sftp -b - - i
local/path/to/ssh_private_key you@sftp.promoteiq.com :~/data
```
#### Feed Management

##### There are several teams within your organization who may create and/or manage your product

##### feed/s:

##### o ETL team

##### o Product Information Management team

##### o Any teams that manage product data

##### As part of the onboarding/implementation process, it is important to communicate with these

##### teams to determine a plan for product/feed updates. Surprise or un-communicated updates can

##### result in products becoming unavailable for promotion within the PromoteIQ system.


```
Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential
```
### viii. Sales Attribution

##### Sales attribution is a crucial step in measuring the efficacy of a digital advertising campaign. Sales

##### attribution, and in turn, ROAS (return on advertising spend), is essential for quantitatively

##### evaluating the performance of ad campaigns.

##### Each PromoteIQ program captures sales and attribution data to provide insights and reporting to

##### determine future budgets, strategies, and marketing direction.

##### PromoteIQ supports configurable attribution based on your needs.

##### o Attribution Window: 1, 7, 14 (default for banner), 30 (default for PLA) days

##### o Attribution Halo:

##### o Brand Halo Effect (default): If the purchased product is from the same brand as

##### any of the clicked PLA or viewed Banner, that purchased product's paid price is

##### attributed to the most recent click for PLA and the most recent impression for

##### Banner from that brand. The attributed products do not need to be a sponsored

##### product.

##### o Category Halo: If a brand promotes multiple banners and PLAs across different

##### sub-categories, a conversion is eligible to be attributed to a campaign if the

##### SKU/Banner promoted in the campaign and the SKU purchased are of the same

##### category. Category Halo is designed to improve the relevance between ads and

##### purchases.

#### PromoteIQ Attribution Requirement

##### PromoteIQ provides multiple attribution models, providing retailers the flexibility to meet the

##### needs of various verticals, advertisers, shoppers' behaviors, and business goals. By default,

##### PromoteIQ uses a post-click and post-impression "brand halo effect" attribution model for

##### Sponsored Products. Please work with your Technical Account Manager on available options.

##### How the default Attribution Model works:

- Order line-item details are sent to PromoteIQ after each cart check out. This includes but

##### not limited to - shopper identifier(s) (used only for the purpose of attributing sales),

##### purchased product, conversion type, source type, price qty.


Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

- PromoteIQ checks each order line-item to determine if the shopper has a qualifying

##### interaction with a Product Listing Ad (PLA) or Banner within the Attribution Window

##### (30-day post click for PLA, 14-day post-view for Banner).

- If the purchased product is from the same brand as any of the clicked PLA or viewed

##### Banner, that purchased product’s paid price is attributed to the most recent click (for

##### PLA) and most recent impression (for Banner) from that brand. The attributed products

##### do not need to be sponsored products.

#### Privacy and PII

##### PromoteIQ does not collect any personally identifiable information (PII) from internet users who

##### interact with PromoteIQ systems via PromoteIQ customers and deployments.

##### Accordingly, any values being passed by PromoteIQ customers into PromoteIQ's conversion

##### tracking mechanism should not directly include any PII:

- Names
- Addresses
- phone numbers
- email addresses
- social media handles ("screen names")
- Social Security Numbers
- banking information/records
- credit card data
- etc.

##### Anonymous customer identifiers (i.e. "Customer 24234"), and suitably salted and hashed PII

##### strings are acceptable.

#### PLA Campaigns Summary

##### o Attribution Model: Last Click

##### o Post-click Attributed? Yes

##### o Post-view Attributed? No

##### o Attribution Window: 30 days (default)

##### o Attribution Halo: Brand halo (default)

##### o Criteria: Sales are attributed for any items purchased post-click that fall under the

##### promoted product’s brand

#### PLA Attribution Mechanics


Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

##### Purchases are attributed to a campaign after a user clicks a promoted product then purchases that

##### product or a related product under the same brand within the default attribution window. As live

##### transaction logs are sent to PromoteIQ, our sales attribution science looks to see if any purchase

##### qualifies as an attributed sale.

##### Attributed sales are found by referencing a user’s hashed information in transaction logs to see if

##### it correlates to any clicks in the previous 30 days. If the click and purchase are from the same

##### brand, then that purchase can be attributed to that campaign.

##### For products that appear in multiple campaigns, PromoteIQ attributes the purchase to the most

##### recently clicked campaign associated with the product.

#### Banner Campaigns Summary

##### o Attribution Model: Last Viewed

##### o Post-click Attributed? No

##### o Post-view Attributed? Yes

##### o Attribution Window: 14 days (default)

##### o Attribution Halo: Brand halo (default)

##### o Criteria: Sales are attributed for any items purchased post-view that fall under the

##### promoted product’s brand

#### Banner Attribution Mechanics

##### The mechanics are similar to it of PLA campaigns. There is a 14-day attribution window (default)

##### and our attribution engine will search the transaction logs to see if any of user’s hashed

##### information correlates to any views in the past 14 days.

##### Post-click attribution takes priority or trumps post-view attribution.

#### Attribution Set-Up

##### Our integrations team will work to:

- Establish a secure stream of transaction logs with appropriate fields for attribution. This

##### can either be done via a front-end pixel tracker on checkout pages for a client-side

##### integration, or the logs can be sent to a secure PromoteIQ endpoint for a server-side

##### integration.


Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

- Configure the attribution ruleset (attribution window, attribution halo) based on your

##### needs.

#### Viewing Attribution Information

##### Attribution information can be found in the following places in the PromoteIQ UI:

##### 1. PromoteIQ displays the ROI and Units Sold in the Campaign Manager dashboard for

##### each campaign.

##### 2. Attribution data is available via the PromoteIQ reporting module. Preset and custom

##### reports include a variety of attribution metrics like ROAS, Units Sold, and Total Sales


Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

### ix. Reporting Fields

```
Dimensions Metric Name Description Data Type Accepted
Values
Campaign Access Level Access Level: retailer or vendor Text Retailer,
vendor^
Auction Position The order in which the product was
selected by the PromoteIQ auction
enginer, Position 1 is the first promotion
selected by the auction and is typically
the most visible to shoppers
```
```
Number Whole
numbers
```
```
Booked SOV The desired percentage of impressions
for a campaign to win matching the
inventory and target criteria (available
for Sponsorship placements only)
```
```
number 0 - 100
```
```
Budget Amount Current budget amount for the
campaign
```
```
Number Any
```
```
Budget Interval Selected budget interval for the
campaign. Possible values are Daily,
Weekly, Monthly, or Lifetime
```
```
Text Daily,
Weekly,
Monthly,
Lifetime^
Campaign Billing
ID
```
```
Media campaign billing ID, used for
media planning purposes^ Number^ Any^
Campaign Creator
(Email)
```
```
Email Address of the PromoteIQ user
who first created and saved the
campaign
```
```
Text Email
```
```
Campaign Creator
(Name)
```
```
PromoteIQ user who initially created
and saved the campaign
```
```
Text Any
```
```
Campaign ID PromoteIQ assigned unique ID for each
campaign
```
```
Text Any
```
```
Campaign Last
Updater (Email)
```
```
Email address of the user who last
updated the campaign
```
```
Text Any
```
```
Campaign Last
Updater (Name)
```
```
Name of the user who last updated the
campaign
```
```
Text Any
```
```
Campaign
Launcher (Email)
```
```
Email Address of the PromoteIQ user
who first launched the campaign
```
```
Text Email
```
```
Campaign
Launcher (Name)
```
```
PromoteIQ user who launched the
campaign
```
```
Text Any
```
```
Campaign Name^ Name of the selected campaign^ Text^ Any^
Campaign Status Current campaign status. Possible
values are Draft, Queued, Active,
Paused or Ended
```
```
Text Draft,
Queued,
Active,
Paused,
Ended^
Date Created Date that a campaign was first created
and saved
```
```
Date Any
```
```
Delivered Target
ID
```
```
The target ID of the delivered target Number Any
```
```
Delivered Target
Taxonomy
```
```
The full category taxonomy of the
delivered target
```
```
Text Any
```
```
Delivered Targets Target name the campaign delivered
against the target group for a campaign
```
```
Text Any
```
```
End Date Current end date for the campaign Date Any
```
```
Commented [X(3]: Full list here What do the different
reporting fields mean? - General Documentation -
Confluence (atlassian.net)
```

Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

```
Impression Cap The maximum number of impressions
to be delivered daily (CPD) or over the
lifetime of the campaign (Total Budget)
```
```
Number Whole
numbers
```
```
Launch Date Campaign launch date Date Any
```
```
Pacing Method Spend pacing configuration for the
campaign
```
```
Text ASAP or
Even
Placement Name Name for a given placement defined by
the retailer
```
```
Text Any
```
```
Placement Type Indicates the placement type defined by
the retailer. Possible values are PLA or
Banner
```
```
Text PLA,
Banner
```
```
Slot Name Name of slot defined by retailer Text
Start Date Current start date for the campaign Date Any
```
```
Inventory Average Floor
Price
```
```
Average floor price across slots and
placements.
```
```
Number Any
```
```
Placement ID PromoteIQ generated a unique ID for a
given placement
```
```
Text System
Generated^
Placement Name^ Name of placement defined by retailer^ Text^ Any^
Requested Target
IDs
```
```
PromoteIQ generated ID for a
requested target for a campaign
```
```
Text System
Generated^
Requested Target
Taxonomy
```
```
Requested full site taxonomy for a
campaign
```
```
Text
```
```
Requested
Targets
```
```
Name of target requested by a
campaign
```
```
Text Any
```
```
Retailer Target ID Reference that a retailer can use for
tracking category ID in own systems.
```
```
Text Any
```
```
Slot ID PromoteIQ generated a unique ID for a
given slot
```
```
Text System
Generated^
Slot Name Name of slot defined by retailer Text
Product Category
Taxonomy
```
```
Full site taxonomy associated with the
product in PromoteIQ based on the
product feed. For example, target
taxonomy would return "my cart" while
the store taxonomy is still Grocery >
Carbonated Beverages.
```
```
Text
```
```
Promoted Product
/ Creative ID
```
```
Promoted product ID from the product
feed
```
```
Text
```
```
Promoted Product
/ Creative Name
```
```
Product name of the SKU a vendor
promotes in a campaign
```
```
Text
```
```
Promoted SKU SKU number a vendor promotes in a
campaign. Empty for banners
```
```
Text
```
```
Unit Price
(Interacted SKU)
```
```
The unit price for the interact product Number
```
```
Sales Average Unit
Price (Purchased
Product)
```
```
Average price paid by shopper at time
of sale
```
```
Number
```
```
Interacted Product
/ Creative
```
```
Name of the last promoted product or
creative a shopper interacted with
before making a purchase
```
```
Text
```
```
Interacted SKU SKU of the last promoted product a
shopper clicked on before making a
```
```
Text
```

Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

```
purchase.
Will be blank for placements without
SKUs.
Order Date Time and date the order was purchased Date
```
```
Order ID Unique identifier from the retailer
associated with a completed transaction
linked to a shopper.
```
```
Text
```
```
Position The order in which the product was
selected by the PromoteIQ auction
engineer, Position 1 is the first
promotion selected by the auction and
is typically the most visible to shoppers
```
```
Number Whole
numbers
```
```
Purchased
Product Name
```
```
Name of the product purchased Text
```
```
Purchased SKU SKU of the purchased product Text
```
```
Total Sales Sum of all sales for products sold that
are attributed to a promoteIQ campaign
```
```
Number
```
```
Units Sold Count of units sold attributed to a
PromoteIQ campaign
```
```
Number
```
```
Vendor Name Name of the vendor account in
PromoteIQ
```
```
Text
```
```
User Date Created
(User)
```
```
Date the user was created (dd-mm-
yyyy)
```
```
Date
```
```
Last Login Date of the most recent login for the
user account (dd-mm-yyyy)
```
```
Date
```
```
Permissions
(Account ID)
```
```
List of all account IDs a user has
permission to access at time of report
generation
```
```
Text
```
```
Permissions
(Account Name)
```
```
List of all account names a user has
permission to access at time of report
generation
```
```
Text
```
```
User Email Email address associated with user
account
```
```
Text Email
```
```
User Name First name, last name associated with
user account
```
```
Text
```
```
User Type Status of PromoteIQ user as Standard
or Admin at time of report generation
```
```
Text Standard,
Admin
Vendor PromoteIQ
Vendor ID
```
```
PromoteIQ assigned unique ID for a
given vendor
```
```
Text System
Generated^
Retailer Vendor ID Unique ID used by the retailer to
identify the specific vendor
```
```
Text Any
```
```
Vendor Name Name of the vendor account in
PromoteIQ
```
```
Text Any
```
```
Metrics Metric Name Description Data Type
Performance Avg Order Value Average sales generated from each
order with at least one sale attributed to
PromoteIQ (Total Sales / Order Count)
```
```
Number
```
```
Avg Unit Sold
Value
```
```
Average value of each unit sold that is
attributed to PromoteIQ (Total Sales /
Units Sold)
```
```
Number
```
```
Clicks Total clicks recorded over a specified
period
```
```
Number
```

Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

```
CPA Cost per Acquisition - the amount of ad
spend for each sales conversion. Also
referred to as Cost of Conversion.
(Spend / Order Count)
```
```
Number
```
```
CPC Cost per Click: Average cost per click
over a specified period (Spend/Clicks)
```
```
Number
```
```
CPM Cost per Mille - Average cost per
thousand over a specified period
(Spend / Impressions * 1000)
```
```
Number
```
```
CTR Click-Through Rate - The average rate
at which shoppers click on placements
over the specified period
(Clicks / Impressions)
```
```
Percentage
```
```
High Winning Bid Highest bid for a campaign. Used by
the retailer to see the bid range for
campaigns. Can be used to detect
normal bid ranges and outliers.
```
```
Number
```
```
Highest Paid CPC Highest CPC paid by vendor for a
campaign in the specified date range.
```
```
Number
```
```
Impressions Total impressions for specified period Number
```
```
Low Winning Bid Lowest bid for a campaign. Used by the
retailer to see the bid range for
campaigns. Can be used to detect
normal bid ranges and outliers.
```
```
Number
```
```
Lowest Paid CPC Lowest CPC paid by vendor for a
campaign in the specified date range.
```
```
Number
```
```
ROAS Return on Ad Spend - Average of return
on ad spend over a specified period
(Total Sales / Spend)
```
```
Percentage
```
```
SKU Conversion
Rate
```
```
Average rate a shopper clicks on a
promoted product resulting in an
attributed sale (Order Count / Clicks)
```
```
Percentage
```
```
SKU Order Count Order Count of the number of unique
SKU's with conversions attributed to
your campaign
```
```
Number
```
```
Spend Total spend for a specified period Number
```
```
Total Sales Sum of all sales for products sold that
are attributed to a promoteIQ campaign
```
```
Number
```
```
Units Sold Count of units sold attributed to a
PromoteIQ campaign
```
```
Number
```
```
Supply Ad Render Rate Percentage of ad returned from
PromoteIQ that was successfully
rendered on the page. (Impressions /
Responses)
```
```
Percentage
```
```
Ad Responses Number of products that won an auction
and were returned to the retailer site for
promotion
```
```
Number
```
```
Clicks Sum of clicks recorded during the
reporting period
```
```
Number
```
```
CPC Cost per Click: Average cost per click
(Spend/Clicks)
```
```
Number
```

Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

```
CPM Cost per Mille: Average cost per click
(Spend/Impressions/1000)
```
```
Number
```
```
CTR Click-Through Rate - The average rate
at which shopper click on ads
```
```
Percentage
```
```
Highest Winning
Bid (Target)
```
```
Highest bid for a target. Used by the
retailer to see the bid range for
campaigns. Can be used to detect
normal bid ranges and outliers.
```
```
Number
```
```
Impressions Sum of ad responses successfully
rendered on the site
```
```
Number
```
```
Lowest Winning
Bid (Target)
```
```
Lowest bid for a target. Used by the
retailer to see the bid range for
campaigns. Can be used to detect
normal bid ranges and outliers.
```
```
Number
```
```
No Product
Response
```
```
Convenience field use to measuring fill
rate. The value is the difference
between the opportunities and delivered
responses. (Opportunities - Responses)
```
```
Number
```
```
Opportunity Total available opportunities for
displaying advertisements
```
```
Number
```
```
Request Number of requests made by the
retailer to PromoteIQ
```
```
Number
```
```
ROAS Average of return on ad spend (Total
Sales / Spend)
```
```
Percentage
```
```
Spend Sum of spend for the supplier Number
```
```
Total Sales Sum of the retail price for all products
sold that can be attributed to a
PromoteIQ campaign (Unit price * Units
sold)
```
```
Number
```
```
True Fill Rate Percentage of opportunities that were
ultimately filled with a fully rendered
promoted ad (Impressions /
Opportunity)
```
```
Percentage
```
```
Conversion SKU Order Count-
RULESETNAME
```
```
Number of unique SKUs with
conversions attributed to your campaign
```
```
Number
```
```
Units Sold-
RULESETNAME
```
```
Number of attributed units ordered that
are attributed to a PromoteIQ campaign
```
```
Number
```
```
Total Sales-
RULESETNAME
```
```
Sum of all sales for product sold that
are attributed to a PromoteIQ campaign
```
```
Number
```
```
Total Sales (Sold
Price)-
RULESETNAME
```
```
Sum of total amount paid by shoppers
that are attributed to a PromoteIQ
campaign
```
```
Number
```
```
Sales by
Conversion
Source-
RULESETNAME
```
```
Sum of all sales for product sold that
are attributed to a PromoteIQ
campaign, breakdown by conversion
source
```
```
Number
```
```
Clicks Total clicks recorded over a specified
period
```
```
Number
```

Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

```
Impressions Total impressions for specified period Number
```
```
Spend Total spend for a specified period Number
```

Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

### x. Product Feed Definitions

```
Field Type Required? Description
name String Required SKU friendly name
partnerRef String Required Retailer's internal ID for the brand or
partner supplying the product
Please populate with brand name if a
brand ID does not exist
partnerName String Optional Name of the brand or partner supplying
the product
sku String Required Retailer's internal reference for the
product
id String If different from
sku
```
```
Other retailer product ID; use if
customer facing product IDs and
internal IDs are different (only if
different from sku)
parent_sku String Optional Parent product’s SKU
partnerModelRef String Optional Manufacturing ID
available Boolean Required SKU stock status
imageLarge String Required URL of product image to be used in
rendering of promotions
imageSmall String Required URL of product image to be used in
PromoteIQ UI – thumbnail image
description String If used in
promotions
```
```
SKU description
```
```
priceCurrency String Optional 3 - character ISO 4217 currency
code (e.g. “USD”)
firstCost Float Optional Product’s first cost (e.g. partner’s price
to retailer) if used for calculating ROI
priceList Float Optional Product’s list price (e.g. standard full
price)
priceCurrent Float Required Product’s current price (e.g. reflecting
any current sales or special offers)
taxonomy Array Required SKU taxonomy hierarchy. Please send
both IDs and friendly names if possible
Ex. [“Clothing > Jackets > Jean Jackets”,
“dept_id_1 > category_id_1 >
category_id_1”]
itemAttributes Object Optional Any retailer specific attributes and
critical non-standard information
color Array Optional Ex. [“red”]
gender Array Optional Ex. [“female”]
siteEligibility Object Optional If multiple retailer ecommerce sites to
be supported by the product feed
siteA Boolean Optional Indicator of product’s applicability to a
site
attrName Array Optional Any additional attributes (ageGroup,
etc.) can be sent in the form of
" attrName": ["attrValue"]
landingPageUrl String Required URL of product detail page on retailer’s
site for use as click-through destination
```

Microsoft PromoteIQ Integration Guidelines - Microsoft Confidential

```
locations Array Optional List of store IDs where SKU is in stock
rating Float Optional Product’s rating from use feedback (e.g.
4.5 stars out of 5)
reviews Integer Optional Number of reviews/ratings submitted
by users
onSale Boolean Optional Flag indicating if product is on sale or
otherwise under special promotion – if
omitted, automatically replaced by a
comparison of the list and current
prices
thirdPartySellers Array Optional Any third-party seller selling the
product
id
name
priceCurrent
available
itemAttributes
siteEligibility Object Optional If the third-party seller sells to multiple
retailer ecommerce sites
siteA Boolean Optional Indicator of product’s applicability to a
site
attrName Array Optional Any additional attributes (ageGroup,
etc.) can be sent in the form of
" attrName": ["attrValue"]
childSkus Array Optional Each childSku represents a sku.
ChildSku individual object will look
like the base product object
```

