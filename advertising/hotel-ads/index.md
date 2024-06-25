---
title: "Lodging campaigns"
description: Lodging campaigns enable advertisers to showcase their hotels on Bing.com across devices.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
---

# Lodging campaigns

Lodging campaigns enable advertisers to showcase their properties on Bing.com across devices via two ad formats: Hotel Price ads (HPA) and Property Promotion ads (PPA). Travelers can see HPAs or PPAs when they are actively looking to book a hotel.

Property Promotion ads have the following specifications:

- The Property feed needs to be in XML format (CSV format doesn't support images).
- A PPA must have one to five images (or more) in the Property feed. The best image aspect ratio is 4:3. Width and height are flexible.
- You need to provide the price for the 6th and 7th Sundays from the current date when the *Length of Stay* is one night. For example, for June 24th 2024, you must provide prices for the nights between Sunday, August 4th and Monday, Aug 5th, and Sunday, Aug. 11th and Monday Aug. 12th for PPA to serve.
- You need to provide the **category value** for each property in the property feed in one of the following formats ("vacation_rental" or "hotel", optionally followed by pipe symbol and a custom value:<br/>>br/>
    vacation_rental | ‘custom value’<br/>
    hotel | ‘custom value’<br/><br/>
  Learn more about [specifying optional hotel listing fields](https://learn.microsoft.com/en-us/advertising/hotel-feed/create-hotel-feed#specifying-optional-hotel-listing-fields) and [lodging property categories](https://help.ads.microsoft.com/#apex/ads/en/60192/-1).
- Assign either the "Rental" or "Hotel" category in the property feed for it to display on Bing. If no category is assigned, we will apply the "Hotel" category by default.
- You need to enable the PPA format in the Ad Group settings.

You can decide how you want to send your itinerary data to Bing. Your options are pushing changes to Bing, having Bing send you requests for all itinerary data, or having Bing send you requests for itinerary data that you identify as having changed. 

You can also set up your hotel and Landing pages data. The property feed is an XML document that describes the hotels that you want to advertise. The feed provides the property's name, address, telephone number, and geographical coordinates. For details about creating your property feed, see [Property Feed](../hotel-feed/hotel-feed.md).

The Landing pages feed is an XML document that describes the sites that users use to book rooms. The feed provides a point of sale (POS) for each booking site you support. A POS describes the POS's display name, URL, and criteria for matching the user to a POS. For details about creating your Landing pages feed, see [Landing pages Feed](../pos-feed/pos-feed.md). 

After setting up your hotel and Landing pages feeds into Bing, you can begin sending Bing your itinerary data for your hotel properties. To specify the itineraries, use [Transaction](../transaction-message/transaction-message.md) messages. How you send the messages to Bing depends on the mode you chose when you signed up. If you chose the push mode, see [Pushing Price feedto Bing](../transaction-message/push-transaction-message.md). If you chose one of the pull modes, see [Having Bing Pull Price feeds](../transaction-message/pull-transaction-message.md).

Also, don't forget to provide your account manager a 32x32 favicon to display next to your ads. The favicon may be a .ico, .jpg, or .png file.
