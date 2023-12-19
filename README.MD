# random-number

Generator of random numbers

## Usage

```php
$randomNumberService = new Jimmwo\RandomNumber\RandomNumber();

$result = $randomNumberService->getRandomNumber(0, 100, [2, 6]);

echo sprintf("Seed: %d, random number: %d", $result->getSeed(), $result->getNumber());
```

### Generate dataset for testing

```php
$generator = new Jimmwo\RandomNumber\RandomNumberDatasetGenerator();
$generator->generateDataset(1000000, 5, 4294967296, true, './dataset-folder');
```

### Generate dataset by cli command

```bash
./generate-dataset -r2 -s3 -d4 -utrue -p"./src"
```
