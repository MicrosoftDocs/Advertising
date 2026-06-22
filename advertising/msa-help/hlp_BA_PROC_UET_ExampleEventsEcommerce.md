---
title: Example Custom Events for E-commerce Customers
description: The following examples show the UET tag modification recommended for various scenarios and page types.
ms.date: 5/30/2026
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Example custom events for e-commerce customers

Customers who have a MMC account and use Product ads need to update their UET tag so that their website sends transaction and product data as users interact with it. This data can be used for conversion goals (e.g., custom events or product goal conversions) and targeting features (e.g., dynamic remarketing and more powerful future Microsoft Advertising features).

The following examples show the UET tag modification recommended for various scenarios and page type:


- **Homepage**

  Set the *ecomm_pagetype* property to 'home' on your homepage.

  ```html
  <script>
  window.uetq = window.uetq || [];
  window.uetq.push('event', '', {
      'ecomm_pagetype': 'home'
      }
  );
  </script>
  ```

- **Category browse page**

  Set *ecomm_category* to the category ID, *ecomm_prodid* to the product ID, and *ecomm_pagetype* to 'category'.

  ```html
  <script>
  window.uetq = window.uetq || [];
  window.uetq.push('event', '', {
      'ecomm_category': 'REPLACE_WITH_CATEGORY_ID',
      'ecomm_prodid': ['REPLACE_WITH_PRODUCT_ID', 'REPLACE_WITH_PRODUCT_ID', …],
      'ecomm_pagetype': 'category'
      }
  );
  </script>
  ```

- **Search results page**

  Set *ecomm_query* to the search term, *ecomm_prodid* to the product ID, and *ecomm_pagetype* to 'searchresults'.

  ```html
  <script>
  window.uetq = window.uetq || [];
  window.uetq.push('event', '', {
      'ecomm_query': 'REPLACE_WITH_SEARCH_TERM',
      'ecomm_prodid': ['REPLACE_WITH_PRODUCT_ID', 'REPLACE_WITH_PRODUCT_ID', …],
      'ecomm_pagetype': 'searchresults'
      }
  );
  </script>
  ```

- **Product display page**

  Set *ecomm_prodid* to the product ID and *ecomm_pagetype* to 'product'.

  ```html
  <script>
  window.uetq = window.uetq || [];
  window.uetq.push('event', '', {
      'ecomm_prodid': ['REPLACE_WITH_PRODUCT_ID'],
      'ecomm_pagetype': 'product'
      }
  );
  </script>
  ```

- **Add to cart event**

  Usually, the add to cart event will happen on the product display page and in this case, *ecomm_pagetype* should be set to 'product'. However, if the event is happening on other pages, then that page type should be mentioned.

  The *ecomm_totalvalue* field captures the total sales price of all items added. For example, if 2 boxes of paint were added, then the field should capture the sum of the sales price of both boxes. The *revenue_value* field captures the value if reporting conversions are based on this event. In most cases, *revenue_value* and *ecomm_totalvalue* would be the same. However, having 2 fields provides flexibility to define multiple conversion goals with different values.

  ```html
  <script>
  window.uetq = window.uetq || [];
  window.uetq.push('event', 'add_to_cart', {
      'ecomm_prodid': ['REPLACE_WITH_PRODUCT_ID', 'REPLACE_WITH_PRODUCT_ID', …],
      'ecomm_pagetype': 'REPLACE_WITH_PAGETYPE',
      'ecomm_totalvalue': REPLACE_WITH_TOTAL_PURCHASE_PRICE,
      'revenue_value': REPLACE_WITH_VALUE_FOR_CONVERSION_REPORTING,
      'currency': 'REPLACE_WITH_CURRENCY',
      'items': [
          {
              'id': 'REPLACE_WITH_PRODUCTID',
              'quantity': REPLACE_WITH_QUANTITY,
              'price': REPLACE_WITH_SELLING_PRICE
          },
          {
              'id': 'REPLACE_WITH_PRODUCTID',
              'quantity': REPLACE_WITH_QUANTITY,
              'price': REPLACE_WITH_SELLING_PRICE
          }
      ]
      }
  );
  </script>
  ```

- **Shopping cart page**

  Set *ecomm_prodid* to the product ID, *ecomm_pagetype* to 'cart', *ecomm_totalvalue* to the total purchase price, *revenue_value* to the same value as *ecomm_totalvalue* in most cases or a different value if you are tracking variable revenue based on a conversion goal, *currency* to the type of currency, and *item.id*, *item.quantity*, and *item.price* to the respective ID, quantity, and price for that item.

  ```html
  <script>
  window.uetq = window.uetq || [];
  window.uetq.push('event', '', {
      'ecomm_prodid': ['REPLACE_WITH_PRODUCT_ID', 'REPLACE_WITH_PRODUCT_ID', …],
      'ecomm_pagetype': 'cart',
      'ecomm_totalvalue': REPLACE_WITH_TOTAL_PURCHASE_PRICE,
      'revenue_value': REPLACE_WITH_VALUE_FOR_CONVERSION_REPORTING,
      'currency': 'REPLACE_WITH_CURRENCY',
      'items': [
          {
              'id': 'REPLACE_WITH_PRODUCTID',
              'quantity': REPLACE_WITH_QUANTITY,
              'price': REPLACE_WITH_SELLING_PRICE
          },
          {
              'id': 'REPLACE_WITH_PRODUCTID',
              'quantity': REPLACE_WITH_QUANTITY,
              'price': REPLACE_WITH_SELLING_PRICE
          }
      ]
      }
  );
  </script>
  ```

- **Order confirmation page**

  Set *transaction_id* to the transaction ID, *ecomm_prodid* to the product ID, *ecomm_pagetype* to 'purchase', *ecomm_totalvalue* to the total purchase price, *revenue_value* to the same value as *ecomm_totalvalue* in most cases or a different value if you are tracking variable revenue based on a conversion goal, *currency* to the type of currency, and *item.id*, *item.quantity*, and *item.price* to the respective ID, quantity, and price for that item.

  ```html
  <script>
  window.uetq = window.uetq || [];
  window.uetq.push('event', 'purchase', {
      'transaction_id': 'REPLACE_WITH_TRANSACTION_ID',
      'ecomm_prodid': ['REPLACE_WITH_PRODUCT_ID', 'REPLACE_WITH_PRODUCT_ID', …],
      'ecomm_pagetype': 'purchase',
      'ecomm_totalvalue': REPLACE_WITH_TOTAL_PURCHASE_PRICE,
      'revenue_value': REPLACE_WITH_VALUE_FOR_CONVERSION_REPORTING,
      'currency': 'REPLACE_WITH_CURRENCY',
      'items': [
          {
              'id': 'REPLACE_WITH_PRODUCTID',
              'quantity': REPLACE_WITH_QUANTITY,
              'price': REPLACE_WITH_SELLING_PRICE
          },
          {
              'id': 'REPLACE_WITH_PRODUCTID',
              'quantity': REPLACE_WITH_QUANTITY,
              'price': REPLACE_WITH_SELLING_PRICE
          }
      ]
      }
  );
  </script>
  ```
