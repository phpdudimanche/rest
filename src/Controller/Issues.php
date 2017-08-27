<?php // Controller/Issues.php
namespace PhpduDimanche\Rest\Controller;

class Issues{
	
	protected $mdlissues;
	
	public function __construct(\PhpduDimanche\Rest\Model\Issues $mdlissues){//-- the complete intance with namespace (not modular anymore)
		$this->mdlissues=$mdlissues;
		
				preg_match('^\issues\/(?<id>\d{1,5})$^', $_GET['url'], $matches);
				$id=isset($matches['id'])?$matches['id']:'none';
				$this->mdlissues->setId($id);// used by GET PUT DELETE	
				
				// mime_content_type from php://input
				//echo get_headers('php://input', 1)["Content-Type"];// only with urls
		
		$class_methods = get_class_methods($this);
		foreach ($class_methods as $method_name) {// iterator for automatic instantiate methods : test regex
			if($method_name!='__construct'){			
				$this->$method_name();
			}
		}
		
	}

	
	public function GetOneId(){
		if (preg_match("^\issues\/\d{1,5}$^", $_GET['url'])AND $_SERVER['REQUEST_METHOD']==="GET") { // http://localhost/rest/api/issues/34567
			header('Content-Type: application/json');
			$this->mdlissues->RetrieveOneId();
			exit();
		}
	}
	public function PutOneID(){// retrieve data submited -d
		if(preg_match("^\issues\/\d{1,5}$^", $_GET['url'])AND $_SERVER['REQUEST_METHOD']==="PUT") {
			header('Content-Type: application/json');
				$this->mdlissues->Helperjson();
			$this->mdlissues->UpdateOneId();
			exit();
		}	
	}
	public function PostOneID(){// retrieve data submited -d
		if(preg_match("^\issues\/$^", $_GET['url'])AND $_SERVER['REQUEST_METHOD']==="POST") {
			header('Content-Type: application/json');
				$this->mdlissues->HelperJson();
			$this->mdlissues->CreateOneId();			
			exit();
		}	
	}
	public function DeleteOneID(){
		if(preg_match("^\issues\/\d{1,5}$^", $_GET['url'])AND $_SERVER['REQUEST_METHOD']==="DELETE") {
			header('Content-Type: application/json');
			$this->mdlissues->DeleteOneId();
			exit();
		}	
	}	
}
?>