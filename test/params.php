<?php
// in order to use params for url base
require_once __DIR__.'/../vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;
$data = Yaml::parse(file_get_contents( __DIR__.'/codeception/tests/api.suite.yml'));
//var_dump($data);
$GLOBALS['base']=$data['modules']['enabled'][1]['REST']['url'];
?>