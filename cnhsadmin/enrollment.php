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
              <li class="nav-item"><a href="enrollment" class="nav-link text-uppercase font-weight-bold shadow-sm p-3 active"><i class="nav-icon fa fa-user-plus"></i><p> Enrollment <span class="badge badge-info right">
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
                  <li class="breadcrumb-item">Enrollment</li>
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
                    <h5 class="card-title text-uppercase font-weight-bold"><i class="nav-icon fa fa-user-plus"></i> Enrollment List</h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <a href='new-enrollment' class="mb-2"><span class='badge bg-info rounded p-2'><i class='fas fa-plus'></i> Enroll New Student</span></a>
                      <div class="table-responsive">
                        <table id="zero_config" class="table table-striped h6">
                          <thead>
                            <tr>
                              <th class="fw-bold">First Name</th>
                              <th class="fw-bold">Last Name</th>
                              <th class="fw-bold">Grade Level</th>
                              <th class="fw-bold">GPA</th>
                              <th class="fw-bold">Gender</th>
                              <th class="fw-bold">LRN</th>
                              <th class="fw-bold">Address</th>
                              <th class="fw-bold">Contact #</th>
                              <th class="fw-bold">Email</th>
                              <th class="fw-bold">Requirements</th>
                              <th class="fw-bold">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              include("db_connect.php");
                              $display_student = mysqli_query($conn, "SELECT * FROM $student WHERE remarks='pending' AND status='pending' AND remarks='pending' ORDER BY sfname ASC");
                              if(mysqli_num_rows($display_student)<1) {
                                echo "<tr>";
                                  echo "<td colspan='10'>No record found.</td>";
                                echo "</tr>";
                              } 
                              else {
                                while($row_student = mysqli_fetch_array($display_student)) {
                                  $section_name = mysqli_query($conn, "SELECT * FROM $section WHERE secID='".$row_student['section']."'");
                                  while($row_secname = mysqli_fetch_array($section_name)) {
                                    echo "<tr>";
                                      echo "<td>".ucfirst($row_student['sfname'])."</td>";
                                      echo "<td>".ucfirst($row_student['slname'])."</td>";
                                      echo "<td>".ucfirst($row_student['glevel'])."-".$row_secname['secname']."</td>";
                                      echo "<td>".ucfirst($row_student['gpa'])."</td>";
                                      echo "<td>".ucfirst($row_student['gender'])."</td>";
                                      echo "<td>".ucfirst($row_student['lrnno'])."</td>";
                                      echo "<td>".ucfirst($row_student['staddr'])."</td>";
                                      echo "<td>".ucfirst($row_student['cpno'])."</td>";
                                      echo "<td>".ucfirst($row_student['semail'])."</td>";
                                      echo "<td>";
                                        $q_req = mysqli_query($conn, "SELECT * FROM $req WHERE lrnno='".$row_student['lrnno']."'");
                                        while($row_req = mysqli_fetch_array($q_req)) {
                                            echo "<a href='?download=".$row_req['req']."'>".$row_req['req']."</a><br>";
                                        }
                                        echo "</td>";
                                       echo "<td><a href='?accept=".$row_student['studID']."'><span class='badge bg-success rounded-pill'><i class='fas fa-pencil-alt text-dark p-1'></i> Accept</span></a> <a href='?reject=".$row_student['studID']."'><span class='badge bg-danger rounded-pill'><i class='fas fa-trash text-dark p-1'></i> Reject</span></a></td>";
                                    echo "</tr>";
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
          </div><!--/. container-fluid -->
        </section>
      </div>
      <?php include ("faculty_modal.php"); ?>
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
      $(document).ready(function() {
        $("input[name$='cars']").click(function() {
            var test = $(this).val();

            $("div.desc").hide();
            $("#Cars" + test).show();
        });
      });
    </script>>
    <script>
      $(document).ready(function () {
        $('#AddStudent').click(function (e) {
          e.preventDefault();
          var syear1 = $('#syear1').val();
          var glevel = $('#glevel').val();
          var etype = $('#etype').val();
          var psano = $('#psano').val();
          var lrnno = $('#lrnno').val();
          var gpano = $('#gpano').val();
          var sfname = $('#sfname').val();
          var slname = $('#slname').val();
          var mname = $('#mname').val();
          var bdate = $('#bdate').val();
          var gender = $('#gender').val();
          var pppp = $('#pppp').val();
          var ipconf = $('#ipconf').val();
          var mton = $('#mton').val();
          var cpnum = $('#cpnum').val();
          var semail = $('#semail').val();
          var saddr = $('#saddr').val();
          var zip = $('#zip').val();
          var faname = $('#faname').val();
          var moname = $('#moname').val();
          var mnum = $('#mnum').val();
          var lyear = $('#lyear').val();
          var scname = $('#scname').val();
          var scid = $('#scid').val();
          var scaddr = $('#scaddr').val();
          var dlearning = $('#dlearning').val();
          var agree = $('#agree').val();
          $.ajax
            ({
              type: "POST",
              url: "add_student.php",
              data: { "syear1": syear1, "glevel": glevel, "etype": etype, "psano": psano, "lrnno": lrnno, "gpano": gpano, "sfname": sfname, "slname": slname, "mname": mname, "bdate": bdate, "gender": gender, "pppp": pppp, "ipconf": ipconf, "mton": mton, "cpnum": cpnum, "semail": semail, "saddr": saddr, "zip": zip, "faname": faname, "moname": moname, "mnum": mnum, "lyear": lyear, "scname": scname, "scid": scid, "scaddr": scaddr, "dlearning": dlearning, "agree": agree },
              success: function (data) {
                $('.result').html(data);
                $('#enrollmentform')[0].reset();
              }
            });
        });
      });
    </script>
    <script>
      $(document).ready(function(){
        $(document).on('click', '.editfclty', function(){
          var id=$(this).val();
          var fname=$('#fname'+id).text();
          var lname=$('#lname'+id).text();
          var title=$('#title'+id).text();
          var educ=$('#educ'+id).text();
          var ofc=$('#ofc'+id).text();
          var email=$('#email'+id).text();
          var addr=$('#addr'+id).text();
          var con=$('#con'+id).text();
          
          $('#editFaculty').modal('show');
          $('#efname').val(fname);
          $('#elname').val(lname);
          $('#etitle').val(title);
          $('#eeduc').val(educ);
          $('#eofc').val(ofc);
          $('#eemail').val(email);
          $('#econ').val(con);
          $('#eaddr').val(addr);
          $('#eid').val(id);
        });
      });
    </script>
  </body>
</html>
<?php
  include("pmnhs_function.php");
  ManageTempEnrollment(); 
?>
<?php 
  ob_flush();
?>