<?php
//error_reporting(0);
include("connect.php");
include("menu.php");
session_start();  
 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin List</title>
</head>
<body>
<br>
   <center>
   <h3>Admin</h3>
 
  <?php    
   $n=$_SESSION['fn'];
  echo "Welcome " .$n."!<br><br> ";
  include("MenuAdmin.php");  
  ?><br><br>
   <table class="table table-hover" >  
       
        <th>User Id</th>      
        <th>Photo</th>
        <th>Username</th>
        <th>Password</th>
          <th>First Name</th>
          <th>Gender</th>
          <th>DOB</th>
           <th>Age</th>
           <th>Phono</th>
           <th>Mail Id</th>
            <th>Click to</th>
          <th>Click to</th>
      </tr>
      <?php
$qry = "select * from regtable";
$res = mysqli_query($connection,$qry);
while($row = mysqli_fetch_assoc($res)) { ?>
                <tr>            
                    <td><?php echo $row['uid']; ?></td>                    
                    <td><img id="blah" src="<?php echo $row['uimg']; ?>"  height="100px" style="width: 100px" alt="hi"/></td>      
                    <td><?php echo $row['un']; ?></td>
                    <td><?php echo $row['psd']; ?></td>
                    <td><?php echo $row['fn']; ?></td>
                    <td><?php echo $row['gen']; ?></td>
                    <td><?php echo $row['dte']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['phno']; ?></td>
                    <td><?php echo $row['mid']; ?></td>
                     
                   
                    <td><?php echo "<a href='usrEdit.php?id=".$row['id']."'>Edit</a>"; ?></td>
                    <td><?php echo "<a href='usrDel.php?id=".$row['id']."'>Delete</a>"; ?></td>
                </tr>
        <?php } ?>               
         
             </table>
 
   </center>
</body>
</html>
