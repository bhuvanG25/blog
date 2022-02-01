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
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card tale-bg">
          <div class="card-people mt-auto">
            <img src="images/dashboard/people.svg" alt="people">
            <div class="weather-info">
             
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 grid-margin transparent">
        <div class="row">
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM tbl_category");
                $result = mysqli_num_rows($query);
                ?>
                <p class="mb-4">CATEGORIES LISTED</p>
                <p class="fs-30 mb-2"><?php echo $result; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body">
                <?php
                $query2 = mysqli_query($conn, "SELECT * FROM tbl_subcategory");
                $result2 = mysqli_num_rows($query2);
                ?>
                <p class="mb-4">LISTED SUBCATEGORIES</p>
                <p class="fs-30 mb-2"><?php echo $result2; ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
              <div class="card-body">
                <?php
                $query3 = mysqli_query($conn, "SELECT * FROM tbl_post");
                $result3 = mysqli_num_rows($query3);
                ?>
                <p class="mb-4">LIVE POST</p>
                <p class="fs-30 mb-2"><?php echo $result3; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 stretch-card transparent">
            <div class="card card-light-danger">
              <div class="card-body">
              <?php
                $query4 = mysqli_query($conn, "SELECT * FROM tbl_register");
                $result4 = mysqli_num_rows($query4);
                ?>
                <p class="mb-4">ADMIN</p>
                <p class="fs-30 mb-2"><?php echo $result4; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.php -->
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