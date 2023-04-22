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
    <link rel="stylesheet" href="../cnhsadmin/dist/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript">
      function printtag(tagid) {
            var hashid = "#"+ tagid;
            var tagname =  $(hashid).prop("tagName").toLowerCase() ;
            var attributes = ""; 
            var attrs = document.getElementById(tagid).attributes;
              $.each(attrs,function(i,elem){
                attributes +=  " "+  elem.name+" ='"+elem.value+"' " ;
              })
            var divToPrint= $(hashid).html() ;
            var head = "<html><head>"+ $("head").html() + "</head>" ;
            var allcontent = head + "<body  onload='window.print()' >"+ "<" + tagname + attributes + ">" +  divToPrint + "</" + tagname + ">" +  "</body></html>"  ;
            var newWin=window.open('','Print-Window');
            newWin.document.open();
            newWin.document.write(allcontent);
            newWin.document.close();
            setTimeout(function(){newWin.close();},100);
           // setTimeout(function(){newWin.close();},10);
        }
    </script>
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
                  <li class="nav-item"><a href="events" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="fa fa-volume-off nav-icon fs-8"></i><p> Events</p></a></li>
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
              <li class="nav-item"><a href="reports" class="nav-link text-uppercase font-weight-bold shadow-sm p-3 active"><i class="nav-icon fa fa-tasks"></i><p> Report</p></a></li>
              <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-cogs"></i><p> Settings<i class="fas fa-angle-left right"></i></p></a>
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
                  <li class="breadcrumb-item">Students</li>
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
                    <div class="row">
                      <div class="col-md-6">
                        <nav class="navbar navbar-expand rounded">
                          <ul class="navbar-nav">
                            <li class="nav-item d-none d-sm-inline-block rounded border-bottom">
                              <a href="reports" class="nav-link shadow-sm border-bottom active rounded bg-light text-danger "><i class="nav-icon fa fa-calendar"></i>&nbsp;Schedule</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block rounded">
                              <a href="report-student" class="nav-link rounded shadow-sm border-bottom"><i class="nav-icon fa fa-users"></i>&nbsp;Students</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block rounded">
                              <a href="report-grades" class="nav-link rounded shadow-sm border-bottom"><i class="nav-icon fa fa-signal"></i>&nbsp;SF10-JHS</a>
                            </li>
                          </ul>
                        </nav>
                      </div>
                      <div class="col-md-6 text-right">
                        <form method="post" action="">
                          <div class="input-group">
                            <select name="qsection" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                              <option value="select">Select Section Here</option>
                              <?php 
                                include("db_connect.php");
                                $filter_schedule = mysqli_query($conn, "SELECT * FROM $schedule WHERE status='open' ORDER BY section_id ASC");
                                while($row_filter_sched = mysqli_fetch_array($filter_schedule)) {
                                  $filter_section = mysqli_query($conn, "SELECT * FROM $section WHERE secID='".$row_filter_sched['section_id']."'");
                                  while($row_filter_sec = mysqli_fetch_array($filter_section)) {
                                    $filter_grade_level = mysqli_query($conn, "SELECT * FROM $gradelevel WHERE glID='".$row_filter_sec['glevel']."'");
                                    while($row_filter_glevel = mysqli_fetch_array($filter_grade_level)) {
                                      echo "<option value='".$row_filter_sec['secID']."'>Grade ".$row_filter_glevel['level']."-".$row_filter_sec['secname']."</option>";
                                    }
                                  }
                                }
                                mysqli_close($conn);
                              ?>
                            </select>
                            <div class="input-group-append">
                              <button class="btn btn-outline-secondary" type="submit" name="FilterSchedule">Filter</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-5 float-end mt-3">
                  <button type="button" class="btn btn-primary  col-sm-5" onclick='printtag("DivIdToPrint");'/><i class="nav-icon fa fa-print"></i> Print this page</button></div>
                  <div class="card-body">
                    <div id='DivIdToPrint'>
                      <div class="row">
                        <h5 class="text-center col-md-12 font-weight-bold" >
                          <?php 
                            include("db_connect.php");
                            $q_scyear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'");
                            while($row_scyear = mysqli_fetch_array($q_scyear)) {
                              echo "School Year : ".$row_scyear['syear'];
                            }
                            mysqli_close($conn);
                          ?>
                        </h5>
                        <h4 class="text-center col-md-12 font-weight-bold pt-4 text-uppercase" >Schedule</h4>
                        <div class="table-responsive">
                          <table id="zero_config" class="table table-striped h6">
                            <thead>
                              <tr>
                                <th class="fw-bold">Grade Level & Section</th>
                                <th class="fw-bold">Subject</th>
                                <th class="fw-bold">Start Time</th>
                                <th class="fw-bold">End Time</th>
                                <th class="fw-bold">Schedule Day</th>
                                <th class="fw-bold">Students Enrolled</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                if(isset($_POST['FilterSchedule'])) {
                                  include("db_connect.php");
                                  date_default_timezone_set("Asia/Manila");
                                  $display_schedule = mysqli_query($conn, "SELECT * FROM $schedule WHERE section_id='".$_POST['qsection']."' ORDER BY section_id ASC");
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
                                            echo $row_section['glevel']."-".$row_section['secname'];
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
                                        echo "<td>".$row_schedule['sch_day']."</td>";
                                        echo "<td>";
                                          $q_students = mysqli_query($conn, "SELECT * FROM $student WHERE section='".$row_schedule['section_id']."' AND status='active'");
                                          echo mysqli_num_rows($q_students);
                                        echo "</td>";
                                      echo "</tr>";
                                    }
                                  }
                                  mysqli_close($conn);
                                }
                                else {
                                  include("db_connect.php");
                                  date_default_timezone_set("Asia/Manila");
                                  $display_schedule = mysqli_query($conn, "SELECT * FROM $schedule WHERE status='open' ORDER BY section_id ASC");
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
                                            echo $row_section['glevel']."-".$row_section['secname'];
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
                                        echo "<td>".$row_schedule['sch_day']."</td>";
                                        echo "<td>";
                                          $q_students = mysqli_query($conn, "SELECT * FROM $student WHERE section='".$row_schedule['section_id']."' AND status='active'");
                                          echo mysqli_num_rows($q_students);
                                        echo "</td>";
                                      echo "</tr>";
                                    }
                                  }
                                  mysqli_close($conn);
                                }
                              ?>
                            </tbody>
                          </table>
                        </div>
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
          $('#example').DataTable();
      });
    </script>
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
  ob_flush();
?>