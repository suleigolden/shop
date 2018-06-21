<!DOCTYPE html>
<html lang="en">
<?php
include_once("headlinks.php");

$paymentMethod = $_GET['method'];
 if($paymentMethod !="mastercard" && $paymentMethod != "bank"){
  echo "<script type='text/javascript'>window.location.href = '?/&goto=payment';</script>"; 
exit();
}
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
            <h1><small style="color:#FFF; background-color: #F00; border-radius: 90px; padding: 10px;">2</small>  Transaction Details</h1>
          </div>
          <hr>
            <div class="col-lg-5">
            <h4>CARD DETAILS</h4>
                
                <div style="padding: 10px;">
                   <form action="?/&goto=payment&save_finalOrder=true" method="post">
                                                          <div class="form-group">
                                                            <label>Name On Card</label>
                                                            <input class="form-control" placeholder="Name On Card" id="NameonCard" name="NameonCard">
                                                          </div>
                                                          <div class="form-group">
                                                            <label>Card Number</label>
                                                            <input class="form-control" placeholder="Card Number" id="CardNumber" name="CardNumber">
                                                          </div>
                                                          
                                                          <div class="form-group">
                                                            <label>Expiration Date</label>
                                                            <input class="form-control" type="Date" placeholder="Expiration Date" id="ExpirationDate" name="ExpirationDate">
                                                          </div>
                                                          <div class="form-group">
                                                            <label>Security Code</label>
                                                            <input class="form-control" placeholder="Security Code" id="SecurityCode" name="SecurityCode">
                                                          </div>
                                                          <div class="form-group">
                                                            <label>Home Address</label>
                                                            <textarea class="form-control" placeholder="Home Address" id="HomeAddress" name="HomeAddress"></textarea>
                                                          </div>
                                                         <button class="btn btn-success min"><i class="fa fa-shopping-cart"></i> Pay Now</button>
                                                          
                                                         </div>
                                                         </form>
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
