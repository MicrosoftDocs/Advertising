---
title: "Negative Sites"
ms.service: "bing-ads"
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: You can use negative sites to prevent your ad from being displayed on specific website URLs.
---
# Negative Sites
A *negative site* is a website URL where you do not want your ads displayed. 

A negative site can be added and deleted from a [PlacementExclusionList](../campaign-management-service/placementexclusionlist.md) (website exclusion list), but cannot be updated. 

If you associate any [website exclusion lists](../campaign-management-service/placementexclusionlist.md) with an ad account, the list of [negative sites](../campaign-management-service/negativesite.md) are used in addition to the [campaign negative sites](../campaign-management-service/campaignnegativesites.md) or [ad group negative sites](../campaign-management-service/adgroupnegativesites.md). Negative site URLs specified at the ad group level are used instead of any negative site URLs specified at the campaign level.  

> [!NOTE] 
> You can only view website exclusion lists in the redesigned Microsoft Advertising UI i.e., via Tools -> Shared Library -> Website exclusion lists. If you don't see it, look for the "Try the new Microsoft Advertising" prompt when you sign in.  

For negative site limits per entity, please see [Negative Sites](entity-hierarchy-limits.md#negativesites).

## <a name="assignednegativesites"></a>Assigned Negative Sites
You can add negative sites to an individual campaign or ad group via the respective [SetNegativeSitesToCampaigns](../campaign-management-service/setnegativesitestocampaigns.md) and [SetNegativeSitesToAdGroups](../campaign-management-service/setnegativesitestoadgroups.md) operations. Although you cannot update individual negative sites, you can use the same operations to replace or remove the list of negative sites. 

You can retrieve the negative sites assigned to an individual campaign or ad group via the respective [GetNegativeSitesByCampaignIds](../campaign-management-service/getnegativesitesbycampaignids.md) and [GetNegativeSitesByAdGroupIds](../campaign-management-service/getnegativesitesbyadgroupids.md) operations.

## <a name="sharedplacementexclusionlists"></a>Shared Website Exclusion Lists
Negative sites can be added and deleted from a shared website exclusion list. The website exclusion list can be shared or associated with multiple ad accounts. 

A manager account can own up to three website exclusion lists. Each list can contain up to 10,000 negative sites. 

A list can be associated with ad accounts owned by the manager account, or linked in the [account hierarchy](account-hierarchy-permissions.md#account-hierarchy) under the manager account that owns the list. A list cannot be shared above or outside of the account hierarchy. 

Only the users of the manager account (customer) that owns a website exclusion list ([PlacementExclusionList](../campaign-management-service/placementexclusionlist.md)) can update or delete the list, add or delete list items, and associate the list with ad accounts. If your ad account is associated with a website exclusion list that you do not own, you can disassociate the list from your account, but the list and list items are read-only. The owner of the list is determined by the association's [SharedEntityCustomerId](../campaign-management-service/sharedentityassociation.md#sharedentitycustomerid) element.

To create a website exclusion list, call the [AddSharedEntity](../campaign-management-service/addsharedentity.md) operation and pass a [PlacementExclusionList](../campaign-management-service/placementexclusionlist.md), which inherits from both [SharedList](../campaign-management-service/sharedlist.md) and [SharedEntity](../campaign-management-service/sharedentity.md). You can create up to 3 website exclusion lists per manager account (customer) and share or associate them with your ad accounts. You can get existing website exclusion lists by calling the [GetSharedEntities](../campaign-management-service/getsharedentities.md) operation. You can update the name of the website exclusion list by calling the [UpdateSharedEntities](../campaign-management-service/updatesharedentities.md) operation. You can delete the website exclusion list by calling the [DeleteSharedEntities](../campaign-management-service/deletesharedentities.md) operation.

To add negative sites to a website exclusion list, call the [AddListItemsToSharedList](../campaign-management-service/addlistitemstosharedlist.md) operation and pass a list of [NegativeSite](../campaign-management-service/negativesite.md), which inherits from [SharedListItem](../campaign-management-service/sharedlistitem.md). You can add up to 5,000 negative sites to each website exclusion list per service operation, and up to 10,000 total negative sites per website exclusion list. You can get the negative sites of a specific list by calling the [GetListItemsBySharedList](../campaign-management-service/getlistitemsbysharedlist.md) operation. Negative sites can be removed from a list by calling the [DeleteListItemsFromSharedList](../campaign-management-service/deletelistitemsfromsharedlist.md) operation.

A [NegativeSite](../campaign-management-service/negativesite.md) can be added and deleted, but cannot be updated. To use a different negative site you can delete the existing [NegativeSite](../campaign-management-service/negativesite.md) via [DeleteListItemsFromSharedList](../campaign-management-service/deletelistitemsfromsharedlist.md), and then add a new [NegativeSite](../campaign-management-service/negativesite.md) via [AddListItemsToSharedList](../campaign-management-service/addlistitemstosharedlist.md). 

To associate a website exclusion list with an ad account, call the [SetSharedEntityAssociations](../campaign-management-service/setsharedentityassociations.md) service operation. Each [SharedEntityAssociation](../campaign-management-service/sharedentityassociation.md) should include the type of entity (currently only Account is supported for website exclusion lists) and the system identifiers for the ad account, manager account (customer), and website exclusion list. You can get the associations by ad account identifier or website exclusion list identifier by calling the respective [GetSharedEntityAssociationsByEntityIds](../campaign-management-service/getsharedentityassociationsbyentityids.md) and [GetSharedEntityAssociationsBySharedEntityIds](../campaign-management-service/getsharedentityassociationsbysharedentityids.md) operations. You can remove the association between the ad account and website exclusion list by calling the [DeleteSharedEntityAssociations](../campaign-management-service/deletesharedentityassociations.md) operation.

## See Also
[Bing Ads API Web Service Addresses](web-service-addresses.md)

