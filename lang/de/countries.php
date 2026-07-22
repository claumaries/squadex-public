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
        '<p class="mt-1"><b>Hauptstadt und wichtige Städte:</b></p>',
        "<p>{$capital}</p>",
        '<p class="mt-1"><b>Geschichte und Kultur:</b></p>',
        "<p>{$history}</p>",
        '<p class="mt-1"><b>Wirtschaft:</b></p>',
        "<p>{$economy}</p>",
        '<p class="mt-1"><b>Regierung und Politik:</b></p>',
        "<p>{$government}</p>",
        '<p class="mt-1"><b>Geografie und Klima:</b></p>',
        "<p>{$geography}</p>",
        '<p class="mt-1"><b>Tourismus und Sehenswürdigkeiten:</b></p>',
        "<p>{$tourism}</p>",
        '<p class="mt-1"><b>Küche:</b></p>',
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
        '<p class="mt-1"><b>Hauptstadt und wichtige Städte:</b></p>',
        "<p>{$capital}</p>",
        '<p class="mt-1"><b>Geschichte und Kultur:</b></p>',
        "<p>{$history}</p>",
        '<p class="mt-1"><b>Wirtschaft:</b></p>',
        "<p>{$economy}</p>",
        '<p class="mt-1"><b>Regierung und Politik:</b></p>',
        "<p>{$government}</p>",
        '<p class="mt-1"><b>Geografie und Klima:</b></p>',
        "<p>{$geography}</p>",
        '<p class="mt-1"><b>Tourismus und Sehenswürdigkeiten:</b></p>',
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
        '<p class="mt-1"><b>Hauptstadt und wichtige Städte:</b></p>',
        "<p>{$capital}</p>",
        '<p class="mt-1"><b>Geschichte und Kultur:</b></p>',
        "<p>{$history}</p>",
        '<p class="mt-1"><b>Wirtschaft:</b></p>',
        "<p>{$economy}</p>",
        '<p class="mt-1"><b>Regierung und Politik:</b></p>',
        "<p>{$government}</p>",
        '<p class="mt-1"><b>Geografie und Klima:</b></p>',
        "<p>{$geography}</p>",
        '<p class="mt-1"><b>Tourismus und Sehenswürdigkeiten:</b></p>',
        "<p>{$tourism}</p>",
        '<p class="mt-1"><b>Küche:</b></p>',
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
        '<p class="mt-1"><b>Hauptstadt und wichtige Städte:</b></p>',
        "<p>{$capital}</p>",
        '<p class="mt-1"><b>Geschichte und Kultur:</b></p>',
        "<p>{$history}</p>",
        '<p class="mt-1"><b>Wirtschaft:</b></p>',
        "<p>{$economy}</p>",
        '<p class="mt-1"><b>Regierung und Politik:</b></p>',
        "<p>{$government}</p>",
        '<p class="mt-1"><b>Geografie und Klima:</b></p>',
        "<p>{$geography}</p>",
        '<p class="mt-1"><b>Tourismus und Sehenswürdigkeiten:</b></p>',
        "<p>{$tourism}</p>",
        '<p class="mt-1"><b>Küche:</b></p>',
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
        '<p class="mt-1"><b>Geschichte und Kultur:</b></p>',
        "<p>{$history}</p>",
        "<p class=\"mt-1\"><b>{$secondaryHeading}</b></p>",
        "<p>{$secondaryText}</p>",
        "<p>{$conclusion}</p>",
    ]);
};

