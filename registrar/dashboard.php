<?php ob_start();?>
<?php include("auth.php");?>
<?php
    include("db_connect.php");
    $q_syear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'");
    while($row_year = mysqli_fetch_array($q_syear)) {
        $validate_student = mysqli_query($conn, "SELECT * FROM $student WHERE syear='".$row_year['syID']."'");
        $valnum = mysqli_num_rows($validate_student);
        if($valnum<1) {
            $productname[] = 0;
            $sales[] = 0;
            $sectioneight[] = 0;
            $studeight[] = 0;
            $sectionnine[] = 0;
            $studnine[] = 0;
            $sectionten[] = 0;
            $studten[] = 0;
        }
        else {
            $sql ="SELECT * FROM $section WHERE glevel='07'";
            $result = mysqli_query($conn,$sql);
            $chart_data="";
            while ($row = mysqli_fetch_array($result)) { 
                $productname[] = $row['secname'];
                $q_student = mysqli_query($conn, "SELECT * FROM $student WHERE section='".$row['secID']."' AND syear='".$row_year['syID']."'");
                $sales[] = mysqli_num_rows($q_student);
            }
            ////////////////grade 8
            $sql8 ="SELECT * FROM $section WHERE glevel='08'";
            $result8 = mysqli_query($conn,$sql8);
            $chart_data8="";
            while ($row8 = mysqli_fetch_array($result8)) { 
                $sectioneight[] = $row8['secname'];
                $q_student8 = mysqli_query($conn, "SELECT * FROM $student WHERE section='".$row8['secID']."' AND syear='".$row_year['syID']."'");
                $studeight[] = mysqli_num_rows($q_student8);
            }
            ////////////////grade 9
            $sql9 ="SELECT * FROM $section WHERE glevel='09'";
            $result9 = mysqli_query($conn,$sql9);
            $chart_data9="";
            while ($row9 = mysqli_fetch_array($result9)) { 
                $sectionnine[] = $row9['secname'];
                $q_student9 = mysqli_query($conn, "SELECT * FROM $student WHERE section='".$row9['secID']."' AND syear='".$row_year['syID']."'");
                $studnine[] = mysqli_num_rows($q_student9);
            }
            ////////////////grade 9
            $sql10 ="SELECT * FROM $section WHERE glevel='10'";
            $result10 = mysqli_query($conn,$sql10);
            $chart_data10="";
            while ($row10 = mysqli_fetch_array($result10)) { 
                $sectionten[] = $row10['secname'];
                $q_student10 = mysqli_query($conn, "SELECT * FROM $student WHERE section='".$row10['secID']."' AND syear='".$row_year['syID']."'");
                $studten[] = mysqli_num_rows($q_student10);
            }
        }
    }
    mysqli_close($conn);
