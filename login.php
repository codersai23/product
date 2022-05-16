<?php
error_reporting(0);
include("connect.php");
include("menu.php");
session_start();
if(isset($_SESSION["empty"])) {                        
    echo '<script type="text/javascript">alert("' . $_SESSION["empty"] . '")</script>';
     
  }elseif(isset($_SESSION["invalid"])) {
       echo '<script type="text/javascript">alert("' . $_SESSION["invalid"] . '")</script>';
     
  }
  session_unset();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<form method="post" name="log" action="validate.php"  enctype="multipart/form-data">
<center>
    <table cellpadding="10" cellspacing="15">
    <caption><h1>Login</h1> </caption>
   
    <tr>
    <td>
    <input  name="un"  type="text" value="" placeholder="Username">    
    </td>
    </tr>
    <tr>
    <td>
    <input  name="psd"  type="text" value="" placeholder="Password">    
    </td>
    </tr>
   
    </table>
<input type="Submit" value="Sign in" name="signin">
<a href="register.php"><input type="button" value="Sign up" name="signup"></a>
</center>
</form>
</body>
</html>