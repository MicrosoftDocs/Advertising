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
Bulgarian,Удобства,Марки,Курсове,Дипломни програми,Дестинации,Препоръчани хотели,Стоки,Застрахователно покритие,Елементи,Модели,Квартали,Услуги,Каталог на услугите,Предавания,Стилове,Типове
Chinese (Traditional zh-TW),設施,品牌,課程,學位課程,目的地,精選飯店,商品,承保範圍,項目,型號,社區,服務,服務目錄,節目,款式,類型
Croatian,Pogodnosti,Robne marke,Kolegiji,Diplomski programi,Odredišta,Izdvojeni hoteli,Roba,Polica osiguranja,Stavke,Modeli,Četvrti,Usluge,Katalog usluga,Emisije,Stilovi,Vrste
Czech,Vybavení,Značky,Kurzy,Studijní programy,Cíle,Doporučené hotely,Zboží,Pojistné krytí,Položky,Modely,Čtvrti,Služby,Katalog služeb,Pořady,Styly,Typy
Danish,Faciliteter,Mærker,Kurser,Kandidatprogrammer,Destinationer,Udvalgte hoteller,Varer,Forsikringsdækning,Elementer,Modeller,Kvarterer,Serviceydelser,Servicekatalog,Shows,Design,Typer
Dutch,Voorzieningen,Merken,Cursussen,Studieprogramma's,Bestemmingen,Aanbevolen hotels,Producten,Dekking,Items,Modellen,Buurten,Services,Servicecatalogus,Shows,Stijlen,Typen
English,Amenities,Brands,Courses,Degree programs,Destinations,Featured hotels,Goods,Insurance coverage,Items,Models,Neighborhoods,Services,Service catalog,Shows,Styles,Types
Estonian,Soodustused,Kaubamärgid,Kursused,Kraadiõppeprogrammid,Sihtkohad,Esiletõstetud hotellid,Kaubad,Kindlustuskate,Artiklid,Mudelid,Asumid,Teenused,Teenusekataloog,Etendused,Stiilid,Tüübid
Finnish,Mukavuudet,Tuotemerkit,Kurssit,Tutkinto-ohjelmat,Määränpäät,Esitellyt hotellit,Tavarat,Vakuutuksen kattavuus,Nimikkeet,Mallit,Kaupunginosat,Palvelut,Huoltoluettelo,Esitykset,Tyylit,Tyypit
French (France),Équipements,Marques,Cours,Programmes d'études,Destinations,Sélection d'hôtels,Biens,Couverture d'assurance,Éléments,Modèles,Quartiers,Services,Catalogue de services,Émissions,Styles,Types
German,Ausstattung,Marken,Kurse,Studiengänge,Ziele,Vorgestellte Hotels,Waren,Versicherungsleistung,Artikel,Modelle,Viertel,Dienstleistungen,Dienstkatalog,Serien,Stile,Typen
Greek,Παροχές,Μάρκες,Μαθήματα,Προγράμματα πτυχίου,Προορισμοί,Επιλεγμένα ξενοδοχεία,Αγαθά,Ασφαλιστική κάλυψη,Στοιχεία,Μοντέλα,Γειτονιές,Υπηρεσίες,Κατάλογος υπηρεσιών,Εκπομπές,Στυλ,Τύποι
Hungarian,Kényelmi szolgáltatások,Márkák,Tanfolyamok,Képzések,Célállomások,Kiemelt szállodák,Áruk,Biztosítási fedezet,Elemek,Modellek,Városrészek,Szolgáltatások,Szolgáltatáskatalógus,Előadások,Stílusok,Típusok
Italian,Attrattive,Marche,Corsi,Corsi di studio,Destinazioni,Hotel consigliati,Beni,Copertura assicurativa,Articoli,Modelli,Quartieri,Servizi,Catalogo de servizi,Programmi,Stili,Tipi
Latvian,Ērtības,Zīmoli,Kursi,Studiju programmas,Galamērķi,Piedāvātās viesnīcas,Preces,Apdrošināšanas segums,Vienumi,Modeļi,Apkaimes,Pakalpojumi,Pakalpojumu katalogs,Izrādes,Stili,Veidi
Lithuanian,Patogumai,Prekių ženklai,Mokymo programos,Programos laipsniui gauti,Kelionės tikslai,Atrinkti viešbučiai,Prekės,Draudimo apsauga,Elementai,Modeliai,Kaimynystė,Paslaugos,Paslaugų katalogas,Parodymai,Stiliai,Tipai
Maltese,Faċilitajiet,Ditti,Korsijiet,Programmi ta' lawrji,Destinazzjonijiet,Lukandi Msemmija,Oġġetti,Kopertura tal-assigurazzjoni,Items,Mudelli,Viċinanzi,Servizzi,Katalgu tas-servizz,Spettakli,Stili,Tipi
Norwegian,Fasiliteter,Merkevarer,Kurs,Universitetsprogrammer,Destinasjoner,Fremhevede hoteller,Varer,Forsikring,Gjenstander,Modeller,Nabolag,Tjenester,Servicekatalog,TV-serier,Stiler,Typer
Polish,Udogodnienia,Marki,Kursy,Studia,Kierunki,Polecane hotele,Produkty,Zakres ubezpieczenia,Pozycje,Modele,Osiedla,Usługi,Katalog usług,Pokazy,Style,Typy
Portuguese (Brazil pt-BR),Comodidades,Marcas,Cursos,Programas de graduação,Destinos,Hotéis em destaque,Bens,Cobertura do seguro,Itens,Modelos,Vizinhança,Serviços,Catálogo de serviços,Programas,Estilos,Tipos
Romanian,Dotări,Mărci,Cursuri,Programe educaționale,Destinații,Hoteluri recomandate,Bunuri,Acoperirea asigurării,Articole,Modele,Cartiere,Servicii,Catalog de servicii,Emisiuni,Stiluri,Tipuri
Slovak,Vybavenie,Značky,Kurzy,Študijné programy,Destinácie,Vybrané hotely,Tovar,Poistné krytie,Položky,Modely,Štvrte,Služby,Katalóg služieb,Relácie,Štýly,Typy
Slovenian,Dodatna ponudba,Blagovne znamke,Predavanja,Diplomski programi,Kraji,Izpostavljeni hoteli,Izdelki,Zavarovalno kritje,Elementi,Modeli,Mestne četrti,Storitve,Katalog storitev,Oddaje,Slogi,Vrste
Spanish (Latin America es-419),Servicios adicionales,Marcas,Cursos,Carreras universitarias,Destinos,Hoteles destacados,Artículos,Cobertura de seguro,Elementos,Modelos,Barrios,Servicios,Catálogo de servicios,Programas,Estilos,Tipos
Swedish,Bekvämligheter,Varumärken,Kurser,Utbildningar,Resmål,Hotellval,Varor,Försäkringstyper,Objekt,Bilmodeller,Grannskap,Tjänster,Servicekatalog,Program,Stilar,Typer
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
Bulgarian,Действайте сега,Кандидатствайте сега,Заложете сега,Наддайте сега,Резервирайте кола,Резервирайте хотел,Резервирайте сега,Купете сега,Чат сега,Сравняване,Връзка с нас,Вземете купон,Направления,Дарете,Изтегляне,Изпратете имейл сега,Запишете се сега,Подайте сега,Намерете работа,Намерете магазин,Безплатна игра,Безплатна оферта,Безплатен пробен период,Вземете оферти,Получете оферта,Вземете оферта,Присъединете се сега,Научете повече,Слушайте сега,Влизане,Поръчайте сега,Играйте,Играйте сега,Публикувайте работна оферта,Регистриране,Подновете сега,Кола под наем,Наемете сега,Поръчайте отново,Резервирайте,Преглед на разпродажбата,Спестете сега,Програма,Преглед на менюто,Преглед на офертата,Продайте сега,Пазарувайте сега,Прожекции,Вход,Регистрирация,Стартирайте сега,Абониране,Превключете сега,Тестово шофиране,Опитайте сега,Преглед на автомобилите,Преглед на плановете,Посетете магазина,Гласувайте сега,Гледайте,Гледайте още,Гледайте сега
Croatian,Djelujte sada,Primijeni sada,Kladite se sada,Pošaljite ponudu sada,Rezervirajte automobil,Rezervirajte hotel,Rezervirajte odmah,Kupite sada,Razgovarajte sada,Usporedi,Obratite nam se,Ostvarite kupon,Upute,Doniraj,Preuzmi,Pošalji poruku e-pošte sada,Upišite se sada,Predajte odmah,Traženje posla,Traženje trgovine,Besplatna reprodukcija,Besplatna ponuda,Besplatna probna verzija,Ostvarite ponude,Ostvarite ponudu,Zatražite ponudu,Pridruži se sada,Saznajte više,Slušajte sada,Prijava,Naručite sada,Igraj igru,Igraj sada,Objavi posao,Registracija,Obnovi sada,Unajmite automobil,Unajmi sada,Promijeni redoslijed,Rezerviraj,Pogledajte rasprodaju,Spremi sada,Zakaži,Pogledaj jelovnik,Prikaži ponudu,Prodaj sada,Krenite u kupovinu,Raspored prikazivanja,Prijavite se,Registrirajte se,Započnite odmah,Pretplatite se,Promijeni odmah,Probna vožnja,Isprobajte sada,Prikaži automobile,Prikaži planove,Posjeti trgovinu,Glasajte sada,Gledaj,Pogledajte više,Pogledajte sada
Czech,Jednat,Požádat,Vsadit si,Učinit nabídku,Rezervace auta,Rezervovat hotel,Zarezervovat,Kup teď,Chatovat,Porovnat,Kontaktujte nás,Získat kupon,Navigační pokyny,Darovat,Stáhnout,Napsat e-mail,Zapsat se,Podat,Najít práci,Najít obchod,Hrát zdarma,Bezplatná nabídka,Bezplatná zkušební verze,Získat slevy,Získat nabídku,Požádat o nabídku,Zapojit se,Další informace,Poslouchat,Přihlásit se,Objednat,Hrát,Přehrát,Zveřejnit,Registrovat,Prodloužit,Pronájem auta,Pronajmout,Přeobjednat,Rezervovat,Zobrazit slevu,Uložit,Časový plán,Zobrazit menu,Zobrazit nabídku,Prodat,Nakupovat,Programy,Přihlášení,Zaregistrovat se,Spustit,Přihlásit se k odběru,Přejít,Zkušební jízda,Vyzkoušet,Zobrazit auta,Zobrazit plány,Navštívit obchod,Hlasovat,Sledovat,Sledovat další,Sledovat nyní
Danish,Handl nu,Ansøg nu,Spil nu,Byd nu,Reservér en bil,Bestil hotel,Reservér nu,Køb nu,Chat nu,Sammenlign nu,Kontakt os,Få kupon,Rutevejledning,Doner,Download,Send e-mail nu,Tilmeld dig nu,Anmeld nu,Find job,Find butik,Gratis spil,Gratis tilbud,Gratis prøve,Få tilbud,Få tilbud,Få et tilbud,Deltag nu,Få mere at vide,Lyt nu,Log på,Bestil nu,Spil spil,Spil nu,Opslå job,Registrer,Forny ny,Lej en bil,Lej nu,Bestil igen,Reservér,Se udsalg,Gem nu,Spilleplan,Se menu,Se tilbud,Sælg nu,Shop nu,Spilletider,Log på,Tilmeld dig,Start nu,Abonner,Skift nu,Prøvetur,Prøv nu,Se biler,Vis planer,Besøg butik,Stem nu,Se,Se mere,Se nu
Dutch,Nu beslissen,Nu solliciteren,Nu inzetten,Nu bieden,Auto huren,Hotel boeken,Nu boeken,Nu kopen,Nu chatten,Vergelijken,Contact opnemen,Coupon aanvragen,Route,Doneren,Downloaden,Nu e-mailen,Nu inschrijven,Nu inzenden,Vacature zoeken,Winkel zoeken,Gratis spelen,Gratis offerte,Gratis demo,Deals zien,Aanbieding zien,Offerte krijgen,Nu meedoen,Meer informatie,Nu luisteren,Aanmelden,Nu bestellen,Game spelen,Nu spelen,Vacature plaatsen(Not supported),Registreren,Nu vernieuwen,Auto huren,Nu huren,Nabestellen,Reserveren,Sale bekijken,Nu besparen,Schema,Menu zien,Aanbieding zien,Nu verkopen,Nu shoppen,Aanvangstijd,Aanmelden,Registreren,Nu beginnen,Abboneren,Nu wisselen,Proefrit,Nu proberen,Auto's tonen,Plannen tonen,Winkel bezoeken,Nu stemmen,Kijken,Meer kijken,Nu kijken
English,Act Now,Apply Now,Bet Now,Bid Now,Book A Car,Book Hotel,Book Now,Buy Now,Chat Now,Compare,Contact Us,Get Coupon,Directions,Donate,Download,Email Now,Enroll Now,File Now,Find Job,Find Store,Free Play,Free Quote,Free Trial,Get Deals,Get Offer,Get Quote,Join Now,Learn More,Listen Now,Log In,Order Now,Play Game,Play Now,Post Job,Register,Renew Now,Rent A Car,Rent Now,Reorder,Reserve,See Sale,Save Now,Schedule,See Menu,See Offer,Sell Now,Shop Now,Showtimes,Sign In,Sign Up,Start Now,Subscribe,Switch Now,Test Drive,Try Now,View Cars,View Plans,Visit Store,Vote Now,Watch,Watch More,Watch Now
Estonian,Tegutse kohe,Rakenda kohe,Panusta kohe,Paku kohe,Broneeri auto,Broneeri hotell,Broneeri kohe,Osta kohe,Vestle kohe,Võrdle,Kontaktteave,Hangi kupong,Juhised,Anneta,Laadi alla,Meili kohe,Registreeru kohe,Esita taotlus kohe,Otsi tööd,Otsi poodi,Tasuta mäng,Tasuta hinnapakkumine,Tasuta prooviversioon,Hangi pakkumisi,Hangi pakkumine,Hangi hinnapakkumine,Liitu kohe,Lisateave,Kuula kohe,Logi sisse,Telli kohe,Mängi,Esita kohe,Postita töö,Registreeri,Uuenda kohe,Autorent,Rendi kohe,Telli uuesti,Reserveeri,Kuva allahindlus,Säästa kohe,Ajasta,Kuva menüü,Kuva pakkumine,Müü kohe,Mine poodi,Esitusajad,Sisse logima,Registreeru,Alusta kohe,Telli,Vaheta kohe,Proovisõit,Proovi kohe,Vaata autosid,Kuva plaanid,Külasta poodi,Hääleta kohe,Vaata,Vaata veel,Vaata kohe
Finnish,Toimi nyt,Käytä nyt,Veikkaa nyt,Tarjoa nyt,Varaa auto,Varaa hotelli,Varaa nyt,Osta nyt,Keskustele nyt,Vertaa,Ota yhteyttä,Hanki kuponki,Reittiohjeet,Lahjoita,Lataa,Sähköpostita,Ilmoittaudu nyt,Hae nyt,Etsi työpaikka,Etsi kauppa,Ilmainen peli,Ilmaistarjous,Ilmaiskokeilu,Hae sopimuksia,Hae tarjous,Hae tarjous,Liity nyt,Lue lisää,Kuuntele nyt,Kirjaudu sisään,Tilaa nyt,Pelaa peli,Toista nyt,Lähetä työ,Rekisteröi,Uusi nyt,Vuokraa auto,Vuokraa nyt,Tilaa uudelleen,Varaa,Katso tarjous,Tallenna nyt,Aikataulu,Näytä valikko,Näytä tarjous,Myy nyt,Osta nyt,Esitysajat,Kirjaudu sisään,Rekisteröidy,Aloita nyt,Tilaa,Vaihda nyt,Koeajo,Kokeile nyt,Näytä autot,Suunnitelmat,Siirry kauppaan,Äänestä nyt,Katso,Katso lisää,Katso nyt
French,Allez-y,Appliquer,Parier,Faire une offre,Réserver voiture,Réserver hôtel,Réserver,Acheter,Discuter,Comparer,Nous contacter,Obtenir un bon,Itinéraires,Faire un don,Télécharger,Envoyer e-mail,S’inscrire,Ranger,Trouver emploi,Trouver un magasin(Not supported),Jeu gratuit,Devis gratuit,Essai gratuit,Obtenir offres,Obtenir offre,Obtenir devis,Rejoindre,En savoir plus,Écouter,Connexion,Commander,Jouer,Lire,Publier emploi,S’inscrire,Renouveler,Louer voiture,Louer,Recommander,Réserver,Voir l'offre,Enregistrer,Planifier,Voir le menu,Voir l’offre,Vendre,Acheter,Horaires,Connexion,S’inscrire,Démarrer,S’abonner,Changer,Version d’évaluation(Not supported),Essayer,Afficher voitures(Not supported),Afficher plans,Visiter un magasin(Not supported),Voter,Regarder,Regarder plus,Regarder
German,Jetzt handeln,Jetzt bewerben,Jetzt wetten,Jetzt bieten,Auto buchen,Hotel buchen,Jetzt buchen,Jetzt kaufen,Jetzt chatten,Vergleichen,Kontaktieren,Gutschein holen,Wegbeschreibung,Spenden,Download,E-Mail senden,Registrieren,Einreichen,Job suchen,Shop suchen,Kostenlos spielen(Not supported),Kostenloses Angebot(Not supported),Kostenlose Testversion(Not supported),Angebote,Angebot,Angebot,Jetzt beitreten,Mehr Info,Jetzt anhören,Anmelden,Jetzt bestellen,Spiel spielen,Jetzt spielen,Job posten,Registrieren,Jetzt verlängern,Auto mieten,Jetzt mieten,Neu bestellen,Reservieren,Sale anzeigen,Jetzt speichern,Zeitplan,Menü anzeigen,Angebot anzeigen,Jetzt verkaufen,Jetzt einkaufen,Vorstellungen,Anmelden,Registrieren,Jetzt starten,Abonnieren,Jetzt wechseln,Testfahrt,Jetzt testen,Autos anzeigen,Pläne anzeigen,Shop besuchen,Jetzt abstimmen,Ansehen,Weitere ansehen,Jetzt ansehen
Greek,Δράστε τώρα,Αίτηση τώρα,Στοίχημα τώρα,Προσφορά τώρα,Κράτηση αυτοκινήτου,Κράτηση ξενοδοχείου,Κράτηση τώρα,Αγορά τώρα,Συνομιλία τώρα,Σύγκριση,Επικοινωνία,Απόκτηση κουπονιού,Οδηγίες,Δωρεά,Λήψη,Αποστολή email τώρα,Εγγραφή τώρα,Αρχειοθέτηση τώρα,Εύρεση εργασίας,Εύρεση καταστήματος,Δωρεάν παιχνίδι,Δωρεάν προσφορά,Δωρεάν δοκιμή,Λάβετε προσφορές,Λάβετε προσφορά,Λάβετε τιμή,Εγγραφή τώρα,Μάθετε περισσότερα,Ακρόαση τώρα,Σύνδεση,Παραγγελία τώρα,Αναπαραγωγή παιχνιδιού,Αναπαραγωγή τώρα,Δημοσίευση θέσης εργασίας,Καταχώριση,Ανανέωση τώρα,Ενοικίαση αυτοκινήτου,Ενοικίαση τώρα,Αναπαραγγελία,Κράτηση,Προβολή πώλησης,Αποθήκευση τώρα,Πρόγραμμα,Προβολή μενού,Προβολή προσφοράς,Πώληση τώρα,Αγορά τώρα,Ώρες προβολής,Είσοδος,Εγγραφή,Έναρξη τώρα,Συνδρομή,Μετάβαση τώρα,Δοκιμή,Δοκιμή τώρα,Προβολή αυτοκινήτων,Προβολή σχεδίων,Επίσκεψη στο κατάστημα,Ψηφοφορία τώρα,Παρακολούθηση,Παρακολούθηση περισσότερων,Παρακολούθηση τώρα
Hungarian,Cselekvés,Alkalmaz,Fogadás,Licitálás,Autófoglalás,Szállodai foglalás,Foglalás most,Megvásárlás most,Csevegés most,Összehasonlítás,Kapcsolatfelvétel,Kupon beszerzése,Útvonalak,Adományozás,Letöltés,E-mail küldése,Regisztráció most,Iktatás,Állás keresése,Üzlet keresése,Ingyenesen játszható,Ingyenes árajánlat,Ingyenes próbaverzió,Ajánlatok megtekintése,Ajánlat igénybevétele,Ajánlat kérése,Csatlakozás most,További információ,Hallgatás,Belépés,Rendelés,Játék,Lejátszás,Álláshirdetés feladása,Regisztráció,Megújítás,Autóbérlés,Bérlés,Újrarendelés,Foglalás,Akció megtekintése,Megtakarítás,Ütemezés,Menü megtekintése,Ajánlat megtekintése,Eladás,Vásárlás most,Műsorok,Bejelentkezés,Csatlakozás,Kezdés most,Feliratkozás,Váltás most,Tesztvezetés,Kipróbálás,Autók megtekintése,Csomgaok megtekintése,Áruház felkeresése,Szavazás,Megtekintés,Továbbiak megtekintése,Megtekintés most
Italian,Agisci ora,Applica ora,Scommetti ora,Offri ora,Prenota un'auto,Prenota hotel,Prenota ora,Acquista ora,Chatta ora,Confronta,Contattaci,Ottieni coupon,Indicazioni,Dona,Scarica,Invia e-mail,Iscriviti ora,Inoltra ora,Trova lavoro,Trova il negozio,Gioco gratuito,Preventivo gratis(Not supported),Prova gratuita,Ottieni offerte,Ottieni offerta,Preventivo,Partecipa ora,Ulteriori info,Ascolta ora,Accedi,Ordina ora,Gioca,Riproduci ora,Offerta lavoro,Registrati,Rinnova ora,Noleggia auto,Noleggia ora,Riordina,Prenota,Guarda sconto,Salva ora,Pianifica,Visualizza menu,Vedi offerta,Vendi ora,Acquista ora,Orari,Accedi,Iscriviti,Inizia ora,Sottoscrivi,Cambia subito,Prova su strada,Prova ora,Visualizza auto,Vedi piani,Visita negozio,Vota ora,Guarda,Guarda altro,Guarda ora
Latvian,Rīkojieties tūlīt,Lietot tagad,Solīt tūlīt,Soliet tūlīt,Rezervēt automašīnu,Rezervēt viesnīcu,Rezervēt tagad,Pirkt tūlīt,Tērzēt tagad,Salīdzināt,Sazināties ar mums,Saņemt kuponu,Norādes,Ziedot,Lejupielādēt,Nosūtīt e-pasta ziņojumu tūlīt,Reģistrēties tūlīt,Iesniegt tūlīt,Atrast darbu,Atrast veikalu,Bezmaksas spēle,Bezmaksas piedāvājums,Bezmaksas izmēģinājumversija,Saņemt piedāvājumus,Saņemt piedāvājumu,Iegūt piedāvājumu,Pievienoties tūlīt,Uzzināt vairāk,Klausīties tūlīt,Pieteikties,Pasūtīt tūlīt,Spēlēt spēli,Atskaņot tagad,Publicēt darbu,Piereģistrēties,Atjaunot tūlīt,Nomāt automašīnu,Nomāt tūlīt,Pārkārtot,Rezervēt,Skatīt izpārdošanas piedāvājumu,Ietaupīt tūlīt,Grafiks,Skatīt izvēlni,Skatīt piedāvājumu,Pārdot tūlīt,Iepirkties tūlīt,Seansi,Pierakstīties,Reģistrēties,Sākt tūlīt,Abonēt,Pārslēgt tūlīt,Izmēģinājuma brauciens,Izmēģināt tūlīt,Skatīt automašīnas,Skatīt plānus,Apmeklēt veikalu,Balsot tūlīt,Skatīties,Skatīties vēl,Skatīties tūlīt
Lithuanian,Veikti dabar,Teikti paraišką dabar,Lažintis dabar,Siūlyti kainą dabar,Užsisakyti automobilį,Užsisakyti viešbutį,Užsakyti dabar,Įsigyti dabar,Kalbėtis dabar,Palyginti,Kontaktinė informacija,Gauti kuponą,Kryptys,Aukoti,Atsisiųsti,Siųsti el. paštu dabar,Registruotis dabar,Užpildyti dabar,Rasti darbą,Rasti parduotuvę,Nemokamas žaidimas,Nemokamas pasiūlymas,Nemokama bandomoji versija,Puikūs pasiūlymai,Gauti pasiūlymą,Gauti kainą,Prisijungti dabar,Sužinokite daugiau,Klausytis dabar,Prisijungimas,Užsisakyti dabar,Žaisti žaidimą,Leisti dabar,Pašto darbas,Registruotis,Atnaujinti dabar,Išsinuomoti automibilį,Išsinuomoti dabar,Pertvarkyti,Rezervuoti,Peržiūrėti išpardavimą,Įrašyti dabar,Tvarkaraštis,Rodyti meniu,Rodyti pasiūlymą,Parduoti dabar,Apsipirkti dabar,Rodymo laikas,Prisijungti,Prisiregistruoti,Pradėti dabar,Prenumeruoti,Perjungti dabar,Bandomoji versija,Išbandyti dabar,Peržiūrėti automobilius,Peržiūrėti planus,Apsilankyti parduotuvėje,Balsuoti dabar,Žiūrėti,Žiūrėti daugiau,Žiūrėti dabar
Maltese,Ħu Azzjoni Issa,Applika Issa,Agħmel Imħatra Issa,Agħmel Offerta Issa,Ibbukkja Karozza,Ibbukkja Lukanda,Ibbukkja Issa,Ixtri Issa,Iċċettja Issa,Qabbel,Ikkuntattjana,Ikseb Kupun,Direzzjonijiet,Agħti donazzjoni,Niżżel,Ibgħat Email Issa,Inkiteb Issa,Iffajlja Issa,Sib Impjieg,Sib Ħanut,Logħob b'Xejn,Kwotazzjoni b'Xejn,Prova b'Xejn,Ikseb Prezzijiet Vantaġġjużi,Ikseb Offerta,Ikseb Kwota,Issieħeb issa,Sir af aktar,Isma' Issa,Illoggja,Ordna Issa,Ilgħab il-Logħba,Doqq issa,Ippowstja l-Impjieg,Irreġistra,Ġedded Issa,Ikri Karozza,Ikri Issa,Erġa' poġġi fl-ordni,Irriżerva,Ara l-Iskont,Issejvja Issa,Skeda,Ara l-Menu,Ara l-Offerta,Biegħ Issa,Agħmel ix-Xirja Issa,Ħinijiet ta' wiri,Idħol,Oħloq akkawnt,Ibda Issa,Abbona,Aqleb Issa,Test tas-Sewqan,Ipprova Issa,Ara l-Karozzi,Ara l-Pjanijiet,Żur il-Ħanut,Ivvota Issa,Ara,Ara Aktar,Ara Issa
Norwegian,Handle nå,Søk nå,Sats nå,By nå,Reserver en bil,Reserver hotell,Reserver nå,Kjøp nå,Chat nå,Sammenlign,Kontakt oss,Hent kupong,Veibeskrivelse,Doner,Last ned,Send e-post nå,Registrer deg,Søk nå,Finn jobb,Finn butikk,Gratis spill,Gratis anbud,Gratis prøveversjon(Not supported),Få tilbud,Få tilbud,Få anbud,Bli med nå,Les mer,Hør nå,Logg på,Bestill nå,Spill,Spill nå,Legg ut jobb,Registrer deg,Forny nå,Lei en bil,Lei nå,Bestill på nytt,Reserver,Se salg,Spar nå,Terminliste,Se meny,Se tilbud,Selg nå,Handle nå,Visningstider,Logg på,Meld deg på,Start nå,Abonner,Bytt nå,Testkjør,Prøv nå,Vis biler,Se planer,Gå til butikk,Stem nå,Se,Se mer,Se nå
Polish,Działaj teraz,Zgłoś się teraz,Postaw teraz,Licytuj teraz,Zarezerwuj samochód,Zarezerwuj pokój,Zarezerwuj teraz,Kup teraz,Porozmawiaj na czacie,Porównaj,Skontaktuj się z nami,Uzyskaj kupon,Wskazówki dojazdu,Przekaż darowiznę,Pobierz,Wyślij e-mail teraz,Zapisz się teraz,Złóż teraz,Znajdź pracę,Znajdź sklep,Bezpłatna rozgrywka,Bezpłatna wycena,Bezpłatny okres próbny,Uzyskaj oferty,Uzyskaj ofertę,Uzyskaj wycenę,Dołącz teraz,Dowiedz się więcej,Posłuchaj teraz,Zaloguj się,Zamów teraz,Zagraj w coś,Zagraj teraz,Zamieść ofertę pracy,Zarejestruj się,Odnów teraz,Wynajmij samochód,Wynajmij teraz,Zamów ponownie,Zarezerwuj,Zobacz wyprzedaż,Zapisz teraz,Zaplanuj,Zobacz menu,Zobacz ofertę,Sprzedaj teraz,Kup teraz,Pory seansów,Zaloguj się,Zarejestruj się,Rozpocznij teraz,Zasubskrybuj,Przejdź teraz,Jazda próbna,Wypróbuj teraz,Zobacz samochody,Zobacz taryfy,Odwiedź sklep,Zagłosuj teraz,Obejrzyj,Obejrzyj więcej,Obejrzyj teraz
Portuguese,Aja Agora,Solicitar Agora,Apostar Agora,Fazer Lance,Alugar um Carro,Reservar Hotel,Reservar Agora,Comprar Agora,Conversar Agora,Comparar,Fale Conosco,Obter Cupom,Trajeto,Doar,Download,Enviar Email,Registrar Agora,Arquivar Agora,Buscar Trabalho,Encontrar Loja,Jogo Grátis,Cotação Grátis,Avalie Grátis,Obter Ofertas,Obter Oferta,Obter Cotação,Ingressar Agora,Saiba Mais,Ouvir Agora,Fazer Logon,Encomendar,Jogar Jogo,Jogar Agora,Postar Trabalho,Registrar,Renovar Agora,Alugar um Carro,Alugar Agora,Comprar de novo,Reservar,Ver Promoção,Salvar Agora,Agenda,Ver Menu,Ver Oferta,Vender Agora,Comprar Agora,Horários,Entrar,Inscrever-se,Iniciar Agora,Assinar,Mudar Agora,Test Drive,Experimentar Já,Exibir Carros,Exibir Planos,Visitar Loja,Votar Agora,Assistir,Assistir Mais,Assistir Agora
Romanian,Acționați acum,Aplicați acum,Pariați acum,Licitați acum,Rezervați o mașină,Rezervați o cameră de hotel,Rezervați acum,Achiziționați acum,Discutați acum,Comparați,Contactați-ne,Obțineți un cupon,Indicații,Donați,Descărcați,Trimiteți un e-mail acum,Înscrieți-vă acum,Arhivați acum,Găsiți un loc de muncă,Găsiți magazinul,Redați gratis,Cotație gratis,Încercare gratuită,Obțineți oferte,Obțineți o ofertă,Obțineți cotația,Alăturați-vă acum,Aflați mai multe,Ascultați acum,Logați-vă,Comandați acum,Jucați jocuri,Redați acum,Postați un loc de muncă,Înregistrați,Prelungiți acum,Închiriați o mașină,Închiriați acum,Reordonați,Rezervați,Vedeți reducerile,Salvați acum,Program,Vedeți meniul,Vedeți oferta,Vindeți acum,Cumpărați acum,Programul emisiunilor,Conectați-vă,Înregistrați-vă,Începeți acum,Abonați-vă,Comutați acum,Test Drive,Încercați acum,Vizualizați mașini,Vizualizați planuri,Vizitați magazinul,Votați acum,Vizionați,Urmăriți mai multe,Urmăriți acum
Slovak,Konať,Požiadať,Staviť,Ponúknuť,Rezervovať auto,Rezervovať hotel,Rezervovať,Kúpiť,Chatovať,Porovnať,Kontaktujte nás,Získať kupón,Navigačné pokyny,Darovať,Stiahnuť,Napísať e-mail,Zapísať sa,Podať,Nájsť prácu,Nájsť obchod,Hrať zdarma,Bezplatná cenová ponuka,Skúšobná verzia zdarma,Získať ponuky,Získať ponuku,Získať cenovú ponuku,Zapojiť sa,Ďalšie informácie,Počúvať,Prihlásiť sa,Objednať,Hrať,Prehrať,Zverejniť pracovné miesto,Registrovať,Obnoviť,Požičať si auto,Požičať si,Znova objednať,Predobjednať,Zobraziť zľavu,Uložiť,Naplánovať,Zobraziť ponuku,Zobraziť akciu,Predať,Nakupovať,Programy,Prihlásenie,Zaregistrovať sa,Spustiť,Prihlásiť sa na odber,Prepnúť,Testovacia jazda,Vyskúšať,Zobraziť autá,Zobraziť plány,Navštíviť obchod,Hlasovať,Pozerať,Pozerať ďalšie,Pozerať teraz
Slovenian,Ukrepajte zdaj,Prijavite se zdaj,Stavite zdaj,Dajte ponudbo zdaj,Rezervacija avtomobila,Rezervacija hotela,Rezervirajte zdaj,Kupite zdaj,Klepet,Primerjaj,Stik z nami,Pridobi kupon,Navodila,Doniraj,Prenos,Pošljite po e-pošti,Vpišite se zdaj,Pošljite vlogo zdaj,Iskanje zaposlitve,Iskanje trgovine,Brezplačno predvajanje,Brezplačna ponudba,Brezplačen preskus,Pridobi ugodnosti,Pridobi ponudbo,Prejem ponudbe,Vključite se zdaj,Več o tem,Poslušaj zdaj,Prijava,Naročite zdaj,Igranje igre,Predvajaj zdaj,Objava delovnega mesta,Registracija,Obnovite zdaj,Najem avtomobila,Najemite zdaj,Ponovno naročilo,Rezerviraj,Prikaz popustov,Prihranite zdaj,Razpored,Prikaži meni,Ogled ponudbe,Prodajte takoj,Nakupovanje,Časi predvajanja,Vpis,Ustvarjanje računa,Začni zdaj,Naroči,Preklopi zdaj,Testna vožnja,Preizkusite zdaj,Prikaz avtomobilov,Prikaz paketov,Obisk trgovine,Glasujte zdaj,Ogled,Oglejte si še več,Oglejte si zdaj
Spanish,Actuar ahora,Aplicar ahora,Apostar ahora,Pujar ahora,Reservar coche,Reservar hotel,Reservar ahora,Comprar ahora,Chat ahora,Comparar,Contáctanos,Obtener cupón,Indicaciones,Donar,Descargar,Enviar correo,Inscribirse,Archivar ahora,Buscar trabajo,Buscar tienda,Jugar gratis,Presupuesto,Jugar ahora,Obtener ofertas,Obtener oferta,Obtener oferta,Unirse ahora,Más información,Escuchar ahora,Iniciar sesión,Pedir ahora,Jugar juego,Jugar ahora,Publicar anuncio,Registro,Renovar ahora,Alquilar coche,Alquilar ahora,Repetir pedido,Reservar,Ver oferta,Guardar ahora,Programación,Ver menú,Ver oferta,Vender ahora,Comprar ahora,Horarios,Iniciar sesión,Registrarse,Iniciar ahora,Suscribirse,Cambiar ahora,Probar coche,Probar ahora,Ver coches,Ver planes,Visitar tienda,Votar ahora,Ver,Ver más,Ver ahora
Swedish,Gör det nu,Ansök nu,Spela nu,Bjud nu,Boka en bil,Boka hotel,Boka nu,Köp nu,Chatta nu,Jämför,Kontakta oss,Hämta kupong,Vägbeskrivning,Donera,Ladda ned,Skicka mejl nu,Registrera nu,Spara nu,Hitta jobb,Hitta butik,Spela gratis,Gratis offert,Prova gratis,Se erbjudanden,Se erbjudanden,Begär offert,Gå med nu,Mer information,Lyssna nu,Logga in,Beställ nu,Spela,Spela nu,Lägg upp jobb,Registrera dig,Förnya nu,Hyr bil,Hyr nu,Beställ igen,Reservera,Visa försäljning,Spara nu,Schemalägg,Visa meny,Visa erbjudande,Sälj nu,Shoppa nu,Föreställningar,Logga in,Registrering,Börja nu,Prenumerera,Växla nu,Provkör,Prova nu,Visa bilar,Visa planer,Besök butik,Rösta nu,Visa,Visa mer,Titta nu
TraditionalChinese,立即行動,立即申請,立即下注,立即出價,買車,訂旅館,立即預訂,立即購買,立即交談,比較,與我們連絡,取得優惠券,路線,捐贈,下載,立即寄電子郵件,探索,立即提交,找工作,尋找商店,免費玩,免費報價,免費試用,取得優惠,取得優惠,取得報價,立即加入,深入了解,立即聆聽,登入,立即訂購,玩遊戲,立即玩,張貼職缺,註冊,立即更新,租車,立即租下,重新訂購,預約,查看銷售,立即省錢,排程,查看菜單,查看優惠,立即銷售,立即選購,放映時間,登入,註冊,立即開始,訂閱,立即切換,試駕,立即試試,檢視車輛,檢視方案,造訪商店,立即投票,觀看,觀看更多,立即觀看
```
