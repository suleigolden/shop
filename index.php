<?php
//nclude_once("controller/pagesController.php");

use app\controller\pagesController;
require 'app/controller/pagesController.php';

require './autoload.php';

//creating an object of pages Controller and Database Class
$set_Page = new pagesController();
$connect = new DB();

//Get the new page to view and send it to set_New_pages method if the page exist else view the home page. 
$Newpage = $_GET['/'];
$set_Page->set_New_pages($Newpage);

