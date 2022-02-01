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

    <title>Travel Blog</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="css/A.linearicons.css font-awesome.min.css bootstrap.css owl.carousel.css main.css,Mcc.WF7wcUNi4H.css.pagespeed.cf.dAXbrJ9-NL.css">
</head>

<body>
<?php
include 'include/header.php';
?>

<?php
  
  $query2 = mysqli_query($conn, "SELECT * FROM tbl_post ORDER BY postAddedDate");
  while($row2 = mysqli_fetch_array($query2)){
    $HeadImg = $row2['altImg2'];
    $blogTitle = $row2['blogTitle'];
    $old_date = $row2['postAddedDate'];
    $date = date_create($old_date);
    $new_date = date_format($date,"d M Y H:iA");
  }
?>
<section class="banner-area relative" id="home" data-parallax="scroll" data-image-src="admin/<?php echo $HeadImg; ?>">
  <div class="overlay-bg overlay"></div>
  <div class="container">
    <div class="row fullscreen">
     
      <div class="banner-content d-flex align-items-center col-lg-12 col-md-12">
        <h1>
          <?php echo $blogTitle; ?>
        </h1>
      </div>
      <div class="head-bottom-meta d-flex justify-content-between align-items-end col-lg-12">
        <div class="col-lg-6 flex-row d-flex meta-left no-padding">
          
        </div>
        <div class="col-lg-6 flex-row d-flex meta-right no-padding justify-content-end">
          <div class="user-meta">
            
            <p style="background-color: black; color:white; padding:3px;"><?php echo $new_date; ?></p>
          </div>
          
        </div>
      </div>
      
    </div>
  </div>
</section>



<section class="category-area section-gap" id="news">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-70 col-lg-8">
        <div class="title text-center">
          <h1 class="mb-10">Travel Categories</h1>
          
        </div>
      </div>
    </div>

   

    
    <div class="active-cat-carusel">
      <?php
        // $query = "SELECT * FROM tbl_post LEFT JOIN tbl_subcategory ON tbl_post.sid = tbl_subcategory.sid LEFT JOIN tbl_category ON tbl_post.cid = tbl_category.cid";
        $query = "SELECT * FROM tbl_category";
        $result = mysqli_query($conn ,$query);
        while($row = mysqli_fetch_array($result)){
          $old_date = $row['catAddedDate'];
          $date = date_create($old_date);
          $new_date = date_format($date,"d M Y");
        
      ?>
      <div class="item single-cat">
        <img style="background-repeat:no-repeat;background-size:cover;height: 200px;" src="admin/<?php echo $row['catImg']; ?>" alt="">
        <div style="margin-top: 12px;">
        <p class="date"><?php echo $new_date; ?></p>
        <h4 style="text-align: center;"><a href="category.php?id=<?php echo $row['cid']; ?>"><?php echo $row['category']; ?></a></h4>
        <p style="text-align: justify;"><?php echo $row['category_desc']; ?></p>
        </div>
      </div>
      <?php } ?>
    </div>
    
  </div>
</section>


<section class="travel-area section-gap" id="travel">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-70 col-lg-8">
        <div class="title text-center">
          <h1 class="mb-10">Travel Blog Posts</h1>
          
        </div>
      </div>
    </div>
    <?php
      // $sqlCategory = mysqli_query($conn, "SELECT cid FROM tbl_category");
      // while($sqlRow = mysqli_fetch_array($sqlCategory)){
      //   $categoryid = $sqlRow['cid'];
      // }
    ?>
    <div class="row">
      <?php
        $sqlPost = mysqli_query($conn,"SELECT * FROM tbl_post WHERE cid=1 LIMIT 4");
        while($postRow = mysqli_fetch_array($sqlPost)){
          $old_date = $postRow['postAddedDate'];
          $date = date_create($old_date);
          $new_date = date_format($date,"d");
          $new_date1 = date_format($date,"M");
          $string = $postRow['blogSummary'];
        
      ?>
      <div class="col-lg-6 travel-left">
        <div class="single-travel media pb-70">
          <img style="background-repeat:no-repeat;background-size:cover;height: 200px;" class="img-fluid d-flex  mr-3" src="admin/<?php echo $postRow['mainImg']; ?>" width="300px" height="200px" alt="">
          <div class="dates">
            <span><?php echo $new_date; ?></span>
            <p><?php echo $new_date1; ?></p>
          </div>
          <div class="media-body align-self-center">
            <h4 class="mt-0"><a href="post.php?id=<?php echo $postRow['pid']; ?>"><?php echo $postRow['blogTitle'] ?></a></h4>
            <p style="text-align: justify;"><?php echo $string; ?></p>
          </div>
        </div>
      </div>
      <?php } ?>
      <?php
        $sqlPost2 = mysqli_query($conn,"SELECT * FROM tbl_post WHERE cid=2 LIMIT 4");
        while($postRow2 = mysqli_fetch_array($sqlPost2)){
          $old_date = $postRow2['postAddedDate'];
          $date = date_create($old_date);
          $new_date = date_format($date,"d");
          $new_date1 = date_format($date,"M");
          $string = $postRow2['blogSummary'];
      ?>
      <div class="col-lg-6 travel-right">
        <div class="single-travel media pb-70">
          <img style="background-repeat:no-repeat;background-size:cover;height: 200px; width:300px;" class="img-fluid d-flex  mr-3" src="admin/<?php echo $postRow2['mainImg']; ?>" alt="">
          <div class="dates">
            <span><?php echo $new_date; ?></span>
            <p><?php echo $new_date1; ?></p>
          </div>
          <div class="media-body align-self-center">
            <h4 class="mt-0"><a href="post.php?id=<?php echo $postRow2['pid']; ?>"><?php echo $postRow2['blogTitle']; ?></a></h4>
            <p style="text-align: justify;"><?php echo $string; ?></p>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>


<section class="fashion-area section-gap" id="fashion">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-70 col-lg-8">
        <div class="title text-center">
          <h1 class="mb-10">Trending posts</h1>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
        $trndPost = mysqli_query($conn, "SELECT * FROM tbl_post ORDER BY postAddedDate DESC LIMIT 4");
        while($trndrow = mysqli_fetch_array($trndPost)){
          $old_date = $trndrow['postAddedDate'];
          $date = date_create($old_date);
          $new_date = date_format($date,"d M Y");

          $string = $trndrow['blogSummary'];
          
      ?>
      <div class="col-lg-3 col-md-6 single-fashion">
        <img class="img-fluid" style="background-repeat:no-repeat;background-size:cover;height: 150px;" src="admin/<?php echo $trndrow['mainImg']; ?>" alt="">
        <p class="date"><?php echo $new_date; ?></p>
        <h4><a href="post.php?id=<?php echo $trndrow['pid']; ?>"><?php echo $trndrow['blogTitle']; ?></a></h4>
        <p style="text-align: justify;">
          <?php echo $string; ?>
        </p>
        
      </div>
      <?php } ?>
    </div>
  </div>
</section>

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