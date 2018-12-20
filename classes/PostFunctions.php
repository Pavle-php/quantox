<?php 
class PostFunctions {
	public static function getEmail(){
		if(isset($_POST['email'])){
		$email = trim($_POST['email']);
		$email = htmlspecialchars($email);		
		return $email;
		}
	}
	public static function getname(){
		if(isset($_POST['name'])){
		$name = trim($_POST['name']);


		$name = htmlspecialchars($name);		
		return $name;
		}
	}
	public static function getpassword(){
		if(isset($_POST['password'])){	
		$password = $_POST['password'];
		$password = htmlspecialchars($password);
		return $password;
		}

	}
	public function check(){
		if($_POST['password']==$_POST['re_password'])
	}
}