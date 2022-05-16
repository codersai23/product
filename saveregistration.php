<?php
error_reporting(0);
include("connect.php");
include("menu.php");
session_start();
 
$id= trim($_POST['id']);
$uid = trim($_POST['uid']);
$un = $_POST['un'];
$psd = $_POST['psd'];
$cpsd = $_POST['cpsd'];
$fn = $_POST['fn'];
$mn = $_POST['mn'];
$ln = $_POST['ln'];
$gen = $_POST['gen'];
 
$d = $_POST['dte'];
$m = $_POST['mon'];
$y = $_POST['yr'];
$age=$_POST['age'];
 
$addr = $_POST['addr'];
$mid= $_POST['mid'];
$phno= $_POST['phno'];
$dob=$d."-".$m."-".$y;
$role=$_POST['role'];
if(isset($_FILES["uimg"]["size"])) {    
    $x = explode(".", $_FILES['uimg']['name']);
    $ext = $x[count($x) - 1];
    $filepath = "user/".$uid.".".$ext;
}
else {
    echo "Image Failed";
}
 
$qry = "insert into regtable values($id,'$uid','$filepath','$un','$psd','$cpsd','$fn','$mn','$ln','$gen','$dob','$age','$addr','$mid','$phno','$role')";  
//fclose($fp);
 
echo $qry;
if(move_uploaded_file($_FILES['uimg']['tmp_name'], $filepath))
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
    header("location:RegList.php");
       
    }

?>
