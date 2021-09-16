<?php

// $x = 13;
// function increment_x()
// {
//   $x += 1;
// }

// increment_x();
// echo $x; //13

// $GLOBALS['x'] = 1;

// function increment_x()
// {
//   $GLOBALS['x'] += 1;
// }

// echo $GLOBALS['x'];

// echo '<pre>';
// print_r($GLOBALS);
/*
However, in PHP, there are certain predefined variables that are
superglobal. Superglobal variables (or more commonly called superglobals)
are special variables that defy the laws of function scope in PHP - they 
can be accessed from any function in PHP, no matter how deeply nested, 
without having to explicitly declare them as global in the function. For 
example:

$GLOBALS['x'] = 1; // $GLOBALS is one of few superglobals in PHP - we will 
//learn more about it later

function increment_x()
{
  $GLOBALS['x']++;
}
echo $GLOBALS['x'] . '<br>'; // 1
increment_x();
echo $GLOBALS['x'] . '<br>'; // 2
increment_x();
increment_x();
increment_x();
echo $GLOBALS['x'] . '<br>'; // 5

The following predefined variables in PHP are superglobals 
(according to W3Schools):

$GLOBALS
$_SERVER
$_REQUEST
$_POST
$_GET
$_FILES
$_ENV
$_COOKIE
$_SESSION
We will learn more about each superglobal mentioned above in later Kata 
in this Series but for now you must be aware of what $GLOBALS is and what 
it does. As the name suggests, $GLOBALS is an associative array which 
contains all of the variables declared and defined in the global scope 
and the name of each key of the $GLOBALS array corresponds to the name of 
each global variable itself:

echo '<hr><hr>';
$x = 2;
$y = 5;
$hello_world = "Hello World";
echo $GLOBALS['x']; // 2
echo $GLOBALS['y']; // 5
echo $GLOBALS['hello_world']; // "Hello World"

The superglobal nature of $GLOBALS means that functions can directly 
access variables in the global scope via the $GLOBALS superglobal instead 
of declaring certain variables global before using it:

// This ... 
function increment_global_x() {
  global $x;
  $x++;
}

// ... is the same as this
function increment_global_x() {
  $GLOBALS['x']++;
}
Strictly speaking, directly accessing global variables using the superglobal 
$GLOBALS is not identical to accessing global variables by declaring it global 
in the function and then using it because by using $GLOBALS one can still 
declare/define a local variable with the same name within the function.

Task

Using your knowledge of superglobals, declare and define the 
following functions as instructed:

double_global_num() - This function should receive no arguments
and double the value of the global variable $num, preferably 
through accessing the superglobal $GLOBALS.

set_query() - This function should receive an argument $query 
and set $_GET['query'] equal to $query.

set_email() - This function should receive an argument $email 
and set $_POST['email'] equal to $email.
*/

function double_global_num()
{
  $GLOBALS['num'] *= 2;
}

function set_query($query)
{
  $_GET['query'] = $query;
}

function set_email($email)
{
  $_POST['email'] = $email;
}
