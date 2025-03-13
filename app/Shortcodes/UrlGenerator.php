<?php
namespace App\Shortcodes;
class UrlGenerator
{
    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        return url($content);
    }
}
