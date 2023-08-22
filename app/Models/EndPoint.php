<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EndPoint extends Model
{
    use HasFactory;

    protected $fillable = ['location', 'frequency', 'next_check'];

    public $dates = [
        'next_check'
    ];

    function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }
}
