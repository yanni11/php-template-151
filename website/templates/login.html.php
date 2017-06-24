<div class="loginpage">
	<h1>Login</h1>
	
	<form method="post">
		<label>
			<span>Email:</span>
			<input type="email" name="email" value="<?= (isset($email)) ? htmlspecialchars($email) : "" ?>"/>
		</label>
		<label>
			<span>Pasword:</span>
			<input type="password" name="password" />
		</label>
		<input class="loginbutton" type="submit" name="login" value="Login" />
	</form>
</div>
