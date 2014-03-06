PHPSpark
========

[![Build Status](https://travis-ci.org/garethtdavies/SparkPHP.png?branch=master)](https://travis-ci.org/garethtdavies/SparkPHP)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/garethtdavies/SparkPHP/badges/quality-score.png?s=f2f7da63bff03c32a86e3a1f6cdcea7c6c14b4e2)](https://scrutinizer-ci.com/g/garethtdavies/SparkPHP/)
[![Code Coverage](https://scrutinizer-ci.com/g/garethtdavies/SparkPHP/badges/coverage.png?s=0948daafb60a4ef0eeea320d9d158064c487748c)](https://scrutinizer-ci.com/g/garethtdavies/SparkPHP/)
[![Dependency Status](https://www.versioneye.com/user/projects/5317b3daec13755bfa00053a/badge.png)](https://www.versioneye.com/user/projects/5317b3daec13755bfa00053a)

PHP library for the [Spark.io API](http://docs.spark.io/#/api).

Makes it incredibly easy to get up and running using the default Tinker firmware or any custom function/variable that is exposed by your core firmware. You can also use the library to access/generate tokens and flash firmware to your core.

More detailed examples will follow shortly but basic operations may be found in the examples directory.

###Turning on a LED using default tinker firmware
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