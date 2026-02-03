<?php

namespace App\Support;

class Currency
{
    const USD_RATE = 75; // نرخ دالر (بعداً می‌تونی داینامیک کنی)

    public static function toAfn($amount, $currency)
    {
        return $currency === 'USD'
            ? $amount * self::USD_RATE
            : $amount;
    }

    public static function toUsd($afnAmount)
    {
        return $afnAmount / self::USD_RATE;
    }
}
