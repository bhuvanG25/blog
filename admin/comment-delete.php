<?php
    include 'database.php';
    if(isset($_POST['delete'])){
    $id = $_POST['comId'];

    $query = "DELETE FROM tbl_comment WHERE comId='$id'";

    $result = mysqli_query($conn, $query);
    if($result)
    {
       echo "success";
    }
    else{
        echo "Failed";
    }
}
else{
    header("location:index.php");
    exit();
}
?>