---
title: PromotionOccasion Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the possible types of promotion occasions.
---
# PromotionOccasion Value Set - Campaign Management
Defines the possible types of promotion occasions.

Both the [PromotionOccasion](promotionadextension.md#promotionoccasion) and [Scheduling](promotionadextension.md#scheduling) elements determine when the promotion is eligible to be shown in ads.

The [PromotionOccasion](promotionadextension.md#promotionoccasion) determines the time period or seasonality e.g., [WomensDay](#womensday) from February 15 through March 31 each year. The promotion will only run within the dates corresponding to the occasion that you set. See [PromotionOccasion](promotionoccasion.md) for details about the defined date range for each occasion.

The [Scheduling](promotionadextension.md#scheduling) can limit the promotion to a shorter timeframe within the occasion's date range e.g., limit the promotion to run from February 20 through March 8. The [Scheduling](promotionadextension.md#scheduling) can also be used to run the same promotion multiple years e.g., run the [WomensDay](#womensday) promotion every year from February 15 through March 31.

## Syntax
```xml
<xs:simpleType name="PromotionOccasion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Unknown" />
    <xs:enumeration value="NewYears" />
    <xs:enumeration value="ValentinesDay" />
    <xs:enumeration value="Easter" />
    <xs:enumeration value="MothersDay" />
    <xs:enumeration value="FathersDay" />
    <xs:enumeration value="LaborDay" />
    <xs:enumeration value="BackToSchool" />
    <xs:enumeration value="Halloween" />
    <xs:enumeration value="BlackFriday" />
    <xs:enumeration value="CyberMonday" />
    <xs:enumeration value="Christmas" />
    <xs:enumeration value="BoxingDay" />
    <xs:enumeration value="None" />
    <xs:enumeration value="IndependenceDay" />
    <xs:enumeration value="NationalDay" />
    <xs:enumeration value="EndOfSeason" />
    <xs:enumeration value="WinterSale" />
    <xs:enumeration value="SummerSale" />
    <xs:enumeration value="FallSale" />
    <xs:enumeration value="SpringSale" />
    <xs:enumeration value="Ramadan" />
    <xs:enumeration value="EidAlFitr" />
    <xs:enumeration value="EidAlAdha" />
    <xs:enumeration value="SinglesDay" />
    <xs:enumeration value="WomensDay" />
    <xs:enumeration value="Holi" />
    <xs:enumeration value="ParentsDay" />
    <xs:enumeration value="StNicholasDay" />
    <xs:enumeration value="ChineseNewYear" />
    <xs:enumeration value="Carnival" />
    <xs:enumeration value="Epiphany" />
    <xs:enumeration value="RoshHashanah" />
    <xs:enumeration value="Passover" />
    <xs:enumeration value="Hanukkah" />
    <xs:enumeration value="Diwali" />
    <xs:enumeration value="Navratri" />
    <xs:enumeration value="Songkran" />
    <xs:enumeration value="YearEndGift" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [PromotionOccasion](promotionoccasion.md) value set has the following values: [BackToSchool](#backtoschool), [BlackFriday](#blackfriday), [BoxingDay](#boxingday), [Carnival](#carnival), [ChineseNewYear](#chinesenewyear), [Christmas](#christmas), [CyberMonday](#cybermonday), [Diwali](#diwali), [Easter](#easter), [EidAlAdha](#eidaladha), [EidAlFitr](#eidalfitr), [EndOfSeason](#endofseason), [Epiphany](#epiphany), [FallSale](#fallsale), [FathersDay](#fathersday), [Halloween](#halloween), [Hanukkah](#hanukkah), [Holi](#holi), [IndependenceDay](#independenceday), [LaborDay](#laborday), [MothersDay](#mothersday), [NationalDay](#nationalday), [Navratri](#navratri), [NewYears](#newyears), [None](#none), [ParentsDay](#parentsday), [Passover](#passover), [Ramadan](#ramadan), [RoshHashanah](#roshhashanah), [SinglesDay](#singlesday), [Songkran](#songkran), [SpringSale](#springsale), [StNicholasDay](#stnicholasday), [SummerSale](#summersale), [Unknown](#unknown), [ValentinesDay](#valentinesday), [WinterSale](#wintersale), [WomensDay](#womensday), [YearEndGift](#yearendgift).

|Value|Description|
|-----------|---------------|
|<a name="backtoschool"></a>BackToSchool|The "Back to School" promotion can run anytime according to your ad extension scheduling.|
|<a name="blackfriday"></a>BlackFriday|The "Black Friday" promotion can run from October 15 through December 15.|
|<a name="boxingday"></a>BoxingDay|The "Boxing Day" promotion can run from December 15 through January 15.|
|<a name="carnival"></a>Carnival|The "Carnival" promotion can run from February 1 through March 31.|
|<a name="chinesenewyear"></a>ChineseNewYear|The "Chinese New Year" promotion can run from January 15 through March 1.|
|<a name="christmas"></a>Christmas|The "Christmas" promotion can run from November 1 through January 15.|
|<a name="cybermonday"></a>CyberMonday|The "Cyber Monday" promotion can run from October 15 through December 15.|
|<a name="diwali"></a>Diwali|The "Diwali" promotion can run from September 1 through December 1.|
|<a name="easter"></a>Easter|The "Easter" promotion can run from March 1 through April 30.|
|<a name="eidaladha"></a>EidAlAdha|The "Eid al-Adha" promotion can run anytime according to your ad extension scheduling.|
|<a name="eidalfitr"></a>EidAlFitr|The "Eid al-Fitr" promotion can run anytime according to your ad extension scheduling.|
|<a name="endofseason"></a>EndOfSeason|The "End of Season" promotion can run anytime according to your ad extension scheduling.|
|<a name="epiphany"></a>Epiphany|The "Epiphany" promotion can run from December 15 through January 31.|
|<a name="fallsale"></a>FallSale|The "Fall Sale" promotion can run anytime according to your ad extension scheduling.|
|<a name="fathersday"></a>FathersDay|The "Father's Day" promotion can run anytime according to your ad extension scheduling.|
|<a name="halloween"></a>Halloween|The "Halloween" promotion can run from October 1 through November 15.|
|<a name="hanukkah"></a>Hanukkah|The "Hanukkah" promotion can run from November 15 through January 31.|
|<a name="holi"></a>Holi|The "Holi" promotion can run from February 1 through March 31.|
|<a name="independenceday"></a>IndependenceDay|The "Independence Day" promotion can run anytime according to your ad extension scheduling.|
|<a name="laborday"></a>LaborDay|The "Labor Day" promotion can run from April 15 through September 15.|
|<a name="mothersday"></a>MothersDay|The "Mother's Day" promotion can run anytime according to your ad extension scheduling.|
|<a name="nationalday"></a>NationalDay|The "National Day" promotion can run anytime according to your ad extension scheduling.|
|<a name="navratri"></a>Navratri|The "Navratri" promotion can run from September 15 through October 31.|
|<a name="newyears"></a>NewYears|The "New Year's" promotion can run from December 1 through February 28.|
|<a name="none"></a>None|The promotion can run anytime according to your ad extension scheduling.|
|<a name="parentsday"></a>ParentsDay|The "Parent's Day" promotion can run from April 15 through August 1.|
|<a name="passover"></a>Passover|The "Passover" promotion can run from February 15 through May 1.|
|<a name="ramadan"></a>Ramadan|The "Ramadan" promotion can run anytime according to your ad extension scheduling.|
|<a name="roshhashanah"></a>RoshHashanah|The "Rosh Hashanah" promotion can run from August 15 through November 1.|
|<a name="singlesday"></a>SinglesDay|The "Single's Day" promotion can run from October 15 through November 30.|
|<a name="songkran"></a>Songkran|The "Songkran" promotion can run anytime according to your ad extension scheduling.|
|<a name="springsale"></a>SpringSale|The "Spring Sale" promotion can run anytime according to your ad extension scheduling.|
|<a name="stnicholasday"></a>StNicholasDay|The "St. Nicholas Day" promotion can run from November 1 through December 31.|
|<a name="summersale"></a>SummerSale|The "Summer Sale" promotion can run anytime according to your ad extension scheduling.|
|<a name="unknown"></a>Unknown|Reserved for future use.|
|<a name="valentinesday"></a>ValentinesDay|The "Valentine's Day" promotion can run from January 15 through February 28.|
|<a name="wintersale"></a>WinterSale|The "Winter Sale" promotion can run anytime according to your ad extension scheduling.|
|<a name="womensday"></a>WomensDay|The "Women's Day" promotion can run from February 15 through March 31.|
|<a name="yearendgift"></a>YearEndGift|The "Year-End Gift" promotion can run anytime according to your ad extension scheduling.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[PromotionAdExtension](promotionadextension.md)  
