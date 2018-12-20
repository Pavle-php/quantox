<?php
require "config.php";

class Connection {
	public $conn;
	public static $instance;	
	public static function getInstance(){

		if(!self::$instance){

			self::$instance = new PDO("mysql:host=".Config::HOST.";dbname=".Config::DBNAME,Config::PASS,"");
		}
		return self::$instance;
	}
}


