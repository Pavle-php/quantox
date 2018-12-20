<?php
if(isset($_POST['login'])){
	$user = User::login();
}
if(isset($_POST['logout'])){
	Session::destroy('login');
	echo "You are logged out";
}
if(isset($_SESSION['login'])){
	echo "You are loged in";
}
?>
<div class="signup">
<form method="post" action="">
	<legend id="naslov">Login</legend><br>
	<input type="email" name="email" placeholder="Enter E-mail" required="required"><br><br>	
	<input type="password" name="password" placeholder="Enter Password" required="required"><br><br>
	<br><br>
	
	<input type="submit" name="login" value="Login">
	
	<input type="submit" name="logout" value="Logout">
	</form>
</div>