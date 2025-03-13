<?php

namespace App\Shortcodes;

use Illuminate\Support\Facades\View;

class BladeRenderer
{
    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        return view($content);
    }
}
