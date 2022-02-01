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
  $postID = $_GET['id'];
  $query = mysqli_query($conn, "SELECT * FROM tbl_post WHERE pid='$postID'");
  while ($row = mysqli_fetch_array($query)) {


  ?>

    <title><?php echo $row['metaTitle'] ?></title>
  <?php } ?>
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">

  <link rel="stylesheet" href="css/A.linearicons.css font-awesome.min.css bootstrap.css owl.carousel.css main.css,Mcc.WF7wcUNi4H.css.pagespeed.cf.dAXbrJ9-NL.css">
</head>

<body>
  <?php
  include 'include/header.php';

  ?>

  <?php
  if (!isset($_GET['id'])) {
    echo '<script>
    window.location.href="index.php"
  </script>';
    exit();
  }
  $postId = $_GET['id'];
  $postHeadQuery = mysqli_query($conn, "SELECT * FROM tbl_post WHERE pid = '$postId'");
  while ($postHeadRow = mysqli_fetch_array($postHeadQuery)) {
    $subCatId = $postHeadRow['sid'];
    $catId = $postHeadRow['cid'];
  ?>
  
    <section class="top-section-area section-gap">
      <div class="container">
        <div class="row justify-content-between align-items-center d-flex">
          <div class="col-lg-8 top-left">
            <h2 class="text-white mb-20"><?php echo $postHeadRow['blogTitle']; ?></h2>
            <ul>
              <li><a href="index.php">Home</a><span class="lnr lnr-arrow-right"></span></li>
              
              <li style="display: inline;"><a href="post.php?id=<?php echo $postId; ?>"><?php echo $postHeadRow['blogTitle']; ?></a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>


  <div class="post-wrapper pt-100">

    <section class="post-area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <?php
            $pid = $_GET['id'];
            $postQuery = mysqli_query($conn, "SELECT * FROM tbl_post WHERE pid='$pid'");
            while ($postRow = mysqli_fetch_array($postQuery)) {
              $old_date = $postRow['postAddedDate'];
              $date = date_create($old_date);
              $new_date = date_format($date, "d M Y H:iA");
              $admin = $postRow['admin'];

            ?>

              <div class="single-page-post">
                <img class="img-fluid" style="width: 100%;" src="admin/<?php echo $postRow['mainImg']; ?>" alt="">
                <div class="top-wrapper ">
                  <div class="row d-flex justify-content-between">
                    <h2 class="col-lg-8 col-md-12 text-uppercase">
                      <?php echo $postRow['blogTitle']; ?>
                    </h2>
                    <div class="col-lg-4 col-md-12 right-side d-flex justify-content-end">
                      <div class="dates">
                        <h3 style="background-color: black; color:white; width:160px; padding-left: 5px; font-size: 15px;"><?php echo $new_date; ?></h3>
                        <h3 style="background-color: black; color:white; margin-top:10px; font: size 15px;">Posted By : &nbsp; <span style="background-color:dodgerblue; color:white; width:140px;  font-size: 15px;"><?php echo $admin; ?></span></h3>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tags">
                  <?php
                  $pid = $_GET['id'];
                  $tagQuery = mysqli_query($conn, "SELECT * FROM tbl_post WHERE pid='$pid'");
                  while ($tagRow = mysqli_fetch_array($tagQuery)) {
                    $mystring = $tagRow['blogTags'];
                    $arr = explode(",", $mystring);
                    // print_r($arr);


                  ?>
                    <ul>
                      <?php
                      foreach ($arr as $value) {
                      ?>
                        <li><a href="#"><?php echo $value; ?></a></li>
                      <?php } ?>
                    </ul>
                  <?php } ?>
                </div>
                <div class="single-post-content">
                  <p style="text-align: justify;">
                    <?php echo $postRow['blogContent']; ?>
                  </p>
                </div>
                <?php
                $id1 = $_GET['id'];
                $query3 = mysqli_query($conn, "SELECT * FROM tbl_comment WHERE pid='$id1' AND status=1 ORDER BY comAddedDate DESC LIMIT 5 ");
                $result2 = mysqli_num_rows($query3);
                ?>
                <section class="comment-sec-area pt-80 pb-80">
                  <div class="container">
                    <div class="row flex-column">
                      <h5 class="text-uppercase pb-80"><?php echo $result2; ?> comments</h5>
                      <br>
                      <div class="comment-list">
                        <?php
                        while ($row3 = mysqli_fetch_array($query3)) {
                          $old_date = $row3['comAddedDate'];
                          $date = date_create($old_date);
                          $new_date = date_format($date, "d M Y H:i:s");

                        ?>
                          <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                              <div class="desc">
                                <h5 class="text-uppercase"><a href="#"><?php echo $row3['userName']; ?></a></h5>
                                <p class="date"><?php echo $new_date; ?> </p>
                                <p style="font-family: cursive;" class="comment">
                                  <?php echo $row3['message']; ?>
                                </p>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </section>
                <?php
                $pId = $_GET['id'];
                $query2 = mysqli_query($conn, "SELECT * FROM tbl_post WHERE pid='$pId'");
                while ($row2 = mysqli_fetch_array($query2)) {
                  $id = $row2['pid'];
                }
                ?>


                <section class="commentform-area  pb-120 pt-80 mb-100">
                  <div class="container">

                    <h5 class="text-uppercas pb-50">Leave a Reply</h5>
                    <form action="addComment.php" method="POST">
                      <input type="hidden" name="pid" value="<?php echo $id; ?>">
                      <div class="row flex-row d-flex">

                        <div class="col-lg-12">

                          <input name="userName" placeholder="Enter your name" class="common-input mb-20 form-control" required="" type="text">
                          <input name="userEmail" placeholder="Enter your email" class="common-input mb-20 form-control" required="" type="email">
                          <input name="subject" placeholder="Subject" class="common-input mb-20 form-control" required="" type="text">
                        </div>
                        <div class="col-lg-12">
                          <textarea class="form-control mb-10" name="message" placeholder="Messege" required=""></textarea>
                          <button class="primary-btn mt-20" type="submit" name="add-comment">Comment</button>
                        </div>

                      </div>
                    </form>
                  </div>
                </section>


              </div>
            <?php } ?>
          </div>
          <div class="col-lg-4 sidebar-area ">
            <div class="single_widget cat_widget">
              <h4 class="text-uppercase pb-20">post subcategories</h4>
              <?php
              $postSub = mysqli_query($conn, "SELECT * FROM tbl_subcategory LIMIT 5");
              while ($postSubRow = mysqli_fetch_array($postSub)) {
                $subId = $postSubRow['sid'];
              ?>
              <?php
                  $postSub1 = mysqli_query($conn, "SELECT * FROM tbl_post WHERE sid = $subId LIMIT 5");
                  $result3 = mysqli_num_rows($postSub1);
              ?>
                <ul style="padding: 0px;">
                  <li>

                    <a href="subcategory.php?id=<?php echo $postSubRow['sid']; ?>"><?php echo $postSubRow['sub_category']; ?> <span><?php echo $result3; ?> </span></a>

                  </li>
                </ul>
              <?php } ?>
            </div>
            <div class="single_widget recent_widget">
              <h4 class="text-uppercase pb-20">Recent Posts</h4>
              <div class="active-recent-carusel">
                <?php
                $recentQuery = mysqli_query($conn, "SELECT * FROM tbl_post LIMIT 8,4");
                while ($recentRow = mysqli_fetch_array($recentQuery)) {
                  $old_date = $recentRow['postAddedDate'];
                  $date = date_create($old_date);
                  $new_date = date_format($date, "d M Y");

                ?>
                  <div class="item">
                    <img style="background-repeat:no-repeat;background-size:cover;height: 200px;" src="admin/<?php echo $recentRow['altImg2']; ?>" alt="">
                    <a href="post.php?id=<?php echo $recentRow['pid']; ?>">
                      <p style="font-weight: 600; color:black;" class="pb-20"><?php echo $recentRow['blogTitle']; ?></p>
                    </a>
                    <p style="background:black; color:white; width:95px; padding-left:6px;"><?php echo $new_date; ?></p>
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