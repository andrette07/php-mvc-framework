<?php

// Core App Class
class Core{
	protected $currentController = 'Pages';
	protected $currentMethod = 'index';
	protected $params = [];

	public function __construct(){
		// get the url
		$url = $this->getUrl();

		// Check if the controller exist
		if(isset($url)){
			if(file_exists('../app/controller/' . ucwords($url[0] . '.php'))){
			// set a new controller
				$this->currentController = ucwords($url[0]);

				unset($url[0]);
			}
		}

		// call the controller
		require_once '../app/controller/' . $this->currentController . '.php';
		// create a new instance of the controller
		$this->currentController = new $this->currentController;

		// check if there is a method || get second part of the url
		if(isset($url[1])){

			// check if the method exists in the controller
			if (method_exists($this->currentController, $url[1])) {
				$this->currentMethod = $url[1];
				unset($url[1]);
			}
		}


		// get params
		$this->params = $url ? array_values($url) : [];

		call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
		
	}

	public function getUrl(){
		if (isset($_GET['url'])) {

			// Remove the slash caracter from the url
			$url = rtrim($_GET['url'], '/');
			// Filter variables as string/number
			$url = filter_var($url, FILTER_SANITIZE_URL);
			// Return array of strings
			$url = explode('/', $url);

			return $url;
		}
	}
}