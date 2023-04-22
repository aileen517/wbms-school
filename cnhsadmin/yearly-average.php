<?php ob_start();?>
<?php include("auth.php");?>
<?php
    include("db_connect.php");
    $qyear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE syID='".$_GET['qyear']."'");
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
        $numstud9 = mysqli_num_rows($totalstud9);
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
                            <h5 class="text-center text-bold">Students General Average</h5>
                            <h6 class="text-center text-bold border-bottom col-md-12">
                                    <?php
                                        include("db_connect.php");
                                        $q_syear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE syID='".$_GET['qyear']."'");
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
                                        <div style="width:450px;height:300px;text-align:center">
                                            <canvas id="VerticalChart"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div style="width:450px;height:300px;text-align:center">
                                            <canvas id="VerticalChartVsat"></canvas>
                                        </div>
                                    </div>
                                </div> 
                                <div class="d-flex">
                                    <div class="col-md-6">
                                        <div style="width:450px;height:300px;text-align:center">
                                            <canvas id="VerticalChartNine"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div style="width:450px;height:300px;text-align:center">
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
                window.location.href="student-average";
                
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
                data:<?php echo json_encode($totalnsat9999); ?>,
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
                window.location.href="student-average";
                
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
                window.location.href="student-average";
                
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