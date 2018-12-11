<?php
include('config.php');
header("Content-type:application/json"); 
/*
$ccc = array();
$sql_dept = mysqli_query($con,"select * from wp_enquiry_form");
while($sql_fetch = mysqli_fetch_array($sql_dept)){
	$ccc[] = $sql_fetch;
}*/
$myArr = array("John"=>"asdas", "Mary"=>"asd", "Peter"=>"asd", "Sally"=>"ad");

$myJSON = json_encode($myArr);
echo $_GET['callback'] . '(' . $myJSON. ')';
//echo json_encode($ccc);
?>