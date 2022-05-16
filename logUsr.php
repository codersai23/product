
<?php
// error_reporting(0);
include("connect.php");
include("menu.php");
session_start();
   
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><center>
   <h1>User</h1>
    <?php    
$n=$_SESSION['fn'];
 echo "Welcome " .$n."!<br><br> ";
 include("usrMenu.php");  
 ?><br><br>
</center>
</body>
</html>
