<!DOCTYPE html>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<title>Assignment - Web aplikacija</title>
<meta charset="utf-8">
</head>
<body>

<div class="header">
<img src="../images/4.png"> 
<ul>
  <li><a href="#home">Home</a></li>
  <li><a href="#news">Vijesti</a></li>
  <li><a href="#contact">Biznis</a></li>
  <li><a href="#about">Sport</a></li>
  <li><a href="#news">Magazin</a></li>
  <li><a href="#contact">Lifestyle</a></li>
  <li><a href="#about">Scitech</a></li>
  <li><a href="#about">Auto</a></li>
  <li><a href="#about">Login/Register</a></li>
</ul>
  </div> 
<?php
	session_start();

	session_destroy();
				
	header("location: ../index.php");
		
?>
</body>
</html>




