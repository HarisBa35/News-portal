<?php

class Database{
	public static function getConnection(){
		return new mysqli ("localhost","root","","webapp");
	}
}

?>