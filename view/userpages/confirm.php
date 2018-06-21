<!DOCTYPE html>
<html lang="en">
<?php
include_once("headlinks.php");
session_start();
//include_once("app/model/check_authenticationlog.php");
function saveCartOrder($connect){
  if(!empty($_SESSION['userIdentificationNavi']) || empty($_SESSION['shoppinCartProducts']) || !empty($_SESSION['NameonCard']) || !empty($_SESSION['CardNumber']) || !empty($_SESSION['ExpirationDate']) || !empty($_SESSION['SecurityCode']) || !empty($_SESSION['HomeAddress'])){
$carts = implode(',', $_SESSION['shoppinCartProducts']);
mysqli_query($connect,"INSERT INTO ordercart VALUES ('',
  '".$_SESSION['userIdentificationNavi']."',
  '".$carts."',
  '".$_SESSION['NameonCard']."',
  '".$_SESSION['CardNumber']."',
  '".$_SESSION['ExpirationDate']."',
  '".$_SESSION['SecurityCode']."',
  '".$_SESSION['HomeAddress']."',Now())");
//Clear transaction and payment SESSION
      $_SESSION['shoppinCartProducts'] = '';
      $_SESSION['NameonCard'] = "";
      $_SESSION['CardNumber'] = "";
      $_SESSION['ExpirationDate'] = "";
      $_SESSION['SecurityCode'] = "";
      $_SESSION['HomeAddress'] = "";

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
                <?php
                foreach ($_SESSION['shoppinCartProducts'] as $key => $value) {
                  echo $_SESSION['shoppinCartProducts'][$key];
                }
                echo $_SESSION['HomeAddress'];


                $querycheck= mysqli_query($connect,"SELECT * FROM ordercart ");
                      while($revnt = mysqli_fetch_assoc($querycheck)){
                        $U_NavID = $revnt['id'];
                        $getcarts = $revnt['chart'];

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

                            echo "<br>****: ".$getName;
                          }
                   }
                    
                echo "<br><br>Home Address: ".$_SESSION['HomeAddress'];
                  //echo "<br>****: ".$getFullName;
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
