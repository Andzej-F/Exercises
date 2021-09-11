<?php

class ComputerProgrammer extends Person2
{
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = 'Computer Programmer';
    }
}

/*
ComputerProgrammer
Class Constructor
The class constructor of ComputerProgrammer should accept exactly 2 arguments 
in the following order: $name, $age and should set the correct properties 
accordingly. The $occupation of a ComputerProgrammer is always "Computer Programmer" 
without exception.

describe_job (Method)
The describe_job method of a ComputerProgrammer should return a string of the format 
"I am currently working as a(n) OCCUPATION_HERE, don't forget to check out my Codewars 
account ;)"

Hint: The same method of the parent class returns a substring of what this method 
should return.
 */