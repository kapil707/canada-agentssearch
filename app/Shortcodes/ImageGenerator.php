<?php
namespace App\Shortcodes;
class ImageGenerator
{
    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        return '<img src="'.url($shortcode->src).'" class="'.$shortcode->class.'" alt="">';
    }
}
