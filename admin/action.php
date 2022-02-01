<?php
    include 'database.php';
    $output='';
    $sql = "SELECT * FROM tbl_subcategory WHERE cid='".$_POST['categoryId']."' ORDER BY sub_category";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $pId = 0;
    if(isset($_POST['pId']))
    {
        $pId = $_POST['pId']; 
    }
    if(!empty($pId))
    {
         $q = mysqli_query($conn,"select sid from tbl_post where pid=$pId") or die(mysqli_error($conn));
         $r = mysqli_fetch_all($q,MYSQLI_NUM);
         $currentSid = $r[0][0];
    }
    $output .='<option value="" disabled > Select Sub Category</option>'; 
    while($row=mysqli_fetch_array($result)){
        $sel = "";
        if($currentSid==$row['sid'])
        {
            $sel = "Selected";
        }
        $output .='<option value="'. $row["sid"] .'" '.$sel.' >' .$row["sub_category"] .'</option>';
    }
    echo $output;

    

?>