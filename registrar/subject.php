<?php ob_start();?>
<?php include("auth.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Commonwealth National High School</title>
    <link rel="shortcut icon" type="image/x-icon" href="../cnhsadmin/img/favicon.ico">
    <link rel="stylesheet" href="../cnhsadmin/dist/css/font_awsome.css">
    <link rel="stylesheet" href="../cnhsadmin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../cnhsadmin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../cnhsadmin/dist/css/adminlte.min.css">
  </head>
  <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
      <?php include("nav.php");?>
      <aside class="main-sidebar sidebar-dark-warning elevation-4">
        <span class="brand-link bg-danger">
          <img src="../cnhsadmin/img/logo.png" alt="CNHS Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-bold text-uppercase">Commonwelth NHS</span>
        </span>
        <div class="sidebar bg-success">
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item"><a href="dashboard" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a></li>
              <li class="nav-item"><a href="announcement" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-bullhorn"></i><p> Announcement</p></a></li>
              <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-info-circle"></i><p> About Us<i class="fas fa-angle-left right"></i></p></a>
                <ul class="nav nav-treeview">
                  <li class="nav-item"><a href="events" class="nav-link text-uppercase font-weight-bold shadow-sm"><i class="fa fa-volume-off nav-icon fs-8"></i><p> Events</p></a></li>
                  <li class="nav-item"><a href="history" class="nav-link text-uppercase font-weight-bold shadow-sm"><i class="fa fa-history nav-icon fs-8"></i><p> History</p></a></li>
                  <li class="nav-item"><a href="mission" class="nav-link text-uppercase font-weight-bold shadow-sm"><i class="fa fa-binoculars nav-icon"></i><p> Mission</p></a></li>
                  <li class="nav-item"><a href="vision" class="nav-link text-uppercase font-weight-bold shadow-sm"><i class="fa fa-eye nav-icon fa-2x"></i><p> Vision</p></a></li>
                </ul>
              </li>
              <li class="nav-item"><a href="enrollment" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-user-plus"></i><p> Enrollment <span class="badge badge-info right">
                <?php
                  include("db_connect.php");
                  $count_enrollment = mysqli_query($conn, "SELECT * FROM $student WHERE status='pending'");
                  echo mysqli_num_rows($count_enrollment); 
                  mysqli_close($conn);
                ?>
              </span></p></a></li>
              <li class="nav-item"><a href="schedule" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-calendar"></i><p> Schedule</p></a></li>
              <li class="nav-item"><a href="monitoring" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-hourglass"></i><p> Monitoring</i></p></a></li>
              <li class="nav-item"><a href="students" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-users"></i><p> Students<span class="badge badge-info right">
                <?php
                  include("db_connect.php");
                  $count_student = mysqli_query($conn, "SELECT * FROM $student WHERE status='active'");
                  echo mysqli_num_rows($count_student); 
                  mysqli_close($conn);
                ?>
              </span></p></a></li>
              <li class="nav-item"><a href="reports" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-tasks"></i><p> Report</p></a></li>
              <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold shadow-sm p-3 active"><i class="nav-icon fa fa-cogs"></i><p> Settings<i class="fas fa-angle-left right"></i></p></a>
                <ul class="nav nav-treeview">
                  <li class="nav-item"><a href="grade-level" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="fa fa-bars nav-icon"></i><p> Grade Level</p></a></li>
                  <li class="nav-item"><a href="faculty" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="fa fa-bars nav-icon"></i><p> Faculty</p></a></li>
                  <li class="nav-item"><a href="school-year" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="fa fa-bars nav-icon"></i><p> School Year</p></a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </aside>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <ol class="breadcrumb text-uppercase">
                  <li class="breadcrumb-item active">Settings</li>
                  <li class="breadcrumb-item">Subject</li>
                </ol>
              </div><!-- /.col -->
              <div class="col-sm-6">&nbsp;</div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card bg-white">
                  <div class="card-header">
                    <h5 class="card-title text-uppercase font-weight-bold"><i class="nav-icon fa fa-bars"></i> Subject</h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <form class="col-md-6 h6" method="post" action="">
                    <?php
                      if(isset($_GET['update'])) {
                        include("db_connect.php");
                        $q_subject = mysqli_query($conn, "SELECT * FROM $subject WHERE suID='".$_GET['update']."'");
                        while($row_subj = mysqli_fetch_array($q_subject)) {
                    ?>
                          <div class="mb-3 row">
                            <label for="sucode" class="col-sm-3 text-end control-label col-form-label">Subject Code : </label>
                            <div class="col-sm-6">
                              <input type="text" name="sucode" class="form-control h5" id="sucode" value="<?php echo $row_subj['sucode'];?>" />
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="descr" class="col-sm-3 text-end control-label col-form-label">Description : </label>
                            <div class="col-sm-9">
                              <input type="text" name="descr" class="form-control fs-5" id="descr" value="<?php echo $row_subj['descr'];?>" />
                              <input type="hidden" name="suid" class="form-control fs-5" id="suid" value="<?php echo $row_subj['suID'];?>" />
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <button type="submit" name="UpdateSubject" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Update Subject</button>
                          </div>
                    <?php
                          mysqli_close($conn);
                        }
                      }
                      else {
                    ?>
                        <div class="mb-3 row">
                          <label for="sucode" class="col-sm-3 text-end control-label col-form-label">Subject Code : </label>
                          <div class="col-sm-6">
                            <input type="text" name="sucode" class="form-control h5" id="sucode" required />
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label for="descr" class="col-sm-3 text-end control-label col-form-label">Description : </label>
                          <div class="col-sm-9">
                            <input type="text" name="descr" class="form-control h5" id="descr" required />
                            <input type="hidden" name="suid" class="form-control h5" id="suid" required value="<?php echo $_GET['level'];?>" />
                          </div>
                        </div>
                        <div class="mb-3 row">
                            <button type="submit" name="SubmitSubject" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Subject</button>
                        </div>
                    <?php
                      } 
                    ?>
                  </form>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="table-responsive">
                        <table id="zero_config" class="table table-striped h6">
                          <thead>
                            <tr>
                              <th class="fw-bold">Subject Code</th>
                              <th class="fw-bold">Description</th>
                              <th class="fw-bold">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              include("db_connect.php");
                              $display_subject = mysqli_query($conn, "SELECT * FROM $subject WHERE glevel='".$_GET['level']."' ORDER BY sucode ASC");
                              if(mysqli_num_rows($display_subject)<1) {
                                echo "<tr>";
                                  echo "<td colspan='3'>No record found.</td>";
                                echo "</tr>";
                              } 
                              else {
                                while($row_subject = mysqli_fetch_array($display_subject)) {
                                  echo "<tr>";
                                    echo "<td>".$row_subject['sucode']."</td>";
                                    echo "<td>".ucfirst($row_subject['descr'])."</td>";
                                    echo "<td><a href='?update=".$row_subject['suID']."'><span class='badge bg-success rounded-pill'><i class='fas fa-pencil-alt text-warning p-1'></i> Edit</span></a></td>";
                                  echo "</tr>";
                                }
                              }
                              mysqli_close($conn);
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><!--/. container-fluid -->
        </section>
      </div>
      <aside class="control-sidebar control-sidebar-dark"></aside>
      <footer class="main-footer">
        <div class="float-right d-none d-sm-inline-block">
          Copyright &copy; 2021-<?php date_default_timezone_set("Asia/Manila");echo date("Y");?> Commonwealth National High School.
        All rights reserved.
        </div>
      </footer>
    </div>
    <script src="../cnhsadmin/plugins/jquery/jquery.min.js"></script>
    <script src="../cnhsadmin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../cnhsadmin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="../cnhsadmin/dist/js/adminlte.js"></script>
    <script src="../cnhsadmin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../cnhsadmin/plugins/raphael/raphael.min.js"></script>
    <script src="../cnhsadmin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../cnhsadmin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <script src="../cnhsadmin/plugins/chart.js/Chart.min.js"></script>
    <script src="../cnhsadmin/dist/js/pages/dashboard2.js"></script>
  </body>
</html>
<?php
  include("pmnhs_function.php");
  ManageSubject();
?>
<?php 
  ob_flush();
?>