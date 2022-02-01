
    <header class="default-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="img/xlogo.png.pagespeed.ic.xHMOVtwFDg.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                    <?php
                        $query = "SELECT * FROM tbl_category";
                        $result = mysqli_query($conn ,$query);
                        while($data = mysqli_fetch_array($result)){
                            $categoryId = $data['cid'];
                            $query1 = "SELECT * FROM tbl_subcategory where cid='$categoryId' ";
                            $result1 = mysqli_query($conn ,$query1);
                    ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $data['category']; ?></a>
                            <div class="dropdown-menu">
                            <?php
                                while($data1 = mysqli_fetch_assoc($result1)){
                            ?>
                            
                                <a class="dropdown-item" href="subcategory.php?id=<?php echo $data1['sid']; ?>">
                                    <?php echo $data1['sub_category']; ?>
                                </a>
                            
                            <?php } ?>
                            </div>
                        </li>
                        <?php } ?>

                        <li><a href="#aboutus">AboutUs</a></li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>