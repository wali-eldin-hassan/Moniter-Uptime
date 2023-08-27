<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class  EndPoint extends Model
{
    use HasFactory;

    protected $fillable = ['location', 'frequency', 'next_check'];

    public $dates = [
        'next_check'
    ];

    function url()
    {
        return $this->site->url() . $this->location;
    }

    function uptimePercentage()
    {
        if(!$this->checks->count())
        {
            return null;
        }
        return number_format(($this->successfly_check_count / $this->checks->count()) * 100,2);
    }


    function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    function checks(): HasMany
    {
        return $this->hasMany(Check::class);
    }

    function check(): HasOne
    {
        return $this->hasOne(Check::class)->latestOfMany();
    }
}
