


<div class="typesblock">
	<ul>		
		<?php
		echo "<li><a href='/catalog?typeId=0&modelId=" . $_REQUEST["modelId"] . "'>All types</a></li>";
		foreach ($types as $type)
		{
			echo "<li><a href='/catalog?typeId=". $type->Id . "&modelId=" . $_REQUEST["modelId"] . "'>" . $type->Name . "</a></li>";
		}
		?>
	</ul>	
</div>


<div class="markenblock">
	<ul>
		<?php 
		echo "<li><a href='/catalog?typeId=" . $_REQUEST["typeId"] . "&modelId=0'>All models</a></li>";
		foreach ($models as $model)
		{
			echo "<li><a href='/catalog?typeId=". $_REQUEST["typeId"] . "&modelId=" . $model->Id . "'>" . $model->Name . "</a></li>";
		}
		?>
	</ul>	
</div>

<div class="catalogblock">

	<?php 
		echo "<h2>" . $title . "</h2>";
		echo "<div class='motorradpanel'>";
		foreach ($motorrader as $motorrad)
		{
			echo "<a href='motorrad?" . $motorrad->Id . "'>";
			echo "<div class='motorradblock'>";
			echo "<img src='Images/" . $motorrad->Id . ".png'>";
			echo "<p>" . $motorrad->Model->Name . " " . $motorrad->Name . "</p>";
			echo "<p class='motorradprice'>$" . $motorrad->Price . "</p>";
			echo "</div>";
			echo "</a>";
		}
		echo "</div>";
	?>
</div>
