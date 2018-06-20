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
}elseif(isset($_FILES["ProductImage"]["name"]) && isset($_POST['ProductID']) && isset($_POST['oldImageUpdate']) ){
	$Request ->  updateProductImage($connect);
}else{
	echo "NOOOO";
	//$Request ->  loginUser($connect);
}






