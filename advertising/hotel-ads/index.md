---
title: "Hotel Price Ads"
description: Hotel Price Ads enables advertisers to showcase their hotels on Bing.com across devices.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
---

# Hotel Price Ads

> [!NOTE]
> This beta release of Hotel Price Ads is available to select participants only. For information about participating in the beta release program, please contact your account manager or [enroll here](https://go.microsoft.com/fwlink/?linkid=2201950).
>
> The Hotel Price Ads feeds, API, and documentation are subject to change.

Hotel Price Ads enables advertisers to showcase their hotels on Bing.com across devices. Travelers can see hotel price ads when they are actively looking to book a hotel.

To use Hotel Price Ads, you need to sign up with your account manager. If you don't have an account manager, please fill out the [enrollment form](https://go.microsoft.com/fwlink/?linkid=2201950). As part of the sign-up process, you decide how you want to send your itinerary data to Bing. Your options are pushing changes to Bing, having Bing send you requests for all itinerary data, or having Bing send you requests for itinerary data that you identify as having changed. 

You also work with your account manager to import your hotel and Landing pages data. The hotel feed is an XML document that describes the hotels that you want to advertise. The feed provides the hotel's name, address, telephone number, and geographical coordinates. For details about creating your property feed, see [Property Feed](../hotel-feed/hotel-feed.md).

The Landing pages feed is an XML document that describes the sites that users use to book rooms. The feed provides a point of sale (POS) for each booking site you support. A POS describes the POS's display name, URL, and criteria for matching the user to a POS. For details about creating your Landing pages feed, see [Landing pages Feed](../pos-feed/pos-feed.md). 

After importing your hotel and Landing pages feeds into Bing, you can begin sending Bing your itinerary data for your hotel properties. To specify the itineraries, use [Transaction](../transaction-message/transaction-message.md) messages. How you send the messages to Bing depends on the mode you chose when you signed up. If you chose the push mode, see [Pushing Price feedto Bing](../transaction-message/push-transaction-message.md). If you chose one of the pull modes, see [Having Bing Pull Price feeds](../transaction-message/pull-transaction-message.md).

Also, don't forget to provide your account manager a 32x32 favicon to display next to your ads. The favicon may be a .ico, .jpg, or .png file.

To create hotel ad campaigns and specify bids, see [Hotel API](../hotel-service/hotel-api.md).
