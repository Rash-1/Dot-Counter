<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StringController extends Controller
{
    public function calculate(Request $request)
    {
        $stringChars= preg_split('//u',trim($request->string),-1,PREG_SPLIT_NO_EMPTY);
        $numberOfDots = 0;
        $charCodes = [];
        foreach ($stringChars as $char)
        {
            $charCode = mb_ord($char,'UTF-8');
            $charCodes[] = $charCode;
            $charsCount = array_count_values($charCodes);
            $numberOfDots += match ($charCode) {
                1578, 1602 => 2,
                1662, 1579, 1670, 1688, 1588 => 3,
                1576, 1582, 1586, 1592, 1601, 1580, 1584, 1590, 1594, 1606, 105, 106 => 1,
                default => 0,
            };
        }
        if (!empty(array_count_values($charCodes)['1740']))
        {
            $counter = array_count_values($charCodes)['1740'];
            for ($i = 0; $i < $counter; $i++) {
                $index = array_search(1740, $charCodes);
                if (key_exists($index + 1, $charCodes)) {
                    if ($charCodes[$index + 1] != 32) {
                        $numberOfDots += 2;
                    }
                    unset($charCodes[$index]);
                }
            }
        }
        return redirect()->route('home')->with(['result'=>$numberOfDots,'string'=>$request->string]);
    }
}
