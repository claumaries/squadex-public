<?php

use Illuminate\Support\Facades\Route;

test('the public application exposes only safe read methods', function () {
    $unsafeMethods = collect(Route::getRoutes()->getRoutes())
        ->flatMap(fn ($route): array => $route->methods())
        ->unique()
        ->diff(['GET', 'HEAD']);

    expect($unsafeMethods)->toBeEmpty();

    $this->post('/newsletter')->assertMethodNotAllowed();
    $this->post('/en/contact')->assertMethodNotAllowed();
    $this->post('/switch-language')->assertMethodNotAllowed();
});

test('the contact page uses a configured mail link without server-side submission', function () {
    config()->set('public_site.contact_address', 'contact@sqaudex.test');

    $this->get('/en/contact')
        ->assertOk()
        ->assertSee('mailto:contact@sqaudex.test', false)
        ->assertDontSee('<form', false);
});
