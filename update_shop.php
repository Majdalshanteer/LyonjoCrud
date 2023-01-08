<?php
include "./connect.php";
?>

<?php 

  $id=$_GET['updateid'];
  $sql = "SELECT * FROM users  JOIN shop_details ON users.id = shop_details.seller_id; ";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);

  // show input field with first values befor changes
  $shop_name=$row["shop_name"];
  $shop_phone=$row["shop_phone"];
  $shop_location=$row["shop_location"];
  $seller_id=$row["seller_id"];

 

  if(isset($_POST['submit'])){
  
   
    $shop_nameField=$_POST ['shop_name']; 
    $shop_phoneField=$_POST['shop_phone'];
    $shop_locationField=$_POST ['shop_location']; 
    $seller_idField=$_POST ['seller_id']; 
   


  

$sql="UPDATE shop_details set id=$id,shop_name='$shop_nameField', shop_phone='$shop_phoneField',
shop_location='$shop_locationField', seller_id='$seller_idField'
where id=$id";



$result=mysqli_query($conn,$sql);
if($result){
    echo"success";
    header('location: shop_details.php');

}else{
    die(musqli_error($conn));
}

  }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
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
    <form  name="myForm"  method="post" >
       
        <h1 style="text-align:center ">Update Data</h1>
       
     
        <label for="shop_name" class="form-label "><b>Shop Name:</b></label>
        
        <input type="text"  name="shop_name" id="shop_name" value=<?php
        echo  $shop_name;?> />
        <div id="zero" class="err"></div><br />

    
     
        
        <label for="shop_phone" >Shop Phone </label>
        <input  id="shop_phone" name="shop_phone" value=<?php
        echo  $shop_phone;?>  />
        <div id="one" class="err"></div><br />
        
        <label for="shop_location">Shop Location</label>
        <input type="text"  name="shop_location" id="shop_location" value=<?php echo  $shop_location;?>>
        <div id="two" class="err"></div><br />

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

     
       
        <input id="submitBtn" class="signForm" type="submit" value="Update " name="submit"/><br />
        
       

       </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>