<?php
//adding Users_Request class from model foulder 
use app\model\productModel;
require '../model/productModel.php';

//creating an object of Users_Request class
$Request = new productModel();
//call Users_Request function depending on the request from Ajax function
if(isset($_FILES["ProductImage"]["name"])
 && isset($_POST['ProductName'])
 && isset($_POST['ProductCategory'])
 && isset($_POST['Quantity'])
 && isset($_POST['Color'])
 && isset($_POST['Brand'])
 && isset($_POST['Price'])) {
	$Request ->  saveProduct($connect);
}elseif(isset($_POST['uProductID'])
 && isset($_POST['uProductName'])
 && isset($_POST['uProductCategory'])
 && isset($_POST['uQuantity'])
 && isset($_POST['uColor'])
 && isset($_POST['uBrand'])
 && isset($_POST['uPrice'])) {
	$Request -> updateProductDetails($connect);
}elseif(isset($_POST['getAllProducts'])){
	$Request ->  getallProduct($connect);
}elseif(isset($_POST['LoadallProducts'])){
	$Request ->  getallProductToUser($connect);
}elseif(isset($_POST['LoadallCarts'])){
	$Request ->  getallCartsToUser($connect);
}elseif(isset($_POST['LoadallCartslogin'])){
	$Request ->  getallCartsToUserlogin($connect);
}elseif(isset($_POST['LoadaCheckout'])){
	$Request ->  getallCheckout($connect);
}elseif(isset($_POST['LoadaCheckoutPay'])){
	$Request ->  getallCheckoutPay($connect);
}elseif(isset($_FILES["ProductImage"]["name"]) && isset($_POST['ProductID']) && isset($_POST['oldImageUpdate']) ){
	$Request ->  updateProductImage($connect);
}elseif(isset($_POST['ProductdeleterecordID']) && isset($_POST['oldImage'])){
	$Request ->  deleteProduct($connect);
}elseif(isset($_POST['addtoCartID'])){
	 $Request ->  addProductToCart($connect,$_POST['addtoCartID']);
}elseif(isset($_POST['removetoCartID'])){
	$Request ->  removeProductToCart($connect,$_POST['removetoCartID']);
}else{
	echo "NOOOO";
	//$Request ->  loginUser($connect);
}






