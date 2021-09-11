<?php

class CurrentUSPresident
{
    const name = 'Barack Obama';

    public static function greet($anotherName): string
    {
        return "Hello $anotherName, my name is " . self::name . ", nice to meet you!";
    }
}

$president_name = CurrentUSPresident::name;

$greeting_from_president = CurrentUSPresident::greet('Donald');
