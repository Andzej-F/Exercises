<?php
class Salesman extends Person2
{
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = 'Salesman';
    }

    /*
        public function introduce(): string
    {
        return "Hello, my name is $this->name";
    }
    */
    public function introduce(): string
    {
        return parent::introduce() . ", don't forget to check out my products";
        // return "Hello, my name is $this->name, don't forget to check out my products";
        // return "Hello, my name is John Johnson, don't forget to check out my products";
    }
}
/*
                            III. Class Details

/*
introduce (Method)
The introduce method of the Salesman class should return a string of the format 
"Hello, my name is NAME_HERE, don't forget to check out my products!"

Hint: The string that the introduce method of the parent class returns is a 
substring of what the introduce method of this class returns.

WebDeveloper
Class Constructor
The class constructor of this class should receive two arguments in the following 
order: $name, $age and set the correct properties accordingly. The $occupation of 
a WebDeveloper is always "Web Developer" without exception.

Hint: You may have to add a line of code in the constructor of this class to override 
the constructor of the parent class.

describe_job (Method)
The describe_job method of a WebDeveloper should return a string of the format "I am 
currently working as a(n) OCCUPATION_HERE, don't forget to check out my Codewars 
account ;) And don't forget to check on my website :D"

Hint: The same method of the parent class returns a substring of what this method 
should return.

Watch out! Make sure you know which class parent is referring to in this case before 
you use it in your method definition!

describe_website (Method)
This method should return "My professional world-class website is made from HTML, CSS, 
Javascript and PHP!"
*/