<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $shortname
 * @mixin \Eloquent
 */
class FormType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'shortname'
    ];
}
