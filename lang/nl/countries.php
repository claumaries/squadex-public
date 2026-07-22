<?php

$country = static function (
    string $intro,
    string $capital,
    string $history,
    string $economy,
    string $government,
    string $geography,
    string $tourism,
    string $cuisine,
    string $summary,
): string {
    return "<p>{$intro}</p>
<p class=\"mt-1\"><b>Hoofdstad en grote steden:</b></p>
<p>{$capital}</p>
<p class=\"mt-1\"><b>Geschiedenis en cultuur:</b></p>
<p>{$history}</p>
<p class=\"mt-1\"><b>Economie:</b></p>
<p>{$economy}</p>
<p class=\"mt-1\"><b>Bestuur en politiek:</b></p>
<p>{$government}</p>
<p class=\"mt-1\"><b>Geografie en klimaat:</b></p>
<p>{$geography}</p>
<p class=\"mt-1\"><b>Toerisme en bezienswaardigheden:</b></p>
<p>{$tourism}</p>
<p class=\"mt-1\"><b>Keuken:</b></p>
<p>{$cuisine}</p>
<p>{$summary}</p>";
};

return [
    'ae' => $country(
        'De Verenigde Arabische Emiraten zijn een federatie op het Arabisch Schiereiland, bekend om moderne steden, woestijnlandschappen en sterke handelsnetwerken.',
        'Abu Dhabi is de hoofdstad, terwijl Dubai, Sharjah en andere emiraten belangrijke economische en culturele centra vormen.',
        'Sinds de vorming in 1971 combineert het land bedoeïenentradities en islamitisch erfgoed met een uitgesproken internationale levensstijl.',
        'De economie steunt op olie en gas, maar ook op logistiek, luchtvaart, vastgoed, financiën en toerisme.',
        'Het land is een federatie van erfelijke emiraten, bestuurd door heersers die samen het nationale beleid bepalen.',
        'Het landschap bestaat uit woestijn, kuststroken en moderne stedelijke zones, met een heet en droog klimaat.',
        'Bezoekers trekken naar iconen als de Burj Khalifa, Palm Jumeirah, luxeresorts en grote winkel- en cultuurcomplexen.',
        'De Emiratische keuken mengt Arabische tradities met invloeden uit Zuid-Azië, Perzië en de Levant.',
        'De Emiraten vallen op door hun mix van traditie, ambitie en uitgesproken moderne uitstraling.'
    ),
    'ar' => $country(
        "Argentinië ligt in het zuiden van Zuid-Amerika en staat bekend om de Andes, de pampa's, Patagonië en een diepe voetbalcultuur.",
        'Buenos Aires is de hoofdstad, met Córdoba, Rosario en Mendoza als andere grote stedelijke centra.',
        'De nationale identiteit werd gevormd door onafhankelijkheid, Europese immigratie, tango en een rijke literaire en sportieve traditie.',
        'De economie leunt op landbouw, energie, mijnbouw, industrie en een sterke export van vlees, graan en wijn.',
        'Argentinië is een federale republiek met een democratisch meerpartijenstelsel en terugkerende politieke en economische schommelingen.',
        "Het land strekt zich uit van subtropische regio's in het noorden tot koude zuidelijke gebieden, met grote landschappelijke variatie.",
        'Patagonië, de Iguazú-watervallen, Mendoza en de wijken van Buenos Aires maken het land bijzonder aantrekkelijk voor reizigers.',
        'De Argentijnse keuken is beroemd om asado, empanadas, vleesgerechten en wijnen van internationale klasse.',
        'Argentinië combineert sterke cultuur, indrukwekkende natuur en een uitgesproken nationaal karakter.'
    ),
    'ro' => $country(
        "Roemenië ligt op het kruispunt van Centraal- en Oost-Europa en valt op door zijn berglandschappen, folklore en historische regio's.",
        'Boekarest is de hoofdstad, terwijl Cluj-Napoca, Timișoara en Iași belangrijke stedelijke en culturele knooppunten zijn.',
        'De geschiedenis van Roemenië weerspiegelt Romeinse, Ottomaanse, Hongaarse en Slavische invloeden, zichtbaar in taal, architectuur en tradities.',
        'De economie steunt op industrie, landbouw, IT, diensten en een groeiende rol binnen de Europese markt.',
        'Roemenië is een semipresidentiële republiek en lid van de Europese Unie, met blijvende aandacht voor bestuurlijke hervormingen.',
        'De Karpaten, heuvels, vlaktes en de Donaudelta zorgen voor afwisseling, met een gematigd continentaal klimaat.',
        'Bezoekers kennen het land van Transsylvanië, Bran, middeleeuwse steden en natuurgebieden in de bergen en delta.',
        'De keuken is stevig en huiselijk, met sarmale, mămăligă, soepen en regionale baktradities.',
        'Roemenië biedt een eigen mix van geschiedenis, natuur en levendige regionale cultuur.'
    ),
    'au' => $country(
        'Australië is een eilandcontinent dat bekendstaat om unieke fauna, grote afstanden en een multiculturele samenleving.',
        'Canberra is de hoofdstad, terwijl Sydney, Melbourne, Brisbane en Perth de bekendste grootstedelijke gebieden zijn.',
        'De cultuur van het land is gevormd door de oudste inheemse tradities ter wereld en door Britse en latere migratiegolven.',
        'De economie is sterk en gediversifieerd, met mijnbouw, landbouw, onderwijs, technologie en toerisme als belangrijke pijlers.',
        'Australië is een parlementaire democratie en constitutionele monarchie met stabiele instellingen.',
        'Van de Outback en tropische regenwouden tot lange kusten en rifgebieden kent het land uiteenlopende klimaten en landschappen.',
        'Het Great Barrier Reef, Uluru, nationale parken en iconische steden trekken bezoekers uit de hele wereld.',
        'De Australische keuken combineert lokale producten, inheemse ingrediënten en invloeden uit Azië en Europa.',
        'Australië verenigt natuurlijke grootsheid met een moderne, open en internationaal georiënteerde cultuur.'
    ),
    'be' => $country(
        'België ligt in West-Europa en is klein van omvang, maar groot in historische invloed, handel en internationale instellingen.',
        'Brussel is de hoofdstad; Antwerpen, Gent, Brugge en Luik zijn eveneens bepalende steden.',
        'Het land kent een gelaagde geschiedenis met Nederlandse, Franse en Duitse invloeden en een sterke traditie in kunst en stadsleven.',
        'De economie draait op industrie, logistiek, diensten, handel en Europese instellingen.',
        "België is een federale constitutionele monarchie waarin regio's en gemeenschappen een grote rol spelen.",
        "Het landschap varieert van kustvlakten en stedelijke regio's tot de heuvels van de Ardennen, met een gematigd zeeklimaat.",
        'Middeleeuwse binnensteden, musea, biercultuur en het Brusselse politieke centrum maken België aantrekkelijk voor bezoekers.',
        'De Belgische keuken is beroemd om chocolade, wafels, frieten, bieren en verfijnde streekgerechten.',
        'België koppelt historische charme aan een moderne rol in Europa.'
    ),
    'bg' => $country(
        'Bulgarije is een Balkanland met diepe historische wortels en een sterke traditie in folklore, muziek en regionale gebruiken.',
        'Sofia is de hoofdstad, met Plovdiv, Varna en Burgas als andere belangrijke steden.',
        'Thracische, Byzantijnse, Slavische en Ottomaanse invloeden hebben een cultureel landschap gevormd dat nog altijd zichtbaar is.',
        'De economie omvat industrie, landbouw, IT, toerisme en dienstverlening, met nauwe banden met de Europese markt.',
        'Bulgarije is een parlementaire republiek en lid van de Europese Unie.',
        'Het land heeft bergen, vlaktes en een kust aan de Zwarte Zee, met warme zomers en koude winters in het binnenland.',
        'Kloosters, oude steden, skigebieden en badplaatsen aan zee trekken uiteenlopende bezoekers.',
        'De keuken is rijk aan gegrilde gerechten, salades, yoghurt, deegspecialiteiten en Balkaninvloeden.',
        'Bulgarije combineert oude tradities, afwisselende natuur en een nuchtere moderne dynamiek.'
    ),
    'br' => $country(
        'Brazilië is het grootste land van Zuid-Amerika en staat bekend om zijn omvang, culturele rijkdom en enorme natuurlijke diversiteit.',
        'Brasília is de hoofdstad, terwijl São Paulo, Rio de Janeiro, Salvador en Belo Horizonte grote invloed uitoefenen.',
        'Inheemse wortels, Portugese kolonisatie en Afrikaanse invloeden vormen samen de basis van een levendige nationale cultuur.',
        'De economie steunt op landbouw, energie, mijnbouw, industrie, fintech en een grote binnenlandse markt.',
        'Brazilië is een federale republiek met een complexe maar robuuste democratische traditie.',
        "Het land omvat de Amazone, savannes, wetlands, kustregio's en grote stedelijke gebieden met uiteenlopende klimaten.",
        'Het Christusbeeld, de stranden van Rio, de Amazone en de Iguaçu-watervallen behoren tot de bekendste trekpleisters.',
        'De Braziliaanse keuken varieert sterk per regio, met onder meer feijoada, churrasco en gerechten met maniok en zeevruchten.',
        'Brazilië valt op door schaal, creativiteit en een energie die in heel het land voelbaar is.'
    ),
    'ca' => $country(
        'Canada is een uitgestrekt land in Noord-Amerika, bekend om natuur, meertaligheid en een hoge levenskwaliteit.',
        'Ottawa is de hoofdstad, terwijl Toronto, Montreal, Vancouver en Calgary grote economische en culturele centra zijn.',
        'De Canadese identiteit groeide uit inheemse tradities en Britse en Franse invloeden, aangevuld met migratie van over de hele wereld.',
        'De economie rust op grondstoffen, energie, technologie, financiële diensten, industrie en internationale handel.',
        'Canada is een parlementaire democratie en constitutionele monarchie met sterke federale instellingen.',
        'Het land telt bergen, bossen, meren, toendra en lange kustlijnen, met grote klimaatschommelingen per regio.',
        'Nationale parken, Niagara Falls, de Rocky Mountains en culturele steden trekken veel bezoekers.',
        'De keuken is divers en multicultureel, met regionale klassiekers als poutine, zeevruchten en lokale producten.',
        'Canada combineert enorme ruimte, stabiele instituties en een uitgesproken open samenleving.'
    ),
    'ch' => $country(
        'Zwitserland ligt in het hart van Europa en staat bekend om Alpenlandschappen, welvaart en bestuurlijke stabiliteit.',
        'Bern is de hoofdstad, terwijl Zürich, Genève, Basel en Lausanne internationaal een grote rol spelen.',
        'Het land groeide uit tot een meertalige confederatie met sterke tradities van neutraliteit, lokale autonomie en burgerparticipatie.',
        'De economie is sterk in financiën, farmacie, precisietechniek, innovatie en hoogwaardige diensten.',
        'Zwitserland is een federale republiek met directe democratische instrumenten en een consensusgerichte politiek.',
        'De Alpen, meren en hooggelegen dalen bepalen het landschap, met koude winters en milde tot frisse zomers afhankelijk van de regio.',
        'Skigebieden, bergtreinen, meren en historische steden maken het land zeer geliefd bij reizigers.',
        'De Zwitserse keuken is bekend om kaasgerechten, chocolade, vleeswaren en regionale bergspecialiteiten.',
        'Zwitserland verenigt natuurlijke schoonheid met precisie, orde en internationale uitstraling.'
    ),
    'ci' => $country(
        'Ivoorkust is een belangrijk land in West-Afrika, bekend om zijn culturele diversiteit, cacao en economische dynamiek.',
        'Yamoussoukro is de politieke hoofdstad, terwijl Abidjan het economische en stedelijke hart van het land vormt.',
        'Talloze etnische groepen, koloniale geschiedenis en sterke muzikale en artistieke tradities geven het land een levendig cultureel profiel.',
        'De economie draait vooral op cacao, landbouw, havenactiviteiten, handel en groeiende industriële sectoren.',
        'Ivoorkust is een republiek die blijft werken aan politieke stabiliteit en institutionele versterking.',
        'Het land kent kustgebieden, bossen en savannes, met een overwegend tropisch klimaat.',
        'Markten, muziek, kustplaatsen en culturele festivals laten bezoekers de energie van het land ervaren.',
        'De keuken gebruikt veel rijst, cassave, vis, kip en lokale sauzen, met attiéké als bekend gerecht.',
        'Ivoorkust combineert economisch gewicht met een sterke en veelzijdige culturele identiteit.'
    ),
    'cl' => $country(
        'Chili is een langgerekt land langs de westkust van Zuid-Amerika, bekend om geografische extremen en politieke veerkracht.',
        'Santiago is de hoofdstad, met Valparaíso, Concepción en Antofagasta als andere belangrijke steden.',
        'De Chileense cultuur verbindt inheemse wortels, koloniale geschiedenis en een moderne stedelijke identiteit.',
        'De economie steunt op koper, landbouw, visserij, wijn, diensten en groeiende innovatie.',
        'Chili is een presidentiële republiek met stevige instituties en levendig publiek debat.',
        'Van de Atacamawoestijn tot Patagonië en de Andes kent het land grote verschillen in landschap en klimaat.',
        'Toeristen komen voor de woestijn, bergen, nationale parken, kuststeden en wijngebieden.',
        'De keuken draait om zeevruchten, gegrild vlees, maïs, empanadas en sterke regionale tradities.',
        'Chili biedt een uitzonderlijke combinatie van natuur, stedelijke cultuur en geopolitieke ligging.'
    ),
    'cm' => $country(
        "Kameroen wordt vaak 'Afrika in het klein' genoemd vanwege zijn grote landschappelijke en culturele verscheidenheid.",
        'Yaoundé is de hoofdstad, terwijl Douala het grootste economische centrum is.',
        'Het land is gevormd door vele volkeren en talen, plus Duitse, Franse en Britse koloniale invloeden.',
        'De economie rust op landbouw, olie, hout, handel en een brede informele sector.',
        'Kameroen is een republiek die tegelijk met bestuurlijke uitdagingen en groeipotentieel te maken heeft.',
        'Kust, regenwoud, bergen en savanne liggen dicht bij elkaar, met een overwegend tropisch klimaat.',
        'Natuurgebieden, vulkanische landschappen en een levendige muziek- en feestcultuur trekken bezoekers aan.',
        'De keuken is gevarieerd, met gegrild vlees, vis, stoofpotten en gerechten op basis van cassave, maïs en bakbananen.',
        'Kameroen valt op door zijn diversiteit en de brede afspiegeling van West- en Centraal-Afrika.'
    ),
    'cn' => $country(
        'China is een van de oudste beschavingen ter wereld en speelt vandaag een centrale rol in economie, technologie en geopolitiek.',
        'Beijing is de hoofdstad, terwijl Shanghai, Shenzhen, Guangzhou en Chongqing enorme stedelijke invloed hebben.',
        'Een lange dynastieke geschiedenis, filosofische tradities en grote culturele continuïteit vormen nog altijd de basis van het land.',
        'De economie is een van de grootste ter wereld en steunt op industrie, export, infrastructuur, technologie en binnenlandse consumptie.',
        'China is een eenpartijstaat met sterk gecentraliseerd bestuur en langetermijnplanning.',
        'Het land omvat bergen, rivierdalen, woestijnen, landbouwgebieden en subtropische zones met sterk uiteenlopende klimaten.',
        'Van de Chinese Muur en oude hoofdsteden tot moderne megasteden en natuurparken is het toeristisch aanbod zeer breed.',
        'De Chinese keuken is regionaal sterk verschillend, met grote aandacht voor balans, textuur en lokale ingrediënten.',
        'China combineert historische diepte met een indrukwekkende moderne schaal.'
    ),
    'co' => $country(
        'Colombia ligt in het noordwesten van Zuid-Amerika en staat bekend om bergen, regenwoud, Caribische kust en culturele veerkracht.',
        'Bogotá is de hoofdstad, met Medellín, Cali, Barranquilla en Cartagena als andere belangrijke steden.',
        'De Colombiaanse identiteit is gevormd door inheemse, Spaanse en Afro-Colombiaanse invloeden en een sterke muzikale traditie.',
        'De economie steunt op diensten, industrie, landbouw, olie, mijnbouw en koffie-export.',
        'Colombia is een presidentiële republiek die de afgelopen decennia sterk heeft ingezet op hervorming en veiligheid.',
        'Het land omvat Andesgebergte, Amazonegebied, llanos en twee kustzones, met grote klimaatsverschillen per hoogte.',
        "Koloniale steden, koffieregio's, natuurparken en Caribische stranden maken Colombia toeristisch steeds aantrekkelijker.",
        'De keuken varieert per regio en omvat arepas, soepen, rijstgerechten, zeevruchten en tropisch fruit.',
        'Colombia biedt een krachtige mix van biodiversiteit, stedelijke vernieuwing en rijke cultuur.'
    ),
    'cz' => $country(
        'Tsjechië ligt in Centraal-Europa en staat bekend om zijn historische steden, industriële traditie en levendige cultuur.',
        'Praag is de hoofdstad, terwijl Brno, Ostrava en Plzeň eveneens belangrijke steden zijn.',
        'Boheemse en Moravische tradities, Habsburgse geschiedenis en moderne cultuur geven het land een duidelijk eigen profiel.',
        'De economie steunt op industrie, techniek, autoassemblage, technologie en diensten binnen de Europese markt.',
        'Tsjechië is een parlementaire republiek met stabiele instellingen.',
        'Het land bestaat uit heuvelgebieden, bossen en rivierdalen, met een gematigd continentaal klimaat.',
        'Praag, kastelen, kuuroorden en historische binnensteden trekken het hele jaar bezoekers.',
        'De keuken is stevig en traditioneel, met dumplings, vleesgerechten, soepen en een sterke biercultuur.',
        'Tsjechië verbindt historisch erfgoed met een praktische, moderne Midden-Europese economie.'
    ),
    'de' => $country(
        'Duitsland is een centrale macht in Europa, bekend om industrie, wetenschap, regionale diversiteit en sterke instituties.',
        'Berlijn is de hoofdstad; Hamburg, München, Frankfurt en Keulen behoren tot de belangrijkste steden.',
        'De geschiedenis van Duitsland is bepalend geweest voor Europa en heeft geleid tot een sterke nadruk op democratie, herinneringscultuur en cultuurbeleid.',
        'De economie is een van de grootste ter wereld en steunt op industrie, export, techniek, chemie en hoogwaardige dienstverlening.',
        'Duitsland is een federale parlementaire republiek met invloedrijke deelstaten.',
        'Het land kent kustgebieden, rivierdalen, heuvels en Alpenranden, met een gematigd klimaat.',
        'Bezoekers komen voor Berlijn, kastelen, kerstmarkten, musea, Rijnlandschappen en Beierse tradities.',
        'De Duitse keuken varieert sterk per regio en omvat brood, worsten, stoofgerechten, gebak en biercultuur.',
        'Duitsland combineert economische kracht met culturele diepte en regionale verscheidenheid.'
    ),
    'dk' => $country(
        'Denemarken is een Noord-Europees land dat bekendstaat om welzijn, design, zeevaart en een hoge levenskwaliteit.',
        'Kopenhagen is de hoofdstad, met Aarhus, Odense en Aalborg als belangrijke aanvullende steden.',
        'De Deense cultuur bouwt voort op Vikinggeschiedenis, handelsnetwerken en een moderne, egalitaire samenleving.',
        'De economie steunt op logistiek, farma, groene technologie, landbouw en maritieme diensten.',
        'Denemarken is een constitutionele monarchie met een sterk parlementair systeem.',
        'Het land bestaat uit eilanden en een schiereiland, met vlak landschap, lange kusten en een gematigd zeeklimaat.',
        'Kopenhagen, kastelen, kustgebieden en fietsvriendelijke steden maken Denemarken aantrekkelijk voor bezoekers.',
        'De keuken legt de nadruk op vis, brood, zuivel, seizoensproducten en moderne Scandinavische verfijning.',
        'Denemarken koppelt sober design en sociale stabiliteit aan een open, maritieme traditie.'
    ),
    'dz' => $country(
        'Algerije is het grootste land van Afrika en staat bekend om zijn Sahara, mediterrane kust en diepe historische lagen.',
        'Algiers is de hoofdstad, terwijl Oran, Constantine en Annaba belangrijke stedelijke centra zijn.',
        'Berberse, Arabische, Ottomaanse en Franse invloeden hebben de cultuur van het land sterk gevormd.',
        'De economie draait vooral op olie en gas, aangevuld met landbouw, bouw en diensten.',
        'Algerije is een republiek met een sterk centraal bestuur en een belangrijke rol voor de staat in economie en politiek.',
        'Het noorden kent kust en Atlasgebergte, terwijl het grootste deel van het land uit Sahara bestaat; het klimaat varieert van mediterraan tot woestijnachtig.',
        'Romeinse ruïnes, woestijnroutes en kuststeden maken Algerije interessant voor reizigers met historische of natuurlijke interesse.',
        'De keuken bevat couscous, stoofgerechten, brood, lamsvlees en uitgesproken Noord-Afrikaanse kruiding.',
        'Algerije verenigt enorme ruimte, rijke geschiedenis en een duidelijke regionale eigenheid.'
    ),
    'ec' => $country(
        'Ecuador ligt op de evenaar in het noordwesten van Zuid-Amerika en valt op door zijn kleine schaal met grote diversiteit.',
        'Quito is de hoofdstad, terwijl Guayaquil en Cuenca eveneens belangrijke steden zijn.',
        'Inheemse wortels, Spaanse koloniale geschiedenis en Andes- en kustculturen lopen in het land door elkaar.',
        'De economie steunt op olie, landbouw, visserij, toerisme en een groeiende dienstensector.',
        'Ecuador is een presidentiële republiek met een actieve publieke rol van de staat.',
        'De Andes, Amazone, kustgebieden en de Galápagoseilanden zorgen voor zeer uiteenlopende natuur en klimaatzones.',
        'Quito, Cuenca, vulkanen en vooral de Galápagoseilanden trekken bezoekers van over de hele wereld.',
        'De keuken varieert sterk per regio, met maïs, aardappel, zeevruchten, soepen en tropisch fruit.',
        'Ecuador biedt op compacte schaal een opvallend brede combinatie van cultuur en natuur.'
    ),
    'eg' => $country(
        'Egypte verbindt Noord-Afrika en het Midden-Oosten en is wereldwijd bekend om zijn faraonische verleden en de Nijl.',
        'Caïro is de hoofdstad; Alexandrië, Gizeh en Luxor spelen eveneens een grote rol.',
        'De geschiedenis van Egypte strekt zich uit van de oudheid tot islamitische en moderne periodes en blijft cultureel zeer zichtbaar.',
        'De economie steunt op diensten, landbouw, industrie, toerisme, gas en de strategische rol van het Suezkanaal.',
        'Egypte is een republiek met een sterk centraal bestuur en grote regionale invloed.',
        'Het land wordt gedomineerd door de Nijlvallei en uitgestrekte woestijnen, met een warm en droog klimaat.',
        'Piramides, tempels, de Nijl, musea en badplaatsen aan de Rode Zee trekken veel bezoekers.',
        'De Egyptische keuken gebruikt veel peulvruchten, brood, rijst, gegrild vlees en aromatische kruiden.',
        'Egypte combineert iconische oudheid met een blijvende strategische en culturele betekenis.'
    ),
    'es' => $country(
        'Spanje ligt op het Iberisch Schiereiland en is bekend om zijn regionale diversiteit, kunst, voetbal en mediterrane levensstijl.',
        'Madrid is de hoofdstad, terwijl Barcelona, Valencia, Sevilla en Bilbao andere grote referentiepunten zijn.',
        'Het land kent Romeinse, islamitische en christelijke lagen, plus sterke regionale identiteiten in taal en cultuur.',
        'De economie steunt op diensten, toerisme, industrie, landbouw, logistiek en hernieuwbare energie.',
        "Spanje is een parlementaire monarchie met autonome regio's die veel bevoegdheden hebben.",
        'Het landschap loopt van mediterrane kusten en hoogvlaktes tot bergen en Atlantische groene zones, met gevarieerde klimaten.',
        'Steden, stranden, pelgrimsroutes, musea en historische monumenten maken Spanje een van de populairste bestemmingen van Europa.',
        'De keuken is regionaal zeer rijk, met tapas, paella, ham, visgerechten en sterke wijntradities.',
        'Spanje koppelt geschiedenis, creativiteit en levensritme aan grote regionale veelzijdigheid.'
    ),
    'fr' => $country(
        'Frankrijk is een toonaangevend Europees land met grote invloed op cultuur, politiek, gastronomie en taal.',
        'Parijs is de hoofdstad, met Marseille, Lyon, Toulouse en Lille als andere belangrijke steden.',
        'Van monarchie en revolutie tot republiek heeft Frankrijk een centrale rol gespeeld in de vorming van modern Europa.',
        'De economie rust op industrie, luxe, landbouw, toerisme, energie en diensten.',
        'Frankrijk is een semipresidentiële republiek met sterke nationale instellingen.',
        'Het land omvat kusten, rivierdalen, Alpen, landbouwgebieden en mediterrane zones, met uiteenlopende klimaten.',
        "Parijs, wijnregio's, Alpen, kastelen en de Côte d'Azur trekken bezoekers uit de hele wereld.",
        'De Franse keuken staat bekend om techniek, regionale tradities, kaas, brood, wijn en verfijnde patisserie.',
        'Frankrijk combineert staatsmacht, cultureel prestige en grote landschappelijke diversiteit.'
    ),
    'en' => $country(
        'Engeland vormt het grootste deel van het Verenigd Koninkrijk en is bekend om zijn historische instellingen, steden en voetbaltraditie.',
        'Londen is de hoofdstad, met Manchester, Birmingham, Liverpool en Bristol als andere grote stedelijke centra.',
        'De geschiedenis omvat koninklijke tradities, industriële revolutie, literatuur en een grote mondiale invloed.',
        'De economie steunt op financiën, creatieve sectoren, technologie, onderwijs en dienstverlening.',
        'Engeland maakt deel uit van een constitutionele monarchie en een parlementair systeem binnen het Verenigd Koninkrijk.',
        'Van zuidelijke heuvels en oostelijke vlaktes tot noordelijke industriesteden kent het land een gematigd zeeklimaat.',
        'Londen, universiteitssteden, kustplaatsen, kastelen en voetbalcultuur trekken veel bezoekers.',
        'De keuken omvat klassieke pubgerechten, hartige taarten, roasts en een sterke thee- en bakkerscultuur.',
        'Engeland combineert historische continuïteit met een invloedrijke moderne stedelijke cultuur.'
    ),
    'sc' => $country(
        'Schotland ligt in het noorden van Groot-Brittannië en staat bekend om ruige landschappen, kastelen en een sterke nationale identiteit.',
        'Edinburgh is de hoofdstad, terwijl Glasgow, Aberdeen en Dundee andere belangrijke steden zijn.',
        'Gaelische, Keltische en Britse invloeden lopen door elkaar in geschiedenis, muziek, taal en traditie.',
        'De economie omvat energie, whisky, financiële diensten, onderwijs, toerisme en technologie.',
        'Schotland heeft een eigen parlement binnen het Verenigd Koninkrijk en een duidelijke bestuurlijke autonomie.',
        'Hooglanden, eilanden, meren en kustgebieden bepalen het landschap, met koel en wisselvallig weer.',
        'Edinburgh, de Highlands, Loch Ness, festivals en whiskyroutes zijn belangrijke trekpleisters.',
        'De keuken omvat zalm, wild, havergerechten, stevige stoofschotels en natuurlijk whisky als cultureel icoon.',
        'Schotland valt op door natuur, historie en een sterke culturele eigenheid.'
    ),
    'gh' => $country(
        'Ghana is een invloedrijk West-Afrikaans land dat bekendstaat om politieke stabiliteit, goud, cacao en een rijke cultuur.',
        'Accra is de hoofdstad, met Kumasi, Tamale en Takoradi als andere belangrijke stedelijke centra.',
        'Koninkrijken als de Ashanti, koloniale geschiedenis en een levendige muziek- en textielcultuur vormen het culturele landschap.',
        'De economie steunt op goud, cacao, olie, handel en een groeiende dienstensector.',
        'Ghana is een republiek met een relatief stabiel meerpartijenstelsel.',
        'Het land kent kustgebieden, boszones en savannes, met een tropisch klimaat en seizoensregens.',
        'Kustforten, nationale parken, markten en festivals bieden bezoekers een breed cultureel en historisch aanbod.',
        'De keuken draait om gerechten met yam, cassave, rijst, vis, pepers en rijke stoofschotels.',
        'Ghana combineert politieke stabiliteit met cultureel gewicht en economische ambitie.'
    ),
    'gr' => $country(
        'Griekenland ligt in Zuidoost-Europa en staat wereldwijd bekend als bakermat van klassieke beschaving, filosofie en democratie.',
        'Athene is de hoofdstad; Thessaloniki, Patras en Heraklion zijn eveneens belangrijke steden.',
        'De klassieke oudheid, Byzantijnse tradities en mediterrane continuïteit zijn nog steeds sterk aanwezig in taal en cultuur.',
        'De economie steunt op toerisme, scheepvaart, landbouw, diensten en kleine industrie.',
        'Griekenland is een parlementaire republiek en lid van de Europese Unie en de eurozone.',
        "Bergen, eilanden en kustlijnen domineren het landschap, met hete zomers en milde winters in veel regio's.",
        'Oude tempels, eilanden, kustdorpen en mediterrane steden maken Griekenland tot een topbestemming.',
        'De keuken is beroemd om olijfolie, groenten, vis, gegrild vlees, kaas en mezedes.',
        'Griekenland verbindt een monumentale geschiedenis met een sterk dagelijks mediterrane cultuur.'
    ),
    'hr' => $country(
        'Kroatië ligt aan de Adriatische Zee en staat bekend om zijn kust, historische steden en overgang tussen Midden- en Zuidoost-Europa.',
        'Zagreb is de hoofdstad, met Split, Rijeka, Dubrovnik en Osijek als andere belangrijke steden.',
        'Romeinse, Venetiaanse, Habsburgse en Slavische invloeden hebben een gelaagde cultuur voortgebracht.',
        'De economie steunt op toerisme, scheepvaart, industrie, landbouw en diensten.',
        'Kroatië is een parlementaire republiek en lid van de Europese Unie.',
        'Het land combineert Adriatische eilanden en kustbergen met binnenlandse vlaktes en een gemengd klimaat.',
        'Dubrovnik, nationale parken, eilandkusten en oude havensteden maken Kroatië zeer populair bij reizigers.',
        'De keuken verschilt per regio en combineert mediterrane visgerechten met Midden-Europese en Balkaninvloeden.',
        'Kroatië koppelt compacte schaal aan grote landschappelijke en culturele afwisseling.'
    ),
    'il' => $country(
        'Israël ligt aan de oostelijke Middellandse Zee en speelt een grote rol in religie, innovatie en regionale politiek.',
        "Jeruzalem is de regeringsstad, terwijl Tel Aviv, Haifa en Be'er Sheva belangrijke stedelijke centra zijn.",
        "Joodse geschiedenis, religieuze betekenis en migratie uit vele regio's hebben een bijzonder diverse samenleving gevormd.",
        'De economie is sterk in technologie, defensie, landbouw, gezondheidszorg en hoogwaardige diensten.',
        'Israël is een parlementaire democratie met een zeer levendig, vaak gepolariseerd politiek debat.',
        'Het land omvat kustvlaktes, heuvels, woestijn en de Jordaanvallei, met vooral warme en droge omstandigheden.',
        'Heilige plaatsen, musea, stranden, de Dode Zee en moderne stadswijken trekken bezoekers uit de hele wereld.',
        'De keuken mengt Midden-Oosterse tradities met invloeden uit Europa, Noord-Afrika en Azië.',
        'Israël valt op door zijn combinatie van religieuze betekenis, technologische dynamiek en maatschappelijke diversiteit.'
    ),
    'in' => $country(
        'India is een van de grootste en meest diverse landen ter wereld, met enorme culturele, taalkundige en religieuze verscheidenheid.',
        'New Delhi is de hoofdstad, terwijl Mumbai, Bengaluru, Kolkata, Chennai en Hyderabad grote invloed hebben.',
        'Eeuwenoude beschavingen, spirituele tradities, rijken en koloniale geschiedenis hebben India diep gevormd.',
        'De economie steunt op technologie, industrie, landbouw, farmacie, diensten en een grote binnenlandse markt.',
        'India is een federale parlementaire republiek met een van de grootste democratische systemen ter wereld.',
        "Van Himalaya en woestijn tot tropische kusten en rivierdelta's kent India vrijwel alle grote klimaatzones.",
        'Monumenten, tempels, natuur, festivals en megasteden maken India intens en veelzijdig voor bezoekers.',
        'De keuken verschilt sterk per regio en is beroemd om specerijen, vegetarische tradities, rijst, brood en streetfood.',
        'India combineert schaal, historische diepte en een ongekende culturele rijkdom.'
    ),
    'ie' => $country(
        'Ierland is een eilandland in het noordwesten van Europa, bekend om groene landschappen, literatuur en een open economie.',
        'Dublin is de hoofdstad, met Cork, Galway, Limerick en Waterford als andere belangrijke steden.',
        'Gaelische tradities, koloniale geschiedenis en emigratie hebben een sterke en herkenbare identiteit gevormd.',
        'De economie steunt op technologie, farmacie, financiële diensten, landbouw en internationale investeringen.',
        'Ierland is een parlementaire republiek met stabiele democratische instellingen.',
        'Kusten, heuvels, graslanden en een vochtig zeeklimaat bepalen het landschap.',
        'Kliffen, landelijke routes, muziekcultuur en historische steden maken Ierland populair bij reizigers.',
        'De keuken omvat brood, stoofpotten, zuivel, zeevruchten en moderne interpretaties van streekproducten.',
        'Ierland koppelt gastvrijheid en cultuur aan een moderne, internationale economie.'
    ),
    'it' => $country(
        'Italië ligt in Zuid-Europa en is wereldwijd bekend om kunst, geschiedenis, mode, industrie en gastronomie.',
        'Rome is de hoofdstad, terwijl Milaan, Napels, Turijn, Florence en Bologna eveneens grote culturele en economische betekenis hebben.',
        'Van het Romeinse Rijk tot de renaissance heeft Italië een uitzonderlijk historisch en artistiek erfgoed opgebouwd.',
        'De economie steunt op industrie, design, toerisme, landbouw, mode, voeding en gespecialiseerde maakbedrijven.',
        'Italië is een parlementaire republiek met sterke regionale verschillen en een levendig politiek landschap.',
        'Het land omvat Alpen, heuvels, vulkanen, lange kusten en eilanden, met klimaatverschillen tussen noord en zuid.',
        "Historische steden, musea, kustregio's, meren en religieuze sites maken Italië tot een wereldbestemming.",
        'De Italiaanse keuken is beroemd om pasta, pizza, olijfolie, kazen, regionale sauzen en een diepe eetcultuur.',
        'Italië verenigt erfgoed, stijl en dagelijks leven op een manier die wereldwijd invloedrijk blijft.'
    ),
    'jm' => $country(
        'Jamaica is een Caribisch eiland dat bekendstaat om muziek, sprintcultuur, stranden en een sterke nationale uitstraling.',
        'Kingston is de hoofdstad, met Montego Bay en Spanish Town als andere bekende stedelijke centra.',
        'Afrikaanse wortels, Britse koloniale geschiedenis en de wereldwijde invloed van reggae geven Jamaica een krachtige culturele stem.',
        'De economie steunt op toerisme, landbouw, bauxiet, logistiek en creatieve sectoren.',
        'Jamaica is een parlementaire democratie en constitutionele monarchie binnen het Gemenebest.',
        'Het eiland kent bergen, regenwouden en kustgebieden, met een warm tropisch klimaat.',
        'Bezoekers komen voor stranden, bergen, muziek, festivals en de relaxte eilandcultuur.',
        'De keuken gebruikt veel kruiden en pit, met jerk-gerechten, vis, bonen, rijst en tropische vruchten.',
        'Jamaica valt op door zijn culturele invloed die veel groter is dan zijn geografische schaal.'
    ),
    'jp' => $country(
        'Japan is een eilandnatie in Oost-Azië die bekendstaat om technologische verfijning, traditie en stedelijke efficiëntie.',
        'Tokio is de hoofdstad, terwijl Osaka, Yokohama, Nagoya, Kyoto en Fukuoka eveneens grote rol spelen.',
        'Keizerlijke geschiedenis, samoeraitradities, boeddhisme, shinto en modernisering hebben Japan diep gevormd.',
        'De economie is sterk in industrie, robotica, auto’s, elektronica, design en geavanceerde diensten.',
        'Japan is een constitutionele monarchie met een parlementair systeem.',
        'Het land bestaat uit eilanden met bergen, bossen, kustlijnen en seizoenen die sterk de leefcultuur beïnvloeden.',
        'Tempels, steden, natuur, spoorwegen, gastronomie en popcultuur maken Japan zeer aantrekkelijk voor bezoekers.',
        'De keuken is beroemd om rijst, vis, noedels, seizoensproducten en aandacht voor precisie en presentatie.',
        'Japan combineert traditie en innovatie met een opvallend gevoel voor detail.'
    ),
    'kr' => $country(
        'Zuid-Korea is een dynamische staat in Oost-Azië, bekend om technologie, populaire cultuur en snelle modernisering.',
        'Seoul is de hoofdstad, met Busan, Incheon, Daegu en Daejeon als andere grote steden.',
        'Confuciaanse tradities, deling van het Koreaanse schiereiland en een indrukwekkende naoorlogse ontwikkeling hebben het land gevormd.',
        "De economie rust op technologie, scheepsbouw, auto's, elektronica, entertainment en export.",
        'Zuid-Korea is een presidentiële democratie met sterke instituties en een actieve burgermaatschappij.',
        'Het land kent bergen, rivierdalen en kustlijnen, met vier uitgesproken seizoenen.',
        'Paleizen, moderne steden, kustgebieden en de wereldwijde aantrekkingskracht van K-cultuur trekken veel bezoekers.',
        'De keuken staat bekend om fermentatie, rijstgerechten, barbecue, soepen en pittige bijgerechten.',
        'Zuid-Korea koppelt snelheid en innovatie aan een sterke culturele continuïteit.'
    ),
    'lv' => $country(
        'Letland ligt aan de Baltische Zee en staat bekend om bossen, koorzang en een compacte maar uitgesproken identiteit.',
        'Riga is de hoofdstad, terwijl Daugavpils, Liepāja en Jelgava andere belangrijke steden zijn.',
        'Het land werd gevormd door Baltische wortels, Hanzehandel, buitenlandse overheersing en uiteindelijk herwonnen onafhankelijkheid.',
        'De economie steunt op logistiek, hout, diensten, IT en regionale handel.',
        'Letland is een parlementaire republiek en lid van de Europese Unie en de eurozone.',
        'Bossen, meren, rivieren en een vlak kustlandschap bepalen de geografie, met koude winters en milde zomers.',
        'Riga, art nouveau-architectuur, natuur en kustplaatsen zijn belangrijke trekpleisters.',
        'De keuken is eenvoudig en stevig, met brood, aardappelen, vis, zuivel en bosproducten.',
        'Letland combineert Baltische nuchterheid met sterke cultuur en natuurlijke rust.'
    ),
    'ma' => $country(
        "Marokko ligt in Noordwest-Afrika en staat bekend om medina's, berglandschappen, woestijnroutes en een sterke ambachtstraditie.",
        'Rabat is de hoofdstad, terwijl Casablanca, Marrakesh, Fès en Tanger andere centrale steden zijn.',
        'Arabische, Berberse, islamitische en Andalusische invloeden geven het land een uitgesproken cultuur.',
        'De economie steunt op landbouw, fosfaten, industrie, toerisme, logistiek en hernieuwbare energie.',
        'Marokko is een constitutionele monarchie met een sterke rol voor de koning.',
        'Het land omvat Atlantische en mediterrane kusten, Atlasgebergte en Sahara-overgangen, met grote klimaatverschillen.',
        'Historische steden, markten, bergen en woestijnexcursies maken Marokko tot een geliefde bestemming.',
        'De keuken is rijk aan geurige kruiden, tajines, couscous, gegrild vlees en zoete-muntsmaken.',
        'Marokko verbindt Noord-Afrikaanse diepte met een open blik naar Europa en de Atlantische wereld.'
    ),
    'mx' => $country(
        'Mexico ligt tussen Noord- en Midden-Amerika en staat bekend om beschavingen uit de oudheid, levendige steden en gevarieerde natuur.',
        'Mexico-Stad is de hoofdstad, met Guadalajara, Monterrey, Puebla en Tijuana als andere grote stedelijke centra.',
        'Maya- en Azteekse erfenissen, Spaanse koloniale geschiedenis en moderne volkscultuur vormen samen een krachtige identiteit.',
        'De economie steunt op industrie, autoassemblage, olie, landbouw, diensten, handel en toerisme.',
        'Mexico is een federale republiek met een presidentieel systeem.',
        'Het land kent woestijnen, gebergten, tropische kusten, hoogvlaktes en vulkanen, met zeer uiteenlopende klimaatzones.',
        'Archeologische sites, stranden, koloniale steden en regionale festivals trekken bezoekers uit de hele wereld.',
        'De Mexicaanse keuken is beroemd om maïs, pepers, bonen, sauzen en sterke regionale tradities.',
        'Mexico combineert historische diepte, culturele energie en geografische veelzijdigheid.'
    ),
    'ng' => $country(
        'Nigeria is het bevolkingsrijkste land van Afrika en een cultureel en economisch zwaartepunt in West-Afrika.',
        'Abuja is de hoofdstad, terwijl Lagos, Kano, Ibadan en Port Harcourt grote economische en culturele invloed hebben.',
        'De nationale cultuur wordt gevormd door honderden talen en volkeren, met een krachtige muziek-, film- en ondernemerscultuur.',
        'De economie steunt op olie en gas, handel, landbouw, fintech, entertainment en een grote binnenlandse markt.',
        'Nigeria is een federale republiek met een complex maar zeer invloedrijk politiek systeem.',
        "Het land omvat kustgebieden, mangroven, regenwoud, savanne en rivierdelta's, met overwegend tropisch klimaat.",
        'Stedelijke energie, festivals, markten en natuurgebieden trekken bezoekers die het ritme van het land willen ervaren.',
        'De keuken is krachtig en kruidig, met rijstgerechten, soepen, yam, bonen en gegrild vlees of vis.',
        'Nigeria valt op door schaal, creativiteit en een grote regionale uitstraling.'
    ),
    'nl' => $country(
        'Nederland ligt aan de Noordzee en staat bekend om handel, waterbeheer, steden, design en een open maatschappelijke cultuur.',
        'Amsterdam is de hoofdstad, terwijl Rotterdam, Den Haag, Utrecht en Eindhoven eveneens belangrijke centra zijn.',
        'De geschiedenis is sterk verbonden met koopvaardij, stedelijke autonomie, kunst en internationale uitwisseling.',
        'De economie steunt op handel, logistiek, landbouw, technologie, chemie en zakelijke dienstverlening.',
        'Nederland is een constitutionele monarchie met een parlementair systeem en sterke decentrale bestuurslagen.',
        "Het landschap bestaat uit polders, rivieren, kustgebieden en verstedelijkte delta's, met een gematigd zeeklimaat.",
        "Musea, historische binnensteden, tulpenregio's, fietsen en waterwerken trekken veel bezoekers.",
        'De keuken is nuchter maar gevarieerd, met brood, kaas, vis, stamppot en zoete baktradities.',
        'Nederland combineert praktische innovatie met een lange internationale handels- en cultuurtraditie.'
    ),
    'no' => $country(
        'Noorwegen is een Scandinavisch land dat bekendstaat om fjorden, energie, zeevaart en een hoge levensstandaard.',
        'Oslo is de hoofdstad, met Bergen, Trondheim, Stavanger en Tromsø als andere belangrijke steden.',
        'De cultuur van Noorwegen verbindt Vikingerfgoed, kusttradities en een moderne nadruk op gelijkheid en natuur.',
        'De economie rust op olie en gas, visserij, scheepvaart, waterkracht, technologie en staatsinvesteringen.',
        'Noorwegen is een constitutionele monarchie met een stabiel parlementair systeem.',
        'Fjorden, bergen, eilanden en noordelijke gebieden bepalen het landschap, met koude winters en koele zomers.',
        'Natuurtoerisme, noorderlicht, wandelroutes en kuststeden maken Noorwegen zeer geliefd.',
        'De keuken legt de nadruk op vis, zuivel, wild, bessen en eenvoudige Noordse producten.',
        'Noorwegen koppelt natuurlijke grootsheid aan bestuurlijke rust en economische slagkracht.'
    ),
    'pe' => $country(
        'Peru ligt aan de westkust van Zuid-Amerika en valt op door Andesbeschavingen, Amazonegebieden en een sterke culinaire reputatie.',
        'Lima is de hoofdstad, terwijl Arequipa, Cusco, Trujillo en Chiclayo eveneens belangrijke steden zijn.',
        'De Inca-erfenis, koloniale geschiedenis en grote inheemse diversiteit vormen de kern van de Peruaanse identiteit.',
        'De economie steunt op mijnbouw, landbouw, visserij, toerisme en diensten.',
        'Peru is een republiek met een politiek landschap dat geregeld in beweging is.',
        'Het land omvat kustwoestijn, hooggebergte en Amazonewoud, met grote hoogte- en klimaatsverschillen.',
        'Machu Picchu, Cusco, de Heilige Vallei en culinaire steden trekken bezoekers van overal.',
        'De Peruaanse keuken staat hoog aangeschreven en combineert inheemse, Spaanse, Afrikaanse en Aziatische invloeden.',
        'Peru verbindt beschavingsgeschiedenis, biodiversiteit en gastronomische creativiteit.'
    ),
    'pl' => $country(
        'Polen ligt in Centraal-Europa en is bekend om zijn veerkrachtige geschiedenis, steden en sterke nationale identiteit.',
        'Warschau is de hoofdstad, met Krakau, Wrocław, Gdańsk en Poznań als andere belangrijke steden.',
        'Het land kent perioden van grootmacht, opdeling, oorlog en wederopbouw, wat nog altijd zichtbaar is in cultuur en herinnering.',
        'De economie steunt op industrie, logistiek, technologie, diensten en productie binnen de Europese markt.',
        'Polen is een parlementaire republiek met een levendige en soms scherpe politieke arena.',
        'Vlaktes, bossen, rivieren en een Baltische kust bepalen het landschap, met koude winters en warme zomers.',
        "Historische steden, kastelen, herdenkingsplaatsen en natuurregio's trekken uiteenlopende bezoekers.",
        'De keuken is stevig, met soepen, kool, aardappelen, dumplings en rijke huiselijke gerechten.',
        'Polen combineert historische diepgang met economische groei en uitgesproken cultureel zelfbewustzijn.'
    ),
    'pt' => $country(
        'Portugal ligt aan de Atlantische rand van Europa en staat bekend om zeevaart, steden, wijn en een mild klimaat.',
        'Lissabon is de hoofdstad, terwijl Porto, Braga, Coimbra en Faro andere belangrijke steden zijn.',
        'De Portugese geschiedenis is sterk verbonden met maritieme expansie, katholieke tradities en een eigen taalwereld.',
        'De economie steunt op diensten, toerisme, industrie, wijn, landbouw en technologie.',
        'Portugal is een parlementaire republiek en lid van de Europese Unie en de eurozone.',
        "Het land heeft Atlantische kusten, rivierlandschappen en warmere zuidelijke regio's, met overwegend zachte winters.",
        'Historische steden, kustplaatsen, surfstranden en wijnstreken maken Portugal bijzonder populair.',
        'De keuken staat bekend om vis, zeevruchten, gegrilde gerechten, olijfolie en pasteltradities.',
        'Portugal koppelt maritieme geschiedenis aan een ontspannen maar internationaal gerichte cultuur.'
    ),
    'py' => $country(
        'Paraguay ligt in het hart van Zuid-Amerika en wordt gekenmerkt door tweetaligheid, rivierlandschappen en een rustige regionale positie.',
        'Asunción is de hoofdstad, met Ciudad del Este en Encarnación als andere belangrijke stedelijke centra.',
        'Guaraní-erfgoed en Spaanse invloeden leven naast elkaar voort in taal, muziek en dagelijks leven.',
        'De economie draait op landbouw, veeteelt, hydro-elektrische energie, handel en lichte industrie.',
        'Paraguay is een presidentiële republiek met een sterke nationale nadruk op soevereiniteit en stabiliteit.',
        'Het land kent riviergebieden, vlaktes en subtropische zones, met warme zomers en milde winters.',
        'Natuurgebieden, grenssteden, religieuze sites en de cultuur van de rivieren trekken bezoekers aan.',
        'De keuken omvat maïs- en cassavegerechten, gegrild vlees, soepen en eenvoudige streekklassiekers.',
        'Paraguay biedt een discrete maar sterke combinatie van traditie, taal en landgebonden economie.'
    ),
    'qa' => $country(
        'Qatar is een klein maar invloedrijk Golfstaatje dat bekendstaat om gasrijkdom, moderne infrastructuur en internationale profilering.',
        'Doha is de hoofdstad en verreweg het grootste stedelijke centrum van het land.',
        'Het land groeide vanuit bedoeïenen- en parelvisserstradities uit tot een moderne staat met sterke internationale zichtbaarheid.',
        'De economie steunt vooral op aardgas en energie, naast luchtvaart, logistiek, financiën en grote investeringen.',
        'Qatar is een erfelijke monarchie met sterk gecentraliseerd bestuur.',
        'Het schiereiland bestaat grotendeels uit woestijn en kustzones, met een heet en droog klimaat.',
        'Musea, skyline, sportevenementen en luxe voorzieningen trekken zakenreizigers en toeristen aan.',
        'De keuken mengt Arabische tradities met invloeden uit Zuid-Azië en de Levant.',
        'Qatar combineert kleine schaal met aanzienlijke economische en diplomatieke slagkracht.'
    ),
    'rs' => $country(
        'Servië ligt in Zuidoost-Europa en vormt een belangrijke schakel tussen Balkan, Midden-Europa en de Donau-regio.',
        'Belgrado is de hoofdstad, terwijl Novi Sad, Niš en Kragujevac andere belangrijke steden zijn.',
        'Ottomaanse, Habsburgse en Slavisch-orthodoxe invloeden hebben de cultuur en geschiedenis van het land diep gevormd.',
        'De economie steunt op industrie, landbouw, energie, IT en regionale handel.',
        'Servië is een parlementaire republiek met een politiek debat dat sterk samenhangt met regionale geschiedenis.',
        'Het land kent riviervlaktes, heuvels en berggebieden, met een continentaal klimaat.',
        'Belgrado, kloosters, muziekfestivals en de Donau trekken bezoekers met uiteenlopende interesses.',
        'De keuken bestaat uit stevige Balkan-gerechten, gegrild vlees, brood, zuivel en paprika-invloeden.',
        'Servië combineert levendige steden met een sterk historisch bewustzijn.'
    ),
    'ru' => $country(
        'Rusland is het grootste land ter wereld en strekt zich uit over Europa en Azië, met enorme regionale verschillen.',
        'Moskou is de hoofdstad, terwijl Sint-Petersburg, Novosibirsk, Kazan en Jekaterinenburg belangrijke centra zijn.',
        'Tsarenrijk, Sovjettijd en post-Sovjetontwikkeling hebben een complexe cultuur en staatsopvatting gevormd.',
        'De economie steunt op energie, grondstoffen, industrie, defensie, landbouw en wetenschappelijke capaciteit.',
        'Rusland is een federatie met sterk gecentraliseerde politieke macht.',
        'Het land omvat toendra, taiga, steppen, bergen en grote riviersystemen, met zeer uiteenlopende klimaten.',
        'Historische steden, musea, spoorlijnen en grote landschappen bieden een enorme maar vaak logistiek intensieve reiservaring.',
        'De keuken omvat soepen, brood, paddenstoelen, vis, ingelegde producten en stevige wintergerechten.',
        'Rusland combineert schaal, culturele diepte en geopolitiek gewicht op uitzonderlijke wijze.'
    ),
    'sa' => $country(
        'Saoedi-Arabië is een groot land op het Arabisch Schiereiland en heeft een centrale plaats in de islamitische wereld.',
        'Riyad is de hoofdstad, met Jeddah, Mekka, Medina en Dammam als andere sleutelsteden.',
        'Het land is gevormd door Arabische stammen, religieuze betekenis en de opkomst van de moderne Saoedische staat in de twintigste eeuw.',
        "De economie steunt vooral op olie en petrochemie, naast logistiek, bouw, financiën en recentere diversificatieprogramma's.",
        'Saoedi-Arabië is een absolute monarchie met sterk centraal bestuur.',
        'Woestijnen, plateaus en kustgebieden domineren het landschap, met een heet en droog klimaat.',
        'Religieuze steden, archeologische sites en nieuwe toeristische projecten trekken steeds meer bezoekers aan.',
        'De keuken combineert Arabische rijst- en vleesgerechten met koffie, dadels en regionale kruidingen.',
        'Saoedi-Arabië verbindt religieuze betekenis met economische en politieke invloed in de regio.'
    ),
    'se' => $country(
        'Zweden is een Scandinavisch land dat bekendstaat om welzijn, innovatie, design en uitgestrekte natuur.',
        'Stockholm is de hoofdstad, met Göteborg, Malmö en Uppsala als andere belangrijke steden.',
        'Het land bouwde voort op Noordse tradities, een lange periode van vrede en sterke sociale instituties.',
        'De economie steunt op industrie, technologie, design, groene innovatie, bosbouw en diensten.',
        'Zweden is een constitutionele monarchie met een sterk parlementair systeem.',
        'Bossen, meren, eilanden en noordelijke wildernis bepalen het landschap, met grote seizoensverschillen.',
        "Steden, archipels, noorderlichtregio's en natuurtoerisme maken Zweden breed aantrekkelijk.",
        'De keuken draait om vis, aardappelen, bessen, kaneelgebak en moderne Scandinavische eenvoud.',
        'Zweden combineert sociale stabiliteit met een sterke internationale reputatie voor innovatie.'
    ),
    'tn' => $country(
        'Tunesië ligt in Noord-Afrika en staat bekend om zijn mediterrane kust, oude geschiedenis en relatief compacte schaal.',
        'Tunis is de hoofdstad, met Sfax, Sousse en Kairouan als andere belangrijke steden.',
        'Fenicische, Romeinse, Arabische, Ottomaanse en Franse invloeden lopen door elkaar in de Tunesische cultuur.',
        'De economie rust op toerisme, landbouw, productie, fosfaten en diensten.',
        'Tunesië is een republiek die de voorbije jaren intens publiek debat kende over bestuur en democratie.',
        'Het land omvat kustvlakten, heuvels en Sahara-overgangen, met een mediterraan tot droog klimaat.',
        "Stranden, Carthago, medina's en woestijnroutes vormen de belangrijkste toeristische troeven.",
        'De keuken gebruikt olijfolie, couscous, harissa, vis en geurige stoofgerechten.',
        'Tunesië verbindt mediterrane openheid met een sterke Noord-Afrikaanse identiteit.'
    ),
    'tr' => $country(
        "Turkije ligt tussen Europa en Azië en heeft een unieke positie als brug tussen regio's, culturen en handelsroutes.",
        'Ankara is de hoofdstad, terwijl Istanbul, Izmir, Bursa en Antalya grote invloed uitoefenen.',
        'Het land bouwt voort op Anatolische, Byzantijnse, Ottomaanse en republikeinse lagen die nog altijd zichtbaar zijn.',
        'De economie steunt op industrie, bouw, landbouw, toerisme, logistiek en productie.',
        'Turkije is een republiek met een sterke centrale staat en een politiek landschap dat intens en dynamisch blijft.',
        'Van de Bosporus en Anatolische hoogvlakten tot mediterrane kusten en berggebieden kent het land grote geografische variatie.',
        'Istanbul, Cappadocië, Efeze en de kust maken Turkije een van de rijkste toeristische bestemmingen in de regio.',
        'De keuken is zeer gevarieerd en omvat kebab, meze, brood, thee, zoetigheden en talloze regionale gerechten.',
        'Turkije koppelt strategische ligging aan historische gelaagdheid en dagelijkse culturele rijkdom.'
    ),
    'ua' => $country(
        'Oekraïne is een groot land in Oost-Europa met vruchtbare landbouwgronden, industriële tradities en sterke culturele eigenheid.',
        'Kyiv is de hoofdstad, met Lviv, Odesa, Dnipro en Kharkiv als andere belangrijke steden.',
        'De geschiedenis van Oekraïne omvat vorstendommen, rijken, Sovjettijd en een krachtige zoektocht naar eigen staatsvorming.',
        'De economie steunt op landbouw, industrie, energie, technologie en logistieke ligging.',
        'Oekraïne is een republiek met een parlementair-presidentieel systeem en een samenleving die sterk betrokken is bij publieke kwesties.',
        'Het land omvat steppe, rivieren, vruchtbare vlaktes en kustzones aan de Zwarte Zee, met een overwegend continentaal klimaat.',
        'Historische steden, kerken, culturele centra en natuurgebieden tonen de veelzijdigheid van het land.',
        'De keuken is stevig en regionaal, met borsjtsj, dumplings, brood, aardappelen en ingelegde producten.',
        'Oekraïne valt op door veerkracht, cultureel gewicht en een sterke band tussen land, taal en identiteit.'
    ),
    'us' => $country(
        'De Verenigde Staten zijn een federale staat in Noord-Amerika en behoren tot de invloedrijkste landen op economisch, cultureel en politiek vlak.',
        'Washington, D.C. is de hoofdstad, terwijl New York, Los Angeles, Chicago, Houston en vele andere steden wereldwijd bekend zijn.',
        'De geschiedenis van het land omvat inheemse beschavingen, kolonisatie, immigratie, burgerrechtenbewegingen en voortdurende maatschappelijke verandering.',
        'De economie is de grootste ter wereld en steunt op technologie, financiën, industrie, landbouw, media en defensie.',
        'De Verenigde Staten zijn een federale presidentiële republiek met sterke instellingen en een uitgesproken politieke polarisatie.',
        'Van Atlantische en Pacifische kusten tot bergen, woestijnen, prairies en arctische gebieden kent het land uitzonderlijke geografische variatie.',
        'Nationale parken, wereldsteden, muzieksteden, themaparken en iconische monumenten trekken grote aantallen bezoekers.',
        'De keuken is zeer divers en weerspiegelt migratie uit de hele wereld, van barbecue en burgers tot regionale fusion.',
        'De Verenigde Staten combineren enorme schaal, culturele invloed en een blijvende aantrekkingskracht op wereldniveau.'
    ),
    'uy' => $country(
        'Uruguay is een relatief klein Zuid-Amerikaans land dat bekendstaat om politieke stabiliteit, kustplaatsen en een hoge levenskwaliteit.',
        'Montevideo is de hoofdstad, met Salto, Paysandú en Punta del Este als andere belangrijke plaatsen.',
        'Het land bouwde een sterke civiele traditie op, met invloeden uit Spanje, Italië en de Río de la Plata-regio.',
        'De economie steunt op landbouw, vleesexport, diensten, logistiek, hernieuwbare energie en technologie.',
        'Uruguay is een presidentiële republiek met stabiele democratische instellingen.',
        'Het landschap bestaat vooral uit glooiende graslanden en een kuststrook, met een gematigd klimaat.',
        'Stranden, wijnhuizen, Montevideo en rustige badplaatsen trekken bezoekers die kleinschaligheid waarderen.',
        'De keuken is bekend om gegrild vlees, empanadas, dulce de leche en sterke koffiecultuur.',
        'Uruguay valt op door zijn rust, institutionele stabiliteit en aangename schaal.'
    ),
    'za' => $country(
        'Zuid-Afrika ligt aan de zuidpunt van het continent en staat bekend om zijn biodiversiteit, stedelijke contrasten en complexe geschiedenis.',
        'Pretoria is de bestuurlijke hoofdstad, Kaapstad de wetgevende hoofdstad en Bloemfontein de gerechtelijke; Johannesburg is het grootste economische centrum.',
        'Inheemse tradities, koloniale overheersing, apartheid en democratische omwenteling bepalen nog altijd het maatschappelijke verhaal.',
        'De economie steunt op mijnbouw, landbouw, industrie, toerisme, financiële diensten en een brede binnenlandse markt.',
        'Zuid-Afrika is een parlementaire republiek met sterke constitutionele waarborgen en grote sociale uitdagingen.',
        'Het land omvat savannes, bergen, wijngebieden, kusten en halfwoestijn, met veel verschillende klimaatzones.',
        'Safariparken, Kaapstad, de Tuinroute en cultureel erfgoed maken Zuid-Afrika zeer aantrekkelijk voor reizigers.',
        'De keuken combineert Afrikaanse, Nederlandse, Maleise, Indiase en Britse invloeden in een breed spectrum aan smaken.',
        'Zuid-Afrika verenigt natuur, culturele rijkdom en een zwaar maar belangrijk historisch bewustzijn.'
    ),
    'ir' => $country(
        'Iran ligt in West-Azië en staat bekend om een zeer oude beschaving, poëzie, stedenbouw en een sterke culturele continuïteit.',
        'Teheran is de hoofdstad, met Mashhad, Isfahan, Shiraz en Tabriz als andere belangrijke steden.',
        'Perzische tradities, islamitische geschiedenis en een lange staatsvorming geven Iran een uitgesproken beschavingskarakter.',
        'De economie steunt op energie, industrie, landbouw, handel en een grote binnenlandse markt, ondanks internationale druk.',
        'Iran is een islamitische republiek met een complex systeem van gekozen en religieuze instellingen.',
        'Het land kent hoogvlakten, bergen, woestijnbekkens en kusten aan de Kaspische Zee en de Perzische Golf, met sterke klimaatschommelingen.',
        'Historische steden, moskeeën, bazaars, archeologische sites en berglandschappen trekken cultureel geïnteresseerde reizigers.',
        'De Iraanse keuken is verfijnd en aromatisch, met rijstgerechten, kruiden, stoofpotten, kebab en veel verse kruiden.',
        'Iran combineert historische diepte, culturele rijkdom en een sterke regionale betekenis.'
    ),
];
