<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * @property int $id
 * @property string $client_id
 * @property array $form_data
 * @property int $form_type_id
 * @property string $created_at
 * @property string $assessed_as
 * @property int $steps
 * @property string $email
 * @property Carbon $dob
 * @mixin \Eloquent
 */
class FormSubmission extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'form_data' => 'array',
        'dob' => 'date'
    ];

    public function form_type(): BelongsTo
    {
        return $this->belongsTo(FormType::class);
    }

    public function remarks(): HasMany
    {
        return $this->hasMany(FormRemark::class);
    }

    public function signedContracts(): HasMany
    {
        return $this->hasMany(SignedContract::class);
    }
}
