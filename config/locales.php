<?php

$make = static function (
    string $code,
    string $nativeName,
    string $englishName,
    string $flag,
    string $translationLocale,
    string $dateLocale,
    bool $articleSupported,
): array {
    $seoLocale = $code === 'en' ? 'en-GB' : $code;

    return [
        'code' => $code,
        'native_name' => $nativeName,
        'english_name' => $englishName,
        'flag' => $flag,
        'enabled' => true,
        'ui_supported' => true,
        'article_supported' => $articleSupported,
        'fallback_locale' => 'en',
        'direction' => 'ltr',
        'date_locale' => $dateLocale,
        'slug_prefix' => $code,
        'route_locale' => $code,
        'translation_locale' => $translationLocale,
        'hreflang' => $seoLocale,
        'html_lang' => $seoLocale,
        'schema_language' => $seoLocale,
        'og_locale' => $dateLocale,
    ];
};

return [
    'bg' => $make('bg', 'Български', 'Bulgarian', 'bg.png', 'bg', 'bg_BG', false),
    'zh' => $make('zh', '中文', 'Chinese', 'cn.png', 'cn', 'zh_CN', false),
    'de' => $make('de', 'Deutsch', 'German', 'de.png', 'de', 'de_DE', true),
    'en' => $make('en', 'English', 'English', 'gb.png', 'en', 'en_GB', true),
    'es' => $make('es', 'Español', 'Spanish', 'es.png', 'es', 'es_ES', true),
    'fr' => $make('fr', 'Français', 'French', 'fr.png', 'fr', 'fr_FR', true),
    'id' => $make('id', 'Bahasa', 'Indonesian', 'id.png', 'id', 'id_ID', false),
    'hi' => $make('hi', 'हिन्दी', 'Hindi', 'in.png', 'in', 'hi_IN', false),
    'it' => $make('it', 'Italiano', 'Italian', 'it.png', 'it', 'it_IT', true),
    'ja' => $make('ja', '日本語', 'Japanese', 'jp.png', 'jp', 'ja_JP', false),
    'lv' => $make('lv', 'Latviešu', 'Latvian', 'lv.png', 'lv', 'lv_LV', false),
    'nl' => $make('nl', 'Nederlands', 'Dutch', 'nl.png', 'nl', 'nl_NL', true),
    'no' => $make('no', 'Norsk', 'Norwegian', 'no.png', 'no', 'nb_NO', false),
    'pl' => $make('pl', 'Polski', 'Polish', 'pl.png', 'pl', 'pl_PL', true),
    'pt' => $make('pt', 'Português', 'Portuguese', 'pt.png', 'pt', 'pt_PT', true),
    'ro' => $make('ro', 'Română', 'Romanian', 'ro.png', 'ro', 'ro_RO', true),
    'sr' => $make('sr', 'Српски', 'Serbian', 'rs.png', 'rs', 'sr_RS', false),
    'ru' => $make('ru', 'Русский', 'Russian', 'ru.png', 'ru', 'ru_RU', false),
    'sv' => $make('sv', 'Svenska', 'Swedish', 'se.png', 'se', 'sv_SE', false),
    'tr' => $make('tr', 'Türkçe', 'Turkish', 'tr.png', 'tr', 'tr_TR', true),
    'uk' => $make('uk', 'Українська', 'Ukrainian', 'ua.png', 'ua', 'uk_UA', false),
    'vi' => $make('vi', 'Tiếng Việt', 'Vietnamese', 'vn.png', 'vn', 'vi_VN', false),
];
