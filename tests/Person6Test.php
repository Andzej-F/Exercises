<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class Person6Test extends TestCase
{
    public function testForPersonClass()
    {
        $this->assertTrue(class_exists('Person6'));
    }

    public function testPropertiesAndConstructor()
    {
        $this->assertTrue(property_exists('Person6', 'name'));
        $this->assertTrue(property_exists('Person6', 'age'));
        $this->assertTrue(property_exists('Person6', 'occupation'));
        $this->assertTrue(method_exists('Person6', '__construct'));
    }

    public function testThatAllPropertyVisibilitiesAreProtected()
    {
        $this->assertTrue((new ReflectionProperty('Person6', 'name'))->isProtected());
        $this->assertTrue((new ReflectionProperty('Person6', 'age'))->isProtected());
        $this->assertTrue((new ReflectionProperty('Person6', 'occupation'))->isProtected());
    }
    /*
    public function testIfNameIsAStringException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Name must be a string!");
        $john = new Person6(56, 26, 'Driver');
    }

    public function testIfAgeIsAPositiveIntegerException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Age must be a non-negative integer!");
        $sylvia = new Person6('Sylvia', '-56', 'Driver');
    }

    public function testIfOccupationIsAStringException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Occupation must be a string!");
        $joanna = new Person6('Joanna', 26, 47);
    }

    public function testSalesman6ObjectConstructor()
    {
        $ana = new Person6('Ana', '26', 'Designer');
        $this->assertEquals('Ana', $ana->get_name());
        $this->assertEquals('26', $ana->get_age());
        $this->assertEquals('Designer', $ana->get_occupation());
    }

    public function testSalesman6ObjectConstructorWithToken()
    {
        $weirdName = new Person6('ne4g26lwpf88914wkfuk', 86, 'Designer');
        $this->assertEquals('ne4g26lwpf88914wkfuk', $weirdName->get_name());
        $this->assertEquals(86, $weirdName->get_age());
        $this->assertEquals('s425xtl79zeel12loy94', $weirdName->get_occupation());
    }

    public function testSetterWithInvalidAge1()
    {
        $james = new Person6('James', '32', 'Forester');
        // $this->expectException(InvalidArgumentException::class);
        $james->set_age(52);
        $this->assertEquals(52, $james->get_age());
    }
    */
}
