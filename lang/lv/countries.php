<?php

$full = static function (
    string $intro,
    string $capital,
    string $history,
    string $economy,
    string $government,
    string $geography,
    string $tourism,
    string $cuisine,
    string $conclusion
): string {
    return implode("\n", [
        "<p>{$intro}</p>",
        '<p class="mt-1"><b>Galvaspilsēta un lielākās pilsētas:</b></p>',
        "<p>{$capital}</p>",
        '<p class="mt-1"><b>Vēsture un kultūra:</b></p>',
        "<p>{$history}</p>",
        '<p class="mt-1"><b>Ekonomika:</b></p>',
        "<p>{$economy}</p>",
        '<p class="mt-1"><b>Valdība un politika:</b></p>',
        "<p>{$government}</p>",
        '<p class="mt-1"><b>Ģeogrāfija un klimats:</b></p>',
        "<p>{$geography}</p>",
        '<p class="mt-1"><b>Tūrisms un ievērojamākās vietas:</b></p>',
        "<p>{$tourism}</p>",
        '<p class="mt-1"><b>Virtuve:</b></p>',
        "<p>{$cuisine}</p>",
        "<p>{$conclusion}</p>",
    ]);
};

$withoutCuisine = static function (
    string $intro,
    string $capital,
    string $history,
    string $economy,
    string $government,
    string $geography,
    string $tourism,
    string $conclusion
): string {
    return implode("\n", [
        "<p>{$intro}</p>",
        '<p class="mt-1"><b>Galvaspilsēta un lielākās pilsētas:</b></p>',
        "<p>{$capital}</p>",
        '<p class="mt-1"><b>Vēsture un kultūra:</b></p>',
        "<p>{$history}</p>",
        '<p class="mt-1"><b>Ekonomika:</b></p>',
        "<p>{$economy}</p>",
        '<p class="mt-1"><b>Valdība un politika:</b></p>',
        "<p>{$government}</p>",
        '<p class="mt-1"><b>Ģeogrāfija un klimats:</b></p>',
        "<p>{$geography}</p>",
        '<p class="mt-1"><b>Tūrisms un ievērojamākās vietas:</b></p>',
        "<p>{$tourism}</p>",
        "<p>{$conclusion}</p>",
    ]);
};

$inlineConclusion = static function (
    string $intro,
    string $capital,
    string $history,
    string $economy,
    string $government,
    string $geography,
    string $tourism,
    string $cuisine,
    string $conclusion
): string {
    return implode("\n", [
        "<p>{$intro}</p>",
        '<p class="mt-1"><b>Galvaspilsēta un lielākās pilsētas:</b></p>',
        "<p>{$capital}</p>",
        '<p class="mt-1"><b>Vēsture un kultūra:</b></p>',
        "<p>{$history}</p>",
        '<p class="mt-1"><b>Ekonomika:</b></p>',
        "<p>{$economy}</p>",
        '<p class="mt-1"><b>Valdība un politika:</b></p>',
        "<p>{$government}</p>",
        '<p class="mt-1"><b>Ģeogrāfija un klimats:</b></p>',
        "<p>{$geography}</p>",
        '<p class="mt-1"><b>Tūrisms un ievērojamākās vietas:</b></p>',
        "<p>{$tourism}</p>",
        '<p class="mt-1"><b>Virtuve:</b></p>',
        "<p>{$cuisine} {$conclusion}</p>",
    ]);
};

$noConclusion = static function (
    string $intro,
    string $capital,
    string $history,
    string $economy,
    string $government,
    string $geography,
    string $tourism,
    string $cuisine
): string {
    return implode("\n", [
        "<p>{$intro}</p>",
        '<p class="mt-1"><b>Galvaspilsēta un lielākās pilsētas:</b></p>',
        "<p>{$capital}</p>",
        '<p class="mt-1"><b>Vēsture un kultūra:</b></p>',
        "<p>{$history}</p>",
        '<p class="mt-1"><b>Ekonomika:</b></p>',
        "<p>{$economy}</p>",
        '<p class="mt-1"><b>Valdība un politika:</b></p>',
        "<p>{$government}</p>",
        '<p class="mt-1"><b>Ģeogrāfija un klimats:</b></p>',
        "<p>{$geography}</p>",
        '<p class="mt-1"><b>Tūrisms un ievērojamākās vietas:</b></p>',
        "<p>{$tourism}</p>",
        '<p class="mt-1"><b>Virtuve:</b></p>',
        "<p>{$cuisine}</p>",
    ]);
};

$simple = static function (
    string $intro,
    string $history,
    string $secondaryHeading,
    string $secondaryText,
    string $conclusion
): string {
    return implode("\n", [
        "<p>{$intro}</p>",
        '<p class="mt-1"><b>Vēsture un kultūra:</b></p>',
        "<p>{$history}</p>",
        "<p class=\"mt-1\"><b>{$secondaryHeading}</b></p>",
        "<p>{$secondaryText}</p>",
        "<p>{$conclusion}</p>",
    ]);
};

