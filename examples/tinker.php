<?php
use Wensleydale\SparkCore;
use Wensleydale\SparkException;

/*
 * This example demonstrates methods used to integrate with the default tinker firmware
 * More details on the Tinker function may be found at http://docs.spark.io/#/start/tinkering-with-tinker-the-tinker-api
 */

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

//Get your access token from either the Spark Build site or make a token request
$accessToken = 'your_access_token';

//Create a new Spark instance
$core = SparkCore::make($accessToken);

//Set the device that you wish to interact with
$core->setDeviceId('your_device_id');

//Digital write - this will turn on the in-built LED
$core->setPin('D7');
$core->setValue('HIGH');

try {
    $result = $core->digitalWrite();
    echo $result->result; // 1 if success -1 if fails
} catch (SparkException $e) {
    echo "There was an issue with the digital write method";
}

//Digital read
$core->setPin('D7');

try {
    $result = $core->digitalRead();
    echo $result->result; // 1 if HIGH 0 if LOW -1 if fails
} catch (SparkException $e) {
    echo "There was an issue with the digital read method";
}

//Analog write
$core->setPin('A0');
$core->setValue('255');

try {
    $core->analogWrite();
    echo $result->result; // 1 if success -1 if fails
} catch (SparkException $e) {
    echo "There was an issue with the analog write method";
}

//Analog read
$core->setPin('A0');

try {
    $result = $core->analogRead();
    echo $result->result; // Reading between 0 and 4095 and -1 if fails
} catch (SparkException $e) {
    echo "There was an issue with the analog read method";
}