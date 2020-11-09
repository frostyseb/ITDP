<?php 
include_once('../includes/fetchAttendance.php'); 

$uid = 1;

$trainingHrs = new Attendance;
$trainingHrs->get_training_hours($uid);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Participants</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo2.png" alt="DELL" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
					<li class="has-sub">
                                <h3>Profile</h3>
								<br>
								<li>Username</li>
								<li><!-- add in username --></li>
								<li>Name</li>
								<li><!-- add in name --></li>
								<li>Gender</li>
								<li><!-- add in gender --></li>
								<li>Role</li>
								<li><!-- add in role--></li>
                            </ul>
                        </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
					
                        <div class="row">
                            <div class="col-md-12">
							<!-- TRAININGS DATA-->
                                <h2 class="title-1 m-b-25">Trainings Details</h2>
								<h6 class="title-5 m-b-25"> Hours completed : <?php echo $trainingHrs->training_hours?></h6>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Trainings</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
												<th>Description</th>
												<th></th>
                                            </tr>
                                        </thead>
                                        <!-- PHP CODE TO FETCH DATA FROM ROWS
										<?php   // LOOP TILL END OF DATA  
											//while($rows=$result->fetch_assoc()) 
											//{ 
										?> 
										END PHP-->
										<tbody>
                                            <tr>
                                                <td>test<!-- add in training name --></td>
                                                <td>test<!-- add in start date--></td>
                                                <td>test<!-- add in end date --></td>
                                                <td>test<!-- add in status (pending, in progress, done)--></td>
												<td>test<!-- add in description--></td>
												<td> <button type="button" class="btn btn-secondary mb-1">
															JOIN <!-- SCROLL DOWN TO FIND MODAL -->
													</button>
												</td>
                                            </tr>
										</tbody>
                                    </table>
                                </div>
                            </div>
							<!-- END TRAININGS DATA-->
						</div>	
                        <div class="row">
                            <div class="col-md-12">
                                <!-- EVENT DATA-->
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>EVENTS</h3>
                                    </div>
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>Name</td>
                                                    <td>Date</td>
                                                    <td>Description</td>
													<td>Hours</td>
													<td></td>
                                                </tr>
                                            </thead>
											<!-- PHP CODE TO FETCH DATA FROM ROWS
											<?php   // LOOP TILL END OF DATA  
												$con = mysqli_connect('localhost','root','','itdp'); //EDIT DATABASE CONNECTION
												if (!$con) {
												  die('Could not connect: ' . mysqli_error($con));
												}
											?> 
											END PHP-->
                                            <tbody>
											<?php
											
												$records = mysqli_query($con,"select * from events"); // fetch data from database

												while($data = mysqli_fetch_array($records))
												{
											?>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6><?php echo $data['event_name'] ?></h6>
                                                        </div>
                                                    </td>
													
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6><?php echo $data['event_start_date'] ?></h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6><?php echo $data['other_details'] ?></h6>
                                                        </div>
                                                    </td>
													<td>
                                                        <div class="table-data__info">
                                                            <h6><?php echo $data['number_of_participants'] ?></h6>
                                                        </div>
                                                    </td>
													<td>
														<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#smallmodal">
															JOIN <!-- SCROLL DOWN TO FIND MODAL -->
														</button>
                                                    </td>
                                                </tr>
											<?php 
												}
											?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="user-data__footer">
                                        <button class="au-btn au-btn-load">load more</button>
                                    </div>
                                </div>
                                <!-- END EVENT DATA-->
                            </div>
						
                            <div class="col-lg-6">
                                <!-- COMMITTEE-->
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>COMMITTEE</h3>
                                    </div>
                                    <div class="table-responsive table-data">
										<div class="au-message__noti">
											<p>List Of Members
											</p>
										</div>
                                        <table class="table">
											<!-- PHP CODE TO FETCH DATA FROM ROWS
											<?php   // LOOP TILL END OF DATA  
												//while($rows=$result->fetch_assoc()) 
												//{ }
											?> 
											END PHP-->
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>test<!-- add in name --></h6>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="user-data__footer">
                                        <button class="au-btn au-btn-load">load more</button>
                                    </div>
                                </div>
                                <!-- END COMMITTEE-->
                            </div>
							
							<div class="col-lg-6">
								<div class="card">
									<div class="card-header">
										<strong>Committee Feedback</strong>
									</div>
									<div class="card-body card-block">
										<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
											<div class="row form-group">
												<div class="col col-md-3">
													<label class=" form-control-label">Username</label>
												</div>
												<div class="col-12 col-md-9">
													<p class="form-control-static"><!-- add in name --></p>
												</div>
											</div>
											<div class="row form-group">
												<div class="col col-md-3">
													<label for="textarea-input" class=" form-control-label">Feedback</label>
												</div>
												<div class="col-12 col-md-9">
													<textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
												</div>
											</div>
										</form>
									</div>
									<div class="card-footer">
										<button type="submit" class="btn btn-primary btn-sm">
											<i class="fa fa-dot-circle-o"></i> Submit
										</button>
										<button type="reset" class="btn btn-danger btn-sm">
											<i class="fa fa-ban"></i> Reset
										</button>
									</div>
								</div>
							</div>
                        </div>
                        
						
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
				
			<!-- modal small -->
			<div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="smallmodalLabel"><!-- add in eventName --></h5>
						</div>
						<div class="modal-body">
							<p>
								Would you like to join this event?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary">Confirm</button>
						</div>
					</div>
				</div>
			</div>
			<!-- end modal small -->
				
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