?>
<?php
    include("db_connect.php");
    $qyear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'");
    while($row_qyear = mysqli_fetch_array($qyear)) {
        ////////////// GRADE 7
        $totalstud7 = mysqli_query($conn, "SELECT * FROM $student WHERE syear='".$row_qyear['syID']."' AND glevel='07' AND status='active'") or die(mysqli_error());
        $numstud7 = mysqli_num_rows($totalstud7);
        if($numstud7<1) {
            $totalout[] = 0;
            $totalvsat[] = 0;
            $totalsat[] = 0;
            $totalfsat[] = 0;
        }
        else {
            $qgrades = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND glevel='07' AND gpa BETWEEN 90 AND 100");
            $gtotal =  mysqli_num_rows($qgrades);
            $totalout[] = $gtotal/$numstud7*100;
            ///////////////////// 
            $qgrades1 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND glevel='07' AND gpa BETWEEN 85 AND 89");
            $gtotal1 =  mysqli_num_rows($qgrades1);
            $totalvsat[] = $gtotal1/$numstud7*100;
            ///////////////
            $qgrades2 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND glevel='07' AND gpa BETWEEN 80 AND 84");
            $gtotal2 =  mysqli_num_rows($qgrades2);
            $totalsat[] = $gtotal2/$numstud7*100;
            /////////////////
            $qgrades3 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND glevel='07' AND gpa BETWEEN 75 AND 79");
            $gtotal3 =  mysqli_num_rows($qgrades3);
            $totalfsat[] = $gtotal3/$numstud7*100;
            ///////////////
            $qgrades4 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND glevel='07' AND gpa<75");
            $gtotal4 =  mysqli_num_rows($qgrades4);
            $totalnsat[] = $gtotal4/$numstud7*100;
        }
        ////////////// GRADE 8
        $totalstud8 = mysqli_query($conn, "SELECT * FROM $student WHERE syear='".$row_qyear['syID']."' AND glevel='08' AND status='active'") or die(mysqli_error());
        $numstud8 = mysqli_num_rows($totalstud8);
        if($numstud8<1) {
            $totalout[] = 0;
            $totalvsat[] = 0;
            $totalsat[] = 0;
            $totalfsat[] = 0;
        }
        else {
            $qgrades8 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND glevel='08' AND gpa BETWEEN 90 AND 100");
            $gtotal8 =  mysqli_num_rows($qgrades8);
            $totalout8[] = $gtotal8/$numstud8*100;
            ///////////////////// 
            $qgrades88 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND glevel='08' AND gpa BETWEEN 85 AND 89");
            $gtotal88 =  mysqli_num_rows($qgrades88);
            $totalvsat88[] = $gtotal88/$numstud8*100;
            ///////////////
            $qgrades888 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND glevel='08' AND gpa BETWEEN 80 AND 84");
            $gtotal888 =  mysqli_num_rows($qgrades888);
            $totalsat888[] = $gtotal888/$numstud8*100;
            /////////////////
            $qgrades8888 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND glevel='08' AND gpa BETWEEN 75 AND 79");
            $gtotal8888 =  mysqli_num_rows($qgrades8888);
            $totalfsat8888[] = $gtotal8888/$numstud8*100;
            ///////////////
            $qgrades88888 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND glevel='08' AND gpa<75");
            $gtotal88888 =  mysqli_num_rows($qgrades88888);
            $totalnsat88888[] = $gtotal88888/$numstud8*100;
        }
        ////////////// GRADE 9
        $totalstud9 = mysqli_query($conn, "SELECT * FROM $student WHERE syear='".$row_qyear['syID']."' AND glevel='09' AND status='active'") or die(mysqli_error());
        $numstud9= mysqli_num_rows($totalstud9);
        if($numstud9<1) {
            $totalout[] = 0;
            $totalvsat[] = 0;
            $totalsat[] = 0;
            $totalfsat[] = 0;
        }
        else {
            $qgrades9 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND glevel='09' AND gpa BETWEEN 90 AND 100");
            $gtotal9 =  mysqli_num_rows($qgrades9);
            $totalout9[] = $gtotal9/$numstud9*100;
            ///////////////////// 
            $qgrades99 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND glevel='09' AND gpa BETWEEN 85 AND 89");
            $gtotal99 =  mysqli_num_rows($qgrades99);
            $totalvsat99[] = $gtotal99/$numstud9*100;
            ///////////////
            $qgrades999 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND glevel='09' AND gpa BETWEEN 80 AND 84");
            $gtotal999 =  mysqli_num_rows($qgrades999);
            $totalsat999[] = $gtotal999/$numstud9*100;
            /////////////////
            $qgrades9999 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND glevel='09' AND gpa BETWEEN 75 AND 79");
            $gtotal9999 =  mysqli_num_rows($qgrades9999);
            $totalfsat9999[] = $gtotal9999/$numstud9*100;
            ///////////////
            $qgrades99999 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND glevel='09' AND gpa<75");
            $gtotal99999 =  mysqli_num_rows($qgrades99999);
            $totalnsat99999[] = $gtotal99999/$numstud9*100;
        }
        ////////////// GRADE 10
        $totalstud10 = mysqli_query($conn, "SELECT * FROM $student WHERE syear='".$row_qyear['syID']."' AND glevel='10' AND status='active'") or die(mysqli_error());
        $numstud10 = mysqli_num_rows($totalstud10);
        if($numstud10<1) {
            $totalout[] = 0;
            $totalvsat[] = 0;
            $totalsat[] = 0;
            $totalfsat[] = 0;
        }
        else {
            $qgrades10 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND glevel='10' AND gpa BETWEEN 90 AND 100");
            $gtotal10 =  mysqli_num_rows($qgrades10);
            $totalout10[] = $gtotal10/$numstud10*100;
            ///////////////////// 
            $qgrades100 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND glevel='10' AND gpa BETWEEN 85 AND 89");
            $gtotal100 =  mysqli_num_rows($qgrades100);
            $totalvsat100[] = $gtotal100/$numstud10*100;
            ///////////////
            $qgrades1000 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND glevel='10' AND gpa BETWEEN 80 AND 84");
            $gtotal1000 =  mysqli_num_rows($qgrades1000);
            $totalsat1000[] = $gtotal1000/$numstud10*100;
            /////////////////
            $qgrades10000 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND glevel='10' AND gpa BETWEEN 75 AND 79");
            $gtotal10000 =  mysqli_num_rows($qgrades10000);
            $totalfsat10000[] = $gtotal10000/$numstud10*100;
            ///////////////
            $qgrades100000 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND glevel='10' AND gpa<75");
            $gtotal100000 =  mysqli_num_rows($qgrades100000);
            $totalnsat100000[] = $gtotal100000/$numstud10*100;
        }
    }
    mysqli_close($conn);
