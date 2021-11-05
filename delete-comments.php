<?php

function deleteComment()
{
if ( isset($_POST['b'])) {
	function clean($str){
	$str = str_replace("<","&lt;",$str);
	 $str = str_replace(">","&gt;",$str);
	 $str = str_replace("`","&ft;",$str);
	 return $str;
	}
	$m  = clean($_POST['b']);
	$n = $_SESSION['username'];
	
	if($_SESSION['username']=='admin')
     {
		$conn = Database::getConnection();
		$file = basename($_SERVER['PHP_SELF']);
		$info = pathinfo($file);
		$file_name =  basename($file,'.'.$info['extension']);        
		$upit = "DELETE FROM `comments` WHERE Id = '$m'";
		$q = $conn->query($upit);
				
		if($q)
			{
				echo "<meta http-equiv='refresh' content='0'>";
					header('Location: '.$file_name.'.php#footer');
			}
			else{
				echo "<meta http-equiv='refresh' content='0'>";
					header('Location: '.$file_name.'.php#footer');
			} 
			
			//session_start();
			//$_SESSION['username'] = $user->username;
			//header("location: news-single.php");
			echo "<meta http-equiv='refresh' content='0'>";
			header('Location: '.$file_name.'.php#footer');}
			else{
				$file = basename($_SERVER['PHP_SELF']);
				$info = pathinfo($file);
				$file_name =  basename($file,'.'.$info['extension']); 
				$upit = "DELETE FROM `comments` WHERE Id = '$m' AND added_by = '$n'";
				$conn = Database::getConnection();
			$q = $conn->query($upit);}
			if($q)
				{
					echo "<meta http-equiv='refresh' content='0'>";
						header('Location: '.$file_name.'.php#footer');
				}
				else{
					echo "<meta http-equiv='refresh' content='0'>";
						header('Location: '.$file_name.'.php#footer');
				} 
				
			
		}
	       
			
			//echo "<meta http-equiv='refresh' content='0'>";
			//header('Location: '.$file_name.'.php#footer');
		
		
}

?>