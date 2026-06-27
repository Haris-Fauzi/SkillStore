<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentProfile extends Model
{
    //
    protected $fillable = [
        'user_id',
        'nis',
        'class',
        'major',
        'address',
        'phone',
        'birth_date',
        'photo',
        'is_profile_complete',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'is_profile_complete' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
