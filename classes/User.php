<?php
class User {

		public function emailExists($email){
        $query = "SELECT Count(id) as count FROM users WHERE email = :email";
        $stmt = Connection::getInstance()->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $count = $stmt->fetch(PDO::FETCH_OBJ);
        return ($count->count === "1");       
    }
		
		public static function login(){
		
		try{		
			
			if(isset($_POST['email']) && isset($_POST['password']) && !empty(trim($_POST['email'])) && !empty(trim($_POST['password']))){
				$email = $_POST['email'];
				$password = $_POST['password'];
				$conn = Connection::getInstance();
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "SELECT email,name,password from users where email = :email and password = :password LIMIT 1";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam('email',$email);
				$stmt->bindParam('password',$password);
				$stmt->execute();
				$res = $stmt->fetch(PDO::FETCH_OBJ);
				if($res){
					Session::set("login",$res->email);			
				echo "Welcome $res->name ";
				} else echo "Wrong email or password";
			}		
			else echo "Wrong email or password is";
		}	
		catch(PDOException $e){
			echo "Greska: ". $e->getMessage();
			}		
	}
		public function signup(){		
			if(isset($_POST['signup'])){
				if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re_password']) && isset($_POST['name']) && !empty(trim($_POST['email']))  && !empty(trim($_POST['password']))  && !empty(trim($_POST['re_password']))  && !empty(trim($_POST['name']))){
					$email = $_POST['email'];
					$name = $_POST['name'];
					$password = $_POST['password'];
					$re_password = $_POST['re_password'];if($password === $re_password){	

						if(!$this->emailExists($email)){			
							$conn = Connection::getInstance();
							$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "INSERT into users values (null, :email, :name, :password)";
							$stmt = $conn->prepare($sql);		
							$stmt->bindParam('email',$email);
							$stmt->bindParam('name',$name);
							$stmt->bindParam('password',$password);
							$stmt->execute();
							echo "Successfuly inserted";
						}
						else echo "Email exists";
					}
					else echo "passwords dont matches";
				}
			else echo "Email, password or name is invalid!";
			}
		}	
	
	public static function search($key){
		$conn = Connection::getInstance();
		$query = "SELECT * from users where name LIKE '%$key%' or email LIKE '%$key%'";
		$stmt = $conn->prepare($query);
		$stmt->execute(array(':key'=>'%'.$key.'%'));
		//$res = $stmt->fetchAll();*/
		//$stmt = $conn->query($query);
		$res = [];
		while($red = $stmt->fetch(PDO::FETCH_OBJ)){

			$res[] = $red;
		}
		//return $stmt;
		//	$res[]=$res;
		//$res = $stmt->fetch(PDO::FETCH_OBJ);	
		if($res){return $res;
		
		}
	}
}