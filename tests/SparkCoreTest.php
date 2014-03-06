<?php

class SparkCoreTest extends PHPUnit_Framework_TestCase
{
    public function test_make_returns_an_instance_of_spark()
    {
        $client = \Wensleydale\SparkCore::make('token');

        $this->assertInstanceOf('Wensleydale\Spark', $client);
    }

    public function test_token_returns_an_instance_of_spark_token()
    {
        $client = \Wensleydale\SparkCore::token();

        $this->assertInstanceOf('Wensleydale\SparkToken', $client);
    }
}