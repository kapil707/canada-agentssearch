<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormRemark extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function form_submission(): BelongsTo
    {
        return $this->belongsTo(FormSubmission::class);
    }
}
