---
title: ClientLink Data Object - Customer Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines a client link object.
ms.subservice: customer-management-api
---
# ClientLink Data Object - Customer Management
Defines a client link object. Acceptance of a client link invitation enables an agency to  manage the corresponding client advertiser accounts. To send an invitation to manage a client advertiser account, call the [AddClientLinks](addclientlinks.md) operation and specify one client link per account to manage. 

A client link does not have a public system identifier. You can identify distinct client links by [ClientEntityId](#cliententityid) and [ManagingCustomerId](#managingcustomerid).

> [!TIP]
> For more information about the client link lifecycle, see the [Account Hierarchy](../guides/account-hierarchy-permissions.md#account-hierarchy) technical guide. For more information about becoming an agency, see the [Resources for agency partners](https://about.ads.microsoft.com/en-us/resources/agency-hub). For more information from a client's perspective, see [How to have an agency manage your Microsoft Advertising account](https://help.ads.microsoft.com/#apex/3/en/52004/3).  

> [!NOTE]
> Agency customers in the Create Accounts on Behalf of Client pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 793) can also establish ad account level client links via the [SignupCustomer](../customer-management-service/signupcustomer.md) service operation. Please see [SignupCustomer](../customer-management-service/signupcustomer.md) for more information. 

## Syntax
```xml
<xs:complexType name="ClientLink" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Type" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ClientEntityId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="ClientEntityNumber" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ClientEntityName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ManagingCustomerId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="ManagingCustomerNumber" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ManagingCustomerName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Note" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="InviterEmail" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="InviterName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="InviterPhone" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="IsBillToClient" nillable="true" type="xs:boolean" />
    <xs:element minOccurs="0" name="StartDate" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="tns:ClientLinkStatus" />
    <xs:element minOccurs="0" name="SuppressNotification" type="xs:boolean" />
    <xs:element minOccurs="0" name="LastModifiedDateTime" type="xs:dateTime" />
    <xs:element minOccurs="0" name="LastModifiedByUserId" type="xs:long" />
    <xs:element minOccurs="0" name="Timestamp" nillable="true" type="xs:base64Binary" />
    <xs:element minOccurs="0" name="ForwardCompatibilityMap" nillable="true" type="q10:ArrayOfKeyValuePairOfstringstring" xmlns:q10="http://schemas.datacontract.org/2004/07/System.Collections.Generic" />
    <xs:element minOccurs="0" name="CustomerLinkPermission" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ClientLink](clientlink.md) object has the following elements: [ClientEntityId](#cliententityid), [ClientEntityName](#cliententityname), [ClientEntityNumber](#cliententitynumber), [CustomerLinkPermission](#customerlinkpermission), [ForwardCompatibilityMap](#forwardcompatibilitymap), [InviterEmail](#inviteremail), [InviterName](#invitername), [InviterPhone](#inviterphone), [IsBillToClient](#isbilltoclient), [LastModifiedByUserId](#lastmodifiedbyuserid), [LastModifiedDateTime](#lastmodifieddatetime), [ManagingCustomerId](#managingcustomerid), [ManagingCustomerName](#managingcustomername), [ManagingCustomerNumber](#managingcustomernumber), [Name](#name), [Note](#note), [StartDate](#startdate), [Status](#status), [SuppressNotification](#suppressnotification), [Timestamp](#timestamp), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="cliententityid"></a>ClientEntityId|The identifier of the client advertiser account or client customer to manage<br/><br/>The [Type](#type) element determines whether the link is to a client advertiser account or a client customer.<br/><br/>**Add:** Required. Either the *ClientEntityId* or *ClientEntityNumber* is required, but specifying both will cause the operation to fail.<br/>**Update:** Read-only and Required.|**long**|
|<a name="cliententityname"></a>ClientEntityName|The name of the client advertiser account or client customer to manage<br/><br/>The [Type](#type) element determines whether the link is to a client advertiser account or a client customer.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|
|<a name="cliententitynumber"></a>ClientEntityNumber|The number of the client advertiser account or client customer to manage<br/><br/>The [Type](#type) element determines whether the link is to a client advertiser account or a client customer.<br/><br/>**Add:** Required. Either the *ClientEntityId* or *ClientEntityNumber* is required, but specifying both will cause the operation to fail.<br/>**Update:** Read-only and Required.|**string**|
|<a name="customerlinkpermission"></a>CustomerLinkPermission|Determines whether the user's access to the accounts is restricted by customer hierarchy i.e., customer level client linking.<br/><br/>This element is only applicable if [Type](#type) is set to CustomerLink. In that case, the possible values include Administrative and Standard. Otherwise this field should be nil or empty.<br/><br/>If this field is set to "Administrative", the user has access to the [ClientEntityId](#cliententityid) through an Administrative customer [link](clientlink.md).<br/><br/>If this field is set to "Standard", the user has access to the [ClientEntityId](#cliententityid) through a Standard customer [link](clientlink.md).<br/><br/>The [ClientEntityId](#cliententityid) is part of a customer [link](clientlink.md) hierarchy whereby the user can access other customers below it.<br/><br/>For more information, see the [User Roles](../guides/account-hierarchy-permissions.md#user-roles) technical guide.<br/><br/>**Add:** Optional<br/>**Update:** Read-only|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for the *ClientLink* object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="inviteremail"></a>InviterEmail|The email of the user who created the client link request.<br/><br/>This value does not need to be the same as, nor is it used to modify, the email already stored in Microsoft Advertising for the current authenticated user.<br/><br/>If not specified, the service will set this value to the email already stored in Microsoft Advertising for the current authenticated user.<br/><br/>**Add:** Optional<br/>**Update:** Read-only|**string**|
|<a name="invitername"></a>InviterName|The name of the parent customer of the user who created the client link request.<br/><br/>This value does not need to be the same as, nor is it used to modify, the customer name already stored in Microsoft Advertising.<br/><br/>If not specified, the service will set this value to the parent customer name already stored in Microsoft Advertising for the current authenticated user.<br/><br/>**Add:** Optional<br/>**Update:** Read-only|**string**|
|<a name="inviterphone"></a>InviterPhone|The phone number of the user who created the client link request.<br/><br/>This value does not need to be the same as, nor is it used to modify, the phone number already stored in Microsoft Advertising for the current authenticated user.<br/><br/>If not specified, the service will set this value to the phone number already stored in Microsoft Advertising for the current authenticated user.<br/><br/>**Add:** Optional<br/>**Update:** Read-only|**string**|
|<a name="isbilltoclient"></a>IsBillToClient|Determines whether the owner of the client advertiser account or the managing customer is responsible for billing payments.<br/><br/>This element is only applicable for advertiser account client links, and not applicable for customer links. The client advertiser account must be set up for post-pay billing. Prepaid accounts are not supported for management by agencies. If set to true the client is responsible for billing. If set to false the managing customer is responsible for billing.<br/><br/>**Add:** Required for advertiser account links; Not applicable for customer links.<br/>**Update:** Read-only|**boolean**|
|<a name="lastmodifiedbyuserid"></a>LastModifiedByUserId|The identifier of the last user to update the client link's information.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**long**|
|<a name="lastmodifieddatetime"></a>LastModifiedDateTime|The date and time that the client link was last updated. The value is in Coordinated Universal Time (UTC).<br/><br/>The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**dateTime**|
|<a name="managingcustomerid"></a>ManagingCustomerId|The identifier of the customer who manages or is requesting to manage the client advertiser account.<br/><br/>**Add:** Required. Either the *ManagingCustomerId* or *ManagingCustomerNumber* is required, but specifying both will cause the operation to fail.<br/>**Update:** Read-only and Required|**long**|
|<a name="managingcustomername"></a>ManagingCustomerName|The name of the customer who manages or is requesting to manage the client advertiser account.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|
|<a name="managingcustomernumber"></a>ManagingCustomerNumber|The number of the customer who manages or is requesting to manage the client advertiser account.<br/><br/>**Add:** Required. Either the *ManagingCustomerId* or *ManagingCustomerNumber* is required, but specifying both will cause the operation to fail.<br/>**Update:** Read-only and Required|**string**|
|<a name="name"></a>Name|The friendly name that can be used to reference this client link.<br/><br/>The name can contain a maximum of 40 characters.<br/><br/>A default name will be provided if none is specified. The name does not need to be unique compared to other client links for the user.<br/><br/>**Add:** Optional<br/>**Update:** Read-only|**string**|
|<a name="note"></a>Note|Optional message from the requestor providing context and details about the client link invitation.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="startdate"></a>StartDate|The date when the status would update. For an accepted link request the status would transition towards Active on this date, and for an unlink request the status would transition towards Inactive on this date.<br/><br/>If not specified, this value will be set to the current date and time.<br/><br/>**Add:** Optional<br/>**Update:** Read-only|**dateTime**|
|<a name="status"></a>Status|Determines the life cycle status of the client link, for example whether the client link has been accepted or declined.<br/><br/>When adding a client link this element cannot be specified, and the service sets the effective status to LinkPending.<br/><br/>**Add:** Read-only<br/>**Update:** Required|[ClientLinkStatus](clientlinkstatus.md)|
|<a name="suppressnotification"></a>SuppressNotification|Determines whether or not to send email notification of the client link invitation to the primary user of the client advertiser account.<br/><br/>If set to true the client will not receive an email and otherwise, since the default value is false, the client will receive an email notification.<br/><br/>**Add:** Optional<br/>**Update:** Read-only|**boolean**|
|<a name="timestamp"></a>Timestamp|Reserved for future use.|**base64Binary**|
|<a name="type"></a>Type|Determines whether the link is to a client advertiser account or a client customer.<br/><br/>The possible values are AccountLink and CustomerLink. If this element is empty or set to AccountLink, the [ClientEntityId](#cliententityid), [ClientEntityName](#cliententityname), and [ClientEntityNumber](#cliententitynumber) represent a client advertiser account. If this element is set to CustomerLink, the [ClientEntityId](#cliententityid), [ClientEntityName](#cliententityname), and [ClientEntityNumber](#cliententitynumber) represent a client customer.<br/><br/>**Add:** Optional. If this element is not set, the service attempts to create an advertiser account client link.<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[AddClientLinks](addclientlinks.md)  
[SearchClientLinks](searchclientlinks.md)  
[UpdateClientLinks](updateclientlinks.md)  
