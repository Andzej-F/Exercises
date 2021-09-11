<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    // private $personObject;

    // public function setUp(): void
    // {
    //     $this->personObject = new Person();
    // }

    public function testIsPersonClassDefined()
    {
        $this->assertTrue(class_exists(Person::class));
    }

    public function testIfFunctionGetFullName()
    {
        $this->personObject = new Person('James', 'Jones');
        $this->assertEquals(
            'James Jones',
            $this->personObject->get_full_name()
        );
    }
}
