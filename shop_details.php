
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
    <title>Shop <Details></Details></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
     <?php include 'css/style.css'; ?>
   </style>
</head>

<body >

<button class="btn btn-info my-2" ><a href="new_shop.php" class="text-light" >+ Add new shop</a></button><br>
    <h1>List of shop</h1>
<table class="table table-striped mt-5 mx-5 table-hover border-danger w-75">
  <tr>
        <th>id</th>
        <th>Name</th>
        <th> Phone</th>
        <th>Location</th>
        <th>Seller Name</th>
        <th>Action</th>

  </tr>
<?php 

   // delete shop
   if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    mysqli_query($conn, "DELETE FROM shop_details   WHERE id=".$id);
    header('location: shop_details.php');
}

 $sql = "SELECT * FROM users  JOIN shop_details ON users.id = shop_details.seller_id; ";
//  $sql = "SELECT * FROM shop_details  ";
 $result = mysqli_query($conn, $sql);

 while ($row=$result->fetch_assoc()){
    $id=$row["id"];
     echo" <tr>
    <td>".$row["id"] ."</td>" ?>
    <?php echo" 
    <td>".$row["shop_name"] ."</td>
    <td>".$row["shop_phone"]."</td>
    <td>".$row["shop_location"]."</td>
    <td>".$row["name"]."</td>
    <td>
    <button class='btn btn-warning'><a href='view_shop.php?veiwid=".$id."' class='text-light'><img src='eye.svg'></a></button>
    <button class='btn btn-info'><a href='update_shop.php?updateid=".$id."' class='text-light'><img src='pen.svg'></a></button>"?>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
<img src='trash.svg'>
</button>
</td>
    
    </tr>
   
   <?php }
?>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Shop</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"><a  href=<?php echo"'shop_details.php?deleteid=".$id."'"?> class='text-light remove'>Delete</a></button>
      </div>
    </div>
  </div>
</div>