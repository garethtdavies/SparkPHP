<?php
use Wensleydale\SparkCore;
use Wensleydale\SparkException;

/*
 * This example runs a custom function that is exposed on the Spark core as per the documentation we
 * assume that there is a brew function exposed on the device.
 * To see a list of all functions/variables exposed on a device see the deviceInfo method.
 */

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

//Get your access token from either the Spark Build site or make a token request
$accessToken = 'your_access_token';

//Create a new Spark instance
$core = SparkCore::make($accessToken);

//Set the device that you wish to call the function on
$core->setDeviceId('your_device_id');

//Set the function that we want to run
$core->setFunction('brew');

//Pass in any variables to the brew function as an array
$core->setParams(array('202', '230'));

//Run the brew method on the core passing in the parameters
try {
    $result = $core->run();
    echo $result->return_value;
} catch (SparkException $e) {
    echo 'There was an error running your function on the core';
}

