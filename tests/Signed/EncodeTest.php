<?php

namespace Softwarewisdom\LEB128\Tests\Signed;

use PHPUnit\Framework\TestCase;
use Softwarewisdom\LEB128\Signed\Encode;

class EncodeTest extends TestCase
{
    public function testEncode(): void
    {
        $encoder = new Encode(-123456);
        $encoder->encode();
        $actual = $encoder->value();
        self::assertEquals([0xC0, 0xBB, 0x78], $actual);
    }

    public function testEncode0(): void
    {
        $encoder = new Encode(0);
        $encoder->encode();
        $actual = $encoder->value();
        self::assertEquals([0x00], $actual);
    }

    public function testEncode1(): void
    {
        $encoder = new Encode(1);
        $encoder->encode();
        $actual = $encoder->value();
        self::assertEquals([0x01], $actual);
    }

    public function testEncodeN1(): void
    {
        $encoder = new Encode(-1);
        $encoder->encode();
        $actual = $encoder->value();
        self::assertEquals([127], $actual);
    }
}
