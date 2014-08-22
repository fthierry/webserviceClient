<?php
	session_start();
	
	$_SESSION["result"]="";
	$_SESSION["method"]="";

	function class_autoload($class){
		require_once(preg_replace("/([a-zA-Z0-9-_]*).php/", str_replace("_", "/", $class).".php", $_SERVER['SCRIPT_FILENAME']));
	}
	
	spl_autoload_register('class_autoload');
	
	define("WEB_ROOT", preg_replace("/([a-zA-Z0-9-_]*).php/", "", "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME']));
	define("SERVER_ROOT", 'PATH-TO-SEVER');
	$currentPage = ("http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME']==WEB_ROOT.'index.php')? WEB_ROOT:"http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'];
	define("CURRENT_PAGE",$currentPage);
	
	$client = new Client_Core_Client;
	
	$method = (array_key_exists("method",$_POST))? $_POST["method"]:null;
	if(!is_null($method)){
		unset($_POST["method"]);
		$_SESSION["method"]=$method;
		$client->$method($_POST);
	}