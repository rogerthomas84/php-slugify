<?php
namespace Slugify;

/**
 * Class Slugify
 * @package Slugify
 */
class Slugify
{
    /**
     * Generate a slug from a string.
     *
     * @param string $str
     * @return string
     */
    public static function get(string $str, ?int $maxLength = null): string
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $str);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, '-');
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            $text = 'n-a';
        }
        if ($maxLength !== null) {
            if (mb_strlen($text) > $maxLength) {
                return rtrim(substr($text, 0, $maxLength), '-');
            }
        }
        return $text;
    }
}
