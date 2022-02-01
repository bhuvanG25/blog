<?php
include 'database.php';
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
            <?php
            if (isset($_REQUEST['editSubCategory'])) {
              if ($_REQUEST['editSubCategory'] == "success") {
                echo "<div class='alert alert-success'>
                        <strong>Success!</strong> Changes in SubCategory is saved.
                      </div>";
              } elseif ($_REQUEST['editSubCategory'] == "error") {
                echo "<div class='alert alert-danger'>
                        <strong>Error!</strong> Changes in SubCategory is not saved.
                      </div>";
              }
            } elseif (isset($_REQUEST['deleteSubCategory'])) {
              if ($_REQUEST['deleteSubCategory'] == "success") {
                echo "<div class='alert alert-success'>
                        <strong>Success!</strong> Subcategory Deleted.
                      </div>";
              } elseif ($_REQUEST['deleteSubCategory'] == "error") {
                echo "<div class='alert alert-danger'>
                        <strong>Error!</strong> SubCategory not Deleted.
                      </div>";
              }
            }
            ?>
            <h4 class="card-title">Manage News SubCategory</h4>
            <hr>
            <p class="card-description">
            <div class="row" style="margin-left: 0%;">
              <a type="submit" href="sub-category.php" class="btn btn-success mr-2">Add <i class="fas fa-plus-circle"></i></a>
            </div>
            </p>
            <div style="overflow-x:auto;">
              <table class="table table-bordered">
                <thead class="" style="background: #7da0fa;">
                  <tr>
                    <th>SubCategory ID</th>
                    <th>Category ID</th>
                    <th>Meta Title</th>
                    <th>Sub Category</th>
                    <th>SubCategory Description</th>
                    <th>SubCategory Image</th>
                    <th>AddedDate</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody style="font-family: cursive;">
                  <?php
                  $query = mysqli_query($conn, "SELECT * FROM tbl_subcategory");
                  while ($row = mysqli_fetch_array($query)) {
                    $subCatId = $row['sid'];
                  ?>
                    <tr>
                      <th scope="row"><?php echo $row['sid']; ?></th>
                      <td><?php echo htmlentities($row['cid']); ?></td>
                      <td><?php echo htmlentities($row['metaTitle']); ?></td>
                      <td><?php echo htmlentities($row['sub_category']); ?></td>
                      <td><textarea cols="30" rows="4"><?php echo htmlentities($row['subCategory_desc']); ?></textarea></td>
                      <td><img src="<?php echo $row['subCatImg']; ?>"></td>
                      <td><?php echo htmlentities($row['subcatAddedDate']); ?></td>
                      <td><a class="btn btn-primary" href="subcategory-edit.php?id=<?php echo $row['sid']; ?>"><span><i class="fas fa-edit"></i></span></a>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $row['sid']; ?>"><span><i class="fas fa-trash-alt"></i></span></button>
                      </td>
                     
                      <div class="modal fade" id="delete<?php echo $row['sid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <form action="subcategory-delete.php" method="POST">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Delete SubCategory</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <input type="hidden" name="sid" value="<?php echo $row['sid']; ?>">
                                <p>Are you sure you want to delete this SubCategory ?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="delete">Delete SubCategory</button>
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