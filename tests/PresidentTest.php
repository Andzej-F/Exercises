<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PresidentTest extends TestCase
{

    private $us_president;
    private $president_name;

    // public function setUp(): void
    // {
    //     $this->us_president = new President();
    // }

    public function testThatPresidentClassExists()
    {
        $this->assertTrue(class_exists('President'));
    }

    public function testThatUSPresidentIsInstanceOfPresidentClass()
    {
        global $us_president;
        $this->assertInstanceOf('President', $us_president);
    }

    public function testThatUSPresidentName()
    {
        global $us_president;
        $this->assertEquals('Barack Obama', $us_president->name);
    }

    public function testThatUSPresidentGreeting()
    {
        global $us_president;
        $this->assertEquals(
            'Hello Donald, my name is Barack Obama, nice to meet you!',
            $us_president->greet('Donald')
        );
    }
}
