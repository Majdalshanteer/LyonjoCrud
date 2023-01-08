<?php
include "./connect.php";
?>

<?php 

  $id=$_GET['updateid'];
  $sql="SELECT * from users where id=$id ";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  // show input field with first values befor changes
  $name=$row["name"];
  $image=$row["image"];
  $email=$row["email"];
  $password=$row["password"];
  $type=$row["type"];
  $image=$row["image"];
 

  if(isset($_POST['submit'])){
  
    $username=stripslashes($_POST['name']);
    $nameField=$_POST ['name'];
    $emailField=$_POST ['email']; 
    $passwordField=$_POST['password'];
    $typeField=$_POST ['type'];

    if(empty($_POST['image'])){
        $image="default.png";
    }  else{
      $image=$_POST['image']; 
    }

$sql="UPDATE users set id=$id,name='$nameField', email='$emailField',
password='$passwordField' , type='$typeField' , image='$image'
where id=$id";

$result=mysqli_query($conn,$sql);
if($result){
    echo"success";
    header('location: index.php');

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
<a href="index.php"><input  class="  btn  btn-light" type="submit" value="Back " name="submit"/><img src='skip-backward-fill.svg'></a><br />
    <div  class="containerc">
    <form  name="myForm" id="sign-up" method="post" >
       
        <h1 style="text-align:center ">Update Data</h1>
       
     
        <label for="name" class="form-label "><b>Name:</b></label>
        
        <input type="text"  name="name" id="name" value=<?php
        echo  $name;?> />
        <div id="zero" class="err"></div><br />

        <label for="file" class="form-label "><b>image:</b></label>
        <input type="file"  name="image" id="image" src="images/<?php echo  $image;?>" accept=".jpg,.jpeg, .png "  />
       <img src="images/<?php echo  $image;?>" width="100" height="100">
     
        
        <label for="email" >Email </label>
        <input   autofocus id="email" name="email" value=<?php
        echo  $email;?>  />
        <div id="one" class="err"></div><br />
        
        <label for="phone">password</label>
        <input type="text"  name="password" id="phone" value=<?php echo  $password;?>>
        <div id="two" class="err"></div><br />


        <label for="type">type</label>

<select name="type" >
  <option value="<?php  echo  $type;?>"><?php  echo  $type;?></option>
  <?php if($type ==='buyer'){
    echo '<option value="seller">seller</option>';
  }else{
    echo '<option value="buyer">buyer</option>';
} ?> 
  

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