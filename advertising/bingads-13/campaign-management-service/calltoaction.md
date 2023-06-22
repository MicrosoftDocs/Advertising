---
title: CallToAction Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the possible values for a brief, punchy reason for customers to click your ad right now.
---
# CallToAction Value Set - Campaign Management
Defines the possible values for a brief, punchy reason for customers to click your ad right now.

Each of the values correspond to a friendly and readable call to action in a responsive ad. 

## Syntax
```xml
<xs:simpleType name="CallToAction" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Unknown" />
    <xs:enumeration value="ActNow" />
    <xs:enumeration value="ApplyNow" />
    <xs:enumeration value="BetNow" />
    <xs:enumeration value="BidNow" />
    <xs:enumeration value="BookACar" />
    <xs:enumeration value="BookHotel" />
    <xs:enumeration value="BookNow" />
    <xs:enumeration value="Browse" />
    <xs:enumeration value="BuyNow" />
    <xs:enumeration value="ChatNow" />
    <xs:enumeration value="Compare" />
    <xs:enumeration value="ContactUs" />
    <xs:enumeration value="Coupon" />
    <xs:enumeration value="Donate" />
    <xs:enumeration value="Download" />
    <xs:enumeration value="EmailNow" />
    <xs:enumeration value="EnrollNow" />
    <xs:enumeration value="Explore" />
    <xs:enumeration value="FileNow" />
    <xs:enumeration value="FindJob" />
    <xs:enumeration value="FreePlay" />
    <xs:enumeration value="FreeQuote" />
    <xs:enumeration value="FreeTrial" />
    <xs:enumeration value="GetDeals" />
    <xs:enumeration value="GetOffer" />
    <xs:enumeration value="GetQuote" />
    <xs:enumeration value="JoinNow" />
    <xs:enumeration value="LearnMore" />
    <xs:enumeration value="ListenNow" />
    <xs:enumeration value="LogIn" />
    <xs:enumeration value="Message" />
    <xs:enumeration value="NewCars" />
    <xs:enumeration value="OrderNow" />
    <xs:enumeration value="PlayGame" />
    <xs:enumeration value="PlayNow" />
    <xs:enumeration value="PostJob" />
    <xs:enumeration value="Register" />
    <xs:enumeration value="RentACar" />
    <xs:enumeration value="RentNow" />
    <xs:enumeration value="Reserve" />
    <xs:enumeration value="Sale" />
    <xs:enumeration value="SaveNow" />
    <xs:enumeration value="Schedule" />
    <xs:enumeration value="SeeMenu" />
    <xs:enumeration value="SeeMore" />
    <xs:enumeration value="SeeOffer" />
    <xs:enumeration value="SellNow" />
    <xs:enumeration value="ShopNow" />
    <xs:enumeration value="Showtimes" />
    <xs:enumeration value="SignIn" />
    <xs:enumeration value="SignUp" />
    <xs:enumeration value="StartFree" />
    <xs:enumeration value="StartNow" />
    <xs:enumeration value="Subscribe" />
    <xs:enumeration value="TestDrive" />
    <xs:enumeration value="TryNow" />
    <xs:enumeration value="UsedCars" />
    <xs:enumeration value="ViewCars" />
    <xs:enumeration value="ViewNow" />
    <xs:enumeration value="ViewPlans" />
    <xs:enumeration value="VisitSite" />
    <xs:enumeration value="VoteNow" />
    <xs:enumeration value="Watch" />
    <xs:enumeration value="WatchMore" />
    <xs:enumeration value="WatchNow" />
    <xs:enumeration value="Directions" />
    <xs:enumeration value="FindStore" />
    <xs:enumeration value="SwitchNow" />
    <xs:enumeration value="VisitStore" />
    <xs:enumeration value="RenewNow" />
    <xs:enumeration value="Reorder" />
    <xs:enumeration value="Default" />
    <xs:enumeration value="NoButton" />
    <xs:enumeration value="Install" />
    <xs:enumeration value="AddToCart" />
    <xs:enumeration value="BookTravel" />
    <xs:enumeration value="Buy" />
    <xs:enumeration value="OpenLink" />
    <xs:enumeration value="RegisterNow" />
    <xs:enumeration value="BuildNow" />
    <xs:enumeration value="Dealers" />
    <xs:enumeration value="GetDemo" />
    <xs:enumeration value="GetNow" />
    <xs:enumeration value="GoToDemo" />
    <xs:enumeration value="SeeDemo" />
    <xs:enumeration value="SeeModels" />
    <xs:enumeration value="SeeOffers" />
    <xs:enumeration value="ViewDemo" />
    <xs:enumeration value="Automated">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">100</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [CallToAction](calltoaction.md) value set has the following values: [ActNow](#actnow), [AddToCart](#addtocart), [ApplyNow](#applynow), [Automated](#automated), [BetNow](#betnow), [BidNow](#bidnow), [BookACar](#bookacar), [BookHotel](#bookhotel), [BookNow](#booknow), [BookTravel](#booktravel), [Browse](#browse), [BuildNow](#buildnow), [Buy](#buy), [BuyNow](#buynow), [ChatNow](#chatnow), [Compare](#compare), [ContactUs](#contactus), [Coupon](#coupon), [Dealers](#dealers), [Default](#default), [Directions](#directions), [Donate](#donate), [Download](#download), [EmailNow](#emailnow), [EnrollNow](#enrollnow), [Explore](#explore), [FileNow](#filenow), [FindJob](#findjob), [FindStore](#findstore), [FreePlay](#freeplay), [FreeQuote](#freequote), [FreeTrial](#freetrial), [GetDeals](#getdeals), [GetDemo](#getdemo), [GetNow](#getnow), [GetOffer](#getoffer), [GetQuote](#getquote), [GoToDemo](#gotodemo), [Install](#install), [JoinNow](#joinnow), [LearnMore](#learnmore), [ListenNow](#listennow), [LogIn](#login), [Message](#message), [NewCars](#newcars), [NoButton](#nobutton), [OpenLink](#openlink), [OrderNow](#ordernow), [PlayGame](#playgame), [PlayNow](#playnow), [PostJob](#postjob), [Register](#register), [RegisterNow](#registernow), [RenewNow](#renewnow), [RentACar](#rentacar), [RentNow](#rentnow), [Reorder](#reorder), [Reserve](#reserve), [Sale](#sale), [SaveNow](#savenow), [Schedule](#schedule), [SeeDemo](#seedemo), [SeeMenu](#seemenu), [SeeModels](#seemodels), [SeeMore](#seemore), [SeeOffer](#seeoffer), [SeeOffers](#seeoffers), [SellNow](#sellnow), [ShopNow](#shopnow), [Showtimes](#showtimes), [SignIn](#signin), [SignUp](#signup), [StartFree](#startfree), [StartNow](#startnow), [Subscribe](#subscribe), [SwitchNow](#switchnow), [TestDrive](#testdrive), [TryNow](#trynow), [Unknown](#unknown), [UsedCars](#usedcars), [ViewCars](#viewcars), [ViewDemo](#viewdemo), [ViewNow](#viewnow), [ViewPlans](#viewplans), [VisitSite](#visitsite), [VisitStore](#visitstore), [VoteNow](#votenow), [Watch](#watch), [WatchMore](#watchmore), [WatchNow](#watchnow).

|Value|Description|
|-----------|---------------|
|<a name="actnow"></a>ActNow|The corresponding call to action in the ad.|
|<a name="addtocart"></a>AddToCart|The corresponding call to action in the ad.|
|<a name="applynow"></a>ApplyNow|The corresponding call to action in the ad.|
|<a name="automated"></a>Automated|The corresponding call to action in the ad.|
|<a name="betnow"></a>BetNow|The corresponding call to action in the ad.|
|<a name="bidnow"></a>BidNow|The corresponding call to action in the ad.|
|<a name="bookacar"></a>BookACar|The corresponding call to action in the ad.|
|<a name="bookhotel"></a>BookHotel|The corresponding call to action in the ad.|
|<a name="booknow"></a>BookNow|The corresponding call to action in the ad.|
|<a name="booktravel"></a>BookTravel|The corresponding call to action in the ad.|
|<a name="browse"></a>Browse|Use the *LearnMore* call to action in the ad.<br/><br/>This value is deprecated as of September 2022 and replaced by [LearnMore](#learnmore). If you set the call to action to *Browse* no error will be returned, but [LearnMore](#learnmore) is the effective value that will be stored and returned when retrieving the call to action.|
|<a name="buildnow"></a>BuildNow|The corresponding call to action in the ad.|
|<a name="buy"></a>Buy|The corresponding call to action in the ad.|
|<a name="buynow"></a>BuyNow|The corresponding call to action in the ad.|
|<a name="chatnow"></a>ChatNow|The corresponding call to action in the ad.|
|<a name="compare"></a>Compare|The corresponding call to action in the ad.|
|<a name="contactus"></a>ContactUs|The corresponding call to action in the ad.|
|<a name="coupon"></a>Coupon|Use the *GetCoupon* call to action in the ad.<br/><br/>This value is deprecated as of September 2022 and replaced by *GetCoupon*. If you set the call to action to *Coupon* no error will be returned, but *GetCoupon* is the effective value that will be stored and returned when retrieving the call to action.|
|<a name="dealers"></a>Dealers|The corresponding call to action in the ad.|
|<a name="default"></a>Default|The corresponding call to action in the ad.|
|<a name="directions"></a>Directions|The corresponding call to action in the ad.|
|<a name="donate"></a>Donate|The corresponding call to action in the ad.|
|<a name="download"></a>Download|The corresponding call to action in the ad.|
|<a name="emailnow"></a>EmailNow|The corresponding call to action in the ad.|
|<a name="enrollnow"></a>EnrollNow|The corresponding call to action in the ad.|
|<a name="explore"></a>Explore|Use the *LearnMore* call to action in the ad.<br/><br/>This value is deprecated as of September 2022 and replaced by [LearnMore](#learnmore). If you set the call to action to *Explore* no error will be returned, but [LearnMore](#learnmore) is the effective value that will be stored and returned when retrieving the call to action.|
|<a name="filenow"></a>FileNow|The corresponding call to action in the ad.|
|<a name="findjob"></a>FindJob|The corresponding call to action in the ad.|
|<a name="findstore"></a>FindStore|The corresponding call to action in the ad.|
|<a name="freeplay"></a>FreePlay|The corresponding call to action in the ad.|
|<a name="freequote"></a>FreeQuote|The corresponding call to action in the ad.|
|<a name="freetrial"></a>FreeTrial|The corresponding call to action in the ad.|
|<a name="getdeals"></a>GetDeals|The corresponding call to action in the ad.|
|<a name="getdemo"></a>GetDemo|The corresponding call to action in the ad.|
|<a name="getnow"></a>GetNow|The corresponding call to action in the ad.|
|<a name="getoffer"></a>GetOffer|The corresponding call to action in the ad.|
|<a name="getquote"></a>GetQuote|The corresponding call to action in the ad.|
|<a name="gotodemo"></a>GoToDemo|The corresponding call to action in the ad.|
|<a name="install"></a>Install|The corresponding call to action in the ad.|
|<a name="joinnow"></a>JoinNow|The corresponding call to action in the ad.|
|<a name="learnmore"></a>LearnMore|The corresponding call to action in the ad.|
|<a name="listennow"></a>ListenNow|The corresponding call to action in the ad.|
|<a name="login"></a>LogIn|The corresponding call to action in the ad.|
|<a name="message"></a>Message|Use the *ContactUs* call to action in the ad.<br/><br/>This value is deprecated as of September 2022 and replaced by [ContactUs](#contactus). If you set the call to action to *Message* no error will be returned, but [ContactUs](#contactus) is the effective value that will be stored and returned when retrieving the call to action.|
|<a name="newcars"></a>NewCars|Use the *ViewCars* call to action in the ad.<br/><br/>This value is deprecated as of September 2022 and replaced by [ViewCars](#viewcars). If you set the call to action to *NewCars* no error will be returned, but [ViewCars](#viewcars) is the effective value that will be stored and returned when retrieving the call to action.|
|<a name="nobutton"></a>NoButton|The corresponding call to action in the ad.|
|<a name="openlink"></a>OpenLink|The corresponding call to action in the ad.|
|<a name="ordernow"></a>OrderNow|The corresponding call to action in the ad.|
|<a name="playgame"></a>PlayGame|The corresponding call to action in the ad.|
|<a name="playnow"></a>PlayNow|The corresponding call to action in the ad.|
|<a name="postjob"></a>PostJob|The corresponding call to action in the ad.|
|<a name="register"></a>Register|The corresponding call to action in the ad.|
|<a name="registernow"></a>RegisterNow|The corresponding call to action in the ad.|
|<a name="renewnow"></a>RenewNow|The corresponding call to action in the ad.|
|<a name="rentacar"></a>RentACar|The corresponding call to action in the ad.|
|<a name="rentnow"></a>RentNow|The corresponding call to action in the ad.|
|<a name="reorder"></a>Reorder|The corresponding call to action in the ad.|
|<a name="reserve"></a>Reserve|The corresponding call to action in the ad.|
|<a name="sale"></a>Sale|Use the *SeeSale* call to action in the ad.<br/><br/>This value is deprecated as of September 2022 and replaced by *SeeSale*. If you set the call to action to *Sale* no error will be returned, but *SeeSale* is the effective value that will be stored and returned when retrieving the call to action.|
|<a name="savenow"></a>SaveNow|The corresponding call to action in the ad.|
|<a name="schedule"></a>Schedule|The corresponding call to action in the ad.|
|<a name="seedemo"></a>SeeDemo|The corresponding call to action in the ad.|
|<a name="seemenu"></a>SeeMenu|The corresponding call to action in the ad.|
|<a name="seemodels"></a>SeeModels|The corresponding call to action in the ad.|
|<a name="seemore"></a>SeeMore|Use the *LearnMore* call to action in the ad.<br/><br/>This value is deprecated as of September 2022 and replaced by [LearnMore](#learnmore). If you set the call to action to *SeeMore* no error will be returned, but [LearnMore](#learnmore) is the effective value that will be stored and returned when retrieving the call to action.|
|<a name="seeoffer"></a>SeeOffer|The corresponding call to action in the ad.|
|<a name="seeoffers"></a>SeeOffers|The corresponding call to action in the ad.|
|<a name="sellnow"></a>SellNow|The corresponding call to action in the ad.|
|<a name="shopnow"></a>ShopNow|The corresponding call to action in the ad.|
|<a name="showtimes"></a>Showtimes|The corresponding call to action in the ad.|
|<a name="signin"></a>SignIn|The corresponding call to action in the ad.|
|<a name="signup"></a>SignUp|The corresponding call to action in the ad.|
|<a name="startfree"></a>StartFree|Use the *FreeTrial* call to action in the ad.<br/><br/>This value is deprecated as of September 2022 and replaced by [FreeTrial](#freetrial). If you set the call to action to *StartFree* no error will be returned, but [FreeTrial](#freetrial) is the effective value that will be stored and returned when retrieving the call to action.|
|<a name="startnow"></a>StartNow|The corresponding call to action in the ad.|
|<a name="subscribe"></a>Subscribe|The corresponding call to action in the ad.|
|<a name="switchnow"></a>SwitchNow|The corresponding call to action in the ad.|
|<a name="testdrive"></a>TestDrive|The corresponding call to action in the ad.|
|<a name="trynow"></a>TryNow|The corresponding call to action in the ad.|
|<a name="unknown"></a>Unknown|The corresponding call to action in the ad.|
|<a name="usedcars"></a>UsedCars|Use the *ViewCars* call to action in the ad.<br/><br/>This value is deprecated as of September 2022 and replaced by [ViewCars](#viewcars). If you set the call to action to *UsedCars* no error will be returned, but [ViewCars](#viewcars) is the effective value that will be stored and returned when retrieving the call to action.|
|<a name="viewcars"></a>ViewCars|The corresponding call to action in the ad.|
|<a name="viewdemo"></a>ViewDemo|The corresponding call to action in the ad.|
|<a name="viewnow"></a>ViewNow|The corresponding call to action in the ad.|
|<a name="viewplans"></a>ViewPlans|The corresponding call to action in the ad.|
|<a name="visitsite"></a>VisitSite|The corresponding call to action in the ad.|
|<a name="visitstore"></a>VisitStore|The corresponding call to action in the ad.|
|<a name="votenow"></a>VoteNow|The corresponding call to action in the ad.|
|<a name="watch"></a>Watch|The corresponding call to action in the ad.|
|<a name="watchmore"></a>WatchMore|The corresponding call to action in the ad.|
|<a name="watchnow"></a>WatchNow|The corresponding call to action in the ad.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AssetGroup](assetgroup.md)  
[ResponsiveAd](responsivead.md)  
