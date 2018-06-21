<?php
namespace app\model;

use app\model\DB;
require 'DB.php';
error_reporting(E_ALL);
error_reporting(E_ERROR);
ini_set('display_errors', '1');

class productModel {
//Method to insert new product
function saveProduct($connect){
	if(empty($_FILES["ProductImage"]["name"])){
	   echo "<label style='color:#F00;'>Error: Please select a product picture...</label>";
	}else if(empty($_POST['ProductName'])){
	  echo "<label style='color:#F00;'>Product Name can not be empty</label>";
	}else if(empty($_POST['Color'])){
	   echo "<label style='color:#F00;'>Please select a product Color.</label>";
	}else if(empty($_POST['ProductCategory'])){
	   echo "<label style='color:#F00;'>Product Category can not be empty.</label>";
	}else if(empty($_POST['Brand'])){
	   echo "<label style='color:#F00;'>Please select the Brand of the product.</label>";
	}else if(empty($_POST['Price'])){
	   echo "<label style='color:#F00;'>Price can not be empty</label>";
	}else if(empty($_POST['Quantity'])){
	   echo "<label style='color:#F00;'>Quantity can not be empty.</label>";
	}else{
		$fileName = $_FILES["ProductImage"]["name"]; 
		$fileTmpLoc = $_FILES["ProductImage"]["tmp_name"]; 
		$fileType = $_FILES["ProductImage"]["type"]; 
		$fileSize = $_FILES["ProductImage"]["size"];
		$fileErrorMsg = $_FILES["ProductImage"]["error"];
		
		if(move_uploaded_file($fileTmpLoc, "../../productImg/$fileName")){
			mysqli_query($connect,"INSERT INTO products VALUES ('','".$_POST['ProductName']."','".$_POST['Price']."','$fileName','".$_POST['Color']."','".$_POST['Brand']."','".$_POST['ProductCategory']."','".$_POST['Quantity']."',Now())");
			//echo "productImg/$fileName";
			echo $this->getProductinserted($connect);;
		} else {
			echo "false";
		}
		
	}


}
//Method to update product Image
function updateProductImage($connect){
	if(empty($_FILES["ProductImage"]["name"])){
	   echo "<label style='color:#F00;'>Error: Please select a product picture...</label>";
	}else{
		$fileName = $_FILES["ProductImage"]["name"]; 
		$fileTmpLoc = $_FILES["ProductImage"]["tmp_name"]; 
		$fileType = $_FILES["ProductImage"]["type"]; 
		$fileSize = $_FILES["ProductImage"]["size"];
		$fileErrorMsg = $_FILES["ProductImage"]["error"];
		$oldPhoto =$_POST['oldImageUpdate'];
		$productID = $_POST['ProductID'];
		
		if(move_uploaded_file($fileTmpLoc, "../../productImg/$fileName")){
			unlink("../../".$oldPhoto);
			mysqli_query($connect,"UPDATE products SET image='$fileName' WHERE id='$productID' ");
			echo $fileName;
		} else {
		    echo "false";
		}
	}
}
//Function to Update Product Details
function updateProductDetails($connect){
	if(empty($_POST['uProductName'])){
	  echo "<label style='color:#F00;'>Product Name can not be empty</label>";
	}else if(empty($_POST['uColor'])){
	   echo "<label style='color:#F00;'>Please select a product Color.</label>";
	}else if(empty($_POST['uProductCategory'])){
	   echo "<label style='color:#F00;'>Product Category can not be empty.</label>";
	}else if(empty($_POST['uBrand'])){
	   echo "<label style='color:#F00;'>Please select the Brand of the product.</label>";
	}else if(empty($_POST['uPrice'])){
	   echo "<label style='color:#F00;'>Price can not be empty</label>";
	}else if(empty($_POST['uQuantity'])){
	   echo "<label style='color:#F00;'>Quantity can not be empty.</label>";
	}else{
			$proudctID =$_POST['uProductID'];
			$getName = $_POST['uProductName'];
			$getPrice = $_POST['uPrice'];
			$getColor = $_POST['uColor'];
			$getBrand = $_POST['uBrand'];
			$getCategory = $_POST['uProductCategory'];
			$getQuantity = $_POST['uQuantity'];
		
		if(mysqli_query($connect,"UPDATE products SET  
			productName = '$getName',
			price = '$getPrice',
			color = '$getColor',
			brand = '$getBrand',
			category = '$getCategory',
			quantity = '$getQuantity' WHERE id='$proudctID' ")){

			echo "true";
		} else {
			echo "<label style='color:#F00;'>Error.... please try again</label>";
		}
		
	}
}
//Function to Delete Product
function deleteProduct($connect){
$proudctID =$_POST['ProductdeleterecordID'];
$oldPhoto = $_POST['oldImage'];
if(mysqli_query($connect,"DELETE FROM products WHERE id='$proudctID'")){
	unlink("../../productimg/".$oldPhoto);
	echo "";
}else{
	echo "";
}

}
//Metho to get the last product inserted
function getProductinserted($connect){
$sql = mysqli_query($connect,"SELECT * FROM products ");
while($row = $sql->fetch_array()){
			$ID = $row['id'];
			$getName = $row['productName'];
			$getPrice = $row['price'];
			$getImage = $row['image'];
			$getColor = $row['color'];
			$getBrand = $row['brand'];
			$getCategory = $row['category'];
			$getQuantity = $row['quantity'];
     }

return '<tr class="gradeA odd" role="row" id="Productdeleterecord'.$ID.'">
                                            <td>
                                                 <img src="../../productImg/'.$getImage.'" id="updateProductImg'.$ID.'" style="height: 40px; width: 50px;">
                                            </td>
                                            <td id="upName'.$ID.'">'.$getName.'</td>                                            
                                            <td id="updPrice'.$ID.'">€ '.$getPrice.'</td>
                                            <td id="updColor'.$ID.'">'.$getColor.'</td>
                                            <td id="updCategory'.$ID.'">'.$getCategory.'</td>
                                            <td id="updBrand'.$ID.'">'.$getBrand.'</td>
                                            <td id="updQuantity'.$ID.'">'.$getQuantity.'</td>                                            
                                            <td class="center">
                                                <a data-toggle="modal" data-target="#myModalnewProduct'.$ID.'" style="background-color: #449d44; color: #FFF; font-size: 11px; padding: 3px;" class="btn primary"><i class="fa fa-edit white"></i> Edit </a>
                                                 <a onClick="deleteProduct(\''.$ID.'\',\''.$getName.'\',\''.$getImage.'\')" id="Productdeltemessage'.$ID.'" style="background-color: #d9534f; color: #FFF; font-size: 11px; padding: 3px;" class="btn primary"><i class="fa fa-trash-o"></i> Delete </a>
                                                 <div class="modal fade" id="myModalnewProduct'.$ID.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel"><i class="icon-Product-1"></i> Update '.$getName.'</h4>
                                        </div>
                                        <div class="modal-body">
                                                <div id="Product_form'.$ID.'">
                                                <div class="">
                                                      <div id="TextBoxesGroup">
                                                        <div id="TextBoxDiv1">
                                                        <div class="form-group">
<img src="../../productImg/'.$getImage.'" id="Product_avertaupdate'.$ID.'" style="margin-left: 0%; width: 60%;"><hr>
                                                         <label></label>
                                                         <label style="margin-top:0px; float: left; width:;"><a class="ajax-link" style="color:#2a9464;" ><i class="fa fa-camera"></i> Select Product  Image</a></label>
                                                         <input type="file" name="imageProduct'.$ID.'" id="imageProduct'.$ID.'" onchange="chnageimgupdate(\''.$ID.'\')" style=" margin-top:-30px; height:37px; float: left; opacity:0; width:99%;"/>
                                                         <br>
<button class="btn-primary" style="border-radius:3px; font-size: 13px; padding: 4px; color: #FFF;" onclick="uploadProductFile(\''.$ID.'\',\'productImg/'.$getImage.'\');"><i class="fa fa-upload"></i> Upload </button>
                                                         <code id="statusimg'.$ID.'" style="background-color:transparent;"></code>
                                                        </div>
                                                          <div class="form-group" style="width:100%;">
                                                            <label>Name</label>
                                                            <input class="form-control" value="'.$getName.'" placeholder="Product Name" id="pName'.$ID.'">
                                                          </div><br>
                                                          
                                                          <div class="form-group" style="width:100%;">
                                                            <label>Color</label>
                                                            <select class="form-control" id="pColor'.$ID.'">
                                                              <option value="'.$getColor.'">'.$getColor.'</option>
                                                              <option value="Black">Black</option>
                                                              <option value="Yellow">Yellow</option>
                                                              <option value="Red">Red</option>
                                                              <option value="White">White</option>
                                                            </select>
                                                          </div><br>
                                                          <div class="form-group" style="width:100%;">
                                                            <label>Category</label>
                                                            <select class="form-control" id="pCategory'.$ID.'">
                                                              <option value="'.$getCategory.'">'.$getCategory.'</option>
                                                              <option value="Casual Wear">Casual Wear</option>
                                                              <option value="Sports Wear">Sport Wear</option>
                                                              <option value="Office Wear">Office Wear</option>
                                                            </select>
                                                          </div><br>
                                                           <div class="form-group" style="width:100%;">
                                                            <label>Brand</label>
                                                            <select class="form-control" id="pBrand'.$ID.'">
                                                              <option value="'.$getBrand.'">'.$getBrand.'</option>
                                                              <option value="Adidas">Adidas</option>
                                                              <option value="Nike">Nike</option>
                                                            </select>
                                                          </div><br>
                                                          
                                                         </div>
                                                         <div class="form-group" style="width:100%;">
                                                            <label>Price</label>
                                                            <input class="form-control" type="number" placeholder="Price" value="'.$getPrice.'" id="pPrice'.$ID.'">
                                                          </div><br>
                                                           <div class="form-group" style="width:100%;">
                                                            <label>Quantity</label>
                                                            <input class="form-control" type="number" placeholder="Quantity" value="'.$getQuantity.'" id="pQuantity'.$ID.'">
                                                          </div><br>

                                                         </div>
                                                          <p id="removeMessage'.$ID.'" style="color:#F00;"></p>
    <button class="btn btn-success" onclick="updateProductproduct(\''.$ID.'\');"><i class="fa fa-save"></i> Update Product</button>
                                                          <br><br>
                                                         <div id="savestatusupdate'.$ID.'"></div>
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
                                            </td>

                                        </tr>
                                       ';


}
//Method to get all the product return the result to admin page
function getallProduct($connect){
$allProducts .= '';
$sql = mysqli_query($connect,"SELECT * FROM products ");
while($row = $sql->fetch_array()){
			$ID = $row['id'];
			$getName = $row['productName'];
			$getPrice = $row['price'];
			$getImage = $row['image'];
			$getColor = $row['color'];
			$getBrand = $row['brand'];
			$getCategory = $row['category'];
			$getQuantity = $row['quantity'];
$allProducts .= '<div class="modal fade" id="myModalnewProduct'.$ID.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel"><i class="icon-Product-1"></i> Update '.$getName.'</h4>
                                        </div>
                                        <div class="modal-body">
                                                <div id="Product_form'.$ID.'">
                                                <div class="">
                                                      <div id="TextBoxesGroup">
                                                        <div id="TextBoxDiv1">
                                                        <div class="form-group">
<img src="../../productImg/'.$getImage.'" id="Product_avertaupdate'.$ID.'" style="margin-left: 0%; width: 60%;"><hr>
                                                         <label></label>
                                                         <label style="margin-top:0px; float: left; width:;"><a class="ajax-link" style="color:#2a9464;" ><i class="fa fa-camera"></i> Select Product  Image</a></label>
                                                         <input type="file" name="imageProduct'.$ID.'" id="imageProduct'.$ID.'" onchange="chnageimgupdate(\''.$ID.'\')" style=" margin-top:-30px; height:37px; float: left; opacity:0; width:99%;"/>
                                                         <br>
<button class="btn-primary" style="border-radius:3px; font-size: 13px; padding: 4px; color: #FFF;" onclick="uploadProductFile(\''.$ID.'\',\'productImg/'.$getImage.'\');"><i class="fa fa-upload"></i> Upload </button>
                                                         <code id="statusimg'.$ID.'" style="background-color:transparent;"></code>
                                                        </div>
                                                          <div class="form-group" style="width:100%;">
                                                            <label>Name</label>
                                                            <input class="form-control" value="'.$getName.'" placeholder="Product Name" id="pName'.$ID.'">
                                                          </div><br>
                                                          
                                                          <div class="form-group" style="width:100%;">
                                                            <label>Color</label>
                                                            <select class="form-control" id="pColor'.$ID.'">
                                                              <option value="'.$getColor.'">'.$getColor.'</option>
                                                              <option value="Black">Black</option>
                                                              <option value="Yellow">Yellow</option>
                                                              <option value="Red">Red</option>
                                                              <option value="White">White</option>
                                                            </select>
                                                          </div><br>
                                                          <div class="form-group" style="width:100%;">
                                                            <label>Category</label>
                                                            <select class="form-control" id="pCategory'.$ID.'">
                                                              <option value="'.$getCategory.'">'.$getCategory.'</option>
                                                              <option value="Casual Wear">Casual Wear</option>
                                                              <option value="Sports Wear">Sport Wear</option>
                                                              <option value="Office Wear">Office Wear</option>
                                                            </select>
                                                          </div><br>
                                                           <div class="form-group" style="width:100%;">
                                                            <label>Brand</label>
                                                            <select class="form-control" id="pBrand'.$ID.'">
                                                              <option value="'.$getBrand.'">'.$getBrand.'</option>
                                                              <option value="Adidas">Adidas</option>
                                                              <option value="Nike">Nike</option>
                                                            </select>
                                                          </div><br>
                                                          
                                                         </div>
                                                         <div class="form-group" style="width:100%;">
                                                            <label>Price</label>
                                                            <input class="form-control" type="number" placeholder="Price" value="'.$getPrice.'" id="pPrice'.$ID.'">
                                                          </div><br>
                                                           <div class="form-group" style="width:100%;">
                                                            <label>Quantity</label>
                                                            <input class="form-control" type="number" placeholder="Quantity" value="'.$getQuantity.'" id="pQuantity'.$ID.'">
                                                          </div><br>

                                                         </div>
                                                          <p id="removeMessage'.$ID.'" style="color:#F00;"></p>
    <button class="btn btn-success" onclick="updateProductproduct(\''.$ID.'\');"><i class="fa fa-save"></i> Update Product</button>
                                                          <br><br>
                                                         <div id="savestatusupdate'.$ID.'"></div>
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
                            <tr class="gradeA odd" role="row" id="Productdeleterecord'.$ID.'">
                                            <td>
                                                 <img src="../../productImg/'.$getImage.'" id="updateProductImg'.$ID.'" style="height: 40px; width: 50px;">
                                            </td>
                                            <td id="upName'.$ID.'">'.$getName.'</td>                                            
                                            <td id="updPrice'.$ID.'">€ '.$getPrice.'</td>
                                            <td id="updColor'.$ID.'">'.$getColor.'</td>
                                            <td id="updCategory'.$ID.'">'.$getCategory.'</td>
                                            <td id="updBrand'.$ID.'">'.$getBrand.'</td>
                                            <td id="updQuantity'.$ID.'">'.$getQuantity.'</td>                                            
                                            <td class="center">
                                                <a data-toggle="modal" data-target="#myModalnewProduct'.$ID.'" style="background-color: #449d44; color: #FFF; font-size: 11px; padding: 3px;" class="btn primary"><i class="fa fa-edit white"></i> Edit </a>
                                                 <a onClick="deleteProduct(\''.$ID.'\',\''.$getName.'\',\''.$getImage.'\')" id="Productdeltemessage'.$ID.'" style="background-color: #d9534f; color: #FFF; font-size: 11px; padding: 3px;" class="btn primary"><i class="fa fa-trash-o"></i> Delete </a>
                                            </td>

                                        </tr>
                                       ';
     }

     echo $allProducts;


}
//Method to get all the product return the result to User
function getallProductToUser($connect){
$allProducts .= '';
$sql = mysqli_query($connect,"SELECT * FROM products ORDER BY id DESC");
while($row = $sql->fetch_array()){
			$ID = $row['id'];
			$getName = $row['productName'];
			$getPrice = $row['price'];
			$getImage = $row['image'];
			$getColor = $row['color'];
			$getBrand = $row['brand'];
			$getCategory = $row['category'];
			$getQuantity = $row['quantity'];

$allProducts .='<div class="col-md-4 text-center">
                <div class="thumbnail">
                    <img class="img-responsive" src="productImg/'.$getImage.'" style="width: 100%;
    height: 330px;
" alt="name">
                    <div class="caption">
                        <h4 style="font-size:11px;">'.$getBrand.' '.$getName.' <br><label style="font-size:11px;">('.$getColor.')</label><br>
                            <small style="color: #F00;">€ '.$getPrice.'</small>
                        </h4>
                        <a onClick="addTocart(\''.$ID.'\',\''.$getName.'\',\''.$getPrice.'\')" id="Productdeltemessage'.$ID.'" class="btn btn-primary min"><i class="fa fa-shopping-cart"></i> Buy</a>
                    </div>
                </div>  
            </div>';
		}

echo $allProducts;

}

//Mehod to  add product to cart
function addProductToCart($connect, $product){
	session_start();
	if(empty($_SESSION['shoppinCartProducts'])){
		$_SESSION['shoppinCartProducts'] = array();
	}
	array_push($_SESSION['shoppinCartProducts'], $product);
	echo count($_SESSION['shoppinCartProducts']);
}


}