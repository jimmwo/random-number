<?php

declare(strict_types=1);

namespace Jimmwo\RandomNumber\DTO;

final class RandomNumberResultDto
{
    private int $number;
    private int $seed;

    public function __construct(int $number, int $seed)
    {
        $this->number = $number;
        $this->seed = $seed;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getSeed(): int
    {
        return $this->seed;
    }
}
