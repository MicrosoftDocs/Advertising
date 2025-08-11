---
title: TopicCriterion Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a criterion that can be used to show ads to users by a specific topic.
---
# TopicCriterion Data Object - Campaign Management
Defines a criterion that can be used to show ads to users by a specific topic.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="TopicCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="TopicId" type="xs:long" />
        <xs:element minOccurs="0" name="TopicName" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "TopicCriterion",
  "TopicId": "LongValueHere",
  "TopicName": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [TopicCriterion](topiccriterion.md) object has the following elements: [TopicId](#topicid), [TopicName](#topicname).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="topicid"></a>TopicId|The ID of the topic. Possible values include:<br/><br/><ul><li>1: Games</li><li>2: Shopping</li><li>3: Business & Industrial</li><li>4: Sports</li><li>5: Home & Garden</li><li>6: News</li><li>7: Travel & Transportation</li><li>8: Finance</li><li>9: Health</li><li>10: Jobs & Education</li><li>11: Arts & Entertainment</li><li>12: Autos & Vehicles</li><li>13: Computers & Electronics</li><li>14: Real Estate</li><li>15: Hobbies & Leisure</li><li>16: Beauty & Fitness</li><li>17: Internet & Telecom</li><li>18: Books & Literature</li><li>19: Law & Government</li><li>20: Food & Drink</li><li>21: People & Society</li><li>22: Online Communities</li><li>23: Science</li><li>24: Pets & Animals</li><li>25: Reference</li><li>26: World Localities</li></ul>|**long**|
|<a name="topicname"></a>TopicName|The name of the topic.|**string**|

The [TopicCriterion](topiccriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [TopicCriterion](topiccriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [TopicCriterion](topiccriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *Topic* when you retrieve a topic criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

