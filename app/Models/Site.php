<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Site extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'scheme', 'domain', 'default', 'notification_emails'];

    public $casts = ['notification_emails' => 'json'];

    function url()
    {
        return $this->scheme . '://' . $this->domain;
    }



    function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }



    function endpoints(): HasMany
    {
        return $this->hasMany(EndPoint::class)
            ->withCount(['checks as successfly_check_count' => function ($qurey) {
                $qurey->where('response_code', '>=', '200')->where('response_code', '<', '300');
            }])
            ->latest();
    }
}
