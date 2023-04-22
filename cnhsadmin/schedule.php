<?php ob_start();?>
<?php include("auth.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Commonwealth National High School</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="dist/css/font_awsome.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <script language="javascript" type="text/javascript">
    <!--
    /****************************************************
         Author: Eric King
         Url: http://redrival.com/eak/index.shtml
         This script is free to use as long as this info is left in
         Featured on Dynamic Drive script library (http://www.dynamicdrive.com)
    ****************************************************/
    var win=null;
    function NewWindow(mypage,myname,w,h,scroll,pos){
    if(pos=="random"){LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
    if(pos=="center"){LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
    else if((pos!="center" && pos!="random") || pos==null){LeftPosition=0;TopPosition=20}
    settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
    win=window.open(mypage,myname,settings);}
    // -->
    </script>
  </head>
  <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
      <?php include("nav.php");?>
      <aside class="main-sidebar sidebar-dark-warning elevation-4">
        <span class="brand-link bg-danger">
          <img src="img/logo.png" alt="CNHS Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-bold">Commonwealth NHS</span>
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
              <li class="nav-item"><a href="schedule" class="nav-link text-uppercase font-weight-bold shadow-sm p-3 active"><i class="nav-icon fa fa-calendar"></i><p> Schedule</p></a></li>
              <li class="nav-item"><a href="monitoring" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-hourglass"></i><p> Monitoring</i></p></a></li>
              <li class="nav-item"><a href="students" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-users"></i><p> Students<span class="badge badge-info right">
                <?php
                  include("db_connect.php");
                  $count_student = mysqli_query($conn, "SELECT * FROM $student WHERE status='active'");
                  echo mysqli_num_rows($count_student); 
                  mysqli_close($conn);
                ?>
              </span></p></a></li>
              <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-cogs"></i><p> Settings<i class="fas fa-angle-left right"></i></p></a>
                <ul class="nav nav-treeview">
                  <li class="nav-item"><a href="school-year" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="fa fa-bars nav-icon"></i><p> School Year</p></a></li>
                  <li class="nav-item"><a href="faculty" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="fa fa-bars nav-icon"></i><p> Faculty</p></a></li>
                  <li class="nav-item"><a href="grade-level" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="fa fa-bars nav-icon"></i><p> Grade Level</p></a></li>
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
                  <li class="breadcrumb-item">Schedule</li>
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
                    <h5 class="card-title text-uppercase font-weight-bold"><i class="nav-icon fa fa-calendar"></i> 
                      Schedule List
                    </h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <a href='grade-level' class="mb-2"><span class='badge bg-info rounded p-2'><i class='fas fa-plus'></i> Add New Schedule</span></a>
                      <div class="table-responsive">
                        <table id="zero_config" class="table table-striped h6">
                          <thead>
                            <tr>
                              <th class="fw-bold">Grade Level & Section</th>
                              <th class="fw-bold">Total Schedule</th>
                              <th class="fw-bold">Students Enrolled</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              include("db_connect.php");
                              date_default_timezone_set("Asia/Manila");
                              $display_schedule = mysqli_query($conn, "SELECT section_id FROM $schedule GROUP BY section_id ORDER BY section_id ASC");
                              if(mysqli_num_rows($display_schedule)<1) {
                                echo "<tr>";
                                  echo "<td colspan='5'>No schedule found.</td>";
                                echo "</tr>";
                              } 
                              else {
                                while($row_schedule = mysqli_fetch_array($display_schedule)) {
                                  echo "<tr>";
                                    echo "<td>";
                                      $q_section = mysqli_query($conn, "SELECT * FROM $section WHERE secID='".$row_schedule['section_id']."'");
                                      while($row_section = mysqli_fetch_array($q_section)) {
                            ?>
                                        <a href="schedule-details?grade_level=<?php echo $row_schedule['section_id'];?>" onclick="NewWindow(this.href,'Schedule Details','800','500','no','center');return false" onfocus="this.blur()"><?php echo $row_section['glevel']."-".$row_section['secname'];?></a>
                            <?php          
                                      }
                                    echo "</td>";
                                    echo "<td>";
                                      $display_schedule12 = mysqli_query($conn, "SELECT * FROM $schedule WHERE section_id='".$row_schedule['section_id']."'");
                                      echo mysqli_num_rows($display_schedule12);
                                    echo "</td>";
                                    echo "<td>";
                                      $q_students = mysqli_query($conn, "SELECT * FROM $student WHERE section='".$row_schedule['section_id']."' AND status='active'");
                                      echo "<a href='students?section=".$row_schedule['section_id']."'>".mysqli_num_rows($q_students);
                                    echo "</td>";
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
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="dist/js/adminlte.js"></script>
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <script src="plugins/chart.js/Chart.min.js"></script>
    <script src="dist/js/pages/dashboard2.js"></script>
    <script>
      $(document).on('click', '.delete_section', function(){
        var id = $(this).data('id');
     
        swal.fire({
            title: 'Are you sure you want to delete?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.value){
              $.ajax({
                url: 'delete_function.php?action=delete_section',
                type: 'POST',
                  data: 'id='+id,
                  dataType: 'json'
              })
              .done(function(response){
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Success',
                    text: 'Section was successfully deleted',
                    footer: '',
                    showConfirmButton: false,
                    timer: 2000
                  }).then(function() {
                    window.location = 'section';
                });
              fetch();
              })
              .fail(function(){
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    position: 'top-end',
                    title: 'Failed',
                    text: 'Section was not successfully deleted',
                    footer: '',
                    showConfirmButton: false,
                    timer: 2000
                  }).then(function() {
                    window.location = 'section';
                });
              });
            }
     
        })
     
      });
  </script>
  </body>
</html>
<?php
  include("pmnhs_function.php");
  ManageSchedule();
?>
<?php 
  ob_flush();
?>