<?php

/**
 * This file is part of the Unicode package
 *
 * (c) Vitaliy Zhuk <zhuk2205@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace Ideea\Unicode;

/**
 * Unicode utilities
 */
class Unicode
{
    /**
     * Get char code
     *
     * @param string $char   The char for detect code
     * @param int    &$bytes Referenced the count bytes in char
     *
     * @return int
     */
    public static function ord($char, &$bytes = null)
    {
        // Get the first byte from char
        $firstByte = substr($char, 0, 1);
        $firstByteCode = ord($firstByte);

        $bytes = 0;

        while ($firstByteCode >> 7 & 0x01) {
            $bytes++;
            $firstByteCode <<= 1;
        }

        if ($bytes === 0) {
            // 0b0xxxxxxx
            return ord($firstByte);
        }

        // Create a unicode ord
        $unicodeOrd = ((ord($firstByte) << ($bytes + 1)) & 0xFF) >> ($bytes + 1);

        for ($i = 1; $i < $bytes; $i++) {
            // Shift unicode byte to left on 6 position (0b10xxxxxx)
            $unicodeOrd <<= 6;
            $byte = ord(substr($char, $i, 1)) & 0b00111111;
            $unicodeOrd |= $byte;
        }

        return $unicodeOrd;
    }

    /**
     * Get char codes from string
     *
     * @param string $string The string for detect codes
     *
     * @return array
     */
    public static function ordStr($string)
    {
        $codes = array();

        $encoding = mb_detect_encoding($string);
        $size = mb_strlen($string, $encoding);

        for ($i = 0; $i < $size; $i++) {
            $char = mb_substr($string, $i, 1, $encoding);
            $codes[] = static::ord($char);
        }

        return $codes;
    }
}
