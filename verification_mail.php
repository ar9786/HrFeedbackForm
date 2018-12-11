<?php
require_once('config.php');
if(isset($_POST['email']) && !empty($_POST['email'])){
	
$sql_chk = "select * from wp_enquiry_form where email = '$_POST[email]'";
$sql_info = mysqli_query($con,$sql_chk);
if(mysqli_num_rows($sql_info) == 0){
$rndno=rand(100000, 999999);//OTP generate
$message = urlencode("otp number.".$rndno);
$to=$_POST['email'];
$subject = "OTP";
$txt = "OTP: ".$rndno."";
$headers = "From: <loginworks.com>" . "\r\n";
$retval = mail($to,$subject,$txt,$headers);
if( $retval == true ) {
            echo "Mail sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
	$_SESSION['name']=$_POST['name'];
	$_SESSION['email']=$_POST['email'];
	$_SESSION['contact_no']=$_POST['contact_no'];
	$_SESSION['department']=$_POST['department'];
	$_SESSION['otp']=$rndno;
}else{
	echo "email-exist";
}

}

if(isset($_POST['email_code']) && !empty($_POST['email_code'])){
$email_code = (int)$_POST['email_code'];
	if( $email_code === $_SESSION['otp'] ){
		echo 1;
	}else{
		echo 0;
	}
}
?>