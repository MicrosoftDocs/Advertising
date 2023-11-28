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
>  此酒店價格廣告測試版僅供部分參與者使用。有關參與測試版發佈計劃的資訊，請聯繫您的客戶經理或[在此註冊](https://go.microsoft.com/fwlink/?linkid=2201950).
>
> 酒店價格廣告 Feed、API 和文檔可能會發生變化。

酒店價格廣告使廣告主能夠跨設備在 Bing.com 上展示他們的酒店。旅客在積極預訂酒店時可以看到酒店價格廣告。

要使用酒店價格廣告，您需要向您的客戶經理註冊。如果您沒有客戶經理，請填寫[註冊表格](https://go.microsoft.com/fwlink/?linkid=2201950)。作為註冊過程的一部分，您可以決定如何將行程數據發送到必應。你的選項是將更改推送到必應，讓必應向你發送所有行程數據的請求，或者讓必應向你發送你標識為已更改的行程數據的請求。 

您還可以與您的客戶經理合作，導入您的飯店和銷售點數據。酒店 Feed 是一個 XML 文件，用於描述您要宣傳的酒店。該提要提供酒店的名稱、位址、電話號碼和地理座標。有關創建酒店資訊流的詳細資訊，請參閱 [飯店資訊流](../hotel-feed/hotel-feed.md).

銷售點 Feed 是一個 XML 文件，用於描述使用者用於預訂房間的網站。Feed 為您支援的每個預訂網站提供銷售點 （POS）。POS 描述了 POS 的顯示名稱、URL 以及將使用者與 POS 匹配的條件。有關創建銷售點 Feed 的詳細資訊，請參閱 [銷售點 Feed](../pos-feed/pos-feed.md). 

 將飯店和銷售點源導入必應後，可以開始向必應發送酒店屬性的行程數據。若要指定路線，請使用[事務](../transaction-message/transaction-message.md)消息。向必應發送消息的方式取決於註冊時選擇的模式。如果選擇了推送模式，請參閱[將事務消息推送到](../transaction-message/push-transaction-message.md) 必應。如果選擇了其中一種拉取模式，請參閱  [讓必應拉取事務消息](../transaction-message/pull-transaction-message.md).

此外，別忘了為您的客戶經理提供 32x32 的網站圖示，以顯示在您的廣告旁邊。網站圖示可以是 .ico、.jpg 或 .png 檔。

要創建酒店廣告活動並指定出價，請參閱 [飯店 API](../hotel-service/hotel-api.md).
