<?php

require_once "config.php";

$output="";
$sql = mysqli_query($conn, "SELECT * FROM products ");

$output .= '<table class="table table-bordered table-striped table-hover" style="font-size:12px;">';

while($row_p = mysqli_fetch_array($sql)){

  $output .='<tr>';
    $output .='<td class="align-middle"> '.$row_p["product_name"].' </td>';
    $output .='<td class="text-center align-middle" > <input type="button" name="add" class="btn btn-primary btn-sm" id="add" data-id="'.$row_p["id"].'" value="+"/> </td>';
  $output .='</tr>';

}

$output .= '</table>';

echo $output;
 ?>
