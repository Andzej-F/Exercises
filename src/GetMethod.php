<?php
/*
http://example.com/path/to/somefile.php?
rank=-7&author=donaldsebleung&keywords=php&rating=5,
 manually extract the key-value pairs from the full UR
 L and store them in the $_GET superglobal.
*/

$_GET['rank'] = '-7';
$_GET['author'] = 'donaldsebleung';
$_GET['keywords'] = 'php';
$_GET['rating'] = '5';

function user_script()
{
    global $avocado, $banana, $dragonfruit;
    $url = "http://codewars.com/kata/php-in-action-number-2-http-get-method/train/php/?avocado=Avocado is my favourite food&banana=2718281828459045&dragonfruit=<script> window.location =\"http://www.hacked.com/\";</script>";
    $questionMarkPosition = strpos($url, '?');
    $queryString = substr($url, $questionMarkPosition + 1);
    $queryStringArray = explode("&", $queryString);

    foreach ($queryStringArray as $key => $value) {
        parse_str($value, $result);
        $_GET += $result;
    }

    $avocado = htmlspecialchars($_GET['avocado']);
    $banana = htmlspecialchars($_GET['banana']);
    $dragonfruit = htmlspecialchars($_GET['dragonfruit']);
    /*
    other solution 
    
    function user_script() {
        foreach($_GET as $key => $value) {
    $GLOBALS[$key] = htmlspecialchars($value);
  }
    */
}
