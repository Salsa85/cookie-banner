<?php

namespace Salsa85\CookieBanner\Tags;

use Statamic\Tags\Tags;

class CookieBannerTag extends Tags
{
    protected static $handle = 'zencule';

    /**
     * {{ zencule:cookie-banner }}
     */
    public function cookieBanner()
    {
        return view('cookie-banner::banner', [
            'config' => config('cookie-banner')
        ])->render();
    }
} 