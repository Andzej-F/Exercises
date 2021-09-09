<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ReverseTest extends TestCase
{
    private $word;

    public function setUp(): void
    {
        $this->word = new Reverse();
    }
}
