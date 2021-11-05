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
<?php
 session_start();
if (isset($_SESSION['username'])) {     
	  
	  $username = $_SESSION['username'];
echo '<h4 style="float:right; margin-top: 66px; margin-right: 100px;">Welcome&nbsp'.ucfirst($username).'</h4>';
}  
?>
<ul>
<li><a class="active" href="../index.php">Home</a></li>
  <li><a href="../vijesti.php">Vijesti</a></li>
  <li><a href="../biznis.php">Biznis</a></li>
  <li><a href="../sport.php">Sport</a></li>
  <li><a href="../magazin.php">Magazin</a></li>
  <li><a href="../lifestyle.php">Lifestyle</a></li>
  <li><a href="../scitech.php">Scitech</a></li>
  <li><a href="../auto.php">Auto</a></li>
  <?php
 
if (isset($_SESSION['username'])) {   
	  
	  $username = $_SESSION['username'];
echo '<li><a href="../users/logout.php">Logout</a></li>';
} 
else{
  echo '<li><a href="../users/login.php">Login/Register</a></li>';
} 
?>
  
</ul>
  </div> 

<div class="container" style="margin: auto;width: 50%;"> 
      <div class="row">
	  <?php require "../users/connection.php";       
			$file = basename($_SERVER['PHP_SELF']);
			$info = pathinfo($file);
			$file_name =  basename($file,'.'.$info['extension']);
            $upit = "SELECT * FROM news WHERE descriptionlnk = '$file_name'";
			$conn = Database::getConnection();
            $q = $conn->query($upit); 

            $red = mysqli_fetch_assoc($q); 
            echo
        
            '<div class="column" style="width:650px; max-height: auto;">
              <img src="../images/' .$red['image'].'" alt="" style="width:100%; height: 400px;">
              <div id="text-block-small">
                 <h4>'. $red['title'] .'</h4>
                  <p>' . $red['description'] . '</p>
				  <p>' . $red['content'] .' </p>
				  <h6><p style="text-align:right;  ">Objavljeno u &nbsp' . $red['time_publish'] . '</p></h6>'
				  ?>
              </div>
            </div>
                        
      </div>
</div>
<div class="section" style="width:1013px; margin-left:150px;">
						<h5>Comments</h5>
                        <?php 
								$idNews = $red['id']; 
								$upit1 = "SELECT * FROM comments WHERE newsid = $idNews";
								$w = $conn->query($upit1); 
								if ($result = mysqli_query($conn, $upit1)) {
									// Fetch one and one row
									while ($row = mysqli_fetch_row($result)) {
										$id = $row[0];
									  printf (
						'<h4>'.$row[3].'</h4>
						<span>Komentarisano u &nbsp' .$row[4].'&nbsp sati</span>
						<p>'.$row[2].'</p>');
						
 
							if (isset($_SESSION['username'])) {   
								
								$username = $_SESSION['username'];
							echo '<form action="'.$file_name.'.php" form method="post">
												
							<input type="hidden" name= "b" value='.$row[0].'/>						
							<input type="submit" value=" Delete Comment">
						</form>
							<p>_________________________________________________________________________________________</p>
						';
							} 
							else{
							echo '<p>_________________________________________________________________________________________</p>
							';
							} 
						
						
                }
                mysqli_free_result($result);
				
              }
                ?>
                </div>
				<?php
				if (isset($_SESSION['username'])) {   
								
					$username = $_SESSION['username'];
					echo '<form action="'.$file_name.'.php" form method="post" style="width:1013px; margin-left:150px;">
						<span>Add A Comment</span>						
						<input type="text" name="message" autocomplete="off" size="15px"/> 
						<input type="submit" value="Submit Comment">
					</form>
				</div>';
					} 
					else{
					echo '';
					} 
				?>

				<?php require "../add-comments.php";
					addComment();
				?>
				<?php require "../delete-comments.php";
					deleteComment();
				?>

<div id="footer">

<h1 style="text-align:center">Web - Aplikacija - 2021</h1>
  </div> 


</body>
</html>