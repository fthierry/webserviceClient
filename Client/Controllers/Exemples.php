<?php
class Client_Controllers_Exemples extends Client_Core_Controllers{
	private $_client;
	
	public function __construct($_client){
		$this->_client = $_client;
	}
	
	public function getAllExemples($data){
		$this->parseQueryResult(json_decode($this->_client->query("GET","method=allexemple")));
		$error = $this->getError();
		$temp = "";
		if($error===false){
			$response = $this->getResponse();
			foreach($response as $key=>$value){
				if($temp != ""){ $temp .= "\n"; }
				$temp .= $value->exemple_id . " : " . $value->exemple_name;
			}
		} else {
			$temp = $error["errorType"] . "\n" . $error["errorMessage"];
		} 
		$_SESSION["result"] = $temp;
	}
	
	public function getExemple($data){
		$exemple_id = (empty($data["exemple_id"]))? null:$data["exemple_id"];
		$this->parseQueryResult(json_decode($this->_client->query("GET","method=exemple&exemple_id=".$exemple_id)));
		$error = $this->getError();
		$temp = "";
		if($error===false){
			$response = $this->getResponse();
			foreach($response as $key=>$value){
				if($temp != ""){ $temp .= "\n"; }
				$temp .= $value->exemple_id . " : " . $value->exemple_name;
			}
		} else {
			$temp = $error["errorType"] . "\n" . $error["errorMessage"];
		} 
		$_SESSION["result"] = $temp;
	}
}