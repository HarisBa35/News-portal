<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
 function showNews($newsid) {
  
  $conn = Database::getConnection();
          $upit = "SELECT * FROM news ORDER BY id DESC LIMIT 1 OFFSET $newsid";
          $q = $conn->query($upit); 
          $red = mysqli_fetch_assoc($q);          
          return $red;
                            }
                            
if (isset($_SESSION['username'])) {
     
	  
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
 
 if (isset($_SESSION['username'])) {   
     if($_SESSION['username']=='admin')
      {
      echo '<li><a href="insert.php">Add news</a></li>';
      } 
      
    } 
 ?>
  
</ul>
  </div> 
  <h2 style="margin-left:100px">Početna</h2>
<div class="container" style="margin-left:20px;">
    <?php require "users/connection.php";
          $conn = Database::getConnection();
          $newsid = 1;          
          $red = showNews($newsid);
          // Vijest gornja lijevo
            echo  
      '<div class="row">
      <a href="news/'. $red['descriptionlnk'].='.php' .'">
      <div class="column" style="width:300px; height: 400px;">
            <img src="images/'.$red['image'].'" alt="" style="width:100%; height: 200px;">
              <div id="text-block-small">
               <h4>'. $red['title'] .'</h4>
                  <p>' . $red['description'] . '</p>'?>
                   <?php
                   
                   if($_SESSION['username']=='admin')
                   {
                    
                   echo  '<form action="index.php" form method="post">
                   <input type="hidden" value='.$red['id'].' name="idnews" /> 
                   <input type="submit" value="Delete" style="float:left; display:inline; width: 35%;">                   
                   <h6><p style="text-align:right;  ">Objavljeno u &nbsp' . $red['time_publish'] . '</p></h6>
                   </form>';}
                   else{
                     echo '<h6><p style="text-align:right;">Objavljeno u &nbsp' . $red['time_publish'] . '</p></h6>'
                   ;}
                  ?> 
                   
               </div>
             </div>
             </a>
             
            <?php require "delete-news.php";              
					    deleteNews();
                
				    ?>
            <?php
            $upit = "SELECT * FROM news ORDER BY id DESC LIMIT 1";
            $q = $conn->query($upit);
            $red = mysqli_fetch_assoc($q); 
            echo
            '<a href="news/'. $red['descriptionlnk'] .=".php".'">
            <div class="column" style="width:625px; height: 400px;">
            <img src="images/'.$red['image'].'" alt="" style="width:100%;height: 400px;">
            <div id="text-block">               										
            <p><h4>'. $red['title'] .'</h4>
            <p>' . $red['description'] . '</p>'?>
             <?php
             if($_SESSION['username']=='admin')
             {
             echo  '<form action="index.php" form method="post">
             <input type="hidden" value='.$red['id'].' name="idnews" />              
             <input type="submit" value="Delete" style="float:left; display:inline; width: 35%;">
             <h6><p style="text-align:right;  ">Objavljeno u &nbsp' . $red['time_publish'] . '</p></h6>
             </form>';}
                   else{
                     echo '<h6><p style="text-align:right;">Objavljeno u &nbsp' . $red['time_publish'] . '</p></h6>'
                   ;}
                   
                  ?>                    
               </div>
               
             </div>
             </a>
             <?php
            $newsid = 2;          
            $red = showNews($newsid);
            echo             
            '<a href="news/'. $red['descriptionlnk'].='.php' .'"><div class="column" style="width:300px; height: 400px;">
              <img src="images/'.$red['image'].'" alt="" style="width:100%; height: 200px;">
              <div id="text-block-small">
              <h4>'. $red['title'] .'</h4>
              <p>' . $red['description'] . '</p>'?>
               <?php
               if($_SESSION['username']=='admin')
               {
               echo  '<form action="index.php" form method="post">
               <input type="hidden" value='.$red['id'].' name="idnews" /> 
               <input type="submit" value="Delete" style="float:left; display:inline; width: 35%;">
               <h6><p style="text-align:right;  ">Objavljeno u &nbsp' . $red['time_publish'] . '</p></h6>
               </form>';}
                  else{
                    echo '<h6><p style="text-align:right;">Objavljeno u &nbsp' . $red['time_publish'] . '</p></h6>'
                  ;}?> 
                  <?php echo ''?>
              </div>
            </div>
            </a>
      </div>
      <div class="row-2">
            <?php
                $newsid = 3;          
                $red = showNews($newsid);
                echo             
                '<a href="news/'. $red['descriptionlnk'].='.php' .'"><div class="column" style="width:300px; height: 400px;">
                  <img src="images/'.$red['image'].'" alt="" style="width:100%; height: 200px;">
                  <div id="text-block-small">
                  <h4>'. $red['title'] .'</h4>
                  <p>' . $red['description'] . '</p>'?>
                   <?php
                   if($_SESSION['username']=='admin')
                   {
                   echo  '<form action="index.php" form method="post">
                   <input type="hidden" value='.$red['id'].' name="idnews" /> 
                   <input type="submit" value="Delete" style="float:left; display:inline; width: 35%;">
                   <h6><p style="text-align:right;  ">Objavljeno u &nbsp' . $red['time_publish'] . '</p></h6>
                   </form>';}
                      else{
                        echo '<h6><p style="text-align:right;">Objavljeno u &nbsp' . $red['time_publish'] . '</p></h6>'
                      ;}?> 
                      <?php echo ''?>
                  </div>
                </div>
                </a>
                </div>
            <?php
                $newsid = 4;          
                $red = showNews($newsid);
                echo             
                '<a href="news/'. $red['descriptionlnk'].='.php' .'"><div class="column" style="width:300px; height: 400px;">
                  <img src="images/'.$red['image'].'" alt="" style="width:100%; height: 200px;">
                  <div id="text-block-small">
                  <h4>'. $red['title'] .'</h4>
                  <p>' . $red['description'] . '</p>'?>
                   <?php
                   if($_SESSION['username']=='admin')
                   {
                   echo  '<form action="index.php" form method="post">
                   <input type="hidden" value='.$red['id'].' name="idnews" /> 
                   <input type="submit" value="Delete" style="float:left; display:inline; width: 35%;">
                   <h6><p style="text-align:right;  ">Objavljeno u &nbsp' . $red['time_publish'] . '</p></h6>
                   </form>';}
                      else{
                        echo '<h6><p style="text-align:right;">Objavljeno u &nbsp' . $red['time_publish'] . '</p></h6>'
                      ;}?> 
                      <?php echo ''?>
                  </div>
                </div>
                </a>
                </div>
            <?php  
                $newsid = 5;          
                $red = showNews($newsid);
                echo             
                '<a href="news/'. $red['descriptionlnk'].='.php' .'"><div class="column" style="width:300px; height: 400px;">
                  <img src="images/'.$red['image'].'" alt="" style="width:100%; height: 200px;">
                  <div id="text-block-small">
                  <h4>'. $red['title'] .'</h4>
                  <p>' . $red['description'] . '</p>'?>
                   <?php
                   if($_SESSION['username']=='admin')
                   {
                   echo  '<form action="index.php" form method="post">
                   <input type="hidden" value='.$red['id'].' name="idnews" /> 
                   <input type="submit" value="Delete" style="float:left; display:inline; width: 35%;">
                   <h6><p style="text-align:right;  ">Objavljeno u &nbsp' . $red['time_publish'] . '</p></h6>
                   </form>';}
                      else{
                        echo '<h6><p style="text-align:right;">Objavljeno u &nbsp' . $red['time_publish'] . '</p></h6>'
                      ;}?> 
                      <?php echo ''?>
                  </div>
                </div>
                </a>
              </div>
            <?php
            $newsid = 6;          
            $red = showNews($newsid);
            echo             
            '<a href="news/'. $red['descriptionlnk'].='.php' .'"><div class="column" style="width:300px; height: 400px;">
              <img src="images/'.$red['image'].'" alt="" style="width:100%; height: 200px;">
              <div id="text-block-small">
              <h4>'. $red['title'] .'</h4>
              <p>' . $red['description'] . '</p>'?>
               <?php
               if($_SESSION['username']=='admin')
               {
               echo  '<form action="index.php" form method="post">
               <input type="hidden" value='.$red['id'].' name="idnews" /> 
               <input type="submit" value="Delete" style="float:left; display:inline; width: 35%;">
               <h6><p style="text-align:right;  ">Objavljeno u &nbsp' . $red['time_publish'] . '</p></h6>
               </form>';}
                  else{
                    echo '<h6><p style="text-align:right;">Objavljeno u &nbsp' . $red['time_publish'] . '</p></h6>'
                  ;}?> 
                  <?php echo ''?>
              </div>
            </div>
            </a>
            </div>        
        </div>
    </div>
<div class="footer">

<h1 style="text-align:center">Web - Aplikacija - 2021</h1>
  </div> 


</body>
</html>