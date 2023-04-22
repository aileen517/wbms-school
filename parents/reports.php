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
                  <li class="nav-item"><a href="history" class="nav-link text-uppercase font-weight-bold shadow-sm"><i class="fa fa-history nav-icon fs-8"></i><p> History</p></a></li>
                  <li class="nav-item"><a href="mission" class="nav-link text-uppercase font-weight-bold shadow-sm"><i class="fa fa-binoculars nav-icon"></i><p> Mission</p></a></li>
                  <li class="nav-item"><a href="vision" class="nav-link text-uppercase font-weight-bold shadow-sm"><i class="fa fa-eye nav-icon fa-2x"></i><p> Vision</p></a></li>
                </ul>
              </li>
              <li class="nav-item"><a href="enrollment" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-user-plus"></i><p> Enrollment </p></a></li>
              <li class="nav-item"><a href="events" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="fa fa-volume-off nav-icon fs-8"></i><p> Events</p></a></li>
              <li class="nav-item"><a href="schedule" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-calendar"></i><p> My Schedule</p></a></li>
              <li class="nav-item"><a href="reports" class="nav-link text-uppercase font-weight-bold shadow-sm p-3 active"><i class="nav-icon fa fa-tasks"></i><p> My Grades</p></a></li>
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
                  <li class="breadcrumb-item">My Grades</li>
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
                                    <div id='DivIdToPrint' class="col-md-12">
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
                                                include("db_connect.php");
                                                $q_stname = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='".$_SESSION['SESS_STUDENT_LRN']."'");
                                                while($row_stname = mysqli_fetch_array($q_stname)) {
                                                    echo "Student Name : ".$row_stname['sfname']." ".$row_stname['slname'];
                                                }
                                                mysqli_close($conn);
                                            ?>
                                        </h6>
                                        <h6 class="col-md-12 font-weight-bold" >
                                            <?php 
                                                echo "LRN No. : ".$_SESSION['SESS_STUDENT_LRN'];
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
                                                    $syear_id = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'");
                                                    while($row_syear = mysqli_fetch_array($syear_id)) {
                                                        $q_grades = mysqli_query($conn, "SELECT * FROM $grades WHERE syear='".$row_syear['syID']."' AND student_id='".$_SESSION['SESS_STUDENT_LRN']."'");
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
                                                                $q_grades_gpa = mysqli_query($conn, "SELECT * FROM $grades WHERE syear='".$row_syear_grades['syID']."' AND student_id='".$_SESSION['SESS_STUDENT_LRN']."'");
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