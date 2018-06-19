<?php

namespace app\controller;

class pagesController {

public function __construct() {
	//echo "Hello home page";
}
//Function to Navigate to Home page 
public function HomePage(){
    //include_once("view/home.php");
    $this -> checkpageNotFound("view/home.php");
}
//Function to Navigate to user define page
public function set_New_pages($page){ 
 $page = strtok($page, '?');
 $this -> checkpageNotFound("view/".$page.".php");      
 }
//function to check if page exist
function checkpageNotFound($page){
  $not_found = "404notfound";
if(!file_exists($page)){
        return include_once("view/".$not_found.".php");
      } else {
        return include_once($page);
      }
 }

}

