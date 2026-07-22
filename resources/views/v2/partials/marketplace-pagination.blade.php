@if((int) \Illuminate\Support\Arr::get($results, 'total', 0) > (int) \Illuminate\Support\Arr::get($results, 'per_page', 0))
    <nav class="market-pagination" aria-label="{{ $paginationLabel ?? 'Marketplace pagination' }}">
        @foreach(\Illuminate\Support\Arr::get($results, 'links', []) as $link)
            @if($link['url'] === null)
                <span class="disabled">{{ html_entity_decode(strip_tags((string) $link['label'])) }}</span>
            @elseif($link['active'])
                <span class="active">{{ html_entity_decode(strip_tags((string) $link['label'])) }}</span>
            @else
                <a href="{{ $link['url'] }}">{{ html_entity_decode(strip_tags((string) $link['label'])) }}</a>
            @endif
        @endforeach
    </nav>
@endif
