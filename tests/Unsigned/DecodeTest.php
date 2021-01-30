<?php

declare(strict_types=1);

namespace Softwarewisdom\LEB128\Tests\Unsigned;

use PHPUnit\Framework\TestCase;
use Softwarewisdom\LEB128\Unsigned\Decode;

/**
 * Class DecodeTest
 * @package Softwarewisdom\LEB128\Tests\Unsigned
 */
class DecodeTest extends TestCase
{
    /**
     * @dataProvider leb128Provider
     * @param array<int> $input
     * @param int $expected
     */
    public function testDecode($input, $expected): void
    {
        $decode = new Decode($input);
        $decode->decode();
        self::assertEquals($expected, $decode->value());
    }

    /**
     * @return array<array<array<int>|int>>
     */
    public function leb128Provider(): array
    {
        return [
            [[0x01], 0x01],
            [[0x80, 0x01], 0x80],
            [[0x80, 0x80, 0x01], 0x4000],
            [[0x80, 0x80, 0x80, 0x01], 0x200000],
            [[0x80, 0x80, 0x80, 0x80, 0x01], 0x10000000],
            [[0x8f, 0x4a], 9487]
        ];
    }
}
