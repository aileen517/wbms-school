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
              <li class="nav-item"><a href="students" class="nav-link text-uppercase font-weight-bold shadow-sm p-3 active"><i class="nav-icon fa fa-users"></i><p> Students<span class="badge badge-info right">
                <?php
                  include("db_connect.php");
                  $count_student = mysqli_query($conn, "SELECT * FROM $student WHERE status='active'");
                  echo mysqli_num_rows($count_student); 
                  mysqli_close($conn);
                ?>
              </span></p></a></li>
              <li class="nav-item"><a href="reports" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-tasks"></i><p> Report</p></a></li>
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
                  <li class="breadcrumb-item">
                    <?php
                      include("db_connect.php");
                      $student_name = mysqli_query($conn, "SELECT * FROM $student WHERE studID='".$_GET['student_id']."'"); 
                      while($row_student_name = mysqli_fetch_array($student_name)) {
                        echo $row_student_name['sfname']." ".$row_student_name['slname'];
                      }
                      mysqli_close($conn);
                    ?>
                  </li>
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
                        <h5 class="card-title text-uppercase font-weight-bold"><i class="nav-icon fa fa-users"></i> 
                          Student Details
                        </h5>
                      </div>
                      <div class="col-md-6 text-right">&nbsp;</div>
                    </div>
                  </div>
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active text-uppercase border-right" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link text-uppercase border-right" id="schedule-tab" data-toggle="tab" data-target="#schedule" type="button" role="tab" aria-controls="schedule" aria-selected="false">Schedule</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link text-uppercase border-right" id="report-tab" data-toggle="tab" data-target="#report" type="button" role="tab" aria-controls="report" aria-selected="false">Grades</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link text-uppercase" id="school-tab" data-toggle="tab" data-target="#school" type="button" role="tab" aria-controls="school" aria-selected="false">School History</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link text-uppercase" id="upload-tab" data-toggle="tab" data-target="#upload" type="button" role="tab" aria-controls="upload" aria-selected="false">Files Uploaded</button>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="table-responsive col-md-6">
                          <table id="zero_config" class="table table-striped h6 mt-2">
                            <?php
                              if(isset($_GET['student_id'])) {
                                include("db_connect.php");
                                $tudent = mysqli_query($conn, "SELECT * FROM $student WHERE studID='".$_GET['student_id']."'");
                                while($row_student = mysqli_fetch_array($tudent)) {
                                  $student_section = mysqli_query($conn, "SELECT * FROM $section WHERE secID='".$row_student['section']."'");
                                  while($row_student_section = mysqli_fetch_array($student_section)) {
                                    echo "<tr>";
                                      echo "<td>Student Name</td>";
                                      echo "<td>:</td>";
                                      echo "<td>".$row_student['sfname']." ".$row_student['slname']."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                      echo "<td>Grade Level</td>";
                                      echo "<td>:</td>";
                                      echo "<td>".ucfirst($row_student['glevel'])."-".$row_student_section['secname']."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                      echo "<td>PSA Birth Certificate No.</td>";
                                      echo "<td>:</td>";
                                      echo "<td>".$row_student['psano']."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                      echo "<td>Learner Reference No. (LRN).</td>";
                                      echo "<td>:</td>";
                                      echo "<td>".$row_student['lrnno']."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                      echo "<td>GPA</td>";
                                      echo "<td>:</td>";
                                      echo "<td>".$row_student['gpa']."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                      echo "<td>Date of Birth</td>";
                                      echo "<td>:</td>";
                                      echo "<td>".$row_student['dbirth']."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                      echo "<td>Sex</td>";
                                      echo "<td>:</td>";
                                      echo "<td>".ucfirst($row_student['gender'])."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                      echo "<td>Belonging to Indigenous Peoples (IP) Community/Indigenous Cultural Community?</td>";
                                      echo "<td>:</td>";
                                      echo "<td>".ucfirst($row_student['indigent'])."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                      echo "<td>If Yes, please specify</td>";
                                      echo "<td>:</td>";
                                      echo "<td>".ucfirst($row_student['ind_details'])."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                      echo "<td>Mother Tongue</td>";
                                      echo "<td>:</td>";
                                      echo "<td>".ucfirst($row_student['mtongue'])."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                      echo "<td>Cellphone No.</td>";
                                      echo "<td>:</td>";
                                      echo "<td>".ucfirst($row_student['cpno'])."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                      echo "<td>Email Address</td>";
                                      echo "<td>:</td>";
                                      echo "<td>".$row_student['semail']."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                      echo "<td>Complete Address</td>";
                                      echo "<td>:</td>";
                                      echo "<td>".$row_student['staddr']."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                      echo "<td>Zip Code</td>";
                                      echo "<td>:</td>";
                                      echo "<td>".$row_student['zcode']."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                      echo "<td>Father's Name</td>";
                                      echo "<td>:</td>";
                                      echo "<td>".$row_student['faname']."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                      echo "<td>Mother's Maiden Name</td>";
                                      echo "<td>:</td>";
                                      echo "<td>".$row_student['moname']."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                      echo "<td>Cellphone No.</td>";
                                      echo "<td>:</td>";
                                      echo "<td>".$row_student['pacon']."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                      echo "<td>Last School Year Completed</td>";
                                      echo "<td>:</td>";
                                      echo "<td>".$row_student['lyear']."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                      echo "<td>School Name</td>";
                                      echo "<td>:</td>";
                                      echo "<td>".$row_student['scname']."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                      echo "<td>School ID</td>";
                                      echo "<td>:</td>";
                                      echo "<td>".$row_student['scid']."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                      echo "<td>School Address</td>";
                                      echo "<td>:</td>";
                                      echo "<td>".$row_student['scaddr']."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                      echo "<td>Preferred Distance Learning Modality/ies</td>";
                                      echo "<td>:</td>";
                                      echo "<td>";
                                        if($row_student['method']=="onl") {
                                          echo "Online";
                                        }
                                        else if($row_student['method']=="mprint") {
                                          echo "Modular (Print)";
                                        }
                                        else if($row_student['method']=="mdigital") {
                                          echo "Modular (Digital)";
                                        }
                                        else if($row_student['method']=="etv") {
                                          echo "Educational TV";
                                        }
                                        else if($row_student['method']=="radio") {
                                          echo "Radio-based instruction";
                                        }
                                        else if($row_student['method']=="home") {
                                          echo "Homeschooling";
                                        }
                                        else if($row_student['method']=="blended") {
                                          echo "Blended";
                                        }
                                      echo "</td>";
                                    echo "</tr>";
                                  }
                                }
                                mysqli_close($conn);
                              }
                            ?>
                          </table>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="schedule" role="tabpanel" aria-labelledby="schedule-tab">
                        <div class="table-responsive">
                          <table id="zero_config" class="table table-striped h6">
                            <thead>
                              <tr>
                                <th class="fw-bold">Subject</th>
                                <th class="fw-bold">Start Time</th>
                                <th class="fw-bold">End Time</th>
                                <th class="fw-bold">Schedule Day</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                include("db_connect.php");
                                date_default_timezone_set("Asia/Manila");
                                $student_q = mysqli_query($conn, "SELECT * FROM $student WHERE studID='".$_GET['student_id']."'");
                                while($row_stud = mysqli_fetch_array($student_q)) {
                                  $display_schedule = mysqli_query($conn, "SELECT * FROM $schedule WHERE section_id='".$row_stud['section']."' ORDER BY section_id ASC");
                                  if(mysqli_num_rows($display_schedule)<1) {
                                    echo "<tr>";
                                      echo "<td colspan='5'>No schedule found.</td>";
                                    echo "</tr>";
                                  } 
                                  else {
                                    while($row_schedule = mysqli_fetch_array($display_schedule)) {
                                      echo "<tr>";
                                        echo "<td>";
                                          $subj_q = mysqli_query($conn, "SELECT * FROM $subject WHERE suID='".$row_schedule['subj']."'");
                                          while($row_subj_q = mysqli_fetch_array($subj_q)) {
                                            echo $row_subj_q['sucode']."-".$row_subj_q['descr'];
                                          }
                                        echo "</td>";
                                        echo "<td>".date("h:i A", $row_schedule['time_start'])."</td>";
                                        echo "<td>".date("h:i A", $row_schedule['time_end'])."</td>";
                                        echo "<td>".$row_schedule['sch_day']."</td>";
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
                      <div class="tab-pane fade" id="report" role="tabpanel" aria-labelledby="report-tab">
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
                              $syear_id = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'");
                              while($row_syear = mysqli_fetch_array($syear_id)) {
                                $q_grades = mysqli_query($conn, "SELECT * FROM $grades WHERE syear='".$row_syear['syID']."' AND student_id='".$_GET['lrnno']."'");
                                if(mysqli_num_rows($q_grades)<1) {
                                  echo "<tr>";
                                    echo "<td colspan='8' class='text-center'>No Grades added.</td>";
                                  echo "</tr>";
                                }
                                else {
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
                                        if(round($row_grades['final'])<75) {
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
                              }
                              echo "<tr>";
                                echo "<td colspan='5' class='text-right font-weight-bold'>GPA</td>";
                                echo "<td>";
                                  $total_grades = 0;
                                  $gpa_final = 0;
                                  $syear_grades = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'");
                                  while($row_syear_grades = mysqli_fetch_array($syear_grades)) {
                                    $q_grades_gpa = mysqli_query($conn, "SELECT * FROM $grades WHERE syear='".$row_syear_grades['syID']."' AND student_id='".$_GET['lrnno']."'");
                                   $gpa_num = mysqli_num_rows($q_grades_gpa);
                                    while($row_grades_gpa = mysqli_fetch_array($q_grades_gpa)) {
                                      if($row_grades_gpa['final']>0) {
                                        $total_grades += $row_grades_gpa['final'];
                                      }
                                      else {
                                        echo "";
                                      }
                                    }
                                  }
                                  if($gpa_num>0) {
                                    echo $gpa_final = round($total_grades/$gpa_num);
                                  }
                                  else {
                                    echo "";
                                  }
                                echo "</td>";
                                echo "<td colspan='2'>";
                                  if($gpa_num<1) {
                                    echo "";
                                  }
                                  else {
                                    if($gpa_final=="") {
                                      echo "";
                                    }
                                    else if($gpa_final<75) {
                                      echo "<span class='text-danger'>Failed</span>";
                                    }
                                    else if($gpa_final>=75){
                                      echo "Pass";
                                    }
                                  }
                                echo "</td>";
                              echo "</tr>";
                              mysqli_close($conn);
                            ?>
                          </table>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                        <div class="table-responsive">
                          <table id="zero_config" class="table table-striped h6">
                            <thead>
                              <tr>
                                <th class="fw-bold">Date</th>
                                <th class="fw-bold">Amount</th>
                                <th class="fw-bold">Change</th>
                                <th class="fw-bold">Balance</th>
                                <th class="fw-bold">School Year</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                include("db_connect.php");
                                date_default_timezone_set("Asia/Manila");
                                $payment_q = mysqli_query($conn, "SELECT * FROM $payment WHERE student_id='".$_GET['student_id']."'");
                                if(mysqli_num_rows($payment_q)<1) {
                                  echo "<tr>";
                                    echo "<td colspan='5'>No payment found.</td>";
                                  echo "</tr>";
                                }
                                else {
                                  while($row_payment = mysqli_fetch_array($payment_q)) {
                                    echo "<tr>";
                                      echo "<td>".date("m/d/Y", $row_payment['pmtdate'])."</td>";
                                      echo "<td>".number_format($row_payment['amount'], 2)."</td>";
                                      echo "<td>".number_format($row_payment['pchange'], 2)."</td>";
                                      echo "<td>".number_format($row_payment['balance'], 2)."</td>";
                                      echo "<td>";
                                        $q_year = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE syID='".$row_payment['syear']."'");
                                        while($row_year = mysqli_fetch_array($q_year)) {
                                          echo $row_year['syear'];
                                        }
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
                      <div class="tab-pane fade" id="school" role="tabpanel" aria-labelledby="school-tab">
                        <div class="table-responsive">
                          <table id="zero_config" class="table table-striped h6">
                            <thead>
                              <tr>
                                 <th class="fw-bold">School Year</th>
                                <th class="fw-bold">Grade Level</th>
                                <th class="fw-bold">GPA</th>
                                <th class="fw-bold">Learning Method</th>
                                <th class="fw-bold">Last School Year Attended</th>
                                <th class="fw-bold">School Name</th>
                                <th class="fw-bold">School ID</th>
                                <th class="fw-bold">Address</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                include("db_connect.php");
                                $q_student = mysqli_query($conn, "SELECT * FROM $student WHERE studID='".$_GET['student_id']."'");
                                while($row_student = mysqli_fetch_array($q_student)) {
                                  $display_history = mysqli_query($conn, "SELECT * FROM $history WHERE lrnno='".$row_student['lrnno']."'");
                                  if(mysqli_num_rows($display_history)<1) {
                                    echo "<tr>";
                                      echo "<td colspan='8'>No record found.</td>";
                                    echo "</tr>";
                                  } 
                                  else {
                                    while($row_history = mysqli_fetch_array($display_history)) {
                                      $section_name = mysqli_query($conn, "SELECT * FROM $section WHERE secID='".$row_history['section']."'");
                                      while($row_secname = mysqli_fetch_array($section_name)) {
                                        echo "<tr>";
                                          echo "<td>"; 
                                            $his_syear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE syID='".$row_history['syear']."'");
                                            while($row_hsyear = mysqli_fetch_array($his_syear)) {
                                              echo $row_hsyear['syear'];
                                            }
                                          echo "</td>";
                                          echo "<td>".ucfirst($row_history['glevel'])."-".$row_secname['secname']."</td>";
                                          echo "<td>".ucfirst($row_history['gpa'])."</td>";
                                          echo "<td>";
                                            if($row_history['method']=="onl") {
                                              echo "Online";
                                            }
                                            else if($row_history['method']=="mprint") {
                                              echo "Modular (Print)";
                                            }
                                            else if($row_history['method']=="mdigital") {
                                              echo "Modular (Digital)";
                                            }
                                            else if($row_history['method']=="etv") {
                                              echo "Educational TV";
                                            }
                                            else if($row_history['method']=="radio") {
                                              echo "Radio-based instruction";
                                            }
                                            else if($row_history['method']=="home") {
                                              echo "Homeschooling";
                                            }
                                            else if($row_history['method']=="blended") {
                                              echo "Blended";
                                            }
                                          echo "</td>";
                                          echo "<td>".ucfirst($row_history['lyear'])."</td>";
                                          echo "<td>".ucfirst($row_history['scname'])."</td>";
                                          echo "<td>".ucfirst($row_history['scid'])."</td>";
                                          echo "<td>".ucfirst($row_history['scaddr'])."</td>";
                                        echo "</tr>";
                                      }
                                    }
                                  }
                                  mysqli_close($conn);
                                }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="tab-pane fade bordered" id="upload" role="tabpanel" aria-labelledby="upload-tab">
                          <fieldset class="border p-2"><legend class="w-auto">Click file link to download</legend>
                          <?php
                            if(isset($_GET['lrnno'])) {
                                include("db_connect.php");
                                $q_req = mysqli_query($conn, "SELECT * FROM $req WHERE lrnno='".$_GET['lrnno']."'");
                                while($row_req = mysqli_fetch_array($q_req)) {
                                    echo "<a href='?download=".$row_req['req']."'>".$row_req['req']."</a><hr>";
                                }
                                mysqli_close($conn);
                            }
                          ?>
                          </fieldset>
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
  ManageGrades();
?>
<?php 
  ob_flush();
?>