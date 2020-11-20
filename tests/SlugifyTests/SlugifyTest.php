<?php
namespace SlugifyTests;

use Slugify\Slugify;
use PHPUnit\Framework\TestCase;

/**
 * Class SlugifyTest
 * @package SlugifyTests
 */
class SlugifyTest extends TestCase
{
    public function testSimple()
    {
        $str = 'abcdef';
        $this->assertEquals($str, Slugify::get($str));

        $str = 'abc def';
        $this->assertEquals('abc-def', Slugify::get($str));

        $str = 'abc          def';
        $this->assertEquals('abc-def', Slugify::get($str));
    }

    public function testSpecialCharacters()
    {
        $str = '£@*()&abcdef';
        $this->assertEquals('abcdef', Slugify::get($str));

        $str = '£ @ * ( ) & a b c d e f';
        $this->assertEquals('a-b-c-d-e-f', Slugify::get($str));
    }
}
