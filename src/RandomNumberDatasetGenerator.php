<?php

declare(strict_types=1);

namespace Jimmwo\RandomNumber;

use Jimmwo\RandomNumber\Service\RandomNumber;
use RuntimeException;
use Throwable;

class RandomNumberDatasetGenerator
{
    private RandomNumber $service;

    public function __construct()
    {
        $this->service = new RandomNumber();
    }
    public function generateDataset(
        int $draws,
        int $selections,
        int $range,
        bool $isUnique,
        string $pathToSave = '.'
    ): void {
        $fileName = sprintf(
            'random-dataset-%d-%d-%d-%s-%s.csv',
            $draws,
            $selections,
            $range,
            $isUnique ? 'unique' : 'non-unique',
            time()
        );
        echo sprintf(
            'Start generating %d draws of %d selections from %d numbers%s',
            $draws,
            $selections,
            $range,
            PHP_EOL
        );

        try {
            $fp = fopen("$pathToSave/$fileName", 'w');
            if (!$fp) {
                throw new RuntimeException('Could not open file');
            }

            $i = 1;
            $start_time = microtime(true);
            while ($i <= $draws) {
                $numbers = [];
                foreach (range(1, $selections) as $j) {
                    $excludedNumbers = $isUnique ? $numbers : [];
                    $numbers[] = $this->service->getRandomNumber(0, $range, $excludedNumbers)->getNumber();
                }

                fputcsv($fp, $numbers);

                if ($i % 1000000 === 0) {
                    echo sprintf(
                        "'Generated %d/%d (%d%%) draws. %.2f have passed%s",
                        $i,
                        $draws,
                        $i * 100 / $draws,
                        microtime(true) - $start_time,
                        PHP_EOL
                    );
                }

                $i++;
            }
            $end_time = microtime(true);
        } catch (Throwable $exception) {
            fclose($fp);

            throw $exception;
        }

        fclose($fp);

        echo sprintf(
            'Time taken: %.2f seconds%s',
            $end_time - $start_time,
            PHP_EOL
        );
    }
}
