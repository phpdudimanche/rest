<?php // phpunit-test.php
//require_once '../vendor/autoload.php';// lib 

/* or from xml suite test, 
from console cmd admin, from root with phpunit.xml
C:\wamp64\bin\php\php5.6.25\php.exe C:\www\rest\vendor\phpunit\phpunit\phpunit
*/
require_once(__DIR__.'/../params.php');
Class IssuesTest extends PHPUnit_Framework_TestCase{
	
	protected $client;// if var to transmit beetween test : protected
	protected $baseurl;// params
	
	protected function setUp(){
		global $base;// params
	    $this->baseurl=$base;
		
			$this->client = new \GuzzleHttp\Client();
			// if database exists : create table here
			
	}

	public function testPost(){
		$url=$this->baseurl."issues/";
		$data = array("title" => "what is it","description" => "bug");
		$res = $this->client->request('POST', $url,['json'=>$data]);
		$data = json_decode($res->getBody(), true);
		
		$this->assertEquals(200, $res->getStatusCode());		
		$this->assertEquals('POST', $data['verb']);
		$this->assertEquals("what is it", $data['title']);
	}	
	public function testGet(){
		$url=$this->baseurl."issues/1234";
		$res = $this->client->request('GET', $url);
		$data = json_decode($res->getBody(), true);
		
		$this->assertEquals(200, $res->getStatusCode());		
		$this->assertEquals('GET', $data['verb']);
		$this->assertEquals(1234, $data['id']);
	}
	public function testPut(){
		$url=$this->baseurl."issues/567";
		$data = array("title" => "change it","description" => "twice");
		$res = $this->client->request('PUT', $url,['json'=>$data]);
		$data = json_decode($res->getBody(), true);
		
		$this->assertEquals(200, $res->getStatusCode());		
		$this->assertEquals('PUT', $data['verb']);
		$this->assertEquals("change it", $data['title']);
	}
	public function testDelete(){
		$url=$this->baseurl."rest/issues/654";
		$res = $this->client->request('DELETE', $url);
		$data = json_decode($res->getBody(), true);
		
		$this->assertEquals(200, $res->getStatusCode());		
		$this->assertEquals('DELETE', $data['verb']);
		$this->assertEquals(654, $data['id']);
	}
}
?>