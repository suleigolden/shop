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
            <h2 class="page-header" style="text-align:center;">Products</h2>

            <h4 id="requestSearch_status"></h4>
            <div class="col-lg-9" id="result_output">
                
            </div>
            <div class="col-lg-3" style="border-left:3px #CCC solid;">
               <h3>Your Order</h3>
                            <!-- /row -->
                            <ul class="treatments clearfix">
                                    <div id="total_cart">
                                    <p id="requestCar_status"></p>
                                    </div>
                            </ul>
            </div>
          

        </div>
      </div>

    </div>
 <script type="text/javascript">
 $(document).ready(function(){
 	//*************Get all products ***************
    var hr = new XMLHttpRequest();
    var url = "app/controller/productController.php";
    var vars = "LoadallProducts=true";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
      if(hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
        //var return_datad = JSON.parse(hr.responseText);
        $('#result_output').html(return_data);
        //console.log(return_datad.);
        $('#requestSearch_status').html("");
      }
    }
    
    hr.send(vars);
    $('#requestSearch_status').html("<i style='color:green;'>Loading Products............</i>");

    //*************Get all products users***************
    var hrCart = new XMLHttpRequest();
    var urlCart = "app/controller/productController.php";
    var varsCart = "LoadallCartslogin=true";
    hrCart.open("POST", urlCart, true);
    hrCart.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hrCart.onreadystatechange = function() {
      if(hrCart.readyState == 4 && hrCart.status == 200) {
        var return_Cart = hrCart.responseText;
        $('#total_cart').html(return_Cart);
        //console.log(return_datad.);
        $('#requestCar_status').html("");
      }
    }
    
    hrCart.send(varsCart);
    $('#requestCar_status').html("<i style='color:green;'>Loading cart............</i>");


});
 
 function removeCart(ProductID,price){
      var vars = "removetoCartID="+ProductID;
      var hr = new XMLHttpRequest();
      var url = "app/controller/productController.php";
      hr.open("POST", url, true);
      hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      hr.onreadystatechange = function() {
        if (hr.readyState == 4 && hr.status == 200) {
          var return_data = hr.responseText;
          var total = document.getElementById("totl_Amount").value;
            total = total - price;
            $('#totalText').html(number_format(total));
            $('#totl_Amount').val(total);
             var elem = document.getElementById("cart"+ProductID);
            elem.parentElement.removeChild(elem);
          $('#myCartotal').html(return_data);
          //$("#cart"+ProductID).html("");
    }
  }
  hr.send(vars);
  $('#removeMeCart'+ProductID).html("<i style='color:green;'>removing..</i>");
 }
function number_format(n) {
        var parts=n.toString().split(".");
        return parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",") + (parts[1] ? "." + parts[1] : "");
}
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
 function removeCart(ProductID,price){
      var vars = "removetoCartID="+ProductID;
      var hr = new XMLHttpRequest();
      var url = "app/controller/productController.php";
      hr.open("POST", url, true);
      hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      hr.onreadystatechange = function() {
        if (hr.readyState == 4 && hr.status == 200) {
          var return_data = hr.responseText;
          var total = document.getElementById("totl_Amount").value;
            total = total - price;
            $('#totalText').html(number_format(total));
            $('#totl_Amount').val(total);
            // var elem = document.getElementById("cart"+ProductID);
            // elem.parentElement.removeChild(elem);
          $('#myCartotal').html(return_data);
          $("#cart"+ProductID).fadeOut(2000);
         //$('#cart'+ProductID).html('');
    }
  }
  hr.send(vars);
  $('#removeMeCart'+ProductID).html("<i style='color:green;'>removing..</i>");
 }

</script>
<?php
include_once("footer.php");
?>  
  </body>
</html>
