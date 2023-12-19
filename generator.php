<?php

require_once __DIR__ . '/vendor/autoload.php';

use Jimmwo\RandomNumber\RandomNumberDatasetGenerator;

$shortOpts  = "r:"; // range
$shortOpts .= "s:"; // selections
$shortOpts .= "d:"; // raws
$shortOpts .= "u:"; // unique
$shortOpts .= "p::"; // path to folder for safe dataset
$params = getopt($shortOpts);

if (!isset($params['r']) || !isset($params['s']) || !isset($params['d']) || !isset($params['u'])) {
    echo 'Please provide all required params: -r -s -d -u' . PHP_EOL;
    die;
}

$service = new RandomNumberDatasetGenerator();
$service->generateDataset(
    (int) $params['d'],
    (int) $params['s'],
    (int) $params['r'],
    (bool) $params['u'],
    $params['p'] ?? null
);
