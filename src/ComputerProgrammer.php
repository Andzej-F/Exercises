<?php

class ComputerProgrammer extends Person2
{
    public function __construct($name, $age)
    {
        parent::__construct($name, $age, 'Computer Programmer');
    }

    public function describe_job(): string
    {
        return parent::describe_job() . ", don't forget to check out my Codewars account ;)";
    }
}
