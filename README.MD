# random-number

Generator of random numbers

## Usage

```php
$randomNumberService = new Jimmwo\RandomNumber\Service\RandomNumber();

$result = $randomNumberService->getRandomNumber(0, 100, [2, 6]);

echo sprintf("Seed: %d, random number: %d", $result->getSeed(), $result->getNumber());
```
