---
title: PerformanceInsightsMessageTemplateId Value Set - Ad Insight
ms.service: bing-ads-ad-insight-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the message template ID for performance insights.
---
# PerformanceInsightsMessageTemplateId Value Set - Ad Insight
Defines the message template ID for performance insights.

## Syntax
```xml
<xs:simpleType name="PerformanceInsightsMessageTemplateId" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="FluxImprIncreaseAcct">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxImprDecreaseAcct">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxImprIncreaseInfinityAcct">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxImprIncreaseAcctPrevDay">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxImprDecreaseAcctPrevDay">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">5</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxImprIncreaseInfinityAcctPrevDay">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">6</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxClickIncreaseAcct">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">7</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxClickDecreaseAcct">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">8</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxClickIncreaseInfinityAcct">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">9</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxClickIncreaseAcctPrevDay">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">10</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxClickDecreaseAcctPrevDay">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">11</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxClickIncreaseInfinityAcctPrevDay">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">12</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxCostIncreaseAcct">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">13</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxCostDecreaseAcct">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">14</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxCostIncreaseInfinityAcct">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">15</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxCostIncreaseAcctPrevDay">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">16</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxCostDecreaseAcctPrevDay">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">17</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxCostIncreaseInfinityAcctPrevDay">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">18</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxImprIncreaseCampaign">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">19</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxImprDecreaseCampaign">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">20</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxImprIncreaseInfinityCampaign">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">21</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxImprIncreaseCampaignPrevDay">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">22</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxImprDecreaseCampaignPrevDay">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">23</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxImprIncreaseInfinityCampaignPrevDay">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">24</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxClickIncreaseCampaign">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">25</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxClickDecreaseCampaign">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">26</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxClickIncreaseInfinityCampaign">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">27</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxClickIncreaseCampaignPrevDay">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">28</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxClickDecreaseCampaignPrevDay">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">29</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxClickIncreaseInfinityCampaignPrevDay">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">30</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxCostIncreaseCampaign">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">31</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxCostDecreaseCampaign">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">32</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxCostIncreaseInfinityCampaign">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">33</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxCostIncreaseCampaignPrevDay">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">34</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxCostDecreaseCampaignPrevDay">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">35</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxCostIncreaseInfinityCampaignPrevDay">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">36</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxConversionDecreaseAcct">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">37</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FluxConversionZeroAcct">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">38</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCAudienceIncrease">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">39</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCAudienceDecrease">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">40</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCBidIncrease">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">41</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCBidDecrease">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">42</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCBudgetIncrease">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">43</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCBudgetDecrease">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">44</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCClickIncrease">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">45</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCClickDecrease">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">46</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCConversionGoalIssue">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">47</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCDeviceTargetingBidChange">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">48</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCEditorialApproval">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">49</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCEditorialDisapproval">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">50</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCEntityAdditionWithCount">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">51</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCEntityDeletionWithCount">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">52</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCEntityPauseWithCount">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">53</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCEntityUnpauseWithCount">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">54</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCMoreCompetitive">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">55</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCNetworkLessRestrict">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">56</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCNetworkMoreRestrict">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">57</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCPaymentIssueInvoiceAccountPaused">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">58</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCPaymentIssueInvoiceAccountOnHold">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">59</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCPaymentIssuePrepayAccountPaused">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">60</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCPaymentIssueThresholdAccountOnHold">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">61</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCPaymentIssueYesterday">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">62</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCSearchTermIncrease">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">63</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCSearchTermIncreaseClick">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">64</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCSearchTermDecrease">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">65</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCSearchTermDecreaseClick">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">66</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCSearchTermCompetitionIncrease">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">67</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCSearchTermCompetitionIncreaseClick">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">68</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCSearchTermCompetitionDecrease">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">69</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCSearchTermCompetitionDecreaseClick">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">70</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCSingleCampaignAddition">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">71</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCSingleCampaignPause">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">72</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCSingleCampaignUnpause">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">73</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCSingleCampaignBudgetIncrease">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">74</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCSingleCampaignBudgetDecrease">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">75</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCSingleCampaignDeviceTargetingBidChange">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">76</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCStrongerCompetitorAdQuality">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">77</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCStrongerCompetitorBid">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">78</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCSyndTrafficIncrease">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">79</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RCSyndTrafficDecrease">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">80</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActAdsOppr">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">81</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActAllAvailableOppr">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">82</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActBMAdoptionOppr">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">83</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActBMMKeywordOppr">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">84</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActCampaignContextKeywordOppr">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">85</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActCheckPublisherWebsite">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">86</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActCompetitionAuctionInsight">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">87</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActCompetitiveBudgetOppr">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">88</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActCompetitiveKeywordOppr">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">89</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActCompetitiveLocationTargetOppr">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">90</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActCTRQualityBundle">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">91</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActEditorialReviewProcess">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">92</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActFixConversionGoalSettingOppr">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">93</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActFixConversionTrackingOppr">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">94</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActGeneralBudgetOppr">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">95</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActNewConversionGoalOppr">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">96</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActInvoiceAccountPaused">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">97</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActInvoiceAccountOnHold">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">98</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActPrepayAccountPaused">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">99</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActReallocateBudgetOppr">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">100</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActRepairKeywordsOppr">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">101</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActRSAOppr">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">102</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActSearchTerm">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">103</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActSetupConversionTrackingOppr">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">104</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActSiteLinkOppr">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">105</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActThresholdAccountOnHold">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">106</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ActWebsiteExclusion">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">107</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [PerformanceInsightsMessageTemplateId](performanceinsightsmessagetemplateid.md) value set has the following values: [ActAdsOppr](#actadsoppr), [ActAllAvailableOppr](#actallavailableoppr), [ActBMAdoptionOppr](#actbmadoptionoppr), [ActBMMKeywordOppr](#actbmmkeywordoppr), [ActCampaignContextKeywordOppr](#actcampaigncontextkeywordoppr), [ActCheckPublisherWebsite](#actcheckpublisherwebsite), [ActCompetitionAuctionInsight](#actcompetitionauctioninsight), [ActCompetitiveBudgetOppr](#actcompetitivebudgetoppr), [ActCompetitiveKeywordOppr](#actcompetitivekeywordoppr), [ActCompetitiveLocationTargetOppr](#actcompetitivelocationtargetoppr), [ActCTRQualityBundle](#actctrqualitybundle), [ActEditorialReviewProcess](#acteditorialreviewprocess), [ActFixConversionGoalSettingOppr](#actfixconversiongoalsettingoppr), [ActFixConversionTrackingOppr](#actfixconversiontrackingoppr), [ActGeneralBudgetOppr](#actgeneralbudgetoppr), [ActInvoiceAccountOnHold](#actinvoiceaccountonhold), [ActInvoiceAccountPaused](#actinvoiceaccountpaused), [ActNewConversionGoalOppr](#actnewconversiongoaloppr), [ActPrepayAccountPaused](#actprepayaccountpaused), [ActReallocateBudgetOppr](#actreallocatebudgetoppr), [ActRepairKeywordsOppr](#actrepairkeywordsoppr), [ActRSAOppr](#actrsaoppr), [ActSearchTerm](#actsearchterm), [ActSetupConversionTrackingOppr](#actsetupconversiontrackingoppr), [ActSiteLinkOppr](#actsitelinkoppr), [ActThresholdAccountOnHold](#actthresholdaccountonhold), [ActWebsiteExclusion](#actwebsiteexclusion), [FluxClickDecreaseAcct](#fluxclickdecreaseacct), [FluxClickDecreaseAcctPrevDay](#fluxclickdecreaseacctprevday), [FluxClickDecreaseCampaign](#fluxclickdecreasecampaign), [FluxClickDecreaseCampaignPrevDay](#fluxclickdecreasecampaignprevday), [FluxClickIncreaseAcct](#fluxclickincreaseacct), [FluxClickIncreaseAcctPrevDay](#fluxclickincreaseacctprevday), [FluxClickIncreaseCampaign](#fluxclickincreasecampaign), [FluxClickIncreaseCampaignPrevDay](#fluxclickincreasecampaignprevday), [FluxClickIncreaseInfinityAcct](#fluxclickincreaseinfinityacct), [FluxClickIncreaseInfinityAcctPrevDay](#fluxclickincreaseinfinityacctprevday), [FluxClickIncreaseInfinityCampaign](#fluxclickincreaseinfinitycampaign), [FluxClickIncreaseInfinityCampaignPrevDay](#fluxclickincreaseinfinitycampaignprevday), [FluxConversionDecreaseAcct](#fluxconversiondecreaseacct), [FluxConversionZeroAcct](#fluxconversionzeroacct), [FluxCostDecreaseAcct](#fluxcostdecreaseacct), [FluxCostDecreaseAcctPrevDay](#fluxcostdecreaseacctprevday), [FluxCostDecreaseCampaign](#fluxcostdecreasecampaign), [FluxCostDecreaseCampaignPrevDay](#fluxcostdecreasecampaignprevday), [FluxCostIncreaseAcct](#fluxcostincreaseacct), [FluxCostIncreaseAcctPrevDay](#fluxcostincreaseacctprevday), [FluxCostIncreaseCampaign](#fluxcostincreasecampaign), [FluxCostIncreaseCampaignPrevDay](#fluxcostincreasecampaignprevday), [FluxCostIncreaseInfinityAcct](#fluxcostincreaseinfinityacct), [FluxCostIncreaseInfinityAcctPrevDay](#fluxcostincreaseinfinityacctprevday), [FluxCostIncreaseInfinityCampaign](#fluxcostincreaseinfinitycampaign), [FluxCostIncreaseInfinityCampaignPrevDay](#fluxcostincreaseinfinitycampaignprevday), [FluxImprDecreaseAcct](#fluximprdecreaseacct), [FluxImprDecreaseAcctPrevDay](#fluximprdecreaseacctprevday), [FluxImprDecreaseCampaign](#fluximprdecreasecampaign), [FluxImprDecreaseCampaignPrevDay](#fluximprdecreasecampaignprevday), [FluxImprIncreaseAcct](#fluximprincreaseacct), [FluxImprIncreaseAcctPrevDay](#fluximprincreaseacctprevday), [FluxImprIncreaseCampaign](#fluximprincreasecampaign), [FluxImprIncreaseCampaignPrevDay](#fluximprincreasecampaignprevday), [FluxImprIncreaseInfinityAcct](#fluximprincreaseinfinityacct), [FluxImprIncreaseInfinityAcctPrevDay](#fluximprincreaseinfinityacctprevday), [FluxImprIncreaseInfinityCampaign](#fluximprincreaseinfinitycampaign), [FluxImprIncreaseInfinityCampaignPrevDay](#fluximprincreaseinfinitycampaignprevday), [RCAudienceDecrease](#rcaudiencedecrease), [RCAudienceIncrease](#rcaudienceincrease), [RCBidDecrease](#rcbiddecrease), [RCBidIncrease](#rcbidincrease), [RCBudgetDecrease](#rcbudgetdecrease), [RCBudgetIncrease](#rcbudgetincrease), [RCClickDecrease](#rcclickdecrease), [RCClickIncrease](#rcclickincrease), [RCConversionGoalIssue](#rcconversiongoalissue), [RCDeviceTargetingBidChange](#rcdevicetargetingbidchange), [RCEditorialApproval](#rceditorialapproval), [RCEditorialDisapproval](#rceditorialdisapproval), [RCEntityAdditionWithCount](#rcentityadditionwithcount), [RCEntityDeletionWithCount](#rcentitydeletionwithcount), [RCEntityPauseWithCount](#rcentitypausewithcount), [RCEntityUnpauseWithCount](#rcentityunpausewithcount), [RCMoreCompetitive](#rcmorecompetitive), [RCNetworkLessRestrict](#rcnetworklessrestrict), [RCNetworkMoreRestrict](#rcnetworkmorerestrict), [RCPaymentIssueInvoiceAccountOnHold](#rcpaymentissueinvoiceaccountonhold), [RCPaymentIssueInvoiceAccountPaused](#rcpaymentissueinvoiceaccountpaused), [RCPaymentIssuePrepayAccountPaused](#rcpaymentissueprepayaccountpaused), [RCPaymentIssueThresholdAccountOnHold](#rcpaymentissuethresholdaccountonhold), [RCPaymentIssueYesterday](#rcpaymentissueyesterday), [RCSearchTermCompetitionDecrease](#rcsearchtermcompetitiondecrease), [RCSearchTermCompetitionDecreaseClick](#rcsearchtermcompetitiondecreaseclick), [RCSearchTermCompetitionIncrease](#rcsearchtermcompetitionincrease), [RCSearchTermCompetitionIncreaseClick](#rcsearchtermcompetitionincreaseclick), [RCSearchTermDecrease](#rcsearchtermdecrease), [RCSearchTermDecreaseClick](#rcsearchtermdecreaseclick), [RCSearchTermIncrease](#rcsearchtermincrease), [RCSearchTermIncreaseClick](#rcsearchtermincreaseclick), [RCSingleCampaignAddition](#rcsinglecampaignaddition), [RCSingleCampaignBudgetDecrease](#rcsinglecampaignbudgetdecrease), [RCSingleCampaignBudgetIncrease](#rcsinglecampaignbudgetincrease), [RCSingleCampaignDeviceTargetingBidChange](#rcsinglecampaigndevicetargetingbidchange), [RCSingleCampaignPause](#rcsinglecampaignpause), [RCSingleCampaignUnpause](#rcsinglecampaignunpause), [RCStrongerCompetitorAdQuality](#rcstrongercompetitoradquality), [RCStrongerCompetitorBid](#rcstrongercompetitorbid), [RCSyndTrafficDecrease](#rcsyndtrafficdecrease), [RCSyndTrafficIncrease](#rcsyndtrafficincrease).

|Value|Description|
|-----------|---------------|
|<a name="actadsoppr"></a>ActAdsOppr|Adopting Expanded Text Ads that have been optimized just for you.|
|<a name="actallavailableoppr"></a>ActAllAvailableOppr|View customized recommendations for your campaign. |
|<a name="actbmadoptionoppr"></a>ActBMAdoptionOppr|View a customized recommendation to increase visits to your website. |
|<a name="actbmmkeywordoppr"></a>ActBMMKeywordOppr|View a customized recommendation to increase visits to your website. |
|<a name="actcampaigncontextkeywordoppr"></a>ActCampaignContextKeywordOppr|View a customized recommendation to increase visits to your website. |
|<a name="actcheckpublisherwebsite"></a>ActCheckPublisherWebsite|Check the publisher report to review the performance of sites that show your ads. |
|<a name="actcompetitionauctioninsight"></a>ActCompetitionAuctionInsight|Check the auction insights report to review the performance of sites that show your ads. |
|<a name="actcompetitivebudgetoppr"></a>ActCompetitiveBudgetOppr|Boost your budgets to prevent competitors from gaining impression share.|
|<a name="actcompetitivekeywordoppr"></a>ActCompetitiveKeywordOppr|View a customized recommendation to increase visits to your website.|
|<a name="actcompetitivelocationtargetoppr"></a>ActCompetitiveLocationTargetOppr|View a customized recommendation to increase visits to your website.|
|<a name="actctrqualitybundle"></a>ActCTRQualityBundle|Improve the click-through rate of your ads by:|
|<a name="acteditorialreviewprocess"></a>ActEditorialReviewProcess|Ensure your ad and keyword text comply with Microsoft Advertising policies. |
|<a name="actfixconversiongoalsettingoppr"></a>ActFixConversionGoalSettingOppr|Fix your conversion goal setting to make sure you don’t miss any conversions. |
|<a name="actfixconversiontrackingoppr"></a>ActFixConversionTrackingOppr|Make sure you don't miss any conversions by fixing your UET tag.|
|<a name="actgeneralbudgetoppr"></a>ActGeneralBudgetOppr|Ensure budget issues don't prevent your ads from showing. |
|<a name="actinvoiceaccountonhold"></a>ActInvoiceAccountOnHold|You need to remove the hold before your ads can run.|
|<a name="actinvoiceaccountpaused"></a>ActInvoiceAccountPaused|You need an active insertion order before your ads can run.|
|<a name="actnewconversiongoaloppr"></a>ActNewConversionGoalOppr|Create conversion goals to track more conversions.|
|<a name="actprepayaccountpaused"></a>ActPrepayAccountPaused|You need to add funds to this prepay account before your ads can run.|
|<a name="actreallocatebudgetoppr"></a>ActReallocateBudgetOppr|Get more traffic by moving unused budget to campaigns that need it.|
|<a name="actrepairkeywordsoppr"></a>ActRepairKeywordsOppr|Get your ads running again by adding active keywords to your ad group.|
|<a name="actrsaoppr"></a>ActRSAOppr|Adopt responsive search ads, which automatically optimize themselves.|
|<a name="actsearchterm"></a>ActSearchTerm|Check the search term report to review the queries that lead to clicks on your ads.|
|<a name="actsetupconversiontrackingoppr"></a>ActSetupConversionTrackingOppr|Set up conversion tracking to convert more customers and use automated bidding.|
|<a name="actsitelinkoppr"></a>ActSiteLinkOppr|Add sitelink extensions to make your ads more appealing.|
|<a name="actthresholdaccountonhold"></a>ActThresholdAccountOnHold|You need to remove the hold before your ads can run.|
|<a name="actwebsiteexclusion"></a>ActWebsiteExclusion|Utilize website exclusions to prevent specific websites from showing your ads.|
|<a name="fluxclickdecreaseacct"></a>FluxClickDecreaseAcct|Your account's clicks decreased {0}% compared to the past 7 day average.|
|<a name="fluxclickdecreaseacctprevday"></a>FluxClickDecreaseAcctPrevDay|Your account's clicks decreased {0}% compared to the previous day.|
|<a name="fluxclickdecreasecampaign"></a>FluxClickDecreaseCampaign|Your campaign's clicks decreased {0}% compared to the past 7 day average.|
|<a name="fluxclickdecreasecampaignprevday"></a>FluxClickDecreaseCampaignPrevDay|Your campaign's clicks decreased {0}% compared to the previous day.|
|<a name="fluxclickincreaseacct"></a>FluxClickIncreaseAcct|Your account's clicks increased {0}% compared to the past 7 day average.|
|<a name="fluxclickincreaseacctprevday"></a>FluxClickIncreaseAcctPrevDay|Your account's clicks increased {0}% compared to the previous day.|
|<a name="fluxclickincreasecampaign"></a>FluxClickIncreaseCampaign|Your campaign's clicks increased {0}% compared to the past 7 day average.|
|<a name="fluxclickincreasecampaignprevday"></a>FluxClickIncreaseCampaignPrevDay|Your campaign's clicks increased {0}% compared to the previous day.|
|<a name="fluxclickincreaseinfinityacct"></a>FluxClickIncreaseInfinityAcct|Your account's clicks increased compared to the past 7 day average.|
|<a name="fluxclickincreaseinfinityacctprevday"></a>FluxClickIncreaseInfinityAcctPrevDay|Your account's clicks increased compared to the previous day.|
|<a name="fluxclickincreaseinfinitycampaign"></a>FluxClickIncreaseInfinityCampaign|Your campaign's clicks increased compared to the past 7 day average.|
|<a name="fluxclickincreaseinfinitycampaignprevday"></a>FluxClickIncreaseInfinityCampaignPrevDay|Your campaign's clicks increased compared to the previous day.|
|<a name="fluxconversiondecreaseacct"></a>FluxConversionDecreaseAcct|Your conversions have decreased week-over-week due to a conversion issue.|
|<a name="fluxconversionzeroacct"></a>FluxConversionZeroAcct|You have zero conversions over the past 14 days due to a conversion issue.|
|<a name="fluxcostdecreaseacct"></a>FluxCostDecreaseAcct|Your account's spend decreased {0}% compared to the average of past 7 days.|
|<a name="fluxcostdecreaseacctprevday"></a>FluxCostDecreaseAcctPrevDay|Your account's spend decreased {0}% compared to the previous day.|
|<a name="fluxcostdecreasecampaign"></a>FluxCostDecreaseCampaign|Your campaign's spend decreased {0}% compared to the average of past 7 days.|
|<a name="fluxcostdecreasecampaignprevday"></a>FluxCostDecreaseCampaignPrevDay|Your campaign's spend decreased {0}% compared to the previous day.|
|<a name="fluxcostincreaseacct"></a>FluxCostIncreaseAcct|Your account's spend increased {0}% compared to the average of past 7 days.|
|<a name="fluxcostincreaseacctprevday"></a>FluxCostIncreaseAcctPrevDay|Your account's spend increased {0}% compared to the previous day.|
|<a name="fluxcostincreasecampaign"></a>FluxCostIncreaseCampaign|Your campaign's spend increased {0}% compared to the average of past 7 days.|
|<a name="fluxcostincreasecampaignprevday"></a>FluxCostIncreaseCampaignPrevDay|Your campaign's spend increased {0}% compared to the previous day.|
|<a name="fluxcostincreaseinfinityacct"></a>FluxCostIncreaseInfinityAcct|Your account's spend increased compared to the average of past 7 days.|
|<a name="fluxcostincreaseinfinityacctprevday"></a>FluxCostIncreaseInfinityAcctPrevDay|Your account's spend increased compared to the previous day.|
|<a name="fluxcostincreaseinfinitycampaign"></a>FluxCostIncreaseInfinityCampaign|Your campaign's spend increased compared to the average of past 7 days.|
|<a name="fluxcostincreaseinfinitycampaignprevday"></a>FluxCostIncreaseInfinityCampaignPrevDay|Your campaign's spend increased compared to the previous day.|
|<a name="fluximprdecreaseacct"></a>FluxImprDecreaseAcct|Your account's impressions decreased {0}% compared to the past 7 day average.|
|<a name="fluximprdecreaseacctprevday"></a>FluxImprDecreaseAcctPrevDay|Your account's impressions decreased {0}% compared to the previous day.|
|<a name="fluximprdecreasecampaign"></a>FluxImprDecreaseCampaign|Your campaign's impressions decreased {0}% compared to the past 7 day average.|
|<a name="fluximprdecreasecampaignprevday"></a>FluxImprDecreaseCampaignPrevDay|Your campaign's impressions decreased {0}% compared to the previous day.|
|<a name="fluximprincreaseacct"></a>FluxImprIncreaseAcct|Your account's impressions increased {0}% compared to the past 7 day average.|
|<a name="fluximprincreaseacctprevday"></a>FluxImprIncreaseAcctPrevDay|Your account's impressions increased {0}% compared to the previous day.|
|<a name="fluximprincreasecampaign"></a>FluxImprIncreaseCampaign|Your campaign's impressions increased {0}% compared to the past 7 day average.|
|<a name="fluximprincreasecampaignprevday"></a>FluxImprIncreaseCampaignPrevDay|Your campaign's impressions increased {0}% compared to the previous day.|
|<a name="fluximprincreaseinfinityacct"></a>FluxImprIncreaseInfinityAcct|Your account's impressions increased compared to the past 7 day average.|
|<a name="fluximprincreaseinfinityacctprevday"></a>FluxImprIncreaseInfinityAcctPrevDay|Your account's impressions increased compared to the previous day.|
|<a name="fluximprincreaseinfinitycampaign"></a>FluxImprIncreaseInfinityCampaign|Your campaign's impressions increased compared to the past 7 day average.|
|<a name="fluximprincreaseinfinitycampaignprevday"></a>FluxImprIncreaseInfinityCampaignPrevDay|Your campaign's impressions increased compared to the previous day.|
|<a name="rcaudiencedecrease"></a>RCAudienceDecrease|Decreased Microsoft Audience ads traffic. {0}.|
|<a name="rcaudienceincrease"></a>RCAudienceIncrease|Increased Microsoft Audience ads traffic.|
|<a name="rcbiddecrease"></a>RCBidDecrease|Your bids for {0} were decreased.|
|<a name="rcbidincrease"></a>RCBidIncrease|Your bids for {0} were increased.|
|<a name="rcbudgetdecrease"></a>RCBudgetDecrease|{0} budgets were decreased.|
|<a name="rcbudgetincrease"></a>RCBudgetIncrease|{0} budgets were increased.|
|<a name="rcclickdecrease"></a>RCClickDecrease|This resulted in clicks decreasing by {0} during the same period.|
|<a name="rcclickincrease"></a>RCClickIncrease|This resulted in clicks increasing by {0} during the same period.|
|<a name="rcconversiongoalissue"></a>RCConversionGoalIssue|Your conversion goal has a blocking issue.|
|<a name="rcdevicetargetingbidchange"></a>RCDeviceTargetingBidChange|{0} device target bid adjustments were changed.|
|<a name="rceditorialapproval"></a>RCEditorialApproval|{0} passed the Microsoft Advertising policy review.|
|<a name="rceditorialdisapproval"></a>RCEditorialDisapproval|{0} were disapproved by Microsoft Advertising policy review.|
|<a name="rcentityadditionwithcount"></a>RCEntityAdditionWithCount|{0} were added.|
|<a name="rcentitydeletionwithcount"></a>RCEntityDeletionWithCount|{0} were deleted.|
|<a name="rcentitypausewithcount"></a>RCEntityPauseWithCount|{0} were paused.|
|<a name="rcentityunpausewithcount"></a>RCEntityUnpauseWithCount|{0} were enabled.|
|<a name="rcmorecompetitive"></a>RCMoreCompetitive|Your ads were outcompeting your competitors' ads in terms of bid amounts and/or ad quality.|
|<a name="rcnetworklessrestrict"></a>RCNetworkLessRestrict|{0} ad distribution settings became less restrictive.|
|<a name="rcnetworkmorerestrict"></a>RCNetworkMoreRestrict|{0} ad distribution settings became more restrictive.|
|<a name="rcpaymentissueinvoiceaccountonhold"></a>RCPaymentIssueInvoiceAccountOnHold|Your account was placed on hold because we haven’t received one or more of your invoiced payments.|
|<a name="rcpaymentissueinvoiceaccountpaused"></a>RCPaymentIssueInvoiceAccountPaused|Your account was paused due to lack of a valid insertion order.|
|<a name="rcpaymentissueprepayaccountpaused"></a>RCPaymentIssuePrepayAccountPaused|Your account was paused due to a zero balance.|
|<a name="rcpaymentissuethresholdaccountonhold"></a>RCPaymentIssueThresholdAccountOnHold|Your account was placed on hold because a payment failed to authorize.|
|<a name="rcpaymentissueyesterday"></a>RCPaymentIssueYesterday|Your previous payment issue was resolved.|
|<a name="rcsearchtermcompetitiondecrease"></a>RCSearchTermCompetitionDecrease|{0} were searched less frequently. Your impression share rank also decreased, indicating a decrease in your competitiveness for these terms.|
|<a name="rcsearchtermcompetitiondecreaseclick"></a>RCSearchTermCompetitionDecreaseClick|{0} related to your campaigns were searched less frequently. Your impression share rank also decreased, indicating a decrease in your competitiveness for these terms.|
|<a name="rcsearchtermcompetitionincrease"></a>RCSearchTermCompetitionIncrease|{0} were searched more frequently. Your impression share rank also increased, indicating an increase in your competitiveness for these terms.|
|<a name="rcsearchtermcompetitionincreaseclick"></a>RCSearchTermCompetitionIncreaseClick|{0} related to your campaigns were searched more frequently. Your impression share rank also increased, indicating an increase in your competitiveness for these terms.|
|<a name="rcsearchtermdecrease"></a>RCSearchTermDecrease|{0} were searched less frequently.|
|<a name="rcsearchtermdecreaseclick"></a>RCSearchTermDecreaseClick|{0} related to your campaigns were searched less frequently.|
|<a name="rcsearchtermincrease"></a>RCSearchTermIncrease|{0} were searched more frequently.|
|<a name="rcsearchtermincreaseclick"></a>RCSearchTermIncreaseClick|{0} related to your campaigns were searched more frequently.|
|<a name="rcsinglecampaignaddition"></a>RCSingleCampaignAddition|Your campaign was added.|
|<a name="rcsinglecampaignbudgetdecrease"></a>RCSingleCampaignBudgetDecrease|Your campaign budget was decreased.|
|<a name="rcsinglecampaignbudgetincrease"></a>RCSingleCampaignBudgetIncrease|Your campaign budget was increased..|
|<a name="rcsinglecampaigndevicetargetingbidchange"></a>RCSingleCampaignDeviceTargetingBidChange|Your campaign's device target bid adjustment was changed.|
|<a name="rcsinglecampaignpause"></a>RCSingleCampaignPause|Your campaign was paused.|
|<a name="rcsinglecampaignunpause"></a>RCSingleCampaignUnpause|Your campaign was enabled.|
|<a name="rcstrongercompetitoradquality"></a>RCStrongerCompetitorAdQuality|Your competitors' impression share increased due to improved quality scores.|
|<a name="rcstrongercompetitorbid"></a>RCStrongerCompetitorBid|Your competitors' impression share increased due to increased bid amounts.|
|<a name="rcsyndtrafficdecrease"></a>RCSyndTrafficDecrease|Decreased syndication partner traffic from {0}.|
|<a name="rcsyndtrafficincrease"></a>RCSyndTrafficIncrease|Increased syndication partner traffic from {0}.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[PerformanceInsightsMessage](performanceinsightsmessage.md)  
