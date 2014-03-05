<?php namespace Wensleydale;

interface SparkInterface
{
    public function devices();

    public function deviceInfo();

    public function flashDevice();

    public function read();

    public function run();

    public function digitalWrite();

    public function digitalRead();

    public function analogWrite();

    public function analogRead();

}