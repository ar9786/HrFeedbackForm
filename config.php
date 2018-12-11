<?php
session_start();
$con = mysqli_connect("localhost","pallab_test","$1Rs@CwX.Wm?","pallab_test");
define('site_url','https://www.loginworks.net/form/');
/*if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{
	echo "Succes";
}*/
//Get Indivudal Department By ID
function getDepartment($id,$con){
	$sql_dept = mysqli_query($con,"select depart_name from wp_department where id = '$id'");
	$sql_fetch = mysqli_fetch_array($sql_dept);
	echo $sql_fetch['depart_name'];
}

//Get All Department
$sql = "select * from wp_department where status = 1";
$dept = array();
$result=mysqli_query($con,$sql);
while ($row=mysqli_fetch_array($result)){
	$dept[] = $row;
}

//Get Indivudal User Rating
function getRating($id,$con){
	$sql_rating = mysqli_query($con,"SELECT SUM(recptnst) + SUM(reqtr) + SUM(comm_promt) + SUM(overall_exp_process) + SUM(is_intvw_on_tme) + SUM(intrvwr_prpd) + SUM(how_u_treted) + SUM(job_expltn) + SUM(recmd_friend) + SUM(rec_process) + SUM(crtsy_rsp_interviewr) AS total_rating from wp_enquiry_form where id = '$id'");
	$sql_fetch_rating = mysqli_fetch_array($sql_rating);
	$total_rating = $sql_fetch_rating['total_rating'];
	echo $avg_total_rating = number_format((float)$total_rating/11, 2, '.', '');
}

// Get Complete User Rating
function getCompleteRating($con,$no_of_users){
	$sql_rating = mysqli_query($con,"SELECT SUM(recptnst) + SUM(reqtr) + SUM(comm_promt) + SUM(overall_exp_process) + SUM(is_intvw_on_tme) + SUM(intrvwr_prpd) + SUM(how_u_treted) + SUM(job_expltn) + SUM(recmd_friend)  + SUM(rec_process) + SUM(crtsy_rsp_interviewr) AS total_rating from wp_enquiry_form");
	$sql_fetch_rating = mysqli_fetch_array($sql_rating);
	$total_rating = $sql_fetch_rating['total_rating'];
	$avg_total_rating = number_format((float)$total_rating/($no_of_users * 11), 2, '.', '');
	if(empty($total_rating))
	return 0;
	else
	return $avg_total_rating;
}

function getFrontDeskRating($con,$no_of_users){
	$sql_rating = mysqli_query($con,"SELECT SUM(recptnst) + SUM(how_u_treted) AS total_rating from wp_enquiry_form");
	$sql_fetch_rating = mysqli_fetch_array($sql_rating);
	$total_rating = $sql_fetch_rating['total_rating'];
	$avg_total_rating = number_format((float)$total_rating/($no_of_users * 2), 2, '.', '');
	if(empty($total_rating))
	return 0;
	else
	return $avg_total_rating;	
}
function getRecruiterRating($con,$no_of_users){
	$sql_rating = mysqli_query($con,"SELECT  SUM(reqtr) + SUM(comm_promt) +  SUM(job_expltn) +  SUM(rec_process) AS total_rating from wp_enquiry_form");
	$sql_fetch_rating = mysqli_fetch_array($sql_rating);
	$total_rating = $sql_fetch_rating['total_rating'];
	$avg_total_rating = number_format((float)$total_rating/($no_of_users * 4), 2, '.', '');
	if(empty($total_rating))
	return 0;
	else
	return $avg_total_rating;
}
function getInterviewRating($con,$no_of_users){
	$sql_rating = mysqli_query($con,"SELECT SUM(overall_exp_process) + SUM(is_intvw_on_tme) +  SUM(recmd_friend) AS total_rating from wp_enquiry_form");
	$sql_fetch_rating = mysqli_fetch_array($sql_rating);
	$total_rating = $sql_fetch_rating['total_rating'];
	$avg_total_rating = number_format((float)$total_rating/($no_of_users * 3), 2, '.', '');
	if(empty($total_rating))
	return 0;
	else
	return $avg_total_rating;
}
function getInterviewerRating($con,$no_of_users){
	$sql_rating = mysqli_query($con,"SELECT SUM(intrvwr_prpd) + SUM(crtsy_rsp_interviewr) AS total_rating from wp_enquiry_form");
	$sql_fetch_rating = mysqli_fetch_array($sql_rating);
	$total_rating = $sql_fetch_rating['total_rating'];
	$avg_total_rating = number_format((float)$total_rating/($no_of_users * 2), 2, '.', '');
	if(empty($total_rating))
	return 0;
	else
	return $avg_total_rating;
}

// newNotification
function newNotification($con){
	$all_notification = mysqli_query($con,"SELECT * from wp_enquiry_form where status = 0");
	$rows_num =  mysqli_num_rows($all_notification);
	echo $rows_num;
}
$array_notification = mysqli_query($con,"SELECT * from wp_enquiry_form where status = 0");
//
$sql_candidate_rating = mysqli_query($con,"SELECT MONTHNAME(mail_time) AS m, COUNT(id)
FROM wp_enquiry_form GROUP BY m");
while($fetch_candidate_ratig = mysqli_fetch_array($sql_candidate_rating)){
	$fetch_candidate_rating[] = $fetch_candidate_ratig['COUNT(id)'];
	$fetch_candidate_labels[] = $fetch_candidate_ratig['m'];
}
//
$str_candidate_ratigs = mysqli_query($con,"SELECT MONTHNAME(mail_time) AS m, 
COUNT(id) , 
FORMAT((AVG (recptnst) + AVG (reqtr) 
+ AVG (comm_promt) + AVG (overall_exp_process) 
+ AVG (is_intvw_on_tme) + AVG (intrvwr_prpd) 
+ AVG (how_u_treted) + AVG (job_expltn) 
+ AVG (recmd_friend)  + AVG (rec_process) 
+ AVG (crtsy_rsp_interviewr) )/11,2)
as total_rating from  wp_enquiry_form GROUP BY m
");
while($str_candidate_ratig = mysqli_fetch_array($str_candidate_ratigs)){
	$str_candidate_ratg[] = $str_candidate_ratig['m'];
	$str_candidate_labels[] = $str_candidate_ratig['total_rating'];
}
?>