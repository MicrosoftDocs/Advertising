---
title: Update your UET tags to the new syntax
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn why you should update your UET tags to our new syntax, and how to do it.
---

# Update your UET tags to the new syntax

> [!NOTE]
> Don't know what UET is? Check out [What is UET and how can it help me?](hlp_BA_CONC_UETv2WhatIsTag.md)

We have updated the syntax of JavaScript UET tags. We recommend that you update any existing UET tags in your website's code to take advantage of the new syntax.

## Benefits of using the new syntax

The new syntax:

- Automatically URL-encodes (percent encoding) your parameter values, ensuring your URLs are not mistranslated.
- Supports single-page application (SPA) websites.
- Lets you set page-level parameters for any compatible UET event on your webpage.
- Has parameter names that are easy to understand, helping you organize and manage them.

## What's different in the updated tags?

1. The event action parameter is now required in both custom event and variable revenue UET tags, and this parameter appears first in both cases.
1. The JavaScript parameter names for custom events and variable revenue are now easier to understand:

| Old syntax | New syntax |
| --- | --- |
| **ea** | event |
| **ec** | event_category |
| **el** | event_label |
| **ev** | event_value |
| **gv** | revenue_value |
| **gc** | currency |

## Comparing the syntaxes

- **Old syntax (custom event)**

  ```
  <script> <br> window.uetq = window.uetq || []; <br> window.uetq.push ({'<font color="ff0027" size="2">ec</font>': 'Replace_with_Event_Category', '<font color="ff0027" size="2">ea</font>': 'Replace_with_Event_Action', '<font color="ff0027" size="2">el</font>': 'Replace_with_Event_Label', '<font color="ff0027" size="2">ev</font>': 'Replace_with_Event_Value'}); <br> </script>
  ```

- **New syntax (custom event)**

  ```
  <script> <br> window.uetq = window.uetq || []; <br> window.uetq.push ('<font color="ff0027" size="2">event</font>', 'Replace_with_Event_Action', {'<font color="ff0027" size="2">event_category</font>': 'Replace_with_Event_Category', '<font color="ff0027" size="2">event_label</font>': 'Replace_with_Event_Label', '<font color="ff0027" size="2">event_value</font>': 'Replace_with_Event_Value'}); <br> </script>
  ```

- **Old syntax (variable revenue)**

  ```
  <script> <br> window.uetq = window.uetq || []; <br> window.uetq.push ({'<font color="ff0027" size="2">gv</font>': 'Replace_with_Revenue_Value', '<font color="ff0027" size="2">gc</font>': 'Replace_with_Currency_Code'}); <br> </script>
  ```

- **New syntax (variable revenue)**

  ```
  <script> <br> window.uetq = window.uetq || []; <br> window.uetq.push ('<font color="ff0027" size="2">event</font>', '', {'<font color="ff0027" size="2">revenue_value</font>': 'Replace_with_Revenue_Value', '<font color="ff0027" size="2">currency</font>': 'Replace_with_Currency_Code'}); <br> </script>
  ```

## Examples

- **Tracking all four custom event types**

  ```
  <script> <br> window.uetq = window.uetq || []; <br> window.uetq.push ('event', 'Contoso_Event_Action', {'event_category': 'Contoso_Event_Category', 'event_label': 'Contoso_Event_Label', 'event_value': 'Contoso_Event_Value'}); <br> </script>
  ```

- **Not tracking event action, but tracking the other three event types**(note that 'event' remains with its value empty):
  
  ```
  <script> <br> window.uetq = window.uetq || []; <br> window.uetq.push (<font color="ff0027" size="2">'event', '',</font> {'event_category': 'Contoso_Event_Category', 'event_label': 'Contoso_Event_Label', 'event_value': 'Contoso_Event_Value'}); <br> </script>
  ```

- **Only tracking event action**(note that the other, unnecessary event types have been removed):
    
  ```
  <script> <br> window.uetq = window.uetq || []; <br> window.uetq.push ('event', 'Contoso_Event_Action', <font color="ff0027" size="2">{}</font>); <br> </script>
  ```
  
## Get more info

- [Everything you need to know about setting up UET](hlp_BA_CONC_UET_Setup_Master.md)
- [How to track custom events with UET](hlp_BA_CONC_UETv2CustomEvent.md)
- [How to report variable revenue with UET](hlp_BA_CONC_UETv2RevenueVariables.md)
