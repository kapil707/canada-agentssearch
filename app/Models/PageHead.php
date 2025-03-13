<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $url_key
 * @property string $content
 * @property boolean $active
 * @property boolean $show_in_main_menu
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @mixin Eloquent
 */
class PageHead extends Model
{
    use HasFactory;
    protected $guarded = [];
}
