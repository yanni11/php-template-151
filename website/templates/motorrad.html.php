


<div class="motorrad">

	<?php
		echo "<h1>". $motorrad->Model->Name . " " . $motorrad->Name . "</h1>";
		echo "<img src='Images/" . $motorrad->Id . ".png'>";
		echo "<p> Type: " . $motorrad->Type->Name . "</p>"; 
		echo "<p> Hubraum: " . $motorrad->Hubraum . " cm3</p>";
		echo "<p> Price: $" . $motorrad->Price . "</p>";
	?>
	
	
</div>
<div class="commentsblock">
	<?php
		foreach ($comments as $comment)
		{
			echo $comment->Text;
		}
	?>
</div>
	<?php
		if (array_key_exists("email", $_SESSION))
		{
			echo "<form method='post'>";
			echo "<p>Comment</p>";
			echo "<textarea name='text'></textarea>";

			echo "<input class='submitbutton' type='submit' name='submit' value='Send' />";
			echo "</form>";
		}
	?>
