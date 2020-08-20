<?php
  require_once ('config.php');
  require_once ('header.php');
 ?>


    <ul>
      <?php
        $get_data_category=mysqli_query($conn, "SELECT * FROM categories");
        while($row=mysqli_fetch_assoc($get_data_category)){
       ?>
      <li> <a href="#"><?php echo $row['category_name'] ?></a> </li>

          <?php
        }
           ?>
    </ul>

    <div class="container">
      <div class="row">
        <div class="col-lg-10">
          <table class="table table-bordered text-center">
            <h4 class="">{{ Here Table Number Order Lists }}</h4>
            <thead>
                <tr>
                  <th>No</td>
                  <th>Name</td>
                  <th>Qty</td>
                  <th>Order</td>
                  <th>Action</td>
                </tr>

              <tbody>
                <?php
                 $no=1;
                 $get_data_product=mysqli_query($conn, "SELECT * FROM products WHERE category_id='1'");
                 while($row=mysqli_fetch_assoc($get_data_product)){
                 $row_no=mysqli_num_rows($get_data_product);
                 ?>
                <tr>
                  <td><?php $no<$row_no; echo $no++; ?></td>
                   <td><?php echo $row['product_name'] ?></td>
                   <td> <input type="number" name="qty" =""> </td>
                   <td> <select class="" name="">
                     <option value="">Select Table</option>
                     <option value="">Table 1</option>
                     <option value="">Table 2</option>
                   </select> </td>
                   <td> <a href="#" class="btn btn-warning"> Add </a> </td>
                </tr>
                <?php
              }
                 ?>
              </tbody>
            </thead>
          </table>
        </div>
      </div>
    </div>

    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <a href="products.php"> Testing</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
