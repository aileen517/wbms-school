<?php ob_start();?>
<?php include("auth.php");?>
<?php
    include("db_connect.php");
    $q_syear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE syID='".$_GET['qyear']."'");
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
                $q_student = mysqli_query($conn, "SELECT * FROM $student WHERE section='".$row['secID']."' AND syear='".$_GET['qyear']."'");
                $sales[] = mysqli_num_rows($q_student);
            }
            ////////////////grade 8
            $sql8 ="SELECT * FROM $section WHERE glevel='08'";
            $result8 = mysqli_query($conn,$sql8);
            $chart_data8="";
            while ($row8 = mysqli_fetch_array($result8)) { 
                $sectioneight[] = $row8['secname'];
                $q_student8 = mysqli_query($conn, "SELECT * FROM $student WHERE section='".$row8['secID']."' AND syear='".$_GET['qyear']."'");
                $studeight[] = mysqli_num_rows($q_student8);
            }
            ////////////////grade 9
            $sql9 ="SELECT * FROM $section WHERE glevel='09'";
            $result9 = mysqli_query($conn,$sql9);
            $chart_data9="";
            while ($row9 = mysqli_fetch_array($result9)) { 
                $sectionnine[] = $row9['secname'];
                $q_student9 = mysqli_query($conn, "SELECT * FROM $student WHERE section='".$row9['secID']."' AND syear='".$_GET['qyear']."'");
                $studnine[] = mysqli_num_rows($q_student9);
            }
            ////////////////grade 9
            $sql10 ="SELECT * FROM $section WHERE glevel='10'";
            $result10 = mysqli_query($conn,$sql10);
            $chart_data10="";
            while ($row10 = mysqli_fetch_array($result10)) { 
                $sectionten[] = $row10['secname'];
                $q_student10 = mysqli_query($conn, "SELECT * FROM $student WHERE section='".$row10['secID']."' AND syear='".$_GET['qyear']."'");
                $studten[] = mysqli_num_rows($q_student10);
            }
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
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="dist/css/dataTables.bootstrap4.min.css">
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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card bg-white">
                            <div class="card-body">
                                <div class="row">
                                    <h5 class="text-center text-bold col-md-12">Students Enrollment Statistics</h5>
                                    <h6 class="text-center text-bold border-bottom col-md-12">
                                        <?php
                                            include("db_connect.php");
                                            $q_syear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE syID='".$_GET['qyear']."'");
                                            while($row_year = mysqli_fetch_array($q_syear)) {
                                                echo "SY: ". $row_year['syear'];
                                            }
                                        ?>
                                    </h6>
                                    <div class="d-flex">
                                        <div class="col-md-6">
                                            <div class="text-center text-bold">Grade 07</div>
                                            <canvas  id="chartjs_bar" width="450"></canvas> 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-center text-bold">Grade 08</div>
                                            <canvas  id="chartjs_bar_eigth" width="450"></canvas> 
                                        </div>
                                    </div> 
                                    <div class="d-flex">
                                        <div class="col-md-6">
                                            <div class="text-center text-bold">Grade 09</div>
                                            <canvas  id="chartjs_bar_nine" width="450"></canvas> 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-center text-bold">Grade 10</div>
                                            <canvas  id="chartjs_bar_ten" width="450"></canvas> 
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
    <script src="dist/js/jquery-3.5.1.js"></script>
    <script src="dist/js/jquery.dataTables.min.js"></script>
    <script src="dist/js/dataTables.bootstrap4.min.js"></script>
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
      $(document).ready(function () {
          $('.example').DataTable();
      });
    </script>
  </body>
</html>
<?php ob_flush();?>