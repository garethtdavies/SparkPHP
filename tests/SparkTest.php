<?php

class SparkTest extends Guzzle\Tests\GuzzleTestCase
{
    private $plugin;

    private $client;

    public function setUp()
    {
        $this->plugin = new Guzzle\Plugin\Mock\MockPlugin();
        $this->client = new \Guzzle\Http\Client();
        $this->client->addSubscriber($this->plugin);
        $this->setMockBasePath(__DIR__ . '/mock/');
    }

    public function test_devices_returns_correct_response()
    {
        $this->plugin->addResponse(new Guzzle\Http\Message\Response(200));
        $this->setMockResponse($this->client, 'devices.txt');

        $core = new \Wensleydale\Spark($this->client);
        $result = $core->devices();

        $this->assertEquals($result[0]->id, '0123456789abcdef01234567');
    }

    public function test_devices_throws_an_exception()
    {
        $this->setExpectedException('Wensleydale\SparkException');
        $this->plugin->addResponse(new Guzzle\Http\Message\Response('400'));

        $core = new \Wensleydale\Spark($this->client);
        $core->devices();
    }

    public function test_device_info_returns_correct_response()
    {
        $this->plugin->addResponse(new Guzzle\Http\Message\Response(200));
        $this->setMockResponse($this->client, 'deviceInfo.txt');

        $core = new \Wensleydale\Spark($this->client);
        $result = $core->deviceInfo();

        $this->assertEquals($result->id, '0123456789abcdef01234567');
    }

    public function test_device_info_throws_spark_exception()
    {
        $this->setExpectedException('Wensleydale\SparkException');
        $this->plugin->addResponse(new Guzzle\Http\Message\Response('400'));

        $core = new \Wensleydale\Spark($this->client);
        $core->deviceInfo();
    }

    public function test_flash_device_returns_correct_response()
    {
        $this->plugin->addResponse(new Guzzle\Http\Message\Response(200));
        $this->setMockResponse($this->client, 'flashDevice.txt');

        $core = new \Wensleydale\Spark($this->client);
        $core->setFile(__DIR__ . '/mock/mock.cpp');
        $result = $core->flashDevice();

        $this->assertTrue($result->ok);
    }

    public function test_flash_device_throws_spark_exception()
    {
        $this->setExpectedException('Wensleydale\SparkException');
        $this->plugin->addResponse(new Guzzle\Http\Message\Response('400'));

        $core = new \Wensleydale\Spark($this->client);
        $core->setFile(__DIR__ . '/mock/mock.cpp');
        $core->flashDevice();
    }

    public function test_digital_write_returns_correct_response()
    {
        $this->plugin->addResponse(new Guzzle\Http\Message\Response(200));
        $this->setMockResponse($this->client, 'digitalWrite.txt');

        $core = new \Wensleydale\Spark($this->client);
        $result = $core->digitalWrite();

        $this->assertEquals($result->id, '0123456789abcdef01234567');
    }

    public function test_digital_write_throws_spark_exception()
    {
        $this->setExpectedException('Wensleydale\SparkException');
        $this->plugin->addResponse(new Guzzle\Http\Message\Response('400'));

        $core = new \Wensleydale\Spark($this->client);
        $core->digitalWrite();
    }

    public function test_digital_read_returns_correct_response()
    {
        $this->plugin->addResponse(new Guzzle\Http\Message\Response(200));
        $this->setMockResponse($this->client, 'digitalRead.txt');

        $core = new \Wensleydale\Spark($this->client);
        $result = $core->digitalRead();

        $this->assertEquals($result->id, '0123456789abcdef01234567');
    }

    public function test_digital_read_throws_spark_exception()
    {
        $this->setExpectedException('Wensleydale\SparkException');
        $this->plugin->addResponse(new Guzzle\Http\Message\Response('400'));

        $core = new \Wensleydale\Spark($this->client);
        $core->digitalRead();
    }

    public function test_analog_write_returns_correct_response()
    {
        $this->plugin->addResponse(new Guzzle\Http\Message\Response(200));
        $this->setMockResponse($this->client, 'analogWrite.txt');

        $core = new \Wensleydale\Spark($this->client);
        $result = $core->analogWrite();

        $this->assertEquals($result->id, '0123456789abcdef01234567');
    }

    public function test_analog_write_throws_spark_exception()
    {
        $this->setExpectedException('Wensleydale\SparkException');
        $this->plugin->addResponse(new Guzzle\Http\Message\Response('400'));

        $core = new \Wensleydale\Spark($this->client);
        $core->analogWrite();
    }

    public function test_analog_read_returns_correct_response()
    {
        $this->plugin->addResponse(new Guzzle\Http\Message\Response(200));
        $this->setMockResponse($this->client, 'analogRead.txt');

        $core = new \Wensleydale\Spark($this->client);
        $result = $core->analogRead();

        $this->assertEquals($result->id, '0123456789abcdef01234567');
    }

    public function test_analog_read_throws_spark_exception()
    {
        $this->setExpectedException('Wensleydale\SparkException');
        $this->plugin->addResponse(new Guzzle\Http\Message\Response('400'));

        $core = new \Wensleydale\Spark($this->client);
        $core->analogRead();
    }

    public function test_run_returns_correct_response()
    {
        $this->plugin->addResponse(new Guzzle\Http\Message\Response(200));
        $this->setMockResponse($this->client, 'run.txt');

        $core = new \Wensleydale\Spark($this->client);
        $result = $core->run();

        $this->assertEquals($result->return_value, '42');
    }

    public function test_run_throws_spark_exception()
    {
        $this->setExpectedException('Wensleydale\SparkException');
        $this->plugin->addResponse(new Guzzle\Http\Message\Response('400'));

        $core = new \Wensleydale\Spark($this->client);
        $core->run();
    }

    public function test_read_returns_correct_response()
    {
        $this->plugin->addResponse(new Guzzle\Http\Message\Response(200));
        $this->setMockResponse($this->client, 'read.txt');

        $core = new \Wensleydale\Spark($this->client);
        $result = $core->read();

        $this->assertEquals($result->cmd, 'VarReturn');
    }

    public function test_read_throws_spark_exception()
    {
        $this->setExpectedException('Wensleydale\SparkException');
        $this->plugin->addResponse(new Guzzle\Http\Message\Response('400'));

        $core = new \Wensleydale\Spark($this->client);
        $core->read();
    }
}
 