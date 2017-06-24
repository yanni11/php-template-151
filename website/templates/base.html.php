<!DOCTYPE >
<html>
<head>
	<link rel="stylesheet" href="layout.css">
</head>
<body>
	<div id="main">
		<div id="header">
			<?php include(__DIR__ . "/header.html.php"); ?>
		</div>
		<div id="navi">
			<?php include(__DIR__ . "/menu.html.php"); ?>
		</div>
		<hr>
		<div id="content">		
			<?php include(__DIR__ . "/" . $contentFile); ?>	
		</div>
		<div id="footer">
			<hr>
			<p>
				Developed by Tsar 2017
			</p>
		</div>
	</div>
	
</body>
</html>