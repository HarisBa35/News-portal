 
<?php
 
 function deleteNews() {
    if ( isset($_POST['idnews'])) {
        function clean($str){
        $str = str_replace("<","&lt;",$str);
         $str = str_replace(">","&gt;",$str);
         $str = str_replace("`","&ft;",$str);
         return $str;
        }
        $idNews  = clean($_POST['idnews']);
        
           $conn = Database::getConnection();
		   $upit2 = "DELETE FROM `news` WHERE id = '$idNews'";
		   $q2 = $conn->query($upit2); 
           
		   echo "<meta http-equiv='refresh' content='0'>";
           if($q2>0)
           {
             
            echo "<meta http-equiv='refresh' content='0'>";
               header('Location: index.php#footer');
           }
           else{
               echo "<meta http-equiv='refresh' content='0'>";
               header('Location: insert.php#footer');
           }
           
        }
  }
   
?> 
  