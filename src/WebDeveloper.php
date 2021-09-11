<?php

class WebDeveloper extends Person2
{
    public function __construct($name, $age)
    {
        parent::__construct($name, $age, 'Web Developer');
    }

    public function describe_job(): string
    {
        return parent::describe_job() . " And don't forget to check on my website :D";
    }

    public function describe_website()
    {
        return "My professional world-class website is made from HTML, CSS, Javascript and PHP!";
    }
}
