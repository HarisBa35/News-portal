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
  <li><a class="active" href="login.php">Login/Register</a></li>
</ul>
  </div> 

  <style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}


@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
     
  }
  a:link {
  text-decoration: none;
}
}
</style>


<h2>Login Form</h2>

<form action="login.php" form method="post">
 
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" name="username" placeholder="Enter Username" /> 

    <label for="psw"><b>Password</b></label>
    <input type="password" name="password" placeholder="Enter Password">
        
    <button type="submit">Login</button>
    </form>
  </div>

  <div class="container" style="background-color:#f1f1f1">
  <button class="cancelbtn" onclick="window.location.href='../index.php'">Cancel</button>
  </div>
  <div class="container2" style="background-color:#f1f1f1">
  <button class="registerbtn" onclick="window.location.href='register.php'">Register</button>
  </div>

    

<?php
	
  require_once "../users/connection.php";
  if (!isset($_POST['username']) && !isset($_POST['password'])) {
      ;
  }
	if (isset($_POST['username']) && isset($_POST['password'])) {
		function clean($str){
		$str = str_replace("<","&lt;",$str);
 		$str = str_replace(">","&gt;",$str);
 		$str = str_replace("`","&ft;",$str);
 		return $str;
		}
		$username = clean($_POST['username']);
		$password = clean($_POST['password']);

		$conn = Database::getConnection();
		$upit = "select * from users where username = '{$username}' and password = '{$password}'";
			$q = $conn->query($upit);
			if ($user=$q->fetch_object()) {
				
				session_start();
				$_SESSION['username'] = $user->username;
				header("location: ../index.php");
			
			}
      else
	  {
        echo "Pogrešni username ili password";
      }
    
?>

<?php
	}
?>
</body>
</html>




