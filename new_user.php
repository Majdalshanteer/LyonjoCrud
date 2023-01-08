<?php
include "./connect.php";
?>
<?php

if(isset($_POST['submit'])){
    $username=stripslashes($_POST['name']);
        $name=$_POST['name'];
   $email=$_POST['email'];
    $password =$_POST['password'];
    $type =$_POST['type'];

   
    $image=time() . '-' . $_FILES['image']['name'];

    $target_dir="images/";
    
    $target_file=$target_dir . basename($image);

 

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
        $sql="INSERT INTO users  (name,image,	email, password ,type ) 
       VALUES('$name','$image','$email','$password','$type')";

  
        if(mysqli_query($conn, $sql)){
            header('location:index.php');
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add user</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
   <style>
     <?php include 'css/style.css'; ?>
   </style>
   
</head>

<body>
  <div class="back">
<a href="index.php"><input  class="  btn  btn-light" type="submit" value="Back " name="submit"/><img src='skip-backward-fill.svg'></a><br />

<div  class="containerc">
    <form  name="myForm" id="sign-up" method="post" enctype="multipart/form-data" >
       
        <h1 style="text-align:center ">Add New User </h1>
       
     
        <label for="name" class="form-label "><b>Name:</b></label>
        
        <input type="text"  name="name" id="name"  />
        <div id="zero" class="err"></div><br />

        <label for="file" class="form-label "><b>image:</b></label>
        <input type="file"  name="image" id="image" accept=".jpg,.jpeg, .png "   />
        <div id="zero" class="err"></div><br />

        <label for="email" >email </label>
        <input   autofocus id="email" name="email" type="email"  />
        <div id="one" class="err"></div><br />
        
        <label for="password">password </label>
        <input type="text"  name="password" id="password">
        <div id="two" class="err"></div><br />

     

       <select name="type" >
  <option value="buyer">buyer</option>
 <option value="seller">seller</option>


  

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