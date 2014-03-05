<?php namespace Wensleydale;

use Guzzle\Http\Client;

/**
 * Class SparkCore
 * @package Wensleydale
 */
class SparkCore
{

    /**
     * @param $accessToken
     * @return Spark
     */
    public static function make($accessToken)
    {
        $client = new Client('https://api.spark.io/{version}', array(
            'version' => 'v1',
            'request.options' => array(
                'headers' => array('Authorization' => 'Bearer ' . $accessToken)
            )
        ));

        return new Spark($client);
    }

    public static function token()
    {
        $client = new Client('https://api.spark.io');

        return new SparkToken($client);
    }

} 