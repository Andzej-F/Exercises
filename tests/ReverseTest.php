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

    public function testWordReverseOnlyWithAlphaCharacters()
    {
        $this->assertEquals(
            'nahsirk',
            $this->word->reverseLetter('krishan')
        );
    }

    public function testWordReverseWithNonAlphaCharacters()
    {
        $this->assertEquals(
            'nortlu',
            $this->word->reverseLetter('ultr53o?n')
        );
    }

    public function testWordReverseWithNonAlphaCharactersAndCapitalLetters()
    {
        $this->assertEquals(
            'NorTlu',
            $this->word->reverseLetter('ulTr53o?N')
        );
    }
}
