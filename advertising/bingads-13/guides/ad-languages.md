---
title: "Ad Languages"
ms.service: "bing-ads"
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Language options in Microsoft Advertising give you control over your advertising campaign and experience.
---
# Ad Languages
Language options in Microsoft Advertising give you control over your advertising campaign and experience. 

## <a name="adlanguage"></a>Ad Language
Your ad language setting determines the language you will use when you write your ads and should be the language of your customers. The campaign level languages setting applies to all ad groups in the campaign; However, if languages are set at both the ad group and campaign level, the ad group-level language will override the campaign-level language. The ad group level language setting applies to all ads in an ad group. 

Your ad language in combination with your [location targeting](show-ads-target-audience.md) determines who will see your ads. When determining if your ads are eligible to be shown to a particular search user, Microsoft Advertising first determines if your ad language allows for your ad to be shown in a particular country or region then considers the location criteria (and other criteria) settings you have configured. If the target criteria is met and the ad language is available in the country/region, the ad is eligible to display. To learn more, see the Microsoft Advertising help article [How does ad language and location targeting affect who can see my ads?](https://help.ads.microsoft.com/#apex/3/en/51100/0)

The following are the possible languages that you can use to write your ads and keywords.


|Language|Language Code|
|------------|-----------------|
|Albanian|SQ|
|Bulgarian|BG|
|Bosnian|BS|
|Croatian|HR|
|Czech|CS|
|Danish|DA|
|Dutch|NL|
|English|EN|
|Estonian|ET|
|Finnish|FI|
|French|FR|
|German|DE|
|Greek|EL|
|Hungarian|HU|
|Icelandic|IS|
|Italian|IT|
|Japanese|JA|
|Latvian|LV|
|Lithuanian|LT|
|Macedonian|MK|
|Maltese|MT|
|Norwegian|NB|
|Polish|PL|
|Portuguese|PT<br/><br/>This code differs from the ISO standard for Brazilian Portuguese, PTB.|
|Romanian|RO|
|Serbian|SR|
|Slovak|SK|
|Slovenian|SL|
|Spanish|ES|
|Swedish|SV|
|Turkish|TR|
|TraditionalChinese|ZH|
		
## <a name="productlanguage"></a>Product Language
Your [customer](../customer-management-service/customer.md) language determines the language of the Microsoft Advertising interface. 

The following country codes are supported per customer language e.g. [aggregators](account-hierarchy-permissions.md#aggregator-hierarchy) can use these languages and countries in the [Customer](../customer-management-service/customer.md) object when calling the [SignupCustomer](../customer-management-service/signupcustomer.md) operation.

> [!NOTE]
> In New Zealand, Microsoft Advertising is available only on the Microsoft Advertising Network. 

|Language|Country Code|
|------------|------------------|
|English|AD, AG, AI, AL, AM, AQ, AS, AU, AW, AZ, BA, BB, BD, BE, BG, BI, BM, BN, BS, BT, BW, BY, BZ, CC, CK, CV, CX, CY, CZ, DJ, DM, EE, ER, ET, FJ, FM, FO, GA, GB, GD, GE, GF, GH, GI, GL, GM, GN, GP, GQ, GR, GU, GW, GY, HR, HU, ID, IE, IL, IN, IS, JM, JP, KE, KG, KH, KI, KM, KN, KR, KY, KZ, LA, LC, LI, LK, LR, LS, LT, LV, MC, MD, ME, MG, MH, MK, MM, MN, MO, MP, MQ, MR, MS, MT, MU, MV, MW, MY, NA, NC, NF, NG, NP, NR, NU, NZ, PF, PG, PH, PK, PL, PM, PN, PR, PS, PW, RE, RO, RS, RU, RW, SB, SC, SG, SH, SI, SK, SL, SM, SO, SR, ST, SZ, TC, TH, TJ, TK, TM, TO, TR, TT, TV, TZ, UA, UG, US, UZ, VA, VG, VI, VN, VU, WF, WS, YT, ZA, ZM, ZW|
|French|BF, BJ, CD, CF, CG, CI, CM, FR, HT, LU, ML, NE, SN, TD, TG|
|German|AT, CH, DE|
|Italian|IT|
|Portuguese|AO, BR, MZ, PT, TL|
|Spanish|AR, BO, CL, CO, CR, DO, EC, ES, GT, HN, MX, NI, PA, PE, PY, SV, UY, VE|
|TraditionalChinese|HK, TW|

		
## <a name="countdownlanguage"></a>Countdown Language
Countdown customizers let you easily add a countdown (by day, hour, and then minute) to an event in your dynamic search ads, expanded text ads, and responsive search ads. The following language codes are supported for [countdown customizers](countdown-customizers.md).

|Language Code|Language|
|------------|------------|
|SQ|Albanian|
|BS|Bosnian|
|BG|Bulgarian|
|HR|Croatian|
|CS|Czech|
|DA|Danish|
|NL|Dutch|
|en-AU|English|
|en-GB|English|
|en-US|English|
|ET|Estonian|
|FI|Finnish|
|FR|French|
|DE|German|
|EL|Greek|
|HU|Hungarian|
|IS|Icelandic|
|IT|Italian|
|LV|Latvian|
|LT|Lithuanian|
|MK|Macedonian|
|MT|Maltese|
|NB|Norwegian|
|PL|Polish|
|pt-BR|Portuguese|
|pt-PT|Portuguese|
|RO|Romanian|
|SR|Serbian|
|SK|Slovak|
|SL|Slovenian|
|ES|Spanish|
|ES-419|Spanish|
|SV|Swedish|
|zh-HK|TraditionalChinese|
|zh-TW|TraditionalChinese|
|TR|Turkish|

## <a name="adextensionheaders"></a>Ad Extension Headers
Structured Snippet headers must be specified in the same language that you intend it to be shown. For example, if you want header *Amenities* in English you must specify the header as *Amenities*. If you want header *Ausstattung* in German you must specify the header as *Ausstattung* (*Amenities* in German). 

The following headers are supported per language.

> [!NOTE]
> The following languages are not yet available for everyone: Bulgarian, Croatian, Czech, Estonian, Greek, Hungarian, Latvian, Lithuanian, Maltese, Polish, Romanian, Slovak, Slovenian.

```csv
Language,Amenities,Brands,Courses,Degree programs,Destinations,Featured hotels,Goods,Insurance coverage,Items,Models,Neighborhoods,Services,Service catalog,Shows,Styles,Types
Bulgarian,????????????????,??????????,??????????????,???????????????? ????????????????,????????????????????,?????????????????????? ????????????,??????????,?????????????????????????????? ????????????????,????????????????,????????????,????????????????,????????????,?????????????? ???? ????????????????,????????????????????,??????????????,????????????
Chinese (Traditional zh-TW),??????,??????,??????,????????????,?????????,????????????,??????,????????????,??????,??????,??????,??????,????????????,??????,??????,??????
Croatian,Pogodnosti,Robne marke,Kolegiji,Diplomski programi,Odredi??ta,Izdvojeni hoteli,Roba,Polica osiguranja,Stavke,Modeli,??etvrti,Usluge,Katalog usluga,Emisije,Stilovi,Vrste
Czech,Vybaven??,Zna??ky,Kurzy,Studijn?? programy,C??le,Doporu??en?? hotely,Zbo????,Pojistn?? kryt??,Polo??ky,Modely,??tvrti,Slu??by,Katalog slu??eb,Po??ady,Styly,Typy
Danish,Faciliteter,M??rker,Kurser,Kandidatprogrammer,Destinationer,Udvalgte hoteller,Varer,Forsikringsd??kning,Elementer,Modeller,Kvarterer,Serviceydelser,Servicekatalog,Shows,Design,Typer
Dutch,Voorzieningen,Merken,Cursussen,Studieprogramma's,Bestemmingen,Aanbevolen hotels,Producten,Dekking,Items,Modellen,Buurten,Services,Servicecatalogus,Shows,Stijlen,Typen
English,Amenities,Brands,Courses,Degree programs,Destinations,Featured hotels,Goods,Insurance coverage,Items,Models,Neighborhoods,Services,Service catalog,Shows,Styles,Types
Estonian,Soodustused,Kaubam??rgid,Kursused,Kraadi??ppeprogrammid,Sihtkohad,Esilet??stetud hotellid,Kaubad,Kindlustuskate,Artiklid,Mudelid,Asumid,Teenused,Teenusekataloog,Etendused,Stiilid,T????bid
Finnish,Mukavuudet,Tuotemerkit,Kurssit,Tutkinto-ohjelmat,M????r??np????t,Esitellyt hotellit,Tavarat,Vakuutuksen kattavuus,Nimikkeet,Mallit,Kaupunginosat,Palvelut,Huoltoluettelo,Esitykset,Tyylit,Tyypit
French (France),??quipements,Marques,Cours,Programmes d'??tudes,Destinations,S??lection d'h??tels,Biens,Couverture d'assurance,??l??ments,Mod??les,Quartiers,Services,Catalogue de services,??missions,Styles,Types
German,Ausstattung,Marken,Kurse,Studieng??nge,Ziele,Vorgestellte Hotels,Waren,Versicherungsleistung,Artikel,Modelle,Viertel,Dienstleistungen,Dienstkatalog,Serien,Stile,Typen
Greek,??????????????,????????????,????????????????,?????????????????????? ??????????????,????????????????????,???????????????????? ????????????????????,??????????,?????????????????????? ????????????,????????????????,??????????????,??????????????????,??????????????????,?????????????????? ??????????????????,????????????????,????????,??????????
Hungarian,K??nyelmi szolg??ltat??sok,M??rk??k,Tanfolyamok,K??pz??sek,C??l??llom??sok,Kiemelt sz??llod??k,??ruk,Biztos??t??si fedezet,Elemek,Modellek,V??rosr??szek,Szolg??ltat??sok,Szolg??ltat??skatal??gus,El??ad??sok,St??lusok,T??pusok
Italian,Attrattive,Marche,Corsi,Corsi di studio,Destinazioni,Hotel consigliati,Beni,Copertura assicurativa,Articoli,Modelli,Quartieri,Servizi,Catalogo de servizi,Programmi,Stili,Tipi
Latvian,??rt??bas,Z??moli,Kursi,Studiju programmas,Galam??r??i,Pied??v??t??s viesn??cas,Preces,Apdro??in????anas segums,Vienumi,Mode??i,Apkaimes,Pakalpojumi,Pakalpojumu katalogs,Izr??des,Stili,Veidi
Lithuanian,Patogumai,Preki?? ??enklai,Mokymo programos,Programos laipsniui gauti,Kelion??s tikslai,Atrinkti vie??bu??iai,Prek??s,Draudimo apsauga,Elementai,Modeliai,Kaimynyst??,Paslaugos,Paslaug?? katalogas,Parodymai,Stiliai,Tipai
Maltese,Fa??ilitajiet,Ditti,Korsijiet,Programmi ta' lawrji,Destinazzjonijiet,Lukandi Msemmija,O????etti,Kopertura tal-assigurazzjoni,Items,Mudelli,Vi??inanzi,Servizzi,Katalgu tas-servizz,Spettakli,Stili,Tipi
Norwegian,Fasiliteter,Merkevarer,Kurs,Universitetsprogrammer,Destinasjoner,Fremhevede hoteller,Varer,Forsikring,Gjenstander,Modeller,Nabolag,Tjenester,Servicekatalog,TV-serier,Stiler,Typer
Polish,Udogodnienia,Marki,Kursy,Studia,Kierunki,Polecane hotele,Produkty,Zakres ubezpieczenia,Pozycje,Modele,Osiedla,Us??ugi,Katalog us??ug,Pokazy,Style,Typy
Portuguese (Brazil pt-BR),Comodidades,Marcas,Cursos,Programas de gradua????o,Destinos,Hot??is em destaque,Bens,Cobertura do seguro,Itens,Modelos,Vizinhan??a,Servi??os,Cat??logo de servi??os,Programas,Estilos,Tipos
Romanian,Dot??ri,M??rci,Cursuri,Programe educa??ionale,Destina??ii,Hoteluri recomandate,Bunuri,Acoperirea asigur??rii,Articole,Modele,Cartiere,Servicii,Catalog de servicii,Emisiuni,Stiluri,Tipuri
Slovak,Vybavenie,Zna??ky,Kurzy,??tudijn?? programy,Destin??cie,Vybran?? hotely,Tovar,Poistn?? krytie,Polo??ky,Modely,??tvrte,Slu??by,Katal??g slu??ieb,Rel??cie,??t??ly,Typy
Slovenian,Dodatna ponudba,Blagovne znamke,Predavanja,Diplomski programi,Kraji,Izpostavljeni hoteli,Izdelki,Zavarovalno kritje,Elementi,Modeli,Mestne ??etrti,Storitve,Katalog storitev,Oddaje,Slogi,Vrste
Spanish (Latin America es-419),Servicios adicionales,Marcas,Cursos,Carreras universitarias,Destinos,Hoteles destacados,Art??culos,Cobertura de seguro,Elementos,Modelos,Barrios,Servicios,Cat??logo de servicios,Programas,Estilos,Tipos
Swedish,Bekv??mligheter,Varum??rken,Kurser,Utbildningar,Resm??l,Hotellval,Varor,F??rs??kringstyper,Objekt,Bilmodeller,Grannskap,Tj??nster,Servicekatalog,Program,Stilar,Typer
```

## <a name="actionadextension-actiontext"></a>Action Text for Action Ad Extensions
The action text displayed for action ad extensions will depend on the language that you set when creating or updating the action ad extension. For example, if you want action text displayed as *Act Now* in English you must specify the action type as *ActNow* and set the language to *English*. If you want action text displayed as *Jetzt handeln* in German you must likewise set the action type to *ActNow*, but set the language to *German*. 

Microsoft Advertising does not support all action types for all languages. If you attempt to use an unsupported action type and language combination, an error will be returned. This table lists the rare exceptions i.e. where the translated text exceeds 16 characters.

|Language|Action Types Not Supported| 
|-----|-----|
|Dutch|PostJob|
|French|FindStore,TestDrive,ViewCars,VisitStore|
|German|FreePlay,FreeQuote,FreeTrial,StartFree|
|Italian|FreeQuote|
|Norwegian|FreeTrial|

As of January 2020, nine action types are deprecated. For example, if you set the action type to "Browse" no error will be returned, but "LearnMore" is the effective value that will be stored and returned when retrieving the action ad extension. Your application should use the replacement values instead of the deprecated values. 

|Deprecated Action Type|Replacement Action Type| 
|-----|-----|
|Browse|LearnMore|
|Explore|LearnMore|
|Message|ContactUs|
|NewCars|ViewCars|
|SeeMore|LearnMore|
|StartFree|FreeTrial|
|UsedCars|ViewCars|
|ViewNow|LearnMore|
|VisitSite|LearnMore|

When using the Bing Ads API you will always set the action type using an English pascal case enumeration value i.e., one of the language strings in the first comma separated row below. The language translations are documented for your convenience, although you will not use them directly via the Bing Ads API. 

> [!NOTE]
> The following languages are not yet available for everyone: Bulgarian, Croatian, Czech, Estonian, Greek, Hungarian, Latvian, Lithuanian, Maltese, Polish, Romanian, Slovak, Slovenian.

```csv
Language,ActNow,ApplyNow,BetNow,BidNow,BookACar,BookHotel,BookNow,BuyNow,ChatNow,Compare,ContactUs,Coupon,Directions,Donate,Download,EmailNow,EnrollNow,FileNow,FindJob,FindStore,FreePlay,FreeQuote,FreeTrial,GetDeals,GetOffer,GetQuote,JoinNow,LearnMore,ListenNow,LogIn,OrderNow,PlayGame,PlayNow,PostJob,Register,RenewNow,RentACar,RentNow,Reorder,Reserve,Sale,SaveNow,Schedule,SeeMenu,SeeOffer,SellNow,ShopNow,Showtimes,SignIn,SignUp,StartNow,Subscribe,SwitchNow,TestDrive,TryNow,ViewCars,ViewPlans,VisitStore,VoteNow,Watch,WatchMore,WatchNow
Bulgarian,???????????????????? ????????,?????????????????????????????? ????????,???????????????? ????????,???????????????? ????????,???????????????????????? ????????,???????????????????????? ??????????,???????????????????????? ????????,???????????? ????????,?????? ????????,????????????????????,???????????? ?? ??????,?????????????? ??????????,??????????????????????,????????????,??????????????????,?????????????????? ?????????? ????????,???????????????? ???? ????????,?????????????? ????????,???????????????? ????????????,???????????????? ??????????????,?????????????????? ????????,?????????????????? ????????????,?????????????????? ???????????? ????????????,?????????????? ????????????,???????????????? ????????????,?????????????? ????????????,???????????????????????? ???? ????????,?????????????? ????????????,???????????????? ????????,??????????????,?????????????????? ????????,??????????????,?????????????? ????????,???????????????????????? ?????????????? ????????????,????????????????????????,?????????????????? ????????,???????? ?????? ????????,?????????????? ????????,?????????????????? ????????????,????????????????????????,?????????????? ???? ??????????????????????????,???????????????? ????????,????????????????,?????????????? ???? ????????????,?????????????? ???? ????????????????,???????????????? ????????,?????????????????????? ????????,??????????????????,????????,??????????????????????????,?????????????????????? ????????,??????????????????,?????????????????????? ????????,?????????????? ????????????????,???????????????? ????????,?????????????? ???? ????????????????????????,?????????????? ???? ??????????????????,???????????????? ????????????????,???????????????????? ????????,????????????????,???????????????? ??????,???????????????? ????????
Croatian,Djelujte sada,Primijeni sada,Kladite se sada,Po??aljite ponudu sada,Rezervirajte automobil,Rezervirajte hotel,Rezervirajte odmah,Kupite sada,Razgovarajte sada,Usporedi,Obratite nam se,Ostvarite kupon,Upute,Doniraj,Preuzmi,Po??alji poruku e-po??te sada,Upi??ite se sada,Predajte odmah,Tra??enje posla,Tra??enje trgovine,Besplatna reprodukcija,Besplatna ponuda,Besplatna probna verzija,Ostvarite ponude,Ostvarite ponudu,Zatra??ite ponudu,Pridru??i se sada,Saznajte vi??e,Slu??ajte sada,Prijava,Naru??ite sada,Igraj igru,Igraj sada,Objavi posao,Registracija,Obnovi sada,Unajmite automobil,Unajmi sada,Promijeni redoslijed,Rezerviraj,Pogledajte rasprodaju,Spremi sada,Zaka??i,Pogledaj jelovnik,Prika??i ponudu,Prodaj sada,Krenite u kupovinu,Raspored prikazivanja,Prijavite se,Registrirajte se,Zapo??nite odmah,Pretplatite se,Promijeni odmah,Probna vo??nja,Isprobajte sada,Prika??i automobile,Prika??i planove,Posjeti trgovinu,Glasajte sada,Gledaj,Pogledajte vi??e,Pogledajte sada
Czech,Jednat,Po????dat,Vsadit si,U??init nab??dku,Rezervace auta,Rezervovat hotel,Zarezervovat,Kup te??,Chatovat,Porovnat,Kontaktujte n??s,Z??skat kupon,Naviga??n?? pokyny,Darovat,St??hnout,Napsat e-mail,Zapsat se,Podat,Naj??t pr??ci,Naj??t obchod,Hr??t zdarma,Bezplatn?? nab??dka,Bezplatn?? zku??ebn?? verze,Z??skat slevy,Z??skat nab??dku,Po????dat o nab??dku,Zapojit se,Dal???? informace,Poslouchat,P??ihl??sit se,Objednat,Hr??t,P??ehr??t,Zve??ejnit,Registrovat,Prodlou??it,Pron??jem auta,Pronajmout,P??eobjednat,Rezervovat,Zobrazit slevu,Ulo??it,??asov?? pl??n,Zobrazit menu,Zobrazit nab??dku,Prodat,Nakupovat,Programy,P??ihl????en??,Zaregistrovat se,Spustit,P??ihl??sit se k odb??ru,P??ej??t,Zku??ebn?? j??zda,Vyzkou??et,Zobrazit auta,Zobrazit pl??ny,Nav??t??vit obchod,Hlasovat,Sledovat,Sledovat dal????,Sledovat nyn??
Danish,Handl nu,Ans??g nu,Spil nu,Byd nu,Reserv??r en bil,Bestil hotel,Reserv??r nu,K??b nu,Chat nu,Sammenlign nu,Kontakt os,F?? kupon,Rutevejledning,Doner,Download,Send e-mail nu,Tilmeld dig nu,Anmeld nu,Find job,Find butik,Gratis spil,Gratis tilbud,Gratis pr??ve,F?? tilbud,F?? tilbud,F?? et tilbud,Deltag nu,F?? mere at vide,Lyt nu,Log p??,Bestil nu,Spil spil,Spil nu,Opsl?? job,Registrer,Forny ny,Lej en bil,Lej nu,Bestil igen,Reserv??r,Se udsalg,Gem nu,Spilleplan,Se menu,Se tilbud,S??lg nu,Shop nu,Spilletider,Log p??,Tilmeld dig,Start nu,Abonner,Skift nu,Pr??vetur,Pr??v nu,Se biler,Vis planer,Bes??g butik,Stem nu,Se,Se mere,Se nu
Dutch,Nu beslissen,Nu solliciteren,Nu inzetten,Nu bieden,Auto huren,Hotel boeken,Nu boeken,Nu kopen,Nu chatten,Vergelijken,Contact opnemen,Coupon aanvragen,Route,Doneren,Downloaden,Nu e-mailen,Nu inschrijven,Nu inzenden,Vacature zoeken,Winkel zoeken,Gratis spelen,Gratis offerte,Gratis demo,Deals zien,Aanbieding zien,Offerte krijgen,Nu meedoen,Meer informatie,Nu luisteren,Aanmelden,Nu bestellen,Game spelen,Nu spelen,Vacature plaatsen(Not supported),Registreren,Nu vernieuwen,Auto huren,Nu huren,Nabestellen,Reserveren,Sale bekijken,Nu besparen,Schema,Menu zien,Aanbieding zien,Nu verkopen,Nu shoppen,Aanvangstijd,Aanmelden,Registreren,Nu beginnen,Abboneren,Nu wisselen,Proefrit,Nu proberen,Auto's tonen,Plannen tonen,Winkel bezoeken,Nu stemmen,Kijken,Meer kijken,Nu kijken
English,Act Now,Apply Now,Bet Now,Bid Now,Book A Car,Book Hotel,Book Now,Buy Now,Chat Now,Compare,Contact Us,Get Coupon,Directions,Donate,Download,Email Now,Enroll Now,File Now,Find Job,Find Store,Free Play,Free Quote,Free Trial,Get Deals,Get Offer,Get Quote,Join Now,Learn More,Listen Now,Log In,Order Now,Play Game,Play Now,Post Job,Register,Renew Now,Rent A Car,Rent Now,Reorder,Reserve,See Sale,Save Now,Schedule,See Menu,See Offer,Sell Now,Shop Now,Showtimes,Sign In,Sign Up,Start Now,Subscribe,Switch Now,Test Drive,Try Now,View Cars,View Plans,Visit Store,Vote Now,Watch,Watch More,Watch Now
Estonian,Tegutse kohe,Rakenda kohe,Panusta kohe,Paku kohe,Broneeri auto,Broneeri hotell,Broneeri kohe,Osta kohe,Vestle kohe,V??rdle,Kontaktteave,Hangi kupong,Juhised,Anneta,Laadi alla,Meili kohe,Registreeru kohe,Esita taotlus kohe,Otsi t????d,Otsi poodi,Tasuta m??ng,Tasuta hinnapakkumine,Tasuta prooviversioon,Hangi pakkumisi,Hangi pakkumine,Hangi hinnapakkumine,Liitu kohe,Lisateave,Kuula kohe,Logi sisse,Telli kohe,M??ngi,Esita kohe,Postita t????,Registreeri,Uuenda kohe,Autorent,Rendi kohe,Telli uuesti,Reserveeri,Kuva allahindlus,S????sta kohe,Ajasta,Kuva men????,Kuva pakkumine,M???? kohe,Mine poodi,Esitusajad,Sisse logima,Registreeru,Alusta kohe,Telli,Vaheta kohe,Proovis??it,Proovi kohe,Vaata autosid,Kuva plaanid,K??lasta poodi,H????leta kohe,Vaata,Vaata veel,Vaata kohe
Finnish,Toimi nyt,K??yt?? nyt,Veikkaa nyt,Tarjoa nyt,Varaa auto,Varaa hotelli,Varaa nyt,Osta nyt,Keskustele nyt,Vertaa,Ota yhteytt??,Hanki kuponki,Reittiohjeet,Lahjoita,Lataa,S??hk??postita,Ilmoittaudu nyt,Hae nyt,Etsi ty??paikka,Etsi kauppa,Ilmainen peli,Ilmaistarjous,Ilmaiskokeilu,Hae sopimuksia,Hae tarjous,Hae tarjous,Liity nyt,Lue lis????,Kuuntele nyt,Kirjaudu sis????n,Tilaa nyt,Pelaa peli,Toista nyt,L??het?? ty??,Rekister??i,Uusi nyt,Vuokraa auto,Vuokraa nyt,Tilaa uudelleen,Varaa,Katso tarjous,Tallenna nyt,Aikataulu,N??yt?? valikko,N??yt?? tarjous,Myy nyt,Osta nyt,Esitysajat,Kirjaudu sis????n,Rekister??idy,Aloita nyt,Tilaa,Vaihda nyt,Koeajo,Kokeile nyt,N??yt?? autot,Suunnitelmat,Siirry kauppaan,????nest?? nyt,Katso,Katso lis????,Katso nyt
French,Allez-y,Appliquer,Parier,Faire une offre,R??server voiture,R??server h??tel,R??server,Acheter,Discuter,Comparer,Nous contacter,Obtenir un bon,Itin??raires,Faire un don,T??l??charger,Envoyer e-mail,S???inscrire,Ranger,Trouver emploi,Trouver un magasin(Not supported),Jeu gratuit,Devis gratuit,Essai gratuit,Obtenir offres,Obtenir offre,Obtenir devis,Rejoindre,En savoir plus,??couter,Connexion,Commander,Jouer,Lire,Publier emploi,S???inscrire,Renouveler,Louer voiture,Louer,Recommander,R??server,Voir l'offre,Enregistrer,Planifier,Voir le menu,Voir l???offre,Vendre,Acheter,Horaires,Connexion,S???inscrire,D??marrer,S???abonner,Changer,Version d?????valuation(Not supported),Essayer,Afficher voitures(Not supported),Afficher plans,Visiter un magasin(Not supported),Voter,Regarder,Regarder plus,Regarder
German,Jetzt handeln,Jetzt bewerben,Jetzt wetten,Jetzt bieten,Auto buchen,Hotel buchen,Jetzt buchen,Jetzt kaufen,Jetzt chatten,Vergleichen,Kontaktieren,Gutschein holen,Wegbeschreibung,Spenden,Download,E-Mail senden,Registrieren,Einreichen,Job suchen,Shop suchen,Kostenlos spielen(Not supported),Kostenloses Angebot(Not supported),Kostenlose Testversion(Not supported),Angebote,Angebot,Angebot,Jetzt beitreten,Mehr Info,Jetzt anh??ren,Anmelden,Jetzt bestellen,Spiel spielen,Jetzt spielen,Job posten,Registrieren,Jetzt verl??ngern,Auto mieten,Jetzt mieten,Neu bestellen,Reservieren,Sale anzeigen,Jetzt speichern,Zeitplan,Men?? anzeigen,Angebot anzeigen,Jetzt verkaufen,Jetzt einkaufen,Vorstellungen,Anmelden,Registrieren,Jetzt starten,Abonnieren,Jetzt wechseln,Testfahrt,Jetzt testen,Autos anzeigen,Pl??ne anzeigen,Shop besuchen,Jetzt abstimmen,Ansehen,Weitere ansehen,Jetzt ansehen
Greek,???????????? ????????,???????????? ????????,???????????????? ????????,???????????????? ????????,?????????????? ??????????????????????,?????????????? ??????????????????????,?????????????? ????????,?????????? ????????,?????????????????? ????????,????????????????,??????????????????????,???????????????? ??????????????????,??????????????,??????????,????????,???????????????? email ????????,?????????????? ????????,???????????????????????? ????????,???????????? ????????????????,???????????? ????????????????????????,???????????? ????????????????,???????????? ????????????????,???????????? ????????????,???????????? ??????????????????,???????????? ????????????????,???????????? ????????,?????????????? ????????,???????????? ??????????????????????,?????????????? ????????,??????????????,???????????????????? ????????,?????????????????????? ????????????????????,?????????????????????? ????????,???????????????????? ?????????? ????????????????,????????????????????,???????????????? ????????,?????????????????? ??????????????????????,?????????????????? ????????,??????????????????????????,??????????????,?????????????? ??????????????,???????????????????? ????????,??????????????????,?????????????? ??????????,?????????????? ??????????????????,???????????? ????????,?????????? ????????,???????? ????????????????,??????????????,??????????????,???????????? ????????,????????????????,???????????????? ????????,????????????,???????????? ????????,?????????????? ??????????????????????,?????????????? ??????????????,???????????????? ?????? ??????????????????,?????????????????? ????????,??????????????????????????,?????????????????????????? ????????????????????????,?????????????????????????? ????????
Hungarian,Cselekv??s,Alkalmaz,Fogad??s,Licit??l??s,Aut??foglal??s,Sz??llodai foglal??s,Foglal??s most,Megv??s??rl??s most,Cseveg??s most,??sszehasonl??t??s,Kapcsolatfelv??tel,Kupon beszerz??se,??tvonalak,Adom??nyoz??s,Let??lt??s,E-mail k??ld??se,Regisztr??ci?? most,Iktat??s,??ll??s keres??se,??zlet keres??se,Ingyenesen j??tszhat??,Ingyenes ??raj??nlat,Ingyenes pr??baverzi??,Aj??nlatok megtekint??se,Aj??nlat ig??nybev??tele,Aj??nlat k??r??se,Csatlakoz??s most,Tov??bbi inform??ci??,Hallgat??s,Bel??p??s,Rendel??s,J??t??k,Lej??tsz??s,??ll??shirdet??s felad??sa,Regisztr??ci??,Meg??j??t??s,Aut??b??rl??s,B??rl??s,??jrarendel??s,Foglal??s,Akci?? megtekint??se,Megtakar??t??s,??temez??s,Men?? megtekint??se,Aj??nlat megtekint??se,Elad??s,V??s??rl??s most,M??sorok,Bejelentkez??s,Csatlakoz??s,Kezd??s most,Feliratkoz??s,V??lt??s most,Tesztvezet??s,Kipr??b??l??s,Aut??k megtekint??se,Csomgaok megtekint??se,??ruh??z felkeres??se,Szavaz??s,Megtekint??s,Tov??bbiak megtekint??se,Megtekint??s most
Italian,Agisci ora,Applica ora,Scommetti ora,Offri ora,Prenota un'auto,Prenota hotel,Prenota ora,Acquista ora,Chatta ora,Confronta,Contattaci,Ottieni coupon,Indicazioni,Dona,Scarica,Invia e-mail,Iscriviti ora,Inoltra ora,Trova lavoro,Trova il negozio,Gioco gratuito,Preventivo gratis(Not supported),Prova gratuita,Ottieni offerte,Ottieni offerta,Preventivo,Partecipa ora,Ulteriori info,Ascolta ora,Accedi,Ordina ora,Gioca,Riproduci ora,Offerta lavoro,Registrati,Rinnova ora,Noleggia auto,Noleggia ora,Riordina,Prenota,Guarda sconto,Salva ora,Pianifica,Visualizza menu,Vedi offerta,Vendi ora,Acquista ora,Orari,Accedi,Iscriviti,Inizia ora,Sottoscrivi,Cambia subito,Prova su strada,Prova ora,Visualizza auto,Vedi piani,Visita negozio,Vota ora,Guarda,Guarda altro,Guarda ora
Latvian,R??kojieties t??l??t,Lietot tagad,Sol??t t??l??t,Soliet t??l??t,Rezerv??t automa????nu,Rezerv??t viesn??cu,Rezerv??t tagad,Pirkt t??l??t,T??rz??t tagad,Sal??dzin??t,Sazin??ties ar mums,Sa??emt kuponu,Nor??des,Ziedot,Lejupiel??d??t,Nos??t??t e-pasta zi??ojumu t??l??t,Re??istr??ties t??l??t,Iesniegt t??l??t,Atrast darbu,Atrast veikalu,Bezmaksas sp??le,Bezmaksas pied??v??jums,Bezmaksas izm????in??jumversija,Sa??emt pied??v??jumus,Sa??emt pied??v??jumu,Ieg??t pied??v??jumu,Pievienoties t??l??t,Uzzin??t vair??k,Klaus??ties t??l??t,Pieteikties,Pas??t??t t??l??t,Sp??l??t sp??li,Atska??ot tagad,Public??t darbu,Piere??istr??ties,Atjaunot t??l??t,Nom??t automa????nu,Nom??t t??l??t,P??rk??rtot,Rezerv??t,Skat??t izp??rdo??anas pied??v??jumu,Ietaup??t t??l??t,Grafiks,Skat??t izv??lni,Skat??t pied??v??jumu,P??rdot t??l??t,Iepirkties t??l??t,Seansi,Pierakst??ties,Re??istr??ties,S??kt t??l??t,Abon??t,P??rsl??gt t??l??t,Izm????in??juma brauciens,Izm????in??t t??l??t,Skat??t automa????nas,Skat??t pl??nus,Apmekl??t veikalu,Balsot t??l??t,Skat??ties,Skat??ties v??l,Skat??ties t??l??t
Lithuanian,Veikti dabar,Teikti parai??k?? dabar,La??intis dabar,Si??lyti kain?? dabar,U??sisakyti automobil??,U??sisakyti vie??but??,U??sakyti dabar,??sigyti dabar,Kalb??tis dabar,Palyginti,Kontaktin?? informacija,Gauti kupon??,Kryptys,Aukoti,Atsisi??sti,Si??sti el. pa??tu dabar,Registruotis dabar,U??pildyti dabar,Rasti darb??,Rasti parduotuv??,Nemokamas ??aidimas,Nemokamas pasi??lymas,Nemokama bandomoji versija,Puik??s pasi??lymai,Gauti pasi??lym??,Gauti kain??,Prisijungti dabar,Su??inokite daugiau,Klausytis dabar,Prisijungimas,U??sisakyti dabar,??aisti ??aidim??,Leisti dabar,Pa??to darbas,Registruotis,Atnaujinti dabar,I??sinuomoti automibil??,I??sinuomoti dabar,Pertvarkyti,Rezervuoti,Per??i??r??ti i??pardavim??,??ra??yti dabar,Tvarkara??tis,Rodyti meniu,Rodyti pasi??lym??,Parduoti dabar,Apsipirkti dabar,Rodymo laikas,Prisijungti,Prisiregistruoti,Prad??ti dabar,Prenumeruoti,Perjungti dabar,Bandomoji versija,I??bandyti dabar,Per??i??r??ti automobilius,Per??i??r??ti planus,Apsilankyti parduotuv??je,Balsuoti dabar,??i??r??ti,??i??r??ti daugiau,??i??r??ti dabar
Maltese,??u Azzjoni Issa,Applika Issa,Ag??mel Im??atra Issa,Ag??mel Offerta Issa,Ibbukkja Karozza,Ibbukkja Lukanda,Ibbukkja Issa,Ixtri Issa,I????ettja Issa,Qabbel,Ikkuntattjana,Ikseb Kupun,Direzzjonijiet,Ag??ti donazzjoni,Ni????el,Ibg??at Email Issa,Inkiteb Issa,Iffajlja Issa,Sib Impjieg,Sib ??anut,Log??ob b'Xejn,Kwotazzjoni b'Xejn,Prova b'Xejn,Ikseb Prezzijiet Vanta????ju??i,Ikseb Offerta,Ikseb Kwota,Issie??eb issa,Sir af aktar,Isma' Issa,Illoggja,Ordna Issa,Ilg??ab il-Log??ba,Doqq issa,Ippowstja l-Impjieg,Irre??istra,??edded Issa,Ikri Karozza,Ikri Issa,Er??a' po????i fl-ordni,Irri??erva,Ara l-Iskont,Issejvja Issa,Skeda,Ara l-Menu,Ara l-Offerta,Bieg?? Issa,Ag??mel ix-Xirja Issa,??inijiet ta' wiri,Id??ol,O??loq akkawnt,Ibda Issa,Abbona,Aqleb Issa,Test tas-Sewqan,Ipprova Issa,Ara l-Karozzi,Ara l-Pjanijiet,??ur il-??anut,Ivvota Issa,Ara,Ara Aktar,Ara Issa
Norwegian,Handle n??,S??k n??,Sats n??,By n??,Reserver en bil,Reserver hotell,Reserver n??,Kj??p n??,Chat n??,Sammenlign,Kontakt oss,Hent kupong,Veibeskrivelse,Doner,Last ned,Send e-post n??,Registrer deg,S??k n??,Finn jobb,Finn butikk,Gratis spill,Gratis anbud,Gratis pr??veversjon(Not supported),F?? tilbud,F?? tilbud,F?? anbud,Bli med n??,Les mer,H??r n??,Logg p??,Bestill n??,Spill,Spill n??,Legg ut jobb,Registrer deg,Forny n??,Lei en bil,Lei n??,Bestill p?? nytt,Reserver,Se salg,Spar n??,Terminliste,Se meny,Se tilbud,Selg n??,Handle n??,Visningstider,Logg p??,Meld deg p??,Start n??,Abonner,Bytt n??,Testkj??r,Pr??v n??,Vis biler,Se planer,G?? til butikk,Stem n??,Se,Se mer,Se n??
Polish,Dzia??aj teraz,Zg??o?? si?? teraz,Postaw teraz,Licytuj teraz,Zarezerwuj samoch??d,Zarezerwuj pok??j,Zarezerwuj teraz,Kup teraz,Porozmawiaj na czacie,Por??wnaj,Skontaktuj si?? z nami,Uzyskaj kupon,Wskaz??wki dojazdu,Przeka?? darowizn??,Pobierz,Wy??lij e-mail teraz,Zapisz si?? teraz,Z?????? teraz,Znajd?? prac??,Znajd?? sklep,Bezp??atna rozgrywka,Bezp??atna wycena,Bezp??atny okres pr??bny,Uzyskaj oferty,Uzyskaj ofert??,Uzyskaj wycen??,Do????cz teraz,Dowiedz si?? wi??cej,Pos??uchaj teraz,Zaloguj si??,Zam??w teraz,Zagraj w co??,Zagraj teraz,Zamie???? ofert?? pracy,Zarejestruj si??,Odn??w teraz,Wynajmij samoch??d,Wynajmij teraz,Zam??w ponownie,Zarezerwuj,Zobacz wyprzeda??,Zapisz teraz,Zaplanuj,Zobacz menu,Zobacz ofert??,Sprzedaj teraz,Kup teraz,Pory seans??w,Zaloguj si??,Zarejestruj si??,Rozpocznij teraz,Zasubskrybuj,Przejd?? teraz,Jazda pr??bna,Wypr??buj teraz,Zobacz samochody,Zobacz taryfy,Odwied?? sklep,Zag??osuj teraz,Obejrzyj,Obejrzyj wi??cej,Obejrzyj teraz
Portuguese,Aja Agora,Solicitar Agora,Apostar Agora,Fazer Lance,Alugar um Carro,Reservar Hotel,Reservar Agora,Comprar Agora,Conversar Agora,Comparar,Fale Conosco,Obter Cupom,Trajeto,Doar,Download,Enviar Email,Registrar Agora,Arquivar Agora,Buscar Trabalho,Encontrar Loja,Jogo Gr??tis,Cota????o Gr??tis,Avalie Gr??tis,Obter Ofertas,Obter Oferta,Obter Cota????o,Ingressar Agora,Saiba Mais,Ouvir Agora,Fazer Logon,Encomendar,Jogar Jogo,Jogar Agora,Postar Trabalho,Registrar,Renovar Agora,Alugar um Carro,Alugar Agora,Comprar de novo,Reservar,Ver Promo????o,Salvar Agora,Agenda,Ver Menu,Ver Oferta,Vender Agora,Comprar Agora,Hor??rios,Entrar,Inscrever-se,Iniciar Agora,Assinar,Mudar Agora,Test Drive,Experimentar J??,Exibir Carros,Exibir Planos,Visitar Loja,Votar Agora,Assistir,Assistir Mais,Assistir Agora
Romanian,Ac??iona??i acum,Aplica??i acum,Paria??i acum,Licita??i acum,Rezerva??i o ma??in??,Rezerva??i o camer?? de hotel,Rezerva??i acum,Achizi??iona??i acum,Discuta??i acum,Compara??i,Contacta??i-ne,Ob??ine??i un cupon,Indica??ii,Dona??i,Desc??rca??i,Trimite??i un e-mail acum,??nscrie??i-v?? acum,Arhiva??i acum,G??si??i un loc de munc??,G??si??i magazinul,Reda??i gratis,Cota??ie gratis,??ncercare gratuit??,Ob??ine??i oferte,Ob??ine??i o ofert??,Ob??ine??i cota??ia,Al??tura??i-v?? acum,Afla??i mai multe,Asculta??i acum,Loga??i-v??,Comanda??i acum,Juca??i jocuri,Reda??i acum,Posta??i un loc de munc??,??nregistra??i,Prelungi??i acum,??nchiria??i o ma??in??,??nchiria??i acum,Reordona??i,Rezerva??i,Vede??i reducerile,Salva??i acum,Program,Vede??i meniul,Vede??i oferta,Vinde??i acum,Cump??ra??i acum,Programul emisiunilor,Conecta??i-v??,??nregistra??i-v??,??ncepe??i acum,Abona??i-v??,Comuta??i acum,Test Drive,??ncerca??i acum,Vizualiza??i ma??ini,Vizualiza??i planuri,Vizita??i magazinul,Vota??i acum,Viziona??i,Urm??ri??i mai multe,Urm??ri??i acum
Slovak,Kona??,Po??iada??,Stavi??,Pon??knu??,Rezervova?? auto,Rezervova?? hotel,Rezervova??,K??pi??,Chatova??,Porovna??,Kontaktujte n??s,Z??ska?? kup??n,Naviga??n?? pokyny,Darova??,Stiahnu??,Nap??sa?? e-mail,Zap??sa?? sa,Poda??,N??js?? pr??cu,N??js?? obchod,Hra?? zdarma,Bezplatn?? cenov?? ponuka,Sk????obn?? verzia zdarma,Z??ska?? ponuky,Z??ska?? ponuku,Z??ska?? cenov?? ponuku,Zapoji?? sa,??al??ie inform??cie,Po????va??,Prihl??si?? sa,Objedna??,Hra??,Prehra??,Zverejni?? pracovn?? miesto,Registrova??,Obnovi??,Po??i??a?? si auto,Po??i??a?? si,Znova objedna??,Predobjedna??,Zobrazi?? z??avu,Ulo??i??,Napl??nova??,Zobrazi?? ponuku,Zobrazi?? akciu,Preda??,Nakupova??,Programy,Prihl??senie,Zaregistrova?? sa,Spusti??,Prihl??si?? sa na odber,Prepn????,Testovacia jazda,Vysk????a??,Zobrazi?? aut??,Zobrazi?? pl??ny,Nav??t??vi?? obchod,Hlasova??,Pozera??,Pozera?? ??al??ie,Pozera?? teraz
Slovenian,Ukrepajte zdaj,Prijavite se zdaj,Stavite zdaj,Dajte ponudbo zdaj,Rezervacija avtomobila,Rezervacija hotela,Rezervirajte zdaj,Kupite zdaj,Klepet,Primerjaj,Stik z nami,Pridobi kupon,Navodila,Doniraj,Prenos,Po??ljite po e-po??ti,Vpi??ite se zdaj,Po??ljite vlogo zdaj,Iskanje zaposlitve,Iskanje trgovine,Brezpla??no predvajanje,Brezpla??na ponudba,Brezpla??en preskus,Pridobi ugodnosti,Pridobi ponudbo,Prejem ponudbe,Vklju??ite se zdaj,Ve?? o tem,Poslu??aj zdaj,Prijava,Naro??ite zdaj,Igranje igre,Predvajaj zdaj,Objava delovnega mesta,Registracija,Obnovite zdaj,Najem avtomobila,Najemite zdaj,Ponovno naro??ilo,Rezerviraj,Prikaz popustov,Prihranite zdaj,Razpored,Prika??i meni,Ogled ponudbe,Prodajte takoj,Nakupovanje,??asi predvajanja,Vpis,Ustvarjanje ra??una,Za??ni zdaj,Naro??i,Preklopi zdaj,Testna vo??nja,Preizkusite zdaj,Prikaz avtomobilov,Prikaz paketov,Obisk trgovine,Glasujte zdaj,Ogled,Oglejte si ??e ve??,Oglejte si zdaj
Spanish,Actuar ahora,Aplicar ahora,Apostar ahora,Pujar ahora,Reservar coche,Reservar hotel,Reservar ahora,Comprar ahora,Chat ahora,Comparar,Cont??ctanos,Obtener cup??n,Indicaciones,Donar,Descargar,Enviar correo,Inscribirse,Archivar ahora,Buscar trabajo,Buscar tienda,Jugar gratis,Presupuesto,Jugar ahora,Obtener ofertas,Obtener oferta,Obtener oferta,Unirse ahora,M??s informaci??n,Escuchar ahora,Iniciar sesi??n,Pedir ahora,Jugar juego,Jugar ahora,Publicar anuncio,Registro,Renovar ahora,Alquilar coche,Alquilar ahora,Repetir pedido,Reservar,Ver oferta,Guardar ahora,Programaci??n,Ver men??,Ver oferta,Vender ahora,Comprar ahora,Horarios,Iniciar sesi??n,Registrarse,Iniciar ahora,Suscribirse,Cambiar ahora,Probar coche,Probar ahora,Ver coches,Ver planes,Visitar tienda,Votar ahora,Ver,Ver m??s,Ver ahora
Swedish,G??r det nu,Ans??k nu,Spela nu,Bjud nu,Boka en bil,Boka hotel,Boka nu,K??p nu,Chatta nu,J??mf??r,Kontakta oss,H??mta kupong,V??gbeskrivning,Donera,Ladda ned,Skicka mejl nu,Registrera nu,Spara nu,Hitta jobb,Hitta butik,Spela gratis,Gratis offert,Prova gratis,Se erbjudanden,Se erbjudanden,Beg??r offert,G?? med nu,Mer information,Lyssna nu,Logga in,Best??ll nu,Spela,Spela nu,L??gg upp jobb,Registrera dig,F??rnya nu,Hyr bil,Hyr nu,Best??ll igen,Reservera,Visa f??rs??ljning,Spara nu,Schemal??gg,Visa meny,Visa erbjudande,S??lj nu,Shoppa nu,F??rest??llningar,Logga in,Registrering,B??rja nu,Prenumerera,V??xla nu,Provk??r,Prova nu,Visa bilar,Visa planer,Bes??k butik,R??sta nu,Visa,Visa mer,Titta nu
TraditionalChinese,????????????,????????????,????????????,????????????,??????,?????????,????????????,????????????,????????????,??????,???????????????,???????????????,??????,??????,??????,?????????????????????,??????,????????????,?????????,????????????,?????????,????????????,????????????,????????????,????????????,????????????,????????????,????????????,????????????,??????,????????????,?????????,?????????,????????????,??????,????????????,??????,????????????,????????????,??????,????????????,????????????,??????,????????????,????????????,????????????,????????????,????????????,??????,??????,????????????,??????,????????????,??????,????????????,????????????,????????????,????????????,????????????,??????,????????????,????????????
```
