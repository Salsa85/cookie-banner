<?php

namespace Zencule\CookieBanner\Tests\Feature;

use Zencule\CookieBanner\Tests\TestCase;

class CookieBannerTest extends TestCase
{
    /** @test */
    public function it_can_render_the_banner()
    {
        $view = $this->view('cookie-banner::banner', ['config' => config('cookie-banner')]);

        $view->assertSee('data-cookie-banner');
        $view->assertSee(config('cookie-banner.messages.banner_text'));
        $view->assertSee(config('cookie-banner.messages.accept_button'));
    }

    /** @test */
    public function it_includes_google_analytics_when_configured()
    {
        $view = $this->view('cookie-banner::banner', ['config' => config('cookie-banner')]);

        $view->assertSee('G-TEST123');
        $view->assertSee('googletagmanager.com');
    }
} 