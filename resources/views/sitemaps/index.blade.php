<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($entries as $entry)
    <sitemap><loc>{{ $entry['url'] }}</loc></sitemap>
@endforeach
</sitemapindex>
