<!DOCTYPE html>
<html>

<?php
include_once("head.php");
?>
<body class="">
    <section>
             
    <div class="container">
        <div class="row">
            

            <h4 id="requestCheckout_status"></h4>
            <div class="col-lg-9">
            <h2 class="page-header" style="text-align:center;">Check Out</h2>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           
                        </div>
                        <!-- /.panel-heading -->
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
                                    <tbody id="checkOutresult_output">
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                
            </div>
            <div class="col-lg-3" style="border-left:3px #CCC solid;">
               
            </div>
          

        </div>
    </div>
            
    </section>
<script type="text/javascript">
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

</script>
<?php
include_once("footer.php");
?>

</body>

</html>
