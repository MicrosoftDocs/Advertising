---
title: DeliveredMatchTypeReportFilter Value Set Test - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the delivered match type values that you can use to filter the report data.(test)
---
# DeliveredMatchTypeReportFilter Value Set Test - Reporting
Defines the delivered match type values that you can use to filter the report data. These values are also used as column values in reports that include match type, such as the keyword performance report.

## Syntax
```xml
<xs:simpleType name="DeliveredMatchTypeReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="Exact" />
        <xs:enumeration value="Phrase" />
        <xs:enumeration value="Broad" />
        <xs:enumeration value="ExactCloseVariant" />
        <xs:enumeration value="PhraseCloseVariant" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [DeliveredMatchTypeReportFilter](deliveredmatchtypereportfilter.md) value set has the following values: [Broad](#broad), [Exact](#exact), [ExactCloseVariant](#exactclosevariant), [Phrase](#phrase), [PhraseCloseVariant](#phraseclosevariant).

|Value|Description|
|-----------|---------------|
|<a name="broad"></a>Broad|The report will contain ads that were delivered using a broad match comparison.|
|<a name="exact"></a>Exact|The report will contain ads that were delivered by using an exact match comparison.|
|<a name="exactclosevariant"></a>ExactCloseVariant|The report will contain ads that were delivered by using a close variant exact match comparison.<br/><br/>Examples of the types of close variations that are considered include plurals, stemming, misspellings, abbreviations, and acronyms. For more information and examples, see the help topic [What are keyword match types, and how do I use them?](https://help.ads.microsoft.com/#apex/3/en/50822/1)<br/><br/>This filter option can only be included in the [SearchQueryPerformanceReportFilter](searchqueryperformancereportfilter.md) object.|
|<a name="phrase"></a>Phrase|The report will contain ads that were delivered by using a phrase match comparison.|
|<a name="phraseclosevariant"></a>PhraseCloseVariant|The report will contain ads that were delivered by using a close variant phrase match comparison.<br/><br/>Examples of the types of close variations that are considered include plurals, stemming, misspellings, abbreviations, and acronyms. For more information and examples, see the help topic [What are keyword match types, and how do I use them?](https://help.ads.microsoft.com/#apex/3/en/50822/1)<br/><br/>This filter option can only be included in the [SearchQueryPerformanceReportFilter](searchqueryperformancereportfilter.md) object.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[KeywordPerformanceReportFilter](keywordperformancereportfilter.md)  
[SearchQueryPerformanceReportFilter](searchqueryperformancereportfilter.md)  
[ShareOfVoiceReportFilter](shareofvoicereportfilter.md)  
