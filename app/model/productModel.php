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

return '<tr class="gradeA odd" role="row" id="deleterecord'.$ID.'">
                                            <td>
                                                 <img src="../../productImg/'.$getImage.'" id="Product_avertaupdate-ID" style="height: 40px; width: 50px;">
                                            </td>
                                            <td id="upName">'.$getName.'</td>                                            
                                            <td id="updPrice'.$ID.'">'.$getPrice.'</td>
                                            <td id="updColor'.$ID.'">'.$getColor.'</td>
                                            <td id="updCategory'.$ID.'">'.$getCategory.'</td>
                                            <td id="updBrand'.$ID.'">'.$getBrand.'</td>
                                            <td id="updQuantity'.$ID.'">'.$getQuantity.'</td>                                            
                                            <td class="center">
                                                <a data-toggle="modal" data-target="#myModal'.$ID.'" style="background-color: #449d44; color: #FFF; font-size: 11px; padding: 3px;" class="btn primary"><i class="fa fa-edit white"></i> Edit </a>
                                                 <a onClick="deleteProductadd_player(\''.$ID.'\',\''.$getName.'\',\''.$getImage.'\')" id="Productdeltemessage'.$ID.'" style="background-color: #d9534f; color: #FFF; font-size: 11px; padding: 3px;" class="btn primary"><i class="fa fa-trash-o"></i> Delete </a>
                                            </td>
                                        </tr>';


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
$allProducts .= '<tr class="gradeA odd" role="row" id="deleterecord'.$ID.'">
                                            <td>
                                                 <img src="../../productImg/'.$getImage.'" id="Product_avertaupdate-ID" style="height: 40px; width: 50px;">
                                            </td>
                                            <td id="upName">'.$getName.'</td>                                            
                                            <td id="updPrice'.$ID.'">'.$getPrice.'</td>
                                            <td id="updColor'.$ID.'">'.$getColor.'</td>
                                            <td id="updCategory'.$ID.'">'.$getCategory.'</td>
                                            <td id="updBrand'.$ID.'">'.$getBrand.'</td>
                                            <td id="updQuantity'.$ID.'">'.$getQuantity.'</td>                                            
                                            <td class="center">
                                                <a data-toggle="modal" data-target="#myModal'.$ID.'" style="background-color: #449d44; color: #FFF; font-size: 11px; padding: 3px;" class="btn primary"><i class="fa fa-edit white"></i> Edit </a>
                                                 <a onClick="deleteProductadd_player(\''.$ID.'\',\''.$getName.'\',\''.$getImage.'\')" id="Productdeltemessage'.$ID.'" style="background-color: #d9534f; color: #FFF; font-size: 11px; padding: 3px;" class="btn primary"><i class="fa fa-trash-o"></i> Delete </a>
                                            </td>
                                        </tr>';
     }

     echo $allProducts;


}


}