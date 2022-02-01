<footer class="footer-area section-gap">
  <div class="container">
    <?php
        $query = mysqli_query($conn, "SELECT * FROM tbl_subcategory LIMIT 4");
        
        
    ?>
    <div class="row">
      <div class="col-lg-4  col-md-12">
        <div class="single-footer-widget">
          <h6>Blog SubCategory</h6>
          <?php
            while($row = mysqli_fetch_array($query)){
              $subCatName = $row['sub_category'];
              $id = $row['sid'];
          ?>
          <ul class="footer-nav">
            <li><a href="subcategory.php?id=<?php echo $id; ?>"><?php echo $subCatName; ?></a></li>
            
          </ul>
          <?php } ?>
        </div>
      </div>
      
      <div class="col-lg-4  col-md-12">
        <div class="single-footer-widget">
          <h6>Blog Category</h6>
          <?php
           
           $query2 = mysqli_query($conn, "SELECT * FROM tbl_category LIMIT 4");
            while($row2 = mysqli_fetch_array($query2)){
              $catName = $row2['category'];
              $cid = $row2['cid'];
          ?>
          <ul class="footer-nav">
            <li><a href="category.php?id=<?php echo $cid; ?>"><?php echo $catName; ?></a></li>
            
          </ul>
          <?php } ?>
        </div>
      </div>
      <?php
          $query3 = mysqli_query($conn, "SELECT * FROM tbl_post LIMIT 7,5");
      ?>
      <div class="col-lg-4  col-md-12">
        <div class="single-footer-widget mail-chimp">
          <h6 class="mb-20" >Top Posts</h6>
          <?php
              while($row3 = mysqli_fetch_array($query3)){
                $postID = $row3['pid'];
          ?>
          <p><a style="color: white;" href="post.php?id=<?php echo $postID; ?>"><?php echo $row3['blogTitle']; ?> <br> </a></p>
          <?php } ?>
        </div>
      </div>
    </div>
    
    <div class="row footer-bottom d-flex justify-content-between">

      <p style="text-align: center;" class="col-lg-12 col-sm-12 footer-text">Copyright &copy;<script>
          document.write(new Date().getFullYear());
        </script> All rights reserved </p>

     
    </div>
  </div>
</footer>

