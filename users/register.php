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
  <li><a href="../index.php">Home</a></li>
  <li><a href="../vijesti.php">Vijesti</a></li>
  <li><a href="../biznis.php">Biznis</a></li>
  <li><a href="../sport.php">Sport</a></li>
  <li><a href="../magazin.php">Magazin</a></li>
  <li><a href="../lifestyle.php">Lifestyle</a></li>
  <li><a href="../scitech.php">Scitech</a></li>
  <li><a href="../auto.php">Auto</a></li>
  <li><a href="login.php">Login/Register</a></li>
</ul>
  </div> 

		<div id="register">

<form action="register.php" form method="post" autocomplete="off">
    Username: <input type="text" name="username" size="15px"/> 
    Password: <input type="password" name="password" size="15px"/> 
    
    <input type="submit" value="Register">
    <div id="back">
      <a href="../index.php" style="color:blue">Back to home</a><br>	
    </div>
  </form>
  

</div>


<?php

if (isset($_POST['username']) && isset($_POST['password'])) {
  
  
$username = $_POST["username"];
$password = $_POST["password"];
require "connection.php";
$conn = Database::getConnection();
$upitCheck = "SELECT * FROM USERS WHERE username =  '$username'";
$check = $conn->query($upitCheck);
$rez = mysqli_num_rows($check);
if($rez!=0)
{

  echo '<p style="color:red;">Postoji korisnik sa istim username-om, molim vas odaberite neki drugi username"</p>';
}

else
{
  $upit = "insert into users values('','{$username}','{$password}')";
  $q = $conn->query($upit);
  echo 'Uspješno ste se registrovali<br>
        Vaši podaci su:<br>
   Username: '.$username.' <br>
   Password: '.$password;
}
}
?>
<div class="footer_bottom">
<p class="copyright">Assignment    <a href="../index.php" style="color:blue">Web aplikacija</a></p>      
</div>

</body>
</html>

