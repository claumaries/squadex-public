<footer class="site-footer" id="footer">
    <div class="container footer-grid">
        <div class="footer-brand">
            <a href="{{ public_route('pages.homepage') }}" class="footer-logo">
                <img style="width:50px;" src="{{ asset('blade/images/logo.png') }}" alt="logo"/>
                <span>{{ config('app.name') }}</span>
            </a>

            <p>
                The decentralised football management platform where clubs, managers and
                communities own the future.
            </p>

            <div class="footer-socials">
                <a href="{{ public_route('pages.twitter') }}" aria-label="X">X</a>
                <a href="{{ public_route('pages.discord') }}" aria-label="Discord">D</a>
                <a href="#" aria-label="Telegram">➤</a>
                <a href="#" aria-label="Medium">M</a>
                <a href="#" aria-label="V">V</a>
            </div>
        </div>

        <nav class="footer-links">
            <h3>Platform</h3>
            <a @class(['active' => request()->routeIs('pages.game')]) @if(request()->routeIs('pages.game')) aria-current="page" @endif href="{{ public_route('pages.game') }}">Game</a>
            <a @class(['active' => request()->routeIs('pages.marketplace.*')]) @if(request()->routeIs('pages.marketplace.*')) aria-current="page" @endif href="{{ public_route('pages.marketplace.players') }}">Marketplace</a>
            <a @class(['active' => request()->routeIs('pages.tournaments')]) @if(request()->routeIs('pages.tournaments')) aria-current="page" @endif href="{{ public_route('pages.tournaments') }}">Tournaments</a>
            <a @class(['active' => request()->routeIs('pages.leaderboards*')]) @if(request()->routeIs('pages.leaderboards*')) aria-current="page" @endif href="{{ public_route('pages.leaderboards') }}">Leaderboards</a>
        </nav>

        <nav class="footer-links">
            <h3>Match Centre</h3>
            <a @class(['active' => request()->routeIs('pages.matches')]) @if(request()->routeIs('pages.matches')) aria-current="page" @endif href="{{ public_route('pages.matches') }}">Matches</a>
            <a href="{{ public_route('pages.matches', query: ['status' => 'scheduled']) }}">Fixtures</a>
            <a href="{{ public_route('pages.matches', query: ['status' => 'finished']) }}">Results</a>
            <a href="{{ public_route('pages.football-predictions') }}">Match Predictions</a>
            <a @class(['active' => request()->routeIs('pages.teams')]) @if(request()->routeIs('pages.teams')) aria-current="page" @endif href="{{ public_route('pages.teams') }}">Teams</a>
            <a @class(['active' => request()->routeIs('pages.players')]) @if(request()->routeIs('pages.players')) aria-current="page" @endif href="{{ public_route('pages.players') }}">Players</a>
        </nav>

        <nav class="footer-links">
            <h3>Resources</h3>
            <a href="{{ public_route('pages.guides') }}">Documentation</a>
            <a @class(['active' => request()->routeIs('pages.whitepaper')]) @if(request()->routeIs('pages.whitepaper')) aria-current="page" @endif href="{{ public_route('pages.whitepaper') }}">Whitepaper</a>
            <a @class(['active' => request()->routeIs('pages.tokenomics')]) @if(request()->routeIs('pages.tokenomics')) aria-current="page" @endif href="{{ public_route('pages.tokenomics') }}">Tokenomics</a>
            <a @class(['active' => request()->routeIs('pages.token-transparency')]) @if(request()->routeIs('pages.token-transparency')) aria-current="page" @endif href="{{ public_route('pages.token-transparency') }}">Token Transparency</a>
            <a @class(['active' => request()->routeIs('pages.presale')]) @if(request()->routeIs('pages.presale')) aria-current="page" @endif href="{{ public_route('pages.presale') }}">Presale</a>
            <a @class(['active' => request()->routeIs('pages.news') || request()->routeIs('pages.details')]) @if(request()->routeIs('pages.news') || request()->routeIs('pages.details')) aria-current="page" @endif href="{{ public_route('pages.news') }}">News</a>
            <a @class(['active' => request()->routeIs('pages.faq')]) @if(request()->routeIs('pages.faq')) aria-current="page" @endif href="{{ public_route('pages.faq') }}">FAQ</a>
        </nav>

        <nav class="footer-links">
            <h3>Legal</h3>
            <a @class(['active' => request()->routeIs('pages.privacy')]) @if(request()->routeIs('pages.privacy')) aria-current="page" @endif href="{{ public_route('pages.privacy') }}">
                {{ trans('custom.privacy_policy') }}
            </a>
            <a @class(['active' => request()->routeIs('pages.cookie')]) @if(request()->routeIs('pages.cookie')) aria-current="page" @endif href="{{ public_route('pages.cookie') }}">Cookie Policy</a>
            <a @class(['active' => request()->routeIs('pages.terms')]) @if(request()->routeIs('pages.terms')) aria-current="page" @endif href="{{ public_route('pages.terms') }}">
                {{ trans('custom.terms_of_service') }}
            </a>
            <a @class(['active' => request()->routeIs('pages.disclaimer')]) @if(request()->routeIs('pages.disclaimer')) aria-current="page" @endif href="{{ public_route('pages.disclaimer') }}">Disclaimer</a>
            <a @class(['active' => request()->routeIs('pages.kyc')]) @if(request()->routeIs('pages.kyc')) aria-current="page" @endif href="{{ public_route('pages.kyc') }}">KYC Policy</a>
        </nav>

        <div class="footer-newsletter" id="newsletter">
            <h3>Join the Squadex Community</h3>
            <p>Use the official public channels for the latest updates and announcements.</p>
            <a class="btn btn-primary" href="{{ public_route('pages.community') }}">Community updates</a>
        </div>
    </div>

    <div class="container footer-bottom">
        <p>{{ trans('custom.copyright') }} {{ date('Y') }} {{ config('app.name') }}, {{ trans('custom.all_right_reserved') }}</p>
    </div>
</footer>
