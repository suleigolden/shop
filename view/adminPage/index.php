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
<img src="Productimg/photo_default.png" id="Product_averta" style="margin-left: 0%; width: 60%;"><hr>
                                                         <label></label>
                                                         <label style="margin-top:0px; float: left; width:;"><a class="ajax-link" style="color:#2a9464;" ><i class="fa fa-camera"></i> Select Product  Image</a></label>
                                                         <input type="file" name="imageProduct" id="imageProduct" style=" margin-top:-30px; height:37px; float: left; opacity:0; width:99%;"/>
                                                        </div>
                                                          <div class="form-group">
                                                            <label>Name</label>
                                                            <input class="form-control" placeholder="Product Name" id="FDName">
                                                          </div>
                                                          
                                                          <div class="form-group">
                                                            <label>Color</label>
                                    <select class="form-control" id="HDelivery">
                                                              <option value="">Select Color</option>
                                                              <option value="Black">Black</option>
                                                              <option value="Yellow">Yellow</option>
                                                              <option value="Red">Red</option>
                                                              <option value="White">White</option>
                                                            </select>
                                                          </div>
                                                          
                                                         </div>
                                                         <div class="form-group">
                                                            <label>Price</label>
                                                            <input class="form-control" type="number" placeholder="Price" id="FDprice">
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
