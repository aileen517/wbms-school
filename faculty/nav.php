<nav class="main-header navbar navbar-expand navbar-dark bg-danger">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button"><i class="fas fa-search"></i></a>
      <div class="navbar-search-block">
        <form class="form-inline" method="get" action="search">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" name="q" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit"><i class="fas fa-search"></i></button>
              <button class="btn btn-navbar" type="submit" data-widget="navbar-search"><i class="fas fa-times"></i></button>
            </div>
          </div>
        </form>
      </div>
    </li>
    <!-- Messages Dropdown Menu -->
    <li class="nav-item">
      <a class="nav-link" href="message"><i class="far fa-comments"></i>
        <span class="badge badge-primary navbar-badge">
          <?php
            include("db_connect.php");
            $count_message = mysqli_query($conn, "SELECT * FROM $chatbx WHERE remarks='msg' AND toread='unread' AND touser='".$_SESSION['SESS_FACULTY_ID']."'");
            echo mysqli_num_rows($count_message);
            mysqli_close($conn);
          ?>
        </span>
      </a>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item">
      <a class="nav-link" href="notification"><i class="far fa-bell"></i>
        <span class="badge badge-primary navbar-badge">
          <?php
            include("db_connect.php");
            $count_norify = mysqli_query($conn, "SELECT * FROM $chatbx WHERE remarks='notify' AND touser='All' LIMIT 10");
            echo mysqli_num_rows($count_norify);
            mysqli_close($conn);
          ?>
        </span>
      </a>
    </li>
    <li class="nav-item"><a class="nav-link" data-widget="fullscreen" href="#" role="button"><i class="fas fa-expand-arrows-alt"></i></a></li>
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#"><img src="../cnhsadmin/img/logo.png" alt="user" class="rounded-circle" width="31"/> <i class="fa fa-caret-down" aria-hidden="true"></i></a>
      <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="profile"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;My Profile</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="logout"><i class="fa fa-power-off me-1 ms-1"></i>&nbsp;&nbsp;Logout</a>
      </ul>
    </li>
  </ul>
</nav>