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
<br>
</center></center>
 
   <div class="container">
     
 
 
     <center> <h3>
         Book Your Product</h3></center>
       
               <?php
      $sql="SELECT distinct * FROM prodtable";
      $res=mysqli_query($connection,$sql);?>
      <table  cellpadding="25" cellspacing="25">  
      <tr style="text-align:center;">
      <th> ID</th>
          <th>Product Code</th>
          <th>Product Name</th>
          <th>Price</th>
          <th>Catalog</th>
          <th>Click here to book</th>
          <tr>
    <?php  while($row=mysqli_fetch_array($res))
      {
            ?>
       <tr>            
                    <td><?php echo $row['pid']; ?></td>  
                    <td><?php echo $row['pc']; ?></td>                  
                    <td><?php echo $row['pn']; ?></td>
                    <td><?php echo $row['pp']; ?></td>
                 
                   
                    <td><img id="blah" src="<?php echo $row['pimg']; ?>"  height="150px" alt="hi"/></td>      
                    <td ><?php echo "<a href='usrConfirm.php?id=".$row['id']."'>Book Now</a>"; ?></td>
                   
                </tr>
       
        <?php  }
           
 
   
 
      ?>              
 
 
</table>
 
 
      </div>  
 
</body>
</html>
