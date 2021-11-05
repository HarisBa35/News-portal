<?php

function addComment(){
if ( isset($_POST['message'])) {
		function clean($str){
		$str = str_replace("<","&lt;",$str);
 		$str = str_replace(">","&gt;",$str);
 		$str = str_replace("`","&ft;",$str);
 		return $str;
		}
		$message  = clean($_POST['message']);
		$username1 = $_SESSION['username'];
		$username2 = ucfirst($username1);
		$time = date("h:i:sa");
		$conn = Database::getConnection();
		$file = basename($_SERVER['PHP_SELF']);
		$info = pathinfo($file);
		$file_name =  basename($file,'.'.$info['extension']);
		$upit1 = "SELECT * FROM news WHERE descriptionlnk = '$file_name'";			
            $q1 = $conn->query($upit1);
            $red1 = mysqli_fetch_assoc($q1); 
			$idNews = $red1['id'];
		$upit = "INSERT INTO comments(`Id`, `newsid`, `message`, `added_by`, `time`) VALUES ('','{$idNews}','{$message}','{$username2}','{$time}')";
       
			$q = $conn->query($upit);
			if($q)
                {
					echo "<meta http-equiv='refresh' content='0'>";
					header('Location: '.$file_name.'.php#footer');
					
                }
                else
					{
					echo "Something went wrong . Please try again.";    
					} 
				
			}
        }
		


?>