<?php
use Wensleydale\SparkCore;
use Wensleydale\SparkException;

/*
 * This example flashes the core with firmware
 */

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

//Get your access token from either the Spark Build site or make a token request
$accessToken = 'bfd80dddeb84331baa10bb65edcf65e47af27a0e';

//Create a new Spark instance
$core = SparkCore::make($accessToken);

$core->setDeviceId('51ff71065067545756280187');
$core->setFile($_SERVER['DOCUMENT_ROOT'] . '/examples/application.cpp');

try {
    $result = $core->flashDevice();
    if ($result->ok) {
        echo 'Core flashed successfully';
    } else {
        echo 'There was an error flashing the core. There is more information regarding the error by examining $result->errors';
    }
} catch (SparkException $e) {
    echo 'There was an error flashing the core';
}

