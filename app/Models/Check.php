<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Check extends Model
{
    use HasFactory;

    protected $fillable = ['response_code', 'response_body'];

    function endponits(): BelongsTo
    {
        return $this->belongsTo(EndPoint::class);
    }
}
