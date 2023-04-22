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
    <script language="javascript">
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
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="../cnhsadmin/img/logo.png" alt="AdminLogo" height="150" width="150">
      </div>
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
              <li class="nav-item"><a href="events" class="nav-link text-uppercase font-weight-bold shadow-sm"><i class="fa fa-volume-off nav-icon fs-8"></i><p> Events</p></a></li>
              <li class="nav-item"><a href="events" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="fa fa-volume-off nav-icon fs-8"></i><p> Events</p></a></li>
              <li class="nav-item"><a href="schedule" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-calendar"></i><p> Schedule</p></a></li>
              <li class="nav-item"><a href="monitoring" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-hourglass"></i><p> Monitoring</i></p></a></li>
              <li class="nav-item"><a href="payment" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-check-square"></i><p> Payment</p></a></li>
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
                  <li class="breadcrumb-item">Report</li>
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
                              <a href="reports" class="nav-link shadow-sm border-bottom"><i class="nav-icon fa fa-calendar"></i>&nbsp;Schedule</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block rounded border-bottom">
                              <a href="report-student" class="nav-link rounded shadow-sm border-bottom"><i class="nav-icon fa fa-users"></i>&nbsp;Students</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block rounded">
                              <a href="report-grades" class="nav-link active  rounded bg-light text-danger shadow-sm border-bottom"><i class="nav-icon fa fa-signal"></i>&nbsp;SF10-JHS</a>
                            </li>
                          </ul>
                        </nav>
                      </div>
                      <div class="col-md-6 text-right">&nbsp;</div>
                    </div>
                  </div>
                  <div class="col-sm-5 float-end mt-3">
                  <button type="button" class="btn btn-primary  col-sm-5" onclick='printtag("DivIdToPrint");'/><i class="nav-icon fa fa-print"></i> Print Student List</button></div>
                  <div class="card-body">
                    
                      <div class="row">
                        <div class="col-md-5">
                          <div class="table-responsive">
                            <table id="example" class="table table-striped h6">
                              <thead>
                                <tr>
                                  <th class="fw-bold">Students Name</th>
                                  <th class="fw-bold">Grade Level</th>
                                  <th class="fw-bold">LRN</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                  include("db_connect.php");
                                  date_default_timezone_set("Asia/Manila");
                                  $display_student = mysqli_query($conn, "SELECT * FROM $student WHERE status='active' ORDER BY sfname ASC");
                                  if(mysqli_num_rows($display_student)<1) {
                                    echo "<tr>";
                                      echo "<td colspan='3'>No student found.</td>";
                                    echo "</tr>";
                                  } 
                                  else {
                                    while($row_student = mysqli_fetch_array($display_student)) {
                                      $section_name = mysqli_query($conn, "SELECT * FROM $section WHERE secID='".$row_student['section']."'");
                                      while($row_secname = mysqli_fetch_array($section_name)) {
                                        echo "<tr>";
                                          echo "<td><a href='?student_id=".$row_student['studID']."&&lrnno=".$row_student['lrnno']."'>".ucfirst($row_student['sfname'])." ".ucfirst($row_student['slname'])."</a></td>";
                                          echo "<td>";
                                            $grade_l = mysqli_query($conn, "SELECT * FROM $gradelevel WHERE glID='".$row_student['glevel']."'");
                                            while($row_glevel = mysqli_fetch_array($grade_l)) {
                                              echo ucfirst($row_glevel['level'])."-".$row_secname['secname'];
                                            }
                                          echo "</td>";
                                          echo "<td>".ucfirst($row_student['lrnno'])."</td>";
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
                        <div class="col-md-7">
                            <div id='DivIdToPrint'>
                              <div class="d-flex">
                                <div class="col-md-1">
                                  <img src="../cnhsadmin/img/dep_ed.png" width="40">
                                </div>
                                <div class="col-md-10">
                                  <table class="table table-sm table-borderless">
                                    <tr>
                                      <th><center>Republic of the Pilippines</center></th>
                                    </tr>
                                    <tr>
                                      <th><center>Department of Education</center></th>
                                    </tr>
                                  </table>
                                  <h5 class="text-center col-md-12 font-weight-bold">Learner Permanent Academic Record for Junior High School (SF10-JHS)</h5>
                                </div>
                                <div class="col-md-1">
                                  <img src="../cnhsadmin/img/deped_logo.png" width="40">
                                </div>
                              </div>
                              <h6 class="text-center col-md-12 font-weight-bold font-italic">
                                (Formerly Form 137)
                              </h6>
                            <div class="table-responsive">
                              <table id="zero_config" class="table table-sm table-borderless"> 
                                <tr>
                                  <th colspan="15" class="text-uppercase font-weight-bold bg-success text-center">Lerner's Information</th>
                                </tr>
                                <tr>
                                  <td>LAST NAME</td>
                                  <td>:</td>
                                  <td>
                                    <?php 
                                      if(isset($_GET['lrnno'])) {
                                        date_default_timezone_set("Asia/Manila");
                                        include("db_connect.php");
                                        $q_lname = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='".$_GET['lrnno']."'");
                                        while($row_lname = mysqli_fetch_array($q_lname)) {
                                          echo $row_lname['slname'];
                                        }
                                        mysqli_close($conn);
                                      }
                                      else {
                                        echo "_________________";
                                      }
                                    ?>
                                  </td>
                                  <td>FIRST NAME</td>
                                  <td>:</td>
                                  <td>
                                    <?php 
                                      if(isset($_GET['lrnno'])) {
                                        date_default_timezone_set("Asia/Manila");
                                        include("db_connect.php");
                                        $q_fname = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='".$_GET['lrnno']."'");
                                        while($row_fname = mysqli_fetch_array($q_fname)) {
                                          echo $row_fname['sfname'];
                                        }
                                        mysqli_close($conn);
                                      }
                                      else {
                                        echo "_________________";
                                      }
                                    ?>
                                  </td>
                                  <td>NAME EXT. (Jr, I, II)</td>
                                  <td>:</td>
                                  <td>_________________</td>
                                  <td>MIDDLE NAME</td>
                                  <td>:</td>
                                  <td>
                                    <?php 
                                      if(isset($_GET['lrnno'])) {
                                        date_default_timezone_set("Asia/Manila");
                                        include("db_connect.php");
                                        $q_mname = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='".$_GET['lrnno']."'");
                                        while($row_mname = mysqli_fetch_array($q_mname)) {
                                          echo $row_mname['slname'];
                                        }
                                        mysqli_close($conn);
                                      }
                                      else {
                                        echo "_________________";
                                      }
                                    ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Learner Reference Number (LRN)</td>
                                  <td>:</td>
                                  <td>
                                    <?php 
                                      if(isset($_GET['lrnno'])) {
                                        echo $_GET['lrnno'];
                                      }
                                      else {
                                        echo "_________________";
                                      }
                                    ?>
                                  </td>
                                  <td>Birthday (mm/dd/yyy)</td>
                                  <td>:</td>
                                  <td>
                                    <?php 
                                      if(isset($_GET['lrnno'])) {
                                        date_default_timezone_set("Asia/Manila");
                                        include("db_connect.php");
                                        $q_birth = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='".$_GET['lrnno']."'");
                                        while($row_birth = mysqli_fetch_array($q_birth)) {
                                          $dbirth = strtotime($row_birth['dbirth']);
                                          echo date("m/d/Y", $dbirth);
                                        }
                                        mysqli_close($conn);
                                      }
                                      else {
                                        echo "_________________";
                                      }
                                    ?>
                                  </td>
                                  <td>Sex</td>
                                  <td>:</td>
                                  <td>
                                    <?php 
                                      if(isset($_GET['lrnno'])) {
                                        date_default_timezone_set("Asia/Manila");
                                        include("db_connect.php");
                                        $q_sex = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='".$_GET['lrnno']."'");
                                        while($row_sex = mysqli_fetch_array($q_sex)) {
                                          echo ucfirst($row_sex['gender']);
                                        }
                                        mysqli_close($conn);
                                      }
                                      else {
                                        echo "_________________";
                                      }
                                    ?>
                                  </td>
                                </tr>
                              </table>
                              <table id="zero_config" class="table table-sm table-borderless"> 
                                <tr>
                                  <th colspan="15" class="text-uppercase font-weight-bold bg-success text-center">Eligibility for JHS Enrollment</th>
                                </tr>
                                <tr>
                                  <td><input type="checkbox">Elementary School Completer</td>
                                  <td></td>
                                  <td></td>
                                  <td>General Average</td>
                                  <td>:</td>
                                  <td>_________________</td>
                                  <td>Citation (if Any)</td>
                                  <td>:</td>
                                  <td>_________________</td>
                                </tr>
                                <tr>
                                  <td>Name of Elementary School</td>
                                  <td>:</td>
                                  <td>_________________</td>
                                  <td>School ID</td>
                                  <td>:</td>
                                  <td>_________________</td>
                                  <td>Address of School</td>
                                  <td>:</td>
                                  <td>_________________</td>
                                </tr>
                              </table>
                              <table id="zero_config" class="table table-sm table-borderless"> 
                                <tr>
                                  <th colspan="15">Other Credential Presented</th>
                                </tr>
                                <tr>
                                  <td><input type="checkbox">PEPT Passer</td>
                                  <td></td>
                                  <td></td>
                                  <td>Rating</td>
                                  <td>:</td>
                                  <td>_________________</td>
                                  <td><input type="checkbox">ALS A & E Passer</td>
                                  <td></td>
                                  <td></td>
                                  <td>Rating</td>
                                  <td>:</td>
                                  <td>_________________</td>
                                  <td><input type="checkbox">Others (Pls. Specify)</td>
                                  <td>:</td>
                                  <td>_________________</td>
                                </tr>
                                <tr>
                                  <td>Date of Examination/Assessment (mm/dd/yyyy)</td>
                                  <td>:</td>
                                  <td>_________________</td>
                                  <td>Name and Address of Testing Center</td>
                                  <td>:</td>
                                  <td>_________________</td>
                                </tr>
                              </table>
                              <?php 
                                if(isset($_GET['student_id'])) {
                                  include("db_connect.php");
                                  $q_grades = mysqli_query($conn, "SELECT * FROM $grades WHERE student_id='".$_GET['lrnno']."'");
                                  while($row_grades = mysqli_fetch_array($q_grades)) {
                                    $student_subject = mysqli_query($conn, "SELECT * FROM $subject WHERE suID='".$row_grades['subject']."'");
                                    while($row_stud_subj = mysqli_fetch_array($student_subject)) {
                              ?>
                                      <table id="zero_config" class="table table-sm table-borderless"> 
                                        <tr>
                                            <th colspan="12" class="text-uppercase font-weight-bold bg-success text-center">Scholastic Record</th>
                                          </tr>
                                          <tr>
                                            <td>School</td>
                                            <td>:</td>
                                            <td>_________________</td>
                                            <td>School ID</td>
                                            <td>:</td>
                                            <td>_________________</td>
                                            <td>District</td>
                                            <td>:</td>
                                            <td>_________________</td>
                                            <td>Division</td>
                                            <td>:</td>
                                            <td>_________________</td>
                                        </tr>
                                        <tr>
                                            <td>Region</td>
                                            <td>:</td>
                                            <td>_________________</td>
                                            <td>Classified as Grade</td>
                                            <td>:</td>
                                            <td>_________________</td>
                                            <td>School Year</td>
                                            <td>:</td>
                                            <td>_________________</td>
                                            <td>Name of Adviser/Teacher</td>
                                            <td>:</td>
                                            <td>_________________</td>
                                        </tr>
                                        <tr>
                                            <td>Signature</td>
                                            <td>:</td>
                                            <td>_________________</td>
                                        </tr>
                                      </table>
                                      <table id="zero_config" class="table table-sm table-bordered"> 
                                        <tr> 
                                          <th rowspan="2" class="text-center p-4">Learning Areas</th> 
                                          <th colspan="4" class="text-center">Quarterly Rating</th>
                                          <th rowspan="2" class="text-center p-4">Final Rating</th>
                                          <th rowspan="2" class="text-center p-4">Remarks</th> 
                                        </tr> 
                                        <tr> 
                                          <th class="text-center">1<sup>st</sup></th> 
                                          <th class="text-center">2<sup>nd</sup></th> 
                                          <th class="text-center">3<sup>rd</sup></th> 
                                          <th class="text-center">4<sup>th</sup></th> 
                                        </tr>
                              <?php 
                                        echo "<tr>";
                                          echo "<td>".$row_stud_subj['descr']."</td>";
                                          echo "<td>".$row_grades['first']."</td>";
                                          echo "<td>".$row_grades['second']."</td>";
                                          echo "<td>".$row_grades['third']."</td>";
                                          echo "<td>".$row_grades['fourth']."</td>";
                                          echo "<td>".round($row_grades['final'])."</td>";
                                          echo "<td>";
                                            if(round($row_grades['final'])<75) {
                                              echo "<span class='text-danger'>Failed</span>";
                                            }
                                            else {
                                              echo "Pass";
                                            }
                                          echo "</td>";
                                        echo "</tr>";
                                    }
                                  
                                        echo "<tr>";
                                          echo "<td colspan='5' class='text-right font-weight-bold'>General Average</td>";
                                          echo "<td>";
                                            $total_grades = 0;
                                            $q_grades_gpa = mysqli_query($conn, "SELECT * FROM $grades WHERE student_id='".$_GET['lrnno']."'");
                                            $gpa_num = mysqli_num_rows($q_grades_gpa);
                                            while($row_grades_gpa = mysqli_fetch_array($q_grades_gpa)) {
                                              $total_grades += $row_grades_gpa['final'];
                                            }
                                            if($gpa_num>0) {
                                              $gpa_final = $total_grades/$gpa_num;
                                              if($gpa_final<1) {
                                                echo "";
                                              }
                                              else {
                                                echo round($gpa_final);
                                              }
                                            }
                                          echo "</td>";
                                          echo "<td colspan='2'>";
                                            if($gpa_num>0) {
                                              if($gpa_final<75) {
                                                echo "<span class='text-danger'>Failed</span>";
                                              }
                                              else {
                                                echo "Pass";
                                              }
                                            }
                                            else {
                                              echo "";
                                            }
                                          echo "</td>";
                                        echo "</tr>";
                                        mysqli_close($conn);
                                      echo "</table>";
                                  }
                                }
                              ?>
                            </div>
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
  </body>
</html>
<?php 
  ob_flush();
?>