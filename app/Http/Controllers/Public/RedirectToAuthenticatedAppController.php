<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\PublicSite\AuthAppUrlGenerator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectToAuthenticatedAppController extends Controller
{
    public function __construct(private readonly AuthAppUrlGenerator $authAppUrls) {}

    public function __invoke(Request $request): RedirectResponse
    {
        $referral = $request->query('r');
        $referral = is_string($referral) ? str($referral)->limit(255, '')->value() : null;

        return redirect()->away($this->authAppUrls->to(
            (string) $request->route('destination'),
            is_string($request->route('locale')) ? $request->route('locale') : 'en',
            $referral,
        ));
    }
}
