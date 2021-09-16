<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;


class PostMethodTest extends TestCase
{
    public function testWarmUp()
    {
        $this->assertTrue($_POST["name"], "You did not");
    }
}
