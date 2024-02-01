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

#### parameters:
`-r` - range of random numbers\
`-s` - selections of random numbers\
`-d` - count of draws\
`-u` - is the numbers must be unique \
`-p` - folder path to save the dataset, default: `.`


```bash
./generate-dataset -r2 -s3 -d4 -u1 -p"./src"
./generate-dataset -r2 -s3 -d4 -u0
```
