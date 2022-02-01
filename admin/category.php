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
            if (isset($_REQUEST['addCategory'])) {
              if ($_REQUEST['addCategory'] == "success") {
                echo "<div class='alert alert-success'>
                        <strong>Success!</strong> Category Added Succesfully.
                      </div>";
              } elseif ($_REQUEST['addCategory'] == "error") {
                echo "<div class='alert alert-danger'>
                        <strong>Error!</strong> Category Failed to Added.
                      </div>";
              } elseif ($_REQUEST['addCategory'] == "moreThanLIMT") {
                echo "<div class='alert alert-danger'>
                        <strong>Error!</strong> File is More than 5MB.
                      </div>";
              }
            }
            ?>
            <h4 class="card-title">Add Travel Blog Category</h4>
            <hr>
            <p class="card-description">

            </p>
            <form id="form" class="forms-sample" method="POST" action="category-insert.php" enctype="multipart/form-data">

              <div class="form-group">
                <label for="category">Category Name</label>
                <input type="text" class="form-control" id="category1" name="category" placeholder="Category">
              </div>
              <div class="form-group">
                <label for="category">Meta Title</label>
                <input type="text" class="form-control" id="metaTitle" name="metaTitle" placeholder="Meta Title">
              </div>
              <div class="form-group">
                <label for="description">Category Description <span style="font-weight: bold; color:red">*(Only 22 Words Allowed)</span></label>
                <textarea class="form-control" id="description" oninput="wordCount()" name="category_desc" placeholder="Category Description" rows="4"></textarea>

                <span id="count">0</span> words
              </div>
              <div class="form-group">
                <label>Category Image</label>
                <div class="card-box">
                  <input type="file" class="form-control" id="catImg" name="catImg">
                </div>
              </div>
              <button type="submit" class="btn btn-primary mr-2" name="addCategory-btn">Submit</button>
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