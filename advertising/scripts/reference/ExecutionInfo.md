---
title: "ExecutionInfo object"
description: "Contains the methods for getting information about the environment in which the script is currently executing."
author: rgaritta
ms.author: v-rgaritta
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# ExecutionInfo

Contains the methods for getting information about the environment in which the script is currently executing.

## Methods

|Method Name|Return Type|Description|
|-|-|-
|[getRemainingTime](#getremainingtime)|int|Gets the remaining time, in seconds, that the script is allowed to continue executing. See [Script execution limits](../concepts/execution-limits.md).
|[isPreview](#ispreview)|Boolean|Determines whether the script is running in preview mode or live mode.


## <a name="getremainingtime"></a>getRemainingTime

Gets the remaining time, in seconds, that the script is allowed to continue executing. See [Script execution limits](../concepts/execution-limits.md).

### Returns

|Type|Description|
|-|-
int|The number of seconds that the script is allowed to continue executing.


## <a name="ispreview"></a>isPreview

Determines whether the script is running in preview mode or live mode. See [Running scripts in preview mode](../concepts/preview-mode.md)

### Returns

|Type|Description|
|-|-
Boolean|If **true**, the script is running in preview mode; otherwise, its running in live mode.

