<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class Person2Test extends TestCase
{
    public function testThatClassExists()
    {
        $this->assertTrue(
            class_exists('Person2'),
            'The Person2 class has not been defined'
        );
    }

    public function testGreetingMethod()
    {
        $this->assertEquals(
            'Welcome to Planet Earth Martians!',
            Person2::greet_extraterrestrials('Martians')
        );
    }

    /*
    testSpecies
    testPropertyDeclarations
    testConstructor
    testIntroduce V
    testDescribeJob
    testStaticMethod
    */
}
