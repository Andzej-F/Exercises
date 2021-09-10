<?php

class Regex
{
    // public $my_url = 'www.guru99.com';

    public function convert($my_url)
    {
        if (preg_match('/guru/', $my_url)) {
            echo "the url $my_url contains guru";
            return true;
        } else {
            echo "the url $my_url doen not contain guru";
            return false;
        }
    }
}
