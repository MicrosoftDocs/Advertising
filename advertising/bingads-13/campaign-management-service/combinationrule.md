---
title: CombinationRule Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: A combination rule includes logical conditions used to determine who to add to your combined list.
---
# CombinationRule Data Object - Campaign Management
A combination rule includes logical conditions used to determine who to add to your combined list.

## Syntax
```xml
<xs:complexType name="CombinationRule" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element xmlns:q124="http://schemas.microsoft.com/2003/10/Serialization/Arrays" name="AudienceIds" nillable="true" type="q124:ArrayOflong" />
    <xs:element name="Operator" type="tns:LogicalOperator" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [CombinationRule](combinationrule.md) object has the following elements: [AudienceIds](#audienceids), [Operator](#operator).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="audienceids"></a>AudienceIds|The list of audience identifiers to combine in a logical set.<br/><br/>You can combine custom audiences, customer lists, product audiences, similar audiences, and remarketing lists. You cannot include other combined lists or in-market audiences in a combined list. For details, please see the [remarks](#remarks) section below.<br/><br/>Each combination rule set can contain up to 100 audience IDs.|**long** array|
|<a name="operator"></a>Operator|Determines whether to include or exclude any or all of the [AudienceIds](#audienceids).|[LogicalOperator](logicaloperator.md)|

## <a name="remarks"></a>Remarks
You can combine custom audiences, customer lists, product audiences, similar audiences, and remarketing lists. You cannot include other combined lists or in-market audiences in a combined list.  

With some restrictions described below, you can combine audiences using these [logical operators](logicaloperator.md):

- [Or](logicaloperator.md#or): This will include customers who are in any of these audience lists. 
- [And](logicaloperator.md#and): This will include only customers who are in every single one of these audience lists.  
- [Not](logicaloperator.md#not): This will exclude customers who are in any of these audience lists. 

Evaluation of the logical expression determines who will be added to the combined list. Multiple combinations are always combined with an AND function. This means that a customer must meet all of the criteria of each combination in order to appear in this custom combination audience list. For example, let's say the combined list includes the following combination rules. 

```xml
<CombinationRules i:nil="false">
  <CombinationRule>
    <AudienceIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
      <a1:long>123</a1:long>
      <a1:long>234</a1:long>
    </AudienceIds>
    <Operator>Not</Operator>
  </CombinationRule>
  <CombinationRule>
    <AudienceIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
      <a1:long>345</a1:long>
      <a1:long>456</a1:long>
    </AudienceIds>
    <Operator>Not</Operator>
  </CombinationRule>
  <CombinationRule>
    <AudienceIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
      <a1:long>567</a1:long>
      <a1:long>678</a1:long>
    </AudienceIds>
    <Operator>And</Operator>
  </CombinationRule>
  <CombinationRule>
    <AudienceIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
      <a1:long>789</a1:long>
      <a1:long>890</a1:long>
    </AudienceIds>
    <Operator>Or</Operator>
  </CombinationRule>
  <CombinationRule>
    <AudienceIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
      <a1:long>987</a1:long>
      <a1:long>876</a1:long>
    </AudienceIds>
    <Operator>Or</Operator>
  </CombinationRule>
</CombinationRules>
```

The combined list will include customers who a) are in both audience 567 and 678, and b) are in either audience 789 or 890, and c) are in either audience 987 or 876, unless d) the customer is in either audience 123, 234, 345, or 456.  

A combined list must include at least one audience using the OR or AND operators. A combined list cannot use only the NOT operator. In that case you should use audience exclusions instead. 

Custom audiences and customer lists (coming soon) cannot be combined with other audience types. 

Similar audiences cannot be combined via the AND or NOT operators. Similar audiences can only be used in a single OR condition. In other words, there can only be one audience set that contains similar audiences, and that set must use the OR operator. 

Duplicate audiences are allowed, although the same audience ID cannot be combined via both the AND and NOT operator. .

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CombinedList](combinedlist.md)  
