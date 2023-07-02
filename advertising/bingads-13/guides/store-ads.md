---
title: "Store Ads"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Microsoft Store Ads offer app developers the opportunity to reach consumers while searching in the Microsoft Store, to increase awareness, preference, and engagement.
---

# Store Ads

Microsoft Store Ads offer app developers the opportunity to reach consumers while searching in the Microsoft Store, to increase awareness, preference, and engagement. Benefits of using Microsoft Store Ads:

- Improve discovery by increasing visibility and downloads for your products.
- Simple and easy way to manage campaigns through Microsoft Advertising.
- Review performance reports and optimize campaigns for increased customer engagement.

## <a name="microsoft-store-ads"></a>Get Started - Microsoft Store Ads

Before you can create Microsoft Store Ads, you need to make sure you have the following prerequisites ready:

- Publish your app or game in the Microsoft Store. If you haven't published your app or game yet, [start here](https://learn.microsoft.com/windows/apps/publish/).
- If you don't yet have a Microsoft Advertising account, [set one up](https://help.ads.microsoft.com/#apex/ads/en/60158/-1/#SignUp).

## <a name="add-your-publisher-account"></a>Add your Publisher account

Before you can start creating campaigns, you need to add your Partner Center Publisher account in Microsoft Store Ads. You can do this in the Microsoft Advertising platform user interface. You can search by app or Publisher information.

1. From the top menu, select **Tools** > **Microsoft Store Ads**.
2. Select **Add Publisher**.
3. Under **Search by**, choose how you want to search: **App information** or **Publisher information**.
    1. For **App information**: Use either the app name or the Store ID (could also be referred to as App ID).
    2. For **Publisher information**: Use the Publisher name or the Seller ID.
4. Select the Publisher you'd like to add.
5. Select **Submit**.
6. You'll see the Publisher account information (**Publisher name** and **Number of apps**) in the grid.

## <a name="campaign-creation-and-editing"></a>Campaign creation and editing

You can create a campaign through the Microsoft Advertising user interface ([see details here](https://help.ads.microsoft.com/#apex/ads/en/60170/-1)) or with the API.

- Follow the steps to create a Microsoft Shopping campaign with [Bulk Service](../guides/product-ads.md#bingshopping-bulkservice) or [Campaign Management Service](../guides/product-ads.md#bingshopping-campaignservice). Please take note of the additional settings available to support Microsoft Store Ads.  
- Microsoft Store Ads supports two bidding strategies:
  - [ManualCpcBiddingScheme](../campaign-management-service/manualcpcbiddingscheme.md)
  - [CostPerSaleBiddingCheme](../campaign-management-service/costpersalebiddingscheme.md)
- One the bid strategy is set, it cannot be changed for the campaign.
- With Microsoft Store Ads, a single campaign can target all apps under all publishers, and there's no need to create individual campaigns for each app or publisher.  
- The campaign subtype must be set to *ShoppingSponsoredProductAd*.
- Please note that only the manufacturer part number (MPN), which functionally serves as a Store ID (App ID) filter, applies for a Microsoft Store Ads campaign in the product filtering condition. Despite being named "MPN", this item takes in the Store ID (the ID for the ISV or advertiser’s application on Partner Center) value specifically for a Microsoft Store Ads campaign. To learn more, see [ProductGroupSelector](../../scripts/reference/ProductGroupSelector.md).

## <a name="reporting"></a>Reporting

- For Microsoft Store Ads, we recommend running a Campaign report [CampaignPerformanceReportRequest](../reporting-service/campaignperformancereportrequest.md) and/or product dimension report [ProductDimensionPerformanceReportRequest](../reporting-service//productdimensionperformancereportrequest.md).
- View the [documentation for submitting a report](../reporting-service/submitgeneratereport.md). The response of the *SubmitGenerateReport* call will contain a *ReportRequestId* value. This value needs to be used in subsequent calls to [*PollGenerateReport*](../reporting-service/pollgeneratereport.md), as the polling call will be the one to return the report's download URL once it completes.
- For cost per install (CPI) campaigns, apply these attributes:  
  - **Installs**
  - **Cost per install**
  - **Revenue per install**

### <a name="sample-report-request"></a>Sample Report Request

Follow the [*SubmitGenerateReport* documentation](../reporting-service/submitgeneratereport.md) for the header and general structure. Here is an example of an *AccountPerformanceReportRequest*, one that also includes the various *Install* columns. *Note:* This is included in the &lt;body&gt; tag of the SOAP API request.

```xml
<SubmitGenerateReportRequest xmlns="https://bingads.microsoft.com/Reporting/v13"> 
      <ReportRequest i:type="AccountPerformanceReportRequest" xmlns:i="http://www.w3.org/2001/XMLSchema-instance"> 

        <ExcludeColumnHeaders i:nil="false">false</ExcludeColumnHeaders> 
        <ExcludeReportFooter i:nil="false">false</ExcludeReportFooter> 
        <ExcludeReportHeader i:nil="false">false</ExcludeReportHeader> 

        <Format>Csv</Format> 

        <ReportName>AccountPerformanceReportRequest_SampleCall</ReportName> 

        <ReturnOnlyCompleteData i:nil="false">false</ReturnOnlyCompleteData> 

        <Aggregation>Summary</Aggregation> 

        <Columns> 
          <AccountPerformanceReportColumn>AccountName</AccountPerformanceReportColumn> 
          <AccountPerformanceReportColumn>AccountId</AccountPerformanceReportColumn> 
          <AccountPerformanceReportColumn>Impressions</AccountPerformanceReportColumn> 
          <AccountPerformanceReportColumn>Clicks</AccountPerformanceReportColumn> 
          <AccountPerformanceReportColumn>Spend</AccountPerformanceReportColumn> 
          <AccountPerformanceReportColumn>Installs</AccountPerformanceReportColumn> 
          <AccountPerformanceReportColumn>CostPerInstall</AccountPerformanceReportColumn> 
          <AccountPerformanceReportColumn>RevenuePerInstall</AccountPerformanceReportColumn> 
        </Columns> 

        <Filter i:nil="false"> 

        </Filter> 

        <Scope> <!-- Optional --> 
          <AccountIds xmlns:a="http://schemas.microsoft.com/2003/10/Serialization/Arrays"> 
            <a:long>ValueHere</a:long> 
          </AccountIds> 
        </Scope> 

        <Time> 
          <CustomDateRangeEnd i:nil="true" /> 
          <CustomDateRangeStart i:nil="true" /> 
          <PredefinedTime>Today</PredefinedTime> 
        </Time> 

      </ReportRequest> 

    </SubmitGenerateReportRequest> 
```
