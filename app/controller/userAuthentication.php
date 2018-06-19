<?php
//adding Users_Request class from model foulder 
use app\model\requestAuthentication;
require '../model/requestAuthentication.php';

//creating an object of Users_Request class
$Request = new requestAuthentication();
//call Users_Request function depending on the request from Ajax function
if (isset($_POST['Full_Name']) && isset($_POST['emailreg']) && isset($_POST['passwordreg'])) {
	$Request ->  registerUser($connect);
}elseif (isset($_POST['email_login']) && isset($_POST['passwordone_login'])) {
	$Request ->  loginUser($connect);
}



