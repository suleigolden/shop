<?php
namespace app\model;


use app\model\DB;
require 'DB.php';

class requestAuthentication {
//encryptUseRWorD
function encrypt_UseRWorD( $value ) {
    $cryptKey  = 'sqJuB0rGtlIn5UeB1xG03efyCpiman';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $value, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

//function to set user SESSION
public function setLogSESSION($Email,$psw){
	 session_start();
	 $_SESSION['userlog_EmailElement@NaviGaTion'] = $Email;
     $_SESSION['userlog@cralerpsw@NaviGaTion'] = $psw;
     return "true";
}
//Function to check SQL injection
function check_injection($connect,$value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  $value = mysqli_real_escape_string($connect,$value);
  return $value;
}

//Function to register new user to the system
function registerUser($connect){
$F_name =  $this ->check_injection($connect,htmlentities($_POST['Full_Name']));
$Email_address =  $this ->check_injection($connect,htmlentities($_POST['emailreg']));
$psw =  $this ->check_injection($connect,htmlentities($_POST['passwordreg']));

if(empty($F_name)){
   echo "<label style='color:#F00;'>Full Name can not be empty.</label>";
}else if(empty($Email_address)){
  echo "<label style='color:#F00;'>Email can not be empty</label>";
}else if(empty($psw)){
   echo "<label style='color:#F00;'>Password can not be empty.</label>";
}else if(strlen($psw) < 7){
   echo "<label style='color:#F00;'>Password Must be more than 6 characters!.</label>";
}else{
	$userpsw = $this ->encrypt_UseRWorD($psw);
	$queryeml = mysqli_query($connect,"SELECT * FROM users WHERE Email= '$Email_address' ");
	  $check_email = mysqli_num_rows($queryeml);
	  if($check_email > 0){
	    echo "<label style='color:#F00;'>".$Email_address." Is teken, select or use another email.</label>";
	  }else{
	   
	  if(mysqli_query($connect,"INSERT INTO users VALUES ('','$F_name','$Email_address','$userpsw',Now())")){
	    $result = $this -> setLogSESSION($Email_address,$userpsw);
	      echo $result;
	      }else{
	       echo "not_true";
	      }
	    }
}

}

//Function to log in the user to the system
function loginUser($connect){
$Email_address =  $this ->check_injection($connect,htmlentities($_POST['email_login']));
$password_one =  $this ->check_injection($connect,htmlentities($_POST['passwordone_login']));
$userpsw = $this ->encrypt_UseRWorD($password_one);
$query = mysqli_query($connect,"SELECT * FROM users WHERE Email= '$Email_address' AND password='$userpsw'");
  $check_user = mysqli_num_rows($query);
  if($check_user > 0){
     $result = $this ->setLogSESSION($Email_address,$userpsw);
      echo $result;
  }else{
     echo "<label style='color:#F00;'>Invalid Email or Password!</label>";
  }
}

}