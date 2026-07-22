<?php

use App\PublicSite\AuthAppUrlGenerator;

beforeEach(function () {
    config()->set('public_site.auth_app_url', 'https://app.sqaudex.test');
});

test('login redirects to the authenticated application with the route locale', function () {
    $this->get('/login')->assertRedirect('https://app.sqaudex.test/en/login');
    $this->get('/fr/login')->assertRedirect('https://app.sqaudex.test/fr/login');
});

test('register forwards only an encoded referral value', function () {
    $this->get('/de/register?r=partner code/25%')
        ->assertRedirect('https://app.sqaudex.test/de/register?r=partner%20code%2F25%25');
});

test('dashboard and session URLs use the configured authenticated application', function () {
    $generator = app(AuthAppUrlGenerator::class);

    expect($generator->to('dashboard', 'ro'))->toBe('https://app.sqaudex.test/ro')
        ->and($generator->sessionEndpoint())->toBe('https://app.sqaudex.test/api/v1/auth/session')
        ->and($generator->origin())->toBe('https://app.sqaudex.test');
});

test('public navigation progressively enhances guest links for an authenticated application session', function () {
    $response = $this->get('/ro');

    $response->assertOk()
        ->assertSee('data-auth-session-url="https://app.sqaudex.test/api/v1/auth/session"', false)
        ->assertSee('data-auth-dashboard-url="https://app.sqaudex.test/ro"', false)
        ->assertSee('href="https://app.sqaudex.test/ro/login"', false)
        ->assertSee('data-auth-guest-link', false)
        ->assertSee('data-auth-dashboard-link hidden', false)
        ->assertSee('Autentificare')
        ->assertSee('Înregistrează-te')
        ->assertSee('Panou de control');
});

test('login does not forward arbitrary query parameters', function () {
    $this->get('/en/login?next=https://attacker.test')
        ->assertRedirect('https://app.sqaudex.test/en/login');
});

test('the authenticated application URL rejects unsafe base URLs', function (string $url) {
    config()->set('public_site.auth_app_url', $url);

    expect(fn (): string => app(AuthAppUrlGenerator::class)->to('login'))
        ->toThrow(InvalidArgumentException::class);
})->with([
    'credentials' => 'https://user:secret@app.sqaudex.test',
    'query string' => 'https://app.sqaudex.test?next=unsafe',
    'fragment' => 'https://app.sqaudex.test#unsafe',
    'non-http scheme' => 'javascript://app.sqaudex.test',
]);
