<?php
class Session {

	public static function getInstance(){
		if(!isset($_SESSION)){
			session_start();
		}
	}
	public static function get($k){
		Session::getInstance();
		return $_SESSION[$k];

	}
	public static function set($k,$v){
		Session::getInstance();
		$_SESSION[$k] = $v;

	}
	public static function destroy($k){
	
		//if(isset($_SESSION['login'])){
			Session::getInstance();
			unset($_SESSION[$k]);
			session_destroy();





			


		//}
	}
}