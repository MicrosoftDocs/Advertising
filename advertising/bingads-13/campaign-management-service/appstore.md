---
title: AppStore Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The app store the mobile app is distributed in.
---
# AppStore Value Set - Campaign Management
The app store the mobile app is distributed in.

## Syntax
```xml
<xs:simpleType name="AppStore" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="GoogleAppStore" />
        <xs:enumeration value="AppleAppStore" />
        <xs:enumeration value="MicrosoftAppStore">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AppStore](appstore.md) value set has the following values: [AppleAppStore](#appleappstore), [GoogleAppStore](#googleappstore), [MicrosoftAppStore](#microsoftappstore).

|Value|Description|
|-----------|---------------|
|<a name="appleappstore"></a>AppleAppStore|The app is distributed in the Apple app store.|
|<a name="googleappstore"></a>GoogleAppStore|The app is distributed in the Google app store.|
|<a name="microsoftappstore"></a>MicrosoftAppStore|The app is distributed in the Microsoft app store.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AppSetting](appsetting.md)  
