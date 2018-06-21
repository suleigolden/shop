<?php
namespace app\model;
use app\model\DB;
require 'DB.php';
error_reporting(E_ALL);
error_reporting(E_ERROR);
ini_set('display_errors', '1');

session_start();
$Email_address = $_SESSION['userlog_EmailElement@NaviGaTion'];
$userpsw = $_SESSION['userlog@cralerpsw@NaviGaTion'];

$querycheck= mysqli_query($connect,"SELECT * FROM users WHERE Email='$Email_address' AND password ='$userpsw' ");
    while($revnt = mysqli_fetch_assoc($querycheck)){
      $U_NavID = $revnt['id'];
      $getFullName = $revnt['Name'];
 }
 //check if SESSION has expaired
 if(empty($Email_address) || empty($userpsw) || empty($U_NavID)){
 	//echo "<script type='text/javascript'>window.location.href = 'http://localhost/suleiman/shop/';</script>"; 
exit();
}else{
 $_SESSION['userlog@Identication@NaviGaTion'] = $U_NavID; 
}

function saveCartOrder($connect){
	
}

?>