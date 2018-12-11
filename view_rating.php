<?php
require_once('config.php');
if(empty($_SESSION['user_name'])){
	header('Location:' .site_url.'admin1');
	die;
}
mysqli_query($con,"update wp_enquiry_form set status = 1 where id = '$_GET[user_id]'");

$sql_user_data = "select * from wp_enquiry_form where id = '$_GET[user_id]'";
$result_user_info=mysqli_query($con,$sql_user_data);
$row_fetch_user_data=mysqli_fetch_array($result_user_info);
function rateGet($val){
	switch($val){
			case "1":
					echo '<img src="'.site_url.'images/very-poor.png" data-value="1" class="emoji">';
					break;
			case "2":
					echo '<img src="'.site_url.'images/poor.png" data-value="2" class="emoji">';
					break;
			case "3":
					echo '<img src="'.site_url.'images/average.png" data-value="3" class="emoji">';
					break;
			case "4":
					echo '<img src="'.site_url.'images/good.png" data-value="4" class="emoji">';
					break;
			case "5":
					echo '<img src="'.site_url.'images/excellent.png" data-value="5" class="emoji">';
					break;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
	
	<link rel="stylesheet" href="css/star-yo.css">
<!-- Latest compiled and minified JavaScript -->
	<script src="js/star.js"></script>
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
<div class="container">
<div class="row">
<div class="col-md-5"></div>
<div class="col-md-2">
<div class="logo-page">
	<a href="<?php echo site_url;?>" ><img src="https://lws-abt5wcf.netdna-ssl.com/wp-content/uploads/2018/05/logo-1-1.png"/ height="100%" width="100%"></a>
</div>
</div>
<div class="col-md-5"></div>
</div>
<div class="row">
    <div class="container">
		<div class="col-md-4">
			<label>Name - <?php echo $row_fetch_user_data['name']; ?></label>
		</div>
		<div class="col-md-4">
			<label>Email - <?php echo $row_fetch_user_data['email']; ?></label>
		</div>
		<div class="col-md-4">
			<label>Contact No - <?php echo $row_fetch_user_data['contact_no']; ?></label>
		</div>
	</div>
		<div class="container">
        <div class="hr-form-2">
            <h2 class="col-md-12">1
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>How friendly/warm was the receptionist when you arrived for your interview? *</h2>
				<div class="rating">
					<div class="rateYo">
						<?php  echo rateGet($row_fetch_user_data['recptnst']); ?>
					</div>
				</div>
            
            <h2 class="col-md-12">2
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg> 	How clearly did our recruiter explain the steps of the hiring process and job details? *</h2>
				<div class="rating">
						<div class="rateYo">
							<?php  echo rateGet($row_fetch_user_data['reqtr']); ?>
						</div>
				</div>
            <h2 class="col-md-12">3
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>Was email and phone communication prompt and effective during the hiring process? *</h2>
            <div class="rating">
               <div class="rateYo">
					<?php  echo rateGet($row_fetch_user_data['comm_promt']); ?>
			   </div>
            </div>
            <h2 class="col-md-12">4
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>Overall, how would you evaluate your experience during the interview process? *</h2>
			<div class="rating">
               <div class="rateYo">
					<?php  echo rateGet($row_fetch_user_data['overall_exp_process']); ?>
			   </div>
            </div>
            <h2 class="col-md-12">5
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>Did the interview start on time? *</h2>
            <div class="rating">
               <div class="rateYo">
				<?php  echo rateGet($row_fetch_user_data['is_intvw_on_tme']); ?>
				</div>
            </div>

            <h2 class="col-md-12">6
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>Were the interviewers prepared and did they conduct the interview skillfully? *</h2>
            <div class="rating">
               <div class="rateYo">
					<?php  echo rateGet($row_fetch_user_data['intrvwr_prpd']); ?>
			   </div>
            </div>
            <h2 class="col-md-12">7
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>Were you treated with courtesy and respect by receptionist? *</h2>
			<div class="rating">
               <div class="rateYo">
					<?php  echo rateGet($row_fetch_user_data['how_u_treted']); ?>
			   </div>
            </div>
            <h2 class="col-md-12">8
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>Did the job description explain the position clearly? *</h2>
            <div class="rating">
               <div class="rateYo">
					<?php  echo rateGet($row_fetch_user_data['job_expltn']); ?>
			   </div>
            </div>
            <h2 class="col-md-12">9
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>Would you recommend us to your friends as an employer? *</h2>
            <div class="rating">
               <div class="rateYo">
					<?php  echo rateGet($row_fetch_user_data['recmd_friend']); ?>
			   </div>
            </div>
			            <h2 class="col-md-12">10
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>How clearly did your recruiter explain the rest of the recruiting process following your interview? *</h2>
            <div class="rating">
               <div class="rateYo">
					<?php  echo rateGet($row_fetch_user_data['rec_process']); ?>
			   </div>
            </div>
			<h2 class="col-md-12">11
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>Were you treated with courtesy and respect by interviewer? *</h2>
			<div class="rating">
               <div class="rateYo">
					<?php  echo rateGet($row_fetch_user_data['crtsy_rsp_interviewr']); ?>
			   </div>
            </div>
            <h2 class="col-md-12">12
                <svg class="SVGInline-svg" width="11" height="10" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero">
                        <path d="M7.586 5L4.293 1.707 5.707.293 10.414 5 5.707 9.707 4.293 8.293z"></path>
                        <path d="M8 4v2H0V4z"></path>
                    </g>
                </svg>Before you go, is there anything you would like to tell us? *</h2>
            <div class="col-md-12"><h4 style="margin-left: 51px;"><?php echo $row_fetch_user_data['expltn_feedbk']; ?></h4></div>
        </div>
    </div>
</div>
</div>
</body>
</html>