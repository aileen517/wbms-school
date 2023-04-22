<?php ob_start();?>
<?php include("auth.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Commonwealth National High School</title>
    <script src="../cnhsadmin/plugins/jquery/jquery.min.js"></script>
    <style type="text/css" media="print">
    @page { 
        size: landscape;
    }
</style>
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
<body>
    <button type="button" class="btn btn-primary  col-sm-5" onclick='printtag("DivIdToPrint");'/><i class="nav-icon fa fa-print"></i> Print Grades</button>
    
        <div style="width:11in; height:8.5in;">
            <div class="row d-flex">
                <div id='DivIdToPrint'>
                <div style="float:left;width:5.5in; height:8.5in;">
                    <center>
                        <table class="text:center;">
                            <tr>
                                <th><center>Republic of the Pilippines</center></th>
                            </tr>
                            <tr>
                                <th><center>Department of Education</center></th>
                            </tr>
                            <tr>
                                <th><center>Region IX - Zamboanga Peninsula</center></th>
                            </tr>
                            <tr>
                                <th><center>Division of Zamboanga del Sur</center></th>
                            </tr>
                            <tr>
                                <th><center>Aurora West District</center></th>
                            </tr>
                        </table>
                        <h5>COMMONWEALTH NATIONAL HIGH SCHOOL<br>PROGRESS REPORT CARD<br>
                            <?php 
                                if(isset($_GET['lrnno'])) {
                                    include("db_connect.php");
                                    $q_stname = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='".$_GET['lrnno']."'");
                                    while($row_stname = mysqli_fetch_array($q_stname)) {
                                        $qsection = mysqli_query($conn, "SELECT * FROM $section WHERE secID='".$row_stname['section']."'");
                                        while($rowsec = mysqli_fetch_array($qsection)) {
                                            echo "GRADE ".$row_stname['glevel']." - ".$rowsec['secname'];
                                        }
                                    }
                                    mysqli_close($conn);
                                }
                                else {
                                    echo "";
                                }
                            ?><br>
                            <?php 
                                if(isset($_GET['lrnno'])) {
                                    include("db_connect.php");
                                    $q_stname3 = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='".$_GET['lrnno']."'");
                                    while($row_stname3 = mysqli_fetch_array($q_stname3)) {
                                        $qsyear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE syID='".$row_stname3['syear']."'");
                                        while($rowsyear = mysqli_fetch_array($qsyear)) {
                                            echo "SY: ".$rowsyear['syear'];
                                        }
                                    }
                                    mysqli_close($conn);
                                }
                                else {
                                    echo "";
                                }
                            ?>
                        </h5>
                    </center>
                    <h5 class="font-weight-bold mt-3">
                        <?php 
                            if(isset($_GET['lrnno'])) {
                                include("db_connect.php");
                                $q_stname4 = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='".$_GET['lrnno']."'");
                                while($row_stname4 = mysqli_fetch_array($q_stname4)) {
                                    $birthday_timestamp = strtotime($row_stname4['dbirth']);  
                                    $age = date('md', $birthday_timestamp) > date('md') ? date('Y') - date('Y', $birthday_timestamp) - 1 : date('Y') - date('Y', $birthday_timestamp);
                                    echo "Name: ".$row_stname4['sfname'].", ".$row_stname4['slname']." ".$row_stname4['mname']."<br>";
                                    echo "Age: ".$age."&nbsp;&nbsp;&nbsp;&nbsp;Sex: ".$row_stname4['gender']."&nbsp;&nbsp;&nbsp;&nbsp;Lrnno: ".$_GET['lrnno'];
                                }
                                mysqli_close($conn);
                            }
                            else {
                                echo "";
                            }
                        ?>
                    </h5>
                    <p>Dear Parent:</p>
                    <p>This report card shows the ability and progress your child has made in the different learning areas as well as his/her core values. </p>
                    <p>The school welcomes you should you desire to know more about child's progress.</p>
                    <br>
                    <?php 
                        if(isset($_GET['lrnno'])) {
                            include("db_connect.php");
                            $q_stname6 = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='".$_GET['lrnno']."'");
                            while($row_stname6 = mysqli_fetch_array($q_stname6)) {
                                $qsection6 = mysqli_query($conn, "SELECT * FROM $section WHERE secID='".$row_stname6['section']."'");
                                while($rowsec6 = mysqli_fetch_array($qsection6)) {
                                    $qsection7 = mysqli_query($conn, "SELECT * FROM $faculty WHERE facode='".$rowsec6['teacher']."'");
                                    while($rowsec7 = mysqli_fetch_array($qsection7)) {
                                        echo "<div style='float:right;'>";
                                            echo "<u>".$rowsec7['fname']." ".$rowsec7['lname']."</u><br>";
                                            echo "Adviser";
                                        echo "</div>";
                                    }
                                }
                            }
                            mysqli_close($conn);
                        }
                        else {
                            echo "";
                        }
                    ?>
                    <br>
                    ________________<br>
                    Principal III
                    <h5><center>Certicate of Transfer</center></h5>
                    Admitted to Grade: ______________________ Section: ___________<br>
                    Eligibility for Admission to Grade: ________________ <br>
                    <?php 
                        if(isset($_GET['lrnno'])) {
                            include("db_connect.php");
                            $q_stname6 = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='".$_GET['lrnno']."'");
                            while($row_stname6 = mysqli_fetch_array($q_stname6)) {
                                $qsection6 = mysqli_query($conn, "SELECT * FROM $section WHERE secID='".$row_stname6['section']."'");
                                while($rowsec6 = mysqli_fetch_array($qsection6)) {
                                    $qsection7 = mysqli_query($conn, "SELECT * FROM $faculty WHERE facode='".$rowsec6['teacher']."'");
                                    while($rowsec7 = mysqli_fetch_array($qsection7)) {
                                        echo "<div style='float:right;'>";
                                            echo "<u>".$rowsec7['fname']." ".$rowsec7['lname']."</u><br>";
                                            echo "Adviser";
                                        echo "</div>";
                                    }
                                }
                            }
                            mysqli_close($conn);
                        }
                        else {
                            echo "";
                        }
                    ?>
                    <br>
                    Approved: _________________<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Principal III
                    <br>
                    <h5><center>Cancellation of Eligibility to Transfer</center></h5>
                    Admitted in: _______________________ Date: _____________<br>
                    <br>
                    ___________________________<br>
                    Principal III
                </div>
                </div>
                <div style="float:right;width:5.5in; height:8.5in;">
                    <center>
                        <table class="text:center;">
                            <tr>
                                <th><center>Report On Learning Progress And Achievement</center></th>
                            </tr>
                            <tr>
                                <th><center>
                                <?php 
                                    include("db_connect.php");
                                    $q_scyear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'");
                                    while($row_scyear = mysqli_fetch_array($q_scyear)) {
                                        echo "School Year : ".$row_scyear['syear'];
                                    }
                                    mysqli_close($conn);
                                ?></center></th>
                            </tr>
                        </table>
                    </center><br><br>
                    <table class="text:center;">
                        <tr>
                            <th><center><?php 
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
                            ?></center></th>
                        </tr>
                        <tr>
                            <th><center><?php 
                                if(isset($_GET['lrnno'])) {
                                    echo "LRN No. : ".$_GET['lrnno'];
                                }
                                else {
                                    echo "";
                                }
                            ?></center></th>
                        </tr>
                    </table><br>
                    <table border="1"> 
                        <tr> 
                            <th rowspan="2">Learning Areas</th> 
                            <th colspan="4">Quarterly Rating</th>
                            <th rowspan="2">Final Rating</th>
                            <th rowspan="2">Remarks</th> 
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
                    </table><br><br>
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
  </body>
</html>
<?php 
  ob_flush();
?>