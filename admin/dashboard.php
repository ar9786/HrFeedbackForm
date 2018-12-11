<?php
include('header.php');
//Total No of candidates
$tot_feedbk_sql = mysqli_query($con,"select * from wp_enquiry_form");
$toal_no_feedbk = mysqli_num_rows($tot_feedbk_sql);
// Pagination Start
$perpage = 10;
if(isset($_GET['abc']) && !empty($_GET['abc'])){
	$curpage = $_GET['abc'];
}else{
	$curpage = 1;
}
$start = ( $curpage * $perpage ) - $perpage;
$totalres = $toal_no_feedbk;
$endpage = ceil($totalres/$perpage);
$startpage = 1;
$nextpage = $curpage + 1;
$previouspage = $curpage - 1;


$user_loop = array();
$users_feedbk_sql = mysqli_query($con,"select * from wp_enquiry_form limit $start , $perpage");
while($users_feedbk_fetch = mysqli_fetch_array($users_feedbk_sql)){
	$user_loop[] = $users_feedbk_fetch;
}
// Pagination End


// Filters Data By Date
if(!empty($_POST['date_field1']) && empty($_POST['dept_wise'])){
	$user_loop = array();
	$feedbk__date_sql = mysqli_query($con,"select * from wp_enquiry_form where mail_time >= '$_POST[date_field1] 00:00:00' && mail_time <= '$_POST[date_field2] 24:59:59'");
	while($date_feedbk_fetch = mysqli_fetch_array($feedbk__date_sql)){
		$user_loop[] = $date_feedbk_fetch;
	}
	$no_of_users = mysqli_num_rows($feedbk__date_sql);
	
	$ratng_act_serch = mysqli_query($con,"SELECT SUM(recptnst) + SUM(reqtr) + SUM(comm_promt) + SUM(overall_exp_process) + SUM(is_intvw_on_tme) + SUM(intrvwr_prpd) + SUM(how_u_treted) + SUM(job_expltn) + SUM(recmd_friend) AS total_rating from wp_enquiry_form where mail_time >= '$_POST[date_field1] 00:00:00' && mail_time <= '$_POST[date_field2] 24:59:59'");
	
	$sql_fetch_rating = mysqli_fetch_array($ratng_act_serch);
	$deptmt = $_POST['dept_wise'];
	if(empty($sql_fetch_rating['total_rating']))
	$ratng_serch_wise =  0;
	else
	$ratng_serch_wise = round($sql_fetch_rating['total_rating']/($no_of_users * 9));
}
// Filter Data By Department Wise
if(!empty($_POST['dept_wise']) && empty($_POST['date_field1']) && empty($_POST['date_field2'] )){
	$user_loop = array();
	$name_feedbk_sql = mysqli_query($con,"select * from wp_enquiry_form where department = '$_POST[dept_wise]'");
	while($name_feedbk_fetch = mysqli_fetch_array($name_feedbk_sql)){
		$user_loop[] = $name_feedbk_fetch;
	}
	
	$no_of_users = mysqli_num_rows($name_feedbk_sql);
	
	$ratng_act_serch = mysqli_query($con,"SELECT SUM(recptnst) + SUM(reqtr) + SUM(comm_promt) + SUM(overall_exp_process) + SUM(is_intvw_on_tme) + SUM(intrvwr_prpd) + SUM(how_u_treted) + SUM(job_expltn) + SUM(recmd_friend) AS total_rating from wp_enquiry_form where department = '$_POST[dept_wise]'");
	
	$sql_fetch_rating = mysqli_fetch_array($ratng_act_serch);
	//$ratng_serch_wise = round($sql_fetch_rating['total_rating']/($no_of_users * 9));
	$deptmt = $_POST['dept_wise'];
	if(empty($sql_fetch_rating['total_rating']))
	$ratng_serch_wise =  0;
	else
	$ratng_serch_wise = round($sql_fetch_rating['total_rating']/($no_of_users * 9));
	
}
// Filter Data By Department And Date Wise
if(!empty($_POST['dept_wise']) && !empty($_POST['date_field1']) && !empty($_POST['date_field2'] )){
	$user_loop = array();
	$name_feedbk_sql = mysqli_query($con,"select * from wp_enquiry_form where department = '$_POST[dept_wise]' AND mail_time >= '$_POST[date_field1] 00:00:00' && mail_time <= '$_POST[date_field2] 24:59:59'");
	while($name_feedbk_fetch = mysqli_fetch_array($name_feedbk_sql)){
		$user_loop[] = $name_feedbk_fetch;
	}
	$no_of_users = mysqli_num_rows($name_feedbk_sql);
	
	$ratng_act_serch = mysqli_query($con,"SELECT SUM(recptnst) + SUM(reqtr) + SUM(comm_promt) + SUM(overall_exp_process) + SUM(is_intvw_on_tme) + SUM(intrvwr_prpd) + SUM(how_u_treted) + SUM(job_expltn) + SUM(recmd_friend) AS total_rating from wp_enquiry_form where department = '$_POST[dept_wise]' AND mail_time >= '$_POST[date_field1] 00:00:00' && mail_time <= '$_POST[date_field2] 24:59:59'");
	
	$sql_fetch_rating = mysqli_fetch_array($ratng_act_serch);
	$ratng_serch_wise = round($sql_fetch_rating['total_rating']/($no_of_users * 9));
	$deptmt = $_POST['dept_wise'];
	if(empty($sql_fetch_rating['total_rating']))
	$ratng_serch_wise =  0;
	else
	$ratng_serch_wise = round($sql_fetch_rating['total_rating']/($no_of_users * 9));
}
?>
<head>
<style>
#d-star{
	position: absolute;
	color: #f7ce55;
}
</style>
</head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <!--<div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                    <button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>add item</button>
                                </div>
                            </div>
                        </div>-->
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $toal_no_feedbk; ?></h2>
                                                <span>Candidates</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="candidate_chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-star"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo getCompleteRating($con,$toal_no_feedbk); ?></h2>
                                                <span>Ratings</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="ratings"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
							 <div class="col-lg-6">
                                <div class="au-card chart-percent-card" >
                                    <div class="au-card-inner">
                                        <h3 class="title-2 tm-b-5">Departmental Ratings </h3>
                                        <div class="row no-gutters">
                                            <div class="col-xl-6">
                                                <div class="chart-note-wrap">
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--green"></span>
                                                        <span>Front Desk </span><strong><span class="Ratings"><?php echo getFrontDeskRating($con,$toal_no_feedbk); ?></span><i class="zmdi zmdi-star" id= "d-star"></i></strong>
                                                    </div>
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--" style="background:#b4d857"></span>
                                                        <span>Recruiter </span><strong><span class="Ratings"><?php echo getRecruiterRating($con,$toal_no_feedbk); ?></span><i class="zmdi zmdi-star" id= "d-star"></i></strong>
                                                    </div>
													<div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--" style="background:#a950a8"></span>
                                                        <span>Interview </span><strong><span class="Ratings"><?php echo getInterviewRating($con,$toal_no_feedbk); ?></span><i class="zmdi zmdi-star" id= "d-star" ></i></strong>
                                                    </div>
													<div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--blue"></span>
                                                        <span>Interviewer </span><strong><span class="Ratings"><?php echo getInterviewerRating($con,$toal_no_feedbk); ?></span><i class="zmdi zmdi-star" id= "d-star"></i></strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="chart-category-department">
                                                    <canvas id="chart-category-department"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Listing By Candidate</h2>
								<div class="row">
						
				<div class="col-sm-3">
				<form action="" method="POST">
					<div class="form-group">
						  <label for="Select Department">Select Department:</label>
							<select id="department" name="dept_wise" class="form-control">
							<?php foreach($dept as $val){ ?>
							<option value="<?php echo $val['id']; ?>"><?php echo $val['depart_name']; ?></option>
							<?php } ?>
							</select>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label for="From">From:</label>
						<input type="text" autocomplete="off" class="form-control" id="datepicker1" placeholder="DD:MM:YY" name="date_field1">
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label for="To">To:</label>
						<input type="text" class="form-control" autocomplete="off" id="datepicker2" placeholder="DD:MM:YY" name="date_field2">
					</div>
				</div>
				<div class="col-sm-1">
					<input type="submit" value="Submit" style="margin-top: 40px;background: #333;color: white;border-radius: 15px;padding: inherit;">
				</div>
				</form>
						</div>
                                <div class="table-responsive table--no-card m-b-40">
								<?php if(isset($ratng_serch_wise)){ ?>
								<div class="row">
									<div class="col-sm-12">
									<p><strong>Rating According To<?php if($deptmt){ echo getDepartment($deptmt,$con).' Department'; } ?></strong>:<?php echo $ratng_serch_wise; ?></p>
									</div>
								</div>
								<?php } if($user_loop){ ?>
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
										<tr>
											<th>S.No</th>
											<th>Name</th>
											<th>Email</th>
											<th>Contact</th>
											<th>Department</th>
											<th>Date/Time</th>
											<th>Rating(5)</th>
										</tr>
                                        </thead>
                                        <tbody>
										<?php
										$id = 1;
										foreach($user_loop as $val){
										?>
										<tr>
										<td><?php echo $id; ?></td>
										<td><a href="https://www.loginworks.net/form/view_rating.php?user_id=<?php echo $val['id']; ?>" target="_blank" ><?php echo $val['name']; ?></a></td>
										<td><?php echo $val['email']; ?></td>
										<td><?php echo $val['contact_no']; ?></td>
										<td><?php echo getDepartment($val['department'],$con); ?></td>
										<td><?php echo date('d-M-y',strtotime($val['mail_time'])); ?></td>
										<td><?php echo getRating($val['id'],$con); ?></td>
										</tr>
										<?php  $id ++; }  ?>
                                        </tbody>
                                    </table>
									<ul class="pagination" style="padding: 9px 0px 9px 28px;">
			  <?php if($curpage != $startpage){ ?>
				<li class="page-item">
				  <a class="page-link" href="<?php echo site_url;?>admin/dashboard.php?abc=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
					<span class="sr-only">First</span>
				  </a>
				</li>
				<?php } ?>
				<?php if($curpage >= 2){ ?>
				<li class="page-item"><a class="page-link" href="<?php echo site_url;?>admin/dashboard.php?abc=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>
				<?php } ?>
				<li class="page-item active"><a class="page-link" href="<?php echo site_url;?>admin/dashboard.php?abc=<?php echo $curpage ?>"><?php echo $curpage ?></a></li>
				<?php if($curpage != $endpage){ ?>
				<li class="page-item"><a class="page-link" href="<?php echo site_url;?>admin/dashboard.php?abc=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
				<li class="page-item">
				  <a class="page-link" href="<?php echo site_url;?>admin/dashboard.php?abc=<?php echo $endpage ?>" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
					<span class="sr-only">Last</span>
				  </a>
				</li>
				<?php } ?>
			  </ul>
								<?php } else{ ?>
			<tbody>
				<tr><p style="color:red;">No Related Data Found</p></tr>
			</tbody>
		<?php }  ?>
                                </div>
                            </div>
                        </div>
						<?php //if(!empty($all_notification)){ ?>
                        <div class="row" id="au-card">
                            <div class="col-lg-6" >
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40" >
                                    <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-account-calendar"></i>New Notification's List</h3>
                                    </div>
                                    <div class="au-task js-list-load" style="padding: 14px;">
                                        <?php while($all_notification = mysqli_fetch_array($array_notification)){ $chj=0 ?>
										<a href="<?php echo site_url.'view_rating.php?user_id='.$all_notification['id']; ?>" target="_blank">
                                        <div class="au-task-list js-scrollbar3">
                                            <div class="au-task__item au-task__item--danger">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <?php echo $all_notification['name']; ?>
                                                    </h5>
                                                    <span class="time"><?php echo date('d-M-y',strtotime($all_notification['mail_time'])); ?></span>
                                                </div>
                                            </div>
                                        </div>
										</a>
										<?php } if(isset($chj)){ ?>
                                        <!--<div class="au-task__footer">
                                            <button class="au-btn au-btn-load js-load-btn">load more</button>
                                        </div> -->
										<?php }else { ?>
										
										<h4>No New Notification</h4>
										<?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php //}?>
<script>
$( function() {
	$( "#datepicker1" ).datepicker();
	$( "#datepicker2" ).datepicker();
} );
$('#datepicker1').datepicker({ dateFormat: 'yy-mm-dd' }).val();
$('#datepicker2').datepicker({ dateFormat: 'yy-mm-dd' }).val();
</script>
<?php include('footer.php'); ?>
<script>
try {
var ctx = document.getElementById("ratings");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: <?php echo json_encode($str_candidate_ratg); ?>,
          type: 'line',
          datasets: [{
            data: <?php echo json_encode($str_candidate_labels); ?>,
            label: 'Rating',
            backgroundColor: 'transparent',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {

          maintainAspectRatio: false,
          legend: {
            display: false
          },
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Montserrat',
            bodyFontFamily: 'Montserrat',
            cornerRadius: 3,
            intersect: false,
          },
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              tension: 0.00001,
              borderWidth: 1
            },
            point: {
              radius: 4,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }} catch (error) {
    console.log(error);
  }


try {
var ctx = document.getElementById("candidate_chart");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: <?php echo json_encode($fetch_candidate_labels); ?>,
          type: 'line',
          datasets: [{
            data: <?php echo json_encode($fetch_candidate_rating); ?>,
            label: 'Dataset',
            backgroundColor: 'rgba(255,255,255,.1)',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 0,
              bottom: 0
            }
          },
          responsive: true,
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              borderWidth: 0
            },
            point: {
              radius: 0,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }
	} catch (error) {
    console.log(error);
  }



try {
var ctx = document.getElementById("chart-category-department");
    if (ctx) {
      ctx.height = 280;
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          datasets: [
            {
              label: "My First dataset",
              data: [<?php echo getFrontDeskRating($con,$toal_no_feedbk)/5*100; ?>,<?php echo getRecruiterRating($con,$toal_no_feedbk)/5 * 100; ?>,<?php echo (getInterviewRating($con,$toal_no_feedbk)/5) * 100; ?>,<?php echo (getInterviewerRating($con,$toal_no_feedbk)/5) * 100; ?>],
              backgroundColor: [
                '#2ea08d',
                '#b4d857',
				'#a950a8',
				'#00b5e9'
              ],
              hoverBackgroundColor: [
               '#2ea08d',
                '#b4d857',
				'#a950a8',
				'#00b5e9'
              ],
              borderWidth: [
                0, 0
              ],
              hoverBorderColor: [
                'transparent',
                'transparent'
              ]
            }
          ],
          labels: [
            'Front Desk ',
            'Recruiter ',
			'Interview ',
			'Interviewer '
          ]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          cutoutPercentage: 55,
          animation: {
            animateScale: true,
            animateRotate: true
          },
          legend: {
            display: false
          },
          tooltips: {
            titleFontFamily: "Poppins",
            xPadding: 15,
            yPadding: 10,
            caretPadding: 0,
            bodyFontSize: 16
          }
        }
      });
    }

  } catch (error) {
    console.log(error);
  }
</script>
