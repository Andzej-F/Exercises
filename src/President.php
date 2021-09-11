<?php

class President
{
    public $name = 'Barack Obama';

    public function greet($anotherName): string
    {
        return "Hello $anotherName, my name is $this->name, nice to meet you!";
    }
}

global $us_president;
$us_president = new President();

$president_name = $us_president->name;

$greeting_from_president = $us_president->greet('Donald');
