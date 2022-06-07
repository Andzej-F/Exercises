<?php

// 173 points -> 175

/*
Remove words from the sentence if they contain exactly one exclamation mark. Words are separated by a single space, without leading/trailing spaces.

Examples
remove("Hi!") === ""
remove("Hi! Hi!") === ""
remove("Hi! Hi! Hi!") === ""
remove("Hi Hi! Hi!") === "Hi"
remove("Hi! !Hi Hi!") === ""
remove("Hi! Hi!! Hi!") === "Hi!!"
remove("Hi! !Hi! Hi!") === "!Hi!"
*/

function remove(string $s): string
{
    $words = explode(" ", $s);
    $newString1 = "";
    $newString2 = "";
    foreach ($words as $word) {
        if (preg_match_all("/!/", $word) === 1) {
            $newString1 .= "";
        } else {
            $newArray[] = $word;
            $newString2 = implode(" ", $newArray);
        }
    }

    return $newString1 . $newString2;
}

echo "<pre>";
var_dump(remove("Hi!") === "");
var_dump(remove("Hi! Hi!") === "");
var_dump(remove("Hi! Hi! Hi!") === "");
var_dump(remove("Hi Hi! Hi!") === "Hi");
var_dump(remove("Hi! !Hi Hi!") === "");
var_dump(remove("Hi! Hi!! Hi!") === "Hi!!");
var_dump(remove("Hi! !Hi! Hi!") === "!Hi!");

var_dump(remove("Hi!"));
var_dump(remove("Hi! Hi!"));
var_dump(remove("Hi! Hi! Hi!"));
var_dump(remove("Hi Hi! Hi!"));
var_dump(remove("Hi! !Hi Hi!"));
var_dump(remove("Hi! Hi!! Hi!"));
var_dump(remove("Hi! !Hi! Hi!"));
var_dump(remove("?Tf!d6G! Mw!!21eAw")); // ?Tf!d6G! Mw!!21eAw


// Other solution from other users
function remove2(string $s): string
{
    return implode(" ", array_filter(explode(" ", $s), function ($e) {
        return substr_count($e, "!") != 1;
    }));
}
