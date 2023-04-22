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
                  <li class="breadcrumb-item">Schedule</li>
                  <li class="breadcrumb-item">Student List</li>
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
                      Student List
                    </h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="table-responsive">
                        <table id="example" class="table table-striped h6">
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
                              <th class="fw-bold">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              if(isset($_GET['section'])) {
                                include("db_connect.php");
                                $filter_student = mysqli_query($conn, "SELECT * FROM $student WHERE status='active' AND section='".$_GET['section']."' ORDER BY sfname ASC");
                                if(mysqli_num_rows($filter_student)<1) {
                                  echo "<tr>";
                                    echo "<td colspan='9'>No record found.</td>";
                                  echo "</tr>";
                                } 
                                else {
                                  while($row_fstudent = mysqli_fetch_array($filter_student)) {
                                    $filter_section_name = mysqli_query($conn, "SELECT * FROM $section WHERE secID='".$row_fstudent['section']."'");
                                    while($row_filter_secname = mysqli_fetch_array($filter_section_name)) {
                                      echo "<tr>";
                                        echo "<td><a href='student-details?student_id=".$row_fstudent['studID']."&&lrnno=".$row_fstudent['lrnno']."'>".ucfirst($row_fstudent['sfname'])." ".ucfirst($row_fstudent['slname'])."</a></td>";
                                        echo "<td>".ucfirst($row_fstudent['glevel'])."-".$row_filter_secname['secname']."</td>";
                                        echo "<td>".ucfirst($row_fstudent['gpa'])."</td>";
                                        echo "<td>".ucfirst($row_fstudent['gender'])."</td>";
                                        echo "<td>".ucfirst($row_fstudent['lrnno'])."</td>";
                                        echo "<td>".ucfirst($row_fstudent['staddr'])."</td>";
                                        echo "<td>".ucfirst($row_fstudent['cpno'])."</td>";
                                        echo "<td>".$row_fstudent['semail']."</td>";
                                        echo "<td>";
                                          $q_fsyear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE syID='".$row_fstudent['syear']."'");
                                          while($row_fsyear = mysqli_fetch_array($q_fsyear)) {
                                            echo $row_fsyear['syear'];
                                          }
                                        echo "</td>";
                                        echo "<td>";
                                          $find_grades = mysqli_query($conn, "SELECT * FROM $grades WHERE student_id='".$row_fstudent['lrnno']."' AND section='".$_GET['section']."' AND syear='".$row_fstudent['syear']."' AND subject='".$_GET['subject']."'");
                                          if(mysqli_num_rows($find_grades)>0) {
                                            while($row_fgrades = mysqli_fetch_array($find_grades)) {
                                              if($row_fgrades['first']!="" AND $row_fgrades['second']!="" AND $row_fgrades['third']!="" AND $row_fgrades['fourth']!="")
                                              {
                                                echo "<span class='badge bg-dark rounded-pill p-2'>Grades Done</span>";
                                              }
                                              else {
                                                echo "<a href='#' data-toggle='modal' data-target='#exampleModalCenter".$row_filter_secname['secID']."'><span class='badge bg-success rounded-pill'><i class='fas fa-plus text-dark p-1'></i> Add Grade</span></a>";
                                              }
                                            }
                                          }
                                          else {
                                            echo "<a href='#' data-toggle='modal' data-target='#exampleModalCenter".$row_filter_secname['secID']."'><span class='badge bg-success rounded-pill'><i class='fas fa-plus text-dark p-1'></i> Add Grade</span></a>";
                                          }
                                        echo "</td>";
                                      echo "</tr>";
                            ?>
                                      <div class="modal fade" id="exampleModalCenter<?php echo $row_filter_secname['secID'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                              <h5 class="modal-title" id="exampleModalLongTitle">Grade Form</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body bg-white rounded m-2">
                                              <form class="add-new-post" id="enrollmentform" action="" method="post">
                                                    <div class="form-check form-check-inline mb-3">
                                                      <label for="radio" class="col-sm-6 text-end control-label col-form-label">Grade For : </label>
                                                      <div class="col-sm-9">
                                                        <input class="form-check-input" type="radio" name="gtype" value="1" required>1<sup>st</sup>&nbsp;
                                                        <input class="form-check-input" type="radio" name="gtype" value="2" required>2<sup>nd</sup>&nbsp;
                                                        <input class="form-check-input" type="radio" name="gtype" value="3" required>3<sup>rd</sup>&nbsp;
                                                        <input class="form-check-input" type="radio" name="gtype" value="4" required>4<sup>th</sup>
                                                      </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                      <label for="grade" class="col-sm-3 text-end control-label col-form-label">Grade : </label>
                                                      <div class="col-sm-3">
                                                        <input type="number" name="grade" class="form-control h5" id="grade" required />
                                                        <input type="hidden" name="secid" class="form-control h5" id="secid" required value="<?php echo $_GET['section'];?>" />
                                                        <input type="hidden" name="stid" class="form-control h5" id="stid" required value="<?php echo $row_fstudent['lrnno'];?>" />
                                                        <input type="hidden" name="suid" class="form-control h5" id="suid" required value="<?php echo $_GET['subject'];?>" />
                                                      </div>
                                                    </div>
                                                    <div class="border-top">
                                                      <div class="card-body">
                                                        <button type="submit" id="AddStudent" name="SubmitGrades" class="btn btn-primary"><i class="fa fa-check"></i> Submit Grade</button>
                                                      </div>
                                                    </div>
                                                  </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                            <?php
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
  ManageGrades();
?>
<?php 
  ob_flush();
?>