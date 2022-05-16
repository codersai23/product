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
    <title>User Catalog</title>
</head>
<body><center>
<h1>User</h1>
    <?php    
$n=$_SESSION['fn'];
 echo "Welcome " .$n."!<br><br> ";
 include("usrMenu.php");  
 ?><br><br>
<br>
</center>
   </center>
   <h1 >
             <?php
   $pcode=$_SESSION['pc'];
    echo "<center><h2 class='h1a'>Welcome to the Product Catalog!</h2></center>";
    ?></h1>
 
 
     <center>
     
     <div class="container">  
     <div class="row">
 
               <?php
      $sql="SELECT distinct * FROM prodtable";
      $res=mysqli_query($connection,$sql);
      while($row=mysqli_fetch_array($res))
   
      {?>
 
 
  <div class="col-sm-3">
  <figure >
             <figcaption>
             <?php echo $row['pn'];?></figcaption>
                <img  src="<?php echo $row['pimg'];?>" alt="hi" height="100" width="100">
                    <div>
                       
                            <h5 ><?php echo $row['pc'];?></h5>
                            <h6 ><?php echo $row['pp'];?></h6>
                   
                    </div>
                    <div>                      
                        <a href="<?php echo $row['pimg'];?>" target="_blank" >
                        <button>Enlarge</button>                  
                            </a>
                    </div>                  
           
           </figure>
  </div>
    <?php  }
 
      ?>              
</div>
</div>
</center>
</body>
</html>
