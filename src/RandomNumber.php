<?php

declare(strict_types=1);

namespace Jimmwo\RandomNumber;

use Jimmwo\RandomNumber\DTO\RandomNumberResultDto;

class RandomNumber
{
    public function getRandomNumber(int $min, int $max, array $excludeNumbers = []): RandomNumberResultDto
    {
        $seed = random_int(0, PHP_INT_MAX);
        mt_srand($seed);

        while (true) {
            $number = mt_rand($min, $max);
            if (!in_array($number, $excludeNumbers, true)) {
                break;
            }
        }

        return new RandomNumberResultDto($number, $seed);
    }
}
