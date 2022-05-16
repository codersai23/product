<?php
error_reporting(0);
include("connect.php");
include("menu.php");
session_start();  
 
$id=$_GET['id'];
 
 
$n=$_SESSION['fn'];
$usrid=$_SESSION['uid'];
$query1="SELECT * FROM prodtable WHERE id=$id";
 
 
$query2=mysqli_query($connection,$query1);
$row = mysqli_fetch_assoc($query2);  
 
 
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
    <h3>Login User</h3>
 
    <?php    
     $n=$_SESSION['fn'];
    echo "Welcome " .$n."!!!<br>";
    include("usrMenu.php");  
    ?><br><br>
 
  <h4 style="color:red;">Confirm your Product</h4>
 <?php
 $nqry = "SELECT * FROM bookingtable";  
 $nres = mysqli_query($connection,$nqry);
 $bid = mysqli_num_rows($nres) + 1;
 $bcode = ($bid < 10)?"B0".$bid:"B".$pid;
 
 ?>
   <br>
   <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
   <table>
   <tr>
   <td>Booking ID </td>
   <td><input  disabled type="text" name="bid" value="<?php echo $bid;?> " /></td>
   </tr>
   <tr>
   <td>Booking Code </td>
   <td><input  disabled type="text" name="bcode" value="<?php echo $bcode;?> " /></td>
   </tr>
   <tr>
   <td>User ID</td>
   <td><input disabled name ="usrid" type="text" value="<?php echo $usrid;?>"></td>
   </tr>
   <tr>
   <td>First Name</td>
   <td><input disabled name ="fn" type="text" value="<?php echo $n;?>"></td>
   </tr>
   <tr>
   <td>Product Code</td>
   <td> <input disabled  name ="pcode" type="text" value="<?php echo $row["pc"];?>"></td>
   </tr>
   <tr>
   <td>Product Name</td>
   <td><input disabled  name ="pname" type="text" value="<?php echo $row["pn"];?>"></td>
   </tr>
   <tr>
   <td>Price</td>
   <td><input disabled  name ="price" type="text" value="<?php echo $row["pp"];?>"></td>
   </tr>
   <tr>
   <td>Product Image</td>
   
    <td><img id="blah" src="<?php echo $row['pimg']; ?>"  name="pimg" height="100px" style="width: 100px" alt="hi"/>
                                           
           <input type="file" name="pimg" style="visibility:hidden" onChange="readURL(this, '<?php echo $bid; ?>')"   /></td>
 
   
    </td>      
    </td>
    </tr>
    <tr>
   <td>Status</td>
   <td><input disabled  name="status" type="text" value="Pending..."></td>
   </tr>
   </table>
   
   <input type="submit"  value="Confirm Booking" name="insert"/>
 
   </form></center>
 
</body>
</html>
<?php
 
if(isset($_POST['insert'])){
 
 
   $pcode = $row['pc'];
   $pname = $row['pn'];
   $price= $row['pp'];
 
$pimg=$row["pimg"];
  $qry = "insert into bookingtable values($bid,'$bcode','$usrid','$n','$pcode','$pname','$price','$pimg','pending')";  
// $lastid = mysql_insert_id();
//echo "last id : ".$lastid;
   //fclose($fp);
   echo $qry;
   if(!mysqli_query($connection, $qry))
   {
      $msg="Failed";
      echo "<script type='text/javascript'>alert('$msg');</script>";
   }  
   else  
   {  
        $msg="Thank You Requested Submit";
      echo "<script type='text/javascript'>alert('$msg');</script>";
      header("location: usrStatus.php");
         
   }    
}
//$_SESSION['userid'] = mysqli_insert_id($qry);
//echo $_SESSION['userid'] ;
?>  
 
 
 

