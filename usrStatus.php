<?php
// error_reporting(0);
include("connect.php");
include("menu.php");
session_start();
$usrid=$_SESSION['uid'];
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><center>
<br>
    <h3>User</h3>
 
    <?php    
     $n=$_SESSION['fn'];
    echo "Welcome " .$n."!<br>";
    include("usrMenu.php");
    ?><br><br>
 
  <h4 style="color:red;">Booking Status Report</h4><br>
   <table  width = "100%">
    <tr>
 <th> </th>
        <th>No</th>
        <th>Booking ID</th>
        <th>User ID</th>
        <th>Name</th>
        <th>Product Code</th>      
        <th>Product Name</th>
        <th>Price</th>
        <th>Product Image</th>  
        <th>Status </th>
        </tr>
        <?php
$qry = "SELECT * FROM bookingtable WHERE uid= '$usrid';";
$res = mysqli_query($connection,$qry);
while($row = mysqli_fetch_assoc($res)) { ?>
    <tr>
   <td> </td>
        <td><?php echo $row['bid'] ;?></td>
        <td><?php echo $row['bicode'];?></td>
        <td><?php echo $row['uid'] ;?></td>
       
        <td><?php echo $row['fn'];?></td>
         <td><?php echo $row['pc'];?></td>
         <td><?php echo $row['pn'];?></td>
        <td><?php echo $row['pp'];?></td>      
        <td><img src="<?php echo $row['pimg'];?>" alt="hi" width="100" height="100" ></td>  
        <td><?php echo $row['ss'];?></td>
   
      </tr>
      <?php } ?>  
    </table>
   
   </center>
</body>
</html>
 
