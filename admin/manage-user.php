<?php
include 'database.php';

?>
<?php
include 'include/header.php';
?>
<?php
include 'include/sidebar.php';
?>
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            
            <h4 class="card-title">Manage Comments</h4>
            <hr>
            <p class="card-description">
            
            </p>
            <div style="overflow-x: auto;">
              <table class="table table-bordered">
                <thead class="" style="background: #7da0fa;">
                  <tr>
                    <th>Admin ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>status</th>
                    <td>Toggle</td>
                    <th>Admin Added Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody style="font-family: cursive;">
                  <?php
                  $query = mysqli_query($conn, "SELECT * FROM tbl_register");
                  $all_admin = mysqli_fetch_all($query,MYSQLI_ASSOC);

                  ?>
                  <?php foreach($all_admin as $row) { ?>
                    <tr>
                      <th scope="row"><?php echo $row['uid']; ?></th>
                      <td><?php echo $row['username']; ?></td>
                      <td><?php echo $row['email'];  ?></td>
                      <td><?php echo md5($row['password']);  ?></td>
                      <td><?php 
                            if($row['status'] == '1')
                            echo "Active";
                            else
                            echo "Inactive";
                      ?></td>
                      <td><?php
                             if($row['status']=="1") {
                                echo "<a href=userDeactivate.php?id=".$row['uid']." class='btn btn-danger'>Deactivate</a>"; 
                              }
                               else{ 
                                 echo "<a href=userActivate.php?id=".$row['uid']." class='btn btn-success'>Activate</a>";
                             }
                      ?></td>
                      <td><?php echo $row['useraddedDate']; ?></td>
                      <td>
                        <button class="btn btn-danger " data-toggle="modal" data-target="#delete<?php echo $row['uid'] ?>"><span><i class="fas fa-trash-alt"></i></span></button>
                      </td>
                     
                      <div class="modal fade" id="delete<?php echo $row['uid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <form action="comment-delete.php" method="POST">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Comment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <input type="hidden" name="comId" value="<?php echo $row['comId']; ?>">
                                <p>Are you sure that you want to delete this Comment ?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="delete">Delete Comment</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <?php
    include 'include/footer.php';
    ?>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="vendors/chart.js/Chart.min.js"></script>
<script src="vendors/datatables.net/jquery.dataTables.js"></script>
<script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="js/dataTables.select.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<script src="js/settings.js"></script>
<script src="js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<script src="js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<!-- Summernote JS - CDN Link -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

</body>

</html>