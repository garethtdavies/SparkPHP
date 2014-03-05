<?php namespace Wensleydale;

use Exception;

/**
 * Class SparkTokenException
 * @package Wensleydale
 */
class SparkTokenException extends Exception
{
    /**
     * @internal param $e
     * @return string
     */
    public function error()
    {
        return json_decode($this->getMessage());
    }
}