---
title: "Ad Library API"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: The Ad Library is a public transparency tool that allows you to view all ads shown on Bing.com.
---

# Ad Library API Overview

The Ad Library is a public transparency tool that allows you to view all ads shown on Bing.com. You can search for ads by advertiser name and keywords present in the ad copy, and you will see both the ad content and additional ad details. The ad library is part of a compliance effort to ensure we are creating a safe and open internet for our users. 

## <a name="get-started"></a>Get Started with the Ad Library API

To use the Ad Library API, you'll need:

1. A Microsoft account
2. A Microsoft Advertising account
3. A developer token

To get a Microsoft Advertising account, go to [https://ads.microsoft.com](https://ads.microsoft.com/). If you're not signed in to your Microsoft account, you're redirected to sign in to your account or to sign up for one. After signing in, you'll have the option to Sign up for a new Microsoft Advertising account. Select the sign up option and select Continue.

### <a name="authenticate"></a>Authenticating your credentials

Ad Library API uses the same authentication schemes as Bing Ads API. For details about authenticating Microsoft account credentials with OAuth, see [Authentication with the Microsoft identity platform](https://learn.microsoft.com/en-us/advertising/guides/authentication-oauth-identity-platform).

You can use the [Bing Ads SDK](https://learn.microsoft.com/en-us/advertising/guides/client-libraries) for .NET, Java, or Python to authenticate Microsoft account credentials. For details about using the SDK to get the access token, see [C#](https://learn.microsoft.com/en-us/advertising/guides/get-started-csharp) | [Java](https://learn.microsoft.com/en-us/advertising/guides/get-started-java) | [Python](https://learn.microsoft.com/en-us/advertising/guides/get-started-python).

*Note*: The Bing Ads SDK does not provide interfaces for Ad Library API. You should only use the SDK to get the access token if you're using the SDK for Microsoft Advertising campaigns, too. Otherwise, it may not be worth the overhead of installing the SDK.

If you don't use the Bing Ads SDK for authentication, see [Authenticating Microsoft Account Credentials in C#](https://learn.microsoft.com/en-us/advertising/shopping-content/code-example-authentication-oauth) for an example that shows how to use OAuth to authenticate Microsoft account credentials.

### <a name="credentials"></a>Where to use your credentials and developer tokens?

All calls must specify:

- The DeveloperToken header that's set to your developer token.
- The AuthenticationToken header that's set to your access token.

For information about these and other headers that the request and response may contain, see Headers.

## <a name="resource"></a>Ad Library API Resource

### <a name="base-uri"></a>Base URI

The following is the base URI that you append the templates to:

https://adlibrary.api.bingads.microsoft.com/api/v1/

### <a name="templates"></a>Templates

To create the endpoints used to query the Ad Library, append the appropriate template to the base URL:

| Template | HTTP Verb | Description | Resource
| ----------- | ----- | ------------------------- | -------------- |
| Advertisers | Get | Get Advertisers by Name<br/><br/>Parameters:<br/>- top (int32, default 3)<br/>- skip (int32, default 0)<br/>- searchText (string, default “”) | Array\<Advertiser> |
| Advertisers({AdvertiserId})<br/>or<br/>Advertisers/{AdvertiserId} | Get | Get Advertiser by Id<br/><br/>Parameters: none<br/><br/>*Note*: AdvertiserId may be an AccountId or VerifiedAdvertiserId. Multiple accounts may be verified under the same identity. If a verified AccountId is requested the parent VerifiedAdvertiserId will be returned instead. | Advertiser |
| Ads  | Get | Get Ads by Advertiser/Content<br/><br/>Parameters:<br/>• top (int32, default 12)<br/>• skip (int64, default 0)<br/>• startDate (string)<br/>• endDate (string)<br/>    • Dates in format ‘yyyy-MM-dd’<br/>• countryCodes (string)<br/><br/>Comma separated values, i.e. ’10,26,53’<br/>• advertiserId (int64)<br/>• searchText (string) | Array\<Ad> |
Ads({AdId})<br/>or<br/>Ads/{AdId} | Get | Get Ad by Id<br/><br/>Parameters: none | Ad |

### <a name="data-objects"></a>Data Objects

The following are the request and response objects used by the API:

| Object | Description |
| ----------- | ------------------------- |
| Advertiser | Defines an advertiser. |
| Ad | Defines an ad. |
| AdDetails | Defines additional details about an ad. |
| CountryImpressionShare | Defines ad impression share for a country. |
| TargetTypeDetails | Defines details about target types used by an ad. |

#### <a name="advertiser"></a>Advertiser

Defines an advertiser.

| Name | Value | Type |
| ----------- | ------------------------- | ------------ |
AdvertiserId | The ID identifying the advertiser.<br/><br/>*Note*: This may be an AccountId or a VerifiedAdvertiserId if the advertiser is verified. VerifiedAdvertiserIds may cover multiple accounts if the are verified under the same advertiser, and a request for an AccountId which has been verified will instead return the parent VerifiedAdvertiserId. | Long |
| AdvertiserName | The name of the account or legal name of a verified advertiser. | String |
| AdvertiserCountry | The country where the advertiser is registered. | String |
| IsVerified | A Boolean value representing whether the advertiser is verified. | Boolean |

#### <a name="ad"></a>Ad

Defines an ad.

| Name | Value | Type |
| ----------- | ------------------------- | ------------ |
| AdId | The ID identifying the ad. | Long |
| AdvertiserName | The name of the account or legal name of a verified advertiser. | String |
| AdvertiserId | The ID identifying the advertiser. | Long |
| Title | The title portion of the ad copy.<br/><br/>*Note*: For dynamic ad types, there may be multiple variations and the title, description, URLs, and assets may just be a recent, representative version from when the ad last served. | String |
| Description | The description portion of the ad copy. | String |
| DisplayUrl | The URL displayed by the ad, or the merchant name for certain ad types. | String |
| DestinationUrl | The actual URL linked to by the ad. | String |
| AssetJson | A JSON URL of the asset resource | String |
| AdDetails | An object containing additional details about an ad. | AdDetails |

#### <a name="addetails"></a>AdDetails

Defines additional details for an ad.

| Name | Value | Type |
| ----------- | -------------------------------- | ------------ |
| PaidForByName | The name of the customer who paid for the ad if different than the account owner. | String |
| StartDate | The UTC date when the ad first ran, or when the first eligible impression was recorded by the Ad Library.<br/><br/>Note: The Ad Library only records ads impressions in the European Union (EU) or European Economic Area (EEA) since June 2023. The actual start date of an ad may predate the launch of our Ad Library or the date when the ad received its first eligible impression. | String |
| EndDate | The UTC date when the ad last ran, or when the last eligible impression was recorded by the Ad Library.<br/><br/>*Note*: In addition to the above note, there may be a 1-3 day delay in information appearing in the Ad Library, so the EndDate may not reflect newer impressions shown in the last few days if an ad is still active. | String |
| TotalImpressionsRange | A range representing the total number of impressions the ad has received in the EU and EEA. | String
| ImpressionsByCountry | A list of key-value pairs representing the percentage share of impressions for each EU or EEA member country. | array\<CountryImpressionShareObject> |
| TargetTypes | A list of target types used for ad targeting, and whether they were also used for exclusion.<br/><br/>*Note*: This is an aggregate list of all target types used at any point during the ad run for all eligible impressions and may not necessarily indicate which factors were used for a specific impression. | array\<TargetTypeDetails> |
| RestrictionReason | If present, the reason an ad has been restricted from serving further or displaying in the Ad Library. | RestrictionReason

#### <a name="countryimpressionshare"></a>CountryImpressionShare

Defines an ad’s impression share for a given country.

| Name | Value | Type |
| ----------- | -------------------------------- | ------------ |
| Country | A country where the ad was shown. | Country |
| ImpressionShare | The share of the ad’s impressions for the country, represented as a percentage (i.e., 17.3%). | String |

#### <a name="targetdetails"></a>TargetDetails

Defines an ad’s impression share for a given country.

| Name | Value | Type |
| ----------- | -------------------------------- | ------------ |
| TargetType | The parameter used for targeting. | TargetType |
| UsedForExclusion | Denotes if the target type was also used for exclusion.  | Boolean |

### <a name="value-sets"></a>Value Sets

The following are the value sets used by the API.

| Object | Description |
| ----------- | -------------------------------- |
| Country | Defines the values of countries considered by the Ad Library for filtering and reporting ad impressions. |
| TargetType | Defines the types of targeting parameters tracked by the Ad Library. |
| RestrictionReason | Defines the reason an ad has been restricted from serving further or displaying in the Ad Library. |

#### <a name="country"></a>Country

Defines the values of European Union countries and members of the European Economic Area considered by the Ad Library for filtering and reporting ad impressions.

| Name | Value |
| -------- | ----------- |
| Austria | 10 |
| Belgium | 14 |
| Bulgaria | 26 |
| Croatia | 49 |
| Cyprus | 207 |
| Czechia | 51 |
| Denmark | 53 |
| Estonia | 61 |
| Finland | 65 |
| France | 66 |
| Germany | 72 |
| Greece | 76 |
| Hungary | 88 |
| Ireland | 92 |
| Italy | 93 |
| Latvia | 104 |
| Lithuania | 108 |
| Luxembourg | 109 |
| Malta | 115 |
| Netherlands | 129 |
| Poland | 151 |
| Portugal | 152 |
| Romania | 226 |
| Slovakia | 165 |
| Slovenia | 167 |
| Spain | 170 |
| Sweden | 175 |
| Iceland | 89 |
| Liechtenstein | 107 |
| Norway | 139 |

#### <a name="targetype"></a>TargetType

Defines the types of targeting parameters tracked by the Ad Library.

| Name | Value | Description |
| -------- | ----------- | ----------- |
| Gender | 1 | Targeting based on gender. |
| Age | 2 | Targeting based on age group. |
| Location | 3 | Targeting based on geographic areas users are located in or searching for. |
| MicrosoftAudiences | 22 | Targeting based on Microsoft-defined audiences including in-market audiences, similar audiences, and LinkedIn profile targeting. |
| AdvertiserAudiences | 25 | Targeting based on Advertiser-defined audiences including custom audiences, customer match lists, and remarketing lists. |

#### <a name="restrictionreason"></a>RestrictionReason

Defines the reason an ad has been restricted from serving further or displaying in the Ad Library.

| Name | Value | Description |
| -------- | ----------- | ----------- |
| ThirdPartyGov | 26 | [Government services and products](https://about.ads.microsoft.com/en-us/policies/restricted-categories/government-services-and-products) |
| Adult_Disallowed | 27 | [Adult content policies](https://about.ads.microsoft.com/en-us/policies/restricted-categories/adult-content) |
| Alcohol | 28 | [Alcohol](https://about.ads.microsoft.com/en-us/policies/restricted-categories/alcohol) |
| Counterfeit | 29 | [Intellectual property policies](https://about.ads.microsoft.com/en-us/policies/intellectual-property-policies) |
| Deceptive | 30 | [Deceptive products and services](https://about.ads.microsoft.com/en-us/policies/disallowed-content/deceptive-products-and-services) |
| Deceptive_Fundraising | 31 | [Solicitation of funds and fundraising](https://about.ads.microsoft.com/en-us/policies/restricted-categories/solicitation-of-funds) |
| Disallowed_Substances | 32 | [Drugs and related paraphernalia](https://about.ads.microsoft.com/en-us/policies/disallowed-content/drugs-and-related-paraphernalia) |
| Endangered_Species | 34 | [Endangered species products or services](https://about.ads.microsoft.com/en-us/policies/disallowed-content/endangered-threatened-species-products-services) |
| Finance | 35 | [Financial products and services policies](https://about.ads.microsoft.com/en-us/policies/restricted-categories/finance) |
| Finance_Disallowed | 36 | [Financial products and services policies](https://about.ads.microsoft.com/en-us/policies/restricted-categories/finance) |
| Fireworks_Explosives | 37 | [Fireworks and explosives](https://about.ads.microsoft.com/en-us/policies/disallowed-content/fireworks-and-explosives) |
| Malware | 38 | TBD |
| Download_Bundling_Functionality | 39 | [Software and downloads policies](https://about.ads.microsoft.com/en-us/policies/restricted-categories/software-freeware-shareware#bundling-functionality) |
| Software_Disallowed_Behaviors | 40 | TBD |
| Malware_Malicious_Software | 41 | TBD |
| Download_Uninstall_Functionality | 42 | [Software and downloads policies](https://about.ads.microsoft.com/en-us/policies/restricted-categories/software-freeware-shareware#bundling-functionality) |
| Download_Update_Functionality | 43 | [Software and downloads policies](https://about.ads.microsoft.com/en-us/policies/restricted-categories/software-freeware-shareware#bundling-functionality) |
| Download_Disclosures | 44 | [Software and downloads policies](https://about.ads.microsoft.com/en-us/policies/restricted-categories/software-freeware-shareware#bundling-functionality) |
| Download_User_Choice_Control | 45 | [Software and downloads policies](https://about.ads.microsoft.com/en-us/policies/restricted-categories/software-freeware-shareware#bundling-functionality) |
| Download_Offer | 46 | [Software and downloads policies](https://about.ads.microsoft.com/en-us/policies/restricted-categories/software-freeware-shareware#bundling-functionality) |
| Merchant_Checkout_Security | 47 | [Product ads policies](https://about.ads.microsoft.com/en-us/policies/product-ads-policies) |
| Merchant_Description_Conditions | 48 | [Product ads policies](https://about.ads.microsoft.com/en-us/policies/product-ads-policies) |
| Misleading | 49 | [Misleading messaging content or images](https://about.ads.microsoft.com/en-us/policies/disallowed-content/misleading-messaging-content-images) |
| Information_Integrity | 50 | [Misleading messaging content or images](https://about.ads.microsoft.com/en-us/policies/disallowed-content/misleading-messaging-content-images) |
| Misleading_Unsubstantiated | 51 | [Misleading messaging content or images](https://about.ads.microsoft.com/en-us/policies/disallowed-content/misleading-messaging-content-images) |
| Non_Indexed_Sites | 52 | [Usenet](https://about.ads.microsoft.com/en-us/policies/disallowed-content/usenet) |
| Offensive_Controversial | 53 | [Offensive and controversial content](https://about.ads.microsoft.com/en-us/policies/disallowed-content/offensive-controversial-content) |
| Offensive_Defamatory | 54 | [Offensive and controversial content](https://about.ads.microsoft.com/en-us/policies/disallowed-content/offensive-controversial-content) |
| Offensive_Hate_Speech | 55 | [Offensive and controversial content](https://about.ads.microsoft.com/en-us/policies/disallowed-content/offensive-controversial-content) |
| Pharma | 56 | [Pharmacy and healthcare products and services policies](https://about.ads.microsoft.com/en-us/policies/restricted-categories/pharmacy-and-healthcare-products-and-services) |
| Phishing | 57 | TBD |
| Piracy | 58 | [Peer to peer file sharing](https://about.ads.microsoft.com/en-us/policies/disallowed-content/peer-to-peer-file-sharing) |
| Pricing | 59 | [Pricing](https://about.ads.microsoft.com/en-us/policies/restricted-categories/pricing#free-offers-and-price-promises) |
| Questionable_Legality | 60 | [Areas of questionable legality](https://about.ads.microsoft.com/en-us/policies/disallowed-content/areas-of-questionable-legality) |
| Refund_Security | 61 | TBD |
| Relevance_Quality_Fake_News | 62 | [Relevance and quality policies](https://about.ads.microsoft.com/en-us/policies/relevance-and-quality#ad-copy) |
| Relevance_Quality_Low_Quality | 63 | [Relevance and quality policies](https://about.ads.microsoft.com/en-us/policies/relevance-and-quality#ad-copy) |
| Relevance_Quality_LP_URL | 64 | [Relevance and quality policies](https://about.ads.microsoft.com/en-us/policies/relevance-and-quality#ad-copy) |
| Relevance_Quality_Site_Quality | 65 | [Relevance and quality policies](https://about.ads.microsoft.com/en-us/policies/relevance-and-quality#ad-copy) |
| Scams_Schemes | 66 | [Financial products and services policies](https://about.ads.microsoft.com/en-us/policies/restricted-categories/finance) |
| Suffering_Violence | 67 | [Offensive and controversial content](https://about.ads.microsoft.com/en-us/policies/disallowed-content/offensive-controversial-content) |
| Surveillance | 68 | [Spy cams and surveillance equipment](https://about.ads.microsoft.com/en-us/policies/restricted-categories/spy-cams-or-surveillance-equipment) |
| Targeting_Minors | 69 | [Legal, privacy and security policies](https://about.ads.microsoft.com/en-us/policies/legal-privacy-and-security) |
| BingAdsEmbargo_Policy_Reject_Terminate | 70 | [Legal, privacy and security policies](https://about.ads.microsoft.com/en-us/policies/legal-privacy-and-security) |
| Trade | 70 | [Legal, privacy and security policies](https://about.ads.microsoft.com/en-us/policies/legal-privacy-and-security) |
| Trafficking | 71 | [Trafficking or exploitation](https://about.ads.microsoft.com/en-us/policies/disallowed-content/trafficking-or-exploitation) |
| Weapons | 72 | [Weapons, knives, firearms and ammunition](https://about.ads.microsoft.com/en-us/policies/restricted-categories/weapons-knives-firearms-ammunition) |
| Weight_Loss_Products | 73 | [Pharmacy and healthcare products and services policies](https://about.ads.microsoft.com/en-us/policies/restricted-categories/pharmacy-and-healthcare-products-and-services) |
| Compliance_Regulation | 82 | [Areas of questionable legality](https://about.ads.microsoft.com/en-us/policies/disallowed-content/areas-of-questionable-legality) |
| Temp_Hold | 84 | [Relevance and quality policies](https://about.ads.microsoft.com/en-us/policies/relevance-and-quality#ad-copy) |
| Temp_Hold_Store | 85 | [Relevance and quality policies](https://about.ads.microsoft.com/en-us/policies/relevance-and-quality#ad-copy) |
| Store_Checkout_Security | 88 | [Product ads policies](https://about.ads.microsoft.com/en-us/policies/product-ads-policies) |
| Store_Description_and_Condition | 89 | [Product ads policies](https://about.ads.microsoft.com/en-us/policies/product-ads-policies) |
| Store_Disallowed | 90 | [Product ads policies](https://about.ads.microsoft.com/en-us/policies/product-ads-policies) |
| Store_Images | 91 | [Product ads policies](https://about.ads.microsoft.com/en-us/policies/product-ads-policies) |
| Store_Intellectual_Property | 92 | [Product ads policies](https://about.ads.microsoft.com/en-us/policies/product-ads-policies) |
| Store_Restricted | 124 | [Product ads policies](https://about.ads.microsoft.com/en-us/policies/product-ads-policies) |
| Store_Privacy_Policy | 125 | [Legal, privacy and security policies](https://about.ads.microsoft.com/en-us/policies/legal-privacy-and-security) |
| Privacy_PII | 126 | [Legal, privacy and security policies](https://about.ads.microsoft.com/en-us/policies/legal-privacy-and-security) |
| Malware_UwS | 127 | TBD |
| Download_Cloaking_Behaviors | 128 | TBD |
| Download_Disallowed_Cleaners_Behaviors | 129 | TBD |
| Ad_Functionality | 130 | [Text and ad style guidelines and policies](https://about.ads.microsoft.com/en-us/policies/text-guidelines#ad-functionality) |

## Easiest Account Sign-Up Steps

If you are a researcher or regulator who wants to access the Ad Library API, but you don’t already have a Microsoft Advertising Account or wish to advertise on our platform, complete the following steps:

1. Visit [https://ads.microsoft.com/](https://ads.microsoft.com/) and select **Sign up now**.
![Ad Library API Sign-up Step 1](media/ad-library-api-sign-up-step-1.png "Step 1")  

2. Sign in with an existing Microsoft account or select **Create one!**
![Ad Library API Sign-up Step 2](media/ad-library-api-sign-up-step-2.png "Step 2")  

3. Use an existing email address or phone number, or select **Get a new email address**.
![Ad Library API Sign-up Step 3](media/ad-library-api-sign-up-step-3.png "Step 3")  
Enter the above info if you are creating a new email address (email address, password, first/last name, country/region, and birthdate) and solve captcha if necessary.

4. To skip through the setup as fast as possible, select **Create new campaign** and then **Switch to expert**.
![Ad Library API Sign-up Step 4a](media/ad-library-api-sign-up-step-4a.png "Step 4a")  
![Ad Library API Sign-up Step 4b](media/ad-library-api-sign-up-step-4b.png "Step 4b")  

5. Select **Skip campaign creation** to set up an account without a campaign.
![Ad Library API Sign-up Step 5](media/ad-library-api-sign-up-step-5.png "Step 5")  

6. At this point, an account has been created and no further information is needed.
![Ad Library API Sign-up Step 6](media/ad-library-api-sign-up-step-6.png "Step 6")  

You can now proceed to [Developer Account](https://developers.ads.microsoft.com/Account) to request a token for accessing the API. As part of this, you’ll need to review our [Developer Terms of Use](https://www.microsoft.com/en-us/legal/terms-of-use).
