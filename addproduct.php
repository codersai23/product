<?php
error_reporting(0);
include("connect.php");
include("menu.php");
session_start();
$nqry = "select * from prodtable";  
$nres = mysqli_query($connection,$nqry);
$id = mysqli_num_rows($nres) + 1;  
$pid = ($id < 10)?"P0".$id:"P".$id;
 
 
$n=$_SESSION['fn'];
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="Saveproduct.php"  enctype="multipart/form-data">
<center>
<h1>Admin</h1><br>
<?php    
   $n=$_SESSION['fn'];
  echo "Welcome " .$n."!<br><br> ";
  include("menuAdmin.php");  
  ?><br><br>
   <br>
<h1>Product Details</h1>
    <table cellpadding="10" cellspacing="15">
 
    <tr>
        <td>
    <input  name="" required type="text" value="<?php echo $pid; ?>" disabled="disabled"></td>
    <td><input type="hidden" name="id" value="<?php echo $id;?> " /></td>
    <td>  <input type="hidden" name="pid" value="<?php echo $pid ; ?> " />
   
    </td></tr>
    <tr>
    <td><img id="blah<?php echo $pid; ?>" src="images/Picture.ico" onclick="$('#usrimg').click()"  alt="Click to Add Image" height="100px" style="width:225px" />                                              
    <input name="pimg" id="usrimg" class="txt" type="file" style="visibility:hidden" onChange="readURL(this, '<?php echo $pid; ?>')" /></td></tr>
    <tr>
    <td><input type="text" name="pn" Placeholder="Product Name"></td></tr>
   <tr> <td><input type="text" name="pc" Placeholder="Product Code"></td></tr>
   <tr> <td><input type="text" name="pp" Placeholder="Product Price"></td>
    </tr>
    </table>
    <input type="Submit" name="sub" Value="Submit" >
    </center>
    </form>
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