?>
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
    <style>
        .h10 {
            font-size:10px;
        }
        .h12 {
            font-size:12px;
        }
        .info-box {
            height:220px !important;
        }
    </style>
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
              <li class="nav-item menu-open"><a href="dashboard" class="nav-link text-uppercase font-weight-bold shadow-sm active p-3"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a></li>
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
                <h5 class="m-0 text-uppercase">Dashboard</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">&nbsp;</div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box p-4 bg-danger">
                  <div class="info-box-content">
                    <span class="info-box-text text-uppercase font-weight-bold text-center">Enrollment</span>
                    <span class="info-box-text text-uppercase font-weight-bold text-center border-bottom">Application</span>
                    <span class="info-box-number text-center">
                      <?php
                        include("db_connect.php");
                        $q_syear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'");
                        while($row_year = mysqli_fetch_array($q_syear)) {
                            $count_enrollment1 = mysqli_query($conn, "SELECT * FROM $student WHERE syear='".$row_year['syID']."'");
                            $num_pending = mysqli_num_rows($count_enrollment1); 
                            if($num_pending<1) {
                                 echo "No Student Enrolled in the current School Year";
                            }
                            else {
                                $app_enrollment = mysqli_query($conn, "SELECT * FROM $student WHERE status='active' AND syear='".$row_year['syID']."'");
                                $num_app = mysqli_num_rows( $app_enrollment); 
                                $totals = $num_app/$num_pending*100;
                                echo $totals."% approved out of ".$num_pending." applications";
                            }
                        }
                        mysqli_close($conn);
                      ?>
                    </span>
                  </div>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3 p-4 bg-info">
                  <div class="info-box-content">
                    <span class="info-box-text text-uppercase font-weight-bold text-center">Average Passing</span>
                    <span class="info-box-text text-uppercase font-weight-bold text-center border-bottom">Students</span>
                    <span class="info-box-number h12">
                        <?php
                            include("db_connect.php");
                            $qyear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'");
                            while($row_qyear = mysqli_fetch_array($qyear)) {
                                $totalstud = mysqli_query($conn, "SELECT * FROM $student WHERE syear='".$row_qyear['syID']."' AND status='active'") or die(mysqli_error());
                                $numstud = mysqli_num_rows($totalstud);
                                if($numstud<1) {
                                   echo "No Student Enrolled in the current School Year";
                                }
                                else {
                                    $qgrades = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."'  AND gpa BETWEEN 90 AND 100");
                                    $gtotal =  mysqli_num_rows($qgrades);
                                    $outstanding = $gtotal/$numstud*100;
                                    ///////////////////// 
                                    $qgrades1 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND gpa BETWEEN 85 AND 89");
                                    $gtotal1 =  mysqli_num_rows($qgrades1);
                                    $vsatisfactory = $gtotal1/$numstud*100;
                                    ///////////////
                                    $qgrades2 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND gpa BETWEEN 80 AND 84");
                                    $gtotal2 =  mysqli_num_rows($qgrades2);
                                    $satisfactory = $gtotal2/$numstud*100;
                                    /////////////////
                                    $qgrades3 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND gpa BETWEEN 75 AND 79");
                                    $gtotal3 =  mysqli_num_rows($qgrades3);
                                    $fsatisfactory = $gtotal3/$numstud*100;
                                    ///////////////
                                    $qgrades4 = mysqli_query($conn, "SELECT * FROM $rank WHERE syear='".$row_qyear['syID']."' AND gpa<75");
                                    $gtotal4 =  mysqli_num_rows($qgrades4);
                                    $notsatisfactory = $gtotal4/$numstud*100;
                                    echo "<li>".$outstanding."% are Outstanding</li>";
                                    echo "<li>".$vsatisfactory."% are Very Satisfactory</li>";
                                    echo "<li>".$satisfactory."% are Satisfactory</li>";
                                    echo "<li>".$fsatisfactory."% are Fairly Satisfactory</li>";
                                    echo "<li>".round($notsatisfactory)."% Did Not Meet Expectation</li>";
                                }
                            }
                            mysqli_close($conn);
                        ?>
                    </span>
                  </div>
                </div>
              </div>
              <div class="clearfix hidden-md-up"></div>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3 p-4 bg-warning">
                  <div class="info-box-content">
                    <span class="info-box-text text-uppercase font-weight-bold text-center border-bottom">Enrollees</span>
                    <span class="info-box-number">
                      <?php
                        include("db_connect.php");
                        $qyear12 = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'");
                        while($row_qyear12 = mysqli_fetch_array($qyear12)) {
                            $totalstud12 = mysqli_query($conn, "SELECT * FROM $student WHERE syear='".$row_qyear12['syID']."' AND status='active'") or die(mysqli_error());
                            $numstud12 = mysqli_num_rows($totalstud12);
                            if($numstud12<1) {
                                echo "No Student Enrolled in the current School Year";
                            }
                            else {
                                $prev_year = date('Y', strtotime('-1 year'))."-".date("Y");
                                $qyear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE syear='$prev_year'");
                                $numyear = mysqli_num_rows($qyear);
                                if($numyear<1) {
                                    $numstud = 0;
                                }
                                else {
                                    while($row_qyear = mysqli_fetch_array($qyear)) {
                                        $totalstud = mysqli_query($conn, "SELECT * FROM $student WHERE syear='".$row_qyear['syID']."'") or die(mysqli_error());
                                        $numstud = mysqli_num_rows($totalstud);
                                    }
                                }
                                $qyear2 = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'");
                                while($row_qyear2 = mysqli_fetch_array($qyear2)) {
                                    $totalstud2 = mysqli_query($conn, "SELECT * FROM $student WHERE syear='".$row_qyear2['syID']."'") or die(mysqli_error());
                                    $numstud2= mysqli_num_rows($totalstud2);
                                }
                                if($numstud<1) {
                                    echo "100% increase compare last year";
                                }
                                else {
                                    $total1 = $numstud- $numstud2;
                                    $total2 = $total1/$numstud2*100;
                                    echo "+".$total2."% increase compare last year";
                                }
                            }
                        }
                        mysqli_close($conn);
                      ?>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3 p-4 bg-success">
                  <div class="info-box-content text-center">
                    <span class="info-box-text text-uppercase font-weight-bold text-center">Students</span>
                    <span class="info-box-text text-uppercase font-weight-bold text-center border-bottom">Enrolled</span>
                    <span class="info-box-number">
                      <?php
                        include("db_connect.php");
                        $count_student1 = mysqli_query($conn, "SELECT * FROM $student WHERE status='active'");
                        echo mysqli_num_rows($count_student1); 
                        mysqli_close($conn);
                      ?>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-white">
                        <div class="card-body">
                            <div class="row">
                                <form method="get" target="print_popup" action="yearly-statistics" onsubmit="window.open('about:blank','print_popup','width=1000,height=800');">
                                    <div class="input-group mb-3">
                                        <select name="qyear" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <?php
                                                include("db_connect.php");
                                                $schyear = mysqli_query($conn, "SELECT * FROM $schoolyear ORDER BY syear ASC");
                                                while($row_schyear = mysqli_fetch_array($schyear)) {
                                                    echo "<option value='".$row_schyear['syID']."'>".$row_schyear['syear']."</option>";
                                                }
                                                mysqli_close($conn);
                                            ?>
                                        </select>
                                      <div class="input-group-append">
                                        <button type="submit" class="btn btn-outline-secondary" id="button-addon2">Filter by School Year</button>
                                      </div>
                                    </div>
                                </form>
                                <h5 class="text-center text-bold col-md-12">Students Enrollment Statistics</h5>
                                <h6 class="text-center text-bold border-bottom col-md-12">
                                    <?php
                                        include("db_connect.php");
                                        $q_syear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'");
                                        while($row_year = mysqli_fetch_array($q_syear)) {
                                            echo "SY: ". $row_year['syear'];
                                        }
                                    ?>
                                </h6>
                                <div class="d-flex">
                                    <div class="col-md-6">
                                        <div class="text-center text-bold">Grade 07</div>
                                        <canvas  id="chartjs_bar" width="500"></canvas> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-center text-bold">Grade 08</div>
                                        <canvas  id="chartjs_bar_eigth" width="500"></canvas> 
                                    </div>
                                </div> 
                                <div class="d-flex">
                                    <div class="col-md-6">
                                        <div class="text-center text-bold">Grade 09</div>
                                        <canvas  id="chartjs_bar_nine" width="500"></canvas> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-center text-bold">Grade 10</div>
                                        <canvas  id="chartjs_bar_ten" width="500"></canvas> 
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-white">
                        <div class="card-body">
                            <form method="get" class="col-md-4" target="print_popup" action="yearly-average" onsubmit="window.open('about:blank','print_popup','width=1000,height=800');">
                                <div class="input-group mb-3">
                                    <select name="qyear" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <?php
                                            include("db_connect.php");
                                            $schyear = mysqli_query($conn, "SELECT * FROM $schoolyear ORDER BY syear ASC");
                                            while($row_schyear = mysqli_fetch_array($schyear)) {
                                                echo "<option value='".$row_schyear['syID']."'>".$row_schyear['syear']."</option>";
                                            }
                                            mysqli_close($conn);
                                        ?>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-outline-secondary" id="button-addon2">Filter by School Year</button>
                                    </div>
                                </div>
                            </form>
                            <h5 class="text-center text-bold">Students General Average</h5>
                            <h6 class="text-center text-bold border-bottom col-md-12">
                                    <?php
                                        include("db_connect.php");
                                        $q_syear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'");
                                        while($row_year = mysqli_fetch_array($q_syear)) {
                                            echo "SY: ". $row_year['syear'];
                                        }
                                    ?>
                                </h6>
                            <div class="text-center h10 text-bold p-3">
                                <i class="fa fa-stop text-primary"></i> Outstanding
                                <i class="fa fa-stop text-success"></i> Very Satisfactory
                                <i class="fa fa-stop text-info"></i> Satisfactory
                                <i class="fa fa-stop text-warning"></i> Fairly Satisfactory
                                <i class="fa fa-stop text-danger"></i> Did not meet expectation
                            </div>
                            <div class="row">
                                <div class="d-flex">
                                    <div class="col-md-6">
                                        <div style="width:500px;height:300px;text-align:center">
                                            <canvas id="VerticalChart"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div style="width:500px;height:300px;text-align:center">
                                            <canvas id="VerticalChartVsat"></canvas>
                                        </div>
                                    </div>
                                </div> 
                                <div class="d-flex">
                                    <div class="col-md-6">
                                        <div style="width:500px;height:300px;text-align:center">
                                            <canvas id="VerticalChartNine"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div style="width:500px;height:300px;text-align:center">
                                            <canvas id="VerticalChartTen"></canvas>
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
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($sales); ?>,
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        },
                        legend: {
                            display: false,
                            position: 'bottom',
 
                            labels: {
                                fontColor: '#71748d',
                                fontFamily: 'Circular Std Book',
                                fontSize: 14,
                            },
                        },
                        responsive: false,
                        maintainAspectRatio: true,
                        showScale: false,
                    }
                });
    </script>
    <script type="text/javascript">
      var ctxLevel = document.getElementById("chartjs_bar_eigth").getContext('2d');
                var myChartLevel = new Chart(ctxLevel, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($sectioneight); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($studeight); ?>,
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        },
                        legend: {
                        display: false,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
                    responsive: false,
                    maintainAspectRatio: true,
                    showScale: false,
                    
 
 
                }
                });
    </script>
    <script type="text/javascript">
      var ctxLevel = document.getElementById("chartjs_bar_nine").getContext('2d');
                var myChartLevel = new Chart(ctxLevel, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($sectionnine); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($studnine); ?>,
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        },
                           legend: {
                        display: false,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
                    responsive: false,
                    maintainAspectRatio: true,
                    showScale: false,
                    
 
 
                }
                });
    </script>
    <script type="text/javascript">
      var ctxLevel = document.getElementById("chartjs_bar_ten").getContext('2d');
                var myChartLevel = new Chart(ctxLevel, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($sectionten); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($studten); ?>,
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        },
                           legend: {
                        display: false,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
                    responsive: false,
                    maintainAspectRatio: true,
                    showScale: false,
                    
 
 
                }
                });
    </script>
    <script>
        Chart.defaults.global.legend.display = false;
        const labelsVerticalChart = ['Grade 7'];
        const dataVerticalChart = {
          labels: labelsVerticalChart,
          datasets: [
            {
                label: 'Outstanding',
                data:<?php echo json_encode($totalout); ?>,
                backgroundColor: '#0275d8'
            },
            {
                label: 'Very Satisfactory',
                data:<?php echo json_encode($totalvsat); ?>,
                backgroundColor:  '#5cb85c',
                borderWidth: 1
            },
            {
                label: 'Satisfactory',
                data:<?php echo json_encode($totalsat); ?>,
                backgroundColor:  '#5bc0de',
                borderWidth: 1
            },
            {
                label: 'Fairly Satisfactory',
                data:<?php echo json_encode($totalfsat); ?>,
                backgroundColor:  '#f0ad4e',
                borderWidth: 1
            },
            {
                label: 'Did not meet expectation',
                data:<?php echo json_encode($totalnsat); ?>,
                backgroundColor:  '#d9534f',
                borderWidth: 1
            }
          ]
        };
        const configVerticalBar = {
          type: 'bar',
          data: dataVerticalChart,
          options: {
              scales: {
               yAxes: [{
                   ticks: {
                       min: 0,
                       max: 100,
                       callback: function(value) {
                           return value + "%"
                       }
                   },
                   scaleLabel: {
                       display: true,
                       labelString: "Percentage"
                   }
               }]
            },
            onClick: function (e) {
                debugger;
                var activePointLabel = this.getElementsAtEvent(e)[0]._model.label;
                window.location.href="student-average?grade=07";
                
            },
            responsive: true,
            plugins: {
              legend: {
            display: false
         },
              title: {
                display: true,
                text: 'Students General Average'
              }
            }
          },
        };
        
        const CollectiblesVerticalChart = new Chart(
            document.getElementById('VerticalChart'),
            configVerticalBar
        );
    </script>
    <script>
        const labelsVerticalChartVsat = ['Grade 8'];
        const dataVerticalChartVsat = {
          labels: labelsVerticalChartVsat,
          datasets: [
            {
                label: 'Outstanding',
                data:<?php echo json_encode($totalout8); ?>,
                backgroundColor: '#0275d8'
            },
            {
                label: 'Very Satisfactory',
                data:<?php echo json_encode($totalvsat88); ?>,
                backgroundColor:  '#5cb85c',
                borderWidth: 1
            },
            {
                label: 'Satisfactory',
                data:<?php echo json_encode($totalsat888); ?>,
                backgroundColor:  '#5bc0de',
                borderWidth: 1
            },
            {
                label: 'Fairly Satisfactory',
                data:<?php echo json_encode($totalfsat8888); ?>,
                backgroundColor:  '#f0ad4e',
                borderWidth: 1
            },
            {
                label: 'Did not meet expectation',
                data:<?php echo json_encode($totalnsat88888); ?>,
                backgroundColor:  '#d9534f',
                borderWidth: 1
            }
          ]
        };
        const configVerticalBarVsat = {
          type: 'bar',
          data: dataVerticalChartVsat,
          options: {
              scales: {
               yAxes: [{
                   ticks: {
                       min: 0,
                       max: 100,
                       callback: function(value) {
                           return value + "%"
                       }
                   },
                   scaleLabel: {
                       display: true,
                       labelString: "Percentage"
                   }
               }]
            },
            onClick: function (e) {
                debugger;
                var activePointLabelVsat = this.getElementsAtEvent(e)[0]._model.label;
                window.location.href="student-average?grade=08";
                
            },
            responsive: true,
            plugins: {
              legend: {
            display: false
         },
              title: {
                display: true,
                text: 'Students General Average'
              }
            }
          },
        };
        const CollectiblesVerticalChartVsat = new Chart(
            document.getElementById('VerticalChartVsat'),
            configVerticalBarVsat
        );
    </script>
    <script>
        const labelsVerticalChartNine = ['Grade 9'];
        const dataVerticalChartNine = {
          labels: labelsVerticalChartNine,
          datasets: [
            {
                label: 'Outstanding',
                data:<?php echo json_encode($totalout9); ?>,
                backgroundColor: '#0275d8'
            },
            {
                label: 'Very Satisfactory',
                data:<?php echo json_encode($totalvsat99); ?>,
                backgroundColor:  '#5cb85c',
                borderWidth: 1
            },
            {
                label: 'Satisfactory',
                data:<?php echo json_encode($totalsat999); ?>,
                backgroundColor:  '#5bc0de',
                borderWidth: 1
            },
            {
                label: 'Fairly Satisfactory',
                data:<?php echo json_encode($totalfsat9999); ?>,
                backgroundColor:  '#f0ad4e',
                borderWidth: 1
            },
            {
                label: 'Did not meet expectation',
                data:<?php echo json_encode($totalnsat99999); ?>,
                backgroundColor:  '#d9534f',
                borderWidth: 1
            }
          ]
        };
        const configVerticalBarNine = {
          type: 'bar',
          data: dataVerticalChartNine,
          options: {
              scales: {
               yAxes: [{
                   ticks: {
                       min: 0,
                       max: 100,
                       callback: function(value) {
                           return value + "%"
                       }
                   },
                   scaleLabel: {
                       display: true,
                       labelString: "Percentage"
                   }
               }]
            },
            onClick: function (e) {
                debugger;
                var activePointLabelNine = this.getElementsAtEvent(e)[0]._model.label;
                window.location.href="student-average?grade=09";
                
            },
            responsive: true,
            plugins: {
              legend: {
            display: false
         },
              title: {
                display: true,
                text: 'Students General Average'
              }
            }
          },
        };
        const CollectiblesVerticalChartNine = new Chart(
            document.getElementById('VerticalChartNine'),
            configVerticalBarNine
        );
    </script>
    <script>
        const labelsVerticalChartTen = ['Grade 10'];
        const dataVerticalChartTen = {
          labels: labelsVerticalChartTen,
          datasets: [
            {
                label: 'Outstanding',
                data:<?php echo json_encode($totalout10); ?>,
                backgroundColor: '#0275d8'
            },
            {
                label: 'Very Satisfactory',
                data:<?php echo json_encode($totalvsat100); ?>,
                backgroundColor:  '#5cb85c',
                borderWidth: 1
            },
            {
                label: 'Satisfactory',
                data:<?php echo json_encode($totalsat1000); ?>,
                backgroundColor:  '#5bc0de',
                borderWidth: 1
            },
            {
                label: 'Fairly Satisfactory',
                data:<?php echo json_encode($totalfsat10000); ?>,
                backgroundColor:  '#f0ad4e',
                borderWidth: 1
            },
            {
                label: 'Did not meet expectation',
                data:<?php echo json_encode($totalnsat100000); ?>,
                backgroundColor:  '#d9534f',
                borderWidth: 1
            }
          ]
        };
        const configVerticalBarTen = {
          type: 'bar',
          data: dataVerticalChartTen,
          options: {
              scales: {
               yAxes: [{
                   ticks: {
                       min: 0,
                       max: 100,
                       callback: function(value) {
                           return value + "%"
                       }
                   },
                   scaleLabel: {
                       display: true,
                       labelString: "Percentage"
                   }
               }]
            },
            onClick: function (e) {
                debugger;
                var activePointLabelTen = this.getElementsAtEvent(e)[0]._model.label;
                window.location.href="student-average?grade=10";
                
            },
            responsive: true,
            plugins: {
              legend: {
                display: false
             },
              title: {
                display: true,
                text: 'Students General Average'
              }
            }
          },
        };
        const CollectiblesVerticalChartTen = new Chart(
            document.getElementById('VerticalChartTen'),
            configVerticalBarTen
        );
    </script>
    <script>
      $(document).ready(function () {
          $('.example').DataTable();
      });
    </script>
  </body>
</html>
<?php ob_flush();?>