return [
    'ae' => $full(
        'Die Vereinigten Arabischen Emirate sind ein Bund von sieben Emiraten im Südosten der Arabischen Halbinsel und verbinden Wüstenräume mit hochmodernen Städten.',
        'Abu Dhabi ist die Hauptstadt, Dubai das wirtschaftliche und touristische Zentrum; Sharjah, Ajman, Umm Al-Quwain, Fujairah und Ras Al Khaimah ergänzen das Land.',
        'Seit 1971 haben sich die VAE von Fischerei- und Perlentaucherorten zu einem modernen Staat entwickelt, der islamische Tradition und internationale Offenheit verbindet.',
        'Öl und Gas bleiben wichtig, doch auch Handel, Luftfahrt, Tourismus und Immobilien tragen stark zur Wirtschaft bei.',
        'Die VAE sind eine föderale Erbmonarchie, in der die Herrscher der Emirate gemeinsam den politischen Rahmen setzen.',
        'Das Land ist von Wüste, Küsten und einem heißen, trockenen Klima geprägt.',
        'Burj Khalifa, Palm Jumeirah und große Resorts machen die VAE zu einem weltweiten Reiseziel.',
        'Die emiratische Küche verbindet arabische Klassiker mit internationalen Einflüssen und arbeitet viel mit Reis, Gewürzen, Fisch und Fleisch.',
        'So stehen die VAE für wirtschaftliche Dynamik, starke Symbolorte und eine moderne Ausprägung regionaler Tradition.'
    ),
    'ar' => $full(
        'Argentinien liegt im Süden Südamerikas und ist für die Anden, die Pampas und die weiten Landschaften Patagoniens bekannt.',
        'Buenos Aires ist die Hauptstadt und kulturelle Metropole; Córdoba, Rosario und Mendoza prägen das Land zusätzlich.',
        'Europäische Einwanderung, vor allem aus Spanien und Italien, hat Sprache, Kultur und Alltag stark beeinflusst; die Unabhängigkeit wurde 1816 erklärt.',
        'Die Wirtschaft stützt sich auf Landwirtschaft, Rohstoffe und eine starke Produktion von Rindfleisch, Wein und Getreide.',
        'Argentinien ist eine föderale Republik mit repräsentativer Demokratie und wechselvollen politischen Entwicklungen.',
        'Vom subtropischen Norden bis zum kühlen Süden reicht eine große Bandbreite an Klima- und Landschaftszonen.',
        'Iguazú, Patagonien und die Kulturszene von Buenos Aires ziehen viele Reisende an.',
        'Typisch sind Asado, Rindfleischgerichte und Weine mit deutlich europäisch geprägter Kochtradition.',
        'Argentinien verbindet große Naturräume mit einer starken urbanen Kultur und einer tief verwurzelten Fußballleidenschaft.'
    ),
    'ro' => $full(
        'Rumänien liegt zwischen Mittel-, Ost- und Südosteuropa am Schwarzen Meer und vereint vielfältige historische Einflüsse.',
        'Bukarest ist Hauptstadt und größte Stadt; Cluj-Napoca, Timișoara und Iași sind weitere wichtige Zentren.',
        'Die Lage zwischen verschiedenen Reichen prägte das Land, von der römischen Zeit Trajans bis zu osmanischen und habsburgischen Einflüssen sowie der Dracula-Legende.',
        'Seit dem EU-Beitritt 2007 ist die Wirtschaft gewachsen, besonders durch Industrie, IT, Telekommunikation und Export.',
        'Rumänien ist eine semipräsidentielle Republik, in der Präsident und Ministerpräsident die Exekutive teilen.',
        'Karpaten, Hügelland und Donaudelta schaffen eine abwechslungsreiche Landschaft mit kontinentalem Klima.',
        'Bran, die Kirchen von Maramureș und die Klöster der Bukowina gehören zu den bekanntesten Zielen.',
        'Sarmale, Mămăligă und Cozonac stehen für eine bodenständige Küche mit regionaler Vielfalt.',
        'Rumänien verbindet geschichtliche Tiefe, kulturelle Vielfalt und moderne Entwicklung auf markante Weise.'
    ),
    'au' => $full(
        'Australien ist ein Inselkontinent mit einzigartiger Tierwelt, sehr unterschiedlichen Naturräumen und einer stark multikulturellen Gesellschaft.',
        'Canberra ist die Hauptstadt, während Sydney, Melbourne und Brisbane die wichtigsten urbanen Zentren bilden.',
        'Die Geschichte Australiens verbindet das Erbe der indigenen Völker mit europäischer Besiedlung und modernen Einwanderungsgesellschaften.',
        'Bergbau, Landwirtschaft, Technologie und Tourismus tragen wesentlich zu einer stabilen und wohlhabenden Wirtschaft bei.',
        'Australien ist eine parlamentarische Demokratie mit ausgeprägtem Bekenntnis zu Rechtsstaatlichkeit und sozialem Ausgleich.',
        'Vom trockenen Outback bis zu Regenwald und Küste reicht eine breite Palette an Klima- und Landschaftsformen.',
        'Das Great Barrier Reef, Nationalparks und die Küstenstädte sind zentrale Attraktionen.',
        'Die Küche verbindet lokale Produkte mit Einflüssen aus Asien, Europa und indigener Tradition.',
        'Australien steht für Naturspektakel, offene Gesellschaft und eine starke Mischung aus Tradition und Innovation.'
    ),
    'be' => $full(
        'Belgien ist ein kleines, aber einflussreiches Land in Westeuropa mit historischen Städten und dichter kultureller Vielfalt.',
        'Brüssel ist Hauptstadt und internationales Zentrum; Brügge, Gent und Antwerpen prägen das Land zusätzlich.',
        'Französische, niederländische und regionale Traditionen haben Sprache, Kunst und Alltag nachhaltig geprägt.',
        'Dienstleistungen, Industrie und Handel bilden die Grundlage einer stark vernetzten Wirtschaft.',
        'Belgien ist eine föderale konstitutionelle Monarchie mit ausgeprägter regionaler Eigenständigkeit.',
        'Das Land besitzt ein gemäßigtes Klima, historische Städte und eine abwechslungsreiche Kulturlandschaft.',
        'Mittelalterliche Altstädte, Museen und kulinarische Highlights ziehen Besucher aus aller Welt an.',
        'Belgische Schokolade, Waffeln und Bier sind international bekannte Aushängeschilder.',
        'Belgien verbindet historischen Charme mit moderner Politik und wirtschaftlicher Bedeutung im Herzen Europas.'
    ),
    'bg' => $full(
        'Bulgarien ist ein Balkanland mit langer Geschichte und Einflüssen aus thrakischer, griechischer, römischer und osmanischer Zeit.',
        'Sofia ist Hauptstadt und größte Stadt; Plowdiw und Warna zeigen die kulturelle Vielfalt des Landes.',
        'Volksmusik, Tanz, orthodoxe Traditionen und historisches Erbe prägen die kulturelle Identität Bulgariens.',
        'IT, Industrie und Landwirtschaft gewinnen an Gewicht und werden von fortlaufenden Reformen begleitet.',
        'Bulgarien ist eine parlamentarische Republik und stark auf europäische Integration ausgerichtet.',
        'Gebirge, Wälder und die Schwarzmeerküste sorgen für eine abwechslungsreiche Landschaft und deutliche Jahreszeiten.',
        'Antike Stätten, historische Städte und Naturziele machen das Land für Kultur- und Naturreisen attraktiv.',
        'Banitsa, Schopska-Salat und weitere herzhafte Gerichte prägen die bulgarische Küche.',
        'Bulgarien verbindet tiefes historisches Erbe mit einem klaren Modernisierungskurs.'
    ),
    'br' => $full(
        'Brasilien ist das größte Land Südamerikas und steht für enorme kulturelle Vielfalt, große Städte und spektakuläre Natur.',
        'Rio de Janeiro, São Paulo und Salvador gehören zu den bekanntesten urbanen Zentren des Landes.',
        'Aus der portugiesischen Kolonie entstand eine föderale Republik, deren Kultur von indigenen, afrikanischen und europäischen Einflüssen lebt.',
        'Landwirtschaft, Bergbau, Industrie und Dienstleistungen tragen eine der größten Volkswirtschaften der Region.',
        'Brasilien ist ein föderaler demokratischer Staat mit komplexem sozialen und politischen Gefüge.',
        'Amazonasregenwald, Feuchtgebiete und lange Küsten sorgen für sehr unterschiedliche Naturräume und Klimate.',
        'Christusstatue, Iguazú-Fälle und große Feste wie der Karneval machen Brasilien weltweit bekannt.',
        'Feijoada, Churrasco und zahlreiche regionale Spezialitäten prägen die brasilianische Küche.',
        'Brasilien steht für Kontraste, Lebensfreude und eine starke kulturelle Ausstrahlung.'
    ),
    'ca' => $full(
        'Kanada ist ein sehr großes Land mit eindrucksvollen Naturräumen, starker Einwanderungsgesellschaft und demokratischer Stabilität.',
        'Ottawa ist die Hauptstadt, während Toronto, Vancouver und Montreal wichtige kulturelle und wirtschaftliche Zentren sind.',
        'Indigenes Erbe und britische wie französische Einflüsse haben die Geschichte und Identität Kanadas geprägt.',
        'Rohstoffe, Technologie und Dienstleistungen stützen eine der fortgeschrittensten Volkswirtschaften der Welt.',
        'Kanada ist eine stabile parlamentarische Demokratie mit starkem Fokus auf Rechtsstaatlichkeit und Nachhaltigkeit.',
        'Gebirge, Wälder, Seen und große Klimaunterschiede prägen das Land von Küste zu Küste.',
        'Niagara, Banff und viele Festivals ziehen Millionen Besucher an.',
        'Die Küche verbindet regionale Traditionen mit Einflüssen aus vielen Einwanderungskulturen.',
        'Kanada steht für Naturfülle, gesellschaftliche Offenheit und hohe Lebensqualität.'
    ),
    'ch' => $full(
        'Die Schweiz liegt im Herzen Europas und ist für Alpen, hohen Lebensstandard und politische Stabilität bekannt.',
        'Bern ist Hauptstadt; Zürich und Genf sind wichtige Zentren für Wirtschaft, Diplomatie und Kultur.',
        'Direkte Demokratie und der Austausch zwischen deutsch-, französisch-, italienisch- und rätoromanischsprachigen Regionen prägen das Land.',
        'Präzisionsindustrie, Pharma, Banken und Hightech sichern eine sehr leistungsfähige Wirtschaft.',
        'Die Schweiz ist eine föderale Republik mit stark konsensorientierter Politik.',
        'Alpen, Seen und Hügelland prägen die Landschaft; das Klima variiert je nach Region stark.',
        'Matterhorn, Genfersee und historische Städte machen die Schweiz touristisch besonders attraktiv.',
        'Fondue, Raclette und Schokolade gehören zu den bekanntesten kulinarischen Symbolen.',
        'Die Schweiz vereint Natur, Wohlstand und politische Verlässlichkeit in sehr markanter Form.'
    ),
    'ci' => $full(
        "Côte d'Ivoire ist ein westafrikanisches Land mit reicher kultureller Vielfalt und wachsender wirtschaftlicher Bedeutung.",
        'Yamoussoukro ist politische Hauptstadt, Abidjan das größte wirtschaftliche und kulturelle Zentrum.',
        'Viele Ethnien und die Kolonialzeit haben Musik, Kunst, Feste und gesellschaftliche Traditionen geprägt.',
        'Die Wirtschaft beruht stark auf Landwirtschaft, besonders Kakao, Kaffee und Palmöl, erweitert sich aber auch industriell.',
        'Das Land arbeitet an politischer Stabilität und wirtschaftlicher Diversifizierung.',
        'Küstenebenen, Wälder und Savannen prägen die Landschaft bei tropischem Klima.',
        'Märkte, Festivals und historische Orte geben Einblick in die kulturelle Vielfalt des Landes.',
        'Attiéké und Kedjenou sind bekannte Beispiele für die ivorische Küche.',
        "Côte d'Ivoire verbindet kulturelle Lebendigkeit mit wirtschaftischem Aufbruch."
    ),
    'cl' => $full(
        'Chile ist ein langes, schmales Land an der Westküste Südamerikas und reicht von der Atacama bis nach Patagonien.',
        'Santiago ist das politische und wirtschaftliche Zentrum; andere Regionen zeigen ganz eigene Natur- und Kulturräume.',
        'Unabhängigkeitsgeschichte, Modernisierung und eine Mischung aus indigener und europäischer Tradition prägen das Land.',
        'Bergbau, Landwirtschaft, Fischerei, Dienstleistungen und Weinbau tragen eine robuste Wirtschaft.',
        'Chile ist eine demokratische Republik, die ihre Institutionen und soziale Entwicklung weiter ausbaut.',
        'Von extremer Trockenheit bis zu Gletschern bietet Chile außergewöhnlich vielfältige Klima- und Landschaftsformen.',
        'Nationalparks, Kolonialarchitektur und Weinregionen zählen zu den wichtigsten Zielen.',
        'Die chilenische Küche setzt auf Fisch, Fleisch und regionale Zutaten aus sehr unterschiedlichen Landschaften.',
        'Chile verbindet geografische Extreme mit politischer und kultureller Eigenständigkeit.'
    ),
    'cm' => $full(
        'Kamerun wird oft als Afrika im Kleinen bezeichnet, weil es kulturell und geografisch sehr vielfältig ist.',
        'Yaoundé ist Hauptstadt, Douala das wirtschaftliche Zentrum des Landes.',
        'Verschiedene Kulturen und koloniale Einflüsse haben Sprache, Bräuche, Musik und Kunst stark geprägt.',
        'Landwirtschaft, Öl und Rohstoffe bleiben wichtig, während Modernisierung und Industrialisierung langsam voranschreiten.',
        'Kamerun arbeitet trotz struktureller Herausforderungen an staatlicher Stabilität und wirtschaftlicher Entwicklung.',
        'Regenwald, Vulkane, Savanne und Küstenräume liegen in engem Nebeneinander unter tropischem Klima.',
        'Feste, Musik und traditionelle Kleidung machen die kulturelle Vielfalt des Landes sichtbar.',
        'Die Küche ist regional unterschiedlich und nutzt reichlich lokale Erzeugnisse und Gewürze.',
        'Kamerun steht exemplarisch für die landschaftliche und kulturelle Vielfalt Zentralafrikas.'
    ),
    'cn' => $full(
        'China ist ein sehr großes und historisch altes Land in Ostasien mit enormem Einfluss auf Weltgeschichte, Kultur und Wirtschaft.',
        'Peking ist das politische Zentrum; Shanghai und Shenzhen stehen für Chinas moderne Urbanität und Wirtschaftskraft.',
        'Philosophie, Wissenschaft, Kunst und Erfindungen wie Papier und Druck prägen Chinas historische Bedeutung bis heute.',
        'Durch tiefgreifende Reformen ist China zu einer globalen Industrie- und Technologiemacht geworden.',
        'China ist ein Einparteienstaat, der politische Stabilität eng mit wirtschaftischer Entwicklung verknüpft.',
        'Gebirge, Wüsten, Flusstäler und viele Klimazonen machen die Geografie außerordentlich vielfältig.',
        'Große Mauer, Tempel, historische Städte und moderne Metropolen ziehen Besucher in großer Zahl an.',
        'Die chinesische Küche ist regional sehr unterschiedlich und weltweit für ihre Vielfalt bekannt.',
        'China verbindet jahrtausendealte Zivilisation mit starkem Modernisierungstempo.'
    ),
    'co' => $full(
        'Kolumbien liegt im Nordwesten Südamerikas und vereint Anden, Tropenwald und Karibikküste auf engem Raum.',
        'Bogotá ist Hauptstadt; Medellín und Cali stehen für städtische Dynamik und kulturelle Kreativität.',
        'Indigenes Erbe, spanische Kolonialzeit und moderne Kulturformen prägen die kolumbianische Identität.',
        'Industrie, Dienstleistungen, Tourismus und Kaffeeexporte tragen wesentlich zum Wachstum des Landes bei.',
        'Kolumbien ist eine demokratische Republik, die Reformen und soziale Entwicklung vorantreibt.',
        'Gebirge, Tiefland und Küsten schaffen eine außergewöhnliche klimatische und ökologische Vielfalt.',
        'Historische Viertel, Kaffeeregionen und Naturziele zählen zu den großen Attraktionen.',
        'Die Küche ist regional breit gefächert und arbeitet mit vielen lokalen Produkten und kräftigen Gerichten.',
        'Kolumbien steht für kulturelle Lebendigkeit, landschaftliche Vielfalt und großen gesellschaftlichen Wandel.'
    ),
    'cz' => $full(
        'Tschechien ist ein mitteleuropäisches Land mit gut erhaltener historischer Architektur und lebendiger Gegenwartskultur.',
        'Prag ist die weltbekannte Hauptstadt; Brünn und Ostrava ergänzen das urbane Profil des Landes.',
        'Böhmische Traditionen, europäische Einflüsse und eine starke Kultur in Musik, Literatur und Kunst prägen das Land.',
        'Industrie, Technologie und Dienstleistungen bilden eine solide, exportorientierte Wirtschaft.',
        'Tschechien ist eine stabile parlamentarische Republik mit klarer europäischer Verankerung.',
        'Hügelland, Flusstäler und Wälder treffen auf ein gemäßigtes Klima mit vier Jahreszeiten.',
        'Burgen, Altstädte und Festivals machen das Land zu einem attraktiven Reiseziel.',
        'Herzhafte Gerichte, Knödel, Gulasch und Bier gehören zur kulinarischen Identität.',
        'Tschechien verbindet historisches Erbe mit moderner wirtschaftlicher und kultureller Dynamik.'
    ),
    'de' => $full(
        'Deutschland ist eine führende europäische Nation mit starkem historischem Erbe, hoher Industriekraft und großer kultureller Ausstrahlung.',
        'Berlin ist die Hauptstadt; München, Frankfurt und Hamburg sind weitere wichtige Zentren für Wirtschaft und Kultur.',
        'Von Kaiserzeit und Teilung bis zur Wiedervereinigung hat Deutschland eine prägende und zugleich vielschichtige Geschichte erlebt.',
        'Die Wirtschaft gehört zu den größten der Welt und ist besonders stark in Industrie, Maschinenbau, Technik und Export.',
        'Deutschland ist eine föderale parlamentarische Republik und ein zentraler Akteur in der Europäischen Union.',
        'Das Land bietet Küsten, Mittelgebirge, Flusstäler und ein gemäßigtes Klima.',
        'Brandenburger Tor, Neuschwanstein und zahlreiche Museen und Feste sind bedeutende Anziehungspunkte.',
        'Brezeln, Würste, Bier und viele regionale Spezialitäten prägen die deutsche Küche.',
        'Deutschland verbindet technologische Stärke mit kultureller Tiefe und politischer Stabilität.'
    ),
    'dk' => $full(
        'Dänemark ist ein skandinavisches Land mit hoher Lebensqualität, maritimer Prägung und klarem Designprofil.',
        'Kopenhagen ist die Hauptstadt; weitere Städte und Inselräume ergänzen das ausgewogene Stadt-Land-Gefüge.',
        'Von den Wikingern bis zur Gegenwart reichen Traditionen, die in Kultur, Alltagsleben und Gestaltung sichtbar bleiben.',
        'Industrie, erneuerbare Energien und Dienstleistungen stützen eine leistungsfähige Wohlstandswirtschaft.',
        'Dänemark ist eine konstitutionelle Monarchie mit starker demokratischer und sozialstaatlicher Tradition.',
        'Flache Küsten, Inseln und ein maritimes Klima prägen die Landschaft.',
        'Kopenhagens Altstadt, Küstenorte und Museen gehören zu den wichtigsten Zielen.',
        'Smørrebrød und eine auf Qualität und Regionalität setzende Küche sind typisch für Dänemark.',
        'Dänemark steht für soziale Stabilität, Gestaltungskraft und Nähe zum Meer.'
    ),
    'dz' => $withoutCuisine(
        'Algerien ist das flächenmäßig größte Land Afrikas und verbindet Mittelmeerküste, Hochland und Sahara.',
        'Algier ist politisches und kulturelles Zentrum; Oran und Constantine zählen zu den wichtigsten Städten.',
        'Berberische, arabische und französische Einflüsse prägen Geschichte, Architektur und kulturelle Ausdrucksformen des Landes.',
        'Öl und Erdgas dominieren die Wirtschaft, während gleichzeitig an mehr Diversifizierung gearbeitet wird.',
        'Algerien ist eine Republik mit postkolonialer Geschichte und laufenden sozialen und wirtschaftlichen Reformen.',
        'Wüste, Gebirge und Küstenräume sorgen für große landschaftliche Gegensätze bei überwiegend trockenem Klima.',
        'Römische Ruinen, traditionelle Märkte und weite Naturräume bieten markante Reiseeindrücke.',
        'Algerien steht für große landschaftliche Kontraste und ein tief verwurzeltes historisches Erbe.'
    ),
    'ec' => $withoutCuisine(
        'Ecuador liegt am Äquator in Südamerika und vereint Anden, Amazonasgebiet und Pazifikküste auf kleinem Raum.',
        'Quito ist die Hauptstadt mit starkem kolonialem Erbe, während Guayaquil das wirtschaftliche Zentrum bildet.',
        'Indigene Traditionen, vorkoloniale Kulturen und die spanische Kolonialzeit prägen die Identität des Landes.',
        'Landwirtschaft, Erdöl und Tourismus, besonders im Umfeld der Galápagos-Inseln, sind zentrale Wirtschaftsfaktoren.',
        'Ecuador ist eine demokratische Republik, die sich mit Ungleichheit und Umweltschutz zugleich auseinandersetzt.',
        'Hochgebirge, Regenwald und Küstenregionen schaffen je nach Region sehr unterschiedliche Klimaräume.',
        'Galápagos, koloniale Altstädte und Vulkanlandschaften zählen zu den bekanntesten Attraktionen.',
        'Ecuador fasziniert durch seine dichte landschaftliche Vielfalt und sein starkes kulturelles Erbe.'
    ),
    'eg' => $withoutCuisine(
        'Ägypten liegt zwischen Nordafrika und dem Nahen Osten und gehört zu den historisch prägendsten Zivilisationen der Welt.',
        'Kairo ist die lebendige Hauptstadt; Alexandria und Luxor sind weitere bedeutende historische Zentren.',
        'Pyramiden, Tempel und die Nilkultur stehen für ein sehr frühes und bis heute wirkmächtiges Zivilisationserbe.',
        'Tourismus, Landwirtschaft und Industrie sind wichtige Säulen der ägyptischen Wirtschaft.',
        'Ägypten ist eine Republik, die zwischen historischem Gewicht, Reformbedarf und moderner Staatsführung balanciert.',
        'Der Nil, große Wüstenräume und die Mittelmeerküste prägen die Geografie bei überwiegend trockenem Klima.',
        'Gizeh, Luxor und viele antike Stätten machen Ägypten zu einem weltweit herausragenden Reiseziel.',
        'Ägypten verbindet antike Monumentalität mit einer weiterhin zentralen Rolle in der Region.'
    ),
    'es' => $full(
        'Spanien liegt auf der Iberischen Halbinsel und ist für seine reiche Geschichte, starken Regionalkulturen und vielfältigen Landschaften bekannt.',
        'Madrid ist die Hauptstadt; Barcelona, Sevilla und Valencia gehören zu den prägenden Städten des Landes.',
        'Römische, maurische und moderne europäische Einflüsse haben Architektur, Feste und kulturelle Identität Spaniens geformt.',
        'Tourismus, Landwirtschaft, Dienstleistungen und Industrie bilden eine breite wirtschaftliche Grundlage.',
        'Spanien ist eine parlamentarische Monarchie mit gefestigter demokratischer Ordnung.',
        'Küsten, Gebirge und weite Ebenen gehen mit überwiegend mediterranen Klimaverhältnissen einher.',
        'Historische Städte, Flamenco, Strände und bedeutende Baudenkmäler ziehen Reisende aus aller Welt an.',
        'Tapas, Paella und regionale Weine stehen für die große kulinarische Vielfalt Spaniens.',
        'Spanien verbindet starke regionale Identitäten mit internationaler kultureller Strahlkraft.'
    ),
    'fr' => $full(
        'Frankreich steht wie kaum ein anderes Land für Kunst, Kultur, Kulinarik und historisches Gewicht in Europa.',
        'Paris ist die Hauptstadt; Lyon, Marseille und Bordeaux ergänzen das urbane und regionale Profil.',
        'Frankreich hat Philosophie, Kunst, Wissenschaft und politische Ideen in Europa und darüber hinaus stark geprägt.',
        'Industrie, Luxusgüter, Landwirtschaft, Dienstleistungen und Tourismus tragen eine vielseitige Wirtschaft.',
        'Frankreich ist eine Republik mit langer demokratischer Tradition und großem Einfluss in Europa und weltweit.',
        'Von Mittelmeerküste über Weinregionen bis zu Alpen und Pyrenäen reicht eine sehr abwechslungsreiche Geografie.',
        'Eiffelturm, Louvre, Provence und viele historische Städte machen Frankreich zu einem der meistbesuchten Länder der Welt.',
        'Baguette, Käse, Wein und Patisserie sind nur einige Symbole der französischen Esskultur.',
        'Frankreich verbindet kulturelle Raffinesse mit historischer Tiefe und politischer Bedeutung.'
    ),
    'en' => $full(
        'England ist ein historisch bedeutender Teil des Vereinigten Königreichs und hat Sprache, Politik und Kultur weltweit geprägt.',
        'London ist die Hauptstadt; Manchester, Birmingham und Liverpool gehören zu den wichtigsten weiteren Städten.',
        'Literatur, Wissenschaft, Empire-Geschichte und kulturelle Institutionen haben England nachhaltig geprägt.',
        'Finanzen, Technologie, Kreativwirtschaft und Dienstleistungen tragen eine vielfältige Wirtschaft.',
        'England ist Teil des Vereinigten Königreichs und lebt in einem stabilen demokratischen und monarchischen Rahmen.',
        'Hügelland, Küsten und historische Städte liegen in einem gemäßigten Klima mit klaren Jahreszeiten.',
        'London, Burgen, Herrenhäuser und Küstenlandschaften zählen zu den wichtigsten Sehenswürdigkeiten.',
        'Klassische Braten, Yorkshire Pudding und moderne internationale Einflüsse prägen die Küche.',
        'England verbindet Tradition, urbane Dynamik und anhaltenden globalen Einfluss.'
    ),
    'sc' => $simple(
        'Schottland ist ein Land mit rauen Landschaften, tiefem Geschichtsbewusstsein und starkem kulturellen Eigenprofil im Norden des Vereinigten Königreichs.',
        'Edinburgh, Glasgow und die Highlands stehen für ein Land, dessen Geschichte, Sprache und politische Entwicklung eine unverwechselbare Identität hervorgebracht haben; zugleich wachsen Branchen wie Tourismus, Technologie und erneuerbare Energien.',
        'Kulturelles Erbe:',
        'Dudelsackmusik, Highland Games, Literatur und eine sehr eigenständige Alltagskultur prägen das Bild Schottlands bis heute.',
        'Schottland verbindet Naturdramatik, kulturelle Dichte und eine klar erkennbare nationale Handschrift.'
    ),
    'gh' => $simple(
        'Ghana ist ein westafrikanisches Land mit großer historischer Bedeutung, lebendiger Kulturszene und stabiler demokratischer Entwicklung.',
        'Accra und andere Regionen des Landes zeigen eine Geschichte, die von mächtigen Reichen, Handel und einer reichen Musik-, Tanz- und Kunsttradition geprägt wurde; zugleich tragen Rohstoffe, Landwirtschaft und Dienstleistungen die Wirtschaft.',
        'Politische Landschaft:',
        'Ghana gilt als eine der stabilsten Demokratien Westafrikas und setzt auf Entwicklung, Teilhabe und institutionelle Kontinuität.',
        'Ghana verbindet kulturelle Tiefe, politische Stabilität und wirtschaftliches Potenzial auf überzeugende Weise.'
    ),
    'gr' => $simple(
        'Griechenland gilt als Wiege der westlichen Zivilisation und verbindet antike Stätten mit Inselwelt und mediterraner Lebensart.',
        'Athen, die Inseln und viele Festlandregionen verweisen auf eine lange Geschichte in Philosophie, Politik und Kunst; Tourismus, Schifffahrt, Landwirtschaft und Dienstleistungen sind wichtige wirtschaftliche Träger.',
        'Kulturelle Identität:',
        'Feste, starke Gemeinschaften und eine Küche mit mediterranem Charakter spiegeln die Verbindung von antiker Tradition und modernem Alltag.',
        'Griechenland bleibt ein Land, in dem historische Größe und landschaftliche Schönheit eng zusammenwirken.'
    ),
    'hr' => $full(
        'Kroatien liegt an der Adria und ist für klare Küstengewässer, historische Städte und starkes Kulturerbe bekannt.',
        'Zagreb ist die Hauptstadt; Split und Dubrovnik prägen das Bild des Landes an der Küste.',
        'Römische, venezianische und andere europäische Einflüsse haben Kunst, Baukultur und regionale Traditionen geprägt.',
        'Tourismus, Industrie und Landwirtschaft tragen eine Wirtschaft, die sich weiter modernisiert.',
        'Kroatien ist eine parlamentarische Republik und fest in europäische Strukturen eingebunden.',
        'Gebirge, Inseln, Küsten und Binnenland sorgen für große landschaftliche Vielfalt im mediterranen und kontinentalen Übergang.',
        'Dubrovnik, historische Altstädte und Küstenlandschaften sind zentrale Touristenmagnete.',
        'Frischer Fisch, lokale Weine und mediterran geprägte Speisen bestimmen viele Regionen.',
        'Kroatien verbindet Küstenschönheit, historische Dichte und modernen europäischen Kurs.'
    ),
    'il' => $full(
        'Israel ist ein Land mit großer historischer und religiöser Bedeutung an der Schnittstelle von Afrika, Asien und Europa.',
        'Jerusalem ist religiöses Zentrum von Weltrang, während Tel Aviv für Modernität, Technologie und urbanes Leben steht.',
        'Biblische Überlieferungen, antike Geschichte und vielfältige Einwanderung haben eine komplexe kulturelle Identität geschaffen.',
        'Technologie, Landwirtschaft und Forschung tragen eine sehr innovationsstarke Wirtschaft.',
        'Israel ist ein demokratischer Staat mit dynamischer Innenpolitik und großer regionaler Bedeutung.',
        'Von Wüste bis Mittelmeerküste reichen sehr unterschiedliche Landschaften und Klimaräume.',
        'Jerusalem, die Westmauer, historische Kirchen und lebendige Märkte gehören zu den wichtigsten Zielen.',
        'Falafel, Hummus, frisches Gemüse und viele Einflüsse aus dem Nahen Osten prägen die Küche.',
        'Israel verbindet jahrtausendealte Geschichte mit hoher Gegenwartsdynamik und Innovationskraft.'
    ),
    'in' => $full(
        'Indien ist ein sehr großes und vielfältiges Land in Südasien mit alten Zivilisationen und starkem wirtschaftlichem Wandel.',
        'Neu-Delhi ist die Hauptstadt; Mumbai, Bengaluru und Kolkata prägen die urbane und wirtschaftliche Landschaft mit.',
        'Religionen, Sprachen, Reiche und Kolonialerfahrung haben eine außergewöhnlich vielschichtige Kultur hervorgebracht.',
        'IT, Landwirtschaft, Industrie und Dienstleistungen tragen eine stark wachsende Volkswirtschaft.',
        'Indien ist die größte Demokratie der Welt und verbindet politische Vielfalt mit komplexen gesellschaftlichen Herausforderungen.',
        'Vom Himalaya bis zu Tropenküsten und Wüsten reicht eine enorme landschaftliche und klimatische Spannweite.',
        'Taj Mahal, Feste und sehr unterschiedliche Kulturregionen machen Indien touristisch einzigartig.',
        'Die indische Küche ist regional stark differenziert und für Gewürzvielfalt und komplexe Aromen bekannt.',
        'Indien vereint alte Traditionen, demografische Größe und großes Zukunftspotenzial.'
    ),
    'ie' => $full(
        'Irland ist ein Inselstaat im Nordwesten Europas und bekannt für grüne Landschaften, Erzähltraditionen und große kulturelle Wärme.',
        'Dublin ist die Hauptstadt; Cork, Galway und Limerick tragen das regionale Profil des Landes mit.',
        'Keltische Wurzeln, Wikingerzeit und britischer Einfluss haben Irlands Geschichte und Identität tief geprägt.',
        'Technologie, Pharma und Finanzdienstleistungen machen Irland zu einer dynamischen modernen Volkswirtschaft.',
        'Irland ist eine parlamentarische Demokratie mit klarer europäischer Orientierung und starker gesellschaftlicher Offenheit.',
        'Hügel, Küsten und ein maritimes Klima prägen die Landschaft der Insel.',
        'Cliffs of Moher, Burgen und das literarische Dublin gehören zu den großen Attraktionen.',
        'Eintöpfe, Soda Bread und Fischgerichte spiegeln die landwirtschaftlichen und maritimen Traditionen wider.',
        'Irland verbindet Natur, kulturelle Tiefe und moderne wirtschaftliche Dynamik sehr überzeugend.'
    ),
    'it' => $full(
        'Italien ist weltweit bekannt für Kunst, Geschichte, Mode und eine bis in die Antike reichende Kulturlandschaft.',
        'Rom ist die Hauptstadt; Florenz, Venedig und Mailand prägen Italien kulturell, touristisch und wirtschaftlich stark.',
        'Von Rom und der Renaissance bis zur Moderne hat Italien Europas Kultur- und Ideengeschichte maßgeblich mitgestaltet.',
        'Mode, Industrie, Handwerk, Tourismus und regionale Produktion tragen die Wirtschaft des Landes.',
        'Italien ist eine demokratische Republik mit starker regionaler Vielfalt und hohem internationalem Gewicht.',
        'Küsten, Gebirge, Ebenen und Weinregionen sorgen für große geographische Vielfalt bei mediterraner Prägung.',
        'Kolosseum, Venedig, Pisa und zahllose historische Städte ziehen jedes Jahr Millionen Menschen an.',
        'Pasta, Pizza, Gelato und starke regionale Traditionen machen die italienische Küche weltweit prägend.',
        'Italien verbindet historische Fülle, ästhetische Strahlkraft und lebendige Alltagskultur.'
    ),
    'jm' => $full(
        'Jamaika ist eine karibische Insel mit tropischer Landschaft, großer Musikkultur und ausgeprägter kultureller Eigenständigkeit.',
        'Kingston ist Hauptstadt und musikalisches Zentrum; Montego Bay und Ocho Rios sind wichtige touristische Orte.',
        'Afrikanische, europäische und indigene Einflüsse formten eine Kultur, die weltweit vor allem mit Reggae verbunden wird.',
        'Tourismus, Landwirtschaft und Bergbau tragen die Wirtschaft, ergänzt durch kreative Branchen.',
        'Jamaika ist eine parlamentarische Demokratie mit starkem kulturellem Selbstbewusstsein.',
        'Tropische Vegetation, Strände und Hügelland prägen Landschaft und Klima.',
        'Strände, Wasserfälle, Musikfeste und koloniale Spuren gehören zu den wichtigsten Attraktionen.',
        'Jerk Chicken, Currygerichte und Ackee mit Salzfisch stehen exemplarisch für die jamaikanische Küche.',
        'Jamaika verbindet Rhythmus, Natur und kulturelle Ausstrahlung auf unverwechselbare Weise.'
    ),
    'jp' => $full(
        'Japan ist ein Inselstaat in Ostasien, der alte Traditionen und extreme Modernität besonders eng miteinander verbindet.',
        'Tokio ist die Hauptstadt; Kyoto und Nara stehen zusätzlich für das historische und kulturelle Gedächtnis des Landes.',
        'Von der Samurai-Zeit bis zur Nachkriegsmoderne entwickelte Japan eine starke kulturelle Identität mit ausgeprägtem Sinn für Form, Ritual und Erneuerung.',
        'Japan gehört zu den größten Volkswirtschaften der Welt und ist stark in Industrie, Elektronik und Technologie.',
        'Das Land ist eine konstitutionelle Monarchie mit parlamentarischem System und stabilen Institutionen.',
        'Gebirge, Küsten und verschiedene Klimazonen prägen den langgestreckten Inselraum.',
        'Tempel, Gärten, Metropolen und Kulturlandschaften machen Japan touristisch besonders vielseitig.',
        'Sushi, Ramen und Tempura stehen für eine Küche, die Präzision und Produktqualität betont.',
        'Japan verbindet kulturelle Kontinuität, technologische Stärke und hohe ästhetische Sensibilität.'
    ),
    'kr' => $full(
        'Südkorea ist ein dynamisches Land in Ostasien, das technologische Modernisierung und kulturelle Tradition besonders eng verbindet.',
        'Seoul ist die Hauptstadt; Busan und Incheon ergänzen die wirtschaftlich starke urbane Landschaft.',
        'Nach tiefgreifenden Umbrüchen entwickelte sich Südkorea zu einer Bildungs-, Technologie- und Kulturmacht mit starker Gegenwartskultur.',
        'Industrie, Elektronik, Technologie und Unterhaltung treiben eine sehr leistungsfähige Wirtschaft an.',
        'Südkorea ist eine demokratische Republik mit klarem Fokus auf Transparenz, Wachstum und gesellschaftlichen Fortschritt.',
        'Städte, Küsten und Hügelland prägen die Landschaft in einem Klima mit ausgeprägten Jahreszeiten.',
        'Paläste, traditionelle Dörfer und moderne Stadtviertel gehören zu den wichtigsten Sehenswürdigkeiten.',
        'Kimchi, Barbecue und Bibimbap stehen für eine aromatische und international beliebte Küche.',
        'Südkorea vereint Tradition, Popkultur und Innovationskraft auf sehr sichtbare Weise.'
    ),
    'lv' => $full(
        'Lettland ist ein baltisches Land mit viel Natur, gut erhaltener Bausubstanz und klarer kultureller Eigenart.',
        'Riga ist Hauptstadt und wichtigstes Zentrum für Kultur, Wirtschaft und Geschichte.',
        'Verschiedene Nachbarn und Herrschaftszeiten haben Musik, Folklore und Alltagskultur Lettlands geprägt.',
        'Industrie, IT und Tourismus tragen zu einer stetig wachsenden Wirtschaft bei.',
        'Lettland ist eine parlamentarische Republik und eng in europäische Strukturen eingebunden.',
        'Wälder, Seen und die Ostseeküste prägen die Landschaft bei gemäßigtem Klima.',
        'Rigas Altstadt, Festivals und Naturziele machen das Land für Reisende interessant.',
        'Die lettische Küche ist bodenständig und setzt stark auf lokale Produkte und traditionelle Zubereitung.',
        'Lettland verbindet baltische Gelassenheit mit historischem Bewusstsein und moderner Entwicklung.'
    ),
    'ma' => $full(
        'Marokko ist ein nordafrikanisches Land mit lebendigen Städten, Atlasgebirge, Wüste und langer Kulturgeschichte.',
        'Rabat ist die Hauptstadt; Casablanca, Marrakesch und Fès gehören zu den prägenden Städten des Landes.',
        'Afrikanische, arabische und europäische Einflüsse formten eine reiche Kultur mit Medinas, Souks und kunstvoller Architektur.',
        'Landwirtschaft, Tourismus und Industrie bilden die Basis einer zunehmend diversifizierten Wirtschaft.',
        'Marokko ist eine konstitutionelle Monarchie, die Modernisierung mit starkem Traditionsbezug verbindet.',
        'Sahara, Gebirge und Küsten schaffen eine markante geographische Vielfalt.',
        'Historische Altstädte, Paläste und Märkte machen Marokko zu einem besonders atmosphärischen Reiseziel.',
        'Tajine, Couscous und aromatische Gewürze sind typisch für die marokkanische Küche.',
        'Marokko verbindet alte Handels- und Kulturwege mit moderner wirtschaftlicher Öffnung.'
    ),
    'mx' => $full(
        'Mexiko besitzt ein sehr reiches historisches Erbe, das von Maya, Azteken, Kolonialzeit und moderner Nationalkultur geprägt ist.',
        'Mexiko-Stadt ist Hauptstadt und größte Metropole; Guadalajara und Monterrey sind weitere bedeutende Zentren.',
        'Indigene Kulturen und spanische Einflüsse haben Feste, Kunst, Musik und gesellschaftliche Identität tief geprägt.',
        'Industrie, Landwirtschaft, Tourismus und Dienstleistungen tragen eine breit aufgestellte Volkswirtschaft.',
        'Mexiko ist eine föderale Republik, die sich politisch und gesellschaftlich weiterhin stark entwickelt.',
        'Wüsten, Gebirge, Regenwald und lange Küsten sorgen für außergewöhnlich vielfältige Naturräume.',
        'Antike Stätten, Kolonialarchitektur und Kulturstädte gehören zu den größten touristischen Anziehungspunkten.',
        'Tacos, Enchiladas, Mole und viele regionale Küchen machen Mexiko kulinarisch weltweit prägend.',
        'Mexiko verbindet kulturelle Tiefe, Naturreichtum und enorme regionale Vielfalt.'
    ),
    'ng' => $full(
        'Nigeria ist das bevölkerungsreichste Land Afrikas und ein zentrales wirtschaftliches und kulturelles Gewicht auf dem Kontinent.',
        'Abuja ist Hauptstadt, Lagos das größte wirtschaftliche Zentrum mit gewaltiger urbaner Dynamik.',
        'Zahlreiche Ethnien und Traditionen haben eine sehr vielfältige Kultur mit starker Musik-, Kunst- und Literaturszene hervorgebracht.',
        'Öl und Gas bleiben bedeutend, zugleich wachsen Technologie, Landwirtschaft und Unterhaltungswirtschaft stark.',
        'Nigeria ist eine föderale Republik, die zwischen großem Potenzial und erheblichen regionalen Herausforderungen steht.',
        'Regenwald, Savanne und Küstengebiete schaffen unterschiedliche Lebens- und Wirtschaftsräume.',
        'Historische Orte, Festivals und die kulturelle Vielfalt der Städte machen das Land besonders interessant.',
        'Jollof-Reis, Pounded Yam und Suya stehen exemplarisch für die nigerianische Küche.',
        'Nigeria steht für Energie, kulturelle Vielfalt und eine Schlüsselrolle in Afrikas Zukunft.'
    ),
    'nl' => $full(
        'Die Niederlande sind für Wasserlandschaften, innovative Stadtplanung und eine offene, handelsorientierte Kultur bekannt.',
        'Amsterdam ist die Hauptstadt; Rotterdam und Utrecht stehen für moderne Architektur und urbane Dynamik.',
        'Seefahrt, Handel, Kunst und wissenschaftliche Neugier haben die niederländische Geschichte stark geprägt.',
        'Technologie, Landwirtschaft, Logistik und Finanzen tragen eine sehr entwickelte Volkswirtschaft.',
        'Die Niederlande sind eine konstitutionelle Monarchie mit parlamentarischem System und ausgeprägter Konsenskultur.',
        'Flaches Land, Kanäle und Küstenräume prägen die Geografie bei maritimem Klima.',
        'Kanäle, Museen, historische Städte und charakteristische Landschaften ziehen viele Besucher an.',
        'Stroopwafels, Hering und Käse gehören zu den bekanntesten kulinarischen Symbolen.',
        'Die Niederlande verbinden Tradition, Innovationsfreude und Alltag am Wasser in besonderer Weise.'
    ),
    'no' => $full(
        'Norwegen ist ein skandinavisches Land mit Fjorden, großer Naturweite und sehr hohem Lebensstandard.',
        'Oslo ist die Hauptstadt; Bergen und Trondheim sind weitere wichtige kulturelle und wirtschaftliche Zentren.',
        'Wikingerzeit, Seefahrt und eine starke Naturverbundenheit prägen Norwegens kulturelle Identität.',
        'Energie, maritime Wirtschaft und Technologie tragen eine wohlhabende und stabile Volkswirtschaft.',
        'Norwegen ist eine konstitutionelle Monarchie mit transparentem parlamentarischem System.',
        'Fjorde, Gebirge und lange Küsten gehen mit deutlichen klimatischen Unterschieden zwischen Nord und Süd einher.',
        'Nordlichter, Fjordlandschaften und historische Orte machen Norwegen zu einem herausragenden Naturreiseziel.',
        'Frischer Fisch, herzhafte Gerichte und regionale Spezialitäten prägen die Küche.',
        'Norwegen verbindet Naturwucht, sozialstaatliche Stabilität und moderne wirtschaftliche Stärke.'
    ),
    'pe' => $full(
        'Peru ist ein Land großer alter Kulturen und spektakulärer Landschaften vom Andenhochland bis in den Amazonas.',
        'Lima ist die Hauptstadt; Cusco und Arequipa sind weitere prägende Kultur- und Wirtschaftsorte.',
        'Die Inka-Zivilisation und die spanische Kolonialzeit haben Kunst, Gesellschaft und kulturelle Selbstdeutung nachhaltig geprägt.',
        'Bergbau, Landwirtschaft, Tourismus und Industrie bilden die wirtschaftliche Basis des Landes.',
        'Peru ist eine demokratische Republik, die ihre Institutionen und soziale Teilhabe weiter stärken will.',
        'Anden, Regenwald und Pazifikküste sorgen für außergewöhnlich unterschiedliche Natur- und Klimaräume.',
        'Machu Picchu, historische Städte und viele archäologische Stätten machen Peru weltweit bekannt.',
        'Ceviche, Lomo Saltado und Produkte wie Quinoa zeigen die Vielfalt der peruanischen Küche.',
        'Peru verbindet alte Hochkultur, Naturreichtum und eine sehr lebendige Gegenwartskultur.'
    ),
    'pl' => $full(
        'Polen ist ein mitteleuropäisches Land mit widerstandsfähiger Geschichte, starker Kultur und abwechslungsreicher Landschaft.',
        'Warschau ist die Hauptstadt; Krakau und Danzig gehören zu den wichtigsten historischen und kulturellen Zentren.',
        'Teilungen, Kriege und Wiederaufbau prägten Polen, zugleich aber auch eine sehr starke nationale Identität in Literatur, Musik und Brauchtum.',
        'Industrie, Technologie und Dienstleistungen haben die Wirtschaft in den letzten Jahrzehnten deutlich modernisiert.',
        'Polen ist eine parlamentarische Republik und fest in europäische und internationale Strukturen eingebunden.',
        'Ebenen, Seen, Wälder und Mittelgebirge prägen das Land in gemäßigtem Klima.',
        'Altstädte, Gedenkorte und Kulturfeste machen Polen für Besucher historisch und kulturell besonders dicht.',
        'Pierogi, Bigos und Kiełbasa gehören zu den bekanntesten Gerichten der polnischen Küche.',
        'Polen verbindet historische Ernsthaftigkeit mit moderner Entwicklung und starker kultureller Selbstbehauptung.'
    ),
    'pt' => $full(
        'Portugal ist ein Land mit großer Seefahrtsgeschichte, starkem kulturellem Eigenprofil und langer Atlantikküste.',
        'Lissabon ist die Hauptstadt; Porto und Faro prägen weitere wichtige urbane Räume.',
        'Die Entdeckungszeit machte Portugal zu einer globalen Seemacht und prägte seine kulturelle und historische Identität bis heute.',
        'Tourismus, Landwirtschaft, Industrie und Technologie tragen die moderne Wirtschaft des Landes.',
        'Portugal ist eine demokratische Republik mit enger europäischer Einbindung.',
        'Küsten, Klippen und milde bis warme Klimaverhältnisse gehören zu den markantesten Landschaftsmerkmalen.',
        'Lissabon, Porto und die Küstenregionen sind zentrale Reiseziele.',
        'Bacalhau, Caldo Verde und Pastéis de Nata stehen für die portugiesische Küche.',
        'Portugal verbindet maritime Geschichte, landschaftliche Attraktivität und kulturelle Wärme.'
    ),
    'py' => $full(
        'Paraguay ist ein Binnenland im Herzen Südamerikas mit starkem indigenem Erbe und weitläufigen Flusslandschaften.',
        'Asunción ist Hauptstadt und eines der ältesten städtischen Zentren der Region; weitere Städte ergänzen das urbane Netz.',
        'Indigene Traditionen und koloniale Einflüsse haben Folklore, Musik, Handwerk und Alltagskultur nachhaltig geprägt.',
        'Die Wirtschaft ist stark landwirtschaftlich geprägt und baut auf Ackerbau, Viehzucht und natürlichen Ressourcen auf.',
        'Paraguay ist eine demokratische Republik, die ihre Institutionen und ihr wirtschaftliches Umfeld weiter stärkt.',
        'Ebenen, Flusstäler und subtropisches Klima prägen Natur und Nutzung des Landes.',
        'Kulturelle Orte und Naturziele geben Einblick in ein Land, das oft eher ruhig als spektakulär auftritt.',
        'Chipa und Sopa Paraguaya gehören zu den bekanntesten Gerichten der paraguayischen Küche.',
        'Paraguay verbindet stille landschaftliche Reize mit starker kultureller Kontinuität.'
    ),
    'qa' => $full(
        'Katar ist ein kleiner, wohlhabender Staat auf der Arabischen Halbinsel, der in kurzer Zeit stark modernisiert wurde.',
        'Doha ist Hauptstadt und Zentrum von Politik, Wirtschaft und Kultur; andere urbane Räume gewinnen ebenfalls an Gewicht.',
        'Katar verbindet beduinische Wurzeln mit einem schnellen Wandel hin zu globaler Sichtbarkeit und moderner Infrastruktur.',
        'Erdgas und Energieexporte prägen die Wirtschaft, die zugleich in Finanzen, Bildung und Tourismus investiert.',
        'Katar ist eine absolute Monarchie, die Modernisierung mit dem Erhalt traditioneller Werte verbindet.',
        'Wüste, Hitze und geringe Niederschläge bestimmen Geografie und Klima des Landes.',
        'Museen, Kulturzentren, Souks und die Skyline von Doha sind zentrale Anziehungspunkte.',
        'Die Küche verbindet traditionelle Aromen der Region mit international beeinflusster Gegenwartsgastronomie.',
        'Katar steht für schnellen Wandel, wirtschaftliche Stärke und regionale Sichtbarkeit.'
    ),
    'rs' => $full(
        'Serbien liegt auf dem Balkan an einer historischen Schnittstelle zwischen Ost- und Mitteleuropa.',
        'Belgrad ist die Hauptstadt; Novi Sad und Niš sind weitere wichtige kulturelle und wirtschaftliche Zentren.',
        'Byzantinische, osmanische und habsburgische Einflüsse haben Folklore, Musik und Selbstverständnis des Landes geprägt.',
        'Landwirtschaft, Industrie, Technologie und Dienstleistungen bilden eine gemischte Wirtschaft mit Reformkurs.',
        'Serbien ist eine parlamentarische Republik und arbeitet an weiterer demokratischer und wirtschaftlicher Annäherung an Europa.',
        'Ebenen, Hügel und Gebirge sorgen bei kontinentalem Klima für abwechslungsreiche Landschaften.',
        'Belgrad, Novi Sad und Naturziele wie der Đerdap-Nationalpark zählen zu den wichtigsten Attraktionen.',
        'Ćevapi, Sarma und Ajvar stehen für eine kräftige Küche mit regionalen Traditionen.',
        'Serbien verbindet vielschichtige Geschichte, kulturelle Eigenart und einen spürbaren Modernisierungswillen.'
    ),
    'ru' => $full(
        'Russland ist das flächenmäßig größte Land der Erde und reicht von Osteuropa bis weit nach Nordasien.',
        'Moskau ist die Hauptstadt, St. Petersburg das herausragende Kulturzentrum; weitere Großstädte prägen die immense regionale Vielfalt.',
        'Zarenzeit, Revolutionen und ein reiches Erbe in Literatur, Musik, Wissenschaft und Kunst prägen die Geschichte bis heute.',
        'Energie, Industrie und Technologie sind wichtige Säulen einer wirtschaftlich breit angelegten, rohstoffstarken Volkswirtschaft.',
        'Russland ist eine föderale semipräsidentielle Republik mit großer Bedeutung in internationalen Fragen.',
        'Tundra, Wälder, Flüsse und Gebirge schaffen extreme klimatische und geographische Unterschiede.',
        'Kreml, Roter Platz, Eremitage und die Weite der Landschaften gehören zu den bekanntesten Motiven des Landes.',
        'Borschtsch, Pelmeni und Blini stehen für eine herzhafte und regional sehr unterschiedliche Küche.',
        'Russland verbindet monumentale Räume, kulturelle Tiefe und eine lange, oft widersprüchliche historische Entwicklung.'
    ),
    'sa' => $full(
        'Saudi-Arabien ist ein führender Staat des Nahen Ostens mit großem Ölreichtum, islamischem Zentrum und raschem Modernisierungstempo.',
        'Riad ist die Hauptstadt; Dschidda und Dammam gehören zu den wichtigsten wirtschaftlichen und kulturellen Zentren.',
        'Als Ursprungsland des Islam und Heimat von Mekka und Medina ist Saudi-Arabien religiös und historisch von herausragender Bedeutung.',
        'Öl und Gas dominieren die Wirtschaft, doch Tourismus, Finanzen und Technologie sollen das Land breiter aufstellen.',
        'Saudi-Arabien ist eine absolute Monarchie, die traditionelle islamische Ordnung mit ausgewählten Reformen verbindet.',
        'Wüsten, Gebirge und die Küsten am Roten Meer prägen ein überwiegend heißes, trockenes Klima.',
        'Mekka, Medina und neue touristische Öffnungen machen das Land zunehmend sichtbarer für internationale Besucher.',
        'Kabsa, Mandi und würzige Reis- und Fleischgerichte stehen für die saudische Küche.',
        'Saudi-Arabien verbindet religiöse Zentralität, Rohstoffmacht und tiefgreifenden strukturellen Wandel.'
    ),
    'se' => $full(
        'Schweden ist ein nordisches Land mit hoher Lebensqualität, starker Gestaltungskultur und ausgeprägtem Umweltbewusstsein.',
        'Stockholm ist die Hauptstadt; Göteborg und Malmö ergänzen die urbanen Zentren des Landes.',
        'Von der Wikingerzeit bis zum modernen Wohlfahrtsstaat entwickelte Schweden eine Kultur mit starkem Gleichheits- und Gemeinsinn.',
        'Industrie, Technologie, Design und nachhaltige Energie tragen eine robuste Volkswirtschaft.',
        'Schweden ist eine konstitutionelle Monarchie mit transparentem parlamentarischem System.',
        'Wälder, Seen, Berge und die Ostseeküste prägen das Land; das Klima reicht von rau im Norden bis milder im Süden.',
        'Stockholm, Nationalparks und zahlreiche historische Orte ziehen Besucher aus vielen Ländern an.',
        'Fleischbällchen, Gravlax und knusprige Brote stehen für die schwedische Küche.',
        'Schweden verbindet soziale Stabilität, Innovationskraft und naturnahe Lebensqualität.'
    ),
    'tn' => $full(
        'Tunesien ist ein nordafrikanisches Land mit Mittelmeerküste, viel Geschichte und einer Lage zwischen Afrika und Europa.',
        'Tunis ist die Hauptstadt; Sfax und Sousse sind weitere wichtige wirtschaftliche und kulturelle Zentren.',
        'Karthago, römische Zeit, islamische Tradition und französische Einflüsse prägen das kulturelle Profil Tunesiens.',
        'Landwirtschaft, Tourismus und Industrie tragen die Wirtschaft, die weiter modernisiert werden soll.',
        'Tunesien gilt als wichtiger Referenzfall demokratischer Reform in der arabischen Welt, auch wenn der Weg komplex bleibt.',
        'Küste, Wüstenräume und fruchtbare Ebenen prägen das Land bei mediterranem bis trockenem Klima.',
        'Karthago, historische Medinas und Badeorte machen Tunesien touristisch vielseitig.',
        'Couscous, Brik und mit Harissa gewürzte Speisen stehen für die tunesische Küche.',
        'Tunesien verbindet antikes Erbe, Mittelmeerraum und modernes Reformstreben.'
    ),
    'tr' => $inlineConclusion(
        'Die Türkei ist ein transkontinentales Land zwischen Europa und Asien und seit Jahrtausenden ein Knotenpunkt von Reichen und Handelswegen.',
        'Ankara ist die Hauptstadt; Istanbul, Izmir und Bursa prägen das politische, wirtschaftliche und kulturelle Leben des Landes.',
        'Byzantinisches und osmanisches Erbe haben Architektur, Literatur, Musik und gesellschaftliche Traditionen der Türkei nachhaltig geprägt.',
        'Landwirtschaft, Textilien, Industrie und Tourismus sorgen für eine breit aufgestellte Wirtschaft mit großer regionaler Bedeutung.',
        'Die Türkei ist eine Republik mit starkem Präsidialsystem und anhaltenden politischen Reform- und Spannungsfeldern.',
        'Gebirge, Ebenen und lange Küsten am Mittelmeer und an der Ägäis schaffen sehr unterschiedliche Naturräume und Klimazonen.',
        'Hagia Sophia, Topkapi-Palast, Blaue Moschee, antike Stätten und Basare gehören zu den bekanntesten Sehenswürdigkeiten.',
        'Kebabs, Meze und Baklava prägen eine Küche, die Einflüsse aus Zentralasien, dem Nahen Osten und dem Mittelmeerraum verbindet.',
        'Die Türkei bleibt damit ein markanter Schnittpunkt von Geschichte, Kultur und wirtschaftischer Dynamik.'
    ),
    'ua' => $full(
        'Die Ukraine ist ein großes osteuropäisches Land mit fruchtbaren Ebenen, reichem Kulturerbe und einer Geschichte großer Widerstandskraft.',
        'Kyjiw ist die Hauptstadt; Charkiw, Lwiw und Odesa gehören zu den wichtigsten weiteren Zentren.',
        'Verschiedene Reiche und politische Epochen, von der Kyjiwer Rus bis zur Moderne, haben die nationale Identität stark geprägt.',
        'Landwirtschaft, Schwerindustrie und ein wachsender IT-Sektor tragen die Wirtschaft des Landes.',
        'Die Ukraine ist eine Republik, die ihre demokratischen Institutionen weiter ausbaut und sich stark an Europa orientiert.',
        'Steppen, Karpaten und Küstengebiete prägen das Land in überwiegend kontinentalem Klima.',
        'Klöster, historische Städte und Küstenorte geben Einblick in ein kulturell vielschichtiges Land.',
        'Borschtsch, Warenyky und Kohlrouladen stehen für die ukrainische Küche.',
        'Die Ukraine verbindet kulturelle Tiefe, natürliche Ressourcen und einen stark sichtbaren Willen zur Selbstbehauptung.'
    ),
    'us' => $inlineConclusion(
        'Die Vereinigten Staaten sind eine globale Großmacht mit großer kultureller Vielfalt, hoher Innovationskraft und sehr unterschiedlichen Naturräumen.',
        'Washington D.C. ist das politische Zentrum; New York, Los Angeles und Chicago prägen Wirtschaft, Kultur und Medienlandschaft des Landes.',
        'Einwanderung, Unabhängigkeitsgeschichte und die Auseinandersetzung um Freiheits- und Bürgerrechte haben die Identität der USA tief geprägt.',
        'Technologie, Finanzwesen, Unterhaltung, Landwirtschaft und Industrie tragen eine der größten Volkswirtschaften der Welt.',
        'Die USA sind eine föderale Republik mit Gewaltenteilung zwischen Exekutive, Legislative und Judikative.',
        'Wüsten, Gebirge, Wälder, Ebenen und lange Küsten schaffen eine außergewöhnlich breite geographische und klimatische Vielfalt.',
        'Freiheitsstatue, Grand Canyon und Metropolen wie New York ziehen Besucher aus aller Welt an.',
        'Die amerikanische Küche verbindet regionale Traditionen mit globalen Einflüssen und reicht von einfachen Klassikern bis zu moderner Spitzengastronomie.',
        'Die Vereinigten Staaten stehen damit für Vielfalt, Gestaltungsmacht und anhaltende weltpolitische Bedeutung.'
    ),
    'uy' => $inlineConclusion(
        'Uruguay ist ein kleiner Staat im Südosten Südamerikas, der für politische Stabilität, soziale Reformen und hohe Lebensqualität bekannt ist.',
        'Montevideo ist Hauptstadt und größtes Zentrum des Landes; Salto und Punta del Este ergänzen das urbane Profil.',
        'Europäische Einwanderung und regionale Traditionen haben eine demokratisch geprägte Kultur mit starker Fußballleidenschaft geformt.',
        'Landwirtschaft, Viehzucht, Wein, Tourismus und erneuerbare Energien tragen eine stabile und vielfältige Wirtschaft.',
        'Uruguay ist eine präsidentielle Republik und gilt als eine der gefestigtsten Demokratien Lateinamerikas.',
        'Ebenen, Weideland und Atlantikküste prägen das Land bei mildem, gemäßigtem Klima.',
        'Altstadtviertel, Küstenorte und Thermalquellen gehören zu den wichtigsten Sehenswürdigkeiten.',
        'Asado, Chivito und viele auf Fleisch und landwirtschaftlichen Produkten basierende Gerichte prägen die Küche.',
        'Uruguay verbindet soziale Offenheit, politische Verlässlichkeit und ein starkes kulturelles Selbstbewusstsein.'
    ),
    'za' => $noConclusion(
        'Südafrika liegt an der Südspitze des afrikanischen Kontinents und ist für seine kulturelle Vielfalt, weiten Landschaften und komplexe Geschichte bekannt.',
        'Pretoria ist Verwaltungshauptstadt, Kapstadt ein ikonisches kulturelles Zentrum, und Johannesburg ist die größte Wirtschaftsmetropole des Landes.',
        'Indigene Traditionen, Kolonialgeschichte und der Kampf gegen die Apartheid prägen Südafrikas Identität bis heute.',
        'Bergbau, Industrie, Landwirtschaft und Dienstleistungen bilden eine breit angelegte Wirtschaft, die zugleich mit Ungleichheit ringt.',
        'Südafrika ist eine demokratische Republik mit Mehrparteiensystem und starkem Fokus auf Inklusion und Rechte.',
        'Savannen, Gebirge, Küsten und sehr unterschiedliche Klimazonen sorgen für hohe biologische Vielfalt.',
        'Tafelberg, Kruger-Nationalpark und die Garden Route zählen zu den bekanntesten Reisezielen.',
        'Braai, Bobotie und Biltong zeigen die Mischung aus lokalen, kolonialen und modernen kulinarischen Einflüssen.'
    ),
    'ir' => $full(
        'Iran ist ein Land mit reicher persischer Tradition, bedeutender Baukunst und einer sehr langen Kulturgeschichte.',
        'Teheran ist die Hauptstadt; Isfahan und Schiras sind für Architektur, Kunst und historische Bedeutung besonders bekannt.',
        'Persische Literatur, Wissenschaft und Philosophie haben den Iran über Jahrtausende hinweg kulturell geprägt.',
        'Öl und Gas spielen wirtschaftlich eine große Rolle, ergänzt durch Landwirtschaft, Industrie und Technologie.',
        'Der Iran ist eine Islamische Republik, die religiöse Ordnung und moderne Staatsstrukturen miteinander verbindet.',
        'Gebirge, Wüsten, Ebenen und verschiedene Klimazonen prägen die Geografie des Landes.',
        'Moscheen, Gärten, antike Stätten und historische Städte machen den Iran kulturell besonders reich.',
        'Aromatische Reisgerichte, Kebabs und fein gewürzte Speisen kennzeichnen die iranische Küche.',
        'Iran verbindet eine außergewöhnlich lange Zivilisationsgeschichte mit einer komplexen Gegenwart.'
    ),
];
