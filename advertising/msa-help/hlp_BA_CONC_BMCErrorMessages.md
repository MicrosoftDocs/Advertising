---
title: Troubleshoot Microsoft Merchant Center errors
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Take a look at how to spot and fix common errors in Microsoft Merchant Center stores and feeds.
---

# Troubleshoot Microsoft Merchant Center errors

With Microsoft Merchant Center, you can create a feed that includes images and other information about your products so that your products can display on the Microsoft Advertising Network. Learn more about [how to create a Microsoft Merchant Center store](hlp_BA_PROC_CreateBingMerchantCenterStore.md) and [what a Microsoft Merchant Center feed is](hlp_BA_CONC_BMCWhatIsCatalog.md).

When creating a Microsoft Merchant Center store and trying to upload feed file, what do you do when you get an error message? Before you contact support, take a look at some of the most common errors you may see below – this may help save you some time and a phone call!

## FAQ

- **Product issues**

  | What happened? | What does it mean<br>and how do I fix it? |
  | --- | --- |
  | **The offer does not meet our editorial guidelines.** | These product offers violate one or more of our [advertising policies and guidelines](https://go.microsoft.com/fwlink/?linkid=2295044).<br>To see a sample of the offers that we have rejected, select **The offer does not meet our editorial guidelines** in the Product issue table. Then, find the corresponding policy violations in the Policy violation details page and go to **View samples**.<br>You can make changes to your rejected offers to comply with the policies and guidelines and then reupload your catalog feed file in Microsoft Merchant Center. Each time you upload a feed file for your store, we automatically check to see if the product offers comply with our policies and guidelines.<br>If you believe we shouldn’t have rejected your offer, you may request a review. [Learn more](hlp_BA_CONC_BMCHowToAppeal.md) |
  | **The offer expiration date is in the past.** | Make sure the expiration date hasn’t passed yet and update the offer expiration to a valid date. |
  | **The image is still being processed due to a crawler congestion problem.** | In order for us to be able to access your images, we need to crawl your site. When there is a large volume of images that need to be crawled, this can cause a delay. |
  | **Offer is currently under review.** | The  review process can take up to 3 business days. If the offer still appears as being under review after 3 business days, contact support. |
  | **The product URL field should use a URL that begins with HTTP or HTTPS. No IP addresses.** | Check to make sure that the product URL begins with an HTTP or HTTPS and is not an IP address. |
  | **The product URL shouldn't redirect to another URL. It should be a direct link to the product offer webpage.** | The product URL is redirecting to a different domain. Please update the product URL to be a direct link to the product webpage. |
  | **The offer is a duplicate based on the merchant product ID field.** | Duplicate offers within the same account are not allowed and this offer contains the same merchant product ID as another existing offer. Update the product ID for your new offer. |
  | **The product URL should be a sub-path of the store’s domain.** | The product URL should include the sub-path of your store’s domain (e.g., http://contoso.com/mystore). |
  | **We couldn’t download the image because we couldn’t find the HTTP page.** | Make sure your image URL is correct and working. |
  | **The price field accepts a minimum value of 0.00 and maximum value of 10,000,000.** | Make sure your price is within the range of 0.00 and 10,000,000. |
  | **The offer can’t have adult content.** | We do not allow adult content. |
  | **We couldn’t download the image because the URL timed out.** | The  server took too long returning the page. You can update the default time-out setting of your server or provide another URL for the image. |
  | **The condition field only accepts new, used, and refurbished as values.** | Make sure the product condition is set to new, used, or refurbished. Any other value is not allowed. |
  | **Too many words in brand.** | There can only be a maximum of 10 words in the brand field. |
  | **HTTP 4xx, HTTP 5xx errors** | Check the product URL begins with an HTTP or HTTPS only and that the domain of the product URL matches the domain of your landing page URL. |
  | **Product crawl issues: Cannot access because the server’s robots.txt doesn’t allow access** | You’ve added a robots.txt file to your server, not allowing for crawl access. Configure the robots.txt file to allow Bing to crawl your site. |
  | **Product crawl issues: Invalid URL** | The URL is invalid and we couldn't access it. Update the URL accordingly. |
  | **Product crawl issues: Page requires authentication.** | Bing is unable to access your site due to an authentication protocol. |
  | **Product crawl issues: Redirect URL too long** | The redirect URL was invalid and we couldn’t access it. |
  | **Images aren't displaying: Items were recently submitted.** | The review process can take up to three business days. Check again after a few days. |
  | **Images aren't displaying: Images are not in the required format.** | Images must be bmp, gif, exif, jpg, png, or tiff. |
  | **Images aren't displaying: Image URLs are not working** | Check the URL and update accordingly. The URL must be HTTP or HTTPS only. |
  | **Images aren't displaying: Image doesn't meet the size requirements.** | The minimum image size is 220px by 220px and cannot exceed 3.9MB. |
  | **Images aren’t displaying: The URL is missing an image.** | Update the URL for the offer so it can be reviewed in the next crawl. |
  | **Images aren’t displaying: The image size is too large or small.** | Update the URL for the offer so it can be reviewed in the next crawl. |
  | **The item with zero price is missing required information in the title or contains an invalid product_category.** | For mobile devices or tablets, the price can be 0, as the subsidized price with a contract is allowed. For additional details, check out the price field in the [feed file help article.](hlp_BA_CONC_AboutBingMerchantCenterCatalogFile.md) |
  | **The product price submitted in the feed does not match the price on the landing page of the product found via microdata.** | Check your feed and your site to determine the source of the price mismatch, and update accordingly. |
  | **The product availability submitted in the feed does not match the availability on the landing page of the product found via microdata.** | Check your feed and your site to determine the source of the availability mismatch, and update accordingly. |
  | **The image URL is invalid. The provided URL could not be found or encountered an internal server error.** | Check the URL and update accordingly. You can also check out the [list of crawl error alerts](https://go.microsoft.com/fwlink/?linkid=2086911) for common crawl errors. |
  | **The image cannot be downloaded because the server's robots.txt doesn't allow access. Configure the robots.txt to allow adixbot to crawl your site.** | Configure the robots.txt to allow adixbot to crawl your site. Learn how to [create a robots.txt file](https://go.microsoft.com/fwlink/?linkid=2086741). |
  | **The offer was pending according to image crawl.** | The feed you provided is in the correct format and the links for the underlying products are also correctly formatted. But when we try to access the link, it seems that the links are broken and do not take us to the product description page at all. Please work with your website team owner and make sure all links provided are active and accessible by our systems so we can collect and check the required information for the offers to start serving. Fix the underlying links and we'll start crawling them. |

- **Feed issues**

  | What happened? | What does it mean<br>and how do I fix it? |
  | --- | --- |
  | **The feed file I'm trying to upload from Google isn't working.** | Check to make sure the file you’re trying to upload is either a .csv or .tsv file. Here's how to generate a downloadable link in Google Docs. <br> - Open your feed file in Google Docs.<br>- Select File and select Publish to the web.<br>- Select on Web page and select either Comma-separated values (.csv) or Tab-separated values (.tsv).<br>- Select Publish.<br>- Copy the generated link and use the link as your automatic download URL in your Microsoft Merchant Center feed. |
  | **We were unable to map your file to one of the feeds in the store** | We couldn’t match the feed file name with the file name that is registered with us. Please make sure the name of the feed file exactly matches the file name registered with the feed. If you are submitting a compressed file, make sure the uncompressed feed file name matches the file name registered with the feed. |

- **Store issues**

  | What happened? | What does it mean<br>and how do I fix it? |
  | --- | --- |
  | **{X} offers from {Aggregator} were blocked** | You have selected to prevent aggregators from including your product offers in their feed. As a result, Microsoft Advertising will attempt to prevent aggregators from including your product offers. Aggregators consolidate product offers from multiple, often unrelated, businesses. By not selecting this feature, aggregators can include your feed in their ads. |
  | **{X} % offers are untargeted** | Certain offers aren't targeted to a specific audience, which reduces your return on investment. Download the diagnostic report to see which offers need to be targeted in an existing or new campaign. |
  | **Can't match file to a feed** | The feed file name doesn't match the file name registered with the feed. Correct the file name, and try again. |
