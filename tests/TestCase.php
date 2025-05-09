<?php

namespace Salsa85\CookieBanner\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Salsa85\CookieBanner\CookieBannerServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            CookieBannerServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        config()->set('cookie-banner.analytics_id', 'G-TEST123');
        config()->set('cookie-banner.privacy_policy_url', '/privacy');
    }
} 