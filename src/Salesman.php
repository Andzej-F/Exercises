<?php
class Salesman extends Person2
{
    public function __construct($name, $age)
    {
        parent::__construct($name, $age, 'Salesman');
    }

    public function introduce(): string
    {
        return parent::introduce() . ", don't forget to check out my products!";
    }
}
