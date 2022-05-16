<?php
//error_reporting(0);
 
include("menu.php");
session_start();
 $n=$_SESSION['name'];
?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Delete File</title>
          <link rel="stylesheet" type="text/css" href="CSS/SK.css">
    </head>
    <body>
           <div class="container" style="margin-top:50px">
         <h1 class="h1a" style="text-align: left;">Admin
          <?php    
    echo "Welcome " .$n."!<br>";
    ?></h1>
 
 <div>
    <a href="usrList.php"  style="color: #000;"><b>Registered Users</b></a>
    <a href="catalog.php"  style="color: #000;"><b>Catalogue</b></a>
   <a href=""  style="color: #000;"><b>Status</b></a>
   </div>
   
                <?php
 
include('connect.php');
 
if(isset($_GET['id']))
{
    $id=$_GET['id'];
 $res=mysqli_query($connection,"SELECT * FROM prodtable WHERE id= $id");
 while($row=mysqli_fetch_array($res))
 {
     $img=$row['image'];
 }
 //unlink($img);
 
$query1="DELETE from prodtable WHERE id=$id";
 
if(mysqli_query($connection, $query1))
{
   
header('location:LogAdmin.php');
}
else{
    echo "error while deleting";
}
}
?>
    </body>
</html>
