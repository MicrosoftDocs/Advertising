---
title: What Google feed file attributes can I use?
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn about what Google feed file attributes can be used.
---

# What Google feed file attributes can I use?

In the tables below, all Google's attributes are listed, and under the column Used by Bing are marked with:

- **Yes**: for attributes that are accepted and used in describing product offers.
- **Not Used**: for attributes that are accepted but ignored.

Make it even easier to import your Google feed files to Microsoft Merchant Center by using the Google Merchant Center import tool. [Learn more](hlp_BA_CONC_BMC_GMCImportIntro.md)

## FAQ

- **Basic Product Information**

  | Google Attribute | Used by Bing? | Notes |
  | --- | --- | --- |
  | **id** | Yes |  |
  | **title** | Yes |  |
  | **description** | Yes |  |
  | **google_product_category** | Yes |  |
  | **product_type** | Yes | Google accepts multiple values here.<br>Bing accepts a singular value here and treats the comma-separated values as a single value.<br>This means when setting auto-targets in Microsoft Advertising, you have to exact-match the comma-separated string. |
  | **link** | Yes |  |
  | **image_link** | Yes | Google's minimum resolution of 250x250 is accepted by Bing |
  | **additional_image_link** | Yes |  |
  | **condition** | Yes | Google's values are ‘new’, ‘used’, ‘refurbished’.<br>Bing accepts all these values. |

- **Availability and Price**

  | Google Attribute | Used by Bing? | Notes |
  | --- | --- | --- |
  | **availability** | Yes | Google's values are ‘in stock’, ‘out of stock’, ‘preorder’.<br>Bing accepts all these values.<br>The English version of the valid options (in stock, out of stock, and preorder) is also accepted for other languages. |
  | **price** | Yes | For the United Kingdom, France, Germany, and Australia, taxes such as VAT must be included in the price. |
  | **sale_price** | Yes |  |
  | **sale_price_effective_date** | Yes |  |

- **Unique Product Identifiers**

  | Google Attribute | Used by Bing? |
  | --- | --- |
  | **brand** | Yes |
  | **gtin** | Yes |
  | **mpn** | Yes |
  | **identifier_exists** | Yes |

- **Apparel Products**

  | Google Attribute | Used by Bing? |
  | --- | --- |
  | **gender** | Yes |
  | **age_group** | Yes |
  | **color** | Yes |
  | **size** | Yes |

- **Product Variants**

  | Google Attribute | Used by Bing? |
  | --- | --- |
  | **item_group_id** | Yes |
  | **color** | Yes |
  | **material** | Yes |
  | **pattern** | Yes |
  | **size** | Yes |

- **Tax and Shipping (attributes ignored)**

  | Google Attribute | Used by Bing? |
  | --- | --- |
  | **tax** | Not Used |
  | **shipping** | Not Used |
  | **shipping_weight** | Not Used |

- **Tax and Shipping (attributes ignored)**

  | Google Attribute | Used by Bing? |
  | --- | --- |
  | **tax** | Not Used |
  | **shipping** | Not Used |
  | **shipping_weight** | Not Used |

- **Tax and Shipping (Germany only)**

  | Google Attribute | Used by Bing? | Notes |
  | --- | --- | --- |
  | **shipping** | Yes | Shipping field is required for Germany only. |
  | **shipping_weight** | Yes | Shipping field is required for Germany only. |

- **Merchant Defined Multipacks**

  | Google Attribute | Used by Bing? |
  | --- | --- |
  | **multipack** | Yes |

- **Adult Products**

  | Google Attribute | Used by Bing? |
  | --- | --- |
  | **adult** | Yes |

- **Google Ads Attributes**

  | Google Attribute | Used by Bing? | Notes |
  | --- | --- | --- |
  | **adwords_grouping** | Yes |  |
  | **adwords_labels** | Yes | Google and Bing treat this as a multi-value field composed of comma-separated values.<br>However, when setting auto-targets in Microsoft Advertising, the merchant has to exact-match the entire comma-separated string. |
  | **adwords_redirect** | Yes |  |

- **Custom label attributes for Shopping campaigns**

  | Google Attribute | Used by Microsoft Shopping campaigns? |
  | --- | --- |
  | **custom_label_0** | Yes |
  | **custom_label_1** | Yes |
  | **custom_label_2** | Yes |
  | **custom_label_4** | Yes |

- **Unit Prices (attributes ignored)**

  | Google Attribute | Used by Bing? | Notes |
  | --- | --- | --- |
  | **unit_pricing_measure** | Yes |  |
  | **unit_pricing_base_measure** | Yes | This attribute is optional when you submit unit_pricing measure. |

- **Energy Labels**

  | Google Attribute | Used by Bing? |
  | --- | --- |
  | **energy_efficiency_class** | Yes |
  | **max_energy_efficiency_class** | Yes |
  | **min_energy_efficiency_class** | Yes |

- **Loyalty Points (attributes ignored)**

  | Google Attribute | Used by Bing? |
  | --- | --- |
  | **loyalty_points** | Not Used |

- **Multiple Installments (attributes ignored)**

  | Google Attribute | Used by Bing? |
  | --- | --- |
  | **installment** | Not Used |

- **Additional Attributes**

  | Google Attribute | Used by Bing? |
  | --- | --- |
  | **excluded_destination** | Not Used |
  | **expiration_date** | Yes |
