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
    <title>Program Manager</title>

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
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Participant List</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-chart-bar"></i>Events and Trainings</a>
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
                                <!-- EVENT DATA-->
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>FEEDBACK<h3>
                                    </div>
									<br>
									<div class="col col-lg-12">
										<label for="select" class=" form-control-label">Select</label>
									</div>
									<div class="col-12 col-lg-9">
										<select class="form-control" name="users" onchange="showUser(this.value)">
											<option value="0">Please select</option>
											<option value="1">Option #1</option>
											<option value="2">Option #2</option>
											<option value="3">Option #3</option>
										</select>
									</div>
                                    <div class="table-responsive table-data">
										<table class="table">
											<tbody>
												<tr>
													<td>
														<div id="txtHint"><b>Person info will be listed here...</b></div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
                                    <div class="user-data__footer">
                                        <button class="au-btn au-btn-load">load more</button>
                                    </div>
                                </div>
                                <!-- END EVENT DATA-->
                            </div>
                        </div>
						
						<div class="row">
                            <div class="col-md-12">
							<!-- EVENT CONFIGURATION DATA-->
                                <h2 class="title-1 m-b-25">Event Configuration</h2>
								<div class="table-data__tool-right">
									<button class="au-btn au-btn-icon au-btn--blue au-btn--small" data-toggle="modal" data-target="#addEvent">add event</button>
									<button class="btn btn-danger au-btn--small" data-toggle="modal" data-target="#deleteEvent">DELETE</button>
								</div> <br>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
												<th>
													<label class="au-checkbox">
														<input type="checkbox">
														<span class="au-checkmark"></span>
													</label>
                                                </th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Cost</th>
												<th>Venue</th>
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
											<td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>test<!-- add in name --></td>
                                                <td>test<!-- add in date--></td>
                                                <td>test<!-- add in description --></td>
                                                <td>test<!-- cost--></td>
												<td>test<!-- venue--></td>
												<td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="modal" data-target="#editEvent" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="modal" data-target="#deleteEvent" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
										</tbody>
                                    </table>
                                </div>
                            </div>
						</div>

						<div class="row">
                            <div class="col-md-12">
							<!-- PARTICIPANTS DATA-->
                                <h2 class="title-1 m-b-25">Participants List</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
												<th>Email</th>
												<th>Gender</th>
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
                                                <td>test<!-- add in username --></td>
                                                <td>test<!-- add in first name--></td>
                                                <td>test<!-- add in last name --></td>
												<td>test<!-- email--></td>
												<td>test<!-- gender --></td>
											</tr>
											<tr>
                                                <td>test<!-- add in username --></td>
                                                <td>test<!-- add in first name--></td>
                                                <td>test<!-- add in last name --></td>
												<td>test<!-- email--></td>
												<td>test<!-- gender --></td>
											</tr>
											<tr>
                                                <td>test<!-- add in username --></td>
                                                <td>test<!-- add in first name--></td>
                                                <td>test<!-- add in last name --></td>
												<td>test<!-- email--></td>
												<td>test<!-- gender --></td>
                                            </tr>
										</tbody>
                                    </table>
                                </div>
                            </div>
							<!-- END PARTICIPANTS DATA-->
						</div>
					</div>
				</div>
            <!-- END MAIN CONTENT-->
			</div>
				
			<!-- ADD EVENT modal small -->
			<div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="smallmodalLabel">Add Event</h5>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Date</label>
								<input type="text" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control" required></textarea>
							</div>
							<div class="form-group">
								<label>Cost</label>
								<input type="text" class="form-control" required>
							</div>	
							<div class="form-group">
								<label>Venue</label>
								<input type="text" class="form-control" required>
							</div>	
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary">Save</button>
						</div>
					</div>
				</div>
			</div>
			<!-- end ADD EVENT modal small -->
			
			<!-- DELETE EVENT modal small -->
			<div class="modal fade" id="deleteEvent" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="smallmodalLabel">Add Event</h5>
						</div>
						<div class="modal-body">
							<div class="modal-body">					
								<p>Are you sure you want to delete these Records?</p>
								<p class="text-warning"><small>This action cannot be undone.</small></p>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-danger">Confirm</button>
						</div>
					</div>
				</div>
			</div>
			<!-- end DELETE EVENT modal small -->
			
			<!-- EDIT EVENT modal small -->
			<div class="modal fade" id="editEvent" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="smallmodalLabel">Add Event</h5>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Date</label>
								<input type="text" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control" required></textarea>
							</div>
							<div class="form-group">
								<label>Cost</label>
								<input type="text" class="form-control" required>
							</div>	
							<div class="form-group">
								<label>Venue</label>
								<input type="text" class="form-control" required>
							</div>	
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary">Save</button>
						</div>
					</div>
				</div>
			</div>
			<!-- end EDIT EVENT modal small -->
				
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
