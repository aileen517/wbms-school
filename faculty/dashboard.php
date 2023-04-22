<?php ob_start();?>
<?php include("auth.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Commonwealth National High School</title>
    <link rel="shortcut icon" type="image/x-icon" href="../cnhsadmin/img/favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../cnhsadmin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../cnhsadmin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../cnhsadmin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../cnhsadmin/dist/css/dataTables.bootstrap4.min.css">
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
              <li class="nav-item menu-open"><a href="dashboard" class="nav-link text-uppercase font-weight-bold shadow-sm active p-3"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a></li>
              <li class="nav-item"><a href="announcement" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-bullhorn"></i><p> Announcement</p></a></li>
              <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-info-circle"></i><p> About Us<i class="fas fa-angle-left right"></i></p></a>
                <ul class="nav nav-treeview">
                  <li class="nav-item"><a href="history" class="nav-link text-uppercase font-weight-bold shadow-sm"><i class="fa fa-history nav-icon fs-8"></i><p> History</p></a></li>
                  <li class="nav-item"><a href="mission" class="nav-link text-uppercase font-weight-bold shadow-sm"><i class="fa fa-binoculars nav-icon"></i><p> Mission</p></a></li>
                  <li class="nav-item"><a href="vision" class="nav-link text-uppercase font-weight-bold shadow-sm"><i class="fa fa-eye nav-icon fa-2x"></i><p> Vision</p></a></li>
                </ul>
              </li>
              <li class="nav-item"><a href="enrollment" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-user-plus"></i><p> Enrollment </p></a></li>
              <li class="nav-item"><a href="events" class="nav-link text-uppercase font-weight-bold shadow-sm"><i class="fa fa-volume-off nav-icon fs-8"></i><p> Events</p></a></li>
              <li class="nav-item"><a href="schedule" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-calendar"></i><p> My Schedule</p></a></li>
              <li class="nav-item"><a href="students" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-users"></i><p> My Students</p></a></li>
              <li class="nav-item"><a href="reports" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-tasks"></i><p> Report</p></a></li>
            </ul>
          </nav>
        </div>
      </aside>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h5 class="m-0 text-uppercase">Dashboard</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">&nbsp;</div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="clearfix hidden-md-up"></div>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3 p-4 bg-warning">
                  <span class="info-box-icon bg-success elevation-1"><i class="fa fa-calendar"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text text-uppercase font-weight-bold">My Schedule</span>
                    <a href="schedule" class="h5"><span class="info-box-number">
                      <?php
                        include("db_connect.php");
                        $count_schedule = mysqli_query($conn, "SELECT * FROM $schedule WHERE status='open'");
                        echo mysqli_num_rows($count_schedule); 
                        mysqli_close($conn);
                      ?>
                    </span></a>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3 p-4 bg-success">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text text-uppercase font-weight-bold">My Student</span>
                    <a href="students" class="h5"><span class="info-box-number">
                      <?php
                        include("db_connect.php");
                        $count_student1 = mysqli_query($conn, "SELECT * FROM $student WHERE status='active'");
                        echo mysqli_num_rows($count_student1); 
                        mysqli_close($conn);
                      ?>
                    </span></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card bg-white">
                  <div class="card-header">
                    <h5 class="card-title text-uppercase font-weight-bold"><i class="nav-icon fa fa-users"></i> Student List</h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="table-responsive">
                        <table class="table table-striped example">
                          <thead>
                            <tr>
                              <th class="fw-bold">Students Name</th>
                              <th class="fw-bold">Grade Level</th>
                              <th class="fw-bold">GPA</th>
                              <th class="fw-bold">Gender</th>
                              <th class="fw-bold">LRN</th>
                              <th class="fw-bold">Address</th>
                              <th class="fw-bold">Contact #</th>
                              <th class="fw-bold">Email</th>
                              <th class="fw-bold">School Year</th>
                              <th class="fw-bold">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              include("db_connect.php");
                              $display_schedule = mysqli_query($conn, "SELECT section_id FROM $schedule WHERE faculty='".$_SESSION['SESS_FACULTY_ID']."' GROUP BY section_id ORDER BY section_id ASC")or die(mysqli_error());
                              if(mysqli_num_rows($display_schedule)<1) {
                                echo "<tr>";
                                  echo "<td colspan='9'>No schedule found.</td>";
                                echo "</tr>";
                              } 
                              else {
                                while($row_schedule = mysqli_fetch_array($display_schedule)) {
                                  $display_student = mysqli_query($conn, "SELECT * FROM $student WHERE section='".$row_schedule['section_id']."' AND status='active' ORDER BY sfname ASC");
                                  while($row_student = mysqli_fetch_array($display_student)) {
                                    $section_name = mysqli_query($conn, "SELECT * FROM $section WHERE secID='".$row_student['section']."'");
                                    while($row_secname = mysqli_fetch_array($section_name)) {
                                      echo "<tr>";
                                        echo "<td><a href='student-details?student_id=".$row_student['studID']."&&lrnno=".$row_student['lrnno']."'>".ucfirst($row_student['sfname'])." ".ucfirst($row_student['slname'])."</a></td>";
                                        echo "<td>".ucfirst($row_student['glevel'])."-".$row_secname['secname']."</td>";
                                        echo "<td>".ucfirst($row_student['gpa'])."</td>";
                                        echo "<td>".ucfirst($row_student['gender'])."</td>";
                                        echo "<td>".ucfirst($row_student['lrnno'])."</td>";
                                        echo "<td>".ucfirst($row_student['staddr'])."</td>";
                                        echo "<td>".ucfirst($row_student['cpno'])."</td>";
                                        echo "<td>".ucfirst($row_student['semail'])."</td>";
                                        echo "<td>";
                                          $q_syear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE syID='".$row_student['syear']."'");
                                          while($row_syear = mysqli_fetch_array($q_syear)) {
                                            echo $row_syear['syear'];
                                          }
                                        echo "</td>";
                                        echo "<td>".ucfirst($row_student['status'])."</td>";
                                      echo "</tr>";
                                    }
                                  }
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
            <div class="row">
              <div class="col-md-12">
                <div class="card bg-white">
                  <div class="card-header">
                    <h5 class="card-title text-uppercase font-weight-bold"><i class="nav-icon fa fa-calendar"></i> Schedule List</h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="table-responsive">
                        <table class="table table-striped example">
                          <thead>
                            <tr>
                              <th class="fw-bold">Grade Level & Section</th> 
                              <th class="fw-bold">Subject</th>
                              <th class="fw-bold">Time Start</th>
                              <th class="fw-bold">Time End</th>
                              <th class="fw-bold">Schedule Day</th>
                              <th class="fw-bold">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              include("db_connect.php");
                              date_default_timezone_set("Asia/Manila");
                              $display_schedule = mysqli_query($conn, "SELECT * FROM $schedule WHERE faculty='".$_SESSION['SESS_FACULTY_ID']."' ORDER BY section_id ASC");
                              if(mysqli_num_rows($display_schedule)<1) {
                                echo "<tr>";
                                  echo "<td colspan='6'>No schedule found.</td>";
                                echo "</tr>";
                              } 
                              else {
                                while($row_schedule = mysqli_fetch_array($display_schedule)) {
                                  echo "<tr>";
                                    echo "<td>";
                                      $q_section = mysqli_query($conn, "SELECT * FROM $section WHERE secID='".$row_schedule['section_id']."'");
                                      while($row_section = mysqli_fetch_array($q_section)) {
                                        echo "<a href='schedule-students?section=".$row_schedule['section_id']."&&subject=".$row_schedule['subj']."'>".$row_section['glevel']."-".$row_section['secname']."</a>";
                                      }
                                    echo "</td>";
                                    echo "<td>";
                                      $subj_q = mysqli_query($conn, "SELECT * FROM $subject WHERE suID='".$row_schedule['subj']."'");
                                      while($row_subj_q = mysqli_fetch_array($subj_q)) {
                                        echo $row_subj_q['sucode']."-".$row_subj_q['descr'];
                                      }
                                    echo "</td>";
                                    echo "<td>".date("h:i A", $row_schedule['time_start'])."</td>";
                                    echo "<td>".date("h:i A", $row_schedule['time_end'])."</td>";
                                    echo "<td>".ucfirst($row_schedule['sch_day'])."</td>";
                                    echo "<td>".ucfirst($row_schedule['status'])."</td>";
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
    <script src="../cnhsadmin/dist/js/jquery-3.5.1.js"></script>
    <script src="../cnhsadmin/dist/js/jquery.dataTables.min.js"></script>
    <script src="../cnhsadmin/dist/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(document).ready(function () {
          $('.example').DataTable();
      });
    </script>
  </body>
</html>
<?php ob_flush();?>