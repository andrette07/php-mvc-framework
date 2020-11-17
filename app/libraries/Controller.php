<?php

// Load model and view
class Controller{

	public function model($model){
		// require model file
		require_once '../app/model/' . $model . '.php';
		// instantiate model
		return new $model();
	}

	public function view($view, $data = []){
		if(file_exists('../app/view/'. $view . '.php')){
		// require the view
			require_once '../app/view/'. $view . '.php';
		}else{
			die('View does not exists.');
		}

	}
}