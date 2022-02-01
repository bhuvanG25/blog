<?php
    include 'database.php';

    if(isset($_POST['add-btn'])){

    $cid = addslashes($_POST['category']);
    $metaTitle = addslashes($_POST['metaTitle']);
    $subCategory = addslashes($_POST['sub_category']);
    $subCategoryDesc = addslashes($_POST['subCategory_desc']);
      
    $subCatImageUrl = uploadSubCatImage($_FILES['subCatImg']['name'],"subCatImg","subCat");
    
            $query = "INSERT INTO tbl_subcategory (`cid`,`metaTitle`,`sub_category`,`subCategory_desc`,`subCatImg`) VALUES ('$cid','$metaTitle','$subCategory','$subCategoryDesc','$subCatImageUrl')";
            // echo $query;die;
            $record = mysqli_query($conn,$query);
            if($record)
            {
                  header("location:sub-category.php?addSubCategory=success");
                  exit();
            }
            else{
              header("location:sub-category.php?addSubCategory=error");
              exit();
            }
          
  }
  else
  {
    header("location:index.php");
    exit();
  }

  function formError($errorCode){
    header("location:sub-category.php?addSubCategory=".$errorCode);
    exit();
}

function uploadSubCatImage($img, $imgName, $imgType){
    $imgUrl = "";

    $validExt = array("jpg","jpeg","png","gif","jfif","webp");

    if($img == ""){
        formError("empty".$imgType."image");
    }
    elseif($_FILES[$imgName]['size'] <=0){
        formError($imgType."imageerror");
    }
    else{
        $ext = strtolower(end(explode(".", $img)));
        if(!in_array($ext, $validExt)){
            formError("invalidType".$imgType."image");
        }

        $folder = "subCatImages/";
        $imgnewName = rand(10000,990000).'_'.time().'.'.$ext;
        $imgPath = $folder.$imgnewName;

        if(move_uploaded_file($_FILES[$imgName]['tmp_name'], $imgPath)){
            $imgUrl = $imgPath;
        }
        else{
            formError("erroruploading".$imgType."image");
        }
    }
    return $imgUrl;
}
