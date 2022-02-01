<?php
    include 'database.php';
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cfpassword = $_POST['cfpassword'];

    $query2 = mysqli_query($conn, "SELECT * FROM tbl_register where email='$email'");
    if(mysqli_num_rows($query2) >0){
        header("location:signup.php?registeration=error");
        exit();
    }

    else{
        if($password==$cfpassword)
    {
        $hash = md5($password);
        $query = "INSERT INTO tbl_register (`username`,`email`,`password`,`status`) VALUES ('$username','$email','$hash',1)";
        $result = mysqli_query($conn,$query);
        if($result)
        {
           header("location:signup.php?registeration=success");
           exit();
        }
    }
    else{
        header("location:signup.php?registeration=warning");
        exit();
    }
    }
    


?>