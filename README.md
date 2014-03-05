PHPSpark
========

[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/garethtdavies/PHPSpark/badges/quality-score.png?s=233461fd3a4fdbbed0c4076b839a7831eca3486b)](https://scrutinizer-ci.com/g/garethtdavies/PHPSpark/)
[![Code Coverage](https://scrutinizer-ci.com/g/garethtdavies/PHPSpark/badges/coverage.png?s=ddd56682d9a01199d382d1e0c5dc02ddc7c7be5d)](https://scrutinizer-ci.com/g/garethtdavies/PHPSpark/)
[![Dependency Status](https://www.versioneye.com/user/projects/531163b7ec13753a900004de/badge.png)](https://www.versioneye.com/user/projects/531163b7ec13753a900004de)

PHP library for the [Spark.io API](http://docs.spark.io/#/api).

Makes it incredibly easy to get up and running using the Tinker firmware or any custom function/variable that is exposed by your core firmware.

You can also use the library to access/generate tokens and flash firmware to your core.

Some more detailed examples for example using the Twitter SDK may be found [here](http://www.gareth.io)

###Turning on a LED on digital pin 7 using default tinker firmware
    $core = SparkCore::make($accessToken);
    $core->setPin('D7');
    $core->setValue('HIGH');
    $core->digitalWrite(); //Will turn on the inbuilt LED

###Installing

The simplest way to get up and running is through composer.

Ensure that your composer autoload file is being required by your project e.g. require '/vendor/autoload.php' and use either the fully qualified namespace
\Wensleydale\SparkCore::make($accessToken) or use the \Wensleydale namespace.

###Exceptions

If there are any issues during the API request a SparkException will be thrown

###Tokens

You may list all your tokens, generate a token or delete a token

    $tokenInstance = SparkCore::token();
    $tokenInstance->setUsername('your_spark_username');
    $tokenInstance->setPassword('your_spark_password');
    $listTokens = $tokenInstance->listTokens();

##Tests

There is a test suite that uses mocked responses from the Spark API.