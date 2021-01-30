<?php

declare(strict_types=1);

namespace Softwarewisdom\LEB128\Unsigned;

/**
 * Class Encode
 * @package Softwarewisdom\LEB128\Unsigned
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
    private $result;

    /**
     * Encode constructor.
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

        $this->result = [];
        do {
            $byte = $value & 0x7f; //low order 7 bits of value
            $value >>= 7;
            if ($value !== 0) {
                $this->result[] = $byte | 0x80;
            } else {
                $this->result[] = $byte;
            }
        } while ($value !== 0);
    }

    /**
     * @return array<int>
     */
    public function value(): array
    {
        return $this->result;
    }
}
