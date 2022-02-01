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
            <div id="success"></div>
            <h4 class="card-title">Manage Post</h4>
            <hr>
            <p class="card-description">
            <div class="row" style="margin-left: 0%;">
              <a type="submit" href="post.php" class="btn btn-success mr-2">Add <i class="fas fa-plus-circle"></i></a>

            </div>
            </p>
            <div style="overflow-x:auto;">


              <table class="table table-bordered">
                <thead class="" style="background:#7da0fa;">
                  <tr>
                    <th>Post ID</th>
                    <th>Category ID</th>
                    <th>SubCategory ID</th>
                    <th>Meta Title</th>
                    <th>Blog Title</th>
                    <th>Blog Summary</th>
                    <th>Blog Content</th>
                    <th>Main Image</th>
                    <th>Alternate Image</th>
                    <th>Alternate Image</th>
                    <th>Blog Tags</th>
                    <th>Posted By</th>
                    <th>AddedDate</th>
                    <th>UpdateDate</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody style="font-family: cursive;">
                  <?php
                  $query = mysqli_query($conn, "SELECT * FROM tbl_post ORDER BY postAddedDate DESC");
                  while ($row = mysqli_fetch_array($query)) {
                    $postCat = $row['cid'];
                  ?>
                    <tr>
                      <th scope="row"><?php echo htmlentities($row['pid']); ?></th>
                      <td scope="row"><?php echo htmlentities($row['cid']); ?></td>
                      <td scope="row"><?php echo htmlentities($row['sid']); ?></td>
                      <td><?php echo htmlentities($row['metaTitle']); ?></td>
                      <td><?php echo htmlentities($row['blogTitle']); ?></td>
                      <td><textarea cols="30" rows="4"><?php echo htmlentities($row['blogSummary']); ?></textarea></td>
                      <td><textarea cols="30" rows="4"><?php echo htmlentities($row['blogContent']); ?></textarea></td>
                      <td><img src="<?php echo htmlentities($row['mainImg']); ?>" width="100px" height="100px"></td>
                      <td><img src="<?php echo htmlentities($row['altImg1']); ?>" width="100px" height="100px"></td>
                      <td><img src="<?php echo htmlentities($row['altImg2']); ?>" width="100px" height="100px"></td>
                      <td><?php echo htmlentities($row['blogTags']); ?></td>
                      <td><?php echo htmlentities($row['admin']); ?></td>
                      <td><?php echo htmlentities($row['postAddedDate']); ?></td>
                      <td><?php echo htmlentities($row['postUpdateDate']); ?></td>
                      <td><a href="post-edit.php?id=<?php echo $row['pid']; ?>" class="btn btn-primary"><span><i class="fas fa-edit"></i></span></a>
                        <button class="btn btn-danger " data-toggle="modal" data-target="#delete<?php echo $row['pid'] ?>"><span><i class="fas fa-trash-alt"></i></span></button></td>
                      <div class="modal fade" id="delete<?php echo $row['pid']; ?>" tabindex="-1"     role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <form action="post-delete.php" method="POST">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
                                <p>Are you sure that you want to delete this category ?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="delete">Delete Post</button>
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


</body>

</html>