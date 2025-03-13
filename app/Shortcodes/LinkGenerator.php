<?php
namespace App\Shortcodes;

class LinkGenerator
{
    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        return '<a href="'.url($shortcode->href).'" class="'.$shortcode->class.'">'.$content.'</a>';
    }
}
