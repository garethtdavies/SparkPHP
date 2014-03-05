<?php namespace Wensleydale;

use Exception;

/**
 * Class SparkException
 * @package Wensleydale
 */
class SparkException extends Exception
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