
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
    <title>Product Edit</title>
    </head>
<body>
<center>
<h1>Admin</h1><br>
   
    <?php    
   $n=$_SESSION['fn'];
  echo "Welcome " .$n."!<br><br> ";
  include("MenuAdmin.php");  
  ?><br><br>
   <br>
   <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">  
             <input type="hidden" name="id" value="<?php echo $id; ?>" /><br />
             
               <?php
    $query1="SELECT pid, pp, pn, pc, pimg FROM prodtable WHERE id=$id";
    $query2= mysqli_query($connection, $query1);
    $row = mysqli_fetch_assoc($query2);
    $oldimg=$row['pimg'];
    ?>
    <table>
    <tr>
    <td> <input type="text" discabled name="productid" value="<?php echo $row['pid']; ?>" /></td>
    </tr>
    <tr>
    <td> <input type="text" name="productCode" value="<?php echo $row['pc']; ?>"/></td>
    </tr>
    <tr>
    <td> <input type="text" name="name" value="<?php echo $row['pn']; ?>"/></td>
    </tr>
    <tr>
    <td> <input type="text" name="price" value="<?php echo $row['pp']; ?>" /></td>
    </tr>
    <tr>
    <td>
    <img id="blah"  src="<?php echo $row['pimg']; ?>" onclick="$('#usrimg').click()"  alt="Click to edit Image" height="100px" style="width: 100px" />
            <?php echo $row['pid']; ?>                                                                
          <input type="file" name="uimg" id="usrimg" value="<?php echo $row['pn']; ?>" class="form-control input-sm" style="visibility:hidden" onChange="readURL(this, '<?php echo $row['pid']; ?>')"/>
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
    $pid=$_POST['productid'];
        $prc=$_POST['productCode'];
        $name=$_POST['name'];
        $pr=$_POST['price'];
         // $img=$_FILES['productimg']['name'];
         //    $isImage = 0;
        if($_FILES['uimg']['name']==""){
         $query3="UPDATE prodtable SET pid='$pid',pc='$prc', pn='$name', pp='$pr' WHERE id=$id";
       
        }
        else {
             $res=mysqli_query($connection,"SELECT * FROM prodtable WHERE id=$id");
           
             while($row=mysqli_fetch_array($res))
             {
                 $img=$row['pimg'];
             }
               // unlink($img);
              $x = explode(".",$_FILES['uimg']['name']);
            $ext = $x[count($x) - 1];
            $filepath = trim("Images/".$pid.".".$ext);
                $query3="UPDATE prodtable SET pid='$pid',pc='$prc', pn='$name', pp='$pr', pimg='$filepath' WHERE id=$id ";
                copy($_FILES['uimg']['tmp_name'], $filepath);
               
        }
   
   
    if(!mysqli_query($connection, $query3)) {
        echo "<script type='text/javascript'>alert('Update Failed');</script>";
    }else{
            echo "<script type='text/javascript'>alert('Updated Successfully');</script>";
        }      
    }
?>
