<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class AccessingGlobalVariablesTest extends TestCase
{
    public function testFunctions()
    {
        require 'src/AccessingGlobalVariables.php';
        global $x, $y, $z, $string;

        $x = 0;
        increment_x();
        $this->assertEquals(1, $x);

        for ($i = 0; $i < 5; $i++) increment_x();
        $this->assertEquals(6, $x);

        increment_x();
        increment_x();
        $this->assertEquals(8, $x);

        for ($i = 0; $i < 132; $i++) increment_x();
        $this->assertEquals(140, $x);

        $x = $y = $z = 3;
        double_x_triple_y_quadruple_z();
        $this->assertEquals(6, $x);
        $this->assertEquals(9, $y);
        $this->assertEquals(12, $z);

        $string = "Hello";
        append_whitespace_to_string();
        $this->assertEquals("Hello ", $string);

        $string .= "World";
        $this->assertEquals("Hello World", $string);
        append_whitespace_to_string();
        append_whitespace_to_string();
        $this->assertEquals("Hello World  ", $string);

        $string = "";
        add_world_to_string();
        $this->assertEquals("world", $string);

        append_whitespace_to_string();
        $this->assertEquals("world ", $string);

        add_world_to_string();
        $this->assertEquals("world world", $string);

        for ($i = 0; $i < 11; $i += 1) {
            append_whitespace_to_string();
            add_world_to_string();
        }
        $this->assertEquals("world world world world world world world world world world world world world", $string);

        $this->assertEquals(13, count(explode(" ", $string)));
    }
}
