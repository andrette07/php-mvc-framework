<?php

class User{
	private $db;

	public function __construct(){
		$this->db = new Database();
	}

	public function getUsers(){
		$this->db->query("SELECT * from user");
		$result = $this->db->resultSet();

		return $result;
	}

}