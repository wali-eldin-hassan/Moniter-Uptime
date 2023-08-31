<?php


namespace App\Enums;

use PhpParser\Node\Expr\Cast\String_;

enum EndPointFrequency: int
{
    case TEN_SECAND = 10;
    case ONE_MINUTE = 1 * 60;
    case Five_MINUTES = 5 * 60;
    case THIRTY_MINUTES = 30 * 60;
    case ONE_HOURS = 60 * 60;


    function lable(): String
    {
        return match ($this) {
            self::TEN_SECAND => '10 secondes',
            self::ONE_MINUTE => '1 miunte',
            self::Five_MINUTES => '5 miuntes',
            self::THIRTY_MINUTES => '30 minutes',
            self::ONE_HOURS => '1 hour',
        };
    }
}
