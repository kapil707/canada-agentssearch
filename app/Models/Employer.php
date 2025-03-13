<?php

namespace App\Models;

use Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property mixed | NULL $form_data
 * @property int $id
 * @property string $password
 * @property string $email
 * @property string $client_id
 * @property FormSubmission $form_submission
 * @property int $form_submission_id
 * @mixin Eloquent
 */
class Employer extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email','password','email_verified_at','form_data'
    ];

    protected $hidden = ['password','email_verified_at'];

    public function form_submission(): BelongsTo
    {
        return $this->belongsTo(FormSubmission::class);
    }
}
