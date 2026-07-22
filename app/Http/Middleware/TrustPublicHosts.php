<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts;

class TrustPublicHosts extends TrustHosts
{
    /**
     * Get the exact host patterns configured for the public application.
     *
     * @return array<int, string>
     */
    public function hosts(): array
    {
        $hosts = config('public_site.trusted_hosts', []);

        if (! is_array($hosts)) {
            return [];
        }

        return array_values(array_filter($hosts, is_string(...)));
    }
}
