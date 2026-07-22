<nav class="market-tabs" aria-label="Marketplace categories">
    <a @class(['active' => request()->routeIs('pages.marketplace.players')]) href="{{ public_route('pages.marketplace.players') }}">
        <span>PL</span>
        {{ trans('custom.player_marketplace') }}
    </a>
    <a @class(['active' => request()->routeIs('pages.marketplace.clubs')]) href="{{ public_route('pages.marketplace.clubs') }}">
        <span>CL</span>
        {{ trans('custom.club_marketplace') }}
    </a>
    <a @class(['active' => request()->routeIs('pages.marketplace.stadiums')]) href="{{ public_route('pages.marketplace.stadiums') }}">
        <span>ST</span>
        {{ trans('custom.stadium_marketplace') }}
    </a>
</nav>
