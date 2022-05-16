<?php
error_reporting(0);
include("connect.php");
include("menu.php");
session_start();
 
$id= trim($_POST['id']);
$pid =trim($_POST['pid']);
$pn = $_POST['pn'];
$pc = $_POST['pc'];
$pp = $_POST['pp'];
 
if(isset($_FILES["pimg"]["size"])) {    
    $x = explode(".", $_FILES['pimg']['name']);
    $ext = $x[count($x) - 1];
    $filepath = trim("images/".$pid.".".$ext);
}
else {
    echo "Image Failed";
}
 
$qry = "insert into prodtable values($id,'$pid','$pc','$pn','$pp','$filepath')";  
//fclose($fp);
 
echo $qry;
if(move_uploaded_file($_FILES['pimg']['tmp_name'], $filepath))
{
    }else {
        echo "Failed to Upload";
    }
if(!mysqli_query($connection, $qry))
 
{
    $msg="Failed";
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
else
 
{
    header("location:catalog.php");
       
    }
 
