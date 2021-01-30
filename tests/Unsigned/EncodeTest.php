<?php

declare(strict_types=1);

namespace Softwarewisdom\LEB128\Tests\Unsigned;

use PHPUnit\Framework\TestCase;
use Softwarewisdom\LEB128\Unsigned\Encode;

class EncodeTest extends TestCase
{
    public function testEncode(): void
    {
        $encode = new Encode(624485);
        $encode->encode();
        self::assertEquals([0xE5, 0x8E, 0x26], $encode->value());
    }
    //9487
    public function testEncode1(): void
    {
        $encode = new Encode(9487);
        $encode->encode();
        self::assertEquals([0x8f, 0x4a], $encode->value());
    }
}
