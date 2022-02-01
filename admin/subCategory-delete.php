<?php
    include 'database.php';
    if(isset($_POST['delete'])){
    $id = $_POST['sid'];

    $query = mysqli_query($conn, "SELECT * FROM tbl_subcategory WHERE sid = '$id'");
    while($row = mysqli_fetch_array($query)){
        $img = $row['subCatImg'];
    }
    unlink($img);

    $query = "DELETE FROM tbl_subcategory WHERE sid='$id'";

    $result = mysqli_query($conn, $query);
    if($result)
    {
        header("location:manage-subcategory.php?deleteSubCategory=success");
        exit();
    }
    else{
        header("location:manage-subcategory.php?deleteSubCategory=error");
        exit();
    }
}
else{
    header("location:index.php");
    exit();
}
?>