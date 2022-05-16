<?php
error_reporting(0);
include("connect.php");
include("menu.php");
session_start();  
$id=$_GET['id'];
$n=$_SESSION['fn'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Edit</title>
    </head>
<body>
<center>
<h1>Admin</h1><br>
    <?php  
    echo "Welcome " .$n."!<br>";
    ?><br>
     <div>
    <a href="usrList.php"  style="color: #000;"><b>Registered Users</b></a>
    <a href="catalog.php"  style="color: #000;"><b>Catalogue</b></a>
   <a href=""  style="color: #000;"><b>Status</b></a>
   </div>
   <br>
   <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">  
             <input type="hidden" name="id" value="<?php echo $id; ?>" /><br />
             
               <?php
    $query1="select uid, uimg, un, psd, fn, gen, dte, age, phno, mid FROM regtable where id=$id";
    $query2= mysqli_query($connection, $query1);
    //echo $query1;
    $row = mysqli_fetch_assoc($query2);
    $oldimg=$row['uimg'];
    ?>
    <table>
    <tr>
    <td> <input type="text" disabled name="usrid" value="<?php echo $row['uid']; ?>" /></td>
    </tr>
    <tr>
    <td> <input type="text"  name="un" value="<?php echo $row['un']; ?>"/></td>
    </tr>
    <tr>
    <td> <input type="text"  name="psd" value="<?php echo $row['psd']; ?>"/></td>
    </tr>
    <tr>
    <td> <input type="text" name="fn" value="<?php echo $row['fn']; ?>" /></td>
    </tr>
    <tr>
    <td> <input type="text" name="gen" value="<?php echo $row['gen']; ?>" /></td>
    </tr>
    <tr>
    <td> <input type="text" name="dob" value="<?php echo $row['dte']; ?>" /></td>
    </tr>
    <tr>
    <td> <input type="text" name="age" value="<?php echo $row['age']; ?>" /></td>
    </tr>
    <tr>
    <td> <input type="text" name="phno" value="<?php echo $row['phno']; ?>" /></td>
    </tr>
    <tr>
    <td> <input type="text" name="mid" value="<?php echo $row['mid']; ?>" /></td>
    </tr>
    <tr>
    <td>
    <img id="blah"  src="<?php echo $row['uimg']; ?>" onclick="$('#usrimg').click()"  alt="Click to edit Image" height="100px" style="width: 100px" />
            <?php echo $row['uid']; ?>                                                                
          <input type="file" name="uimg" id="usrimg" value="<?php echo $row['fn']; ?>" class="form-control input-sm" style="visibility:hidden" onChange="readURL(this, '<?php echo $row['uid']; ?>')"/>
    </td>
    </tr>
    </table>
    <input type="submit"  value="Update" name="update"/>
    </form>
    </center>
   
</body>
</html>
<script>
function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
               
                $('#blah'+id)
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };
 
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?php
if(isset($_POST['update']))
{
    $id=$_POST['id'];
        $usrid=$_POST['uid'];
        $un=$_POST['un'];
        $psd=$_POST['psd'];
        $fn=$_POST['fn'];
        $gen=$_POST['gen'];
        $dob=$_POST['dob'];
        $age=$_POST['age'];
        $phno=$_POST['phno'];
        $mid=$_POST['mid'];
         // $img=$_FILES['productimg']['name'];
         //    $isImage = 0;
        if($_FILES['uimg']['name']==""){
         $query3="UPDATE regtable SET un='$un', psd='$psd', fn='$fn', gen='$gen', dte='$dob', age='$age',phno='$phno',mid='$mid' WHERE id=$id";
       
        }
        else {
             $res=mysqli_query($connection,"SELECT * FROM regtable WHERE id=$id");
           
             while($row=mysqli_fetch_array($res))
             {
                 $img=$row['uimg'];
             }
               // unlink($img);
              $x = explode(".",$_FILES['uimg']['name']);
            $ext = $x[count($x) - 1];
            $filepath = "user/".$usrid.".".$ext;
                $query3="UPDATE regtable SET  un='$un', psd='$psd', fn='$fn', gen='$gen', dob='$dob', age='$age', phno='$phno', mid='$mid', uimg='$filepath' WHERE id=$id ";
                copy($_FILES['uimg']['tmp_name'], $filepath);
               
        }
   
   
    if(!mysqli_query($connection, $query3)) {
        echo "<script type='text/javascript'>alert('Update Failed');</script>";
    }else{
            echo "<script type='text/javascript'>alert('Updated Successfully');</script>";
            header("location:usrList.php");
        }      
    }
?>
 
