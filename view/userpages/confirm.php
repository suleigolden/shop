<!DOCTYPE html>
<html lang="en">
<?php
include_once("headlinks.php");
session_start();
//include_once("app/model/check_authenticationlog.php");
function saveCartOrder($connect){
  if(!empty($_SESSION['userIdentificationNavi']) && empty($_SESSION['shoppinCartProducts']) && !empty($_SESSION['NameonCard']) && !empty($_SESSION['CardNumber']) && !empty($_SESSION['ExpirationDate']) && !empty($_SESSION['SecurityCode']) && !empty($_SESSION['HomeAddress'])){
$carts = implode(',', $_SESSION['shoppinCartProducts']);
mysqli_query($connect,"INSERT INTO ordercart VALUES ('',
  '".$_SESSION['userIdentificationNavi']."',
  '".$carts."',
  '".$_SESSION['NameonCard']."',
  '".$_SESSION['CardNumber']."',
  '".$_SESSION['ExpirationDate']."',
  '".$_SESSION['SecurityCode']."',
  '".$_SESSION['HomeAddress']."',
  '".$_SESSION['PaymenType']."',Now())");
//Clear transaction and payment SESSION
      $_SESSION['shoppinCartProducts'] = '';
      $_SESSION['NameonCard'] = "";
      $_SESSION['CardNumber'] = "";
      $_SESSION['ExpirationDate'] = "";
      $_SESSION['SecurityCode'] = "";
      $_SESSION['HomeAddress'] = "";
      $_SESSION['PaymenType'] = "";

  foreach ($_SESSION['shoppinCartProducts'] as $key => $value) {
    if (empty($value)) {
       unset($_SESSION['shoppinCartProducts'][$key]);
   }
  }
   //echo '<script language="javascript">document.location = "?/&goto=confirm"; </script>';

  }else{

      // $_SESSION['shoppinCartProducts'] = '';
      // $_SESSION['NameonCard'] = "";
      // $_SESSION['CardNumber'] = "";
      // $_SESSION['ExpirationDate'] = "";
      // $_SESSION['SecurityCode'] = "";
      // $_SESSION['HomeAddress'] = "";
  }
}

saveCartOrder($connect);


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
            <h1><small style="color:#FFF; background-color: #F00; border-radius: 90px; padding: 10px;">4</small>  Transaction Completed</h1>
          </div>
          <hr>
            <div class="col-lg-11">
                <h1 style="text-align: center;">Thank you for shopping with us!</h1>
               <div id="content" class="padding-20">

          <div class="panel panel-default">
            <div class="panel-body">

              <div class="row">

                <div class="col-md-6 col-sm-6 text-left">
                <?php

                  $querycheck= mysqli_query($connect,"SELECT * FROM ordercart ");
                      while($revnt = mysqli_fetch_assoc($querycheck)){
                        $tranID = $revnt['id'];
                        $getUserID = $revnt['UserID'];
                        $getcarts = $revnt['chart'];
                        $getNameonCard = $revnt['NameonCard'];
                        $getCardNumber = $revnt['CardNumber'];
                        $getExpirationDate = $revnt['ExpirationDate'];
                        $getSecurityCode = $revnt['SecurityCode'];
                        $getHomeAddress = $revnt['HomeAddress'];
                        $getPaymenType = $revnt['PaymenType'];
                        $getcreated_at = $revnt['created_at'];
                      }
                     
                   
                    

                ?>
                  <h4><strong>Order Date</strong> <?php echo $getcreated_at; ?></h4>
                  <ul class="list-unstyled">
                    <li><strong>Order Number:</strong> SORD<?php echo $tranID; ?>NG</li>
                  <li><strong>User Name:</strong> <?php echo $getNameonCard; ?></li>
                  <li><strong>Address:</strong> <?php echo $getHomeAddress; ?></li>
                  <li><strong>Mobile Number:</strong> <?php //echo $getcreated_at; ?></li>
                  </ul>

                </div>

                <div class="col-md-6 col-sm-6 text-right">

                  <h4><strong>Payment </strong> Source</h4>
                  <ul class="list-unstyled">
                    <li><strong>Paymen Type:</strong><label style="text-transform: uppercase;"> <?php echo $getPaymenType; ?></label></li>
                  </ul>

                </div>
                
              </div>
              <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Brand</th>
                                            <th>category</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                     $totalAmount = 0;
                                      $sql = mysqli_query($connect,"SELECT * FROM products WHERE id IN ($getcarts) ");

                                        while($row = mysqli_fetch_array($sql)){
                                              $ID = $row['id'];
                                              $getName = $row['productName'];
                                              $getPrice = $row['price'];
                                              $getImage = $row['image'];
                                              $getColor = $row['color'];
                                              $getBrand = $row['brand'];
                                              $getCategory = $row['category'];
                                              $getQuantity = $row['quantity'];
                                          $totalAmount += $getPrice;
                                          echo '<tr id="cart'.$ID.'">
                                                <td>
                                                <div style="float:left;">
                                                <img class="img-responsive" src="productImg/'.$getImage.'" style="height: 109px; width: 100px;" alt="'.$getName.'" title="'.$getName.'">
                                                </div>
                                                <div style="float:left; padding-left:9px;">
                                               <h4>'.$getBrand.' '.$getName.' <br><label style="font-size:11px;">('.$getColor.')</label></h4>
                                               <strong></strong>
                                                </div>
                                                </td>
                                                <td>'.$getBrand.'</td>
                                                <td>'.$getCategory.'</td>
                                                <td>€ '.$getPrice.'</td>
                                               </tr>';
                                            }
                                            echo '<tr><td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td>
                                                  <label for="visit4" class="css-label"><h4>
                                                               <input type="hidden" id="totl_Amount" value="'.$totalAmount.'">
                                                                <h3 style="color:#F00;">Total: <label>€ </label><label id="totalText"> '.number_format($totalAmount).'</label></h3> </h4></label>
                                                 
                                                  </td></tr>';
                                            ?>
                                    
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>


            <div>


            </div>


          
          </div>

          <div class="panel panel-default text-right">
            <div class="panel-body">
              <a class="btn btn-success" href="page-invoice-print.html" target="_blank"><i class="fa fa-print"></i> PRINT </a>
            </div>
          </div>

        </div>

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
