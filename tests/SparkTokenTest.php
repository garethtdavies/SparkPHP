<?php

class SparkTokenTest extends Guzzle\Tests\GuzzleTestCase
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

    public function test_list_tokens_returns_correct_response()
    {
        $this->plugin->addResponse(new Guzzle\Http\Message\Response(200));
        $this->setMockResponse($this->client, 'listTokens.txt');

        $token = new \Wensleydale\SparkToken($this->client);
        $result = $token->listTokens();

        $this->assertEquals($result[0]->token, 'b5b901e8760164e134199bc2c3dd1d228acf2d98');
    }

    public function test_list_tokens_throws_sparktoken_exception()
    {
        $this->setExpectedException('Wensleydale\SparkTokenException');
        $this->plugin->addResponse(new Guzzle\Http\Message\Response('400'));

        $token = new \Wensleydale\SparkToken($this->client);
        $token->listTokens();
    }

    public function test_generate_tokens_returns_correct_response()
    {
        $this->plugin->addResponse(new Guzzle\Http\Message\Response(200));
        $this->setMockResponse($this->client, 'generateToken.txt');

        $token = new \Wensleydale\SparkToken($this->client);
        $result = $token->generateToken();

        $this->assertEquals($result->access_token, '254406f79c1999af65a7df4388971354f85cfee9');
    }

    public function test_generate_tokens_throws_sparktoken_exception()
    {
        $this->setExpectedException('Wensleydale\SparkTokenException');
        $this->plugin->addResponse(new Guzzle\Http\Message\Response('400'));

        $token = new \Wensleydale\SparkToken($this->client);
        $token->generateToken();
    }

    public function test_delete_tokens_returns_correct_response()
    {
        $this->plugin->addResponse(new Guzzle\Http\Message\Response(200));
        $this->setMockResponse($this->client, 'deleteToken.txt');

        $token = new \Wensleydale\SparkToken($this->client);
        $result = $token->deleteToken('tokenId');

        $this->assertTrue($result->ok);
    }

    public function test_delete_tokens_throws_sparktoken_exception()
    {
        $this->setExpectedException('Wensleydale\SparkTokenException');
        $this->plugin->addResponse(new Guzzle\Http\Message\Response('400'));

        $token = new \Wensleydale\SparkToken($this->client);
        $token->deleteToken('tokenId');
    }

}
 