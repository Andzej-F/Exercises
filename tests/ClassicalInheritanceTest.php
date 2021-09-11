<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ClassicalInheritanceTest extends TestCase
{
    public function testPreloaded()
    {
        $this->assertTrue(class_exists('Person2'),);
    }

    public function testClassDeclarations()
    {
        $this->assertTrue(class_exists('Salesman'), 'You have not yet defined the \"Salesman"\ class');
        $this->assertTrue(class_exists('ComputerProgrammer'), "You have not yet defined the \"ComputerProgrammer\" class");
        $this->assertTrue(class_exists('WebDeveloper'), "You have not yet defined the \"WebDeveloper\" class");
    }

    public function testInheritanceModel()
    {
        $person2 = new Person2(NULL, NULL, NULL);
        $salesman = new Salesman(NULL, NULL);
        $computer_programmer = new ComputerProgrammer(NULL, NULL);
        $web_developer = new WebDeveloper(NULL, NULL);

        $this->assertInstanceOf(Person2::class, $person2);
        $this->assertNotInstanceOf(Salesman::class, $person2);
        $this->assertNotInstanceOf(ComputerProgrammer::class, $person2);
        $this->assertNotInstanceOf(WebDeveloper::class, $person2);
    }

    protected function randomToken()
    {
        $result = '';
        for ($i = 0; $i < 20; $i++) {
            $result .= 'abcdefghijklmnoprqstuvwxyz0123456789'[rand(0, 35)];
        }
        // echo $result . "\n";
        return $result;
    }

    public function testSalesmanClassConstructor()
    {
        // Fixed Assertions
        $oliver = new Salesman('Oliver', 16);
        $this->assertEquals('Oliver', $oliver->name);
        $this->assertEquals(16, $oliver->age);
        $this->assertEquals("Salesman", $oliver->occupation);

        $lily = new Salesman('Lily', 17);
        $this->assertEquals('Lily', $lily->name);
        $this->assertEquals(17, $lily->age);
        $this->assertEquals("Salesman", $lily->occupation);

        $andre = new Salesman('Andre', 25);
        $this->assertEquals('Andre', $andre->name);
        $this->assertEquals(25, $andre->age);
        $this->assertEquals('Salesman', $andre->occupation);

        // Random Assertions
        for ($i = 0; $i < 100; $i++) {
            $salesman = new Salesman($name = $this->randomToken(), $age = rand(0, 100));
            $this->assertEquals($name, $salesman->name);
            $this->assertEquals($age, $salesman->age);
            $this->assertEquals('Salesman', $salesman->occupation);
            // print_r($salesman);
        }
    }

    public function testSalesmanIntroduceMethod()
    {
        //Fixed Assertions
        $naomi = new Salesman('Naomi', 19);
        $this->assertEquals("Hello, my name is Naomi, don't forget to check out my products!", $naomi->introduce());

        $meg = new Salesman("Meg", 30);
        $this->assertEquals("Hello, my name is Meg, don't forget to check out my products!", $meg->introduce());

        $maximillian = new Salesman("Maximillian", 27);
        $this->assertEquals("Hello, my name is Maximillian, don't forget to check out my products!", $maximillian->introduce());

        // Random Assertions
        for ($i = 0; $i < 100; $i++) {
            $this->assertEquals(
                "Hello, my name is " . ($name = $this->randomToken()) .
                    ", don't forget to check out my products!",
                (new Salesman($name, rand(0, 100)))->introduce()
            );
        }
    }
}
