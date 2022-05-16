<?php
error_reporting(0);
include("connect.php");
include("menu.php");
session_start();
$qry = "select * from regtable";
$res = mysqli_query($connection,$qry);
while($row = mysqli_fetch_assoc($res)) {
    $id=$row['uid'];
    $usr=$row['un'];
    $psd= $row['psd'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="reUTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table cellpadding="10" cellspacing="15">
    <caption><h1> Registration Details</h1></caption>
    <tr>
    <td> <input  disabled name ="id" type="text" value="<?php echo $id;?>">  </td>
    <td> <input  disabled name ="un" type="text" value="<?php echo $usr;?>"> </td>
    <td> <input  disabled name ="psd" type="text" value="<?php echo $psd;?>"> </td>
    </tr>
</table>
<h1 >Thank you for visiting our website!</h1>      
</body>
</html>
