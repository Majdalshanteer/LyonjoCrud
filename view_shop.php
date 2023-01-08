<?php
include "./connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shops</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  
<style>
     <?php include 'css/style.css'; ?>
   </style>

</head>

<body>

<?php 

$id = $_GET['veiwid'];
$sql = "SELECT * FROM users  JOIN shop_details ON users.id = shop_details.seller_id; ";
  $result = mysqli_query($conn, $sql);

if($row=$result->fetch_assoc()){
$id=$row["id"];
?>

<div>
<div class="card">
<!-- <img class="imageStyle" text-center  src="<?php echo 'images/'. $row['image']; ?>" width='200' height='200'>  -->
  <div class="card-body">
    <h5 class="card-title">Shop Data</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo"id : " .$row["id"] ?></li>
    <li class="list-group-item"><?php echo"shop name : " .$row["shop_name"] ?></li>
    <li class="list-group-item"><?php echo"shop phone : " .$row["shop_phone"] ?></li>
    <li class="list-group-item"><?php echo"shop location : " .$row["shop_location"] ?></li>
    <li class="list-group-item"><?php echo"seller name : " .$row["name"] ?></li>
  </ul>
  <div class="card-body">
    <a href="shop_details.php" class="card-link">Back</a>
   
  </div>
</div>
</div>
<?php

}?>
