<?php
require_once ('config.php');

$p_id = $_POST['id'];
// manual //
$p_qty = 1;

// get product detail //
$get_product=mysqli_query($conn, "SELECT * FROM products WHERE id='$p_id'");
$row_p=mysqli_fetch_assoc($get_product);
$p_name=$row_p['product_name'];
$p_price=$row_p['price'];
// one product price //
$sub_total = $p_price * $p_qty;

//  find data in orders table //
$qual_product=mysqli_query($conn, "SELECT * FROM orders WHERE p_id='$p_id' and status='' ");
$row_equal=mysqli_fetch_assoc($qual_product);
$p_name2=$row_equal['p_name'];
$qty = $row_equal['p_qty'];
//update product qty //
$p_qty_update=$qty + $p_qty;
// update sub total amount //
$sub_total_update=$p_price * $p_qty_update;

if($p_name==$p_name2){
  $update_product=mysqli_query($conn,"UPDATE orders SET p_qty='$p_qty_update', sub_total='$sub_total_update' WHERE p_id='$p_id' and status='' ");
}else{
$sql=mysqli_query($conn, "INSERT INTO orders(v_id, tb_id, p_id, p_name, p_price, p_qty, sub_total, status)VALUES('', '', '$p_id', '$p_name', '$p_price', '$p_qty', '$sub_total' , '')");
}
 ?>
