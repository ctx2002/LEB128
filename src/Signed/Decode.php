<?php

namespace Softwarewisdom\LEB128\Signed;

/**
 * Class Decode
 * @package Softwarewisdom\LEB128\Signed
 */
class Decode
{
    /**
     * @var array<int> $value
     */
    private $value;
    /**
     * @var int
     */
    private $result = 0;

    /**
     * Decode constructor.
     * @param array<int> $value
     */
    public function __construct(array $value)
    {
        $this->value = $value;
    }

    /**
     *
     */
    public function decode(): void
    {
        $this->result = 0;
        $shift = 0;
        while (true) {
            $byte = array_shift($this->value);
            $this->result |= ($byte & 0x7f) << $shift;
            $shift += 7;
            if ((0x80 & $byte) === 0) {
                if ($shift < 32 && ($byte & 0x40) !== 0) {
                    $this->result |= (~0 << $shift);
                }
                break;
            }
        }
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->result;
    }
}
