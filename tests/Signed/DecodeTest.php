<?php

namespace Softwarewisdom\LEB128\Tests\Signed;

use PHPUnit\Framework\TestCase;
use Softwarewisdom\LEB128\Signed\Decode;

class DecodeTest extends TestCase
{
    public function testDecode(): void
    {
        $decoder = new Decode([0xC0, 0xBB, 0x78]);
        $decoder->decode();
        $actual = $decoder->value();
        self::assertEquals(-123456, $actual);
    }

    public function testDecode0(): void
    {
        $decoder = new Decode([0x00]);
        $decoder->decode();
        $actual = $decoder->value();
        self::assertEquals(0, $actual);
    }

    public function testDecode1(): void
    {
        $decoder = new Decode([0x01]);
        $decoder->decode();
        $actual = $decoder->value();
        self::assertEquals(1, $actual);
    }

    public function testDecodeN1(): void
    {
        $decoder = new Decode([127]);
        $decoder->decode();
        $actual = $decoder->value();
        self::assertEquals(-1, $actual);
    }
}