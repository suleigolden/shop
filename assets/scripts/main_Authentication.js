$(document).ready(function(){
//Create new user account
$("#createAccount").click(function(){
      
 var hr = new XMLHttpRequest();
    var url = "app/controller/userAuthentication.php";
    var F_Name = $('#fname').val();
    var eml = $('#emailprolog').val();
    var pswd = $('#passwordprolog').val();  

    var vars = "Full_Name="+F_Name+"&emailreg="+eml+"&passwordreg="+pswd;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
      if(hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
        if(return_data =="true" || return_data.includes("true")){
           window.location = "?/=userlog&goto=dashboard";
         }else{
           $('#reg_status').html(return_data);
        }
        
      }
    }
  if (!eml.match(/\S+@\S+\.\S+/)) {
    $('#check_status').html("<label style='color:#F00; background-color:#FFF; '>Type in correct email address.</label>");
  }else if (eml.indexOf(" ") != -1 || eml.indexOf("..") != -1) {
     $('#check_status').html("<label style='color:#F00; background-color:#FFF; '>Type in correct email address.</label>");
  }else{
  hr.send(vars);     
  $('#reg_status').html("<label style='color:#5cb85c;'>processing registration.....</label>");
}

});

//Log in the user to dashboard function 
$("#loginbtn").click(function(){
    var hr = new XMLHttpRequest();
    var url = "app/controller/userAuthentication.php";
    var eml = $('#emailprolog').val();
    var pswd = $('#passwordprolog').val();
    var vars = "email_login="+eml+"&passwordone_login="+pswd;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    hr.onreadystatechange = function() {
      if(hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
        if(return_data =="true" || return_data.includes("true")){
           window.location = "?/=userlog&goto=dashboard";
         }else{
           $('#logIn_status').html(return_data);
        }
      
      }
    }
    hr.send(vars); 
      $('#logIn_status').html("<label style='color:#5cb85c;'>processing log in.....</label>");


});



//*************Get all products admin***************
    var hr = new XMLHttpRequest();
    var url = "app/controller/productController.php";
    var vars = "LoadallProducts=true";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
      if(hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
        //var return_datad = JSON.parse(hr.responseText);
        $('#result_output').html(return_data);
        //console.log(return_datad.);
        $('#requestSearch_status').html("");
      }
    }
    
    hr.send(vars);
    $('#requestSearch_status').html("<i style='color:green;'>Loading Products............</i>");

    //*************Get all products users***************
    var hrCart = new XMLHttpRequest();
    var urlCart = "app/controller/productController.php";
    var varsCart = "LoadallCarts=true";
    hrCart.open("POST", urlCart, true);
    hrCart.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hrCart.onreadystatechange = function() {
      if(hrCart.readyState == 4 && hrCart.status == 200) {
        var return_Cart = hrCart.responseText;
        $('#total_cart').html(return_Cart);
        //console.log(return_datad.);
        $('#requestCar_status').html("");
      }
    }
    
    hrCart.send(varsCart);
    $('#requestCar_status').html("<i style='color:green;'>Loading cart............</i>");

    //*************Get all check out***************
    var hrCheckout = new XMLHttpRequest();
    var urlCartout = "app/controller/productController.php";
    var varsCartout = "LoadaCheckout=true";
    hrCheckout.open("POST", urlCartout, true);
    hrCheckout.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hrCheckout.onreadystatechange = function() {
      if(hrCheckout.readyState == 4 && hrCheckout.status == 200) {
        var return_Cart = hrCheckout.responseText;
        $('#checkOutresult_output').html(return_Cart);
        //console.log(return_datad.);
        $('#requestCheckout_status').html("");
      }
    }
    
    hrCheckout.send(varsCartout);
    $('#requestCheckout_status').html("<i style='color:green;'>Loading cart............</i>");

    //*************Get all check out pay***************
    var hrCheckoutpay = new XMLHttpRequest();
    var urlCartout = "app/controller/productController.php";
    var varsCartoutpay = "LoadaCheckoutPay=true";
    hrCheckoutpay.open("POST", urlCartout, true);
    hrCheckoutpay.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hrCheckoutpay.onreadystatechange = function() {
      if(hrCheckoutpay.readyState == 4 && hrCheckoutpay.status == 200) {
        var return_Cart = hrCheckoutpay.responseText;
        $('#checkOutresult_output').html(return_Cart);
        $('#requestCheckout_status').html("");
      }
    }
    
    hrCheckoutpay.send(varsCartoutpay);
    $('#requestCheckout_status').html("<i style='color:green;'>Loading cart............</i>");

    //End of Document.ready function




});

     //Default function to get and return Element By Id
function _(el) {
  return document.getElementById(el);
}




