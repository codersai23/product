<?php
error_reporting(0);
include("connect.php");
include("menu.php");
session_start();  
 
?>
 
 
 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
</head>
<body>
<br>
   <center>
   <h3>Admin</h3>
 
  <?php    
   $n=$_SESSION['fn'];
  echo "Welcome " .$n."!<br><br> ";
  include("menuAdmin.php");  
  ?><br><br>
   <table class="table table-hover" >  
       
        <th>Product ID</th>      
        <th>Product Code</th>
        <th>Product Image</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <center><th>Click to</th>
        <th>Click to</th></center>
      </tr>
      <?php
$qry = "select * from prodtable";
$res = mysqli_query($connection,$qry);
while($row = mysqli_fetch_assoc($res)) { ?>
                <tr>            
                    <td><?php echo $row['pid']; ?></td>                      
                    <td><?php echo $row['pn']; ?></td>
                    <td><img id="blah" src="<?php echo $row['pimg']; ?>"  height="100px" style="width: 100px" alt="hi"/></td>    
                    <td><?php echo $row['pc']; ?></td>
                    <td><?php echo $row['pp']; ?></td>
                   
 
                    <td><?php echo "<a href='productEdit.php?id=".$row['id']."'>Edit</a>"; ?></td>
                    <td><?php echo "<a href='productDelete.php?id=".$row['id']."'>Delete</a>"; ?></td>
                </tr>
        <?php } ?>      
               
         
             </table>
 
             <a href="addproduct.php"><input type="button" value="Add Product" name="Add Product"></a>
   </center>
</body>
</html>
