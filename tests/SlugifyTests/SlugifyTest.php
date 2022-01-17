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
        $this->assertEquals('abc', Slugify::get($str, 3));

        $str = 'abc def';
        $this->assertEquals('abc-def', Slugify::get($str));
        $this->assertEquals('abc', Slugify::get($str, 4)); // the trailing '-' is trimmed.

        $str = 'abc          def';
        $this->assertEquals('abc-def', Slugify::get($str));
        $this->assertEquals('abc-d', Slugify::get($str, 5));
    }

    public function testSpecialCharacters()
    {
        $str = '£@*()&abcdef';
        $this->assertEquals('abcdef', Slugify::get($str));
        $this->assertEquals('abcde', Slugify::get($str, 5));

        $str = '£ @ * ( ) & a b c d e f';
        $this->assertEquals('a-b-c-d-e-f', Slugify::get($str));
        $this->assertEquals('a-b-c', Slugify::get($str, 6)); // trailing '-' is trimmed
    }
}
