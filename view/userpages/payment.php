<!DOCTYPE html>
<html lang="en">
<?php
include_once("headlinks.php");
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
            <h1><small style="color:#FFF; background-color: #F00; border-radius: 90px; padding: 10px;">1</small>  Select Payment Method</h1>
          </div>
          <hr>
            <div class="col-lg-10">
                
                <div class="col-lg-5">
                  <img src="images/Mastercard-PNG-Picture-1000x600.png" style="width:100%; height:199px;" />
                   <h4 style="text-align: center;" title="pay with mastercard"><a href="?/&goto=paymentproceed?method=mastercard" class="btn btn-danger min"><i class="fa fa-shopping-cart"></i> Pay Now</a></h4>
                </div>
                <div class="col-lg-7">
                  <img src="images/bank_large.jpg" style="width:100%; height:199px;" />
                   <h4 style="text-align: center;" title="pay with bank transfer"><a href="?/&goto=paymentproceed?method=bank" class="btn btn-danger min"><i class="fa fa-shopping-cart"></i> Pay Now</a></h4>
                </div>
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
