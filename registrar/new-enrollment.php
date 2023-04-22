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
                      <div class="table-responsive">
                        <div id="myRadioGroup">
                                New Student/Transferee <input type="radio" name="cars" checked="checked" value="twoCarDiv"  />
                                | Old Student <input type="radio" name="cars" value="threeCarDiv" title="This enrollment option is intended only if you are old student from Commonwealth National HighSchool" /><hr>
                                <div id="twoCarDiv" class="desc">
                                    <form class="add-new-post" id="enrollmentform" action="" method="post" enctype="multipart/form-data">
                                      <div class="form-group row">
                                        <label for="syear" class="col-sm-3 text-end control-label col-form-label">School Year : </label>
                                        <div class="col-sm-9">
                                          <input type="text" name="syear" class="form-control h5 col-sm-6" id="syear" readonly value="<?php include("db_connect.php"); $q_syear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'"); while($row_syear = mysqli_fetch_array($q_syear)) {echo $row_syear['syear'];}mysqli_close($conn); ?>" />
                                          <input type="hidden" name="syear1" class="form-control fs-5" id="syear1" readonly value="<?php include("db_connect.php"); $q_syear1 = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'"); while($row_syear1 = mysqli_fetch_array($q_syear1)) {echo $row_syear1['syID'];}mysqli_close($conn); ?>" />
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="glevel" class="col-sm-3 text-end control-label col-form-label">Grade level to Enroll : </label>
                                        <div class="col-sm-6">
                                          <select name="glevel" id="glevel" class="form-control col-sm-6 h5">
                                            <option value="07">Grade 07</option>
                                            <option value="08">Grade 08</option>
                                            <option value="09">Grade 09</option>
                                            <option value="10">Grade 10</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="etype" class="col-sm-3 text-end control-label col-form-label">Check the appropriate box only : </label>
                                        <div class="col-sm-6">
                                          <select name="etype" id="etype" class="form-control col-sm-6 fs-5">
                                            <option value="no">No LRN</option>
                                            <option value="with">With LRN</option>
                                            <option value="returning">Returning</option>
                                          </select>
                                        </div>
                                      </div>
                                      <h5 class="text-center fw-bold p-2 border-top border-bottom">STUDENT INFORMATION</h5>
                                      <div class="form-group row">
                                        <label for="psano" class="col-sm-3 text-end control-label col-form-label">PSA Birth Certificate No. : </label>
                                        <div class="col-sm-9">
                                          <input type="text" name="psano" class="form-control col-sm-6 h5" id="psano" required />
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="lrnno" class="col-sm-3 text-end control-label col-form-label">Learner Reference No. (LRN). : </label>
                                        <div class="col-sm-9">
                                          <input type="text" name="lrnno" class="form-control col-sm-6 h5" id="lrnno" required />
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="gpano" class="col-sm-3 text-end control-label col-form-label">GPA : </label>
                                        <div class="col-sm-9">
                                          <input type="number" name="gpano" class="form-control col-sm-6 h5" id="gpano" required />
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-end control-label col-form-label">First Name : </label>
                                        <div class="col-sm-9">
                                          <input type="text" name="sfname" class="form-control col-sm-6 h5" id="sfname" required />
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">Last Name : </label>
                                        <div class="col-sm-9">
                                          <input type="text" name="slname" class="form-control col-sm-6 h5" id="slname" required />
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="mname" class="col-sm-3 text-end control-label col-form-label">Middle Name : </label>
                                        <div class="col-sm-9">
                                          <input type="text" name="mname" class="form-control col-sm-6 h5" id="mname" required />
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="bdate" class="col-sm-3 text-end control-label col-form-label">Date of Birth : </label>
                                        <div class="col-sm-9">
                                          <input type="date" name="bdate" class="form-control col-sm-6 h5" id="bdate" required />
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="gender" class="col-sm-3 text-end control-label col-form-label">Sex : </label>
                                        <div class="col-sm-6">
                                          <select name="gender" id="gender" class="form-control col-sm-6 h5">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="pppp" class="col-sm-3 text-end control-label col-form-label">Belonging to Indigenous Peoples (IP) Community/Indigenous Cultural Community? : </label>
                                        <div class="col-sm-6">
                                          <select name="pppp" id="pppp" class="form-control col-sm-6 h5">
                                            <option value="no">No</option>
                                            <option value="yes">Yes</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="ipconf" class="col-sm-3 text-end control-label col-form-label">If Yes, please specify : </label>
                                        <div class="col-sm-9">
                                          <input type="text" name="ipconf" class="form-control col-sm-6 h5" id="ipconf" required />
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="mton" class="col-sm-3 text-end control-label col-form-label">Mother Tongue : </label>
                                        <div class="col-sm-9">
                                          <input type="text" name="mton" class="form-control col-sm-6 h5" id="mton" required />
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="cpnum" class="col-sm-3 text-end control-label col-form-label">Cellphone No. : </label>
                                        <div class="col-sm-9">
                                          <input class="form-control col-sm-6 h5 form-control-lg mb-3" type="text" name="cpnum" id="cpnum" required onkeypress="return onlyNumberKey(event)" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="email" class="col-sm-3 text-end control-label col-form-label">Email Address. : </label>
                                        <div class="col-sm-9">
                                          <input class="form-control col-sm-6 h5 form-control-lg mb-3" type="email" name="semail" id="semail" />
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="addr" class="col-sm-3 text-end control-label col-form-label">Complete Address : </label>
                                        <div class="col-sm-9">
                                          <input type="text" name="saddr" class="form-control col-sm-6 h5" id="saddr" required />
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="zip" class="col-sm-3 text-end control-label col-form-label">Zip Code : </label>
                                        <div class="col-sm-9">
                                          <input type="number" name="zip" class="form-control col-sm-6 h5" id="zip" required />
                                        </div>
                                      </div>
                                      <h5 class="text-center fw-bold p-2 border-top border-bottom">PARENTS/GUARDIANS INFORMATION</h5>
                                      <div class="form-group row">
                                        <label for="faname" class="col-sm-3 text-end control-label col-form-label">Father's Name : </label>
                                        <div class="col-sm-9">
                                          <input type="text" name="faname" class="form-control col-sm-6 h5" id="faname" required />
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="moname" class="col-sm-3 text-end control-label col-form-label">Mother's Maiden Name : </label>
                                        <div class="col-sm-9">
                                          <input type="text" name="moname" class="form-control col-sm-6 h5" id="moname" required />
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="mnum" class="col-sm-3 text-end control-label col-form-label">Cellphone No. : </label>
                                        <div class="col-sm-9">
                                          <input class="form-control col-sm-6 h5 form-control-lg mb-3" type="text" name="mnum" id="mnum" required onkeypress="return onlyNumberKey(event)" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11">
                                        </div>
                                      </div>
                                      <h5 class="text-center fw-bold p-2 border-top border-bottom">FOR RETURNING LEARNERS (BALIK-ARAL) AND THOSE WHO SHALL TRANSFER/MOVE IN</h5>
                                      <div class="form-group row">
                                        <label for="lyear" class="col-sm-3 text-end control-label col-form-label">Last School Year Completed : </label>
                                        <div class="col-sm-9">
                                          <input type="text" name="lyear" class="form-control col-sm-6 h5" id="lyear" required />
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="scname" class="col-sm-3 text-end control-label col-form-label">School Name : </label>
                                        <div class="col-sm-9">
                                          <input type="text" name="scname" class="form-control col-sm-6 h5" id="scname" required />
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="scid" class="col-sm-3 text-end control-label col-form-label">School ID : </label>
                                        <div class="col-sm-9">
                                          <input type="text" name="scid" class="form-control col-sm-6 h5" id="scid" />
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="scaddr" class="col-sm-3 text-end control-label col-form-label">School Address : </label>
                                        <div class="col-sm-9">
                                          <input type="text" name="scaddr" class="form-control col-sm-6 h5" id="scaddr" />
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="dlearning" class="col-sm-3 text-end control-label col-form-label">Preferred Distance Learning Modality/ies : </label>
                                        <div class="col-sm-9">
                                          <select name="dlearning" id="dlearning" class="form-control h5">
                                            <option value="mprint">Modular (Print)</option>
                                            <option value="mdigital">Modular (Digital)</option>
                                            <option value="onl">Online</option>
                                            <option value="etv">Educational TV</option>
                                            <option value="radio">Radio-based instruction</option>
                                            <option value="home">Homeschooling</option>
                                            <option value="blended">Blended</option>
                                          </select>
                                        </div>
                                      </div>
                                      <h5 class="text-center fw-bold p-2 border-top border-bottom">REQUIREMENTS</h5>
                                        <div class="form-group row">
                                            <label for="scaddr" class="col-sm-3 control-label col-form-label">Report Card (Front Page): </label>
                                            <div class="col-sm-9">
                                                 <input name="upload[]" type="file" class="form-control col-sm-6 h5" multiple="multiple" required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="scaddr" class="col-sm-3 control-label col-form-label">Report Card (Back Page): </label>
                                            <div class="col-sm-9">
                                                <input name="upload[]" type="file" class="form-control col-sm-6 h5" multiple="multiple" required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="scaddr" class="col-sm-3 control-label col-form-label">PSA Birth Certificate: </label>
                                            <div class="col-sm-9">
                                                <input name="upload[]" type="file" class="form-control col-sm-6 h5" multiple="multiple" required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="scaddr" class="col-sm-3 control-label col-form-label">good Moral Certificate: </label>
                                            <div class="col-sm-9">
                                                <input name="upload[]" type="file" class="form-control col-sm-6 h5" multiple="multiple" required />
                                            </div>
                                        </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="agree" id="agree" value="agree" required>&nbsp;I hereby certify that the above information given are true and correct to the best of my knowledge and I allow the Department of Education to use my child's details to create and/or update his/her learner profile in the Learner Information System. The information herein shall be treated as confidential in compliance with the Data Privacy Act of 2012.
                                      </div>
                                      <div class="border-top">
                                        <div class="card-body">
                                          <button type="submit" name="SubmitEnroll" class="btn btn-primary"><i class="fa fa-check"></i> Submit Enrollment</button>
                                        </div>
                                      </div>
                                    </form>
                                </div>
                                <div id="threeCarDiv" class="desc">
                                    <form class="add-new-post h6 p-2" id="enrollmentform" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label for="lrnno" class="col-sm-3 control-label col-form-label">Learner Reference No. (LRN). : </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="lrnno" class="form-control col-sm-6 h5" id="lrnno" required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-3 control-label col-form-label">First Name : </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="sfname" class="form-control col-sm-6 h5" id="sfname" required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-3 control-label col-form-label">Last Name : </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="slname" class="form-control col-sm-6 h5" id="slname" required />
                                            </div>
                                        </div>
                                        <div class="border-top">
                                            <div class="card-body">
                                                <button type="submit" id="NexStudent" name="ProceedEnroll" class="btn btn-primary"><i class="fa fa-check"></i> Proceed Enrollment</button>
                                            </div>
                                        </div>
                                    </form>
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
    <script>
        $(document).ready(function() {
            $("#twoCarDiv").show();
            $("#threeCarDiv").hide();
            $("input[name$='cars']").click(function() {
                var test = $(this).val();
                $("div.desc").hide();
                $("#" + test).toggle('slow');
            });
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
  include("pmnhs_function.php");
  ManageTempEnrollment(); 
?>
<?php 
  ob_flush();
?>