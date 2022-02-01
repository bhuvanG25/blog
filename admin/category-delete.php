<?php
    include 'database.php';

    if(isset($_POST['delete'])){

    $categoryId = $_POST['cid'];

    $query = mysqli_query($conn, "SELECT * FROM tbl_category WHERE cid = '$categoryId'");
    while($row = mysqli_fetch_array($query)){
        $img = $row['catImg'];
    }
    unlink($img);

    $query = "DELETE FROM tbl_category WHERE cid='$categoryId'";

    $result = mysqli_query($conn, $query);
    if($result)
    {
        header("location:manage-categories.php?deleteCategory=success");
        exit();
    }
    else
    {
        header("location:manage-categories.php?deleteCategory=error");
        exit();
    }
}
?>