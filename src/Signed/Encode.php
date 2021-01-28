<?php

namespace Softwarewisdom\LEB128\Signed;

/**
 * Class Encode
 * @package Softwarewisdom\LEB128\Signed
 */
class Encode
{
    /**
     * @var int
     */
    private $value;
    /**
     * @var array<int>
     */
    private $result = [];

    /**
     * Encode constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     *
     */
    public function encode(): void
    {
        $value = $this->value;
        //$value |= 0;
        $this->result = [];
        while (true) {
            $byte = $value & 0x7f;
            $value >>= 7;
            if (
                //0x40 is 0100 0000
                ($value === 0 && ($byte & 0x40) === 0) ||
                ($value === -1 && ($byte & 0x40) !== 0)
            ) {
                $this->result[] = $byte;
                break;
            }

            $this->result[] = $byte | 0x80; //adding 1 at highest position
        }
    }

    /**
     * @return int[]
     */
    public function value(): array
    {
        return $this->result;
    }
}
