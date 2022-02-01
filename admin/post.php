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
              elseif ($_REQUEST['addPost'] == "SelectCategory") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>Please Select Category First.
                        </div>";
              }
              elseif ($_REQUEST['addPost'] == "SelectSubCategory") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>Please Select SubCategory First.
                        </div>";
              }
              elseif ($_REQUEST['addPost'] == "emptyMetaTitle") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>Please add Meta Title.
                        </div>";
              }
              elseif ($_REQUEST['addPost'] == "emptyBlogTitle") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>Please add Blog Title.
                        </div>";
              }
              elseif ($_REQUEST['addPost'] == "emptyBlogSummary") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>Please add Blog Summary.
                        </div>";
              }
              elseif ($_REQUEST['addPost'] == "emptyBlogContent") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>Please add Blog Content.
                        </div>";
              }
              elseif ($_REQUEST['addPost'] == "emptyBlogTags") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>Please add Blog Tags.
                        </div>";
              }
              elseif ($_REQUEST['addPost'] == "SQLError") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>Please Try Again.
                        </div>";
              }
              elseif ($_REQUEST['addPost'] == "emptymainimage") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>Please Upload a main Image.
                        </div>";
              }
              elseif ($_REQUEST['addPost'] == "emptyalt1image") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>Please Upload Alternate Image.
                        </div>";
              }
              elseif ($_REQUEST['addPost'] == "emptyalt2image") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>Please Upload Alternate Image.
                        </div>";
              }
              elseif ($_REQUEST['addPost'] == "mainimageerror") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>Please Upload Another Main Image.
                        </div>";
              }
              elseif ($_REQUEST['addPost'] == "alt1imageerror") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>Please Upload Another Alternate Image.
                        </div>";
              }
              elseif ($_REQUEST['addPost'] == "alt2imageerror") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>Please Upload Another Alternate Image.
                        </div>";
              }
              elseif ($_REQUEST['addPost'] == "invalidtypemainimage") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>Main Image -> Upload only jpg, jpeg, png, gif, jif.
                        </div>";
              }
              elseif ($_REQUEST['addPost'] == "invalidtypealt1image") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>Alternate Image -> Upload only jpg, jpeg, png, gif, jif.
                        </div>";
              }
              elseif ($_REQUEST['addPost'] == "invalidtypealt2image") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>Alternate Image -> Upload only jpg, jpeg, png, gif, jif.
                        </div>";
              }
              elseif ($_REQUEST['addPost'] == "erroruploadingmainimage") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>Main Image -> There was an error while uploading. Please try again later.
                        </div>";
              }
              elseif ($_REQUEST['addPost'] == "erroruploadingalt1image") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>Alternate Image -> There was an error while uploading. Please try again later.
                        </div>";
              }
              elseif ($_REQUEST['addPost'] == "erroruploadingalt2image") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>Alternate Image -> There was an error while uploading. Please try again later.
                        </div>";
              }
              elseif ($_REQUEST['addPost'] == "TitlebeinUsed") {
                echo "<div class='alert alert-danger'>
                          <strong>Error!</strong>The Title is being used in another blog. Try picking a different title.
                        </div>";
              }
            }
            ?>
            <h4 class="card-title">Add Post</h4>
            <hr>
            <p class="card-description">

            </p>
            <form class="forms-sample" method="POST" action="post-insert.php" enctype="multipart/form-data" onsubmit="return validateImg();">
              <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="cat" name="category">
                  <option>Select Category</option>
                  <?php

                  $records = mysqli_query($conn, "SELECT * From tbl_category");  // Use select query here 

                  while ($data = mysqli_fetch_array($records)) {
                    echo "<option value='" . $data['cid'] . "'>" . $data['category'] . "</option>";  // displaying data in option menu
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
                <label for="title">Meta Title</label>
                <input type="text" class="form-control" id="metatitle" name="metaTitle" placeholder="Meta Title">
              </div>
              <div class="form-group">
                <label for="title">Blog Title</label>
                <input type="text" class="form-control" id="blogtitle" name="blogTitle" placeholder="Blog Title">
              </div>
              <div class="form-group">
                <label>Blog Summary</label>
                <textarea class="form-control" id="summary" placeholder="Blog Summary" name="blogSummary" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="description">Blog Content</label>
                <textarea class="form-control" id="summernote" name="blogContent" rows="30"></textarea>
              </div>
              <div class="form-group">
                <label>Main Image</label>
                <div class="card-box">
                  <input type="file" class="form-control" id="mainImg" name="mainImg">
                </div>
              </div>
              <div class="form-group">
                <label>Alternate Image (1)</label>
                <div class="card-box">
                  <input type="file" class="form-control" id="altImg1" name="altImg1">
                </div>
              </div>
              <div class="form-group">
                <label>Alternate Image (2)</label>
                <div class="card-box">
                  <input type="file" class="form-control" id="altImg2" name="altImg2">
                </div>
              </div>
              <div class="form-group">
                <label for="title">Blog Tags (Separated with comma)</label>
                <input type="text" class="form-control" id="" name="blogTags" placeholder="Blog Tags">
              </div>
          
              <div class="form-group">
                <label for="title">Posted By</label>
                <input type="text" class="form-control" id="" value="<?php echo $_SESSION['username']; ?>" name="admin" >
              </div>
              <button type="submit" class="btn btn-primary mr-2" name="add-post">Add Post</button>
              <!-- <button class="btn btn-light">Cancel</button> -->
            </form>
          </div>
        </div>
      </div>
    </div>
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
            $("#summernote").summernote();
        });
    </script>
    <!-- //Summernote JS - CDN Link -->

