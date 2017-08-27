<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
require_once(__DIR__.'/../../../params.php');// params
use GuzzleHttp\Client; 
/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
	private $client;
	private $res;
	private $data;
	private $baseurl;// params
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
		$this->client = new \GuzzleHttp\Client();// $ this
				global $base;// params
				$this->baseurl=$base;// params
    }
	
	/**
     * @Given data:
     */
    public function data(PyStringNode $string)// http://docs.behat.org/en/v2.5/guides/1.gherkin.html#pystrings @Given data:
    {
		  $this->data = json_decode($string->getRaw(),true);// too difficult if not like this
	}

	/**
     * @Given I :arg1 in url :arg2
     */
	public function iInUrl($act, $url, PyStringNode $data=null)
	{
       switch($act){
		   case "retrieve data":
		   $this->res = $this->client->request('GET', $this->baseurl.$url);
		   break;
		   case "delete data":
		   $this->res = $this->client->request('DELETE', $this->baseurl.$url);
		   break;
		   case "create data":		   
		   $this->res = $this->client->request('POST', $this->baseurl.$url, ['json'=>($this->data)]);
		   break;
		   case "update data":		   
		   $this->res = $this->client->request('PUT', $this->baseurl.$url, ['json'=>($this->data)]);
		   break;
		   default :
		   break;
	   }
	}
	
	
    /**
     * @Then the response should be JSON
     */
    public function theResponseShouldBeJson()
    {
		$data = json_decode($this->res->getBody(),true);
        if (empty($data)) { 
		throw new Exception("Response was not JSON\n" . $this->res->getBody(),true);
		}
        //throw new PendingException();
    }

    /**
     * @Then the response status code should be :arg1
     */
    public function theResponseStatusCodeShouldBe($arg1)
    {
		if ((string)$this->res->getStatusCode() !== $arg1)
		 {
            throw new \Exception('HTTP code does not match '.$arg1.' (actual: '.$this->res->getStatusCode().')');
        }
        //throw new PendingException();
    }

    /**
     * @Then the :arg1 property equals :arg2
     */
    public function thePropertyEquals($arg1, $arg2)
    {
        
		$data = json_decode($this->res->getBody(),true);

        if (!empty($data)) {
            if (!isset($data[$arg1])) {
                throw new Exception("Property '".$arg1."' is not set!\n");
            }
            if ((string)$data[$arg1] !== $arg2) //(string)
				{
                throw new \Exception('Property value mismatch! (given: '.$arg2.', match: '.$data[$arg1].')');
            }
        }
		else {
            throw new Exception("Response was not JSON\n" . $this->res->getBody(),true);
        }	
		
		//throw new PendingException();
    }	
	
	
	
	
	
}
