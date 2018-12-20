<form method="post" action="">
	<input type="text" name="search">
	<input type="submit" name="searching">
</form>
<?php
if(isset($_POST['search'])){
	if(isset($_SESSION['login'])){
		$key = $_POST['search'];$users = User::search($key);
		if($users){foreach($users as $user){
				echo $user->name."<br>"; 
			}
		}
	}
  	else /*if(!isset($_SESSION['login']))*/{
	echo "<div style='text-align:center;'>Please login</div>";
		


		header('Location:index.php?trylogin');
	}
}