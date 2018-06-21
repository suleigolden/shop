<!DOCTYPE html>
<html>

<?php
include_once("head.php");
?>
<body class="">
    <section>
		     
    <div class="container">
        <div class="row">
            <h2 class="page-header" style="text-align:center;">Products</h2>

            <h4 id="requestSearch_status"></h4>
            <div class="col-lg-9" id="result_output">
                
            </div>
            <div class="col-lg-3" style="border-left:3px #CCC solid;">
               <h3>Your Order</h3>
                            <!-- /row -->
                            <ul class="treatments clearfix">
                                    <div id="total_cart">
                                    <li>
                                        <div class="checkbox">
                                            <label for="visit4" class="css-label"><h4>
                                             <input type="hidden" id="totl_Amount" value="">
                                            Total <strong><label>€</label><label id="totalText">0.00</label></strong> </h4></label>
                                        </div>
                                    </li>
                                    </div>
                            </ul>
            </div>
          

        </div>
    </div>
			
	</section>
<script type="text/javascript">
 function addTocart(ProductID,Product,price){
      var vars = "addtoCartID="+ProductID;
      var hr = new XMLHttpRequest();
      var url = "app/controller/productController.php";
      hr.open("POST", url, true);
      hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      hr.onreadystatechange = function() {
        if (hr.readyState == 4 && hr.status == 200) {
          var return_data = hr.responseText;
            //if(return_data =="true"){
                $('#Productdeltemessage'+ProductID).html("<i class='fa fa-shopping-cart'></i> Buy");
                 $('#total_cart').prepend('<li id="cart'+ProductID+'"><div class="checkbox"><input type="hidden" name="ProductAmount" value="'+price+'"><label for="visit4" class="css-label">'+Product+'<strong> € '+price+' <i class="fa fa-times-circle" style="color:#F00;" title="Remove" onclick="removeCart(\''+ProductID+'\',\''+price+'\');"></i></strong></label></div></li>');
                var allPrice = document.getElementsByName("ProductAmount");
                var grand_Total = 0;
                for(var i = 0; i < allPrice.length; i++) {
                    grand_Total = parseFloat(grand_Total) + parseFloat(allPrice[i].value);
                }
                $('#totalText').html(number_format(grand_Total)); 
                $('#totl_Amount').val(grand_Total);
                $('#myCartotal').html(return_data);
            //}
            //$('#Productdeleterecord'+id).hide(); 
    }
  }
  hr.send(vars);
  $('#Productdeltemessage'+ProductID).html("<i style='color:#FFF;'>adding...</i>");

}
 function number_format(n) {
        var parts=n.toString().split(".");
        return parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",") + (parts[1] ? "." + parts[1] : "");
    }

</script>
<?php
include_once("footer.php");
?>

</body>

</html>
