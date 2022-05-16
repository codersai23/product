
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
<br>
    <h3>Admin</h3>
 
    <?php    
     $n=$_SESSION['fn'];
    echo "Welcome " .$n."!<br><br> ";
    include("menuAdmin.php");  
    ?><br><br>
 <form  method="post" enctype="multipart/form-data"  action="">
<div class="category_container">
<input  type="submit"  id="all" name="all" value="All"/>
<input  type="submit" class="category_item" id="pendingID" name="pending" value="Pending"/>
<input  type="submit" class="category_item" id="approveID" name="approve" value="Approved List"/>
<input  type="submit"class="category_item" id="disapproveID" name="disapprove" value="Disapproved List"/>
</div>  
</form>
  <h4 style="color:red;">Booking Status Report</h4><br>
   <table  width = "100%">
    <tr>
 <th> </th>
        <th>Id</th>
        <th>Book ID</th>
        <th>User ID</th>
        <th>Name</th>
        <th>Product Code</th>      
        <th>Product Name</th>
        <th>Price</th>
        <th>Product Image</th>  
        <th>Status </th>
        <th>Action </th>
        </tr>
        <?php
 
if(isset($_POST['all'])){
$qry = "SELECT * FROM bookingtable";
$res = mysqli_query($connection,$qry);
while($row = mysqli_fetch_assoc($res)) { ?>
    <tr>
   <td> </td>
        <td><?php echo $row['bid'] ;?></td>
        <td><?php echo $row['bicode'];?></td>
        <td><?php echo $row['uid'];?></td>
        <td><?php echo $row['fn'];?></td>
         <td><?php echo $row['pc'];?></td>
         <td><?php echo $row['pn'];?></td>
        <td><?php echo $row['pp'];?></td>      
        <td><img src="<?php echo $row['pimg'];?>" alt="hi" width="100" height="100" ></td>  
        <td><?php echo $row['ss'];?></td>
        <td><?php echo "<a href='admCfirm.php?id=".$row['bid']."'>Edit</a>"; ?></td>
      </tr>
 
      <?php }
       }
       elseif(isset($_POST['pending'])){
        $qry = "SELECT * FROM bookingtable WHERE ss='Pending'";
        $res = mysqli_query($connection,$qry);
        while($row = mysqli_fetch_assoc($res)) { ?>    
 <tr>
   <td> </td>
   <td><?php echo $row['bid'] ;?></td>
        <td><?php echo $row['bicode'];?></td>
        <td><?php echo $row['uid'];?></td>
        <td><?php echo $row['fn'];?></td>
         <td><?php echo $row['pc'];?></td>
         <td><?php echo $row['pn'];?></td>
        <td><?php echo $row['pc'];?></td>      
        <td><img src="<?php echo $row['pimg'];?>" alt="hi" width="100" height="100" ></td>  
        <td><?php echo $row['ss'];?></td>
        <td><?php echo "<a href='admCfirm.php?id=".$row['bid']."'>Edit</a>"; ?></td>
      </tr>
      <?php
                }
                }elseif(isset($_POST['approve'])){
     
                    $qry = "SELECT * FROM bookingtable WHERE ss='Approved'";
                    $res = mysqli_query($connection,$qry);
                    while($row = mysqli_fetch_assoc($res)) { ?>    
                 
                 <tr>
   <td> </td>
   <td><?php echo $row['bid'] ;?></td>
        <td><?php echo $row['bicode'];?></td>
        <td><?php echo $row['uid'];?></td>
        <td><?php echo $row['fn'];?></td>
         <td><?php echo $row['pc'];?></td>
         <td><?php echo $row['pn'];?></td>
        <td><?php echo $row['pc'];?></td>      
        <td><img src="<?php echo $row['pimg'];?>" alt="hi" width="100" height="100" ></td>  
        <td><?php echo $row['ss'];?></td>
        <td><?php echo "<a href='admCfirm.php?id=".$row['bid']."'>Edit</a>"; ?></td>
      </tr>
      <?php
                }
                }elseif(isset($_POST['disapprove'])){
     
                    $qry = "SELECT * FROM bookingtable WHERE ss='Disapproved'";
                    $res = mysqli_query($connection,$qry);
                    while($row = mysqli_fetch_assoc($res)) { ?>    
                   
                   <tr>
   <td> </td>
   <td><?php echo $row['bid'] ;?></td>
        <td><?php echo $row['bicode'];?></td>
        <td><?php echo $row['uid'];?></td>
        <td><?php echo $row['fn'];?></td>
         <td><?php echo $row['pc'];?></td>
         <td><?php echo $row['pn'];?></td>
        <td><?php echo $row['pc'];?></td>      
        <td><img src="<?php echo $row['pimg'];?>" alt="hi" width="100" height="100" ></td>  
        <td><?php echo $row['ss'];?></td>
        <td><?php echo "<a href='admCfirm.php?id=".$row['bid']."'>Edit</a>"; ?></td>
      </tr>
      <?php
                }
                }?>
 
    </table>
   
   </center>
</body>
</html>
