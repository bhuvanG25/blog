      <!-- partial -->
      <!-- partial:partials/_sidebar.php -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Category</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="category.php">Add</a></li>
                <li class="nav-item"> <a class="nav-link" href="manage-categories.php">Manage</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#subCategory" aria-expanded="false" aria-controls="subCategory">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Sub Category</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="subCategory">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="sub-category.php"> Add </a></li>
                <li class="nav-item"> <a class="nav-link" href="manage-subcategory.php"> Manage </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#post" aria-expanded="false" aria-controls="post">
              <i class="icon-book menu-icon"></i>
              <span class="menu-title">Post</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="post">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="post.php"> Add </a></li>
                <li class="nav-item"> <a class="nav-link" href="manage-post.php"> Manage </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#comment" aria-expanded="false" aria-controls="comment">
              <i class="icon-cloud menu-icon"></i>
              <span class="menu-title">Comment</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="comment">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="manage-Comment.php"> Manage </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#admin" aria-expanded="false" aria-controls="admin">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Admin</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="admin">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="manage-user.php"> Manage </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->