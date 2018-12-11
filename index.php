<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>User FeedBack Form</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url;?>css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url;?>css/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url;?>css/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url;?>css/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url;?>css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url;?>css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url;?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url;?>css/main.css">
	<link rel="stylesheet" href="style.css">
	<style>
	.modal {
		text-align: center;
	}
	@media screen and (min-width: 768px) { 
		.modal:before {
		display: inline-block;
		vertical-align: middle;
		content: " ";
		height: 100%;
		}
	}
	.modal-dialog {
		display: inline-block;
		text-align: left;
		vertical-align: middle;
	}
	</style>
</head>
<body>
	<div class="container-contact100">
		
		<div class="wrap-contact100">
		
			<form class="contact100-form validate-form" action="">
			<div class="logo-page">
			<img src="https://lws-abt5wcf.netdna-ssl.com/wp-content/uploads/2018/05/logo-1-1.png" height="100%" width="100%">
			</div>
				<div class="statement" >
				
		<p><strong>Hi, Dear Candidate!&nbsp;We would love to hear about your experience during the  interview process.</strong></p>
			<p><label><strong>Your feedback will help us in improving our hiring process <span>&#x1F601</span></strong></label></p>
		</div>


				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<label class="label-input100" for="name">Name</label>
					<input type="text" class="input100" id="name" placeholder="Name" name="user_name" autocomplete="off">
					<span class="focus-input100"></span>
					<span class="name-error formerror"></span>
					
				</div>


				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<label class="label-input100" for="email">Email</label>
					<input type="email" class="input100" id="email" placeholder="Email" name="email"autocomplete="off"><span class="focus-input100"></span><span class="email-error formerror"></span>
				</div>

				<div class="wrap-input100">
					<div class="label-input100">Deparment</div>
					<div>
					<select class="js-select2" name="department" id="department">
						<?php foreach($dept as $val){ ?>
						<option value="<?php echo $val['id']; ?>"><?php echo $val['depart_name']; ?></option>
						<?php } ?>
					</select>
						<div class="dropDownSelect2"></div>
					</div>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<label class="label-input100" for="message">Contact No</label>
					<input type="number" class="input100" id="contact_no" placeholder="Contact No" name="contact_no" autocomplete="off">
					<span class="focus-input100"></span>
					<span class="contact-error formerror"><span>
				</div>

				<div class="container-contact100-form-btn">
				<button  type="button" class="contact100-form-btn" id="submit" name="submit" >Submit</button>
				</div>

				<div class="contact100-form-social flex-c-m">
					<a href="https://www.facebook.com/lognow" target="_blank" class="contact100-form-social-item flex-c-m bg1 m-r-5">
						<i class="fa fa-facebook-f" aria-hidden="true"></i>
					</a>

					<a href="https://twitter.com/loginworkss" target="_blank" class="contact100-form-social-item flex-c-m bg2 m-r-5">
						<i class="fa fa-twitter" aria-hidden="true"></i>
					</a>

					<a href="https://www.youtube.com/LoginworksSoftwares" target="_blank" class="contact100-form-social-item flex-c-m bg3">
						<i class="fa fa-youtube-play" aria-hidden="true"></i>
					</a>
				</div>
			</form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('images/bg-01.jpg');">
			</div>
		</div>
	</div>
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-sm">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Enter OTP</h4>
			</div>
			<div class="modal-body">
			  <input type="text" class="form-control"  id="email_code" placeholder="OTP" name="email_code" style="display:none">
			  <div style="display: flex;justify-content: center;width: 100%;margin-top: 10px;">
			  <input type="button" class="btn btn-primary" id="otp_confirm" value="Submit">
			  </div>
			  <span id="msg" style="color:red"></span>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div>
		</div>
	 </div>
	<script src="<?php echo site_url;?>js/animsition.min.js"></script>
	<script src="<?php echo site_url; ?>js/popper.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="<?php echo site_url; ?>js/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
		$(".js-select2").each(function(){
			$(this).on('select2:open', function (e){
				$(this).parent().next().addClass('eff-focus-selection');
			});
		});
		$(".js-select2").each(function(){
			$(this).on('select2:close', function (e){
				$(this).parent().next().removeClass('eff-focus-selection');
			});
		});

	</script>
<script>
	$(document).ready(function(){
		//Email Verification Code
		$("#submit").on("click",function(){
			flag = 1;
			var email = $('#email').val();
			var name = $('#name').val();
			var contact_no = $('#contact_no').val();
			var department = $('#department').val();
			
			if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
				$('.email-error').html("");
			}else{
				$('.email-error').html("Required");
				flag = 0;
			}
			
			if(name == ''){
				$('.name-error').html("Required");
				flag = 0;
			}else{
				$('.name-error').html("");
			}
			
			if(contact_no == ''){
				flag = 0;
				$('.contact-error').html("Required");
			}else{
					var pattern = /^\d{10}$/;
					if (pattern.test(contact_no)) {
					$('.contact-error').html("");
					}else{
					flag = 0;
					$('.contact-error').html("Not Correct");
					}
			}
			
			if(flag == 1){
			$('#email_code').show();
			$.ajax({
				url  : 'verification_mail.php',
				type : 'post',
				data : {
					email  : email,
					name   : name,
					department : department,
					contact_no : contact_no
					
				},
				dataType : 'text',
				success : function(msg){
					if(msg == "email-exist"){
						$('.email-error').html("Email Already Exist");
					}else if(msg == "Message could not be sent..."){
						$('.email-error').html(msg);
					}else{
					$('#myModal').modal('toggle');
					}
				},
				error: function(msg){
					alert('Try Again');
				}
			});
			}
		});
		//Code Validation
		$("#otp_confirm").click(function(){
			var email_code = $('#email_code').val();
			
			$.ajax({
				url  : 'verification_mail.php',
				type : 'post',
				data : {
					email_code  : email_code
				},
				dataType : 'text',
				success : function(msg){
					if(msg ==  1){
						$('#msg').html("Confirmed");
						setTimeout(function() {
							window.location.href="<?php echo site_url; ?>form.php";
						}, 1000);
						
					}else{
						$('#msg').html("Not Confirmed! Try Again");
					}
				},
				error: function(msg){
					alert('Try Again');
				}
			});
		});
	});
</script>
</html>