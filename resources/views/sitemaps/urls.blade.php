<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($entries as $entry)
    <url>
        <loc>{{ $entry['url'] }}</loc>
        @isset($entry['last_modified'])<lastmod>{{ $entry['last_modified'] }}</lastmod>@endisset
        @isset($entry['change_frequency'])<changefreq>{{ $entry['change_frequency'] }}</changefreq>@endisset
        @isset($entry['priority'])<priority>{{ $entry['priority'] }}</priority>@endisset
    </url>
@endforeach
</urlset>
