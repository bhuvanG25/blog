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
            if (isset($_REQUEST['addSubCategory'])) {
              if ($_REQUEST['addSubCategory'] == "success") {
                echo "<div class='alert alert-success'>
                        <strong>Success!</strong>SubCategory Added Succesfully.
                      </div>";
              } elseif ($_REQUEST['addSubCategory'] == "error") {
                echo "<div class='alert alert-danger'>
                        <strong>Error!</strong>SubCategory not Added.
                      </div>";
              }
            }
            ?>
            <h4 class="card-title">Add Travel Blog Sub Category</h4>
            <hr>
            <p class="card-description">

            </p>

            <form id="form" class="forms-sample" method="POST" action="sub_category-insert.php" enctype="multipart/form-data">

              <div class="form-group">

                <label for="category">Category</label>
                <select class="form-control" id="category1" name="category">
                  <option>Select Category</option>
                  <?php

                  $records = mysqli_query($conn, "SELECT * From tbl_category");  // Use select query here 

                  while ($data = mysqli_fetch_array($records)) {
                    echo "<option value='" . $data['cid'] . "'>" . $data['category'] . "</option>";  //// displaying data in option menu
                  }
                  ?>

                </select>
              </div>
              <div class="form-group">
                <label for="sub_category">Meta Title</label>
                <input type="text" id="metaTitle" class="form-control" name="metaTitle" placeholder="Meta Title">
              </div>
              <div class="form-group">
                <label for="sub_category">Sub Category</label>
                <input type="text" id="sub_category" class="form-control" name="sub_category" placeholder="Sub Category">
              </div>
              <div class="form-group">
                <label for="subCategory_desc">Sub Category Description</label>
                <textarea class="form-control" id="description" placeholder="Sub Category Description" name="subCategory_desc" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label>SubCategory Image</label>
                <div class="card-box">
                  <input type="file" class="form-control" id="subCatImg" name="subCatImg">
                </div>
              </div>
              <button type="submit" class="btn btn-primary mr-2" name="add-btn">Submit</button>
              <!-- <button class="btn btn-light">Cancel</button> -->
            </form>
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