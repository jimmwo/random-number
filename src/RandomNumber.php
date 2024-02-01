<?php

declare(strict_types=1);

namespace Jimmwo\RandomNumber;

use Jimmwo\RandomNumber\DTO\RandomNumberResultDto;

class RandomNumber
{
    public function getRandomNumber(int $min, int $max, array $excludeNumbers = []): RandomNumberResultDto
    {
        while (true) {
            $number = random_int($min, $max);
            if (!in_array($number, $excludeNumbers, true)) {
                break;
            }
        }

        return new RandomNumberResultDto($number, 0);
    }
}
