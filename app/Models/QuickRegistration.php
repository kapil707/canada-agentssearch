<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $tel
 * @property string $country
 * @mixin Eloquent
 */
class QuickRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tel',
        'email',
        'country'
    ];
}
