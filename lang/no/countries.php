<?php

$countryProfile = static function (
    string $intro,
    string $cities,
    string $history,
    string $economy,
    string $politics,
    string $geography,
    string $tourism,
    string $cuisine,
    string $conclusion,
): string {
    return "<p>{$intro}</p>\n"
        .'<p class="mt-1"><b>Hovedstad og større byer:</b></p>'."\n"
        ."<p>{$cities}</p>\n"
        .'<p class="mt-1"><b>Historie og kultur:</b></p>'."\n"
        ."<p>{$history}</p>\n"
        .'<p class="mt-1"><b>Økonomi:</b></p>'."\n"
        ."<p>{$economy}</p>\n"
        .'<p class="mt-1"><b>Styresett og politikk:</b></p>'."\n"
        ."<p>{$politics}</p>\n"
        .'<p class="mt-1"><b>Geografi og klima:</b></p>'."\n"
        ."<p>{$geography}</p>\n"
        .'<p class="mt-1"><b>Turisme og severdigheter:</b></p>'."\n"
        ."<p>{$tourism}</p>\n"
        .'<p class="mt-1"><b>Matkultur:</b></p>'."\n"
        ."<p>{$cuisine}</p>\n"
        ."<p>{$conclusion}</p>";
};

return [
    'ae' => $countryProfile(
        'De forente arabiske emirater er en føderasjon på Den arabiske halvøy, kjent for ørkenlandskap, handel og svært moderne bymiljøer.',
        'Abu Dhabi er hovedstad, mens Dubai, Sharjah og de øvrige emiratene er viktige sentre for næringsliv og kultur.',
        'Landet ble samlet i 1971 og kombinerer arabiske tradisjoner med en internasjonal og urban livsstil.',
        'Økonomien bygger på olje og gass, men også på handel, eiendom, luftfart og turisme.',
        'Emiratene styres som en føderasjon av arvelige monarkier med stor vekt på stabilitet og statlig styring.',
        'Landskapet består av ørken, kyst og moderne byer, og klimaet er varmt og tørt store deler av året.',
        'Besøkende trekkes til Burj Khalifa, Palm Jumeirah, luksusresorter og store handelsområder.',
        'Maten blander emiratisk og arabisk tradisjon med internasjonale impulser og mye krydret ris, kjøtt og sjømat.',
        'Alt i alt er landet et møtested mellom tradisjonell gulfkultur og global modernitet.'
    ),
    'ar' => $countryProfile(
        'Argentina er et stort land i Sør-Amerika, kjent for tango, fotball og et landskap som spenner fra Andesfjell til Patagonia.',
        'Buenos Aires er hovedstad, mens Córdoba, Rosario og Mendoza er andre viktige byer.',
        'Landets historie er formet av urfolk, spansk kolonitid og sterk europeisk innvandring, særlig fra Italia og Spania.',
        'Økonomien hviler på jordbruk, industri, energi og tjenestesektorer, selv om landet ofte har opplevd økonomiske svingninger.',
        'Argentina er en føderal republikk med et livlig politisk system og sterke regionale forskjeller.',
        'Geografien rommer pampas, fjell, isbreer og subtropiske områder, med store klimavariasjoner fra nord til sør.',
        'Turister søker ofte mot Buenos Aires, Iguazúfallene, vinområdene i vest og naturen i Patagonia.',
        'Matkulturen er kjent for storfekjøtt, asado, empanadas og viner med tydelig europeisk preg.',
        'Alt i alt er Argentina et land med sterk identitet, store kontraster og dype kulturtradisjoner.'
    ),
    'ro' => $countryProfile(
        'Romania ligger i krysningen mellom Sentral- og Sørøst-Europa og er kjent for Karpatene, Donaudeltaet og en rik kulturarv.',
        'București er hovedstad, mens Cluj-Napoca, Timișoara og Iași er sentrale byer.',
        'Historien er preget av romersk arv, middelalderfyrstedømmer og påvirkning fra både osmanske og habsburgske riker.',
        'Økonomien bygger på industri, landbruk, IT, tjenester og handel innenfor EU.',
        'Romania er en republikk med moderne institusjoner og et politisk liv som stadig er i endring.',
        'Landet har fjell, åser, elvesletter og kyst mot Svartehavet, med tydelige årstider.',
        'Turisme knyttes ofte til Bran slott, middelalderbyer i Transilvania og natur i fjell og delta.',
        'Maten byr på blant annet sarmale, mămăligă, supper og bakverk med balkansk og sentraleuropeisk preg.',
        'Alt i alt kombinerer Romania historisk dybde, vakker natur og et tydelig europeisk uttrykk.'
    ),
    'au' => $countryProfile(
        'Australia er både et kontinent og et land, kjent for unik natur, flerkulturelt samfunn og store åpne områder.',
        'Canberra er hovedstad, mens Sydney, Melbourne, Brisbane og Perth er store og innflytelsesrike byer.',
        'Historien rommer eldgamle urfolkstradisjoner, britisk kolonisering og en moderne innvandringshistorie.',
        'Økonomien er bred, med styrke innen gruvedrift, landbruk, utdanning, finans og turisme.',
        'Australia er et parlamentarisk demokrati og konstitusjonelt monarki med stabile institusjoner.',
        'Landskapet varierer fra ørken og buskland til regnskog, fjell og lange kystlinjer, med flere klimasoner.',
        'Mange reiser hit for Great Barrier Reef, Sydney Opera House, nasjonalparker og strender.',
        'Matkulturen er mangfoldig og speiler både lokale råvarer og innflytelse fra Asia, Europa og Stillehavsområdet.',
        'Alt i alt er Australia et land der natur, innovasjon og mangfold går hånd i hånd.'
    ),
    'be' => $countryProfile(
        'Belgia ligger sentralt i Vest-Europa og er kjent for middelalderbyer, flerspråklig kultur og stor politisk betydning i Europa.',
        'Brussel er hovedstad, mens Antwerpen, Gent, Brugge og Liège er viktige byer.',
        'Landets kultur er formet av både nederlandsk-, fransk- og tyskspråklige tradisjoner samt en lang handels- og kunsthistorie.',
        'Økonomien bygger på tjenester, logistikk, industri, handel og internasjonale institusjoner.',
        'Belgia er et føderalt konstitusjonelt monarki med sterke regioner og kompliserte, men etablerte styringsformer.',
        'Landskapet består av byområder, jordbruksland, skoger og en kort kyststripe med temperert klima.',
        'Brussel, Grand Place, Brugges gamleby og mange museer gjør landet populært for besøkende.',
        'Belgisk mat forbindes ofte med sjokolade, vafler, øl, pommes frites og fyldige gryteretter.',
        'Alt i alt er Belgia lite i størrelse, men stort i historisk, kulturell og politisk innflytelse.'
    ),
    'bg' => $countryProfile(
        'Bulgaria er et balkanland med lang historie, sterke folkemusikktradisjoner og kyst mot Svartehavet.',
        'Sofia er hovedstad, mens Plovdiv, Varna og Burgas er blant de viktigste byene.',
        'Historien strekker seg fra thrakisk og romersk tid til middelalderriker, osmansk styre og moderne stat.',
        'Økonomien bygger på industri, landbruk, IT, energi og turisme.',
        'Bulgaria er en parlamentarisk republikk og medlem av EU med et politisk liv preget av reform og modernisering.',
        'Landet rommer fjell, skoger, sletteland og kyst, med kalde vintre og varme somre.',
        'Turister besøker ofte klostre, historiske gamlebyer, skianlegg og svartehavsstrender.',
        'Maten er rustikk og smakfull, med retter som banitsa, shopska-salat, grillet kjøtt og yoghurtbaserte spesialiteter.',
        'Alt i alt er Bulgaria et land med tydelig identitet, rik historie og stor geografisk variasjon.'
    ),
    'br' => $countryProfile(
        'Brasil er Sør-Amerikas største land og er kjent for enorme naturressurser, stor kulturell blanding og lidenskap for fotball.',
        'Brasília er hovedstad, mens São Paulo, Rio de Janeiro, Salvador og Belo Horizonte er sentrale storbyer.',
        'Historien er formet av urfolk, portugisisk kolonistyre og afrikansk arv, noe som preger språk, musikk og samfunn.',
        'Økonomien er stor og mangfoldig, med jordbruk, gruvedrift, industri, energi og tjenester som viktige sektorer.',
        'Brasil er en føderal republikk med store regionale forskjeller og et levende politisk landskap.',
        'Landet rommer Amazonas, savanner, våtmarker, storbyer og lang atlanterhavskyst, med flere klimasoner.',
        'Turisme knyttes til Kristusstatuen, Iguazúfallene, strender, karneval og regnskog.',
        'Brasiliansk mat er variert, med blant annet feijoada, churrasco, tropisk frukt og mange regionale kjøkken.',
        'Alt i alt er Brasil et land av store dimensjoner, sterke rytmer og tydelige kontraster.'
    ),
    'ca' => $countryProfile(
        'Canada er et stort nordamerikansk land kjent for vidstrakt natur, flerkulturelle byer og høy levestandard.',
        'Ottawa er hovedstad, mens Toronto, Montréal, Vancouver og Calgary er blant de viktigste byene.',
        'Historien bygger på urfolkstradisjoner, fransk og britisk kolonihistorie og senere innvandring fra hele verden.',
        'Økonomien er sterk innen naturressurser, industri, teknologi, finans og tjenester.',
        'Canada er et parlamentarisk demokrati og konstitusjonelt monarki med føderal struktur.',
        'Geografien omfatter fjell, skoger, innsjøer, arktiske områder og lange kystlinjer, med store klimaforskjeller.',
        'Besøkende trekkes mot Niagarafallene, Rocky Mountains, nasjonalparker og storbyliv.',
        'Matkulturen er sammensatt, men forbindes ofte med lønnesirup, sjømat, poutine og påvirkning fra mange innvandrermiljøer.',
        'Alt i alt er Canada et land der natur, stabilitet og kulturelt mangfold står sterkt.'
    ),
    'ch' => $countryProfile(
        'Sveits er et alpeland midt i Europa, kjent for høy levestandard, presisjon og politisk stabilitet.',
        'Bern er hovedstad, mens Zürich, Genève, Basel og Lausanne er sentrale byer.',
        'Landets historie er preget av lokal selvstyretradisjon, flerspråklighet og en sterk identitet rundt nøytralitet.',
        'Økonomien bygger på finans, farmasi, teknologi, turisme og høyt spesialisert industri.',
        'Sveits er en føderal stat med sterke demokratiske tradisjoner og mye direkte medbestemmelse.',
        'Geografien domineres av Alpene, innsjøer og daler, med klima som varierer mellom regionene.',
        'Turister søker seg til Matterhorn, skidestinasjoner, historiske byer og tog gjennom fjellandskap.',
        'Maten forbindes gjerne med fondue, raclette, sjokolade og et kjøkken påvirket av nabolandene.',
        'Alt i alt er Sveits et land der effektivitet, natur og regional variasjon lever side om side.'
    ),
    'ci' => $countryProfile(
        'Elfenbenskysten ligger i Vest-Afrika og er kjent for kulturelt mangfold, sterk kystøkonomi og stor kakaoproduksjon.',
        'Yamoussoukro er politisk hovedstad, mens Abidjan er landets største by og viktigste handelsknutepunkt.',
        'Landets historie er formet av mange folkegrupper, fransk kolonitid og en moderne nasjonsbygging etter selvstendigheten.',
        'Økonomien bygger særlig på kakao, kaffe, handel, jordbruk og voksende tjenestesektorer.',
        'Elfenbenskysten er en republikk med nasjonale institusjoner som spiller en sentral rolle i regional politikk.',
        'Landskapet omfatter kyst, regnskog og savanne, og klimaet er tropisk med fuktige og tørre perioder.',
        'Turisme finnes rundt markeder, kystbyer, kulturfestivaler og kjente bygg som basilikaen i Yamoussoukro.',
        'Matkulturen byr på attiéké, kedjenou, grillet fisk og retter basert på kassava og plantain.',
        'Alt i alt er Elfenbenskysten et energisk land med tydelig vestafrikansk identitet og stor økonomisk betydning.'
    ),
    'cl' => $countryProfile(
        'Chile er et langt og smalt land langs Sør-Amerikas vestkyst, kjent for store naturkontraster og lang kystlinje.',
        'Santiago er hovedstad, mens Valparaíso, Concepción og Antofagasta er viktige byer.',
        'Historien er preget av urfolk, spansk kolonitid og en sterk moderne nasjonalstat med tydelig regional identitet.',
        'Økonomien bygger særlig på kobber, jordbruk, vin, fiskeri, energi og tjenester.',
        'Chile er en republikk med etablerte demokratiske institusjoner og et aktivt offentlig ordskifte.',
        'Landet strekker seg fra Atacamaørkenen i nord til isbreer og fjorder i sør, med store klimaforskjeller.',
        'Turisme samler seg rundt Patagonia, Atacama, påskeøya, vinregioner og den historiske kystbyen Valparaíso.',
        'Maten inkluderer sjømat, empanadas, grillretter og lokale produkter fra både kyst og dalstrøk.',
        'Alt i alt er Chile et land der geografi, natur og moderne samfunnsutvikling skaper en tydelig egenart.'
    ),
    'cm' => $countryProfile(
        'Kamerun kalles ofte «Afrika i miniatyr» fordi landet rommer mange landskap, språk og kulturer på ett sted.',
        'Yaoundé er hovedstad, mens Douala er den største byen og det viktigste økonomiske sentrumet.',
        'Historien bærer preg av sterke lokale tradisjoner og senere tysk, fransk og britisk kolonial innflytelse.',
        'Økonomien bygger på jordbruk, olje, tømmer, handel og tjenester.',
        'Kamerun er en republikk med et sentralisert politisk system og stor regional variasjon.',
        'Geografien spenner fra kyst og regnskog til savanne og vulkanske høyder, med tropisk klima.',
        'Besøkende søker ofte naturreservater, Mount Cameroon, strender og rike kulturmiljøer.',
        'Matkulturen omfatter blant annet ndolé, grillet fisk, stivelsesretter og krydret tilbehør.',
        'Alt i alt er Kamerun et mangfoldig land med sterk kulturell og geografisk bredde.'
    ),
    'cn' => $countryProfile(
        'Kina er et av verdens største og mest innflytelsesrike land, kjent for lang historie, stor befolkning og rask modernisering.',
        'Beijing er hovedstad, mens Shanghai, Shenzhen, Guangzhou og Chongqing er store og viktige byer.',
        'Historien strekker seg over flere tusen år og omfatter dynastier, filosofi, oppfinnelser og store samfunnsendringer.',
        'Økonomien er blant verdens største og drives av industri, teknologi, handel, infrastruktur og tjenester.',
        'Kina styres som en ettpartistat med sterk sentral kontroll og langsiktig planlegging.',
        'Landet rommer fjell, ørken, elvesletter, store byer og lang kyst, med mange klimasoner.',
        'Turister besøker ofte Den kinesiske mur, Beijing, Xi’an, naturparker og historiske templer.',
        'Kinesisk matkultur er svært regional og favner alt fra nudler og dumplings til krydrede wokretter og sjømat.',
        'Alt i alt er Kina et land der gammel sivilisasjon og moderne makt møtes i stor skala.'
    ),
    'co' => $countryProfile(
        'Colombia ligger i det nordvestlige Sør-Amerika og er kjent for Andesfjell, karibisk kyst, kaffe og levende bykultur.',
        'Bogotá er hovedstad, mens Medellín, Cali, Cartagena og Barranquilla er sentrale byer.',
        'Historien rommer urfolk, spansk kolonitid og en moderne kultur preget av musikk, litteratur og regionale tradisjoner.',
        'Økonomien bygger på kaffe, olje, industri, tjenester, jordbruk og turisme.',
        'Colombia er en republikk med aktive demokratiske institusjoner og store regionale forskjeller.',
        'Landet har både kyst, fjell, regnskog og elvesystemer, og klimaet varierer sterkt med høyde.',
        'Turister trekkes til Cartagena, kaffeaksen, Medellín, Tayrona og natur i Andes og Amazonas.',
        'Matkulturen omfatter arepas, supper, risretter og lokale spesialiteter som varierer mye mellom regionene.',
        'Alt i alt er Colombia et land med tydelig rytme, rik natur og stor regional personlighet.'
    ),
    'cz' => $countryProfile(
        'Tsjekkia er et sentraleuropeisk land kjent for historiske byer, ølkultur og godt bevart arkitektur.',
        'Praha er hovedstad, mens Brno, Ostrava og Plzeň er andre viktige byer.',
        'Historien knytter landet til Böhmen, Habsburg-riket, industrialisering og moderne europeisk statsutvikling.',
        'Økonomien hviler på industri, bilproduksjon, teknologi, tjenester og handel i EU-markedet.',
        'Tsjekkia er en parlamentarisk republikk med stabile institusjoner og sterk lokal kulturarv.',
        'Landskapet består av åser, skoger, elver og byer med temperert klima.',
        'Besøkende kommer ofte for Praha, slott, spa-byer og små middelalderbyer.',
        'Maten er tradisjonell og mettende, med dumplings, kjøttretter, supper og kjent øltradisjon.',
        'Alt i alt er Tsjekkia et land som forener historisk tyngde med et moderne sentraleuropeisk preg.'
    ),
    'de' => $countryProfile(
        'Tyskland er en ledende europeisk stat, kjent for industri, kultur, vitenskap og stor regional variasjon.',
        'Berlin er hovedstad, mens München, Hamburg, Frankfurt og Köln er blant de viktigste byene.',
        'Historien favner alt fra keiserriker og filosofi til gjenforening og moderne europeisk integrasjon.',
        'Økonomien er blant verdens sterkeste og bygger på industri, eksport, teknologi, energi og tjenester.',
        'Tyskland er en føderal republikk med sterke delstater og solid parlamentarisk tradisjon.',
        'Geografien varierer fra Alpene og skogområder til elvedaler, kyst og store sletteland.',
        'Turisme samler seg rundt Berlin, eventyrslott, julemarkeder, Rhinen og kulturfestivaler.',
        'Matkulturen byr på pølser, pretzler, brød, øl og mange regionale spesialiteter.',
        'Alt i alt er Tyskland et land der historisk dybde og teknologisk styrke går hånd i hånd.'
    ),
    'dk' => $countryProfile(
        'Danmark er et skandinavisk land kjent for design, sjøfart, høy livskvalitet og en sterk kystkultur.',
        'København er hovedstad, mens Aarhus, Odense og Aalborg er viktige byer.',
        'Historien går fra vikingtid til moderne velferdsstat og preger fortsatt språk, kultur og identitet.',
        'Økonomien bygger på handel, grønn energi, design, shipping, matproduksjon og tjenester.',
        'Danmark er et konstitusjonelt monarki med stabilt parlamentarisk styre og stor tillit i samfunnet.',
        'Landet består av øyer, flatt landskap og lang kyst, med mildt maritimt klima.',
        'Turister besøker ofte København, historiske havneområder, slott og fornøyelsesparker som Tivoli og Legoland.',
        'Matkulturen forbindes særlig med smørrebrød, sjømat, bakverk og et nytt nordisk kjøkken.',
        'Alt i alt er Danmark et kompakt, men tydelig land med sterk kombinasjon av tradisjon og modernitet.'
    ),
    'dz' => $countryProfile(
        'Algerie er Afrikas største land og er kjent for Sahara, middelhavskyst og en blanding av berbersk, arabisk og fransk arv.',
        'Alger er hovedstad, mens Oran og Constantine er viktige byer.',
        'Historien rommer berberske røtter, romersk nærvær, osmansk tid, fransk kolonistyre og en krevende selvstendighetskamp.',
        'Økonomien hviler særlig på olje og gass, men også på jordbruk, handel og offentlige investeringer.',
        'Algerie er en republikk med et sterkt statlig apparat og stor strategisk betydning i Nord-Afrika.',
        'Landet omfatter ørken, fjell, stepper og kyst mot Middelhavet, med tørt og varmt klima mange steder.',
        'Turisme er mindre utbygd enn i noen naboland, men historiske ruiner, ørkenområder og kystbyer trekker oppmerksomhet.',
        'Maten preges av couscous, gryter, brød og nordafrikanske kryddertradisjoner.',
        'Alt i alt er Algerie et land med stor geografi, sterk historie og tydelig regional tyngde.'
    ),
    'ec' => $countryProfile(
        'Ecuador ligger ved ekvator i Sør-Amerika og er kjent for stor biologisk variasjon og korte avstander mellom ulike naturtyper.',
        'Quito er hovedstad, mens Guayaquil og Cuenca er blant de viktigste byene.',
        'Historien kombinerer urfolkstradisjoner, spansk kolonitid og en moderne nasjonal identitet med sterk regional egenart.',
        'Økonomien bygger på olje, jordbruk, fiske, handel og turisme.',
        'Ecuador er en republikk med politiske institusjoner som stadig påvirkes av økonomiske og sosiale spørsmål.',
        'Landet rommer Andesfjell, Stillehavskyst, Amazonas og Galápagosøyene, med stor klimavariasjon.',
        'Turister kommer for Galápagos, gamlebyen i Quito, vulkaner, markeder og naturmangfold.',
        'Matkulturen inkluderer ceviche, supper, maisretter og regionale spesialiteter fra høyland og kyst.',
        'Alt i alt er Ecuador et lite land med uvanlig stor natur- og kulturmessig bredde.'
    ),
    'eg' => $countryProfile(
        'Egypt er et nordafrikansk land med en av verdens mest kjente oldtidshistorier og en sentral rolle i den arabiske verden.',
        'Kairo er hovedstad, mens Alexandria, Giza og Luxor er sentrale byer.',
        'Historien spenner fra faraoenes riker til hellenistisk, romersk, islamsk og moderne egyptisk statsdannelse.',
        'Økonomien bygger på turisme, Suezkanalen, jordbruk, energi, industri og tjenester.',
        'Egypt er en republikk med sterk statlig styring og stor regional betydning i Midtøsten og Nord-Afrika.',
        'Nildalen står i sentrum av geografi og bosetting, omgitt av store ørkenområder og kyst mot Middelhavet og Rødehavet.',
        'Turisme knyttes særlig til pyramidene, Luxor, Nilen, museer og badebyer ved Rødehavet.',
        'Matkulturen byr på retter som koshari, ful medames, brød, grillede kjøttretter og mye belgfrukter.',
        'Alt i alt er Egypt et land der oldtid, storbyliv og ørkenlandskap fortsatt setter tonen.'
    ),
    'es' => $countryProfile(
        'Spania ligger på Den iberiske halvøy og er kjent for regionalt mangfold, kunst, fotball og middelhavsliv.',
        'Madrid er hovedstad, mens Barcelona, Valencia, Sevilla og Bilbao er viktige byer.',
        'Historien rommer romersk, islamsk og kristen innflytelse, samt en lang tradisjon for kunst og litteratur.',
        'Økonomien bygger på tjenester, industri, landbruk, turisme og handel innenfor EU.',
        'Spania er et konstitusjonelt monarki med sterke autonome regioner og et tydelig parlamentarisk system.',
        'Landskapet varierer mellom høysletter, fjell, kyst og øyer, med alt fra varmt middelhavsklima til grønnere atlanterhavsområder.',
        'Turister besøker ofte Barcelona, Madrid, Andalusia, øyene og historiske byer som Toledo og Granada.',
        'Matkulturen er rik på tapas, paella, skinke, olivenolje, sjømat og sterke regionale kjøkken.',
        'Alt i alt er Spania et land der kultur, klima og regional stolthet preger hverdagen sterkt.'
    ),
    'fr' => $countryProfile(
        'Frankrike er en sentral europeisk stormakt, kjent for kunst, språk, historie, mat og stor internasjonal innflytelse.',
        'Paris er hovedstad, mens Marseille, Lyon, Toulouse og Lille er viktige byer.',
        'Historien favner kongedømme, revolusjon, republikk og en lang tradisjon for filosofi, kultur og statsbygging.',
        'Økonomien bygger på industri, landbruk, luksusvarer, turisme, energi og tjenester.',
        'Frankrike er en republikk med sterke sentrale institusjoner og tydelig rolle i europeisk politikk.',
        'Landet har alt fra middelhavskyst og atlanterhav til alpint høyfjell og fruktbare jordbruksområder.',
        'Turister trekkes til Paris, rivieraen, slottene i Loire, vinområder og kjente museer.',
        'Matkulturen er verdensberømt og omfatter brød, ost, vin, sauser, bakverk og mange regionale spesialiteter.',
        'Alt i alt er Frankrike et land der kulturarv og moderne samfunnsliv fortsatt påvirker verden rundt seg.'
    ),
    'en' => $countryProfile(
        'England er den mest folkerike delen av Storbritannia og er kjent for lange historiske tradisjoner, storbyliv og sterk fotballkultur.',
        'London er hovedstad, mens Manchester, Birmingham, Liverpool og Bristol er viktige byer.',
        'Historien går fra angelsaksiske riker og normannisk styre til industriell revolusjon og global innflytelse.',
        'Økonomien er stor og tjenestetung, med finans, teknologi, industri, utdanning og kreative næringer som sentrale felt.',
        'England inngår i Storbritannia og styres innenfor et parlamentarisk system med monarki på nasjonalt nivå.',
        'Landskapet veksler mellom sletteland, åser, historiske byer og kyst, med temperert og ofte fuktig klima.',
        'Turisme knyttes til London, universitetsbyer, fotballarenaer, katedraler og steder som Stonehenge og Bath.',
        'Matkulturen rommer alt fra Sunday roast og pies til moderne storbykjøkken med påvirkning fra hele verden.',
        'Alt i alt er England et land der historie, språk og kultur fortsatt har stor internasjonal rekkevidde.'
    ),
    'sc' => $countryProfile(
        'Skottland er den nordlige delen av Storbritannia og er kjent for høyland, øyer, whisky og sterke nasjonale symboler.',
        'Edinburgh er hovedstad, mens Glasgow, Aberdeen og Inverness er viktige byer.',
        'Historien er preget av klantradisjoner, middelalderkongedømmer, union med England og en levende kulturell egenart.',
        'Økonomien bygger på energi, tjenester, turisme, utdanning, sjømat og næringer knyttet til whisky.',
        'Skottland har eget parlament innenfor Storbritannia og et tydelig offentlig liv rundt selvstyre og identitet.',
        'Geografien omfatter høyland, innsjøer, øyer og værhard kyst, med kjølig og skiftende klima.',
        'Turister trekkes til Edinburgh Castle, høylandet, Loch Ness, whiskyregioner og historiske landskap.',
        'Matkulturen omfatter blant annet haggis, havre, røkt fisk, vilt og sterke baketradisjoner.',
        'Alt i alt er Skottland et land med markert identitet, dramatisk natur og tydelig kulturarv.'
    ),
    'gh' => $countryProfile(
        'Ghana ligger i Vest-Afrika og er kjent for politisk stabilitet, kystfort, gull og en sterk kulturell scene.',
        'Accra er hovedstad, mens Kumasi, Tamale og Takoradi er viktige byer.',
        'Historien er knyttet til gamle kongedømmer, handel langs kysten, kolonitiden som Gullkysten og tidlig selvstendighet i Afrika.',
        'Økonomien bygger på gull, kakao, olje, handel, jordbruk og tjenester.',
        'Ghana er en republikk med relativt stabile demokratiske institusjoner i regional sammenheng.',
        'Landet har kyst, skog og savanne, med tropisk klima og tydelige regn- og tørketider.',
        'Turisme dreier seg ofte om historiske slavefort, naturparker som Kakum og kulturliv i Accra og Kumasi.',
        'Maten byr på jollof-ris, fufu, supper, grillet fisk og retter basert på kassava og plantain.',
        'Alt i alt er Ghana et land med sterk historisk bevissthet og tydelig regional betydning.'
    ),
    'gr' => $countryProfile(
        'Hellas er et sørøst-europeisk land kjent for antikk historie, øyrike, middelhavsklima og stor kulturell betydning.',
        'Athen er hovedstad, mens Thessaloniki, Patras og Heraklion er viktige byer.',
        'Historien favner antikk filosofi og demokrati, bysantinsk arv, osmansk tid og moderne statsdannelse.',
        'Økonomien bygger på turisme, sjøfart, handel, tjenester og jordbruk.',
        'Hellas er en parlamentarisk republikk med sterk historisk og symbolsk rolle i Europa.',
        'Geografien består av fjell, øyer og kystlinjer i Egeerhavet og Middelhavet, med varme somre og milde vintre.',
        'Turister søker mot Akropolis, øyer som Santorini og Kreta samt historiske steder over hele landet.',
        'Matkulturen er sentral i middelhavstradisjonen, med olivenolje, fisk, feta, moussaka og grillede retter.',
        'Alt i alt er Hellas et land der historie, hav og hverdagsliv smelter tett sammen.'
    ),
    'hr' => $countryProfile(
        'Kroatia ligger ved Adriaterhavet og er kjent for vakker kyst, gamle steinbyer og blanding av sentraleuropeisk og middelhavsk kultur.',
        'Zagreb er hovedstad, mens Split, Rijeka, Dubrovnik og Osijek er viktige byer.',
        'Historien rommer romersk arv, habsburgsk påvirkning, jugoslavisk periode og moderne selvstendighet.',
        'Økonomien bygger på turisme, tjenester, skipsfart, industri og jordbruk.',
        'Kroatia er en republikk med parlamentarisk styre og sterk orientering mot Europa.',
        'Landet har lang kyst, mange øyer, fjellområder og innland med temperert og middelhavspreget klima.',
        'Turister trekkes til Dubrovnik, Dalmatia, Plitvice-sjøene og øyene i Adriaterhavet.',
        'Matkulturen varierer mellom kyst og innland og omfatter sjømat, grillretter, pasta og bakverk.',
        'Alt i alt er Kroatia et land der hav, historie og bymiljøer skaper en tydelig og attraktiv profil.'
    ),
    'il' => $countryProfile(
        'Israel ligger i Midtøsten og er kjent for religiøs betydning, teknologisk utvikling og et svært sammensatt samfunn.',
        'Jerusalem fungerer som hovedstad i israelsk sammenheng, mens Tel Aviv, Haifa og Beersheba er viktige byer.',
        'Historien strekker seg fra oldtiden og bibelsk tradisjon til moderne statsdannelse og et område med mange konfliktlinjer.',
        'Økonomien er sterk innen teknologi, forskning, finans, industri og tjenester.',
        'Israel er et parlamentarisk demokrati med høy politisk aktivitet og stor internasjonal oppmerksomhet.',
        'Geografien spenner fra middelhavskyst og høyland til Jordandalen og ørkenområder i sør.',
        'Turisme knyttes til Jerusalem, Dødehavet, Galilea, strender og steder av religiøs og historisk betydning.',
        'Matkulturen blander påvirkning fra Midtøsten, Middelhavet og diasporamiljøer, med retter som falafel, hummus og grillede grønnsaker.',
        'Alt i alt er Israel et lite land med stor historisk, religiøs og geopolitisk betydning.'
    ),
    'in' => $countryProfile(
        'India er et enormt og mangfoldig land i Sør-Asia, kjent for mange språk, religioner, kulturer og sterke historiske tradisjoner.',
        'New Delhi er hovedstad, mens Mumbai, Bengaluru, Kolkata, Chennai og Hyderabad er store og innflytelsesrike byer.',
        'Historien favner gamle sivilisasjoner, store riker, kolonitid under Storbritannia og en sentral rolle i moderne asiatisk utvikling.',
        'Økonomien er bred, med teknologi, industri, jordbruk, handel, tjenester og rask urban vekst.',
        'India er en føderal republikk og verdens største demokrati, med stor politisk og sosial variasjon mellom delstatene.',
        'Landet rommer Himalaya, store sletter, ørken, tropiske kyster og mangfoldige klimasoner.',
        'Turister trekkes til Taj Mahal, Rajasthan, Kerala, Varanasi, naturparker og storbyer.',
        'Matkulturen er svært variert, men forbindes ofte med krydrede karrier, ris, brød, vegetarretter og sterke regionale forskjeller.',
        'Alt i alt er India et land med enorm skala, dyp historie og særdeles rik kulturell kompleksitet.'
    ),
    'ie' => $countryProfile(
        'Irland er en øynasjon i Nord-Atlanteren, kjent for grønne landskap, sterk litterær arv og levende musikkultur.',
        'Dublin er hovedstad, mens Cork, Galway, Limerick og Waterford er viktige byer.',
        'Historien rommer keltisk kultur, britisk dominans, uavhengighetskamp og en tydelig moderne nasjonal identitet.',
        'Økonomien bygger på teknologi, farmasi, finans, jordbruk og en åpen, eksportrettet modell.',
        'Irland er en republikk med parlamentarisk demokrati og tette bånd til både EU og engelskspråklige markeder.',
        'Landskapet består av grønne sletter, kystklipper, innsjøer og mildt, fuktig klima.',
        'Besøkende kommer ofte for Dublin, Cliffs of Moher, gamle ruiner, pubkultur og naturopplevelser.',
        'Matkulturen inkluderer gjerne sjømat, gryter, soda bread, potetretter og moderne bruk av lokale råvarer.',
        'Alt i alt er Irland et land med sterk fortellertradisjon, vakker natur og tydelig kulturprofil.'
    ),
    'it' => $countryProfile(
        'Italia ligger i Sør-Europa og er kjent for romersk arv, kunst, mote, mat og sterke regionale identiteter.',
        'Roma er hovedstad, mens Milano, Napoli, Torino, Firenze og Bologna er sentrale byer.',
        'Historien spenner fra Romerriket og renessansen til moderne republikansk stat og stor kulturell innflytelse.',
        'Økonomien bygger på industri, design, jordbruk, turisme, eksport og små og mellomstore bedrifter.',
        'Italia er en republikk med parlamentarisk system og betydelige regionale forskjeller i både politikk og økonomi.',
        'Landet rommer Alpene, Appenninene, middelhavskyst og store slettelandskap med variert klima.',
        'Turister søker seg til Roma, Venezia, Toscana, Amalfikysten og et stort antall historiske steder.',
        'Italiensk mat er globalt kjent og omfatter pasta, pizza, ost, olivenolje, vin og sterke lokale tradisjoner.',
        'Alt i alt er Italia et land der historie, livsstil og matkultur fortsatt setter standard internasjonalt.'
    ),
    'jm' => $countryProfile(
        'Jamaica er en karibisk øystat kjent for reggae, sterke idrettstradisjoner, tropisk natur og tydelig kulturell egenart.',
        'Kingston er hovedstad, mens Montego Bay, Spanish Town og Ocho Rios er viktige byer.',
        'Historien er preget av kolonitid, afrikansk arv, slavemotstand og utviklingen av en markant nasjonal kultur.',
        'Økonomien bygger på turisme, landbruk, musikk, tjenester og overføringer fra diasporaen.',
        'Jamaica er et parlamentarisk demokrati og konstitusjonelt monarki innenfor Commonwealth-tradisjonen.',
        'Landskapet har fjell, regnskog, elver og strender, med varmt tropisk klima.',
        'Turister trekkes til strender, Blue Mountains, reggaehistorie, fossefall og feriesteder langs kysten.',
        'Matkulturen forbindes særlig med jerk chicken, ackee and saltfish, krydret sjømat og tropiske frukter.',
        'Alt i alt er Jamaica et lite land med svært sterk kulturell gjennomslagskraft.'
    ),
    'jp' => $countryProfile(
        'Japan er en øynasjon i Øst-Asia, kjent for teknologisk styrke, høflighetskultur og balansen mellom tradisjon og modernitet.',
        'Tokyo er hovedstad, mens Osaka, Kyoto, Yokohama og Sapporo er sentrale byer.',
        'Historien favner keisertid, samuraikulturer, isolasjon, modernisering og en stor rolle i moderne asiatisk utvikling.',
        'Økonomien er sterk innen teknologi, bilindustri, elektronikk, handel og tjenester.',
        'Japan er et konstitusjonelt monarki med parlamentarisk styre og stabile institusjoner.',
        'Landet består av fjellrike øyer med skog, vulkaner og lang kyst, og klimaet varierer fra nord til sør.',
        'Turister besøker ofte Tokyo, Kyoto, Fuji, templer, varme kilder og blomstringssesongen om våren.',
        'Matkulturen er svært kjent, med sushi, ramen, risretter, sjømat og stor vekt på presentasjon og sesong.',
        'Alt i alt er Japan et land der disiplin, estetikk og høyteknologi danner et særegent helhetsbilde.'
    ),
    'kr' => $countryProfile(
        'Sør-Korea er et østasiatisk land kjent for rask modernisering, teknologi, populærkultur og sterk urban utvikling.',
        'Seoul er hovedstad, mens Busan, Incheon, Daegu og Daejeon er viktige byer.',
        'Historien rommer gamle koreanske kongedømmer, japansk kolonitid, krig og en bemerkelsesverdig økonomisk vekst etterpå.',
        'Økonomien drives av teknologi, elektronikk, skipsbygging, industri, handel og tjenester.',
        'Sør-Korea er en republikk med aktivt demokrati og stor vekt på utdanning og innovasjon.',
        'Landskapet består av fjell, kyst, øyer og tettbygde byområder, med tydelige årstider.',
        'Turister trekkes til Seoul, historiske palasser, Jeju, k-pop-relaterte opplevelser og fjellområder.',
        'Matkulturen er kjent for kimchi, grillretter, supper, ris og mye fermenterte og krydrede smaker.',
        'Alt i alt er Sør-Korea et land der teknologi, kultur og høyt tempo preger både økonomi og hverdag.'
    ),
    'lv' => $countryProfile(
        'Latvia er et baltisk land kjent for skog, kyst mot Østersjøen og en sterk blanding av nord- og østeuropeiske impulser.',
        'Riga er hovedstad, mens Daugavpils, Liepāja og Jelgava er viktige byer.',
        'Historien rommer hansatisk handel, fremmedstyre, sovjettid og ny selvstendighet etter 1991.',
        'Økonomien bygger på tjenester, logistikk, treindustri, handel og teknologi.',
        'Latvia er en parlamentarisk republikk med vestlig orientering og tydelig nasjonal gjenreisning etter sovjettiden.',
        'Landskapet er flatt og skogrikt, med innsjøer, myr og kyst, og et klima med kalde vintre og milde somre.',
        'Turister besøker gjerne gamlebyen i Riga, Jurmala, kysten og naturparker i innlandet.',
        'Matkulturen rommer rugbrød, poteter, røkt fisk, supper og tradisjonelle retter fra nordøstlige Europa.',
        'Alt i alt er Latvia et land med rolig natur, sterk historie og tydelig baltisk identitet.'
    ),
    'ma' => $countryProfile(
        'Marokko ligger i Nord-Afrika og er kjent for souker, ørken, fjell og en kultur formet av berbersk, arabisk og andalusisk arv.',
        'Rabat er hovedstad, mens Casablanca, Marrakech, Fez og Tanger er viktige byer.',
        'Historien rommer gamle dynastier, handel over Sahara, islamsk lærdom og lang kontakt med Europa.',
        'Økonomien bygger på jordbruk, turisme, handel, industri og eksport av blant annet fosfat.',
        'Marokko er et konstitusjonelt monarki med sterk historisk kontinuitet og regional betydning.',
        'Geografien spenner fra Atlanterhav og Middelhav til Atlasfjell og ørkenområder, med variert klima.',
        'Turister trekkes til Marrakech, Fez, Chefchaouen, Sahara og kystbyer som Essaouira.',
        'Matkulturen er kjent for tagine, couscous, mynte-te, grillet kjøtt og aromatiske krydder.',
        'Alt i alt er Marokko et land med sterk atmosfære, stor visuell rikdom og tydelig nordafrikansk karakter.'
    ),
    'mx' => $countryProfile(
        'Mexico er et stort nordamerikansk land kjent for urfolksarv, spansk språk, levende byer og mangfoldig natur.',
        'Mexico by er hovedstad, mens Guadalajara, Monterrey, Puebla og Tijuana er viktige byer.',
        'Historien favner maya- og aztekkulturer, spansk kolonitid, uavhengighet og sterke regionale tradisjoner.',
        'Økonomien bygger på industri, handel, olje, jordbruk, turisme og tett integrasjon med nordamerikanske markeder.',
        'Mexico er en føderal republikk med stor regional bredde og et komplekst politisk liv.',
        'Landskapet omfatter ørken, høyland, jungel, vulkaner og kyst mot både Stillehavet og Mexicogolfen.',
        'Turisme knyttes til Chichén Itzá, strender, kolonibyer, Mexico by og mange natur- og kultursteder.',
        'Maten er verdensberømt og inkluderer tacos, mole, tamales, mais, chili og et stort regionalt mangfold.',
        'Alt i alt er Mexico et land med sterk identitet, dyp historie og særdeles rik matkultur.'
    ),
    'ng' => $countryProfile(
        'Nigeria er Afrikas mest folkerike land og kjent for stor kulturell variasjon, energiressurser og sterke bysentra.',
        'Abuja er hovedstad, mens Lagos, Kano, Ibadan og Port Harcourt er blant de viktigste byene.',
        'Historien er formet av mange etniske grupper, britisk kolonitid og en etterkolonial stat med stor regional betydning.',
        'Økonomien bygger på olje og gass, handel, jordbruk, finans, teknologi og underholdning.',
        'Nigeria er en føderal republikk med et svært aktivt politisk liv og store regionale forskjeller.',
        'Landet strekker seg fra kyst og deltaområder til savanne og tørre soner i nord, med tropisk klima.',
        'Turisme er mindre utbygd enn potensialet tilsier, men landet har strender, markeder, nasjonalparker og et rikt kulturliv.',
        'Matkulturen omfatter jollof-ris, suya, peppersupper, yamretter og mange tydelige regionale smaker.',
        'Alt i alt er Nigeria et land med enorm menneskelig energi, stor markedsvekt og sterk kulturell kraft.'
    ),
    'nl' => $countryProfile(
        'Nederland er et lavtliggende vesteuropeisk land kjent for vannforvaltning, handel, sykler og åpne bymiljøer.',
        'Amsterdam er hovedstad, mens Rotterdam, Haag, Utrecht og Eindhoven er viktige byer.',
        'Historien bygger på sjøfart, handel, republikktradisjoner, koloniforbindelser og en sterk urban kultur.',
        'Økonomien er sterk innen logistikk, handel, jordbruk, teknologi, finans og kreative næringer.',
        'Nederland er et konstitusjonelt monarki med parlamentarisk styre og høy grad av institusjonell stabilitet.',
        'Geografien består av flatt landskap, kanaler, elver, poldere og kyst, med mildt maritimt klima.',
        'Turister kommer for kanalbyer, museer, tulipanområder, vindmøller og storbyliv.',
        'Matkulturen er enkel og jordnær, med ost, sjømat, stroopwafels, brødretter og sesongbaserte spesialiteter.',
        'Alt i alt er Nederland et land som kombinerer praktisk ingeniørkunst med tydelig kulturell egenart.'
    ),
    'no' => $countryProfile(
        'Norge er et nordisk land kjent for fjorder, høy levestandard, havnæringer og sterk naturtilknytning.',
        'Oslo er hovedstad, mens Bergen, Trondheim, Stavanger og Tromsø er viktige byer.',
        'Historien går fra vikingtid og unioner til moderne velferdsstat og sterk nasjonal identitet.',
        'Økonomien bygger på energi, shipping, sjømat, teknologi, industri og offentlig sektor.',
        'Norge er et konstitusjonelt monarki med parlamentarisk styre og høy grad av samfunnstillit.',
        'Geografien preges av fjell, fjorder, skog, vidde og lang kyst, med kjølig klima og store sesongforskjeller.',
        'Turister kommer for fjordene, nordlyset, fjellområder, togstrekninger og arktiske opplevelser.',
        'Matkulturen inkluderer laks, torsk, fårikål, brunost, vafler og en stadig sterkere restaurantscene.',
        'Alt i alt er Norge et land der natur, velstand og rolig samfunnsliv står sterkt side om side.'
    ),
    'pe' => $countryProfile(
        'Peru ligger på vestkysten av Sør-Amerika og er kjent for inkaarv, høyfjell, kyst og stort naturmangfold.',
        'Lima er hovedstad, mens Cusco, Arequipa og Trujillo er viktige byer.',
        'Historien favner store førkolumbiske kulturer, spansk kolonitid og en moderne stat med sterk regional identitet.',
        'Økonomien bygger på gruvedrift, jordbruk, fiskeri, turisme og tjenester.',
        'Peru er en republikk med et politisk liv som ofte preges av skiftende maktforhold og sterke regionale interesser.',
        'Landet rommer Andesfjell, Stillehavskyst og Amazonas, med store forskjeller i klima og terreng.',
        'Turister trekkes til Machu Picchu, Cusco, Lima, ørkenområder, regnskog og arkeologiske steder.',
        'Matkulturen er blant Latin-Amerikas mest profilerte, med ceviche, poteter, mais, sjømat og innslag fra flere kontinenter.',
        'Alt i alt er Peru et land med dyp historisk arv og imponerende geografisk bredde.'
    ),
    'pl' => $countryProfile(
        'Polen er et stort sentraleuropeisk land kjent for sterk historisk bevissthet, store byer og en voksende moderne økonomi.',
        'Warszawa er hovedstad, mens Kraków, Gdańsk, Wrocław og Poznań er viktige byer.',
        'Historien omfatter middelalderrike, delinger, kriger, kommunisttid og en tydelig nasjonal gjenoppbygging.',
        'Økonomien bygger på industri, teknologi, handel, tjenester og et stort hjemmemarked.',
        'Polen er en republikk med parlamentariske institusjoner og betydelig regional og politisk dynamikk.',
        'Landskapet består av sletter, skoger, innsjøer, fjell i sør og kyst mot Østersjøen.',
        'Turisme samler seg rundt gamlebyer, slott, minnestedene fra krigshistorien og fjellområdene i sør.',
        'Matkulturen omfatter pierogi, supper, kjøttretter, rugbrød og en robust sentraleuropeisk tradisjon.',
        'Alt i alt er Polen et land der historie, motstandskraft og økonomisk endring er tett vevd sammen.'
    ),
    'pt' => $countryProfile(
        'Portugal ligger ytterst mot Atlanterhavet i Sørvest-Europa og er kjent for sjøfartshistorie, mildt klima og sterke bymiljøer.',
        'Lisboa er hovedstad, mens Porto, Braga, Coimbra og Faro er viktige byer.',
        'Historien er tett knyttet til sjøfart, oppdagelsesreiser, koloniforbindelser og en tydelig iberisk kulturarv.',
        'Økonomien bygger på turisme, tjenester, industri, landbruk, havnæringer og eksport.',
        'Portugal er en republikk med parlamentarisk styre og klare bånd til både EU og den lusofone verdenen.',
        'Geografien rommer atlanterhavskyst, åser, elvedaler og varme sørregioner som Algarve.',
        'Turister besøker ofte Lisboa, Porto, Dourodalen, surfestrender og historiske småbyer.',
        'Matkulturen er kjent for bacalhau, sjømat, olivenolje, bakverk som pastel de nata og sterke vintradisjoner.',
        'Alt i alt er Portugal et land med havvendt identitet, rolig livsrytme og tydelig kulturhistorisk dybde.'
    ),
    'py' => $countryProfile(
        'Paraguay er et innlandsland i Sør-Amerika, kjent for guaraní-kultur, store elvesystemer og sterk jordbruksproduksjon.',
        'Asunción er hovedstad, mens Ciudad del Este og Encarnación er blant de viktigste byene.',
        'Historien er formet av urfolkstradisjoner, spansk kolonitid og en nasjonal identitet der både spansk og guaraní står sterkt.',
        'Økonomien bygger på jordbruk, kjøttproduksjon, vannkraft, handel og tjenester.',
        'Paraguay er en republikk med tydelig presidentmakt og stor betydning av regionale økonomiske interesser.',
        'Landskapet deles ofte mellom de frodigere områdene i øst og Chaco-regionen i vest, med varmt klima.',
        'Turisme dreier seg om Itaipú-demningen, elveområder, historiske steder og roligere byliv enn i mange naboland.',
        'Maten inkluderer chipa, sopa paraguaya, grillretter og råvarer som mais og maniok.',
        'Alt i alt er Paraguay et land med lavere profil internasjonalt, men med tydelig kultur og regional betydning.'
    ),
    'qa' => $countryProfile(
        'Qatar er en rik gulfstat på en liten halvøy, kjent for gassressurser, høy byggeaktivitet og sterk internasjonal profil.',
        'Doha er hovedstad og klart dominerende by, mens Lusail og Al Wakrah vokser i betydning.',
        'Landets historie er knyttet til perledykking, handel i Gulfen og rask modernisering gjennom energiinntekter.',
        'Økonomien bygger i stor grad på naturgass, finans, luftfart, bygg og statlige investeringer.',
        'Qatar er et monarki med sentralisert styring og tydelige langsiktige nasjonale utviklingsplaner.',
        'Landskapet er flatt og ørkenpreget, med svært varmt klima store deler av året.',
        'Turisme samler seg rundt Doha, moderne skyline, museer, ørkenutflukter og store sportsarrangementer.',
        'Matkulturen blander gulftradisjoner med internasjonale impulser, ofte med risretter, kjøtt, fisk og krydder.',
        'Alt i alt er Qatar et lite land med stor økonomisk kapasitet og markant synlighet internasjonalt.'
    ),
    'rs' => $countryProfile(
        'Serbia ligger på Balkan og er kjent for elvebyer, sterk historisk bevissthet og en blanding av sentral- og sørøsteuropeiske impulser.',
        'Beograd er hovedstad, mens Novi Sad, Niš og Kragujevac er viktige byer.',
        'Historien er preget av bysantinsk og osmansk påvirkning, jugoslavisk tid og moderne nasjonal omforming.',
        'Økonomien bygger på industri, landbruk, tjenester, energi og voksende IT-miljøer.',
        'Serbia er en republikk med aktivt politisk liv og viktig regional rolle på Vest-Balkan.',
        'Landskapet veksler mellom sletteland i nord, elvedaler og fjellområder sør i landet.',
        'Turister besøker gjerne Beograd, festningsverk, klostre, elveliv og festivalmiljøer som i Novi Sad.',
        'Matkulturen inkluderer grillretter, burek, gryter, oster og tydelige balkanske smaker.',
        'Alt i alt er Serbia et land med sterk kulturell karakter og en historie som fortsatt merkes i samfunnslivet.'
    ),
    'ru' => $countryProfile(
        'Russland er verdens største land og strekker seg over Europa og Asia, med stor historisk og geopolitisk betydning.',
        'Moskva er hovedstad, mens St. Petersburg, Kazan, Jekaterinburg og Novosibirsk er viktige byer.',
        'Historien favner tsarriker, revolusjon, sovjettid og en moderne stat med stor innflytelse i nærområdene.',
        'Økonomien bygger på energi, råvarer, industri, jordbruk, forsvar og store innenlandske markeder.',
        'Russland er en føderasjon med sterk sentralmakt og stor betydning for regional og global politikk.',
        'Geografien omfatter tundra, taiga, stepper, fjell, innsjøer og enorme avstander med mange klimasoner.',
        'Turisme knyttes ofte til Moskva, St. Petersburg, Den transsibirske jernbanen, Bajkalsjøen og historiske byer.',
        'Matkulturen omfatter supper, rugbrød, pelmeni, fisk, syltede råvarer og retter tilpasset kaldt klima.',
        'Alt i alt er Russland et land med enorm skala, tung historie og svært stor geografisk bredde.'
    ),
    'sa' => $countryProfile(
        'Saudi-Arabia dekker mesteparten av Den arabiske halvøy og er kjent for olje, hellige byer og stor regional innflytelse.',
        'Riyadh er hovedstad, mens Jeddah, Mekka, Medina og Dammam er viktige byer.',
        'Historien er nært knyttet til islams opprinnelse, stammeforbindelser og fremveksten av den moderne saudiske staten.',
        'Økonomien bygger fortsatt tungt på olje og gass, men også på industri, bygg, logistikk og diversifiseringsprosjekter.',
        'Saudi-Arabia er et monarki med sterk sentral styring og stor religiøs og politisk betydning i regionen.',
        'Landskapet er dominert av ørken, platåer og kyst mot både Rødehavet og Persiabukta, med svært varmt klima.',
        'Turisme omfatter pilegrimsreiser til Mekka og Medina samt økende satsing på historiske steder som Al-Ula.',
        'Matkulturen byr på retter som kabsa, grillet kjøtt, ris, dadler og arabiske krydderblandinger.',
        'Alt i alt er Saudi-Arabia et land med stor energityngde, religiøs betydning og rask samfunnsendring.'
    ),
    'se' => $countryProfile(
        'Sverige er et nordisk land kjent for velferdsmodell, industri, design og store skog- og innsjøområder.',
        'Stockholm er hovedstad, mens Göteborg, Malmö, Uppsala og Lund er viktige byer.',
        'Historien går fra kongedømme og stormaktstid til moderne sosialdemokratisk samfunnsmodell og sterk eksportøkonomi.',
        'Økonomien bygger på industri, teknologi, tjenester, grønn omstilling, skogbruk og handel.',
        'Sverige er et konstitusjonelt monarki med parlamentarisk styre og høy grad av institusjonell stabilitet.',
        'Landet har skoger, innsjøer, skjærgård, fjell i nord og kjølig klima med store sesongvariasjoner.',
        'Turisme knyttes til Stockholm, Lappland, skjærgården, kulturbyer og natur opp mot polarsirkelen.',
        'Matkulturen omfatter kjøttboller, fisk, poteter, knäckebröd, kanelboller og et moderne nordisk kjøkken.',
        'Alt i alt er Sverige et land der orden, natur og innovasjon utgjør en tydelig helhet.'
    ),
    'tn' => $countryProfile(
        'Tunisia ligger i Nord-Afrika og er kjent for middelhavskyst, gammel historie og en kultur formet av mange sivilisasjoner.',
        'Tunis er hovedstad, mens Sfax, Sousse og Kairouan er viktige byer.',
        'Historien favner Kartago, romersk tid, islamske dynastier, osmansk styre og fransk kolonitid.',
        'Økonomien bygger på turisme, jordbruk, industri, tekstiler og handel.',
        'Tunisia er en republikk med moderne institusjoner, men også et politisk liv preget av nyere omveltninger.',
        'Landet har middelhavskyst i nord og ørkenpregede områder mot sør, med varmt og tørt klima mange steder.',
        'Turister besøker ruiner, kystbyer, markedsgater, ørkenområder og historiske medinaer.',
        'Matkulturen er krydret og bygger ofte på couscous, fisk, lam, oliven og harissa.',
        'Alt i alt er Tunisia et land der Middelhavet og Nord-Afrika møtes i både historie og hverdagsliv.'
    ),
    'tr' => $countryProfile(
        'Tyrkia ligger mellom Europa og Asia og er kjent for stor historisk dybde, sterke byer og strategisk beliggenhet.',
        'Ankara er hovedstad, mens Istanbul, Izmir, Bursa og Antalya er viktige byer.',
        'Historien favner oldtid, bysantinsk og osmansk tid samt etableringen av den moderne republikken.',
        'Økonomien bygger på industri, handel, jordbruk, turisme, transport og tjenester.',
        'Tyrkia er en republikk med sentral rolle i regional politikk og tydelig offentlig debatt om retning og identitet.',
        'Landskapet rommer høysletter, fjell, stepper, stor kystlinje og klima som varierer mellom regionene.',
        'Turister trekkes til Istanbul, Kappadokia, Egeerkysten, oldtidsruiner og badebyer.',
        'Matkulturen er kjent for kebab, meze, brød, yoghurtretter, søtsaker og stor regional variasjon.',
        'Alt i alt er Tyrkia et land der historie, handel og geografi gir det en særegen plass mellom flere verdener.'
    ),
    'ua' => $countryProfile(
        'Ukraina er et stort land i Øst-Europa, kjent for fruktbare sletter, sterke kulturtradisjoner og viktige historiske byer.',
        'Kyiv er hovedstad, mens Lviv, Odesa, Kharkiv og Dnipro er blant de viktigste byene.',
        'Historien knytter landet til Kyivriket, kosakktradisjoner, imperier og en moderne nasjonal identitet med sterk selvbevissthet.',
        'Økonomien bygger på jordbruk, industri, energi, tjenester og et voksende teknologimiljø.',
        'Ukraina er en republikk med et politisk liv sterkt preget av spørsmål om suverenitet, reform og europeisk orientering.',
        'Geografien omfatter stepper, elver, fjell i vest og kyst mot Svartehavet, med kontinentalt klima.',
        'Turisme har tradisjonelt samlet seg rundt Kyiv, Lviv, kystbyer og Karpatene, i tillegg til historiske og religiøse steder.',
        'Matkulturen omfatter borsjtsj, varenyky, brød, gryteretter og råvarer fra både jordbruksland og skogsområder.',
        'Alt i alt er Ukraina et land med sterk historisk tyngde, rik matkultur og tydelig nasjonal utholdenhet.'
    ),
    'us' => $countryProfile(
        'USA er et føderalt land i Nord-Amerika kjent for stor økonomisk makt, kulturell innflytelse og stor geografisk variasjon.',
        'Washington, D.C. er hovedstad, mens New York, Los Angeles, Chicago og Houston er blant de viktigste byene.',
        'Historien rommer urfolkssamfunn, kolonitid, uavhengighet, borgerkrig, innvandring og global stormaktsrolle.',
        'Økonomien er verdens største og bygger på teknologi, finans, industri, energi, landbruk og tjenester.',
        'USA er en føderal republikk med maktfordeling mellom delstater og føderale institusjoner.',
        'Geografien spenner fra arktiske områder i Alaska til ørken, fjell, store sletter og lange kystlinjer.',
        'Turisme knyttes til storbyer, nasjonalparker, historiske steder, underholdning og svært ulike regionale opplevelser.',
        'Matkulturen er sammensatt og preget av innvandring, men inkluderer alt fra barbecue og burgere til lokale spesialiteter og internasjonale fusion-kjøkken.',
        'Alt i alt er USA et land med stor skala, høy påvirkningskraft og et svært mangfoldig samfunn.'
    ),
    'uy' => $countryProfile(
        'Uruguay er et lite sør-amerikansk land kjent for stabile institusjoner, kystliv og sterke fotballtradisjoner.',
        'Montevideo er hovedstad, mens Punta del Este, Salto og Paysandú er viktige steder.',
        'Historien er preget av spansk og portugisisk påvirkning, uavhengighetskamp og en tidlig utvikling av velferdsinstitusjoner.',
        'Økonomien bygger på jordbruk, kjøttproduksjon, tjenester, teknologi og turisme.',
        'Uruguay er en republikk med sterke demokratiske tradisjoner og relativt stabile politiske forhold.',
        'Landskapet består mest av bølgende sletteland, elver og kyst mot Atlanterhavet, med mildt klima.',
        'Turister besøker ofte Montevideo, strandsteder, vingårder og rolige landskapsområder.',
        'Matkulturen forbindes særlig med asado, mate, sjømat og enkle retter basert på gode råvarer.',
        'Alt i alt er Uruguay et land med rolig tempo, tydelig institusjonell styrke og sterk regional egenart.'
    ),
    'za' => $countryProfile(
        'Sør-Afrika er et mangfoldig land i den sørlige delen av Afrika, kjent for flere språk, dramatisk natur og en kompleks historie.',
        'Pretoria er administrativ hovedstad, mens Cape Town og Johannesburg er blant de viktigste byene sammen med Durban.',
        'Historien omfatter urfolkssamfunn, kolonitid, apartheid og en krevende overgang til demokratisk styre.',
        'Økonomien bygger på gruvedrift, finans, industri, jordbruk, turisme og tjenester.',
        'Sør-Afrika er en republikk med sterke demokratiske institusjoner, men også store sosiale og økonomiske forskjeller.',
        'Geografien spenner fra savanne og vinland til fjell, kyst og tørre områder, med varierte klima.',
        'Turister trekkes til Cape Town, Kruger nasjonalpark, Garden Route og vinregionene.',
        'Matkulturen rommer braai, bobotie, sjømat, vilt og mange smaker fra ulike folkegrupper.',
        'Alt i alt er Sør-Afrika et land med sterk symbolkraft, rikt naturmangfold og stor menneskelig variasjon.'
    ),
    'ir' => $countryProfile(
        'Iran ligger i Vest-Asia og er kjent for persisk historie, poesi, storbykultur og lange statsdannelser.',
        'Teheran er hovedstad, mens Isfahan, Shiraz, Tabriz og Mashhad er viktige byer.',
        'Historien favner oldpersiske riker, islamsk lærdom, handel langs gamle ruter og en sterk kulturell kontinuitet.',
        'Økonomien bygger på energi, industri, jordbruk, handel og et stort hjemmemarked.',
        'Iran er en islamsk republikk med komplekse maktstrukturer og betydelig regional innflytelse.',
        'Landet består av høysletter, fjellkjeder, ørken og kyst mot både Persiabukta og Kaspihavet, med store klimaforskjeller.',
        'Turister og kulturinteresserte trekkes til Isfahan, Shiraz, Persepolis, moskeer, basarer og historiske landskap.',
        'Matkulturen er kjent for risretter, kebab, urter, nøtter, gryter og nøye balanserte smaker.',
        'Alt i alt er Iran et land med dyp sivilisasjonshistorie, tydelig kulturell egenart og stor regional tyngde.'
    ),
];
