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
    <title>Admin Login</title>
</head>
<body>
<center>
<br>
    <h3>Admin</h3>
 
    <?php    
     $n=$_SESSION['fn'];
    echo "Welcome " .$n."!<br><br> ";
    include("MenuAdmin.php");  
    ?><br><br>
 
</center>
</body>
</html>
