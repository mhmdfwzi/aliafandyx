<?php

namespace App\Helpers;

use NumberFormatter;

class Currency
{
    public function __invoke(...$params)
    {
        return static::format(...$params);
    }

    public static function format($amount, $currency=null)
    {

        $formatter = new NumberFormatter('en', NumberFormatter::CURRENCY);
        if($currency === null) {
            $currency = config('app.currency', 'EGP');
        }
        return $formatter->formatCurrency($amount, $currency);
    }

    public static function convertNumberToArabic($number)
    {
        // Create a NumberFormatter instance for Arabic locale
        $numberFormatter = new NumberFormatter('ar', NumberFormatter::DECIMAL);

        // Set the formatter to display numbers in Arabic digits
        $numberFormatter->setTextAttribute(NumberFormatter::LENIENT_PARSE, true);
        $numberFormatter->setSymbol(NumberFormatter::GROUPING_SEPARATOR_SYMBOL, '');
        $numberFormatter->setSymbol(NumberFormatter::DECIMAL_SEPARATOR_SYMBOL, '.');

        // Convert the English number to Arabic
        return $numberFormatter->format($number);
    }


}