<script>
  $(document).ready(function() {
    $("#cat").change(function() {
      var catId = $(this).val();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: {
          categoryId: catId
        },
        success: function(data) {
          $("#subcat").html(data);
        }
      });
    });
  });
</script>
<script>
  function validateImg(){
    var main_image = $('#mainImg').val();
    var alt_img1 = $('#altImg1').val();
    var alt_img2 = $('#altImg2').val();

    var exts = ['jpg','png','jpeg','gif','jif'];

    var get_ext_main_img = main_image.split('.');
    var get_ext_alt_img1 = alt_img1.split('.');
    var get_ext_alt_img2 = alt_img2.split('.');

    get_ext_main_img = get_ext_main_img.reverse();
    get_ext_alt_img1 = get_ext_alt_img1.reverse();
    get_ext_alt_img2 = get_ext_alt_img2.reverse(); 

    main_img_check = false;
    alt_image1_check = false;
    alt_image2_check = false;

    if(main_image.length > 0 ){
      if($.inArray(get_ext_main_img[0].toLowerCase(),exts) >= -1){
        main_img_check = true;
      }
      else{
        alert("Error -> Main Image. Upload only jpg,jpeg,png,gif,jif");
        main_img_check = false;
      }
    }
    else{
      alert("Please upload a main Image");
      main_img_check = false;
    }
    if(alt_img1.length > 0 ){
      if($.inArray(get_ext_alt_img1[0].toLowerCase(),exts) >= -1){
        alt_image1_check = true;
      }
      else{
        alert("Error -> Alternate Image. Upload only jpg,jpeg,png,gif,jif");
        alt_image1_check = false;
      }
    }
    else{
      alert("Please upload a Alternate Image");
      alt_image1_check = false;
    }
    if(alt_img2.length > 0 ){
      if($.inArray(get_ext_alt_img2[0].toLowerCase(),exts) >= -1){
        alt_image2_check = true;
      }
      else{
        alert("Error -> Alternate Image. Upload only jpg,jpeg,png,gif,jif");
        alt_image2_check = false;
      }
    }
    else{
      alert("Please upload a Alternate Image");
      alt_image2_check = false;
    }

    if(main_img_check == true && alt_image1_check == true && alt_image2_check == true){
      return true;
    }
    else {
      return false;
    }

  }
</script>
</body>

</html>