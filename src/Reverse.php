<?php
/* Simple Fun #176: Reverse Letter
 */
class Reverse
{
    // public function reverseLetter($string): string
    // {
    //     $stringArray = str_split($string, 1);
    //     $filteredWord = '';
    //     foreach ($stringArray as $symbol) {
    //         if (ctype_alpha($symbol)) {
    //             $filteredWord .= $symbol;
    //         }
    //     }

    //     return strrev($filteredWord);
    // }

    //  Other solutions
    public function reverseLetter($str)
    {
        return strrev(preg_replace('/[^a-z, A-Z]/', '', $str));
    }

    /*
function reverseLetter($str){
return strrev(preg_replace("/[^\p{L}]/u","",$str));
}

function reverseLetter($str){
 $s = strrev($str);

$k = preg_replace('/[^a-zA-Z]/', '', $s);
return $k; 
}
    */
}
