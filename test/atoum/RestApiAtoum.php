<?php
namespace jgo\tests\units;
require_once('Example.php');// once to avoid cannot redeclare
require_once(__DIR__.'/../params.php');// execute twice with global in phpunit
require_once __DIR__.'/../../vendor/autoload.php';

use \mageekguy\atoum;

class Example extends atoum
{
	
   public function testPost()
    {  
global $base;
$url=$base."issues/";	
        $this
            ->given($client =  new \GuzzleHttp\Client())
				->and($data = array("title" => "what is it","description" => "bug"))
            ->when($response = $client->request('POST', $url,['json'=>$data]))
				->and($array=json_decode($response->getBody(),true))
            ->then
			    ->integer($response->getStatusCode())
                    ->isEqualTo(200)
                ->string($array['verb'])
                    ->isEqualTo('POST')
				->string($array['title'])
				    ->isEqualTo('what is it')
         ;
    }
   public function testGet()
    {  
global $base;
$url=$base."issues/1234";	
        $this
            ->given($client =  new \GuzzleHttp\Client())
            ->when($response = $client->request('GET', $url))
				->and($array=json_decode($response->getBody(),true))
            ->then
			    ->integer($response->getStatusCode())
                    ->isEqualTo(200)
                ->string($array['verb'])
                    ->isEqualTo('GET')
				->integer($array['id'])
				    ->isEqualTo(1234)
         ;
    }
   public function testPut()
    {  
global $base;
$url=$base."issues/567";	
        $this
            ->given($client =  new \GuzzleHttp\Client())
				->and($data = array("title" => "change it","description" => "twice"))
            ->when($response = $client->request('PUT', $url,['json'=>$data]))
				->and($array=json_decode($response->getBody(),true))
            ->then
			    ->integer($response->getStatusCode())
                    ->isEqualTo(200)
                ->string($array['verb'])
                    ->isEqualTo('PUT')
				->string($array['title'])
				    ->isEqualTo('change it')
         ;
    }
   public function testDeletet()
    {  
global $base;
$url=$base."issues/654";	
        $this
            ->given($client =  new \GuzzleHttp\Client())
            ->when($response = $client->request('DELETE', $url))
				->and($array=json_decode($response->getBody(),true))
            ->then
			    ->integer($response->getStatusCode())
                    ->isEqualTo(200)
                ->string($array['verb'])
                    ->isEqualTo('DELETE')
				->integer($array['id'])
				    ->isEqualTo(654)
         ;
    }

}