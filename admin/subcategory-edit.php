<?php
include 'database.php';

if (isset($_REQUEST['update'])) {
  $subcategoryId = $_POST['sid'];
  $categoryName = $_POST['category'];
  $metaTitle = $_POST['metaTitle'];
  $subCategory = addslashes($_POST['sub_category']);
  $description = addslashes($_POST['subCategory_desc']);
  $sql = "UPDATE tbl_subcategory SET cid = '$categoryName', metaTitle = '$metaTitle', sub_category = '$subCategory', subCategory_desc = '$description'";

  $subCatImageUrl = "";
  if (isset($_FILES['subCatImg']['name'])) {
    $subCatImageUrl = subCatEditImg($_FILES['subCatImg']['name'], "subCat", "cat");
  }

  if (!empty($subCatImageUrl)) {
    $sql = $sql . " subCatImg = '$subCatImageUrl'";
  }

  $sql = $sql . " WHERE sid='$subcategoryId'";
  // echo $sql; die;

  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  // echo $query;die;
  if ($query) {
    header("location: manage-subcategory.php?editsubCategory=success");
    exit();
  } else {
    header("location:subcategory-edit.php?editCategory=error&sid=$subcategoryId");
    exit();
  }
}
function subCatEditImg($img, $imgName, $imgType)
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

    $folder = "subCatImages/";
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
    $subCatId = 0;
    if (isset($_GET['id'])) {
      $subCatId = intval($_GET['id']);
    }

    $query2 = mysqli_query($conn, "SELECT * FROM tbl_subcategory WHERE sid=$subCatId");
    //echo "<pre>"; print_r(mysqli_fetch_all($query2)); echo "</pre>"; die;
    $cnt = 1;
    while ($row2 = mysqli_fetch_array($query2)) {
    ?>

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
              <h4 class="card-title">Edit SubCategory</h4>
              <hr>
              <p class="card-description">

              </p>

              <form id="form" class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                <input type="hidden" name="sid" value="<?php echo $row2['sid']; ?>">
                <input type="hidden" name="subCatImg" value="<?php echo $row2['subCatImg']; ?>">
                <div class="form-group">

                  <label for="category">Category</label>
                  <select class="form-control" id="category1" name="category">
                    <option>Select Category</option>
                    <?php

                    $records = mysqli_query($conn, "SELECT * From tbl_category");  // Use select query here 
                    $category1 = $row2['cid'];
                    while ($data = mysqli_fetch_array($records)) {
                      $cid2 = $data['cid'];
                      $sel = "";
                      if ($category1 == $cid2) {
                        $sel = "selected";
                      }
                      echo "<option value='" . $data['cid'] . "' $sel>" . $data['category'] . "</option>";  // displaying data in option menu
                    }
                    ?>

                  </select>
                </div>
                <div class="form-group">
                  <label>Meta Title</label>
                  <input type="text" class="form-control" name="metaTitle" value="<?php echo $row2['metaTitle']; ?>">
                </div>
                <div class="form-group">
                  <label>Sub Category</label>
                  <input type="text" class="form-control" name="sub_category" value="<?php echo $row2['sub_category']; ?>">
                </div>
                <div class="form-group">
                  <label>SubCategory Description</label>
                  <textarea class="form-control" name="subCategory_desc"><?php echo $row2['subCategory_desc']; ?></textarea>
                </div>
                <div class="form-group">
                  <label>Change SubCategory Image</label>
                  <div class="card-box">
                    <input type="file" class="form-control" name="subCatImg" value="<?php echo $row2['subCatImg']; ?>">
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