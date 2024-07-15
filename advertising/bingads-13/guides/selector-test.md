---
title: Microsoft.Authorization/roleManagementPolicyAssignments 
description: Azure Microsoft.Authorization/roleManagementPolicyAssignments syntax and properties to use in Azure Resource Manager templates for deploying the resource. API version latest
author: tfitzmac
zone_pivot_groups: api-reference
ms.service: azure-resource-manager
ms.topic: reference
ms.date: 5/7/2024
ms.author: tomfitz
---
# Microsoft.Authorization roleManagementPolicyAssignments 

::: zone pivot="soap"

## Bicep resource definition

The roleManagementPolicyAssignments resource type is an **extension resource**, which means you can apply it to another resource. 

Use the `scope` property on this resource to set the scope for this resource. See [Set scope on extension resources in Bicep](/azure/azure-resource-manager/bicep/scope-extension-resources).

The roleManagementPolicyAssignments resource type can be deployed with operations that target: 

* **Resource groups** - See [resource group deployment commands](/azure/azure-resource-manager/bicep/deploy-to-resource-group)
* **Subscriptions** - See [subscription deployment commands](/azure/azure-resource-manager/bicep/deploy-to-subscription)
* **Management groups** - See [management group deployment commands](/azure/azure-resource-manager/bicep/deploy-to-management-group)
* **Tenants** - See [tenant deployment commands](/azure/azure-resource-manager/bicep/deploy-to-tenant)

## Resource format

To create a Microsoft.Authorization/roleManagementPolicyAssignments resource, add the following Bicep to your template.

```bicep
resource symbolicname 'Microsoft.Authorization/roleManagementPolicyAssignments@2020-10-01' = {
  name: 'string'
  scope: resourceSymbolicName or tenant()
  properties: {
    policyId: 'string'
    roleDefinitionId: 'string'
    scope: 'string'
  }
}
```

## Property values

### roleManagementPolicyAssignments

| Name | Description | Value |
| ---- | ----------- | ------------ |
| name | The resource name | string (required) |
| scope | Use when creating an extension resource at a scope that is different than the deployment scope. | Target resource<br /><br />For Bicep, set this property to the symbolic name of the resource to apply the [extension resource](/azure/azure-resource-manager/bicep/scope-extension-resources).<br /><br />This resource type can also be applied to a tenant.<br />For Bicep, use `tenant()`. |
| properties | Role management policy properties. | [RoleManagementPolicyAssignmentProperties](#rolemanagementpolicyassignmentproperties)  |

### RoleManagementPolicyAssignmentProperties

| Name | Description | Value |
| ---- | ----------- | ------------ |
| policyId | The policy id role management policy assignment. | string  |
| roleDefinitionId | The role definition of management policy assignment. | string  |
| scope | The role management policy scope. | string  |

::: zone-end

::: zone pivot="rest"

## ARM template resource definition

The roleManagementPolicyAssignments resource type is an **extension resource**, which means you can apply it to another resource. 

Use the `scope` property on this resource to set the scope for this resource. See [Set scope on extension resources in ARM templates](/azure/azure-resource-manager/templates/scope-extension-resources).

The roleManagementPolicyAssignments resource type can be deployed with operations that target: 

* **Resource groups** - See [resource group deployment commands](/azure/azure-resource-manager/templates/deploy-to-resource-group)
* **Subscriptions** - See [subscription deployment commands](/azure/azure-resource-manager/templates/deploy-to-subscription)
* **Management groups** - See [management group deployment commands](/azure/azure-resource-manager/templates/deploy-to-management-group)
* **Tenants** - See [tenant deployment commands](/azure/azure-resource-manager/templates/deploy-to-tenant)

## Resource format

To create a Microsoft.Authorization/roleManagementPolicyAssignments resource, add the following JSON to your template.

```json
{
  "type": "Microsoft.Authorization/roleManagementPolicyAssignments",
  "apiVersion": "2020-10-01",
  "name": "string",
  "scope": "string" or "/",
  "properties": {
    "policyId": "string",
    "roleDefinitionId": "string",
    "scope": "string"
  }
}
```

## Property values

### roleManagementPolicyAssignments

| Name | Description | Value |
| ---- | ----------- | ------------ |
| type | The resource type | 'Microsoft.Authorization/roleManagementPolicyAssignments' |
| apiVersion | The resource api version | '2020-10-01' |
| name | The resource name | string (required) |
| scope | Use when creating an extension resource at a scope that is different than the deployment scope. | Target resource<br /><br />For JSON, set the value to the full name of the resource to apply the [extension resource](/azure/azure-resource-manager/templates/scope-extension-resources) to.<br /><br />This resource type can also be applied to a tenant.<br />For JSON, use `"/"`. |
| properties | Role management policy properties. | [RoleManagementPolicyAssignmentProperties](#rolemanagementpolicyassignmentproperties-1)  |

### RoleManagementPolicyAssignmentProperties

| Name | Description | Value |
| ---- | ----------- | ------------ |
| policyId | The policy id role management policy assignment. | string  |
| roleDefinitionId | The role definition of management policy assignment. | string  |
| scope | The role management policy scope. | string  |

::: zone-end
