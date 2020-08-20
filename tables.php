<?php
session_start();
require_once ('config.php');
require_once ('header.php');

?>
<script type="text/javascript">
  $(document).ready(function(){

    fetch_data();

    function fetch_data(){
      $.ajax({
              url:"product_fetch.php",
              method:"post",
              success:function(data){
                    $('#products_item').html(data);
                  }
            });
    }

    $(document).on('click', '#add', function(){
      var id = $(this).data("id");
      $.ajax({
        url:"product_add.php",
        method:"post",
        data:{id:id},
        success:function(data){
          fetch_data();
        }
      });
    });

  });
</script>


    <div class="container">
      <div class="row">
        <?php
          $get_data = mysqli_query($conn, "SELECT * FROM tables");
        while($row = mysqli_fetch_assoc($get_data)){
        ?>
        <div class="col-md-3 text-center">
          <div class="card">
            <div class="card-header bg-primary text-white">
              <?php echo $row['table_name'] ?>
            </div>
            <div class="card-footer">
              <a href="tables.php" class="btn btn-info" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $row['table_name'] ?>">New Voucher</a>
            </div>
          </div>
        </div>
        <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $row['table_name'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Ordering System / <?php echo $row['table_name'] ?></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-5">

            <input type="search" class="form-control col-md-4" placeholder="Search Filter" autocomplete="off" id="myInput" onkeyup="myFunction()" />
              <br>

             <div class="" id="products_item">
               <script>
                     $(document).ready(function(){
                     $("#myInput").on("keyup", function() {
                     var value = $(this).val().toLowerCase();
                     $(".table tr").filter(function() {
                     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                       });
                           });
                             });
               </script>
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
             </div>
          </div>


          <div class="col-md-7">
            <table class="table table-striped" style="font-size: 12px;">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Qty</th>
                  <th>Unit Price</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

        <?php
      }
         ?>
      </div><!-- row end -->
    </div><!-- container end -->
