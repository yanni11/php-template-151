<div class="loginpage">
	<h1>Registration</h1>
	
	<form method="post">
		<label>
			<span>Firstname:</span>
			<input type="text" name="firstname" value="<?= (isset($firstname)) ? htmlspecialchars($firstname) : "" ?>"/>
		</label>
		<label>
			<span>Lastname:</span>
			<input type="text" name="lastname" value="<?= (isset($lastname)) ? htmlspecialchars($lastname) : "" ?>"/>
		</label>
		<label>
			<span>Email:</span>
			<input type="email" name="email" value="<?= (isset($email)) ? htmlspecialchars($email) : "" ?>"/>
		</label>
		<label>
			<span>Pasword:</span>
			<input type="password" name="password" />
		</label>
		<input class="loginbutton" type="submit" name="register" value="Register" />
	</form>
</div>
