<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Symfony\Component\HttpFoundation\Response;

class Check extends Model
{
    use HasFactory;

    protected $fillable = ['response_code', 'response_body'];

    function endponits(): BelongsTo
    {
        return $this->belongsTo(EndPoint::class);
    }

    function isSuccessful()
    {
        return $this->response_code >= 200 && $this->response_code < 300;
    }

    function statusText()
    {
        return Response::$statusTexts[$this->response_code] ?? 'Unknown';
    }
}
