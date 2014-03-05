<?php
use Wensleydale\SparkCore;
use Wensleydale\SparkException;

/*
 * This example retrieves a custom variable that is exposed on the Spark core as per the documentation we
 * assume that there is a temperature variable exposed on the device.
 * To see a list of all functions/variables exposed on a device see the deviceInfo method.
 */

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

//Get your access token from either the Spark Build site or make a token request
$accessToken = 'your_access_token';

//Create a new Spark instance
$core = SparkCore::make($accessToken);

//Set the device that you wish to call the function on
$core->setDeviceId('your_device_id');

//Set the variable that we wish to retrieve
//NOTE: Variable names are truncated after the 12th character: temperature_sensor is accessible as temperature_
$core->setVariable('temperature');

try{
    $result = $core->read();
    echo $result->temperature;
}
catch(SparkException $e)
{
    echo 'There was an error reading the variable from the device';
}




