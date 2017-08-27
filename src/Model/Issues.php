<?php // Model/Issues.php  --- Mdl or not
namespace PhpduDimanche\Rest\Model;

class Issues{// Mdl or not

public $content_type;
public $accept_type;
public $title;
public $description;
public $id;

//public function Issues(){// MdlIssues() : doesn't instantiate
public function  __construct(){ 
$this->content_type=isset($_SERVER["CONTENT_TYPE"])?$_SERVER["CONTENT_TYPE"]:"...";// if used if not exists, notice error
$this->accept_type=isset($_SERVER["HTTP_ACCEPT"])?$_SERVER["HTTP_ACCEPT"]:"...";
}

// getters and setters : in order to confirm reception
	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}
	public function setTitle($title){
		$this->title = $title;
	}
	public function getTitle(){
		return $this->title;
	}
	public function setDescription($description){
		$this->description = $description;
	}
	public function getDesription(){
		return $this->description;
	}

	
	// HELPER (to put somewhere else) : used by Controller Class
	public function HelperJson(){
				$test=file_get_contents("php://input");  // http://php.net/manual/en/wrappers.php.php#wrappers.php.input
				$json=json_decode($test);  /* will be correct send by a php file or windows console with \" */
				$this->setTitle($json->title);
				$this->setDescription($json->description);
	}	
	

public function RetrieveOneId(){
	print('{"verb":"'.$_SERVER['REQUEST_METHOD'].'","act":"RetrieveOneId","id":'.$this->id.',"title":"id title","description":"id description"}');
}
public function UpdateOneId(){
	print('{"verb":"'.$_SERVER['REQUEST_METHOD'].'","act":"UpdateOneId","type IN":"'.$this->content_type.'","type OUT":"'.$this->accept_type.'","id":'.$this->id.',"title":"'.$this->title.'","description":"'.$this->description.'"}');
}
public function CreateOneId(){
	print('{"verb":"'.$_SERVER['REQUEST_METHOD'].'","act":"CreateOneId","type IN":"'.$this->content_type.'","type OUT":"'.$this->accept_type.'","id":54673,"title":"'.$this->title.'","description":"'.$this->description.'"}');
}
public function DeleteOneId(){
	print('{"verb":"'.$_SERVER['REQUEST_METHOD'].'","act":"DeleteOneId","type IN":"'.$this->content_type.'","type OUT":"'.$this->accept_type.'","id":'.$this->id.'}');
}
}
?>