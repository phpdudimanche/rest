<?php // guzzle-client.php
print("guzzle lib client by composer");

require_once(__DIR__.'/../test/params.php');
global $base;// params

require_once '../vendor/autoload.php';// lib
require_once 'assert.php';// test with standard asqsert php

echo "<br /><br />----------- C <br />";
//---- CREATE -------------
$url=$base."issues/";
$data = array("title" => "what is it","description" => "bug");
//$data = json_encode($data);
$client = new \GuzzleHttp\Client();
$res = $client->request('POST', $url,['json'=>$data]);
//echo $res->getStatusCode();
echo $res->getBody();

	$array=json_decode($res->getBody(),true);
	assert($array['verb']=='POST','create');

echo "<br /><br />----------- R <br />";
//---- RETRIEVE -------------
$url=$base."issues/1234";
$client = new \GuzzleHttp\Client();
$res = $client->request('GET', $url);
echo $res->getBody();

	$array=json_decode($res->getBody(),true);
	assert($array['verb']=='GET','retrieve');

echo "<br /><br />----------- U <br />";
//---- UPDATE -------------
$url=$base."issues/4567";
$data = array("title" => "change it","description" => "twice");
//$data = json_encode($data);
$client = new \GuzzleHttp\Client();
$res = $client->request('PUT', $url,['json'=>$data]);
echo $res->getBody();

	$array=json_decode($res->getBody(),true);
	assert($array['verb']=='PUT','update');

echo "<br /><br />----------- D <br />";
//---- DELETE -------------
$url=$base."issues/654";
$client = new \GuzzleHttp\Client();
$res = $client->request('DELETE', $url);
echo $res->getBody();

	$array=json_decode($res->getBody(),true);
	assert($array['verb']=='DELETE','delete');
?>