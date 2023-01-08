<?php
include "./connect.php";
?>
<?php

if(isset($_POST['submit'])){
   
        $shop_name=$_POST['shop_name'];
   $shop_phone=$_POST['shop_phone'];
    $shop_location =$_POST['shop_location'];
    $seller_id =$_POST['seller_id'];

   
 

 

 
        $sql="INSERT INTO shop_details  (shop_name,shop_phone, shop_location ,seller_id ) 
       VALUES('$shop_name','$shop_phone','$shop_location','$seller_id')";

  
        if(mysqli_query($conn, $sql)){
            header('location:shop_details.php');
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add shop</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
   <style>
     <?php include 'css/style.css'; ?>
   </style>
   
</head>

<body>
  <div class="back">
<a href="shop_details.php"><input  class="  btn  btn-light" type="submit" value="Back " name="submit"/><img src='skip-backward-fill.svg'></a><br />

<div  class="containerc">
    <form  name="myForm" id="sign-up" method="post" >
       
        <h1 style="text-align:center ">Add New Shop </h1>
       
     
        <label for="shop_name" class="form-label "><b>Name:</b></label>
        
        <input type="text"  name="shop_name"   />
        <div id="zero" class="err"></div><br />

        <label for="shop_phone" class="form-label "><b>Phone:</b></label>
        <input type="number"  name="shop_phone"  />
        <div id="zero" class="err"></div><br />

        <label for="shop_location" >Location </label>
        <input   autofocus id="shop_location" name="shop_location" type="text"  />
        <div id="one" class="err"></div><br />
        

<label for="seller_id">Seller Name</label>


<select name="seller_id" >

<?php  

  $sql2 = "SELECT * FROM users where type='seller'";
  $result2 = mysqli_query($conn, $sql2);

  while ($row2=$result2->fetch_assoc()){
    
  echo"<option value=".$row2["id"]." i> ".$row2["name"] ."</option>";
   
}?>

</select>





        <br>
 <br>
        <input id="submitBtn" class="signForm" type="submit" value="ADD " name="submit"/><br />
       

       </div>
      </form>
    </div>
  </div>


</div>
</body>
</html>