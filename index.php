<?php
include "./connect.php";
?>
<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
     <?php include 'css/style.css'; ?>
   </style>
</head>

<body >

<button class="btn btn-secondary my-2" ><a href="shop_details.php"class="text-light" >Shop Details</a></button><br>

<button class="btn btn-info my-2" ><a href="new_user.php"class="text-light" >+ Add new user</a></button><br>
    <h1>List of users</h1>
<table class="table table-striped mt-5 mx-5 table-hover border-danger w-75">
  <tr>
        <th>id</th>
        <th>profile picture</th>
        <th>name</th>
        <th>email</th>
        <th>password</th>
        <th>type</th>
        <th>Action</th>
  </tr>
  <?php
    // delete user
    if (isset($_GET['deleteid'])) {
        $id = $_GET['deleteid'];
        mysqli_query($conn, "DELETE FROM users WHERE id=".$id);
        header('location: index.php');
    }


 //PRINT Table from data base
  $sql = "SELECT * FROM users  ";
  $result = mysqli_query($conn, $sql);

 

  while($row=$result->fetch_assoc()){
$id=$row["id"];
    echo" <tr>
    <td>".$row["id"] ."</td>";?>
  <td>
    <img src="<?php echo 'images/'. $row['image']; ?>" width='90' height='90'> 
    </td>
    <?php echo" 
    <td>".$row["name"] ."</td>
  
    <td>".$row["email"]."</td>
    <td>".$row["password"]."</td>
   
    <td>".$row["type"]."</td>
    <td>
    <button class='btn btn-warning'><a href='view_user.php?veiwid=".$id."' class='text-light'><img src='eye.svg'></a></button>
    <button class='btn btn-info'><a href='update_user.php?updateid=".$id."' class='text-light'><img src='pen.svg'></a></button>"?>
    <button  class='btn btn-danger'><a onclick="return confirm('Do you want to delete this record?')" href=<?php echo"'index.php?deleteid=".$id."' class='text-light remove'><img src='trash.svg'></a></button>
    </td>

   </tr>";
  }?>

 </body> 
 