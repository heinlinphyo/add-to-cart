<?php
require_once ('config.php');

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $price =$_POST['price'];
  $remark = $_POST['remark'];
  $category_id = 1;

  $insert=mysqli_query($conn, "INSERT INTO products(category_id, product_name, price, remark)VALUES('$category_id', '$name', '$price', '$remark')");
}



 ?>
