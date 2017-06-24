<ul>
	<li>
		<a href="/">Home</a>
	</li>
	<li>
		<a href="/catalog?typeId=0&modelId=0">Catalog</a>
	</li>
	<li>
		<a href="#">Site 3</a>
	</li>
	<li>
		<a href="#">Site 4</a>
	</li>
</ul>
<div class="loginblock">
	<?php
		if (!array_key_exists("email", $_SESSION))
		{
			echo "<a href='/login'>Login</a>";
		}
		else
		{
			echo "<a href='/logout'>Logout</a>";
		}
	?>
	<a href="/register">Register</a>
</div>
