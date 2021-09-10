<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class RegexTest extends TestCase
{
    private $expression;
    private $url = 'www.guru99.com';

    public function setUp(): void
    {
        $this->expression = new Regex();
    }

    public function testRegexReturnValue()
    {
        $this->assertTrue($this->expression->convert($this->url));
    }
}
