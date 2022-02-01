<?php
include 'database.php';
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">


<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="img/fav.png">

    <meta name="author" content="colorlib">

    <meta name="description" content="">

    <meta name="keywords" content="">

    <meta charset="UTF-8">
    <?php
    $subCatId = $_GET['id'];
      $query = mysqli_query($conn, "SELECT * FROM tbl_subcategory WHERE sid = '$subCatId'");
      while($row = mysqli_fetch_array($query)){
        
      
    ?>
    <title><?php echo $row['metaTitle']; ?></title>
    <?php } ?>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="css/A.linearicons.css font-awesome.min.css bootstrap.css owl.carousel.css main.css,Mcc.WF7wcUNi4H.css.pagespeed.cf.dAXbrJ9-NL.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
  $subId = $_GET['id'];
  $subQuery = mysqli_query($conn, "SELECT * FROM tbl_subcategory WHERE sid = '$subId'");
  while($subRow = mysqli_fetch_array($subQuery)){
    $subCatName = $subRow['sub_category'];
    $categoryID = $subRow['cid'];
  
?>
<?php
    $query3 = mysqli_query($conn, "SELECT * FROM tbl_category WHERE cid = '$categoryID'");
    
?>
<section class="top-section-area section-gap">
  <div class="container">
    <div class="row justify-content-between align-items-center d-flex">
      <div class="col-lg-8 top-left">
        <h2 class="text-white mb-20"><?php echo $subRow['sub_category']; ?></h2>
        <ul>
          <li><a href="index.php">Home</a><span class="lnr lnr-arrow-right"></span></li>
         
          <li><a href="post.php"><?php echo $subCatName; ?></a></li>
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
              $sid = $_GET['id'];

              $catQuery = mysqli_query($conn, "SELECT * FROM tbl_post WHERE sid='$sid'");
              $rowcount=mysqli_num_rows($catQuery);
                if($rowcount==0)
                {
                echo "<h4 class='text-uppercase'>No Post Found related to this category</h4>";
                }
                else {
                while ($catRow=mysqli_fetch_array($catQuery)) {
                  $old_date = $catRow['postAddedDate'];
                  $date = date_create($old_date);
                  $new_date = date_format($date,"d");
                  $new_date1 = date_format($date,"M");

                  $pid = $catRow['pid'];
            ?>
            <?php
              $query2 = mysqli_query($conn, "SELECT * FROM tbl_comment WHERE pid = $pid AND status=1");
              $result2 = mysqli_num_rows($query2);
            ?>
            <div class="single-list flex-row d-flex">
              <div class="thumb">
                <div class="date">
                  <span><?php echo $new_date; ?></span><br><?php echo $new_date1; ?>
                </div>
                <img src="admin/<?php echo $catRow['mainImg']; ?>" style="background-repeat:no-repeat;background-size:cover;height: 200px; width: 300px;" alt="">
              </div>
              <div class="detail">
                <a href="post.php?id=<?php echo $catRow['pid'] ?>">
                  <h4 class="pb-20"><?php echo $catRow['blogTitle']; ?></h4>
                </a>
                <p style="text-align: justify;">
                  <?php echo $catRow['blogSummary']; ?>
                </p>
                <p class="footer pt-20">
                  <a href="#"><?php echo $result2; ?> 
                  <i class="far fa-comment"></i>
                   </a>
                </p>
              </div>
            </div>
            <?php } ?>
            <?php } ?>
          </div>
          
        </div>
        <div class="col-lg-4 sidebar-area">
        <div class="single_widget cat_widget">
            <h4 class="text-uppercase pb-20">post categories</h4>
            <?php
                  $postSub = mysqli_query($conn, "SELECT * FROM tbl_category LIMIT 5");
                  while($postSubRow = mysqli_fetch_array($postSub)){ 
                    $catID = $postSubRow['cid'];
                ?>
                <?php
                     $postSub1 = mysqli_query($conn, "SELECT * FROM tbl_subcategory WHERE cid=$catID");
                     $result4 = mysqli_num_rows($postSub1);
                   ?>

            <ul style="padding: 0px;">
              <li>
                
                <a href="category.php?id=<?php echo $postSubRow['cid']; ?>"><?php echo $postSubRow['category']; ?> <span><?php echo $result4; ?></span></a>
               
              </li>
            </ul>
            <?php } ?>
          </div>
          <div class="single_widget recent_widget">
            <h4 class="text-uppercase pb-20">Recent Posts</h4>
            <div class="active-recent-carusel">
              <?php
                $recentQuery = mysqli_query($conn, "SELECT * FROM tbl_post ORDER BY postAddedDate DESC LIMIT 4");
                while($recentRow = mysqli_fetch_array($recentQuery)){
                  $old_date = $recentRow['postAddedDate'];
                  $date = date_create($old_date);
                  $new_date = date_format($date, "d M Y");
                
              ?>
              <div class="item">
                <img style="background-repeat:no-repeat;background-size:cover;height: 200px;" src="admin/<?php echo $recentRow['mainImg']; ?>" alt="">
                <a href="post.php?id=<?php echo $recentRow['pid']; ?>">
                  <p style="font-weight: 600; color:black;"><?php echo $recentRow['blogTitle']; ?></p>
                </a>
                <p style="background-color: black; color:white; width: 90px;"><?php echo $new_date; ?></p>
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