return [
    'ae' => $full(
        'Apvienotie Arābu Emirāti ir septiņu emirātu federācija Arābijas pussalas dienvidaustrumos, kur tuksneša ainavas savienojas ar ļoti modernām pilsētām.',
        'Abū Dabī ir galvaspilsēta, bet Dubaija ir galvenais ekonomikas un tūrisma centrs; nozīmīgas ir arī Šārdža, Adžmāna un pārējie emirāti.',
        'Kopš 1971. gada AAE no zvejnieku un pērļu nirēju apmetnēm kļuvuši par modernu valsti, kas apvieno islāma tradīcijas ar starptautisku atvērtību.',
        'Nafta un gāze joprojām ir svarīgas, taču lielu lomu spēlē arī tirdzniecība, aviācija, tūrisms un nekustamais īpašums.',
        'AAE ir federāla mantota monarhija, kurā emirātu valdnieki kopīgi nosaka politisko kursu.',
        'Valsti raksturo tuksnesis, piekraste un karsts, sauss klimats.',
        'Burj Khalifa, Palm Jumeirah un lieli kūrorti padara AAE par pasaules mēroga ceļojumu galamērķi.',
        'Emirātu virtuve apvieno arābu tradīcijas ar starptautiskām ietekmēm, izmantojot rīsus, garšvielas, zivis un gaļu.',
        'AAE apvieno strauju attīstību, spēcīgus simbolus un mūsdienīgu reģiona tradīciju versiju.'
    ),
    'ar' => $full(
        'Argentīna atrodas Dienvidamerikas dienvidos un ir pazīstama ar Andiem, Pampām un plašajām Patagonijas ainavām.',
        'Buenosairesa ir galvaspilsēta un kultūras centrs; nozīmīgas ir arī Kordova, Rosario un Mendosa.',
        'Eiropas imigrācija, īpaši no Spānijas un Itālijas, spēcīgi ietekmēja valodu, paražas un mākslu; neatkarība tika pasludināta 1816. gadā.',
        'Ekonomikas pamatā ir lauksaimniecība, izejvielas un spēcīga liellopu gaļas, vīna un graudaugu ražošana.',
        'Argentīna ir federatīva republika ar pārstāvniecisku demokrātiju un mainīgu politisko attīstību.',
        'No subtropu ziemeļiem līdz vēsajiem dienvidiem valstī ir ļoti dažādas klimata un ainavu zonas.',
        'Iguasu, Patagonija un Buenosairesas kultūras vide piesaista daudz ceļotāju.',
        'Raksturīgi ir asado, liellopu gaļas ēdieni un vīni ar izteiktu Eiropas kulināro ietekmi.',
        'Argentīna apvieno grandiozu dabu, spēcīgu pilsētu kultūru un dziļi iesakņojušos futbola kaislību.'
    ),
    'ro' => $full(
        'Rumānija atrodas starp Centrāleiropu, Austrumeiropu un Dienvidaustrumeiropu pie Melnās jūras un apvieno daudzveidīgas vēsturiskas ietekmes.',
        'Bukareste ir galvaspilsēta un lielākā pilsēta; svarīgas ir arī Kluža-Napoka, Timišoara un Jasi.',
        'Valsts veidojusies dažādu impēriju ietekmē, sākot ar romiešu laiku un beidzot ar osmaņu un habsburgu mantojumu.',
        'Pēc iestāšanās ES 2007. gadā ekonomika augusi, īpaši rūpniecības, IT, telekomunikāciju un eksporta jomās.',
        'Rumānija ir daļēji prezidentāla republika, kur prezidents un premjerministrs dala izpildvaru.',
        'Karpati, pauguraines un Donavas delta veido daudzveidīgu ainavu ar mēreni kontinentālu klimatu.',
        'Branas pils, Maramurešas baznīcas un Bukovinas klosteri ir starp zināmākajiem galamērķiem.',
        'Sarmale, mamaliga un cozonac raksturo sātīgu virtuvi ar reģionālu dažādību.',
        'Rumānija apvieno vēsturisku dziļumu, kultūras daudzveidību un mūsdienu attīstību.'
    ),
    'au' => $full(
        'Austrālija ir salu kontinents ar unikālu dzīvnieku pasauli, ļoti atšķirīgām ainavām un izteikti daudzveidīgu sabiedrību.',
        'Kanbera ir galvaspilsēta, bet Sidneja, Melburna un Brisbena ir galvenie kultūras un biznesa centri.',
        'Austrālijas vēsture apvieno pamatiedzīvotāju mantojumu ar Eiropas kolonizāciju un vēlākām imigrācijas plūsmām.',
        'Kalnrūpniecība, lauksaimniecība, tehnoloģijas un tūrisms balsta stabilu un pārtikušu ekonomiku.',
        'Austrālija ir parlamentāra demokrātija ar stipru tiesiskuma un sociālā līdzsvara tradīciju.',
        'No sausā iekšzemes reģiona līdz lietusmežiem un piekrastēm valsts piedāvā plašu klimata un ainavu spektru.',
        'Lielais Barjerrifs, nacionālie parki un piekrastes pilsētas ir galvenās apskates vietas.',
        'Virtuvē vietējie produkti savienojas ar Āzijas, Eiropas un pamatiedzīvotāju ietekmēm.',
        'Austrālija simbolizē dabas iespaidīgumu, atvērtu sabiedrību un tradīciju un inovāciju sajaukumu.'
    ),
    'be' => $full(
        'Beļģija ir neliela, bet ietekmīga Rietumeiropas valsts ar vēsturiskām pilsētām un lielu kultūras daudzveidību.',
        'Brisele ir galvaspilsēta un starptautisks centrs; Brige, Gente un Antverpene papildina valsts tēlu.',
        'Franču, nīderlandiešu un reģionālās tradīcijas būtiski ietekmējušas valodu, mākslu un ikdienu.',
        'Pakalpojumi, rūpniecība un tirdzniecība veido cieši savienotu un attīstītu ekonomiku.',
        'Beļģija ir federāla konstitucionāla monarhija ar spēcīgu reģionālo autonomiju.',
        'Valstij ir mērens klimats, vēsturiskas pilsētas un daudzveidīga kultūrainava.',
        'Viduslaiku vecpilsētas, muzeji un kulinārie akcenti piesaista apmeklētājus no visas pasaules.',
        'Beļģijas šokolāde, vafeles un alus ir starptautiski pazīstami simboli.',
        'Beļģija apvieno vēsturisku šarmu ar modernu politiku un svarīgu vietu Eiropas centrā.'
    ),
    'bg' => $full(
        'Bulgārija ir Balkānu valsts ar senu vēsturi un trāķu, grieķu, romiešu un osmaņu laikmeta ietekmēm.',
        'Sofija ir galvaspilsēta un lielākā pilsēta; Plovdiva un Varna atspoguļo valsts kultūras dažādību.',
        'Tautas mūzika, dejas, pareizticīgās tradīcijas un bagātais mantojums veido Bulgārijas kultūras identitāti.',
        'IT, rūpniecība un lauksaimniecība kļūst arvien svarīgākas, ko pavada pakāpeniskas reformas.',
        'Bulgārija ir parlamentāra republika un cieši saistīta ar Eiropas integrāciju.',
        'Kalni, meži un Melnās jūras piekraste rada daudzveidīgu ainavu ar skaidri izteiktiem gadalaikiem.',
        'Senās vietas, vēsturiskās pilsētas un dabas objekti padara valsti pievilcīgu ceļotājiem.',
        'Banica, šopsku salāti un citi sātīgi ēdieni raksturo bulgāru virtuvi.',
        'Bulgārija apvieno dziļu vēsturisko mantojumu ar skaidru modernizācijas kursu.'
    ),
    'br' => $full(
        'Brazīlija ir lielākā Dienvidamerikas valsts, kas izceļas ar milzīgu kultūras daudzveidību, lielpilsētām un iespaidīgu dabu.',
        'Riodežaneiro, Sanpaulu un Salvadora ir starp svarīgākajiem pilsētu centriem valstī.',
        'No Portugāles kolonijas Brazīlija kļuva par federatīvu republiku, kuras kultūrā savijas pamatiedzīvotāju, afrikāņu un Eiropas ietekmes.',
        'Lauksaimniecība, kalnrūpniecība, rūpniecība un pakalpojumi balsta vienu no lielākajām reģiona ekonomikām.',
        'Brazīlija ir federāla demokrātiska valsts ar sarežģītu sociālo un politisko struktūru.',
        'Amazones lietusmeži, purvāji un garā piekraste rada ļoti atšķirīgas dabas un klimata zonas.',
        'Kristus Pestītāja statuja, Iguasu ūdenskritumi un karnevāls padara Brazīliju pasaulslavenu.',
        'Feijoada, churrasco un daudzas reģionālās specialitātes raksturo Brazīlijas virtuvi.',
        'Brazīlija simbolizē kontrastus, dzīvesprieku un spēcīgu kultūras ietekmi.'
    ),
    'ca' => $full(
        'Kanāda ir ļoti plaša valsts ar iespaidīgām dabas ainavām, daudzveidīgu sabiedrību un stabilu demokrātiju.',
        'Otava ir galvaspilsēta, bet Toronto, Vankūvera un Monreāla ir svarīgi kultūras un ekonomikas centri.',
        'Pamatiedzīvotāju mantojums un britu un franču ietekmes būtiski veidojušas Kanādas vēsturi un identitāti.',
        'Dabas resursi, tehnoloģijas un pakalpojumi balsta vienu no attīstītākajām ekonomikām pasaulē.',
        'Kanāda ir parlamentāra demokrātija ar spēcīgu tiesiskuma un ilgtspējas uzsvaru.',
        'Kalni, meži, ezeri un lieli klimata kontrasti raksturo valsti no okeāna līdz okeānam.',
        'Niagāra, Banfas nacionālais parks un daudzi festivāli piesaista miljoniem apmeklētāju.',
        'Kanādas virtuve apvieno vietējās tradīcijas ar daudzu imigrantu kopienu ietekmēm.',
        'Kanāda simbolizē dabas plašumu, sabiedrisku atvērtību un augstu dzīves kvalitāti.'
    ),
    'ch' => $full(
        'Šveice atrodas Eiropas centrā un ir pazīstama ar Alpiem, augstu dzīves līmeni un politisko stabilitāti.',
        'Berne ir galvaspilsēta, savukārt Cīrihe un Ženēva ir nozīmīgi finanšu, diplomātijas un kultūras centri.',
        'Tiešā demokrātija un vācu, franču, itāļu un retoromāņu kultūru līdzāspastāvēšana ir būtiska valsts identitātes daļa.',
        'Precīzijas rūpniecība, farmācija, bankas un augstās tehnoloģijas uztur ļoti spēcīgu ekonomiku.',
        'Šveice ir federāla republika ar izteikti uz konsensu balstītu politiku.',
        'Alpi, ezeri un pauguraines veido ainavu, bet klimats dažādos reģionos stipri atšķiras.',
        'Matterhorns, Ženēvas ezers un vēsturiskās pilsētas padara Šveici īpaši pievilcīgu tūristiem.',
        'Fondī, raklete un šokolāde ir starp pazīstamākajiem Šveices virtuves simboliem.',
        'Šveice apvieno dabu, labklājību un politisku uzticamību ļoti raksturīgā veidā.'
    ),
    'ci' => $full(
        'Kotdivuāra ir Rietumāfrikas valsts ar bagātu kultūras daudzveidību un augošu ekonomisko nozīmi.',
        'Jamuskukro ir politiskā galvaspilsēta, bet Abidžana ir lielākais ekonomiskais un kultūras centrs.',
        'Daudzas etniskās grupas un koloniālā pagātne ir ietekmējušas mūziku, mākslu, svētkus un sabiedrisko dzīvi.',
        'Ekonomikas pamats ir lauksaimniecība, īpaši kakao, kafija un palmu eļļa, bet pieaug arī rūpniecība.',
        'Valsts strādā pie politiskās stabilitātes un ekonomikas dažādošanas.',
        'Piekrastes līdzenumi, meži un savannas veido ainavu tropiskā klimatā.',
        'Tirgi, festivāli un vēsturiskas vietas ļauj iepazīt valsts daudzveidīgo kultūru.',
        'Attieke un kedjenou ir starp pazīstamākajiem Kotdivuāras ēdieniem.',
        'Kotdivuāra apvieno kultūras dzīvīgumu ar ekonomiska izrāviena potenciālu.'
    ),
    'cl' => $full(
        'Čīle ir gara un šaura valsts Dienvidamerikas rietumos, kas stiepjas no Atakamas tuksneša līdz Patagonijai.',
        'Santjago ir politiskais un ekonomiskais centrs, bet citi reģioni izceļas ar savām dabas un kultūras īpašībām.',
        'Neatkarības cīņas, modernizācija un pamatiedzīvotāju un Eiropas tradīciju sajaukums veidojuši valsts identitāti.',
        'Kalnrūpniecība, lauksaimniecība, zvejniecība, pakalpojumi un vīna nozare balsta spēcīgu ekonomiku.',
        'Čīle ir demokrātiska republika, kas turpina stiprināt savas institūcijas un sociālo attīstību.',
        'No galējas sausuma zonas līdz ledājiem valstī ir neparasti daudzveidīgas klimata un ainavu formas.',
        'Nacionālie parki, koloniālā arhitektūra un vīna reģioni ir starp nozīmīgākajiem galamērķiem.',
        'Čīles virtuve balstās uz zivīm, gaļu un vietējiem produktiem no ļoti atšķirīgām ainavām.',
        'Čīle apvieno ģeogrāfiskus ekstrēmus ar politisku un kultūras savdabību.'
    ),
    'cm' => $full(
        'Kamerūnu bieži dēvē par Āfriku miniatūrā, jo tā ir ļoti daudzveidīga gan kultūras, gan ģeogrāfijas ziņā.',
        'Jaunde ir galvaspilsēta, bet Duala ir valsts ekonomiskais centrs.',
        'Dažādas kultūras un koloniālās ietekmes būtiski veidojušas valodu, paražas, mūziku un mākslu.',
        'Lauksaimniecība, nafta un izejvielas joprojām ir svarīgas, vienlaikus pakāpeniski notiek modernizācija un industrializācija.',
        'Kamerūna cenšas stiprināt valsts stabilitāti un ekonomisko attīstību, neraugoties uz strukturālām grūtībām.',
        'Lietusmeži, vulkāni, savannas un piekrastes zonas atrodas blakus tropiska klimata apstākļos.',
        'Svētki, mūzika un tradicionālais apģērbs skaidri parāda valsts kultūras bagātību.',
        'Virtuve dažādos reģionos atšķiras un plaši izmanto vietējos produktus un garšvielas.',
        'Kamerūna spilgti atspoguļo Centrālāfrikas dabas un kultūras daudzveidību.'
    ),
    'cn' => $full(
        'Ķīna ir ļoti liela un sena Austrumāzijas valsts ar milzīgu ietekmi uz pasaules vēsturi, kultūru un ekonomiku.',
        'Pekina ir politiskais centrs, bet Šanhaja un Šeņdžeņa simbolizē mūsdienu pilsētu attīstību un ekonomisko jaudu.',
        'Filozofija, zinātne, māksla un izgudrojumi, piemēram, papīrs un druka, padarījuši Ķīnu vēsturiski īpaši nozīmīgu.',
        'Dziļas reformas ir pārvērtušas Ķīnu par vienu no pasaules galvenajām rūpniecības un tehnoloģiju lielvarām.',
        'Ķīna ir vienpartijas valsts, kur politiskā stabilitāte cieši saistīta ar ekonomisko attīstību.',
        'Kalni, tuksneši, upju ielejas un daudzas klimata zonas padara valsts ģeogrāfiju ļoti daudzveidīgu.',
        'Lielais Ķīnas mūris, tempļi, vēsturiskās pilsētas un modernās metropoles piesaista daudz apmeklētāju.',
        'Ķīnas virtuve ir ļoti reģionāla un visā pasaulē pazīstama ar savu daudzveidību.',
        'Ķīna apvieno tūkstošgadīgu civilizāciju ar ļoti strauju modernizāciju.'
    ),
    'co' => $full(
        'Kolumbija atrodas Dienvidamerikas ziemeļrietumos un apvieno Andus, tropu mežus un Karību jūras piekrasti.',
        'Bogota ir galvaspilsēta, bet Medeljina un Kali simbolizē pilsētu dinamiku un kultūras radošumu.',
        'Pamatiedzīvotāju mantojums, Spānijas koloniālais laiks un mūsdienu kultūra veido Kolumbijas identitāti.',
        'Rūpniecība, pakalpojumi, tūrisms un kafijas eksports būtiski veicina valsts izaugsmi.',
        'Kolumbija ir demokrātiska republika, kas turpina reformas un sociālo attīstību.',
        'Kalni, zemienes un piekrastes rada izcilu klimata un ekosistēmu daudzveidību.',
        'Vēsturiskie rajoni, kafijas reģioni un dabas objekti ir starp galvenajām apskates vietām.',
        'Virtuve dažādos reģionos atšķiras un balstās uz vietējiem produktiem un sātīgiem ēdieniem.',
        'Kolumbija simbolizē kultūras dzīvīgumu, dabas bagātību un ievērojamas pārmaiņas.'
    ),
    'cz' => $full(
        'Čehija ir Centrāleiropas valsts ar labi saglabātu vēsturisko arhitektūru un dzīvu mūsdienu kultūru.',
        'Prāga ir pasaulslavena galvaspilsēta, bet Brno un Ostrava papildina valsts pilsētainavu.',
        'Bohēmijas tradīcijas, Eiropas ietekmes un stipra mūzikas, literatūras un mākslas kultūra veido valsts raksturu.',
        'Rūpniecība, tehnoloģijas un pakalpojumi veido stabilu, uz eksportu vērstu ekonomiku.',
        'Čehija ir stabila parlamentāra republika ar skaidru eiropisku orientāciju.',
        'Pauguraines, upju ielejas un meži apvienojas ar mērenu klimatu un četriem gadalaikiem.',
        'Pilis, vecpilsētas un festivāli padara valsti par pievilcīgu tūrisma galamērķi.',
        'Sātīgi ēdieni, klimpas, gulašs un alus ir nozīmīga čehu virtuves daļa.',
        'Čehija apvieno vēsturisko mantojumu ar mūsdienīgu ekonomisko un kultūras dinamiku.'
    ),
    'de' => $full(
        'Vācija ir viena no vadošajām Eiropas valstīm ar spēcīgu vēsturisko mantojumu, industriālo jaudu un plašu kultūras ietekmi.',
        'Berlīne ir galvaspilsēta; Minhene, Frankfurte un Hamburga ir svarīgi ekonomikas un kultūras centri.',
        'No impērijas un sadalījuma līdz atkalapvienošanai Vācija piedzīvojusi sarežģītu un nozīmīgu vēsturi.',
        'Tās ekonomika ir viena no lielākajām pasaulē, īpaši spēcīga rūpniecībā, mašīnbūvē, tehnoloģijās un eksportā.',
        'Vācija ir federāla parlamentāra republika un nozīmīgs Eiropas Savienības dalībnieks.',
        'Valstī ir piekraste, viduskalni, upju ielejas un mērens klimats.',
        'Brandenburgas vārti, Neišvānšteina pils un daudzi muzeji un svētki piesaista apmeklētājus.',
        'Kliņģeri, desas, alus un daudzas reģionālās specialitātes raksturo vācu virtuvi.',
        'Vācija apvieno tehnoloģisku spēku ar kultūras dziļumu un politisku stabilitāti.'
    ),
    'dk' => $full(
        'Dānija ir Skandināvijas valsts ar augstu dzīves kvalitāti, jūrniecisku raksturu un izteiktu dizaina kultūru.',
        'Kopenhāgena ir galvaspilsēta; citas pilsētas un salas papildina līdzsvarotu pilsētu un lauku vidi.',
        'No vikingu laika līdz mūsdienām Dānijas tradīcijas joprojām ir redzamas kultūrā, ikdienā un dizainā.',
        'Rūpniecība, atjaunojamā enerģija un pakalpojumi nodrošina spēcīgu labklājības ekonomiku.',
        'Dānija ir konstitucionāla monarhija ar stipru demokrātisku un sociālu tradīciju.',
        'Plakanas piekrastes, salas un jūras klimats veido valsts ainavu.',
        'Kopenhāgenas vēsturiskais centrs, piejūras pilsētas un muzeji ir galvenie apskates objekti.',
        'Smorrebrod un uz kvalitāti un vietējiem produktiem balstīta virtuve ir raksturīga Dānijai.',
        'Dānija simbolizē sociālu stabilitāti, dizaina spēku un ciešu saikni ar jūru.'
    ),
    'dz' => $withoutCuisine(
        'Alžīrija ir lielākā Āfrikas valsts pēc platības un apvieno Vidusjūras piekrasti, augstienes un Sahāru.',
        'Alžīra ir politiskais un kultūras centrs; Orāna un Konstantīna ir starp svarīgākajām pilsētām.',
        'Berberu, arābu un franču ietekmes būtiski veidojušas valsts vēsturi, arhitektūru un kultūras izpausmes.',
        'Nafta un dabasgāze dominē ekonomikā, lai gan vienlaikus tiek mēģināts to dažādot.',
        'Alžīrija ir republika ar postkoloniālu pieredzi un turpina sociālās un ekonomiskās reformas.',
        'Tuksnesis, kalni un piekraste rada izteiktus kontrastus pārsvarā sausā klimatā.',
        'Romiešu drupas, tradicionālie tirgi un plašās dabas teritorijas piedāvā spilgtus iespaidus ceļotājiem.',
        'Alžīrija izceļas ar lieliem dabas kontrastiem un dziļi iesakņotu vēsturisko mantojumu.'
    ),
    'ec' => $withoutCuisine(
        'Ekvadora atrodas uz ekvatora Dienvidamerikā un nelielā teritorijā apvieno Andus, Amazoni un Klusā okeāna piekrasti.',
        'Kito ir galvaspilsēta ar spēcīgu koloniālo mantojumu, bet Gvajakila ir galvenais ekonomikas centrs.',
        'Pamatiedzīvotāju tradīcijas, pirmskoloniālās kultūras un Spānijas koloniālais laikmets veido valsts identitāti.',
        'Lauksaimniecība, nafta un tūrisms, īpaši Galapagu salu dēļ, ir galvenie ekonomikas balsti.',
        'Ekvadora ir demokrātiska republika, kas vienlaikus risina nevienlīdzības un vides aizsardzības jautājumus.',
        'Kalni, lietusmeži un piekrastes reģioni rada ļoti atšķirīgas klimata zonas.',
        'Galapagi, koloniālās vecpilsētas un vulkāniskās ainavas ir starp pazīstamākajām apskates vietām.',
        'Ekvadora piesaista ar blīvu dabas daudzveidību un spēcīgu kultūras mantojumu.'
    ),
    'eg' => $withoutCuisine(
        'Ēģipte atrodas starp Ziemeļāfriku un Tuvajiem Austrumiem un ir viena no vēsturiski nozīmīgākajām civilizācijām pasaulē.',
        'Kaira ir dzīvīgā galvaspilsēta; Aleksandrija un Luksora ir citi svarīgi vēstures centri.',
        'Piramīdas, tempļi un Nīlas civilizācija apliecina ļoti senu un joprojām ietekmīgu mantojumu.',
        'Tūrisms, lauksaimniecība un rūpniecība ir svarīgi Ēģiptes ekonomikas balsti.',
        'Ēģipte ir republika, kas līdzsvaro vēsturisko svaru, reformu vajadzību un mūsdienu pārvaldību.',
        'Nīla, plašie tuksneši un Vidusjūras piekraste nosaka ģeogrāfiju pārsvarā sausā klimatā.',
        'Gīza, Luksora un daudzas senlietu vietas padara Ēģipti par īpaši nozīmīgu ceļojumu galamērķi.',
        'Ēģipte apvieno seno monumentalitāti ar joprojām nozīmīgu lomu reģionā.'
    ),
    'es' => $full(
        'Spānija atrodas Ibērijas pussalā un ir pazīstama ar bagātu vēsturi, spēcīgām reģionālajām kultūrām un daudzveidīgām ainavām.',
        'Madride ir galvaspilsēta; Barselona, Sevilja un Valensija ir starp nozīmīgākajām pilsētām.',
        'Romiešu, mauru un mūsdienu Eiropas ietekmes būtiski veidojušas Spānijas arhitektūru, svētkus un identitāti.',
        'Tūrisms, lauksaimniecība, pakalpojumi un rūpniecība nodrošina plašu ekonomisko pamatu.',
        'Spānija ir parlamentāra monarhija ar nostiprinātu demokrātisku sistēmu.',
        'Piekrastes, kalni un plaši līdzenumi savienojas ar pārsvarā Vidusjūras klimatu.',
        'Vēsturiskās pilsētas, flamenko, pludmales un ievērojami pieminekļi piesaista ceļotājus no visas pasaules.',
        'Tapas, paelja un reģionālie vīni atspoguļo Spānijas plašo kulināro daudzveidību.',
        'Spānija apvieno spēcīgas reģionālās identitātes ar starptautisku kultūras pievilcību.'
    ),
    'fr' => $full(
        'Francija ir valsts, kas Eiropā īpaši cieši saistās ar mākslu, kultūru, kulināriju un vēsturisku ietekmi.',
        'Parīze ir galvaspilsēta; Liona, Marseļa un Bordo papildina valsts pilsētu un reģionālo profilu.',
        'Francija spēcīgi ietekmējusi filozofiju, mākslu, zinātni un politiskās idejas Eiropā un ārpus tās.',
        'Rūpniecība, luksusa preces, lauksaimniecība, pakalpojumi un tūrisms veido daudzveidīgu ekonomiku.',
        'Francija ir republika ar ilgu demokrātisku tradīciju un ievērojamu ietekmi Eiropā un pasaulē.',
        'No Vidusjūras piekrastes līdz vīna reģioniem, Alpiem un Pirenejiem valstij ir ļoti dažāda ģeogrāfija.',
        'Eifeļa tornis, Luvra, Provansa un daudzas vēsturiskas pilsētas padara Franciju par vienu no apmeklētākajām valstīm pasaulē.',
        'Bagete, siers, vīns un konditoreja ir tikai daži no franču gastronomijas simboliem.',
        'Francija apvieno kultūras izsmalcinātību ar vēsturisku dziļumu un politisku nozīmi.'
    ),
    'en' => $full(
        'Anglija ir vēsturiski nozīmīga Apvienotās Karalistes daļa, kas būtiski ietekmējusi valodu, politiku un kultūru visā pasaulē.',
        'Londona ir galvaspilsēta; Mančestra, Birmingema un Liverpūle ir citas svarīgas pilsētas.',
        'Literatūra, zinātne, impērijas pagātne un kultūras institūcijas dziļi veidojušas Anglijas identitāti.',
        'Finanses, tehnoloģijas, radošās nozares un pakalpojumi uztur daudzveidīgu ekonomiku.',
        'Anglija ir daļa no Apvienotās Karalistes un darbojas stabilā demokrātiskā un monarhiskā sistēmā.',
        'Pauguraines, piekrastes un vēsturiskas pilsētas atrodas mērenā klimatā ar skaidri izteiktiem gadalaikiem.',
        'Londona, pilis, muižas un piekrastes ainavas ir starp galvenajiem apskates objektiem.',
        'Klasiski cepeši, Yorkshire pudding un mūsdienu starptautiskās ietekmes raksturo virtuvi.',
        'Anglija apvieno tradīciju, pilsētu dinamiku un noturīgu globālu ietekmi.'
    ),
    'sc' => $simple(
        'Skotija ir zeme ar skarbām ainavām, spēcīgu vēsturisko apziņu un izteiktu kultūras savdabību Apvienotās Karalistes ziemeļos.',
        'Edinburga, Glāzgova un Highlands raksturo valsti, kuras vēsture, valoda un politiskā attīstība radījusi ļoti atšķirīgu identitāti; vienlaikus aug tūrisms, tehnoloģijas un atjaunojamā enerģija.',
        'Kultūras mantojums:',
        'Dūdu mūzika, Highland Games, literatūra un ļoti atšķirīga ikdienas kultūra joprojām veido Skotijas tēlu.',
        'Skotija apvieno dramatisku dabu, kultūras blīvumu un skaidri atpazīstamu nacionālo raksturu.'
    ),
    'gh' => $simple(
        'Gana ir Rietumāfrikas valsts ar lielu vēsturisku nozīmi, dzīvīgu kultūras vidi un stabilu demokrātisku attīstību.',
        'Akra un citi reģioni atspoguļo vēsturi, ko veidojušas spēcīgas valstis, tirdzniecība un bagātas mūzikas, dejas un mākslas tradīcijas; ekonomiku balsta izejvielas, lauksaimniecība un pakalpojumi.',
        'Politiskā vide:',
        'Gana tiek uzskatīta par vienu no stabilākajām demokrātijām Rietumāfrikā un uzsver attīstību, līdzdalību un institucionālu nepārtrauktību.',
        'Gana pārliecinoši apvieno kultūras dziļumu, politisku stabilitāti un ekonomisko potenciālu.'
    ),
    'gr' => $simple(
        'Grieķija tiek uzskatīta par Rietumu civilizācijas šūpuli un apvieno senas vietas ar salām un Vidusjūras dzīvesveidu.',
        'Atēnas, salas un daudzi kontinentālās daļas reģioni atgādina par garu filozofijas, politikas un mākslas vēsturi; ekonomikai svarīgi ir tūrisms, kuģniecība, lauksaimniecība un pakalpojumi.',
        'Kultūras identitāte:',
        'Svētki, spēcīgas kopienas un Vidusjūras virtuve atspoguļo saikni starp antīko tradīciju un mūsdienu ikdienu.',
        'Grieķija joprojām ir valsts, kur vēsturiskais mantojums un ainaviskā pievilcība cieši savijas.'
    ),
    'hr' => $full(
        'Horvātija atrodas pie Adrijas jūras un ir pazīstama ar dzidru piekrasti, vēsturiskām pilsētām un spēcīgu kultūras mantojumu.',
        'Zagreba ir galvaspilsēta, bet Splita un Dubrovnika spilgti raksturo piekrastes Horvātiju.',
        'Romiešu, venēciešu un citas Eiropas ietekmes būtiski veidojušas mākslu, arhitektūru un reģionālās tradīcijas.',
        'Tūrisms, rūpniecība un lauksaimniecība balsta ekonomiku, kas turpina modernizēties.',
        'Horvātija ir parlamentāra republika un cieši integrēta Eiropas struktūrās.',
        'Kalni, salas, piekraste un iekšzemes teritorijas rada lielu ainavisko daudzveidību starp Vidusjūras un kontinentālo klimatu.',
        'Dubrovnika, vēsturiskās vecpilsētas un piekrastes ainavas ir galvenie tūrisma magnēti.',
        'Svaigas zivis, vietējie vīni un Vidusjūras ietekmēti ēdieni ir raksturīgi daudzos reģionos.',
        'Horvātija apvieno piekrastes skaistumu, vēsturisku blīvumu un mūsdienīgu Eiropas kursu.'
    ),
    'il' => $full(
        'Izraēla ir valsts ar milzīgu vēsturisku un reliģisku nozīmi krustpunktā starp Āfriku, Āziju un Eiropu.',
        'Jeruzaleme ir pasaules mēroga reliģiskais centrs, bet Telaviva simbolizē modernitāti, tehnoloģijas un pilsētas dzīvi.',
        'Bībeliskais mantojums, senā vēsture un daudzveidīgā imigrācija radījuši sarežģītu kultūras identitāti.',
        'Tehnoloģijas, lauksaimniecība un pētniecība uztur ļoti inovatīvu ekonomiku.',
        'Izraēla ir demokrātiska valsts ar dinamisku iekšpolitiku un lielu nozīmi reģionā.',
        'No tuksneša līdz Vidusjūras piekrastei stiepjas ļoti dažādas ainavas un klimata zonas.',
        'Jeruzaleme, Raudu mūris, vēsturiskas baznīcas un dzīvīgi tirgi ir starp svarīgākajām apskates vietām.',
        'Falafels, humuss, svaigi dārzeņi un Tuvo Austrumu ietekmes spēcīgi raksturo virtuvi.',
        'Izraēla apvieno tūkstošgadīgu vēsturi ar augstu mūsdienu dinamiku un inovācijām.'
    ),
    'in' => $full(
        'Indija ir ļoti liela un daudzveidīga Dienvidāzijas valsts ar senām civilizācijām un strauju ekonomisku pārveidi.',
        'Ņūdeli ir galvaspilsēta; Mumbaja, Bengalūru un Kolkata ir svarīgi pilsētu un ekonomikas centri.',
        'Reliģijas, valodas, impērijas un koloniālā pieredze radījušas ļoti daudzslāņainu kultūru.',
        'IT, lauksaimniecība, rūpniecība un pakalpojumi balsta strauji augošu ekonomiku.',
        'Indija ir pasaulē lielākā demokrātija un vienlaikus saskaras ar sarežģītiem sociāliem izaicinājumiem.',
        'No Himalajiem līdz tropu piekrastei un tuksnešiem valstī ir milzīga dabas un klimata daudzveidība.',
        'Tadžmahals, svētki un ļoti atšķirīgie kultūras reģioni padara Indiju unikālu tūristiem.',
        'Indijas virtuve ir izteikti reģionāla un slavena ar garšvielu bagātību un sarežģītām garšām.',
        'Indija apvieno senas tradīcijas, demogrāfisku mērogu un lielu nākotnes potenciālu.'
    ),
    'ie' => $full(
        'Īrija ir salu valsts Ziemeļrietumeiropā, kas pazīstama ar zaļām ainavām, stāstniecības tradīciju un kultūras siltumu.',
        'Dublina ir galvaspilsēta; Korka, Golveja un Limerika papildina valsts reģionālo raksturu.',
        'Ķeltu saknes, vikingu laikmets un britu ietekme dziļi veidojušas Īrijas vēsturi un identitāti.',
        'Tehnoloģijas, farmācija un finanšu pakalpojumi padara Īriju par dinamisku mūsdienu ekonomiku.',
        'Īrija ir parlamentāra demokrātija ar skaidru Eiropas orientāciju un atvērtu sabiedrību.',
        'Pauguri, piekraste un jūras klimats raksturo salas ainavu.',
        'Moheras klintis, pilis un literārā Dublina ir starp galvenajiem tūrisma objektiem.',
        'Sautējumi, soda maize un zivju ēdieni atspoguļo lauksaimnieciskās un jūrnieciskās tradīcijas.',
        'Īrija pārliecinoši apvieno dabu, kultūras dziļumu un mūsdienīgu ekonomisko dinamiku.'
    ),
    'it' => $full(
        'Itālija visā pasaulē ir pazīstama ar mākslu, vēsturi, modi un kultūras ainavu, kas sniedzas līdz pat antīkajam laikmetam.',
        'Roma ir galvaspilsēta; Florence, Venēcija un Milāna ir īpaši nozīmīgas kultūras, tūrisma un ekonomikas ziņā.',
        'No Senās Romas un renesanses līdz mūsdienām Itālija būtiski ietekmējusi Eiropas kultūras un ideju vēsturi.',
        'Mode, rūpniecība, amatniecība, tūrisms un reģionālā ražošana veido valsts ekonomikas pamatu.',
        'Itālija ir demokrātiska republika ar lielu reģionālo dažādību un nozīmīgu starptautisku lomu.',
        'Piekrastes, kalni, līdzenumi un vīna reģioni rada ievērojamu ģeogrāfisko daudzveidību.',
        'Kolizejs, Venēcija, Piza un neskaitāmas vēsturiskās pilsētas katru gadu piesaista miljoniem cilvēku.',
        'Pasta, pica, gelato un spēcīgas reģionālās tradīcijas padara Itālijas virtuvi īpaši ietekmīgu.',
        'Itālija apvieno vēsturisku bagātību, estētisku spēku un dzīvu ikdienas kultūru.'
    ),
    'jm' => $full(
        'Jamaika ir Karību jūras sala ar tropisku dabu, spēcīgu mūzikas kultūru un izteiktu savdabību.',
        'Kingstona ir galvaspilsēta un mūzikas centrs; Montegobeja un Očo Riosa ir nozīmīgi tūrisma galamērķi.',
        'Afrikāņu, Eiropas un pamatiedzīvotāju ietekmes radījušas kultūru, ko pasaulē īpaši saista ar regeju.',
        'Tūrisms, lauksaimniecība un kalnrūpniecība ir svarīgi ekonomikas balsti, ko papildina radošās nozares.',
        'Jamaika ir parlamentāra demokrātija ar spēcīgu kultūras pašapziņu.',
        'Tropiska veģetācija, pludmales un paugurains reljefs veido ainavu un klimatu.',
        'Pludmales, ūdenskritumi, mūzikas festivāli un koloniālās liecības ir starp galvenajām apskates vietām.',
        'Jerk chicken, karija ēdieni un ackee ar sālītu zivi ir Jamaikas virtuves simboli.',
        'Jamaika savieno ritmu, dabu un kultūras starojumu neatkārtojamā veidā.'
    ),
    'jp' => $full(
        'Japāna ir Austrumāzijas salu valsts, kurā īpaši cieši savijas senas tradīcijas un ļoti moderna sabiedrība.',
        'Tokija ir galvaspilsēta; Kioto un Nara simbolizē arī valsts vēsturisko un kultūras atmiņu.',
        'No samuraju laikmeta līdz pēckara modernizācijai Japāna izveidojusi spēcīgu identitāti ar izteiktu formas, rituāla un atjaunotnes izjūtu.',
        'Japāna ir viena no lielākajām ekonomikām pasaulē un īpaši stipra rūpniecībā, elektronikā un tehnoloģijās.',
        'Valsts ir konstitucionāla monarhija ar parlamentāru sistēmu un stabilām institūcijām.',
        'Kalni, piekrastes un dažādas klimata zonas raksturo šo garo salu loku.',
        'Tempļi, dārzi, metropoles un kultūrainavas padara Japānu īpaši daudzveidīgu ceļotājiem.',
        'Suši, ramen un tempura raksturo virtuvi, kur svarīga ir precizitāte un produktu kvalitāte.',
        'Japāna apvieno kultūras nepārtrauktību, tehnoloģisku spēku un augstu estētisko jutību.'
    ),
    'kr' => $full(
        'Dienvidkoreja ir dinamiska Austrumāzijas valsts, kur tehnoloģiska modernizācija cieši savienojas ar kultūras tradīcijām.',
        'Seula ir galvaspilsēta; Pusana un Inčhona papildina ekonomiski spēcīgo pilsētu sistēmu.',
        'Pēc lielām politiskām un sociālām pārmaiņām Dienvidkoreja kļuvusi par izglītības, tehnoloģiju un kultūras lielvalsti.',
        'Rūpniecība, elektronika, tehnoloģijas un izklaides nozare uztur ļoti konkurētspējīgu ekonomiku.',
        'Dienvidkoreja ir demokrātiska republika ar skaidru uzsvaru uz caurskatāmību, izaugsmi un sabiedrisko progresu.',
        'Pilsētas, piekrastes un pauguraines veido ainavu mērenā klimatā ar izteiktiem gadalaikiem.',
        'Pilis, tradicionālie ciemi un modernie pilsētu rajoni ir starp galvenajām apskates vietām.',
        'Kimči, korejiešu grilēti ēdieni un bibimbap ir starptautiski pazīstami virtuves simboli.',
        'Dienvidkoreja spilgti apvieno tradīciju, popkultūru un inovāciju spēku.'
    ),
    'lv' => $full(
        'Latvija ir Baltijas valsts ar daudz dabas, labi saglabātu apbūvi un skaidri atpazīstamu kultūras raksturu.',
        'Rīga ir galvaspilsēta un galvenais kultūras, ekonomikas un vēstures centrs valstī.',
        'Dažādu kaimiņvalstu un vēsturisku varu ietekmes veidojušas Latvijas mūziku, folkloru un ikdienas kultūru.',
        'Rūpniecība, IT un tūrisms palīdz uzturēt stabilu un augošu ekonomiku.',
        'Latvija ir parlamentāra republika un cieši iesaistīta Eiropas un transatlantiskajās struktūrās.',
        'Meži, ezeri un Baltijas jūras piekraste nosaka ainavu mērenā klimatā.',
        'Rīgas vecpilsēta, kultūras festivāli un dabas galamērķi piesaista apmeklētājus.',
        'Latviešu virtuve ir vienkārša, sātīga un balstīta vietējos produktos un sezonālās tradīcijās.',
        'Latvija apvieno baltisku mieru, vēsturisku apziņu un mūsdienīgu attīstību.'
    ),
    'ma' => $full(
        'Maroka ir Ziemeļāfrikas valsts ar dzīvīgām pilsētām, Atlasa kalniem, tuksnesi un garu kultūras vēsturi.',
        'Rabāta ir galvaspilsēta; Kasablanka, Marakeša un Fēsa ir starp ietekmīgākajām valsts pilsētām.',
        'Āfrikas, arābu un Eiropas ietekmes radījušas bagātu kultūru ar medīnām, tirgiem un izsmalcinātu arhitektūru.',
        'Lauksaimniecība, tūrisms un rūpniecība veido arvien daudzveidīgāku ekonomikas pamatu.',
        'Maroka ir konstitucionāla monarhija, kas savieno modernizāciju ar stipru tradīciju klātbūtni.',
        'Sahāra, kalni un piekrastes rada izteiktu ģeogrāfisko dažādību.',
        'Vēsturiskās vecpilsētas, pilis un tirgi padara Maroku par īpaši atmosfērisku galamērķi.',
        'Tadžīns, kuskuss un aromātiskas garšvielas spilgti raksturo Marokas virtuvi.',
        'Maroka savieno senus tirdzniecības un kultūras ceļus ar mūsdienīgu ekonomisko atvērtību.'
    ),
    'mx' => $full(
        'Meksikai ir ļoti bagāts vēsturiskais mantojums, ko veido maiju, acteku, koloniālais un mūsdienu nacionālais slānis.',
        'Mehiko ir galvaspilsēta un lielākā metropole; Gvadalahara un Monterreja ir citi nozīmīgi centri.',
        'Pamatiedzīvotāju kultūras un spāņu ietekmes dziļi veidojušas svētkus, mākslu, mūziku un sabiedrisko identitāti.',
        'Rūpniecība, lauksaimniecība, tūrisms un pakalpojumi balsta plašu un dažādotu ekonomiku.',
        'Meksika ir federatīva republika, kas turpina attīstīties politiski un sociāli.',
        'Tuksneši, kalni, lietusmeži un garas piekrastes rada īpaši daudzveidīgas dabas zonas.',
        'Senās pilsētas, koloniālā arhitektūra un kultūras centri ir starp svarīgākajiem tūrisma objektiem.',
        'Tacos, enchiladas, mole un daudzas reģionālās virtuves padara Meksiku kulināri ļoti ietekmīgu.',
        'Meksika apvieno kultūras dziļumu, dabas bagātību un milzīgu reģionālo dažādību.'
    ),
    'ng' => $full(
        'Nigērija ir visapdzīvotākā Āfrikas valsts un svarīgs ekonomiskais un kultūras centrs kontinentā.',
        'Abudža ir galvaspilsēta, bet Lagosa ir lielākais ekonomiskais centrs ar milzīgu pilsētas enerģiju.',
        'Daudzas etniskās grupas un tradīcijas radījušas ļoti daudzveidīgu kultūru ar spēcīgu mūzikas, mākslas un literatūras klātbūtni.',
        'Nafta un gāze joprojām ir svarīgas, taču strauji aug arī tehnoloģijas, lauksaimniecība un izklaides industrija.',
        'Nigērija ir federatīva republika, kur lielu potenciālu pavada būtiski reģionāli izaicinājumi.',
        'Lietusmeži, savannas un piekrastes teritorijas rada atšķirīgas dzīves un saimniecības telpas.',
        'Vēsturiskas vietas, festivāli un pilsētu kultūras daudzveidība padara valsti ļoti interesantu apmeklētājiem.',
        'Jollof rice, pounded yam un suya ir starp Nigērijas virtuves simboliem.',
        'Nigērija simbolizē enerģiju, kultūru daudzveidību un būtisku lomu Āfrikas nākotnē.'
    ),
    'nl' => $full(
        'Nīderlande ir pazīstama ar ūdens ainavām, inovatīvu pilsētplānošanu un atvērtu, tirdzniecībā orientētu kultūru.',
        'Amsterdama ir galvaspilsēta; Roterdama un Utrehta simbolizē modernu arhitektūru un pilsētu dinamiku.',
        'Jūrniecība, tirdzniecība, māksla un zinātniskā interese dziļi veidojušas Nīderlandes vēsturi.',
        'Tehnoloģijas, lauksaimniecība, loģistika un finanses uztur ļoti attīstītu ekonomiku.',
        'Nīderlande ir konstitucionāla monarhija ar parlamentāru sistēmu un izteiktu kompromisa kultūru.',
        'Līdzenumi, kanāli un piekraste nosaka ģeogrāfiju jūras klimata apstākļos.',
        'Kanāli, muzeji, vēsturiskās pilsētas un raksturīgās ainavas piesaista daudz tūristu.',
        'Stroopwafels, siļķe un siers ir starp pazīstamākajiem kulinārajiem simboliem.',
        'Nīderlande apvieno tradīciju, inovāciju un ikdienu ciešā saiknē ar ūdeni.'
    ),
    'no' => $full(
        'Norvēģija ir Skandināvijas valsts ar fjordiem, plašu neskartu dabu un ļoti augstu dzīves līmeni.',
        'Oslo ir galvaspilsēta; Bergena un Tronheima ir citi nozīmīgi kultūras un ekonomikas centri.',
        'Vikingu laikmets, jūrniecība un cieša saikne ar dabu ir būtiska Norvēģijas identitātes daļa.',
        'Enerģētika, jūrniecība un tehnoloģijas balsta pārtikušu un stabilu ekonomiku.',
        'Norvēģija ir konstitucionāla monarhija ar caurskatāmu parlamentāru sistēmu.',
        'Fjordi, kalni un garā piekraste rada ievērojamas klimata atšķirības starp ziemeļiem un dienvidiem.',
        'Ziemeļblāzma, fjordu ainavas un vēsturiskas vietas padara Norvēģiju par izcilu dabas tūrisma galamērķi.',
        'Svaigas zivis, sātīgi ēdieni un reģionālās specialitātes ir nozīmīga virtuves daļa.',
        'Norvēģija apvieno dabas varenību, sociālo stabilitāti un mūsdienīgu ekonomisko spēku.'
    ),
    'pe' => $full(
        'Peru ir valsts ar senām civilizācijām un iespaidīgām ainavām no Andu augstienēm līdz Amazonei.',
        'Lima ir galvaspilsēta; Kusko un Arekipa ir citi nozīmīgi kultūras un ekonomikas centri.',
        'Inku civilizācija un Spānijas koloniālais laikmets ilgstoši ietekmējuši mākslu, sabiedrību un identitāti.',
        'Kalnrūpniecība, lauksaimniecība, tūrisms un rūpniecība veido Peru ekonomikas pamatu.',
        'Peru ir demokrātiska republika, kas cenšas stiprināt savas institūcijas un sociālo līdzdalību.',
        'Andi, lietusmeži un Klusā okeāna piekraste rada ļoti atšķirīgas dabas un klimata zonas.',
        'Maču Pikču, vēsturiskās pilsētas un arheoloģiskās vietas padara Peru pasaulslavenu.',
        'Ceviche, lomo saltado un tādi produkti kā kvinoja atspoguļo Peru virtuves daudzveidību.',
        'Peru apvieno senu augsto kultūru, dabas bagātību un ļoti dzīvu mūsdienu kultūru.'
    ),
    'pl' => $full(
        'Polija ir Centrāleiropas valsts ar izturīgu vēsturi, spēcīgu kultūru un daudzveidīgu ainavu.',
        'Varšava ir galvaspilsēta; Krakova un Gdaņska ir svarīgi vēstures un kultūras centri.',
        'Dalīšana, kari un atjaunošanās veidojuši Poliju, bet arī nostiprinājuši spēcīgu nacionālo identitāti literatūrā, mūzikā un tradīcijās.',
        'Rūpniecība, tehnoloģijas un pakalpojumi pēdējās desmitgadēs būtiski modernizējuši ekonomiku.',
        'Polija ir parlamentāra republika un stingri iekļauta Eiropas un starptautiskajās struktūrās.',
        'Līdzenumi, ezeri, meži un viduskalni veido valsts ainavu mērenā klimatā.',
        'Vecpilsētas, piemiņas vietas un kultūras festivāli padara Poliju vēsturiski un kultūras ziņā ļoti bagātu.',
        'Pierogi, bigos un kiełbasa ir starp pazīstamākajiem poļu virtuves ēdieniem.',
        'Polija apvieno vēsturisku nopietnību ar mūsdienīgu attīstību un spēcīgu kultūras pašapziņu.'
    ),
    'pt' => $full(
        'Portugāle ir valsts ar lielu jūrniecības vēsturi, izteiktu kultūras raksturu un garu Atlantijas okeāna piekrasti.',
        'Lisabona ir galvaspilsēta; Porto un Faro ir citi nozīmīgi pilsētu centri.',
        'Lielo ģeogrāfisko atklājumu laikmets padarīja Portugāli par pasaules jūras lielvaru un joprojām ietekmē valsts identitāti.',
        'Tūrisms, lauksaimniecība, rūpniecība un tehnoloģijas balsta mūsdienu ekonomiku.',
        'Portugāle ir demokrātiska republika ar ciešu saikni ar Eiropu.',
        'Piekrastes, klintis un maigs līdz silts klimats ir starp valsts raksturīgākajām iezīmēm.',
        'Lisabona, Porto un piekrastes reģioni ir galvenie ceļojumu galamērķi.',
        'Bacalhau, caldo verde un pasteis de nata ir svarīgi Portugāles kulinārie simboli.',
        'Portugāle apvieno jūrniecības vēsturi, ainavisku pievilcību un kultūras siltumu.'
    ),
    'py' => $full(
        'Paragvaja ir iekšzemes valsts Dienvidamerikas sirdī ar spēcīgu pamatiedzīvotāju mantojumu un plašām upju ainavām.',
        'Asunsjona ir galvaspilsēta un viens no senākajiem pilsētu centriem reģionā; citas pilsētas papildina valsts urbāno tīklu.',
        'Pamatiedzīvotāju tradīcijas un koloniālās ietekmes ilgstoši veidojušas folkloru, mūziku, amatniecību un ikdienas kultūru.',
        'Ekonomika lielā mērā balstās uz lauksaimniecību, lopkopību un dabas resursiem.',
        'Paragvaja ir demokrātiska republika, kas turpina stiprināt savas institūcijas un uzņēmējdarbības vidi.',
        'Līdzenumi, upju ielejas un subtropu klimats nosaka valsts dabu un izmantošanu.',
        'Kultūras vietas un dabas objekti ļauj iepazīt valsti, kas bieži ir mierīgāka nekā skaļa.',
        'Chipa un sopa paraguaya ir starp pazīstamākajiem Paragvajas ēdieniem.',
        'Paragvaja apvieno klusus dabas vaibstus ar noturīgu kultūras nepārtrauktību.'
    ),
    'qa' => $full(
        'Katara ir maza, ļoti turīga valsts Arābijas pussalā, kas īsā laikā piedzīvojusi strauju modernizāciju.',
        'Doha ir galvaspilsēta un politikas, ekonomikas un kultūras centrs; arī citi pilsētu rajoni kļūst nozīmīgāki.',
        'Katara savieno beduīnu saknes ar ātru pāreju uz globālu redzamību un modernu infrastruktūru.',
        'Dabasgāze un enerģijas eksports nosaka ekonomiku, kas vienlaikus investē finansēs, izglītībā un tūrismā.',
        'Katara ir absolūta monarhija, kas cenšas modernizāciju savienot ar tradicionālo vērtību saglabāšanu.',
        'Tuksnesis, karstums un niecīgi nokrišņi nosaka valsts ģeogrāfiju un klimatu.',
        'Muzeji, kultūras centri, tirgi un Dohas panorāma ir galvenie apskates objekti.',
        'Kataras virtuve apvieno reģiona tradicionālās garšas ar starptautisku ietekmi.',
        'Katara simbolizē straujas pārmaiņas, ekonomisku spēku un pieaugošu redzamību reģionā.'
    ),
    'rs' => $full(
        'Serbija atrodas Balkānos vēsturiskā krustpunktā starp Austrumeiropu un Centrāleiropu.',
        'Belgrada ir galvaspilsēta; Novi Sada un Niša ir citi nozīmīgi kultūras un ekonomikas centri.',
        'Bizantijas, osmaņu un habsburgu ietekmes dziļi veidojušas valsts folkloru, mūziku un pašizpratni.',
        'Lauksaimniecība, rūpniecība, tehnoloģijas un pakalpojumi veido jauktu ekonomiku, kas turpina reformēties.',
        'Serbija ir parlamentāra republika un cenšas arvien ciešāk tuvināties Eiropai politiski un ekonomiski.',
        'Līdzenumi, pakalni un kalni rada daudzveidīgu ainavu kontinentālā klimatā.',
        'Belgrada, Novi Sada un tādi dabas galamērķi kā Đerdapas nacionālais parks ir starp galvenajām apskates vietām.',
        'Ćevapi, sarma un ajvars raksturo sātīgu virtuvi ar spēcīgām reģionālām tradīcijām.',
        'Serbija apvieno daudzslāņainu vēsturi, savdabīgu kultūru un skaidru modernizācijas vēlmi.'
    ),
    'ru' => $full(
        'Krievija ir lielākā valsts pasaulē pēc platības un stiepjas no Austrumeiropas līdz Ziemeļāzijai.',
        'Maskava ir galvaspilsēta, bet Sanktpēterburga ir izcils kultūras centrs; citas lielpilsētas papildina milzīgo reģionālo daudzveidību.',
        'Caru laikmets, revolūcijas un bagāts mantojums literatūrā, mūzikā, zinātnē un mākslā joprojām ietekmē valsts tēlu.',
        'Enerģētika, rūpniecība un tehnoloģijas ir svarīgi balsti plašai, resursiem bagātai ekonomikai.',
        'Krievija ir federāla daļēji prezidentāla republika ar lielu nozīmi starptautiskos jautājumos.',
        'Tundra, meži, upes un kalni rada galējus klimata un ģeogrāfijas kontrastus.',
        'Kremlis, Sarkanais laukums, Ermitāža un plašās ainavas ir starp zināmākajiem valsts simboliem.',
        'Borščs, pelmeņi un blini raksturo sātīgu un reģionāli dažādu virtuvi.',
        'Krievija apvieno monumentālu telpu, kultūras dziļumu un sarežģītu vēsturisku attīstību.'
    ),
    'sa' => $full(
        'Saūda Arābija ir vadoša Tuvo Austrumu valsts ar milzīgiem naftas resursiem, islāma centru un strauju modernizāciju.',
        'Rijāda ir galvaspilsēta; Džida un Dammāma ir starp nozīmīgākajiem ekonomikas un kultūras centriem.',
        'Kā islāma dzimtene un Mekas un Medīnas mājvieta Saūda Arābija ir ārkārtīgi svarīga reliģiski un vēsturiski.',
        'Nafta un gāze dominē ekonomikā, taču tiek attīstīts arī tūrisms, finanses un tehnoloģijas.',
        'Saūda Arābija ir absolūta monarhija, kas tradicionālo islāma kārtību savieno ar izvēlētām reformām.',
        'Tuksneši, kalni un Sarkanās jūras piekraste raksturo pārsvarā karstu un sausu klimatu.',
        'Meka, Medīna un jaunās tūrisma iniciatīvas padara valsti arvien redzamāku ārvalstu apmeklētājiem.',
        'Kabsa, mandi un garšvielām bagāti rīsu un gaļas ēdieni ir raksturīgi Saūda Arābijas virtuvei.',
        'Saūda Arābija apvieno reliģisku centrālo lomu, resursu spēku un dziļas strukturālas pārmaiņas.'
    ),
    'se' => $full(
        'Zviedrija ir Ziemeļvalsts ar augstu dzīves kvalitāti, stipru dizaina kultūru un izteiktu vides apziņu.',
        'Stokholma ir galvaspilsēta; Gēteborga un Malme papildina valsts galvenos pilsētu centrus.',
        'No vikingu laikmeta līdz mūsdienu labklājības valstij Zviedrija izveidojusi kultūru ar spēcīgu vienlīdzības izjūtu.',
        'Rūpniecība, tehnoloģijas, dizains un ilgtspējīga enerģija balsta noturīgu ekonomiku.',
        'Zviedrija ir konstitucionāla monarhija ar caurskatāmu parlamentāru sistēmu.',
        'Meži, ezeri, kalni un Baltijas jūras piekraste raksturo valsti; klimats ziemeļos ir skarbāks nekā dienvidos.',
        'Stokholma, nacionālie parki un daudzas vēsturiskas vietas piesaista tūristus no daudzām valstīm.',
        'Kotletes, gravlax un kraukšķīgas maizes ir starp raksturīgākajiem Zviedrijas ēdieniem.',
        'Zviedrija apvieno sociālu stabilitāti, inovācijas un dzīves kvalitāti ciešā saiknē ar dabu.'
    ),
    'tn' => $full(
        'Tunisija ir Ziemeļāfrikas valsts ar Vidusjūras piekrasti, bagātu vēsturi un īpašu novietojumu starp Āfriku un Eiropu.',
        'Tunisa ir galvaspilsēta; Sfaksa un Sūsa ir citi svarīgi ekonomikas un kultūras centri.',
        'Kartāga, romiešu mantojums, islāma tradīcija un franču ietekme veido Tunisijas kultūras profilu.',
        'Lauksaimniecība, tūrisms un rūpniecība ir galvenie ekonomikas balsti, kurus turpina modernizēt.',
        'Tunisiju bieži min kā svarīgu demokrātisko reformu piemēru arābu pasaulē, lai gan process ir sarežģīts.',
        'Piekrastes, tuksnešainas teritorijas un auglīgi līdzenumi nosaka ainavu Vidusjūras un sausā klimata pārejā.',
        'Kartāga, vēsturiskās medīnas un piejūras kūrorti padara Tunisiju daudzveidīgu ceļojumu galamērķi.',
        'Kuskuss, brik un ar harisu bagātināti ēdieni ir svarīga Tunisijas virtuves daļa.',
        'Tunisija apvieno seno mantojumu, Vidusjūras vidi un mūsdienīgu reformu centienus.'
    ),
    'tr' => $inlineConclusion(
        'Turcija ir transkontinentāla valsts starp Eiropu un Āziju un jau tūkstošiem gadu atrodas impēriju un tirdzniecības ceļu krustpunktā.',
        'Ankara ir galvaspilsēta; Stambula, Izmira un Bursa nosaka valsts politisko, ekonomisko un kultūras dzīvi.',
        'Bizantijas un Osmaņu mantojums dziļi ietekmējis Turcijas arhitektūru, literatūru, mūziku un sabiedriskās tradīcijas.',
        'Lauksaimniecība, tekstils, rūpniecība un tūrisms veido plašu ekonomiku ar lielu reģionālo nozīmi.',
        'Turcija ir republika ar spēcīgu prezidentālu sistēmu un pastāvīgiem politiskiem reformu un spriedzes laukiem.',
        'Kalni, līdzenumi un garas Vidusjūras un Egejas jūras piekrastes rada ļoti atšķirīgas dabas un klimata zonas.',
        'Hagia Sophia, Topkapi pils, Zilā mošeja, antīkās vietas un tirgi ir starp pazīstamākajām apskates vietām.',
        'Kebabi, meze un baklava raksturo virtuvi, kas apvieno Centrālāzijas, Tuvo Austrumu un Vidusjūras ietekmes.',
        'Turcija tādējādi paliek spilgts vēstures, kultūras un ekonomiskās dinamikas krustpunkts.'
    ),
    'ua' => $full(
        'Ukraina ir liela Austrumeiropas valsts ar auglīgiem līdzenumiem, bagātu kultūras mantojumu un ievērojamu izturību.',
        'Kijiva ir galvaspilsēta; Harkiva, Ļviva un Odesa ir citi nozīmīgi centri.',
        'Dažādas impērijas un politiskie laikmeti, sākot ar Kijivas Krievzemi, būtiski veidojuši Ukrainas identitāti.',
        'Lauksaimniecība, smagā rūpniecība un augošs IT sektors ir svarīgi ekonomikas balsti.',
        'Ukraina ir republika, kas turpina stiprināt demokrātiskās institūcijas un orientējas uz Eiropu.',
        'Stepes, Karpati un piekrastes teritorijas veido ainavu pārsvarā kontinentālā klimatā.',
        'Klosteri, vēsturiskās pilsētas un piejūras vietas atklāj valsts kultūras daudzslāņainību.',
        'Borščs, vareņiki un kāpostu tīteņi ir raksturīgi Ukrainas virtuves ēdieni.',
        'Ukraina apvieno kultūras dziļumu, dabas resursus un skaidri redzamu pašnoteikšanās gribu.'
    ),
    'us' => $inlineConclusion(
        'Amerikas Savienotās Valstis ir pasaules lielvara ar lielu kultūras daudzveidību, spēcīgu inovāciju un ļoti atšķirīgām ainavām.',
        'Vašingtona ir politiskais centrs; Ņujorka, Losandželosa un Čikāga īpaši ietekmē ekonomiku, kultūru un medijus.',
        'Imigrācija, neatkarības vēsture un cīņas par brīvību un pilsoniskajām tiesībām dziļi veidojušas ASV identitāti.',
        'Tehnoloģijas, finanses, izklaide, lauksaimniecība un rūpniecība uztur vienu no lielākajām ekonomikām pasaulē.',
        'ASV ir federāla republika ar varas dalījumu starp izpildvaru, likumdevēju un tiesu varu.',
        'Tuksneši, kalni, meži, līdzenumi un garas piekrastes rada īpaši plašu dabas un klimata daudzveidību.',
        'Brīvības statuja, Lielais kanjons un metropoles, piemēram, Ņujorka, piesaista apmeklētājus no visas pasaules.',
        'Amerikāņu virtuve apvieno reģionālās tradīcijas ar globālām ietekmēm un sniedzas no vienkāršiem klasiskajiem ēdieniem līdz modernai augstajai virtuvei.',
        'Amerikas Savienotās Valstis tādējādi simbolizē daudzveidību, ietekmi un noturīgu globālu nozīmi.'
    ),
    'uy' => $inlineConclusion(
        'Urugvaja ir neliela Dienvidamerikas dienvidaustrumu valsts, kas pazīstama ar politisku stabilitāti, sociālām reformām un augstu dzīves kvalitāti.',
        'Montevideo ir galvaspilsēta un lielākais centrs; Salto un Punta del Este papildina valsts pilsētainavu.',
        'Eiropas imigrācija un reģionālās tradīcijas veidojušas demokrātisku kultūru ar spēcīgu futbola identitāti.',
        'Lauksaimniecība, lopkopība, vīns, tūrisms un atjaunojamā enerģija nodrošina stabilu un daudzveidīgu ekonomiku.',
        'Urugvaja ir prezidentāla republika un tiek uzskatīta par vienu no nostiprinātākajām demokrātijām Latīņamerikā.',
        'Līdzenumi, ganības un Atlantijas okeāna piekraste nosaka ainavu maigā mērenā klimatā.',
        'Vecpilsētas rajoni, piekrastes kūrorti un termālie avoti ir starp svarīgākajām apskates vietām.',
        'Asado, chivito un daudzi ēdieni, kuru pamatā ir gaļa un lauksaimniecības produkti, raksturo virtuvi.',
        'Urugvaja apvieno sociālu atvērtību, politisku uzticamību un skaidru kultūras pašapziņu.'
    ),
    'za' => $noConclusion(
        'Dienvidāfrika atrodas Āfrikas kontinenta dienvidos un ir pazīstama ar kultūras daudzveidību, plašām ainavām un sarežģītu vēsturi.',
        'Pretorija ir administratīvā galvaspilsēta, Keiptauna ir nozīmīgs kultūras centrs, bet Johannesburga ir lielākā ekonomiskā metropole.',
        'Pamatiedzīvotāju tradīcijas, koloniālā pagātne un cīņa pret aparteīdu joprojām spēcīgi veido Dienvidāfrikas identitāti.',
        'Kalnrūpniecība, rūpniecība, lauksaimniecība un pakalpojumi balsta plašu ekonomiku, kas vienlaikus saskaras ar nevienlīdzību.',
        'Dienvidāfrika ir demokrātiska republika ar daudzpartiju sistēmu un stipru uzsvaru uz tiesībām un iekļaušanu.',
        'Savannas, kalni, piekrastes un ļoti dažādas klimata zonas nodrošina lielu bioloģisko daudzveidību.',
        'Galda kalns, Krīgera nacionālais parks un Garden Route ir starp pazīstamākajiem ceļojumu galamērķiem.',
        'Braai, bobotie un biltong atspoguļo vietējo, koloniālo un mūsdienu ietekmju sajaukumu virtuvē.'
    ),
    'ir' => $full(
        'Irāna ir valsts ar bagātu persiešu tradīciju, ievērojamu arhitektūru un ļoti senu kultūras vēsturi.',
        'Teherāna ir galvaspilsēta; Isfahāna un Širāza ir īpaši pazīstamas ar arhitektūru, mākslu un vēsturisku nozīmi.',
        'Persiešu literatūra, zinātne un filozofija gadsimtiem ilgi būtiski ietekmējušas Irānas kultūras identitāti.',
        'Nafta un gāze ir ļoti svarīgas, bet ekonomiku papildina lauksaimniecība, rūpniecība un tehnoloģijas.',
        'Irāna ir Islāma republika, kas apvieno reliģisku kārtību ar mūsdienu valsts struktūrām.',
        'Kalni, tuksneši, līdzenumi un dažādas klimata zonas veido valsts ģeogrāfiju.',
        'Mošejas, dārzi, senās vietas un vēsturiskās pilsētas padara Irānu kultūras ziņā īpaši bagātu.',
        'Aromātiski rīsu ēdieni, kebabi un smalki garšvielotas maltītes raksturo Irānas virtuvi.',
        'Irāna apvieno īpaši senu civilizācijas mantojumu ar sarežģītu mūsdienu realitāti.'
    ),
];
