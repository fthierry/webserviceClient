<?php
class Client_Core_Client extends Client_Core_Extensions{
	private $_client;
	
	public function __construct(){
		$this->_client = new Client_Core_RestClient(SERVER_ROOT);
		
		// Ajout des controllers
		$extensions = array ('Client_Controllers_Exemples');
		
		parent::__construct($extensions,$this->_client);
	}
}