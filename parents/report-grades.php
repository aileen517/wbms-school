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
              <li class="nav-item"><a href="enrollment" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-user-plus"></i><p> Enrollment </p></a></li>
              <li class="nav-item"><a href="events" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="fa fa-volume-off nav-icon fs-8"></i><p> Events</p></a></li>
              <li class="nav-item"><a href="schedule" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-calendar"></i><p> My Schedule</p></a></li>
              <li class="nav-item"><a href="students" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-users"></i><p> My Students</p></a></li>
              <li class="nav-item"><a href="reports" class="nav-link text-uppercase font-weight-bold shadow-sm p-3 active"><i class="nav-icon fa fa-tasks"></i><p> Report</p></a></li>
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
                              <a href="report-grades" class="nav-link active  rounded bg-light text-danger shadow-sm border-bottom"><i class="nav-icon fa fa-signal"></i>&nbsp;Grades</a>
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
                                  $display_schedule = mysqli_query($conn, "SELECT * FROM $schedule WHERE faculty='".$_SESSION['SESS_FACULTY_ID']."' GROUP BY section_id")or die(mysqli_error());
                                  if(mysqli_num_rows($display_schedule)<1) {
                                    echo "<tr>";
                                      echo "<td colspan='9'>No schedule found.</td>";
                                    echo "</tr>";
                                  } 
                                  else {
                                    while($row_schedule = mysqli_fetch_array($display_schedule)) {
                                      $display_student = mysqli_query($conn, "SELECT * FROM $student WHERE section='".$row_schedule['section_id']."' AND status='active' ORDER BY sfname ASC");
                                      if(mysqli_num_rows($display_student)<1) {
                                        echo "<tr>";
                                          echo "<td colspan='9'>No student found.</td>";
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
                              <h5 class="text-center col-md-12 font-weight-bold text-uppercase">Report On Learning Progress And Achievement</h5>
                              <h6 class="text-center col-md-12 font-weight-bold" >
                                <?php 
                                  include("db_connect.php");
                                  $q_scyear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'");
                                  while($row_scyear = mysqli_fetch_array($q_scyear)) {
                                    echo "School Year : ".$row_scyear['syear'];
                                  }
                                  mysqli_close($conn);
                                ?>
                              </h6>
                               <h6 class="col-md-12 font-weight-bold" >
                                <?php 
                                  if(isset($_GET['lrnno'])) {
                                  include("db_connect.php");
                                    $q_stname = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='".$_GET['lrnno']."'");
                                    while($row_stname = mysqli_fetch_array($q_stname)) {
                                      echo "Student Name : ".$row_stname['sfname']." ".$row_stname['slname'];
                                    }
                                    mysqli_close($conn);
                                  }
                                  else {
                                    echo "";
                                  }
                                ?>
                              </h6>
                              <h6 class="col-md-12 font-weight-bold" >
                                <?php 
                                  if(isset($_GET['lrnno'])) {
                                    echo "LRN No. : ".$_GET['lrnno'];
                                  }
                                  else {
                                    echo "";
                                  }
                                ?>
                              </h6>
                            <div class="table-responsive">
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
                                  include("db_connect.php");
                                  if(isset($_GET['student_id'])) {
                                    $syear_id = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'");
                                    while($row_syear = mysqli_fetch_array($syear_id)) {
                                      $q_grades = mysqli_query($conn, "SELECT * FROM $grades WHERE syear='".$row_syear['syID']."' AND student_id='".$_GET['lrnno']."'");
                                      while($row_grades = mysqli_fetch_array($q_grades)) {
                                        $student_subject = mysqli_query($conn, "SELECT * FROM $subject WHERE suID='".$row_grades['subject']."'");
                                        while($row_stud_subj = mysqli_fetch_array($student_subject)) {
                                          echo "<tr>";
                                            echo "<td>".$row_stud_subj['descr']."</td>";
                                            echo "<td>".$row_grades['first']."</td>";
                                            echo "<td>".$row_grades['second']."</td>";
                                            echo "<td>".$row_grades['third']."</td>";
                                            echo "<td>".$row_grades['fourth']."</td>";
                                            echo "<td>".round($row_grades['final'])."</td>";
                                            echo "<td>";
                                              if(round($row_grades['final'])=="") {
                                                echo "";
                                              }
                                              else if(round($row_grades['final'])<75) {
                                                echo "<span class='text-danger'>Failed</span>";
                                              }
                                              else {
                                                echo "Pass";
                                              }
                                            echo "</td>";
                                          echo "</tr>";
                                        }
                                      }
                                    }
                                    echo "<tr>";
                                      echo "<td colspan='5' class='text-right font-weight-bold'>General Average</td>";
                                      echo "<td>";
                                        $total_grades = 0;
                                        $syear_grades = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'");
                                        while($row_syear_grades = mysqli_fetch_array($syear_grades)) {
                                          $q_grades_gpa = mysqli_query($conn, "SELECT * FROM $grades WHERE syear='".$row_syear_grades['syID']."' AND student_id='".$_GET['lrnno']."'");
                                          $gpa_num = mysqli_num_rows($q_grades_gpa);
                                          while($row_grades_gpa = mysqli_fetch_array($q_grades_gpa)) {
                                            if($row_grades_gpa['final']>0) {
                                              $total_grades += $row_grades_gpa['final'];
                                            }
                                            else {
                                              echo $total_grades=0;
                                            }
                                          }
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
                                          if($gpa_final=="") {
                                            echo "";
                                          }
                                          else if($gpa_final<75) {
                                            echo "<span class='text-danger'>Failed</span>";
                                          }
                                          else if($gpa_final>=75) {
                                            echo "Pass";
                                          }
                                        }
                                        else {
                                          echo "";
                                        }
                                      echo "</td>";
                                    echo "</tr>";
                                    mysqli_close($conn);
                                  }
                                ?>
                              </table>
                              <table> 
                                <tr>
                                  <th>Description</th>
                                  <th>Grading Scale</th>
                                  <th>Remarks</th>
                                </tr>
                                <tr>
                                  <td>Outstanding</td>
                                  <td>90-100</td>
                                  <td>Passed</td>
                                </tr>
                                <tr>
                                  <td>Very Satisfactory</td>
                                  <td>85-89</td>
                                  <td>Passed</td>
                                </tr>
                                <tr>
                                  <td>Satisfactory</td>
                                  <td>80-84</td>
                                  <td>Passed</td>
                                </tr>
                                <tr>
                                  <td>Fairly Satisfactory</td>
                                  <td>75-79</td>
                                  <td>Passed</td>
                                </tr>
                                <tr>
                                  <td>Did Not Meet Expectation</td>
                                  <td>Below 75</td>
                                  <td>Failed</td>
                                </tr>
                              </table>
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