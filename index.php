<?php
error_reporting(E_ALL);
error_reporting(E_ERROR);
ini_set('display_errors', '1');

use app\controller\pagesController;
require 'app/controller/pagesController.php';

require './autoload.php';

//creating an object of pages Controller and Database Class
$set_Page = new pagesController();
//$connect = new DB();

//Get the new page to view and send it to set_New_pages method if the page exist else view the home page. 
//$Newpage = $_GET['/'];
//$set_Page->set_New_pages($_GET['/']);

if(isset($_GET['/']) && isset($_GET['goto'])){
	$Newpage = $_GET['/'];
	$pagelocation = $_GET['goto']; 
	$set_Page->profileUserDashboard($Newpage,$pagelocation);
}else if(isset($_GET['goto'])){
	$Newpage = '/';//$_GET['/'];
	$pagelocation = $_GET['goto']; 
	$set_Page->profileUserDashboard($Newpage,$pagelocation);
}else if(isset($_GET['/'])){
	$Newpage = $_GET['/'];
	$set_Page->set_New_pages($Newpage);
}else{
	$set_Page->HomePage();
}
