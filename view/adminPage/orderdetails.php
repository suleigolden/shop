<!DOCTYPE html>
<html lang="en">
<?php
include_once("head.php");
?>


      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Manage Order</h1>
          </div>

        </div>
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
            <div class="panel-body">

              <div class="row">

                <div class="col-md-6 col-sm-6 text-left">
                <?php
                  $uID = $_GET['cart'];
                  $querycheck= mysqli_query($connect,"SELECT * FROM ordercart WHERE id='$uID' ");
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
                                                <img class="img-responsive" src="../../productImg/'.$getImage.'" style="height: 109px; width: 100px;" alt="'.$getName.'" title="'.$getName.'">
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
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>


      </div>

    </div>

        <!-- Bootstrap core JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="../../assets/sbadmin/js/bootstrap.js"></script>
    <!-- Page Specific Plugins -->
    

    
   
<?php
//include_once("footer.php");
?>  
  </body>
</html>
