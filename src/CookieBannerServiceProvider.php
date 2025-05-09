<?php

namespace Salsa85\CookieBanner;

use Statamic\Providers\AddonServiceProvider;
use Salsa85\CookieBanner\Tags\CookieBannerTag;

class CookieBannerServiceProvider extends AddonServiceProvider
{
    protected $viewNamespace = 'cookie-banner';

    protected $routes = [];

    protected $commands = [];

    protected $scripts = [];

    protected $stylesheets = [];

    protected $tags = [
        CookieBannerTag::class,
    ];

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/cookie-banner.php', 'cookie-banner'
        );
    }

    public function boot()
    {
        parent::boot();

        $this->loadViewsFrom(__DIR__.'/../resources/views/antlers', 'cookie-banner');

        $this->publishes([
            __DIR__.'/../resources/views/antlers' => resource_path('views/vendor/cookie-banner/antlers'),
            __DIR__.'/../resources/views/blade' => resource_path('views/vendor/cookie-banner/blade'),
            __DIR__.'/../config/cookie-banner.php' => config_path('cookie-banner.php'),
        ], 'cookie-banner');
    }
} 