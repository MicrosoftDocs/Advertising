---
title: CallDetailReportColumn Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the attributes and performance statistics columns that you can include in the CallDetailReportRequest.
---
# CallDetailReportColumn Value Set - Reporting
Defines the attributes and performance statistics columns that you can include in the [CallDetailReportRequest](calldetailreportrequest.md).

The attribute columns that you include in a report can affect how the statistics are aggregated. In other words the number of rows increase by a factor of the unique attributes. For more information, see [Columns that Group the Data](../guides/reports.md#columnsdata).

For a list of columns that you must include, please see the [Required Columns](#requiredcolumns) section below.

To see how far back hourly, daily, weekly, monthly, yearly and summary aggregated data can be retrieved for a report, see [Report Data Retention Time Periods](../guides/report-data-retention-time-periods.md).

## Syntax
```xml
<xs:simpleType name="CallDetailReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="CampaignName" />
    <xs:enumeration value="AdGroupName" />
    <xs:enumeration value="StartTime" />
    <xs:enumeration value="EndTime" />
    <xs:enumeration value="Duration" />
    <xs:enumeration value="AreaCode" />
    <xs:enumeration value="City" />
    <xs:enumeration value="State" />
    <xs:enumeration value="AccountId" />
    <xs:enumeration value="CampaignId" />
    <xs:enumeration value="AdGroupId" />
    <xs:enumeration value="AccountStatus" />
    <xs:enumeration value="CampaignStatus" />
    <xs:enumeration value="AdGroupStatus" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [CallDetailReportColumn](calldetailreportcolumn.md) value set has the following values: [AccountId](#accountid), [AccountName](#accountname), [AccountStatus](#accountstatus), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [AdGroupStatus](#adgroupstatus), [AreaCode](#areacode), [CampaignId](#campaignid), [CampaignName](#campaignname), [CampaignStatus](#campaignstatus), [City](#city), [Duration](#duration), [EndTime](#endtime), [StartTime](#starttime), [State](#state).

|Value|Description|
|-----------|---------------|
|<a name="accountid"></a>AccountId|The Microsoft Advertising assigned identifier of an account.|
|<a name="accountname"></a>AccountName|The account name.|
|<a name="accountstatus"></a>AccountStatus|The account status.|
|<a name="adgroupid"></a>AdGroupId|The Microsoft Advertising assigned identifier of an ad group.|
|<a name="adgroupname"></a>AdGroupName|The ad group name.|
|<a name="adgroupstatus"></a>AdGroupStatus|The ad group status.|
|<a name="areacode"></a>AreaCode|The area code where the user was physically located when they clicked the ad.|
|<a name="campaignid"></a>CampaignId|The Microsoft Advertising assigned identifier of a campaign.|
|<a name="campaignname"></a>CampaignName|The campaign name.|
|<a name="campaignstatus"></a>CampaignStatus|The campaign status.|
|<a name="city"></a>City|The city used to deliver the ad. The location where the user was in physically when they clicked the ad.|
|<a name="duration"></a>Duration|The duration of each forwarded call that originated from a call ad extension.|
|<a name="endtime"></a>EndTime|The end time of the call expressed in Coordinated Universal Time (UTC).|
|<a name="starttime"></a>StartTime|The start time of the call expressed in Coordinated Universal Time (UTC).|
|<a name="state"></a>State|The state used to deliver the ad. The location where the user was in physically when they clicked the ad.|

## <a name="remarks"></a>Remarks
### <a name="requiredcolumns"></a>Required Columns
The report must include the following columns at a minimum. As a general rule, each report must include at least one attribute column and at least one non-impression share performance statistics column. For more information, see [Report Attributes and Performance Statistics](../guides/report-attributes-performance-statistics.md).

> [!NOTE]
> The TimePeriod column is expected for all aggregation types except Summary. It is important to note that if you do not include TimePeriod, the aggregation you chose will be ignored and Summary aggregation will be used regardless.

|Column|
|----------|
|Duration|
|EndTime|
|StartTime|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[CallDetailReportRequest](calldetailreportrequest.md)  
