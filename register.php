<?php
error_reporting(0);
include("connect.php");
include("menu.php");
session_start();
$nqry = "select * from regtable";  
$nres = mysqli_query($connection,$nqry);
$id = mysqli_num_rows($nres) + 1;  
$rid = ($id < 10)?"R0".$id:"R".$id;
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
<form method="post" action="SaveRegistration.php"  enctype="multipart/form-data">
<center>
    <table cellpadding="10" cellspacing="15">
    <caption><h1> Registration Details</h1></caption>
    <tr>
    <td><input type="hidden" name="id" value="<?php echo $id;?> " /></td>
    <td>  <input type="hidden" name="uid" value="<?php echo $rid ; ?> " />
    <input  name="" required type="text" value="<?php echo $rid; ?>" disabled="disabled">
    </td>
    <td><img id="blah<?php echo $rid; ?>" src="images/Picture.ico" onclick="$('#usrimg').click()"  alt="Click to Add Image" height="100px" style="width:225px" />                                              
           <input name="uimg" id="usrimg" class="txt" type="file" style="visibility:hidden" onChange="readURL(this, '<?php echo $rid; ?>')"   /></td>
    </tr>
    <tr>
    <td><input type="text" name="un" Placeholder="Username"></td>
    <td><input type="text" name="psd" Placeholder="Password"></td>
    <td><input type="text" name="cpsd" Placeholder="Confirm Password"></td>
    </tr>
    <tr>
    <td><input type="text" name="fn" Placeholder="First Name"></td>
    <td><input type="text" name="mn" Placeholder="Middle Name"></td>
    <td><input type="text" name="ln" Placeholder="Last Name"></td>
    </tr>
    <tr>
    <td>  <input type="Radio" required name="gen" value="Male"><b>Male</b>
          <input type="Radio" required name="gen" value="Female"><b>Female</b></td>
    <td>DOB: <select name="dte"><option>Date</option>
        <?php
             for($d=1;$d<=31;$d++)
             {
                echo "<option value = '$d'>".$d."</option>";
             }    
        ?>
        </select>
                                        <select name="mon"><option>Month</option>
                                             <?php
                                                for($m=1;$m<=12;$m++)
                                                 {
                                                 echo "<option value = '$m'>".$m."</option>";
                                                 }    
                                             ?>
                                         </select>
                                         <select name="yr" onblur="CalculateAge();" id="txtYear"><option >Year</option>
                                             <?php
                                                 $year = date('Y');
                                                for($y=1900;$y<=$year;$y++)
                                                 {
                                                 echo "<option value = '$y'>".$y."</option>";
                                                 }    
                                             ?>
                                         </select>
                                         <td> <input id="age" name="" placeholder="age" type="text" disabled value=""/>
        <input type="hidden" id="hdage" name="age" value="<?php echo $rid; ?> " /></td>
    </tr>
    <tr>
    <td><textarea name="addr" id="" cols="23" rows="4"></textarea></td>
    <td><input type="text" name="phno" Placeholder="Mobile No"></td>
    <td><input type="text" name="mid" Placeholder="Mail Id"></td>
    </tr>
    <tr>
    <td>  Role:<select name="role">
                                         <option value="1">Admin</option>
                                         <option value="2">User</option>
                                         </select></td>
   
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
    function CalculateAge() {
          var curYear = new Date().getUTCFullYear();
          var age = curYear - document.getElementById('txtYear').value;
          //  document.reg.age.value = age;
          document.getElementById("age").value = age;
          document.getElementById("hdage").value = age;
      }
</script>