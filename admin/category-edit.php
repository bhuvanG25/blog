<?php
include 'database.php';

if (isset($_REQUEST['update'])) {
  $categoryId = $_POST['cid'];
  $category = addslashes($_POST['category']);
  $metaTitle = addslashes($_POST['metaTitle']);
  $description = addslashes($_POST['category_desc']);
  
  $sql = "UPDATE tbl_category SET category = '$category', metaTitle = '$metaTitle', category_desc = '$description'"; 

  $catImageUrl = "";
  if (isset($_FILES['catImg']['name'])) {
    $catImageUrl = catEditImg($_FILES['catImg']['name'], "catImg", "cat");
  }

  if (!empty($catImageUrl)) {
    $sql = $sql . " catImg = '$catImageUrl'";
  }

  $sql = $sql . " WHERE cid='$categoryId'";
  // echo $sql; die;

  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  // echo $query;die;
  if ($query) {
    header("location: manage-categories.php?editCategory=success");
    exit();
  } else {
    header("location:category-edit.php?editCategory=error&cid=$categoryId");
    exit();
  }
}
function catEditImg($img, $imgName, $imgType)
{
  $imgUrl = "";

  $validExt = array("jpg", "jpeg", "png", "gif", "jif", "webp");

  if ($img == "") {
    // formError("empty".$imgType."image");
  } elseif ($_FILES[$imgName]['size'] <= 0) {
    // formError($imgType."imageerror");
  } else {
    $ext = strtolower(end(explode(".", $img)));
    if (!in_array($ext, $validExt)) {
      // formError("invalidType".$imgType."image");
    }

    $folder = "categoryImages/";
    $imgnewName = rand(10000, 990000) . '_' . time() . '.' . $ext;
    $imgPath = $folder . $imgnewName;

    if (move_uploaded_file($_FILES[$imgName]['tmp_name'], $imgPath)) {
      $imgUrl = $imgPath;
    } else {
      // formError("erroruploading".$imgType."image");
    }
  }
  return $imgUrl;
}
?>
<?php

include 'include/header.php';
?>
<?php
include 'include/sidebar.php';
?>
<div class="main-panel">
  <div class="content-wrapper">

    <?php
    $categoryID = 0;
    if (isset($_GET['id'])) {
      $categoryID = intval($_GET['id']);
    }

    $query2 = mysqli_query($conn, "SELECT * FROM tbl_category WHERE cid=$categoryID");
    //echo "<pre>"; print_r(mysqli_fetch_all($query2)); echo "</pre>"; die;
    $cnt = 1;
    while ($row2 = mysqli_fetch_array($query2)) {
    ?>

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
              <h4 class="card-title">Edit Category</h4>
              <hr>
              <p class="card-description">

              </p>
              <form id="form" class="forms-sample" method="POST" action="" enctype="multipart/form-data">

                <input type="hidden" name="cid" value="<?php echo $row2['cid']; ?>">
                <input type="hidden" name="catImg" value="<?php echo $row2['catImg']; ?>">
                <div class="form-group">
                  <label>Category Name</label>
                  <input type="text" class="form-control" name="category" value="<?php echo $row2['category']; ?>">
                </div>
                <div class="form-group">
                  <label>Meta Title</label>
                  <input type="text" class="form-control" name="metaTitle" value="<?php echo $row2['metaTitle']; ?>">
                </div>
                <div class="form-group">
                  <label>Category Description <span style="font-weight: bold; color:red">*(Only 22 Words Allowed)</span></label>
                  <textarea class="form-control" oninput="editDescription()" id="editDescription" name="category_desc" placeholder="Category Description" rows="4"><?php echo $row2['category_desc']; ?></textarea>

                  <span id="editCount">0</span> words
                </div>
                <div class="form-group">
                  <label>Change Category Image</label>
                  <div class="card-box">
                    <input type="file" class="form-control" name="catImg" value="<?php echo $row2['catImg']; ?>">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2" name="update">Submit</button>
                <!-- <button class="btn btn-light">Cancel</button> -->
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<!-- Summernote JS - CDN Link -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


</body>

</html>