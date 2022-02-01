<?php
    include  'database.php';

    if(isset($_POST['add-post'])){

    $categoryId = addslashes($_POST['category']);
    $subCatId = addslashes($_POST['sub_category']);
    $metaTitle = addslashes($_POST['metaTitle']);
    $blogTitle = addslashes($_POST['blogTitle']);
    $blogSummary = addslashes($_POST['blogSummary']);
    $blogContent = addslashes($_POST['blogContent']);
    $blogTags = addslashes($_POST['blogTags']);
    $admin = addslashes($_POST['admin']);

    if (empty($categoryId)){
        formError("SelectCategory");
    }
    elseif(empty($subCatId)){
        formError("SelectSubCategory");
    }
    elseif(empty($metaTitle)){
        formError("emptyMetaTitle");
    }
    elseif(empty($blogTitle)){
        formError("emptyBlogTitle");
    }
    elseif(empty($blogSummary)){
        formError("emptyBlogSummary");
    }
    elseif(empty($blogContent)){
        formError("emptyBlogContent");
    }
    elseif(empty($blogTags)){
        formError("emptyBlogTags");
    }

    $sqlCheckBlogTitle = "SELECT blogTitle FROM tbl_post WHERE blogTitle='$blogTitle'";
    $queryCheckBlogTitle = mysqli_query($conn, $sqlCheckBlogTitle);

    if(mysqli_num_rows($queryCheckBlogTitle) > 0){
        formError("TitlebeinUsed");
    }

    $mainImageUrl = uploadImage($_FILES['mainImg']['name'],"mainImg","main");
    $altImg1Url = uploadImage($_FILES['altImg1']['name'],"altImg1","alt1");
    $altImgUrl2 = uploadImage($_FILES['altImg2']['name'],"altImg2","alt2");

        $query=mysqli_query($conn,"INSERT INTO tbl_post(`cid`,`sid`,`metaTitle`,`blogTitle`,`blogSummary`,`blogContent`,`mainImg`,`altImg1`,`altImg2`,`blogTags`,`admin`) VALUES('$categoryId','$subCatId','$metaTitle','$blogTitle','$blogSummary','$blogContent','$mainImageUrl','$altImg1Url','$altImgUrl2','$blogTags','$admin')");
        
        if($query)
        {
            header("location:post.php?addPost=success");
            exit();
        }
        else{
            formError("SQLError");
            // header("location:post.php?addPost=error");
            // exit();
        } 
    }
    else{
        header("location:index.php");
        exit();
    }

    function formError($errorCode){
        header("location:post.php?addBlog=".$errorCode);
        exit();
    }
    
    function uploadImage($img, $imgName, $imgType){
        $imgUrl = "";

        $validExt = array("jpg","jpeg","png","gif","jif","webp");

        if($img == ""){
            // formError("empty".$imgType."image");
        }
        elseif($_FILES[$imgName]['size'] <=0){
            // formError($imgType."imageerror");
        }
        else{
            $ext = strtolower(end(explode(".", $img)));
            if(!in_array($ext, $validExt)){
                // formError("invalidType".$imgType."image");
            }

            $folder = "blogImages/";
            $imgnewName = rand(10000,990000).'_'.time().'.'.$ext;
            $imgPath = $folder.$imgnewName;

            if(move_uploaded_file($_FILES[$imgName]['tmp_name'], $imgPath)){
                $imgUrl = $imgPath;
            }
            else{
                // formError("erroruploading".$imgType."image");
            }
        }
        return $imgUrl;
    }

?>