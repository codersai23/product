<?php
error_reporting(0);
include("connect.php");
include("menu.php");
session_start();
require_once('PHPMailer-master/PHPMailerAutoload.php');  
 
$id=$_GET['id'];
 
$mm="aadisai@kchigh.com" ;//$_SESSION['mid']"";  
$n=$_SESSION['fn'];
 
$query1="SELECT * FROM bookingtable WHERE bid=$id";
 
 
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
    <h3>Admin</h3>
 
    <?php    
     $n=$_SESSION['fn'];
    echo "Welcome " .$n."!<br><br> ";
    echo "hi";  
 
    include("MenuAdmin.php");  
    ?><br><br>
 
  <h4 style="color:red;">Status Updation</h4><br>
   <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
   <table>
   <tr>
   <td>ID</td>
   <td><input  disabled type="text" name="bid" value="<?php echo $row["bid"];?> " /></td>
   </tr>
   <tr>
   <td>Book ID</td>
   <td><input  disabled type="text" name="bcode" value="<?php echo $row["bicode"];?>" /></td>
   </tr>
   <tr>
   <td>User ID</td>
   <td><input disabled name ="usrid" type="text" value="<?php echo $row["uid"];?>"></td>
   </tr>
   <tr>
   <td>First Name </td>
   <td><input disabled name ="fn" type="text" value="<?php echo $row["fn"];?>"></td>
   </tr>
   <tr>
   <td>Product Code</td>
   <td> <input disabled  name ="pcode" type="text" value="<?php echo $row["pc"];?>"></td>
   </tr>
   <tr>
   <td>Product Name </td>
   <td><input disabled  name ="pname" type="text" value="<?php echo $row["pn"];?>"></td>
   </tr>
   <tr>
   <tr>
   <td>Price </td>
   <td><input disabled  name ="price" type="text" value="<?php echo $row["pp"];?>"></td>
   </tr>
   <tr>
   <td>Catalog  </td>
   
    <td><img id="blah" src="<?php echo $row['pimg']; ?>"  name="pimg" height="100px" style="width: 100px" alt="hi"/>
                                               
         </td>
 
   
 
    </tr>
    <tr>
   <td>Status </td>
   <td>
   <select name="status">
   <option>Select</option>
   <option value="Pending">Pending</option>
   <option value="Approved">Approved</option>
   <option value="Disapproved">Disapproved</option>
   </select>
   </td>
   </tr>
   </table>
   <br>
   <input type="submit"  value="Confirm Status" name="update"/>
 
   </form></center>
 
</body>
</html>
<?php
if(isset($_POST['update']))
{
 
   $status= $_POST['status'];  
   $uid=$row["uid"];
    $qmid = "select mid from regtable where uid='$uid'";
 
$qmid2=mysqli_query($connection,$qmid);
$row1 = mysqli_fetch_assoc($qmid2);    
 
   $query3="UPDATE bookingtable SET ss='$status' WHERE bid=$id";
 
 
     
    if(!mysqli_query($connection, $query3)) {
        echo "<script type='text/javascript'>alert('Update Failed');</script>";
    }else{
           
            $mail=new PHPMailer;
 $mail->IsSMTP();
 $mail->Host = 'smtp.gmail.com';
 $mail->SMTPAuth = true;
 $mail->Username = "aadisai@kchigh.com"; //give your mail-id 
 $mail->Password = "2614arbrosky"; //give your password
 $mail->SMTPSecure = 'ssl';
 $mail->Port = 465;
 $mail->AddAddress($row1["mid"]);
 $mail->isHTML(true);
 $mail->Subject = "Product Status Report";
         $mail->Body = "Booking ID: " .$row["bicode"]. "            Product Code: " .$row["pc"]. "    
               product Price: " .$row["pp"]. "     prodcut name: " .$row["pn"]. "    Status: " .$row["ss"]. ".";
 if(!$mail->Send()) {
         echo   'Mail error: '.$mail->ErrorInfo;
             
         } else {
           //  echo 'Message sent!';
           echo "<script type='text/javascript'>alert('Updated Successfully');</script>";
           echo "<script type='text/javascript'>alert('mail sent');</script>";    
               
         }
   
         header("location:admStatus.php");
        }    
       
 
    }
 
?>
 
