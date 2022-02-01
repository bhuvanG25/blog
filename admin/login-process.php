<?php
  
    include 'database.php';

    if(isset($_REQUEST['login'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $password = md5($password);
  
      $query = "SELECT * FROM tbl_register WHERE username='$username' AND password = '$password' AND status=1";
      $result = mysqli_query($conn,$query);
      $row = mysqli_num_rows($result);
      if($row==1)
      {
          
        $_SESSION['username'] = $username;
        header("location:index.php");
        exit();
      }
      else
      {
          header("location:login.php?login=error");
          exit();
      }  
    }

    
?>