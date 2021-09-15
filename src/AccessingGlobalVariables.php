<?php
/*
In PHP, functions by default can only create and/or access
variables within its own scope. This means that if, for 
example, you have a global variable called $x and you want 
to double the value of that global variable called $x within
your function called double_x() ...


$x = 21;
$y = 10;

function double_x_halve_y()
{
    global $x, $y;
    $x *= 2;
    $y /= 2;
}

double_x_halve_y();
echo $x . '<br>';
echo $y . '<br>';

$x = 21;
$y = -42;
$z = "Hello World";

function reset_XYZ_to_42()
{
    $GLOBALS['x'] = 42;
    $GLOBALS['y'] = 42;
    $GLOBALS['z'] = 42;
    $x = "Goodbye World";
}

reset_xyz_to_42();
echo $x . '<br>';
echo $y . '<br>';
echo $z . '<br>';

Declare and define the following functions as instructed.

increment_x() - This function should increment a global 
variable $x by 1 every time the function is called.

double_x_triple_y_quadruple_z() - This function should double 
a global variable $x, triple a global variable $y and quadruple 
a global variable $z every time the function is called

append_whitespace_to_string() - This function should append a 
whitespae character " " to a global variable $string every 
time the function is called.

add_world_to_string() - This function should add the string 
"world" to the end of a global variable $string every time 
the function is called.
*/


function increment_x()
{
    global $x;
    $x += 1;
}

function double_x_triple_y_quadruple_z()
{
    global $x, $y, $z;
    $x *= 2;
    $y *= 3;
    $z *= 4;
}

function append_whitespace_to_string()
{
    global $string;
    $string .= " ";
}

function add_world_to_string()
{
    global $string;
    $string .= "world";
}
