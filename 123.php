<!DOCTYPE html>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Assignment - Web aplikacija</title>
<meta charset="utf-8">
</head>
<body>
<?php
       
function createLink(){
    //require "connection.php"; 
$upit = "SELECT * FROM news ORDER BY id DESC LIMIT 1 OFFSET 0";
$conn = Database::getConnection();
$q = $conn->query($upit); 

$red = mysqli_fetch_assoc($q); 
$file = 'news/index2.php';
$newfilef = 'news/'.$red['description'] .='.php';
$newfile = trim($newfilef);
$newfile = str_replace("\"","", $newfile);
$newfile = str_replace(",","", $newfile);
$newfile = str_replace(":","", $newfile);
$newfile = str_replace(' ',"-", $newfile);  

if (!copy($file, $newfile)) {
    echo "Greška...\n";
}
}

?>

</body>
</html>