<?php
include 'database.php';
?>
<?php

if (isset($_REQUEST['update'])) {
  
  $postId = $_POST['pid'];
  $category = $_POST['category'];
  $subCategory = $_POST['sub_category'];
  $metaTitle = addslashes($_POST['metaTitle']);
  $blogTitle = addslashes($_POST['blogTitle']);
  $blogSummary = addslashes($_POST['blogSummary']);
  $blogContent = addslashes($_POST['blogContent']);
  $blogTags = addslashes($_POST['blogTags']);
  $admin = addslashes($_POST['admin']);

  $sql = "UPDATE tbl_post SET cid = '$category', sid = '$subCategory', metaTitle = '$metaTitle', blogTitle = '$blogTitle', blogSummary = '$blogSummary', blogContent = '$blogContent', ";

  $mainImageUrl = "";
  if (isset($_FILES['mainImg']['name'])) {
    $mainImageUrl = editImage($_FILES['mainImg']['name'], "mainImg", "main");
  }
  $altImg1Url = "";
  if (isset($_FILES['altImg1']['name'])) {
    $altImg1Url = editImage($_FILES['altImg1']['name'], "altImg1", "alt1");
  }
  $altImgUrl2 = "";
  if (isset($_FILES['altImg2']['name'])) {
    $altImgUrl2 = editImage($_FILES['altImg2']['name'], "altImg2", "alt2");
  }

  if (!empty($mainImageUrl)) {
    $sql = $sql . " mainImg = '$mainImageUrl',";
  }

  if (!empty($mainImageUrl)) {
    $sql = $sql . " altImg1 = '$altImg1Url',";
  }

  if (!empty($mainImageUrl)) {
    $sql = $sql . " altImg2 = '$altImgUrl2',";
  }

  $sql = $sql . "blogTags = '$blogTags', admin = '$admin' WHERE pid='$postId'";
  //  echo $sql; die;

  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  // echo $query;die;
  if ($query) {
    header("location: manage-post.php?editPost=success");
    exit();
  } else {
    header("location:post-edit.php?editPost=error&pid=$PostID");
    exit();
  }
} 



/* function formError($errorCode){
      header("location:manage-post.php?editBlog=".$errorCode);
      exit();
  } */

function editImage($img, $imgName, $imgType)
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

    $folder = "blogImages/";
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
            $postID = 0;
            if(isset($_GET['id']))
            {
              $postID = intval($_GET['id']);
            }
            
            $query2 = mysqli_query($conn, "SELECT * FROM tbl_post WHERE pid=$postID");
          //echo "<pre>"; print_r(mysqli_fetch_all($query2)); echo "</pre>"; die;
            $cnt = 1;
            while($row2 = mysqli_fetch_array($query2))
            {
          ?>

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <?php
            if (isset($_REQUEST['addPost'])) {
              if ($_REQUEST['addPost'] == "success") {
                echo "<div class='alert alert-success'>
                          <strong>Success!</strong>Post Added SuccesFully.
                        </div>";
              } elseif ($_REQUEST['addPost'] == "error") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>Post not Added.
                        </div>";
              }
            }
            ?>
            <h4 class="card-title">Edit Blog</h4>
            <hr>
            <p class="card-description">

            </p>
            <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
              <input type="hidden" name="pid" id="pid" value="<?php echo $row2['pid']; ?>">
              <input type="hidden" name="mainImg" value="<?php echo $row2['mainImg']; ?>">
              <input type="hidden" name="altImg1" value="<?php echo $row2['altImg1']; ?>">
              <input type="hidden" name="altImg2" value="<?php echo $row2['altImg2']; ?>">
              <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="cat" name="category">
                  <option>Select Category</option>
                  <?php

                  $records = mysqli_query($conn, "SELECT * From tbl_category");  // Use select query here 
                  $category1 = $row2['cid'];
                  while ($data = mysqli_fetch_array($records)) {
                    $cid2 = $data['cid'];
                    $sel = "";
                    if($category1==$cid2)
                    {
                       $sel = "selected";  
                    }
                    echo "<option value='" . $data['cid'] . "' $sel>" . $data['category'] . "</option>";  // displaying data in option menu
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="sub_category">Sub Category</label>
                <select class="form-control" id="subcat" name="sub_category">
                  <option value="" disabled selected>Select Sub Category</option>

                </select>
              </div>
              <div class="form-group">
                <label>Meta Title</label>
                <input type="text" class="form-control" name="metaTitle" value="<?php echo $row2['metaTitle']; ?>">
              </div>
              <div class="form-group">
                <label>Blog Title</label>
                <input type="text" class="form-control" name="blogTitle" value="<?php echo $row2['blogTitle']; ?>">
              </div>
              <div class="form-group">
                <label>Blog Summary</label>
                <textarea class="form-control" name="blogSummary"><?php echo $row2['blogSummary']; ?></textarea>
              </div>
              <div class="form-group">
                <label>Blog Content</label>
                <textarea class="form-control" id="summernoteEdit" name="blogContent" rows="10"> <?php echo htmlentities($row2['blogContent']); ?></textarea>
              </div>
              <div class="form-group">
                <label>Main Image</label>
                <div class="card-box">
                  <input type="file" class="form-control" name="mainImg" value="<?php echo $row2['mainImg']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label>Alternative Image (1)</label>
                <div class="card-box">
                  <input type="file" class="form-control" name="altImg1" value="<?php echo $row2['altImg1']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label>Alternative Image (2)</label>
                <div class="card-box">
                  <input type="file" class="form-control" name="altImg2" value="<?php echo $row2['altImg2']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label>Blog Tags</label>
                <input type="text" class="form-control" name="blogTags" value="<?php echo $row2['blogTags']; ?>">
              </div>
              <div class="form-group">
                <label>Posted By</label>
                <input type="text" class="form-control" name="admin" value="<?php echo $row2['admin']; ?>">
              </div>
              <button type="submit" class="btn btn-primary mr-2" name="update">Edit Post</button>
              <!-- <button class="btn btn-light">Cancel</button> -->
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
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
<script>
  $(document).ready(function() {
    $("#summernoteEdit").summernote();
  });
</script>
<!-- //Summernote JS - CDN Link -->

<script>
  $(document).ready(function() {
    var pId = $("#pid").val();
    getSubId(pId);
    
    $("#cat").change(function() {
      getSubId(0);
    });
  });

  function getSubId(pId)
  {
      var catId = $("#cat").val();

      $.ajax({
        url: "action.php",
        method: "POST",
        data: {
          categoryId: catId,
          pId:pId,
        },
        success: function(data) {
          $("#subcat").html(data);
        }
      });
  }
</script>

</body>

</html>