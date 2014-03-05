<?php
use Wensleydale\SparkCore;
use Wensleydale\SparkException;

/*
 * This example lists all Spark devices associated with an access token and uses the
 * deviceInfo method to retrieve specific information about a connected device
 */

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

//Get your access token from either the Spark Build site or make a token request
$accessToken = 'your_access_token';

//Create a new Spark instance
$core = SparkCore::make($accessToken);

//Retrieve all devices associated with this token
try {
    $devices = $core->devices();

    if (is_array($devices)) {
        foreach ($devices as $device) {
            $deviceId[] = $device->id;
        }

        if (isset($deviceId[0])) {

            echo $deviceId[0]; //The first device listed as associated to this access token

            //Set the device id for the first device
            $core->setDeviceId($deviceId[0]);
        }

        //Retrieve information about exposed functions and variables on this device
        try {
            $deviceInfo = $core->deviceInfo();

            echo $deviceInfo->name; //What is this device called?

        } catch (SparkException $e) {
            echo 'An error occurred getting this device information.';
        }

    }

} catch (SparkException $e) {
    echo 'There was an error retrieving device listings'; //More details regarding the error in $e
}