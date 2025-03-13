<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $key
 * @property mixed $value
 * @mixin \Eloquent
 */
class Setting extends Model
{
    use HasFactory;

    protected $casts = [
        'value' => 'array'
    ];
}
