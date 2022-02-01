<?php
    include 'database.php';

    if(isset($_POST['add-comment']))
    {
        $postId = $_POST['pid'];
        $username = addslashes($_POST['userName']);
        $userEmail = addslashes($_POST['userEmail']);
        $subject = addslashes($_POST['subject']);
        $message = addslashes($_POST['message']);

        $query = "INSERT INTO tbl_comment (`pid`,`userName`, `userEmail`, `subject`, `message`) VALUES ('$postId','$username', '$userEmail', '$subject', '$message')";
        // echo $query;die;
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if($result){
            header("location:post.php?id=$postId");
            exit();
        }
        else{
            header("location:post.php?id=$postId");
            exit();
        }

    }
?>