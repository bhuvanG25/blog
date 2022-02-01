<?php
    include 'database.php';

    if(isset($_POST['delete'])){

    $postId = $_POST['pid'];

    $query = mysqli_query($conn, "SELECT * FROM tbl_post WHERE pid = '$postId'");
    while($row = mysqli_fetch_array($query)){
        $img1 = $row['mainImg'];
        $img2 = $row['altImg1'];
        $img3 = $row['altImg2'];
    }
    unlink($img1);
    unlink($img2);
    unlink($img3);


    $query = "DELETE FROM tbl_post WHERE pid='$postId'";

    $result = mysqli_query($conn, $query);
    if($result)
    {
        header("location:manage-post.php?deletePost=success");
        exit();
    }
    else
    {
        header("location:manage-post.php?deletePost=error");
        exit();
    }
}
?>