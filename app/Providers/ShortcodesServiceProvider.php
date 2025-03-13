<?php

namespace App\Providers;

use App\Shortcodes\BladeRenderer;
use App\Shortcodes\ImageGenerator;
use App\Shortcodes\LinkGenerator;
use App\Shortcodes\UrlGenerator;
use Illuminate\Support\ServiceProvider;
use Webwizo\Shortcodes\Facades\Shortcode;

class ShortcodesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Shortcode::register('url', UrlGenerator::class);
        Shortcode::register('img', ImageGenerator::class);
        Shortcode::register('a', LinkGenerator::class);
        Shortcode::register('blade',BladeRenderer::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
