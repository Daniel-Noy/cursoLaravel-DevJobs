<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Applicant extends Model
{
    protected $fillable = [
        'user_id',
        'vacant_id',
        'cv'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
