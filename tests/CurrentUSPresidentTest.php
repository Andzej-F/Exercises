<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CurrentUSPresidentTest extends TestCase
{
    public function testThatClassIsRenamed()
    {
        $this->assertTrue(
            class_exists('CurrentUSPresident'),
            'Class was not renamed'
        );
    }
}
