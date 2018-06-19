<!DOCTYPE html>
<html lang="en">
<?php
//include_once("headlinks.php");
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Suleiman Shopping</title>
    <!-- Bootstrap core CSS -->
    <link href="../../assets/sbadmin/css/bootstrap.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="../../assets/sbadmin/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/sbadmin/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    <script type="text/javascript" src="../../assets/scripts/main_Authentication.js"></script>
  </head>

  <body>

    <div id="wrapper">
     <!-- Include navigation links -->
<?php
//include_once("navigation.php");
?>

 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../adminPage">Suleiman Shopping</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="<?php echo $navigate_to; ?>=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="../adminPage"><i class="fa fa-edit"></i> Manage Product</a></li>
            <li><a href="../adminPage/order.php"><i class="fa fa-table"></i> View Order </a></li>
            
          </ul>

          
        </div>
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Manage Product</h1>
            <ol class="breadcrumb">
        <li class="breadcrumb-item">
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalnewProduct"><i class="icon-Product-1"></i> Add new Product</button>
           <div class="modal fade" id="myModalnewProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel"><i class="icon-Product-1"></i> Add new Product</h4>
                                        </div>
                                        <div class="modal-body">
                                                <div id="Product_form">
                                                <div class="">
                                                      <div id="TextBoxesGroup">
                                                        <div id="TextBoxDiv1">
                                                        <div class="form-group">
<img src="../../productImg/photo_default.png" id="Product_averta" style="margin-left: 0%; width: 60%;"><hr>
                                                         <label></label>
                                                         <label style="margin-top:0px; float: left; width:;"><a class="ajax-link" style="color:#2a9464;" ><i class="fa fa-camera"></i> Select Product  Image</a></label>
                                                         <input type="file" name="imageProduct" id="imageProduct" style=" margin-top:-30px; height:37px; float: left; opacity:0; width:99%;"/>
                                                        </div>
                                                          <div class="form-group">
                                                            <label>Name</label>
                                                            <input class="form-control" placeholder="Product Name" id="PName">
                                                          </div>
                                                          
                                                          <div class="form-group">
                                                            <label>Color</label>
                                                            <select class="form-control" id="pColor">
                                                              <option value="">Select Color</option>
                                                              <option value="Black">Black</option>
                                                              <option value="Yellow">Yellow</option>
                                                              <option value="Red">Red</option>
                                                              <option value="White">White</option>
                                                            </select>
                                                          </div>
                                                          <div class="form-group">
                                                            <label>Category</label>
                                                            <select class="form-control" id="pCategory">
                                                              <option value="">Select Category</option>
                                                              <option value="Casual Wear">Casual Wear</option>
                                                              <option value="Sports Wear">Sport Wear</option>
                                                              <option value="Office Wear">Office Wear</option>
                                                            </select>
                                                          </div>
                                                           <div class="form-group">
                                                            <label>Brand</label>
                                                            <select class="form-control" id="pBrand">
                                                              <option value="">Select Brand</option>
                                                              <option value="Adidas">Adidas</option>
                                                              <option value="Nike">Nike</option>
                                                            </select>
                                                          </div>
                                                          
                                                         </div>
                                                         <div class="form-group">
                                                            <label>Price</label>
                                                            <input class="form-control" type="number" placeholder="Price" id="pPrice">
                                                          </div>
                                                           <div class="form-group">
                                                            <label>Quantity</label>
                                                            <input class="form-control" type="number" placeholder="Quantity" id="pQuantity">
                                                          </div>

                                                         </div>
                                                          <p id="removeMessage" style="color:#F00;"></p>
                                                          <button class="btn btn-success" id="saveProductproduct"><i class="icon-Product-1"></i> Save Product</button>
                                                          <br><br>
<div id="savestatus1"></div><div id="savestatus2"></div><div id="savestatus3"></div>
<div id="savestatus4"></div><div id="savestatus5"></div><div id="savestatus6"></div>
<div id="savestatus7"></div>
                                                         <div id="savestatus"></div>
                                                      </div>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                         
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                
                            </div>
        </li>
      </ol>
          </div>

        </div>

      </div>

    </div>
<script src="../../assets/scripts/jquery-2.2.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
//change photo on select photo
    $('#imageProduct').change(function(event) {
        $("#Product_averta").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
       });
 //Process Avatar You 
    $("#saveProductproduct").click(function(){
    var file = document.getElementById("imageProduct").files[0];
    var pname = $("#PName").val();
    var color = $("#pColor").val();
    var category = $("#pCategory").val();
    var brand = $("#pBrand").val();
    var price = $("#pPrice").val();
    var quantity = $("#pQuantity").val();
    var formdata = new FormData();
    formdata.append("ProductImage", file);
    formdata.append("ProductName", pname);
    formdata.append("ProductCategory", category);
    formdata.append("Quantity", quantity);
    formdata.append("Color", color);
    formdata.append("Brand", brand);
    formdata.append("Price", price);
    var hr = new XMLHttpRequest();
    var url = "app/controller/productController.php";
      hr.open("POST", url, true);
      hr.onreadystatechange = function() {
    if (hr.readyState == 4 && hr.status == 200) {
      var return_data = JSON.parse(hr.responseText);
      if(return_data == "true"){
        
        $('#result_output').prepend('');
            document.getElementById("Product_averta").src = 'Productimg/photo_default.png';
            
            $('#savestatus1').html(''); $('#savestatus2').html(''); $('#savestatus3').html(''); $('#savestatus4').html(''); $('#savestatus5').html(''); $('#savestatus6').html(''); $('#savestatus7').html(''); $('#savestatus').html('');
          $('#savestatus').html("<i style='color:#5cb85c;'>Save Successful</i>");
          $("#savestatus").fadeOut(9000);
             clearFields();
      }else{
           
      }
        
    }else{
        
      }
  }
  hr.send(formdata);
   $("#savestatus").fadeIn();
   $('#savestatus').html("<i style='color:#5cb85c;'>Saving Product Product...<i class='icon-spin6 animate-spin'></i></i></i>");
    });
//End of Document.ready function
 });
function clearFields() {
  $('#Product_form').find('input:text').val('');
  $('#pCategory option:first').prop('selected',true);
  $("#FDquantity").val('')
  $('#pBrand option:first').prop('selected',true);
  $('#pColor option:first').prop('selected',true);
  $("#FDprice").val('')
}

</script> 
        <!-- Bootstrap core JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="../../assets/sbadmin/js/bootstrap.js"></script>
    <!-- Page Specific Plugins -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="../../assets/sbadmin/js/morris/chart-data-morris.js"></script>
    <script src="../../assets/sbadmin/js/tablesorter/jquery.tablesorter.js"></script>
    <script src="../../assets/sbadmin/js/tablesorter/tables.js"></script>

    
<?php
//include_once("footer.php");
?>  
  </body>
</html>
