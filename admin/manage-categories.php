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
            <?php
            if (isset($_REQUEST['editCategory'])) {
              if ($_REQUEST['editCategory'] == "success") {
                echo "<div class='alert alert-success' id='editCat'>
                        <strong>Success!</strong>Changes in Category Succesfully.
                      </div>";
              } elseif ($_REQUEST['editCategory'] == "error") {
                echo "<div class='alert alert-danger' id='editCat2'>
                          <strong>Error!</strong>Changes in Category Getting Error.
                        </div>";
              }
            } elseif (isset($_REQUEST['deleteCategory'])) {
              if ($_REQUEST['deleteCategory'] == "success") {
                echo "<div class='alert alert-success'>
                          <strong>Success!</strong>Category Deleted Succesfully.
                        </div>";
              } elseif ($_REQUEST['deleteCategory'] == "error") {
                echo "<div class='alert alert-danger'>
                            <strong>Error!</strong>Category not Deleted.
                          </div>";
              } elseif ($_REQUEST['editCategory'] == "CategoryFieldEmpty") {
                echo "<div class='alert alert-danger'>
                  <strong>Error!</strong> Please Fill Category Field;
                </div>";
              }
            }
            ?>
            <h4 class="card-title">Manage News Category</h4>
            <hr>
            <p class="card-description">
            <div class="row" style="margin-left: 0%;">
              <a type="submit" href="category.php" class="btn btn-success mr-2">Add <i class="fas fa-plus-circle"></i></a>

            </div>
            </p>
            <div style="overflow-x: auto;">
              <table class="table table-bordered">
                <thead class="" style="background: #7da0fa;">
                  <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Meta Title</th>
                    <th>Category Description</th>
                    <th>Category Image</th>
                    <th>AddedDate</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody style="font-family: cursive;">
                  <?php
                  $query = mysqli_query($conn, "SELECT * FROM tbl_category");
                  while ($row = mysqli_fetch_array($query)) {

                  ?>
                    <tr>
                      <th scope="row"><?php echo $row['cid']; ?></th>
                      <td><?php echo htmlentities($row['category']); ?></td>
                      <td><?php echo htmlentities($row['metaTitle']); ?></td>
                      <td><textarea cols="30" rows="4"><?php echo htmlentities($row['category_desc']); ?></textarea></td>
                      <td><img src="<?php echo $row['catImg']; ?>"></td>
                      <td><?php echo htmlentities($row['catAddedDate']); ?></td>
                      <td><a href="category-edit.php?id=<?php echo $row['cid']; ?>" class="btn btn-primary"><span><i class="fas fa-edit"></i></span></a>
                        <button class="btn btn-danger " data-toggle="modal" data-target="#delete<?php echo $row['cid'] ?>"><span><i class="fas fa-trash-alt"></i></span></button>
                      </td>
                     
                      <div class="modal fade" id="delete<?php echo $row['cid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <form action="category-delete.php" method="POST">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <input type="hidden" name="cid" value="<?php echo $row['cid']; ?>">
                                <p>Are you sure that you want to delete this category ?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="delete">Delete Category</button>
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