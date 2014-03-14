SparkPHP
========

[![Build Status](https://travis-ci.org/garethtdavies/SparkPHP.png?branch=master)](https://travis-ci.org/garethtdavies/SparkPHP)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/garethtdavies/SparkPHP/badges/quality-score.png?s=f2f7da63bff03c32a86e3a1f6cdcea7c6c14b4e2)](https://scrutinizer-ci.com/g/garethtdavies/SparkPHP/)
[![Code Coverage](https://scrutinizer-ci.com/g/garethtdavies/SparkPHP/badges/coverage.png?s=0948daafb60a4ef0eeea320d9d158064c487748c)](https://scrutinizer-ci.com/g/garethtdavies/SparkPHP/)
[![Dependency Status](https://www.versioneye.com/user/projects/53235c43ec137554460000d4/badge.png)](https://www.versioneye.com/user/projects/53235c43ec137554460000d4)

PHP library for the [Spark.io API](http://docs.spark.io/#/api).

Makes it incredibly easy to get up and running using the default Tinker firmware or any custom function/variable that is exposed by your core firmware. You can also use the library to access/generate tokens and flash firmware to your core.

More detailed examples will follow shortly but basic operations may be found in the examples directory.

### Turning on a LED using default tinker firmware
    $core = SparkCore::make($accessToken);
    $core->setPin('D7');
    $core->setValue('HIGH');
    $core->digitalWrite(); //Will turn on the inbuilt LED

### Installing via Composer

The recommended way to install the library is through [Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php

# Add Spark as a dependency
php composer.phar require wensleydale/spark:dev-master
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

### Managing Tokens

You may list all your tokens, generate a token or delete a token

    $tokenInstance = SparkCore::token();
    $tokenInstance->setUsername('your_spark_username');
    $tokenInstance->setPassword('your_spark_password');
    $listTokens = $tokenInstance->listTokens();

### Exceptions

If there are any issues during the API request a SparkException or SparkTokenException will be thrown which can be caught
and managed according to your application needs.

### Unit Tests

This library uses PHPUnit for unit testing. In order to run the unit tests, you'll first need
to install the dependencies of the project using Composer: `php composer.phar install --dev`.
You can then run the tests using `vendor/bin/phpunit`. The library comes with a set of mocked responses
from the Spark API