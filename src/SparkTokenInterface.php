<?php namespace Wensleydale;

interface SparkTokenInterface
{
    public function generateToken();

    public function listTokens();

    public function deleteToken($token);

}