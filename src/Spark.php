<?php namespace Wensleydale;

use Guzzle\Http\Client;
use Guzzle\Http\Exception\BadResponseException;

/**
 * Class Spark
 * @package Wensleydale
 */
class Spark implements SparkInterface
{

    /**
     * @var
     */
    private $deviceId;

    /**
     * @var
     */
    private $accessToken;

    /**
     * @var \Guzzle\Http\Client
     */
    private $client;

    /**
     * @var
     */
    private $pin;

    /**
     * @var
     */
    private $value;

    /**
     * @var
     */
    private $params;

    /**
     * @var
     */
    private $function;

    /**
     * @var
     */
    private $variable;

    /**
     * @var
     */
    private $file;

    /**
     * @param \Guzzle\Http\Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param mixed $deviceId
     */
    public function setDeviceId($deviceId)
    {
        $this->deviceId = $deviceId;
    }

    /**
     * @param mixed $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @param mixed $pin
     */
    public function setPin($pin)
    {
        $this->pin = $pin;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params)
    {
        $this->params = implode(",", $params);
    }

    /**
     * @param $function
     * @internal param mixed $method
     */
    public function setFunction($function)
    {
        $this->function = $function;
    }

    /**
     * @param mixed $variable
     */
    public function setVariable($variable)
    {
        $this->variable = $variable;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * List devices the currently authenticated user has access to
     * @throws SparkException
     * @return \Guzzle\Http\EntityBodyInterface|string
     */
    public function devices()
    {
        try {
            $request = $this->client->get('devices')->send();
        } catch (BadResponseException $e) {
            throw new SparkException($e->getResponse()->getBody());
        }

        return json_decode($request->getBody());
    }

    /**
     * Get basic information about the given Core, including the custom variables and functions it has exposed
     * @return mixed
     * @throws SparkException
     */
    public function deviceInfo()
    {
        try {
            $request = $this->client->get("devices/{$this->deviceId}")
                ->send();
        } catch (BadResponseException $e) {
            throw new SparkException($e->getResponse()->getBody());
        }

        return json_decode($request->getBody());
    }

    /**
     *
     * @return \Guzzle\Http\EntityBodyInterface|string
     * @throws SparkException
     */
    public function flashDevice()
    {
        try {

            $request = $this->client->put(
                "devices/{$this->deviceId}",
                null,
                array(
                    'file' => "@{$this->file}"
                )
            )
                ->send();

        } catch (BadResponseException $e) {
            throw new SparkException($e->getResponse()->getBody());
        }

        return json_decode($request->getBody());
    }

    /**
     * Sets the pin to HIGH or LOW
     * @throws SparkException
     * @return \Guzzle\Http\EntityBodyInterface|string
     */
    public function digitalWrite()
    {
        try {
            $request = $this->client->post(
                "devices/{$this->deviceId}/digitalwrite",
                null,
                array(
                    'params' => "{$this->pin},{$this->value}"
                )
            )
                ->send();
        } catch (BadResponseException $e) {
            throw new SparkException($e->getResponse()->getBody());
        }

        return json_decode($request->getBody());
    }

    /**
     * This will read the digital value of a pin, which can be read as either HIGH or LOW
     * @return \Guzzle\Http\EntityBodyInterface|string
     * @throws SparkException
     */
    public function digitalRead()
    {
        try {
            $request = $this->client->post(
                "devices/{$this->deviceId}/digitalread",
                null,
                array(
                    'params' => "{$this->pin}"
                )
            )
                ->send();
        } catch (BadResponseException $e) {
            throw new SparkException($e->getResponse()->getBody());
        }

        return json_decode($request->getBody());
    }

    /**
     * Sets the pin to a value between 0 and 255
     * @return \Guzzle\Http\EntityBodyInterface|string
     * @throws SparkException
     */
    public function analogWrite()
    {
        try {
            $request = $this->client->post(
                "devices/{$this->deviceId}/analogwrite",
                null,
                array(
                    'params' => "{$this->pin},{$this->value}"
                )
            )
                ->send();
        } catch (BadResponseException $e) {
            throw new SparkException($e->getResponse()->getBody());
        }

        return json_decode($request->getBody());
    }

    /**
     * This will read the analog value of a pin, which is a value from 0 to 4095
     * @return \Guzzle\Http\EntityBodyInterface|string
     * @throws SparkException
     */
    public function analogRead()
    {
        try {
            $request = $this->client->post(
                "devices/{$this->deviceId}/analogread",
                null,
                array(
                    'params' => "{$this->pin}"
                )
            )
                ->send();
        } catch (BadResponseException $e) {
            throw new SparkException($e->getResponse()->getBody());
        }

        return json_decode($request->getBody());
    }

    /**
     * This will run a custom method that is exposed on a Spark core
     * @return \Guzzle\Http\EntityBodyInterface|string
     * @throws SparkException
     */
    public function run()
    {
        try {
            $request = $this->client->post(
                "devices/{$this->deviceId}/{$this->function}",
                null,
                array(
                    'params' => "{$this->params}"
                )
            )
                ->send();
        } catch (BadResponseException $e) {
            throw new SparkException($e->getResponse()->getBody());
        }

        return json_decode($request->getBody());
    }

    /**
     * This will read a custom variable that is exposed on a Spark core
     * @return mixed
     * @throws SparkException
     */
    public function read()
    {
        try {
            $response = $this->client->get("devices/{$this->deviceId}/{$this->variable}")
                ->send();
        } catch (BadResponseException $e) {
            throw new SparkException($e->getResponse()->getBody());
        }

        return (json_decode(
            $response->getBody()
        ));
    }
}