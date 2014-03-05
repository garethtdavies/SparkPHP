<?php
use Wensleydale\SparkCore;
use Wensleydale\SparkException;

/*
 * This example flashes the core with firmware
 */

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

//Get your access token from either the Spark Build site or make a token request
$accessToken = 'your_access_token';

//Create a new Spark instance
$core = SparkCore::make($accessToken);

$core->setFile('../examples/application.cpp');

try{
    $result = $core->flashDevice();
    echo $result->ok; //true or false - more info for failed updates in $result->errors
}
catch(SparkException $e)
{
    echo 'There was an error flashing the core';
}

