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
        $this->assertTrue(class_exists('Salesman'));
        $this->assertTrue(class_exists('ComputerProgrammer'));
        $this->assertTrue(class_exists('WebDeveloper'));
    }

    public function testInheritanceModel()
    {
        $person2 = new Person2(NULL, NULL, NULL);
        $salesman = new Salesman('John Johnson', '26');

        $this->assertInstanceOf(Person2::class, $person2);
        $this->assertNotInstanceOf(Salesman::class, $person2);

        $this->assertInstanceOf(Person2::class, $salesman);
        $this->assertInstanceOf(Salesman::class, $salesman);
        $this->assertNotInstanceOf(ComputerProgrammer::class, $salesman);
        $this->assertNotInstanceOf(WebDeveloper::class, $salesman);

        $this->assertEquals('John Johnson', $salesman->name);
        $this->assertEquals('26', $salesman->age);
        $this->assertEquals('Salesman', $salesman->occupation);
        $this->assertEquals(
            "Hello, my name is John Johnson, don't forget to check out my products",
            $salesman->introduce()
        );
    }
}
