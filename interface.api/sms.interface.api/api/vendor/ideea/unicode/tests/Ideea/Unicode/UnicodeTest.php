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
 * Test unicode utils
 */
class UnicodeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Testing "ord" function
     *
     * @dataProvider providerUnicodeChars
     */
    public function testOrd($code, $char)
    {
        $this->assertEquals($code, Unicode::ord($char));
    }

    /**
     * Get unicode characters
     *
     * @return array
     */
    public function providerUnicodeChars()
    {
        $sections = parse_ini_file(__DIR__ . '/tests.ini', true);

        $data = array();

        foreach ($sections['chars'] as $char => $code) {
            $data[] = array($code, $char);
        }

        return $data;
    }

    /**
     * Testing "ordStr" function
     *
     * @dataProvider providerUnicodeStrings
     */
    public function testOrdStr($data)
    {
        list ($string, $codes) = $data;

        $this->assertEquals(Unicode::ordStr($string), $codes);
    }

    /**
     * Get unicode strings
     *
     * @return array
     */
    public function providerUnicodeStrings()
    {
        $sections = parse_ini_file(__DIR__ . '/tests.ini', true);

        $data = array();

        foreach ($sections['strings'] as $string => $codes) {
            $codes = explode(',', $codes);
            $data[] = array(array(trim($string), $codes));
        }

        return $data;
    }
}