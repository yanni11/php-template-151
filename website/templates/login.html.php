<h1>Login</h1>
<form method="post">
	<label>
		Email:
		<input type="email" name="email" value="<?= (isset($email)) ? htmlspecialchars($email) : "" ?>"/>
	</label>
	<label>
		Pasword:
		<input type="password" name="password" />
	</label>
	<input type="submit" name="login" value="Login" />
</form>
