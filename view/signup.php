<?php
if(isset($_POST['signup'])){
	$user = new User;
	$user->signup();
}
?>
<div class="signup">
<form method="post" action="">
	<legend id="naslov">Sign Up</legend><br>
	<input type="email" name="email" placeholder="Enter E-mail" required="required"><br><br>
	<input type="text" name="name" placeholder="Enter Name" required="required"><br><br>
	<input type="password" name="password" placeholder="Enter Password" required="required"><br><br>
	<input type="password" name="re_password" placeholder="Retype password" required="required"><br><br>	
	<input type="submit" name="signup" value="Sign Up">

	</form>
</div>
