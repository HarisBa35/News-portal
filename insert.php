<!DOCTYPE html>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Assignment - Web aplikacija</title>
<meta charset="utf-8">
</head>
<body>

<div class="header">
<img src="images/4.png"> 
<?php
error_reporting(0);
 session_start();
if (isset($_SESSION['username'])=='admin') {  
     
	  
	  $username = $_SESSION['username'];
echo '<h4 style="float:right; margin-top: 66px; margin-right: 100px;">Welcome&nbsp'.ucfirst($username).'</h4>';
}  
?>
<ul>
<li><a class="active" href="index.php">Home</a></li>
  <li><a href="vijesti.php">Vijesti</a></li>
  <li><a href="biznis.php">Biznis</a></li>
  <li><a href="sport.php">Sport</a></li>
  <li><a href="magazin.php">Magazin</a></li>
  <li><a href="lifestyle.php">Lifestyle</a></li>
  <li><a href="scitech.php">Scitech</a></li>
  <li><a href="auto.php">Auto</a></li>
  <?php
 
if (isset($_SESSION['username'])) {   
	  
	  $username = $_SESSION['username'];
echo '<li><a href="users/logout.php">Logout</a></li>';
} 
else{
  echo '<li><a href="users/login.php">Login/Register</a></li>';
} 
?>
<?php
 
 if (isset($_SESSION['username'])=='admin') {   
     
     
 echo '<li><a href="insert.php">Ubaci vijest</a></li>';
 } 
 else{
   ;
 } 
 ?>
  
</ul>
  </div> 

  <div class="row-post">
  	<div class="post">
  		<h4 class="page-title"> </h4>
  			<?php require "users/connection.php";
			  $conn = Database::getConnection();
			  $upit = "SELECT * FROM `category`";
			  $q = $conn->query($upit); 
			  while($row = $q->fetch_array())
				{
				$category[] = $row['name'];
				}
			  

				if($_SESSION['username']=='admin')  
					{	
				$username = $_SESSION['username'];
				echo
				'<div class="form-control">				
					<form action="insert.php" form method="post">
					<input type="text" name="title" id="title" placeholder="Unesite naslov" autocomplete="off" size="15px"/><br>						
					<input type="text" id="form" name="message" placeholder="Unesite opis" autocomplete="off"/><br>
					<textarea id="content" name="content" rows="10" cols="30" placeholder="Unesite sadržaj" autocomplete="off"></textarea><br>
					<select class="form-control-select" name="category" id="category">
					<option value="">Odaberite kategoriju</option>';
					foreach ($category as $value) {
					echo 
					'
					<option value='.$value.'>'.$value.'</option>';}
					
					echo '</select> <br>
             
            		<input type="file" class="form-image" id="postimage" name="postimage"><br>
						<input type="submit" value="Sačuvajte">
					</form>
					</div>
				</div>
				</div>';
						} 
					else{
						header('Location: index.php');;
						} 
				?>
				
					
				
				<?php require "123.php";  


	if ( isset($_POST['message'])) {
		function clean($str){
		$str = str_replace("<","&lt;",$str);
 		$str = str_replace(">","&gt;",$str);
 		$str = str_replace("`","&ft;",$str);
		 $str  =  str_replace("\"", "&#34;", $str);
		 $str = str_replace(",","&#44;", $str);
		 $str = str_replace(":","&#58;", $str);
		 //$str  =  str_replace(' ',"-", $str);
		 $str  =  str_replace("'","&#39", $str);
 		return $str;
		}
		$message  = trim(clean($_POST['message']));
		$messageDesc  =  str_replace("\"", "", $message);
		$messageDesc = str_replace(",","", $messageDesc);
		$messageDesc = str_replace(":","", $messageDesc);
		$messageDesc  =  str_replace(' ',"-", $messageDesc);
		$username1 = $_SESSION['username'];
		$username2 = ucfirst($username1);
		$time = date("h:i:sa");
		$category  = clean($_POST['category']);
		$title  = trim(clean($_POST['title']));
		$imgfile = clean($_POST['postimage']);
		$content = trim(clean($_POST['content']));
		$conn = Database::getConnection();
		$upit = "INSERT INTO news(`id`, `category`, `title`, `description`, `descriptionlnk`, `content`, `time_publish`, `postedby`,`image`)
     VALUES ('','{$category}','{$title}','{$message}','{$messageDesc}','{$content}','{$time}','{$username2}', '{$imgfile}')";
       
			$q = $conn->query($upit);
			if($q)
                {
					createLink();
					echo '<p style="color:blue">Uspješno ste unijeli vijest</p>';
                }
                else{
                echo 'Something went wrong . Please try again.';    
                }
			}
		?>
		</div>
    </div> 
  </div> 

</body>
</html>