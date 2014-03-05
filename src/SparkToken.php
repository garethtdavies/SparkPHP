<?php namespace Wensleydale;

use Guzzle\Http\Client;
use Guzzle\Http\Exception\BadResponseException;


/**
 * Class SparkToken
 * @package Wensleydale
 */
class SparkToken implements SparkTokenInterface
{

    /**
     * @var
     */
    private $username;

    /**
     * @var
     */
    private $password;

    /**
     * @var \Guzzle\Http\Client
     */
    private $client;

    /**
     * @param \Guzzle\Http\Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @throws SparkTokenException
     * @return mixed
     */
    public function generateToken()
    {
        try {
            $request = $this->client->post(
                "oauth/token",
                null,
                array(
                    'grant_type' => "password",
                    'username' => "{$this->username}",
                    'password' => "{$this->password}",
                )
            )
                ->setAuth('spark', 'spark')
                ->send();
        } catch (BadResponseException $e) {
            throw new SparkTokenException($e->getResponse()->getBody());
        }

        return json_decode($request->getBody());
    }

    /**
     * @return mixed
     * @throws SparkTokenException
     */
    public function listTokens()
    {
        try {
            $request = $this->client->get('v1/access_tokens')
                ->setAuth($this->username, $this->password)
                ->send();
        } catch (BadResponseException $e) {
            throw new SparkTokenException($e->getResponse()->getBody());
        }

        return json_decode($request->getBody());
    }

    /**
     * @param $token
     * @throws SparkTokenException
     * @return mixed
     */
    public function deleteToken($token)
    {
        try {
            $request = $this->client->delete("v1/access_tokens/{$token}")
                ->setAuth($this->username, $this->password)
                ->send();
        } catch (BadResponseException $e) {
            throw new SparkTokenException($e->getResponse()->getBody());
        }

        return json_decode($request->getBody());
    }
}