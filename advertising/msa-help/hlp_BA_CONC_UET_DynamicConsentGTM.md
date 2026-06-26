---
title: Google tag manager template - Consent mode
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: If the official UET template Consent mode doesn't work for you, you can manually push consent signals. The following steps and code snippets demonstrate how to dynamically update the consent state based on user interactions using JavaScript functions and event listeners, such as onClick triggers.
---

# Google tag manager template - Consent mode

> [!IMPORTANT]
> We support reading consent from the initial state and recommend firing the UET tag before the user makes a choice, prior to consent being given.

Our UET template now supports Google Tag Manager (GTM) Consent mode. Google's Consent Management Platform (CMP) partner program integrates with most CMPs, which you can review via the following resources:

- [CMP Partner Program](https://go.microsoft.com/fwlink/?linkid=2293235)
- [Google Analytics support](https://go.microsoft.com/fwlink/?linkid=2293527)

This integration allows us to retrieve the consent state directly from GTM, in the case where you are using both GTM and one of the supported CMPs.

<a id="official-uet-template-installation"></a>

## Official UET template installation

You can install the UET template by following the instructions provided here: [Set up UET tags using Google Tag Manager](hlp_BA_PROC_UET_TMS_GTM.md).

- **User consent methods**

  We have implemented two methods to obtain user consent:

  - **Inherit initial consent** (disabled by default)
  - **Enable consent updates** (enabled by default) <br><br>

    :::image type="content" source="media/BA_Conc_UET_DynamicConsentGTM_EnableConsent.png" alt-text="Google Tag Manager enable consent.":::

  With the default option, **Enable consent updates**, the UET will obtain consent only after the user clicks the consent button. In some cases, the UET tag may fire after the user has already provided consent, meaning we won't capture consent updates that occur before the UET tag is loaded.

  For these scenarios, we recommend enabling the **Inherit Initial User Consent** option.

- **Default behavior and recommendations**

  From our observations, the initial user consent defaults to a specific option even when no CMP is present on the website. Consequently, we have disabled the **Inherit Initial User Consent** option by default. This option should be enabled only in specific cases where it is necessary to inherit the initial user consent state.

- **Additional considerations**

  We understand that the current implementation requires additional actions from your end to ensure proper configuration and integration. it is important that you review the consent settings and, if necessary, customize the consent methods based on your specific requirements and the behavior of your CMPs.

## Dynamic consent update in Google Tag Manager

If the official UET template Consent mode doesn't work for you, you can manually push consent signals. The following steps and code snippets demonstrate how to dynamically update the consent state based on user interactions using JavaScript functions and event listeners, such as onClick triggers.

> [!IMPORTANT]
> These aren't the only ways to dynamically update the consent state, and your specific setup may require different approaches.

## FAQ

- **Example 1: Updating consent modes using triggers for button clicks**

  - **Create user interaction triggers in Google Tag Manager (GTM)**

    You need to create triggers in GTM that fire when the user interacts with your consent banner (e.g., clicks "Yes" or "No").

    1. Click Trigger for "Yes":

       1. Go to **Triggers** in GTM and create a new trigger.
       1. Choose **Click - All Elements**.
       1. Choose to listen to **Some Clicks**.
       1. Select **Choose Built-In Variable** and select the appropriate variable type. For ID selectors, select **Choose Click ID**.
       1. Choose your condition operator and provide your consent prompt button IDs as a value.
       1. Name the trigger (e.g., "Consent Granted Click").
    1. Click Trigger for "No":

       1. Repeat the steps above for the "No" button (or equivalent) and name it (e.g., "Consent Denied Click").

  - **Example consent banner HTML**
    ```
    <div id="consent-banner"> <p>We use cookies to improve your experience. Do you accept?</p> <button id="consent-yes">Yes</button> <button id="consent-no">No</button> </div>
    ```
  - **Example consent-granted trigger**

    :::image type="content" source="media/BA_Conc_UET_DynamicConsentGTM_TriggerConfig.png" alt-text="Install the UET plugin in Wordpress.":::

  - **Create custom HTML tags for consent updates**

    Create two custom HTML tags in GTM to update the consent state based on user interaction.

    1. Custom HTML tag for granted consent

       1. Go to **Tags** and create a new tag.
       1. Choose **Custom HTML Tag**.
       1. Add the following script 
       ```
       <script> 
       window.uetq = window.uetq || []; 
       window.uetq.push('consent', 'update', { 
       'ad_storage': 'granted' }); 
       </script>
       ```
       1. Set the **Triggering** to the "Consent Granted Click" trigger you created earlier.
       1. Save and publish the tag.
    1. Custom HTML tag for denied consent:

       1. Repeat the steps above but change the script to: 
       ```
        <script> 
        window.uetq = window.uetq || []; 
        window.uetq.push('consent', 'update', { 
        'ad_storage': 'denied' }); 
        </script>
       ```
       1. Set the **Triggering** to the "Consent Denied Click" trigger you created earlier.
       1. Save and publish the tag.
    1. Implementing the consent banner

       Ensure your consent banner HTML includes buttons with IDs or classes that can be used to identify the elements for the GTM triggers.

- **Example 2: Updating consent modes using custom events**

  - **Send custom events on user choices to GTM's data layer**

    If you already are listening to user privacy choices and control JavaScript on your page, you may choose to leverage custom events that are sent to GTMs data layer and that can be used as custom event triggers in your GTM workspace.

  - **Example consent banner HTML**
    ```
    <div id="consent-banner"> <p>We use cookies to improve your experience. Do you accept?</p> <button id="consent-yes">Yes</button> <button id="consent-no">No</button> </div>
    ```
    Assuming your consent banner looks like the above, a custom GTM event can be sent to GTM's data layer.

  - **jQuery**
    ```
    $('#consent-yes').click(function() { dataLayer.push({'event': 'consent_granted'}); });
    ```
  - **JavaScript**
    ```
    document.getElementById('consent-yes').addEventListener('click', function() { 
    dataLayer.push({'event': 'consent_granted'}); });
    ```
  - **Create User Interaction Triggers in GTM**

    You need to create triggers in GTM that fire when the user interacts with your consent banner (e.g., clicks "Yes" or "No").

    1. Click Trigger for "Yes"

       1. Go to **Triggers** in GTM and create a new trigger.
       1. Choose **Custom Events**.
       1. Choose a descriptive event name.
       1. Choose to listen to **Some Custom Events**.
       1. Select **Event** as the variable type.
       1. Choose your condition operator and provide your data layer event name from your custom JavaScript function.
       1. Name the trigger (e.g., "Consent Granted Click").
    1. Click Trigger for "No"

       1. Repeat the steps above for the "No" button (or equivalent) and name it (e.g., "Consent Denied Click").

  - **Create custom HTML tags for consent updates**

    Create two custom HTML tags in GTM to update the consent state based on user interaction.

    1. Custom HTML tag for granted consent

       1. Go to **Tags** and create a new tag.
       1. Choose **Custom HTML Tag**.
       1. Add the following script: 
       ```
       `<script> window.uetq = window.uetq || []; window.uetq.push('consent', 'update', { 'ad_storage': 'granted' }); </script>`
       ```
       1. Set the **Triggering** to the "Consent Granted Click" trigger you created earlier.
       1. Save and publish the tag.
    1. Custom HTML tag for denied consent:

       1. Repeat the steps above but change the script to: 
       ```
       `<script> window.uetq = window.uetq || []; window.uetq.push('consent', 'update', { 'ad_storage': 'denied' }); </script>`
       ```
       1. Set the **Triggering** to the "Consent Denied Click" trigger you created earlier.
       1. Save and publish the tag.

- **Example 3: Setting consent mode for Universal Event Tracker using a Google Tag Manager template**

  > [!IMPORTANT]
  > We suggest using the [official UET template installation](#official-uet-template-installation). Alternatively, you can use Google Tag Manager's custom template, which allows you to control the consent mode settings for the Universal Event Tracker.

  To toggle Universal Event Tracker's consent mode based on Consent Management Platform (CMP) user interactions, you can implement the following tag template in your Google Tag Manager account.

  - **Create a new template**

    First, we are going to create a new tag template that later can be used to generate custom tags.

    1. Create a new template

       1. Go to **Templates** in GTM and create a new template.
       1. In the **Info tab**, fill out the meta data for your custom template.
       1. Go to the **Code** tab, and paste the following code into the code field. 
       ```
       `// COPY START 
       const isConsentGranted = require('isConsentGranted'); 
       const addConsentListener = require('addConsentListener'); 
       const setInWindow = require('setInWindow'); 
       const callInWindow = require('callInWindow'); 
       const logToConsole = require('logToConsole'); 
       // UET consent update handler 
       const updateUetConsent = (consentType, granted) => { 
         setInWindow('uetq', [], false); 
         let consent = {}; 
         consent[consentType] = granted ? 'granted' : 'denied'; 
         logToConsole('GTM template updating UET consent:', consent); 
         callInWindow('uetq.push', 'consent', 'update', consent); 
       }; 
       // set UET consent default 
       setInWindow('uetq', [], false); 
       callInWindow('uetq.push', 'consent', 'default', { 'ad_storage': 'denied' }); 
       // update UET consent on ad_storage consent changes 
       addConsentListener('ad_storage', updateUetConsent); 
       // update UET consent if pre-existing ad_storage consent 
       if (isConsentGranted('ad_storage')) { 
         logToConsole('GTM template detected pre-existing ad_storage consent granted'); 
         updateUetConsent('ad_storage', 'granted'); 
       } 
       data.gtmOnSuccess(); 
       // COPY END`
      ```
       1. Go to the **Permission** tab, and make sure the following permissions are granted.

          1. **Accesses consent state** with read permissions for the consent type ad_storage
          1. **Access global variables** for the keys uetq (read & write) and uetq.push (execute)
          1. **Logs to console** with the limitation to only log during debug and preview
       1. Test your template and save it if all tests have been successful

  - **Create a new tag based on the template**

    After you have created your new template, you can proceed to create a new tag.

    1. Create a new Tag

       1. Go to **Tags** in GTM and create a new tag.
       1. Select **Tag Configuration** and select your newly created template under the **Custom** category.
       1. Define a **Trigger** for your tag. Preferably, this should be the same trigger as your Universal Event Tracker Base tag trigger or All Page Views.
       1. Save your tag.
       1. Publish the changes to your container.

- **Example 4: Controlling Universal Event Tracker fires with Google Tag Manager's consent requirement**

  > [!IMPORTANT]
  > This approach may prevent Universal Event Tracker from measuring events in the absence of consent. Universal Event Tracker can be loaded on pages with the applicable consent settings to avoid the usage of personal data in the absence of consent. Please refer to Example #3 for further reference.

  If you work with a [CMP that is supporting Google's consent mode feature](https://go.microsoft.com/fwlink/?linkid=2289905), you may choose to only fire Microsoft's Universal Event Tracker if a user has granted consent to given purposes.

  1. Edit Universal Event Tracker consent setting

     1. Go to **Tags** in GTM and select your Universal Event Tracker.
     1. Choose **Tag Configuration** and **Edit** the existing tag.
     1. Expand the **Advanced Settings**.
     1. Expand the **Consent Settings** section.
     1. Select **Require additional consent for tag to fire**.
     1. Select the necessary purposes, such as *ad_storage*.
     1. Save your changes.

  > [!IMPORTANT]
  > This will cause Universal Event Tracker to only measure events in cases where users have granted consent to the *ad_storage* purpose via your CMP provider.

  **Testing and debugging**

  1. **Preview Mode in GTM**: Use GTM's preview mode to test the triggers and tags.
  1. **Check Console**: Open the browser console to check if the consent updates are being pushed correctly.

  By following these steps, you can dynamically update the consent settings based on user interactions using GTM. This method ensures that the user's consent preferences are honored in real-time, providing a compliant and user-friendly experience.

- **Example 5: For customers who have been managing consent and *ad_storage* correctly, but are facing challenges enabling consent with Microsoft Advertising, please use the solution below**

  > [!IMPORTANT]
  > We recommend this solution for customers who manage General Data Protection Regulation (GDPR) consent appropriately and load the UET JavaScript code only after users have provided their consent.

  > [!NOTE]
  > The most important part of this example is the custom trigger. Please use a trigger to ensure that the custom HTML tag below is fired only if consent is received.

  ```
  <script> 
  window.uetq = window.uetq || []; 
  window.uetq.push('consent', 'update', { 
  'ad_storage': 'granted' }); 
  </script>
  ```

  :::image type="content" source="media/BA_Conc_UET_DynamicConsentGTM_CustomTrigger.png" alt-text="Customer trigger GTM.":::
