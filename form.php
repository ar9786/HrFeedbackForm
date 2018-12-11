<?php
require_once('config.php');
if(empty($_SESSION['email'])){
	header('Location:' .site_url);
	die;
}
if(isset($_POST['submit_enquiry'])){
	$chk_flag = 0;
	if($_POST['recptnst'] == 0){
		$flag[] = array("recptnst"=>"Required");
		$chk_flag = 1;
	}else{
		$flag[] = array("recptnst"=>"");
	}
	if($_POST['reqtr'] == 0){
		$flag[] = array("reqtr"=>"Required");
		$chk_flag = 1;
	}else{
		$flag[] = array("reqtr"=>"");
	}
	if($_POST['comm_promt'] == 0){
		$flag[] = array("comm_promt"=>"Required");
		$chk_flag = 1;
	}else{
		$flag[] = array("comm_promt"=>"");
	}
	if($_POST['overall_exp_process'] == 0){
		$flag[] = array("overall_exp_process"=>"Required");
		$chk_flag = 1;
	}else{
		$flag[] = array("overall_exp_process"=>"");
	}
	if($_POST['is_intvw_on_tme'] == 0){
		$flag[] = array("is_intvw_on_tme"=>"Required");
		$chk_flag = 1;
	}else{
		$flag[] = array("is_intvw_on_tme"=>"");
	}
	if($_POST['intrvwr_prpd'] == 0){
		$flag[] = array("intrvwr_prpd"=>"Required");
		$chk_flag = 1;
	}else{
		$flag[] = array("intrvwr_prpd"=>"");
	}
	if($_POST['how_u_treted'] == 0){
		$flag[] = array("how_u_treted"=>"Required");
		$chk_flag = 1;
	}else{
		$flag[] = array("how_u_treted"=>"");
	}
	if($_POST['job_expltn'] == 0){
		$chk_flag = 1;
		$flag[] = array("job_expltn"=>"Required");
	}else{
		$flag[] = array("job_expltn"=>"");
	}
	if($_POST['recmd_friend'] == 0){
		$chk_flag = 1;
		$flag[] = array("recmd_friend"=>"Required");
	}else{
		$flag[] = array("recmd_friend"=>"");
	}
	if($_POST['rec_process'] == 0){
		$chk_flag = 1;
		$flag[] = array("rec_process"=>"Required");
	}else{
		$flag[] = array("rec_process"=>"");
	}
	if($_POST['crtsy_rsp_interviewr'] == 0){
		$chk_flag = 1;
		$flag[] = array("crtsy_rsp_interviewr"=>"Required");
	}else{
		$flag[] = array("crtsy_rsp_interviewr"=>"");
	}
	if($_POST['expltn_feedbk'] == ''){
		$chk_flag = 1;
		$flag[] = array("expltn_feedbk"=>"Required");
	}else{
		$flag[] = array("expltn_feedbk"=>"");
	}
	if ($chk_flag == 0) {
	$mail_time = date('Y-m-d H:i:s');
	$sql = "INSERT INTO wp_enquiry_form  set 
	name = '$_SESSION[name]',
	contact_no = '$_SESSION[contact_no]',
	email = '$_SESSION[email]',
	department = '$_SESSION[department]',
	recptnst = '$_POST[recptnst]',
	reqtr = '$_POST[reqtr]',
	comm_promt = '$_POST[comm_promt]',
	overall_exp_process = '$_POST[overall_exp_process]',
	is_intvw_on_tme = '$_POST[is_intvw_on_tme]',
	intrvwr_prpd = '$_POST[intrvwr_prpd]',
	how_u_treted = '$_POST[how_u_treted]',
	job_expltn = '$_POST[job_expltn]',
	recmd_friend = '$_POST[recmd_friend]',
	crtsy_rsp_interviewr = '$_POST[crtsy_rsp_interviewr]',
	rec_process = '$_POST[rec_process]',
	expltn_feedbk = '$_POST[expltn_feedbk]',
	mail_time = '$mail_time'
	";
	if ($con->query($sql) === TRUE) {
			$to = "pramod.kumar@loginworks.com";
			$subject = "New FeedBack";

			$message = '<b>Name '.$_SESSION['name'].'
			<br><b>Email </b> '.$_SESSION['email'].'
			<br><b>Message </b> One new feedback has been submited
			<br>Click here to view<a href="'.site_url.'admin"></a> 
			';

			$header = "From: <loginworks.com>" . "\r\n";
			//$header .= "Cc:afgh@somedomain.com \r\n";
			$header .= "MIME-Version: 1.0\r\n";
			$header .= "Content-type: text/html\r\n";

			$retval = mail ($to,$subject,$message,$header);
			unset($_SESSION['email']);
			?>
			<script>
			
			window.location.href="<?php echo site_url;?>";
			</script>
			<?php 
	} else {
		echo "Error: " . $sql . "<br>" . $con->error;
	}
	$con->close();
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FeedBack Question's</title>
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
	<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
	<link rel="stylesheet" href="css/star-yo.css">
	<script src="js/star.js"></script>
	<script src="js/emoji.js"></script>-->
	<style>
	.rateYo img {
		height:80px;
	}
	.emoji:hover {
		transform: scale(1.2);
	}
	</style>
</head>

<body>
<div class="col-md-5"></div>
<div class="col-md-2">
<div class="logo-page">
	<img src="https://lws-abt5wcf.netdna-ssl.com/wp-content/uploads/2018/05/logo-1-1.png"/ height="100%" width="100%">
</div>
</div>
<div class="col-md-5"></div>
<form action="" method="POST" id="star_submit">
    <div class="container">
        <div class="hr-form-2">
            <h2 class="col-md-12">1
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>How friendly/warm was the receptionist when you arrived for your interview? *</h2><h4 class="col-md-12"><?php if(isset($flag)){ if($flag[0]['recptnst'] == "Required"){ ?><span class="forformerror">Required</span><?php } }?></h4>
				<div class="rating">
					<div class="rateYo">
						<img src="<?php echo site_url;?>images/very-poor.png" data-value="1" class="emoji">
							<img src="<?php echo site_url;?>images/poor.png" data-value="2" class="emoji">
							<img src="<?php echo site_url;?>images/average.png" data-value="3" class="emoji">
							<img src="<?php echo site_url;?>images/good.png" data-value="4" class="emoji">
							<img src="<?php echo site_url;?>images/excellent.png" data-value="5" class="emoji">
						<input type="hidden" name="recptnst" class="val" >
						<span class="formerror"></span>
					</div>
				</div>
            
            <h2 class="col-md-12">2
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg> 	How clearly did our recruiter explain the steps of the hiring process and job details? *</h2><h4 class="col-md-12"><?php if(isset($flag)){ if($flag[1]['reqtr'] == "Required"){ ?><span class="forformerror">Required</span><?php } }?></h4>
				<div class="rating">
						<div class="rateYo">
							<img src="<?php echo site_url;?>images/very-poor.png" data-value="1" class="emoji">
							<img src="<?php echo site_url;?>images/poor.png" data-value="2" class="emoji">
							<img src="<?php echo site_url;?>images/average.png" data-value="3" class="emoji">
							<img src="<?php echo site_url;?>images/good.png" data-value="4" class="emoji">
							<img src="<?php echo site_url;?>images/excellent.png" data-value="5" class="emoji">
							<input type="hidden" name="reqtr" class="val" >
							<span class="formerror"></span>
						</div>
				</div>
            <h2 class="col-md-12">3
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>Was email and phone communication prompt and effective during the hiring process? *</h2><h4 class="col-md-12"><?php if(isset($flag)){ if($flag[2]['comm_promt'] == "Required"){ ?><span class="forformerror">Required</span><?php } }?></h4>
            <div class="rating">
               <div class="rateYo">
					<img src="<?php echo site_url;?>images/very-poor.png" data-value="1" class="emoji">
					<img src="<?php echo site_url;?>images/poor.png" data-value="2" class="emoji">
					<img src="<?php echo site_url;?>images/average.png" data-value="3" class="emoji">
					<img src="<?php echo site_url;?>images/good.png" data-value="4" class="emoji">
					<img src="<?php echo site_url;?>images/excellent.png" data-value="5" class="emoji">
					<input type="hidden" name="comm_promt" class="val" >
					<span class="formerror"></span>
			   </div>
            </div>
            <h2 class="col-md-12">4
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>Overall, how would you evaluate your experience during the interview process? *</h2><h4 class="col-md-12"><?php if(isset($flag)){ if($flag[3]['overall_exp_process'] == "Required"){ ?><span class="forformerror">Required</span><?php } } ?></h4>
			<div class="rating">
               <div class="rateYo">
					<img src="<?php echo site_url;?>images/very-poor.png" data-value="1" class="emoji">
					<img src="<?php echo site_url;?>images/poor.png" data-value="2" class="emoji">
					<img src="<?php echo site_url;?>images/average.png" data-value="3" class="emoji">
					<img src="<?php echo site_url;?>images/good.png" data-value="4" class="emoji">
					<img src="<?php echo site_url;?>images/excellent.png" data-value="5" class="emoji">
					<input type="hidden" name="overall_exp_process" class="val" >
					<span class="formerror"></span>
			   </div>
            </div>
            <h2 class="col-md-12">5
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>Did the interview start on time? *</h2><h4 class="col-md-12"><?php if(isset($flag)){ if($flag[4]['is_intvw_on_tme'] == "Required"){ ?><span class="forformerror">Required</span><?php }} ?></h4>
            <div class="rating">
               <div class="rateYo">
					<img src="<?php echo site_url;?>images/very-poor.png" data-value="1" class="emoji">
					<img src="<?php echo site_url;?>images/poor.png" data-value="2" class="emoji">
					<img src="<?php echo site_url;?>images/average.png" data-value="3" class="emoji">
					<img src="<?php echo site_url;?>images/good.png" data-value="4" class="emoji">
					<img src="<?php echo site_url;?>images/excellent.png" data-value="5" class="emoji">
					<input type="hidden" name="is_intvw_on_tme" class="val" >
					<span class="formerror"></span>
				</div>
            </div>

            <h2 class="col-md-12">6
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>Were the interviewers prepared and did they conduct the interview skillfully? *</h2><h4 class="col-md-12"><?php if(isset($flag)){ if($flag[5]['intrvwr_prpd'] == "Required"){ ?><span class="forformerror">Required</span><?php } } ?></h4>
            <div class="rating">
               <div class="rateYo">
					<img src="<?php echo site_url;?>images/very-poor.png" data-value="1" class="emoji">
					<img src="<?php echo site_url;?>images/poor.png" data-value="2" class="emoji">
					<img src="<?php echo site_url;?>images/average.png" data-value="3" class="emoji">
					<img src="<?php echo site_url;?>images/good.png" data-value="4" class="emoji">
					<img src="<?php echo site_url;?>images/excellent.png" data-value="5" class="emoji">
					<input type="hidden" name="intrvwr_prpd" class="val" >
					<span class="formerror"></span>
			   </div>
            </div>
            <h2 class="col-md-12">7
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>Were you treated with courtesy and respect by receptionist? *</h2><h4 class="col-md-12"><?php if(isset($flag)){ if($flag[6]['how_u_treted'] == "Required"){ ?><span class="forformerror">Required</span><?php } }?></h4>
			<div class="rating">
               <div class="rateYo">
					<img src="<?php echo site_url;?>images/very-poor.png" data-value="1" class="emoji">
					<img src="<?php echo site_url;?>images/poor.png" data-value="2" class="emoji">
					<img src="<?php echo site_url;?>images/average.png" data-value="3" class="emoji">
					<img src="<?php echo site_url;?>images/good.png" data-value="4" class="emoji">
					<img src="<?php echo site_url;?>images/excellent.png" data-value="5" class="emoji">
					<input type="hidden" name="how_u_treted" class="val" >
					<span class="formerror"></span>
			   </div>
            </div>
            <h2 class="col-md-12">8
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>Did the job description explain the position clearly? *</h2><h4 class="col-md-12"><?php if(isset($flag)){ if($flag[7]['job_expltn'] == "Required"){ ?><span class="forformerror">Required</span><?php }} ?></h4>
            <div class="rating">
               <div class="rateYo">
					<img src="<?php echo site_url;?>images/very-poor.png" data-value="1" class="emoji">
					<img src="<?php echo site_url;?>images/poor.png" data-value="2" class="emoji">
					<img src="<?php echo site_url;?>images/average.png" data-value="3" class="emoji">
					<img src="<?php echo site_url;?>images/good.png" data-value="4" class="emoji">
					<img src="<?php echo site_url;?>images/excellent.png" data-value="5" class="emoji">
					<input type="hidden" name="job_expltn" class="val" >
					<span class="formerror"></span>
			   </div>
            </div>
            <h2 class="col-md-12">9
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>Would you recommend us to your friends as an employer? *</h2><h4 class="col-md-12" ><?php if(isset($flag)){ if($flag[8]['recmd_friend'] == "Required"){ ?><span class="forformerror">Required</span><?php } } ?></h4>
            <div class="rating">
               <div class="rateYo">
					<img src="<?php echo site_url;?>images/very-poor.png" data-value="1" class="emoji">
					<img src="<?php echo site_url;?>images/poor.png" data-value="2" class="emoji">
					<img src="<?php echo site_url;?>images/average.png" data-value="3" class="emoji">
					<img src="<?php echo site_url;?>images/good.png" data-value="4" class="emoji">
					<img src="<?php echo site_url;?>images/excellent.png" data-value="5" class="emoji">
					<input type="hidden" name="recmd_friend" class="val" >
					<span class="formerror"></span>
			   </div>
            </div>
			            <h2 class="col-md-12">10
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>How clearly did your recruiter explain the rest of the recruiting process following your interview? *</h2><h4 class="col-md-12" ><?php if(isset($flag)){ if($flag[9]['rec_process'] == "Required"){ ?><span class="forformerror">Required</span><?php }}?></h4>
            <div class="rating">
               <div class="rateYo">
					<img src="<?php echo site_url;?>images/very-poor.png" data-value="1" class="emoji">
					<img src="<?php echo site_url;?>images/poor.png" data-value="2" class="emoji">
					<img src="<?php echo site_url;?>images/average.png" data-value="3" class="emoji">
					<img src="<?php echo site_url;?>images/good.png" data-value="4" class="emoji">
					<img src="<?php echo site_url;?>images/excellent.png" data-value="5" class="emoji">
					<input type="hidden" name="rec_process" class="val" >
					<span class="formerror"></span>
			   </div>
            </div>
			<h2 class="col-md-12">11
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>Were you treated with courtesy and respect by interviewer? *</h2><h4 class="col-md-12"><?php if(isset($flag)){ if($flag[10]['crtsy_rsp_interviewr'] == "Required"){ ?><span class="forformerror">Required</span><?php }}?></h4>
			<div class="rating">
               <div class="rateYo">
					<img src="<?php echo site_url;?>images/very-poor.png" data-value="1" class="emoji">
					<img src="<?php echo site_url;?>images/poor.png" data-value="2" class="emoji">
					<img src="<?php echo site_url;?>images/average.png" data-value="3" class="emoji">
					<img src="<?php echo site_url;?>images/good.png" data-value="4" class="emoji">
					<img src="<?php echo site_url;?>images/excellent.png" data-value="5" class="emoji">
					<input type="hidden" name="crtsy_rsp_interviewr" class="val" >
					<span class="formerror"></span>
			   </div>
            </div>
            <h2 class="col-md-12">12
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>Before you go, is there anything you would like to tell us? *</h2><h4 class="col-md-12" ><?php if(isset($flag)){ if($flag[11]['expltn_feedbk'] == "Required"){ ?><span class="forformerror">Required</span><?php } }?></h4>
            <div class="col-md-12"><input class="val" autocomplete="off" type="text" name="expltn_feedbk" placeholder="Type your answer here..."><span class="formerror"></span></div>
        </div>
        <button name="submit_enquiry" type="submit" class="button" >Submit</button>
    </div>
</form>
    <script>
		/*
		$(function(){
        $(".rateYo").emoji({opacity: 1, width: '75px',callback: function (event, value) {
			$(this).next.next('.val').val(value);
		}});
		});*/
		/*$(function () {
			$(".rateYo").rateYo({
				rating: 0,
				halfStar: true,
				starWidth: "60px"
			});
			$(".rateYo").rateYo()
              .on("rateyo.set", function (e, data) {
				  $(this).next('.val').val(data.rating);
              });
		});*/
		
		$('.val').keyup(function(){
			$(this).next('.formerror').html("");
		});
		
		$('.emoji').click(function(){
			$rte = $(this).attr('data-value');
			$(this).parent().find('.formerror').html("");
			$(this).parent().find('.emoji').css("cssText", "height: 80px !important;");
			$(this).css("cssText", "height: 110px !important; -webkit-filter: grayscale(100%);");
			$(this).parent().find('.val').val($rte);
		});
		$('#star_submit').submit(function (){
			var errot=0;
			$( ".val" ).each(function( index ) {
				if($( this ).val() == ''){
					errot = 1;
					$(this).next('.formerror').html("Required");
				}else{
					$(this).next('.formerror').html(" ");
				}	
			});
			if(errot == 1){
			return false;
			}else{
				alert("Thank You for sharing the feedback. All the best for your future endeavors.");
			return true;
			}
		});
    </script>
</body>

</html>