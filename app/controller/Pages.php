<?php

class Pages extends Controller{

	public function __construct(){
		$this->userModel = $this->model('User');
	}

	public function index(){
		$users = $this->userModel->getUsers();
		$options = array(
			'title' => 'Home Page',
			'data' => $users
		);
		$this->view('pages/index', $options);
	}

	public function about(){
		$this->view('pages/about');
	}
}