<?php
include 'database.php';
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<!-- Copied from https://preview.colorlib.com/theme/blogger/ by Cyotek WebCopy 1.7.0.600, Thursday, January 20, 2022, 1:07:50 PM -->

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="img/fav.png">

    <meta name="author" content="colorlib">

    <meta name="description" content="">

    <meta name="keywords" content="">

    <meta charset="UTF-8">
    <?php
      $categoryId = $_GET['id'];
      $query = mysqli_query($conn, "SELECT * FROM tbl_category WHERE cid='$categoryId'");
      while($row = mysqli_fetch_array($query)){

      
    ?>
    <title><?php echo $row['metaTitle']; ?></title>
    <?php } ?>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="css/A.linearicons.css font-awesome.min.css bootstrap.css owl.carousel.css main.css,Mcc.WF7wcUNi4H.css.pagespeed.cf.dAXbrJ9-NL.css">
</head>

<body>
<?php
include 'include/header.php';

?>


<?php
if(!isset($_GET['id'])){
  echo '<script>
    window.location.href="index.php"
  </script>';
  exit();
} 
  $catId = $_GET['id'];
  $catQuery = mysqli_query($conn,"SELECT * FROM tbl_category WHERE cid='$catId'");
  while($catRow = mysqli_fetch_array($catQuery)){
    $categoryName = $catRow['category'];
  
 ?> 
<section class="top-section-area section-gap">
  <div class="container">
  
    <div class="row justify-content-between align-items-center d-flex">
      <div class="col-lg-8 top-left">
     

        <h2 class="text-white mb-20"><?php echo $categoryName; ?></h2>
      
        <ul>
          <li><a href="index.php">Home</a><span class="lnr lnr-arrow-right"></span></li>
          <li><a href="category.php?id=<?php echo $catRow['cid']; ?>"><?php echo $categoryName; ?></a></li>
        </ul>
        
      </div>
    </div>
    
  </div>
</section>
<?php } ?>



<div class="post-wrapper pt-100">

  <section class="post-area">
    <div class="container">
      <div class="row justify-content-center d-flex">
        <div class="col-lg-8" style="bottom: 38px;">
          <div class="post-lists">
            <?php
              $cid = $_GET['id'];

              $catQuery = mysqli_query($conn, "SELECT * FROM tbl_subcategory WHERE cid='$cid'");
              $rowcount=mysqli_num_rows($catQuery);
                if($rowcount==0)
                {
                echo "No record found";
                }
                else {
                while ($catRow=mysqli_fetch_array($catQuery)) {
                  $old_date = $catRow['subcatAddedDate'];
                  $date = date_create($old_date);
                  $new_date = date_format($date,"d");
                  $new_date1 = date_format($date,"M");
            ?>
           
            <div class="single-list flex-row d-flex">
              <div class="thumb">
                <div class="date">
                  <span><?php echo $new_date; ?></span><br><?php echo $new_date1; ?>
                </div>
                <img  style="background-repeat:no-repeat;background-size:cover; height: 200px; width:300px;" src="admin/<?php echo $catRow['subCatImg']; ?>" alt="">
              </div>
              <div class="detail">
                <a href="subcategory.php?id=<?php echo $catRow['sid']; ?>">
                  <h4 class="pb-20"><?php echo $catRow['sub_category']; ?></h4>
                </a>
                <p>
                  <?php echo $catRow['subCategory_desc']; ?>
                </p>
                
              </div>
            </div>
            <?php } ?>
            <?php } ?>
          </div>
          
        </div>
        <div class="col-lg-4 sidebar-area">
          <div class="single_widget cat_widget">
            <h4 class="text-uppercase pb-20">post subcategories</h4>
            <?php
                  $postSub = mysqli_query($conn, "SELECT * FROM tbl_subcategory LIMIT 5");
                  while($postSubRow = mysqli_fetch_array($postSub)){
                    $subId = $postSubRow['sid'];
                  
                ?>
                <?php
                  $postSub4 = mysqli_query($conn, "SELECT * FROM tbl_post WHERE sid = $subId");
                  $result4 = mysqli_num_rows($postSub4);
                ?>
            <ul style="padding: 0px;">
              <li>
                
                <a href="subcategory.php?id=<?php echo $postSubRow['sid']; ?>"><?php echo $postSubRow['sub_category']; ?> <span><?php echo $result4; ?></span></a>
               
              </li>
            </ul>
            <?php } ?>
          </div>
          <div class="single_widget recent_widget">
            <h4 class="text-uppercase pb-20">Recent Posts</h4>
            <div class="active-recent-carusel">
              <?php
                $recentQuery = mysqli_query($conn, "SELECT * FROM tbl_post LIMIT 4,4");
                while($recentRow = mysqli_fetch_array($recentQuery)){

                
              ?>
              <div class="item">
                <img style="background-repeat:no-repeat;background-size:cover;height: 200px;" src="admin/<?php echo $recentRow['altImg1']; ?>" alt="">
                <a href="post.php?id=<?php echo $recentRow['pid']; ?>">
                  <p style="font-weight: 600; color:black;" ><?php echo $recentRow['blogTitle']; ?></p>
                </a>
                <p>02 Hours ago <span> <i class="fa fa-heart-o" aria-hidden="true"></i>
                    06 <i class="fa fa-comment-o" aria-hidden="true"></i>02</span></p>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>


<?php
include 'include/footer.php';
?>
<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="js/vendor,_bootstrap.min.js jquery.ajaxchimp.min.js parallax.min.js.pagespeed.jc.m3TLRWKW3I.js"></script>
<script>
  eval(mod_pagespeed_gInw0_vP6G);
</script>
<script>
  eval(mod_pagespeed_f_YTSGg6Cp);
</script>
<script>
  eval(mod_pagespeed_M3KJhta7zI);
</script>
<script src="js/owl.carousel.min.js jquery.magnific-popup.min.js jquery.sticky.js main.js.pagespeed.jc.sBKppa8gIe.js"></script>
<script>
  eval(mod_pagespeed_eUbFTV3_NE);
</script>
<script>
  eval(mod_pagespeed_FzQleb9_H4);
</script>
<script>
  eval(mod_pagespeed_OaikVJ4xOx);
</script>
<script>
  eval(mod_pagespeed_KGfwTllkSA);
</script>

<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"6d08875d9d4c84dd","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.12.0","si":100}' crossorigin="anonymous"></script>
</body>
<!-- Copied from https://preview.colorlib.com/theme/blogger/category.html by Cyotek WebCopy 1.7.0.600, Thursday, January 20, 2022, 1:07:50 PM -->

</html>