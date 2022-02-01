<?php
    include  'database.php';

    if(isset($_POST['addCategory-btn'])){
    $category = addslashes($_POST['category']);
    $title = addslashes($_POST['metaTitle']);
    $description = addslashes($_POST['category_desc']);
    $file = $_FILES['catImg'];
    $var1 = rand(1000,999999);  // generate random number in $var1 variable    
	$filename = $var1.$file['name'];
	$filepath = $file['tmp_name'];
	$fileerror = $file['error'];
	$maxsize    = 5020000;
	$file_ext = explode('.',$filename);
	$file_ext_check = strtolower(end($file_ext));
	$valid_file_ext = array('jpg', 'jpeg', 'png', 'jif', 'gif');

    if($fileerror == 0){
        if(in_array($file_ext_check, $valid_file_ext)){
            if($_FILES['catImg']['size'] > 5020000) {
                header("location:category.php?addCategory=moreThanLIMT");
                exit();
            }
            else{
                $destfile = 'categoryImages/'.$filename;
                move_uploaded_file($filepath, $destfile);

                $query = "INSERT INTO tbl_category(`category`,`metaTitle`,`category_desc`,`catImg`) VALUES ('$category','$title','$description','$destfile')";
                $result = mysqli_query($conn,$query);
                // echo $query;die;
                    if($result)
                    {
                        header("location:category.php?addCategory=success");
                        exit();
                    }
                    else
                    {                   
                        header("location:category.php?addCategory=error");
                        exit();
                    }
            }   
        }
    }
}
else{
    header("location:index.php");
    exit();
}
