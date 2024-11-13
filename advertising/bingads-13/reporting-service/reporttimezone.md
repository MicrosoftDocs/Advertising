---
title: ReportTimeZone Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines possible values for the time zone that you want the Reporting service to use for the selected date range.
---
# ReportTimeZone Value Set - Reporting
Defines possible values for the time zone that you want the Reporting service to use for the selected date range.

## Syntax
```xml
<xs:simpleType name="ReportTimeZone" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Nukualofa">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FijiKamchatkaMarshallIsland">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="AucklandWellington">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="MagadanSolomonIslandNewCaledonia">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Vladivostok">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">5</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Hobart">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">6</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="GuamPortMoresby">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">7</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="CanberraMelbourneSydney">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">8</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Brisbane">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">9</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Darwin">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">10</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Adelaide">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">11</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Yakutsk">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">12</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Seoul">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">13</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="OsakaSapporoTokyo">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">14</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Taipei">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">15</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Perth">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">16</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="KualaLumpurSingapore">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">17</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="IrkutskUlaanBataar">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">18</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="BeijingChongqingHongKongUrumqi">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">19</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Krasnoyarsk">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">20</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="BangkokHanoiJakarta">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">21</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Rangoon">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">22</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="SriJayawardenepura">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">23</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="AstanaDhaka">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">24</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="AlmatyNovosibirsk">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">25</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Kathmandu">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">26</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ChennaiKolkataMumbaiNewDelhi">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">27</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="IslandamabadKarachiTashkent">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">28</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Ekaterinburg">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">29</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Kabul">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">30</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="BakuTbilisiYerevan">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">31</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="AbuDhabiMuscat">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">32</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Tehran">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">33</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Nairobi">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">34</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="MoscowStPetersburgVolgograd">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">35</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="KuwaitRiyadh">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">36</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Baghdad">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">37</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Jerusalem">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">38</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="HelsinkiKyivRigaSofiaTallinnVilnius">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">39</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="HararePretoria">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">40</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Cairo">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">41</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Bucharest">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">42</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="AthensIslandanbulMinsk">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">43</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="WestCentralAfrica">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">44</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="SarajevoSkopjeWarsawZagreb">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">45</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="BrusselsCopenhagenMadridParis">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">46</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="BelgradeBratislavaBudapestLjubljanaPrague">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">47</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="AmsterdamBerlinBernRomeStockholmVienna">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">48</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="CasablancaMonrovia">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">49</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="GreenwichMeanTimeDublinEdinburghLisbonLondon">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">50</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Azores">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">51</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="CapeVerdeIsland">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">52</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="MidAtlantic">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">53</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Brasilia">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">54</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="BuenosAiresGeorgetown">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">55</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Greenland">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">56</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Newfoundland">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">57</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="AtlanticTimeCanada">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">58</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="CaracasLaPaz">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">59</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Santiago">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">60</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="BogotaLimaQuito">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">61</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="EasternTimeUSCanada">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">62</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="IndianaEast">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">63</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="CentralAmerica">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">64</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="CentralTimeUSCanada">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">65</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="GuadalajaraMexicoCityMonterrey">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">66</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Saskatchewan">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">67</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Arizona">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">68</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ChihuahuaLaPazMazatlan">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">69</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="MountainTimeUSCanada">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">70</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="PacificTimeUSCanadaTijuana">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">71</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Alaska">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">72</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Hawaii">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">73</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="MidwayIslandandSamoa">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">74</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="InternationalDateLineWest">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">75</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ReportTimeZone](reporttimezone.md) value set has the following values: [AbuDhabiMuscat](#abudhabimuscat), [Adelaide](#adelaide), [Alaska](#alaska), [AlmatyNovosibirsk](#almatynovosibirsk), [AmsterdamBerlinBernRomeStockholmVienna](#amsterdamberlinbernromestockholmvienna), [Arizona](#arizona), [AstanaDhaka](#astanadhaka), [AthensIslandanbulMinsk](#athensislandanbulminsk), [AtlanticTimeCanada](#atlantictimecanada), [AucklandWellington](#aucklandwellington), [Azores](#azores), [Baghdad](#baghdad), [BakuTbilisiYerevan](#bakutbilisiyerevan), [BangkokHanoiJakarta](#bangkokhanoijakarta), [BeijingChongqingHongKongUrumqi](#beijingchongqinghongkongurumqi), [BelgradeBratislavaBudapestLjubljanaPrague](#belgradebratislavabudapestljubljanaprague), [BogotaLimaQuito](#bogotalimaquito), [Brasilia](#brasilia), [Brisbane](#brisbane), [BrusselsCopenhagenMadridParis](#brusselscopenhagenmadridparis), [Bucharest](#bucharest), [BuenosAiresGeorgetown](#buenosairesgeorgetown), [Cairo](#cairo), [CanberraMelbourneSydney](#canberramelbournesydney), [CapeVerdeIsland](#capeverdeisland), [CaracasLaPaz](#caracaslapaz), [CasablancaMonrovia](#casablancamonrovia), [CentralAmerica](#centralamerica), [CentralTimeUSCanada](#centraltimeuscanada), [ChennaiKolkataMumbaiNewDelhi](#chennaikolkatamumbainewdelhi), [ChihuahuaLaPazMazatlan](#chihuahualapazmazatlan), [Darwin](#darwin), [EasternTimeUSCanada](#easterntimeuscanada), [Ekaterinburg](#ekaterinburg), [FijiKamchatkaMarshallIsland](#fijikamchatkamarshallisland), [Greenland](#greenland), [GreenwichMeanTimeDublinEdinburghLisbonLondon](#greenwichmeantimedublinedinburghlisbonlondon), [GuadalajaraMexicoCityMonterrey](#guadalajaramexicocitymonterrey), [GuamPortMoresby](#guamportmoresby), [HararePretoria](#hararepretoria), [Hawaii](#hawaii), [HelsinkiKyivRigaSofiaTallinnVilnius](#helsinkikyivrigasofiatallinnvilnius), [Hobart](#hobart), [IndianaEast](#indianaeast), [InternationalDateLineWest](#internationaldatelinewest), [IrkutskUlaanBataar](#irkutskulaanbataar), [IslandamabadKarachiTashkent](#islandamabadkarachitashkent), [Jerusalem](#jerusalem), [Kabul](#kabul), [Kathmandu](#kathmandu), [Krasnoyarsk](#krasnoyarsk), [KualaLumpurSingapore](#kualalumpursingapore), [KuwaitRiyadh](#kuwaitriyadh), [MagadanSolomonIslandNewCaledonia](#magadansolomonislandnewcaledonia), [MidAtlantic](#midatlantic), [MidwayIslandandSamoa](#midwayislandandsamoa), [MoscowStPetersburgVolgograd](#moscowstpetersburgvolgograd), [MountainTimeUSCanada](#mountaintimeuscanada), [Nairobi](#nairobi), [Newfoundland](#newfoundland), [Nukualofa](#nukualofa), [OsakaSapporoTokyo](#osakasapporotokyo), [PacificTimeUSCanadaTijuana](#pacifictimeuscanadatijuana), [Perth](#perth), [Rangoon](#rangoon), [Santiago](#santiago), [SarajevoSkopjeWarsawZagreb](#sarajevoskopjewarsawzagreb), [Saskatchewan](#saskatchewan), [Seoul](#seoul), [SriJayawardenepura](#srijayawardenepura), [Taipei](#taipei), [Tehran](#tehran), [Vladivostok](#vladivostok), [WestCentralAfrica](#westcentralafrica), [Yakutsk](#yakutsk).

|Value|Description|
|-----------|---------------|
|<a name="abudhabimuscat"></a>AbuDhabiMuscat|The corresponding report time zone.|
|<a name="adelaide"></a>Adelaide|The corresponding report time zone.|
|<a name="alaska"></a>Alaska|The corresponding report time zone.|
|<a name="almatynovosibirsk"></a>AlmatyNovosibirsk|The corresponding report time zone.|
|<a name="amsterdamberlinbernromestockholmvienna"></a>AmsterdamBerlinBernRomeStockholmVienna|The corresponding report time zone.|
|<a name="arizona"></a>Arizona|The corresponding report time zone.|
|<a name="astanadhaka"></a>AstanaDhaka|The corresponding report time zone.|
|<a name="athensislandanbulminsk"></a>AthensIslandanbulMinsk|The corresponding report time zone.|
|<a name="atlantictimecanada"></a>AtlanticTimeCanada|The corresponding report time zone.|
|<a name="aucklandwellington"></a>AucklandWellington|The corresponding report time zone.|
|<a name="azores"></a>Azores|The corresponding report time zone.|
|<a name="baghdad"></a>Baghdad|The corresponding report time zone.|
|<a name="bakutbilisiyerevan"></a>BakuTbilisiYerevan|The corresponding report time zone.|
|<a name="bangkokhanoijakarta"></a>BangkokHanoiJakarta|The corresponding report time zone.|
|<a name="beijingchongqinghongkongurumqi"></a>BeijingChongqingHongKongUrumqi|The corresponding report time zone.|
|<a name="belgradebratislavabudapestljubljanaprague"></a>BelgradeBratislavaBudapestLjubljanaPrague|The corresponding report time zone.|
|<a name="bogotalimaquito"></a>BogotaLimaQuito|The corresponding report time zone.|
|<a name="brasilia"></a>Brasilia|The corresponding report time zone.|
|<a name="brisbane"></a>Brisbane|The corresponding report time zone.|
|<a name="brusselscopenhagenmadridparis"></a>BrusselsCopenhagenMadridParis|The corresponding report time zone.|
|<a name="bucharest"></a>Bucharest|The corresponding report time zone.|
|<a name="buenosairesgeorgetown"></a>BuenosAiresGeorgetown|The corresponding report time zone.|
|<a name="cairo"></a>Cairo|The corresponding report time zone.|
|<a name="canberramelbournesydney"></a>CanberraMelbourneSydney|The corresponding report time zone.|
|<a name="capeverdeisland"></a>CapeVerdeIsland|The corresponding report time zone.|
|<a name="caracaslapaz"></a>CaracasLaPaz|The corresponding report time zone.|
|<a name="casablancamonrovia"></a>CasablancaMonrovia|The corresponding report time zone.|
|<a name="centralamerica"></a>CentralAmerica|The corresponding report time zone.|
|<a name="centraltimeuscanada"></a>CentralTimeUSCanada|The corresponding report time zone.|
|<a name="chennaikolkatamumbainewdelhi"></a>ChennaiKolkataMumbaiNewDelhi|The corresponding report time zone.|
|<a name="chihuahualapazmazatlan"></a>ChihuahuaLaPazMazatlan|The corresponding report time zone.|
|<a name="darwin"></a>Darwin|The corresponding report time zone.|
|<a name="easterntimeuscanada"></a>EasternTimeUSCanada|The corresponding report time zone.|
|<a name="ekaterinburg"></a>Ekaterinburg|The corresponding report time zone.|
|<a name="fijikamchatkamarshallisland"></a>FijiKamchatkaMarshallIsland|The corresponding report time zone.|
|<a name="greenland"></a>Greenland|The corresponding report time zone.|
|<a name="greenwichmeantimedublinedinburghlisbonlondon"></a>GreenwichMeanTimeDublinEdinburghLisbonLondon|The corresponding report time zone.|
|<a name="guadalajaramexicocitymonterrey"></a>GuadalajaraMexicoCityMonterrey|The corresponding report time zone.|
|<a name="guamportmoresby"></a>GuamPortMoresby|The corresponding report time zone.|
|<a name="hararepretoria"></a>HararePretoria|The corresponding report time zone.|
|<a name="hawaii"></a>Hawaii|The corresponding report time zone.|
|<a name="helsinkikyivrigasofiatallinnvilnius"></a>HelsinkiKyivRigaSofiaTallinnVilnius|The corresponding report time zone.|
|<a name="hobart"></a>Hobart|The corresponding report time zone.|
|<a name="indianaeast"></a>IndianaEast|The corresponding report time zone.|
|<a name="internationaldatelinewest"></a>InternationalDateLineWest|The corresponding report time zone.|
|<a name="irkutskulaanbataar"></a>IrkutskUlaanBataar|The corresponding report time zone.|
|<a name="islandamabadkarachitashkent"></a>IslandamabadKarachiTashkent|The corresponding report time zone.|
|<a name="jerusalem"></a>Jerusalem|The corresponding report time zone.|
|<a name="kabul"></a>Kabul|The corresponding report time zone.|
|<a name="kathmandu"></a>Kathmandu|The corresponding report time zone.|
|<a name="krasnoyarsk"></a>Krasnoyarsk|The corresponding report time zone.|
|<a name="kualalumpursingapore"></a>KualaLumpurSingapore|The corresponding report time zone.|
|<a name="kuwaitriyadh"></a>KuwaitRiyadh|The corresponding report time zone.|
|<a name="magadansolomonislandnewcaledonia"></a>MagadanSolomonIslandNewCaledonia|The corresponding report time zone.|
|<a name="midatlantic"></a>MidAtlantic|The corresponding report time zone.|
|<a name="midwayislandandsamoa"></a>MidwayIslandandSamoa|The corresponding report time zone.|
|<a name="moscowstpetersburgvolgograd"></a>MoscowStPetersburgVolgograd|The corresponding report time zone.|
|<a name="mountaintimeuscanada"></a>MountainTimeUSCanada|The corresponding report time zone.|
|<a name="nairobi"></a>Nairobi|The corresponding report time zone.|
|<a name="newfoundland"></a>Newfoundland|The corresponding report time zone|
|<a name="nukualofa"></a>Nukualofa|The corresponding report time zone.|
|<a name="osakasapporotokyo"></a>OsakaSapporoTokyo|The corresponding report time zone.|
|<a name="pacifictimeuscanadatijuana"></a>PacificTimeUSCanadaTijuana|The corresponding report time zone.|
|<a name="perth"></a>Perth|The corresponding report time zone.|
|<a name="rangoon"></a>Rangoon|The corresponding report time zone|
|<a name="santiago"></a>Santiago|The corresponding report time zone.|
|<a name="sarajevoskopjewarsawzagreb"></a>SarajevoSkopjeWarsawZagreb|The corresponding report time zone.|
|<a name="saskatchewan"></a>Saskatchewan|The corresponding report time zone.|
|<a name="seoul"></a>Seoul|The corresponding report time zone.|
|<a name="srijayawardenepura"></a>SriJayawardenepura|The corresponding report time zone.|
|<a name="taipei"></a>Taipei|The corresponding report time zone.|
|<a name="tehran"></a>Tehran|The corresponding report time zone.|
|<a name="vladivostok"></a>Vladivostok|The corresponding report time zone.|
|<a name="westcentralafrica"></a>WestCentralAfrica|The corresponding report time zone.|
|<a name="yakutsk"></a>Yakutsk|The corresponding report time zone.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[ReportTime](reporttime.md)  
